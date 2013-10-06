<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_painting_post extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        $this->_check_login();
        $this->data['html_title'].=' - Post';
    }
    public function index($post_id,$state='null',$special=0)
    {
        //add new post mode
        if($post_id==0)
        {
            //check permission
            if($this->session->userdata('post_add')!=1)
            {
                $this->data['state']='post_add';
                $this->load->view($this->avp.'view_fail',$this->data);
                return;
            }
            
        }
        elseif(!$this->Post_model->is_exist($post_id))
        {
            redirect('admin_posts');
        }
        //check view
        //check permission
        if($this->session->userdata('post_view')!=1)
        {
            $this->data['state']='post_view';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        
        if($post_id==0)
        {
            //add new post mode
            $post_obj = new Painting_post_model;
            $post_obj->special=$special;
        }
        else
        {
            $post_obj = $this->Painting_post_model->get_by_id($post_id);
        }
        
        $this->data['post']=$post_obj;
        $this->data['state']= $state;
        $this->data['special']= $post_obj->special;
        $this->data['cat_list_painting'] = $this->Cat_model->get_cat_tree_object(-1,0,$post_obj->special);
        $this->data['cat_list_material'] = $this->Cat_model->get_cat_tree_object(-1,0,3);
        
        $this->data['html_title'].=' - '.$post_obj->title;
        $this->load->view($this->avp.'painting_post',$this->data);
    }
    
    /**
     * Admin_post::edit()
     * S? d?ng chung cho c? add ($post->id=0) và edit
     * Nh?n POST data t? view lên
     * 
     * @return void
     */
    public function edit($special=0)
    {
        //add mode
        if($this->input->post('post_id')==0)
        {
            //check permission
            if($this->session->userdata('post_add')!=1)
            {
                $this->data['state']='post_add';
                $this->_build_common_data();
                $this->load->view($this->avp.'view_fail',$this->data);
                return;
            }
            //get data
            $post_obj = new Painting_post_model;
            //add mode co set them user_id
            $post_obj->user_id = $this->session->userdata('user_id');
            $post_obj->art_height = $this->input->post('post_art_height');
            $post_obj->art_price = $this->input->post('post_art_price');
            $post_obj->art_sizeunit = $this->input->post('post_art_sizeunit');
            $post_obj->art_width = $this->input->post('post_art_width');
            $post_obj->art_id = $this->input->post('post_art_id');
            $post_obj->avatar = $this->input->post('avatar');
            $post_obj->content_lite = $this->input->post('post_content_lite');
            $post_obj->title = $this->input->post('post_title');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';
            $post_obj->art_sold = $this->input->post('post_art_sold')=='1'?'1':'0';
            $post_obj->special = $special;
            $cat_list_id = $this->input->post('cat_checkbox_painting_list');
            if(!is_array($cat_list_id)) $cat_list_id=array();
            foreach($cat_list_id as $cat_id)
            {
                array_push($post_obj->cat_list,$this->Cat_model->get_by_id($cat_id));
            }
            
            //resize image
            $this->_image_resize($post_obj->get_avatar_file_name());
            //call add function
            $post_obj->add();
            //redirect result
            $this->index($post_obj->id,'add_ok');
        }
        //update mode
        else
        {
            //check permission
            if($this->session->userdata('post_edit')!=1)
            {
                $this->data['state']='post_edit';
                $this->_build_common_data();
                $this->load->view($this->avp.'view_fail',$this->data);
                return;
            }
            //check post
            if(!$this->Post_model->is_exist($this->input->post('post_id')))
            {
                redirect('admin_posts');
                return;
            }
            //get data
            $post_obj = $this->Painting_post_model->get_by_id($this->input->post('post_id'));
            
            $post_obj->art_height = $this->input->post('post_art_height');
            $post_obj->art_price = $this->input->post('post_art_price');
            $post_obj->art_sizeunit = $this->input->post('post_art_sizeunit');
            $post_obj->art_width = $this->input->post('post_art_width');
            $post_obj->art_id = $this->input->post('post_art_id');
            
            
            $post_obj->content_lite = $this->input->post('post_content_lite');
            $post_obj->title = $this->input->post('post_title');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';
            $post_obj->art_sold = $this->input->post('post_art_sold')=='1'?'1':'0';
            $cat_list_id = $this->input->post('cat_checkbox_painting_list');
            if(!is_array($cat_list_id)) $cat_list_id=array();
            foreach($cat_list_id as $cat_id)
            {
                array_push($post_obj->cat_list,$this->Cat_model->get_by_id($cat_id));
            }
            
            //resize image
            $post_obj->avatar = $this->input->post('avatar');
            $this->_image_resize($post_obj->get_avatar_file_name());
            
            //echo 'begin update';
            //update mode
            $post_obj->update();
            //redirect result
            $this->index($post_obj->id,'update_ok',$post_obj->special);
            return;
        }
    }
    /**
     * Admin_painting_post::_image_resize()
     * cấu hình trong config.php
     * 
     * @param mixed $img_name tên file hình không bao gồm đường dẫn
     * @return void
     */
    private function _image_resize($img_name)
    {
        if($img_name=='') return;
        $thumb_path = $this->config->item('qd_upload_path_thumb');
        $img_path = $this->config->item('qd_upload_path');
        
        $this->load->library('Image_resize');
        
        $re = $this->image_resize->load($img_path.$img_name);
        $this->image_resize->autofit($this->config->item('qd_upload_maxwidth_thumb'),$this->config->item('qd_upload_maxheight_thumb'));
        $this->image_resize->save($thumb_path.$img_name);
    }
    public function test()
    {
        return;
        $item = $this->Painting_post_model->get_by_id(18);
        echo $item->avatar_thumb;
    }
    public function clone_to_top($post_id=0)
    {
        //check id
        if(!$this->Post_model->is_exist($post_id))
        {
            redirect('admin_posts');
            return; 
        }
        //get current obj
        $post_obj = $this->Painting_post_model->get_by_id($post_id);
        
        //check permission
        if($this->session->userdata('user_id')==$post_obj->user_id)
        {
            //owner
        }else
        if($this->session->userdata('post_view')!=1)
        {
            $this->data['state']='post_view';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }else
        //check permission
        if($this->session->userdata('post_add')!=1)
        {
            $this->data['state']='post_add';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }else
        //check permission
        if($this->session->userdata('post_edit')!=1)
        {
            $this->data['state']='post_edit';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }else
        //check permission
        if($this->session->userdata('post_delete')!=1)
        {
            $this->data['state']='post_delete';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        //remove post
        $post_obj->delete($post_obj->id);
        //then add post
        $post_obj->id=0;
        $post_obj->add();
        //view
        $this->index($post_obj->id,'clone_ok',$post_obj->special);
    }
}