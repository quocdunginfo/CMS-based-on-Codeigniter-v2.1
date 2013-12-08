<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //my class
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("order/Order_model",'Order_model');
        $this->load->model("order/Order_detail_model",'Order_detail_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('Group_model');
        $this->load->model('Permission_model');
        //helper
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('qd_file_helper');
        //library
        $this->load->library('session');
        $this->load->library('Qd_pagination');
        $this->load->library('uri');
        $this->load->library('encrypt');
        $this->load->library('Image_resize');
        //db
        $this->load->database();
    }
    public function index()
    {
		$data['title'] = 'khung';
        $this->load->view('front/index', $data);
    }
}