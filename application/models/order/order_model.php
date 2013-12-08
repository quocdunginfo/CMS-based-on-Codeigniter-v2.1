<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Order_model extends Cat_model {
    public $order_total=0;
    public $order_status='chualienlac';//chualienlac, chuagiao, dagiao, dabihuy
    public $order_online_payment = 1;
    //external
    protected $order_user_obj = null;
        protected $order_user_ready=false;
    protected $order_customer_user_obj=null;
        protected $order_customer_user_ready=false;
    protected $order_detail_list = array();
        protected $order_detail_list_ready=false;
        
    function __construct()
    {
        parent::__construct();
        $this->special=5;
    }
    public function set_user_obj($user_obj=null)
    {
        if($user_obj!=null && !$user_obj->is_exist())
        {
            $this->order_user_obj = null;           
        }
        else
        {
            $this->order_user_obj = $user_obj;
        }
        return $this->order_user_ready=true;
    }
    public function get_user_obj()
    {
        if($this->order_user_ready==true)
        {
            return $this->order_user_obj;
        }
        $this->order_user_ready=true;
        //load external user_obj
            $this->db->select("order_user_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $user_obj_tmp = new User_model;
                $user_obj_tmp->id = $row->order_user_id;
                $user_obj_tmp->load(); 
                //assign
                $this->order_user_obj = $user_obj_tmp;
            }
        return $this->order_user_obj;
    }
    public function get_order_detail_list()
    {
        if($this->order_detail_list_ready==true)
        {
            return $this->order_detail_list;
        }
        $this->order_detail_list_ready=true;
        //load
        $list_id = parent::get_post_list_id();
        $this->order_detail_list = array();
        foreach($list_id as $item)
        {
            $obj = new Order_detail_model;
            $obj->id = $item;
            $obj->load();
            array_push($this->order_detail_list,$obj);
        }
        return $this->order_detail_list;
    }
    public function set_order_detail_list($order_detail_list=array())
    {
        $this->order_detail_list = $order_detail_list;
        $this->order_detail_list_ready=true;
    }
    public function set_customer_user_obj($user_obj=null)
    {
        if($user_obj!=null && !$user_obj->is_exist())
        {
            $this->order_customer_user_obj = null;           
        }
        else
        {
            $this->order_customer_user_obj = $user_obj;
        }
        return $this->order_customer_user_ready=true;
    }
    public function get_customer_user_obj()
    {
        if($this->order_customer_user_ready==true)
        {
            return $this->order_customer_user_obj;
        }
        $this->order_customer_user_ready=true;
        //load external user_obj
            $this->db->select("order_customer_user_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $user_obj_tmp = new User_model;
                $user_obj_tmp->id = $row->order_customer_user_id;
                $user_obj_tmp->load(); 
                //assign
                $this->order_customer_user_obj = $user_obj_tmp;
            }
        return $this->order_customer_user_obj;
    }
    public function get_total_unsave_int()
    {
        //lay total dang int
    }
    public function get_total_unsave_string()
    {
        //lay total dang int
    }
    public function add_or_update_item($painting_id=0, $count=0)
    {
        //first get order_detail_list
        self::get_order_detail_list();
        //
        foreach($this->order_detail_list as $item)
        {
            if($item->get_product_obj()->id==$painting_id)
            {
                //cong don sl vao
                $item->order_count +=$count;
                return true;
            }
        }
        //chuwa cos trong don hang
        $tmp = new Order_detail_model;
        $tmp->set_product_obj(
            $this->Painting_post_model->get_by_id(
                $painting_id
            )
        );
        $tmp->order_count = $count;
        $tmp->order_unitprice = $tmp->get_product_obj()->art_price;
        //add to list
        array_push($this->order_detail_list, $tmp);
        
        return true;
    }
    public function remove_item($painting_id=0)
    {
        //first get
        self::get_order_detail_list();
        //
        $re = array();
        //copy
        foreach($this->order_detail_list as $item)
        {
            if($item->get_product_obj()->id!=$painting_id)
            {
                array_push($re,$item);
            }
        }
        //re assign
        $this->order_detail_list = $re;
        return true;
    }
    public function cancel()
    {
        //huy don hang, cong nguoc sl
    }
    public function load()
    {
        //call parent load
        parent::load();
        //init new lazy state for refresh data change
            $this->order_customer_user_ready=false;
            $this->order_user_ready=false;
            $order_detail_list_ready = false;
        //extend var get
        $this->db->select('order_total');
        $this->db->select('order_status');
        $this->db->select('order_online_payment');
        $this->db->where('id',$this->id);
        $this->db->where('special',$this->special);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->order_total = $row->order_total;
            $this->order_status =$row->order_status;
            $this->order_online_payment =$row->order_online_payment;
            return true;
        }
        return false;
    }
    public function add()
    {
        //force get customer and user obj before add
            self::get_customer_user_obj();
            self::get_user_obj();
        //must reset order detail_id to force add
            self::get_order_detail_list();
            foreach($this->order_detail_list as $item)
            {
                $item->get_product_obj();//must get first to ensure product_id is load correct
                $item->id = 0;
            }
            
        //first: add new blank record
        $this->db->set('active', 1);
        $this->db->set('special', $this->special);
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
        //call parent update
        parent::update();
        //recalculate order_total
            //first get order list
            self::get_order_detail_list();
            if($this->order_detail_list_ready==true)
            {
                $sum = 0;
                foreach($this->order_detail_list as $item)
                {
                    $sum+=$item->order_unitprice * $item->order_count;
                }
                $this->order_total = $sum;
            }
        //update extend var
            //prepare data
            $data = array(
                   'order_total' => $this->order_total,
                   'order_online_payment' => $this->order_online_payment,
                   'order_status' => $this->order_status
                );
            
            $this->db->where('id', $this->id);
            $this->db->update($this->_tbn, $data);
        //add or update Order_detail
        if($this->order_detail_list_ready==true)
        {
            //neu chi tiet don hang chua co trong he thong thi tien hanh them moi
            foreach($this->order_detail_list as $item)
            {
                if(!$item->is_exist())
                {
                    $max_id = $item->add();
                    $item->id = $max_id;
                    $item->load();
                }
            }
            //cap nhat link post_cat
                //delete current cat map
                    $this->db->where("cat_id",$this->id);
                    $this->db->from($this->_tbn2);
                    $this->db->delete();
                    //build new cat map
                    foreach($this->order_detail_list as $item)
                    {
                        $data_tmp = array(
                            "post_id" => $item->id,
                            "cat_id" => $this->id
                        );
                        $this->db->insert($this->_tbn2,$data_tmp);
                    }
        }
        //update external
            if($this->order_customer_user_ready==true)
            {
                $data = array(
                       'order_customer_user_id' => $this->order_customer_user_obj->id
                    );
                echo 'cid: '.$this->order_customer_user_obj->id;
                echo 'id: '.$this->id;
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
            if($this->order_user_ready==true)
            {
                $data = array(
                       'order_user_id' => $this->order_user_obj->id
                    );
                
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
    }
    public function delete()
    {
        return parent::delete(true);
    }
    public function filter_by_customer_name($id_list=null, $customer_name='')
    {
        $this->db->select('category.id');
        $this->db->from($this->_tbn);
        $this->db->join('user','category.order_customer_user_id=user.id','left');
        $this->db->or_like('user.fullname',$customer_name);
        $this->db->where('category.special',$this->special);
        if(is_array($id_list) && sizeof($id_list<=0))
        {
            return $id_list;
        }
        if($id_list!=null)
        {
            $this->db->where_in('category.id',$id_list);
        }
        $query = $this->db->get();
        $re=array();
        foreach($query->result() as $row)
        {
            array_push($re,$row->id);
        }
        return $re;
    }
    public function search_count()
    {
        
    }
    public function search($id='',$customer_name='', $status='', $date_from_yyyyMMdd='', $date_to_yyyyMMdd='', $total_from=0, $total_to=0, $order_by='id', $order_rule='desc', $start_point=0, $count=-1)
    {
        //filter like first
        $list = self::filter_by_customer_name(null,$customer_name);
        if($id!='')
        {
            $list = self::filter_exact($list,'id',$id);
        }
        if($status!='')
        {
            $list =self::filter_exact($list,'order_status',$status);
        }
        if($total_from>0 || $total_to>0)
        {
            $list =self::filter_range($list,'order_total',$total_from,$total_to);
        }
        if($date_from_yyyyMMdd!='' && $date_to_yyyyMMdd!='')
        {
            $list =self::filter_date_range($list,'date_create',$date_from_yyyyMMdd,$date_to_yyyyMMdd);
        }
        if($start_point>=0 && $count>-1)
        {
            $list = self::filter_order_limit($list,$order_by,$order_rule,$start_point,$count);
        }
        return $list;
    }
    
}