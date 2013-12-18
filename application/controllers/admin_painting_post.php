<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_painting_post extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Painting post';
        array_push($this->_data['active_menu'],'admin_posts');
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('post_id', 'special', 'cat_id'));
        $get['post_id'] = $get['post_id']===false?-1:$get['post_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['cat_id'] = $get['cat_id']===false?-1:$get['cat_id']; 
        //varibles
        $add_mode = false;
        //add new post mode
        if($get['post_id']==0)
        {
            //check permission
            if(!in_array('post_add',$this->_permission))
            {
                self::_fail_permission('post_add');
                return;
            }
            $add_mode=true;
        }
        else if(!$this->Post_model->is_exist($get['post_id']))
        {
            redirect('admin_posts');
            return;
        }
        //check edit
        //check permission
        if(!in_array('post_edit',$this->_permission))
        {
            self::_fail_permission('post_edit');
            return;
        }        
        
        //main action
        if($add_mode)
        {
            //get new obj
            $post_obj = new Painting_post_model;
            $post_obj->special=$get['special'];
        }
        else
        {
            //get db obj
            $post_obj = new Painting_post_model;
            $post_obj->id=$get['post_id'];
            $post_obj->load();
        }        
        
        $this->_data['post']=$post_obj;
        $this->_data['state']= array();
        $this->_data['special']= $post_obj->special;
        $this->_data['cat_id']= $get['cat_id'];
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,0);
        $this->_data['cat_list_painting'] = $this->Cat_model->get_cat_tree(-1,0,2);
        $this->_data['cat_list_material'] = $this->Cat_model->get_cat_tree(-1,0,3);
        
        $this->_data['html_title'].=' - '.$post_obj->title;
        //load view base on special
        switch ($post_obj->special)
        {
            case 0:
                redirect('admin_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
                break;
        }
        $this->load->view('admin/painting_post',$this->_data);
    }
    public function edit($special=0)
    {
        //add mode
        if($this->input->post('post_id')==0)
        {
            //check permission
            if(!in_array('post_add',$this->_permission))
            {
                $this->_fail_permission('post_add');
                return;
            }
            //get data
            $post_obj = new Painting_post_model;
            //add mode co set them user
            $post_obj->set_user_obj(
                $this->_user
            );
            
            $post_obj->art_height = $this->input->post('post_art_height');
            $post_obj->art_price = $this->input->post('post_art_price');
            $post_obj->art_sizeunit = $this->input->post('post_art_sizeunit');
            $post_obj->art_width = $this->input->post('post_art_width');
            $post_obj->art_id = $this->input->post('post_art_id');
            $post_obj->art_count = $this->input->post('post_art_count');
            $post_obj->set_avatar($this->input->post('avatar'));
            $post_obj->set_description($this->input->post('post_content'));
            $post_obj->title = $this->input->post('post_title');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';
            $post_obj->art_sold = $this->input->post('post_art_sold')=='1'?'1':'0';
            $post_obj->special = $special;
            $cat_list_id = $this->input->post('cat_checkbox_painting_list');
            $cat_painting_id = $this->input->post('post_painting_material');
            if(!is_array($cat_list_id)) $cat_list_id=array();
            array_push($cat_list_id, $cat_painting_id);
            $post_obj->set_cat_obj_list(
                $this->Cat_model->to_obj_list($cat_list_id)
            );
            
            //call add function
            $post_obj->add();
            //redirect result
            redirect('admin_painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
            return;
        }
        //update mode
        else
        {
            //check post
            if(!$this->Painting_post_model->is_exist($this->input->post('post_id')))
            {
                redirect('admin_posts');
                return;
            }
            //get obj
            $post_obj = $this->Painting_post_model->get_by_id($this->input->post('post_id'));
            //owner permission override
            if($this->_user->id==$post_obj->get_user_obj()->id)
            {
                //override
            }
            else
            //check permission
            if(!in_array('post_edit',$this->_permission))
            {
                $this->_fail_permission('post_edit');
                return;
            }
            //get data
            
            $post_obj->art_height = $this->input->post('post_art_height');
            $post_obj->art_price = $this->input->post('post_art_price');
            $post_obj->art_sizeunit = $this->input->post('post_art_sizeunit');
            $post_obj->art_width = $this->input->post('post_art_width');
            $post_obj->art_id = $this->input->post('post_art_id');
            $post_obj->art_count = $this->input->post('post_art_count');
            $post_obj->set_avatar($this->input->post('avatar'));
            $post_obj->set_description($this->input->post('post_content'));
            $post_obj->title = $this->input->post('post_title');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';
            $post_obj->art_sold = $this->input->post('post_art_sold')=='1'?'1':'0';
            $post_obj->special = $special;
            //maintain cat
            $cat_list_id = $this->input->post('cat_checkbox_painting_list');
            $cat_painting_id = $this->input->post('post_painting_material');
            if(!is_array($cat_list_id)) $cat_list_id=array();
            array_push($cat_list_id, $cat_painting_id);
            $post_obj->set_cat_obj_list(
                $this->Cat_model->to_obj_list($cat_list_id)
            );
            
            //update mode
            $post_obj->update();
            //redirect result
            redirect('admin_painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
            return;
        }
    }
    public function clone_to_top($post_id=0)
    {
        //check id
        if(!$this->Painting_post_model->is_exist($post_id))
        {
            redirect('admin_posts');
            return; 
        }
        //get current obj
        $post_obj = $this->Painting_post_model->get_by_id($post_id);
        
        //check permission
        if($this->_user->id==$post_obj->user_id)
        {
            //owner
        }else
        //check permission
        if(!in_array('post_edit',$this->_permission))
        {
            self::_fail_permission('post_edit');
            return;
        }
        
        $post_obj->clone_to_top();
        //view
        redirect('admin_painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
    }
}