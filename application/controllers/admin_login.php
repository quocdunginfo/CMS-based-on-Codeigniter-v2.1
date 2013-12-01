<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_login extends CI_Controller {
    protected $_user = null;
    protected $_data = array();
    public function __construct()
    {
        parent::__construct();
        //may class
        $this->load->model('User_model');
        $this->load->model('Group_model');
        $this->load->model('Permission_model');
        //helper
        $this->load->helper('url');
        //library
        $this->load->library('session');
        $this->load->library('uri');
        $this->load->library('encrypt');
        //db
        $this->load->database();
        //prepare common data
        $this->_build_common_data();
    }
    public function index()
    {
        //check login
        if($this->_user!=null)
        {
            //redirect admin home
            redirect('admin');
            return;
        }
        //view login form
        if(!isset($this->_data['state']))
        {
            $this->_data['state'] = array();
        }
        $this->load->view('admin/login/index',$this->_data);
    }
    protected function _build_common_data()
    {
        $this->_data['state']= array();
        //get user from session
            $user=new User_model;
            $user->id = $this->session->userdata('user_id');
            $user->set_password($this->session->userdata('user_password'));
            if($user->login()==true)
            {
                $user->load();
                $this->_user = $user;
            }
        $this->_data['html_title'] =  'Login';
    }
    public function test_login()
    {
        if($this->_user!=null)
        {
            self::index();
            return;
        }
        $input = $this->input->post(NULL, TRUE);
        $test = new User_model;
        $test->username=$input['username'];
        $test->set_password($input['password']);
        if($test->login_by_username()==true)
        {
            //login ok
                //get full info
                $test->load_by_username();
                //set session
                    $array= array(
                         'user_id'    => $test->id,
                         'user_password' => $test->get_password()
                    );
                    $this->session->set_userdata($array);
                $this->_user = $test;
        }
        else
        {
            $this->_data['state'] = array('fail');
        }
        self::index();
    }
    public function logout()
    {
        $this->_user=null;
        //delete user session
        $array= array(
             'user_id'    => 0,
             'user_password' => ""
        );
        $this->session->set_userdata($array);
        self::index();
    }
}