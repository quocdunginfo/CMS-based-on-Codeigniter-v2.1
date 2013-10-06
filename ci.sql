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
-- Database: `ci`
--
CREATE DATABASE IF NOT EXISTS `ci` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ci`;

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
  `special` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `date_create`, `date_modify`, `active`, `special`) VALUES
(1, 'Nokia', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(3, 'Điện thoại di động', -1, '2013-08-13 00:00:00', '2013-08-22 00:00:00', 1, 0),
(4, 'Samsung', 3, '2013-08-28 00:00:00', '2013-08-15 00:00:00', 1, 0),
(5, 'Laptop', -1, '2013-08-22 00:00:00', '2013-08-17 00:00:00', 1, 0),
(14, 'Slider for home page', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(15, 'Featured Post', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(16, 'Users Feedback', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
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
(38, 'thể loại tranh 2', -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_id` bigint(20) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `guest_name` text NOT NULL,
  `guest_email` text NOT NULL,
  `guest_ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `post_id`, `active`, `guest_name`, `guest_email`, `guest_ip`) VALUES
(5, '', 'hehehe', '2013-09-03 16:42:03', '2013-09-03 16:42:03', 0, 38, 1, 'quocdunginfo', 'quocdunginfo@gmail.com', '::1'),
(7, '', 'khùng chết nhỏ đi mầy ', '2013-09-03 17:04:31', '2013-09-03 17:04:31', 0, 38, 1, 'dung', 'q', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `key`, `value`) VALUES
(2, 'cache_time', '0'),
(3, 'slider_category', '14'),
(4, 'feature_category', '15'),
(5, 'feedback_category', '16'),
(6, 'slider_auto_scroll_time', '5'),
(7, 'menu_categories_category', '5'),
(8, 'menu_latest_category', '-1'),
(9, 'allow_guest_post_feedback', '1');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content_lite` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `avatar` text NOT NULL,
  `special` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`) VALUES
(28, 'Slider 1', '<p>noi dung</p>', '0000-00-00 00:00:00', '2013-08-29 18:27:47', 1, 'Noi dung slider 1', 1, 'http://viewallpaper.com/wp-content/uploads/2013/07/Images-Water-Wallpaper.jpg', 1),
(29, 'Slider 2', '', '0000-00-00 00:00:00', '2013-08-29 18:01:37', 1, 'Noi dung slider 2', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]2-1104041036080-l.jpg', 1),
(30, 'Slider 3', '', '0000-00-00 00:00:00', '2013-08-29 18:28:53', 1, 'Em nó nóng bỏng quá. Làm sao giờ ta.', 1, 'http://www.gettyimages.co.uk/CMS/StaticContent/1365074401896_Justin-Case-1.jpg', 1),
(34, 'Lenovo B450 2', '<p><img src="http://www.laptopspec.net/wp-content/uploads/2009/11/Lenovo-B450-14.1-Inch-Laptop-01.jpg" alt="none" width="477" height="342" /></p>\r\n<p>-Gi&aacute; qu&aacute; rẻ lu&ocirc;n</p>', '2013-08-29 06:51:42', '2013-08-31 19:15:21', 1, 'Laptop cấu hình mạnh mẽ giá rẻ bất ngờ', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]2-1104041036080-l.jpg', 0),
(37, 'Lần đầu tiên viết bài viết', '<p>Lần đầu ti&ecirc;n em đi học. M&aacute; dắt tay tới trường</p>\r\n<p><img src="[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]blackberry_bold_wallpaper_002879_2879.jpg" alt="blackberry_bold_wallpaper_002879_2879" width="200" /></p>', '2013-08-29 18:39:04', '2013-08-31 19:15:11', 1, '', 1, '[quocdunginfo-tinymce-upload-prefix-es654298hcngdhte5lmvnhfuyt]2-1104041036080-l.jpg', 0),
(38, 'User''s feedback', '<p>none</p>', '0000-00-00 00:00:00', '2013-09-03 15:45:48', 0, 'none', 1, '', 1),
(39, 'day ne cac cu', '', '0000-00-00 00:00:00', '2013-09-05 08:00:56', 0, '', 1, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=360 ;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `cat_id`) VALUES
(340, 29, 14),
(344, 28, 14),
(345, 30, 14),
(356, 37, 30),
(357, 34, 27),
(358, 38, 16),
(359, 39, 38);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `birth`, `sex`, `password`, `group_id`, `date_create`, `date_modify`, `email`, `active`) VALUES
(1, 'admin', 'Quản trị viên', '2013-08-14 00:00:00', 1, 'admin', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'quocdunginfo@gmail.com', 1),
(2, 'quocdunginfo', 'Nguyễn Dũng', '2013-08-29 00:00:00', 1, '123456', 1, '2013-08-29 00:00:00', '2013-08-24 00:00:00', 'quocdunginfo@yahoo.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
