<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Product extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Product';
        $this->_data['active_menu'] = array('front_products');
    }
    public function index($id=0)
    {
        //get obj
        $obj = $this->Painting_post_model->get_by_id($id);
        //view data
        $this->_data['painting_obj'] = $obj;
        parent::_view('product',$this->_data);
    }
}