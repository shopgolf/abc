-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2015 at 06:00 PM
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
  `keyword` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fax` int(15) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

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
(32, 1, 7, 4),
(33, 1, 8, 1),
(34, 1, 8, 2),
(35, 1, 8, 3),
(36, 1, 8, 4),
(37, 1, 9, 1),
(38, 1, 9, 2),
(39, 1, 9, 3),
(40, 1, 9, 4),
(41, 1, 10, 1),
(42, 1, 10, 2),
(43, 1, 10, 3),
(44, 1, 10, 4),
(45, 1, 11, 1),
(46, 1, 11, 2),
(47, 1, 11, 3),
(48, 1, 11, 4),
(49, 1, 12, 1),
(50, 1, 12, 2),
(51, 1, 12, 3),
(52, 1, 12, 4),
(53, 1, 13, 1),
(54, 1, 13, 2),
(55, 1, 13, 3),
(56, 1, 13, 4),
(57, 1, 15, 1),
(58, 1, 15, 2),
(59, 1, 15, 3),
(60, 1, 15, 4),
(61, 1, 16, 1),
(62, 1, 16, 2),
(63, 1, 16, 3),
(64, 1, 16, 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=145 ;

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
(40, 1, '2015-07-12 22:22:16', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 19'),
(41, 3, '2015-07-12 22:42:51', '127.0.0.1', '[Login] Đăng nhập thành công'),
(42, 1, '2015-07-13 08:33:35', '127.0.0.1', '[Login] Đăng nhập thành công'),
(43, 1, '2015-07-13 15:39:24', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 21'),
(44, 1, '2015-07-13 15:39:27', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 22'),
(45, 1, '2015-07-13 15:41:50', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 23'),
(46, 1, '2015-07-13 20:34:32', '127.0.0.1', '[Login] Đăng nhập thành công'),
(47, 1, '2015-07-13 21:50:13', '127.0.0.1', 'Xác nhận đơn hàng 24 '),
(48, 1, '2015-07-13 22:04:18', '127.0.0.1', 'Xác nhận đơn hàng 32 '),
(49, 1, '2015-07-14 08:44:17', '127.0.0.1', '[Login] Đăng nhập thành công'),
(50, 1, '2015-07-14 13:43:24', '127.0.0.1', '[Login] Đăng nhập thành công'),
(51, 1, '2015-07-14 13:43:32', '127.0.0.1', '[Login] Đăng nhập thành công'),
(52, 1, '2015-07-14 14:41:41', '127.0.0.1', '[Login] Đăng nhập thành công'),
(53, 1, '2015-07-14 15:03:00', '127.0.0.1', '[Login] Đăng nhập thành công'),
(54, 1, '2015-07-14 15:05:48', '127.0.0.1', '[Login] Đăng nhập thành công'),
(55, 1, '2015-07-14 18:45:59', '127.0.0.1', '[Login] Đăng nhập thành công'),
(56, 1, '2015-07-15 05:55:43', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 21'),
(57, 1, '2015-07-15 05:55:59', '127.0.0.1', 'Xác nhận đơn hàng 24 '),
(58, 1, '2015-07-16 01:37:12', '127.0.0.1', '[Login] Đăng nhập thành công'),
(59, 1, '2015-07-16 00:39:20', '127.0.0.1', '[Logout] '),
(60, 1, '2015-07-16 00:39:24', '127.0.0.1', '[Login] Đăng nhập thành công'),
(61, 1, '2015-07-16 00:50:27', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(62, 1, '2015-07-16 11:52:51', '127.0.0.1', ''),
(63, 1, '2015-07-16 11:56:46', '127.0.0.1', ''),
(64, 1, '2015-07-16 11:58:53', '127.0.0.1', ''),
(65, 1, '2015-07-16 11:59:39', '127.0.0.1', ''),
(66, 1, '2015-07-16 12:01:04', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 8'),
(67, 1, '2015-07-16 12:01:26', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 5'),
(68, 1, '2015-07-16 12:02:12', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 2'),
(69, 1, '2015-07-16 12:06:43', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 13'),
(70, 1, '2015-07-16 12:58:38', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(71, 1, '2015-07-16 13:34:11', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(72, 1, '2015-07-16 15:36:16', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(73, 1, '2015-07-17 00:36:05', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(74, 1, '2015-07-17 00:36:38', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(75, 1, '2015-07-17 06:30:02', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 18,17,16,15,14'),
(76, 1, '2015-07-17 06:40:15', '127.0.0.1', '[Login] Đăng nhập thành công'),
(77, 1, '2015-07-17 07:04:25', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(78, 1, '2015-07-17 09:17:44', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(79, 1, '2015-07-19 08:41:16', '127.0.0.1', '[Login] Đăng nhập thành công'),
(80, 1, '2015-07-19 08:41:40', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 10'),
(81, 1, '2015-07-19 08:50:21', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(82, 1, '2015-07-19 08:50:52', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(83, 1, '2015-07-19 09:03:30', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(84, 1, '2015-07-19 09:51:20', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 26,25,24,23,22,21,6'),
(85, 1, '2015-07-19 09:57:33', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(86, 1, '2015-07-19 13:14:21', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(87, 1, '2015-07-19 13:14:50', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(88, 1, '2015-07-19 16:04:39', '127.0.0.1', '[Login] Đăng nhập thành công'),
(89, 1, '2015-07-19 21:27:36', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(90, 1, '2015-07-19 21:33:53', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(91, 1, '2015-07-19 21:36:04', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(92, 1, '2015-07-19 21:36:53', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(93, 1, '2015-07-19 21:39:14', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(94, 1, '2015-07-19 21:40:56', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(95, 1, '2015-07-19 21:44:24', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(96, 1, '2015-07-19 21:45:16', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(97, 1, '2015-07-19 21:45:37', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(98, 1, '2015-07-19 21:48:52', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(99, 1, '2015-07-19 21:49:05', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(100, 1, '2015-07-19 21:49:34', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(101, 1, '2015-07-20 04:36:43', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(102, 1, '2015-07-20 04:37:41', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(103, 1, '2015-07-20 04:37:47', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(104, 1, '2015-07-20 04:37:58', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(105, 1, '2015-07-20 04:41:04', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(106, 1, '2015-07-20 04:41:29', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(107, 1, '2015-07-20 04:42:03', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(108, 1, '2015-07-20 04:42:13', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(109, 1, '2015-07-20 04:42:19', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(110, 1, '2015-07-20 04:47:04', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(111, 1, '2015-07-20 04:47:36', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(112, 1, '2015-07-20 04:49:56', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(113, 1, '2015-07-20 04:56:54', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(114, 1, '2015-07-20 04:58:35', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(115, 1, '2015-07-20 04:58:40', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(116, 1, '2015-07-20 04:58:45', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(117, 1, '2015-07-20 04:58:52', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(118, 1, '2015-07-20 04:58:57', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(119, 1, '2015-07-20 05:01:53', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(120, 1, '2015-07-20 05:02:28', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(121, 1, '2015-07-20 05:02:40', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(122, 1, '2015-07-20 05:02:55', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(123, 1, '2015-07-20 05:03:20', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(124, 1, '2015-07-20 05:04:11', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(125, 1, '2015-07-20 13:44:18', '127.0.0.1', '[Login] Đăng nhập thành công'),
(126, 1, '2015-07-20 13:45:20', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 24'),
(127, 1, '2015-07-20 13:45:25', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 25'),
(128, 1, '2015-07-20 13:45:27', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 26'),
(129, 1, '2015-07-20 19:02:52', '127.0.0.1', '[Login] Đăng nhập thành công'),
(130, 1, '2015-07-20 19:19:58', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 32'),
(131, 1, '2015-07-20 19:20:05', '127.0.0.1', 'Xóa dữ liệu thành công - Product ID = 33'),
(132, 1, '2015-07-21 06:13:47', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(133, 1, '2015-07-21 08:26:48', '127.0.0.1', '[Login] Đăng nhập thành công'),
(134, 1, '2015-07-21 21:08:02', '127.0.0.1', '[Login] Đăng nhập thành công'),
(135, 1, '2015-07-22 05:51:52', '127.0.0.1', '[AddProductSuccess] Thêm sản phẩm thành công'),
(136, 1, '2015-07-22 06:27:11', '127.0.0.1', '[UpdateProductSuccess] Cập nhập sản phẩm thành công'),
(137, 1, '2015-07-22 14:22:12', '127.0.0.1', '[Login] Đăng nhập thành công'),
(138, 1, '2015-07-22 16:06:40', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 27'),
(139, 1, '2015-07-22 16:06:44', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 41'),
(140, 1, '2015-07-22 16:08:41', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 45'),
(141, 1, '2015-07-22 16:08:44', '127.0.0.1', '[NewCart] Xóa dữ liệu thành công id = 44'),
(142, 1, '2015-07-22 19:52:03', '127.0.0.1', '[Logout] '),
(143, 1, '2015-07-22 19:52:05', '127.0.0.1', '[Login] Đăng nhập thành công'),
(144, 1, '2015-07-22 20:25:38', '127.0.0.1', 'Xác nhận đơn hàng 42 ');

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
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lastupdated` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `px_category`
--

INSERT INTO `px_category` (`id`, `name`, `description`, `lastupdated`) VALUES
(1, 'Gậy golf | gậy golf ', ' Bạn đang có ý định tập  golf ? Bạn muốn được tư vấn về những  sản phẩm golf như', 1500929301),
(2, 'LADIES', 'LADIES', 1500929301);

-- --------------------------------------------------------

--
-- Table structure for table `px_checkout`
--

CREATE TABLE IF NOT EXISTS `px_checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(15) NOT NULL,
  `product_id` varchar(10) NOT NULL COMMENT 'id sản phẩm',
  `product_code` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `px_checkout`
--

INSERT INTO `px_checkout` (`id`, `customerID`, `product_id`, `product_code`, `quantity`, `net_fare`, `sum_price`, `ship`, `vat`, `final_price`, `ipaddress`, `note`, `status`, `createdTime`, `lastupdated`) VALUES
(42, 'CUS00492', 'PRO1307218', 'THUYTH', 10, 1500000, 2000000, 10000, 5, 3000000, 1, '', 1, 1433303234, 1433303565),
(43, 'CUS00492', 'PRO1307000', 'THUYTH', 31, 1500000, 4000000, 10000, 5, 3000000, 1, '', 1, 1433303234, 1433303565);

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
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_type` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` int(10) NOT NULL,
  `net_price` int(15) NOT NULL,
  `final_price` int(15) NOT NULL,
  `begin_price` int(10) NOT NULL,
  `begin_time` int(15) NOT NULL,
  `end_time` int(15) NOT NULL,
  `bid` tinyint(1) NOT NULL,
  `quantity` int(10) NOT NULL,
  `view` int(5) NOT NULL,
  `checkout` int(5) NOT NULL COMMENT 'số lượng sản phẩm dc bán ra',
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parameters` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `owner` int(4) NOT NULL,
  `createdTime` int(15) NOT NULL,
  `lastupdated` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `px_product`
--

INSERT INTO `px_product` (`id`, `product_id`, `product_name`, `product_code`, `product_type`, `image`, `category`, `net_price`, `final_price`, `begin_price`, `begin_time`, `end_time`, `bid`, `quantity`, `view`, `checkout`, `keyword`, `description`, `parameters`, `info`, `status`, `owner`, `createdTime`, `lastupdated`) VALUES
(31, 'PRO1307218', 'COOCOOCO', 'THUYTH', 1, '["c95fa8e499b3f3a0eee9dbbde259d996.jpeg","11e88ee9fd8a754b861d34127c911e6e.jpeg"]', 1, 2122222, 0, 0, 0, 0, 0, 0, 0, 542, 'COOCOOCO', 'COOCOOCO', '{"classification":"","manufacturer":"","model":"","shaft":"","count":"","loft":"","hardness":"","gross":"","balance":"","price":"","club":""}', '<p>weafwaefawe fewa</p>', 0, 1, 0, 2015),
(34, 'PRO1307000', 'ÁO CHOÀNG QUỐC TÉ', 'PEO2DD', 2, '["11e88ee9fd8a754b861d34127c911e6e.jpeg"]', 2, 1200000, 1000000, 0, 0, 0, 0, 0, 0, 213, 'ÁO CHOÀNG QUỐC TÉ', 'ÁO CHOÀNG QUỐC TÉ', '{"classification":"","manufacturer":"","model":"","shaft":"","count":"","loft":"","hardness":"","gross":"","balance":"","price":"","club":""}', '<p>&Aacute;O CHO&Agrave;NG QUỐC T&Eacute;</p>\r\n<p>&Aacute;O CHO&Agrave;NG QUỐC T&Eacute;</p>\r\n<p>&Aacute;O CHO&Agrave;NG QUỐC T&Eacute;</p>', 1, 1, 0, 2015);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`, `code`, `description`, `created`, `updated`, `creator_id`, `editor_id`, `active`) VALUES
(1, 'Nhóm thành viên', 'group', '<p>Cho ph&eacute;p quản l&yacute; nh&oacute;m th&agrave;nh vi&ecirc;n</p>', NULL, NULL, NULL, NULL, 1),
(2, 'Phân quyền', 'role', '<p>Cho ph&eacute;p ph&acirc;n quyền</p>', NULL, NULL, NULL, NULL, 1),
(6, 'Quản lí banner sản phẩm', 'advertising', 'Quản lí banner sản phẩm', '2015-07-02 09:03:47', NULL, 1, NULL, 1),
(4, 'Hệ thống', 'configuration', 'Cấu hình set up các biến hệ thống', '2015-03-18 13:24:33', NULL, 152, NULL, 1),
(5, 'Tài khoản', 'user', 'Tài khoản', '2015-06-30 00:00:00', '2015-06-30 00:00:00', NULL, NULL, 1),
(7, 'Sản phẩm', 'product', 'sản phẩm', '2015-07-10 00:48:59', NULL, 1, NULL, 1),
(8, 'Sản phẩm dc mua nhiều', 'hotdeal', 'Sản phẩm dc mua nhiều', '2015-07-20 00:00:00', '2015-07-20 00:00:00', 1, NULL, 1),
(9, 'Khuyến mãi', 'promotion', 'Khuyến mãi', NULL, NULL, NULL, NULL, 1),
(10, 'Trạng thái đang hơn còn hay hết', 'soldout', 'Trạng thái đang hơn còn hay hết', NULL, NULL, NULL, NULL, 1),
(11, 'Trạng thái đấu giá sản phẩm', 'bid', 'Trạng thái đấu giá sản phẩm', NULL, NULL, NULL, NULL, 1),
(12, 'Đơn hàng đã xác nhận', 'orderSuccess', 'Đơn hàng đã xác nhận', NULL, NULL, NULL, NULL, 1),
(13, 'Danh mục', 'category', 'Danh mục', NULL, NULL, NULL, NULL, 1);

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
