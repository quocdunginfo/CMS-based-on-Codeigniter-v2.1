<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test3 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Post_model");
        $this->load->model("Group_model");
        $this->load->model("Permission_model");
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("Cat_model");
        $this->load->helper("url");
        $this->load->model("Setting_model");
        $this->load->library('Image_resize');
    }
    public function index($page=1)
    {
        $obj = new Post_model;
        $obj->id=74;
        $obj->load();
        $obj->set_avatar('/cms/application/_static/upload/1blackberry_wallpaper.png');
        $obj->update();
        $obj->load();
        echo $obj->get_avatar_file_name();
    }
}