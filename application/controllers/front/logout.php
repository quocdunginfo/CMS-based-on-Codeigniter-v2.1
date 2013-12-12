<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Logout extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Logout';
        $this->_data['active_menu'] = array('front_logout');
    }
    public function index()
    {
        //clear cookies
        $this->_user=null;
        //delete user session
        $array= array(
             'user_id'    => 0,
             'user_password' => ""
        );
        $this->session->set_userdata($array);
        //redirect
        redirect('front');
        
    }
}