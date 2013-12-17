<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template_menu_model extends CI_Model {
    private $root = null;
    private $active_menu = array();
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
    public function generate()
    {
        if($this->root==null)
        {
            return '';
        }
        return self::_generate($this->root, false);
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
        $parent_beginer = '<ul style=" %s ">';
        $parent_closer = '</ul>';
        $parent_style = 'display: none; top: 40px; visibility: visible;';
        
        $child_beginer = '<li style=" %s ">';
        $child_closer = '</li>';
        $child_style = 'z-index: 100;';
        
        $item_prefix = '<a href=" %s " class=" %s "> %s </a>';
        
        
        $html = '';
        $html .=sprintf($parent_beginer,$print_parent_style==true?$parent_style:'');
        
        if(sizeof($obj->get_child_cat_list()) >0)
        {
            foreach($obj->get_child_cat_list() as $item)
            {            
                $html .= sprintf($child_beginer,sizeof($item->get_child_cat_list())>0?$child_style:'');
                $html .= sprintf($item_prefix,$item->get_url(),self::_is_in_active_menu($item->get_url())?'selected':'',$item->name);
                //kiem tra co childs khong
                //neu co thi goi de quy, khong thi dong tag
                if(sizeof($item->get_child_cat_list())>0)
                {
                    $html .= self::_generate($item,true);
                }
                $html .=$child_closer;
            }
        }
        $html .=$parent_closer;
        return $html;
    }
}