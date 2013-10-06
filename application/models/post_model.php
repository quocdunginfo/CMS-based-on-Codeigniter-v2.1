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
    private $_tbn = "post";
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
            $cat_obj_list_tmp = array();
            $this->db->select("cat_id");
            $this->db->where("post_id",$this->id);
            $this->db->from("post_category");
            $query_tmp = $this->db->get();;
            foreach($query_tmp->result() as $row)
            {
                $cat_obj_tmp = new Cat_model;
                $cat_obj_tmp->id = $row->cat_id;
                $cat_obj_tmp->load();
                array_push($cat_obj_list_tmp,$cat_obj_tmp);
                
            }
            $this->cat_obj_list = $cat_obj_list_tmp;
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
        //build new_cat_list for recursive search
        $new_cat_list = $cat_list_id;
        if($cat_recursive==true)
        {
            foreach($cat_list_id as $cat_id)
            {
                $cat_tmp = new Cat_model;
                $cat_tmp->id = $cat_id;
                $cat_obj_list_tmp = $cat_tmp->get_cat_tree($cat_tmp->id,0,$special);
                foreach($cat_obj_list_tmp as $cat_obj)
                {
                    echo "*";
                    array_push($new_cat_list,$cat_obj->id);
                }
            }
        }
        //build main query
        $this->db->select($this->_tbn.'.id');
        $this->db->from($this->_tbn);
        $this->db->like($this->_tbn.'.title',$title);
        $this->db->like($this->_tbn.'.content',$content);
        $this->db->like($this->_tbn.'.content_lite',$content);
        if($count>=0)
        {
            $this->db->limit($count,$start_point);
        }
        if($active!=-1)
        {
            $this->db->where($this->_tbn.'.active',$active);
        }
        if($special!=-1)
        {
            $this->db->where($this->_tbn.'.special',$special);
        }
        if($user_id!=-1)
        {
            $this->db->where("user_id",$user_id);
        }
        //join
        $this->db->distinct();
        $this->db->join("post_category",$this->_tbn.".id=post_category.post_id","left");
        $this->db->join("user",$this->_tbn.".user_id=user.id","left");

        if(sizeof($new_cat_list)>0)
        {
            $this->db->where_in("post_category.cat_id",$new_cat_list);
        }
        $this->db->order_by($order_by,$order_rule);
        //get result
        $query = $this->db->get();
        $re = array();
        foreach($query->result() as $row)
        {
            $post=new Post_model;
            $post->id=$row->id;
            $post->load();
            array_push($re, $post);
        }
        return $re;
    }
}
?>