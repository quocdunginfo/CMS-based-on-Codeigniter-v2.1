<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();
    protected $_user = null;
    protected $_permission=array();
    protected $_temp = '';
    
    protected $_giohang = null;
    protected $_tpl = 'front/';
    protected $_com = 'front/';
    protected $_timkiem_sanpham = array();
    protected $_timkiem_nangcao = array();
    protected $_menu = null;
    public function __construct()
    {
        parent::__construct();
        //my class
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("painting/Painting_cat_model",'Painting_cat_model');
        $this->load->model("painting/Material_cat_model",'Material_cat_model');
        $this->load->model("order/Order_model",'Order_model');
        $this->load->model("order/Order_detail_model",'Order_detail_model');
        $this->load->model("template/Template_model",'Template_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('Group_model');
        $this->load->model('Permission_model');
        $this->load->model('order/Shippingfee_model','Shippingfee_model');
        $this->load->model('Feedback_model');
        $this->load->model('menu/Menu_model','Menu_model');
        $this->load->model('menu/Menu_provider_model','Menu_provider_model');
        $this->load->model('menu/Template_menu_model','Template_menu_model');
        //helper
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('qd_file_helper');
        //library
        $this->load->library('session');
        $this->load->library('Qd_pagination');
        $this->load->library('Form_validate');
        $this->load->library('uri');
        $this->load->library('encrypt');
        $this->load->library('Image_resize');
        $this->load->library('Qd_slider');
        //db
        $this->load->database();
        //
        self::_build_common_data();
    }
    public function index()
    {
		$this->_data['html_title'] .= ' - Index';
        $model = new Painting_post_model;
        
        $this->_data['painting_list'] = $model->search(
        '','','','',null,true,-1,'',0,0,-1,1,0,6
        );
        array_push($this->_data['active_menu'],'home');
        
        $this->_data['slider_list'] = $this->qd_slider->get_slider_list();
        
        self::_add_active_menu(site_url('front/home'));
        self::_view('index', $this->_data);
    }
    protected function _view($view_name='index', $data = array())
    {
        $this->load->view($this->_tpl.$view_name, $data);
    }
    protected function _build_common_data()
    {
        //get template path from setting
        $setting = new Setting_model;
        $template = new Template_model;
        $template->id = $setting->get_by_key('front_template_id');
        $template->load();
        //set $_tpl first
        $this->_tpl = $template->get_path().'/';
        
		//get user from session
            $user=new User_model;
            $user->id = $this->session->userdata('user_id');
            $user->set_password($this->session->userdata('user_password'));
            if($user->login()==true)
            {
                $user->load();
                $this->_user = $user;
            }
        //init permission
        self::_reset_permission($this->_user);
        //xử lý giỏ hàng
            if(!isset($_SESSION))
            {
                session_start();
            }
            if(!isset($_SESSION['giohang']))
            {
                //Init new one
                self::_khoitao_giohang();
                self::_luu_giohang();
            }
            else
            {
                //gio hang da co trong session
                $this->_giohang = $_SESSION['giohang'];
            }
        //xur ly session tim kiem san pham
            if(!isset($_SESSION['f_timkiem_sanpham']))
            {
                self::_khoitao_timkiem_sanpham();
                self::_luu_timkiem_sanpham();
            }
            else
            {
                //gio hang da co trong session
                $this->_timkiem_sanpham = $_SESSION['f_timkiem_sanpham'];
            }
        //xur ly session tim kiem nangcao
            if(!isset($_SESSION['f_timkiem_nangcao']))
            {
                self::_khoitao_timkiem_nangcao();
                self::_luu_timkiem_nangcao();
            }
            else
            {
                //gio hang da co trong session
                $this->_timkiem_nangcao = $_SESSION['f_timkiem_nangcao'];
            }
        //get model
        $model_cat = new Painting_cat_model;
        $model_mat= new Material_cat_model;
        $model_post= new Painting_post_model;
        //common view data
        $this->_data['painting_list_cat'] = $model_cat->get_cat_tree(-1,0,$model_cat->special);
        
        
        $this->_data['painting_best_seller'] = $model_post->to_obj_list(array_slice($model_post->filter_best_seller(null),0,6));
        
        $this->_data['painting_list_mat']=$model_mat->search('',1,$model_mat->special,'id','asc',0,-1);
        $this->_data['giohang'] = $this->_giohang;
        $this->_data['current_user'] =  $this->_user;
        $this->_data['html_title'] =  $setting->get_by_key('html_title');
        $this->_data['html_logo_name'] =  $setting->get_by_key('html_logo_name');
        $this->_data['html_footer_left'] =  $setting->get_by_key('html_footer_left');
        $this->_data['html_footer_right'] =  $setting->get_by_key('html_footer_right');
        $this->_data['html_seo_keyword'] =  $setting->get_by_key('html_seo_keyword');
        
        $this->_data['state']= array();
        $this->_data['active_menu'] = array();
        $this->_data['timkiem_sanpham'] = $this->_timkiem_sanpham;
        $this->_data['timkiem_nangcao'] = $this->_timkiem_nangcao;
		$this->_data['template_path'] = base_url().'application/views/'.$this->_tpl;
        
        
        //Menu
        $this->_menu = new Template_menu_model;
        $this->_menu->set_root(
            $this->Menu_model->get_by_id(
                $setting->get_by_key('main_menu_category')
            )
        );
        $this->_data['menu'] =  $this->_menu;
        
        //Cache, some function may not work
        $this->output->cache($setting->get_by_key('cache_time'));
        //Maintain mode
        if($setting->get_by_key('maintain_mode')==1)
        {
            redirect('fatal_error');
            return;
        }
        //component and template path
        $this->_data['_com'] = $this->_com;
        $this->_data['_tpl'] = $this->_tpl;
    }
    protected function _add_active_menu($full_url='')
    {
        $this->_menu->add_active_menu($full_url);
        $this->_data['menu'] = $this->_menu;
    }
    private function _reset_permission($user_obj=null)
    {
        $this->_permission = array();
        //load permission from object
        if($user_obj==null)
        {
            return false;
        }
        foreach($user_obj->get_group_obj()->get_permission_list_obj() as $item)
        {
            array_push($this->_permission,$item->name);
        }
        return true;
    }
    protected function _khoitao_giohang()
    {
        //Init new one
        $this->_giohang = new Order_model;
        //$tmpp->set_customer_user_obj($this->_user);//will be assign when save
    }
    protected function _luu_giohang()
    {
        $_SESSION['giohang'] =  $this->_giohang;
    }
    protected function _khoitao_timkiem_sanpham()
    {
        $this->_timkiem_sanpham = array(
        'art_id' => '',
        'title' => 'title',
        'art_price_from' => 0,
        'art_price_to' => 0,
        'cat_id' => array(),
        'max_item_per_page' => 6,
        'order_by' => 'id',
        'order_rule' => 'desc'
        );
    }
    protected function _luu_timkiem_sanpham()
    {
        $_SESSION['f_timkiem_sanpham'] = $this->_timkiem_sanpham;
    } 
    protected function _khoitao_timkiem_nangcao()
    {
        $this->_timkiem_nangcao = array(
        'art_id' => '',
        'title' => '',
        'art_price_from' => 0,
        'art_price_to' => 0,
        'cat_id' => '',
        'mat_id'=>-1,
        'max_item_per_page' => 6,
        'order_by' => 'id',
        'order_rule' => 'desc',
        );
    }
    protected function _luu_timkiem_nangcao()
    {
        $_SESSION['f_timkiem_nangcao'] = $this->_timkiem_nangcao;
    }
    protected function _save_user_to_session()
    {
        if($this->_user==null)
        {
            return;
        }
        //get full info
        $this->_user->load_by_username();
        //set session
            $array= array(
                 'user_id'    => $this->_user->id,
                 'user_password' => $this->_user->get_password()
            );
            $this->session->set_userdata($array);
    }
    /**
     * Home::new_captcha()
     * Tạo 2 mã và đưa vào session 'captcha_name', 'captcha_value'
     * @return array('name'=>?,'value'=>?) trong session đang có
     */
    protected function _new_captcha()
    {
        $re = array('name' => '','value'=> '');
        //random name and value
        $re['name'] = random_string('alnum', rand(8,16));
        $re['value'] = random_string('nozero', 3);
        //save to session
        $this->session->set_userdata(
            array('captcha_name' => $re['name'],'captcha_value' => $re['value'])
        );
        //return array
        return $re;
    }
}