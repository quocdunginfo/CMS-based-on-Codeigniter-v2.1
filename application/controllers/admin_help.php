<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_help extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->library('session');
        $this->load->helper('url');
        
        if($this->session->userdata('user_logged_in')!=1)
        {
            redirect('admin');
            return;
        }
        $this->data['html_title'].=' - Help';
    }
    public function index($state='null')
    {
        //check permission
        if($this->session->userdata('help_view')!=1)
        {
            $this->data['state']='help_view';
            $this->data['user'] =  $this->User_model->get_by_id($this->session->userdata('user_id'));
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $this->data['state']=$state;
        $this->data['user'] =  $this->User_model->get_by_id($this->session->userdata('user_id'));
        $this->load->view('admin/dashboard/help',$this->data);
    }
}