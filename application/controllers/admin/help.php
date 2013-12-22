<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Help extends Home {
    public function __construct()
    {
        parent::__construct();
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'help/index_'));
        self::index();
    }
    public function index()
    {
        $this->_data['state']=array();
        parent::_view('help',$this->_data);
    }
}