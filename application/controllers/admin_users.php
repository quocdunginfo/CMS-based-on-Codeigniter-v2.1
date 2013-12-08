<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_users extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Users';
        array_push($this->_data['active_menu'],'admin_users');
    }
    public function index()//page
    {
        //check permission
        if(!in_array('user_view',$this->_permission))
        {
            $this->_fail_permission('user_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(3,array('page',));
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url('admin_users/index/page/');
        //varible
        $max_item_per_page=40;
        $model = new User_model;//model access
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count()
        );
        $pagination->set_base_url(
            $base_url,
            4
        );
        
        $pagination->update();
        //echo $pagination->start_point.'-'.$pagination->max_item_per_page;
        
        $this->_data['user_list']= $model->search(-1,'','','',-1,-1,$pagination->start_point,$pagination->max_item_per_page);
        $this->_data['state']= (array)$this->session->flashdata('state');//noi khác set tru?c
        $this->_data['pagination']=$pagination;
        
        $this->load->view('admin/users',$this->_data);
    }
    public function edit($uid=0)
    {
        //check permission
        if($this->_user->id==$uid)
        {
            //ownner permission override
        }
        else if(!in_array('user_edit',$this->_permission))
        {
            $this->_fail_permission('user_edit');
            return;
        }
        redirect('admin_user/index/'.$uid);
    }
    public function delete($uid)
    {
        //check permission
        //xet permission
        if(!in_array('user_delete',$this->_permission))
        {
            $this->_fail_permission('user_delete');
            return;
        }
        //xet self delete
        if($this->_user->id==$uid)
        {
            $this->_show_notification('user_can_not_delete_byself');
            return;
        }
        //kiem tra user id can xoa co ton tai
        $obj = new User_model;
        $obj->id = $uid;
    
        if(!$obj->is_exist($uid))
        {
            $this->_show_notification('user_id_is_not_valid');
            return;
        }
        
        $this->_data['user_list'] = $this->User_model->search();
        //loai bo user can xoa khoi danh sach
        for($i=0;$i<sizeof($this->_data['user_list']);$i++)
        {
            if($this->_data['user_list'][$i]->id==$uid)
            {
                unset($this->_data['user_list'][$i]);
            }
        }
        
        $this->_data['user0'] = $this->User_model->get_by_id($uid);
        $this->load->view('user_delete',$this->_data);
    }
    public function add()
    {
        //check permission
        if(!in_array('user_add',$this->_permission))
        {
            $this->_fail_permission('user_add');
            return;
        }
        redirect('admin_user/index/0');
    }
}