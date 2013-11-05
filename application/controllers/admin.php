<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    protected $_data;
    protected $_user = null;
    protected $_permission;
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('qd_file_helper');
        $this->load->database();
        //alway call first
        $this->_build_common_data();
    }
    public function index()
    {
        //check login
        if($this->_user!=null)
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
            
            //view dashboard
            $this->load->view('admin/dashboard/index',$this->_data);
            return;
        }
        //view login form
        $this->load->view('admin/login/index',$this->_data);
    }
    protected function _build_common_data()
    {
        $this->_data['state']= array('');
        //get user from cookie
            $user=new User_model;
            $user->username=$this->session->userdata('user_username');
            $user->password=$this->session->userdata('user_password');
            if($user->login()==true)
            {
                $user->load_by_username();
                $this->_user = $user;
            }
        if($this->_user!=null)
        {
            self::_reset_permission($this->_user->group_id);
        }
        else
        {
            $this->_permission = array();
        }
        $this->_data['current_user'] =  $this->_user;
        $this->_data['html_title'] =  'Dashboard';
    }
    public function test_login()
    {
        if($this->_user!=null)
        {
            $this->index();
            return;
        }
        $input = $this->input->post(NULL, TRUE);
        $test = new User_model;
        $test->username=$input['username'];
        $test->password=$input['password'];
        if($test->login()==true)
        {
            //login ok
                //get full info
                $test->load();
                //set cookies
                    $array= array(
                         'user_id'    => $test->id,
                         'user_username'    => $test->username,
                         'user_password' => $test->password
                    );
                    $this->session->set_userdata($array);
            redirect('admin');
        }
        $this->_data['state'] = array('fail');
        self::index();
    }
    private function _reset_permission($group_id=0)
    {
        $tmp = array();
        if($group_id==0)
        {
            array_push($tmp,'home_view');
            //user
                array_push($tmp,'user_view');
                array_push($tmp,'user_add');
                array_push($tmp,'user_edit');
                array_push($tmp,'user_delete');
            //post
                array_push($tmp,'post_view');
                array_push($tmp,'post_add');
                array_push($tmp,'post_edit');
                array_push($tmp,'post_delete');
            //category
                array_push($tmp,'cat_view');
                array_push($tmp,'cat_add');
                array_push($tmp,'cat_edit');
                array_push($tmp,'cat_delete');
            //setting
                array_push($tmp,'setting_view');
                array_push($tmp,'setting_edit');
        }
        if($group_id==1)
        {
            array_push($tmp,'home_view');
            //user
                array_push($tmp,'user_view');
                //array_push($tmp,'user_add');
                //array_push($tmp,'user_edit');
                //array_push($tmp,'user_delete');
            //post
                array_push($tmp,'post_view');
                //array_push($tmp,'post_add');
                //array_push($tmp,'post_edit');
                //array_push($tmp,'post_delete');
            //category
                array_push($tmp,'cat_view');
                //array_push($tmp,'cat_add');
                //array_push($tmp,'cat_edit');
                //array_push($tmp,'cat_delete');
            //setting
                array_push($tmp,'setting_view');
                //array_push($tmp,'setting_edit');
        }
        //assign
        $this->_permission = $tmp;
    }
    public function login()
    {
        self::index();
    }
    public function logout()
    {
        //delete session
        $this->session->sess_destroy();
        redirect('admin');
    }
    protected function _fail_permission($string_message='unknown')
    {
        $this->_data['state'] = array('You do not have permission on "'.$string_message.'" area!');
        $this->load->view('admin/dashboard/view_fail',$this->_data);
    }
}