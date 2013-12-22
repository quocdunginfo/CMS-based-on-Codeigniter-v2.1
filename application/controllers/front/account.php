<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Account extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Account';
        parent::_add_active_menu(site_url($this->_com.'account'));
    }
    public function index()
    {
        if($this->_user==null)
        {
            redirect('front/login_or_register');
            return;
        }
        $this->_data['password'] = $this->_user->get_password();
        $this->_data['password2'] = $this->_user->get_password();
        $this->_data['state'] = (array)$this->session->flashdata('state');
        parent::_view('account', $this->_data);
    }
    public function submit()
    {
        //get post value
        $input = $this->input->post(null,true);
        //assign
        $this->_user->fullname = $input['fullname'];
        $this->_user->phone = $input['phone'];
        $this->_user->address = $input['address'];
        $this->_user->email = $input['email'];
        //validate
        $validate = $this->_user->validate($input['password'], $input['password2']);
        if(sizeof($validate)<=0)
        {
            //ready
            $this->_user->set_password($input['password']);
            //update
            $this->_user->update();
            //auto set to session
            parent::_save_user_to_session();
            //set flash
            $this->session->set_flashdata('state','edit_ok');
            //redirect
            redirect('front/account');
            return;
        }
        //show error
        $this->_data['password'] = $input['password'];
        $this->_data['password2'] = $input['password2'];
        $this->_data['state'] = $validate;
        parent::_view('account', $this->_data);
    }
}