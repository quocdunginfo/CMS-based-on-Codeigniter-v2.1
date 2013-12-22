<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Hoàn tất đặt hàng</h2>
    <div class="content_half float_l" style="width:auto">
        Đơn hàng của quý khách đang được xử lý. Các thông tin đặt hàng đã được chúng tôi gửi mail đến cho quý khách.<br>
        Xin quý khách kiểm tra các thông tin, nếu có sai sót xin liên hệ với chúng tôi.<br>
        Mọi thắc mắc xin gửi <a href="<?=site_url($_com.'contact')?>">phản hồi</a> trực tiếp đến chúng tôi.<br>
        XIN CẢM ƠN QUÝ KHÁCH ĐÃ MUA SẮM VỚI CỬA HÀNG BIGFOOT!
    </div>
</div>
<?php
$this->load->view($_tpl.'footer');