<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Menu_model extends Cat_model {
    public $menu_param='';
    public $menu_provider_obj=null;
        protected $menu_provider_ready=false; 
    function __construct()
    {
        parent::__construct();
        $this->special=4;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_parent_cat_obj()
    {
        $tmp = parent::get_parent_cat_obj();
        if($tmp==null)
        {
            return null;
        }
        $obj = new Menu_model;
        $obj->id = $tmp->id;
        $obj->load();
        return $obj;
    }
    public function set_name($value='')
    {
        $this->name = $value;
    }
    public function get_by_id($id=0)
    {
        $obj=new Menu_model;
        $obj->id = $id;
        $obj->load();
        return $obj;
    }
    public function get_cat_tree($root_cat_id=-1,$level=0)
    {
        $old = parent::get_cat_tree($root_cat_id,$level,$this->special);
        $re=array();
        foreach($old as $item)
        {
            $obj = new Menu_model;
            $obj->id=$item->id;
            $obj->level = $item->level;
            $obj->load();
            
            array_push($re,$obj);
        }
        return $re;
    }
    function get_child_cat_list()
    {
        $old=parent::get_child_cat_list($this->special);
        
        $re=array();
        foreach($old as $item)
        {
            $obj = new Menu_model;
            $obj->id=$item->id;
            $obj->load();
            
            array_push($re,$obj);
        }
        return $re;
    }
    public function to_obj_list($id_array=array())
    {
        $re=array();
        
        if(is_array($id_array))
        {
            foreach($id_array as $tmp)
            {
                $obj=new Menu_model;
                $obj->id = $tmp;
                $obj->load();
                array_push($re,$obj);                
            }
        }
        return $re;
    }
    public function load()
    {
        //call parent load
        parent::load();
        //init new lazy state for refresh data change
            $this->menu_provider_ready=false;
        //extend var get
        $this->db->select('menu_param');
        $this->db->where('id',$this->id);
        $this->db->where('special',$this->special);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->menu_param = $row->menu_param;
            return true;
        }
        return false;
    }
    public function add()
    {
        //first: add new blank record
        $this->db->set('active', 1);
        $this->db->set('special', $this->special);
        $this->db->insert($this->_tbn);
        //second: get latest id from table
        $this->id=$this->get_max_id();
        //auto set rank
        $this->rank=$this->id;
        //new one set date create
        $this->date_create = date('Y-m-d H:i:s');
        //then: call update function
        self::update();
        //finish
    }
    public function update()
    {
        //call parent update
        parent::update();
        //update extend var
            //prepare data
            $data = array(
                   'menu_param' => $this->menu_param
                );
            
            $this->db->where('id', $this->id);
            $this->db->update($this->_tbn, $data);
        //external
        if($this->menu_provider_ready==true)
            {
                $data = array(
                       'menu_provider_id' => $this->get_menu_provider_obj()==null?0:$this->get_menu_provider_obj()->id
                    );
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
    }
    public function get_url()
    {
        return self::get_menu_provider_obj()->get_menu_url($this->menu_param);
    }
    public function get_menu_provider_obj()
    {
        if($this->menu_provider_ready==true)
        {
            return $this->menu_provider_obj;
        }
        $this->menu_provider_ready=true;
        //load external user_obj
            $this->db->select("menu_provider_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $obj = new Menu_provider_model;
                $obj->id = $row->menu_provider_id;
                $obj->load(); 
                //assign
                $this->menu_provider_obj = $obj;
            }
        return $this->menu_provider_obj;
    }
    public function set_menu_provider_obj($obj=null)
    {
        if($obj!=null && !$obj->is_exist())
        {
            $this->menu_provider_obj = null;           
        }
        else
        {
            $this->menu_provider_obj = $obj;
        }
        return $this->menu_provider_ready=true;
    }
}