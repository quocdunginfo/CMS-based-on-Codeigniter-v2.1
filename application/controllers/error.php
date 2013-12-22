<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Error extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function _404()
    {
        $this->load->model('Setting_model');
        $this->load->model('template/Template_model', 'Template_model');
        $template = $this->Template_model->get_by_id(
            $this->Setting_model->get_by_key('template_id')
        );
        redirect($template->get_component().'/error/_404');//mặc định luôn lấy front
    }
}