<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends CI_Model {

    public $id=0;
    public $key="";
    public $value="";
    //private
    private $_tbn="option";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function load_by_key()
    {
        $this->db->select('value');
        $this->db->where('key',$this->key);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->value = $row->value;
            return true;
        }
        return false;
    }
    public function get_by_key($key="")
    {
        $obj=new Setting_model;
        $obj->key=$key;
        $obj->load_by_key();
        return $obj->value;
    }
    public function delete_by_key()
    {
        $this->db->where('key', $this->key);
        $this->db->delete($this->_tbn);
    }
    public function add_or_update()
    {
        if(self::is_key_exist())
        {
            //neu da ton tai thi update
            self::update();
        }
        else
        {
            //chua ton tai thi add vo
            self::add();    
        }
    }
    public function update_or_add()
    {
        self::add_or_update();
    }
    //private
    private function is_exist_key()
    {
        $this->db->select("id");
        $this->db->where("key",$this->key);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    private function update()
    {
        $this->db->set('value',$this->value);
        $this->db->where('key',$this->key);
        $this->db->update($this->_tbn);
    }
    private function add()
    {
        $array = array('key'=>$this->key, 'value'=>$this->value);
        $this->db->insert($this->_tbn,$array);
    }
}