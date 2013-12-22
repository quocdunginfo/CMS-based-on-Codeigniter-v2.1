-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 04:42 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `key`, `value`) VALUES
(2, 'cache_time', '0'),
(3, 'slider_category', '40'),
(5, 'feedback_category', '39'),
(6, 'slider_auto_scroll_time', '5'),
(10, 'maintain_mode', '0'),
(12, 'homepage_widget_category', '52'),
(13, 'homepage_footer_widget_category', '53'),
(14, 'html_footer_left', 'Copyright by quocdunginfo, kienkimkhung'),
(15, 'html_footer_right', 'Hotline: 0979996234'),
(16, 'html_title', 'Cửa hàng bán tranh'),
(17, 'html_seo_keyword', 'Tranh, bán, shopping'),
(18, 'html_seo_author', ''),
(19, 'html_seo_description', ''),
(20, 'feedback_max_content', ''),
(22, 'maximum_preview_post_content', '500'),
(23, 'maximum_preview_post_title', '100'),
(24, 'feedback_captcha', '0'),
(26, 'template_id', '110'),
(29, 'max_count_order_per_product', '5'),
(30, 'main_menu_category', '82'),
(85, 'allow_guest_post_feedback', ''),
(86, 'admin_menu_category', '96'),
(87, 'email_protocol', 'smtp'),
(88, 'email_smtp_host', 'ssl://smtp.googlemail.com'),
(89, 'email_smtp_port', '465'),
(90, 'email_smtp_user', 'quocdunginfo@gmail.com'),
(91, 'email_smtp_pass', 'doyohaanthtode77859'),
(92, 'email_timeout', '10'),
(93, 'html_logo_name', 'Cửa hàng bán tranh'),
(94, 'blog_menu_category', '150'),
(95, 'front_template_id', '110'),
(96, 'blog_template_id', '155'),
(97, 'admin_template_id', '156'),
(98, 'blog_cache_time', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
