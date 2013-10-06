<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('header.php');
?>

            <!-- Help -->
            <div class="grid_12">
                <div class="module">
                        <h2><span>Help content</span></h2>
                        
                        <div class="module-body">
                        	<p>
                            1. Tôi có thêm bài viết mới nhưng website không hiển thị bài viết này trên giao diện?
                            <br />
                            => Kiểm tra "cache time" trong cài đặt, click nút "Delete caches" để refresh website.
                            <br />
                            2. Tôi muốn đóng website lại tạm thời vì mục đích nào đó như: bảo trì hệ thống, backup dữ liệu ?
                            <br />
                            => Setting->System option->Maintain model->Chọn "ON"->Save
                            <br />
                            3. Sau thời gian dài sử dụng, thư mục "upload" chứa những hình ảnh không còn sử dụng nữa, tôi muốn xóa những hình đó đi ?
                            <br />
                            => Media->Media function->Click "Validate"
                            <br />
                            4. Tôi không muốn cho người dùng gửi phải hồi thông qua trang "Contact" ?
                            <br />
                            => Setting->Special options->Allow guest to send feedback via "Contact" page on menu->Chọn "OFF"->Save
                            <br />
                            5. Website bị SPAM phản hồi từ trang "Contact", tôi muốn bật chế độ mã an toàn ?
                            <br />
                            => Setting->Special options->Require guest to type CAPTCHA code when sending feedback (avoid SPAM)->Chọn "ON"->Save
                            </p>
                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
<?php
require_once('footer.php');
?>