<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$this->load->view($_tpl.'header');
?>
<div style="width:680px">
	<a href="<?=site_url($_com)?>" title="Cửa hàng BigFoot" target="_blank"><img src="https://lh6.googleusercontent.com/-P2R_CIG6H7E/Upzdb6dcFmI/AAAAAAAAABY/rJJOpMz5wJo/w680-h353-no/CHIEW.gif" alt="<?=$html_title?>" style="margin-bottom:20px;max-height:110px"></a>
	<p style="margin-top:0px;margin-bottom:20px">
		Cám ơn bạn đã quan tâm sản phẩm Cửa hàng BigFoot. Đơn hàng của bạn đang được xử lý, chúng tôi sẽ liên hệ với bạn trong thời gian vòng 72 giờ kể từ khi nhận được email này.
	</p>
	<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
	<thead>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222" colspan="2">
			Chi tiết đơn hàng
		</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<b>Mã Đơn Hàng:</b> <?=$order0->id?><br>
			<b>Ngày Đặt:</b> <?=$order0->date_create?><br>
			<b>Phương thức thanh toán:</b><?=$order0->get_order_online_payment_vi()?><br>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<b>Họ tên khách hàng:</b> <?=$order0->get_customer_user_obj()->fullname?><br>
			<b>Email:</b><a href="mailto:<?=$order0->get_customer_user_obj()->email?>" target="_blank"><?=$order0->get_customer_user_obj()->email ?></a><br>
			<b>Điện thoại:</b> <?=$order0->get_customer_user_obj()->phone ?><br>
		</td>
	</tr>
	</tbody>
	</table>
	<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
	<thead>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">
			Địa chỉ nhận hàng
		</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<?=$order0->order_rc_address ?><br>
			<?=$order0->get_shippingfee_obj()->name ?><br>
			Việt Nam
		</td>
	</tr>
	</tbody>
	</table>
	<table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
	<thead>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">
			Mã sản phẩm
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">
			Tên sản phẩm
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:left;padding:7px;color:#222222">
			Kích thước
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">
			Số lượng
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">
			Giá
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;text-align:right;padding:7px;color:#222222">
			Tổng cộng
		</td>
	</tr>
	</thead>
	<tbody>
    <?php foreach($order0->get_order_detail_list() as $item) { ?>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<?=$item->get_product_obj()->art_id ?>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<?=$item->get_product_obj()->title ?>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<?=$item->get_product_obj()->art_width.' X '.$item->get_product_obj()->art_height.' ('.$item->get_product_obj()->art_sizeunit.')'?>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
			<?=$item->order_count ?>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
			<?=$item->get_order_unit_price() ?> VNĐ
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
			<?=$item->get_total_string() ?> VNĐ
		</td>
	</tr>
    <?php } ?>
	</tbody>
	
    
    
	<tfoot>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5">
			<b>Thành tiền:</b>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
			<?=$order0->get_order_total_unsave_string() ?> VNĐ
		</td>
	</tr>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5">
			<b>Phí vận chuyển:</b>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
			<?=$order0->get_shippingfee_obj()->get_fee() ?> VNĐ
		</td>
	</tr>
	<tr>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="5">
			<b>Tổng tiền::</b>
		</td>
		<td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
			<?=$order0->get_order_total_include_shipping_fee_string() ?> VNĐ
		</td>
	</tr>
	</tfoot>
	</table>
	<p style="margin-top:0px;margin-bottom:20px">
		Vui lòng trả lời thư này nếu có bất kì câu hỏi nào.
	</p>
	<p style="margin-top:0px;margin-bottom:20px">
		Nhân viên của chúng tôi sẽ liên lạc với bạn và giao hàng trong thời giân ngắn nhất (tối đa là 72h kể từ khi đơn hàng được ghi nhận).
	</p>
	<p style="margin-top:0px;margin-bottom:20px">
		Đối với đơn hàng thanh toán tại nhà, nhân viên giao hàng sẽ nhận tiền thanh toán khi giao hàng.
	</p>
	<p style="margin-top:0px;margin-bottom:20px">
		Copyright © 2013 quocdunginfo ft kienkimkhung Corp. | Special thanks to Joomla for this email template.
	</p>
	<div class="yj6qo">
	</div>
	<div class="adL">
	</div>
	<div class="adL">
	</div>
</div>
<?php
//$this->load->view($_tpl.'footer');
?>