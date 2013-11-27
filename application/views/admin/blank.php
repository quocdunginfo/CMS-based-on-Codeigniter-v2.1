<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$template_path=base_url().'application/views/admin/dashboard/';

//load library
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Magic Admin. Advanced, Beautiful and Customizable Admin Template.</title>
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
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="src/jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/css/jquery.wysiwyg.css" media="screen" />
        
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
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="src/jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="src/jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="src/jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="src/jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="src/thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
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
                        <a href="" id="qdUsername" style="vertical-align:baseline; color:#CCC; font-size:100%; padding: 9px 20px 11px 0px ; line-height:1; display:block; width:auto; height:auto; float:left; position:relative; font: 12px/1.5;">
                        User: <?php echo $user_username; ?>
                        </a>
                        <a href="" id="logout">
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
                                <li id="current"><a href="">Dashboard</a></li>
                                <li><a href="">Categories</a></li>
                                <li><a href="<?php echo site_url('admin_posts'); ?>">Posts</a></li>
                                <li><a href="">Users</a></li>
                                <li><a href="">Settings</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="#">link 1</a></li>
                            <li><a href="#">link 2</a></li>
                            <li><a href="#">link 3</a></li>
                            <li><a href="#">link 4</a></li>
                            <li><a href="#">link 5</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_write.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>New post</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_file.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>New category</span>
                </a>
                
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_files.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Posts</span>
                </a>
                
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
                
                <a href="" class="dashboard-module">
                	<img src="src/Crystal_Clear_settings.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Settings</span>
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- module góe here -->
			
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2010. <a href="http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>