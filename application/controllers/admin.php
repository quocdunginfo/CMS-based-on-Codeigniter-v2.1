<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    protected $_data = array();
    protected $_user = null;
    protected $_permission=array();
    protected $_temp = array();
    //n?u chuy?n active n?i class b?ng self::... thì dùng $this->_temp;
    //n?u chuy?n action = redirect(uri) thì dùng $this->session->set_flash('key',value);
    public function __construct()
    {
        parent::__construct();
        //my class
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("order/Order_model",'Order_model');
        $this->load->model("order/Order_detail_model",'Order_detail_model');
        $this->load->model("template/Template_model",'Template_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('Group_model');
        $this->load->model('Permission_model');
        $this->load->model('Feedback_model');
        $this->load->model('menu/Menu_model','Menu_model');
        $this->load->model('menu/Menu_provider_model','Menu_provider_model');
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
        $this->load->library('email');
        $this->load->library('Form_validate');
        //db
        $this->load->database();
        //prepare common data
        self::_build_common_data();
    }
    public function index()
    {
        //check permision
        if(!in_array('home_view',$this->_permission))
        {
            self::_fail_permission('home_view');
            return;
        }
        //get post that hold comment
        $feature_cat = $this->Setting_model->get_by_key('feedback_category');
        $list_post = $this->Post_model->search('','','',-1,-1,array($feature_cat));
        if(sizeof($list_post)>0)
        {
            $this->_data['post_cmt'] = $list_post[0];
        }
        else
        {
            $this->_data['post_cmt'] = null;
        }
        
        array_push($this->_data['active_menu'],'admin');
        //view dashboard
        $this->load->view('admin/index',$this->_data);
        return;
    }
    protected function _build_common_data()
    {
        //get user from cookie
            $user=new User_model;
            $user->id = $this->session->userdata('user_id');
            $user->set_password($this->session->userdata('user_password'));
            if($user->login()==true)
            {
                $user->load();//load by id
                //chặn KH
                if($user->is_customer())
                {
                    //do not thing
                }
                else
                {
                    $this->_user = $user;
                }
            }
        if($this->_user!=null)
        {
            self::_reset_permission($this->_user);
        }
        else
        {
            $this->_permission = array();
            //redirect to login page
            redirect('admin_login');
            return;
        }
        //common view data
        $this->_data['state']= array();
        $this->_data['view_mode']= 'normal';
        $this->_data['active_menu'] = array();
        $this->_data['current_user'] =  $this->_user;
        $this->_data['html_title'] =  'Dashboard';
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
    
    protected function _fail_permission($permission_name='unknown')
    {
        $this->_data['state'] = array('message'=>'You do not have permission on "'.$permission_name.'" area!');
        $this->load->view('admin/view_fail',$this->_data);
    }
    protected function _show_notification($string_message='unknown')
    {
        $this->_data['state'] = array('message'=>$string_message, $this->_data);
        $this->load->view('admin/view_fail',$this->_data);
    }
}