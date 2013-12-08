<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permission_model extends CI_Model {
    public $id = 0;
    public $name = '';
    //private
    private $_tbn="permission";
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function load()
    {
        //init new lazy state        
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id=$row->id;
            $this->name = $row->name;
            return true;
        }
        return false;
    }
    public function get_by_id($id=0)
    {
        $obj=new Permission_model;
        $obj->id=$id;
        $obj->load();
        return $obj;
    }
    public function is_exist()
    {
        $this->db->select("id");
        $this->db->where("id",$this->id);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    public function delete()
    {
        $this->db->where('id',$this->id);
        $this->db->delete($this->_tbn);
    }
    public function add()
    {
        //insert new record
        $this->db->set('name','');
        $this->db->insert($this->_tbn);
        //get max id
        $this->id=self::get_max_id();
        //auto datetime
        //...
        self::update();
    }
    public function get_max_id()
    {
        //get max id
        $this->db->select_max('id');
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            return $row->id;
        }
        return 0;
    }
    public function update()
    {
        //call lazy load before update
        //...
        $array = array(
            'name' => $this->name,
        );
        $this->db->where('id',$this->id);
        $this->db->update($this->_tbn,$array);
    }
    public function search($id=-1,$name="")
    {
        $this->db->from($this->_tbn);
        $this->db->select("id");
        if($id>-1)
        {
            $this->db->where("id",$id);   
        }
        $this->db->like("name",$name);
        
        $query = $this->db->get();
        $re = array();
        foreach($query->result() as $row)
        {
            $tmp=new Permission_model;
            $tmp->id=$row->id;
            $tmp->load();
            array_push($re,$tmp);
        }
        return $re;
    }
}
?>