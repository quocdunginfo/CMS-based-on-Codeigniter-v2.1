<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test3 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Post_model");
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("Cat_model");
        $this->load->model("Setting_model");
    }
    public function index()
    {
        $obj=new Painting_post_model;
        $obj->id = 73;
        $obj->load();
        echo $obj->title;
    }
}