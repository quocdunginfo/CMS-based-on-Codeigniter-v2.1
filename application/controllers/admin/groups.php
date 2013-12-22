<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Groups extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Groups';
        
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'groups/index_'));
        self::index();
    }
    public function index()//page=1
    {
        //check permission
        if(!in_array('group_view',$this->_permission))
        {
            $this->_fail_permission('group_view');
            return;
        }
        //get param
        $get = $this->uri->uri_to_assoc(4,array('page',));
        $get['page'] = $get['page']===false?1:$get['page'];
        $base_url = site_url($this->_com.'groups/index/page/');
        //varible
        $max_item_per_page=10;
        $model = new Group_model;//model access
        //pagination
        $pagination = new Qd_pagination;
        $pagination->set_current_page($get['page']);
        $pagination->set_max_item_per_page($max_item_per_page);
        $pagination->set_total_item(
            $model->search_count()
        );
        $pagination->set_base_url(
            $base_url,
            5
        );
        $pagination->update();
        //view data
        $this->_data['group_list']= $model->search(-1,'','',-1,
        $pagination->start_point,$pagination->max_item_per_page
        );
        $this->_data['state']= (array)$this->session->flashdata('state');//noi khác set trước
        $this->_data['pagination']=$pagination;
        
        parent::_add_active_menu(site_url($this->_com.'groups/index'));
        parent::_view('groups',$this->_data);
    }
    public function edit($id=0)
    {
        if(!in_array('group_edit',$this->_permission))
        {
            $this->_fail_permission('group_edit');
            return;
        }
        parent::_redirect('group/index/'.$id);
    }
    public function add()
    {
        if(!in_array('group_add',$this->_permission))
        {
            $this->_fail_permission('group_add');
            return;
        }
        parent::_redirect('group/index/0');
    }
}