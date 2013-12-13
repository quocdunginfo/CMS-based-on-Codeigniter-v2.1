<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('front/header');
?>
<div id="content" class="float_r">
    <h2>Xác nhận thông tin đơn hàng</h2>
    <table width="680px" cellspacing="0" cellpadding="5">
        <tbody>
            <tr bgcolor="#ddd">
                <th width="70" align="center">Hình ảnh</th>
                <th align="center">Tên sản phẩm</th>
                <th width="60" align="center">Số lượng</th>
                <th width="90" align="right">Đơn giá</th>
                <th width="110" align="right">Tổng cộng</th>

            </tr>
            <tr>
                <td colspan="7">
                    
                </td>
            </tr>
            <?php foreach($giohang->get_order_detail_list() as $item) { ?>
            <tr>
                <td>
                    <img src="<?=$item->get_product_obj()->get_avatar_thumb()?>" alt="image 3" style="max-width:70px; max-height:70px;">
                </td>
                <td align="center">
                    <?=$item->get_product_obj()->title?>
                </td>
                
                <td align="center">
                    <?=$item->order_count?>
                </td>
                <td align="right"><?=$item->get_order_unit_price()?>   VNĐ</td>
                <td align="right"><?=$item->get_total_string()?>  VNĐ</td>
                
            </tr>
            <?php } ?>
            <tr>
                
                <td colspan="4" align="right" style="font-weight: bold">Tổng tiền trên sản phẩm (1):</td>
                <td align="right" style="font-weight: bold;font-size:12px;">
                <?=$giohang->get_order_total_unsave_string()?> VNĐ</td>
            </tr>
            <tr>
                
                <td colspan="4" align="right" style="font-weight: bold">Phí vận chuyển (2):</td>
                <td align="right" style="font-weight: bold; font-size:12px;">
                <?=$giohang->get_shippingfee_obj()->get_fee()?>  VNĐ</td>
            </tr>
            <tr>
                
                <td colspan="4" align="right" style="font-weight: bold">Tổng tiền cần thanh toán = (1) + (2):</td>
                <td align="right" style="font-weight: bold;font-size:12px;">
                <?=$giohang->get_order_total_include_shipping_fee_string()?>  VNĐ</td>
            </tr>
        </tbody>
    </table>
    <div class="cleaner h40"></div>
    <!-- thông tin người nhận -->
    <div id="contact_form" style="width:auto">
        <h3 style="border-bottom:double 1px #2f2f2f;padding:5px;width:660px">Thông tin người nhận</h3>    
        <form method="post" name="contact" action="/tmdtud/FrontCart/Payment" onsubmit="document.location='/tmdtud/FrontCart/Payment'">

                <label style="width:auto">Họ và tên:</label>
                <input type="text" class="required input_field" value="<?=$giohang->order_rc_fullname?>" style="float:left; box-shadow: 0px 0px 2px grey;" readonly="readonly">
                
                <div class="cleaner h10"></div>

                <label style="width:auto">Số điện thoại:</label>
                <input type="text" class="input_field" value="<?=$giohang->order_rc_phone?>" style="float:left; box-shadow: 0px 0px 2px grey;" readonly="readonly">
                
                <div class="cleaner h10"></div>

                <label style="width:auto">Địa chỉ:</label>
                <input type="text" class="input_field" value="<?=$giohang->order_rc_address?>" style="float:left; box-shadow: 0px 0px 2px grey;" readonly="readonly">
                
                <div class="cleaner h10"></div>
                <label style="width:auto">Tỉnh/Thành Phố:</label>
                 <input type="text" class="input_field" value="<?=$giohang->get_shippingfee_obj()->name?>" style="float:left; box-shadow: 0px 0px 2px grey;" readonly="readonly">
                <div class="cleaner h10"></div>
                <label style="width:auto">Hình thức thanh toán</label>
                <input type="text" class="input_field" value="<?=$giohang->get_order_online_payment_vi()?>" style="float:left;box-shadow: 0px 0px 2px grey;" readonly="readonly">
                
                <div class="cleaner h10"></div>
               <input class="submit_btn" type="button" value="Hoàn tất đơn hàng" onclick="document.location='<?=site_url('front/cart/payment')?>'" style="width: 150px;float: right;margin-right: 405px;">
               <input type="button" class="submit_btn" value="Trở về" onclick="window.location.href='<?=site_url('front/cart/checkout')?>'" style="width:80px">
                <div class="cleaner h10"></div>
            </form>
        </div>
    <div class="cleaner h40"></div>
</div>
<?php
$this->load->view('front/footer');