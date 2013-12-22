<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Users extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Users';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'users/index_'));
        self::index();
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
        $get = $this->uri->uri_to_assoc(4,array('page','special'));
        $get['page'] = $get['page']===false?1:$get['page'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $base_url = site_url($this->_com.'users/index/special/'.$get['special'].'/page/');
        //varible
        $max_item_per_page=40;
        $model = new User_model;//model access
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count(-1,'','','',-1,-1,$get['special'])
        );
        $pagination->set_base_url(
            $base_url,
            7
        );
        
        $pagination->update();
        //echo $pagination->start_point.'-'.$pagination->max_item_per_page;
        
        $this->_data['user_list']= $model->search(-1,'','','',-1,-1,$get['special'],$pagination->start_point,$pagination->max_item_per_page);
        $this->_data['state']= (array)$this->session->flashdata('state');//noi khác set tru?c
        $this->_data['pagination']=$pagination;
        $this->_data['special'] = $get['special'];
        
        parent::_add_active_menu(site_url($this->_com.'users/index/special/'.$get['special']));
        parent::_view('users',$this->_data);
    }
    public function edit()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special','id'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['id'] = $get['id']===false?0:$get['id'];
        //check permission
        if($this->_user->id==$get['id'])
        {
            //ownner permission override
        }
        else if(!in_array('user_edit',$this->_permission))
        {
            $this->_fail_permission('user_edit');
            return;
        }
        parent::_redirect('user/index/special/'.$get['special'].'/id/'.$get['id']);
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
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
        //check permission
        if(!in_array('user_add',$this->_permission))
        {
            $this->_fail_permission('user_add');
            return;
        }
        parent::_redirect('user/index/special/'.$get['special'].'/id/0');
    }
}