<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();
    protected $_temp = '';
    protected $_tpl = 'blog/';
	protected $_com = 'blog/';
    protected $_menu = null;
    public function __construct()
    {
        parent::__construct();
        //my class
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        
        $this->load->model("template/Template_model",'Template_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        
        $this->load->model('menu/Menu_model','Menu_model');
        $this->load->model('menu/Menu_provider_model','Menu_provider_model');
        $this->load->model('menu/Template_menu_model','Template_menu_model');
        //helper
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('qd_file_helper');
        //library
        $this->load->library('session');
        $this->load->library('Qd_pagination');
        $this->load->library('Form_validate');
        $this->load->library('uri');
        $this->load->library('encrypt');
        $this->load->library('Qd_slider');
        //db
        $this->load->database();
        //
        self::_build_common_data();
    }
    public function index()
    {
		redirect('blog/posts');
    }
    protected function _view($view_name='index', $data = array())
    {
        $this->load->view($this->_tpl.$view_name, $data);
    }
    protected function _build_common_data()
    {
        //get template path from setting
        $setting = new Setting_model;
        $this->_tpl = 'blog/';
        
        $template = new Template_model;
        $template->id = $setting->get_by_key('blog_template_id');
        $template->load();
        //set $_tpl first
        $this->_tpl = $template->get_path().'/';
		$this->_com = $template->get_component().'/';
		
        
        
        
        //get model
        $model_cat = new Cat_model;
        $model_post= new Post_model;
        //common view data
        $this->_data['post_list_cat'] = $model_cat->get_cat_tree(-1,0,$model_cat->special);
        
        
        
        $this->_data['html_title'] =  $setting->get_by_key('html_title');
        $this->_data['html_logo_name'] =  $setting->get_by_key('html_logo_name');
        $this->_data['html_footer_left'] =  $setting->get_by_key('html_footer_left');
        $this->_data['html_footer_right'] =  $setting->get_by_key('html_footer_right');
        $this->_data['html_seo_keyword'] =  $setting->get_by_key('html_seo_keyword');
        
        $this->_data['state']= array();
        $this->_data['active_menu'] = array();
        $this->_data['template_path'] = base_url().'application/views/'.$this->_tpl;
        $this->_data['_tpl'] = $this->_tpl;
        $this->_data['_com'] = $this->_com;
        
        
        //Menu
        $this->_menu = new Template_menu_model;
        $this->_menu->set_root(
            $this->Menu_model->get_by_id(
                $setting->get_by_key('blog_menu_category')
            )
        );
        $this->_data['menu'] =  $this->_menu;
        
        //Cache, some function may not work
        $this->output->cache($setting->get_by_key('blog_cache_time'));
        //Maintain mode
        if($setting->get_by_key('maintain_mode')==1)
        {
            redirect('fatal_error');
            return;
        }
    }
    protected function _add_active_menu($full_url='')
    {
        $this->_menu->add_active_menu($full_url);
        $this->_data['menu'] = $this->_menu;
    }
    
}