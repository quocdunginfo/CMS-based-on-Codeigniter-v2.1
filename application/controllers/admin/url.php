<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Url extends Home {
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Media';
    }
    public function index()
    {
        //get param
        $get = $this->uri->uri_to_assoc(4,array('view_mode'));
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        $this->_data['view_mode'] = $get['view_mode'];
        parent::_view('url',$this->_data);
    }
}