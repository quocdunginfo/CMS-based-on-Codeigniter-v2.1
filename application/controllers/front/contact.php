<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Contact extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Contact';
        parent::_add_active_menu(site_url('front/contact/index'));
    }
    public function index()
    {
        $captcha = parent::_new_captcha();
        $this->_data['captcha_value'] = $captcha['value'];
        $this->_data['captcha_name'] = $captcha['name'];
        
        $this->_data['feedback0'] = new Feedback_model;
        parent::_view('contact', $this->_data);
    }
    public function finish()
    {
        parent::_view('contact_finish', $this->_data);
    }
    public function submit()
    {
        //get post value
        $input = $this->input->post(null,true);
        //varible
        $obj=new Feedback_model;
        //assign
        $obj->set_title($input['title']);
        $obj->set_content($input['content']);
        if($this->_user==null)
        {
            $obj->set_guest_email($input['email']);
            $obj->set_guest_phone($input['phone']);
            $obj->set_guest_name($input['name']);
        }
        else
        {
            $obj->set_user_obj($this->_user);
        }
        //validate
        $validate = $obj->validate();
        //check captcha
        if($input[$this->session->userdata('captcha_name')]!=$this->session->userdata('captcha_value'))
        {
            array_push($validate,'captcha_fail');
        }
        
        if(sizeof($validate)<=0)
        {
            //get from setting
            $setting = new Setting_model;
            $cat_id = $setting->get_by_key('feedback_category');
            $cat_obj = new Cat_model;
            $cat_obj->id = $cat_id;
            $cat_obj->load();
            
            //action
            $obj->set_cat_obj_list(array($cat_obj));
            $obj->add();
            
            redirect('front/contact/finish');
            return;
        }
        //show error
        $captcha = parent::_new_captcha();
        $this->_data['captcha_value'] = $captcha['value'];
        $this->_data['captcha_name'] = $captcha['name'];
        
        $this->_data['feedback0'] = $obj;
        $this->_data['state'] = $validate;
        parent::_view('contact', $this->_data);
    }
}