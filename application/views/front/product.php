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
            <?php
            $i=1;
            foreach($relative_painting as $item)
            {
                
            ?>
                      <div class="product_box">
            	<a href="<?=site_url('front/product/index/'.$item->id)?>"><img src="<?=$item->get_avatar_thumb()?>" style="max-width:200px; height:150px" alt="Shoes 1"></a>
                <h3><?=$item->title?></h3>
                <p class="product_price"><?=$item->get_art_price()?> đ</p>
                <?php if($item->art_count>0) {?>
                        <a href="<?=site_url('front/cart/add_or_update/painting_id/'.$item->id.'/count/1')?>" class="addtocart">Thêm vào giỏ</a> <?php } else {?>      
                        <a href="javascript:void(0)" style="background-color: #696969;" class="addtocart">Tạm hết hàng</a>  
                        <?php } ?>             
                        <a href="<?=site_url('front/product/index/'.$item->id)?>" class="detail">Xem chi tiết</a>
                </div> 
                
               <?php if($i%3==0) break; $i++; }?>        
</div>


<?php
$this->load->view('front/footer');
