<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Template extends Home {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - Template and Style';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'template/index_'));
        self::index();
    }
    public function index()
    {
        //get model
        $model = new Template_model;
        $setting = new Setting_model;
        //hiển thị các template, Style hiện có cho Front
        //view data
        $this->_data['template_list'] = $model->get_all();
        $this->_data['s_template_id'] = $setting->get_by_key('template_id');
        $this->_data['s_front_template_id'] = $setting->get_by_key('front_template_id');
        $this->_data['s_blog_template_id'] = $setting->get_by_key('blog_template_id');
        $this->_data['s_admin_template_id'] = $setting->get_by_key('admin_template_id');
        $this->_data['state'] = (array)$this->session->flashdata('state');
        
        parent::_add_active_menu(site_url($this->_com.'template/index'));
        parent::_view('template', $this->_data);
    }
    public function choose()
    {
        $input = $this->input->post(null,true);
        
        $model = new Template_model;
        if(!$model->is_exist($input['template_id']))
        {
            parent::_redirect('template');
            return;
        }
        $setting = new Setting_model;
        $setting->add_or_update('template_id',$input['template_id']);
        $setting->add_or_update('front_template_id',$input['front_template_id']);
        $setting->add_or_update('blog_template_id',$input['blog_template_id']);
         $setting->add_or_update('admin_template_id',$input['admin_template_id']);
        $this->session->set_flashdata('state', 'edit_ok');
        parent::_redirect('template');
    }
}