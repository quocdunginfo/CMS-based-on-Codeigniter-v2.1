<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/blog/home.php');
class Post extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Posts';
        parent::_add_active_menu(site_url('blog/post/index'));
    }
    public function index($id)
    {
        $model = new Post_model;
        
        //get objs
        
        
        $this->_data['post0'] = $model->get_by_id($id);
        
        //load view
        parent::_add_active_menu(site_url('blog/post/index/'.$id));
        parent::_view('post',$this->_data);
    }

}