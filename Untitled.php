<?php
class Post
{
    //pre_set
    private $Z_TB='post';//Table Name
    private $Z_PK='id';//Table PK
    //properties
    public $id=0;
    public $title='';
    public $content='';
    //external
    public $_categories=array();//array objects
    public $_user=null;
    
    public function load_by_id()
    {
        //load info by $this->id
        $this->id='';
        $this->content='';
        $this->_categories = array();
        $this->_user=null;
    }
    public function update()
    {
        //check external object
        if($this->_user!=null)
        {
            if(!$this->_user->is_exist())
            {
                //if external object is not exist then create new one
                $this->_user->add();
            }
            else
            {
                //if external object is exist then update
                $this->_user->update();
            }
        }
        foreach($this->_categories as $category)
        {
            if($category!=null)
            {
                if(!$category->is_exist())
                {
                    //if external object is not exist then create new one
                    $category->add();
                }
                else
                {
                    //if external object is exist then update
                    $category->update();
                }
            }
        }
        //end check external object
        
        //update external link
        //end update external link
        
        //update properties
        //end update properties
    }
    public function add()
    {
        //create new blank record
        
        //assign back id
        
        //call update method
        self::update();
    }
    public function delete()
    {
        //delete base on $this->id
        $this->db->where('id',$this->id);
        $this->db->delete($this->Z_TB);
    }
    public function get_max_id()
    {
        $this->db->select_max('id');
        $re = $this->db->get($this->Z_TB);
        foreach($re as $r)
        {
            return $r->id;
        }
        return -1;
    }
    private function add_blank_record()
    {
        $this->db->add();
    }
}
