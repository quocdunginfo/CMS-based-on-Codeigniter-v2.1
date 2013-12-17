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
        $this->load->model('menu/Menu_model','Menu_model');
        $this->load->model('menu/Menu_provider_model','Menu_provider_model');
        $this->load->model('menu/Template_menu_model','Template_menu_model');
        $this->load->library('cart');
    }
    public function index($page=1)
    {
        $root = $this->Menu_model->get_by_id(82);
        $obj = new Template_menu_model;
        $obj->set_root($root);
        echo $obj->generate();
    }
    function make_list($arr)
    {
        $return = '<ul>';
        foreach ($arr as $item)
        {
            $return .= '<li>' . (is_array($item) ? self::make_list($item) : $item) . '</li>';
        }
        $return .= '</ul>';
        return $return;
    }
}