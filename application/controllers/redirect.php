<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Redirect extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('Right_template_menu_model');
        $this->load->library('session');
        $this->load->helper('url');
        //$this->load->helper('file');
        //$this->load->helper('qd_file_helper');
        //$this->load->database();
        //$this->load->library('session');
    }
    public function index()
    {
        echo '<html><header><title>quocdunginfo website</title></header><body>';
		//header('Location: http://qd.vietngancash.com/html');
		echo '
		<iframe src="http://qd.vietngancash.com/html" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">Your browser doesn"t support IFrames</iframe>
		';
		echo '</body></html>';
		return;
    }
}