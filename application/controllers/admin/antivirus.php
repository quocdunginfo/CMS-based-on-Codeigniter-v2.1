<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Antivirus extends Home {
    
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Antivirus';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'antivirus/index_'));
        self::index();
    }
    public function index()
    {
        parent::_add_active_menu(site_url('admin/antivirus/index'));
        parent::_view('antivirus',$this->_data);
    }
}