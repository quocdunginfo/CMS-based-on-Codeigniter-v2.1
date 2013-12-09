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
        $this->load->library('Qd_pagination');
        $this->load->model('order/order_model','Order_model');
        $this->load->model('order/order_detail_model','Order_detail_model');
        $this->load->library('cart');
    }
    public function index($page=1)
    {
        /*$name = 'order';
        $o = new Permission_model;
        $o->name = $name.'_view';
        $o->add();
        $o->name = $name.'_edit';
        $o->add();
        $o->name = $name.'_delete';
        $o->add();
        $o->name = $name.'_add';
        $o->add();*/
        /*
        $o = new Order_model;
        $o->id = 73;
        $o->load();
        $o->add();
        */
        
    }
}