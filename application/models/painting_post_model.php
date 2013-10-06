<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('post_model.php');
class Painting_post_model extends Post_model {
    //extended varible
    var $art_width=0;
    var $art_height=0;
    var $art_sizeunit='cm';
    var $art_price=0;
    var $art_sold=0;
    var $art_id='';
    
    //external
    var $cat_material_list=array();
    var $cat_painting_list=array();
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->special=2;
    }
    public function get_by_id($post_id)
    {
        $obj = parent::get_by_id($post_id);
        if($obj==null) return null;
        
        $re = new Painting_post_model;
        $re->id = $obj->id;
        $re->title = $obj->title;
        $re->content = $obj->content;
        $re->content_lite = $obj->content_lite;
        $re->avatar = $obj->avatar;
        $re->avatar_thumb = $obj->avatar_thumb;
        $re->date_create = $obj->date_create;
        $re->date_modify = $obj->date_modify;
        $re->active = $obj->active;
        $re->special = $obj->special;
        $re->user_id = $obj->user_id;
        $re->cat_list = $obj->cat_list;
        
        //extend var get
        $this->db->select('art_height');
        $this->db->select('art_width');
        $this->db->select('art_price');
        $this->db->select('art_sizeunit');
        $this->db->select('art_sold');
        $this->db->select('art_id');
        $this->db->where('id',$post_id);
        $query = $this->db->get('post');
        foreach($query->result() as $row)
        {
            $re->art_height = $row->art_height;
            $re->art_width = $row->art_width;
            $re->art_price = $row->art_price;
            $re->art_sizeunit = $row->art_sizeunit;
            $re->art_sold = $row->art_sold;
            $re->art_id = $row->art_id==''?'RAW'.$re->id:$row->art_id;
            break;
        }
        //get painting cat
        $sql='select id from category where id in
        (
        select cat_id from post_category where post_id = '.$re->id.'
        )
        and special=2';
        $query = $this->db->query($sql);
        foreach($query->result() as $row)
        {
            array_push($re->cat_painting_list,$this->Cat_model->get_by_id($row->id));
        }
        //get material cat
        $sql='select id from category where id in
        (
        select cat_id from post_category where post_id = '.$re->id.'
        )
        and special=3';
        $query = $this->db->query($sql);
        foreach($query->result() as $row)
        {
            array_push($re->cat_material_list,$this->Cat_model->get_by_id($row->id));
        }
        
        $re->filter(0);
        return $re;        
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
        $this->db->insert('post');
        //second: get latest id from table
        $this->db->select_max('id');
        $query = $this->db->get('post');
        $id_max=0;
        foreach($query->result() as $row)
        {
            $id_max=$row->id;
            break;
        }
        $this->id=$id_max;
        //new one set date create
        $this->date_create = date('Y-m-d H:i:s');
        //then: call update function
        self::update();
        //finish
    }
    public function update()
    {
        //call parent update
        //echo 'painting_post_update'.'<br>';
        parent::update();
        //update extend var
        //filter first
        self::filter(1);
        if($this->art_id=='')
        {
            $this->art_id='RAW'.$this->id;
        }
        $data = array(
               'art_height' => $this->art_height,
               'art_width' => $this->art_width,
               'art_price' => $this->art_price,
               'art_sizeunit' => $this->art_sizeunit,
               'art_sold' => $this->art_sold,
               'art_id' => $this->art_id
            );
        
        $this->db->where('id', $this->id);
        $this->db->update('post', $data);
    }
    /**
     * Painting_post_model::get_by_cat()
     * L?y array post object theo cat_id
     * 
     * @param integer $cat_id
     * @param integer $start_point
     * @param integer $count
     * @param integer $active -1(all), 0, 1
     * @return array obj
     */
    function get_by_cat($cat_id=-1, $start_point=0, $count=-1, $active=-1, $special=0)
    {
        if($cat_id==-1)
        {
            $this->db->select('id');
            if($special!=-1)
            {
                $this->db->where('special',$special);
            }
            $this->db->order_by("id", "desc");
            if($active!=-1) $this->db->where('active',$active);
            $this->db->distinct();
            if($count>-1)
            {
                if($start_point<0) $start_point=0;
                $this->db->limit($count, $start_point);
            }
            $query = $this->db->get('post');
            
            $re = array();
            if($query->num_rows()<=0) return $re;
            foreach($query->result() as $row)
            {
                array_push($re, $this->get_by_id($row->id));
            }
            return $re;
        }
        
        //option 2
        $this->db->select('post_id');
        $this->db->order_by("post_id", "desc");
        $this->db->distinct();
        if($cat_id!=-1)
        {
            $this->db->where('cat_id',$cat_id);
        }
        
        if($count>-1)
        {
            if($start_point<0) $start_point=0;
            $this->db->limit($count, $start_point);
        }
        $query = $this->db->get('post_category');
        
        $re = array();
        if($query->num_rows()<=0) return $re;
        foreach($query->result() as $row)
        {
            array_push($re, $this->get_by_id($row->post_id));
        }
        return $re;
    }
    /**
     * Painting_post_model::get_by_cat_recursive()
     * L?y t?t c? post thu?c v? category nào dó (k? c? post thu?c category con)
     * 
     * @param integer $cat_id
     * @param integer $start_point (offset)
     * @param integer $count (-1: get all, 0, 1, ...)
     * @param integer $active (-1: ignore, 0, 1)
     * @param integer $special (-1: ignore, 0, 1, 2, ...)
     * @return array post_model obj (order by id desc)
     */
    public function get_by_cat_recursive($cat_id=-1, $start_point=0, $count=-1, $active=-1, $special=0)
    {
        if($cat_id==-1)
        {
            return self::get_by_cat($cat_id,$start_point,$count,$active,$special);
        }
        //Thuat toan sau chi dung khi post thuoc ve it nhat 1 category
        //list all child catgory
        $cat_list = $this->Cat_model->get_cat_tree($cat_id,0,$special);
        //include current cat if $cat_id!=-1
        array_push($cat_list,array('id'=>$cat_id));
        
        
        $post_re = array();
        foreach($cat_list as $cat)
        {
            //xet $count cho recusive
            //if($count>-1 && $count-sizeof($post_re)<=0) break;
            //$count_tmp = $count;==-1?$count:$count-sizeof($post_re);
            
            $post_list = self::get_by_cat($cat['id'],0,-1,$active,$special);
            //add all post in post_list to post_obj
            foreach($post_list as $post)
            {
                $trung_post_id=false;
                //dam bao khong bi trung post id trong $post_re do post co the thuoc nhieu cat
                foreach($post_re as $post_test)
                {
                    if($post->id==$post_test->id)
                    {
                        $trung_post_id=true;
                        break;
                    }
                }
                if(!$trung_post_id)
                {
                    array_push($post_re,$post);
                }
            }
        }
        //sort result by id desc
        for($i=0;$i<sizeof($post_re)-1;$i++)
        {
            for($j=sizeof($post_re)-1;$j>=$i;$j--)
            {
                if($post_re[$i]->id <= $post_re[$j]->id)
                {
                    $tmp = $post_re[$i];
                    $post_re[$i]=$post_re[$j];
                    $post_re[$j]=$tmp;
                }
            }
        }
        
        $new_post_re=array();
        //cat post_re theo $count
        if($count>-1)
        {
            for($i=$start_point;$i<$start_point+$count&&$i<sizeof($post_re);$i++)
            {
                array_push($new_post_re,$post_re[$i]);
            }
            return $new_post_re;
        }
        else
        {
            return $post_re;
        }
        
    }
    public function filter($direction_in=1)
    {
        //echo 'painting_post_filter'.$direction_in.'<br>';
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
    public function get_by_multi_cat_recursive($cat_list = array(),$start_point=0,$count=-1,$active=-1,$special=-1)
    {
        $post_list = array();
        foreach($cat_list as $cat_id)
        {
            $post_list_tmp = self::get_by_cat_recursive($cat_id,0,-1,$active,$special);
            //dam bao khong bi trung post id trong $post_re do post co the thuoc nhieu cat
            foreach($post_list_tmp as $post)
            {
                $trung_post_id=false;
                foreach($post_list as $post_test)
                {
                    if($post->id==$post_test->id)
                    {
                        $trung_post_id=true;
                        break;
                    }
                }
                if(!$trung_post_id)
                {
                    array_push($post_list,$post);
                }
            }
        }
        //sort result by id desc
        for($i=0;$i<sizeof($post_list)-1;$i++)
        {
            for($j=sizeof($post_list)-1;$j>=$i;$j--)
            {
                if($post_list[$i]->id <= $post_list[$j]->id)
                {
                    $tmp = $post_list[$i];
                    $post_list[$i]=$post_list[$j];
                    $post_list[$j]=$tmp;
                }
            }
        }
        
        $new_post_re=array();
        //cat post_re theo $count
        if($count>-1)
        {
            for($i=$start_point;$i<$start_point+$count&&$i<sizeof($post_list);$i++)
            {
                array_push($new_post_re,$post_list[$i]);
            }
            return $new_post_re;
        }
        else
        {
            return $post_list;
        }
    }
    public function search($title='', $content_lite='', $art_id='', $art_price_from=-1, $art_price_to=-1, $art_sold=0, $start_point=0, $count=-1, $active=1, $special=0)
    {
        $this->db->select('id');
        $this->db->from('post');
        $this->db->like('title',$title);
        $this->db->like('content_lite',$content_lite);
        $this->db->like('art_id',$art_id);
        if($art_price_from!=-1 && $art_price_to!=-1)
        {
            $this->db->where('art_price >= ',$art_price_from);
            $this->db->where('art_price <= ',$art_price_to);
        }
        if($art_sold!=-1)
        {
            $this->db->where('art_sold',$art_sold);
        }
        if($count>=0)
        {
            $this->db->limit($count,$start_point);
        }
        if($active!=-1)
        {
            $this->db->where('active',$active);
        }
        if($special!=-1)
        {
            $this->db->where('special',$special);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $re = array();
        foreach($query->result() as $row)
        {
            array_push($re,self::get_by_id($row->id));
        }
        return $re;
    }
    public function search_count($title='', $content_lite='', $art_id='', $art_price_from=-1, $art_price_to=-1, $art_sold=0, $active=1, $special=0)
    {
        return sizeof(self::search($title,$content_lite,$art_id,$art_price_from,$art_price_to,$art_sold,0,-1,$active,$special));
    }
}
?>