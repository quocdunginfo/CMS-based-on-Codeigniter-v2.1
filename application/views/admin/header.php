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
						10: { 
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
        <script language="javascript">
        function confirm_click(link) {
            if (confirm("Are you sure to do this task ?")) {
                document.location = link;
                return true;
            } else {
                return false;
            }
        }
        function qd_blink(selector)
        {
            //blink
            $(selector).fadeIn(1000).fadeOut(200).fadeIn(500).fadeOut(200).fadeIn(500);
        }
        </script>
        
	</head>
	<body>
    	<!-- Header -->
        <div id="header" <?php if($view_mode=='selector') echo 'style="display: none;"' ?>>
            <!-- Header. Status part -->
            <div id="header-status" >
                <div class="container_12">
                                       
                    <div class="grid_8">
					&nbsp;
                    </div>
                    
                    <div class="grid_4">
                         
                        <a href="<?=site_url($_com.'users/edit/'.$current_user->id)?>" id="qdUsername" style="vertical-align:baseline; color:#CCC; font-size:100%; padding: 9px 20px 11px 0px ; line-height:1; display:block; width:auto; height:auto; float:left; position:relative; font: 12px/1.5; margin-top: 4px;">
                         User:   <?php echo $current_user->username.' (fullname: '.$current_user->fullname.')'; ?>
                        </a>
                        <a href="<?php echo site_url($_com.'login/logout'); ?>" id="logout">
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
                            <?=$menu->generate_main_admin()?>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            
            <?php
            $submenu__ = $menu->generate_sub_admin();
            if(trim($submenu__)!='') {
            ?>
            <!-- Sub navigation -->
            <!-- for admin_category --> 
            <div class="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <?=$submenu__?>
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
            <?php } ?>
            
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            <?php if(false) { ?>
            <!-- Dashboard icons -->
            <div class="grid_7" <?php if($view_mode=='selector') echo 'style="display: none;"' ?>>
            	<a href="<?php echo site_url($_com.'posts/add'); ?>" class="dashboard-module">
                	<img src="src/Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>New post</span>
                </a>
                
                <a href="<?php echo site_url($_com.'category').'#cat_add'; ?>" class="dashboard-module">
                	<img src="src/category.png" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>New category</span>
                </a>
                
                <a href="<?php echo site_url($_com.'posts'); ?>" class="dashboard-module">
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
                <a href="<?php echo site_url($_com.'setting'); ?>" class="dashboard-module">
                	<img src="src/Crystal_Clear_settings.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Settings</span>
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            <?php } ?>
            
            
            <div style="clear:both;"></div>
            