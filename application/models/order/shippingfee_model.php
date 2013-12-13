<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Shippingfee_model extends CI_Model {
    public $id=0;
    public $name = '';
    public $fee = 0;
    protected $_tbn='shippingfee';
    function __construct()
    {
        parent::__construct();
    }
    public function get_by_id($id=0)
    {
        $obj=new Shippingfee_model;
        $obj->id=$id;
        $obj->load();
        return $obj;
    }
    public function load()
    {
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id = $row->id;
            $this->name =$row->name;
            $this->fee =$row->fee;
            return true;
        }
        return false;
    }
    public function is_exist($id=-1)
    {
        $this->db->select("id");
        $this->db->where("id",$id==-1?$this->id:$id);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    public function get_fee()
    {
        return number_format($this->fee,0,'.',',');
    }
    public function get_all_obj()
    {
        $re=array();
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $q = $this->db->get();
        foreach($q->result() as $row)
        {
            $obj = new Shippingfee_model;
            $obj->id = $row->id;
            $obj->load();
            array_push($re,$obj);
        }    
        return $re;
    }
    
}