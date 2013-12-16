<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Redirect extends CI_Controller {
    public function __construct()
    {
        parent::__construct();        
    }
    public function index()
    {
        $this->load->helper('url');
        $url = $this->input->get('url', TRUE);
        header('Location: '.prep_url($url));
    }
}