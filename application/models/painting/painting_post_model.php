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
        self::filter(0);       
    }
    public function get_cat_material_list_text()
    {
        $i=0;
        $text ='';
        $len = sizeof($this->cat_material_list);
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
        $len = sizeof($this->cat_painting_list);
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
        //call parent update
        parent::update();
        //update extend var
            //filter first
            self::filter(1);
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
    public function search($title='', $description='', $art_id='', $material_name='', $category_name='', $art_price_from=0, $art_price_to=0, $art_sold=-1, $active=1, $start_point=0, $count=-1)
    {
        $id_array=parent::filter_like(null,'title',$title);
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
        //trim array
        if($count>-1)
        {
            $id_array = array_slice($id_array, $start_point, $count);    
        }
        else if($start_point>=0)
        {
            $id_array = array_slice($id_array, $start_point);
        }
        
        return self::to_obj_list($id_array);
        
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
}
?>