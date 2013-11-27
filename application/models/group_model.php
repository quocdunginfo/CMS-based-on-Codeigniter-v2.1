<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group_model extends CI_Model {
    var $id = 0;
    var $name = '';
    var $description = '';
    var $active = 1;
    //private
    private $_tbn="group";
    private $_tbn2="permission";
    private $_tbn3="permission_group";
    //external
    public $permission_list_obj = null;
        private $permission_list_obj_ready = false;//for lazy loading
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function load()
    {
        //init new lazy state
        $this->permission_list_obj_ready=false;
        
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id=$row->id;
            $this->description=$row->description;
            $this->name=$row->name;
            $this->active=$row->active;
            
            return true;
        }
        return false;
    }
    public function get_permission_list_obj()
    {
        if($this->permission_list_obj_ready==true)
        {
            return $this->permission_list_obj;
        }
        $this->permission_list_obj_ready=true;
        //load
        //get external cat list
            $this->permission_list_obj=array();
            
            $this->db->select("permission_id");
            $this->db->where("group_id",$this->id);
            $this->db->distinct();
            $this->db->from($this->_tbn3);
            $query_tmp = $this->db->get();
            foreach($query_tmp->result() as $row)
            {
                $tmp = new Permission_model;
                $tmp->id = $row->permission_id;
                $tmp->load();
                array_push($this->permission_list_obj,$tmp);
            }
        return $this->permission_list_obj;
    }
    public function set_permission_list_obj($obj_list=array())
    {
        $this->permission_list_obj=array();
        foreach($obj_list as $obj)
        {
            if($obj->is_exist())
            {
                //ton tai moi them vao
                array_push($this->permission_list_obj,$obj);
            }
        }
        $this->permission_list_obj_ready=true;
    }
    public function get_by_id($id=0)
    {
        $obj=new Group_model;
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
        $data = array();
        $this->db->insert($this->_tbn,$data);
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
            'description' => $this->description,
            'active' => $this->active
        );
        $this->db->where('id',$this->id);
        $this->db->update($this->_tbn,$array);
    }
    public function search($id=-1,$name="",$description="",$active=-1)
    {
        $this->db->from($this->_tbn);
        $this->db->select("id");
        if($id>-1)
        {
            $this->db->where("id",$id);   
        }
        $this->db->like("name",$name);
        $this->db->like("description",$description);
        if($active>-1)
        {
            $this->db->where("active",$active);   
        }
        
        $query = $this->db->get();
        $re = array();
        foreach($query->result() as $row)
        {
            $tmp=new Group_model;
            $tmp->id=$row->id;
            $tmp->load();
            array_push($re,$tmp);
        }
        return $re;
    }
}
?>