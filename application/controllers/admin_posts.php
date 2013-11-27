<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_posts extends Admin {
    public function __construct()
    {
        parent::__construct();
        if($this->_user==null)
        {
            redirect('admin');
            return;
        }
        $this->_data['html_title'] .= ' - Posts';
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
        $get['cat_id'] = $get['page']===false?-1:$get['cat_id'];
        $get['special'] = $get['page']===false?0:$get['special'];
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url('admin_posts/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/page/');
        //varible
        $max_item_per_page=2;
        $cat_list = null;//mặc định là tìm trong tất cả
        if($get['cat_id']>-1)
        {
            $cat_list = array($get['cat_id']);//có tìm kiếm theo cat_id
        }
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $this->Post_model->search_count("","","",-1,$get['special'],$cat_list,true)
        );
        $pagination->set_base_url(
            site_url('admin_posts/index/cat_id/'.$get['cat_id'].'/special/'.$get['special'].'/page/'),
            8
        );
        
        $pagination->update();
        //get posts
        $list_post = $this->Post_model->search("","","",-1,$get['special'],$cat_list,true,-1,"post.id","desc",$pagination->start_point,$pagination->max_item_per_page);
        
        
        //prepare view
        $this->_data['list_post'] = $list_post;
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['special'] = $get['special'];
        $this->_data['pagination'] = $pagination;
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,$get['special']);
        //load view
        $this->load->view('admin/posts',$this->_data);
    }
    public function delete($post_id, $cat_id=-1, $page=1, $special=0)
    {
        //validate
        if(!$this->Post_model->is_exist($post_id))
        {
            $this->_data['state'] = 'post_id_is_invalid';
            $this->load->view($this->avp.'view_fail',$this->_data);
            return;    
        }
        
        
        //owner permission override
        if($this->session->userdata('user_id')==$this->Post_model->get_by_id($post_id)->user_id)
        {
            
        }
        else
        //check permission
        if($this->session->userdata('post_delete')!=1)
        {
            $this->_data['state']='post_delete';
            $this->load->view('admin/view_fail',$this->_data);
            return;
        }

        $this->Post_model->delete($post_id);
        //redirect('admin_posts');
        $this->index($cat_id,$page,$special);
    }
    public function delete_multi($post_id)
    {
        $var = new Post_model;
        $var->id = $post_id;
        $this->Post_model->delete();
    }
    public function activate($post_id_array)
    {
        
    }
    public function search($page=1, $special=2)
    {
        //check permission
        if($this->session->userdata('post_view')!=1)
        {
            $this->_data['state']='post_view';
            $this->load->view('admin/view_fail',$this->_data);
            return;
        }
        
        
        $max_item_per_page = 40;
        $begin_point = ($page-1)*$max_item_per_page;
        $end_point = $begin_point+$max_item_per_page-1;
        
        //get from cookies
        $art_id = $this->session->userdata('s_art_id');
        $title = $this->session->userdata('s_title');
        
        $post_list = $this->Painting_post_model->search($title,'',$art_id,-1,-1,-1,$begin_point,$max_item_per_page,-1,$special);
        
        $this->_data['list_post'] = $post_list;
        $this->_data['page_total'] = (int)($this->Painting_post_model->search_count($title,'',$art_id,-1,-1,-1,-1,$special)/$max_item_per_page+1);
        $this->_data['page_current'] = $page;
        $this->_data['cat_id'] = -1;
        $this->_data['special'] = $special;
        $this->_data['s_title']=$title;
        $this->_data['s_art_id']=$art_id;
        
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree_object(-1,0,$special);
        $this->load->view('admin/posts_search',$this->_data);
    }
    public function add($special=0)
    {
        redirect('admin_post/index/0/null/'.$special);
        //$this->index(0);
    }
    public function edit($post_id)
    {
        redirect('admin_post/index/'.$post_id);
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