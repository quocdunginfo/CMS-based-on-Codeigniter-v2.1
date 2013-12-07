-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2013 at 03:52 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `parent_id`, `date_create`, `date_modify`, `active`, `special`, `order_total`, `order_status`, `order_online_payment`, `order_user_id`, `order_customer_user_id`) VALUES
(1, 'Nokia', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(4, 'Samsung', '', 3, '2013-08-28 00:00:00', '2013-08-15 00:00:00', 1, 0, 0, '', 1, 0, 0),
(5, 'Laptop', '', -1, '2013-08-22 00:00:00', '2013-08-17 00:00:00', 1, 0, 0, '', 1, 0, 0),
(24, 'Dell', '', 5, '0000-00-00 00:00:00', '2013-12-01 15:46:27', 1, 0, 0, '', 1, 0, 0),
(25, 'Vaio', '', 5, '0000-00-00 00:00:00', '2013-11-28 09:10:37', 1, 0, 0, '', 1, 0, 0),
(26, 'Macbook', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(27, 'Lenovo', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(28, 'HTC', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(29, 'Mobell', '', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(30, 'Samsung', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(31, 'Main menu', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(34, 'Submenu2333', '', 31, '0000-00-00 00:00:00', '2013-11-05 19:15:06', 1, 1, 0, '', 1, 0, 0),
(35, 'Submenu3', '', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(36, 'Submenu31', '', 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(39, 'feedback', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(40, 'Slider for home page2', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(47, 'Trừu tượng2', '', -1, '0000-00-00 00:00:00', '2013-12-02 06:54:21', 1, 2, 0, '', 1, 0, 0),
(48, 'Khỏa thân', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 0, '', 1, 0, 0),
(49, 'vai2', '', -1, '0000-00-00 00:00:00', '2013-12-07 11:47:28', 1, 3, 0, '', 1, 0, 0),
(50, 'giay', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 0, '', 1, 0, 0),
(51, 'About page', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(52, 'Homepage''s 6 widgets', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(53, 'Homepage''s footer widget', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0, '', 1, 0, 0),
(61, 'cuoc song 22', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', 1, 0, 0),
(63, 'gach', '', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 0, '', 1, 0, 0),
(73, '', '', 0, '2013-12-07 15:14:39', '2013-12-07 15:14:39', 1, 5, 509000, 'chualienlac', 1, 9, 11);

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
  `controller` text NOT NULL,
  `action` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

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
(25, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

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
(9, 'cat_view'),
(10, 'cat_edit'),
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
(26, 'media_add');

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
(26, 1);

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
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal post, 1: special post, 2: painting post, 3: menuitem, 4: order_detail',
  `url` text NOT NULL,
  `art_id` text NOT NULL,
  `art_width` int(11) NOT NULL DEFAULT '0',
  `art_height` int(11) NOT NULL DEFAULT '0',
  `art_sizeunit` varchar(4) NOT NULL DEFAULT 'cm' COMMENT 'm, cm, inch, mm',
  `art_price` text NOT NULL COMMENT 'VND only',
  `art_sold` int(11) NOT NULL DEFAULT '0',
  `menuitem_parent_id` int(11) NOT NULL DEFAULT '0',
  `menuitem_order` int(11) NOT NULL DEFAULT '0',
  `order_product_id` int(11) NOT NULL DEFAULT '0',
  `order_count` int(11) NOT NULL DEFAULT '0',
  `order_unitprice` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `url`, `art_id`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `menuitem_parent_id`, `menuitem_order`, `order_product_id`, `order_count`, `order_unitprice`) VALUES
(1, 'Slider11456', '<p>alo1235</p>', '2013-09-05 14:52:19', '2013-09-15 19:19:16', 8, 'alo1234', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, '', '', 300, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(3, 'slider2', '<p>wtf</p>', '2013-09-05 15:21:07', '2013-09-15 19:19:39', 8, 'Cuoojc doi quanh hieu', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(4, 'feedback', '', '2013-09-05 15:36:33', '2013-09-08 19:25:19', 8, '', 1, '', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(7, 'what', '', '2013-09-06 12:47:32', '2013-09-16 15:58:05', 8, '', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(8, 'day ne', '', '2013-09-06 12:47:47', '2013-09-16 15:56:45', 8, '', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(9, 'hajshjdhahsudasdsad', '', '2013-09-06 12:48:24', '2013-09-06 14:40:03', 8, '', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(38, 'About me', '<p>Giới thiệu về bản th&acirc;n ở đ&acirc;y</p>', '2013-09-14 12:46:19', '2013-09-14 12:46:19', 8, 'Chưa có', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(40, 'sdfsdfsdf', '', '2013-09-14 14:00:25', '2013-09-14 14:00:25', 8, 'sdfsdfsdfsdf', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(41, 'ertret', '<p>ertertrt</p>', '2013-09-14 14:00:35', '2013-09-14 14:00:35', 8, 'ertertert', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(42, 'rtyr', '', '2013-09-14 14:10:28', '2013-09-15 15:44:24', 8, 'ytryrtytr', 1, '', 0, 'df', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(43, 'Tranh vẽ trên lá chuối', '<p class="Normal" style="font-size: 16px;">Trưa 15/9, gần 12 tiếng sau khi ngọn lửa b&ugrave;ng ph&aacute;t, lực lượng chữa ch&aacute;y đ&atilde; cơ bản khống chế được hỏa hoạn<span style="font-size: 11.8pt;"> tại </span>Trung t&acirc;m Thương mại TP Hải Dương.<span style="font-size: 11.8pt;"> Tuy nhi&ecirc;n kh&oacute;i vẫn bốc m&ugrave; mịt, hơi n&oacute;ng ng&ugrave;n ngụt c&ugrave;ng c&aacute;c mảnh vỡ từ trần trong c&aacute;c kiot tiếp tục rơi.<br /></span></p>', '2013-09-15 15:20:38', '2013-09-15 15:39:20', 8, 'Mo ta tai day', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_044.jpg', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(44, 'Day nua ne', '<p>day nua ne ba con</p>', '2013-09-15 15:25:36', '2013-09-15 15:44:52', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, 'http://google.com', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(47, 'sdadsad', '', '2013-09-15 15:58:00', '2013-09-15 17:26:16', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(50, 'Địa chỉ phòng tranh', '<p>- <strong>Showroom 1:</strong> Số 50, đường Thi&ecirc;n Sơn Tự, TP Tr&agrave; Vinh, tỉnh Tr&agrave; Vinh.</p>\r\n<p>- <strong>Showroom 2:</strong> Số 37, đường C&aacute;ch mạng th&aacute;ng 8, quận 1, TP HCM.</p>', '2013-09-15 17:16:40', '2013-09-15 18:43:12', 8, '', 1, '', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(53, 'day nua ne 232323 34234', '<p>hjhjj</p>', '2013-09-15 19:13:13', '2013-12-06 20:30:27', 8, 'hjhjhjhj', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(54, 'Liên kết mạng xã hội', '<p>-Facebook:</p>\r\n<p>-Twitter:</p>\r\n<p>-Youtube:</p>', '2013-09-15 19:14:24', '2013-09-15 19:14:24', 8, '', 1, '', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(55, 'Hỗ trợ mua hàng', '<p><strong>-Yahoo:</strong></p>\r\n<p><img src="http://opi.yahoo.com/online?u=quocdunginfo&amp;m=g&amp;t=2" alt="" /></p>\r\n<p><strong><br />-Số điện thoại đặt h&agrave;ng</strong><br />+84 97 999 6 234<br />+84 1689 178 7 235</p>', '2013-09-15 19:14:53', '2013-11-05 18:48:32', 8, '', 1, '', 1, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(56, 'Chuẩn bị tinh thần vào đại học', '<p>14h chiều nay, l&atilde;nh đạo tỉnh Hải Dương đ&atilde; triệu tập họp khẩn cấp. Chủ tịch UBND tỉnh Nguyễn Mạnh Hiển cho hay, vụ ch&aacute;y kh&ocirc;ng g&acirc;y thiệt hại về người song t&agrave;i sản thiệt hại ước t&iacute;nh l&ecirc;n tới 500 tỷ đồng, trong đ&oacute; khoảng 100 tỷ l&agrave; cơ sở vật chất, số c&ograve;n lại l&agrave; t&agrave;i sản của c&aacute;c hộ kinh doanh.</p>', '2013-09-15 19:15:17', '2013-12-07 14:59:09', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, 'http://yahoo.com.vn', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(58, 'sdsdgsdg', '', '2013-09-16 07:15:19', '2013-12-07 11:45:52', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 2, '', 'JHU', 12, 34, 'cm', '3123', 0, 0, 0, 0, 0, 0),
(60, 'bai 1', '', '2013-09-16 16:25:06', '2013-09-23 17:39:08', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]toshiba_lightfield_module_aj201212270055.jpg', 2, '', 'RAW60', 0, 0, 'cm', '0', 0, 0, 0, 0, 0, 0),
(61, 'bai2', '', '2013-09-16 16:25:24', '2013-09-16 16:25:24', 8, '', 1, '', 2, '', '', 0, 0, 'cm', '0', 0, 0, 0, 0, 0, 0),
(62, 'bai 3', '', '2013-09-16 16:25:30', '2013-09-16 16:25:30', 8, '', 1, '', 2, '', '', 0, 0, 'cm', '0', 0, 0, 0, 0, 0, 0),
(63, 'bai 4', '', '2013-09-16 16:25:38', '2013-09-23 16:45:25', 8, '', 1, '', 2, '', 'RAW63', 0, 0, 'cm', '0', 0, 0, 0, 0, 0, 0),
(64, 'bai 5', '', '2013-09-16 16:25:46', '2013-09-16 16:25:46', 8, '', 1, '', 2, '', '', 0, 0, 'cm', '0', 0, 0, 0, 0, 0, 0),
(65, 'sadsds', '<p>aloajksjkdasd</p>\r\n<p>&nbsp;</p>', '2013-12-07 11:01:45', '2013-12-07 11:22:17', 8, 'ererer', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 2, '', 'RAW65', 34, 12, 'cm', '13445', 1, 0, 0, 0, 0, 0),
(74, 'sdfgsdg sg sdf sdg sg sdgf sdg ', '<p>-Triễn l&atilde;m diễn ra từ ng&agrave;y 20-4-2013 đến n&agrave;y 23-4-2013 tại viện đại học Vạn Hạnh.<br /><br /></p>\r\n<p>&nbsp;</p>\r\n<div id="__m_w_ucNavigatorBar19">\r\n<h2>Hoạt động của JUACH</h2>\r\n<h2>TH&Ocirc;NG B&Aacute;O CHƯƠNG TR&Igrave;NH KHAI MẠC TRIỂN L&Atilde;M TRANH</h2>\r\n</div>\r\n<div class="pc_header">\r\n<div>&nbsp;</div>\r\n</div>\r\n<div class="pc_brief">\r\n<div style="margin: 0mm 0mm 0pt; text-align: left;" align="left"><span style="font-size: 12pt; font-family: ''Times New Roman'';">C&ocirc;ng ty Minh Tr&acirc;n - Trường Doanh Thương Tr&iacute; Dũng phối hợp với Bảo t&agrave;ng Chứng t&iacute;ch Chiến tranh v&agrave; Sở Văn H&oacute;a&ndash;Thể Thao&ndash;Du Lịch&nbsp;Tp. HCM tổ chức triển l&atilde;m tranh thiếu nhi với chủ đề:<br />&nbsp;<strong>&ldquo;Chia sẻ với nh&acirc;n d&acirc;n Nhật Bản&nbsp;</strong><strong>sau thảm họa th&aacute;ng 03 năm 2011&rdquo;</strong></span></div>\r\n</div>\r\n<p><span lang="EN-US" style="font-size: 12pt; font-family: ''Times New Roman'';">Triển l&atilde;m sẽ diễn ra từ ng&agrave;y 12/05/2012 đến ng&agrave;y 01/06/2012<br /><em><span lang="EN-US">(Giờ mở cửa tham quan từ 9:00 đến 16:00, từ Thứ Hai đến thứ Bảy trong tuần)</span></em>&nbsp;<br /><br />Đ&acirc;y l&agrave; 50 tranh của c&aacute;c em thiếu nhi được chọn ra sau đợt thi &ldquo;N&eacute;t Vẽ Xanh&rdquo; lần thứ 14 năm 2011 tại Bảo t&agrave;ng Chứng t&iacute;ch Chiến tranh.Bằng những suy nghĩ v&agrave; cảm x&uacute;c ch&acirc;n th&agrave;nh của m&igrave;nh, c&aacute;c em thiếu nhi Tp. HCM lu&ocirc;n mong muốn được thể hiện sự đồng cảm, chia sẻv&agrave; kh&acirc;m phục với thiếu nhi v&agrave; nh&acirc;n d&acirc;n Nhật Bản đ&atilde; phấn đấu vươn l&ecirc;n sau thảm họa.<br /><br />Thời gian: &nbsp;15:00, thứ S&aacute;u ng&agrave;y 11 / 05 / 2012&middot; &nbsp; &nbsp; <br />&nbsp;Địa điểm: &nbsp;Vườn Minh Tr&acirc;n&nbsp; &nbsp; &nbsp;51 Cống Lở, P. 15, Q. T&acirc;n B&igrave;nh, Tp. HCM.(Đ&iacute;nh k&egrave;m sơ đồ đường đi)<br />Ph&iacute; tham dự 200.000 VND/ người.<br /><br /><strong><em><span lang="EN-US">V&igrave;</span></em></strong><strong><span lang="EN-US"> THƯ MỜI </span></strong><strong><em><span lang="EN-US">đặc biệt miễn ph&iacute; tiệc tham dự c&oacute; hạn, xin vui l&ograve;ng li&ecirc;n lạc sớm.</span></em></strong></span></p>', '2013-09-23 18:04:52', '2013-12-06 20:29:21', 8, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]1blackberry_wallpaper.png', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(75, 'moi them vao', '', '2013-10-05 17:09:02', '2013-11-09 07:54:27', 0, '', 1, '', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(79, 'sua', '<p>hjshjdsfd</p>', '2013-12-06 20:26:26', '2013-12-06 20:37:35', 0, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(80, 'kakaka', '', '2013-12-06 20:38:42', '2013-12-06 20:40:17', 9, 'aloha', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]alo/avarta.jpg', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(87, 'alo', '<p>dfgfgfg</p>', '2013-12-07 11:14:44', '2013-12-07 11:14:44', 9, 'srgdfg', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 0, '', '', 0, 0, 'cm', '', 0, 0, 0, 0, 0, 0),
(88, 'wtf', '<p>sdgdsfgfg</p>', '2013-12-07 11:18:24', '2013-12-07 11:20:06', 9, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]bb_picture.jpg', 2, '', '34', 13, 23, 'inch', '1234', 0, 0, 0, 0, 0, 0),
(106, '', '', '2013-12-07 15:14:39', '2013-12-07 15:14:39', 0, '', 1, '', 4, '', '', 0, 0, 'cm', '', 0, 0, 0, 65, 1, 109000),
(107, '', '', '2013-12-07 15:14:39', '2013-12-07 15:14:39', 0, '', 1, '', 4, '', '', 0, 0, 'cm', '', 0, 0, 0, 88, 2, 200000);

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
(56, 26),
(58, 47),
(58, 50),
(60, 48),
(60, 49),
(61, 48),
(61, 49),
(62, 48),
(62, 49),
(63, 47),
(63, 48),
(63, 49),
(64, 48),
(64, 49),
(65, 48),
(65, 49),
(74, 26),
(75, 24),
(75, 61),
(79, 25),
(79, 26),
(87, 5),
(87, 24),
(88, 47),
(88, 63),
(92, 64),
(95, 64),
(106, 73),
(107, 73);

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
  `active` int(11) NOT NULL DEFAULT '1',
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: manager, 1: customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `birth`, `sex`, `password`, `group_id`, `date_create`, `date_modify`, `email`, `active`, `special`) VALUES
(8, 'quocdunginfo', 'Nguyen Dung2', '0000-00-00 00:00:00', 1, '356a192b7913b04c54574d18c28d46e6395428ab', 2, '0000-00-00 00:00:00', '2013-12-01 18:57:12', 'alo', 1, 0),
(9, 'admin', 'Quarn trij2222', '0000-00-00 00:00:00', 1, 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '0000-00-00 00:00:00', '2013-12-01 19:37:33', 'quocdunginfo@gmai.com', 1, 0),
(11, 'mi', 'mi', '0000-00-00 00:00:00', 1, '9c51ad8660eaae45f7965cd83d1f447cf6378547', 2, '2013-12-01 19:01:27', '2013-12-01 19:01:27', 'mi', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
