<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_category extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Categories';
        $this->_data['active_menu'] = array('admin_category');
    }
    public function index()//special
    {
        if(!in_array('cat_view',$this->_permission))
        {
            $this->_fail_permission('cat_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(3,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
        
        $cat_list = $this->Cat_model->get_cat_tree(-1,0,$get['special']);
        $this->_data['cat_list'] = $cat_list;
        $this->_data['special'] = $get['special'];
        $this->load->view('admin/category',$this->_data);
    }
    public function add()//special
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(3,array('special'));
        $get['special'] = $get['special']===false?0:$get['special'];
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
        $this->_data['state'] = array('add_ok');
        self::index($get['special']);
    }
    public function edit($special=0)
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        $input = $this->input->post(null,true);
        //load cat
            $cat = new Cat_model;
            $cat->id = $input['cat_id'];
            $cat->load();
        //set value
            $cat->name = $input['cat_name'];
        $cat->update();
        $this->_data['state'] = array('edit_ok');
        self::index($special);
    }
    public function delete($cat_id,$special)
    {
        if(!in_array('category_delete',$this->_permission))
        {
            $this->_fail_permission('category_delete');
            return;
        }
        //show confirm delete
        $this->_data['cat_id'] = $cat_id;
        $this->_data['special'] = $special;
        $this->load->view('admin/category_delete',$this->_data);
    }
    public function confirm_delete($cat_id=-1,$delete_post=0,$special=-1)
    {
        if(!in_array('category_add',$this->_permission))
        {
            $this->_fail_permission('category_add');
            return;
        }
        $cat = new Cat_model;
        $cat->id=$cat_id;
        $cat->delete_resursive($delete_post==0?false:true,$special);
        $this->_data['state'] = array('delete_ok');
        self::index($special);
    }
    
}