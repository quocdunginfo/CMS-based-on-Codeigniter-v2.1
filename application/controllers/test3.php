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
        $this->load->library('email');
    }
    public function index($page=1)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'quocdunginfo@gmail.com',
            'smtp_pass' => 'doyohaanthtode77859',
            'mailtype' => 'text',
            'newline' =>'\r\n',
            'starttls'  => true,
            'charset'   => 'iso-8859-1'
        );
        $this->email->initialize($config);
        
        $this->email->from('quocdunginfo@gmail.com', 'Nguyen Dung');
        $this->email->to('quocdunginfo@gmail.com'); 
        
        $this->email->subject('quocdunginfo@gmail.com');
        $this->email->message('quocdunginfo@gmail.com');	
        
        $this->email->send();
        
    }
    
}