<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Yêu cầu thanh toán</h2>
    <div class="content_half float_l" style="width:auto">
        <h3 style="line-height:normal">Chức năng thanh toán giỏ hàng chỉ cung cấp cho khách hàng đã đăng nhập hệ thống</h3>
        <br>
        <h3>
        <a href="<?=site_url($_com.'login')?>">
            <img src="images/login.png" style="max-height:50px;max-width:50px;">
                Đăng nhập bằng tài khoản có sẵn
                
            </a>
        </h3>
        <h3>
            <a href="<?=site_url($_com.'register')?>">
            <img src="images/register.png" style="max-height:50px;max-width:50px;">
                hoặc đăng ký mới ngay bây giờ
            </a>
        </h3>
       <input type="button" class="mybutton" value="Trở về" onclick="window.location.href='<?=site_url($_com.'cart')?>'">
        
    </div>

    <div class="cleaner h40"></div>
</div>

<?php
$this->load->view($_tpl.'footer');