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
    public $optional1='';
    public $optional2='';
    protected $avatar='';//can be set, lúc nào cũng ở dạng CSDL
    protected $avatar_thumb='';//get only, lúc nào cũng ở dạng CSDL
    //non-table
    protected $_tbn = "post";
    protected $_tbn2 = "post_category";
    //external
    protected $user_obj=null;
        protected $user_obj_ready = false;
    protected $cat_obj_list=array();
        protected $cat_obj_list_ready = false;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('qd_text_helper');
    }
    public function get_avatar_file_name()
    {
        self::filter_avatar(0);
        if($this->avatar=='')
        {
            return '';
        }
        return basename($this->avatar);
    }
    /**
     * Post_model::get_avatar_thumb()
     * Lấy ra URL hình ảnh dạng root path
     * @return
     */
    public function get_avatar()
    {
        self::filter_avatar(1);
        self::filter_avatar(0);
        return $this->avatar;
    }
    /**
     * Post_model::get_avatar_thumb()
     * Lấy ra URL hình ảnh thumb dạng root path
     * @return
     */
    public function get_avatar_thumb()
    {
        self::filter_avatar(1);
        self::filter_avatar(0);
        return $this->avatar_thumb;
    }
    /**
     * Post_model::set_avatar()
     * Truyền vô url dạng full, vd: http://....
     * @return void
     */
    public function set_avatar($url='')
    {
        $this->avatar=$url;
        self::filter_avatar(1);
        return true;
    }
    public function set_user_obj($user_obj=null)
    {
        if($user_obj!=null && !$user_obj->is_exist())
        {
            $this->user_obj = null;           
        }
        else
        {
            $this->user_obj = $user_obj;
        }
        return $this->user_obj_ready=true;
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
                if(!$user_obj_tmp->is_exist())
                {
                    break;
                }
                $user_obj_tmp->load(); 
                //assign
                $this->user_obj = $user_obj_tmp;
            }
        return $this->user_obj;
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
            $this->db->distinct();
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
                $this->optional1=$row->optional1;
                $this->optional2=$row->optional2;
                $this->avatar=$row->avatar;      
                $this->date_create=$row->date_create;
                $this->date_modify=$row->date_modify;            
                return true;
            }
        return false;
    }
    public function is_exist($id=-1)
    {
        $this->db->where('id',$id==-1?$this->id:$id);
        $query = $this->db->get($this->_tbn);
        return $query->num_rows()>0?true:false;
    }
    
    public function update()
    {
        //pre filter avatar
        self::filter_avatar(0);
        self::filter_avatar(1);
        
        $data = array(
               'title' => $this->title,
               'content' => $this->content,
               'active' => $this->active,
               'avatar' => $this->avatar,
               'special' => $this->special,
               'optional1' => $this->optional1,
               'optional2' => $this->optional2,
               'date_modify' => date('Y-m-d H:i:s'),
               'date_create' => $this->date_create,
               'content_lite' => $this->content_lite
            );
        $this->db->where('id', $this->id);
        $this->db->update($this->_tbn, $data);
        //update external user_obj
            if($this->user_obj_ready==true)
            {
                $data = array(
                    'user_id' => $this->get_user_obj() == null ?0:$this->get_user_obj()->id
                );
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn, $data);
            }
        //update external cat_obj_list
            if($this->cat_obj_list_ready==true)
            {
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
            }
        //resize image
        self::resize_avatar();
        //finish
        return true;
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
        //add new blank record
        $this->db->set('active', 1);
        $this->db->set('special', $this->special);
        $this->db->insert($this->_tbn);
        //get max id
        $this->id=self::get_max_id();
        //set date create
        $this->date_create = date('Y-m-d H:i:s');
        //call update function
        return self::update();
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
    public function delete($post_id=-1)
    { 
        $this->db->where('id',$post_id==-1?$this->id:$post_id);
        $this->db->delete($this->_tbn);
        //delete in post_category
        $this->db->where('post_id',$post_id==-1?$this->id:$post_id);
        $this->db->delete('post_category');
        
        return true;
    }
    public function search_count($title='', $content='', $content_lite="", $active=-1,
     $special=-1, $cat_list_id = null, $cat_recursive=false, $user_id=-1,
     $order_by="post.id", $order_rule="desc")
    {
        return sizeof(self::search($title,$content,$content_lite, $active,
     $special, $cat_list_id, $cat_recursive, $user_id,
     $order_by, $order_rule, 0, -1));
    }
    public function filter_cat_list_id($id_array=null, $cat_list_id=null, $cat_recursive=true)
    {
        //filter by cat_list_id
            $list = array();
            if($cat_list_id!=null)
            {
                //chuẩn bị list cat id
                if($cat_recursive===true)
                {
                    $cat_list_id = $this->Cat_model->find_recursive_cat_id($cat_list_id);
                    //var_dump($cat_list_id);  
                }
                //liệt kê tất cả các post id thuộc array cat trên
                $list = $this->Cat_model->get_post_id_from_cat($cat_list_id);
            }
            else
            {
                $list = null;//coi nhu khong tim kiem theo list          
            }
            if(is_array($list) && sizeof($list)<=0)
            {
                return array();
            }
        //filter in id_array
            $re=array();
            //validate
            if(is_array($id_array) && sizeof($id_array)<=0)
            {
                return $re; 
            }
            $this->db->select('id');
            $this->db->from($this->_tbn);
            if(is_array($id_array))
            {
                $this->db->where_in('id',$id_array);
            }
            if(is_array($list))
            {
                $this->db->where_in('id',$list);
            }
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                array_push($re,$row->id);    
            }
        return $re;         
    }        
    public function search($title='', $content='', $content_lite="", $active=-1,
     $special=-1, $cat_list_id = null, $cat_recursive=false, $user_id=-1,
     $order_by="post.id", $order_rule="desc", $start_point=0, $count=-1)
    {
        $list = array();
        
        $list = self::filter_cat_list_id(null ,$cat_list_id,$cat_recursive);
        
        //filter dần theo từng thuộc tính
        $list = self::filter_like($list,'title',$title);
        $list = self::filter_like($list,'content',$content);
        $list = self::filter_like($list,'content_lite',$content_lite);
        if($active>-1)
        {
            $list = self::filter_exact($list,'active',$active);
        }
        if($special>-1)
        {
            $list = self::filter_exact($list,'special',$special);
        }
        if($user_id>-1)
        {
            $list = self::filter_exact($list,'user_id',$user_id);
        }
        $re=array();
        if(sizeof($list)==0)
        {
            return $re;//tránh where in array rỗng
        }
        //select from sql again to order by
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->where_in('id',$list);
        $this->db->order_by($order_by,$order_rule);
        if($count>-1 && $start_point>=0)
        {
            $this->db->limit($count,$start_point);
        }
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {
            $obj = new Post_model;
            $obj->id = $row->id;
            $obj->load();
            array_push($re,$obj);
        }
        return $re;
    }
    public function filter_order_limit($id_array=null, $order_by='id', $order_rule='desc', $start_point=0, $count=-1)
    {
        $re=array();
        if(is_array($id_array) && sizeof($id_array)<=0)
        {
            return $re;//tránh where in array rỗng
        }
        //select from sql again to order by
        $this->db->select('id');
        $this->db->from($this->_tbn);
        if($id_array!=null)
        {
            $this->db->where_in('id',$id_array);
        }
        $this->db->order_by($order_by,$order_rule);
        if($count>-1 && $start_point>=0)
        {
            $this->db->limit($count,$start_point);
        }
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            array_push($re,$row->id);
        }
        return $re;
    }
    public function filter_by_cat_id($id_array=null,$cat_id=0)
    {
        return self::filter_cat_list_id($id_array,array($cat_id),false);
    }
    public function filter_by_cat_name($id_array=null, $cat_name='', $category_special=0)
    {
        //mảng các post_id thỏa mãn cat_name
        $re=array();
        //tim tat ca nhung category id co ten LIKE
        $obj=new Cat_model;
        $obj->special = $category_special;//search in normal category
        $id_cat_array = $obj->filter_like(null, 'name', $cat_name);
        //ung voi moi category id lay ds post
        foreach($id_cat_array as $cat_id)
        {
            $cat_tmp = new Cat_model;
            $cat_tmp->id = $cat_id;
            $cat_tmp->load();
            foreach($cat_tmp->get_post_list_id() as $post_id)
            {
                if(!in_array($post_id,$re))
                {
                    array_push($re,$post_id);
                }
            }
        }
        if($id_array!=null)
        {
            $final_array = array();
            //lọc AND giữa 2 array
            foreach($re as $id)
            {
                if(in_array($id,$id_array))
                {
                    array_push($final_array,$id);
                }
            }
            return $final_array;
        }
        else
        {
            return $re;
        }
        
    }
    public function filter_like($id_array=null, $key='id', $value='')
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
        if($this->special>-1)
        {
            $this->db->where('special',$this->special);
        }
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
    public function filter_range($id_array=null, $key='id', $value_from=0, $value_to=0)
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
        if($this->special>-1)
        {
            $this->db->where('special',$this->special);
        }
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
    public function filter_exact($id_array=null, $key='id', $value='')
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
        if($this->special>-1)
        {
            $this->db->where('special',$this->special);
        }
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
    public function to_obj_list($id_array=array())
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
    /**
     * Post_model::get_uncat_post_list_id()
     * Lấy array Post id không thuộc nhóm nào hết
     * @return void
     */
    public function filter_uncat($id_array=array())
    {
        $re = array();
        //validate
        if(is_array($id_array) && sizeof($id_array)<=0)
        {
            return $re;
        }
        $id_not_in = self::filter_by_cat_name(null,'',0);
        
        $this->db->select('id');
        $this->db->from($this->_tbn);
        $this->db->where_not_in('id',$id_not_in);
        if($this->special>-1)
        {
            $this->db->where('special',$this->special);
        }
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
    public function get_cat_list_text()
    {
        $re = '';
        foreach(self::get_cat_obj_list() as $item)
        {
            $re .=$item->name;
            $re .=', ';
        }
        return $re;
    }
    public function get_by_id($post_id=0)
    {
        $obj=new Post_model;
        $obj->id = $post_id;
        $obj->load();
        return $obj;
    }
    protected function filter_avatar($direction_in=1)
    {
        $prefix=$this->config->item('qd_tinymce_upload_domain');
        //replace avatar upload path
        if($direction_in==1)
        {    
            //for full URL
            $this->avatar = str_replace(
                $prefix.$this->config->item('qd_tinymce_upload_path'),
                $this->config->item('qd_tinymce_upload_path_replace'),
                $this->avatar);
            //for root path from domain
            $prefix='';
            $this->avatar = str_replace(
                $prefix.$this->config->item('qd_tinymce_upload_path'),
                $this->config->item('qd_tinymce_upload_path_replace'),
                $this->avatar);
        }
        else
        {
            $tmp = $this->avatar;
            $this->avatar = str_replace(
                $this->config->item('qd_tinymce_upload_path_replace'),
                $this->config->item('qd_tinymce_upload_path'),
                $tmp);
            //out có thêm thumb
            $this->avatar_thumb = str_replace(
                $this->config->item('qd_tinymce_upload_path_replace'),
                $this->config->item('qd_tinymce_upload_path_thumb'),
                $tmp);
        }
    }
    /**
     * Post_model::_image_resize()
     * Resize hình ảnh avatar, sử dụng đường dẫn tương đối từ application và avatar file_name
     * @param mixed $img_name
     * @return true , false
     */
    protected function resize_avatar()
    {
        try{
            $img_name = self::get_avatar_file_name();
            if($img_name=='') return false;
            $thumb_path = $this->config->item('qd_upload_path_thumb');
            $img_path = $this->config->item('qd_upload_path');
                    
            $re = $this->image_resize->load($img_path.$img_name);
            $this->image_resize->autofit($this->config->item('qd_upload_maxwidth_thumb'),$this->config->item('qd_upload_maxheight_thumb'));
            $this->image_resize->save($thumb_path.$img_name);
            return true;
        }catch(Exception $ex)
        {
            return false;
        }
    }
}
?>