<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Liên hệ</h2>
    <div class="content_half float_l">
            <p>Phản hồi của bạn đã được gửi đến chúng tôi. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất! Xin cảm ơn đã quan tâm đến sản phẩm của <a href="<?=site_url('front') ?>">BigFoot</a>.
            </p>    
    </div>
    <div class="content_half float_r">
        <h5>Địa chỉ cửa hàng BigFoot</h5>
        273 An Dương Vương, phường 3 quận 5
        <br>
        Thành phố Hồ Chí Minh<br>
        <br>

        Phone: 0909090999<br>
        Email: <a href="mailto:cuahangbantranh@gmail.com">cuahangbantranh@gmail.com</a><br>
        <div class="cleaner h40"></div>
    </div>
    <iframe width="680" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=273+an+d%C6%B0%C6%A1ng+v%C6%B0%C6%A1ng+ph%C6%B0%E1%BB%9Dng+3+qu%E1%BA%ADn+5&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=33.764224,75.673828&amp;ie=UTF8&amp;hq=&amp;hnear=273+An+D%C6%B0%C6%A1ng+V%C6%B0%C6%A1ng,+3,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=10.764846,106.680851&amp;spn=0.014756,0.029182&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
    <br>
    <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;geocode=&amp;q=273+an+d%C6%B0%C6%A1ng+v%C6%B0%C6%A1ng+ph%C6%B0%E1%BB%9Dng+3+qu%E1%BA%ADn+5&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=33.764224,75.673828&amp;ie=UTF8&amp;hq=&amp;hnear=273+An+D%C6%B0%C6%A1ng+V%C6%B0%C6%A1ng,+3,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=10.764846,106.680851&amp;spn=0.014756,0.029182&amp;z=15&amp;iwloc=A" style="color: #0000FF; text-align: left">Xem Bản đồ cỡ lớn hơn</a></small>

</div>
<?php
$this->load->view($_tpl.'footer');