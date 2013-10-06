<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class About extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->data['html']['title'].=' - About';
    }
    public function index()
    {
        $cat_id = $this->Setting_model->get('menu_about_category');
        $post_list = $this->Post_model->get_by_cat($cat_id,0,1,1,1);
        $this->data['post'] = $post_list[0];
        if($this->Post_model->is_exist($post_list[0]->id))
        {
            $post_obj = $this->Post_model->get_by_id($post_list[0]->id);
            $this->data['html']['title'].=' - '.$post_obj->title;
        }
        
        $this->load->view('right_template/about',$this->data);
    }
}