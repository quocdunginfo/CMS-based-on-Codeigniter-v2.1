<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cat_model extends CI_Model {

    public $id = 0;
    public $name = '';
    public $date_create = '';
    public $date_modify = '';
    public $active=1;
    public $rank=0;
    public $special=0;
    public $description = '';
    //not-in-table
    public $level=0;
    protected $_tbn="category";
    protected $_tbn2="post_category";
    //external
    private $parent_cat_obj=null;
        private $parent_cat_obj_ready = false;//for lazy loading
    private $child_cat_list=array();
        private $child_cat_list_ready = false;//for lazy loading
    private $post_list=array();
        private $post_list_ready = false;//for lazy loading
    function __construct()
    {
        parent::__construct();
        $this->special=0;
        $this->load->database();
        $this->load->helper('qd_text_helper');
    }
    public function get_by_id($id=0)
    {
        $obj = new Cat_model;
        $obj->id = $id;
        if(!$obj->is_exist())
        {
            return null;
        }
        $obj->load();
        return $obj;
    }
    public function load()
    {
        //init new lazy state
            $this->parent_cat_obj_ready=false;
            $this->child_cat_list_ready=false;
            $this->post_list_ready=false;
        //load
        $this->db->where('id',$this->id);
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            $this->id=$row->id;
            $this->rank=$row->rank;
            $this->active=$row->active;
            $this->name=$row->name;
            $this->description = $row->description;
            $this->special=$row->special;
            $this->date_create=$row->date_create;
            $this->date_modify=$row->date_modify;
            return true;
        }
        return false;
    }
    
    /**
     * Cat_model::get_post_list_id()
     * Trả về array id các post thuộc category
     * @return
     */
    public function get_post_list_id()
    {
        if($this->post_list_ready==false)
        {
            self::get_post_list_obj();
        }
        //return array id
        $re = array();
        foreach($this->post_list as $obj)
        {
            array_push($re,$obj->id);
        }
        return $re;
    }
    /**
     * Cat_model::get_post_list_obj()
     * Lấy array Post obj thuộc Cat này
     * @return
     */
    public function get_post_list_obj()
    {
        if($this->post_list_ready==true)
        {
            return $this->post_list;
        }
        $this->post_list_ready = true;
        //init
        $this->post_list = array();
        //load post list
            $this->db->select("post_id");
            $this->db->distinct();
            $this->db->from($this->_tbn2);
            $this->db->where("cat_id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $obj_tmp = new Post_model;
                $obj_tmp->id = $row->post_id;
                $obj_tmp->load();
                array_push($this->post_list,$obj_tmp);
            }
        return $this->post_list;
    }
    function get_parent_cat_obj()
    {
        if($this->parent_cat_obj_ready==true)
        {
            return $this->parent_cat_obj;
        }
        $this->parent_cat_obj_ready = true;
        //load external parent cat
            $this->db->select("parent_id");
            $this->db->from($this->_tbn);
            $this->db->where("id",$this->id);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $cat_obj_tmp = new Cat_model;
                $cat_obj_tmp->id = $row->parent_id;
                $cat_obj_tmp->load();//root cat -1 will not load
                //assign
                $this->parent_cat_obj = $cat_obj_tmp;
                break;
            }
        return $this->parent_cat_obj;
    }
    public function is_exist($id=-1)
    {
        $this->db->select("id");
        $this->db->where("id",$id==-1?$this->id:$id);
        return $this->db->count_all_results($this->_tbn)>0?true:false;
    }
    function set_parent_cat_obj($cat_obj=null)
    {
        if($cat_obj!=null && !$cat_obj->is_exist())
        {
             $this->parent_cat_obj = null;
        }
        else
        {
            $this->parent_cat_obj = $cat_obj;
        }
        //set lazy state
        return $this->parent_cat_obj_ready=true;
    }
    function get_child_cat_list($special=-1)
    {
        if($this->child_cat_list_ready==true)
        {
            return $this->child_cat_list;
        }
        $this->child_cat_list_ready = true;
        //load external direct childs cat
            $cat_obj_list_tmp = array();
            $this->db->select("id");
            $this->db->from($this->_tbn);
            $this->db->where("parent_id",$this->id);
            $this->db->order_by('rank asc, id asc');
            //filter by special
            if($special!=-1)
            {
                $this->db->where("special",$special);    
            }
            //get result
            $query_tmp = $this->db->get();
            foreach($query_tmp->result() as $row)
            {
                $cat_obj_tmp = new Cat_model;
                $cat_obj_tmp->id = $row->id;
                $cat_obj_tmp->load();
                array_push($cat_obj_list_tmp,$cat_obj_tmp);
            }
            //assign
            $this->child_cat_list=$cat_obj_list_tmp;
        return $this->child_cat_list;
    }
    private $_cat_tree_tmp = array();
    private function _get_cat_tree($root_cat_id=-1,$level=0,$special=-1)
    {
        $root_cat = new Cat_model;
        $root_cat->id = $root_cat_id;
        //root cat -1 can not call load
        //get childs
        $childs = $root_cat->get_child_cat_list($special);
        //return array
        foreach($childs as $cat)
        {
            //set level
            $cat->level=$level;
            //add to list
            array_push($this->_cat_tree_tmp,$cat);
            //call recursive for current child
            self::_get_cat_tree($cat->id,$level+1,$special);
        }
        return $this->_cat_tree_tmp;
    }
    public function get_cat_tree($root_cat_id=-1,$level=0,$special=-1)
    {
        $re = self::_get_cat_tree($root_cat_id,$level,$special);
        //reset varible for next use in future
        $this->_cat_tree_tmp = array();
        return $re;
    }
    /**
     * Cat_model::get_prefix_name()
     * Item phải có level trước
     * @param string $separate
     * @return void
     */
    public function get_prefix_name($separate='--')
    {
        $_prefix = '';
        for($i=1;$i<=$this->level;$i++)
        {
            $_prefix .=$separate;
        }
        return $_prefix.$this->name;
    }
    function update()
    {
        $array = array(
            'name' => $this->name,
            'rank' => $this->rank,
            'special' => $this->special,
            'active' => $this->active,
            'description' => $this->description,
            'date_create' => $this->date_create,
            'date_modify' => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$this->id);
        $this->db->update($this->_tbn,$array);
        //update external parent cat
            //nếu có sự thay đổi trên parent mới cập nhật
            if($this->parent_cat_obj_ready==true)
            {
                $array = array(
                    'parent_id' => $this->parent_cat_obj==null || $this->parent_cat_obj->id<=0?-1:$this->parent_cat_obj->id
                );
                $this->db->where('id',$this->id);
                $this->db->update($this->_tbn,$array);
            }
    }
    function delete($delete_post=0)
    {
        $cat_id=$this->id;
        //delete post first
        if($delete_post==1)
        {
            foreach(self::get_post_list_obj() as $item)
            {
                $item->delete();
            }
        }
        //delete in category
        $this->db->where('id',$cat_id);
        $this->db->delete($this->_tbn);
        //unlink in post_category
        $this->db->where('cat_id',$cat_id);
        $this->db->delete($this->_tbn2);
        
        return true;
    }
    function add()
    {
        //add new blank record
        $this->db->set('active', 1);
        $this->db->insert($this->_tbn);
        //get max id
        $this->id = self::get_max_id();
        //set date
        $this->date_create = date('Y-m-d H:i:s');
        //auto set rank=id when add
        $this->rank=$this->id;
        //call update
        $this->update();
        //finish
    }
    public function get_max_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get($this->_tbn);
        foreach($query->result() as $row)
        {
            return $row->id;
        }
    }
    private function filter_data()
    {
        $this->name= strip_tags($this->name);
    }
    public function delete_resursive($delete_post=true,$special=-1)
    {
        //can not delete root cat -1
            if($this->id==-1) return false;
        //check exist
            if(!$this->is_exist()) return false;
        //get child cat first
            $child_cat = self::get_child_cat_list($special);
        //delete posts of current cat if need
            if($delete_post==true)
            {
                $child_post = $this->Post_model->search("","","",-1,$special,array($this->id),false);
                foreach($child_post as $post)
                {
                    $post->delete();
                }
            }
        //delete current cat
            self::delete();
            //foreach child cat, call back delete_recursive on it
            foreach($child_cat as $cat_obj_tmp)
            {
                $cat_obj_tmp->delete_resursive($delete_post,$special);
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
    public function filter_date_range($id_list=null,$key='date_create', $date_from_yyyyMMdd='',$date_to_yyyyMMdd)
    {
        if(is_array($id_list) && sizeof($id_list)<=0)
        {
            return $id_list;   
        }
        $sql = 'select `id` from `category` WHERE DATE_FORMAT(`'.$key.'`,\'%Y%m%d\')>='.$date_from_yyyyMMdd.' AND DATE_FORMAT(`'.$key.'`,\'%Y%m%d\')<='.$date_to_yyyyMMdd;
        if($id_list!=null)
        {
            $sql .=' AND `id` IN ('.implode(",",$id_list).')';
        }
        $query = $this->db->query($sql);
        $re=array();
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
                $obj=new Cat_model;
                $obj->id = $tmp;
                $obj->load();
                array_push($re,$obj);                
            }
        }
        return $re;
    }
    public function search_count($name='', $active=-1,
     $special=-1)
    {
        return sizeof(
            self::search_return_id(
                $name,$active,$special
                )
        );
    }
    public function search($name='', $active=-1,
     $special=-1, $order_by="id", $order_rule="desc", $start_point=0, $count=-1)
     {
        return self::to_obj_list(
            self::search_return_id(
            $name,$active,$special,$order_by,$order_rule,$start_point,$count
            )
        );
     }
    protected function search_return_id($name='', $active=-1,
     $special=-1, $order_by="id", $order_rule="desc", $start_point=0, $count=-1)
    {
        $list = array();
        $list = self::filter_like(null,'name',$name);
        if($active>-1)
        {
            $list = self::filter_exact(null,'active',$active);
        }
        if($active>-1)
        {
            $list = self::filter_exact(null,'special',$special);
        }
        $list = self::filter_order_limit($list,$order_by,$order_rule,$start_point,$count);
        return $list;
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
    /**
     * Cat_model::find_recursive_cat_id()
     * INPUT: cat_id array, OUTPUT: cat_id array con cháu của INPUT, không trùng id
     * @param mixed $cat_list_id
     * @return
     */
    public function find_recursive_cat_id($cat_list_id=array())
    {
        $cat_list_id_tmp = array();
        $cat_obj_tmp = new Cat_model;
        foreach($cat_list_id as $item)
        {
            //id k tồn tại => bỏ qua
            if(!self::is_exist($item))//becareful
            {
                continue;
            }
            //get obj
            $cat_obj_tmp->id = $item;
            $cat_obj_tmp->load();
            //xét nhóm cha trước
            if(!in_array($cat_obj_tmp->id,$cat_list_id_tmp))
            {
                array_push($cat_list_id_tmp,$cat_obj_tmp->id);
            }
            //xét nhóm con sau
            foreach($cat_obj_tmp->get_child_cat_list() as $cat_tmp2)
            {
                if(!in_array($cat_tmp2->id,$cat_list_id_tmp))
                {
                    array_push($cat_list_id_tmp,$cat_tmp2->id);
                }   
            }
        }
        return $cat_list_id_tmp;
    }
    /**
     * Cat_model::get_post_id_from_cat()
     * Lấy array post_id trực thuộc (con trực tiếp) của array cat_id
     * @param mixed $cat_list_id
     * @return void
     */
    public function get_post_id_from_cat($cat_list_id=array())
    {
        $re= array();
        $obj = new Cat_model;
        foreach($cat_list_id as $id)
        {
            $obj->id=$id;
            $obj->load();
            foreach($obj->get_post_list_obj() as $post)
            {
                if(!in_array($post->id,$re))
                {
                    array_push($re,$post->id);
                }
            }
        }
        return $re;
    }
    public function is_contain_post($post_id=0)
    {
        $this->db->select('cat_id');
        $this->db->where('post_id',$post_id);
        $this->db->where('cat_id',$this->id);
        return $this->db->count_all_results($this->_tbn2)>0?true:false;      
    }
    public function rank_up()
    {
        //lấy cat id của cha
        $parent_obj = self::get_parent_cat_obj();
        $parent_id = $parent_obj==null || $parent_obj->id==-1?-1:$parent_obj->id;
        //chọn category có cùng nhóm cha nhưng có rank nhỏ hơn và gần nhất
        $this->db->select('id');
        $this->db->select('rank');
        $this->db->from($this->_tbn);
        $this->db->where('parent_id',$parent_id);
        $this->db->where('special',$this->special);
        $this->db->where('rank <',$this->rank);
        $this->db->order_by('rank desc, id desc');
        $this->db->limit(1,0);
        $q = $this->db->get();
        foreach($q->result() as $row)
        {
            $tmp_id = $row->id;
            $tmp_rank = $row->rank;
            //hoán đổi rank cho nhau
                $data = array(
                'rank' => $this->rank
                );
                $this->db->where('id', $tmp_id);
                $this->db->update($this->_tbn,$data);
                //
                $data = array(
                'rank' => $tmp_rank
                );
                $this->db->where('id', $this->id);
                $this->db->update($this->_tbn,$data);
            return true;
        }
        return false;
    }
}
?>