<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Home extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->data['html']['title'].=' - Homepage';
    }
    public function index()
    {
        //get widget
        $cat_id = $this->Setting_model->get('homepage_widget_category');
        $post_list = $this->Post_model->get_by_cat_recursive($cat_id,0,-1,1,1);
        $this->data['post_widget'] = $post_list;
        //get footer widget
        $cat_id = $this->Setting_model->get('homepage_footer_widget_category');
        $post_list = $this->Post_model->get_by_cat_recursive($cat_id,0,-1,1,1);
        $this->data['post_footer_widget'] = $post_list;
        //foreach($post_list as $post) echo $post->title;
        //return;
        $this->load->view('right_template/index',$this->data);
    }
}