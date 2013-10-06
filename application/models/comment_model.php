<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model {

    var $id=0;
    var $title   = '';
    var $content = '';
    var $date_create    = '';
    var $date_modify    = '';
    var $user_id = 0;
    var $post_id=0;
    var $guest_email='';
    var $guest_name='';
    var $guest_ip='';
    var $active=1;
    
    //get only
    public $user_id_obj='';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Comment_model::get_by_id()
     * 
     * @param mixed $post_id
     * @return Comment_model object
     */
    function get_by_id($cmt_id)
    {
        $this->db->where('id',$cmt_id);
        $query = $this->db->get('comment');
        foreach($query->result() as $row)
        {
            $cmt = new Comment_model;
            $cmt->id=$row->id;
            $cmt->title=$row->title;
            $cmt->content=$row->content;
            $cmt->active=$row->active;
            $cmt->user_id=$row->user_id;
            $cmt->user_id_obj=$this->User_model->get_by_id($cmt->user_id);
            $cmt->post_id=$row->post_id;
            $cmt->date_create=$row->date_create;
            $cmt->date_modify=$row->date_modify;
            $cmt->guest_email=$row->guest_email;
            $cmt->guest_name=$row->guest_name;
            $cmt->guest_ip=$row->guest_ip;
            
            $this->filter_data();
            return $cmt;
        }
        return null;
    }
    function is_exist($cmt_id)
    {
        $this->db->where('id',$cmt_id);
        $query = $this->db->get('comment');
        return $query->num_rows()>0?true:false;
    }
    /**
     * Comment_model::get_by_post()
     * 
     * @param mixed $post_id
     * @return array of comment belong to post
     */
    function get_by_post($post_id,$start_point=0,$count=-1,$active=-1)
    {
        $this->db->select('id');
        if($post_id!=-1)
        {
            $this->db->where('post_id',$post_id);
        }
        if($count>=0)
        {
            $this->db->limit($count,$start_point);
        }
        if($active>=0)
        {
            $this->db->where('active',$active);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get('comment');
        
        $re = array();
        foreach($query->result() as $row)
        {
            $item = $this->get_by_id($row->id);
            array_push($re,$item);
        }
        return $re;
    }
    function count_by_post($post_id,$active=-1)
    {
        $this->db->select('id');
        if($post_id!=-1)
        {
            $this->db->where('post_id',$post_id);
        }
        
        if($active>=0)
        {
            $this->db->where('active',$active);
        }
        $this->db->from('comment');
        return $this->db->count_all_results();
    }
    
    function update()
    {
        $this->filter_data();
        $array = array(
            'title' => $this->title,
            'content' => $this->content,
            'active' => $this->active,
            'date_create' => $this->date_create,
            'date_modify' => date('Y-m-d H:i:s'),
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'guest_name' => $this->guest_name,
            'guest_email' => $this->guest_email,
            'guest_ip' => $this->guest_ip
        );
        $this->db->where('id',$this->id);
        $this->db->update('comment',$array);
    }
    function delete($cmt_id=-1)
    {
        if($cmt_id==-1) $cmt_id=$this->id;
        //delete
        $this->db->where('id',$cmt_id);
        $this->db->delete('comment');
    }
    function add()
    {
        //first: add new blank record
        $this->db->set('active', 1);
        $this->db->insert('comment');
        //second: get latest id from table
        $this->db->select_max('id');
        $query = $this->db->get('comment');
        $id_max=0;
        foreach($query->result() as $row)
        {
            $id_max=$row->id;
            break;
        }
        $this->id=$id_max;
        //then: call update function
        $this->date_create = date('Y-m-d H:i:s');
        //set date create
        $this->update();
        //finish
    }
    private function filter_data()
    {
        $this->title= strip_tags($this->title);
        $this->content= strip_tags($this->content);
        $this->guest_name= strip_tags($this->guest_name);
        $this->guest_email= strip_tags($this->guest_email);
    }
}
?>