<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Painting_category extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('right_template/navigation_model','Right_template_navigation_model');
        $this->load->model('right_template/category_tree_model','Right_template_category_tree_model');
        $this->data['html']['title'].=' - Painting category';
        
    }
    public function index($cat_id=-1, $page=1)
    {
        $this->view($cat_id,$page);
    }
    public function view($cat_id=-1, $page=1)
    {
        $max_item_per_page = $this->Setting_model->get('maximum_item_per_page');
        $begin_point = ($page-1)*$max_item_per_page;
        
        //$this->_build_common_data();
        $page_total = (int)($this->Painting_post_model->count_by_cat_recursive($cat_id,1,2)/$max_item_per_page+1);
        //$this->data['page_current'] = $page;
        
        
        $post_list = $this->Painting_post_model->get_by_cat_recursive($cat_id,$begin_point,$max_item_per_page,1,2);
        //truncate content
        $max_title_lenght = $this->Setting_model->get('maximum_preview_post_title');
        foreach($post_list as $post)
        {
            $post->title = qd_html_truncate($post->title,$max_title_lenght);
        }
        
        $this->data['painting_post_list'] = $post_list;
        $this->data['painting_category_tree'] = $this->Right_template_category_tree_model->generate(-1,2,'painting_category/index/',array(0=>$cat_id));
        $this->data['material_category_tree'] = $this->Right_template_category_tree_model->generate(-1,3,'painting_category/index/',array(0=>$cat_id));
        $this->data['navigation'] = $this->Right_template_navigation_model->generate(site_url('painting_category/index/'.$cat_id),$page,$page_total);
        
        $this->data['cat_id'] = $cat_id;
        
        if($this->Cat_model->is_exist($cat_id))
        {
            $cat_obj = $this->Cat_model->get_by_id($cat_id);
            $this->data['html']['title'].=' - '.$cat_obj->name;
        }
        
        $this->load->view('right_template/painting_category',$this->data);
    }
}