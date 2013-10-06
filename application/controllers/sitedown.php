<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitedown extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->helper('url');
    }
    public function index()
    {
        if($this->Setting_model->get('maintain_mode')==0)
        {
            redirect('home');
            return;
        }
        $this->load->view('right_template/sitedown');
        return;
    }
}