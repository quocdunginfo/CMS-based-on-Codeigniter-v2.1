<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Order extends Home {
    public function __construct()
    {
        parent::__construct();        
        $this->_data['html_title'].=' - Order';
        
        parent::_add_active_menu(site_url($this->_com.'orders/index'));
    }
    public function index()//order_id
    {
        //check permission
        if(!in_array('order_view',$this->_permission))
        {
            $this->_fail_permission('order_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('order_id',));
        $get['order_id'] = $get['order_id']===false?0:$get['order_id'];
        
        //check permission
        if(!in_array('order_view',$this->_permission))
        {
            $this->_fail_permission('order_view');
            return;
        }
        //check exist
        if(!$this->Order_model->is_exist($get['order_id']))
        {
            parent::_redirect('orders');
            return;
        }
        
        //view data
        $this->_data['state']= array();
        $obj = new Order_model;
        $obj->id = $get['order_id'];
        $obj->load();
        $this->_data['order0'] = $obj;
        parent::_view('order',$this->_data);
    }
    public function edit()
    {
        //get post value
        $input = $input = $this->input->post(NULL, TRUE);
        //check permission
        //check permission
        if(!in_array('order_edit',$this->_permission))
        {
            $this->_fail_permission('order_edit');
            return;
        }
        //get obj
        $obj = new Order_model;
        $obj->id = $input['id'];
        $obj->load();
        //assign
        $obj->set_status($input['status']);
        //cap nhat manager neu chua co
            if($obj->get_user_obj()==null || $obj->get_user_obj()->id<=0)
            {
                $obj->set_user_obj($this->_user);
            }
        //update
        $obj->update();
        //finish
        parent::_redirect('order/index/order_id/'.$obj->id);
    }
    
}