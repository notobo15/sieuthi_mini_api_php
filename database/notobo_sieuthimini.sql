-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2023 at 11:08 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notobo_sieuthimini`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `provinceCode` varchar(255) NOT NULL,
  `districtCode` varchar(255) NOT NULL,
  `wardCode` varchar(255) NOT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT 5,
  `isDeleted` bit(1) DEFAULT b'0',
  `createAt` datetime DEFAULT current_timestamp(),
  `modifiedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=2978 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `name`, `password`, `first_name`, `last_name`, `phone`, `birth_date`, `gender`, `provinceCode`, `districtCode`, `wardCode`, `delivery_address`, `group_id`, `isDeleted`, `createAt`, `modifiedAt`) VALUES
(1, 'ac1001', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn', 'Ninh', '0969656210', '2003-06-20', 'nam', '79', '773', '27289', '123 le dung, Phường 16, Quận 4, Thành phố Hồ Chí Minh', 1, b'0', '2023-04-02 22:52:25', '2023-04-04 22:23:46'),
(5, '', 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'tran', '0123456788', '2000-01-12', 'nu', '', '', '', 'HCM', 5, b'0', '2023-04-03 09:58:18', '2023-04-04 22:22:12'),
(6, '', 'admin3', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'nguyen', '0123456788', '2023-01-04', 'nam', '', '', '', 'HCM', 5, b'0', '2023-04-03 11:07:37', '2023-04-04 22:23:41'),
(7, '', 'admin4', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'le', '0123412349', '2023-01-04', 'nam', '', '', '', 'HCM', 5, b'0', '2023-04-03 11:08:29', '2023-04-04 22:23:37'),
(8, '', 'admin5', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'tran', '0134123442', '2023-01-04', 'nam', '', '', '', 'HCM', 5, b'0', '2023-04-03 11:09:22', '2023-04-04 22:23:37'),
(9, '', 'admin6', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'nguyen', '0142042342', '2023-01-04', 'nam', '', '', '', 'HCM', 5, b'0', '2023-04-03 11:09:23', '2023-04-04 22:23:39'),
(10, '', 'binh', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'nguyen', '0987654321', '2000-01-01', 'nam', '1', '1', '1', 'àdsfsfadfadfadf', 1, b'0', '2023-04-03 13:31:50', '2023-04-04 22:23:40'),
(11, '', 'binh1', '827ccb0eea8a706c4c34a16891f84e7b', 'binh', 'nguyen', '0123456789', '2023-01-04', 'nam', '', '', '', 'HCM', 1, b'0', '2023-04-04 22:06:15', '2023-04-04 22:23:45'),
(12, '', 'binh123', '827ccb0eea8a706c4c34a16891f84e7b', 'fsdfsdf', 'fsdfsdfdsf', '0123456789', NULL, NULL, '', '', '', NULL, 5, b'0', '2023-04-05 23:05:03', '2023-04-05 23:05:03'),
(13, '', 'abc12345', '827ccb0eea8a706c4c34a16891f84e7b', 'abc123456', 'abc123456', '1234567891', NULL, NULL, '', '', '', NULL, 5, b'0', '2023-04-06 13:09:47', '2023-04-06 13:09:47'),
(14, '', 'abc123456', 'e10adc3949ba59abbe56e057f20f883e', 'abcda', 'asadasd1', '8911234567', NULL, NULL, '', '', '', NULL, 5, b'0', '2023-04-06 13:25:22', '2023-04-06 13:25:22'),
(15, '', 'admin12', '827ccb0eea8a706c4c34a16891f84e7b', 'vzxv', 'SĐFSD', '0123456789', NULL, NULL, '', '', '', NULL, 5, b'0', '2023-04-07 14:45:43', '2023-04-07 14:45:43'),
(16, '', 'khonliem', '827ccb0eea8a706c4c34a16891f84e7b', 'khon', 'liem', '0948164721', NULL, NULL, '', '', '', NULL, 5, b'0', '2023-04-07 15:26:17', '2023-04-07 15:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_code` varchar(200) NOT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=712 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `name_code`, `isDeleted`) VALUES
(1, 'Mì, hủ tiếu, phở gói', 'mi-hu-tieu-pho', b'0'),
(4, 'Gia Vị - Nguyên Liệu Nấu Ăn', 'gia-vi', b'0'),
(7, 'Gạo các loại', 'cac-loai-gao', b'0'),
(10, 'Đồ hộp các loại', 'do-dong-hop', b'0'),
(12, 'Rau, Củ, quả', 'rau-cu-qua', b'0'),
(14, 'Trái cây', 'trai-cay', b'0'),
(15, 'Thịt các loại', 'thit-cac-loai', b'0'),
(16, 'Cá, hải sản', 'ca-tom-muc-ech', b'0'),
(17, 'Bia', 'bia', b'0'),
(18, 'Nước ngọt', 'nuoc-ngot', b'0'),
(19, 'Bánh Snake', 'banh', b'0'),
(20, 'Nước giặt', 'nuoc-giat', b'0'),
(21, 'Nồi, niêu, xoong, chảo', 'noi-chao', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per` float NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isDeleted` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `price_per`, `start_date`, `end_date`, `createAt`, `isDeleted`) VALUES
(1, 'giam 5 %', 5, '2023-04-25 22:19:00', '2023-04-30 22:19:00', '2023-04-15 22:24:00', 0),
(2, 'giam 10 %', 10, '2023-04-26 22:19:00', '2023-05-01 22:19:00', '2023-04-16 22:24:00', 0),
(3, 'giam 15 %', 15, '2023-04-27 22:19:00', '2023-05-02 22:19:00', '2023-04-17 22:24:00', 0),
(4, 'giam 20 %', 20, '2023-04-28 22:19:00', '2023-05-03 22:19:00', '2023-04-18 22:24:00', 0),
(5, 'giam 25 %', 25, '2023-04-29 22:19:00', '2023-05-04 22:19:00', '2023-04-19 22:24:00', 0),
(6, 'giam 30 %', 30, '2023-04-30 22:19:00', '2023-05-05 22:19:00', '2023-04-20 22:24:00', 0),
(7, 'giam 35 %', 35, '2023-05-01 22:19:00', '2023-05-06 22:19:00', '2023-04-21 22:24:00', 0),
(8, 'giam 40 %', 40, '2023-05-02 22:19:00', '2023-05-07 22:19:00', '2023-04-22 22:24:00', 0),
(9, 'giam 45 %', 45, '2023-05-03 22:19:00', '2023-05-08 22:19:00', '2023-04-23 22:24:00', 0),
(10, 'giam 50 %', 50, '2023-05-04 22:19:00', '2023-05-09 22:19:00', '2023-04-24 22:24:00', 0),
(11, 'giam 55 %', 55, '2023-05-05 22:19:00', '2023-05-10 22:19:00', '2023-04-25 22:24:00', 0),
(12, 'giam 60 %', 60, '2023-05-06 22:19:00', '2023-05-11 22:19:00', '2023-04-26 22:24:00', 0),
(13, 'giam 65 %', 65, '2023-05-07 22:19:00', '2023-05-12 22:19:00', '2023-04-27 22:24:00', 0),
(14, 'giam 70 %', 70, '2023-05-08 22:19:00', '2023-05-13 22:19:00', '2023-04-28 22:24:00', 0),
(15, 'giam 75 %', 75, '2023-05-09 22:19:00', '2023-05-14 22:19:00', '2023-04-29 22:24:00', 0),
(16, 'giam 80 %', 80, '2023-05-10 22:19:00', '2023-05-15 22:19:00', '2023-04-30 22:24:00', 0),
(17, 'giam 85 %', 85, '2023-05-11 22:19:00', '2023-05-16 22:19:00', '2023-05-01 22:24:00', 0),
(18, 'giam 90 %', 90, '2023-05-12 22:19:00', '2023-05-17 22:19:00', '2023-05-02 22:24:00', 0),
(19, 'giam 95 %', 95, '2023-05-13 22:19:00', '2023-05-18 22:19:00', '2023-05-03 22:24:00', 0),
(20, 'giam 100 %', 100, '2023-05-14 22:19:00', '2023-05-19 22:19:00', '2023-05-04 22:24:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

CREATE TABLE `discount_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isDeleted` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_product`
--

INSERT INTO `discount_product` (`id`, `product_id`, `discount_id`, `createAt`, `isDeleted`) VALUES
(1, 1, 1, '2023-04-18 10:39:54', 0),
(2, 2, 1, '2023-04-18 10:39:54', 0),
(3, 3, 5, '2023-04-18 13:56:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ex_user_group`
--

CREATE TABLE `ex_user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ex_user_group`
--

INSERT INTO `ex_user_group` (`id`, `user_id`, `permission_id`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `isDeleted`) VALUES
(1, 'admin', b'0'),
(2, 'manage', b'0'),
(3, 'cashier', b'0'),
(4, 'seller', b'0'),
(5, 'customer', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `groups_permission`
--

CREATE TABLE `groups_permission` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=264 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups_permission`
--

INSERT INTO `groups_permission` (`id`, `group_id`, `permission_id`, `isDeleted`) VALUES
(1, 5, 1, NULL),
(2, 5, 2, NULL),
(3, 5, 3, NULL),
(4, 5, 7, NULL),
(5, 5, 8, NULL),
(6, 5, 9, NULL),
(7, 5, 15, NULL),
(8, 5, 19, NULL),
(9, 5, 31, NULL),
(10, 5, 33, NULL),
(11, 5, 34, NULL),
(12, 1, 1, NULL),
(13, 1, 2, NULL),
(14, 1, 3, NULL),
(15, 1, 4, NULL),
(16, 1, 5, NULL),
(17, 1, 6, NULL),
(18, 1, 7, NULL),
(19, 1, 8, NULL),
(20, 1, 9, NULL),
(21, 1, 10, NULL),
(22, 1, 11, NULL),
(23, 1, 12, NULL),
(24, 1, 13, NULL),
(25, 1, 14, NULL),
(26, 1, 15, NULL),
(27, 1, 16, NULL),
(28, 1, 17, NULL),
(29, 1, 18, NULL),
(30, 1, 19, NULL),
(31, 1, 20, NULL),
(32, 1, 21, NULL),
(33, 1, 22, NULL),
(34, 1, 23, NULL),
(35, 1, 24, NULL),
(36, 1, 25, NULL),
(37, 1, 26, NULL),
(38, 1, 27, NULL),
(39, 1, 28, NULL),
(40, 1, 29, NULL),
(41, 1, 30, NULL),
(42, 1, 31, NULL),
(43, 1, 32, NULL),
(44, 1, 33, NULL),
(45, 1, 34, NULL),
(46, 1, 35, NULL),
(47, 1, 36, NULL),
(48, 1, 37, NULL),
(49, 1, 38, NULL),
(50, NULL, NULL, NULL),
(51, NULL, NULL, NULL),
(52, NULL, NULL, NULL),
(53, NULL, NULL, NULL),
(54, NULL, NULL, NULL),
(55, NULL, NULL, NULL),
(56, NULL, NULL, NULL),
(57, NULL, NULL, NULL),
(58, NULL, NULL, NULL),
(59, NULL, NULL, NULL),
(60, NULL, NULL, NULL),
(61, NULL, NULL, NULL),
(62, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `import_detail`
--

CREATE TABLE `import_detail` (
  `id` int(11) NOT NULL,
  `import_product_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `price` decimal(19,2) DEFAULT 0.00
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import_detail`
--

INSERT INTO `import_detail` (`id`, `import_product_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 100, NULL),
(2, 2, 1, 200, NULL),
(3, 1, 2, 40, NULL),
(4, 4, 10, 100, NULL),
(5, 4, 9, 4, NULL),
(6, 5, 1, 1, NULL),
(7, 6, 1, 1, NULL),
(8, 7, 1, 1, NULL),
(9, 7, 2, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `import_product`
--

CREATE TABLE `import_product` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `suppilier_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import_product`
--

INSERT INTO `import_product` (`id`, `date`, `suppilier_id`, `account_id`) VALUES
(1, '2023-02-25', 1, 1),
(2, '2023-02-25', 2, 2),
(3, '2023-02-25', 1, 3),
(4, '2023-02-27', 1, 1),
(5, '2023-02-27', NULL, 1),
(6, '2023-02-27', 1, 1),
(7, '2023-02-27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `in_user_permission`
--

CREATE TABLE `in_user_permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'Processing',
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=6553 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `account_id`, `order_date`, `status`, `isDeleted`) VALUES
(1, 1, '2023-04-04 00:00:00', 'Processing', b'0'),
(2, 1, '2023-04-04 00:00:00', 'Processing', b'0'),
(3, 1, '2023-04-04 00:00:00', 'Processing', b'0'),
(4, 1, '2023-04-04 00:00:00', 'Processing', b'0'),
(5, 2, '2023-04-04 00:00:00', 'Processing', b'0'),
(6, 3, '2023-04-04 00:00:00', 'Processing', b'0'),
(7, 4, '2023-04-04 00:00:00', 'Processing', b'0'),
(8, 1, '2023-04-04 20:52:34', 'Processing', b'0'),
(9, 1, '2023-04-04 20:54:02', 'Processing', b'0'),
(10, 1, '2023-04-04 20:55:05', 'Processing', b'0'),
(11, 1, '2023-04-04 21:00:56', 'Processing', b'0'),
(12, 1, '2023-04-04 21:01:47', 'Processing', b'0'),
(13, 1, '2023-04-04 21:02:24', 'Processing', b'0'),
(14, 1, '2023-04-04 21:02:34', 'Processing', b'0'),
(15, 1, '2023-04-04 21:03:30', 'Processing', b'0'),
(16, 1, '2023-04-04 21:03:53', 'Processing', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(19,2) DEFAULT 0.00,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 1, '1000.00', 1),
(2, 1, 2, '1111.00', 1),
(3, 1, 3, '1123.00', 1),
(4, 2, 1, '3123.00', 1),
(5, 2, 2, '312.00', 1),
(6, 3, 4, '31312.00', 1),
(7, 4, 6, '3123.00', 1),
(8, 16, 2, '0.00', 19);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `code_name` varchar(255) DEFAULT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_id`, `name`, `code_name`, `isDeleted`) VALUES
(1, 'view user myself', 'accounts/myself', b'0'),
(2, 'edit user myself', 'accounts/myself/edit', b'0'),
(3, 'delete user myself', 'accounts/myself/delete', b'0'),
(4, 'view all user', 'accounts/list', b'0'),
(5, 'edit all user', 'accounts/update', b'0'),
(6, 'delete all user', 'accounts/delete', b'0'),
(7, 'view orders myself', 'accounts/order/list', b'0'),
(8, 'create orders myself', 'accounts/order', b'0'),
(9, 'edit orders myself', 'accounts/order/edit', b'0'),
(10, 'delete orders myself', 'accounts/order/delete', b'0'),
(11, 'view product', 'product/list', b'0'),
(12, 'create product', 'product', b'0'),
(13, 'edit product', 'product/edit', b'0'),
(14, 'delete product', 'product/delete', b'0'),
(15, 'view suppilier', 'suppilier/list', b'0'),
(16, 'create suppilier', 'suppilier', b'0'),
(17, 'edit suppilier', 'suppilier/edit', b'0'),
(18, 'delete suppilier', 'suppilier/delete', b'0'),
(19, 'view category', 'category/list', b'0'),
(20, 'create category', 'category', b'0'),
(21, 'edit category', 'category/edit', b'0'),
(22, 'delete category', 'category/delete', b'0'),
(27, 'view group', 'group/list', b'0'),
(28, 'create group', 'group', b'0'),
(29, 'edit group', 'group/edit', b'0'),
(30, 'delete group', 'group/delete', b'0'),
(31, 'view cart myself', 'accounts/cart/list', b'0'),
(32, 'create cart myself ', 'accounts/cart/clear', b'0'),
(33, 'edit cart myself', 'accounts/cart/create', b'0'),
(34, 'delete cart myself', 'accounts/cart/delete', b'0'),
(35, 'view all orders', 'accounts/orders/list', b'0'),
(36, 'create all orders', 'accounts/orders/create', b'0'),
(37, 'edit all orders', 'order/edit', b'0'),
(38, 'delete all orders', 'order/delete', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `mass` varchar(200) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `howToUse` text DEFAULT NULL,
  `preserve` text DEFAULT NULL,
  `trademark` varchar(200) DEFAULT NULL,
  `makeIn` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `isDeleted` bit(1) DEFAULT b'0',
  `expiredAt` datetime DEFAULT NULL,
  `createAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `desc`, `price`, `img`, `mass`, `ingredient`, `howToUse`, `preserve`, `trademark`, `makeIn`, `category_id`, `quantity`, `isDeleted`, `expiredAt`, `createAt`) VALUES
(1, 'Thùng 30 gói mì Hảo Hảo tôm chua cay 75g', 'mi-hao-hao-tom-chua-cay-75g-30', 'Sợi mì vàng dai ngon hòa quyện trong nước súp tôm chua cay Hảo Hảo, đậm đà thấm đẫm từng sợi sóng sánh cùng hương thơm quyến rũ ngất ngây. Mì Hảo Hảo tôm chua cay gói 75g là lựa chọn hấp dẫn không thể bỏ qua đặc biệt là những ngày bận rộn cần bổ sung năng lượng nhanh chóng đơn giản mà vẫn đủ chất', '118000.00', 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920304347.jpg', '75g / gói', 'VẮT MÌ - Bột mì (bổ sung vi chất (kẽm, sắt)), dầu thực vật (dầu cọ, chất chống oxy hoá (BHA (320), BHT (321))), tinh bột, muối, đường, nước mắm, chất điều vị (mononatri glutamat (621)), chất ổn định (pentanatri triphosphat (451(i), kali carbonat (501(i))), chất điều chỉnh độ acid (natri carbonat (500(i))), bột nghệ, chất tạo màu tự nhiên (curcumin (100(i))).', 'Cho vắt mì, gói súp và gói dầu vào tô. Chế nước sôi vào khoảng 400 ml, đậy nắp lại và chờ 3 phút. Trộn đều và dùng được ngay.', 'Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.', 'Hảo Hảo (Việt Nam)', 'Việt Nam', 1, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(2, 'Thùng 30 gói mì 3 Miền tôm chua cay 65g', 'mi-chua-cay-3-mien-65g-thung', 'Sở hữu nét đậm đà chuẩn hương vị truyền thống. Mì 3 Miền tôm chua cay gói 65g có được vị chua cay từ quá trình tìm tòi cũng như chắt lọc các nét đặc trưng nhất của các món chua cay dọc 3 miền tổ quốc. Để rồi thành phẩm mang đến cho người tiêu dùng hương vị tinh tế nhất và tuyệt hảo nhất', '89000.00', 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-202211181138546073.jpg', '65g / gói', 'VẮT MÌ - Bột mì (75,0%), shortening, phẩm màu (curcumin (E100(i)).\r\nGÓI GIA VỊ - Bột tôm (30 g/kg), dầu cọ, muối, đường, bột tỏi, bột ớt, hành lá sấy, chất điều chỉnh độ acid (citric acid (E330)), chất điều vị (monosodium L-glutamate (E621), disodium 5\'-inosinate (E631), disodium 5\'-guanylate (E627)).', 'Cho vắt mì và gói gia vị vào tô. Chế khoảng 350 ml nước sôi vào tô mì, đậy nắp kín và chờ trong 3 phút. Mở nắp, trộn đều và bắt đầu thưởng thức.', 'Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.', '3 Miền (Việt Nam)', 'Việt Nam', 1, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(3, 'Thùng 30 gói hủ tiếu Nam Vang Cung Đình 78g', 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g', 'Hủ tiếu ăn liền là bữa ăn cực tiện lợi và thơm ngon. 30 gói hủ tiếu Nam Vang Cung Đình 78g chính hãng hủ tiếu Cung Đình hương vị Nam Vang đặc trưng thấm đều trong từng sợi hủ tiếu dai ngon đậm đà cực đã cùng mùi hương hấp dẫn lôi cuốn không thể chối từ', '288000.00', 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316023474.jpg', '78g / gói', 'Sản phẩm có 2 thành phần chính: và vắt hủ tiếu và các gói trong vị, trong đó đặc biệt có gói xốt tôm mực cực hấp dẫn, gia vị ngon đúng điệu Nam Vang. Sản phẩm cung cấp cho cơ thể carbohydrate, chất đạm và chất béo', 'Cho hủ tiếu, gia vị vào tô, chế khoảng 400ml nước sôi và đậy nắp trong 3 phút', 'Bảo quản nơi khô ráo, tránh ánh nắng mặt trời. Nên chế biến ngay khi mở bao bì. Tránh để gần hoá chất và sản phẩm có mùi mạnh.', 'Cung Đình (Việt Nam)', 'Việt Nam', 1, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(4, 'Quýt giống Úc túi 1kg (5 - 9 trái)', 'quyt-giong-uc-tui-1kg-(5-9-trai)', 'Quýt Úc là trái cây có màu vàng ươm, quả hơi dẹp, trên vỏ quýt có các đốm tinh dầu to bóng. Quýt ngon, ngọt nhất khi trái hơi dẹt, cuống còn tươi, màu sáng đều. Quýt Úc tại Bách hóa XANH được trồng tại Trung Quốc chất lượng, tươi ngon', '640000.00', 'quyt-giong-uc-tui-1kg-5-9-trai-202205130905285767.jpg', '1kg', 'Quýt Úc được trồng tại Trung Quốc, đảm bảo nguồn gốc rõ ràng.', 'Để chọn quýt ngon, nên chọn những quả có cuống còn tươi, hơi dẹt, không bị dập, úng.', 'Lưu ý: Sản phẩm nhận được có thể khác với hình ảnh về màu sắc và số lượng nhưng vẫn đảm bảo về mặt khối lượng và chất lượng', 'Quýt Úc', 'Trung Quốc', 14, 10, b'0', '2024-01-01 00:00:00', '2023-03-01 00:00:00'),
(5, 'Thùng 30 gói mì khoai tây Omachi xốt bò hầm 80g', 'thung-mi-omachi-sot-bo-ham-goi-80g-30-goi', 'Sợi mì từ trứng và khoai tây vàng dai ngon hòa trong nước súp Omachi xốt bò hầm đậm đà cùng hương thơm nứt mũi tạo ra siêu phẩm mì với sự kết hợp hương vị hài hòa, độc đáo. 30 gói mì khoai tây Omachi xốt bò hầm 80g tiện lợi, thơm ngon hấp dẫn không thể chối từ', '252000.00', 'thung-30-goi-mi-khoai-tay-omachi-xot-bo-ham-80g-201912081340008681.jpg', '65g / gói', 'Vắt mì - bột mì, dầu cọ, tinh bột khoai mì, chất ổn định, tinh bột khoai tây, muối, nước mắm, chất điều vị, chiết xuất nấm men, chất tạo xốp, bột lòng đỏ trứng, hỗn hợp protein lòng trắng trứng, xiro ngô nồng độ fructose cao, chiết xuất trái dành dành, chất chống oxy hóa', 'Cho vắt mì, gói nêm, gói rau và gói dầu vào tô. Đổ vào 400ml nước sôi. Đậy nắp trong 3 phút. Mở nắp ra, trộn đều là dùng được ngay.', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Không để gần hóa chất hoặc sản phẩm có mùi mạnh.', 'Omachi (Việt Nam)', 'Việt Nam', 19, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(6, 'Bánh gạo cắt lát tokpokki Matamun gói 600g', 'banh-gao-cat-lat-tokpokki-matamun-goi-600g', 'Bánh gạo dạng gói chất lượng, dai ngon từ thương hiệu bánh gạo Matamun được sản xuất tại Hàn Quốc. Bánh gạo cắt lát tokpokki Matamun 600g tiện lợi cho bạn trổ tài sáng tạo chế biến các món ăn hấp dẫn như sốt cay, sốt phô mi, nấu lẩu,...Sản phẩm cam kết chính hãng và an toàn', '56000.00', 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338517634.jpg', '600g/gói', 'Gạo (99,1%), muối, chất điều chỉnh acid, rượu ngũ cốc.', 'Cho bánh gạo tokpokki vào trong nồi nước. Khi bắt đầu sôi điều chỉnh lửa nhỏ đun khoảng 5 phút. Sau đó cho bánh gạo ra chế biến các món ăn tùy thích.', 'Nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp.', 'Matamun (Hàn Quốc)', 'Hàn Quốc', 1, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(7, 'Thùng 30 gói bún giò heo Hằng Nga 75g', 'thung-30-goi-bun-gio-heo-hang-nga-75g', 'Sản phẩm bún ăn liền thương hiệu Hằng Nga được sản xuất từ các thành phần tự nhiên an toàn cho khỏe. 30 gói bún giò heo Hằng Nga 75g chất lượng thơm ngon với nước súp giò heo cực đậm đà và hấp dẫn cho bạn bữa ăn nhanh tiện lợi và dinh dưỡng', '260000.00', 'bun-gio-heo-hang-nga-goi-75g-thung-30-3-org.jpg', '75g', 'Gạo, tinh bột, muối, chất nhũ hoá, dầu tinh luyện, giả thịt (đậu nành), chất điều vị, cà rốt, hành lá, ngò, hương heo...', 'Cho bún, các gói gia vị vào tô. Thêm 400ml nước sôi, đậy nắp trong 5 phút', 'Nơi khô ráo, thoáng mát, tránh ánh nắng mặt trời', 'Hằng Nga (Việt Nam)', 'Việt Nam', 1, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(8, 'Thùng 24 lon bia Heineken Silver 330ml', 'thung-24-lon-bia-heineken-silver-330ml', 'Bia thơm ngon chất lượng chính hãng thương hiệu bia được ưa chuộng tại hơn 192 quốc gia trên thế giới đến từ Hà Lan - bia Heineken. 24 lon Heineken Silver 330ml thơm ngon hương vị bia tuyệt hảo, cân bằng và êm dịu, thiết kế đẹp mắt, cho người dùng cảm giác sang trọng, nâng tầm đẳng cấp.', '440000.00', 'thung-24-lon-bia-heineken-silver-330ml-202205111635132939.jpg', '330ml', 'Nước, hoa bia, đại mạch, men A-Yeast', 'Dùng trực tiếp, ướp lạnh, hoặc dùng với đá', 'Bảo quản nơi sạch sẽ, khô ráo thoáng mát Tránh ánh nắng mặt trời Tránh bị đông đá', 'Bảo quản nơi sạch sẽ, khô ráo thoáng mát Tránh ánh nắng mặt trời Tránh bị đông đá', 'Việt Nam', 17, 10, b'0', '2024-01-01 00:00:00', '2023-02-23 00:00:00'),
(9, 'Nước giặt Surf hương nước hoa túi 3 lít', 'nuoc-giat-surf-huong-nuoc-hoa-tui-3-lit', 'Surf là sản phẩm nước giặt thương hiệu đến từ Hà Lan và Anh, nước giặt Surf giúp sạch nhanh hiệu quả, đưa hương thơm lan toả dù ngày nắng hay mưa, giúp bạn tự tin với quần áo luôn thơm tho, sạch sẽ. Nước giặt Surf hương nước hoa túi 3 lít với hương cỏ hoa thơm mát dễ chịu.', '106000.00', 'nuoc-giat-surf-huong-nuoc-hoa-tui-3-lit-202204191521510721.png', '1kg', 'Hương nước hoa', 'Bếp ga, bếp hồng ngoại', 'Nơi khô ráo thoáng mát. Tránh tiếp xúc trực tiếp với ánh nắng mặt trời', 'Surf (Anh và Hà Lan)', 'Việt Nam', 20, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(10, 'Nồi nhật nhôm Kim Hằng KHG9587 30cm', 'noi-nhat-nhom-kim-hang-khg9587-30cm', 'Bộ nồi bằng nhôm cao cấp,  bề mặt được xử lý theo công nghệ xi dương cực giúp nồi bền, sử dụng lâu và nấu thức ăn ngon hơn. Nồi nhật nhôm Kim Hằng KHG9587 30cm tiện lợi, có thể sử dụng cho bếp ga và bếp hồng ngoại. Nồi Kim Hằng chất lượng cao.', '360000.00', 'noi-nhat-nhom-kim-hang-khg9587-30cm-202108041419171460.jpg', '10.7 lít', 'Nhôm hợp kim tinh chất AA1050 tiêu chuẩn JIS', 'Giặt tay, giặt máy cửa trên. Xử lý vết bẩn trước khi giặt thoa 1 ít nước giặt lên vết bẩn và chà nhẹ. Điều chỉnh lượng nước giặt tương ứng với lượng quần áo và độ bẩn. Đối với Giặt máy dùng 76ml cho một lần giặt thông thường. Chọn chế độ giặt cho phù hợp. Đối với giặt tay dùng 38ml cho một lần giặt thông thường. Cho nước giặt vào chậu nước đánh mạnh để tạo bọt. Giặt quần áo', 'Bảo quản nơi thoáng mát. Tránh va đập mạnh.', 'Kim Hằng', 'Việt Nam', 21, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(11, 'Chảo bầu quantum chống dính Kim Hằng 36cm', 'chao-bau-quantum-chong-dinh-kim-hang-36cm', 'Chảo làm bằng hợp kim nhôm tinh chất, giúp chảo bền, sử dụng tiện lợi chống dính và dễ vệ sinh. Chảo bầu quantum chống dính Kim Hằng 36cm chất lượng giúp nấu các món ăn trở nên thơm ngon và hấp dẫn. Chảo Kim Hằng chất lượng, tiện lợi', '312000.00', 'chao-bau-quantum-chong-dinh-kim-hang-36cm-202108030917190424.jpg', '36cm', 'Nhôm hợp kim tinh chất', 'Dùng để chiên, xào thức ăn', 'Bảo quản nơi thoáng mát. Tránh va đập mạnh. Bếp ga, bếp hồng ngoại', 'Kim Hằng', 'Việt Nam', 21, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(12, 'Chảo chống dính đáy từ HappyCall Titanium 26cm', 'chao-chong-dinh-day-tu-happycall-titanium-26cm', 'Chảo chống dính HappyCall được sản xuất từ chất liệu nhôm, thép không gỉ, chống móp méo tốt. Đáy chảo phẳng, tỏa nhiệt đều và giữ nhiệt lâu khi nấu. Chảo chống dính đáy từ HappyCall Titanium 26cm có tay cầm cách nhiệt an toàn, có lỗ treo tiện lợi.', '410000.00', 'chao-chong-dinh-day-tu-happycall-titanium-26cm-202107310901356076.jpg', '26cm', 'Nhôm, thép không gỉ, nhựa tổng hợp', 'Tráng qua một lớp dầu ăn trong lần đầu tiên sử dụng để tăng tuổi thọ chảo. Bếp từ, bếp hồng ngoại, bếp ga', 'Nên nấu ăn ở nhiệt độ trung bình, không quá cao, không sử dụng trong lò vi song và lò nướng. Không sử dụng miếng tẩy rửa bằng kim loại. Không sử dụng các chất tẩy rửa có chất bào mòn sản phẩm', 'HappyCall', 'Hàn Quốc', 21, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(13, 'Khuôn bò bít tết nhôm Kim Hằng ADC', 'khuon-bo-bit-tet-nhom-kim-hang-adc', 'Chảo Kim Hằng được thiết kế nhỏ gọn, có khả năng làm nóng nhanh, khuôn giữ nhiệt tốt, giúp chế biến món trứng ốp la, bò bít tết nhanh chóng và thơm ngon hơn. Khuôn bò bít tết nhôm Kim Hằng ADC được làm từ chất liệu nhôm cao cấp, bền bỉ và an toàn cho sức khoẻ.', '304000.00', 'khuon-bo-bit-tech-nhom-kim-hang-adc-202108071010422453.jpg', '14inch', 'Nhôm tiêu chuẩn Nhật Bản AA 3003 JIS', 'Dùng được với bếp ga', 'Nơi khô ráo, thoáng mát', 'Kim Hằng', 'Việt Nam', 21, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(14, 'Khuôn bò bít tết nhôm Kim Hằng ADC', 'khuon-bo-bit-tet-nhom-kim-hang-adc', 'Có đường kính 18cm, thành cao, có thể chiên xào với một lượng thức ăn nhiều. Chảo được làm bằng chất liệu gang cực bền bỉ, dễ dàng sử dụng, vệ sinh. Chảo gang chống dính Tuyết Mai 18cm giúp truyền nhiệt nhanh, thức ăn chín đều. Cán chảo Tuyết Mai cách nhiệt hiệu quả, chắc chắn nếu cần di chuyển', '280000.00', 'chao-gang-chong-dinh-tuyet-mai-18cm-202202161309570230.jpg', '18cm', 'Gang', 'Dùng cho bếp ga, cho bếp hồng ngoại', 'Nơi khô ráo, thoáng mát', 'Tuyết Mai', 'Việt Nam', 21, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(15, 'Gạo thơm A An ST24 túi 5kg', 'gao-thom-a-an-st24-tui-5kg', 'Là loại gạo mềm thơm, giống gạo ST24 của thương hiệu gạo A An được trồng theo công nghệ hiện đại, tiên tiến không sử dụng chất kích thích tăng trưởng, mang đến cho bạn bữa cơm ngon miệng. Gạo thơm A An ST24 túi 5kg dẻo nhiều, cơm nhiều nhưng nở ít tạo cảm giác ngon miệng khi ăn.', '119000.00', 'gao-thom-a-an-st24-tui-5kg-202204021021313013.jpg', '5kg', 'Giống ST24', '1 chén gạo cho 1 - 1,2 chén nước (tăng giảm tuỳ khẩu vị)', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'A An', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(16, 'Gạo thơm Vua Gạo ST25 Lúa Tôm túi 5kg', 'gao-thom-vua-gao-st25-lua-tom-tui-5kg', 'Gạo thơm Vua Gạo ST25 Lúa Tôm túi 5kg là loại gạo thơm ngon, có độ dẻo và mềm đặc biệt, hạt gạo thon dài, không bị khô sau khi nấu. Sản phẩm gạo Vua Gạo được đánh giá cao về chất lượng sản phẩm, hương vị thơm ngon, hấp dẫn, túi 5kg thích hợp cho gia đình sử dụng.', '195000.00', 'gao-thom-vua-gao-st25-lua-tom-tui-5kg-202211170832226107.jpg', '5kg', 'Giống ST25', '1 chén gạo cho 1 - 1,2 chén nước (tăng giảm tuỳ khẩu vị)', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Vua Gạo', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(17, 'Gạo thơm đặc sản Neptune ST25 túi 5kg', 'gao-thom-dac-san-neptune-st25-tui-5kg', 'Gạo là lương thực thực phẩm thiết yếu có trong mọi căn bếp. Gạo thơm đặc sản Neptune ST25 túi 5kg với giống gạo ST25 ngon nhất thế giới vào năm 2019, hạt cơm ngọt, dẻo nhiều và ít nở, giúp bạn ăn ngon miệng. Gạo Neptune chất lượng, thơm ngon, giúp bạn ăn được nhiều cơm.', '185000.00', 'gao-thom-dac-san-neptune-st25-tui-5kg-202303010822397005.jpg', '5kg', 'Giống ST25', 'Vo sạch gạo. Đong nước theo tỉ lệ gạo - nước là 1-1 hoặc 1-1,2. Nấu đến khi cơm chín tới, không mở nắp trong khi nấu. Sau khi cơm chín, để thêm 10 phút nữa để cơm ráo.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Neptune', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(18, 'Gạo ST25 Thượng hạng Đồng Việt túi 5kg\n', 'gao-st25-thuong-hang-dong-viet-tui-5kg', 'Gạo ST25 Thượng hạng Đồng Việt túi 5kg là loại gạo thơm được thu hoạch từ giống lúa ST25. Gạo Đồng Việt là thương hiệu nổi tiếng với các sản phẩm gạo chất lượng, không chứa chất bảo quản, chất tạo mùi và không để lại dư lượng thuốc bảo vệ thực vật khác.', '179000.00', 'gao-st25-thuong-hang-dong-viet-tui-5kg-202212280854102020.jpg', '5kg', 'Giống ST25', '1 chén gạo cho 1 chén nước (tăng giảm tuỳ khẩu vị)', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Đồng Việt', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(19, 'Gạo trắng Thiên Nhật túi 5kg', 'gao-trang-thien-nhat-tui-5kg', 'Gạo Thiên Nhật chất lượng, không chứa chất bảo quản, tạo mùi hay tẩy trắng. Gạo trắng Thiên Nhật túi 5kg cho ra cơm dẻo vừa, nở ít, giúp ăm ngon miệng hơn. Gạo túi 5kg tiện lợi và tiết kiệm cho cả gia đình cùng sử dụng.', '74000.00', 'gao-trang-thien-nhat-tui-5kg-202206220935467038.jpg', '5kg', 'Giống ST25', '1 chén gạo cho 1.2 chén nước', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Thiên Nhật', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(20, 'Gạo Lạc Việt đệ nhất ST25 túi 5kg', 'gao-lac-viet-de-nhat-st25-tui-5kg', 'Gạo là nguyên liệu không thể thiếu trong bữa cơm hằng ngày của người Việt. Gạo Lạc Việt đệ nhất ST25 túi 5kg thơm ngon với giống lúa ST25 nổi tiếng, gạo có độ mềm dẻo cùng hương thơm nhẹ nhàng. Gạo Lạc Việt được sản xuất từ 100% hạt gạo tự nhiên đạt chất lượng.', '140000.00', 'gao-thom-a-an-st24-tui-5kg-202204021021313013.jpg', '5kg', 'Giống ST25', '1 chén gạo cho 1 chén nước (tăng giảm tuỳ khẩu vị)', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Lạc Việt', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(21, 'Gạo đặc sản Trạng Nguyên Vinh Hiển ST25 túi 5kg', 'gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg', 'Gạo là lương thực quan trọng, không thể thiếu trong những bữa cơm gia đình. Gạo Vinh Hiển là thương hiệu lớn với sản phẩm Gạo đặc sản trạng nguyên Vinh Hiển ST25 túi 5kg dẻo, mềm và thơm giúp ăn ngon miệng, rất hợp khẩu vị nhiều người. Túi nhỏ thích hợp cho sử dụng cá nhân hoặc dùng thử.', '179000.00', 'gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033083592.jpg', '5kg', 'Giống ST25', 'Cho gạo vào nồi và vo sạch với nước. Cho nước vào nồi tỉ lệ (1-1) (có thể tăng giảm lượng nước tùy theo khẩu vị). Thời gian nấu từ 20-30 phút. Xới cơm trước khi dùng.', 'Bảo quản nơi khô ráo, thoáng mát, cách xa nơi có độ ẩm cao và tránh ánh nắng trực tiếp', 'Vinh Hiển', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(22, 'Gạo hương lài Thiên Kim túi 5kg', 'gao-huong-lai-thien-kim-tui-5kg', 'Cơm dẻo mềm, thơm lài, ngọt nhẹ. Gạo Thiên Kim Hương Lài được sản xuất theo quy trình khoa học, đảm bảo mang lại những hạt gạo ngon, tươi mới, thơm lành, chất lượng nhất mà vẫn an toàn cho sức khoẻ của người tiêu dùng.', '91000.00', 'gao-thom-jasmine-5kg-2-org.jpg', '5kg', 'Giống ST25', '1 chén gạo cho 1,2 chén nước (tăng giảm tuỳ khẩu vị)', 'Nơi thoáng mát, nên dùng trong 1 tháng sau khi mở bao bì', 'Thiên Kim', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(23, 'Gạo thơm lài Bách hoá XANH túi 5kg', 'gao-thom-lai-bach-hoa-xanh-tui-5kg', 'Gạo khi nấu chín dẻo vừa, thơm nhẹ, nở vừa phải, cơm mềm. Gạo thơm lài Bách hoá XANH túi 5kg là gạo của Bách Hóa Xanh, được canh tác nuôi trồng theo quy trình hiện đại, tiên tiến, không sử dụng chất kích thích tăng trưởng,đảm bảo an toàn, chất lượng và mang đến bữa cơm tròn vị cho gia đình bạn.', '103000.00', 'gao-thom-lai-bach-hoa-xanh-tui-5kg-201910041050516831.jpg', '5kg', 'Giống lúa Đài thơm 8', '1 chén gạo cho 1,3 chén nước (tăng giảm tuỳ khẩu vị)', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Bách hoá XANH', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(24, 'Gạo thơm Ngon ST24 túi 5kg', 'gao-thom-ngon-st24-tui-5kg', 'Gạo khi nấu cho cơm mềm ngọt, dẻo dai, rất ngon tạo cảm giác dễ chịu cho người ăn. Gạo thơm Ngon ST24 túi 5kg thuộc thương hiệu gạo Ngon được nuôi trồng canh tác theo quy trình tiên tiến, nghiêm ngặt đảm bảo không chất bảo quản, không thuốc trừ sâu, kích thích tăng trưởng.', '103000.00', 'gao-thom-ngon-st24-tui-5kg-202101261415591064.jpg', '5kg', 'Giống ST24', 'Nấu cơm theo tỷ lệ 1 chén gạo khoảng 0.9 - 1 chén nước (điều chỉnh lượng nước cho phù hợp, nên nấu ít nước để giữ vị tinh tế của cơm). Nấu đến khi cơm chín ( khoảng 25 phút) sau đó chờ khoảng 10 phút để cơm ráo, không cần xới xáo.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Ngon', 'Việt Nam', 7, 10, b'0', '2025-01-01 00:00:00', '2023-03-17 00:00:00'),
(25, 'Gạo trắng 6868 Angel túi 5kg', 'gao-trang-6868-angel-tui-5kg', 'Gạo các loại Angel là loại gạo chất lượng, hạt gạo trắng thơm ngon chất lượng, dẻo mềm với chất lượng được ưu tiên hàng đầu. Gạo trắng 6868 Angel túi 5kg với 100% chất lượng cao cấp, hạt gạo cho cớm nấu thành phẩm thơm ngon khó cưỡng, dẻo, nở, mềm cho bữa ăn thêm tròn vị, bắt cơm hơn rất nhiều.', '114000.00', 'gao-trang-6868-angel-tui-5kg-202204190842251152.jpg', '5kg', 'Quýt Úc được trồng tại Trung Quốc, đảm bảo nguồn gốc rõ ràng.', 'Tỷ lệ lý tưởng để nấu 6868 gạo trắng là 2-1, nghĩa là 2 cốc nước cho mỗi cốc gạo. Bạn có thể nấu cơm này trên bếp, trong nồi cơm điện, nồi nấu chậm hoặc thậm chí trong lò vi sóng.', 'Bảo quản nơi khô ráo, thoáng mát, tránh ẩm thấp vì dễ sinh mối mọt. Đậy kín nắp thùng gạo sau khi lấy gạo. Tránh tiếp xúc trực tiếp với ánh nắng mặt trời', 'Angel', 'Việt Nam', 7, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(26, 'Gạo tấm thơm Angel Fine Foods túi 5kg', 'gao-tam-thom-angel-fine-foods-tui-5kg', 'Gạo các loại, tấm các loại là thực phẩm chính trong bữa ăn của người Việt. Tấm, gạo các loại Angel được ưa chuộng bởi sự tiện lợi, độ thơm ngon và đảm bảo chất lượng. Gạo tấm thơm Angel Fine Foods túi 5kg ngon và mềm, vị thơm ngọt có độ nở vừa phải, phù hợp với khẩu vị của người Việt.', '114000.00', 'gao-tam-thom-angel-fine-foods-tui-5kg-202210050838168651.jpg', '5kg', 'Quýt Úc được trồng tại Trung Quốc, đảm bảo nguồn gốc rõ ràng.', '1 chén gạo cho 1 - 1,2 chén nước (tăng giảm tuỳ khẩu vị)', 'Bảo quản nơi khô ráo, thoáng mát, tránh ẩm thấp vì dễ sinh mối mọt. Đậy kín nắp thùng gạo sau khi lấy gạo. Tránh tiếp xúc trực tiếp với ánh nắng mặt trời', 'Angel', 'Việt Nam', 7, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(27, 'Gạo thơm thượng hạng Neptune Nhãn Vàng túi 5kg', 'gao-thom-thuong-hang-neptune-nhan-vang-tui-5kg', 'Gạo là lương thực không thể thiếu trong căn bếp người Việt ta. Gạo thơm thượng hạng Neptune Nhãn Vàng túi 5kg là loại gạo rất thơm, mềm và ít nở, khi nấu thành cơm ăn khá ngọt. Gạo Neptune chất lượng, giúp ăn ngon miệng, xứng đáng là loại gạo nên có trong mỗi căn bếp', '155000.00', 'gao-thom-thuong-hang-neptune-nhan-vang-tui-5kg-202111021832474882.jpg', '5kg', 'Gạo Thơm', 'Vo sạch gạo. Đong nước theo tỉ lệ gạo - nước là 1-1 hoặc 1-1,2. Nấu đến khi cơm chín tới, không mở nắp trong khi nấu. Sau khi cơm chín, để thêm 10 phút nữa để cơm ráo.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Neptune', 'Việt Nam', 7, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(28, 'Gạo thơm Vua Gạo ST25 túi 5kg', 'gao-thom-vua-gao-st25-tui-5kg', 'Gạo hạt dài, thơm đặc trưng và nở ít tạo giác ăn ngon miệng. Gạo thơm Vua Gạo ST25 túi 5kg vị dẻo, vị thơm đặc trưng sẽ kích thích vị giác giúp thưởng thức các món ăn khác tuyệt vời hơn. Gạo đảm bảo an toàn, không tẩy trắng, không chứa chất bảo quản. Túi 5kg phù hợp với cả gia đình.', '140000.00', 'gao-thom-vua-gao-st25-tui-5kg-202103131616343493.jpg', '5kg', 'Giống ST25', 'Vo gạo sạch bằng nước. Cho nước theo tỷ lệ 1 gạo-1 nước (ít nước). Lau khô nồi, cắm điện và nhấn nút. Dùng cơm ngon hơn khi còn nóng.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Vua Gạo', 'Việt Nam', 7, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(29, 'Gạo lức huyết rồng PMT túi 2kg', 'gao-luc-huyet-rong-pmt-tui-2kg', 'Hạt gạo màu đỏ, chứa nhiều chất xơ, giàu canxi, sắt... khi nấu, gạo nở vừa, chứa nhều chất dinh dưỡng, hỗ trợ và phòng chống ung thư, tăng cường hệ miễn dịch. Gạo lứt huyết rồng PMT túi 2kg của hãng gạo PMT không sử dụng chất bảo quản, chất kích thích tăng trưởng đảm bảo an toàn đến tay người dùng.', '78000.00', 'gao-luc-huyet-rong-pmt-tui-2kg-201912111120503715.jpg', '2kg', 'Gạo lứt huyết rồng', 'Vo gạo sạch bằng nước. Cho nước theo tỷ lệ 1 gạo-1 nước (ít nước). Lau khô nồi, cắm điện và nhấn nút. Dùng cơm ngon hơn khi còn nóng.', 'Nơi thoáng mát, nên dùng trong 1 tháng sau khi mở bao bì', 'PMT', 'Việt Nam', 7, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(30, 'Gia vị nêm sẵn lẩu Thái Aji-Quick gói 50g', 'gia-vi-nem-san-lau-thai-aji-quick-goi-50g', 'Là loại gia vị nêm sẵn hiện đang được rất nhiều người ưa chuộng của thương hiệu gia vị nêm sẵn Aji-Quick. Gia vị nêm sẵn nấu lẩu Thái Aji-Quick gói 50g là sự kết hợp hài hòa của tất cả các loại gia vị cần thiết, cho món lẩu thái chua cay đậm vị như ở nhà hàng ngay tại nhà.', '8400.00', 'gia-vi-nem-san-lau-thai-aji-quick-goi-55g-201911211600565745.jpg', '50g', 'Muối, đường, chất điều vị, me, ớt, chất điều chỉnh độ acid, riềng, dầu ăn, hương Tom Yum tổng hợp, chất chiết từ men, tiêu, phẩm màu, chất tạo ngọt, hương nấm tổng hợp. Sản phẩm có chứa sữa, tôm, cá, đậu phộng, đậu nành.', 'Phi thơm hành, tỏi với 6 - 7 muỗng canh dầu ăn bằng lửa nhỏ, thêm 1 trái cà chua cắt múi và 1/4 trái thơm cắt lát vào xào cho chín bằng lửa lớn. Cho 1,5 lít nước vào, đun sôi, cho gói gia vị vào, khuấy đều. Thêm vài tép sả đập dập và lá chanh vào. Đun sôi lại và thưởng thức. Thêm hải sản, rau tuỳ thích', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Aji-Quick', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(31, 'Xốt ướp thịt nướng Cholimex hũ 200g', 'xot-uop-thit-nuong-cholimex-hu-200g', 'Sản phẩm rất tiện dụng cho món thịt nướng vì tổng hợp đủ các gia vị như nước mắm, tỏi, hành, đường, muối ăn, mật ong, sả, tiêu, bột ngọt… Chỉ với 1 lượng xốt ướp vừa phải cùng với 1.5g thịt thì bạn sẽ có ngay món thịt nướng thơm ngon, đậm đà, khó cưỡng.', '22300.00', 'xot-uop-thit-nuong-cholimex-hu-200g-201911051032361300.jpg', '200g', 'Đường, nước, nước mắm (cá cơm, muối), hành, tỏi, dầu nành, mật ong, sả, tiêu, dầu mè, chất ổn định (1422), chất điều vị (621), phẩm màu tổng hợp', 'Ướp khoảng 1 giờ trước khi nướng hoặc chiên. Có thể ướp tôm, gà , thịt các loại,...', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Bảo quản trong ngăn mát tủ lạnh nếu không dùng hết', 'Cholimex', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(32, 'Gia vị hoàn chỉnh dạng xốt thịt kho Chinsu gói 70g', 'gia-vi-hoan-chinh-dang-xot-thit-kho-chinsu-goi-70g', 'Sản phẩm gia vị nêm sẵn kho thịt của thương hiệu gia vị nêm sẵn Chinsu giúp món ngon thấm gia vị, lên màu đẹp, bắt mắt. Gia vị hoàn chỉnh xốt thịt kho Chinsu gói 70g với sự kết hợp đầy đủ của nước màu, đường, muối và nước mắm, được phối trộn theo tỷ lệ chuẩn, giúp cho món thịt kho ngon chuẩn vị.', '6500.00', 'gia-vi-hoan-chinh-dang-xot-thit-kho-trung-chinsu-goi-70g-201905240016431259.jpg', '70g', 'Nước mắm (cá, muối, nước), nước, đường, hành tím, dầu thực vật, chất điều vị (621, 635), tỏi, muối, dextroza, hành tây, chất ổn định (1442, 471, 415), chất tạo màu (caramel (150a), paprika oleoresin tự nhiên), gia vị hỗn hợp, nước màu dừa, chất điều chỉnh độ axit (330), hương liệu tổng hợp, chất bảo quản (202), chất tạo ngọt acesulfame potassium tổng hợp, chất chống oxy hóa (320, 321)', 'Ướp 400g thịt với 1 gói xốt Chinsu thịt kho trong khoảng 10 phút. Cho thịt vào nồi, thêm khoảng 1 chén nước và đun sôi. Có thể thêm trứng luộc. Kho nhỏ lửa đến khi thịt mềm thấm vị, lên màu nâu vàng như ý.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Chinsu', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(33, 'Sốt lẩu Thái Cholimex chai 280g', 'sot-lau-thai-cholimex-chai-280g', 'Có thành phần gồm dầu ăn, tỏi, sả, gừng, riềng, lá chanh, me, ớt, đường, muối… Sản phẩm mang tới sự thơm ngon của những nguyên liệu tự nhiên, hương vị đậm đà, kích thích vị giác, phù hợp khẩu vị của người Việt Nam.', '20000.00', 'lau-thai-cholimex-chai-280g-201903170008408860.jfif', '280g', 'Dầu ăn, tỏi, sả, gừng, riềng, lá chanh, me, ớt, đường, muối ăn, nước, chất ổn định (1422), chất điều vị (621), chất điều chỉnh độ acid (330), (270), chất bảo quản (211)', 'Cho sốt vào 1,5 lít nước đun sôi. Thêm hải sản, rau tuỳ thích vào.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Cholimex', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(34, 'Nước chấm Đầu Bếp Tôm chai 900ml', 'nuoc-cham-dau-bep-tom-chai-900ml', 'Nước mắm của thương hiệu nước mắm Đầu Bếp Tôm được chế biến từ những con tôm tươi được tuyển chọn. Nước chấm Đầu Bếp Tôm chai 900ml được làm từ cốt tôm thật, với vị mặn dịu và ngọt nhẹ, giúp tăng thêm hương vị cho các món ăn hằng ngày.', '13000.00', 'nuoc-cham-dau-bep-tom-chai-900ml-202211040839259637.jpg', '900ml', 'Nước, nước mắm tôm (tôm, muối), muối, chất tạo ngọt tổng hợp, chất điều vị, chất điều chỉnh độ acid, chất bảo quản, màu tổng hợp, màu tự nhiên, hương tôm tổng hợp.', 'Chuyên dùng để chấm ăn sống hoặc chế biến các món ăn hằng ngày cho gia đình.', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Đầu Bếp Tôm', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(35, 'Nước mắm Nam Ngư 10 độ đạm chai 900ml', 'nuoc-mam-nam-ngu-10-do-dam-chai-900ml', 'Nước mắm Nam Ngư đem đến cho người tiêu dùng Việt Nam những giọt nước mắm thơm ngon, sự lựa chọn hàng đầu của người Việt. Nước mắm Nam Ngư 10 độ đạm chai 900ml với dây chuyền khép kín với thành phần cá cơm tươi ngon tạo nên hương vị thơm ngon, đậm đà, màu sắc hấp dẫn.', '56500.00', 'nuoc-mam-nam-ngu-10-do-dam-chai-900ml-202212050916530690.png', '900ml', 'Nước mắm cốt cá cơm, nước muối, đường, chất điều vị, chất điều chỉnh độ acid, hương cá hồi tổng hợp, chất ổn định, màu thực phẩm, chiết xuất trái dành dành, chất tạo ngọt tổng hợp, chất bảo quản', 'Dùng để chấm và nêm nếm món ăn', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Nam Ngư', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(36, 'Nước mắm cá cơm đặc sản Hưng Thịnh 40 độ đạm chai 750ml', 'nuoc-mam-ca-com-dac-san-hung-thinh-40-do-dam-chai-750ml', 'Nước mắm Hưng Thịnh được sản xuất từ cá cơm nguyên chất với phương pháp ủ chượp truyền thống. Nước mắm Hưng Thịnh đặc sản 40 độ đạm 750ml với hương vị đậm đà, đặc trưng của nước mắm cá cơm nguyên chất cùng độ đạm cao, mang đến những bữa ăn ngon, đậm vị.', '83200.00', 'nuoc-mam-hung-thinh-dac-san-40-do-dam-chai-750ml-201903151021148351.jpg', '750ml', 'Nước mắm cốt cá cơm 98%, chất điều vị, chất điều chỉnh độ acid', 'Dùng để chấm và nêm nếm món ăn', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Hưng Thịnh', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(37, 'Nước mắm cá cơm 584 Nha Trang 15 độ đạm can 2 lít', 'nuoc-mam-ca-com-584-nha-trang-15-do-dam-can-2-lit', 'Cá cơm, nước, muối, chất điều vị, phẩm màu, chất bảo quản', '48000.00', 'nuoc-mam-ca-com-584-nha-trang-15-do-dam-can-2-lit-202210212109289660.jpg', '750ml', 'Nước mắm cốt cá cơm 98%, chất điều vị, chất điều chỉnh độ acid', 'Dùng để chấm và nêm nếm món ăn', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', '584 Nha Trang', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(38, 'Muối ớt Guyumi hũ 110g', 'muoi-ot-guyumi-hu-110g', 'Muối tôm của thương hiệu muối Guyumi được tạo nên bởi hương vị ngọt của tôm, kết hợp với vị cay của ớt và gia vị, có độ mặn vừa phải, nguồn nguyên liệu sạch, tạo nên muối ớt kiểu Tây Ninh Guymi 110g thơm ngon, khó cưỡng.', '13000.00', 'muoi-ot-kieu-tay-ninh-guyumi-chai-110g-202101091722009078.jpg', '750ml', 'Muối khoáng, muối, đường, chất điều vị, tỏi, chiết xuất ớt', 'Dùng để chấm trái cây, rau củ tươi, rau củ luộc. Dùng để tẩm ướp cho thịt cá, hải sản nướng hoặc làm gia vị nêm cho các món xào, kho, canh', 'Bảo quản nơi khô ráo, thoáng mát và tránh ánh nắng trực tiếp. Đậy kín nắp sau khi sử dụng', 'Guyumi', 'Việt Nam', 4, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(39, 'Cá ngừ xốt cà chua Tuna Việt Nam hộp 140g', 'ca-ngu-xot-ca-chua-tuna-viet-nam-hop-140g', 'Cá ngừ xốt cà chua Tuna Việt Nam lon 140g của cá hộp Tuna Việt Nam với hơn 60% cá ngừ , hòa quyện với sốt cà chua đặc cùng các gia vị được tuyển chọn kĩ càng đã tạo nên một món cá hộp đầy bổ dưỡng, lạ miệng, phù hợp cho việc chế biến các món ăn trong gia đình hoặc đi dã ngoại du lịch.', '16600.00', 'ca-ngu-xot-ca-chua-tuna-viet-nam-lon-140g-202011051454163555.jpg', '140g', 'Cá ngừ 60%, nước 29.81%, cà chua cô đặc 2.27%, gia vị khác 7.92% bao gồm dầu nành, đường tinh luyện, dấm ăn, chất làm dầy, protein đậu nành, chất điều vị,...', 'Dùng ngày sau khi mở nắp, có thể làm nóng trước lại khi dùng hoặc chế biến thành các món ăn khác', 'Để nơi khô ráo, thoáng mát. Sau khi mở nắp, bảo quản ở nhiệt độ từ 0 - 5 độ C, dùng trong 24 giờ', 'Tuna Việt Nam', 'Việt Nam', 10, 0, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(40, 'Cá mòi sốt cà vị ớt cay Ligo hộp 155g', 'ca-moi-sot-ca-vi-ot-cay-ligo-hop-155g', 'Cá mòi sốt cà vị ớt cay Ligo hộp 155g với thành phần chính là cá mòi được chọn lọc kĩ càng, an toàn cho sức khỏe kết hợp với sốt cà chua đậm tạo nên món ăn hương vị cá hộp thơm ngon. Đặc biệt cá hộp Ligo có vị cay của ớt kích thích vị giác, tạo cảm giác ngon miệng.', '18000.00', 'ca-moi-sot-ca-vi-ot-cay-ligo-hop-155g-201905221108536465.jpg', '155g', 'Cá mòi 48 - 58%, nước sốt cà chua (paste cà chua, nước, bột bắp biến tính, muối i-ốt, đường, bột hành, bột tỏi, ớt) 42 - 52%.', 'Ăn liền hoặc chế biến thành các món ăn tuỳ thích', 'Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp', 'Ligo (Mỹ)', 'Philippines', 10, 0, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(41, 'Thịt áp chảo Ponnie hộp 340g', 'thit-ap-chao-ponnie-hop-340g', 'Thịt áp chảo Ponnie hộp 340g thơm ngon, hấp dẫn, có thể sử dụng để ăn liền hoặc ăn với cơm rất hấp dẫn. Heo hộp Ponnie là sản phẩm heo hộp được mọi người rất ưa chuộng, dinh dưỡng, tiện lợi.', '95000.00', 'thit-ap-chao-ponnie-hop-340g-202301141530060154.jpg', '340g', 'Thịt heo, nước, muối, chất ổn định, đường, chất điều vị, bột giấm và cần tây, bột gia vị, bột mì.', 'Ăn trực tiếp hoặc ăn kèm cơm, bánh mì, trộn salad', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ thường.', 'Ponnie (Hàn Quốc)', 'Hàn Quốc', 10, 0, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(42, '6 lon nước ngọt Pepsi Cola 320ml', '6-lon-nuoc-ngot-pepsi-cola-320ml', 'Từ thương hiệu nước ngọt có gas nổi tiếng toàn cầu - Pepsi - với mùi vị thơm ngon với hỗn hợp hương tự nhiên cùng chất tạo ngọt tổng hợp, giúp xua tan cơn khát và cảm giác mệt mỏi.  6 lon nước ngọt Pepsi Cola 320ml bổ sung năng lượng làm việc mỗi ngày. Cam kết sản phẩm chính hãng, chất lượng.', '54000.00', 'loc-6-lon-nuoc-ngot-pepsi-cola-330ml-202003201311477466.jfif', '320ml/6 lon', 'Có đường, có ga', 'Ngon hơn khi uống lạnh', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ lạnh.', 'Pepsi (Mỹ)', 'Việt Nam', 18, 10, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00'),
(43, '6 lon nước ngọt có ga Mirinda vị soda kem việt quất 320ml', '6-lon-nuoc-ngot-co-ga-mirinda-vi-soda-kem-viet-quat-320ml', 'Nước ngọt Mirinda vị soda kem việt quất là dòng sản phẩm nước ngọt mang đến cho bạn nguồn năng lượng mới mẻ với vị soda kem ngon bùng nổ cùng hương việt quất. Hãy mua lốc 6 lon nước ngọt Mirinda vị soda kem việt quất 320ml để thưởng thức và cảm nhận vị ngon đặc biệt nhé!', '62000.00', '6-lon-nuoc-ngot-co-ga-mirinda-vi-soda-kem-viet-quat-320ml-202204222251548830.jpg', '320ml/6 lon', 'Nước bão hòa CO2, đường, hỗn hợp vị soda kem và hương việt quất giống tự nhiên, chất điều chỉnh độ axit, chất ổn định, chất tạo ngọt tổng hợp, chất bảo quản, chất chống oxy hóa,...', 'Ngon hơn khi uống lạnh', 'Nơi khô ráo thoáng mát, tránh ánh nắng mặt trời.', 'Mirinda (Việt Nam)', 'Việt Nam', 10, 0, b'0', '2024-01-01 00:00:00', '2023-03-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=744 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `isDeleted`) VALUES
(1, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920304347.jpg', b'0'),
(2, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920311202.jpg', b'0'),
(3, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920317419.jpg', b'0'),
(4, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920321184.jpg', b'0'),
(5, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202110110920324936.jpg', b'0'),
(6, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202202111435531681.jpg', b'0'),
(7, 1, 'thung-30-goi-mi-hao-hao-tom-chua-cay-75g-202211181144401243.jpg', b'0'),
(8, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-202211181138546073.jpg', b'0'),
(9, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-202202111517241801.jpg', b'0'),
(10, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-201912091512050583.jpg', b'0'),
(11, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-201912091512053684.jpg', b'0'),
(12, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-201912091512056156.jpg', b'0'),
(13, 2, 'thung-30-goi-mi-3-mien-tom-chua-cay-65g-201912091512058497.jpg', b'0'),
(14, 2, 'mi-chua-cay-3-mien-65g-thung-4-org.jpg', b'0'),
(15, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316023474.jpg', b'0'),
(16, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202202101704465651.jpg', b'0'),
(17, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316162632.jpg', b'0'),
(18, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316188274.jpg', b'0'),
(19, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316201422.jpg', b'0'),
(20, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316211419.jpg', b'0'),
(21, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316225778.jpg', b'0'),
(22, 3, 'thung-30-goi-hu-tieu-nam-vang-cung-dinh-78g-202008181316233493.jpg', b'0'),
(23, 4, 'thung-30-goi-mi-khoai-tay-omachi-xot-bo-ham-80g-201912081340008681.jpg', b'0'),
(24, 4, 'thung-30-goi-mi-khoai-tay-omachi-xot-bo-ham-80g-202202120757304010.jpg', b'0'),
(25, 4, 'thung-30-goi-mi-khoai-tay-omachi-xot-bo-ham-80g-202210112203096587.jpg', b'0'),
(26, 4, '-202209200940563078.jpg', b'0'),
(27, 4, '-202209200940567793.jpg', b'0'),
(28, 4, '-202209200940583421.jpg', b'0'),
(29, 4, '-202209200941000082.jpg', b'0'),
(30, 4, '-202209200941004595.jpg', b'0'),
(31, 6, 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338517634.jpg', b'0'),
(32, 6, 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338521747.jpg', b'0'),
(33, 6, 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338527050.jpg', b'0'),
(34, 6, 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338529922.jpg', b'0'),
(35, 6, 'banh-gao-cat-lat-tokpokki-matamun-goi-600g-202010311338532564.jpg', b'0'),
(36, 7, 'bun-gio-heo-hang-nga-goi-75g-thung-30-3-org.jpg', b'0'),
(37, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-202202150955462652.jpg', b'0'),
(38, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-201912121045415628.jpg', b'0'),
(39, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-201912121045419341.jpg', b'0'),
(40, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-201912121045422092.jpg', b'0'),
(41, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-201912121045426875.jpg', b'0'),
(42, 7, 'thung-30-goi-bun-gio-heo-hang-nga-75g-201912121045429737.jpg', b'0'),
(43, 8, 'thung-24-lon-bia-heineken-silver-330ml-202205111635132939.jpg', b'0'),
(44, 8, 'thung-24-lon-bia-heineken-silver-330ml-202202101139462215.jpg', b'0'),
(45, 8, 'thung-24-lon-bia-heineken-silver-330ml-201903281046300671.jpg', b'0'),
(46, 8, 'thung-24-lon-bia-heineken-silver-330ml-201903281046301735.jpg', b'0'),
(47, 8, 'thung-24-lon-bia-heineken-silver-330ml-201910091038476393.jpg', b'0'),
(48, 8, 'thung-24-lon-bia-heineken-silver-330ml-201905221020252011.jpg', b'0'),
(49, 8, 'thung-24-lon-bia-heineken-silver-330ml-201903281046302976.jfif', b'0'),
(50, 0, '', b'0'),
(51, 0, '', b'0'),
(52, 0, '', b'0'),
(53, 0, '', b'0'),
(54, 0, '', b'0'),
(55, 0, '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `suppilier`
--

CREATE TABLE `suppilier` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `isDeleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppilier`
--

INSERT INTO `suppilier` (`id`, `name`, `address`, `phone`, `isDeleted`) VALUES
(1, 'nha cung cap', 'dia chi', '0123456', b'0'),
(2, '3 Miền', 'HCM, Việt Nam', '0123222223', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_product`
--
ALTER TABLE `discount_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_user_group`
--
ALTER TABLE `ex_user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `groups_permission`
--
ALTER TABLE `groups_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_detail`
--
ALTER TABLE `import_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_product`
--
ALTER TABLE `import_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_user_permission`
--
ALTER TABLE `in_user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`,`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppilier`
--
ALTER TABLE `suppilier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `discount_product`
--
ALTER TABLE `discount_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ex_user_group`
--
ALTER TABLE `ex_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `in_user_permission`
--
ALTER TABLE `in_user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
