<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$template_path=base_url().'application/views/admin/dashboard/';

//load library
$this->load->helper('url');
require_once('header.php');
require_once('../media.php');
require_once('footer.php');
?>