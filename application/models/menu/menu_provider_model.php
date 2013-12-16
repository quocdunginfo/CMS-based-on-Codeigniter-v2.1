<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Menu_provider_model extends CI_Model {
    public $id=0;
    public $name='';
    public $controller='';
    public $action='';
    public $active='';
    public $selector_uri='';
    
    protected $_tbn = 'menu_provider'; 
    function __construct()
    {
        parent::__construct();
    }
    public function get_by_id($id=0)
    {
        $obj=new Menu_provider_model;
        $obj->id = $id;
        if(!$obj->is_exist())
        {
            return null;
        }
        $obj->load();
        return $obj;
    }
    public function is_exist($id=-1)
    {
        $this->db->select("id");
        $this->db->where("id",$id==-1?$this->id:$id);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    public function load()
    {
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id = $row->id;
            $this->name = $row->name;
            $this->controller = $row->controller;
            $this->selector_uri = $row->selector_uri;
            $this->action = $row->action;
            $this->active = $row->active;
            return true;
        }
        return false;
    }
    public function add()
    {
        //first: add new blank record
        $this->db->set('active', $this->active);
        $this->db->insert($this->_tbn);
        //second: get latest id from table
        $this->id=$this->get_max_id();
        //new one set date create
        $this->date_create = date('Y-m-d H:i:s');
        //then: call update function
        self::update();
        //finish
    }
    public function update()
    {
        //prepare data
        $data = array(
               'name' => $this->name,
               'controller' => $this->controller,
               'selector_uri' => $this->selector_uri,
               'action' => $this->action,
               'active' => $this->active
            );
        $this->db->where('id', $this->id);
        $this->db->update($this->_tbn, $data);
    }
    public function get_selector_url()
    {
        return site_url($this->selector_uri);
    }
    public function get_menu_url($menu_param='')
    {
        return site_url($this->controller.$this->action.$menu_param);
    }
    public function get_all()
    {
        $re=array();
        
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $q = $this->db->get();
        foreach($q->result() as $row)
        {
            $obj=new Menu_provider_model;
            $obj->id=$row->id;
            $obj->load();
            array_push($re,$obj);
        }
        return $re;
    }
}