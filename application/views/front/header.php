<?php
$template_path=base_url().'application/views/front/';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Trang chủ</title>
<base href="<?=$template_path?>"/>
<meta name="keywords" content="shoes store, free template, ecommerce, online shop, website templates, CSS, HTML">
<meta name="description" content="Shoes Store is a free ecommerce template provided by templatemo.com">
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
				<h1><a href="/">Cửa hàng giày dép</a></h1>
			</div>
			<div id="header_right">
				<p>
					<a href="/FrontRegister">Chưa có tài khoản? Hãy đăng kí ngay</a> | <a href="/FrontLogin">Đăng nhập</a>
				</p>
				<p>
					 Giỏ hàng hiện có: <strong>0 sản phẩm</strong> ( <a href="/FrontCart">Xem giỏ hàng</a> | <a href="/FrontCart/CheckOut">Thanh toán</a> )
				</p>
			</div>
			<div class="cleaner">
			</div>
		</div>
		<!-- END of templatemo_header -->
		<div id="templatemo_menubar">
			<div id="top_nav" class="ddsmoothmenu">
				<ul>
					<li><a href="/" class="selected">Trang chủ</a></li>
					<li style="z-index: 100;"><a href="/FrontSanPham?id_loaisp=0&amp;level_loaisp=0" class="">Sản phẩm</a>
					<ul style="display: none; top: 40px; visibility: visible;">
						<li><a href="/FrontSanPham?id_loaisp=1&amp;level_loaisp=0"> Giày nữ</a></li>
						<li><a href="/FrontSanPham?id_loaisp=3&amp;level_loaisp=1">-- Giày bít</a></li>
						<li><a href="/FrontSanPham?id_loaisp=4&amp;level_loaisp=2">---- Gót cao</a></li>
						<li><a href="/FrontSanPham?id_loaisp=5&amp;level_loaisp=2">---- Gót trung thấp</a></li>
						<li><a href="/FrontSanPham?id_loaisp=6&amp;level_loaisp=2">---- Đế bằng</a></li>
						<li><a href="/FrontSanPham?id_loaisp=7&amp;level_loaisp=1">-- Giày búp bê</a></li>
						<li><a href="/FrontSanPham?id_loaisp=8&amp;level_loaisp=2">---- Gót thấp</a></li>
						<li><a href="/FrontSanPham?id_loaisp=9&amp;level_loaisp=2">---- Gót cao</a></li>
						<li><a href="/FrontSanPham?id_loaisp=10&amp;level_loaisp=1">-- Giày bata</a></li>
						<li><a href="/FrontSanPham?id_loaisp=11&amp;level_loaisp=2">---- Cổ cao</a></li>
						<li><a href="/FrontSanPham?id_loaisp=12&amp;level_loaisp=2">---- Cổ thấp</a></li>
						<li><a href="/FrontSanPham?id_loaisp=2&amp;level_loaisp=0"> Giày nam</a></li>
						<li><a href="/FrontSanPham?id_loaisp=14&amp;level_loaisp=1">-- Giày sneaker</a></li>
						<li><a href="/FrontSanPham?id_loaisp=15&amp;level_loaisp=1">-- Giày thể thao</a></li>
						<li><a href="/FrontSanPham?id_loaisp=16&amp;level_loaisp=1">-- Giày da</a></li>
					</ul>
					</li>
					<li><a href="/FrontTimKiem">Tìm kiếm nâng cao</a></li>
					<li><a href="/FrontContact">Liên hệ</a></li>
					<li><a href="/FrontAbout">Giới thiệu</a>
					</li>
				</ul>
				<br style="clear: left">
			</div>
			<!-- end of ddsmoothmenu -->
			<div id="templatemo_search">
				<form action="/FrontTimKiem/Submit" method="post">
					<input type="text" value="Nhập từ khóa tìm kiếm" name="front_sanpham_ten" id="keyword" title="keyword" onfocus="clearText(this)" onclick="this.value = '';" onblur="this.value=!this.value?'Nhập từ khóa tìm kiếm':this.value;" class="txt_field">
					<input type="hidden" value="6" name="front_sanpham_max_item_per_page">
					<input type="hidden" value="0" name="front_sanpham_gia_from">
					<input type="hidden" value="0" name="front_sanpham_gia_to">
					<input type="hidden" value="" name="front_sanpham_nhomsanpham_id">
					<input type="hidden" value="" name="front_sanpham_hangsx_ten">
					<input type="hidden" value="id" name="front_sanpham_orderby">
					<input type="hidden" value="1" name="front_sanpham_desc">
					<input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn">
				</form>
			</div>
		</div>
		<!-- END of templatemo_menubar -->
		<div id="templatemo_main">
			<div id="sidebar" class="float_l">
				<div class="sidebar_box">
					<span class="bottom"></span>
					<h3>Danh mục sản phẩm</h3>
					<div class="content">
						<ul class="sidebar_list">
							<li class="first"><a href="/FrontSanPham?id_loaisp=1&amp;level_loaisp=0"> Giày nữ</a></li>
							<li><a href="/FrontSanPham?id_loaisp=3&amp;level_loaisp=1">-&gt; Giày bít</a></li>
							<li><a href="/FrontSanPham?id_loaisp=4&amp;level_loaisp=2">----&gt; Gót cao</a></li>
							<li><a href="/FrontSanPham?id_loaisp=5&amp;level_loaisp=2">----&gt; Gót trung thấp</a></li>
							<li><a href="/FrontSanPham?id_loaisp=6&amp;level_loaisp=2">----&gt; Đế bằng</a></li>
							<li><a href="/FrontSanPham?id_loaisp=7&amp;level_loaisp=1">-&gt; Giày búp bê</a></li>
							<li><a href="/FrontSanPham?id_loaisp=8&amp;level_loaisp=2">----&gt; Gót thấp</a></li>
							<li><a href="/FrontSanPham?id_loaisp=9&amp;level_loaisp=2">----&gt; Gót cao</a></li>
							<li><a href="/FrontSanPham?id_loaisp=10&amp;level_loaisp=1">-&gt; Giày bata</a></li>
							<li><a href="/FrontSanPham?id_loaisp=11&amp;level_loaisp=2">----&gt; Cổ cao</a></li>
							<li><a href="/FrontSanPham?id_loaisp=12&amp;level_loaisp=2">----&gt; Cổ thấp</a></li>
							<li><a href="/FrontSanPham?id_loaisp=2&amp;level_loaisp=0"> Giày nam</a></li>
							<li><a href="/FrontSanPham?id_loaisp=14&amp;level_loaisp=1">-&gt; Giày sneaker</a></li>
							<li><a href="/FrontSanPham?id_loaisp=15&amp;level_loaisp=1">-&gt; Giày thể thao</a></li>
							<li class="last"><a href="/FrontSanPham?id_loaisp=16&amp;level_loaisp=1">-&gt; Giày da</a></li>
						</ul>
					</div>
				</div>
				<div class="sidebar_box">
					<span class="bottom"></span>
					<h3><a class="sidebar_box_icon" href="http://fr.onlyimage.com" title="Cliquez ici">
					<img src="images/templatemo_sidebar_header.png" alt="Cliquez ici from fr.onlyimage.com" title="Cliquez ici"></a>Sản phẩm bán chạy </h3>
					<div class="content">
						<div class="bs_box">
							<div class="icon-hot">
								<img src="images/hot.gif">
							</div>
							<a href="/FrontSanPhamDetail/Index/32">
							<img src="/_Upload/HinhAnh/_thumb_582BF139782F_standard.jpg" alt="image" style="max-width:60px; max-height:60px"></a>
							<h4><a href="/FrontSanPhamDetail/Index/32">Giày bata nữ cổ cao</a></h4>
							<p class="price">
								1300000 đ
							</p>
							<div class="cleaner">
							</div>
						</div>
						<div class="bs_box">
							<div class="icon-hot">
								<img src="images/hot.gif">
							</div>
							<a href="/FrontSanPhamDetail/Index/6">
							<img src="/_Upload/HinhAnh/_thumb_324F6_DSC2178_01.jpg" alt="image" style="max-width:60px; max-height:60px"></a>
							<h4><a href="/FrontSanPhamDetail/Index/6">Giày bít gót cao</a></h4>
							<p class="price">
								270000 đ
							</p>
							<div class="cleaner">
							</div>
						</div>
						<div class="bs_box">
							<div class="icon-hot">
								<img src="images/hot.gif">
							</div>
							<a href="/FrontSanPhamDetail/Index/17">
							<img src="/_Upload/HinhAnh/_thumb_DB3ADgiay-bit-got-trung-binh-504.jpg" alt="image" style="max-width:60px; max-height:60px"></a>
							<h4><a href="/FrontSanPhamDetail/Index/17">Giày bít gót trung thấp</a></h4>
							<p class="price">
								235000 đ
							</p>
							<div class="cleaner">
							</div>
						</div>
					</div>
				</div>
			</div>