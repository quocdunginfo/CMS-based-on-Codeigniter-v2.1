<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Thông tin người nhận hàng</h2>
    <div class="content_half float_l" style="width:auto">
        <p style="color:red;">(*) là thông tin bắt buộc</p>
        <div id="contact_form" style="width:auto">
            <form method="post" name="contact" action="<?=site_url($_com.'cart/checkout_submit')?>">

                <label style="width:auto">Họ và tên:</label>
                <input type="text" name="fullname" class="required input_field" value="<?=$giohang->order_rc_fullname?>" style="float:left">
                <sup style="color:red; float:left">* </sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('rc_fullname_fail',$state))
                {
                    echo 'Không hợp lệ!';    
                }
                ?>
                </span>
                <div class="cleaner h10"></div>

                <label style="width:auto">Số điện thoại:</label>
                <input type="text" name="phone" class="input_field" value="<?=$giohang->order_rc_phone?>" style="float:left">
                <sup style="color:red; float:left">* </sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('rc_phone_fail',$state))
                {
                    echo 'Không hợp lệ!';    
                }
                ?>
                </span>
                <div class="cleaner h10"></div>

                <label style="width:auto">Địa chỉ:</label>
                <input type="text" name="address" class="input_field" value="<?=$giohang->order_rc_address?>" style="float:left">
                <sup style="color:red; float:left">* </sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('rc_address_fail',$state))
                {
                    echo 'Không hợp lệ!';    
                }
                ?>
                </span>
                <div class="cleaner h10"></div>
                <label style="width:auto;">Tỉnh/Thành Phố (tính phí vận chuyển):</label>
                <label class="mylabel" style="display: initial">
                    <select name="shippingfee_id" style="width:280px">
                        <?php foreach($shippingfee_list as $item) { ?>
                        <option value="<?=$item->id?>">
                        <?=$item->name.' ('.$item->fee.' VNĐ)'?>
                        </option>
                        <?php } ?>
                    </select>
                </label>
                <div class="cleaner h10"></div>
                <label style="width:auto;">Hình thức thanh toán</label>
                <label class="mylabel" style="display:initial">
                <select name="online_payment" style="width:280px">
                   <option value="1">Thanh toán trực tuyến qua OnePay</option>
                    <option selected="selected" value="0">Thanh toán tại nhà</option>
                </select>
             </label>
                <div class="cleaner h10"></div>
                
                <input type="submit" class="submit_btn" name="submit" id="submit" value="Tiếp tục" style="width: 80px;float: right;margin-right: 12px;">
                <input type="button" class="submit_btn" value="Trở về" onclick="window.location.href='<?=site_url($_com.'cart')?>'" style="width:80px;">
                 <div class="cleaner h10"></div>
            </form>
        </div>
    </div>

    <div class="cleaner h40"></div>



</div>


<?php
$this->load->view($_tpl.'footer');