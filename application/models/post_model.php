<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_model extends CI_Model {
    public $id=0;
    public $title   = '';
    public $content = '';
    public $date_create    = '';
    public $date_modify    = '';
    public $content_lite='';
    public $active=1;
    public $special=0;
    public $avatar='';
    //non-table
    protected $_tbn = "post";
    //external
    private $user_obj=null;
        private $user_obj_ready = false;
    private $cat_obj_list=array();
        private $cat_obj_list_ready = false;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('qd_text_helper');
    }
    public function set_user_obj($user_obj=null)
    {
        if($user_obj!=null)
        {
            if(!$user_obj->is_exist())
            {
                return false;
            }
        }
        $this->user_obj = $user_obj;
        $this->user_obj_ready=true;
    }
    public function get_user_obj()
    {
        if($this->user_obj_ready==true)
        {
            return $this->user_obj;
        }
        $this->user_obj_ready=true;
        //load external user_obj
            $this->db->select("user_id");
            $this->db->from("post");
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $user_obj_tmp = new User_model;
                $user_obj_tmp->id = $row->user_id;
                $user_obj_tmp->load(); 
                //assign
                $this->user_obj = $user_obj_tmp;
                return;
            }
    }
    public function set_cat_obj_list($cat_obj_list=array())
    {
        $this->cat_obj_list=array();
        foreach($cat_obj_list as $cat_obj)
        {
            if($cat_obj->is_exist())
            {
                //ton tai moi them vao
                array_push($this->cat_obj_list,$cat_obj);
            }
        }
        $this->cat_obj_list_ready=true;
    }
    public function get_cat_obj_list()
    {
        if($this->cat_obj_list_ready==true)
        {
            return $this->cat_obj_list;
        }
        //lazy loading
        $this->cat_obj_list_ready=true;
        //get external cat list
            $this->cat_obj_list=array();
            $this->db->select("cat_id");
            $this->db->where("post_id",$this->id);
            $this->db->from("post_category");
            $query_tmp = $this->db->get();;
            foreach($query_tmp->result() as $row)
            {
                $cat_obj_tmp = new Cat_model;
                $cat_obj_tmp->id = $row->cat_id;
                $cat_obj_tmp->load();
                array_push($this->cat_obj_list,$cat_obj_tmp);
                
            }
        return $this->cat_obj_list;
    }
    public function add_to_cat_obj_list($cat_obj=null)
    {
        //call lazy loading before using external obj
            if($this->cat_obj_list_ready==false)
            {
                self::get_cat_obj_list();
            }
        //avoid null
            if($cat_obj==null) return false;
        //check cat exist in database
            if(!$cat_obj->is_exist()) return false;
        
        //check exist in cat_obj_list
            foreach($this->cat_obj_list as $cat_tmp)
            {
                if($cat_tmp->id==$cat_obj->id)
                {
                    return false;
                }
            }
        //add to cat_obj_list
            array_push($this->cat_obj_list,$cat_obj);
        return true;
    }
    public function remove_from_cat_obj_list($cat_obj=null)
    {
        //call lazy loading before using
            if($this->cat_obj_list_ready==false)
            {
                self::get_cat_obj_list();
            }
        //avoid null
            if($cat_obj==null) return false;
        //check cat exist in database
            if(!$cat_obj->is_exist()) return false;
        //init new array
            $tmp = array();
        //moving to new array
            foreach($this->cat_obj_list as $cat_tmp)
            {
                if($cat_tmp->id!=$cat_obj->id)
                {
                    //add to tmp array
                    array_push($tmp,$cat_tmp);
                }
            }
        //re assign
            $this->cat_obj_list = $tmp;
        return true;
    }
    public function load()
    {
        //init new lazy state for refresh data change
            $this->cat_obj_list_ready=false;
            $this->user_obj_ready=false;
        //load
            $this->db->where('id',$this->id);
            $query = $this->db->get($this->_tbn);       
            foreach($query->result() as $row)
            {
                $this->id=$row->id;
                $this->title=$row->title;
                //$this->title_for_url = qd_locdautiengviet($item->title);
                $this->content=$row->content;
                $this->content_lite=$row->content_lite;
                $this->active=$row->active;
                $this->special=$row->special;
                $this->avatar=$row->avatar;            
                $this->date_create=$row->date_create;
                $this->date_modify=$row->date_modify;            
                return true;
            }
        return false;
    }
    public function is_exist()
    {
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        return $query->num_rows()>0?true:false;
    }
    
    public function update()
    {
        //call lazy before update
            if($this->cat_obj_list_ready==false)
            {
                self::get_cat_obj_list();
            }
            if($this->user_obj_ready==false)
            {
                self::get_user_obj();
            }
        $data = array(
               'title' => $this->title,
               'content' => $this->content,
               'active' => $this->active,
               'avatar' => $this->avatar,
               'special' => $this->special,
               'date_modify' => date('Y-m-d H:i:s'),
               'date_create' => $this->date_create,
               'content_lite' => $this->content_lite
            );
        $this->db->where('id', $this->id);
        $this->db->update($this->_tbn, $data);
        //update external user_obj
            $data = array(
                'user_id' => $this->user_obj == null ?0:$this->user_obj->id
            );
            $this->db->where('id', $this->id);
            $this->db->update($this->_tbn, $data);
        //update external cat_obj_list
            //delete current cat map
            $this->db->where("post_id",$this->id);
            $this->db->from("post_category");
            $this->db->delete();
            //build new cat map
            foreach($this->cat_obj_list as $cat_obj_tmp)
            {
                $data_tmp = array(
                    "post_id" => $this->id,
                    "cat_id" => $cat_obj_tmp->id
                );
                $this->db->insert("post_category",$data_tmp);
            }
        //finish
    }
    public function add()
    {        
        //add new blank record
        $this->db->set('active', 1);
        $this->db->insert($this->_tbn);
        //get max id
        $this->id=self::get_max_id();
        //set date create
        $this->date_create = date('Y-m-d H:i:s');
        //call update function
        $this->update();
    }
    public function get_max_id()
    {
        $this->db->select_max('id');
        $this->db->where('special',$this->special);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            return $row->id;
        }
        return 0;
    }
    public function delete()
    {
        $this->db->where('id', $this->id);
        $this->db->delete($this->_tbn);
        //delete in post_category
        $this->db->where('post_id',$this->id);
        $this->db->delete('post_category');
    }
    
    public function search($title='', $content='', $content_lite="", $active=-1,
     $special=-1, $cat_list_id = array(), $cat_recursive=false, $user_id=-1,
     $order_by="post.id", $order_rule="desc", $start_point=0, $count=-1)
    {
        
    }
    protected function filter_like($id_array=null, $key='id', $value='')
    {
        $re=array();
        //validate
        if(is_array($id_array) && sizeof($id_array)<=0)
        {
            return $re; 
        }
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->like($key,$value);
        $this->db->where('special',$this->special);
        if(is_array($id_array))
        {
            $this->db->where_in('id',$id_array);
        }
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            array_push($re,$row->id);    
        }
        return $re;
    }
    protected function filter_range($id_array=null, $key='id', $value_from=0, $value_to=0)
    {
        $re=array();
        //validate
        if(is_array($id_array) && sizeof($id_array)<=0)
        {
            return $re; 
        }
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->where($key.' >=',$value_from);
        $this->db->where($key.' <=',$value_to);
        $this->db->where('special',$this->special);
        if(is_array($id_array))
        {
            $this->db->where_in('id',$id_array);
        }
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            array_push($re,$row->id);    
        }
        return $re;
    }
    protected function filter_exact($id_array=null, $key='id', $value='')
    {
        $re=array();
        //validate
        if(is_array($id_array) && sizeof($id_array)<=0)
        {
            return $re;
        }
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->where($key,$value);
        $this->db->where('special',$this->special);
        if(is_array($id_array))
        {
            $this->db->where_in('id',$id_array);
        }
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            array_push($re,$row->id);    
        }
        return $re;
    }
    protected function to_obj_list($id_array=array())
    {
        $re=array();
        
        if(is_array($id_array))
        {
            foreach($id_array as $tmp)
            {
                $obj=new Post_model;
                $obj->id = $tmp;
                $obj->load();
                array_push($re,$obj);                
            }
        }
        return $re;
    }
}
?>