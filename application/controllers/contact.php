<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Contact extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->data['html']['title'].=' - Contact';
        if(!isset($_SESSION)) {
             session_start();
        }
        //disable cache when contact
        $this->output->cache(0);
    }
    public function index($state='null')
    {
        $random = qd_random_string(3);
        $captcha_input_name = qd_random_string(50);
        //create captcha for validate
        $_SESSION['qd_contact_captcha'] = $random;
        $_SESSION['qd_contact_captcha_input_name'] = $captcha_input_name;
        
        //$this->_build_common_data();  
        $this->data['state'] = $state;
        $this->data['captcha_on'] = $this->Setting_model->get('feedback_captcha');
        $this->data['captcha'] = $random;
        $this->data['captcha_input_name'] = $captcha_input_name;
        $this->load->view('right_template/contact',$this->data);
    }
    public function submit()
    {
        if($this->Setting_model->get('allow_guest_post_feedback')!=1)
        {
            $this->index('Guests are not allowed to post feedback right now!');
            return;
            
        }
        $max_len = $this->Setting_model->get('feedback_max_content');
        //post data
        $input = $this->input->post(null,true);
        $name = $input['contact_name'];
        $email = $input['contact_email'];
        $content = mb_substr($input['contact_content'],0,$max_len,'UTF-8');
        
        //validate data
        $this->load->library('Form_validate');
        if($name=='' || !$this->form_validate->is_email($email) || $content=='')
        {
            $this->index('Input information does not meet the rule!');
            return;
        }
        //check captcha
        if($this->Setting_model->get('feedback_captcha')==1)
        {
            if($input[$_SESSION['qd_contact_captcha_input_name']]!=$_SESSION['qd_contact_captcha'])
            {
                $this->index('Captcha fail!');
                return;
            }
        }
        
        //save to database
        $feedback_category = $this->Setting_model->get('feedback_category');
        $feedback_posts = $this->Post_model->get_by_cat($feedback_category,0,1,-1,1);//first post of cat
        //neu chua define feedback post
        if(sizeof($feedback_posts)<=0)
        {
            //$this->_build_common_data();
            $this->index('Contact engine is not configurated!');
            return;
        }
        
        $feedback_post_obj = $feedback_posts[0];//first post of cat
        //save comment to post
        $cmt = new Comment_model;
        $cmt->guest_name = $name;
        $cmt->guest_email = $email;
        $cmt->guest_ip = $_SERVER['REMOTE_ADDR'];
        $cmt->title = '[Contact feedbacks]';
        $cmt->content = $content;
        $cmt->post_id = $feedback_post_obj->id;
        $cmt->add();
        
        //$this->_build_common_data();
        $this->index('submit_ok');
    } 
}