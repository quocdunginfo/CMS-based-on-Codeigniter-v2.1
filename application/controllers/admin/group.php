<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Group extends Home {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - Group';
    }
    public function index($id)//group_id
    {
        //check permission
        if(!in_array('group_view',$this->_permission))
        {
            $this->_fail_permission('group_view');
            return;
        }
        
        
        //check permission
        if(!in_array('group_view',$this->_permission))
        {
            $this->_fail_permission('group_view');
            return;
        }
        //check exist
        if($id>0 && !$this->Group_model->is_exist($id))
        {
            parent::_redirect('groups');
            return;
        }
        
        //view data
        $this->_data['state']= (array)$this->session->flashdata('state');
        $obj = new Group_model;
        $obj->id = $id;
        $obj->load();
        $this->_data['group0'] = $obj;
        $this->_data['permission_list'] = $this->Permission_model->search();
        parent::_view('group',$this->_data);
    }
    public function edit()
    {
        //get post value
        $input = $input = $this->input->post(NULL, TRUE);
        //check permission
        //check permission
        if(!in_array('group_edit',$this->_permission))
        {
            $this->_fail_permission('group_edit');
            return;
        }
        $add_mode = false;
        if($input['id']<=0)
        {
            $add_mode = true;
        }
        
        if($add_mode==true)
        {
            //get obj
            $obj = new Group_model;
            //assign
            $obj->name = $input['name'];
            $obj->description = $input['description'];
            
            $per_list = $input['checkbox_list'];
            if(!is_array($per_list))
            {
                $per_list = array();
            }
            $obj->set_permission_list_obj(
                $this->Permission_model->to_obj_list(
                    $per_list
                )
            );
            //add
            $obj->add();
            //finish
            $this->session->set_flashdata('state', array('add_ok'));
            parent::_redirect('group/index/'.$obj->id);
            return;
        }
        else
        {
            //get obj
            $obj = new Group_model;
            $obj->id = $input['id'];
            $obj->load();
            //assign
            $obj->name = $input['name'];
            $obj->description = $input['description'];
            
            
            $per_list = $input['checkbox_list'];
            if(!is_array($per_list))
            {
                $per_list = array();
            }
            $obj->set_permission_list_obj(
                $this->Permission_model->to_obj_list(
                    $per_list
                )
            );
            //update
            $obj->update();
            //finish
            $this->session->set_flashdata('state', array('edit_ok'));
            parent::_redirect('group/index/'.$obj->id);
            return;
        }
        
    }
    
}