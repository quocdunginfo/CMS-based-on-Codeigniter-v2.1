<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('front/header');
?>
<div id="content" class="float_r">
    <h2>Giỏ hàng</h2>
    <?php if(sizeof($giohang->get_order_detail_list())<=0) { ?>
    <div style="color:red; font-size:14px; margin-bottom:10px;">
        Chưa có sản phẩm nào trong giỏ hàng
    </div>
    <?php } ?>
    <table width="680px" cellspacing="0" cellpadding="5">
        <tbody>
            <tr bgcolor="#ddd">
                <th width="70" align="center">Hình ảnh</th>
                <th align="center">Tên sản phẩm</th>
                <th width="60" align="center">Số lượng</th>
                <th width="120" align="right">Đơn giá</th>
                <th width="130" align="right">Tổng cộng</th>
                <th width="20"></th>
            </tr>
            
            <?php foreach($giohang->get_order_detail_list() as $item) { ?>
            <tr>
                <td>
                    <a href="">
                    <img src="<?=$item->get_product_obj()->get_avatar_thumb()?>" alt="image 3" style="max-width:70px; max-height:70px;">
                    </a>
                </td>
                <td align="center">
                    <a href="<?=site_url('front/product/index/'.$item->get_product_obj()->id)?>">
                    <?=$item->get_product_obj()->title?>
                        </a>
                </td>
                
                <td align="center">
                    <form id="qd_form_0" action="<?=site_url('front/cart/add_or_update_from_cart')?>" method="post">
                        <input type="hidden" value="<?=$item->get_product_obj()->id?>" name="painting_id">
                        <input type="hidden" value="1" name="update_from_cart">
                      <label class="mylabel">
                      <select name="count" style="width: 40px;" onchange="submit()">
                            <?php for($i=1;$i<=$max_item_can_order;$i++){ ?>
                            <option value="<?=$i?>" <?php if($item->order_count==$i) echo 'selected="selected"'; ?>><?=$i?></option>
                            <?php } ?>
                        </select></label>
                        
                    </form>
                </td>
                <td align="right"><?=$item->get_order_unit_price()?> VNĐ</td>
                <td align="right"><?=$item->get_total_string()?> VNĐ</td>
                <td align="center">
                    <a href="javascript:qd_confirm( '<?=site_url('front/cart/remove/painting_id/'.$item->get_product_obj()->id)?>' )">
                    <img src="images/remove_x.gif" alt="remove" style="width: 15px; height: 15px" title="Xóa khỏi giỏ hàng"></a>

                </td>
            </tr>
            <tr>
                <td colspan="6" style="color:red;">
                <?php
                if(in_array($item->get_product_obj()->id.'_count_fail',$state))
                {
                    echo 'Sản phẩm ['.$item->get_product_obj()->title.']: số lượng đặt vượt tồn kho hoặc không hợp lệ!';
                }
                ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3" align="right" height="30px"></td>
                <td align="right" style="font-weight: bold">Tổng tiền:</td>
                <td align="right" style="font-weight: bold; font-size:12px"><?=$giohang->get_order_total_unsave_string()?> VNĐ</td>
                <td style=""></td>
            </tr>
        </tbody>
    </table>
    <div style="float: right;margin-right:10px; margin-top: 20px;">

        <p><a href="<?=site_url('front/cart/checkout')?>" class="mybutton" style="color:white;height:20px;width:120px;font-size:12px;font-weight:bold">Thanh toán</a></p></div>
     <div style="float: left; margin-top: 20px;">
        <p><a href="<?=site_url('front')?>" class="mybutton" style="color:white;height:20px;width:120px;font-size:12px;font-weight:bold">Tiếp tục mua hàng</a></p>
         </div>
 <div style="clear:both"></div>
</div>
<?php
$this->load->view('front/footer');
?>