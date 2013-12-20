<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_setting extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Setting';
        parent::_add_active_menu(site_url('admin_setting/index/alias'));
    }
    public function index()//$state,$unlink_count
    {
        //check permission
        if(!in_array('setting_view',$this->_permission))
        {
            self::_fail_permission('setting_view');
            return;
        }
        //get model
        $setting_obj = new Setting_model;
        //set view data from sb
        $this->_data['state']=(array)$this->session->flashdata('state');
        $this->_data['unlink_count'] = isset($this->_temp['unlink_count'])?(int)$this->_temp['unlink_count']:0;
        
        $this->_data['cache_time']=$setting_obj->get('cache_time');
        $this->_data['maintain_mode']=$setting_obj->get('maintain_mode');
        $this->_data['slider_category']=$setting_obj->get('slider_category');
        $this->_data['feedback_category']=$setting_obj->get('feedback_category');
        $this->_data['feedback_captcha']=$setting_obj->get('feedback_captcha');
        
        $this->_data['homepage_widget_category']=$setting_obj->get('homepage_widget_category');
        $this->_data['homepage_footer_widget_category']=$setting_obj->get('homepage_footer_widget_category');
        
        $this->_data['main_menu_category']=$setting_obj->get('main_menu_category');
        $this->_data['admin_menu_category']=$setting_obj->get('admin_menu_category');
        
       
       
        $this->_data['maximum_preview_post_content']=$setting_obj->get('maximum_preview_post_content');
        $this->_data['maximum_preview_post_title']=$setting_obj->get('maximum_preview_post_title');
        $this->_data['allow_guest_post_feedback']=$setting_obj->get('allow_guest_post_feedback');
        
        $this->_data['html']['title']=$setting_obj->get('html_title');
        $this->_data['html']['footer_left']=$setting_obj->get('html_footer_left');
        $this->_data['html']['footer_right']=$setting_obj->get('html_footer_right');
        $this->_data['html']['seo_author']=$setting_obj->get('html_seo_author');
        $this->_data['html']['seo_keyword']=$setting_obj->get('html_seo_keyword');
        $this->_data['html']['seo_description']=$setting_obj->get('html_seo_description');
        
        $this->_data['slider_auto_scroll_time']=$setting_obj->get('slider_auto_scroll_time');
        $this->_data['cat_list_special'] = $this->Cat_model->get_cat_tree(-1,0,1);
        $this->_data['cat_list_normal'] = $this->Cat_model->get_cat_tree(-1,0,0);
        $this->_data['menu_list'] = $this->Menu_model->get_cat_tree(-1,0);
        $this->_data['cat_list_all'] = $this->Cat_model->get_cat_tree(-1,0,-1);
        
        parent::_add_active_menu(site_url('admin_setting/index'));
        //load view
        $this->load->view('admin/setting', $this->_data);
    }
    public function delete_cache()
    {
        //check permission
        if(!in_array('setting_edit',$this->_permission))
        {
            self::_fail_permission('setting_edit');
            return;
        }
        
        $path='application/cache/';
        $count = qd_delete_files($path);
        //set temp
        $this->_temp['unlink_count'] = $count;
        $this->session->set_flashdata('state', array('delete_cache_ok'));
        redirect('admin_setting');
    }
    public function edit()
    {
        //check permission
        if(!in_array('setting_edit',$this->_permission))
        {
            self::_fail_permission('setting_edit');
            return;
        }
        //get post value
        $cache_time = $this->input->post('cache_time');
        $maintain_mode=$this->input->post('maintain_mode');
        $slider_category = $this->input->post('slider_category');
        $feedback_category = $this->input->post('feedback_category');
        $feedback_captcha = $this->input->post('feedback_captcha');
        $slider_auto_scroll_time = $this->input->post('slider_auto_scroll_time');
       
        
        
        $homepage_widget_category = $this->input->post('homepage_widget_category');//
        $homepage_footer_widget_category = $this->input->post('homepage_footer_widget_category');//
        
        $maximum_preview_post_title = $this->input->post('maximum_preview_post_title');//
        $maximum_preview_post_content = $this->input->post('maximum_preview_post_content');//
        $allow_guest_post_feedback = $this->input->post('allow_guest_post_feedback');//
        
        $html_title = $this->input->post('html_title');//
        $html_footer_left = $this->input->post('html_footer_left');//
        $html_footer_right = $this->input->post('html_footer_right');//
        $html_seo_author = $this->input->post('html_seo_author');//
        $html_seo_keyword = $this->input->post('html_seo_keyword');//
        $html_seo_description = $this->input->post('html_seo_description');//
        
        $main_menu_category = $this->input->post('main_menu_category');
        $admin_menu_category = $this->input->post('admin_menu_category');
        
        //update to database
        $var = new Setting_model;
        $var->update_or_add('cache_time',$cache_time);
        $var->update_or_add('slider_auto_scroll_time',$slider_auto_scroll_time);
        $var->update_or_add('slider_category',$slider_category);
        $var->update_or_add('maintain_mode',$maintain_mode);
        $var->update_or_add('feedback_category',$feedback_category);
        $var->update_or_add('feedback_captcha',$feedback_captcha);
        
        
        
        $var->update_or_add('homepage_widget_category',$homepage_widget_category);
        $var->update_or_add('homepage_footer_widget_category',$homepage_footer_widget_category);
        
        $var->update_or_add('maximum_preview_post_title',$maximum_preview_post_title);
        $var->update_or_add('maximum_preview_post_content',$maximum_preview_post_content);
        $var->update_or_add('allow_guest_post_feedback',$allow_guest_post_feedback);
        
        $var->update_or_add('html_title',$html_title);
        $var->update_or_add('html_footer_left',$html_footer_left);
        $var->update_or_add('html_footer_right',$html_footer_right);
        $var->update_or_add('html_seo_author',$html_seo_author);
        $var->update_or_add('html_seo_keyword',$html_seo_keyword);
        $var->update_or_add('html_seo_description',$html_seo_description);
        //menu
        $var->update_or_add('admin_menu_category',$admin_menu_category);
        $var->update_or_add('main_menu_category',$main_menu_category);
        //set temp
        $this->session->set_flashdata('state', array('edit_ok'));
        redirect('admin_setting');
    }
}