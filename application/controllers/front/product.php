<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Product extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Product';
    }
    public function index($id=0)
    {
        //get obj
        $obj = $this->Painting_post_model->get_by_id($id);
        $list_cat=$obj->get_cat_painting_list();
        $item_cat=array();
        foreach($list_cat as $item)
        {
            array_push($item_cat,$item->id);
        }
        $list=$this->Painting_post_model->search('','','','',$item_cat,true,-1,'',0,0,-1,'1',0,4,'id','desc');
        $item_cat_final=array();
        foreach($list as $item)
        {
            if($item->id!=$obj->id) array_push($item_cat_final,$item);
        }
        //view data
        $this->_data['painting_obj'] = $obj;
        $this->_data['relative_painting']=$item_cat_final;
        
        parent::_add_active_menu(site_url($this->_com.'product/index/'.$obj->id));
        parent::_view('product',$this->_data);
    }
}