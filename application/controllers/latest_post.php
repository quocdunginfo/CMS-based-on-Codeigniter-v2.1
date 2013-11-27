<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Latest_post extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('right_template/navigation_model','Right_template_navigation_model');
        $this->load->model('right_template/category_tree_model','Right_template_category_tree_model');
        $this->data['html']['title'].=' - Latest posts';

    }
    public function index($page=1)
    {
        $this->view($page);
    }
    public function view($page=1)
    {
        $max_item_per_page = $this->Setting_model->get('maximum_item_per_page');
        $begin_point = ($page-1)*$max_item_per_page;
        $end_point = $begin_point+$max_item_per_page-1;
        
        $cat_id = $this->Setting_model->get('menu_latest_category');
        
        //$this->_build_common_data();
        $page_total = (int)($this->Post_model->count_by_cat($cat_id,0)/$max_item_per_page+1);
        $this->data['page_current'] = $page;

        $post_list = $this->Post_model->get_by_cat($cat_id,$begin_point,$max_item_per_page,1,0);
        $this->data['post_list'] = $post_list;
        $this->data['navigation'] = $this->Right_template_navigation_model->generate(site_url('category/index/'.$cat_id),$page,$page_total);
        $this->data['category_tree'] = $this->Right_template_category_tree_model->generate(-1,0);
        $this->data['cat_id'] = $cat_id;
        $this->load->view('right_template/category',$this->data);
    }
}