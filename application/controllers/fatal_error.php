<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fatal_error extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('Setting_model');
        $this->load->helper('url');
    }
    public function index()
    {
        if($this->Setting_model->get_by_key('maintain_mode')!=1)
        {
            redirect('front');
            return;
        }
        $_data['error_title'] = 'Hệ thống đang tạm ngừng để bảo trì! Vui lòng quay lại sau';
        $_data['error_message'] = '<a href="'.site_url('front').'">[Thử lại]</a>';
        
        $this->load->view('fatal_error', $_data);
    }
}