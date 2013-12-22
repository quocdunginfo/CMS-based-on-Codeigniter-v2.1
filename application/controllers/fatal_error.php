<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fatal_error extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('Setting_model');
        $this->load->model("template/Template_model",'Template_model');
        $this->load->helper('url');
    }
    public function index()
    {
        $setting = new Setting_model;
        //site mac dinh o day
            $template = new Template_model;
            $template->id = $setting->get_by_key('template_id');
            $template->load();
        if($setting->get_by_key('maintain_mode')!=1)
        {
            redirect($template->get_component());
            return;
        }
        $_data['error_title'] = 'Hệ thống đang tạm ngừng để bảo trì! Vui lòng quay lại sau';
        $_data['error_message'] = '<a href="'.site_url($template->get_component()).'">[Thử lại]</a>';
        
        $this->load->view('fatal_error', $_data);
    }
}