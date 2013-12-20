<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_menu extends Admin {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Menus';
        parent::_add_active_menu(site_url('admin_menu/index'));
    }
    public function index()//special
    {
        if(!in_array('menu_view',$this->_permission))
        {
            $this->_fail_permission('menu_view');
            return;
        }
        
        
        $menu_list = $this->Menu_model->get_cat_tree(-1,0);
        $this->_data['menu_list'] = $menu_list;
        $this->_data['menu0'] = new Menu_model;
        $this->_data['menu_provider_list'] = $this->Menu_provider_model->get_all();
        $this->load->view('admin/menu',$this->_data);
    }
    public function submit()
    {
        //get post value
        $input = $this->input->post(null,true);
        $add_mode = false;
        if($input['menu_id']<=0)
        {
            $add_mode=true;
        }
        if($add_mode==true)
        {
            if(!in_array('menu_add',$this->_permission))
            {
                $this->_fail_permission('menu_add');
                return;
            }
            
            $obj = new Menu_model;
            $obj->set_name($input['menu_name']);
            $obj->set_menu_provider_obj(
                $this->Menu_provider_model->get_by_id(
                    $input['menu_provider_id']
                )
            );
            $obj->set_parent_cat_obj(
                $this->Cat_model->get_by_id(
                    $input['menu_parent_id']
                )
            );
            $obj->menu_param = $input['menu_param'];
            //call add
            $obj->add();
            redirect('admin_menu/edit/'.$obj->id);
            return;
        }
        else
        {
            if(!in_array('menu_edit',$this->_permission))
            {
                $this->_fail_permission('menu_edit');
                return;
            }
            
            $obj = new Menu_model;
            $obj->id = $input['menu_id'];
            $obj->load();
            //assign
            $obj->set_name($input['menu_name']);
            $obj->set_menu_provider_obj(
                $this->Menu_provider_model->get_by_id(
                    $input['menu_provider_id']
                )
            );
            $obj->set_parent_cat_obj(
                $this->Cat_model->get_by_id(
                    $input['menu_parent_id']
                )
            );
            $obj->menu_param = $input['menu_param'];
            //call update
            $obj->update();
            redirect('admin_menu/edit/'.$obj->id);
            return;
        }
        //add or update
    }
    public function edit($id=0)
    {
        if(!in_array('menu_edit',$this->_permission))
        {
            $this->_fail_permission('menu_edit');
            return;
        }
        $obj = new Menu_model;
        $obj->id = $id;
        $obj->load();
        
        $menu_list = $this->Menu_model->get_cat_tree(-1,0);
        $this->_data['menu_list'] = $menu_list;
        
        $this->_data['menu0'] = $obj;
        $this->_data['menu_provider_list'] = $this->Menu_provider_model->get_all();
        $this->load->view('admin/menu',$this->_data);
    }
    public function delete($id=0)
    {
        if(!in_array('menu_delete',$this->_permission))
        {
            $this->_fail_permission('menu_delete');
            return;
        }
        $obj = new Menu_model;
        $obj->id= $id;
        $obj->delete_resursive(true,$obj->special);
        redirect('admin_menu');
    }
    public function move_up()
    {
        if(!in_array('menu_edit',$this->_permission))
        {
            $this->_fail_permission('menu_edit');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(3,array('cat_id'));
        $get['cat_id'] = $get['cat_id']===false?0:$get['cat_id'];
        
        //get obj
        $obj = new Menu_model;
        $obj->id = $get['cat_id'];
        $obj->load();
        //call
        $obj->rank_up();
        $this->session->set_flashdata('state', array('edit_ok'));
        redirect('admin_menu/index/');
    }
}