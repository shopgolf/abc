-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 03:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adminpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE IF NOT EXISTS `tbl_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(100) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'admin_menu_setting', 'a:16:{s:9:"dashboard";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:15:"fa fa-dashboard";s:10:"icon_color";s:7:"#1dcfbf";}s:4:"page";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:13:"fa fa-desktop";s:10:"icon_color";s:7:"#bd3737";}s:4:"post";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:10:"fa fa-edit";s:10:"icon_color";s:7:"#33925c";}s:7:"comment";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:14:"fa fa-comments";s:10:"icon_color";s:7:"#c89846";}s:9:"portfolio";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:26:"fa fa-caret-square-o-right";s:10:"icon_color";s:7:"#ca2296";}s:9:"galleries";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:12:"fa fa-camera";s:10:"icon_color";s:7:"#a73a3a";}s:12:"announcement";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:10:"fa fa-bell";s:10:"icon_color";s:7:"#1f18a4";}s:3:"faq";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:21:"fa fa-question-circle";s:10:"icon_color";s:7:"#c38f1d";}s:11:"contactform";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:10:"fa fa-book";s:10:"icon_color";s:7:"#a94e4e";}s:5:"media";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:10:"fa fa-file";s:10:"icon_color";s:7:"#32b8cf";}s:12:"testimonials";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:17:"fa fa-thumbs-o-up";s:10:"icon_color";s:7:"#a41a1a";}s:4:"menu";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:11:"fa fa-tasks";s:10:"icon_color";s:7:"#48c814";}s:6:"themes";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:9:"fa fa-eye";s:10:"icon_color";s:7:"#881c1c";}s:4:"user";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:11:"fa fa-child";s:10:"icon_color";s:7:"#979140";}s:6:"plugin";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:10:"fa fa-cogs";s:10:"icon_color";s:7:"#44c063";}s:13:"configuration";a:3:{s:10:"visibility";s:4:"show";s:4:"icon";s:12:"fa fa-wrench";s:10:"icon_color";s:7:"#973333";}}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Editor'),
(3, 'Author'),
(4, 'Contributor'),
(5, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_role` smallint(6) NOT NULL,
  `user_registered_date` timestamp NULL DEFAULT NULL,
  `user_activation_key` varchar(10) NOT NULL,
  `user_activation` tinyint(4) NOT NULL DEFAULT '2',
  `user_forgot_pass_key` varchar(250) DEFAULT NULL,
  `user_login_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_login_ip` varchar(20) DEFAULT NULL,
  `user_avatar` varchar(100) NOT NULL,
  `login_attemp` timestamp NULL DEFAULT NULL,
  `user_custom_fields` text,
  `public_profile` tinyint(4) NOT NULL DEFAULT '1',
  `user_delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `user_gender` int(1) NOT NULL DEFAULT '0',
  `user_phone` smallint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_name`, `user_fullname`, `user_password`, `user_email`, `user_role`, `user_registered_date`, `user_activation_key`, `user_activation`, `user_forgot_pass_key`, `user_login_time`, `user_login_ip`, `user_avatar`, `login_attemp`, `user_custom_fields`, `public_profile`, `user_delete_flag`, `user_gender`, `user_phone`) VALUES
(1, 'admin', 'Trần Hoàng Thiện', 'e10adc3949ba59abbe56e057f20f883e', 'thienhb12@gmail.com', 1, '2014-09-30 17:09:27', '', 1, '', '2015-03-22 06:33:26', '::1', '', NULL, NULL, 1, 0, 0, 0),
(34, 'admin2', '', 'e10adc3949ba59abbe56e057f20f883e', 'thienhb124@gmail.com', 1, '2015-01-10 02:09:58', '', 2, NULL, NULL, NULL, '', NULL, NULL, 1, 0, 0, 0),
(35, 'test12', '', 'e10adc3949ba59abbe56e057f20f883e', 'testvitubo@mailinator.com', 5, '2015-01-10 15:17:27', '', 1, NULL, NULL, NULL, '', NULL, NULL, 1, 0, 0, 0),
(36, 'test32', 'thien', 'e10adc3949ba59abbe56e057f20f883e', 'hiepsitruongphong2982@yahoo.com', 3, '2015-01-10 15:25:58', '', 1, NULL, NULL, NULL, '', NULL, NULL, 1, 0, 0, 0),
(37, 'admin32', 'thienhb', 'e10adc3949ba59abbe56e057f20f883e', 'hiepsitruongphong2982321@yahoo.com', 1, '2015-01-12 04:25:41', '', 1, NULL, '2015-01-19 06:57:20', NULL, '', NULL, NULL, 1, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
