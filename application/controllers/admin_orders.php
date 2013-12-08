<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_orders extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Orders';
        array_push($this->_data['active_menu'],'admin_orders');
    }
    public function index()//page=1
    {
        //check permission
        if(!in_array('order_view',$this->_permission))
        {
            $this->_fail_permission('order_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(1,array('page',));
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url('admin_orders/index/page/');
        //varible
        $max_item_per_page=40;
        $model = new Order_model;//model access
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            1
        );
        $pagination->set_base_url(
            $base_url,
            4
        );
        
        $pagination->update();
    }
}