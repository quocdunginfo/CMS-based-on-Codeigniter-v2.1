-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2013 at 05:38 PM
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
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal cat, 1: system cat, 2: thể loại tranh, 3: chất liệu tranh, 4: menu, 5: product order',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `parent_id`, `date_create`, `date_modify`, `active`, `special`, `order_total`, `order_status`, `order_online_payment`, `order_user_id`, `order_customer_user_id`, `order_rc_address`, `order_rc_phone`, `order_rc_fullname`, `order_shippingfee_id`, `menu_provider_id`, `menu_param`) VALUES
(1, 'Nokia', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(4, 'Samsung', '', 3, '2013-08-28 00:00:00', '2013-08-15 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(5, 'Laptop', '', -1, '2013-08-22 00:00:00', '2013-08-17 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(24, 'Dell', '', 5, '0000-00-00 00:00:00', '2013-12-01 15:46:27', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(25, 'Vaio', '', 5, '0000-00-00 00:00:00', '2013-11-28 09:10:37', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(26, 'Macbook', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(27, 'Lenovo', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(28, 'HTC', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(29, 'Mobell', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(30, 'Samsung', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(39, 'feedback', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(40, 'Slider for home page2', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(47, 'Trừu tượng2', '', -1, '0000-00-00 00:00:00', '2013-12-02 06:54:21', 1, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(48, 'Khỏa thân', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(49, 'vai2', '', -1, '0000-00-00 00:00:00', '2013-12-07 11:47:28', 1, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(50, 'giay', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(51, 'About page', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(52, 'Homepage''s 6 widgets', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(53, 'Homepage''s footer widget', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(61, 'cuoc song 22', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(63, 'gach', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(73, '', '', 0, '2013-12-07 15:14:39', '2013-12-08 19:30:12', 1, 5, 509000, 'dabihuy', 1, 9, 11, '', '', '', 0, 0, ''),
(74, '', '', 0, '2013-12-08 14:06:11', '2013-12-08 16:42:01', 1, 5, 509000, 'dabihuy', 1, 9, 11, '', '', '', 0, 0, ''),
(75, 'Khỏa hình', '', 48, '2013-12-09 08:55:54', '2013-12-09 08:55:54', 1, 2, 0, '', 1, 0, 0, '', '', '', 0, 0, ''),
(76, '', '', 0, '2013-12-13 16:23:29', '2013-12-13 16:23:29', 1, 5, 12000, 'chualienlac', 0, 0, 0, 'Tran Hung Dao', '1212121212', 'Quarn trij2222', 0, 0, ''),
(77, '', '', 0, '2013-12-13 16:26:31', '2013-12-13 16:26:31', 1, 5, 12000, 'chualienlac', 0, 0, 9, 'Tran Hung Dao', '1212121212', 'Quarn trij2222', 0, 0, ''),
(78, '', '', 0, '2013-12-13 16:31:03', '2013-12-13 16:31:03', 1, 5, 12000, 'chualienlac', 0, 0, 9, 'Tran Hung Dao', '1212121212', 'Quarn trij2222', 0, 0, ''),
(79, '', '', 0, '2013-12-13 16:32:22', '2013-12-13 16:33:15', 1, 5, 12000, 'chuagiao', 0, 0, 9, 'Tran Hung Dao', '1212121212', 'Quarn trij2222', 1, 0, ''),
(80, '', '', 0, '2013-12-15 14:16:40', '2013-12-15 14:16:40', 1, 5, 1234, 'chualienlac', 1, 0, 9, 'Tran Hung Dao', '0979996234', 'Quarn trij2222', 18, 0, ''),
(81, '', '', 0, '2013-12-15 14:19:43', '2013-12-15 14:19:43', 1, 5, 1234, 'chualienlac', 0, 0, 9, 'Tran Hung Dao', '0979996234', 'Quarn trij2222', 1, 0, ''),
(82, 'Main menu 1', '', -1, '2013-12-16 09:02:48', '2013-12-17 16:17:42', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 1, ''),
(84, 'Trang chủ', '', 82, '2013-12-16 09:03:06', '2013-12-17 16:51:58', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 5, ''),
(88, 'Liên hệ', '', 82, '2013-12-17 16:21:37', '2013-12-17 16:21:37', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 1, ''),
(89, 'Login', '', 91, '2013-12-17 17:11:30', '2013-12-17 17:18:41', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 6, ''),
(90, 'Register', '', 91, '2013-12-17 17:13:35', '2013-12-17 17:18:31', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 7, ''),
(91, 'Account', '', 82, '2013-12-17 17:16:11', '2013-12-17 17:16:11', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 8, ''),
(92, 'Logout', '', 91, '2013-12-17 17:17:22', '2013-12-17 17:18:26', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 9, ''),
(93, 'Tất cả sản phẩm', '', 82, '2013-12-17 17:25:42', '2013-12-17 17:25:42', 1, 4, 0, '', 1, 0, 0, '', '', '', 0, 4, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `post_id`, `active`, `guest_name`, `guest_email`, `guest_ip`) VALUES
(3, '', 'rwerwerer', '2013-09-05 15:40:20', '2013-09-05 15:40:20', 8, 4, 1, 'ewrew', 'rwerwe', '::1'),
(4, '', 'rwerwerer', '2013-09-05 15:41:48', '2013-09-05 15:41:48', 8, 4, 1, 'ewrew', 'rwerwe', '::1'),
(5, '', 'rwerwerer', '2013-09-05 15:44:26', '2013-09-05 15:44:26', 8, 4, 1, 'ewrew', 'rwerwe', '::1'),
(6, '', 'ewqewqe', '2013-09-06 12:30:05', '2013-09-06 12:30:05', 8, 4, 1, 'qwqewq', 'ewqewq', '::1'),
(7, 'what the fuck', 'oh shit', '2013-09-14 13:23:53', '2013-09-14 13:23:53', 8, 4, 1, 'Olalala', 'q@gmail.com', '::1'),
(8, '', 'jhaushfusfdf', '2013-09-14 13:25:31', '2013-09-14 13:25:31', 8, 4, 1, 'khung', 'q@y.com', '::1'),
(9, '', 'jhaushfusfdf', '2013-09-14 13:26:08', '2013-09-14 13:26:08', 8, 4, 1, 'khung', 'q@y.com', '::1'),
(10, '', 'jhaushfusfdf', '2013-09-14 13:26:20', '2013-09-14 13:26:20', 8, 4, 1, 'khung', 'q@y.com', '::1'),
(11, '[Contact feedbacks]', 'nói chi cho khổ mệt', '2013-09-16 06:24:05', '2013-09-16 06:24:05', 8, 4, 1, 'Trần Hải Dương', 'd@d.d', '::1'),
(12, '[Contact feedbacks]', 'f f f f ff f khùng như đời nào rồi  f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f o sdfnasnfsan fsa fà sah fahs fhasfhasfhasf à sà à à à sà à sfsdgfewtb23r 73yrwhidhasidsakdkashd jkashdasshdsauhgdusah dusabdyasgdy asdyg sydbsa dsad vbasyd vysabdhsabdhsbdhshdh f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f ff f f f f f f fP', '2013-09-16 06:31:01', '2013-09-16 06:31:01', 8, 4, 1, 'daay ne', 'a@d.com', '::1'),
(13, '[Contact feedbacks]', 'Khufng', '2013-09-17 18:28:57', '2013-09-17 18:28:57', 0, 4, 1, 'd', 'd@gmail.com', '::1'),
(14, '[Contact feedbacks]', 'aloha', '2013-09-17 18:29:57', '2013-09-17 18:29:57', 0, 4, 1, 'hung', 's@gmail.com', '::1'),
(15, '[Contact feedbacks]', 'dc roi ne em', '2013-09-17 18:40:31', '2013-09-17 18:40:31', 0, 4, 1, 't', 't@t.com', '::1'),
(16, '[Contact feedbacks]', 'nkashjhfdjhj', '2013-11-09 07:18:02', '2013-11-09 07:18:02', 0, 4, 1, 'fgffggfg', 'quocdunginfo@yahoo.com', '::1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `description`, `active`) VALUES
(1, 'Admin', 'Nhân viên hệ thống', 1),
(2, 'User', 'Normal user', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menu_provider`
--

INSERT INTO `menu_provider` (`id`, `name`, `controller`, `selector_uri`, `action`, `active`) VALUES
(1, 'Template Contact Page', 'front/contact/', '', 'index/', 1),
(2, 'Template Painting detail >', 'front/product/', 'admin_posts/index/special/2/view_mode/selector', 'index/', 1),
(3, 'Full URL >', 'redirect/', 'admin_url/index/view_mode/selector', 'index?url=', 1),
(4, 'Template All Products', 'front/products/', '', 'painting_cat/', 1),
(5, 'Template Homepage', 'front/home/', '', 'index/', 1),
(6, 'Template Login page', 'front/login/', '', 'index/', 1),
(7, 'Template Register page', 'front/register/', '', 'index/', 1),
(8, 'Template Account page', 'front/account/', '', 'index/', 1),
(9, 'Template Logout page', 'front/logout/', '', 'index/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `key`, `value`) VALUES
(2, 'cache_time', '0'),
(3, 'slider_category', '40'),
(4, 'feature_category', '15'),
(5, 'feedback_category', '39'),
(6, 'slider_auto_scroll_time', '5'),
(7, 'menu_categories_category', '-1'),
(8, 'menu_latest_category', '-1'),
(9, 'allow_guest_post_feedback', '0'),
(10, 'maintain_mode', '0'),
(11, 'menu_about_category', '51'),
(12, 'homepage_widget_category', '52'),
(13, 'homepage_footer_widget_category', '53'),
(14, 'html_footer_left', 'dung khung'),
(15, 'html_footer_right', 'hehehe'),
(16, 'html_title', 'nothing'),
(17, 'html_seo_keyword', 'hjhjhj'),
(18, 'html_seo_author', ''),
(19, 'html_seo_description', 'sdfsdf'),
(20, 'feedback_max_content', '500'),
(21, 'maximum_item_per_page', '10'),
(22, 'maximum_preview_post_content', '500'),
(23, 'maximum_preview_post_title', '100'),
(24, 'feedback_captcha', '0'),
(26, 'template_id', '110'),
(29, 'max_count_order_per_product', '3'),
(30, 'main_menu_category', '82');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

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
(9, 'category_view'),
(10, 'category_edit'),
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
(30, 'order_add');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

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
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal post, 1: special post, 2: painting post,3: [not yet], 4: order_detail, 5: template',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `optional1`, `optional2`, `art_id`, `art_count`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `order_product_id`, `order_count`, `order_unitprice`) VALUES
(1, 'Slider11456', '<p>alo1235</p>', '2013-09-05 14:52:19', '2013-09-15 19:19:16', 8, 'alo1234', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, '', '', '', 0, 300, 0, 'cm', 0, 0, 0, 0, 0),
(3, 'slider2', '<p>wtf</p>', '2013-09-05 15:21:07', '2013-09-15 19:19:39', 8, 'Cuoojc doi quanh hieu', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(4, 'feedback', '', '2013-09-05 15:36:33', '2013-09-08 19:25:19', 8, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(7, 'what', '', '2013-09-06 12:47:32', '2013-09-16 15:58:05', 8, '', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(8, 'day ne', '', '2013-09-06 12:47:47', '2013-09-16 15:56:45', 8, '', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(9, 'hajshjdhahsudasdsad', '', '2013-09-06 12:48:24', '2013-09-06 14:40:03', 8, '', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(38, 'About me', '<p>Giới thiệu về bản th&acirc;n ở đ&acirc;y</p>', '2013-09-14 12:46:19', '2013-09-14 12:46:19', 8, 'Chưa có', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(40, 'sdfsdfsdf', '', '2013-09-14 14:00:25', '2013-09-14 14:00:25', 8, 'sdfsdfsdfsdf', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(41, 'ertret', '<p>ertertrt</p>', '2013-09-14 14:00:35', '2013-09-14 14:00:35', 8, 'ertertert', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(42, 'rtyr', '', '2013-09-14 14:10:28', '2013-09-15 15:44:24', 8, 'ytryrtytr', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(43, 'Tranh vẽ trên lá chuối', '<p class="Normal" style="font-size: 16px;">Trưa 15/9, gần 12 tiếng sau khi ngọn lửa b&ugrave;ng ph&aacute;t, lực lượng chữa ch&aacute;y đ&atilde; cơ bản khống chế được hỏa hoạn<span style="font-size: 11.8pt;"> tại </span>Trung t&acirc;m Thương mại TP Hải Dương.<span style="font-size: 11.8pt;"> Tuy nhi&ecirc;n kh&oacute;i vẫn bốc m&ugrave; mịt, hơi n&oacute;ng ng&ugrave;n ngụt c&ugrave;ng c&aacute;c mảnh vỡ từ trần trong c&aacute;c kiot tiếp tục rơi.<br /></span></p>', '2013-09-15 15:20:38', '2013-09-15 15:39:20', 8, 'Mo ta tai day', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_044.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(44, 'Day nua ne', '<p>day nua ne ba con</p>', '2013-09-15 15:25:36', '2013-09-15 15:44:52', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(47, 'sdadsad', '', '2013-09-15 15:58:00', '2013-09-15 17:26:16', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(50, 'Địa chỉ phòng tranh', '<p>- <strong>Showroom 1:</strong> Số 50, đường Thi&ecirc;n Sơn Tự, TP Tr&agrave; Vinh, tỉnh Tr&agrave; Vinh.</p>\r\n<p>- <strong>Showroom 2:</strong> Số 37, đường C&aacute;ch mạng th&aacute;ng 8, quận 1, TP HCM.</p>', '2013-09-15 17:16:40', '2013-09-15 18:43:12', 8, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(53, 'day nua ne 232323 34234', '<p>hjhjj</p>', '2013-09-15 19:13:13', '2013-12-06 20:30:27', 8, 'hjhjhjhj', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(54, 'Liên kết mạng xã hội', '<p>-Facebook:</p>\r\n<p>-Twitter:</p>\r\n<p>-Youtube:</p>', '2013-09-15 19:14:24', '2013-09-15 19:14:24', 8, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(55, 'Hỗ trợ mua hàng', '<p><strong>-Yahoo:</strong></p>\r\n<p><img src="http://opi.yahoo.com/online?u=quocdunginfo&amp;m=g&amp;t=2" alt="" /></p>\r\n<p><strong><br />-Số điện thoại đặt h&agrave;ng</strong><br />+84 97 999 6 234<br />+84 1689 178 7 235</p>', '2013-09-15 19:14:53', '2013-11-05 18:48:32', 8, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(56, 'Chuẩn bị tinh thần vào đại học', '<p>14h chiều nay, l&atilde;nh đạo tỉnh Hải Dương đ&atilde; triệu tập họp khẩn cấp. Chủ tịch UBND tỉnh Nguyễn Mạnh Hiển cho hay, vụ ch&aacute;y kh&ocirc;ng g&acirc;y thiệt hại về người song t&agrave;i sản thiệt hại ước t&iacute;nh l&ecirc;n tới 500 tỷ đồng, trong đ&oacute; khoảng 100 tỷ l&agrave; cơ sở vật chất, số c&ograve;n lại l&agrave; t&agrave;i sản của c&aacute;c hộ kinh doanh.</p>', '2013-09-15 19:15:17', '2013-12-09 13:25:41', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(58, 'sdsdgsdg', '', '2013-09-16 07:15:19', '2013-12-07 11:45:52', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 2, '', '', 'JHU', 0, 12, 34, 'cm', 3123, 0, 0, 0, 0),
(60, 'bai 1', '', '2013-09-16 16:25:06', '2013-12-09 09:41:32', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]toshiba_lightfield_module_aj201212270055.jpg', 2, '', '', 'RAW60', 0, 0, 0, 'cm', 2000000, 0, 0, 0, 0),
(61, 'bai2', '', '2013-09-16 16:25:24', '2013-12-09 09:35:41', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 2, '', '', 'RAW61', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(63, 'bai 4', '', '2013-09-16 16:25:38', '2013-12-09 09:40:13', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]alo/avarta.jpg', 2, '', '', 'RAW63', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(64, 'bai 5', '<p>Chưa c&oacute; g&igrave; đ&acirc;u mấy th&iacute;m</p>\r\n<p><img src="/cms/application/_static/upload/1blackberry_wallpaper.png" alt="1blackberry_wallpaper" /></p>', '2013-09-16 16:25:46', '2013-12-10 08:19:27', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 2, '', '', 'RAW64', 1, 12, 23, 'inch', 12000, 0, 0, 0, 0),
(65, 'sadsds', '<p>aloajksjkdasd</p>\r\n<p>&nbsp;</p>', '2013-12-07 11:01:45', '2013-12-09 13:47:41', 8, 'ererer', 0, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 2, '', '', 'RAW65', 11, 34, 12, 'cm', 13445, 1, 0, 0, 0),
(74, 'sdfgsdg sg sdf sdg sg sdgf sdg ', '<p>-Triễn l&atilde;m diễn ra từ ng&agrave;y 20-4-2013 đến n&agrave;y 23-4-2013 tại viện đại học Vạn Hạnh.<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<div id="__m_w_ucNavigatorBar19">\r\n<h2>Hoạt động của JUACH</h2>\r\n<h2>TH&Ocirc;NG B&Aacute;O CHƯƠNG TR&Igrave;NH KHAI MẠC TRIỂN L&Atilde;M TRANH</h2>\r\n</div>\r\n<div class="pc_header">\r\n<div>&nbsp;</div>\r\n</div>\r\n<div class="pc_brief">\r\n<div style="margin: 0mm 0mm 0pt; text-align: left;" align="left"><span style="font-size: 12pt; font-family: ''Times New Roman'';">C&ocirc;ng ty Minh Tr&acirc;n - Trường Doanh Thương Tr&iacute; Dũng phối hợp với Bảo t&agrave;ng Chứng t&iacute;ch Chiến tranh v&agrave; Sở Văn H&oacute;a&ndash;Thể Thao&ndash;Du Lịch&nbsp;Tp. HCM tổ chức triển l&atilde;m tranh thiếu nhi với chủ đề:<br />&nbsp;<strong>&ldquo;Chia sẻ với nh&acirc;n d&acirc;n Nhật Bản&nbsp;</strong><strong>sau thảm họa th&aacute;ng 03 năm 2011&rdquo;</strong></span></div>\r\n</div>\r\n<p><span lang="EN-US" style="font-size: 12pt; font-family: ''Times New Roman'';">Triển l&atilde;m sẽ diễn ra từ ng&agrave;y 12/05/2012 đến ng&agrave;y 01/06/2012<br /><em><span lang="EN-US">(Giờ mở cửa tham quan từ 9:00 đến 16:00, từ Thứ Hai đến thứ Bảy trong tuần)</span></em>&nbsp;<br /><br />Đ&acirc;y l&agrave; 50 tranh của c&aacute;c em thiếu nhi được chọn ra sau đợt thi &ldquo;N&eacute;t Vẽ Xanh&rdquo; lần thứ 14 năm 2011 tại Bảo t&agrave;ng Chứng t&iacute;ch Chiến tranh.Bằng những suy nghĩ v&agrave; cảm x&uacute;c ch&acirc;n th&agrave;nh của m&igrave;nh, c&aacute;c em thiếu nhi Tp. HCM lu&ocirc;n mong muốn được thể hiện sự đồng cảm, chia sẻv&agrave; kh&acirc;m phục với thiếu nhi v&agrave; nh&acirc;n d&acirc;n Nhật Bản đ&atilde; phấn đấu vươn l&ecirc;n sau thảm họa.<br /><br />Thời gian: &nbsp;15:00, thứ S&aacute;u ng&agrave;y 11 / 05 / 2012&middot; &nbsp; &nbsp; <br />&nbsp;Địa điểm: &nbsp;Vườn Minh Tr&acirc;n&nbsp; &nbsp; &nbsp;51 Cống Lở, P. 15, Q. T&acirc;n B&igrave;nh, Tp. HCM.(Đ&iacute;nh k&egrave;m sơ đồ đường đi)<br />Ph&iacute; tham dự 200.000 VND/ người.<br /><br /><strong><em><span lang="EN-US">V&igrave;</span></em></strong><strong><span lang="EN-US"> THƯ MỜI </span></strong><strong><em><span lang="EN-US">đặc biệt miễn ph&iacute; tiệc tham dự c&oacute; hạn, xin vui l&ograve;ng li&ecirc;n lạc sớm.</span></em></strong></span></p>', '2013-09-23 18:04:52', '2013-12-06 20:29:21', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]1blackberry_wallpaper.png', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(75, 'moi them vao', '', '2013-10-05 17:09:02', '2013-11-09 07:54:27', 0, '', 1, '', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(106, '', '', '2013-12-07 15:14:39', '2013-12-07 15:14:39', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 65, 1, 109000),
(107, '', '', '2013-12-07 15:14:39', '2013-12-07 15:14:39', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 88, 2, 200000),
(108, '', '', '2013-12-08 14:06:11', '2013-12-08 14:06:11', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 65, 1, 109000),
(109, '', '', '2013-12-08 14:06:11', '2013-12-08 14:06:11', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 88, 2, 200000),
(110, 'Default Template', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(111, 'Dark Style (Default template)', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front_style_2', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(112, '', '', '2013-12-13 16:23:29', '2013-12-13 16:23:29', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 64, 1, 12000),
(113, '', '', '2013-12-13 16:26:31', '2013-12-13 16:26:31', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 64, 1, 12000),
(114, '', '', '2013-12-13 16:31:03', '2013-12-13 16:31:03', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 64, 1, 12000),
(115, '', '', '2013-12-13 16:32:22', '2013-12-13 16:32:22', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 64, 1, 12000),
(117, 'alo', '<p>dfgfgfg</p>', '2013-12-13 16:43:09', '2013-12-13 16:43:09', 0, 'srgdfg', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(118, 'sua', '<p>hjshjdsfd</p>', '2013-12-13 16:47:10', '2013-12-13 16:47:10', 0, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(120, 'kakaka', '', '2013-12-13 16:47:37', '2013-12-13 16:47:37', 9, 'aloha', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]alo/avarta.jpg', 0, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
(122, 'wtf', '<p>sdgdsfgfg</p>', '2013-12-13 16:53:49', '2013-12-15 18:47:48', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 2, '', '', '34', 4, 13, 23, 'inch', 1234, 0, 0, 0, 0),
(123, 'bai 3', '', '2013-12-13 16:54:09', '2013-12-16 04:20:34', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]bb_picture.jpg', 2, '', '', 'RAW62', 0, 0, 0, 'cm', 12000, 0, 0, 0, 0),
(124, '', '', '2013-12-15 14:16:40', '2013-12-15 14:16:40', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 122, 1, 1234),
(125, '', '', '2013-12-15 14:19:43', '2013-12-15 14:19:43', 0, '', 1, '', 4, '', '', '', 0, 0, 0, 'cm', 0, 0, 122, 1, 1234),
(127, 'alo', 'hahaa', '2013-12-15 18:20:33', '2013-12-15 18:20:33', 9, '', 1, '', 1, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0);

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
(1, 40),
(3, 40),
(4, 39),
(7, 24),
(8, 24),
(9, 26),
(38, 51),
(40, 25),
(41, 24),
(42, 24),
(43, 52),
(44, 52),
(47, 52),
(50, 53),
(53, 5),
(53, 24),
(53, 27),
(54, 53),
(55, 53),
(58, 47),
(58, 50),
(60, 48),
(60, 49),
(61, 48),
(61, 49),
(63, 47),
(63, 48),
(63, 49),
(64, 47),
(64, 48),
(64, 50),
(65, 48),
(65, 49),
(74, 26),
(75, 24),
(75, 61),
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
(118, 25),
(118, 26),
(120, 24),
(120, 25),
(122, 47),
(122, 63),
(123, 48),
(123, 49),
(123, 75),
(124, 80),
(125, 81),
(126, 39),
(127, 39);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `birth`, `sex`, `password`, `group_id`, `date_create`, `date_modify`, `email`, `address`, `phone`, `active`, `special`) VALUES
(8, 'quocdunginfo', 'Nguyen Dung2', '0000-00-00 00:00:00', 1, '356a192b7913b04c54574d18c28d46e6395428ab', 2, '0000-00-00 00:00:00', '2013-12-01 18:57:12', 'alo', 'Nguyen Trai', '097852678', 1, 0),
(9, 'admin', 'dung2', '0000-00-00 00:00:00', 1, 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '0000-00-00 00:00:00', '2013-12-15 15:05:01', 'quocdunginfo@gmail.com', '', '', 1, 0),
(11, 'mi', 'Trần Thị Khách Hàng', '0000-00-00 00:00:00', 1, '9c51ad8660eaae45f7965cd83d1f447cf6378547', 2, '2013-12-01 19:01:27', '2013-12-14 18:43:00', 'hellogirl@yahoo.com', 'Trần Phú', '01699969145', 1, 0),
(12, 'hoang', 'Hoàng', '0000-00-00 00:00:00', 1, '356a192b7913b04c54574d18c28d46e6395428ab', 0, '2013-12-14 18:36:09', '2013-12-14 18:57:53', 'h@hjhj.com', 'ádsdsd', '3456789', 0, 1),
(13, 'bekim', 'Xì Kim', '0000-00-00 00:00:00', 1, '479f92cbec6d7b041a874a4b7757c96a50ec1295', 0, '2013-12-15 15:09:28', '2013-12-15 15:18:19', 'alo@gmail.com.vn', 'jk', 'al', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
