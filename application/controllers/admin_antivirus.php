<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_antivirus extends Admin {
    
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Antivirus';
        $this->_data['active_menu'] = array('admin_antivirus');
    }
    public function index()
    {
        $this->load->view('admin/antivirus',$this->_data);
    }
}