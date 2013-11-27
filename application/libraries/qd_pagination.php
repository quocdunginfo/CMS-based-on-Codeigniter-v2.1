<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Qd_pagination {
    public $max_item_per_page = 1;
    public $current_page = 1;
    public $total_item = 1;
    public function set_max_item_per_page($number=1)
    {
        $this->max_item_per_page = $number;
    }
    public function set_current_page($number=1)
    {
        $this->current_page = $number;
    }
    public function set_total_item($number=1)
    {
        $this->total_item = $number;
    }
    public function set_base_url($base_url='', $uri_segment_num = 3)
    {
        $this->base_url = $base_url;
        $this->uri_segment_num = $uri_segment_num;
    }
    public $start_point;
    public $can_next_page;
    public $can_prev_page;
    public $can_first_page;
    public $can_last_page;
    public $total_page;
    public $base_url = '';
    private $uri_segment_num = 3;

    public function update()
    {
        try{
            $this->start_point = ($this->current_page - 1) * $this->max_item_per_page;
            if ($this->start_point < 0) $start_point = 0;
            $this->total_page = (int) ($this->total_item / $this->max_item_per_page + 1);
            if ($this->total_item % $this->max_item_per_page == 0)
            {
                $this->total_page--;
            }
            if ($this->total_page <= 0) $this->total_page = 1;
            $this->can_first_page = $this->current_page == 1 ? false : true;
            $this->can_last_page = $this->current_page == $this->total_page ? false : true;
            $this->can_next_page = $this->current_page < $this->total_page ? true : false;
            $this->can_prev_page = $this->current_page > 1 ? true : false;
            
            return true;
        }catch(Exception $e)
        {
            return false;
        }
    }
    public function generate_link($num_links=3)
    {
        $CI =& get_instance();
        $CI->load->library('pagination');
        //pagination
        $config['base_url'] = $this->base_url;
        $config['total_rows'] = $this->total_item;
        $config['per_page'] = $this->max_item_per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $num_links;
        $config['uri_segment'] = $this->uri_segment_num;
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }
}