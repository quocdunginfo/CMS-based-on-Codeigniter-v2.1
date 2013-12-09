<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();
    protected $_user = null;
    protected $_permission=array();
    protected $_temp = array();
    
    protected $_giohang = null;
    protected $_tpl = 'front/';
    protected $_timkiem_sanpham = array();
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
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('Group_model');
        $this->load->model('Permission_model');
        //helper
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('qd_file_helper');
        //library
        $this->load->library('session');
        $this->load->library('Qd_pagination');
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
        '','','','',null,true,'',0,0,-1,1,0,6
        );
        array_push($this->_data['active_menu'],'home');
        
        $this->_data['slider_list'] = $this->qd_slider->get_slider_list();
        $this->_view('index', $this->_data);
    }
    protected function _view($view_name='index', $data = array())
    {
        $this->load->view($this->_tpl.$view_name, $data);
    }
    protected function _build_common_data()
    {
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
        //get model
        $model_cat = new Painting_cat_model;
        //common view data
        $this->_data['painting_list_cat'] = $model_cat->get_cat_tree(-1,0,$model_cat->special);
        $this->_data['giohang'] = $this->_giohang;
        $this->_data['current_user'] =  $this->_user;
        $this->_data['html_title'] =  'Site';
        $this->_data['state']= array();
        $this->_data['active_menu'] = array();
        $this->_data['timkiem_sanpham'] = $this->_timkiem_sanpham;
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
}