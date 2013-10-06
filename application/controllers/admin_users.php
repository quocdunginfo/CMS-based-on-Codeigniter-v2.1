<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_users extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('User_model');
        //$this->load->model('Post_model');
        //$this->load->model('Cat_model');
        $this->load->library('session');
        $this->load->helper('url');
        
        if($this->session->userdata('user_logged_in')!=1)
        {
            redirect('admin');
            return;
        }
        
        $this->data['html_title'].=' - Users';
    }
    public function index($page=1,$state='null')
    {
        //check permission
        if($this->session->userdata('user_view')!=1)
        {
            $this->data['state']='user_view';
            
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $max_item_per_page = 40;
        
        
        $this->data['user_list']= $this->User_model->get_all_user();
        $this->data['state']= $state;
        $this->data['page_total'] = (int)($this->User_model->count_all_user()/$max_item_per_page+1);
        $this->data['page_current'] = $page;
        
        $this->load->view('admin/dashboard/users',$this->data);
    }
    public function edit($uid)
    {
        //check permission
        if($this->session->userdata('user_id')==$uid)
        {
            
        }
        elseif($this->session->userdata('user_edit')!=1)
        {
            $this->data['state'] = 'user_edit';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        redirect($thiss->acp.'admin_user/index/'.$uid);
    }
    public function delete($uid)
    {
        //check permission
        //xet permission
        if($this->session->userdata['user_delete']!=1)
        {
            $this->data['state']='user_delete';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        //xet self delete
        if($this->session->userdata['user_id']==$uid)
        {
            $this->data['state']='user_can_not_delete_byself';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        //kiem tra user id can xoa co ton tai
        if(!$this->User_model->is_exist($uid) || !$this->User_model->is_exist($uid))
        {
            $this->data['state']='user_id_is_not_valid';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        
        $this->data['user_list'] = $this->User_model->get_all_user();
        //loai bo user can xoa khoi danh sach
        for($i=0;$i<sizeof($this->data['user_list']);$i++)
        {
            if($this->data['user_list'][$i]->id==$uid)
            {
                unset($this->data['user_list'][$i]);
            }
        }
        
        $this->data['user0'] = $this->User_model->get_by_id($uid);
        $this->load->view($this->avp.'user_delete',$this->data);
    }
    public function add()
    {
        //check permission
        if($this->session->userdata['user_add']!=1)
        {
            $this->data['state']='user_delete';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        redirect('admin_user/index/0');
    }
}