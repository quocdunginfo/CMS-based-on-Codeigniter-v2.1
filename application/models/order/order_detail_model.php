<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/post_model.php' );
class Order_detail_model extends Post_model {
    public $order_count=0;
    public $order_unitprice=0;
    //external
    protected $order_product_obj=null;
        protected $order_product_obj_ready=false;
    function __construct()
    {
        parent::__construct();
        $this->special = 4;
    }
    public function load()
    {
        //call parent load
        parent::load();
        //init new lazy state for refresh data change
            $this->order_product_obj_ready=false;
        //extend var get
        $this->db->select('order_count');
        $this->db->select('order_unitprice');
        $this->db->where('id',$this->id);
        $this->db->where('special',$this->special);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->order_count = $row->order_count;
            $this->order_unitprice =$row->order_unitprice;
            return true;
        }
        return false;
    }
    public function get_product_obj()
    {
        if($this->order_product_obj_ready==true)
        {
            return $this->order_product_obj;
        }
        $this->order_product_obj_ready=true;
        //load external
            $this->db->select("order_product_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $obj = new Painting_post_model;
                $obj->id = $row->order_product_id;
                $obj->load(); 
                //assign
                $this->order_product_obj = $obj;
            }
        return $this->order_product_obj;
    }
    public function set_product_obj($product_obj=null)
    {
        if($product_obj!=null && !$product_obj->is_exist())
        {
            $this->order_product_obj = null;           
        }
        else
        {
            $this->order_product_obj = $product_obj;
        }
        return $this->order_product_obj_ready=true;
    }
    public function add()
    {
        //force get product obj before add
        self::get_product_obj();
        
        //add new blank record
        $this->db->set('active', 1);
        $this->db->set('special', $this->special);
        $this->db->insert($this->_tbn);
        //get max id
        $this->id=self::get_max_id();
        //set date create
        $this->date_create = date('Y-m-d H:i:s');
        //call update function
        self::update();
        return $this->id;
    }
    public function delete()
    {
        return parent::delete();
    }
    public function update()
    {
        parent::update();
        $data = array(
               'order_count' => $this->order_count,
               'order_unitprice' => $this->order_unitprice,
               'date_modify' => date('Y-m-d H:i:s')
            );
        $this->db->where('id', $this->id);
        $this->db->update($this->_tbn, $data);
        //update external product_obj
            if($this->order_product_obj_ready==true)
            {
                $data = array(
                    'order_product_id' => $this->order_product_obj == null ?0:$this->order_product_obj->id
                );
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
        return true;
    }
    public function get_total()
    {
        return $this->order_unitprice * $this->order_count;
    }
}