<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('dashboard.php');
class Admin_media extends Dashboard {
    public function __construct()
    {
        parent::__construct();
        
        $this->_check_login();
        $this->data['html_title'].=' - Media';
    }
    public function index($state='null',$unlink_count=0)
    {
        //check permission
        if($this->session->userdata('media_view')!=1)
        {
            $this->data['state']='media_view';
            
            $this->load->view('admin/dashboard/view_fail',$this->data);
            return;
        }
        
        $this->data['state']=$state;
        
        $this->data['unlink_count']=$unlink_count;
        
        
        
        $this->load->view('admin/dashboard/media',$this->data);
    }
    public function validate()
    {
        //check permission
        if($this->session->userdata('media_edit')!=1)
        {
            $this->data['state']='media_edit';
            $this->load->view($this->avp.'view_fail',$this->data);
            return;
        }
        
        $ignore_array =array('index.php','index.html','.htaccess');
        $count=0;
        $filename_array = get_filenames($this->config->item('qd_upload_path'));
        foreach($filename_array as $filename)
        {
            
            if(in_array($filename,$ignore_array)) continue;
            
            $search_string = $this->config->item('qd_tinymce_upload_path_replace').$filename;
            if($this->is_exist_in_allpost_content($search_string))
            {
                //do not thing
            }
            else
            {
                //remove media
                
                unlink($this->config->item('qd_upload_path').$filename);
                unlink($this->config->item('qd_upload_path_thumb').$filename);
                $count++;
            }
        }
        //redirect to media
        //redirect('admin_media/index/validate_ok/'.$count);
        $this->index('validate_ok',$count);
    }
    private function is_exist_in_allpost_content($string)
    {
        //run sql direct for speed
        $this->db->select('id');
        $this->db->like('content', $string);
        $this->db->or_like('avatar', $string); 
        $this->db->from('post');
        $numrow = $this->db->count_all_results();
        return $numrow>0?true:false;
    }
}