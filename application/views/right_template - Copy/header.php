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
	<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="js/js-func.js" type="text/javascript"></script>
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
			    <li><a href="<?=site_url('latest_post')?>" <?php if($this->uri->segment(1)=='latest_post') echo 'class="active"'; ?>><span>Latest posts</span></a></li>
			    <li><a href="<?=site_url('category')?>" <?php if($this->uri->segment(1)=='category') echo 'class="active"'; ?>><span>Categories</span></a>
			    	<?php
                    echo $category_menu;
                    ?>
                    <!--
                    <div class="dd-holder">
			    		<div class="dd-t"></div>
			    		<div class="dd">
			    			<ul>
			    			    <li><a href="#">Sub Level 1</a></li>
			    			    <li><a href="#">Sub Level 1</a>
			    			    	<div class="dd-holder">
							    		<div class="dd-t"></div>
							    		<div class="dd">
							    			<ul>
							    			    <li><a href="#">Sub Level 2</a></li>
							    			    <li><a href="#">Sub Level 2</a></li>
							    			    <li class="last"><a href="#">Sub Level 2</a>
							    			    	<div class="dd-holder">
											    		<div class="dd-t"></div>
											    		<div class="dd">
											    			<ul>
											    			    <li><a href="#">Sub Level 3</a></li>
											    			    <li><a href="#">Sub Level 3</a></li>
											    			    <li class="last"><a href="#">Sub Level 3</a>
											    			    	
											    			    </li>
											    			</ul>
											    			<div class="cl">&nbsp;</div>
											    		</div>
											    		<div class="dd-b"></div>
											    	</div>
							    			    </li>
							    			</ul>
							    			<div class="cl">&nbsp;</div>
							    		</div>
							    		<div class="dd-b"></div>
							    	</div>
				    			    	
			    			    </li>
			    			    <li><a href="#">Sub Level 1</a></li>
			    			    <li><a href="#">Sub Level 1</a></li>
			    			    <li class="last"><a href="#">Sub Level 1</a></li>
			    			</ul>
			    			<div class="cl">&nbsp;</div>
			    		</div>
			    		<div class="dd-b"></div>
			    	</div>
                    -->
			    </li>
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