<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Liên hệ</h2>
    <div class="content_half float_l">
            <p>Chúng tôi luôn quan tâm đến những góp ý, phản hồi từ Quý khách hàng để đem đến cho Quý khách hàng những sản phẩm và dịch vụ tốt nhất.</p>
            <p>Xin quý khách vui lòng nhập thông tin vào các ô bên dưới và nhấn nút gửi. Chúng tôi sẽ trả lời trong thời gian sớm nhất!</p>
            <div id="contact_form">
                <form method="post" name="contact" action="<?=site_url($_com.'contact/submit') ?>">
                        <?php if($current_user==null) { ?>
                        <label for="author">Họ tên:</label>
                        <input type="text" id="author" name="name" class="required input_field" value="<?=$feedback0->get_guest_name() ?>">
                        <sup style="color: red; float: right">*</sup>
                        <span style="color: red; float: left">
                        <?php
                        if(in_array('name_fail',$state))
                        {
                            echo 'Không hợp lệ';
                        }
                        ?>
                        </span>
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" class="validate-email required input_field" value="<?=$feedback0->get_guest_email() ?>"><sup style="color: red; float: right">*</sup>
                        <span style="color: red; float: left">
                        <?php
                        if(in_array('email_fail',$state))
                        {
                            echo 'Không hợp lệ';
                        }
                        ?>
                        </span>
                        <div class="cleaner h10"></div>
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" name="phone" id="phone" class="input_field" value="<?=$feedback0->get_guest_phone() ?>">
                        <?php } ?>
                    <div class="cleaner h10"></div>
                    <label for="email">Tiêu đề:</label>
                    <input type="text" name="title" class="validate-email required input_field" value="<?=$feedback0->get_title() ?>"><sup style="color: red; float: right">*</sup>
                    <span style="color: red; float: left">
                    <?php
                        if(in_array('title_fail',$state))
                        {
                            echo 'Không hợp lệ';
                        }
                        ?>
                    </span>

                    <div class="cleaner h10"></div>
                    <label for="text">Nội dung thông điệp:</label>
                    <textarea id="text" name="content" rows="0" cols="0" class="required"><?=$feedback0->get_content() ?></textarea><sup style="color: red; float: right">*</sup>
                    <span style="color: red; float: left">
                    <?php
                        if(in_array('content_fail',$state))
                        {
                            echo 'Không hợp lệ';
                        }
                        ?>
                    </span>
                    <div class="cleaner h10"></div>
                    <?php if($require_captcha) { ?>
                    <label for="khachhang_captcha">
                    Mã bảo vệ:
                    <strong style="font-size: 16px; "><?=$captcha_value?></strong>
                    </label>
                    <input type="text" name="<?=$captcha_name?>" class="input_field" style="width: 110px; float: left" value="">
                    <sup style="color: red; float: left">*</sup>
                    <br>
                    <br>
                    <span style="color: red; float: left">
                    </span>
                    <div class="cleaner h10"></div>
                    <?php } ?>

                    <input type="submit" class="submit_btn" name="submit" id="submit" value="Gửi phản hồi">

                </form>
            </div>    </div>
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