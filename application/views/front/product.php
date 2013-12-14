<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('front/header');
?>
<div id="content" class="float_r">
        	<h1><?=$painting_obj->title?></h1>
            <div class="content_half float_l">
        	<a id="qd_main_a_tag" rel="lightbox[portfolio]" href="<?=$painting_obj->get_avatar()?>">
            <img id="qd_main_img_tag" src="<?=$painting_obj->get_avatar_thumb()?>" alt="image" style="max-width:250px;max-height:250px"></a>
            </div>
            <form id="order_frm" action="<?=site_url('front/cart/add_or_update_from_cart')?>" method="post">
            <div class="content_half float_r">
                <table class="detail">
                    <tbody><tr>
                        <td style="width:100px"><b>Mã sản phẩm:</b></td>
                        <td><?=$painting_obj->art_id?></td>
                    </tr>
                    <tr>
                        <td><b>Giá bán:</b></td>
                        <td><?=$painting_obj->get_art_price() ?> đ</td>
                    </tr>
                    <tr>
                        <td><b>Thể loại:</b></td>
                        <td>
                        <?=$painting_obj->get_cat_list_text()?>
                        </td>
                    </tr>
                    
                    
                    <tr>
                       
                        <td><b>Kích thước:</b></td>
                        <td>
                        <?=$painting_obj->art_width?>
                        x
                        <?=$painting_obj->art_height?>
                        &nbsp;
                        <?=$painting_obj->art_sizeunit?>
                        </td>
                    </tr>
                    <tr>
                       
                        <td><b>Tình trạng:</b></td>
                        <td id="state">
                        <?php
                        if($painting_obj->art_count>0)
                        {
                            ?>
                            <span style="color:green"><b>Còn hàng</b></span>
                            <?php
                        }
                        else
                        {
                            ?>
                            <span style="color:red"><b>Hết hàng</b></span>
                            <?php
                        }
                        ?>
                        </td>
                    </tr>
                    <?php if($painting_obj->art_count>0) { ?>
                    <tr>
                    	<td><b>Số lượng đặt:</b> </td>
                        <td>
                        <input type="hidden" id="ctsp_id" name="painting_id" value="<?=$painting_obj->id?>">
                        <input name="count" id="sl" type="text" value="1" style="width: 20px; text-align: right">
                        </td>
                    </tr>
                    <?php } ?>
                    
                </tbody></table>
                <div class="cleaner h20"></div>
                <?php if($painting_obj->art_count>0) { ?>
                <a class="addtocart" id="btnsubmit" onclick="document.getElementById('order_frm').submit()">Thêm vào giỏ</a>
                <?php } else { ?>
                <a style="background-color: #696969;" href="javascript:void(0)" class="addtocart" id="btnsubmit">Tạm hết hàng</a>
                <?php } ?>
			</div>
            </form>
            <div class="cleaner h30"></div>
            
        
            <br>
            <h5 style="font-size:20px;border-bottom:double 1px #2f2f2f;padding:5px;width:640px">Mô tả sản phẩm</h5>
            <div style="width:640px;text-align:justify">
            <?=$painting_obj->get_description()?>
	       </div>
          <div class="cleaner h50"></div> 
            <h3 style="border-bottom:double 1px #2f2f2f;padding:5px;width:640px">Sản phẩm liên quan</h3>
                      <div class="product_box">
            	<a href="/tmdtud/FrontSanPhamDetail/Index/40"><img src="/tmdtud/_Upload/HinhAnh/_thumb_B056B140007-1.jpg" style="max-width:200px; max-height:150px" alt="Shoes 1"></a>
                <h3>Giày bata nữ cổ cao</h3>
                <p class="product_price">1350000 đ</p>
                        <a href="/tmdtud/FrontCart/Add_Or_Update?sanphamid=40&amp;ctsp_id=132&amp;soluong=1" class="addtocart">Thêm vào giỏ</a>                         <a href="/tmdtud/FrontSanPhamDetail/Index/40" class="detail">Xem chi tiết</a>
                </div> 
                       
</div>


<?php
$this->load->view('front/footer');
