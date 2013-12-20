<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_help extends Admin {
    public function __construct()
    {
        parent::__construct();
    }
    public function index_()
    {
        parent::_add_active_menu(site_url('admin_help/index_'));
        self::index();
    }
    public function index()
    {
        $this->_data['state']=array();
        $this->load->view('admin/help',$this->_data);
    }
}