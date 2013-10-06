<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('qd_delete_files'))
{
	function qd_delete_files($path = '',$recusive=true)
	{
		$count=0;
        $CI =& get_instance();
        $CI->load->helper('file');
		$ignore_array =array('index.php','index.html','.htaccess');
        $count=0;
        $filename_array = get_filenames($path);
        foreach($filename_array as $filename)
        {
            if(in_array($filename,$ignore_array)) continue;
            unlink($path.$filename);
            $count++;
        }
        return $count;
	}
}
?>