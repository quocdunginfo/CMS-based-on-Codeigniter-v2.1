<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Orders extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Orders';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'orders/index_'));
        self::index();
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
        $get = $this->uri->uri_to_assoc(4,array('page',));
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url($this->_com.'orders/index/page/');
        //varible
        $max_item_per_page=10;
        $model = new Order_model;//model access
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count()
        );
        $pagination->set_base_url(
            $base_url,
            5
        );
        $pagination->update();
        //view data
        $this->_data['order_list']= $model->search(
        '','','','','',0,0,'id','desc',
        $pagination->start_point,$pagination->max_item_per_page
        );
        $this->_data['state']= (array)$this->session->flashdata('state');//noi khác set trước
        $this->_data['pagination']=$pagination;
        
        parent::_add_active_menu(site_url($this->_com.'orders/index'));
        parent::_view('orders',$this->_data);
    }
    public function edit($id=0)
    {
        if(!in_array('order_edit',$this->_permission))
        {
            $this->_fail_permission('order_edit');
            return;
        }
        parent::_redirect('order/index/order_id/'.$id);
    }
    public function delete($id=0)
    {
        if(!in_array('order_delete',$this->_permission))
        {
            $this->_fail_permission('order_delete');
            return;
        }
        
        $obj = new Order_model;
        $obj->id = $id;
        $obj->delete();
        
        parent::_redirect('orders');
    }
}