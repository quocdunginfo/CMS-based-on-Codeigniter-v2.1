<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Register extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Logout';
        $this->_data['active_menu'] = array('front_logout');
    }
    public function index()
    {
        if($this->_user!=null)
        {
            $next = $this->session->userdata('register_next_url');
            if($next!='')
            {
                redirect($next);
                return;
            }
            redirect('front/account');
        }
        $captcha = parent::_new_captcha();
        $obj = new User_model;        
        $this->_data['user0'] = $obj;
        $this->_data['captcha_name'] = $captcha['name'];
        $this->_data['captcha_value'] = $captcha['value'];
        $this->_data['password'] = '';
        $this->_data['password2'] = '';
        parent::_view('register',$this->_data);
    }
    public function submit()
    {
        $validate = array();
        //get post value
        $input = $this->input->post(null,true);
        //assign
        $obj = new User_model;
        $obj->address = $input['address'];
        $obj->email = $input['email'];
        $obj->fullname = $input['fullname'];
        $obj->phone = $input['phone'];
        $obj->username = $input['username'];
        $obj->active = 1;
        //validate
        $validate = $obj->validate($input['password'], $input['password2']);
        //check captcha
        if($input[$this->session->userdata('captcha_name')]!=$this->session->userdata('captcha_value'))
        {
            array_push($validate,'captcha_fail');
        }
        if(sizeof($validate)==0)
        {
            //OK
            $obj->special = 1;//customer
            $obj->set_group_obj(null);
            $obj->set_password($input['password']);
            //call add
            $obj->add();
            $this->_user = $obj;
            parent::_save_user_to_session();
            
            redirect('front/register');
            return;
        }
        
        $captcha = parent::_new_captcha();
        $this->_data['captcha_name'] = $captcha['name'];
        $this->_data['captcha_value'] = $captcha['value'];
        //show error
        $this->_data['user0'] = $obj;
        $this->_data['state'] = $validate;
        $this->_data['password'] = $input['password'];
        $this->_data['password2'] = $input['password2'];
        parent::_view('register',$this->_data);
    }
}