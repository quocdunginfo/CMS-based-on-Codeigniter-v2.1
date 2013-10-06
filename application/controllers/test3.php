<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test3 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Post_model");
        $this->load->model("Cat_model");
        $this->load->model("Setting_model");
    }
    public function index()
    {
        //get post
        $obj = new Post_model;
        $obj->id=76;
        $obj->load();
        //get cat
        $cat=new Cat_model;
        $cat->id=5;
        $cat->load();
        //asign or remove
        $obj->add_to_cat_obj_list($cat);
        //$obj->remove_from_cat_obj_list($cat);
        $obj->update();
    }
}