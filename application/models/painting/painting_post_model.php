<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/post_model.php' );
class Painting_post_model extends Post_model {
    //extended varible
    public $art_width=0;//=>art_width
    public $art_height=0;//=>art_height
    public $art_sizeunit='cm';//=>art_sizeunit
    public $art_price=0;//=>//=>art_price
    public $art_sold=0;//=>art_sold
    public $art_id='';//=>art_id
    public $art_count='';//=>art_id
    //Alias
    public function get_description()
    {
        return $this->content;
    }
    //Alias
    public function set_description($value)
    {
        $this->content = $value;
    }
    //external
    private $cat_material_list=array();
        private $cat_material_list_ready = false;
    private $cat_painting_list=array();
        private $cat_painting_list_ready = false;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->special=2;
    }
    public function get_cat_material_list()
    {
        if($this->cat_material_list_ready==true)
        {
            return $this->cat_material_list;
        }
        $this->cat_material_list_ready=true;
        //load cat list
            //load cat list
            $this->cat_material_list=array();
            foreach(parent::get_cat_obj_list() as $item)
            {
                if($item->special==3)
                {
                    array_push($this->cat_material_list,$item);
                }
            }
        return $this->cat_material_list;
    }
    public function get_art_price()
    {
        return number_format($this->art_price,0,'.',',');
    }
    public function get_cat_painting_list()
    {
        if($this->cat_painting_list_ready==true)
        {
            return $this->cat_painting_list;
        }
        $this->cat_painting_list_ready=true;
        //load cat list
            $this->cat_painting_list=array();
            foreach(parent::get_cat_obj_list() as $item)
            {
                if($item->special==2)
                {
                    array_push($this->cat_painting_list,$item);
                }
            }
        return $this->cat_painting_list;
    }
    public function load()
    {
        //call parent load
        parent::load();
        //init new lazy state for refresh data change
            $this->cat_material_list_ready=false;
            $this->cat_painting_list_ready=false;
        //extend var get
        $this->db->select('art_height');
        $this->db->select('art_width');
        $this->db->select('art_price');
        $this->db->select('art_sizeunit');
        $this->db->select('art_sold');
        $this->db->select('art_id');
        $this->db->select('art_count');
        $this->db->where('id',$this->id);
        $this->db->where('special',$this->special);
        $query = $this->db->get('post');
        foreach($query->result() as $row)
        {
            $this->art_height = $row->art_height;
            $this->art_width =$row->art_width;
            $this->art_price =$row->art_price;
            $this->art_sizeunit =$row->art_sizeunit;
            $this->art_sold=$row->art_sold;
            $this->art_id=$row->art_id;
            $this->art_count=$row->art_count;
            break;
        }  
    }
    public function get_cat_material_list_text()
    {
        $i=0;
        $text ='';
        $len = sizeof(self::get_cat_material_list());
        for($i=0;$i<$len;$i++)
        {
            $text.=$this->cat_material_list[$i]->name;
            if($i<$len-1)
            {
                $text.=', ';
            }
        }
        return $text;
    }
    public function get_cat_painting_list_text()
    {
        $i=0;
        $text ='';
        $len = sizeof(self::get_cat_painting_list());
        for($i=0;$i<$len;$i++)
        {
            $cat_obj = $this->cat_painting_list[$i];
            $text.=$cat_obj->name;
            if($i<$len-1)
            {
                $text.=', ';
            }
        }
        return $text;
    }
    public function clone_to_top()
    {
        //first: force to load all external first
        self::get_user_obj();
        self::get_cat_obj_list();
        //then delete curent
        self::delete();
        //finally call add
        return self::add();
    }
    public function add()
    {        
        //first: add new blank record
        $this->db->set('active', 1);
        $this->db->set('special', $this->special);
        $this->db->insert('post');
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
        //filter first
        self::filter(1);
        //call parent update
        parent::update();
        //update extend var
            //pre generate art_id
            if($this->art_id=='')
            {
                $this->art_id='RAW'.$this->id;
            }
            //prepare data
            //to ensure art_count always >=0
            if($this->art_count<0)
            {
                $this->art_count=0;
            }
            //to ensure art_price always >=0
            if($this->art_price<0)
            {
                $this->art_price=0;
            }
            $data = array(
                   'art_height' => $this->art_height,
                   'art_width' => $this->art_width,
                   'art_price' => $this->art_price,
                   'art_sizeunit' => $this->art_sizeunit,
                   'art_sold' => $this->art_sold,
                   'art_id' => $this->art_id,
                   'art_count' => $this->art_count
                );
            
            $this->db->where('id', $this->id);
            $this->db->update('post', $data);
    }
    
    public function filter($direction_in=1)
    {
        if($direction_in==1)
        {
            $this->art_price = str_replace(' ','',$this->art_price);
            $this->art_price = str_replace(',','',$this->art_price);
        }
        else
        {
            $this->art_price='0'.$this->art_price;
            $this->art_price = number_format($this->art_price,0,'.',',');
        }   
    }
    public function search_count($title='', $description='', $art_id='', $material_name='', $cat_list_id=null,$cat_recursive=true,$cat_material_id=-1 ,$category_name='', $art_price_from=0, $art_price_to=0, $art_sold=-1, $active=1)
    {
        return sizeof(
        self::search_return_id(
            $title, $description, $art_id, $material_name, $cat_list_id,$cat_recursive,$cat_material_id ,$category_name, $art_price_from, $art_price_to, $art_sold, $active
        )
        );
    }
    public function search($title='', $description='', $art_id='', $material_name='', $cat_list_id=null,$cat_recursive=true,$cat_material_id=-1 ,$category_name='', $art_price_from=0, $art_price_to=0, $art_sold=-1, $active=1, $start_point=0, $count=-1, $order_by='id', $order_rule='desc')
    {
        return self::to_obj_list(
        self::search_return_id(
        
            $title, $description, $art_id, $material_name, $cat_list_id,$cat_recursive,$cat_material_id ,$category_name, $art_price_from, $art_price_to, $art_sold, $active, $start_point, $count, $order_by,$order_rule
        )
        );
    }
    public function delete($post_id=-1)
    {
        //xem co bi dinh khoa ngoai trong order hay khong
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->where('order_product_id',$post_id==-1?$this->id:$post_id);
        $q = $this->db->get();
        foreach($q->result() as $row)
        {
            $obj = new Order_detail_model;
            $obj->id = $row->id;
            return $obj->get_order_obj()->id;
        }
        parent::delete($post_id==-1?$this->id:$post_id);
        return 0;
    }
    protected function search_return_id($title='', $description='', $art_id='', $material_name='', $cat_list_id=null,$cat_recursive=true,$cat_material_id=-1 ,$category_name='', $art_price_from=0, $art_price_to=0, $art_sold=-1, $active=1, $start_point=0, $count=-1, $order_by='id', $order_rule='desc')
    {
        $id_array=parent::filter_cat_list_id(null,$cat_list_id,$cat_recursive);
        $id_array=parent::filter_like($id_array,'title',$title);
        $id_array=parent::filter_like($id_array,'content',$description);//Alias
        $id_array=parent::filter_like($id_array,'art_id',$art_id);
        if($art_price_from>0 || $art_price_to>0)
        {
            $id_array=parent::filter_range($id_array,'art_price',$art_price_from,$art_price_to);
        }
        if($art_sold>-1)
        {
            $id_array=parent::filter_exact($id_array,'art_sold',$art_sold);
        }
        if($active>-1)
        {
            $id_array=parent::filter_exact($id_array,'active',$active);
        }
        //filter lan` 2 theo material
        if($cat_material_id>-1 && $cat_material_id!='')
        {
            $id_array=self::filter_by_material_id($id_array,$cat_material_id);
        }
        //order_by limit
        $id_array = parent::filter_order_limit($id_array,$order_by,$order_rule,$start_point,$count);
        
        return $id_array;
        
    }
    public function get_by_id($post_id=0)
    {
        $obj=new Painting_post_model;
        $obj->id = $post_id;
        $obj->load();
        return $obj;
    }
    public function to_obj_list($id_array=array())
    {
        $re=array();
        
        if(is_array($id_array))
        {
            foreach($id_array as $tmp)
            {
                $obj=new Painting_post_model;
                $obj->id = $tmp;
                $obj->load();
                array_push($re,$obj);                
            }
        }
        return $re;
    }
    public function filter_by_cat_name($id_array=null, $cat_name='')
    {
        return parent::filter_by_cat_name($id_array,$cat_name,2);
    }
    public function filter_by_painting_cat_name($id_array=null, $cat_name='')
    {
        return parent::filter_by_cat_name($id_array,$cat_name,2);
    }
    public function filter_by_material_cat_name($id_array=null, $cat_name='')
    {
        return parent::filter_by_cat_name($id_array,$cat_name,3);
    }
    public function filter_by_material_id($id_array=null, $cat_id=0)
    {
        return parent::filter_by_cat_id($id_array,$cat_id);
    }
    public function filter_best_seller($id_array=null)
    {
        $re=array();
        //lay ds tat ca order
        $orders = $this->Order_model->search();
        //
        foreach($orders as $order)
        {
            //
            foreach($order->get_order_detail_list() as $detail)
            {
                $product = $detail->get_product_obj();
                //neu id_array khac null thi phai nam trong id_array
                if($id_array!=null && is_array($id_array))
                {
                    if(!in_array($product->id,$id_array))
                    {
                        continue;//bo qua
                    }
                }
                $product->art_count = $detail->order_count;//xem nhu sl ban
                //neu co trong re thi + don sl ban vao
                $found = false;
                foreach($re as $tmp)
                {
                    if($tmp->id==$product->id)
                    {
                        $tmp->art_count +=$product->art_count;
                        $found=true;
                        break;//xu ly xong sp hien tai
                    }
                }
                //chua co trong re thi add vao
                if(!$found)
                {
                    array_push($re,$product);
                }
            }
        }
        //sap xep lai re theo art_count cua item
        $new_ = array();
        
        foreach($re as $item) 
        {
            echo $item->id.' - '.$item->title.' - '.$item->art_count.'<br>';
        }
        return;
        for($i=0;$i<sizeof($re);$i++)
        {
            //tim max
            $max_item = null;
            $max_value=-1;
            foreach($re as $item)
            {
                if($item->art_count>$max_value && !in_array($item->id, $new_))
                {
                    $max_value = $item->art_count;
                    $max_item = $item;
                }
            }
            //add vo array moi
            array_push($new_, $max_item->id);
            echo $i;
        }
        //finish
        return $new_;
    }
}
?>