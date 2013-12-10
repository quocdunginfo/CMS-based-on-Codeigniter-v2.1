<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Products extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Products';
        $this->_data['active_menu'] = array('front_products');
    }
    public function index()
    {
        redirect('front/products/painting_cat'.'#qd_sapxep');
    }
    public function painting_cat()//id,page
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('id','page'));
        $get['id'] = $get['id']===false?0:$get['id'];
        $get['page'] = $get['page']===false?1:$get['page'];
        //varible
        $model = new Painting_post_model;
        $cat_array = array();
        if($model->is_exist($get['id']))
        {
            $cat_array = array($get['id']);
        }
        $max_item_per_page = $this->_timkiem_sanpham['max_item_per_page'];
        
        $base_url = site_url('front/products/painting_cat/id/'.$get['id'].'/page/');
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count(
            '','','','',$cat_array,true,'',0,0,-1,1,0,-1
            )
        );
        $pagination->set_base_url(
            $base_url,
            7
        );
        
        $pagination->update();
        //get objs
        
        $list = $model->search(
        '','','','',$cat_array,true,'',0,0,-1,1,$pagination->start_point,
        $pagination->max_item_per_page,
        $this->_timkiem_sanpham['order_by'],
        $this->_timkiem_sanpham['order_rule']
        );
        
        //view data
        $this->_data['painting_list'] = $list;
        $this->_data['painting_cat'] = $this->Cat_model->get_by_id($get['id']);
        $this->_data['pagination'] = $pagination;
        //load view
        $this->_view('products',$this->_data);
    }
    public function submit()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('page'));
        $get['page'] = $get['page']===false?1:$get['page'];
        //get post value
        $input = $this->input->post(null,true);
        //assign to timkiem
        $this->_timkiem_sanpham['order_by'] = $input['order_by'];
        $this->_timkiem_sanpham['order_rule'] = $input['order_rule'];
        $this->_timkiem_sanpham['max_item_per_page'] = $input['max_item_per_page'];
        //save to session
        parent::_luu_timkiem_sanpham();
        //redirect
        redirect('front/products/painting_cat/id/'.$input['painting_cat_id'].'/page/'.$input['page'].'#qd_sapxep');
    }
}