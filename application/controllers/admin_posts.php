<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_posts extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('user_logged_in')!=1)
        {
            redirect('admin');
            return;
        }
        
        $this->data['html_title'] .= ' - Posts';
    }
    
    /**
     * Admin_posts::index()
     * Mooxi page 40 item danh sách các bài vi?t hi?n có trong h? th?ng
     * 
     * @param mixed $cat_id
     * @param mixed $page (1,2,3,4,...)
     * @return void
     */
    public function index($cat_id=-1, $page=1, $special=0)
    {
        //check permission
        if($this->session->userdata('post_view')!=1)
        {
            $this->data['state']='post_view';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        
        $max_item_per_page = 40;
        $begin_point = ($page-1)*$max_item_per_page;
        $end_point = $begin_point+$max_item_per_page-1;
        
        //$post_model = new Post_model;
        $list_post = $this->Post_model->search("","","",-1,$special,array(),true,-1,"post.id","desc",$begin_point,$max_item_per_page);
        
        $this->data['list_post'] = $list_post;
        $this->data['page_total'] = sizeof($this->Post_model->search("","","",-1,$special,array(),true,-1,"post.id","desc"));
        $this->data['page_current'] = $page;
        $this->data['cat_id'] = $cat_id;
        $this->data['special'] = $special;
        
        $this->data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,$special);
        
        //category
        $this->load->view('admin/dashboard/posts',$this->data);
    }
    public function delete($post_id, $cat_id=-1, $page=1, $special=0)
    {
        //validate
        if(!$this->Post_model->is_exist($post_id))
        {
            $this->data['state'] = 'post_id_is_invalid';
            $this->load->view($this->avp.'view_fail',$this->data);
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
            $this->data['state']='post_delete';
            $this->load->view('admin/dashboard/view_fail',$this->data);
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
            $this->data['state']='post_view';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        
        $max_item_per_page = 40;
        $begin_point = ($page-1)*$max_item_per_page;
        $end_point = $begin_point+$max_item_per_page-1;
        
        //get from cookies
        $art_id = $this->session->userdata('s_art_id');
        $title = $this->session->userdata('s_title');
        
        $post_list = $this->Painting_post_model->search($title,'',$art_id,-1,-1,-1,$begin_point,$max_item_per_page,-1,$special);
        $this->data['list_post'] = $post_list;
        $this->data['page_total'] = (int)($this->Painting_post_model->search_count($title,'',$art_id,-1,-1,-1,-1,$special)/$max_item_per_page+1);
        $this->data['page_current'] = $page;
        $this->data['cat_id'] = -1;
        $this->data['special'] = $special;
        $this->data['s_title']=$title;
        $this->data['s_art_id']=$art_id;
        
        $this->data['cat_list'] = $this->Cat_model->get_cat_tree_object(-1,0,$special);
        $this->load->view('admin/dashboard/posts_search',$this->data);
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