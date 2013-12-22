<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Feedback extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Feedback';
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('post_id', 'special', 'cat_id'));
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
                parent::_redirect('post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
                return;
            case 1:
                break;
            case 2:
                parent::_redirect('painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
                return;
        }
        $this->_data['feedback0'] = $post_obj;
        $this->_data['special'] = $get['special'];
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['state'] = (array)$this->session->flashdata('state');
        
        parent::_add_active_menu(site_url($this->_com.'posts/index/special/'.qd_special_post_to_cat($get['special'])));
        parent::_view('feedback',$this->_data);
    }
    public function send()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('post_id', 'special', 'cat_id'));
        $get['post_id'] = $get['post_id']===false?-1:$get['post_id'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        
        
        //get post value
        $input = $this->input->post(null,true);
        $email = new Qd_email;
        $email->set_to($input['email']);
        $email->set_subject($input['subject']);
        $email->set_content($input['content']);
        	
        
        if($email->send()){
            $this->session->set_flashdata('state','send_ok');
        }
        else
        {
            $this->session->set_flashdata('state','send_fail');
        }
        parent::_redirect('feedback/index/post_id/'.$get['post_id'].'/special/'.$get['special'].'/cat_id/'.$get['cat_id']);
    }
}