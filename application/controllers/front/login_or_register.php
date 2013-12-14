<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Login_or_register extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Login or register';
        $this->_data['active_menu'] = array('front_login_or_register');
    }
    public function index()
    {
        parent::_view('login_or_register',$this->_data);
    }
}