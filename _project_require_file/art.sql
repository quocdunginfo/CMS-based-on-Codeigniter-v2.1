-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 05:27 PM
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
CREATE DATABASE IF NOT EXISTS `art` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `art`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL DEFAULT '0',
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal cat, 1: system cat, 2: thể loại tranh, 3: chất liệu tranh, 4: menu, 5: product order, 6:static page',
  `order_total` int(11) NOT NULL DEFAULT '0',
  `order_status` text NOT NULL,
  `order_online_payment` int(11) NOT NULL DEFAULT '1',
  `order_user_id` int(11) NOT NULL DEFAULT '0',
  `order_customer_user_id` int(11) NOT NULL DEFAULT '0',
  `order_rc_address` text NOT NULL,
  `order_rc_phone` text NOT NULL,
  `order_rc_fullname` text NOT NULL,
  `order_shippingfee_id` int(11) NOT NULL DEFAULT '0',
  `menu_provider_id` int(11) NOT NULL DEFAULT '0',
  `menu_param` text NOT NULL COMMENT 'kết hợp với controller và action trong menu_provider để ra URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `parent_id`, `date_create`, `date_modify`, `active`, `rank`, `special`, `order_total`, `order_status`, `order_online_payment`, `order_user_id`, `order_customer_user_id`, `order_rc_address`, `order_rc_phone`, `order_rc_fullname`, `order_shippingfee_id`, `menu_provider_id`, `menu_param`) VALUES
(39, 'feedback', '', -1, '0000-00-00 00:00:00', '2013-12-18 15:03:04', 1, 51, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(40, 'Slider for home page2', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 39, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(51, 'About page', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 40, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(52, 'Homepage''s 6 widgets', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 53, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(53, 'Homepage''s footer widget', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 52, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(82, 'Main menu 1', '', -1, '2013-12-16 09:02:48', '2013-12-20 12:35:10', 1, 130, 4, 0, '', 1, 0, 0, '', '', '', 0, 3, ''),
(84, 'Trang chủ', '', 82, '2013-12-16 09:03:06', '2013-12-20 12:36:16', 1, 84, 4, 0, '', 1, 0, 0, '', '', '', 0, 5, ''),
(88, 'Liên hệ', '', 82, '2013-12-17 16:21:37', '2013-12-19 18:35:07', 1, 122, 4, 0, '', 1, 0, 0, '', '', '', 0, 1, ''),
(94, 'Tìm kiếm nâng cao', '', 82, '2013-12-18 10:03:54', '2013-12-20 12:32:39', 1, 91, 4, 0, '', 1, 0, 0, '', '', '', 0, 10, ''),
(95, 'Hướng dẫn sử dụng web', '', -1, '2013-12-19 17:39:00', '2013-12-21 12:46:20', 1, 95, 6, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(96, 'Admin Menu 1', '', -1, '2013-12-20 10:22:55', '2013-12-20 13:49:18', 1, 96, 4, 0, '', 1, 0, 0, '', '', '', 0, 3, ''),
(97, 'Dashboard', '', 96, '2013-12-20 10:26:23', '2013-12-20 13:58:12', 1, 97, 4, 0, '', 1, 0, 0, '', '', '', 0, 41, ''),
(98, 'Menu & Modules', '', 96, '2013-12-20 10:26:39', '2013-12-20 13:48:04', 1, 98, 4, 0, '', 1, 0, 0, '', '', '', 0, 38, ''),
(99, 'Categories', '', 96, '2013-12-20 10:27:02', '2013-12-20 11:04:28', 1, 99, 4, 0, '', 1, 0, 0, '', '', '', 0, 34, ''),
(100, '[Normal]', '', 99, '2013-12-20 10:27:26', '2013-12-20 10:27:26', 1, 100, 4, 0, '', 1, 0, 0, '', '', '', 0, 16, ''),
(101, '[System]', '', 99, '2013-12-20 10:27:39', '2013-12-20 11:34:20', 1, 101, 4, 0, '', 1, 0, 0, '', '', '', 0, 17, ''),
(102, '[Painting]', '', 99, '2013-12-20 10:28:01', '2013-12-20 10:28:01', 1, 102, 4, 0, '', 1, 0, 0, '', '', '', 0, 18, ''),
(103, '[Material]', '', 99, '2013-12-20 10:28:21', '2013-12-20 10:28:21', 1, 103, 4, 0, '', 1, 0, 0, '', '', '', 0, 19, ''),
(104, '[Static page]', '', 99, '2013-12-20 10:28:40', '2013-12-20 10:28:40', 1, 104, 4, 0, '', 1, 0, 0, '', '', '', 0, 20, ''),
(105, 'Posts', '', 96, '2013-12-20 10:29:00', '2013-12-20 11:57:47', 1, 105, 4, 0, '', 1, 0, 0, '', '', '', 0, 35, ''),
(109, 'Orders', '', 96, '2013-12-20 10:30:24', '2013-12-20 10:30:41', 1, 109, 4, 0, '', 1, 0, 0, '', '', '', 0, 25, ''),
(113, 'Groups', '', 96, '2013-12-20 10:31:52', '2013-12-20 10:31:52', 1, 114, 4, 0, '', 1, 0, 0, '', '', '', 0, 28, ''),
(114, 'Setting', '', 96, '2013-12-20 10:32:24', '2013-12-20 11:48:24', 1, 118, 4, 0, '', 1, 0, 0, '', '', '', 0, 37, ''),
(115, '[Common setting]', '', 114, '2013-12-20 10:32:40', '2013-12-20 12:58:26', 1, 115, 4, 0, '', 1, 0, 0, '', '', '', 0, 29, ''),
(116, '[Components & Templates & Styles]', '', 114, '2013-12-20 10:33:01', '2013-12-22 13:30:30', 1, 116, 4, 0, '', 1, 0, 0, '', '', '', 0, 30, ''),
(117, '[Antivirus]', '', 114, '2013-12-20 10:33:24', '2013-12-20 10:33:24', 1, 117, 4, 0, '', 1, 0, 0, '', '', '', 0, 31, ''),
(118, 'Media', '', 96, '2013-12-20 10:34:01', '2013-12-20 10:34:01', 1, 119, 4, 0, '', 1, 0, 0, '', '', '', 0, 32, ''),
(119, 'Users', '', 96, '2013-12-20 12:01:02', '2013-12-20 12:01:32', 1, 113, 4, 0, '', 1, 0, 0, '', '', '', 0, 36, ''),
(120, '[Manager]', '', 119, '2013-12-20 12:02:19', '2013-12-20 12:02:19', 1, 120, 4, 0, '', 1, 0, 0, '', '', '', 0, 26, ''),
(122, 'Giới thiệu', '', 82, '2013-12-20 12:28:21', '2013-12-21 12:40:34', 1, 94, 4, 0, '', 1, 0, 0, '', '', '', 0, 13, '133'),
(123, '[Static page]', '', 105, '2013-12-20 12:28:55', '2013-12-20 12:28:55', 1, 126, 4, 0, '', 1, 0, 0, '', '', '', 0, 24, ''),
(124, '[Normal]', '', 105, '2013-12-20 13:43:52', '2013-12-20 13:43:52', 1, 123, 4, 0, '', 1, 0, 0, '', '', '', 0, 21, ''),
(125, '[Painting]', '', 105, '2013-12-20 13:44:12', '2013-12-20 13:49:45', 1, 125, 4, 0, '', 1, 0, 0, '', '', '', 0, 23, ''),
(126, '[System]', '', 105, '2013-12-20 13:44:48', '2013-12-20 13:44:55', 1, 124, 4, 0, '', 1, 0, 0, '', '', '', 0, 22, ''),
(128, '[Customer]', '', 119, '2013-12-20 13:53:27', '2013-12-20 13:53:27', 1, 128, 4, 0, '', 1, 0, 0, '', '', '', 0, 27, ''),
(129, 'Help', '', 96, '2013-12-20 13:55:56', '2013-12-20 13:56:24', 1, 129, 4, 0, '', 1, 0, 0, '', '', '', 0, 39, ''),
(131, 'Tranh sơn dầu', '', -1, '2013-12-21 07:17:46', '2013-12-21 07:17:46', 1, 131, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(132, 'Tranh thêu tay', '', -1, '2013-12-21 07:17:57', '2013-12-21 07:17:57', 1, 132, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(133, 'Tranh quạt', '', -1, '2013-12-21 07:18:08', '2013-12-21 07:18:08', 1, 133, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(134, 'Tranh quạt đồng', '', 133, '2013-12-21 07:19:28', '2013-12-21 07:19:28', 1, 134, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(135, 'Tranh quạt giấy', '', 133, '2013-12-21 07:19:36', '2013-12-21 07:19:36', 1, 135, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(136, 'Tranh đá quý', '', -1, '2013-12-21 07:36:02', '2013-12-21 07:36:02', 1, 136, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(137, 'Tranh gỗ nghệ thuật', '', -1, '2013-12-21 07:36:10', '2013-12-21 07:36:10', 1, 137, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(138, 'Sơn dầu', '', -1, '2013-12-21 07:37:29', '2013-12-21 07:37:29', 1, 138, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(139, 'Gỗ', '', -1, '2013-12-21 07:37:35', '2013-12-21 07:37:35', 1, 139, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(140, 'Thủ công', '', -1, '2013-12-21 07:37:39', '2013-12-21 07:37:39', 1, 140, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(141, 'Đồng', '', -1, '2013-12-21 07:37:45', '2013-12-21 07:37:45', 1, 141, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(142, 'Giấy', '', -1, '2013-12-21 07:37:48', '2013-12-21 07:37:48', 1, 142, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(143, 'Đá saphire', '', -1, '2013-12-21 07:39:12', '2013-12-21 07:39:12', 1, 143, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(144, 'Đá thạch anh hồng', '', -1, '2013-12-21 07:48:09', '2013-12-21 07:48:09', 1, 144, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(145, 'Đá ruby', '', -1, '2013-12-21 07:48:14', '2013-12-21 07:48:14', 1, 145, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(146, 'Tranh quạt gỗ', '', 133, '2013-12-21 11:45:47', '2013-12-21 11:45:47', 1, 146, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(147, '', '', 0, '2013-12-21 12:49:35', '2013-12-22 15:31:08', 1, 147, 5, 11000000, 'chualienlac', 1, 9, 9, '123 xyz ', '09090909090', 'Nguyễn Hoàng Kim', 1, 0, ''),
(148, '', '', 0, '2013-12-21 12:59:54', '2013-12-21 12:59:54', 1, 148, 5, 81000000, 'chualienlac', 0, 0, 15, '123 xyz ', '84890809809', 'Nguyễn Hoàng Kim', 1, 0, ''),
(149, '', '', 0, '2013-12-21 13:16:52', '2013-12-21 13:17:12', 1, 149, 5, 3200000, 'dabihuy', 0, 0, 13, '217 kkkk', '090032090', 'Xì Kim', 1, 0, ''),
(151, 'Diễn đàn', '', 82, '2013-12-22 10:01:35', '2013-12-22 10:18:48', 1, 151, 4, 0, '', 1, 0, 0, '', '', '', 0, 43, ''),
(152, 'Blog menu', '', -1, '2013-12-22 10:20:09', '2013-12-22 10:20:09', 1, 152, 4, 0, '', 1, 0, 0, '', '', '', 0, 3, ''),
(153, 'Trang chủ diễn đàn', '', 152, '2013-12-22 10:20:27', '2013-12-22 10:21:54', 1, 153, 4, 0, '', 1, 0, 0, '', '', '', 0, 43, ''),
(154, 'Hỏi đáp', '', 152, '2013-12-22 10:21:20', '2013-12-22 10:29:21', 1, 154, 4, 0, '', 1, 0, 0, '', '', '', 0, 42, '158'),
(155, 'Tin tức', '', 152, '2013-12-22 10:22:42', '2013-12-22 10:29:42', 1, 155, 4, 0, '', 1, 0, 0, '', '', '', 0, 42, '159'),
(156, 'Khuyến mãi', '', 152, '2013-12-22 10:22:57', '2013-12-22 10:29:53', 1, 156, 4, 0, '', 1, 0, 0, '', '', '', 0, 42, '160'),
(157, 'Cửa hàng', '', 152, '2013-12-22 10:23:25', '2013-12-22 10:23:25', 1, 161, 4, 0, '', 1, 0, 0, '', '', '', 0, 5, ''),
(158, 'Hỏi đáp', '', -1, '2013-12-22 10:25:06', '2013-12-22 13:42:22', 1, 158, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(159, 'Tin tức', '', -1, '2013-12-22 10:25:12', '2013-12-22 10:25:12', 1, 159, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(160, 'Khuyến mãi', '', -1, '2013-12-22 10:25:17', '2013-12-22 10:25:17', 1, 160, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(161, 'Liên hệ', '', 152, '2013-12-22 10:48:34', '2013-12-22 10:48:34', 1, 157, 4, 0, '', 1, 0, 0, '', '', '', 0, 1, ''),
(164, '', '', 0, '2013-12-22 14:33:55', '2013-12-22 14:33:55', 1, 164, 5, 67500000, 'chualienlac', 0, 0, 9, 'ádasd', '234234', 'Nguyễn Quốc Dũng', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `guest_name` text NOT NULL,
  `guest_email` text NOT NULL,
  `guest_ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `description`, `active`) VALUES
(1, 'Admin', 'Nhân viên hệ thống', 1),
(2, 'User', 'Normal user', 1),
(3, 'KeToan', 'Kế toán', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_provider`
--

CREATE TABLE IF NOT EXISTS `menu_provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `controller` text NOT NULL COMMENT 'use when convert menuitem to URL',
  `selector_uri` text NOT NULL COMMENT 'URI from website path',
  `action` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `menu_provider`
--

INSERT INTO `menu_provider` (`id`, `name`, `controller`, `selector_uri`, `action`, `active`) VALUES
(1, 'Front Contact Page', 'front/contact/', '', 'index/', 1),
(2, 'Front Painting detail >>', 'front/product/', 'admin/posts/index/special/2/view_mode/selector', 'index/', 1),
(3, 'Full URL >>', 'redirect/', 'admin/url/index/view_mode/selector', 'index?url=', 1),
(4, 'Front All Products', 'front/products/', '', 'painting_cat/', 1),
(5, 'Front Homepage', 'front/home/', '', 'index/', 1),
(6, 'Front Login page', 'front/login/', '', 'index/', 1),
(7, 'Front Register page', 'front/register/', '', 'index/', 1),
(8, 'Front Account page', 'front/account/', '', 'index/', 1),
(9, 'Front Logout page', 'front/logout/', '', 'index/', 1),
(10, 'Front Search page', 'front/search/', '', 'index/', 1),
(11, 'Front Cart page', 'front/cart/', '', 'index/', 1),
(12, 'Front Painting Category >>', 'front/products/', 'admin/category/index/special/2/view_mode/selector', 'painting_cat/id/', 1),
(13, 'Front Static Page >>', 'front/static_page/', 'admin/posts/index/special/6/view_mode/selector', 'index/', 1),
(14, 'Admin Home Module', 'admin/', '', 'home/', 1),
(15, 'Admin Menu module', 'admin/menu/', '', 'index/', 1),
(16, 'Admin Normal Cat Module', 'admin/category/', '', 'index/special/0', 1),
(17, 'Admin System Cat Module', 'admin/category/', '', 'index/special/1', 1),
(18, 'Admin Painting Cat Module', 'admin/category/', '', 'index/special/2', 1),
(19, 'Admin Material Cat Module', 'admin/category/', '', 'index/special/3', 1),
(20, 'Admin Static Page Cat Module', 'admin/category/', '', 'index/special/6', 1),
(21, 'Admin Normal Post Module', 'admin/posts/', '', 'index/special/0', 1),
(22, 'Admin System Post Module', 'admin/posts/', '', 'index/special/1', 1),
(23, 'Admin Painting Post Module', 'admin/posts/', '', 'index/special/2', 1),
(24, 'Admin Static Page Post Module', 'admin/posts/', '', 'index/special/6', 1),
(25, 'Admin Order Module', 'admin/orders/', '', 'index/', 1),
(26, 'Admin User Module', 'admin/users/', '', 'index/special/0', 1),
(27, 'Admin Customer Module', 'admin/users/', '', 'index/special/1', 1),
(28, 'Admin Group Module', 'admin/groups/', '', 'index/', 1),
(29, 'Admin Common Setting Module', 'admin/setting/', '', 'index/', 1),
(30, 'Admin Com>Tpl>Style Module', 'admin/template/', '', 'index/', 1),
(31, 'Admin Antivirus Module', 'admin/antivirus/', '', 'index/', 1),
(32, 'Admin Media Module', 'admin/media/', '', 'index/', 1),
(33, 'Admin Help Module', 'admin/help/', '', 'index/', 1),
(34, '_Admin Normal Cat Module', 'admin/category/', '', 'index_/', 1),
(35, '_Admin Normal Post Module', 'admin/posts/', '', 'index_/', 1),
(36, '_Admin User Module', 'admin/users/', '', 'index_/', 1),
(37, '_Admin Common Setting Module', 'admin/setting/', '', 'index_/', 1),
(38, '_Admin Menu Module', 'admin/menu/', '', 'index_/', 1),
(39, '_Admin Help Module', 'admin/help/', '', 'index_/', 1),
(40, 'Admin Help Module', 'admin/help/', '', 'index/', 1),
(41, '_Admin Home Module', 'admin/', '', 'home/index_/', 1),
(42, 'Blog Posts from Cat Page', 'blog/', 'admin/category/index/special/0/view_mode/selector', 'posts/category/id/', 1),
(43, 'Blog Home Page', 'blog/', '', 'home/', 1),
(44, 'Blog Post detail Page', 'blog/', 'admin/posts/index/special/0/view_mode/selector', 'post/index/', 1);

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
(14, 'html_footer_left', 'quocdunginfo'),
(15, 'html_footer_right', 'kienkimkhung'),
(16, 'html_title', 'Cửa hàng tranh ảnh Kim-Dũng'),
(17, 'html_seo_keyword', 'Bán tranh, vẽ tranh, Tranh nghệ thuật, quocdunginfo, kienkimkhung'),
(18, 'html_seo_author', ''),
(19, 'html_seo_description', ''),
(20, 'feedback_max_content', ''),
(22, 'maximum_preview_post_content', '500'),
(23, 'maximum_preview_post_title', '100'),
(24, 'feedback_captcha', '1'),
(26, 'template_id', '167'),
(29, 'max_count_order_per_product', '3'),
(30, 'main_menu_category', '82'),
(85, 'allow_guest_post_feedback', ''),
(86, 'admin_menu_category', '96'),
(87, 'front_template_id', '167'),
(88, 'blog_template_id', '169'),
(89, 'admin_template_id', '170'),
(90, 'blog_cache_time', '0'),
(91, 'html_logo_name', ''),
(92, 'blog_menu_category', '152'),
(93, 'email_protocol', 'smtp'),
(94, 'email_smtp_host', 'ssl://smtp.googlemail.com'),
(95, 'email_smtp_pass', 'kienkimkhung'),
(96, 'email_smtp_port', '465'),
(97, 'email_smtp_user', 'cuahangbangiay@gmail.com'),
(98, 'email_timeout', '30');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`) VALUES
(1, 'home_view'),
(2, 'home_edit'),
(3, 'home_delete'),
(4, 'home_add'),
(5, 'category_view'),
(6, 'category_edit'),
(7, 'category_delete'),
(8, 'category_add'),
(11, 'post_view'),
(12, 'post_edit'),
(13, 'post_delete'),
(14, 'post_add'),
(15, 'user_view'),
(16, 'user_edit'),
(17, 'user_delete'),
(18, 'user_add'),
(19, 'setting_view'),
(20, 'setting_edit'),
(21, 'setting_delete'),
(22, 'setting_add'),
(23, 'media_view'),
(24, 'media_edit'),
(25, 'media_delete'),
(26, 'media_add'),
(27, 'order_view'),
(28, 'order_edit'),
(29, 'order_delete'),
(30, 'order_add'),
(31, 'menu_view'),
(32, 'menu_add'),
(33, 'menu_edit'),
(34, 'menu_delete'),
(35, 'group_add'),
(36, 'group_edit'),
(37, 'group_delete'),
(38, 'group_view');

-- --------------------------------------------------------

--
-- Table structure for table `permission_group`
--

CREATE TABLE IF NOT EXISTS `permission_group` (
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_group`
--

INSERT INTO `permission_group` (`permission_id`, `group_id`) VALUES
(5, 3),
(1, 3),
(23, 3),
(27, 3),
(11, 3),
(19, 3),
(15, 3),
(8, 1),
(7, 1),
(6, 1),
(5, 1),
(35, 1),
(37, 1),
(36, 1),
(38, 1),
(4, 1),
(3, 1),
(2, 1),
(1, 1),
(26, 1),
(25, 1),
(24, 1),
(23, 1),
(32, 1),
(34, 1),
(33, 1),
(31, 1),
(30, 1),
(29, 1),
(28, 1),
(27, 1),
(14, 1),
(13, 1),
(12, 1),
(11, 1),
(22, 1),
(21, 1),
(20, 1),
(19, 1),
(18, 1),
(17, 1),
(16, 1),
(15, 1),
(5, 2),
(38, 2),
(1, 2),
(23, 2),
(31, 2),
(27, 2),
(11, 2),
(19, 2),
(15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content_lite` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `avatar` text NOT NULL,
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal post, 1: special post, 2: painting post,3: [not yet], 4: order_detail, 5: template, 6: static page',
  `optional1` text NOT NULL,
  `optional2` text NOT NULL,
  `art_id` text NOT NULL,
  `art_count` int(11) NOT NULL DEFAULT '0',
  `art_width` int(11) NOT NULL DEFAULT '0',
  `art_height` int(11) NOT NULL DEFAULT '0',
  `art_sizeunit` varchar(4) NOT NULL DEFAULT 'cm' COMMENT 'm, cm, inch, mm',
  `art_price` int(11) NOT NULL COMMENT 'VND only',
  `art_sold` int(11) NOT NULL DEFAULT '0',
  `order_product_id` int(11) NOT NULL DEFAULT '0',
  `order_count` int(11) NOT NULL DEFAULT '0',
  `order_unitprice` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `optional1`, `optional2`, `art_id`, `art_count`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `order_product_id`, `order_count`, `order_unitprice`) VALUES
(54, 'Liên kết mạng xã hội', '<p>-Facebook:</p>\r\n<p>-Twitter:</p>\r\n<p>-Youtube:</p>', '2013-09-15 19:14:24', '2013-09-15 19:14:24', 8, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(132, 'Giới thiệu (hướng dẫn)', '<p>-V&ocirc; Admin &gt; Posts &gt; Static page &gt; Add hoặc Update post hiện c&oacute;</p>\r\n<p>-Quay ra Admin &gt; Menu &amp; Style &gt; Add hoặc Update Menu item (Chọn Menu Provider = Template Static Page), chọn tiếp post cần hiển thị</p>\r\n<p>-Lưu &gt; Ho&agrave;n Ttất</p>', '2013-12-19 18:10:17', '2013-12-21 12:45:29', 9, '', 1, '', 6, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(133, 'Giới thiệu cửa hàng', '<p>Ch&agrave;o mừng bạn đến với&nbsp;<strong>Cửa h&agrave;ng tranh ảnh Kim&nbsp;<strong>Dũng</strong></strong></p>\r\n<p>&nbsp;<img style="display: block; margin-left: auto; margin-right: auto;" src="[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]b692fce8e492b3c7189c4702a46bed7b.jpg" alt="b692fce8e492b3c7189c4702a46bed7b" /></p>\r\n<p>Hiện nay, c&ugrave;ng với sự ph&aacute;t triển của Internet, xu hướng thương mại điện tử cũng đang ph&aacute;t triển mạnh mẽ. C&aacute;c Website mua b&aacute;n trực tuyến lần lượt xuất hiện v&agrave; được sự t&iacute;n nhiệm của kh&aacute;ch h&agrave;ng.</p>\r\n<p>Bắt kịp với xu hướng đ&oacute;, website ch&uacute;ng t&ocirc;i được th&agrave;nh lập với mục đ&iacute;ch cung cấp cho kh&aacute;ch h&agrave;ng những bức tranh đẹp nhất, tốt nhất, ph&ugrave; hợp với kh&ocirc;ng gian ng&ocirc;i nh&agrave;, văn ph&ograve;ng của bạn.</p>\r\n<p>Với phong c&aacute;ch l&agrave;m việc chuy&ecirc;n nghiệp, đội ngũ thợ c&oacute; tay nghề, ch&uacute;ng t&ocirc;i sẽ l&agrave;m bạn h&agrave;i l&ograve;ng khi đến với ch&uacute;ng t&ocirc;i.</p>\r\n<p>C&aacute;c sản phẩm ch&iacute;nh của ch&uacute;ng t&ocirc;i:</p>\r\n<p>- C&aacute;c loại<a href="/Joomla_3/index.php/category/34-tranh" target="_blank">&nbsp;</a><a href="/cms/front/products/painting_cat/id/131#qd_sapxep">tranh sơn dầu</a>,&nbsp;<a href="/cms/front/products/painting_cat/id/132#qd_sapxep" target="_blank">tranh th&ecirc;u tay</a>,&nbsp;<a href="/cms/front/products/painting_cat/id/133#qd_sapxep" target="_blank">tranh quạt</a>,&nbsp;<a href="/cms/front/products/painting_cat/id/136#qd_sapxep" target="_blank">tranh đ&aacute; qu&yacute;</a>,&nbsp;<a href="/cms/front/products/painting_cat/id/137#qd_sapxep" target="_blank">tranh gỗ nghệ thuật</a>,....</p>\r\n<p><strong>Cửa h&agrave;ng tranh ảnh Kim Dũng</strong>&nbsp;rất h&acirc;n hạnh được phục vụ qu&yacute; kh&aacute;ch !</p>', '2013-12-21 04:43:03', '2013-12-22 17:26:10', 9, '', 1, '', 6, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(134, 'Bác Hồ vẫy tay chào', '<p>Chưa c&oacute; m&ocirc; tả</p>', '2013-12-21 08:48:25', '2013-12-21 11:21:29', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]bac-ho-tranh-son-dau.jpg', 2, '', '', 'S157', 2, 70, 100, 'cm', 1060000, 0, 0, 0, 0),
(135, 'Bác Hồ ngồi làm việc', '<p>Chưa c&oacute; m&ocirc; tả</p>', '2013-12-21 09:01:30', '2013-12-21 10:08:53', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]bac-ho-ngoi-lam-viec1.jpg', 2, '', '', 'S172', 5, 100, 150, 'cm', 23000000, 0, 0, 0, 0),
(136, 'Hạnh phúc giàu sang', '<div id="asummary">\r\n<p><strong>&Yacute; nghĩa:</strong></p>\r\n<p>Trong c&aacute;c quan niệm về phong thủy truyền thống, chim được coi l&agrave; biểu tượng cho sức mạnh của những cơ hội mới, đặc biệt khi bạn đang gặp phải vận hạn. Chim cũng được coi l&agrave; biểu tượng của t&igrave;nh duy&ecirc;n v&agrave; sự gi&agrave;u c&oacute;.</p>\r\n</div>\r\n<p>C&ocirc;ng hay khổng tước l&agrave; lo&agrave;i chim thuộc họ trĩ, từ xưa n&oacute; đ&atilde; được xem l&agrave; lo&agrave;i chim qu&yacute; v&agrave; được coi trọng, mọi người rất ch&uacute; &yacute; đến bộ l&ocirc;ng đu&ocirc;i sặc sỡ của n&oacute;. Thời cổ, người ta thường nu&ocirc;i c&ocirc;ng để thưởng ngoạn.</p>\r\n<div id="acontent">\r\n<p>Hoa văn tr&ecirc;n l&ocirc;ng của chim c&ocirc;ng giống như những đồng tiền cổ nối liền nhau, m&agrave;u sắc chủ yếu l&agrave; v&agrave;ng &oacute;ng v&ocirc; c&ugrave;ng lộng lẫy. V&igrave; vậy trước đ&acirc;y người ta c&ograve;n d&ugrave;ng l&ocirc;ng chim c&ocirc;ng l&agrave;m đồ trang sức.</p>\r\n<p>L&ocirc;ng chim c&ocirc;ng l&agrave;m th&agrave;nh quạt được gọi l&agrave; quạt l&ocirc;ng c&ocirc;ng. Cắm l&ocirc;ng chim c&ocirc;ng v&agrave;o b&igrave;nh b&agrave;y ở tr&ecirc;n b&agrave;n cũng l&agrave; c&aacute;ch trang tr&iacute; nh&agrave; cửa được y&ecirc;u th&iacute;ch.</p>\r\n<p>Trước đ&acirc;y ở Trung Quốc, chỉ c&oacute; quan ngũ phẩm trở l&ecirc;n mới được d&ugrave;ng mũ cắm l&ocirc;ng chim c&ocirc;ng, cho n&ecirc;n l&ocirc;ng chim c&ocirc;ng cũng l&agrave; biểu tượng của quan chức, tiền t&agrave;i, uy quyền.</p>\r\n<p>Người ta cho rằng, l&ocirc;ng chim c&ocirc;ng c&oacute; thể h&uacute;t năng lượng từ trời đất, n&ecirc;n d&ugrave;ng điều h&ograve;a &acirc;m dương trong nh&agrave;, cơ quan, văn ph&ograve;ng, cửa h&agrave;ng kinh doanh rất tốt. Sự điều h&ograve;a lại &acirc;m dương l&agrave; thật sự cần thiết để lấy lại h&ograve;a kh&iacute;, l&agrave;m cho c&ocirc;ng việc trong nh&agrave; cũng như cơ quan bạn tốt hơn.</p>\r\n<p>Nếu một người kh&aacute;ch đến c&ocirc;ng ty, nh&agrave; bạn, hay cửa h&agrave;ng của bạn mang theo người luồng kh&iacute; xấu, nếu bạn d&ugrave;ng biện ph&aacute;p phong thủy lộ liễu, kh&aacute;ch biết sẽ buồn, bởi thế d&ugrave;ng một bức tranh chim c&ocirc;ng hay một chiếc b&igrave;nh cắm l&ocirc;ng c&ocirc;ng trang tr&iacute; huy ho&agrave;ng l&agrave; biện ph&aacute;p xua đi luồng khi xấu mang lại vượng kh&iacute; cho văn ph&ograve;ng lại đẹp về mặt thẩm mỹ.<br />Để một b&igrave;nh cắm l&ocirc;ng c&ocirc;ng trong ph&ograve;ng ngủ được cho l&agrave; sẽ tạo th&ecirc;m sức mạnh ph&ograve;ng the cho ph&aacute;i nam, v&agrave; sự gợi cảm cho ph&aacute;i nữ. Treo tranh đ&ocirc;i chim c&ocirc;ng &acirc;n &aacute;i trong nh&agrave; cũng gi&uacute;p t&igrave;nh duy&ecirc;n bền vững, nồng thắm.</p>\r\n</div>', '2013-12-21 09:15:54', '2013-12-21 11:00:38', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]doi-cong-tinh-yeu.jpg', 2, '', '', 'S667', 3, 70, 90, 'cm', 9900000, 0, 0, 0, 0),
(137, 'Mùa cấy lúa nước', '<p>Chưa c&oacute; m&ocirc; tả</p>', '2013-12-21 11:19:20', '2013-12-21 11:21:15', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]que.jpg', 2, '', '', 'S170', 0, 50, 70, 'cm', 5700000, 0, 0, 0, 0),
(138, 'Ngôi nhà cổ châu Âu', '<div><img title="Nguyễn Th&aacute;i Vinh" src="http://www.muabantranh.com/upload/author/thai_vinh3.jpg" alt="Nguyễn Th&aacute;i Vinh" /></div>\r\n<div>T&ecirc;n t&aacute;c giả :&nbsp;Nguyễn Th&aacute;i Vinh</div>\r\n<div>B&uacute;t danh :&nbsp;Thaivinh</div>\r\n<div>Qu&ecirc; qu&aacute;n :&nbsp;TP. Hồ Ch&iacute; Minh</div>\r\n<div>Địa chỉ :&nbsp;Xưởng sản xuất: 120 Thống Nhất, Phường T&acirc;n Th&agrave;nh, Quận T&acirc;n Ph&uacute;, TP.HCM, Việt Nam</div>\r\n<div>Điện thoại :&nbsp;093 77 99 030</div>\r\n<div>Email :&nbsp;<a href="mailto:tranhtrucnghethuat@gmail.com">tranhtrucnghethuat@gmail.com</a></div>\r\n<div>&nbsp;</div>\r\n<div><strong>Th&ocirc;ng tin t&aacute;c giả:</strong></div>\r\n<div>\r\n<p>Được th&agrave;nh lập v&agrave;o đầu năm 2000, với mục ti&ecirc;u : Bảo tồn, g&igrave;n giữ v&agrave; ph&aacute;t huy những gi&aacute; trị đ&iacute;ch thực về một loại h&igrave;nh nghệ thuật đặc sắc m&agrave; tr&ecirc;n Thế giới chỉ duy nhất&ucirc; Việt&nbsp;Nam&nbsp;mới c&oacute;. Sản phẩm được thể hiện tr&ecirc;n chất liệu tr&uacute;c, bởi đội ngũ Hoạ sĩ - Kiến tr&uacute;c sư - Nghệ nh&acirc;n xuất sắc .&nbsp;</p>\r\n<p>Nhiều năm qua, với l&ograve;ng t&acirc;m huyết, niềm đam m&ecirc; v&agrave; sự s&aacute;ng tạo kh&ocirc;ng mệt mỏi cũng như được sự ủng hộ, động vi&ecirc;n v&agrave; tin tưởng của c&ocirc;ng ch&uacute;ng y&ecirc;u nghệ thuật Việt Nam v&agrave; Thế giới, Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh ng&agrave;y c&agrave;ng ph&aacute;t triển vững mạnh v&agrave; tạo được chỗ đứng vững chắc tr&ecirc;n những thị trường kh&oacute; t&iacute;nh như: Nhật, Mĩ v&agrave; Ch&acirc;u &acirc;u&hellip;&nbsp;</p>\r\n<p>H&agrave;ng năm một lượng lớn sản phẩm của Th&aacute;i Vinh được xuất sang c&aacute;c thị trường n&agrave;y như: Tranh sơn dầu, Tranh tr&uacute;c, M&agrave;nh tr&uacute;c, M&agrave;nh tre, B&igrave;nh phong, Logo, Bảng hiệu bằng tre tr&uacute;c với họa tiết phong ph&uacute; v&agrave; đa dạng theo y&ecirc;u cầu kh&aacute;ch h&agrave;ng. Trong đ&oacute;, Tranh tr&uacute;c l&agrave; bước đột ph&aacute; ngoạn mục trong nghệ thuật sắp đặt - s&aacute;ng tạo.C&oacute; những bức tranh đạt gi&aacute; trị nghệ thuật cao của Hoạ sỹ Nguyễn Th&aacute;i Vinh được treo ở nhiều Bảo T&agrave;ng &ndash; lưu giữ l&acirc;u d&agrave;i nhằm phục vụ C&ocirc;ng ch&uacute;ng thưởng ngoạn.&nbsp;</p>\r\n<p><img src="http://www.muabantranh.com/Images_upload/images/bangkhen.jpg" alt="" width="575" height="332" /></p>\r\n<p>Với sự cống hiến cho loại h&igrave;nh nghệ thuật đặc sắc n&agrave;y, Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh tự h&agrave;o l&agrave; c&ocirc;ng ty Mỹ Thuật duy nhất của Việt Nam nhận được giải V&agrave;ng &ldquo;Ng&ocirc;i Sao Việt Nam&rdquo; v&agrave; &ldquo;Tinh Hoa Việt Nam&rdquo;, c&ugrave;ng nhiều bằng khen v&agrave; giấy chứng nhận về th&agrave;nh tựu s&aacute;ng tạo nghệ thuật tr&ecirc;n chất liệu Tr&uacute;c; l&agrave; Hội Vi&ecirc;n ch&iacute;nh thức của ph&ograve;ng Thương Mại v&agrave; C&ocirc;ng Nghiệp Việt Nam v&agrave; l&agrave; hội vi&ecirc;n của nhiều tổ chức kh&aacute;c .&nbsp;</p>\r\n<p>Đến với Th&aacute;i Vinh, Qu&yacute; kh&aacute;ch h&agrave;ng sẽ cảm nhận được n&eacute;t đẹp tuyệt vời của sản phẩm v&agrave; sự s&aacute;ng tạo Nghệ thuật, mang đến sự kh&aacute;c biệt ho&agrave;n to&agrave;n, về chất lượng cũng như mẫu m&atilde; so với những sản phẩm c&ugrave;ng loại kh&aacute;c.&nbsp;</p>\r\n<p>Sản phẩm được ch&iacute;nh Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh thiết kế, sản xuất n&ecirc;n kh&aacute;ch h&agrave;ng sẽ ho&agrave;n to&agrave;n an t&acirc;m về chất lượng, gi&aacute; cả, dịch vụ hậu m&atilde;i, &hellip; Tr&aacute;nh được những rủi ro kh&ocirc;ng đ&aacute;ng c&oacute; v&iacute; dụ như: sai về thiết kế, mẫu m&atilde;, m&agrave;u sắc, bao b&igrave; v.v&hellip; khi kh&ocirc;ng t&igrave;m được nh&agrave; sản xuất thật sự v&agrave; chuy&ecirc;n nghiệp.&nbsp;</p>\r\n<p>H&atilde;y n&ecirc;u &yacute; tưởng hoặc lựa chọn h&igrave;nh ảnh, k&iacute;ch cỡ y&ecirc;u th&iacute;ch m&agrave; bạn muốn thể hiện tr&ecirc;n chất liệu vải sơn dầu hoặc chất liệu Tr&uacute;c&hellip; Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh sẽ mang lại điều kỳ diệu cho kh&ocirc;ng gian sống của bạn!&nbsp;</p>\r\n<p>Ch&uacute;ng t&ocirc;i rất mong muốn được hợp t&aacute;c v&agrave; chia sẻ quyền lợi với c&aacute;c tổ chức, c&aacute; nh&acirc;n quan t&acirc;m đến lĩnh vực n&agrave;y.</p>\r\n<p>Để biết th&ecirc;m th&ocirc;ng tin chi tiết, vui l&ograve;ng li&ecirc;n hệ:</p>\r\n<p>Địa chỉ: 120 Thống Nhất, P.T&acirc;n Th&agrave;nh, Q. T&acirc;n Ph&uacute;, Tp.HCM</p>\r\n<p>Điện thoại: (08) 38103830 &ndash;&nbsp;Hotline&nbsp;: 093 77 99 030</p>\r\n</div>\r\n<div>&nbsp;</div>', '2013-12-21 11:23:37', '2013-12-21 11:26:05', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]chau-au-3.jpg', 2, '', '', 'S163', 5, 70, 90, 'cm', 8900000, 0, 0, 0, 0),
(139, 'Ngôi nhà cổ tích', '<div><img title="Nguyễn Th&aacute;i Vinh" src="http://www.muabantranh.com/upload/author/thai_vinh3.jpg" alt="Nguyễn Th&aacute;i Vinh" /></div>\r\n<div>T&ecirc;n t&aacute;c giả :&nbsp;Nguyễn Th&aacute;i Vinh</div>\r\n<div>B&uacute;t danh :&nbsp;Thaivinh</div>\r\n<div>Qu&ecirc; qu&aacute;n :&nbsp;TP. Hồ Ch&iacute; Minh</div>\r\n<div>Địa chỉ :&nbsp;Xưởng sản xuất: 120 Thống Nhất, Phường T&acirc;n Th&agrave;nh, Quận T&acirc;n Ph&uacute;, TP.HCM, Việt Nam</div>\r\n<div>Điện thoại :&nbsp;093 77 99 030</div>\r\n<div>Email :&nbsp;<a href="mailto:tranhtrucnghethuat@gmail.com">tranhtrucnghethuat@gmail.com</a></div>\r\n<div>&nbsp;</div>\r\n<div><strong>Th&ocirc;ng tin t&aacute;c giả:</strong></div>\r\n<div>\r\n<p>Được th&agrave;nh lập v&agrave;o đầu năm 2000, với mục ti&ecirc;u : Bảo tồn, g&igrave;n giữ v&agrave; ph&aacute;t huy những gi&aacute; trị đ&iacute;ch thực về một loại h&igrave;nh nghệ thuật đặc sắc m&agrave; tr&ecirc;n Thế giới chỉ duy nhất&ucirc; Việt&nbsp;Nam&nbsp;mới c&oacute;. Sản phẩm được thể hiện tr&ecirc;n chất liệu tr&uacute;c, bởi đội ngũ Hoạ sĩ - Kiến tr&uacute;c sư - Nghệ nh&acirc;n xuất sắc .&nbsp;</p>\r\n<p>Nhiều năm qua, với l&ograve;ng t&acirc;m huyết, niềm đam m&ecirc; v&agrave; sự s&aacute;ng tạo kh&ocirc;ng mệt mỏi cũng như được sự ủng hộ, động vi&ecirc;n v&agrave; tin tưởng của c&ocirc;ng ch&uacute;ng y&ecirc;u nghệ thuật Việt Nam v&agrave; Thế giới, Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh ng&agrave;y c&agrave;ng ph&aacute;t triển vững mạnh v&agrave; tạo được chỗ đứng vững chắc tr&ecirc;n những thị trường kh&oacute; t&iacute;nh như: Nhật, Mĩ v&agrave; Ch&acirc;u &acirc;u&hellip;&nbsp;</p>\r\n<p>H&agrave;ng năm một lượng lớn sản phẩm của Th&aacute;i Vinh được xuất sang c&aacute;c thị trường n&agrave;y như: Tranh sơn dầu, Tranh tr&uacute;c, M&agrave;nh tr&uacute;c, M&agrave;nh tre, B&igrave;nh phong, Logo, Bảng hiệu bằng tre tr&uacute;c với họa tiết phong ph&uacute; v&agrave; đa dạng theo y&ecirc;u cầu kh&aacute;ch h&agrave;ng. Trong đ&oacute;, Tranh tr&uacute;c l&agrave; bước đột ph&aacute; ngoạn mục trong nghệ thuật sắp đặt - s&aacute;ng tạo.C&oacute; những bức tranh đạt gi&aacute; trị nghệ thuật cao của Hoạ sỹ Nguyễn Th&aacute;i Vinh được treo ở nhiều Bảo T&agrave;ng &ndash; lưu giữ l&acirc;u d&agrave;i nhằm phục vụ C&ocirc;ng ch&uacute;ng thưởng ngoạn.&nbsp;</p>\r\n<p><img src="http://www.muabantranh.com/Images_upload/images/bangkhen.jpg" alt="" width="641" height="370" /></p>\r\n<p>Với sự cống hiến cho loại h&igrave;nh nghệ thuật đặc sắc n&agrave;y, Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh tự h&agrave;o l&agrave; c&ocirc;ng ty Mỹ Thuật duy nhất của Việt Nam nhận được giải V&agrave;ng &ldquo;Ng&ocirc;i Sao Việt Nam&rdquo; v&agrave; &ldquo;Tinh Hoa Việt Nam&rdquo;, c&ugrave;ng nhiều bằng khen v&agrave; giấy chứng nhận về th&agrave;nh tựu s&aacute;ng tạo nghệ thuật tr&ecirc;n chất liệu Tr&uacute;c; l&agrave; Hội Vi&ecirc;n ch&iacute;nh thức của ph&ograve;ng Thương Mại v&agrave; C&ocirc;ng Nghiệp Việt Nam v&agrave; l&agrave; hội vi&ecirc;n của nhiều tổ chức kh&aacute;c .&nbsp;</p>\r\n<p>Đến với Th&aacute;i Vinh, Qu&yacute; kh&aacute;ch h&agrave;ng sẽ cảm nhận được n&eacute;t đẹp tuyệt vời của sản phẩm v&agrave; sự s&aacute;ng tạo Nghệ thuật, mang đến sự kh&aacute;c biệt ho&agrave;n to&agrave;n, về chất lượng cũng như mẫu m&atilde; so với những sản phẩm c&ugrave;ng loại kh&aacute;c.&nbsp;</p>\r\n<p>Sản phẩm được ch&iacute;nh Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh thiết kế, sản xuất n&ecirc;n kh&aacute;ch h&agrave;ng sẽ ho&agrave;n to&agrave;n an t&acirc;m về chất lượng, gi&aacute; cả, dịch vụ hậu m&atilde;i, &hellip; Tr&aacute;nh được những rủi ro kh&ocirc;ng đ&aacute;ng c&oacute; v&iacute; dụ như: sai về thiết kế, mẫu m&atilde;, m&agrave;u sắc, bao b&igrave; v.v&hellip; khi kh&ocirc;ng t&igrave;m được nh&agrave; sản xuất thật sự v&agrave; chuy&ecirc;n nghiệp.&nbsp;</p>\r\n<p>H&atilde;y n&ecirc;u &yacute; tưởng hoặc lựa chọn h&igrave;nh ảnh, k&iacute;ch cỡ y&ecirc;u th&iacute;ch m&agrave; bạn muốn thể hiện tr&ecirc;n chất liệu vải sơn dầu hoặc chất liệu Tr&uacute;c&hellip; Tranh Tr&uacute;c Nghệ thuật Th&aacute;i Vinh sẽ mang lại điều kỳ diệu cho kh&ocirc;ng gian sống của bạn!&nbsp;</p>\r\n<p>Ch&uacute;ng t&ocirc;i rất mong muốn được hợp t&aacute;c v&agrave; chia sẻ quyền lợi với c&aacute;c tổ chức, c&aacute; nh&acirc;n quan t&acirc;m đến lĩnh vực n&agrave;y.</p>\r\n<p>Để biết th&ecirc;m th&ocirc;ng tin chi tiết, vui l&ograve;ng li&ecirc;n hệ:</p>\r\n<p>Địa chỉ: 120 Thống Nhất, P.T&acirc;n Th&agrave;nh, Q. T&acirc;n Ph&uacute;, Tp.HCM</p>\r\n<p>Điện thoại: (08) 38103830 &ndash;&nbsp;Hotline&nbsp;: 093 77 99 030</p>\r\n</div>\r\n<div>&nbsp;</div>', '2013-12-21 11:25:22', '2013-12-21 11:26:25', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]13_LON.jpg', 2, '', '', 'S100', 10, 60, 70, 'cm', 9700000, 0, 0, 0, 0),
(140, 'Cửu ngư quần tụ', '<h1 class="page-title"><span><strong><span>Tranh th&ecirc;u tay</span></strong></span></h1>\r\n<div class="archive-meta">\r\n<p>Nguồn gốc tranh th&ecirc;u, tranh th&ecirc;u tay:</p>\r\n<p>Tương truyền thế kỷ XVII, cụ L&ecirc; C&ocirc;ng H&agrave;nh (sinh ng&agrave;y 18/01/1606 &ndash; mất ng&agrave;y 12/06/1661) tại l&agrave;ng Quất Động, x&atilde; Quất Động, huyện Thường T&iacute;n, tỉnh H&agrave; T&acirc;y đ&atilde; học được kỹ thuật th&ecirc;u nổi của người Trung Hoa, th&ocirc;ng qua đ&oacute; kết hợp với phong c&aacute;ch th&ecirc;u truyền thống của d&acirc;n tộc để tạo n&ecirc;n một phong c&aacute;ch th&ecirc;u mới độc đ&aacute;o, mang đậm n&eacute;t mỹ thuật. Đến nay, những người thợ th&ecirc;u trong cả nước đều xem cụ l&agrave; &ocirc;ng tổ của nghề th&ecirc;u.</p>\r\n<p>Th&ecirc;u th&ugrave;a, kim chỉ lu&ocirc;n l&agrave; người bạn t&acirc;m giao của người phụ nữ Việt Nam tự ng&agrave;n xưa v&agrave; l&agrave; một trong những chuẩn mực để đ&aacute;nh gi&aacute; c&ocirc;ng, dung, ng&ocirc;n, hạnh của người phụ nữ, bởi vậy m&agrave; Người xưa c&oacute; c&acirc;u:</p>\r\n<p>&ldquo;Trai th&igrave; đọc s&aacute;ch ng&acirc;m thơ<br />G&aacute;i th&igrave; kim chỉ th&ecirc;u th&ugrave;a v&aacute; may&rdquo;</p>\r\n<p>Tranh th&ecirc;u ch&iacute;nh l&agrave; kh&ocirc;ng gian vỗ về, kh&ocirc;ng gian b&igrave;nh y&ecirc;n, kh&ocirc;ng gian t&acirc;m tưởng của người phụ nữ. Với b&agrave;n tay t&agrave;i hoa v&agrave; niềm đam m&ecirc; nghề nghiệp, người nghệ nh&acirc;n th&ecirc;u tranh đ&atilde; thả hồn theo những đường kim mũi chỉ, l&agrave;m n&ecirc;n bức tranh sống động, gợi nhiều cảm x&uacute;c trong t&acirc;m hồn người xem. Xuất ph&aacute;t từ nghề th&ecirc;u truyền thống, với nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của c&aacute;c nghệ nh&acirc;n, tranh th&ecirc;u tay đ&atilde; trở th&agrave;nh ti&ecirc;u điểm của một loại h&igrave;nh nghệ thuật độc đ&aacute;o, mang đậm bản sắc d&acirc;n tộc Việt Nam.</p>\r\n<p>Ai đ&atilde; từng nh&igrave;n ngắm những bức tranh th&ecirc;u chắc hẳn kh&ocirc;ng khỏi th&aacute;n phục sự t&agrave;i hoa của những nghệ nh&acirc;n th&ecirc;u tranh. Đến với thế giới nghệ thuật tranh th&ecirc;u l&agrave; đến với thế giới của m&agrave;u sắc, đường n&eacute;t v&agrave; vẻ đẹp của t&acirc;m hồn. Những họa sĩ vẽ mẫu đ&atilde; h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, t&igrave;m sự tĩnh tại của t&acirc;m hồn, cảm nhận cuộc sống một c&aacute;ch tinh tế từ đ&oacute; tạo ra những mẫu tranh th&ecirc;u độc đ&aacute;o bằng m&agrave;u ch&igrave; đen tr&ecirc;n nền giấy can.</p>\r\n<p>Bằng kinh nghiệm v&agrave; sự nhạy cảm, bằng sự đồng điệu giữa họa sĩ v&agrave; nghệ nh&acirc;n, mỗi t&aacute;c phẩm tranh th&ecirc;u l&agrave; một sự kết hợp h&agrave;i h&ograve;a giữa chất liệu v&agrave; m&agrave;u sắc.</p>\r\n</div>', '2013-12-21 11:32:21', '2013-12-21 11:32:21', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]120x170cmmm.jpg', 2, '', '', 'S156', 10, 120, 170, 'cm', 12000000, 0, 0, 0, 0),
(141, 'Gia đình hạnh phúc	', '<h1 class="page-title"><strong>Tranh th&ecirc;u tay</strong></h1>\r\n<div class="archive-meta">\r\n<p>Nguồn gốc tranh th&ecirc;u, tranh th&ecirc;u tay:</p>\r\n<p>Tương truyền thế kỷ XVII, cụ L&ecirc; C&ocirc;ng H&agrave;nh (sinh ng&agrave;y 18/01/1606 &ndash; mất ng&agrave;y 12/06/1661) tại l&agrave;ng Quất Động, x&atilde; Quất Động, huyện Thường T&iacute;n, tỉnh H&agrave; T&acirc;y đ&atilde; học được kỹ thuật th&ecirc;u nổi của người Trung Hoa, th&ocirc;ng qua đ&oacute; kết hợp với phong c&aacute;ch th&ecirc;u truyền thống của d&acirc;n tộc để tạo n&ecirc;n một phong c&aacute;ch th&ecirc;u mới độc đ&aacute;o, mang đậm n&eacute;t mỹ thuật. Đến nay, những người thợ th&ecirc;u trong cả nước đều xem cụ l&agrave; &ocirc;ng tổ của nghề th&ecirc;u.</p>\r\n<p>Th&ecirc;u th&ugrave;a, kim chỉ lu&ocirc;n l&agrave; người bạn t&acirc;m giao của người phụ nữ Việt Nam tự ng&agrave;n xưa v&agrave; l&agrave; một trong những chuẩn mực để đ&aacute;nh gi&aacute; c&ocirc;ng, dung, ng&ocirc;n, hạnh của người phụ nữ, bởi vậy m&agrave; Người xưa c&oacute; c&acirc;u:</p>\r\n<p>&ldquo;Trai th&igrave; đọc s&aacute;ch ng&acirc;m thơ<br />G&aacute;i th&igrave; kim chỉ th&ecirc;u th&ugrave;a v&aacute; may&rdquo;</p>\r\n<p>Tranh th&ecirc;u ch&iacute;nh l&agrave; kh&ocirc;ng gian vỗ về, kh&ocirc;ng gian b&igrave;nh y&ecirc;n, kh&ocirc;ng gian t&acirc;m tưởng của người phụ nữ. Với b&agrave;n tay t&agrave;i hoa v&agrave; niềm đam m&ecirc; nghề nghiệp, người nghệ nh&acirc;n th&ecirc;u tranh đ&atilde; thả hồn theo những đường kim mũi chỉ, l&agrave;m n&ecirc;n bức tranh sống động, gợi nhiều cảm x&uacute;c trong t&acirc;m hồn người xem. Xuất ph&aacute;t từ nghề th&ecirc;u truyền thống, với nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của c&aacute;c nghệ nh&acirc;n, tranh th&ecirc;u tay đ&atilde; trở th&agrave;nh ti&ecirc;u điểm của một loại h&igrave;nh nghệ thuật độc đ&aacute;o, mang đậm bản sắc d&acirc;n tộc Việt Nam.</p>\r\n<p>Ai đ&atilde; từng nh&igrave;n ngắm những bức tranh th&ecirc;u chắc hẳn kh&ocirc;ng khỏi th&aacute;n phục sự t&agrave;i hoa của những nghệ nh&acirc;n th&ecirc;u tranh. Đến với thế giới nghệ thuật tranh th&ecirc;u l&agrave; đến với thế giới của m&agrave;u sắc, đường n&eacute;t v&agrave; vẻ đẹp của t&acirc;m hồn. Những họa sĩ vẽ mẫu đ&atilde; h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, t&igrave;m sự tĩnh tại của t&acirc;m hồn, cảm nhận cuộc sống một c&aacute;ch tinh tế từ đ&oacute; tạo ra những mẫu tranh th&ecirc;u độc đ&aacute;o bằng m&agrave;u ch&igrave; đen tr&ecirc;n nền giấy can.</p>\r\n<p>Bằng kinh nghiệm v&agrave; sự nhạy cảm, bằng sự đồng điệu giữa họa sĩ v&agrave; nghệ nh&acirc;n, mỗi t&aacute;c phẩm tranh th&ecirc;u l&agrave; một sự kết hợp h&agrave;i h&ograve;a giữa chất liệu v&agrave; m&agrave;u sắc.</p>\r\n</div>', '2013-12-21 11:34:02', '2013-12-21 11:34:10', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]100_2439.jpg', 2, '', '', 'S190', 1, 50, 60, 'cm', 6500000, 0, 0, 0, 0),
(142, 'Hồ Gươm', '<h1 class="page-title"><span><strong><span>Tranh th&ecirc;u tay</span></strong></span></h1>\r\n<div class="archive-meta">\r\n<p>Nguồn gốc tranh th&ecirc;u, tranh th&ecirc;u tay:</p>\r\n<p>Tương truyền thế kỷ XVII, cụ L&ecirc; C&ocirc;ng H&agrave;nh (sinh ng&agrave;y 18/01/1606 &ndash; mất ng&agrave;y 12/06/1661) tại l&agrave;ng Quất Động, x&atilde; Quất Động, huyện Thường T&iacute;n, tỉnh H&agrave; T&acirc;y đ&atilde; học được kỹ thuật th&ecirc;u nổi của người Trung Hoa, th&ocirc;ng qua đ&oacute; kết hợp với phong c&aacute;ch th&ecirc;u truyền thống của d&acirc;n tộc để tạo n&ecirc;n một phong c&aacute;ch th&ecirc;u mới độc đ&aacute;o, mang đậm n&eacute;t mỹ thuật. Đến nay, những người thợ th&ecirc;u trong cả nước đều xem cụ l&agrave; &ocirc;ng tổ của nghề th&ecirc;u.</p>\r\n<p>Th&ecirc;u th&ugrave;a, kim chỉ lu&ocirc;n l&agrave; người bạn t&acirc;m giao của người phụ nữ Việt Nam tự ng&agrave;n xưa v&agrave; l&agrave; một trong những chuẩn mực để đ&aacute;nh gi&aacute; c&ocirc;ng, dung, ng&ocirc;n, hạnh của người phụ nữ, bởi vậy m&agrave; Người xưa c&oacute; c&acirc;u:</p>\r\n<p>&ldquo;Trai th&igrave; đọc s&aacute;ch ng&acirc;m thơ<br />G&aacute;i th&igrave; kim chỉ th&ecirc;u th&ugrave;a v&aacute; may&rdquo;</p>\r\n<p>Tranh th&ecirc;u ch&iacute;nh l&agrave; kh&ocirc;ng gian vỗ về, kh&ocirc;ng gian b&igrave;nh y&ecirc;n, kh&ocirc;ng gian t&acirc;m tưởng của người phụ nữ. Với b&agrave;n tay t&agrave;i hoa v&agrave; niềm đam m&ecirc; nghề nghiệp, người nghệ nh&acirc;n th&ecirc;u tranh đ&atilde; thả hồn theo những đường kim mũi chỉ, l&agrave;m n&ecirc;n bức tranh sống động, gợi nhiều cảm x&uacute;c trong t&acirc;m hồn người xem. Xuất ph&aacute;t từ nghề th&ecirc;u truyền thống, với nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của c&aacute;c nghệ nh&acirc;n, tranh th&ecirc;u tay đ&atilde; trở th&agrave;nh ti&ecirc;u điểm của một loại h&igrave;nh nghệ thuật độc đ&aacute;o, mang đậm bản sắc d&acirc;n tộc Việt Nam.</p>\r\n<p>Ai đ&atilde; từng nh&igrave;n ngắm những bức tranh th&ecirc;u chắc hẳn kh&ocirc;ng khỏi th&aacute;n phục sự t&agrave;i hoa của những nghệ nh&acirc;n th&ecirc;u tranh. Đến với thế giới nghệ thuật tranh th&ecirc;u l&agrave; đến với thế giới của m&agrave;u sắc, đường n&eacute;t v&agrave; vẻ đẹp của t&acirc;m hồn. Những họa sĩ vẽ mẫu đ&atilde; h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, t&igrave;m sự tĩnh tại của t&acirc;m hồn, cảm nhận cuộc sống một c&aacute;ch tinh tế từ đ&oacute; tạo ra những mẫu tranh th&ecirc;u độc đ&aacute;o bằng m&agrave;u ch&igrave; đen tr&ecirc;n nền giấy can.</p>\r\n<p>Bằng kinh nghiệm v&agrave; sự nhạy cảm, bằng sự đồng điệu giữa họa sĩ v&agrave; nghệ nh&acirc;n, mỗi t&aacute;c phẩm tranh th&ecirc;u l&agrave; một sự kết hợp h&agrave;i h&ograve;a giữa chất liệu v&agrave; m&agrave;u sắc.</p>\r\n</div>', '2013-12-21 11:36:15', '2013-12-21 11:36:15', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]tranh-theu-ho-guom.jpg', 2, '', '', 'S679', 2, 50, 70, 'cm', 6300000, 0, 0, 0, 0),
(143, 'Song điểu và hoa mẫu đơn', '<h1 class="page-title"><span><strong><span>Tranh th&ecirc;u tay</span></strong></span></h1>\r\n<div class="archive-meta">\r\n<p>Nguồn gốc tranh th&ecirc;u, tranh th&ecirc;u tay:</p>\r\n<p>Tương truyền thế kỷ XVII, cụ L&ecirc; C&ocirc;ng H&agrave;nh (sinh ng&agrave;y 18/01/1606 &ndash; mất ng&agrave;y 12/06/1661) tại l&agrave;ng Quất Động, x&atilde; Quất Động, huyện Thường T&iacute;n, tỉnh H&agrave; T&acirc;y đ&atilde; học được kỹ thuật th&ecirc;u nổi của người Trung Hoa, th&ocirc;ng qua đ&oacute; kết hợp với phong c&aacute;ch th&ecirc;u truyền thống của d&acirc;n tộc để tạo n&ecirc;n một phong c&aacute;ch th&ecirc;u mới độc đ&aacute;o, mang đậm n&eacute;t mỹ thuật. Đến nay, những người thợ th&ecirc;u trong cả nước đều xem cụ l&agrave; &ocirc;ng tổ của nghề th&ecirc;u.</p>\r\n<p>Th&ecirc;u th&ugrave;a, kim chỉ lu&ocirc;n l&agrave; người bạn t&acirc;m giao của người phụ nữ Việt Nam tự ng&agrave;n xưa v&agrave; l&agrave; một trong những chuẩn mực để đ&aacute;nh gi&aacute; c&ocirc;ng, dung, ng&ocirc;n, hạnh của người phụ nữ, bởi vậy m&agrave; Người xưa c&oacute; c&acirc;u:</p>\r\n<p>&ldquo;Trai th&igrave; đọc s&aacute;ch ng&acirc;m thơ<br />G&aacute;i th&igrave; kim chỉ th&ecirc;u th&ugrave;a v&aacute; may&rdquo;</p>\r\n<p>Tranh th&ecirc;u ch&iacute;nh l&agrave; kh&ocirc;ng gian vỗ về, kh&ocirc;ng gian b&igrave;nh y&ecirc;n, kh&ocirc;ng gian t&acirc;m tưởng của người phụ nữ. Với b&agrave;n tay t&agrave;i hoa v&agrave; niềm đam m&ecirc; nghề nghiệp, người nghệ nh&acirc;n th&ecirc;u tranh đ&atilde; thả hồn theo những đường kim mũi chỉ, l&agrave;m n&ecirc;n bức tranh sống động, gợi nhiều cảm x&uacute;c trong t&acirc;m hồn người xem. Xuất ph&aacute;t từ nghề th&ecirc;u truyền thống, với nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của c&aacute;c nghệ nh&acirc;n, tranh th&ecirc;u tay đ&atilde; trở th&agrave;nh ti&ecirc;u điểm của một loại h&igrave;nh nghệ thuật độc đ&aacute;o, mang đậm bản sắc d&acirc;n tộc Việt Nam.</p>\r\n<p>Ai đ&atilde; từng nh&igrave;n ngắm những bức tranh th&ecirc;u chắc hẳn kh&ocirc;ng khỏi th&aacute;n phục sự t&agrave;i hoa của những nghệ nh&acirc;n th&ecirc;u tranh. Đến với thế giới nghệ thuật tranh th&ecirc;u l&agrave; đến với thế giới của m&agrave;u sắc, đường n&eacute;t v&agrave; vẻ đẹp của t&acirc;m hồn. Những họa sĩ vẽ mẫu đ&atilde; h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, t&igrave;m sự tĩnh tại của t&acirc;m hồn, cảm nhận cuộc sống một c&aacute;ch tinh tế từ đ&oacute; tạo ra những mẫu tranh th&ecirc;u độc đ&aacute;o bằng m&agrave;u ch&igrave; đen tr&ecirc;n nền giấy can.</p>\r\n<p>Bằng kinh nghiệm v&agrave; sự nhạy cảm, bằng sự đồng điệu giữa họa sĩ v&agrave; nghệ nh&acirc;n, mỗi t&aacute;c phẩm tranh th&ecirc;u l&agrave; một sự kết hợp h&agrave;i h&ograve;a giữa chất liệu v&agrave; m&agrave;u sắc.</p>\r\n</div>', '2013-12-21 11:37:28', '2013-12-22 14:33:55', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]song_chim_LON.jpg', 2, '', '', 'S123', 0, 120, 30, 'cm', 17000000, 0, 0, 0, 0),
(144, 'Được mùa', '<h1 class="page-title"><strong>Tranh th&ecirc;u tay</strong></h1>\r\n<div class="archive-meta">\r\n<p>Nguồn gốc tranh th&ecirc;u, tranh th&ecirc;u tay:</p>\r\n<p>Tương truyền thế kỷ XVII, cụ L&ecirc; C&ocirc;ng H&agrave;nh (sinh ng&agrave;y 18/01/1606 &ndash; mất ng&agrave;y 12/06/1661) tại l&agrave;ng Quất Động, x&atilde; Quất Động, huyện Thường T&iacute;n, tỉnh H&agrave; T&acirc;y đ&atilde; học được kỹ thuật th&ecirc;u nổi của người Trung Hoa, th&ocirc;ng qua đ&oacute; kết hợp với phong c&aacute;ch th&ecirc;u truyền thống của d&acirc;n tộc để tạo n&ecirc;n một phong c&aacute;ch th&ecirc;u mới độc đ&aacute;o, mang đậm n&eacute;t mỹ thuật. Đến nay, những người thợ th&ecirc;u trong cả nước đều xem cụ l&agrave; &ocirc;ng tổ của nghề th&ecirc;u.</p>\r\n<p>Th&ecirc;u th&ugrave;a, kim chỉ lu&ocirc;n l&agrave; người bạn t&acirc;m giao của người phụ nữ Việt Nam tự ng&agrave;n xưa v&agrave; l&agrave; một trong những chuẩn mực để đ&aacute;nh gi&aacute; c&ocirc;ng, dung, ng&ocirc;n, hạnh của người phụ nữ, bởi vậy m&agrave; Người xưa c&oacute; c&acirc;u:</p>\r\n<p>&ldquo;Trai th&igrave; đọc s&aacute;ch ng&acirc;m thơ<br />G&aacute;i th&igrave; kim chỉ th&ecirc;u th&ugrave;a v&aacute; may&rdquo;</p>\r\n<p>Tranh th&ecirc;u ch&iacute;nh l&agrave; kh&ocirc;ng gian vỗ về, kh&ocirc;ng gian b&igrave;nh y&ecirc;n, kh&ocirc;ng gian t&acirc;m tưởng của người phụ nữ. Với b&agrave;n tay t&agrave;i hoa v&agrave; niềm đam m&ecirc; nghề nghiệp, người nghệ nh&acirc;n th&ecirc;u tranh đ&atilde; thả hồn theo những đường kim mũi chỉ, l&agrave;m n&ecirc;n bức tranh sống động, gợi nhiều cảm x&uacute;c trong t&acirc;m hồn người xem. Xuất ph&aacute;t từ nghề th&ecirc;u truyền thống, với nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của c&aacute;c nghệ nh&acirc;n, tranh th&ecirc;u tay đ&atilde; trở th&agrave;nh ti&ecirc;u điểm của một loại h&igrave;nh nghệ thuật độc đ&aacute;o, mang đậm bản sắc d&acirc;n tộc Việt Nam.</p>\r\n<p>Ai đ&atilde; từng nh&igrave;n ngắm những bức tranh th&ecirc;u chắc hẳn kh&ocirc;ng khỏi th&aacute;n phục sự t&agrave;i hoa của những nghệ nh&acirc;n th&ecirc;u tranh. Đến với thế giới nghệ thuật tranh th&ecirc;u l&agrave; đến với thế giới của m&agrave;u sắc, đường n&eacute;t v&agrave; vẻ đẹp của t&acirc;m hồn. Những họa sĩ vẽ mẫu đ&atilde; h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, t&igrave;m sự tĩnh tại của t&acirc;m hồn, cảm nhận cuộc sống một c&aacute;ch tinh tế từ đ&oacute; tạo ra những mẫu tranh th&ecirc;u độc đ&aacute;o bằng m&agrave;u ch&igrave; đen tr&ecirc;n nền giấy can.</p>\r\n<p>Bằng kinh nghiệm v&agrave; sự nhạy cảm, bằng sự đồng điệu giữa họa sĩ v&agrave; nghệ nh&acirc;n, mỗi t&aacute;c phẩm tranh th&ecirc;u l&agrave; một sự kết hợp h&agrave;i h&ograve;a giữa chất liệu v&agrave; m&agrave;u sắc.</p>\r\n</div>', '2013-12-21 11:38:26', '2013-12-21 12:48:24', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]do-thoc-.jpg', 2, '', '', 'S180', 10, 70, 90, 'cm', 17000000, 0, 0, 0, 0),
(145, 'Oai trấn sơn hà', '<h1 class="page-title"><strong>Tranh đ&aacute; qu&yacute;</strong></h1>\r\n<div class="archive-meta">\r\n<p>Tranh đ&aacute; qu&yacute; kh&ocirc;ng chỉ l&agrave; m&oacute;n qu&agrave; người th&acirc;n d&agrave;nh tặng nhau m&agrave; c&ograve;n l&agrave; vật trang tr&iacute; mang lại sự ấm c&uacute;ng sang trọng đến cho kh&ocirc;ng gian nội thất gia đ&igrave;nh. Những bức tranh lấp l&aacute;nh dưới &aacute;nh đ&egrave;n v&agrave;ng lung linh trang nh&atilde; l&agrave; sự h&ograve;a quyện giữa nghệ thuật v&agrave; kiến tr&uacute;c tạo n&ecirc;n những cung bậc cảm x&uacute;c kh&oacute; tả. Tranh đ&aacute; qu&yacute; kho&aacute;c tr&ecirc;n m&igrave;nh một vẻ đẹp tinh tế với m&agrave;u sắc từ đ&aacute; thi&ecirc;n nhi&ecirc;n do tạo h&oacute;a ban tặng, sẽ kh&ocirc;ng bao giờ phai nhạt theo thời gian, cũng như t&igrave;nh cảm trao cho nhau với một gi&aacute; trị tinh thần bền vững.</p>\r\n<p>Để tạo n&ecirc;n kh&uacute;c nhạc, người nghệ sĩ cần c&oacute; một t&acirc;m hồn. Đối với tranh cũng vậy, để tạo n&ecirc;n một bức tranh đ&aacute; qu&yacute;, người nghệ nh&acirc;n đ&atilde; h&ograve;a m&igrave;nh v&agrave; cảm biến những vi&ecirc;n đ&aacute; th&ocirc; th&agrave;nh những bức tranh sống động như kh&uacute;c h&ograve;a tấu giữa nhạc &ndash; thơ &ndash; họa &ndash; v&agrave; con người. Những t&aacute;c phẩm mang &acirc;m hưởng của k&yacute; ức, mang n&eacute;t dịu d&agrave;ng cổ k&iacute;nh xưa v&agrave; nay. Tranh đ&aacute; qu&yacute; được tạo ra từ những b&agrave;n tay nghệ nh&acirc;n đi&ecirc;u luyện, họ biến tấu đam m&ecirc; nghệ thuật th&agrave;nh những bức tranh độc đ&aacute;o: &ldquo;Vẽ tranh bằng m&agrave;u đ&atilde; kh&oacute;, vẽ tranh bằng thi&ecirc;n nhi&ecirc;n kh&oacute; gấp vạn lần. Đ&atilde; đến l&uacute;c nghệ thuật gắn liền với thi&ecirc;n nhi&ecirc;n, tạo cho con người cảm hứng v&agrave; s&aacute;ng tạo&rdquo;. Mỗi bức tranh đ&aacute; qu&yacute; được chế t&aacute;c từ những hạt đ&aacute; li ti mu&ocirc;n m&agrave;u sắc, những hạt đ&aacute; cực kỳ nhỏ tạo ra được những đường n&eacute;t sống động, thanh tho&aacute;t nhẹ nh&agrave;ng, m&agrave;u sắc h&agrave;i h&ograve;a, cũng l&agrave; ngần ấy c&ocirc;ng phu t&acirc;m huyết của c&aacute;c nghệ nh&acirc;n.</p>\r\n<p>Tranh đ&aacute; qu&yacute; đ&atilde; khơi gợi l&ograve;ng tự h&agrave;o của con người về cội nguồn, về bản sắc văn h&oacute;a d&acirc;n tộc. Tranh được bắt ngu&ocirc;n từ cảm x&uacute;c về qu&ecirc; hương đất nước v&agrave; con người, về t&igrave;nh bạn v&agrave; t&igrave;nh y&ecirc;u, lu&ocirc;n mang đậm chất d&acirc;n gian b&igrave;nh dị nhưng kh&ocirc;ng k&eacute;m phần thanh cao ,tao nh&atilde;. Những bức tranh gợi cảm uyển chuyển, tạo n&ecirc;n n&eacute;t ri&ecirc;ng về một nền văn h&oacute;a d&acirc;n tộc &ndash; một hồn tranh rất Việt. Đường n&eacute;t tinh tế trong tranh được ph&aacute;c họa đậm chất thơ chất nhạc, m&agrave;u sắc tiết tấu mượt m&agrave; nhẹ nh&agrave;ng, s&acirc;u lắng ẩn chứa biết bao t&acirc;m trạng. Khi tranh được đặt h&ograve;a quyện v&agrave;o g&oacute;c kh&ocirc;ng gian nội thất, sẽ tạo n&ecirc;n một kh&ocirc;ng gian thăng hoa cảm x&uacute;c ,một kh&ocirc;ng gian m&agrave; t&acirc;m hồn sẽ bay bổng sẽ an nhi&ecirc;n tự tại để thấy cuộc đời mang thật nhiều &yacute; nghĩa.</p>\r\n</div>', '2013-12-21 11:41:44', '2013-12-22 15:35:28', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]oai-tran-son-ha1.jpg', 2, '', '', 'S900', 0, 57, 90, 'cm', 18000000, 0, 0, 0, 0),
(146, 'Tâm sự biển', '<p>Chưa c&oacute; m&ocirc; tả</p>', '2013-12-21 11:42:38', '2013-12-22 15:35:19', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]tam-su-bien.jpg', 2, '', '', 'S198', 0, 53, 88, 'cm', 23000000, 0, 0, 0, 0),
(147, 'Cành đào', '<p>Chưa c&oacute; m&ocirc; tả</p>', '2013-12-21 11:45:03', '2013-12-22 14:33:55', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]02.jpg', 2, '', '', 'S145', 17, 100, 160, 'cm', 5500000, 0, 0, 0, 0),
(148, 'Long phụng', '<p>Rồng v&agrave; Phượng vốn l&agrave; biểu tượng rất cao q&uacute;y nằm trong bộ Tứ Linh. Rồng ti&ecirc;u biểu cho cha, người chồng, người qu&acirc;n tử, Ho&agrave;ng đế. C&ograve;n phượng l&agrave; biểu tượng của người phu nh&acirc;n, người vợ, Ho&agrave;ng hậu. Sự kết hợp của Rồng v&agrave; Phượng l&agrave; biểu tượng tuyệt vời của hạnh ph&uacute;c lứa đ&ocirc;i, sự may mắn thịnh vượng về c&ocirc;ng danh, t&agrave;i lộc v&agrave; địa vị x&atilde; hội. D&ugrave;ng tranh Rồng Phượng treo trong ph&ograve;ng ngủ để đem đến một cuộc sống gia đ&igrave;nh ho&agrave; thuận &ecirc;m ấm, con c&aacute;i tốt l&agrave;nh, treo tạiph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc sẽ c&oacute; t&aacute;c dụng chống lại hung kh&iacute;, đem đến sự vượng ph&aacute;t t&agrave;i lộc v&agrave; c&ocirc;ng danh. Cũng c&oacute; thể d&ugrave;ng trong ph&ograve;ng đọc s&aacute;ch, ph&ograve;ng l&agrave;m việc để tăng cường tr&iacute; tuệ v&agrave; sự tăng tiến về học vấn, quan hệ x&atilde; hội&hellip;</p>', '2013-12-21 11:47:04', '2013-12-22 16:18:29', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]A50.jpg', 2, '', '', 'S111', 4, 32, 160, 'cm', 3200000, 0, 0, 0, 0),
(149, 'Mã đáo thành công', '<p><em><strong>Tranh M&atilde; Đ&aacute;o Th&agrave;nh C&ocirc;ng l&agrave; một&nbsp;m&oacute;n qu&agrave; &yacute; nghĩa, thường được mừng, tặng trong c&aacute;c dịp: khai trương cty, qu&agrave; biếu sếp, mừng t&acirc;n gia, qu&agrave; tặng đối t&aacute;c kinh doanh, qu&agrave; tặng sự kiện, khởi c&ocirc;ng&hellip;</strong></em></p>\r\n<p><em><strong>Ngựa xuất hiện trong tranh như l&agrave; biểu tượng của sự mau ch&oacute;ng v&agrave; th&agrave;nh đạt.<br />Bức tranh c&oacute; chủ đề phổ biến nhất l&agrave; &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; thể hiện qua một bầy ngựa phi nước đại gi&oacute; bụi mịt m&ugrave;. Nguy&ecirc;n &yacute; c&acirc;u n&agrave;y l&agrave; &laquo;Kỳ khai đắc thắng, m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; 旗開得勝馬到成功 (Cờ phất [l&agrave;m hiệu th&igrave;] chiến thắng, ngựa quay về [b&aacute;o tin] th&agrave;nh c&ocirc;ng).<br />Ng&agrave;y xưa khi xuất binh phải phất cờ hiệu, m&agrave; cờ đ&atilde; phất rồi th&igrave; phải chiến thắng; tướng so&aacute;i khi lấy đầu tướng giặc, chiến m&atilde; quay về tất b&aacute;o tin th&agrave;nh c&ocirc;ng.<br />&Yacute; nghĩa c&acirc;u&nbsp;&laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;馬 到成功 ng&agrave;y nay chỉ c&ograve;n tượng trưng l&agrave; tốc chiến tốc thắng. V&agrave; một bức tranh &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; l&agrave;m qu&agrave; khai trương cho một cửa hiệu chỉ đơn giản tương tự như l&agrave;&nbsp;&laquo;khai trương hồng ph&aacute;t&raquo;&nbsp;開張鴻發 (mở cửa tiệm th&igrave; ph&aacute;t đạt lớn) chứ kh&ocirc;ng c&oacute; &yacute; l&agrave; mau ch&oacute;ng th&agrave;nh c&ocirc;ng nhờ&hellip; cứa cổ kh&aacute;ch h&agrave;ng.</strong></em></p>\r\n<p>Năm 1789, sau khi đ&aacute;nh tan qu&acirc;n Thanh, vua Quang Trung đưa qu&acirc;n v&agrave;o th&agrave;nh, m&ugrave;ng 5 tết mừng xu&acirc;n. Để b&aacute;o tin thắng trận, vua đ&atilde; cho người mang một c&agrave;nh đ&agrave;o, cưỡi ngựa truyền qua c&aacute;c trạm ng&agrave;y đ&ecirc;m chuyển c&agrave;nh đ&agrave;o về cho c&ocirc;ng ch&uacute;a Ngọc H&acirc;n. Đ&oacute; cũng l&agrave; M&Atilde; Đ&Aacute;O TH&Agrave;NH C&Ocirc;NG.</p>\r\n<p>Hay một bức tranh kh&aacute;c vẽ một ch&uacute; khỉ (hầu 猴) cưỡi tr&ecirc;n lưng ngựa (m&atilde; thượng 馬上) lại l&agrave; một lời cầu ch&uacute;c tốt đẹp. Hầu 猴 (khỉ) đồng &acirc;m Hầu 侯 (chức tước hầu); m&atilde; thượng 馬上 c&ograve;n c&oacute; nghĩa l&agrave; \\\\\\&rdquo;ngay tức khắc\\\\\\&rdquo;. Do đ&oacute; tranh ch&uacute;c n&agrave;y c&oacute; nghĩa rộng l&agrave;&nbsp;&laquo;Ch&uacute;c cho mau ch&oacute;ng thăng quan tiến chức&raquo;.</p>\r\n<p><em><strong>Ngựa l&agrave; con vật trung th&agrave;nh nhất, kh&ocirc;ng những thế ngựa c&ograve;n l&agrave; h&igrave;nh ảnh của sự kiễn nhẫn, sự bền bỉ, l&acirc;u d&agrave;i, sự may mắn mang lại t&agrave;i lộc, ngựa đứng h&agrave;ng thứ 7 trong 12 địa chi.. N&oacute; đem lại nguồn t&agrave;i lộc, sự ph&aacute;t đạt trong kinh doanh, sự nhanh nhạy v&agrave; tăng tiến tiền t&agrave;i, khiến những c&ocirc;ng việc dự định sẽ nhanh ch&oacute;ng ho&agrave;n th&agrave;nh hơn dự kiến v&agrave; đạt kết quả cao hơn mong muốn. D&ugrave;ng cho những người hay đi xa, chuyến đi th&agrave;nh c&ocirc;ng tốt đẹp. Trong đầu tư kinh doanh th&igrave; n&oacute; mang lại lợi lộc lớn cho chủ nh&acirc;n. Ngựa đ&aacute; mang nguy&ecirc;n kh&iacute; của THỔ l&agrave; nguy&ecirc;n kh&iacute; vủa vận 8 n&ecirc;n rất mạnh. Đ&acirc;y l&agrave; vật kh&iacute; d&ugrave;ng bổ trợ cho Phong Thuỷ nh&agrave; ở, văn ph&ograve;ng, cửa h&agrave;ng rất hiệu quả. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bức tranh c&oacute; chủ đề phổ biến nhất l&agrave; &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; thể hiện qua một bầy ngựa phi nước đại gi&oacute; bụi mịt m&ugrave;. Nguy&ecirc;n &yacute; c&acirc;u n&agrave;y l&agrave; &laquo;Kỳ khai đắc thắng, m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;(Cờ phất [l&agrave;m hiệu th&igrave;] chiến thắng, ngựa quay về [b&aacute;o tin] th&agrave;nh c&ocirc;ng).<br />Ng&agrave;y xưa khi xuất binh phải phất cờ hiệu, m&agrave; cờ đ&atilde; phất rồi th&igrave; phải chiến thắng; tướng so&aacute;i khi lấy đầu tướng giặc, chiến m&atilde; quay về tất b&aacute;o tin th&agrave;nh c&ocirc;ng.<br />&Yacute; nghĩa c&acirc;u &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;ng&agrave;y nay chỉ c&ograve;n tượng trưng l&agrave; tốc chiến tốc thắng. V&agrave; một bức tranh &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; l&agrave;m qu&agrave; khai trương cho một cửa hiệu chỉ đơn giản tương tự như l&agrave; &laquo;khai trương hồng ph&aacute;t&raquo;&nbsp;(mở cửa tiệm th&igrave; ph&aacute;t đạt lớn) chứ kh&ocirc;ng c&oacute; &yacute; l&agrave; mau ch&oacute;ng th&agrave;nh c&ocirc;ng nhờ&hellip; cứa cổ kh&aacute;ch h&agrave;ng. &nbsp;&nbsp;&nbsp;&nbsp; Năm 1789, sau khi đ&aacute;nh tan qu&acirc;n Thanh, vua Quang Trung đưa qu&acirc;n v&agrave;o th&agrave;nh, m&ugrave;ng 5 tết mừng xu&acirc;n. Để b&aacute;o tin thắng trận, vua đ&atilde; cho người mang một c&agrave;nh đ&agrave;o, cưỡi ngựa truyền qua c&aacute;c trạm ng&agrave;y đ&ecirc;m chuyển c&agrave;nh đ&agrave;o về cho c&ocirc;ng ch&uacute;a Ngọc H&acirc;n. Đ&oacute; cũng l&agrave; M&Atilde; Đ&Aacute;O TH&Agrave;NH C&Ocirc;NG</strong></em></p>', '2013-12-21 11:50:52', '2013-12-21 11:50:52', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]A49.jpg', 2, '', '', 'S158', 1, 66, 120, 'cm', 12000000, 1, 0, 0, 0);
INSERT INTO `post` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `optional1`, `optional2`, `art_id`, `art_count`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `order_product_id`, `order_count`, `order_unitprice`) VALUES
(150, 'Mộc long đào hoa', '<p><em><strong>Tranh M&atilde; Đ&aacute;o Th&agrave;nh C&ocirc;ng l&agrave; một&nbsp;m&oacute;n qu&agrave; &yacute; nghĩa, thường được mừng, tặng trong c&aacute;c dịp: khai trương cty, qu&agrave; biếu sếp, mừng t&acirc;n gia, qu&agrave; tặng đối t&aacute;c kinh doanh, qu&agrave; tặng sự kiện, khởi c&ocirc;ng&hellip;</strong></em></p>\r\n<p><em><strong>Ngựa xuất hiện trong tranh như l&agrave; biểu tượng của sự mau ch&oacute;ng v&agrave; th&agrave;nh đạt.<br />Bức tranh c&oacute; chủ đề phổ biến nhất l&agrave; &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; thể hiện qua một bầy ngựa phi nước đại gi&oacute; bụi mịt m&ugrave;. Nguy&ecirc;n &yacute; c&acirc;u n&agrave;y l&agrave; &laquo;Kỳ khai đắc thắng, m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; 旗開得勝馬到成功 (Cờ phất [l&agrave;m hiệu th&igrave;] chiến thắng, ngựa quay về [b&aacute;o tin] th&agrave;nh c&ocirc;ng).<br />Ng&agrave;y xưa khi xuất binh phải phất cờ hiệu, m&agrave; cờ đ&atilde; phất rồi th&igrave; phải chiến thắng; tướng so&aacute;i khi lấy đầu tướng giặc, chiến m&atilde; quay về tất b&aacute;o tin th&agrave;nh c&ocirc;ng.<br />&Yacute; nghĩa c&acirc;u&nbsp;&laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;馬 到成功 ng&agrave;y nay chỉ c&ograve;n tượng trưng l&agrave; tốc chiến tốc thắng. V&agrave; một bức tranh &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; l&agrave;m qu&agrave; khai trương cho một cửa hiệu chỉ đơn giản tương tự như l&agrave;&nbsp;&laquo;khai trương hồng ph&aacute;t&raquo;&nbsp;開張鴻發 (mở cửa tiệm th&igrave; ph&aacute;t đạt lớn) chứ kh&ocirc;ng c&oacute; &yacute; l&agrave; mau ch&oacute;ng th&agrave;nh c&ocirc;ng nhờ&hellip; cứa cổ kh&aacute;ch h&agrave;ng.</strong></em></p>\r\n<p>Năm 1789, sau khi đ&aacute;nh tan qu&acirc;n Thanh, vua Quang Trung đưa qu&acirc;n v&agrave;o th&agrave;nh, m&ugrave;ng 5 tết mừng xu&acirc;n. Để b&aacute;o tin thắng trận, vua đ&atilde; cho người mang một c&agrave;nh đ&agrave;o, cưỡi ngựa truyền qua c&aacute;c trạm ng&agrave;y đ&ecirc;m chuyển c&agrave;nh đ&agrave;o về cho c&ocirc;ng ch&uacute;a Ngọc H&acirc;n. Đ&oacute; cũng l&agrave; M&Atilde; Đ&Aacute;O TH&Agrave;NH C&Ocirc;NG.</p>\r\n<p>Hay một bức tranh kh&aacute;c vẽ một ch&uacute; khỉ (hầu 猴) cưỡi tr&ecirc;n lưng ngựa (m&atilde; thượng 馬上) lại l&agrave; một lời cầu ch&uacute;c tốt đẹp. Hầu 猴 (khỉ) đồng &acirc;m Hầu 侯 (chức tước hầu); m&atilde; thượng 馬上 c&ograve;n c&oacute; nghĩa l&agrave; \\\\\\&rdquo;ngay tức khắc\\\\\\&rdquo;. Do đ&oacute; tranh ch&uacute;c n&agrave;y c&oacute; nghĩa rộng l&agrave;&nbsp;&laquo;Ch&uacute;c cho mau ch&oacute;ng thăng quan tiến chức&raquo;.</p>\r\n<p><em><strong>Ngựa l&agrave; con vật trung th&agrave;nh nhất, kh&ocirc;ng những thế ngựa c&ograve;n l&agrave; h&igrave;nh ảnh của sự kiễn nhẫn, sự bền bỉ, l&acirc;u d&agrave;i, sự may mắn mang lại t&agrave;i lộc, ngựa đứng h&agrave;ng thứ 7 trong 12 địa chi.. N&oacute; đem lại nguồn t&agrave;i lộc, sự ph&aacute;t đạt trong kinh doanh, sự nhanh nhạy v&agrave; tăng tiến tiền t&agrave;i, khiến những c&ocirc;ng việc dự định sẽ nhanh ch&oacute;ng ho&agrave;n th&agrave;nh hơn dự kiến v&agrave; đạt kết quả cao hơn mong muốn. D&ugrave;ng cho những người hay đi xa, chuyến đi th&agrave;nh c&ocirc;ng tốt đẹp. Trong đầu tư kinh doanh th&igrave; n&oacute; mang lại lợi lộc lớn cho chủ nh&acirc;n. Ngựa đ&aacute; mang nguy&ecirc;n kh&iacute; của THỔ l&agrave; nguy&ecirc;n kh&iacute; vủa vận 8 n&ecirc;n rất mạnh. Đ&acirc;y l&agrave; vật kh&iacute; d&ugrave;ng bổ trợ cho Phong Thuỷ nh&agrave; ở, văn ph&ograve;ng, cửa h&agrave;ng rất hiệu quả. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bức tranh c&oacute; chủ đề phổ biến nhất l&agrave; &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; thể hiện qua một bầy ngựa phi nước đại gi&oacute; bụi mịt m&ugrave;. Nguy&ecirc;n &yacute; c&acirc;u n&agrave;y l&agrave; &laquo;Kỳ khai đắc thắng, m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;(Cờ phất [l&agrave;m hiệu th&igrave;] chiến thắng, ngựa quay về [b&aacute;o tin] th&agrave;nh c&ocirc;ng).<br />Ng&agrave;y xưa khi xuất binh phải phất cờ hiệu, m&agrave; cờ đ&atilde; phất rồi th&igrave; phải chiến thắng; tướng so&aacute;i khi lấy đầu tướng giặc, chiến m&atilde; quay về tất b&aacute;o tin th&agrave;nh c&ocirc;ng.<br />&Yacute; nghĩa c&acirc;u &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo;&nbsp;ng&agrave;y nay chỉ c&ograve;n tượng trưng l&agrave; tốc chiến tốc thắng. V&agrave; một bức tranh &laquo;m&atilde; đ&aacute;o th&agrave;nh c&ocirc;ng&raquo; l&agrave;m qu&agrave; khai trương cho một cửa hiệu chỉ đơn giản tương tự như l&agrave; &laquo;khai trương hồng ph&aacute;t&raquo;&nbsp;(mở cửa tiệm th&igrave; ph&aacute;t đạt lớn) chứ kh&ocirc;ng c&oacute; &yacute; l&agrave; mau ch&oacute;ng th&agrave;nh c&ocirc;ng nhờ&hellip; cứa cổ kh&aacute;ch h&agrave;ng. &nbsp;&nbsp;&nbsp;&nbsp; Năm 1789, sau khi đ&aacute;nh tan qu&acirc;n Thanh, vua Quang Trung đưa qu&acirc;n v&agrave;o th&agrave;nh, m&ugrave;ng 5 tết mừng xu&acirc;n. Để b&aacute;o tin thắng trận, vua đ&atilde; cho người mang một c&agrave;nh đ&agrave;o, cưỡi ngựa truyền qua c&aacute;c trạm ng&agrave;y đ&ecirc;m chuyển c&agrave;nh đ&agrave;o về cho c&ocirc;ng ch&uacute;a Ngọc H&acirc;n. Đ&oacute; cũng l&agrave; M&Atilde; Đ&Aacute;O TH&Agrave;NH C&Ocirc;NG</strong></em></p>', '2013-12-21 11:52:02', '2013-12-21 11:52:12', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]moc-long-1.jpg', 2, '', '', 'S109', 50, 70, 110, 'cm', 6500000, 0, 0, 0, 0),
(151, 'Sơn thủy', '<p>Chưa c&oacute; m&ocirc; tả</p>\r\n<p>&nbsp;</p>', '2013-12-21 11:54:27', '2013-12-21 11:54:27', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]03.jpg', 2, '', '', 'S113', 1, 70, 120, 'cm', 5550000, 0, 0, 0, 0),
(152, 'Bát tiên', '<h1 class="page-title"><strong>Tranh đ&aacute; qu&yacute;</strong></h1>\n<div class="archive-meta">\n<p>Tranh đ&aacute; qu&yacute; kh&ocirc;ng chỉ l&agrave; m&oacute;n qu&agrave; người th&acirc;n d&agrave;nh tặng nhau m&agrave; c&ograve;n l&agrave; vật trang tr&iacute; mang lại sự ấm c&uacute;ng sang trọng đến cho kh&ocirc;ng gian nội thất gia đ&igrave;nh. Những bức tranh lấp l&aacute;nh dưới &aacute;nh đ&egrave;n v&agrave;ng lung linh trang nh&atilde; l&agrave; sự h&ograve;a quyện giữa nghệ thuật v&agrave; kiến tr&uacute;c tạo n&ecirc;n những cung bậc cảm x&uacute;c kh&oacute; tả. Tranh đ&aacute; qu&yacute; kho&aacute;c tr&ecirc;n m&igrave;nh một vẻ đẹp tinh tế với m&agrave;u sắc từ đ&aacute; thi&ecirc;n nhi&ecirc;n do tạo h&oacute;a ban tặng, sẽ kh&ocirc;ng bao giờ phai nhạt theo thời gian, cũng như t&igrave;nh cảm trao cho nhau với một gi&aacute; trị tinh thần bền vững.</p>\n<p>Để tạo n&ecirc;n kh&uacute;c nhạc, người nghệ sĩ cần c&oacute; một t&acirc;m hồn. Đối với tranh cũng vậy, để tạo n&ecirc;n một bức tranh đ&aacute; qu&yacute;, người nghệ nh&acirc;n đ&atilde; h&ograve;a m&igrave;nh v&agrave; cảm biến những vi&ecirc;n đ&aacute; th&ocirc; th&agrave;nh những bức tranh sống động như kh&uacute;c h&ograve;a tấu giữa nhạc &ndash; thơ &ndash; họa &ndash; v&agrave; con người. Những t&aacute;c phẩm mang &acirc;m hưởng của k&yacute; ức, mang n&eacute;t dịu d&agrave;ng cổ k&iacute;nh xưa v&agrave; nay. Tranh đ&aacute; qu&yacute; được tạo ra từ những b&agrave;n tay nghệ nh&acirc;n đi&ecirc;u luyện, họ biến tấu đam m&ecirc; nghệ thuật th&agrave;nh những bức tranh độc đ&aacute;o: &ldquo;Vẽ tranh bằng m&agrave;u đ&atilde; kh&oacute;, vẽ tranh bằng thi&ecirc;n nhi&ecirc;n kh&oacute; gấp vạn lần. Đ&atilde; đến l&uacute;c nghệ thuật gắn liền với thi&ecirc;n nhi&ecirc;n, tạo cho con người cảm hứng v&agrave; s&aacute;ng tạo&rdquo;. Mỗi bức tranh đ&aacute; qu&yacute; được chế t&aacute;c từ những hạt đ&aacute; li ti mu&ocirc;n m&agrave;u sắc, những hạt đ&aacute; cực kỳ nhỏ tạo ra được những đường n&eacute;t sống động, thanh tho&aacute;t nhẹ nh&agrave;ng, m&agrave;u sắc h&agrave;i h&ograve;a, cũng l&agrave; ngần ấy c&ocirc;ng phu t&acirc;m huyết của c&aacute;c nghệ nh&acirc;n.</p>\n<p>Tranh đ&aacute; qu&yacute; đ&atilde; khơi gợi l&ograve;ng tự h&agrave;o của con người về cội nguồn, về bản sắc văn h&oacute;a d&acirc;n tộc. Tranh được bắt ngu&ocirc;n từ cảm x&uacute;c về qu&ecirc; hương đất nước v&agrave; con người, về t&igrave;nh bạn v&agrave; t&igrave;nh y&ecirc;u, lu&ocirc;n mang đậm chất d&acirc;n gian b&igrave;nh dị nhưng kh&ocirc;ng k&eacute;m phần thanh cao ,tao nh&atilde;. Những bức tranh gợi cảm uyển chuyển, tạo n&ecirc;n n&eacute;t ri&ecirc;ng về một nền văn h&oacute;a d&acirc;n tộc &ndash; một hồn tranh rất Việt. Đường n&eacute;t tinh tế trong tranh được ph&aacute;c họa đậm chất thơ chất nhạc, m&agrave;u sắc tiết tấu mượt m&agrave; nhẹ nh&agrave;ng, s&acirc;u lắng ẩn chứa biết bao t&acirc;m trạng. Khi tranh được đặt h&ograve;a quyện v&agrave;o g&oacute;c kh&ocirc;ng gian nội thất, sẽ tạo n&ecirc;n một kh&ocirc;ng gian thăng hoa cảm x&uacute;c ,một kh&ocirc;ng gian m&agrave; t&acirc;m hồn sẽ bay bổng sẽ an nhi&ecirc;n tự tại để thấy cuộc đời mang thật nhiều &yacute; nghĩa.</p>\n</div>', '2013-12-21 11:57:15', '2013-12-22 13:50:48', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]tranh-da-quy-bat-tien.jpg', 2, '', '', 'S346', 1, 120, 120, 'cm', 10000000, 0, 0, 0, 0),
(153, 'Nữ hoàng của biển', '<div>\r\n<div><img title="Nguyễn Văn Bốn" src="http://www.muabantranh.com/upload/author/tac_gia_le_bon1_1.jpg" alt="Nguyễn Văn Bốn" /></div>\r\n<div>T&ecirc;n t&aacute;c giả :&nbsp;Nguyễn Văn Bốn</div>\r\n</div>\r\n<div>\r\n<div>B&uacute;t danh :&nbsp;Vanbon</div>\r\n</div>\r\n<div>\r\n<div>Qu&ecirc; qu&aacute;n :&nbsp;TP. Hồ Ch&iacute; Minh</div>\r\n</div>\r\n<div>\r\n<div>Địa chỉ :&nbsp;31, ĐƯỜNG TH&Agrave;NH LỘC, Q. 12, TP. HCM</div>\r\n</div>\r\n<div>\r\n<div>Điện thoại :&nbsp;0934917388 - 37164037</div>\r\n</div>\r\n<div>\r\n<div>Email :&nbsp;<a href="mailto:bondongxam@gmail.com">bondongxam@gmail.com</a></div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<h1 class="page-title"><strong>Tranh đ&aacute; qu&yacute;</strong></h1>\r\n<div class="archive-meta">\r\n<p>Tranh đ&aacute; qu&yacute; kh&ocirc;ng chỉ l&agrave; m&oacute;n qu&agrave; người th&acirc;n d&agrave;nh tặng nhau m&agrave; c&ograve;n l&agrave; vật trang tr&iacute; mang lại sự ấm c&uacute;ng sang trọng đến cho kh&ocirc;ng gian nội thất gia đ&igrave;nh. Những bức tranh lấp l&aacute;nh dưới &aacute;nh đ&egrave;n v&agrave;ng lung linh trang nh&atilde; l&agrave; sự h&ograve;a quyện giữa nghệ thuật v&agrave; kiến tr&uacute;c tạo n&ecirc;n những cung bậc cảm x&uacute;c kh&oacute; tả. Tranh đ&aacute; qu&yacute; kho&aacute;c tr&ecirc;n m&igrave;nh một vẻ đẹp tinh tế với m&agrave;u sắc từ đ&aacute; thi&ecirc;n nhi&ecirc;n do tạo h&oacute;a ban tặng, sẽ kh&ocirc;ng bao giờ phai nhạt theo thời gian, cũng như t&igrave;nh cảm trao cho nhau với một gi&aacute; trị tinh thần bền vững.</p>\r\n<p>Để tạo n&ecirc;n kh&uacute;c nhạc, người nghệ sĩ cần c&oacute; một t&acirc;m hồn. Đối với tranh cũng vậy, để tạo n&ecirc;n một bức tranh đ&aacute; qu&yacute;, người nghệ nh&acirc;n đ&atilde; h&ograve;a m&igrave;nh v&agrave; cảm biến những vi&ecirc;n đ&aacute; th&ocirc; th&agrave;nh những bức tranh sống động như kh&uacute;c h&ograve;a tấu giữa nhạc &ndash; thơ &ndash; họa &ndash; v&agrave; con người. Những t&aacute;c phẩm mang &acirc;m hưởng của k&yacute; ức, mang n&eacute;t dịu d&agrave;ng cổ k&iacute;nh xưa v&agrave; nay. Tranh đ&aacute; qu&yacute; được tạo ra từ những b&agrave;n tay nghệ nh&acirc;n đi&ecirc;u luyện, họ biến tấu đam m&ecirc; nghệ thuật th&agrave;nh những bức tranh độc đ&aacute;o: &ldquo;Vẽ tranh bằng m&agrave;u đ&atilde; kh&oacute;, vẽ tranh bằng thi&ecirc;n nhi&ecirc;n kh&oacute; gấp vạn lần. Đ&atilde; đến l&uacute;c nghệ thuật gắn liền với thi&ecirc;n nhi&ecirc;n, tạo cho con người cảm hứng v&agrave; s&aacute;ng tạo&rdquo;. Mỗi bức tranh đ&aacute; qu&yacute; được chế t&aacute;c từ những hạt đ&aacute; li ti mu&ocirc;n m&agrave;u sắc, những hạt đ&aacute; cực kỳ nhỏ tạo ra được những đường n&eacute;t sống động, thanh tho&aacute;t nhẹ nh&agrave;ng, m&agrave;u sắc h&agrave;i h&ograve;a, cũng l&agrave; ngần ấy c&ocirc;ng phu t&acirc;m huyết của c&aacute;c nghệ nh&acirc;n.</p>\r\n<p>Tranh đ&aacute; qu&yacute; đ&atilde; khơi gợi l&ograve;ng tự h&agrave;o của con người về cội nguồn, về bản sắc văn h&oacute;a d&acirc;n tộc. Tranh được bắt ngu&ocirc;n từ cảm x&uacute;c về qu&ecirc; hương đất nước v&agrave; con người, về t&igrave;nh bạn v&agrave; t&igrave;nh y&ecirc;u, lu&ocirc;n mang đậm chất d&acirc;n gian b&igrave;nh dị nhưng kh&ocirc;ng k&eacute;m phần thanh cao ,tao nh&atilde;. Những bức tranh gợi cảm uyển chuyển, tạo n&ecirc;n n&eacute;t ri&ecirc;ng về một nền văn h&oacute;a d&acirc;n tộc &ndash; một hồn tranh rất Việt. Đường n&eacute;t tinh tế trong tranh được ph&aacute;c họa đậm chất thơ chất nhạc, m&agrave;u sắc tiết tấu mượt m&agrave; nhẹ nh&agrave;ng, s&acirc;u lắng ẩn chứa biết bao t&acirc;m trạng. Khi tranh được đặt h&ograve;a quyện v&agrave;o g&oacute;c kh&ocirc;ng gian nội thất, sẽ tạo n&ecirc;n một kh&ocirc;ng gian thăng hoa cảm x&uacute;c ,một kh&ocirc;ng gian m&agrave; t&acirc;m hồn sẽ bay bổng sẽ an nhi&ecirc;n tự tại để thấy cuộc đời mang thật nhiều &yacute; nghĩa.</p>\r\n</div>\r\n</div>\r\n</div>', '2013-12-21 11:57:34', '2013-12-22 16:03:24', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]nuhoangcua_bien_LON.jpg', 2, '', '', 'S1700', 4, 50, 200, 'cm', 12000000, 0, 0, 0, 0),
(154, 'Cửa hàng tranh ảnh Kim Dũng', '0', '2013-12-21 12:01:06', '2013-12-21 12:31:44', 9, '0', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]51b77f08ezeae742a7546.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(155, 'Cửa hàng tranh ảnh Kim Dũng', '0', '2013-12-21 12:02:33', '2013-12-21 12:31:30', 9, '0', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]canola-fields-impressionist-landscape-painting-michelle-wrighton.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(156, 'Cửa hàng tranh ảnh Kim Dũng', '0', '2013-12-21 12:03:36', '2013-12-21 12:31:11', 9, '0', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]il_fullxfull.451417070_cgbl.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(157, 'Cửa hàng tranh ảnh Kim Dũng', '', '2013-12-21 12:32:16', '2013-12-21 12:32:16', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]canola-fields-impressdionist-landscape-painting-michelle-wrighton.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(159, 'Cửa hàng tranh ảnh Kim Dũng', '', '2013-12-21 12:33:17', '2013-12-21 12:33:17', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]elitefon.ru_4849.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(160, 'Cửa hàng tranh ảnh Kim Dũng', '', '2013-12-21 12:33:43', '2013-12-21 12:33:43', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]elitefodn.ru_4849.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(161, 'Cửa hàng tranh ảnh Kim Dũng', '', '2013-12-21 12:34:07', '2013-12-21 12:34:07', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]Canvas-Paintinwg-Landscape-Painting.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(162, 'Cửa hàng tranh ảnh Kim Dũng', '', '2013-12-21 12:35:04', '2013-12-21 12:35:04', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]51b77f08eeae742a7546.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(163, '', '', '2013-12-21 12:49:35', '2013-12-21 12:49:35', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 147, 2, 5500000),
(164, '', '', '2013-12-21 12:59:54', '2013-12-21 12:59:54', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 149, 1, 12000000),
(165, '', '', '2013-12-21 12:59:54', '2013-12-21 12:59:54', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 146, 3, 23000000),
(166, '', '', '2013-12-21 13:16:52', '2013-12-21 13:16:52', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 148, 1, 3200000),
(167, 'Front Component > Default Template', 'front', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(168, 'Front Component > Default Template > Pink Style', 'front', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front_style_2', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(169, 'Blog Component > Default Template', 'blog', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'blog', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(170, 'Admin Component > Default Template', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'admin', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(171, 'Tuần lễ triển lãm tranh từ thiện lớn nhất Sài Gòn', '<p>Đ&acirc;y l&agrave; triển l&atilde;m tranh từ thiện lớn nhất TP.HCM trong dịp cuối th&aacute;ng 11/2013. Triển l&atilde;m giới thiệu 16 t&aacute;c phẩm tranh phong cảnh thi&ecirc;n nhi&ecirc;n, con người v&agrave; những sinh hoạt đời thường bằng chất liệu sơn dầu, sơn m&agrave;i với sự g&oacute;p mặt của họa sĩ danh tiếng Nguyễn Trung. Ngo&agrave;i ra, nhiều t&aacute;c phẩm nổi bật về bố cục, m&agrave;u sắc của c&aacute;c họa sĩ như Đỗ Ngọc Cường, Phạm Ho&agrave;ng Nam, Nguyễn Hải Anh&hellip; cũng được trưng b&agrave;y tại triển l&atilde;m n&agrave;y với gi&aacute; trị ni&ecirc;m yết mỗi bức từ 15 đến tr&ecirc;n 100 triệu đồng nhằm quy&ecirc;n g&oacute;p tiền cho hoạt động từ thiện.</p>\r\n<p>&nbsp;</p>\r\n<table class="image center" width="440" align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="http://baobaovephapluat.vn/dataimages/201311/original/images955410_Vietpress_T_c_ph_m_mang_t_n_M_a_sen_cu_i_c_a_h_a_s__Nguy_n_Trung_v_i_gi__b_n_117_tri_u___ng.jpg" alt="T&aacute;c phẩm mang t&ecirc;n &ldquo;M&ugrave;a sen cuối&rdquo; của họa sĩ Nguyễn Trung với gi&aacute; b&aacute;n 117 triệu " /></td>\r\n</tr>\r\n<tr>\r\n<td class="image_desc">T&aacute;c phẩm mang t&ecirc;n &ldquo;M&ugrave;a sen cuối&rdquo; của họa sĩ Nguyễn Trung với gi&aacute; b&aacute;n 117 triệu đồng</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Đặc biệt, triển l&atilde;m cũng mang đến 20 bức tranh sơn dầu ấn tượng của nh&oacute;m My Family - My Art. Mỗi bức tranh chứa đựng t&igrave;nh cảm của c&aacute;c em với cuộc sống xung quanh dưới g&oacute;c nh&igrave;n đầy hồn nhi&ecirc;n. Kh&aacute; nhiều người d&acirc;n, ng&ocirc;i sao, mạnh thường qu&acirc;n đ&atilde; đến tham quan triển l&atilde;m v&agrave; ủng hộ những bức tranh hồn nhi&ecirc;n của c&aacute;c em.<br /><br />Ng&acirc;n h&agrave;ng Nam &Aacute; (NamABank) - đơn vị tổ chức sự kiện &yacute; nghĩa n&agrave;y cho biết to&agrave;n bộ số tiền thu được sẽ d&ugrave;ng l&agrave;m c&aacute;c hoạt động từ thiện như: x&acirc;y dựng trường mầm non tại huyện Ph&ugrave; Mỹ, tỉnh B&igrave;nh Định; trao học bổng cho c&aacute;c trẻ em ngh&egrave;o vượt kh&oacute;; chăm s&oacute;c c&aacute;c cụ gi&agrave; neo đơn; ủng hộ c&aacute;c gia đ&igrave;nh bị ảnh hưởng bởi thi&ecirc;n tai tại c&aacute;c tỉnh Miền Trung&hellip;<br /><br />B&agrave; Nguyễn Thị Xu&acirc;n Loan - Chủ tịch HĐQT NamABank chia sẻ:&nbsp;<em>&ldquo;Triển l&atilde;m tranh từ thiện năm 2012 đ&atilde; mang đến những gi&aacute; trị thiết thực cho cộng đồng x&atilde; hội bằng những th&agrave;nh quả &yacute; nghĩa như: x&acirc;y dựng cầu tại huyện An Minh, tỉnh Ki&ecirc;n Giang v&agrave; nhiều suất học bổng tại c&aacute;c tỉnh Bến Tre, B&igrave;nh Phước, Quảng Nam&hellip; NamABank lu&ocirc;n hy vọng c&oacute; th&ecirc;m nhiều tấm l&ograve;ng c&ugrave;ng c&ugrave;ng đồng h&agrave;nh thắp s&aacute;ng cho những mảnh đời bất hạnh&rdquo;.</em></p>\r\n<p>&nbsp;</p>\r\n<table class="image center" width="440" align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="http://baobaovephapluat.vn/dataimages/201311/original/images955411_Vietpress_2_20_b_c_tranh_s__d_u____c_v__b_i_c_c_em_thi_u_nhi_nh_m_My_Family___My_Art__.jpg" alt="20 bức tranh sơ dầu được vẽ bới c&aacute;c em thiếu nhi nh&oacute;m My Family - My Art." /></td>\r\n</tr>\r\n<tr>\r\n<td class="image_desc">20 bức tranh sơ dầu được vẽ bới c&aacute;c em thiếu nhi nh&oacute;m My Family - My Art.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class="image center" width="440" align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="http://baobaovephapluat.vn/dataimages/201311/original/images955412_Vietpress_3_Tri_n_l_m_t__thi_n_v_i_s__g_p_m_t_c_a___H_u_Tr__ng_Th__May.jpg" alt="Triển l&atilde;m từ thiện với sự g&oacute;p mặt của &Aacute; Hậu Trương Thị May." /></td>\r\n</tr>\r\n<tr>\r\n<td class="image_desc">Triển l&atilde;m từ thiện với sự g&oacute;p mặt của &Aacute; hậu Trương Thị May.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Triển l&atilde;m diễn ra từ 22/11 đến 30/11 tại Hội sở Ng&acirc;n h&agrave;ng Nam &Aacute; số 201-203 C&aacute;ch Mạng Th&aacute;ng T&aacute;m, P.4, Q.3, TP.HCM.<br />&nbsp;</p>\r\n<p><strong>Phan Long - Tường Ch&acirc;u</strong></p>\r\n<p><strong>(Nguồn: B&aacute;o Bảo vệ ph&aacute;p luật -&nbsp;<a href="http://baobaovephapluat.vn/">http://baobaovephapluat.vn</a>)</strong></p>', '2013-12-22 10:27:46', '2013-12-22 10:27:46', 9, '(BVPL) - Triển lãm tranh từ thiện “Nhớ cội nguồn - Hướng tương lai 2013” đã khai mạc ngày 22/11 và mang đến nhiều ấn tượng mới lạ với 20 bức tranh sơn dầu của nhóm My Family - My Art hay những tác phẩm tranh của các họa sĩ nổi tiếng.', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(172, '“Sắc màu yêu thương” của Karishma', '<p class="pBody"><img class="imgNoSlide-image" style="display: block; margin-left: auto; margin-right: auto;" src="http://images.tuoitre.vn/tianyon/ImageView.aspx?ThumbnailID=675079" alt="" width="559" height="314" /></p>\r\n<div class="imgNoSlide-caption">\r\n<p class="tLegend">Karishma b&ecirc;n những t&aacute;c phẩm chất chứa y&ecirc;u thương của m&igrave;nh&nbsp;- Ảnh: Hải Thi</p>\r\n</div>\r\n<p class="pBody">Tươi s&aacute;ng, nhiều niềm vui, ấm &aacute;p, t&igrave;nh cảm, ph&oacute;ng kho&aacute;ng, thuần khiết... l&agrave; những điều mọi người thốt ra sau khi xem tranh của Karishma. Người ta đến để tr&acirc;n trọng nỗ lực vượt nghịch cảnh của Karishma v&agrave; gia đ&igrave;nh, để cảm phục hơn tấm l&ograve;ng nh&acirc;n &aacute;i của c&ocirc; bạn ấy khi chăm chỉ vẽ v&agrave; b&aacute;n để c&oacute; tiền gi&uacute;p những đứa trẻ bất hạnh hơn. Những đ&agrave;n bướm, c&aacute;nh đồng hoa, h&igrave;nh ảnh phố thị phản chiếu lấp lo&aacute;ng dưới nước, những v&acirc;n đ&aacute; tạo n&ecirc;n bởi những vi&ecirc;n bi nh&uacute;ng m&agrave;u lăn tr&ecirc;n vải bố... của Karishma v&igrave; vậy m&agrave; th&ecirc;m phần hồn, đậm đ&agrave; t&igrave;nh cảm.</p>\r\n<p class="pBody">Nghị lực v&agrave; tấm l&ograve;ng của Karishma đ&atilde; truyền cảm hứng cho nhiều bạn trẻ c&ugrave;ng cảnh ngộ. Kh&ocirc;ng may mắc chứng bệnh lao m&agrave;ng n&atilde;o từ năm 19 tuổi, từ một c&ocirc; g&aacute;i th&iacute;ch h&aacute;t, th&iacute;ch l&agrave;m thơ, Ngọc Lan (TP Cần Thơ) đ&atilde; phải ch&ocirc;n v&ugrave;i những năm th&aacute;ng thanh xu&acirc;n tr&ecirc;n giường bệnh. C&aacute;ch đ&acirc;y một năm, số phận dẫn lối Karishma v&agrave; gia đ&igrave;nh t&igrave;m đến, cuộc đời Lan như sang trang mới. Được Karishma hỗ trợ t&agrave;i ch&iacute;nh trị liệu, động vi&ecirc;n tinh thần, bệnh t&igrave;nh của Lan thuy&ecirc;n giảm hẳn. Nụ cười như bừng s&aacute;ng tr&ecirc;n m&ocirc;i Lan khi n&oacute;i về ước mơ: &ldquo;Khỏi bệnh m&igrave;nh sẽ l&agrave;m những việc như Karishma, sẽ gi&uacute;p đỡ những đứa trẻ k&eacute;m may mắn như Karishma đ&atilde; l&agrave;m cho m&igrave;nh&rdquo;.</p>\r\n<p class="pBody">Kh&ocirc;ng chỉ cổ động tinh thần người đồng cảnh, nghị lực Karishma qua từng bức tranh c&ograve;n th&uacute;c đẩy &yacute; thức sống mạnh mẽ cho nhiều bạn trẻ. C&oacute; mặt từ sớm, bạn Trương Ho&agrave;ng V&acirc;n Kh&aacute;nh (15 tuổi) thổ lộ: &ldquo;M&igrave;nh th&iacute;ch tất cả bức vẽ của chị ấy. Bức n&agrave;o cũng dễ thương, hồn nhi&ecirc;n v&agrave; đẹp bất ngờ. Khuyết tật kh&ocirc;ng thể l&agrave; r&agrave;o cản với Karishma, vậy bản th&acirc;n m&igrave;nh c&agrave;ng kh&ocirc;ng c&oacute; l&yacute; do g&igrave; kh&ocirc;ng phấn đấu l&agrave;m những điều tốt đẹp cho cuộc sống&rdquo;.</p>\r\n<p class="pBody">Gần 230 triệu đồng thu về từ 31 bức tranh b&aacute;n tại triển l&atilde;m đ&atilde; được Karishma c&ugrave;ng gia đ&igrave;nh gửi đến Hội Bảo trợ người khuyết tật v&agrave; trẻ mồ c&ocirc;i TP.HCM v&agrave; Hội Bảo trợ người t&agrave;n tật, trẻ em mồ c&ocirc;i v&agrave; bệnh nh&acirc;n ngh&egrave;o Quảng Nam. Nh&igrave;n Karishma h&ocirc;m nay duy&ecirc;n d&aacute;ng trong t&agrave; &aacute;o d&agrave;i truyền thống VN, NSND Kim Cương x&uacute;c động nhớ lại h&igrave;nh ảnh c&ocirc; b&eacute; nh&uacute;t nh&aacute;t cứ b&aacute;m riết tay mẹ trong lần đầu ti&ecirc;n gặp mặt. H&ocirc;m triển l&atilde;m cũng vậy, Karishma cứ vịn m&atilde;i c&aacute;nh tay rắn chắc của cha nhưng đ&atilde; tự tin hơn v&igrave; nỗ lực v&agrave; ho&agrave;n th&agrave;nh một h&agrave;nh động &yacute; nghĩa.</p>\r\n<p class="pBody">Trong kh&ocirc;ng gian ấm c&uacute;ng của triển l&atilde;m, NSND Kim Cương b&agrave;y tỏ l&ograve;ng k&iacute;nh trọng với cha mẹ Karishma - những &ldquo;chiến sĩ&rdquo; bền bỉ đưa Karishma vượt mọi trở ngại của hội chứng Down tiếp cận với hội họa, yoga, &acirc;m nhạc, nhập học c&ugrave;ng những học sinh của Trường chuy&ecirc;n biệt Gia Định (Q.B&igrave;nh Thạnh). Bằng y&ecirc;u thương v&agrave; cả l&ograve;ng dũng cảm chỉ c&oacute; ở những bậc sinh th&agrave;nh, &ocirc;ng b&agrave; Kannan đ&atilde; gi&uacute;p Karishma chiến thắng sự sắp đặt tr&eacute;o ngoe của số phận, bước v&agrave;o cuộc sống một c&aacute;ch b&igrave;nh thường v&agrave; cống hiến nhiều hơn người thường. Bằng sắc m&agrave;u v&agrave; n&eacute;t cọ, Karishma đ&atilde; truyền đi t&igrave;nh y&ecirc;u ấm &aacute;p đến bao t&acirc;m hồn. Y&ecirc;u thương ch&iacute;nh l&agrave; ng&ocirc;n ngữ của m&agrave;u sắc Karishma.</p>\r\n<p>(Nguồn: Tuổi trẻ online)</p>', '2013-12-22 10:32:06', '2013-12-22 10:32:51', 9, 'TT - Cô gái kỳ diệu người Ấn Độ Karishma Kannan vừa có buổi triển lãm và bán tranh lần thứ hai tại TP.HCM. Những khối màu sắc rực rỡ trong tranh của cô gái 22 tuổi mắc hội chứng Down bẩm sinh này như có cánh tay vươn ra, chạm và níu giữ trái tim người thưởng lãm. Triển lãm “Colors of love” - Sắc màu yêu thương sẽ gây quỹ giúp trẻ em nghèo dịp tết sắp tới.', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(173, 'Triển lãm ', '<div class="ad-image-wrapper">\r\n<div class="ad-image"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://images.tuoitre.vn/tianyon/ImageView.aspx?ThumbnailID=679286" alt="" width="530" height="298" />\r\n<p class="ad-image-description" style="text-align: center;">Kh&aacute;ch tham quan triển l&atilde;m tranh k&yacute; họa - Ảnh: Ho&agrave;ng Thạch V&acirc;n</p>\r\n</div>\r\n<div class="ad-next">\r\n<p class="pBody">C&aacute;c t&aacute;c phẩm đ&atilde; phản &aacute;nh ch&acirc;n thực vẻ đẹp của thi&ecirc;n nhi&ecirc;n, ch&acirc;n dung những con người b&igrave;nh dị, mộc mạc m&agrave; ki&ecirc;n cường, bất khuất của qu&acirc;n v&agrave; d&acirc;n v&ugrave;ng S&agrave;i G&ograve;n&nbsp;- Chợ Lớn&nbsp;- Gia Định như họa sĩ Nguyễn Quang Bửu (đ&atilde; hi sinh), c&aacute;c&nbsp;họa sĩ Huỳnh Phương Đ&ocirc;ng, L&ecirc; Lam, Kim Li&ecirc;n, Nguyễn Văn K&iacute;nh&hellip;</p>\r\n<p class="pBody">Nội dung c&aacute;c t&aacute;c phẩm k&yacute; họa kh&aacute;ng chiến kh&ocirc;ng chỉ c&oacute; gi&aacute; trị về mỹ thuật, tư tưởng m&agrave; đặc biệt c&ograve;n mang gi&aacute; trị lịch sử s&acirc;u sắc. C&aacute;c họa sĩ cũng l&agrave; chiến sĩ, h&agrave;nh trang mang theo ra chiến trường của họ b&ecirc;n cạnh vũ kh&iacute; để chiến đấu kh&ocirc;ng thể thiếu giấy vẽ, b&uacute;t ch&igrave;, cọ, m&agrave;u&hellip;</p>\r\n<p class="pBody">Khi tạm y&ecirc;n tiếng s&uacute;ng, họ lại vội v&atilde;, tranh thủ s&aacute;ng t&aacute;c phục vụ nh&acirc;n d&acirc;n.</p>\r\n<p class="pBody">Triển l&atilde;m do Bảo t&agrave;ng Chứng t&iacute;ch chiến tranh thực hiện với sự phối hợp của Bảo t&agrave;ng Mỹ thuật, Bảo t&agrave;ng Phụ nữ Nam bộ, Bảo t&agrave;ng TP.HCM tổ chức, k&eacute;o d&agrave;i đến hết ng&agrave;y 7-1-2014.</p>\r\n<p class="pBody">(Nguồn: tuổi trẻ online)</p>\r\n</div>\r\n</div>', '2013-12-22 10:34:55', '2013-12-22 10:35:47', 9, 'TTO - Triển lãm vừa khai mạc sáng 21-12 tại Bảo tàng Chứng tích chiến tranh (28 Võ Văn Tần, Q.3, TP.HCM) nhằm giới thiệu đến công chúng 60 bức ký họa của 17 họa sĩ - chiến sĩ đã dùng tài năng sáng tạo của mình ghi lại những khoảnh khắc quý báu trong cuộc chiến.', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(174, 'Các câu hỏi thường gặp', '<p><em><strong><img style="display: block; margin-left: auto; margin-right: auto;" src="[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]images (1).jpg" alt="images (1)" /></strong></em></p>\r\n<p><em><strong>Q: T&ocirc;i muốn mua h&agrave;ng trực tuyến nhưng lại kh&ocirc;ng c&oacute; thẻ để thanh to&aacute;n?</strong></em></p>\r\n<p>A: Ch&uacute;ng t&ocirc;i c&oacute; cung cấp h&igrave;nh thức thanh to&aacute;n tại nh&agrave; để thuận lợi hơn cho qu&yacute; kh&aacute;ch.</p>\r\n<p><strong><em>Q: Đơn h&agrave;ng tr&ecirc;n 10 triệu th&igrave; t&ocirc;i c&oacute; được ưu đ&atilde;i g&igrave; kh&ocirc;ng?</em></strong></p>\r\n<p>A: Xin qu&yacute; kh&aacute;ch vui l&ograve;ng xem mục Khuyến m&atilde;i để biết c&aacute;c th&ocirc;ng tin về chương tr&igrave;nh khuyến m&atilde;i của cửa h&agrave;ng. Tr&acirc;n trọng!</p>\r\n<p><strong><em>Q: Hiện cửa h&agrave;ng c&oacute; h&igrave;nh thức t&iacute;ch lũy điểm cho kh&aacute;ch hay kh&ocirc;ng?</em></strong></p>\r\n<p>A: Cửa h&agrave;ng ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng hết sức để đem đến dịch vụ tốt nhất. Hiện tại h&igrave;nh thức t&iacute;ch điểm ưu đ&atilde;i đang được ch&uacute;ng t&ocirc;i nghi&ecirc;n cứu v&agrave; ph&aacute;t triển, qu&yacute; kh&aacute;ch vui l&ograve;ng để lại th&ocirc;ng tin ở phần li&ecirc;n hệ v&agrave; ch&uacute;ng t&ocirc;i sẽ li&ecirc;n lạc sớm nhất với qu&yacute; kh&aacute;ch.</p>\r\n<p><em><strong>Q: Nếu t&ocirc;i muốn hủy đơn h&agrave;ng c&oacute; được kh&ocirc;ng?</strong></em></p>\r\n<p>A: Qu&yacute; kh&aacute;ch c&oacute; thể li&ecirc;n hệ trực tiếp với cửa h&agrave;ng v&agrave; hủy đơn h&agrave;ng. Xin qu&yacute; kh&aacute;ch kiểm tra v&agrave; b&aacute;o cho ch&uacute;ng t&ocirc;i biết m&atilde; số đơn h&agrave;ng cần hủy.</p>', '2013-12-22 10:43:24', '2013-12-22 15:42:41', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]images (1).jpg', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(175, 'Khuyến mãi tháng 12', '<p>Để gửi lời tri &acirc;n đến kh&aacute;ch h&agrave;ng, trong th&aacute;ng 12 n&agrave;y, mọi đơn h&agrave;ng c&oacute; trị gi&aacute; tr&ecirc;n 10.000.000 đồng sẽ được ch&uacute;ng t&ocirc;i giảm gi&aacute; trực tiếp 10% v&agrave; sẽ được đ&oacute;ng khung miễn ph&iacute;.</p>', '2013-12-22 10:47:56', '2013-12-22 16:04:40', 9, '', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(176, 'Ví dụ về gửi liên hện', 'Nội dung nè', '2013-12-22 13:54:38', '2013-12-22 13:54:38', 9, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(177, '', '', '2013-12-22 14:33:55', '2013-12-22 14:33:55', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 143, 3, 17000000),
(178, '', '', '2013-12-22 14:33:55', '2013-12-22 14:33:55', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 147, 3, 5500000);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `post_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`,`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `cat_id`) VALUES
(54, 53),
(92, 64),
(95, 64),
(106, 73),
(107, 73),
(108, 74),
(109, 74),
(112, 76),
(113, 77),
(114, 78),
(115, 79),
(124, 80),
(125, 81),
(126, 39),
(132, 95),
(134, 131),
(134, 138),
(135, 131),
(135, 138),
(136, 131),
(136, 138),
(137, 131),
(137, 138),
(138, 131),
(138, 138),
(139, 131),
(139, 138),
(140, 132),
(140, 140),
(141, 132),
(141, 140),
(142, 132),
(142, 140),
(143, 132),
(143, 140),
(144, 132),
(144, 140),
(145, 137),
(145, 139),
(146, 137),
(146, 139),
(147, 133),
(147, 135),
(147, 142),
(148, 133),
(148, 134),
(148, 141),
(149, 133),
(149, 134),
(149, 141),
(150, 133),
(150, 139),
(150, 146),
(151, 133),
(151, 139),
(151, 146),
(152, 136),
(152, 143),
(153, 136),
(153, 144),
(154, 40),
(155, 40),
(156, 40),
(157, 40),
(159, 40),
(160, 40),
(161, 40),
(162, 40),
(163, 147),
(164, 148),
(165, 148),
(166, 149),
(171, 159),
(172, 159),
(173, 159),
(174, 158),
(175, 160),
(176, 39),
(177, 164),
(178, 164);

-- --------------------------------------------------------

--
-- Table structure for table `shippingfee`
--

CREATE TABLE IF NOT EXISTS `shippingfee` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `fee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippingfee`
--

INSERT INTO `shippingfee` (`id`, `name`, `fee`) VALUES
(1, 'TP HCM', 20000),
(2, 'An Giang', 100000),
(3, 'Bà Rịa - Vũng Tàu', 100000),
(4, 'Bắc Giang', 100000),
(5, 'Bắc Kạn', 100000),
(6, 'Bạc Liêu', 100000),
(7, 'Bắc Ninh', 100000),
(8, 'Bến Tre', 100000),
(9, 'Bình Định', 100000),
(10, 'Bình Dương', 100000),
(11, 'Bình Phước', 100000),
(12, 'Bình Thuận', 100000),
(13, 'Cà Mau', 100000),
(14, 'Cao Bằng', 100000),
(15, 'Đắk Lắk', 100000),
(16, 'Đắk Nông', 100000),
(17, 'Điện Biên', 100000),
(18, 'Đồng Nai', 100000),
(19, 'Đồng Tháp', 100000),
(20, 'Gia Lai', 100000),
(21, 'Hà Giang', 100000),
(22, 'Hà Nam', 100000),
(23, 'Hà Tĩnh', 100000),
(24, 'Hải Dương', 100000),
(25, 'Hậu Giang', 100000),
(26, 'Hòa Bình', 100000),
(27, 'Hưng Yên', 100000),
(28, 'Khánh Hòa', 100000),
(29, 'Kiên Giang', 100000),
(30, 'Kon Tum', 100000),
(31, 'Lai Châu', 100000),
(32, 'Lâm Đồng', 100000),
(33, 'Lạng Sơn', 100000),
(34, 'Lào Cai', 100000),
(35, 'Long An', 100000),
(36, 'Nam Định', 100000),
(37, 'Nghệ An', 100000),
(38, 'Ninh Bình', 100000),
(39, 'Ninh Thuận', 100000),
(40, 'Phú Thọ', 100000),
(41, 'Quảng Bình', 100000),
(42, 'Quảng Nam', 100000),
(43, 'Quảng Ngãi', 100000),
(44, 'Quảng Ninh', 100000),
(45, 'Quảng Trị', 100000),
(46, 'Sóc Trăng', 100000),
(47, 'Sơn La', 100000),
(48, 'Tây Ninh', 100000),
(49, 'Thái Bình', 100000),
(50, 'Thái Nguyên', 100000),
(51, 'Thanh Hóa', 100000),
(52, 'Thừa Thiên Huế', 100000),
(53, 'Tiền Giang', 100000),
(54, 'Trà Vinh', 100000),
(55, 'Tuyên Quang', 100000),
(56, 'Vĩnh Long', 100000),
(57, 'Vĩnh Phúc', 100000),
(58, 'Yên Bái', 100000),
(59, 'Phú Yên', 100000),
(60, 'Cần Thơ', 100000),
(61, 'Đà Nẵng', 100000),
(62, 'Hải Phòng', 100000),
(63, 'Hà Nội', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `birth` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sex` int(11) NOT NULL DEFAULT '1',
  `password` text NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: manager, 1: customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `birth`, `sex`, `password`, `group_id`, `date_create`, `date_modify`, `email`, `address`, `phone`, `active`, `special`) VALUES
(8, 'bekienkim', 'Nguyễn Hoàng Kim', '0000-00-00 00:00:00', 1, '6448277551ac3c3516926282a19a6a18e5ed062a', 2, '0000-00-00 00:00:00', '2013-12-21 12:58:02', 'cuahangbantranh@gmail.com', 'sao biet', '090901', 1, 0),
(9, 'admin', 'Nguyễn Quốc Dũng', '0000-00-00 00:00:00', 1, 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '0000-00-00 00:00:00', '2013-12-21 12:56:48', 'quocdunginfo@gmail.com', '', '234234', 1, 0),
(11, 'maihuynh', 'Trần Thị Khách Hàng', '0000-00-00 00:00:00', 1, '8d1d8cd0ead1211c032a0dfd4280cc317bd9cc42', 3, '2013-12-01 19:01:27', '2013-12-21 12:58:29', 'hellogirl@yahoo.com', 'Trần Phú', '909090', 1, 0),
(12, 'kienkim', 'Nguyễn Kim Ngân', '0000-00-00 00:00:00', 1, '2c8be7563985b402660f9019bcf1550ea0b4afb6', 0, '2013-12-14 18:36:09', '2013-12-21 12:55:46', 'nguyenhoangkim1702@gmail.com', '12345 abc', '909090090', 1, 1),
(13, 'bekim', 'Xì Kim', '0000-00-00 00:00:00', 1, '479f92cbec6d7b041a874a4b7757c96a50ec1295', 0, '2013-12-15 15:09:28', '2013-12-21 12:56:28', 'kienkimkhung@gmail.com', '217 kkkk', '090032090', 1, 1),
(15, 'kienkimkhung', 'Nguyễn Hoàng Kim', '0000-00-00 00:00:00', 1, '3e41adf7d5ce135b5c0ebde5f5d0d9f54863ae1d', 0, '2013-12-21 12:53:44', '2013-12-21 12:53:50', 'kim.nh1702@gmail.com', '123 xyz ', '84890809809', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
