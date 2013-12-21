<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Qd_email {
    protected $smtp_user = '';
    protected $smtp_pass = '';
    protected $protocol = 'smtp';
    protected $smtp_host = 'ssl://smtp.googlemail.com';
    protected $smtp_port = 465;
    protected $mailtype = 'html';
    protected $charset = 'utf-8';
    protected $newline = "\r\n";
    protected $starttls = true;
    protected $timeout = '10';
    
    protected $to = '';
    protected $subject = '';
    protected $content = '';
    
    protected $CI = null;
    function __construct()
    {
        self::_build_common_data();
    }
    protected function _build_common_data()
    {
        
    }
    public function set_to($email_to='')
    {
        $this->to = $email_to;
    }
    public function set_subject($value='')
    {
        $this->subject = $value;
    }
    public function set_content($value='')
    {
        $this->content = $value;
    }
    public function send()
    {
        $this->CI =& get_instance();
        //load
        $this->CI->load->model('Setting_model');
        $this->CI->load->library('email');
        //create obj
        $setting = new Setting_model;
        
        $this->CI =& get_instance();
        //load setting
        $config = array(
            'protocol' => $this->protocol= $setting->get_by_key('email_protocol'),
            'smtp_host' => $this->smtp_host=$setting->get_by_key('email_smtp_host'),
            'smtp_port' => $this->smtp_port = $setting->get_by_key('email_smtp_port'),
            'smtp_user' => $this->smtp_user = $setting->get_by_key('email_smtp_user'),
            'smtp_pass' => $this->smtp_pass = $setting->get_by_key('email_smtp_pass'),
            'mailtype' => $this->mailtype,
            'charset' => $this->charset,
            'newline' => $this->newline,//very importance
            'starttls'  => true,
            'timeout'=> $setting->get_by_key('email_timeout')
        );
        $this->CI->email->initialize($config);
        
        
        $this->CI->email->from($this->smtp_user);
        $this->CI->email->to($this->to);
        $this->CI->email->subject($this->subject);
        $this->CI->email->message($this->content);
        
        return $this->CI->email->send();        
    }
    
}