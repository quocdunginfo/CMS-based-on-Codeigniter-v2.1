<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class User extends Home {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - User';
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special','id'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['id'] = $get['id']===false?0:$get['id'];
        //check permission
        if(!in_array('user_view',$this->_permission))
        {
            $this->_fail_permission('user_view');
            return;
        }
        if($get['id']==0)
        {
            //add mode
            //check permission
            if(!in_array('user_add',$this->_permission))
            {
                $this->_fail_permission('user_add');
                return;
            }
            
            $this->_data['state'] = array();
            $obj = new User_model;
            $obj->special = $get['special'];
            $this->_data['user0'] = $obj;
            $this->_data['special'] = $get['special'];
            $this->_data['group_list'] = $this->Group_model->search();
            parent::_view('user',$this->_data);
            return;
        }
        //edit mode
        $this->_data['state']= (array)$this->session->flashdata('state');
        $this->_data['user0'] = $this->User_model->get_by_id($get['id']);
        $this->_data['special'] = $get['special'];
        $this->_data['group_list'] = $this->Group_model->search();
        
        parent::_add_active_menu(site_url($this->_com.'users/index/special/'.$get['special']));
        parent::_view('user',$this->_data);
    }
    public function delete()
    {
        //get param
            $get = $this->uri->uri_to_assoc(4,array('special'));
            $get['special'] = $get['special']===false?0:$get['special'];
        //post value
            $input = $this->input->post(NULL, TRUE);
        //check permission
            if(!in_array('user_delete',$this->_permission))
            {
                $this->_fail_permission('user_delete');
                return;
            }
        //
        $obj = new User_model;
        $obj->id = $input['user_id'];
        $obj->load();
            //var_dump($input);
            //return;
        $obj_t = new User_model;
        $obj_t->id = $input['user_transfer_id'];
        $obj_t->load();
        //xet self delete
            if($this->_user->id==$obj->id)
            {
                $this->_show_notification('user_can_not_delete_byself');
                return;
            }
        //kiem tra user id can xoa co ton tai
            if(!$obj->is_exist() || !$obj_t->is_exist())
            {
                $this->_show_notification('user_id_is_not_valid');
                return;
            }
        //call
        $this->User_model->delete($obj->id,$obj_t->id);
        parent::_redirect('users/index/special/'.$obj->special);
    }
    public function edit()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
        
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
            $user->phone = $input['user_phone'];
            $user->address = $input['user_address'];
            
            $validate=$user->validate($input['user_password'], $input['user_repassword']);
            if(sizeof($validate)>0)
            {
                //show error
                $this->_data['state']= $validate;
                $this->_data['user0'] = $user;
                $this->_data['group_list'] = $this->Group_model->search();
                $this->_data['special'] = $get['special'];
                parent::_view('user',$this->_data);
                return;
            }
            
            $user->set_password($input['user_password']);
            $user->set_group_obj($this->Group_model->get_by_id($input['user_groupid']));
            $user->active = $input['user_active'];
            
            $user->add();
            $this->session->set_flashdata('state',array('add_ok'));
            parent::_redirect('user/index/special/'.$get['special'].'/id/'.$user->id);
            return;
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
            $user->phone = $input['user_phone'];
            $user->address = $input['user_address'];
            
            $validate=$user->validate($input['user_password'], $input['user_repassword']);
            if(sizeof($validate)>0)
            {
                //show error
                $this->_data['state']= $validate;
                $this->_data['user0'] = $user;
                $this->_data['group_list'] = $this->Group_model->search();
                $this->_data['special'] = $get['special'];
                parent::_view('user',$this->_data);
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
            $this->session->set_flashdata('state', array('edit_ok'));
            parent::_redirect('user/index/special/'.$get['special'].'/id/'.$user->id);
            return;
        }
    }
    
}