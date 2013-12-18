<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('front/header');
?>
<div id="content" class="float_r">
        	<a id="qd_sapxep"></a>
            <div class="sapxep">
            
            	<h1>
                <?php
                $_painting_cat_id = -1;
                if($painting_cat==null)
                    {
                        echo 'Tất cả sản phẩm';
                    }
                else
                    {
                        echo $painting_cat->name;
                        $_painting_cat_id = $painting_cat->id;
                    }
                ?>
                </h1>
            <form method="post" action="<?=site_url('front/products/submit')?>" class="form">
            
            <input type="hidden" name="painting_cat_id" value="<?=$_painting_cat_id?>" />
            <div>
            <label>Sắp xếp theo </label>
            <label class="mylabel">
            <select name="order_by" onchange="submit()">
                            <option value="id" <?php if($timkiem_sanpham['order_by']=='id') echo 'selected="selected"' ?>>Mới nhất</option>
                            <option value="title" <?php if($timkiem_sanpham['order_by']=='title') echo 'selected="selected"' ?>>Tên sản phẩm</option>
                            <option value="art_price" <?php if($timkiem_sanpham['order_by']=='art_price') echo 'selected="selected"' ?>>Giá sản phẩm</option>
                        </select>
            </label>
        <label class="mylabel">
        <select name="order_rule" onchange="submit()" style="width:100px">
                <option value="asc" <?php if($timkiem_sanpham['order_rule']=='asc') echo 'selected="selected"' ?>>Tăng dần</option>
                <option value="desc" <?php if($timkiem_sanpham['order_rule']=='desc') echo 'selected="selected"' ?>>Giảm dần</option>
        </select>
        </label>
        </div>
                    <div style="margin-top:10px;float:left">
                    <label>Hiển thị </label>
                    <label class="mylabel">
                        <select name="max_item_per_page" onchange="submit()" style="margin-left:10px;">
    <option value="3" <?php if($timkiem_sanpham['max_item_per_page']==3) echo 'selected="selected"' ?>>3</option>
    <option value="6" <?php if($timkiem_sanpham['max_item_per_page']==6) echo 'selected="selected"' ?>>6</option>
    <option value="9" <?php if($timkiem_sanpham['max_item_per_page']==9) echo 'selected="selected"' ?>>9</option>
    <option value="18" <?php if($timkiem_sanpham['max_item_per_page']==18) echo 'selected="selected"' ?>>18</option>
    <option value="30" <?php if($timkiem_sanpham['max_item_per_page']==30) echo 'selected="selected"' ?>>30</option>
    <option value="45" <?php if($timkiem_sanpham['max_item_per_page']==45) echo 'selected="selected"' ?>>45</option>
                        </select>
                    </label>sản phẩm /trang
                    </div>
        
        <div style="margin-top:10px">
          
        <label style="padding-left:250px">Hiển thị trang</label>
        <script>
        function qd_change_page(sender)
        {
            id = $( "#qd_page option:selected" ).val();
            document.location = '<?=site_url('front/products/painting_cat/page/')?>/'+id;
        }
        </script>
        <label class="mylabel">
        <select id="qd_page" name="page" onchange="qd_change_page(this)" style="margin-left: 10px;width:50px">
        <?php for($i=1;$i<=$pagination->total_page;$i++) { ?>        
        <option value="<?=$i?>" <?php if($pagination->current_page==$i) echo 'selected="selected"' ?>><?=$i?></option> 
        <?php } ?>              
        </select>
        </label>/ <?=$pagination->total_page?> trang
        </form>
        </div>
        <div class="cleaner" style="height: 10px;"></div>      
        </div>
           
            <div class="cleaner"></div>
            <div class="ketquatimkiem">
                      <?php
                        $i=1;
                        foreach($painting_list as $item) {
                        $_class_sufix = '';
                        if($i%3==0)
                        {
                            $_class_sufix = 'no_margin_right';
                        }
                        $i++;
                        $_link = site_url('front/product/index/'.$item->id);
                      ?>
                        <div class="product_box <?=$_class_sufix?>">
                            
                            <a href="<?=$_link?>">
                                <img src="<?=$item->get_avatar_thumb()?>" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 1" />
                            </a>
                            <a href="<?=$_link?>">
                                <h3>
                                    <?=$item->title?>
                                </h3>
                            </a>
                            <p class="product_price"><?=$item->get_art_price()?> đ</p>
                            <?php if($item->art_count>0) { ?>
                            <a href="<?=site_url('front/cart/add_or_update/painting_id/'.$item->id.'/count/1')?>" class="addtocart">Thêm vào giỏ</a>      
                            <?php } else { ?>
                            <a style="background-color: #696969;" href="javascript:void(0)" class="addtocart">Tạm hết hàng</a>
                            
                            <?php } ?>
                            
                            <a href="<?=$_link?>" class="detail">Xem chi tiết</a>
                         </div>
                      <?php } ?>
                      
                      <div class="cleaner"></div>
            </div>   	
</div>
<?php
$this->load->view('front/footer');
?>