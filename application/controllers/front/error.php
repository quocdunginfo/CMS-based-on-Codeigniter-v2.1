<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/controllers/front/home.php');
class Error extends Home {
    public function __construct()
    {
        parent::__construct();
        $this->_data['html_title'].=' - 404 error';
    }
    public function _404()
    {
        $this->_data['error_title'] = 'Lỗi 404 không tìm thấy trang';
        $this->_data['error_message'] = 'Kiểm tra lại đường dẫn URL đã đúng!<br> Hoặc nếu bạn nghĩ đây là lỗi hệ thống, bạn có thể gửi phản hồi qua trang <a href="'.site_url('front/contact').'">[Liên hệ]</a>';
        
        parent::_view('error',$this->_data);
    }
    public function _maintain_mode()
    {
        $this->_data['error_title'] = 'Hệ thống đang tạm ngừng để bảo trì! Vui lòng quay lại sau';
        $this->_data['error_message'] = '';
        
        parent::_view('error',$this->_data);
    }
}