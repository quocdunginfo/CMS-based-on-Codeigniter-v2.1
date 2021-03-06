<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends CI_Model {

    public $id=0;
    public $key='';
    public $value='';
    //private
    private $_tbn='option';
    function __construct()
    {
        parent::__construct();
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
    public function get($key='')
    {
        return self::get_by_key($key);
    }
    public function get_by_key($key='')
    {
        $obj=new Setting_model;
        $obj->key=$key;
        $obj->load_by_key();
        return $obj->value;
    }
    public function delete_by_key($key=null)
    {
        $this->db->where('key', $key==null?$this->key:$key);
        $this->db->delete($this->_tbn);
    }
    public function add_or_update($key=null,$value=null)
    {
        if(self::is_key_exist($key))
        {
            //neu da ton tai thi update
            self::update($key,$value);
        }
        else
        {
            //chua ton tai thi add vo
            self::add($key,$value);    
        }
        return true;
    }
    public function update_or_add($key=null,$value=null)
    {
        return self::add_or_update(
            $key,
            $value
        );
    }
    
    public function is_key_exist($_key=null)
    {
        $this->db->select('id');
        $this->db->where('key',$_key==null?$this->key:$_key);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    //private
    private function update($_key=null,$_value=null)
    {
        $this->db->set('value',$_value==null? $this->value:$_value);
        $this->db->where('key',$_key==null?$this->key:$_key);
        $this->db->update($this->_tbn);
    }
    private function add($_key=null,$_value=null)
    {
        $array = array(
            'key'=>$_key==null?$this->key:$_key,
            'value'=>$_value==null?$this->value:$_value);
        $this->db->insert($this->_tbn,$array);
    }
}