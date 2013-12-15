<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin.php');
class Admin_media extends Admin {
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Media';
    }
    public function index($state='null',$unlink_count=0)
    {
        //check permission
        if(!in_array('media_view',$this->_permission))
        {
            self::_fail_permission('media_view');
            return;
        }
        
        $this->_data['state']=isset($this->_temp['state'])?(array)$this->_temp['state']:array();
        $this->_data['unlink_count'] = isset($this->_temp['unlink_count'])?(int)$this->_temp['unlink_count']:0;
        $this->load->view('admin/media',$this->_data);
    }
    public function validate()
    {
        //check permission
        if(!in_array('media_edit',$this->_permission))
        {
            self::_fail_permission('media_edit');
            return;
        }
        
        $ignore_array =array('index.php','index.html','.htaccess');
        $count=0;
        //chinh lai cho nay do trong config chua co qd_upload_path
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
        $this->_data['state']=array('validate_ok');
        $this->_data['unlink_count'] = $count;
        self::index();
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