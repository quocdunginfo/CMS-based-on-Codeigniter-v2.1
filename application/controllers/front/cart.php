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
        //get flash
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        
        $validate = $this->_giohang->validate($max_item_can_order);
        $this->_data['state'] = $validate;
        $this->_data['max_item_can_order'] = $max_item_can_order;
        parent::_view('cart', $this->_data);
    }
    public function add_or_update()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('count','painting_id'));
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
    public function add_or_update_from_cart()
    {
        //get post value
        $input = $this->input->post(null,true);
        $input['update_from_cart'] = $input['update_from_cart']==false?false:true;
        //check valid
        if($this->Painting_post_model->is_exist($input['painting_id']))
        {
            if($input['update_from_cart']==true)
            {
                $this->_giohang->add_or_update_item_count(
                    $input['painting_id'],
                    $input['count']
                );
            }
            else
            {
                $this->_giohang->add_or_update_item(
                    $input['painting_id'],
                    $input['count']
                );
            }
            //luu gio hang
            parent::_luu_giohang();
        }
        //redirect to cart view
        redirect('front/cart');
    }
    public function remove()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('painting_id'));
        $get['painting_id'] = $get['painting_id']===false?-1:$get['painting_id'];
        //do action
        $this->_giohang->remove_item($get['painting_id']);
        //save cart
        parent::_luu_giohang();
        //redirect
        redirect('front/cart');
    }
}