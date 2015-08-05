-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 06:01 PM
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
-- Table structure for table `px_category`
--
DROP TABLE `px_category`;
CREATE TABLE IF NOT EXISTS `px_category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `parent_category` int(3) DEFAULT NULL,
  `owner` int(5) NOT NULL,
  `lastupdated` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `px_category`
--

INSERT INTO `px_category` (`id`, `name`, `description`, `keyword`, `seo_url`, `parent_category`, `owner`, `lastupdated`) VALUES
(70, 'Iron', 'Iron', 'Iron', 'iron', NULL, 1, 1438328652),
(71, 'Wedge', 'Wedge', 'Wedge', 'wedge', NULL, 1, 1438328652),
(74, 'Driver', 'Driver', 'Driver', 'driver', NULL, 1, 1438328652),
(75, 'Fairway', 'Fairway', 'Fairway', 'fairway', NULL, 1, 1438328652),
(79, 'Putter', 'Putter', 'Putter', 'putter', NULL, 1, 1438328652),
(86, 'Áo', 'Áo', 'Áo', 'ao', 148, 1, 1438328653),
(87, 'Quần', 'Quần', 'Quần', 'quan', 148, 1, 1438328653),
(88, 'Giày', 'Giày', 'Giày', 'giay', 148, 1, 1438328653),
(89, 'Nón', 'Nón', 'Nón', 'non', 148, 1, 1438328653),
(90, 'Tất tay', 'Tất tay', 'Tất tay', 'tat-tay', 148, 1, 1438328653),
(91, 'Bao tay', 'Bao tay', 'Bao tay', 'bao-tay', 148, 1, 1438328653),
(92, 'Vớ', 'Vớ', 'Vớ', 'vo', 148, 1, 1438328653),
(93, 'Dây nịch', 'Dây nịch', 'Dây nịch', 'day-nich', 148, 1, 1438328653),
(94, 'Putter', 'Putter', 'Putter', 'putter', NULL, 1, 1438328653),
(95, 'Dù', 'Dù', 'Dù', 'du', NULL, 1, 1438328654),
(96, 'Fairway', 'Fairway', 'Fairway', 'fairway', NULL, 1, 1438328654),
(98, 'Iron', 'Iron', 'Iron', 'iron', NULL, 1, 1438328654),
(99, 'Wedge', 'Wedge', 'Wedge', 'wedge', NULL, 1, 1438328654),
(102, 'Dịch vụ sửa gậy', 'Dịch vụ sửa gậy', 'Dịch vụ sửa gậy', 'dich-vu-sua-gay', NULL, 1, 1438328654),
(106, 'Boss Bag', 'Boss Bag', 'Boss Bag', 'boss-bag', NULL, 1, 1438328654),
(122, 'Khách Ký Gửi', 'Khách Ký Gửi', 'Khách Ký Gửi', 'khach-ky-gui', NULL, 1, 1438328655),
(124, 'Cart bags', 'Cart bags', 'Cart bags', 'cart-bags', 12, 1, 1438328650),
(125, 'Stand Bags', 'Stand Bags', 'Stand Bags', 'stand-bags', 12, 1, 1438328650),
(126, 'Travel Bags', 'Travel Bags', 'Travel Bags', 'travel-bags', 12, 1, 1438328650),
(127, 'Half Bags', 'Half Bags', 'Half Bags', 'half-bags', 12, 1, 1438328650),
(128, 'Shoes Bags', 'Shoes Bags', 'Shoes Bags', 'shoes-bags', 12, 1, 1438328650),
(129, 'Tee Bags', 'Tee Bags', 'Tee Bags', 'tee-bags', 12, 1, 1438328650),
(130, 'Grips Golf', 'Grips Golf', 'Grips Golf', 'grips-golf', NULL, 1, 1438328650),
(131, 'All Grips', 'All Grips', 'All Grips', 'all-grips', 130, 1, 1438328650),
(132, 'Putter Grips', 'Putter Grips', 'Putter Grips', 'putter-grips', 130, 1, 1438328650),
(133, 'Accessories Golf', 'Accessories Golf', 'Accessories Golf', 'accessories-golf', NULL, 1, 1438328650),
(134, 'Tee Golf', 'Tee Golf', 'Tee Golf', 'tee-golf', 133, 1, 1438328650),
(135, 'Umbrellas', 'Umbrellas', 'Umbrellas', 'umbrellas', 133, 1, 1438328650),
(136, 'Bóng mới', 'Bóng mới', 'Bóng mới', 'bong-moi', 84, 1, 1438328650),
(137, 'Bóng cũ', 'Bóng cũ', 'Bóng cũ', 'bong-cu', 84, 1, 1438328650),
(138, 'Lefty', 'Lefty', 'Lefty', 'lefty', NULL, 1, 1438328650),
(139, 'Lady', 'Lady', 'Lady', 'lady', NULL, 1, 1438328650),
(140, 'Kids', 'Kids', 'Kids', 'kids', NULL, 1, 1438328650),
(141, 'Dịch vụ sửa gậy', 'Dịch vụ sửa gậy', 'Dịch vụ sửa gậy', 'dich-vu-sua-gay', NULL, 1, 1438328650),
(142, 'Dịch vụ thuê gậy', 'Dịch vụ thuê gậy', 'Dịch vụ thuê gậy', 'dich-vu-thue-gay', NULL, 1, 1438328650),
(143, 'Mô tả máy tập đánh Golf', 'Mô tả máy tập đánh Golf', 'Mô tả máy tập đánh Golf', 'mo-ta-may-tap-danh-golf', NULL, 1, 1438328650),
(144, 'Bảng giá máy tập đánh Golf', 'Bảng giá máy tập đánh Golf', 'Bảng giá máy tập đánh Golf', 'bang-gia-may-tap-danh-golf', NULL, 1, 1438328650),
(145, 'Dạy đánh Golf trên máy', 'Dạy đánh Golf trên máy', 'Dạy đánh Golf trên máy', 'day-danh-golf-tren-may', NULL, 1, 1438328650),
(146, 'Thể lệ đấu giá', 'Thể lệ đấu giá', 'Thể lệ đấu giá', 'the-le-dau-gia', NULL, 1, 1438328650),
(147, 'Sản phẩm đang được đấu giá', 'Sản phẩm đang được đấu giá', 'Sản phẩm đang được đấu giá', 'san-pham-dang-duoc-dau-gia', NULL, 1, 1438328650),
(148, 'Trang phục', 'Trang phục', 'Trang phục', 'trang-phuc', NULL, 1, 1438328652),
(149, 'Gậy Golf', 'Gậy Golf', 'Gậy Golf', 'gay-golf', NULL, 1, 1438328652);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
