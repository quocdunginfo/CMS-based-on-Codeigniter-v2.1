-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 04:43 AM
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
  `art_price` int(11) NOT NULL DEFAULT '0' COMMENT 'VND only',
  `art_sold` int(11) NOT NULL DEFAULT '0',
  `order_product_id` int(11) NOT NULL DEFAULT '0',
  `order_count` int(11) NOT NULL DEFAULT '0',
  `order_unitprice` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` ( `title`, `content`, `date_create`, `date_modify`, `user_id`, `content_lite`, `active`, `avatar`, `special`, `optional1`, `optional2`, `art_id`, `art_count`, `art_width`, `art_height`, `art_sizeunit`, `art_price`, `art_sold`, `order_product_id`, `order_count`, `order_unitprice`) VALUES
('Front Component > Default Template', 'front', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
('Front Component > Default Template > Pink Style', 'front', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'front_style_2', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
('Blog Component > Default Template', 'blog', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'blog', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0),
('Admin Component > Default Template', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'admin', 1, '', 5, '', '', '', 0, 0, 0, 'cm', 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
