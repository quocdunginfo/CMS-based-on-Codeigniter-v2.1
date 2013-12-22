<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <?php foreach($slider_list as $item) { ?>
                    <img style="width: 680px; height: 353px; " src="<?=$item->get_avatar()?>" alt="" title="<?=$item->title?>"/>
                    <?php } ?>
                </div>
                <div id="htmlcaption" class="nivo-html-caption" style="margin-bottom:10px">
                    <strong>BigFoot</strong> hân hạnh phục vụ quý khách. Click vào <a href="/FrontSanPham?id_loaisp=0&amp;level_loaisp=0">đây</a> để xem sản phẩm của chúng tôi.
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    $('#slider').nivoSlider();
                });
            </script>
            <div class="cleaner"></div>      	
            <h1 style="margin-top:40px">Sản phẩm mới</h1>
                      <?php
                        $i=1;
                        foreach($painting_list as $item) {
                        $_class_sufix = '';
                        if($i%3==0)
                        {
                            $_class_sufix = 'no_margin_right';
                        }
                        $i++;
                        $_link = site_url($_com.'product/index/'.$item->id);
                      ?>
                        <div class="product_box <?=$_class_sufix?>">
                            <div class="new-icon"><img src="images/icon_new.gif" style="width:58px;height:60px"/></div>
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
                            <?php }?>
                           <a href="<?=$_link?>" class="detail">Xem chi tiết</a>
                         </div>
                      <?php } ?>
                      
                      <div class="cleaner"></div>      	
</div>
<?php
$this->load->view($_tpl.'footer');
?>