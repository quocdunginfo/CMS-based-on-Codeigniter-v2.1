<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_posts extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'] .= ' - Posts';
        
    }
    public function index_()
    {
        parent::_add_active_menu(site_url('admin_posts/index_'));
        self::index();
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
        $get = $this->uri->uri_to_assoc(3,array('cat_id', 'special', 'page','view_mode'));
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['page'] = $get['page']===false?1:$get['page'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        $base_url = site_url('admin_posts/index/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/view_mode/'.$get['view_mode'].'/page/');
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
            $post_model->search_count('','','',-1,$get['special'],$cat_list,true)
        );
        $pagination->set_base_url(
            $base_url,
            10
        );
        
        $pagination->update();
        
        //get posts
        $post_model->special = $get['special'];
        
        $list_post = $post_model->search('','','',-1,$get['special'],$cat_list,true,-1,"post.id","desc",$pagination->start_point,$pagination->max_item_per_page);
        
        
        //prepare view
        $this->_data['list_post'] = $list_post;
        $this->_data['view_mode'] = $get['view_mode'];
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['special'] = $get['special'];
        $this->_data['pagination'] = $pagination;
        $this->_data['state'] = (array)$this->session->flashdata('state');
        $this->_data['fk_delete_fail_id'] = (int)$this->session->flashdata('fk_delete_fail_id');
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,$get['special']);
        
        parent::_add_active_menu(site_url('admin_posts/index/special/'.$get['special']));
        //load view
        $this->load->view('admin/posts',$this->_data);
    }
    public function delete()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('post_id', 'special', 'page', 'cat_id', 'view_mode'));
        $get['post_id'] = $get['post_id']===false?0:$get['post_id'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['page'] = $get['page']===false?1:$get['page'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        //validate
        if(!$this->Post_model->is_exist($get['post_id']))
        {
            $this->_show_notification('post_id_is_invalid');
            return;    
        }
        $obj = $this->Post_model->get_by_id($get['post_id']);
        //owner permission override
        if($obj->get_user_obj()!=null && $this->_user->id==$obj->get_user_obj()->id)
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
        //quan trong, dang tim cach hay hon de khac phuc
        if($obj->special==2)//painting
        {
            $tmp = 0;
            if(($tmp = $this->Painting_post_model->delete($obj->id)) >0)
            {
                $this->session->set_flashdata('fk_delete_fail_id', $tmp);
                $this->session->set_flashdata('state', array('fk_delete_fail'));
            }
        }
        else
        {
            if(!$obj->delete())
            {
                $this->session->set_flashdata('state', array('fk_delete_fail'));
            }
        }   
        
        redirect('admin_posts/index/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/page/'.$get['page'].'/view_mode/'.$get['view_mode']);//OK
    }
    public function add()//special
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        redirect('admin_post/index/post_id/0/special/'.$get['special'].'/cat_id/'.$get['cat_id']);
    }
    public function edit()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('special'));
        $get['post_id'] = $get['post_id']===false?0:$get['post_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id'];
        
        redirect('admin_post/index/post_id/'.$get['post_id'].'/special/'.$get['special'].'/cat_id/'.$get['cat_id']);
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