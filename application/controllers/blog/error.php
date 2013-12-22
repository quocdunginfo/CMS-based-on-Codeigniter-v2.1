<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/blog/home.php');
class Error extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - 404 error';
    }
    public function _404()
    {
        $this->_data['error_title'] = 'Lỗi 404 không tìm thấy trang';
        $this->_data['error_message'] = 'Kiểm tra lại đường dẫn URL đã đúng!';
        
        parent::_view('error',$this->_data);
    }
    public function _maintain_mode()
    {
        $this->_data['error_title'] = 'Hệ thống đang tạm ngừng để bảo trì! Vui lòng quay lại sau';
        $this->_data['error_message'] = '';
        
        parent::_view('error',$this->_data);
    }
}