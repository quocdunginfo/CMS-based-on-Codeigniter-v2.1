-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 04:41 AM
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
(41, '_Admin Home Module', 'admin/', '', 'index_/', 1),
(42, 'Blog Posts from Cat Page', 'blog/', 'admin/category/index/special/0/view_mode/selector', 'posts/category/id/', 1),
(43, 'Blog Home Page', 'blog/', '', 'home/', 1),
(44, 'Blog Post detail Page', 'blog/', 'admin/posts/index/special/0/view_mode/selector', 'post/index/', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
