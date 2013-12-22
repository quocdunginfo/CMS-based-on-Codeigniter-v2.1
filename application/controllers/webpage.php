<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webpage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
        $this->load->model('Setting_model');
        $this->load->model('template/Template_model', 'Template_model');
        $template = $this->Template_model->get_by_id(
            $this->Setting_model->get_by_key('template_id')
        );
        //chọn Component here
        redirect($template->get_component());
	}
}
