<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$html_title?></title>
<base href="<?=$template_path?>"/>
<meta name="keywords" content="<?=$html_seo_keyword?>">
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">
/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
    </script>
<script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "top_nav", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })
        var current_id = "1";
    </script>
<!-- <script type="text/javascript" src="jquery-1-4-2.min.js"></script> -->
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen">
<script type="text/JavaScript" src="js/slimbox2.js"></script>
<!-- qd confirm when click delete -->
<script type="text/javascript">
        function qd_confirm(link) {
            if (confirm("Bạn có chắc muốn thực hiện tác vụ!")) {
                document.location = link;
            }
            else {
                //nothing
            }
        }
        function qd_confirm_boolean() {
            if (confirm("Bạn có chắc muốn thực hiện tác vụ!")) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>
<style type="text/css">
        select {
            padding: 3px;
            margin: 0;
            border-radius: 4px;
            -webkit-box-shadow:
            /*0 3px 0 #ccc,*/
            0 -1px #fff inset;
            background: #f8f8f8;
            color: #888;
            border: 1px solid #aaa;
            outline: none;
            display: inline-block;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
        }
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            select {
                padding-right: 18px;
            }
            .mylabel {
                position: relative;
            }
                .mylabel:after {
                    content: '< >';
                    font: 11px "Consolas", monospace;
                    color: #aaa;
                    -webkit-transform: rotate(90deg);
                    position: absolute;
                    right: 4px;
                    top: 0px;
                    padding: 0 0 0px;
                    pointer-events: none;
                    border-bottom: 1px solid #ddd;
                }
        }
</style>
<style type="text/css">
.mybutton {
	/*background:#25A6E1;
	background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	padding:4px 13px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:14px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9*/
    display: inline-block;
padding: 3px 5px;
text-align: center;
text-decoration: none;
font-weight: bold;
background-color: #000;
border: 1px solid #fff;
color: #fff;
font-size: 13px;
cursor: pointer;
width: 80px;
height:27px;
}
.mybutton:hover {
    display: inline-block;
padding: 3px 5px;
text-align: center;
text-decoration: none;
font-weight: bold;
background-color: #11bdd1;
border: 1px solid #fff;
color: #fff;
font-size: 13px;
cursor: pointer;
width: 80px;
}
</style>
</head>
<body>
<div class="ddshadow toplevelshadow" style="left: 205.4545440673828px; top: 175px; overflow: hidden; height: 0px; display: block;">
</div>
<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
		<div id="templatemo_header">
			<div id="site_title">
				<h1><a href="<?=site_url('front')?>"><?=$html_logo_name?></a></h1>
			</div>
			<div id="header_right">
				<?php if($current_user==null) { ?>
                <p>
					<a href="<?=site_url('front/register')?>">Chưa có tài khoản? Hãy đăng kí ngay</a> | <a href="<?=site_url('front/login')?>">Đăng nhập</a>
				</p>
                <?php } else { ?>
                <p>

                    <a href="javascript:void(0)">Chào, <?=$current_user->fullname?> </a> |
                    <a href="<?=site_url('front/account')?>">Quản lý tài khoản cá nhân</a> |
                    <a href="<?=site_url('front/logout')?>">Đăng xuất</a>
                </p>
                <?php } ?>
                
				<p>
					 Giỏ hàng hiện có: <strong><?=sizeof($giohang->get_order_detail_list())?> sản phẩm</strong>
                     ( <a href="<?=site_url('front/cart')?>">Xem giỏ hàng</a> | <a href="<?=site_url('front/cart/checkout')?>">Thanh toán</a> )
				</p>
			</div>
			<div class="cleaner">
			</div>
		</div>
		<!-- END of templatemo_header -->
		<div id="templatemo_menubar">
			<div id="top_nav" class="ddsmoothmenu">
				<?=$menu->generate()?>
                
                
                <?php if(false) { ?>
                <ul>
					<li><a href="<?=site_url('front')?>" class="selected">Trang chủ</a></li>
					<li style="z-index: 100;"><a href="<?=site_url('front/products')?>" class="">Sản phẩm</a>
					<ul style="display: none; top: 40px; visibility: visible;">
						<?php foreach($painting_list_cat as $item) {
                        ?>
						<li><a href="<?=site_url('front/products/painting_cat/id/'.$item->id.'#qd_sapxep')?>"><?=$item->get_prefix_name()?></a></li>
                        <?php } ?>
					</ul>
					</li>
					<li><a href="<?=site_url('front/search') ?>">Tìm kiếm nâng cao</a></li>
					<li><a href="<?=site_url('front/contact') ?>">Liên hệ</a></li>
					<li><a href="<?=site_url('front/about') ?>">Giới thiệu</a>
					</li>
				</ul>
                <?php } ?>
				<br style="clear: left">
			</div>
			<!-- end of ddsmoothmenu -->
			<div id="templatemo_search">
				<form action="<?=site_url('front/search/simple_submit')?>" method="post">
					<input type="text" value="Nhập từ khóa tìm kiếm" name="title" id="keyword" title="keyword" onfocus="clearText(this)" onclick="this.value = '';" onblur="this.value=!this.value?'Nhập từ khóa tìm kiếm':this.value;" class="txt_field">
					
					<input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn">
				</form>
			</div>
		</div>
		<!-- END of templatemo_menubar -->
		<div id="templatemo_main">
			<div id="sidebar" class="float_l">
				<div class="sidebar_box">
					<span class="bottom"></span>
					<a href="<?=site_url('front/products')?>" style="text-decoration: none;">
                    <h3>
                    Danh mục sản phẩm
                    </h3>
                    </a>
					<div class="content">
						<ul class="sidebar_list">
							<?php
                              $_len = sizeof($painting_list_cat);
                              $ii=0;
                              
                              foreach($painting_list_cat as $item) {
        						  $_class = '';
                                  if($ii==0)
                                  {
                                    $_class = 'first';
                                  }
                                  else if($ii==$_len-1)
                                  {
                                    $_class = 'last';
                                  }
                                  $ii++;
                              
                            ?>
                            <li class="<?=$_class?>">
                                <a href="<?=site_url('front/products/painting_cat/id/'.$item->id.'#qd_sapxep')?>">
                                 <?=$item->get_prefix_name()?>
                                 </a>
                            </li>
                            <?php } ?>
						</ul>
					</div>
				</div>
				<div class="sidebar_box">
					<span class="bottom"></span>
					<h3><a class="sidebar_box_icon" href="http://fr.onlyimage.com" title="Cliquez ici">
					<img src="images/templatemo_sidebar_header.png" alt="Cliquez ici from fr.onlyimage.com" title="Cliquez ici"></a>Sản phẩm bán chạy </h3>
					<div class="content">
                        <?php foreach($painting_best_seller as $item) { ?>
						<div class="bs_box">
							<div class="icon-hot">
								<img src="images/hot.gif">
							</div>
							<a href="<?=site_url('front/product/index/'.$item->id)?>">
							<img src="<?=$item->get_avatar_thumb()?>" alt="image" style="max-width:60px; max-height:60px"></a>
							<h4><a href="<?=site_url('front/product/index/'.$item->id)?>"><?=$item->title?></a></h4>
							<p class="price">
								<?=$item->get_art_price()?> đ
							</p>
							<div class="cleaner">
							</div>
						</div>
                        <?php } ?>
					</div>
				</div>
			</div>