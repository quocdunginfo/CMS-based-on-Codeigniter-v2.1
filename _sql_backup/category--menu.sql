-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 04:45 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `parent_id`, `date_create`, `date_modify`, `active`, `rank`, `special`, `order_total`, `order_status`, `order_online_payment`, `order_user_id`, `order_customer_user_id`, `order_rc_address`, `order_rc_phone`, `order_rc_fullname`, `order_shippingfee_id`, `menu_provider_id`, `menu_param`) VALUES
(98, 'Menu & Modules', '', 96, '2013-12-20 10:26:39', '2013-12-20 13:48:04', 1, 114, 4, 0, '', 1, 0, 0, '', '', '', 0, 38, ''),
(99, 'Categories', '', 96, '2013-12-20 10:27:02', '2013-12-20 11:04:28', 1, 98, 4, 0, '', 1, 0, 0, '', '', '', 0, 34, ''),
(100, '[Normal]', '', 99, '2013-12-20 10:27:26', '2013-12-20 10:27:26', 1, 100, 4, 0, '', 1, 0, 0, '', '', '', 0, 16, ''),
(101, '[System]', '', 99, '2013-12-20 10:27:39', '2013-12-20 11:34:20', 1, 101, 4, 0, '', 1, 0, 0, '', '', '', 0, 17, ''),
(102, '[Painting]', '', 99, '2013-12-20 10:28:01', '2013-12-20 10:28:01', 1, 102, 4, 0, '', 1, 0, 0, '', '', '', 0, 18, ''),
(103, '[Material]', '', 99, '2013-12-20 10:28:21', '2013-12-20 10:28:21', 1, 103, 4, 0, '', 1, 0, 0, '', '', '', 0, 19, ''),
(104, '[Static page]', '', 99, '2013-12-20 10:28:40', '2013-12-20 10:28:40', 1, 104, 4, 0, '', 1, 0, 0, '', '', '', 0, 20, ''),
(105, 'Posts', '', 96, '2013-12-20 10:29:00', '2013-12-20 11:57:47', 1, 99, 4, 0, '', 1, 0, 0, '', '', '', 0, 35, ''),
(109, 'Orders', '', 96, '2013-12-20 10:30:24', '2013-12-20 10:30:41', 1, 105, 4, 0, '', 1, 0, 0, '', '', '', 0, 25, ''),
(113, 'Groups', '', 96, '2013-12-20 10:31:52', '2013-12-20 10:31:52', 1, 113, 4, 0, '', 1, 0, 0, '', '', '', 0, 28, ''),
(114, 'Setting', '', 96, '2013-12-20 10:32:24', '2013-12-20 11:48:24', 1, 118, 4, 0, '', 1, 0, 0, '', '', '', 0, 37, ''),
(115, '[Common setting]', '', 114, '2013-12-20 10:32:40', '2013-12-20 12:58:26', 1, 115, 4, 0, '', 1, 0, 0, '', '', '', 0, 29, ''),
(116, '[Components & Templates]', '', 114, '2013-12-20 10:33:01', '2013-12-22 03:42:01', 1, 116, 4, 0, '', 1, 0, 0, '', '', '', 0, 30, ''),
(117, '[Antivirus]', '', 114, '2013-12-20 10:33:24', '2013-12-20 10:33:24', 1, 117, 4, 0, '', 1, 0, 0, '', '', '', 0, 31, ''),
(118, 'Media', '', 96, '2013-12-20 10:34:01', '2013-12-20 10:34:01', 1, 119, 4, 0, '', 1, 0, 0, '', '', '', 0, 32, ''),
(119, 'Users', '', 96, '2013-12-20 12:01:02', '2013-12-20 12:01:32', 1, 109, 4, 0, '', 1, 0, 0, '', '', '', 0, 36, ''),
(120, '[Manager]', '', 119, '2013-12-20 12:02:19', '2013-12-20 12:02:19', 1, 120, 4, 0, '', 1, 0, 0, '', '', '', 0, 26, ''),
(122, 'Giới thiệu', '', 82, '2013-12-20 12:28:21', '2013-12-20 12:32:09', 1, 94, 4, 0, '', 1, 0, 0, '', '', '', 0, 13, '132'),
(123, '[Static page]', '', 105, '2013-12-20 12:28:55', '2013-12-20 12:28:55', 1, 126, 4, 0, '', 1, 0, 0, '', '', '', 0, 24, ''),
(124, '[Normal]', '', 105, '2013-12-20 13:43:52', '2013-12-20 13:43:52', 1, 123, 4, 0, '', 1, 0, 0, '', '', '', 0, 21, ''),
(125, '[Painting]', '', 105, '2013-12-20 13:44:12', '2013-12-20 13:49:45', 1, 125, 4, 0, '', 1, 0, 0, '', '', '', 0, 23, ''),
(126, '[System]', '', 105, '2013-12-20 13:44:48', '2013-12-20 13:44:55', 1, 124, 4, 0, '', 1, 0, 0, '', '', '', 0, 22, ''),
(128, '[Customer]', '', 119, '2013-12-20 13:53:27', '2013-12-20 13:53:27', 1, 128, 4, 0, '', 1, 0, 0, '', '', '', 0, 27, ''),
(129, 'Help', '', 96, '2013-12-20 13:55:56', '2013-12-20 13:56:24', 1, 129, 4, 0, '', 1, 0, 0, '', '', '', 0, 39, ''),
(150, 'Blog Menu 1', '', -1, '2013-12-21 20:27:09', '2013-12-21 20:27:09', 1, 150, 4, 0, '', 1, 0, 0, '', '', '', 0, 43, ''),
(151, 'Trang chủ', '', 150, '2013-12-21 20:27:27', '2013-12-21 20:27:27', 1, 151, 4, 0, '', 1, 0, 0, '', '', '', 0, 43, ''),
(152, 'Tranh thế giới', '', 150, '2013-12-21 20:28:45', '2013-12-21 20:28:45', 1, 152, 4, 0, '', 1, 0, 0, '', '', '', 0, 42, '5'),
(153, 'Bức tranh Monalisa', '', 150, '2013-12-21 20:30:55', '2013-12-21 20:30:55', 1, 153, 4, 0, '', 1, 0, 0, '', '', '', 0, 44, '53'),
(154, 'Blog', '', 122, '2013-12-21 20:35:13', '2013-12-21 20:35:32', 1, 122, 4, 0, '', 1, 0, 0, '', '', '', 0, 43, ''),
(155, 'Shopping', '', 150, '2013-12-21 20:36:34', '2013-12-21 20:36:34', 1, 155, 4, 0, '', 1, 0, 0, '', '', '', 0, 5, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
