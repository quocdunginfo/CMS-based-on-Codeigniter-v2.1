<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Cart extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Products';
        $this->_data['active_menu'] = array('front_products');
    }
    public function index()
    {
        //return home
        $this->_view('cart', $this->_data);
    }
    public function add_or_update()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('count','page'));
        $get['painting_id'] = $get['painting_id']===false?-1:$get['painting_id'];
        $get['count'] = $get['count']===false?1:$get['count'];
        //check valid
        if($this->Painting_post_model->is_exist($get['painting_id']))
        {
            $this->_giohang->add_or_update_item(
            $get['painting_id'],
            $get['count']
            );
            //luu gio hang
            parent::_luu_giohang();
        }
        
        //redirect to cart view
        redirect('front/cart');
    }
}