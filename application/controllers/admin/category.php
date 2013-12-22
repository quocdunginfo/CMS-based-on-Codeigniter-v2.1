<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Category extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Categories';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'category/index_'));
        self::index();
    }
    public function index()//special
    {
        if(!in_array('category_view',$this->_permission))
        {
            $this->_fail_permission('category_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special','view_mode'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        $cat_list = $this->Cat_model->get_cat_tree(-1,0,$get['special']);
        $this->_data['cat_list'] = $cat_list;
        $this->_data['special'] = $get['special'];
        $this->_data['view_mode'] = $get['view_mode'];
        $this->_data['state'] = (array)$this->session->flashdata('state');
        
        parent::_add_active_menu(site_url($this->_com.'category/index/special/'.$get['special']));
        parent::_view('category',$this->_data);
    }
    public function add()//special
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special','view_mode'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        //post param
        $input = $this->input->post(null,true);
        //get parent cat
            $p = new Cat_model;
            $p->id = $input['cat_radio_list'][0];
            $p->load();
        //make new cat
            $cat=new Cat_model;
            $cat->name = $input['cat_name'];
            $cat->special=$get['special'];
            $cat->set_parent_cat_obj($p);
            $cat->add();
        //
        $this->session->set_flashdata('state', array('add_ok'));
        parent::_redirect('category/index/special/'.$get['special'].'/view_mode/'.$get['view_mode']);
    }
    public function edit()
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('special','view_mode'));
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        //post
        $input = $this->input->post(null,true);
        //load cat
            $cat = new Cat_model;
            $cat->id = $input['cat_id'];
            $cat->load();
        //set value
            $cat->name = $input['cat_name'];
        $cat->update();
        $this->session->set_flashdata('state', array('edit_ok'));
        parent::_redirect('category/index/special/'.$get['special'].'/view_mode/'.$get['view_mode']);
    }
    public function move_up()
    {
        if(!in_array('category_edit',$this->_permission))
        {
            $this->_fail_permission('category_edit');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('cat_id','special','view_mode'));
        $get['cat_id'] = $get['cat_id']===false?0:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        //get obj
        $obj = new Cat_model;
        $obj->special = $get['special'];
        $obj->id = $get['cat_id'];
        $obj->load();
        //call
        $obj->rank_up();
        $this->session->set_flashdata('state', array('edit_ok'));
        parent::_redirect('category/index/special/'.$get['special'].'/view_mode/'.$get['view_mode']);
    }
    public function delete()
    {
        
        if(!in_array('category_delete',$this->_permission))
        {
            $this->_fail_permission('category_delete');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('cat_id','special','view_mode'));
        $get['cat_id'] = $get['cat_id']===false?0:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        
        //show confirm delete
        $this->_data['cat_id'] = $get['cat_id'];
        $this->_data['special'] = $get['special'];
        $this->_data['view_mode'] = $get['view_mode'];
        parent::_view('category_delete',$this->_data);
    }
    public function confirm_delete()
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('cat_id','special','view_mode', 'delete_post'));
        $get['cat_id'] = $get['cat_id']===false?0:$get['cat_id'];
        $get['special'] = $get['special']===false?0:$get['special'];
        $get['view_mode'] = $get['view_mode']===false?'normal':$get['view_mode'];
        $get['delete_post'] = $get['delete_post']===false?0:$get['delete_post'];
        
        $cat = new Cat_model;
        $cat->id=$get['cat_id'];
        $cat->delete_resursive($get['delete_post']==0?false:true,$get['special']);
        $this->session->set_flashdata('state', array('delete_ok'));
        
        parent::_redirect('category/index/special/'.$get['special'].'/view_mode/'.$get['view_mode']);
    }
    
}