<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/blog/home.php');
class Posts extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Posts';
        parent::_add_active_menu(site_url('blog/posts/category/alias'));
        //parent::_add_active_menu(site_url('blog/home'));
    }
    public function index()
    {
        redirect('blog/posts/category');
    }
    public function category()//id,page
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('id','page'));
        $get['id'] = $get['id']===false?-1:$get['id'];
        $get['page'] = $get['page']===false?1:$get['page'];
        //varible
        $model_cat = new Cat_model;
        $model = new Post_model;
        
        $cat_array = null;
        if($model_cat->is_exist($get['id']))
        {
            $cat_array = array($get['id']);
        }
        $max_item_per_page = 5;
        
        $base_url = site_url('blog/posts/category/id/'.$get['id'].'/page/');
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count(
            '','','',1,$model->special,$cat_array,true
            )
        );
        $pagination->set_base_url(
            $base_url,
            7
        );
        
        $pagination->update();
        //get objs
        
        $list = $model->search(
        '','','',1,$model->special,$cat_array,true,-1,'post.id','desc'          ,$pagination->start_point,
        $pagination->max_item_per_page
        );
        
        //view data
        $this->_data['post_list'] = $list;
        $this->_data['post_cat'] = $this->Cat_model->get_by_id($get['id']);
        $this->_data['pagination'] = $pagination;
        //load view
        parent::_add_active_menu(site_url('blog/posts/category/id/'.$get['id']));
        parent::_view('posts',$this->_data);
    }
}