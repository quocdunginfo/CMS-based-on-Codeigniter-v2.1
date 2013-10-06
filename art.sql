-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2013 at 07:46 PM
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
-- CREATE DATABASE IF NOT EXISTS `art` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `art`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '1',
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal cat, 1: system cat, 2: thể loại tranh, 3: chất liệu tranh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `date_create`, `date_modify`, `active`, `special`) VALUES
(1, 'Nokia', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 'Samsung', 3, '2013-08-28 00:00:00', '2013-08-15 00:00:00', 1, 0),
(5, 'Laptop', -1, '2013-08-22 00:00:00', '2013-08-17 00:00:00', 1, 0),
(24, 'Dell', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(25, 'Vaio', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(26, 'Macbook', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(27, 'Lenovo', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(28, 'HTC', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(29, 'Mobell', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(30, 'Samsung', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(31, 'Main menu', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(32, 'Submenu1', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(34, 'Submenu2', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(35, 'Submenu3', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(36, 'Submenu31', 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(37, 'Submenu32', 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(39, 'feedback', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(40, 'Slider for home page', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(47, 'truu tuong', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2),
(48, 'khoa than', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2),
(49, 'vai', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3),
(50, 'giay', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3),
(51, 'About page', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(52, 'Homepage''s 6 widgets', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(53, 'Homepage''s footer widget', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `post_id`, `active`, `guest_name`, `guest_email`, `guest_ip`) VALUES
(1, '', 'wtf', '2013-09-05 15:32:25', '2013-09-05 15:32:25', 0, 0, 1, 'wtf', 'wtf', '::1'),
(2, '', 'wtf', '2013-09-05 15:35:09', '2013-09-05 15:35:09', 0, 0, 1, 'wtf', 'wtf', '::1'),
(3, '', 'rwerwerer', '2013-09-05 15:40:20', '2013-09-05 15:40:20', 0, 4, 1, 'ewrew', 'rwerwe', '::1'),
(4, '', 'rwerwerer', '2013-09-05 15:41:48', '2013-09-05 15:41:48', 0, 4, 1, 'ewrew', 'rwerwe', '::1'),
(5, '', 'rwerwerer', '2013-09-05 15:44:26', '2013-09-05 15:44:26', 0, 4, 1, 'ewrew', 'rwerwe', '::1'),
(6, '', 'ewqewqe', '2013-09-06 12:30:05', '2013-09-06 12:30:05', 0, 4, 1, 'qwqewq', 'ewqewq', '::1'),
(7, '', 'oh shit', '2013-09-14 13:23:53', '2013-09-14 13:23:53', 0, 4, 1, 'Olalala', 'q@gmail.com', '::1'),
(8, '', 'jhaushfusfdf', '2013-09-14 13:25:31', '2013-09-14 13:25:31', 0, 4, 1, 'khung', 'q@y.com', '::1'),
(9, '', 'jhaushfusfdf', '2013-09-14 13:26:08', '2013-09-14 13:26:08', 0, 4, 1, 'khung', 'q@y.com', '::1'),
(10, '', 'jhaushfusfdf', '2013-09-14 13:26:20', '2013-09-14 13:26:20', 0, 4, 1, 'khung', 'q@y.com', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

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
(9, 'allow_guest_post_feedback', '1'),
(10, 'maintain_mode', '0'),
(11, 'menu_about_category', '51'),
(12, 'homepage_widget_category', '52'),
(13, 'homepage_footer_widget_category', '53'),
(14, 'html_footer_left', 'by Nhạn Trắng'),
(15, 'html_footer_right', 'Contact at nhantrang.tv@gmail.com'),
(16, 'html_title', 'Nhạn trắng'),
(17, 'html_seo_keyword', 'nhan trang, phong tranh, ban tranh, gia re, tra vinh, ...'),
(18, 'html_seo_author', 'quocdunginfo - quocdunginfo@gmail.com - http://quocdung.net - 0979996234'),
(19, 'html_seo_description', 'Website chuyên bán tranh có sẵn hoặc theo nhu cầu khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_id` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content_lite` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `avatar` text NOT NULL,
  `special` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal post, 1: special post for other function like images slider, 2: painting image',
  `art_width` int(11) NOT NULL DEFAULT '0',
  `art_height` int(11) NOT NULL DEFAULT '0',
  `art_sizeunit` varchar(4) NOT NULL DEFAULT 'cm' COMMENT 'm, cm, inch, mm',
  `art_price` text NOT NULL COMMENT 'VND only',
  `art_sold` int(11) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `art_id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `url`) VALUES
(1, '', 'Slider11456', '<p>alo1235</p>', '2013-09-05 14:52:19', '2013-09-15 19:19:16', 1, 'alo1234', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, 0, 0, 'cm', '', 0, ''),
(3, '', 'slider2', '<p>wtf</p>', '2013-09-05 15:21:07', '2013-09-15 19:19:39', 1, 'Cuoojc doi quanh hieu', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, 0, 0, 'cm', '', 0, ''),
(4, '', 'feedback', '', '2013-09-05 15:36:33', '2013-09-08 19:25:19', 1, '', 1, '', 1, 0, 0, 'cm', '', 0, ''),
(7, '', 'what', '', '2013-09-06 12:47:32', '2013-09-06 12:47:57', 1, '', 1, '', 0, 0, 0, 'cm', '', 0, ''),
(8, '', 'day ne', '', '2013-09-06 12:47:47', '2013-09-06 12:47:47', 1, '', 1, '', 0, 0, 0, 'cm', '', 0, ''),
(9, '', 'hajshjdhahsudasdsad', '', '2013-09-06 12:48:24', '2013-09-06 14:40:03', 1, '', 1, '', 0, 0, 0, 'cm', '', 0, ''),
(37, 'RAW[37]', 'sdsdgsdg', '', '2013-09-14 12:35:08', '2013-09-14 12:37:08', 1, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 2, 0, 0, 'cm', '3123', 0, ''),
(38, '', 'About me', '<p>Giới thiệu về bản th&acirc;n ở đ&acirc;y</p>', '2013-09-14 12:46:19', '2013-09-14 12:46:19', 1, 'Chưa có', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file51.jpg', 1, 0, 0, 'cm', '', 0, ''),
(40, '', 'sdfsdfsdf', '', '2013-09-14 14:00:25', '2013-09-14 14:00:25', 1, 'sdfsdfsdfsdf', 1, '', 0, 0, 0, 'cm', '', 0, ''),
(41, '', 'ertret', '<p>ertertrt</p>', '2013-09-14 14:00:35', '2013-09-14 14:00:35', 1, 'ertertert', 1, '', 0, 0, 0, 'cm', '', 0, ''),
(42, '', 'rtyr', '', '2013-09-14 14:10:28', '2013-09-15 15:44:24', 1, 'ytryrtytr', 1, '', 0, 0, 0, 'cm', '', 0, 'df'),
(43, '', 'Tranh vẽ trên lá chuối', '<p class="Normal" style="font-size: 16px;">Trưa 15/9, gần 12 tiếng sau khi ngọn lửa b&ugrave;ng ph&aacute;t, lực lượng chữa ch&aacute;y đ&atilde; cơ bản khống chế được hỏa hoạn<span style="font-size: 11.8pt;"> tại </span>Trung t&acirc;m Thương mại TP Hải Dương.<span style="font-size: 11.8pt;"> Tuy nhi&ecirc;n kh&oacute;i vẫn bốc m&ugrave; mịt, hơi n&oacute;ng ng&ugrave;n ngụt c&ugrave;ng c&aacute;c mảnh vỡ từ trần trong c&aacute;c kiot tiếp tục rơi.<br /></span></p>', '2013-09-15 15:20:38', '2013-09-15 15:39:20', 1, 'Mo ta tai day', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_044.jpg', 1, 0, 0, 'cm', '', 0, ''),
(44, '', 'Day nua ne', '<p>day nua ne ba con</p>', '2013-09-15 15:25:36', '2013-09-15 15:44:52', 1, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, 0, 0, 'cm', '', 0, 'http://google.com'),
(47, '', 'sdadsad', '', '2013-09-15 15:58:00', '2013-09-15 17:26:16', 1, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]windows_8_wallpaper_download_metro20.jpg', 1, 0, 0, 'cm', '', 0, ''),
(50, '', 'Địa chỉ phòng tranh', '<p>- <strong>Showroom 1:</strong> Số 50, đường Thi&ecirc;n Sơn Tự, TP Tr&agrave; Vinh, tỉnh Tr&agrave; Vinh.</p>\r\n<p>- <strong>Showroom 2:</strong> Số 37, đường C&aacute;ch mạng th&aacute;ng 8, quận 1, TP HCM.</p>', '2013-09-15 17:16:40', '2013-09-15 18:43:12', 1, '', 1, '', 1, 0, 0, 'cm', '', 0, ''),
(53, '', 'day nua ne 232323 34234', '<p>hjhjj</p>', '2013-09-15 19:13:13', '2013-09-15 19:13:13', 1, 'hjhjhjhj', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]xuan_035.jpg', 0, 0, 0, 'cm', '', 0, ''),
(54, '', 'Liên kết mạng xã hội', '<p>-Facebook:</p>\r\n<p>-Twitter:</p>\r\n<p>-Youtube:</p>', '2013-09-15 19:14:24', '2013-09-15 19:14:24', 1, '', 1, '', 1, 0, 0, 'cm', '', 0, ''),
(55, '', 'Hỗ trợ mua hàng', '<p><strong>-Yahoo:</strong></p>\r\n<p><img src="http://opi.yahoo.com/online?u=quocdunginfo&amp;m=g&amp;t=2" alt="" /></p>\r\n<p><strong><br />-Số điện thoại đặt h&agrave;ng</strong><br />+84 97 999 6 234<br />+84 1689 178 7 235</p>', '2013-09-15 19:14:53', '2013-09-15 19:14:53', 1, '', 1, '', 1, 0, 0, 'cm', '', 0, ''),
(56, '', 'Chuẩn bị tinh thần vào đại học', '<p>14h chiều nay, l&atilde;nh đạo tỉnh Hải Dương đ&atilde; triệu tập họp khẩn cấp. Chủ tịch UBND tỉnh Nguyễn Mạnh Hiển cho hay, vụ ch&aacute;y kh&ocirc;ng g&acirc;y thiệt hại về người song t&agrave;i sản thiệt hại ước t&iacute;nh l&ecirc;n tới 500 tỷ đồng, trong đ&oacute; khoảng 100 tỷ l&agrave; cơ sở vật chất, số c&ograve;n lại l&agrave; t&agrave;i sản của c&aacute;c hộ kinh doanh.</p>', '2013-09-15 19:15:17', '2013-09-15 19:15:17', 1, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]file30.jpg', 1, 0, 0, 'cm', '', 0, 'http://yahoo.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=683 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `cat_id`) VALUES
(370, 8, 1),
(371, 7, 29),
(375, 9, 26),
(386, 4, 39),
(633, 37, 48),
(634, 37, 49),
(635, 38, 51),
(639, 40, 25),
(640, 41, 24),
(645, 43, 52),
(647, 42, 24),
(648, 44, 52),
(668, 47, 52),
(673, 50, 53),
(676, 53, 27),
(677, 54, 53),
(678, 55, 53),
(679, 56, 52),
(681, 1, 40),
(682, 3, 40);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `birth`, `sex`, `password`, `group_id`, `date_create`, `date_modify`, `email`, `active`) VALUES
(1, 'admin', 'Quản trị viên', '2013-08-14 00:00:00', 1, 'admin', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'quocdunginfo@gmail.com', 1),
(2, 'quocdunginfo', 'Nguyễn Dũng', '2013-08-29 00:00:00', 1, '12', 1, '2013-08-29 00:00:00', '0000-00-00 00:00:00', 'quocdunginfo@yahoo.com', 1),
(3, 'guest', 'Guest user', '0000-00-00 00:00:00', 1, '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
