<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Qd_slider {
    public static function get_slider_list($slider_setting_key='slider_category')
    {
        $CI =& get_instance();
        //my class
        $CI->load->model('Post_model');
        $CI->load->model('Cat_model');
        $CI->load->model('Setting_model');
        //library
        //db
        $CI->load->database();
        //get catgory from setting
        $cat_id = $CI->Setting_model->get_by_key($slider_setting_key);
        //get obj
        $cat = new Cat_model;
        $cat->id = $cat_id;
        $cat->load();
        //get list post from cat_id
        $list = $cat->get_post_list_obj();
        //return
        return $list;
    }
    
}