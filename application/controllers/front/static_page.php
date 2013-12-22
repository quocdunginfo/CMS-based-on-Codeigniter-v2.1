<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Static_page extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Static page';
    }
    public function index($id=0)
    {
        //get obj
        $obj = $this->Post_model->get_by_id($id);
        //view data
        $this->_data['static_page0'] = $obj;        
        parent::_add_active_menu(site_url($this->_com.'static_page/index/'.$obj->id));
        parent::_view('static_page',$this->_data);
    }
}