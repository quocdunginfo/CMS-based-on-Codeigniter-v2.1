<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_posts extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'] .= ' - Posts';
        $this->_data['active_menu'] = array('admin_posts');
    }
    
    public function index()//cat_id, special, page URI
    {
        //check permision
        if(!in_array('post_view',$this->_permission))
        {
            self::_fail_permission('post_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(3,array('cat_id', 'special', 'page'));
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url('admin_posts/index/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/page/');
        //varible
        $max_item_per_page=10;
        $cat_list = null;//mặc định là tìm trong tất cả
        if($get['cat_id']>-1)
        {
            $cat_list = array($get['cat_id']);//có tìm kiếm theo cat_id
        }
        
        $post_model = new Post_model;//model access
        $post_model->special = $get['special'];//must set
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $post_model->search_count("","","",-1,$get['special'],$cat_list,true)
        );
        $pagination->set_base_url(
            $base_url,
            8
        );
        
        $pagination->update();
        
        //get posts
        $post_model->special = $get['special'];
        
        $list_post = $post_model->search("","","",-1,$get['special'],$cat_list,true,-1,"post.id","desc",$pagination->start_point,$pagination->max_item_per_page);
        
        
        //prepare view
        $this->_data['list_post'] = $list_post;
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['special'] = $get['special'];
        $this->_data['pagination'] = $pagination;
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,$get['special']);
        //load view
        $this->load->view('admin/posts',$this->_data);
    }
    public function delete()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('post_id', 'special', 'page', 'cat_id'));
        $get['post_id'] = $get['post_id']===false?0:$get['post_id'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['page'] = $get['page']===false?1:$get['page'];
        //validate
        if(!$this->Post_model->is_exist($get['post_id']))
        {
            $this->_show_notification('post_id_is_invalid');
            return;    
        }
        
        //owner permission override
        if($this->_user->id==$this->Post_model->get_by_id($get['post_id'])->user_id)
        {
            //override
        }
        else
        //check permission
        if(!in_array('post_delete',$this->_permission))
        {
            self::_fail_permission('post_delete');
            return;
        }

        $this->Post_model->delete($get['post_id']);
        
        redirect('admin_posts/index/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/page/'.$get['page']);
    }
    public function add()//special
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
        switch($get['special'])
        {
            case 0:
                redirect('admin_post/index/post_id/0/special/'.$get['special']);
                break;
            case 1:
                redirect('admin_post/index/post_id/0/special/'.$get['special']);
                break;
            case 2:
                redirect('admin_painting_post/index/post_id/0/special/'.$get['special']);
                break;
        }
    }
    public function edit($post_id)
    {
        redirect('admin_post/index/post_id/'.$post_id);
    }
    public function search_submit()
    {
        $input = $this->input->post(null,true);
        //cap nhat vo cookie
        $newdata = array(
                   's_art_id'  => $input['s_art_id'],
                   's_title'  => $input['s_title']
               );
            
        $this->session->set_userdata($newdata);
        self::search(1,2);
    }
}