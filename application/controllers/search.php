<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('right_template.php');
class Search extends Right_template {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('right_template/navigation_model','Right_template_navigation_model');
        $this->load->model('right_template/category_tree_search_model','Right_template_category_tree_search_model');
        $this->data['html']['title'].=' - Search';
        //disable cache when searching
        $this->output->cache(0);
        
    }
    public function index($page=1)
    {
        //view result
        $cat_list = self::get_category();
        
        $max_item_per_page = $this->Setting_model->get('maximum_item_per_page');
        $begin_point = ($page-1)*$max_item_per_page;
        $page_total = (int)($this->Post_model->count_by_multi_cat_recursive($cat_list,1,2)/$max_item_per_page+1);
        
        //hien thi du lieu
        $post_list = $this->Painting_post_model->get_by_multi_cat_recursive($cat_list,$begin_point,$max_item_per_page,1,2);
        
        $this->data['navigation'] = $this->data['navigation'] = $this->Right_template_navigation_model->generate(site_url('search/index/'),$page,$page_total);
        $this->data['painting_post_list'] = $post_list;
        $this->data['painting_category_tree'] = $this->Right_template_category_tree_search_model->generate(-1,2,'search/add_category/',$cat_list,'search/remove_category/');
        $this->data['material_category_tree'] = $this->Right_template_category_tree_search_model->generate(-1,3,'search/add_category/',$cat_list,'search/remove_category/');
        $this->load->view('right_template/painting_category',$this->data);
    }
    public function submit()
    {
        $input = $this->input->post(null,true);
        $cat_a = $input['category_list'];
        if(!is_array($cat_a))
        {
            $cat_a=array();
        }
        //set sesssion
        $newdata = array(
           's_cat'  => implode(',',$cat_a)
        );
        $this->session->set_userdata($newdata);
        self::index();
    }
    public function new_multi_term()
    {
        /*
        $cat_a = array();
        //bật chế tìm kiếm nâng cao theo nhiều chủ đề
        $cat_list = $this->Cat_model->get_cat_tree_object(-1,0,2);
        foreach($cat_list as $cat)
        {
            array_push($cat_a,$cat->id);
        }
        $cat_list = $this->Cat_model->get_cat_tree_object(-1,0,3);
        foreach($cat_list as $cat)
        {
            array_push($cat_a,$cat->id);
        }
        */
        $newdata = array(
           's_cat'  => ''//implode(',',$cat_a)//''//search category
        );
        $this->session->set_userdata($newdata);
        self::index();
    }
    public function off_multi_term()
    {
        redirect('painting_category');
    }
    public function add_category($cat_id=-1)
    {
        if(!$this->Cat_model->is_exist($cat_id))
        {
            self::index();
            return;
        }
        //get current cat list
        $cat_list = self::get_category();
        //neu da co trong ds thi bo qua
        if(in_array($cat_id,$cat_list))
        {
            self::index();
            return;
        }
        //bật chế tìm kiếm nâng cao theo nhiều chủ đề
        $newdata = array(
           's_cat'  => $this->session->userdata('s_cat').','.$cat_id  //search category
        );
        $this->session->set_userdata($newdata);
        //call index
        self::index();
    }
    public function remove_category($cat_id=-1)
    {
        if(!$this->Cat_model->is_exist($cat_id))
        {
            self::index();
            return;
        }
        //get current cat list
        $cat_list = self::get_category();
        //neu KHONG co trong ds thi bo qua
        if(!in_array($cat_id,$cat_list))
        {
            self::index();
            return;
        }
        //bo element ra
        $new_cat_list = array();
        foreach($cat_list as $cat_id_tmp)
        {
            if($cat_id_tmp!=$cat_id)
            {
                array_push($new_cat_list,$cat_id_tmp);
            }
        }
        
        //bật chế tìm kiếm nâng cao theo nhiều chủ đề
        $newdata = array(
           's_cat'  => implode(',',$new_cat_list)  //search category
        );
        
        $this->session->set_userdata($newdata);
        //call index
        self::index();
    }
    private function get_category()
    {
        $string = $this->session->userdata('s_cat');
        if($string=='') return array();//be careful
        $string = trim($string,',');
        $cat_list = explode(',',$string);
        return $cat_list;
    }
}