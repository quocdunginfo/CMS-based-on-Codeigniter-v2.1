<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_setting extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('user_logged_in')!=1)
        {
            redirect('admin');
            return;
        }
        
        $this->data['html_title'].=' - Setting';
    }
    
    /**
     * Admin_posts::index()
     * Mooxi page 40 item danh sách các bài vi?t hi?n có trong h? th?ng
     * 
     * @param mixed $cat_id
     * @param mixed $page (1,2,3,4,...)
     * @return void
     */
    public function index($state='null',$unlink_count=0)
    {
        //check permission
        if($this->session->userdata('setting_view')!=1)
        {
            $this->data['state']='setting_view';
            
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $setting_obj = new Setting_model;
        $this->data['state']=$state;
        $this->data['unlink_count'] = $unlink_count;
        $this->data['cache_time']=$setting_obj->get('cache_time');
        $this->data['maintain_mode']=$setting_obj->get('maintain_mode');
        $this->data['slider_category']=$setting_obj->get('slider_category');
        $this->data['feedback_category']=$setting_obj->get('feedback_category');
        $this->data['feedback_captcha']=$setting_obj->get('feedback_captcha');
        $this->data['menu_categories_category']=$setting_obj->get('menu_categories_category');
        $this->data['homepage_widget_category']=$setting_obj->get('homepage_widget_category');
        $this->data['homepage_footer_widget_category']=$setting_obj->get('homepage_footer_widget_category');
        $this->data['menu_latest_category']=$setting_obj->get('menu_latest_category');
        $this->data['menu_about_category']=$setting_obj->get('menu_about_category');
        $this->data['maximum_item_per_page']=$setting_obj->get('maximum_item_per_page');
        $this->data['maximum_preview_post_content']=$setting_obj->get('maximum_preview_post_content');
        $this->data['maximum_preview_post_title']=$setting_obj->get('maximum_preview_post_title');
        $this->data['allow_guest_post_feedback']=$setting_obj->get('allow_guest_post_feedback');
        
        $this->data['html']['title']=$setting_obj->get('html_title');
        $this->data['html']['footer_left']=$setting_obj->get('html_footer_left');
        $this->data['html']['footer_right']=$setting_obj->get('html_footer_right');
        $this->data['html']['seo_author']=$setting_obj->get('html_seo_author');
        $this->data['html']['seo_keyword']=$setting_obj->get('html_seo_keyword');
        $this->data['html']['seo_description']=$setting_obj->get('html_seo_description');
        
        $this->data['slider_auto_scroll_time']=$setting_obj->get('slider_auto_scroll_time');
        $this->data['cat_list_special'] = $this->Cat_model->get_cat_tree_object(-1,0,1);
        $this->data['cat_list_normal'] = $this->Cat_model->get_cat_tree_object();
        $this->data['cat_list_all'] = $this->Cat_model->get_cat_tree_object(-1,0,-1);
        
        $this->load->view('admin/dashboard/setting',$this->data);
    }
    public function delete_cache()
    {
        //check permission
        if($this->session->userdata('setting_edit')!=1)
        {
            $this->data['state']='setting_edit';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $path='application/cache/';
        $count = qd_delete_files($path);
        $this->index('delete_cache_ok',$count);
    }
    public function edit()
    {
        //check permission
        if($this->session->userdata('setting_edit')!=1)
        {
            $this->data['state']='setting_edit';
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        //get value
        $cache_time = $this->input->post('cache_time');
        $maintain_mode=$this->input->post('maintain_mode');
        $slider_category = $this->input->post('slider_category');
        $feedback_category = $this->input->post('feedback_category');
        $feedback_captcha = $this->input->post('feedback_captcha');
        $slider_auto_scroll_time = $this->input->post('slider_auto_scroll_time');
        $menu_categories_category = $this->input->post('menu_categories_category');
        $menu_latest_category = $this->input->post('menu_latest_category');//
        $menu_about_category = $this->input->post('menu_about_category');//
        $homepage_widget_category = $this->input->post('homepage_widget_category');//
        $homepage_footer_widget_category = $this->input->post('homepage_footer_widget_category');//
        $maximum_item_per_page = $this->input->post('maximum_item_per_page');//
        $maximum_preview_post_title = $this->input->post('maximum_preview_post_title');//
        $maximum_preview_post_content = $this->input->post('maximum_preview_post_content');//
        $allow_guest_post_feedback = $this->input->post('allow_guest_post_feedback');//
        
        $html_title = $this->input->post('html_title');//
        $html_footer_left = $this->input->post('html_footer_left');//
        $html_footer_right = $this->input->post('html_footer_right');//
        $html_seo_author = $this->input->post('html_seo_author');//
        $html_seo_keyword = $this->input->post('html_seo_keyword');//
        $html_seo_description = $this->input->post('html_seo_description');//
        //update to database
        $var = new Setting_model;
        $var->update_add('cache_time',$cache_time);
        $var->update_add('slider_auto_scroll_time',$slider_auto_scroll_time);
        $var->update_add('slider_category',$slider_category);
        $var->update_add('maintain_mode',$maintain_mode);
        $var->update_add('feedback_category',$feedback_category);
        $var->update_add('feedback_captcha',$feedback_captcha);
        $var->update_add('menu_categories_category',$menu_categories_category);
        $var->update_add('menu_latest_category',$menu_latest_category);
        $var->update_add('menu_about_category',$menu_about_category);
        $var->update_add('homepage_widget_category',$homepage_widget_category);
        $var->update_add('homepage_footer_widget_category',$homepage_footer_widget_category);
        $var->update_add('maximum_item_per_page',$maximum_item_per_page);
        $var->update_add('maximum_preview_post_title',$maximum_preview_post_title);
        $var->update_add('maximum_preview_post_content',$maximum_preview_post_content);
        $var->update_add('allow_guest_post_feedback',$allow_guest_post_feedback);
        
        $var->update_add('html_title',$html_title);
        $var->update_add('html_footer_left',$html_footer_left);
        $var->update_add('html_footer_right',$html_footer_right);
        $var->update_add('html_seo_author',$html_seo_author);
        $var->update_add('html_seo_keyword',$html_seo_keyword);
        $var->update_add('html_seo_description',$html_seo_description);
        //latest_post_category
        //redirect('admin_setting/index/edit_ok');
        $this->index('edit_ok');
    }
}