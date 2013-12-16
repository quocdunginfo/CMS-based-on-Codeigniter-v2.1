<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_url extends Admin {
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Media';
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(3,array('view_mode'));
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        $this->_data['view_mode'] = $get['view_mode'];
        $this->load->view('admin/url',$this->_data);
    }
}