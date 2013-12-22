<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Post extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Post';
        
    }
    public function index()//$post_id, $special(for add only)
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('post_id', 'special', 'cat_id'));
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
            parent::_redirect('posts');
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
            $post_obj = new Post_model;
            $post_obj->special=$get['special'];
        }
        else
        {
            //get db obj
            $post_obj = new Post_model;
            $post_obj->id=$get['post_id'];
            $post_obj->load();
        }        
        
        $this->_data['post']=$post_obj;
        $this->_data['state']= array();
        $this->_data['special']= $post_obj->special;
        $this->_data['cat_id']= $get['cat_id'];
        $this->_data['cat_list'] = $this->Cat_model->get_cat_tree(-1,0,qd_special_post_to_cat($post_obj->special));
        
        $this->_data['html_title'].=' - '.$post_obj->title;
        //load view base on special
        $tmp = new Cat_model;
        $setting = new Setting_model;
        switch ($post_obj->special)
        {
            case 0:
                break;
            case 1:
                //nếu như mà là feedback post
                $tmp = new Cat_model;
                $tmp->id = $setting->get_by_key('feedback_category');
                $tmp->load();
                
                if($tmp->is_contain_post($get['post_id']) || $tmp->id==$get['cat_id'])//nếu chỉnh sửa hoặc add item cho feedback thì redirect
                {
                    parent::_redirect('feedback/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special.'/cat_id/'.$get['cat_id']);
                    return;   
                }
                
                //nếu như mà là slider
                $tmp->id = $setting->get_by_key('slider_category');
                $tmp->load();
                if($tmp->is_contain_post($get['post_id']) || $tmp->id==$get['cat_id'])//nếu chỉnh sửa hoặc add item cho slider thì redirect
                {
                    parent::_redirect('slide_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special.'/cat_id/'.$get['cat_id']);
                    return;
                }
                
                break;
            case 2:
                parent::_redirect('painting_post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special.'/cat_id/'.$get['cat_id']);
                return;
            case 6:
                break;
        }
        
        parent::_add_active_menu(site_url($this->_com.'posts/index/special/'.qd_special_post_to_cat($get['special'])));
        parent::_view('post',$this->_data);
    }
    
    /**
     * Admin_post::edit()
     * Sử dụng chung cho cả add ($post->id=0) và edit
     * Nhận POST data từ view lên
     * 
     * @return void
     */
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
            $post_obj = new Post_model;
            //add mode co set them user
            $post_obj->set_user_obj(
                $this->_user
            );
            $post_obj->title = $this->input->post('post_title');
            $post_obj->content_lite = $this->input->post('post_content_lite');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';//checkbox have to do that
            $post_obj->content = $this->input->post('post_content');
            $post_obj->set_avatar($this->input->post('avatar'));//link image
            $post_obj->special = $special;
            $cat_list_id = $this->input->post('cat_checkbox_list');//get array checkbox
            if(!is_array($cat_list_id)) $cat_list_id=array();//for sure
            $post_obj->set_cat_obj_list(
                $this->Cat_model->to_obj_list($cat_list_id)
            );
            
            
            //call add function
            $post_obj->add();
            //redirect result
            parent::_redirect('post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
            return;
        }
        //update mode
        else
        {
            //check post
            if(!$this->Post_model->is_exist($this->input->post('post_id')))
            {
                parent::_redirect('posts');
                return;
            }
            //get obj
            $post_obj = $this->Post_model->get_by_id($this->input->post('post_id'));
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
            //assign value
            $post_obj->title = $this->input->post('post_title');
            $post_obj->content_lite = $this->input->post('post_content_lite');
            $post_obj->active = $this->input->post('post_active')=='1'?'1':'0';
            $post_obj->content = $this->input->post('post_content');
            $post_obj->set_avatar($this->input->post('avatar'));
            $cat_list_id = $this->input->post('cat_checkbox_list');
            if(!is_array($cat_list_id)) $cat_list_id=array();
            $post_obj->set_cat_obj_list(
                $this->Cat_model->to_obj_list($cat_list_id)
            );
            //update mode
            $post_obj->update();
            //redirect result
            parent::_redirect('post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
            return;
        }
    }
    public function clone_to_top($post_id=0)
    {
        //check id
        if(!$this->Post_model->is_exist($post_id))
        {
            parent::_redirect('posts');
            return; 
        }
        //get current obj
        $post_obj = $this->Post_model->get_by_id($post_id);
        
        //check permission
        if($this->_user->id==$post_obj->user_id)
        {
            //owner
        }else
        //check permission
        if(!in_array('post_edit',$this->_permission))
        {
            $this->_fail_permission('post_edit');
            return;
        }
        $post_obj->clone_to_top();
        //view
        parent::_redirect('post/index/post_id/'.$post_obj->id.'/special/'.$post_obj->special);
    }
}