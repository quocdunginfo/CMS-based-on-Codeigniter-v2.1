<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_user extends Admin {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - User';
        array_push($this->_data['active_menu'],'admin_users');
    }
    public function index($uid=0)
    {
        //check permission
        if(!in_array('user_view',$this->_permission))
        {
            $this->_fail_permission('user_view');
            return;
        }
        if($uid==0)
        {
            //add mode
            //check permission
            if(!in_array('user_add',$this->_permission))
            {
                $this->_fail_permission('user_add');
                return;
            }
            
            $this->_data['state'] = array();
            $this->_data['user0'] = new User_model;
            $this->_data['group_list'] = $this->Group_model->search();
            $this->load->view('admin/user',$this->_data);
            return;
        }
        //edit mode
        $this->_data['state']= (array)$this->_temp;
        $this->_data['user0'] = $this->User_model->get_by_id($uid);
        $this->_data['group_list'] = $this->Group_model->search();
        $this->load->view('admin/user',$this->_data);
    }
    public function delete()
    {
        $input = $this->input->post(NULL, TRUE);
        //check permission
        //xet permission
        if(!in_array('user_delete',$this->_permission))
            {
                $this->_fail_permission('user_delete');
                return;
            }
        //xet self delete
        if($this->_user->id==$input['user_id'])
        {
            $this->_show_notification('user_can_not_delete_byself');
            return;
        }
        //kiem tra user id can xoa co ton tai
        if(!$this->User_model->is_exist($input['user_id']) || !$this->User_model->is_exist($input['user_tranfer_id']))
        {
            $this->_show_notification('user_id_is_not_valid');
            return;
        }
        
        $this->User_model->delete($input['user_id'],$input['user_tranfer_id']);
        $this->_data['state'] = 'delete_ok';
        redirect('admin_users/index/1/delete_ok');
    }
    public function edit()
    {
        //get all data
        $input = $this->input->post(NULL, TRUE);
        $input['user_active'] = $this->input->post('user_active')=='1'?'1':'0';//prevent XSS filter
        
        //check permission
        if($this->_user->id==$input['user_id'])
        {
            //xet owner permission
        }
        //xet global permission
        else if(!in_array('user_edit',$this->_permission))
        {
            $this->_fail_permission('user_edit');
            return;
        }
        
        
        //xet update hay add
        if($input['user_id']==0)
        {
            //add mode
            $user = new User_model;
            //set data
            $user->username = $input['user_username'];
            $user->fullname = $input['user_fullname'];
            $user->email = $input['user_email'];
            
            if($input['user_password']!=$input['user_repassword'])
            {
                //password khong trung
                $this->_temp = array('password_fail');
                self::index(0);
                return;
            }
            $user->set_password($input['user_password']);
            $user->set_group_obj($this->Group_model->get_by_id($input['user_groupid']));
            $user->active = $input['user_active'];
            
            $user->add();
            $this->_temp = array('add_ok');
            $this->index($user->id);
        }
        else
        {
            //update mode
            //xet uid co ton tai
            if(!$this->User_model->is_exist($input['user_id']))
            {
                $this->_show_notification('user_id_is_not_valid');
                return;
            }
            //load current info
            $user = $this->User_model->get_by_id($input['user_id']);
            
            
            if(!isset($input['user_groupid'])) $input['user_groupid']=$user->group_id;
            
            //set data
            $user->username = $input['user_username'];
            $user->fullname = $input['user_fullname'];
            $user->email = $input['user_email'];
            
            if($input['user_password']!=$input['user_repassword'])
            {
                //password khong trung
                $this->_temp = array('password_fail');
                $this->index($input['user_id']);
                return;
            }
            
            $user->set_password($input['user_password']);
            
            
            //n?u dang s?a chính mình
            if($this->_user->id==$input['user_id'])
                {
                    //neu co su thay doi ACTIVE va GROUPID
                    if($input['user_active']!=$user->active || $input['user_groupid']!=$user->get_group_obj()->id)
                    {
                        //ban than khong the deactivate hoac set minh thanh permission khac dc
                        $this->_show_notification('user_can_not_deactivate_or_change_permission_by_self');
                        return;
                    }
                }
                else
                {
                    $user->active = $input['user_active'];
                    $user->set_group_obj($this->Group_model->get_by_id($input['user_groupid']));
                }
            
            //call update
            $user->update();
            //load view
            $this->_temp = array('edit_ok');
            self::index($input['user_id']);
        }
    }
    
}