<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/admin/home.php');
class Media extends Home {
    function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - Media';
    }
    public function index_()
    {
        parent::_add_active_menu(site_url($this->_com.'media/index_'));
        self::index();
    }
    public function index()
    {
        //check permission
        if(!in_array('media_view',$this->_permission))
        {
            self::_fail_permission('media_view');
            return;
        }
        
        $this->_data['state']=(array)$this->session->flashdata('state');
        $this->_data['unlink_count']=(int)$this->session->flashdata('unlink_count');
        
        parent::_add_active_menu(site_url($this->_com.'media/index'));
        parent::_view('media',$this->_data);
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
                try
                {
                    unlink($this->config->item('qd_upload_path').$filename);
                    unlink($this->config->item('qd_upload_path_thumb').$filename);
                    $count++;
                }catch(Exception $ex)
                {
                    //nothing
                }
            }
        }
        //redirect to media
        //parent::_redirect('media/index/validate_ok/'.$count);
        $this->session->set_flashdata('state', array('validate_ok'));
        $this->session->set_flashdata('unlink_count',$count);
        parent::_redirect('media/index');
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