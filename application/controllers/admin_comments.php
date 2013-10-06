<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_comments extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        $this->_check_login();
        $this->data['html_title'] .= ' - Comments'; 
    }
    
    /**
     * Admin_posts::index()
     * Mooxi page 40 item danh sách các bài vi?t hi?n có trong h? th?ng
     * 
     * @param mixed $post_id
     * @param mixed $page (1,2,3,4,...)
     * @return void
     */
    public function index($post_id=-1, $page=1, $special=0)
    {
        //check permission
        if($this->session->userdata('comment_view')!=1)
        {
            $this->data['state']='comment_view';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $max_item_per_page = 40;
        $begin_point = ($page-1)*$max_item_per_page;
        $end_point = $begin_point+$max_item_per_page-1;
        
        $list_cmt = $this->Comment_model->get_by_post($post_id,$begin_point,$max_item_per_page,-1);
        
        $this->data['cmt_list'] = $list_cmt;
        $this->data['page_total'] = (int)($this->Comment_model->count_by_post($post_id,-1)/$max_item_per_page+1);
        $this->data['page_current'] = $page;
        $this->data['post'] = $this->Post_model->get_by_id($post_id);
        $this->data['special'] = $special;
        
        //category
        $this->load->view('admin/dashboard/comments',$this->data);
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
    public function edit($cmt_id)
    {
        redirect('admin_comment/index/'.$cmt_id);
    }
}