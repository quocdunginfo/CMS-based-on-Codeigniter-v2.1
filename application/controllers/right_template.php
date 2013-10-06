<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Right_template
 * Root controller for right_template
 * 
 * @package ci
 * @author quocdunginfo
 * @copyright 2013
 * @version $Id$
 * @access public
 */
class Right_template extends CI_Controller {
    protected $data = array();
    protected $avp = 'art/';//admin views path
    protected $html = array();//right template html
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('User_model');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        $this->load->model('Painting_post_model');
        $this->load->model('Cat_model');
        $this->load->model('Setting_model');
        $this->load->model('right_template/menu_model','Right_template_menu_model');
        $this->load->library('session');
        $this->load->helper('url');
        
        //build pre data
        $this->_build_common_data();
        //check maintaince mode
        $this->_check_maintain();
        $this->output->cache($this->Setting_model->get('cache_time'));
    }
    /**
     * Right_template::_build_common_data()
     * Build template common data: slider_list, category_menu, state='null'
     * 
     * @return void
     */
    protected function _build_common_data()
    {
        $post_list = $this->Post_model->get_by_cat_recursive($this->Setting_model->get('slider_category'),0,-1,1,1);
        $this->data['slider_list'] = $post_list;
        $this->data['category_menu'] = $this->Right_template_menu_model->generate($this->Setting_model->get('menu_categories_category'));
        $this->data['painting_category_menu'] = $this->Right_template_menu_model->generate($this->Setting_model->get('menu_categories_category'),2);
        $this->data['state'] = 'null';
        $this->data['html'] = array(
            'footer_left'=>$this->Setting_model->get('html_footer_left'),
            'footer_right'=>$this->Setting_model->get('html_footer_right'),
            'title'=>$this->Setting_model->get('html_title'),
            'seo_author'=>$this->Setting_model->get('html_seo_author'),
            'seo_keyword'=>$this->Setting_model->get('html_seo_keyword'),
            'seo_description'=>$this->Setting_model->get('html_seo_description'),
        );
    }
    protected function _check_maintain()
    {
        if($this->Setting_model->get('maintain_mode')==1)
        {
            redirect('sitedown');
        }
    }
    public function index()
    {
        redirect('home');
    }
}