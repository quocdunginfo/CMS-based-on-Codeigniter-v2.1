<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/post_model.php' );
class Feedback_model extends Post_model {
    //Alias
    function __construct()
    {
        parent::__construct();
        $this->special=1;
    }
    public function get_title()
    {
        return $this->title;
    }
    public function set_title($value='')
    {
        $this->title = $value;
    }
    public function get_content()
    {
        return $this->content;
    }
    public function set_content($value='')
    {
        $this->content = $value;
    }
    public function get_guest_name()
    {
        return $this->content_lite;
    }
    public function set_guest_name($value='')
    {
        $this->content_lite = $value;
    }
    public function get_guest_email()
    {
        return $this->optional1;
    }
    public function set_guest_email($value='')
    {
        $this->optional1 = $value;
    }
    public function get_guest_phone()
    {
        return $this->optional2;
    }
    public function set_guest_phone($value='')
    {
        $this->optional2 = $value;
    }
    
    public function validate()
    {
        $re=array();
        if(parent::get_user_obj()==null)
        {
            if(self::get_guest_name()=='')
            {
                array_push($re,'name_fail');
            }
            if(!$this->form_validate->is_email(
                self::get_guest_email()
            ))
            {
                array_push($re,'email_fail');
            }
        }
        if(self::get_title()=='')
        {
            array_push($re,'title_fail');
        }
        if(self::get_content()=='')
        {
            array_push($re,'content_fail');
        }
        return $re;
    }
}