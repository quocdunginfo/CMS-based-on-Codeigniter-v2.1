<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$template_path=base_url().'application/views/admin/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?=$html_title?></title>
        
        <base href="<?=$template_path?>" />

        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="src/reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="src/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="src/ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="src/ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="src/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        <!-- fancy box f? individual choose -->
        <link rel="stylesheet" type="text/css" href="src/jquery.fancybox-1.3.4.css" media="screen" />
        <script type="text/javascript" src="src/jquery.fancybox-1.3.4.pack.js"></script>
        
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="src/tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="src/thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="src/theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="src/css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="src/css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="src/css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="src/css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="src/jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>
        
		<!-- TinyMCE-->
        <!-- Place inside the <head> of your HTML -->
        <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea#wysiwyg",
            theme: "modern",
            height: 450,
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor",
                 "jbimages responsivefilemanager "
           ],
           relative_urls: false,
           
           toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | link jbimages | responsivefilemanager ",
           external_filemanager_path:"/cms/application/_static/filemanager/",
           filemanager_title:"Responsive Filemanager" ,
           external_plugins: { "filemanager" : "/cms/application/_static/filemanager/plugin.min.js"} 
           
         });
        </script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="src/jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="src/jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="src/jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="src/thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                                       
                    <div class="grid_8">
					&nbsp;
                    </div>
                    
                    <div class="grid_4">
                         
                        <a href="<?=site_url('admin_users/edit/'.$current_user->id)?>" id="qdUsername" style="vertical-align:baseline; color:#CCC; font-size:100%; padding: 9px 20px 11px 0px ; line-height:1; display:block; width:auto; height:auto; float:left; position:relative; font: 12px/1.5; margin-top: 4px;">
                         User:   <?php echo $current_user->username.' (fullname: '.$current_user->fullname.')'; ?>
                        </a>
                        <a href="<?php echo site_url('admin_login/logout'); ?>" id="logout">
                            Logout
                        </a>
                    </div>
                    
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li <?php if(in_array('admin',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
                                <li <?php if(in_array('admin_category',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_category'); ?>" ">Categories</a></li>
                                <li <?php if(in_array('admin_posts',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_posts'); ?>">Posts</a></li>
                                <li <?php if(in_array('admin_users',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_users'); ?>">Users</a></li>
                                <li <?php if(in_array('admin_setting',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_setting'); ?>">Settings</a></li>
                                <li <?php if(in_array('admin_media',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_media'); ?>">Media</a></li>
                                <li <?php if(in_array('admin_help',$active_menu)) echo 'id="current"'; ?>><a href="<?php echo site_url('admin_help'); ?>">Help</a></li>
                                
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            
            <?php if(in_array('admin_category',$active_menu)): ?>
            <!-- Sub navigation -->
            <!-- for admin_category --> 
            <div class="subnav" id="subnav_category">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="<?=site_url('admin_category/index/special/0')?>">[Normal categories for posts]</a></li>
                            <li><a href="<?=site_url('admin_category/index/special/1')?>">[Special categories for other features]</a></li>
                            <li><a href="<?=site_url('admin_category/index/special/2')?>">[Painting categories]</a></li>
                            <li><a href="<?=site_url('admin_category/index/special/3')?>">[Material categories]</a></li>
                        </ul>
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
            <?php endif; ?>
            
            <?php if(in_array('admin_posts',$active_menu)): ?>
            <!-- Sub navigation -->
            <!-- for admin_posts -->
            <div class="subnav" id="subnav_post">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            
                            <li><a href="<?=site_url('admin_posts/index/special/0')?>">[Normal posts]</a></li>
                            <li><a href="<?=site_url('admin_posts/index/special/1')?>">[Special posts for other features]</a></li>
                            <li><a href="<?=site_url('admin_posts/index/special/2')?>">[Painting post]</a></li>
                        </ul>
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
            <?php endif; ?>
            
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="<?php echo site_url('admin_posts/add'); ?>" class="dashboard-module">
                	<img src="src/Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>New post</span>
                </a>
                
                <a href="<?php echo site_url('admin_category').'#cat_add'; ?>" class="dashboard-module">
                	<img src="src/category.png" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>New category</span>
                </a>
                
                <a href="<?php echo site_url('admin_posts'); ?>" class="dashboard-module">
                	<img src="src/Crystal_Clear_files.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Posts</span>
                </a>
                <!--
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_calendar.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_calendar.gif" width="64" height="64" alt="edit" />
                	<span>Calendar</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_user.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
                	<span>My profile</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_stats.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_stats.gif" width="64" height="64" alt="edit" />
                	<span>Stats</span>
                </a>
                -->
                <a href="<?php echo site_url('admin_setting'); ?>" class="dashboard-module">
                	<img src="src/Crystal_Clear_settings.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Settings</span>
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            
            
            <div style="clear:both;"></div>
            