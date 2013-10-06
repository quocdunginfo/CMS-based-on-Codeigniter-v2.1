<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Post extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->data['html']['title'].=' - Post';
        $this->load->model('right_template/category_tree_model','Right_template_category_tree_model');
    }
    public function index()
    {
        redirect('home');
    }
    public function detail($post_id)
    {
        if(!$this->Post_model->is_exist($post_id))
        {
            $this->index();
        }
        //$this->_build_common_data();
        $this->data['post'] = $this->Post_model->get_by_id($post_id);
        if($this->Post_model->is_exist($post_id))
        {
            $post_obj = $this->Post_model->get_by_id($post_id);
            $this->data['html']['title'].=' - '.$post_obj->title;
        }
        $this->data['category_tree'] = $this->Right_template_category_tree_model->generate(-1,0);
        
        $this->load->view('right_template/post',$this->data);
    }
}