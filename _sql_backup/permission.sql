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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
