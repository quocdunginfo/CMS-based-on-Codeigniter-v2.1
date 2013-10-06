<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Category extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('right_template/navigation_model','Right_template_navigation_model');
        $this->load->model('right_template/category_tree_model','Right_template_category_tree_model');
        $this->data['html']['title'].=' - Category';
    }
    public function index($cat_id=-1, $page=1)
    {
        $this->view($cat_id,$page);
    }
    public function view($cat_id=-1, $page=1)
    {
        //neu category là painting thì forward qua bên kia
        if($cat_id!=-1)
        {
            if($this->Cat_model->get_by_id($cat_id)->special==2 || $this->Cat_model->get_by_id($cat_id)->special==3)
            {
                redirect('painting_category/view/'.$cat_id.'/'.$page.'/'.$this->Cat_model->get_by_id($cat_id)->title_for_url.'#painting_view');
                return;
            }
        }
        
        $max_item_per_page = $this->Setting_model->get('maximum_item_per_page');
        $begin_point = ($page-1)*$max_item_per_page;
        
        //$this->_build_common_data();
        //$this->data['page_total'] = (int)($this->Post_model->count_by_cat_recursive($cat_id,1,0)/$max_item_per_page+1);
        $page_total = (int)($this->Post_model->count_by_cat_recursive($cat_id,1,0)/$max_item_per_page+1);
        
        $post_list = $this->Post_model->get_by_cat_recursive($cat_id,$begin_point,$max_item_per_page,1,0);
        //truncate content
        $max_content_lenght = $this->Setting_model->get('maximum_preview_post_content');
        $max_title_lenght = $this->Setting_model->get('maximum_preview_post_title');
        foreach($post_list as $post)
        {
            $post->title = qd_html_truncate($post->title,$max_title_lenght);
            $post->content = qd_html_truncate($post->content,$max_content_lenght);
        }
        
        $this->data['post_list'] = $post_list;
        $this->data['navigation'] = $this->Right_template_navigation_model->generate(site_url('category/index/'.$cat_id),$page,$page_total);
        $this->data['category_tree'] = $this->Right_template_category_tree_model->generate(-1,0,'category/index/',array(0=>$cat_id));
        $this->data['cat_id'] = $cat_id;
        if($this->Cat_model->is_exist($cat_id))
        {
            $cat_obj = $this->Cat_model->get_by_id($cat_id);
            $this->data['html']['title'].=' - '.$cat_obj->name;
        }
        
        
        $this->load->view('right_template/category',$this->data);
    }
}