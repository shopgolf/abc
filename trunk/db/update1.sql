-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2015 at 04:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `golf.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `px_adminlog`
--

CREATE TABLE IF NOT EXISTS `px_adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) DEFAULT NULL,
  `lastLogin` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logAction` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `px_adminlog`
--

INSERT INTO `px_adminlog` (`id`, `userid`, `lastLogin`, `ip`, `logAction`) VALUES
(1, 1, '2015-07-07 18:37:19', '127.0.0.1', '[Login] Đăng nhập thành công');

-- --------------------------------------------------------

--
-- Table structure for table `px_bid`
--

CREATE TABLE IF NOT EXISTS `px_bid` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `customer` int(5) NOT NULL,
  `lastupdated` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `px_product`
--

CREATE TABLE IF NOT EXISTS `px_product` (
  `id` int(5) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `name` int(30) NOT NULL,
  `reference` int(10) NOT NULL,
  `category` int(30) NOT NULL,
  `base_price` int(10) NOT NULL,
  `final_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `view` int(5) NOT NULL,
  `checkout` int(5) NOT NULL,
  `bid` tinyint(1) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdTime` int(15) NOT NULL,
  `lastupdated` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
