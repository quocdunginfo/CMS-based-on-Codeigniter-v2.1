<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Login extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Login';
        $this->_data['active_menu'] = array('front_login');
    }
    public function index()
    {
        if($this->_user!=null)
        {
            redirect('front');
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
            //login ok
                //get full info
                $obj->load_by_username();
                //set session
                    $array= array(
                         'user_id'    => $obj->id,
                         'user_password' => $obj->get_password()
                    );
                    $this->session->set_userdata($array);
                $this->_user = $obj;
        }
        else
        {
            $this->_data['state'] = array('fail');
        }
        $this->_temp = $input['username'];
        self::index();
    }
}