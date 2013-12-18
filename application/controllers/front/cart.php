<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Cart extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Cart';
        parent::_add_active_menu(site_url('front/cart'));
    }
    public function index()
    {
        //get setting
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        //validate   
        $validate = $this->_giohang->validate($max_item_can_order);
        //save cart to make default change
        parent::_luu_giohang();
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
    public function checkout()
    {
        //nếu chưa đăng nhập thì chuyển tới trang login hoặc register
        if($this->_user==null)
        {
            //set return url
            $this->session->set_userdata(array('login_next_url' => 'front/cart/checkout'));
            
            redirect('front/login_or_register');
            return;
        }
        //get setting
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        //nếu đơn hàng còn lỗi
        if(sizeof($this->_giohang->validate($max_item_can_order))>0)
        {
            redirect('front/cart');
            return;
        }
        //set default value
        $this->_giohang->order_rc_address = $this->_user->address;
        $this->_giohang->order_rc_phone = $this->_user->phone;
        $this->_giohang->order_rc_fullname = $this->_user->fullname;
        //re assign gio hang
        $this->_data['giohang'] = $this->_giohang;
        parent::_luu_giohang();
        //show form lay thông tin người nhận
        $this->_data['shippingfee_list'] = $this->Shippingfee_model->get_all_obj();
        parent::_view('cart_checkout',$this->_data);
    }
    public function confirm()
    {
        //nếu chưa đăng nhập thì chuyển tới trang login hoặc register
        if($this->_user==null)
        {
            redirect('login_or_register');
            return;
        }
        //get setting
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        //show confirm
            //re validate
            $validate = $this->_giohang->validate($max_item_can_order);
            
            if(sizeof($validate)>0)
            {
                redirect('front/cart');
                return;
            }
            $validate = $this->_giohang->validate_rc();
            if(sizeof($validate)>0)
            {
                redirect('front/cart/checkout');
                return;
            }
            //ready to view
            $this->_data['giohang'] = $this->_giohang;
            parent::_view('cart_confirm', $this->_data);
    }
    public function finish()
    {
        //nếu chưa đăng nhập thì chuyển tới trang login hoặc register
        if($this->_user==null)
        {
            redirect('login_or_register');
            return;
        }
        //re validate
        //get setting
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        if(sizeof($this->_giohang->validate($max_item_can_order))>0)
        {
            redirect('front/cart');
            return;
        }
        if(sizeof($this->_giohang->validate_rc())>0)
        {
            redirect('front/cart/checkout');
            return;
        }
        //set customer
        $this->_giohang->set_customer_user_obj($this->_user);
        //ready
        //save cart to system orders
        $this->_giohang->add();
        //send email (optional)
        //...
        //clear cart on session
        parent::_khoitao_giohang();
        parent::_luu_giohang();
        //update to view ngay vaf luoon
        $this->_data['giohang'] = $this->_giohang;
        //show OK message
        parent::_view('cart_finish',$this->_data);
        //done process
    }
    public function payment()
    {
        //nếu chưa đăng nhập thì chuyển tới trang login hoặc register
        if($this->_user==null)
        {
            redirect('login_or_register');
            return;
        }
        //get setting
        $max_item_can_order = $this->Setting_model->get_by_key('max_count_order_per_product');
        if(sizeof($this->_giohang->validate($max_item_can_order))>0)
        {
            redirect('front/cart');
            return;
        }
        if(sizeof($this->_giohang->validate_rc())>0)
        {
            redirect('front/cart/checkout');
            return;
        }
        if($this->_giohang->order_online_payment==1)
        {
            //show online payment emulation
            $this->_data['html_title'] .=' - Online payment';
            parent::_view('cart_online_payment',$this->_data);
            return;
        }
        //continue to finish
        redirect('front/cart/finish');
    }
    public function checkout_submit()
    {
        //nếu chưa đăng nhập thì chuyển tới trang login hoặc register
        if($this->_user==null)
        {
            redirect('login_or_register');
            return;
        }
        //get post value
        $input = $this->input->post(null,true);
        //assign to giohang
        $this->_giohang->order_rc_address = $input['address'];
        $this->_giohang->order_rc_fullname = $input['fullname'];
        $this->_giohang->order_rc_phone = $input['phone'];
        $this->_giohang->order_online_payment = $input['online_payment'];
        $this->_giohang->set_shippingfee_obj(
            $this->Shippingfee_model->get_by_id($input['shippingfee_id'])
        );
        parent::_luu_giohang();
        //validate
        $validate = $this->_giohang->validate_rc();
        if(sizeof($validate)==0)
        {
            redirect('front/cart/confirm');
            return;
        }
        //show error
        $this->_data['state'] = $validate;
        $this->_data['giohang'] = $this->_giohang;
        $this->_data['shippingfee_list'] = $this->Shippingfee_model->get_all_obj();
        //load view
        parent::_view('cart_checkout',$this->_data);
    }
}