<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_user extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        
        $this->_check_login();
        
        $this->data['html_title'].=' - User';
    }
    public function index($u_id,$state='null')
    {
        //check permission
        if($this->session->userdata('user_view')!=1)
        {
            $this->data['state']='user_view';
            
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        if($u_id==0)
        {
            //add mode
            //check permission
            if($this->session->userdata('user_add')!=1)
            {
                $this->data['state']='user_add';
                $this->load->view($this->avp.'view_fail',$this->data);
                return;
            }
            
            $this->data['state'] = $state;
            $this->data['user0'] = new User_model;
            $this->load->view($this->avp.'user',$this->data);
            return;
        }
        $this->data['state']=$state;
        $this->data['user0'] = $this->User_model->get_by_id($u_id);
        $this->load->view($this->avp.'user',$this->data);
    }
    public function delete()
    {
        $input = $this->input->post(NULL, TRUE);
        //check permission
        //xet permission
        if($this->session->userdata['user_delete']!=1)
        {
            $this->data['state']='user_delete';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        //xet self delete
        if($this->session->userdata['user_id']==$input['user_id'])
        {
            $this->data['state']='user_can_not_delete_byself';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        //kiem tra user id can xoa co ton tai
        if(!$this->User_model->is_exist($input['user_id']) || !$this->User_model->is_exist($input['user_tranfer_id']))
        {
            $this->data['state']='user_id_is_not_valid';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        
        $this->User_model->delete($input['user_id'],$input['user_tranfer_id']);
        $this->data['state'] = 'delete_ok';
        redirect('admin_users/index/1/delete_ok');
    }
    public function edit()
    {
        //get all data
        $input = $this->input->post(NULL, TRUE);
        $input['user_active'] = $this->input->post('user_active')=='1'?'1':'0';//prevent XSS filter
        $input['user_groupid'] = $this->input->post('user_groupid')=='1'?'1':'0';//prevent XSS filter
        
        //check permission
        //xet owner permission
        if($this->session->userdata['user_id']==$input['user_id'])
        {
            
        }
        //xet global permission
        elseif($this->session->userdata('user_edit')!=1)
        {
            $this->data['state']='user_edit';
            
            $this->load->view($this->avp.'view_fail',$this->data);
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
                $this->index(0,'password_fail');
                return;
            }
            $user->password = $input['user_password'];
            $user->groupid = $input['user_groupid'];
            $user->active = $input['user_active'];
            
            $user->add();
            $this->index($user->id,'add_ok');
        }
        else
        {
            //update mode
            //xet uid co ton tai
            if(!$this->User_model->is_exist($input['user_id']))
            {
                
                $this->data['state']='user_id_is_not_valid';
                $this->load->view($this->avp.'view_fail',$this->data);
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
                $this->index($input['user_id'],'password_fail');
                return;
            }
            
            $user->password = $input['user_password'];
            
            
            //admin can modyfiy some things
            if($this->User_model->get_group_id($this->session->userdata('user_id'))==0)
            {
                if($this->session->userdata('user_id')==$input['user_id'])
                {
                    //neu co su thay doi ACTIVE va GROUPID
                    if($input['user_active']!=$user->active || $input['user_groupid']!=$user->group_id)
                    {
                        //ban than khong the deactivate hoac set minh thanh permission khac dc
                        $this->data['state'] = 'user_can_not_deactivate_or_change_permission_by_self';
                        $this->load->view($this->avp.'view_fail',$this->data);
                        return;
                    }
                }
                else
                {
                    $user->active = $input['user_active'];
                    $user->group_id = $input['user_groupid'];
                }
            }
            
            //call update
            $user->update();
            //load view
            $this->index($input['user_id'],'update_ok');
        }
    }
    
}