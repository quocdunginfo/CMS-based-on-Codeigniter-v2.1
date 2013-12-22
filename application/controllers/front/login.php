<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Login extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Login';
        parent::_add_active_menu(site_url($this->_com.'login'));
    }
    public function index()
    {
        if($this->_user!=null)
        {
            $next = $this->session->userdata('login_next_url');
            if($next!='')
            {
                $this->session->set_userdata(array('login_next_url' => ''));
                redirect($next);
                return;
            }
            redirect('front');
            return;
        }
        //view form
        $this->_data['pre_username'] = $this->_temp!=null?$this->_temp:'';
        parent::_view('login',$this->_data);
    }
    public function submit()
    {
        //get post value
        $input = $this->input->post(null,true);
        $input['remember'] = isset($input['remember'])?false:true;
        //validate login
        $obj=new User_model;
        $obj->username = $input['username'];
        $obj->set_password($input['password']);
        if($obj->login_by_username()==true)
        {
            $this->_user = $obj;
            parent::_save_user_to_session();
        }
        else
        {
            $this->_data['state'] = array('fail');
        }
        $this->_temp = $input['username'];
        self::index();
    }
}