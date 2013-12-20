<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_template extends Admin {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - Template and Style';
        parent::_add_active_menu(site_url('admin_template/index'));
    }
    public function index()
    {
        //get model
        $model = new Template_model;
        $setting = new Setting_model;
        //hiển thị các template, Style hiện có cho Front
        //view data
        $this->_data['template_list'] = $model->get_all();
        $this->_data['template_id'] = $setting->get_by_key('template_id');
        $this->_data['state'] = (array)$this->session->flashdata('state');
        $this->load->view('admin/template', $this->_data);
    }
    public function choose()
    {
        $input = $this->input->post(null,true);
        
        $model = new Template_model;
        if(!$model->is_exist($input['template_id']))
        {
            redirect('admin_template');
            return;
        }
        $setting = new Setting_model;
        $setting->add_or_update('template_id',$input['template_id']);
        $this->session->set_flashdata('state', 'edit_ok');
        redirect('admin_template');
    }
}