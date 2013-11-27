<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    var $id = 0;
    var $username = '';
    var $password = '';
    var $fullname = '';
    var $active = 1;
    var $email = '';
    var $date_create = '';//datetime
    var $date_modify = '';//datetime
    //private
    private $_tbn="user";
    //external
    private $group_obj = null;
        private $group_obj_ready = false;//for lazy loading
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function load()
    {
        //init new lazy state
        $this->group_obj_ready=false;
        
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id=$row->id;
            $this->username=$row->username;
            $this->password=$row->password;
            $this->fullname=$row->fullname;
            $this->active=$row->active;
            $this->group_id=$row->group_id;
            $this->email = $row->email;
            $this->date_create = $row->date_create;
            $this->date_modify = $row->date_modify;
            return true;
        }
        return false;
    }
    public function get_group_obj()
    {
        if($this->group_obj_ready==true)
        {
            return $this->group_obj;
        }
        $this->group_obj_ready=true;
        //load external user_obj
            $this->db->select("group_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $tmp = new Group_model;
                $tmp->id = $row->group_id;
                $tmp->load(); 
                //assign
                $this->group_obj = $tmp;
            }
        return $this->group_obj;
    }
    public function set_group_obj($obj=null)
    {
        if($obj!=null)
        {
            if(!$obj->is_exist())
            {
                return false;
            }
        }
        $this->group_obj = $obj;
        $this->user_obj_ready=true;
        return true;
    }
    public function get_by_id($id=0)
    {
        $obj=new User_model;
        $obj->id=$id;
        $obj->load();
        return $obj;
    }
    public function get_by_username($username="")
    {
        $obj=new User_model;
        $obj->username=$username;
        $obj->load_by_username();
        return $obj;
    }
    public function is_exist()
    {
        $this->db->select("id");
        $this->db->where("id",$this->id);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    public function load_by_username()
    {
        $this->db->select('id');
        $this->db->where('username',$this->username);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id = $row->id;
            self::load();
            return true;
        }
        return false;
    }
    public function login()
    {
        $this->db->select('username');
        $this->db->from($this->_tbn);
        $this->db->where('username',''.$this->username);
        $this->db->where('password',''.$this->password);
        $count = $this->db->count_all_results();
        return $count>0?true:false;
    }
    public function delete()
    {
        $this->db->where('id',$this->id);
        $this->db->delete($this->_tbn);
    }
    public function add()
    {
        //insert new record
        $this->db->set('active', 1); 
        $this->db->insert('user');
        //get max id
        $this->id=self::get_max_id();
        //auto datetime
        $this->date_create = date('Y-m-d H:i:s');
        //hash password
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
            'username' => $this->username,
            'fullname' => $this->fullname,
            'password' => $this->password,
            'email' => $this->email,
            'active' => $this->active,
            'date_create' => $this->date_create,
            'date_modify' => date('Y-m-d H:i:s'),
            'group_id' => $this->group_id
        );
        $this->db->where('id',$this->id);
        $this->db->update($this->_tbn,$array);
    }
    public function search($id=-1,$username="",$fullname="",$email="",$active=-1,$group_id=-1)
    {
        $this->db->from($this->_tbn);
        $this->db->select("id");
        if($id>-1)
        {
            $this->db->where("id",$id);   
        }
        $this->db->like("username",$username);
        $this->db->like("fullname",$username);
        $this->db->like("email",$username);
        if($active>-1)
        {
            $this->db->where("active",$active);   
        }
        if($group_id>-1)
        {
            $this->db->where("group_id",$group_id);   
        }
        $query = $this->db->get();
        $re = array();
        foreach($query->result() as $row)
        {
            $tmp=new User_model;
            $tmp->id=$row->id;
            $tmp->load();
            array_push($re,$tmp);
        }
        return $re;
    }
}
?>