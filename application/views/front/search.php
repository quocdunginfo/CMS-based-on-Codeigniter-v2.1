<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <div class="timkiemnangcao" style="width:690px">
    <script type="text/javascript">
      function qd_change_page(sender)
        {
            id = $( "#qd_page option:selected" ).val();
            document.location = '<?=site_url($_com.'search/painting_cat/page/')?>/'+id;
        }
    </script>
        <a id="qd_sapxep"></a>
        <h2>Kết quả tìm kiếm (Có <?=$pagination->total_item?> sản phẩm)</h2>
        <form method="post" action="<?=site_url($_com.'search/submit')?>"  class="form" style="width:650px">
            <label style="width:100px; display:inline-block">Mã sản phẩm:</label>
            <input type="text" name="art_id" value="<?php echo $timkiem_nangcao['art_id'] ?>" style="width:200px">
            <label style="width:100px; display:inline-block; margin-left:20px">Tên sản phẩm:</label>
            <input type="text" name="title" value="<?php echo $timkiem_nangcao['title'] ?>" style="width:200px">
            <div style="height:10px"></div>
            <label style="width:100px; display:inline-block;">Loại sản phẩm:</label>
            <label class="mylabel">
                <select name="cat_id" style="width:205px">
                    @{
                        <option value=""  <?php if($timkiem_nangcao['cat_id']=='') echo 'selected="selected"'  ?> >Tất cả các loại</option>
                        <?php
                        foreach($painting_list_cat as $item)
                        {
                        ?>
                        <option value="<?=$item->id?>"  <?php if($timkiem_nangcao['cat_id']==$item->id) echo 'selected="selected"'  ?>><?=$item->get_prefix_name()?></option>
                        <?php } ?>
                        }
                    }
                </select>
            </label>
             <label style="width:100px; display:inline-block; margin-left:20px">Chất liệu:</label>
            <label class="mylabel">
                <select name="mat_id" style="width:205px">
                    @{
                        <option value="-1" <?php if($timkiem_nangcao['mat_id']=='' || $timkiem_nangcao['mat_id']==-1) echo 'selected="selected"'  ?>>Tất cả các chất liệu</option>
                         <?php
                        foreach($painting_list_mat as $item)
                        {
                        ?>
                        <option value="<?=$item->id?>"  <?php if($timkiem_nangcao['mat_id']==$item->id) echo 'selected="selected"'  ?>><?=$item->get_prefix_name()?></option>
                        <?php } ?>
                        }
                    }
                </select>
            </label>
            <div style="height:10px"></div>
            <label>Giá từ:</label>
            <input type="text" name="art_price_from" value="<?php echo $timkiem_nangcao['art_price_from'] ?>" style="margin-left:65px;width:200px">
            <label style="margin-left:20px">đến</label>
            <input type="text" name="art_price_to" value="<?php echo $timkiem_nangcao['art_price_to'] ?>" style="margin-left: 80px;width: 200px;">
            <div style="height:10px"></div>
            <div style="text-align:center;">
                <input type="submit" class="mybutton" value="Tìm kiếm" style="margin-right:10px"/>
                <input class="mybutton" type="submit" name="front_submit_reset" value="Reset" />
            </div>
            <div style="height:10px; clear:both"></div>
            <div style="margin-bottom:10px">
                <label>Sắp xếp theo </label>
                <label class="mylabel">
                    <select name="order_by" onchange="submit()">
                        <option value="id" <?php if($timkiem_nangcao['order_by']=='id') echo 'selected="selected"'  ?> >Mới nhất</option>
                        <option value="title" <?php if($timkiem_nangcao['order_by']=='title') echo 'selected="selected"'  ?>>Tên sản phẩm</option>
                        <option value="art_price" <?php if($timkiem_nangcao['order_by']=='art_price') echo 'selected="selected"'  ?>>Giá sản phẩm</option>
                    </select>
                </label>
                <label class="mylabel">
                    <select name="order_rule" onchange="submit()" style="margin-right: 5px">
                       <option value="asc" <?php if($timkiem_nangcao['order_rule']=='asc') echo 'selected="selected"' ?>>Tăng dần</option>
                <option value="desc" <?php if($timkiem_nangcao['order_rule']=='desc') echo 'selected="selected"' ?>>Giảm dần</option>
        </select>
                </label>
            </div>
                 <div style="margin-top:10px;float:left">
                <label>Hiển thị </label>
                <label class="mylabel">
                     <select name="max_item_per_page" onchange="submit()" style="margin-left:10px;">
    <option value="3" <?php if($timkiem_nangcao['max_item_per_page']==3) echo 'selected="selected"' ?>>3</option>
    <option value="6" <?php if($timkiem_nangcao['max_item_per_page']==6) echo 'selected="selected"' ?>>6</option>
    <option value="9" <?php if($timkiem_nangcao['max_item_per_page']==9) echo 'selected="selected"' ?>>9</option>
    <option value="18" <?php if($timkiem_nangcao['max_item_per_page']==18) echo 'selected="selected"' ?>>18</option>
    <option value="30" <?php if($timkiem_nangcao['max_item_per_page']==30) echo 'selected="selected"' ?>>30</option>
    <option value="45" <?php if($timkiem_nangcao['max_item_per_page']==45) echo 'selected="selected"' ?>>45</option>
                        </select>
                </label>
                sản phẩm /trang</div>
        <div style="margin-top:10px;float:right;margin-right:40px">
      <label style="float:right">
            Hiển thị trang 
            <label class="mylabel">
                <select id="qd_page" name="page" onchange="qd_change_page(this);" style="margin-left: 10px;width:50px">
        <?php for($i=1;$i<=$pagination->total_page;$i++) { ?>        
        <option value="<?=$i?>" <?php if($pagination->current_page==$i) echo 'selected="selected"' ?>><?=$i?></option> 
        <?php } ?>              
        </select>
        </label>/ <?=$pagination->total_page?> trang</label></form></div>
            <div style="clear:both"></div>
            </div>
        
    <br />
    <div class="ketquatimkiem">
        <?php
                        $i=1;
                        foreach($painting_list as $item) {
                        $_class_sufix = '';
                        if($i%3==0)
                        {
                            $_class_sufix = 'no_margin_right';
                        }
                       
                        $_link = site_url($_com.'product/index/'.$item->id);
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
                            <a href="<?=site_url($_com.'cart/add_or_update/painting_id/'.$item->id.'/count/1')?>" class="addtocart">Thêm vào giỏ</a>      
                            <?php } else { ?>
                            <a style="background-color: #696969;" href="javascript:void(0)" class="addtocart">Tạm hết hàng</a>
                            
                            <?php } ?>
                            
                            <a href="<?=$_link?>" class="detail">Xem chi tiết</a>
                         </div>
                         
                      <?php
                      if($i%3==0) echo '<div class="cleaner"></div>';  
                       $i++;
                       } ?>
                      <div class="cleaner"></div>
            </div>   	
</div>
<?php
$this->load->view($_tpl.'footer');
?>