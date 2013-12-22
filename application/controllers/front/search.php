<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Search extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Search';
        parent::_add_active_menu(site_url($this->_com.'search'));
    }
    public function index()
    {
        parent::_redirect('search/painting_cat'.'#qd_sapxep');
    }
    public function painting_cat()//id,page
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('page'));
  //      $get['id'] = $get['id']===false?0:$get['id'];
        $get['page'] = $get['page']===false?1:$get['page'];
        $page=$this->input->get('page');
        //varible
        $cat_model = new Painting_cat_model;
        $model= new Painting_post_model;
        $cat_array = array();
        if($cat_model->is_exist($this->_timkiem_nangcao['cat_id']))
        {
            $cat_array = array($this->_timkiem_nangcao['cat_id']);
        }
        
        $max_item_per_page = $this->_timkiem_nangcao['max_item_per_page'];
        
        $base_url = site_url($this->_com.'search/painting_cat/page/');
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count($this->_timkiem_nangcao['title'],'',$this->_timkiem_nangcao['art_id'],'',$cat_array,true,$this->_timkiem_nangcao['mat_id'],'',$this->_timkiem_nangcao['art_price_from'],$this->_timkiem_nangcao['art_price_to'],-1,1));
        $pagination->set_base_url(
            $base_url,
            7
        );
      
        $pagination->update();
        //get objs
        
        $list = $model->search(
        $this->_timkiem_nangcao['title'],'',$this->_timkiem_nangcao['art_id'],'',$cat_array,true,$this->_timkiem_nangcao['mat_id'],'',$this->_timkiem_nangcao['art_price_from'],$this->_timkiem_nangcao['art_price_to'],-1,1,$pagination->start_point,
        $pagination->max_item_per_page,
        $this->_timkiem_nangcao['order_by'],
        $this->_timkiem_nangcao['order_rule']
        );
        
        //view data
        $this->_data['painting_list'] = $list;
      //  $this->_data['painting_cat'] = $this->Cat_model->get_by_id($get['id']);
        $this->_data['pagination'] = $pagination;
        //load view
      //  parent::_add_active_menu(site_url($this->_com.'search/painting_cat/');
        parent::_view('search',$this->_data);
    }
    public function simple_submit()
    {
        $input = $this->input->post(null,true);
        parent::_khoitao_timkiem_nangcao();
        $this->_timkiem_nangcao['title']=$input['title'];
        //save to session
        parent::_luu_timkiem_nangcao();
        //redirect
        parent::_redirect('search/painting_cat/page/1#qd_sapxep');
    }
    public function submit()
    {
        //get param      
        $get = $this->uri->uri_to_assoc(4,array('page'));
        $get['page'] = $get['page']===false?1:$get['page'];
        //get post value
        $input = $this->input->post(null,true);
        //assign to timkiem
        if($input['front_submit_reset']!='') { parent::_khoitao_timkiem_nangcao();
        }
        else{
        $this->_timkiem_nangcao['art_id']=$input['art_id'];
        $this->_timkiem_nangcao['title']=$input['title'];
        $this->_timkiem_nangcao['cat_id']=$input['cat_id'];
        $this->_timkiem_nangcao['art_price_from']=$input['art_price_from'];
        $this->_timkiem_nangcao['art_price_to']=$input['art_price_to'];
        $this->_timkiem_nangcao['mat_id']=$input['mat_id'];
        $this->_timkiem_nangcao['order_by'] = $input['order_by'];
        $this->_timkiem_nangcao['order_rule'] = $input['order_rule'];
        $this->_timkiem_nangcao['max_item_per_page'] = $input['max_item_per_page'];
        }
        //save to session
        parent::_luu_timkiem_nangcao();
        //redirect
        parent::_redirect('search/painting_cat/page/1#qd_sapxep');
    }
}