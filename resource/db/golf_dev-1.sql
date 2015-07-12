-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2015 at 05:35 PM
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
-- Table structure for table `advertising`
--

CREATE TABLE IF NOT EXISTS `advertising` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link_detail` varchar(250) NOT NULL,
  `link_img` text NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `creator_id` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `code` varchar(150) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groupright`
--

CREATE TABLE IF NOT EXISTS `groupright` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `group_id` smallint(3) unsigned DEFAULT '0',
  `role_id` tinyint(2) unsigned DEFAULT '0',
  `permission_id` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `groupright`
--

INSERT INTO `groupright` (`id`, `group_id`, `role_id`, `permission_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 1, 2, 1),
(6, 1, 2, 2),
(7, 1, 2, 3),
(8, 1, 2, 4),
(9, 1, 3, 1),
(10, 1, 3, 2),
(11, 1, 3, 3),
(12, 1, 3, 4),
(13, 1, 4, 1),
(14, 1, 4, 2),
(15, 1, 4, 3),
(16, 1, 4, 4),
(17, 1, 4, 1),
(18, 1, 4, 2),
(19, 1, 4, 3),
(20, 1, 4, 4),
(21, 1, 5, 1),
(22, 1, 5, 2),
(23, 1, 5, 3),
(24, 1, 5, 4),
(25, 1, 6, 1),
(26, 1, 6, 2),
(27, 1, 6, 3),
(28, 1, 6, 4),
(29, 1, 7, 1),
(30, 1, 7, 2),
(31, 1, 7, 3),
(32, 1, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `creator_id` smallint(3) unsigned DEFAULT NULL,
  `editor_id` smallint(3) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `created`, `updated`, `creator_id`, `editor_id`, `active`) VALUES
(1, 'Quản trị viên', 'Cập nhập phân quyền dành cho quản trị viên 1', NULL, '2015-06-28 13:40:22', NULL, 152, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `title`) VALUES
(1, 'vi', 'Tiếng Việt'),
(2, 'en', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `code`, `name`) VALUES
(1, 'view', 'Xem'),
(2, 'add', 'Thêm mới'),
(3, 'edit', 'Chỉnh sửa'),
(4, 'delete', 'Xóa bỏ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `px_adminlog`
--

INSERT INTO `px_adminlog` (`id`, `userid`, `lastLogin`, `ip`, `logAction`) VALUES
(1, 1, '2015-07-07 18:37:19', '127.0.0.1', '[Login] Đăng nhập thành công'),
(2, 1, '2015-07-08 21:41:17', '127.0.0.1', '[Login] Đăng nhập thành công'),
(3, 1, '2015-07-09 13:46:18', '127.0.0.1', '[Login] Đăng nhập thành công'),
(4, 1, '2015-07-09 18:29:19', '127.0.0.1', '[Login] Đăng nhập thành công'),
(5, 1, '2015-07-09 23:28:30', '127.0.0.1', '[Login] Đăng nhập thành công'),
(6, 1, '2015-07-10 00:48:59', '127.0.0.1', 'Tạo mới phân quyền(role) thành công, id = 7'),
(7, 1, '2015-07-10 16:32:53', '127.0.0.1', '[Login] Đăng nhập thành công'),
(8, 1, '2015-07-10 16:34:16', '127.0.0.1', '[Login] Đăng nhập thành công'),
(9, 1, '2015-07-10 22:01:20', '127.0.0.1', '[Login] Đăng nhập thành công'),
(10, 1, '2015-07-11 15:37:26', '127.0.0.1', '[Login] Đăng nhập thành công'),
(11, 1, '2015-07-12 09:02:26', '127.0.0.1', '[Login] Đăng nhập thành công'),
(12, 1, '2015-07-12 17:08:33', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 2'),
(13, 1, '2015-07-12 17:09:20', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(14, 1, '2015-07-12 17:09:49', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(15, 1, '2015-07-12 17:09:50', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(16, 1, '2015-07-12 17:10:04', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(17, 1, '2015-07-12 17:10:11', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(18, 1, '2015-07-12 17:10:56', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(19, 1, '2015-07-12 17:11:05', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(20, 1, '2015-07-12 17:11:22', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(21, 1, '2015-07-12 17:12:03', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(22, 1, '2015-07-12 17:12:41', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(23, 1, '2015-07-12 17:12:57', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(24, 1, '2015-07-12 17:13:33', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 4'),
(25, 1, '2015-07-12 17:13:39', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 7'),
(26, 1, '2015-07-12 17:16:14', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 8'),
(27, 1, '2015-07-12 17:16:59', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 1'),
(28, 1, '2015-07-12 17:18:01', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 3'),
(29, 1, '2015-07-12 17:21:58', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 5'),
(30, 1, '2015-07-12 17:22:07', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 9'),
(31, 1, '2015-07-12 17:30:32', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 11'),
(32, 1, '2015-07-12 17:33:33', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 10'),
(33, 1, '2015-07-12 17:33:50', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 13'),
(34, 1, '2015-07-12 17:34:20', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 12'),
(35, 1, '2015-07-12 17:40:33', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 15'),
(36, 1, '2015-07-12 17:41:32', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 16'),
(37, 1, '2015-07-12 17:45:48', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 14'),
(38, 1, '2015-07-12 17:45:51', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 17'),
(39, 1, '2015-07-12 17:45:54', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 18'),
(40, 1, '2015-07-12 22:22:16', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 19');

-- --------------------------------------------------------

--
-- Table structure for table `px_bid`
--

CREATE TABLE IF NOT EXISTS `px_bid` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `customerID` varchar(15) NOT NULL,
  `beginTime` int(15) NOT NULL,
  `endTime` int(15) NOT NULL,
  `auction_price` int(10) NOT NULL,
  `bid_price` int(10) NOT NULL,
  `lastupdated` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `px_category`
--

CREATE TABLE IF NOT EXISTS `px_category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `link` varchar(20) NOT NULL,
  `lastupdated` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `px_checkout`
--

CREATE TABLE IF NOT EXISTS `px_checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(15) NOT NULL,
  `product_id` varchar(10) NOT NULL COMMENT 'id sản phẩm',
  `quantity` int(10) NOT NULL COMMENT 'số lượng sản phẩm',
  `net_fare` int(10) NOT NULL COMMENT 'giá net',
  `sum_price` int(10) NOT NULL COMMENT 'Giá tổng cần thanh toán',
  `ship` int(10) NOT NULL COMMENT 'phí vận chuyển tính = vnd',
  `vat` int(5) NOT NULL COMMENT 'thuế vat ',
  `final_price` int(10) NOT NULL COMMENT 'giá cuối cùng thanh toán',
  `ipaddress` int(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdTime` int(10) NOT NULL,
  `lastupdated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `px_checkout`
--

INSERT INTO `px_checkout` (`id`, `customerID`, `product_id`, `quantity`, `net_fare`, `sum_price`, `ship`, `vat`, `final_price`, `ipaddress`, `note`, `status`, `createdTime`, `lastupdated`) VALUES
(20, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(21, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(22, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(23, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(24, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(25, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(26, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(27, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565),
(28, 'CUS00492', 'WO00491', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 0, 1433303234, 1433303565);

-- --------------------------------------------------------

--
-- Table structure for table `px_contacts`
--

CREATE TABLE IF NOT EXISTS `px_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `identityNumber` varchar(9) NOT NULL,
  `lastBook` int(15) DEFAULT NULL,
  `totalMoneyBooking` int(10) DEFAULT NULL,
  `ipadress` varchar(20) NOT NULL,
  `createdTime` int(15) NOT NULL,
  `lastupdated` int(15) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `px_contacts`
--

INSERT INTO `px_contacts` (`id`, `customerID`, `name`, `address`, `phone`, `email`, `identityNumber`, `lastBook`, `totalMoneyBooking`, `ipadress`, `createdTime`, `lastupdated`, `active`) VALUES
(2, 'CUS00492', 'NGUYỄN VĂN PHỤC', '1052/10/18 LAC LONG QUAN TAN BINH P8 HCM', '09089888877', NULL, '024051811', NULL, NULL, '127.0.0.1', 1450099999, 1433303438, 1),
(3, 'CUS00098', 'LÊ THỊ HOÀI THƯƠNG', '1052/10/18 LAC LONG QUAN TAN BINH P8 HCM', '09089888877', NULL, '024051834', NULL, NULL, '127.0.0.1', 1450099999, 1433303438, 1);

-- --------------------------------------------------------

--
-- Table structure for table `px_product`
--

CREATE TABLE IF NOT EXISTS `px_product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_type` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` int(10) NOT NULL,
  `net_price` int(10) NOT NULL,
  `vat` int(2) NOT NULL,
  `final_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `view` int(5) NOT NULL,
  `checkout` int(5) NOT NULL COMMENT 'số lượng sản phẩm dc bán ra',
  `bid_id` tinyint(1) NOT NULL COMMENT 'trạng thái đấu giá sản phẩm',
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdTime` int(15) NOT NULL,
  `lastupdated` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `px_product`
--

INSERT INTO `px_product` (`id`, `product_id`, `product_name`, `product_code`, `product_type`, `image`, `category`, `net_price`, `vat`, `final_price`, `quantity`, `view`, `checkout`, `bid_id`, `keyword`, `description`, `info`, `status`, `createdTime`, `lastupdated`) VALUES
(1, 'WO10491', 'GIAY DA THE THAO', 'CRXOO3', 1, 'https://www.facebook.com/photo.php?fbid=160675952', 1, 111111, 0, 222222, 11, 1, 21, 1, '', '', '', 1, 1433392129, 1433392129),
(2, 'WO10498', 'AO THUN BA LO', 'CRXOO334', 1, 'https://www.facebook.com/photo.php?fbid=16033', 1, 111111, 0, 222222, 11, 1, 21, 1, '', '', '', 1, 1433392129, 1433392129),
(3, 'WO00491', 'QUAN SIP TAM GIAC', 'CRXOO314', 1, 'https://www.facebook.com/photo.php?fbid=160674798', 1, 111111, 0, 222222, 11, 1, 21, 1, '', '', '', 1, 1433392129, 1433392129);

-- --------------------------------------------------------

--
-- Table structure for table `px_type`
--

CREATE TABLE IF NOT EXISTS `px_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastupdated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `px_type`
--

INSERT INTO `px_type` (`id`, `name`, `lastupdated`) VALUES
(1, 'Sản phẩm', 1500929301),
(2, 'Phụ kiện', 1500939301);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `creator_id` smallint(3) unsigned DEFAULT NULL,
  `editor_id` smallint(3) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`, `code`, `description`, `created`, `updated`, `creator_id`, `editor_id`, `active`) VALUES
(1, 'Nhóm thành viên', 'group', '<p>Cho ph&eacute;p quản l&yacute; nh&oacute;m th&agrave;nh vi&ecirc;n</p>', NULL, NULL, NULL, NULL, 1),
(2, 'Phân quyền', 'role', '<p>Cho ph&eacute;p ph&acirc;n quyền</p>', NULL, NULL, NULL, NULL, 1),
(6, 'Quản lí banner sản phẩm', 'advertising', 'Quản lí banner sản phẩm', '2015-07-02 09:03:47', NULL, 1, NULL, 1),
(4, 'Hệ thống', 'configuration', 'Cấu hình set up các biến hệ thống', '2015-03-18 13:24:33', NULL, 152, NULL, 1),
(5, 'Tài khoản', 'user', 'Tài khoản', '2015-06-30 00:00:00', '2015-06-30 00:00:00', NULL, NULL, 1),
(7, 'Sản phẩm', 'product', 'sản phẩm', '2015-07-10 00:48:59', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` text,
  `salt` text,
  `gender` tinyint(1) unsigned DEFAULT '0',
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `creator_id` smallint(3) unsigned DEFAULT NULL,
  `editor_id` smallint(3) unsigned DEFAULT NULL,
  `group_id` tinyint(2) unsigned DEFAULT NULL,
  `language_id` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `salt`, `gender`, `email`, `phone`, `address`, `image`, `active`, `last_login`, `created`, `updated`, `creator_id`, `editor_id`, `group_id`, `language_id`) VALUES
(1, 'NGUYỄN VĂN PHỤC', '', 'ugposter', 'b693519b74f9008487fda4dd7d2a935468e5fed783fffc49b8df1c2816718aff', '47ced02e8f5211f1fa459f6403a5e756', 0, 'nguyenvanphuc0626@gmail.com', '', '', '', 1, NULL, '2015-03-08 11:29:56', '2015-06-01 11:33:37', 148, 152, 1, 1),
(3, '', '', 'admin', '908141990269eed05aad022f9c254460bea86814a226d69348316098111fdfc0', 'd4546954b6da725e66b46df5dd220f95', 0, 'admin@gmail.com', '', '', '', 1, NULL, '2015-07-03 08:50:01', '2015-07-03 11:14:32', 1, 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
