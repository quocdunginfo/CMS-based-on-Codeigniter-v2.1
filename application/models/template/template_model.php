<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/post_model.php' );
class Template_model extends Post_model {
    public function __construct()
    {
        parent::__construct();
        $this->special = 5;
    }
    public function get_by_id($id=0)
    {
        $obj = new Template_model;
        $obj->id = $id;
        if(!$obj->is_exist())
        {
            return null;
        }
        $obj->load();
        return $obj;
    }
    public function get_path()
    {
        return $this->content_lite;
    }
    public function set_path($path='')
    {
        $this->content_lite = $path;
    }
    public function get_component()
    {
        return $this->content;
    }
    public function set_component($com='')
    {
        $this->content = $com;
    }
    public function get_name()
    {
        return $this->title;
    }
    public function set_name($name='')
    {
        $this->title = $name;
    }
    public function get_all()
    {
        $re = array();
        $list = parent::search();
        foreach($list as $obj)
        {
            $tmp = new Template_model;
            $tmp->id = $obj->id;
            $tmp->load();
            array_push($re,$tmp);
        }
        return $re;
    }
}
?>