<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Order_model extends Cat_model {
    public $order_total=0;
    protected $order_status='chualienlac';//chualienlac, chuagiao, dagiao, dabihuy
        protected $need_update_product_count=false;
    public $order_online_payment = 1;
    public $order_rc_address = '';
    public $order_rc_phone = '';
    public $order_rc_fullname = '';
    //external
    protected $order_user_obj = null;
        protected $order_user_ready=false;
    protected $order_customer_user_obj=null;
        protected $order_customer_user_ready=false;
    protected $order_detail_list = array();
        protected $order_detail_list_ready=false;
    protected $order_shippingfee_obj = null;
        protected $order_shippingfee_ready=false;
        
    function __construct()
    {
        parent::__construct();
        $this->special=5;
    }
    public function get_order_online_payment_vi()
    {
        if($this->order_online_payment==1)
        {
            return 'Thanh toán trực tuyến';
        }
        else
        {
            return 'Thanh toán tại nhà';
        }
    }
    public function get_order_online_payment_en()
    {
        if($this->order_online_payment==1)
        {
            return 'Online payment';
        }
        else
        {
            return 'Delivered post-paid';
        }
    }
    public function get_order_total_include_shipping_fee_int()
    {
        return self::get_order_total_unsave_int() + $this->get_shippingfee_obj()->fee;
    }
    public function get_order_total_include_shipping_fee_string()
    {
        return number_format(self::get_order_total_include_shipping_fee_int(),0,'.',',');
    }
    public function get_shippingfee_obj()
    {
        if($this->order_shippingfee_ready==true)
        {
            return $this->order_shippingfee_obj;
        }
        $this->order_shippingfee_ready=true;
        //load external user_obj
            $this->db->select("order_shippingfee_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $obj = new Shippingfee_model;
                $obj->id = $row->order_customer_user_id;
                $obj->load();
                //assign
                $this->order_shippingfee_obj = $obj;
            }
        return $this->order_shippingfee_obj;
    }
    public function set_shippingfee_obj($obj=null)
    {
        if($obj!=null && !$obj->is_exist())
        {
            $this->order_shippingfee_obj = null;           
        }
        else
        {
            $this->order_shippingfee_obj = $obj;
        }
        return $this->order_shippingfee_ready=true;
    }
    public function set_status($status='chualienlac')
    {
        if($status!=$this->order_status && $status=='dabihuy')
        {
            $this->need_update_product_count = true;
        }
        else
        {
            $this->need_update_product_count = false;
        }
        $this->order_status = $status;
    }
    public function get_order_total()
    {
        return number_format($this->order_total,0,'.',',');
    }
    public function get_order_total_unsave_int()
    {
        $sum=0;
        foreach($this->get_order_detail_list() as $item)
        {
            $sum+=$item->order_count * $item->order_unitprice;
        }
        return $sum;
    }
    public function get_order_total_unsave_string()
    {
        return number_format(self::get_order_total_unsave_int(),0,'.',',');
    }
    public function get_status()
    {
        return $this->order_status;
    }
    public function get_status_vi()
    {
        $tmp = self::get_status_array_vi();
        switch($this->order_status)
        {
            case 'chualienlac':
                return $tmp['chualienlac'];
            case 'chuagiao':
                return $tmp['chuagiao'];
            case 'dagiao':
                return $tmp['dagiao'];
            case 'dabihuy':
                return $tmp['dabihuy'];
        }
        return 'unknown';
    }
    public function get_status_array_en()
    {
        return array(
        'chualienlac' => 'Not contacted yet',
        'chuagiao' => 'Not deliveried yet',
        'dagiao' => 'Deliveried',
        'dabihuy' => 'Canceled'
        );
    }
    public function get_status_array_vi()
    {
        return array(
        'chualienlac' => 'Chưa liên lạc',
        'chuagiao' => 'Chưa giao',
        'dagiao' => 'Đã giao',
        'dabihuy' => 'Đã bị hủy'
        );
    }
    public function get_status_en()
    {
        $tmp = self::get_status_array_en();
        switch($this->order_status)
        {
            case 'chualienlac':
                return $tmp['chualienlac'];
            case 'chuagiao':
                return $tmp['chuagiao'];
            case 'dagiao':
                return $tmp['dagiao'];
            case 'dabihuy':
                return $tmp['dabihuy'];
        }
        return 'unknown';
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
    public function add_or_update_item_count($painting_id=0, $count=0)
    {
        //first get order_detail_list
        self::get_order_detail_list();
        //
        foreach($this->order_detail_list as $item)
        {
            if($item->get_product_obj()->id==$painting_id)
            {
                //cong don sl vao
                $item->order_count =$count;
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
    /**
     * Order_model::validate_rc()
     * Kiểm tra thông tin người nhận
     * @return void
     */
    public function validate_rc()
    {
        $re = array();
        if($this->order_rc_address=='')
        {
            array_push($re,'rc_address_fail');
        }
        if($this->order_rc_phone=='')
        {
            array_push($re,'rc_phone_fail');
        }
        if($this->order_rc_fullname=='')
        {
            array_push($re,'rc_fullname_fail');
        }
        if($this->get_shippingfee_obj()==null)
        {
            array_push($re,'shippingfee_fail');
        }
        return $re;
    }
    public function validate($max_item_can_order=3)
    {
        $re = array();
        if(sizeof($this->get_order_detail_list())<=0)
        {
            array_push($re,'rong_fail');
        }
        //validate instock count
        foreach($this->get_order_detail_list() as $item)
        {
            //first reload product to ensure data refresh
            $item->get_product_obj()->load();
            //get instock count
            $in_stock_c = $item->get_product_obj()->art_count;
            if($item->order_count>$in_stock_c || $item->order_count>$max_item_can_order)
            {
                array_push($re,$item->get_product_obj()->id.'_count_fail');
                //set to wanted value
                if($in_stock_c>=1)//must done
                {
                    
                    $item->order_count = min($in_stock_c,$max_item_can_order);
                    
                }
            }
        }
        return $re;
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
        $this->db->select('order_rc_address');
        $this->db->select('order_rc_phone');
        $this->db->select('order_rc_fullname');
        $this->db->where('id',$this->id);
        $this->db->where('special',$this->special);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->order_total = $row->order_total;
            $this->order_status =$row->order_status;
            $this->order_online_payment =$row->order_online_payment;
            $this->order_rc_address = $row->order_rc_address;
            $this->order_rc_phone = $row->order_rc_phone;
            $this->order_rc_fullname = $row->order_rc_fullname;
            return true;
        }
        return false;
    }
    public function add()
    {
        //force get customer before add
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
        //cộng ngược sl sản phẩm nếu cần thiết
        if($this->need_update_product_count==true)
        {
            foreach($this->get_order_detail_list() as $item)
            {
                $tmpp= $item->get_product_obj();
                $tmpp->art_count +=$item->order_count;
                $tmpp->update();
            }
        }
        //update extend var
            //prepare data
            $data = array(
                   'order_total' => $this->order_total,
                   'order_online_payment' => $this->order_online_payment,
                   'order_status' => $this->order_status,
                   'order_rc_address' => $this->order_rc_address,
                   'order_rc_phone' => $this->order_rc_phone,
                   'order_rc_fullname' => $this->order_rc_fullname
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
                       'order_customer_user_id' => $this->get_customer_user_obj()==null?0:$this->get_customer_user_obj()->id
                    );
                //echo 'cid: '.$this->get_customer_user_obj()->id;
                //echo 'id: '.$this->id;
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
            if($this->order_user_ready==true)
            {
                $data = array(
                       'order_user_id' => $this->get_user_obj()==null?0:$this->get_user_obj()->id
                    );
                
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
            if($this->order_shippingfee_ready==true)
            {
                $data = array(
                       'order_shippingfee_id' => $this->get_shippingfee_obj()==null?0:$this->get_shippingfee_obj()->id
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
    public function search_count($id='',$customer_name='', $status='', $date_from_yyyyMMdd='', $date_to_yyyyMMdd='', $total_from=0, $total_to=0)
    {
        return sizeof(self::search_return_list_id(
            $id,$customer_name,$status,$date_from_yyyyMMdd,$date_to_yyyyMMdd,$total_from,$total_to
        ));
    }
    public function to_obj_list($list_id=array())
    {
        $re = array();
        foreach($list_id as $item)
        {
            $obj = new Order_model;
            $obj->id=$item;
            $obj->load();
            array_push($re,$obj);
        }
        return $re;
    }
    protected function search_return_list_id($id='',$customer_name='', $status='', $date_from_yyyyMMdd='', $date_to_yyyyMMdd='', $total_from=0, $total_to=0, $order_by='id', $order_rule='desc', $start_point=0, $count=-1)
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
    public function search($id='',$customer_name='', $status='', $date_from_yyyyMMdd='', $date_to_yyyyMMdd='', $total_from=0, $total_to=0, $order_by='id', $order_rule='desc', $start_point=0, $count=-1)
    {
        $list = self::search_return_list_id(
            $id,$customer_name,$status,$date_from_yyyyMMdd,$date_to_yyyyMMdd,$total_from,$total_to,$order_by,$order_rule,$start_point,$count
        );
        return self::to_obj_list($list);
    }
    
}