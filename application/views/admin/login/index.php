<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$template_path=base_url().'application/views/admin/login/';
?>
<!DOCTYPE html>
<head>
<base href="<?php echo $template_path; ?>" />
<meta charset="utf-8">
<title>Login</title>
<meta name="description" content="Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="src/style.css" />
<script type="text/javascript" src="src/jquery-latest.min.js"></script>
<script src="src/modernizr-latest.js"></script>
<script type="text/javascript" src="src/placeholder.js"></script>
</head>
<body>
<form id="slick-login" action="<?php echo site_url($_tpl.'login/test_login');?>" method="post">
<p align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#CCC; margin-bottom:5px; margin-top:10px; text-align:center; <?php if(!in_array('fail',$state)) echo "visibility:hidden;" ?>">Invalid username or password!</p>
<label for="username">username</label><input type="text" name="username" class="placeholder" placeholder="Username" value="guest">
<label for="password">password</label><input type="password" name="password" class="placeholder" placeholder="Password">
<input type="submit" value="Log In">
</form>
</body>
</html>