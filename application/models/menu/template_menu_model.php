<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template_menu_model extends CI_Model {
    private $root = null;
    private $active_menu = array();
    
    private $parent_beginer = '<ul %s>';
    private $parent_closer = '</ul>';
    private $parent_style = 'style="display: none; top: 40px; visibility: visible;"';
    
    private $child_beginer = '<li %s>';
    private $child_closer = '</li>';
    private $child_style = 'style="z-index: 100;"';
    
    private $item_prefix = '<a href=" %s " class=" %s "> %s </a>';
    function __construct()
    {
        parent::__construct();
    }
    public function set_root($obj=null)
    {
        $this->root = $obj;
    }
    public function get_root()
    {
        return $this->root;
    }
    public function add_active_menu($full_url='')
    {
        array_push($this->active_menu,$full_url);
    }
    public function set_active_menu($full_url_array=array())
    {
        $this->active_menu = $full_url_array;
    }
    public function generate()
    {
        if($this->root==null)
        {
            return '';
        }
        return self::_generate($this->root, false);
    }
    public function generate_main_admin()
    {
        if($this->root==null)
        {
            return '';
        }
        //set private first
        $this->parent_beginer = '<ul %s>';
        $this->parent_closer = '</ul>';
        $this->parent_style = 'id="nav"';
        
        $this->child_beginer = '<li %s>';
        $this->child_closer = '</li>';
        $this->child_style = 'id="current"';
        
        $this->item_prefix = '<a href=" %s " class=" %s "> %s </a>';
        
        
        return self::_generate_main_admin($this->root, true);
    }
    
    public function generate_sub_admin()
    {
        if($this->root==null)
        {
            return '';
        }
        //set private first
        $this->parent_beginer = '<ul %s>';
        $this->parent_closer = '</ul>';
        $this->parent_style = 'id="subnav"';
        
        $this->child_beginer = '<li %s>';
        $this->child_closer = '</li>';
        $this->child_style = 'style="font-weight: bold;"';
        
        $this->item_prefix = '<a href=" %s " class=" %s "> %s </a>';
        
        $html ='';
        foreach($this->root->get_child_cat_list() as $item)
        {
            //Tránh trường hợp Child active nhưng parent không active
            //dẫn đến hiển thị sai
            foreach($item->get_child_cat_list() as $tmp)
            {
                if(self::_is_in_active_menu($tmp->get_url()))
                {
                    self::add_active_menu($item->get_url());
                }
            }
            
            if(sizeof($item->get_child_cat_list())>0)
            {
                if(self::_is_in_active_menu($item->get_url()))
                {
                    
                    $html .=self::_generate_main_admin($item,true);
                }
            }
            
        }
        return $html;
    }
    private function _is_in_active_menu($full_url)
    {
        foreach($this->active_menu as $item)
        {
            if(strstr($full_url, $item)!==false)
            {
                return true;
            }
        }
        return false;
    }
    private function _generate($obj, $print_parent_style=true)
    {
        //set private param first
        $html = '';
        $html .=sprintf($this->parent_beginer,$print_parent_style==true?$this->parent_style:'');
        
        if(sizeof($obj->get_child_cat_list()) >0)
        {
            foreach($obj->get_child_cat_list() as $item)
            {            
                $html .= sprintf($this->child_beginer,sizeof($item->get_child_cat_list())>0?$this->child_style:'');
                $html .= sprintf($this->item_prefix,$item->get_url(),self::_is_in_active_menu($item->get_url())?'selected':'',$item->name);
                //kiem tra co childs khong
                //neu co thi goi de quy, khong thi dong tag
                if(sizeof($item->get_child_cat_list())>0)
                {
                    $html .= self::_generate($item,true);
                }
                $html .=$this->child_closer;
            }
        }
        $html .=$this->parent_closer;
        return $html;
    }
    private function _generate_main_admin($obj, $print_parent_style=true)
    {
        //set private param first
        $html = '';
        $html .=sprintf($this->parent_beginer,$print_parent_style==true?$this->parent_style:'');
        
        if(sizeof($obj->get_child_cat_list()) >0)
        {
            foreach($obj->get_child_cat_list() as $item)
            {            
                $html .= sprintf($this->child_beginer,self::_is_in_active_menu($item->get_url())?$this->child_style:'');//differences
                $html .= sprintf($this->item_prefix,$item->get_url(),self::_is_in_active_menu($item->get_url())?'selected':'',$item->name);
            }
        }
        $html .=$this->parent_closer;
        return $html;
    }
}