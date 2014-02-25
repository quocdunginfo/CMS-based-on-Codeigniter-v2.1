<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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