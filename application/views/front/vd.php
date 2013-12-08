<?php
$template_path=base_url().'application/views/front/';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Trang chủ</title>
<base href="<?=$template_path?>" />
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
			<div id="content" class="float_r">
				<div id="slider-wrapper">
					<div id="slider" class="nivoSlider" style="position: relative; width: 680px; height: 353px; background-image: url(http://localhost:53655images/slider/02.jpg); background-position: initial initial; background-repeat: no-repeat no-repeat;">
						<img src="images/slider/01.gif" alt="" style="display: none;">
						<img src="images/slider/02.jpg" alt="" title="#htmlcaption" style="display: none;">
						<a href="/FrontSanPham?id_loaisp=1&amp;level_loaisp=0" class="nivo-imageLink" style="display: none;"><img src="images/slider/03.jpg" alt="" title="#htmlcaption" style="display: none;"></a>
						<img src="images/slider/04.jpg" alt="" title="#htmlcaption" style="display: none;">
						<img src="images/slider/05.jpg" alt="" title="#htmlcaption" style="display: none;">
						<img src="images/slider/06.jpg" alt="" title="#htmlcaption" style="display: none;">
						<img src="images/slider/07.jpg" alt="" title="#htmlcaption" style="display: none;">
						<img src="images/slider/08.jpg" alt="" title="#htmlcaption" style="display: none;">
						<img src="images/slider/09.jpg" alt="" title="#htmlcaption" style="display: none;">
						<div class="nivo-slice" style="width: 45px; height: 0px; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); left: 0px; bottom: 0px; background-position: 0px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 45px; width: 45px; height: 0px; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; background-position: -45px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 90px; width: 45px; height: 0px; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; background-position: -90px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 135px; width: 45px; height: 0%; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -135px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 180px; width: 45px; height: 0%; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -180px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 225px; width: 45px; height: 0%; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -225px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 270px; width: 45px; height: 0%; opacity: 0; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -270px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 315px; width: 45px; height: 5.885438678252336%; opacity: 0.05885438678252336; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -315px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 360px; width: 45px; height: 18.371491904343774%; opacity: 0.1464466094067262; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -360px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 405px; width: 45px; height: 40.32252659745698%; opacity: 0.35448191658586414; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -405px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 450px; width: 45px; height: 64.55180834141359%; opacity: 0.6455180834141359; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -450px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 495px; width: 45px; height: 81.62850809565623%; opacity: 0.7758229353142151; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -495px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 540px; width: 45px; height: 98.99275261921234%; opacity: 0.9899275261921234; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; overflow: hidden; background-position: -540px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 585px; width: 45px; height: 100%; opacity: 1; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; background-position: -585px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-slice" style="left: 630px; width: 50px; height: 100%; opacity: 1; background-image: url(http://localhost:53655images/slider/03.jpg); bottom: 0px; background-position: -630px 0%; background-repeat: no-repeat no-repeat;">
						</div>
						<div class="nivo-caption" style="opacity: 0.8;">
							<p style="display: block; opacity: 0.9613363699350574;">
								<strong>BigFoot</strong> hân hạnh phục vụ quý khách. Click vào <a href="/FrontSanPham?id_loaisp=0&amp;level_loaisp=0">đây</a> để xem sản phẩm của chúng tôi.
							</p>
						</div>
						<div class="nivo-directionNav" style="display: none;">
							<a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a>
						</div>
						<div class="nivo-controlNav">
							<a class="nivo-control" rel="0">1</a><a class="nivo-control" rel="1">2</a><a class="nivo-control active" rel="2">3</a><a class="nivo-control" rel="3">4</a><a class="nivo-control" rel="4">5</a><a class="nivo-control" rel="5">6</a><a class="nivo-control" rel="6">7</a><a class="nivo-control" rel="7">8</a><a class="nivo-control" rel="8">9</a>
						</div>
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
				<div class="cleaner">
				</div>
				<h1 style="margin-top:40px">Sản phẩm mới</h1>
				<div class="product_box">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/40"><img src="/_Upload/HinhAnh/_thumb_B056B140007-1.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 1"></a>
					<a href="/FrontSanPhamDetail/Index/40">
					<h3>Giày bata nữ cổ cao</h3>
					</a>
					<p class="product_price">
						1350000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=40&amp;ctsp_id=132&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/40" class="detail">Xem chi tiết</a>
				</div>
				<div class="product_box">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/39"><img src="/_Upload/HinhAnh/_thumb_C3A8Dgiay-the-thao-sneaker-mau-den-ml-329-5.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 2"></a>
					<a href="/FrontSanPhamDetail/Index/39">
					<h3>Giày sneaker nam đen</h3>
					</a>
					<p class="product_price">
						645000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=39&amp;ctsp_id=129&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/39" class="detail">Xem chi tiết</a>
				</div>
				<div class="product_box no_margin_right">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/38"><img src="/_Upload/HinhAnh/_thumb_DFD37530044V.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 3"></a>
					<a href="/FrontSanPhamDetail/Index/38">
					<h3>Giày bata nữ cổ cao</h3>
					</a>
					<p class="product_price">
						1300000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=38&amp;ctsp_id=124&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/38" class="detail">Xem chi tiết</a>
				</div>
				<div class="cleaner">
				</div>
				<div class="product_box">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/37"><img src="/_Upload/HinhAnh/_thumb_A3113136896C-1.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 4"></a>
					<a href="/FrontSanPhamDetail/Index/37">
					<h3>Giày bata nữ cổ cao</h3>
					</a>
					<p class="product_price">
						1400000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=37&amp;ctsp_id=122&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/37" class="detail">Xem chi tiết</a>
				</div>
				<div class="product_box">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/36"><img src="/_Upload/HinhAnh/_thumb_580C6giay-the-thao-gal-s12ml12-3.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 5"></a>
					<a href="/FrontSanPhamDetail/Index/36">
					<h3>Giày thể thao nam đế mềm</h3>
					</a>
					<p class="product_price">
						649000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=36&amp;ctsp_id=119&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/36" class="detail">Xem chi tiết</a>
				</div>
				<div class="product_box no_margin_right">
					<div class="new-icon">
						<img src="images/icon_new.gif" style="width:58px;height:60px">
					</div>
					<a href="/FrontSanPhamDetail/Index/35"><img src="/_Upload/HinhAnh/_thumb_D1F53giay-the-thao-adidas-mau-den-g63120-5-10.jpg" style="max-width:200px; height:150px;z-index:-1" alt="Shoes 6"></a>
					<a href="/FrontSanPhamDetail/Index/35">
					<h3>Giày thể thao nam sọc trắng</h3>
					</a>
					<p class="product_price">
						799000 đ
					</p>
					<a href="/FrontCart/Add_Or_Update?sanphamid=35&amp;ctsp_id=117&amp;soluong=1" class="addtocart">Thêm vào giỏ</a><a href="/FrontSanPhamDetail/Index/35" class="detail">Xem chi tiết</a>
				</div>
				<div class="cleaner">
				</div>
			</div>
			<div class="cleaner">
			</div>
		</div>
		<!-- END of templatemo_main -->
		<div id="templatemo_footer">
			<p>
				<a href="/">Trang chủ</a> | <a href="/FrontSanPham?id_loaisp=0&amp;level_loaisp=0">Sản phẩm</a> | <a href="/FrontTimKiem">Tìm kiếm nâng cao</a> | <a href="/FrontContact">Liên hệ</a> | <a href="#">Giới thiệu</a>
			</p>
			 Copyright © 2013 <a href="#">quocdunginfo ft kienkimkhung Corp.</a> | <a href="http://www.templatemo.com/preview/templatemo_367_shoes">Special thanks</a> to <a href="http://www.templatemo.com" target="_parent" title="free css templates">templatemo</a>
		</div>
		<!-- END of templatemo_footer -->
	</div>
	<!-- END of templatemo_wrapper -->
</div>
<!-- END of templatemo_body_wrapper -->
<div id="lbOverlay" style="display: none;">
</div>
<div id="lbCenter" style="display: none;">
	<div id="lbImage">
		<div style="position: relative;">
			<a id="lbPrevLink" href="#"></a><a id="lbNextLink" href="#"></a>
		</div>
	</div>
</div>
<div id="lbBottomContainer" style="display: none;">
	<div id="lbBottom">
		<a id="lbCloseLink" href="#"></a>
		<div id="lbCaption">
		</div>
		<div id="lbNumber">
		</div>
		<div style="clear: both;">
		</div>
	</div>
</div>
</body>
</html>