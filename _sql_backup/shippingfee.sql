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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
