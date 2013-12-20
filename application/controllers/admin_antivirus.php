<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_antivirus extends Admin {
    
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Antivirus';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url('admin_antivirus/index_'));
        self::index();
    }
    public function index()
    {
        parent::_add_active_menu(site_url('admin_antivirus/index'));
        $this->load->view('admin/antivirus',$this->_data);
    }
}