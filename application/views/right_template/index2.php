<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$this->load->library('uri');
$template_path=base_url().'application/views/right_template/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>quocdunginfo website</title>
    <base href="<?=$template_path?>"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
		<script src="js/png-fix.js" type="text/javascript"></script>
	<![endif]-->
    
    <!-- fancybox -->
    <!-- Add jQuery library -->
    <!-- old version are not allowed to override --> 
    <script type="text/javascript" src="fancybox/lib/jquery-1.10.1.min.js"></script>
    
    <!-- Add mousewheel plugin (this is optional) 
    <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    -->
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <!-- Add Thumbnail helper (this is optional)
    <link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    -->
    <!-- Add Media helper (this is optional)
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    -->
    <!-- activate fancybox -->
    <script>
    
    $(document).ready(function() {
        /* This is basic - uses default settings */
        $("a.single_image").fancybox();
    });
    </script>
    <!-- end fancybox -->
    
    <!-- new jQuery version for menu -->
	<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="js/js-func.js" type="text/javascript"></script>
    <!-- end new jQuery version for menu -->
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<h1 id="logo" class="notext"><a href="<?=site_url('home')?>">quocdunginfo</a></h1>
		<div id="navigation">
			<ul>
			    <li><a href="<?=site_url('home')?>" <?php if($this->uri->segment(1)=='home' || $this->uri->segment(1)=='') echo 'class="active"'; ?>><span>Home</span></a></li>
			    <li><a href="<?=site_url('about')?>" <?php if($this->uri->segment(1)=='about') echo 'class="active"'; ?>><span>About</span></a></li>
			    <li><a href="<?=site_url('painting_category')?>" <?php if($this->uri->segment(1)=='painting_category') echo 'class="active"'; ?>><span>Painting</span></a>
                <?php
                    echo $painting_category_menu;
                    ?>
                    <!-- see right templte menu model for menu structure detail -->
                </li>
			    <li><a href="<?=site_url('category')?>" <?php if($this->uri->segment(1)=='category') echo 'class="active"'; ?>><span>Categories</span></a>
                    <?php
                    echo $category_menu;
                    ?>
                    <!-- see right templte menu model for menu structure detail -->
                </li>
                <li><a href="<?=site_url('latest_post')?>" <?php if($this->uri->segment(1)=='latest_post') echo 'class="active"'; ?>><span>Latest posts</span></a></li>
			    <li><a href="<?=site_url('contact')?>" <?php if($this->uri->segment(1)=='contact') echo 'class="active"'; ?>><span>Contact</span></a>
			    </li>
			</ul>
			<!-- <a href="#" class="buy-now">Buy Now</a> -->
		</div>
		<div class="cl">&nbsp;</div>
		<div class="search">
			<form action="#" method="post">
				<span class="field">
					<input type="text" class="blink" value="Search" title="Search" />
				</span>
				<input type="submit" class="search-btn notext" value="Submit" />
			</form>
		</div>
	</div>	
</div>
<!-- End Header -->
<!-- Slider -->
<div id="slider">
	<div class="shell">
		<div class="slider-holder">
			<div class="slider-left">
				<ul>
				    <?php foreach($slider_list as $slider): ?>
                    <li>
				    	<h2><?=$slider->title?></h2>
				    	<p><?=$slider->content_lite?></p>
				    </li>
                    <?php endforeach; ?>
				    
				</ul>
			</div>
			<div class="slider-right">
				<ul>
				    <?php foreach($slider_list as $slider): ?>
                    <li style="text-align: center;"><img src="<?=$slider->avatar?>" alt="" style=" max-width: 642px; max-height: 348px;"/></li>
				    <?php endforeach; ?>
				</ul>
			</div>
			<div class="cl">&nbsp;</div>
			<div class="slider-nav">
				<?php $count=0; foreach($slider_list as $slider):$count++; ?>
                <a href="#" title="<?=$count?>"><?=$count?></a>
				<?php endforeach; ?>
				<div class="cl">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
<!-- End Slider -->
<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col">
			<h2>Widget 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque tincidunt fermentum diam sagittis ullamcorper.</p>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col">
			<h2>Widget 2</h2>
			<img src="css/images/post-image1.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col last">
			<h2>Widget 3</h2>
			<img src="css/images/post-image2.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="cl" style="height:20px;">&nbsp;</div>
        
        <div class="col">
			<h2>Widget 4</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque tincidunt fermentum diam sagittis ullamcorper.</p>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col">
			<h2>Widget 5</h2>
			<img src="css/images/post-image1.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col last">
			<h2>Widget 6</h2>
			<img src="css/images/post-image2.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="cl" style="height:150px;">&nbsp;</div>
        
        <div class="col">
			<h2>Footer section 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque tincidunt fermentum diam sagittis ullamcorper.</p>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col">
			<h2>Footer section 2</h2>
			<img src="css/images/post-image1.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="col last">
			<h2>Footer section 3</h2>
			<img src="css/images/post-image2.gif" alt="" class="right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque </p>
			<div class="cl">&nbsp;</div>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="cl">&nbsp;</div>
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
<!-- Footer -->
<div id="footer">
	<div class="shell">
		<p class="left">Copyright &copy; 2010 RightDirection. quocdunginfo.com</p>
		<!--
        <p class="right">
			<a href="#">Home</a>
			<span>|</span>
		    <a href="#">About</a>
		    <span>|</span>
		    <a href="#">Team</a>
		    <span>|</span>
		    <a href="#">Jobs</a>
		    <span>|</span>
		    <a href="#">Contact Us</a>
		    <span>|</span>
		    <a href="#">Portfolio</a>
		    <span>|</span>
		    <a href="#">Blog</a>
	    </p>
        -->
        <p class="right">
        Contact at quocdunginfo@gmail.com
        </p>
	    <div class="cl">&nbsp;</div>
	</div>
</div>
<!-- Footer -->
</body>
</html>