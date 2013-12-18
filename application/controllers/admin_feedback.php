<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_feedback extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Feedback';
        array_push($this->_data['active_menu'],'admin_posts','admin_feedbacks');
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('post_id', 'special', 'cat_id'));
        $get['post_id'] = $get['post_id']===false?-1:$get['post_id'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        
        //check permission
        if(!in_array('post_view',$this->_permission))
        {
            self::_fail_permission('post_view');
            return;
        }
        $post_obj = new Feedback_model;
        $post_obj->id = $get['post_id'];
        $post_obj->load();
              
        $this->_data['html_title'].=' - '.$post_obj->get_title();
        //redirect base on special
        switch ($post_obj->special)
        {
            case 0:
                redirect('admin_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
                return;
            case 1:
                break;
            case 2:
                redirect('admin_painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
                return;
        }
        $this->_data['feedback0'] = $post_obj;
        $this->_data['special'] = $get['special'];
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['state'] = (array)$this->session->flashdata('state');
        $this->load->view('admin/feedback',$this->_data);
    }
    public function send()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('post_id', 'special', 'cat_id'));
        $get['post_id'] = $get['post_id']===false?-1:$get['post_id'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        
        
        //get post value
        $input = $this->input->post(null,true);
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'quocdunginfo@gmail.com',
            'smtp_pass' => '*********',
            'mailtype' => 'html',
            'newline' =>'\r\n',
            'starttls'  => true
        );
        $this->email->initialize($config);
        
        $this->email->from('quocdunginfo@gmail.com', 'Nguyen Dung');
        $this->email->to($input['email']); 
        
        $this->email->subject($input['subject']);
        $this->email->message($input['content']);	
        
        if($this->email->send()){
            $this->session->set_flashdata('state','send_ok');
        }
        else
        {
            $this->session->set_flashdata('state','send_fail');
        }
        
        redirect('admin_feedback/index/post_id/'.$get['post_id'].'/special/'.$get['special'].'/cat_id/'.$get['cat_id']);
    }
}