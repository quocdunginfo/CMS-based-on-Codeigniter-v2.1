<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_setting extends Admin {
    protected $keys = array(
            //slider
            'slider_category',
            'slider_auto_scroll_time',
            //system
            'maintain_mode',
            'cache_time',
            //widget
            'homepage_widget_category',
            'homepage_footer_widget_category',
            //html seo
            'html_footer_left',
            'html_footer_right',
            'html_title',
            'html_seo_keyword',
            'html_seo_author',
            'html_seo_description',
            'html_logo_name',
            //feedback
            'feedback_category',
            'feedback_max_content',
            'feedback_captcha',
            'allow_guest_post_feedback',
            //blog
            'maximum_preview_post_content',
            'maximum_preview_post_title',
            //
            
            //shooping
            //'max_count_order_per_product',
            //menu
            'main_menu_category',
            'admin_menu_category',
            'blog_menu_category',
            //email
            'email_protocol',
            'email_smtp_host',
            'email_smtp_pass',
            'email_smtp_port',
            'email_smtp_user',
            'email_timeout'
        );
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Setting';
        
    }
    public function index_()
    {
        parent::_add_active_menu(site_url('admin_setting/index_'));
        self::index();
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
        $setting = new Setting_model;
        
        foreach($this->keys as $item)
        {
            $this->_data['s_'.$item]=$setting->get($item);    
        }
        
        //not from option
        $this->_data['cat_list_special'] = $this->Cat_model->get_cat_tree(-1,0,1);
        $this->_data['cat_list_normal'] = $this->Cat_model->get_cat_tree(-1,0,0);
        $this->_data['menu_list'] = $this->Menu_model->get_cat_tree(-1,0);
        $this->_data['cat_list_all'] = $this->Cat_model->get_cat_tree(-1,0,-1);
        //set view data from sb
        $this->_data['state']=(array)$this->session->flashdata('state');
        $this->_data['unlink_count'] = (int)$this->session->flashdata('unlink_count');
        
        
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
        
        $this->session->set_flashdata('state', array('delete_cache_ok'));
        $this->session->set_flashdata('unlink_count', $count);
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
        $input = $this->input->post(null,true);
        //get post value
        //update to database
        $setting = new Setting_model;
        
        foreach($this->keys as $item)
        {
            $setting->update_or_add($item,$input[$item]);
        }
        
        $this->session->set_flashdata('state', array('edit_ok'));
        redirect('admin_setting');
    }
}