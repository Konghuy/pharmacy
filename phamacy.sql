-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2018 at 06:29 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phamacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Tablets', 'tnam krab somrab leb', NULL, '2018-08-03 22:02:30', NULL, '2018-08-03 22:02:30'),
(2, 'injections', 'tnam jak , terb update', NULL, '2018-08-03 22:02:50', NULL, '2018-08-03 22:10:18'),
(3, 'Food supplement', 'food som rab health it was update', NULL, '2018-08-03 22:10:07', 1, '2018-08-07 05:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 4),
(10, '2014_10_12_100000_create_password_resets_table', 4),
(8, '2018_07_31_083719_create_table_test', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `remark` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_price` double DEFAULT NULL,
  `current_items_in_pack` int(11) DEFAULT NULL,
  `current_item_unit_cost` double DEFAULT NULL,
  `current_sub_items_in_item` int(11) DEFAULT NULL,
  `current_sub_item_unit_cost` double DEFAULT NULL,
  `current_qty` int(11) DEFAULT NULL,
  `order_items_in_pack` int(11) DEFAULT NULL,
  `order_sub_items_in_item` int(11) DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Box1', 'The first of the packages wash update', NULL, '2018-08-06 20:37:04', 1, '2018-08-09 06:43:43'),
(2, 'Box2', 'Sub items in Box1 was update', 1, '2018-08-06 21:01:30', 1, '2018-08-09 06:43:55'),
(3, 'Box3', 'Sub Item of Box 2', 1, '2018-08-07 05:00:27', 1, '2018-08-09 06:44:02'),
(4, 'mini-sub item', 'the last Item', 1, '2018-08-07 05:06:20', 1, '2018-08-09 06:43:37'),
(5, 'Tablet', 'test', 1, '2018-08-09 06:38:26', NULL, '2018-08-09 06:38:26'),
(6, 'Test', 'test', 1, '2018-08-09 07:01:16', NULL, '2018-08-09 07:01:16'),
(7, 'Kok dara', 'Ko item', 1, '2018-08-11 05:34:43', NULL, '2018-08-11 05:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Card Visa or Visa card', 'Use card for payment', 1, '2018-08-09 06:05:17', 1, '2018-08-09 06:09:47'),
(2, 'Cash', 'cash pay', 1, '2018-08-09 06:05:56', NULL, '2018-08-09 06:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_id` (`permission_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

DROP TABLE IF EXISTS `product_master`;
CREATE TABLE IF NOT EXISTS `product_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_code` varchar(255) DEFAULT NULL,
  `pro_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `items_in_pack` int(11) DEFAULT NULL,
  `item_unit_cost` double DEFAULT NULL,
  `items_in_pack_package_id` int(11) DEFAULT NULL,
  `sub_items_in_item` int(11) DEFAULT NULL,
  `sub_item_unit_cost` double DEFAULT NULL,
  `sub_items_in_item_package_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `manufacturing_date` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `rank_number_id` int(11) DEFAULT NULL,
  `remark` text,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`,`package_id`,`items_in_pack_package_id`,`sub_items_in_item_package_id`,`rank_number_id`),
  KEY `rack_number_id` (`rank_number_id`),
  KEY `package_id` (`package_id`),
  KEY `items_in_pack_package_id` (`items_in_pack_package_id`),
  KEY `sub_items_in_item_package_id` (`sub_items_in_item_package_id`),
  KEY `created_by` (`created_by`,`updated_at`,`deleted_by`),
  KEY `deleted_by` (`deleted_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `pro_code`, `pro_name`, `cat_id`, `package_id`, `items_in_pack`, `item_unit_cost`, `items_in_pack_package_id`, `sub_items_in_item`, `sub_item_unit_cost`, `sub_items_in_item_package_id`, `qty`, `price`, `discount`, `manufacturing_date`, `expiry_date`, `weight`, `rank_number_id`, `remark`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted`, `deleted_by`, `deleted_at`) VALUES
(5, '112233', 'Para update', 2, 1, 45, 120, NULL, 2, 12, 4, 25, 25, 0, '2000-12-11 17:00:00', '2018-12-11 17:00:00', '500', 1, 'Heklo', 1, '2018-08-07 07:24:38', 1, '2018-08-10 08:20:29', 0, NULL, NULL),
(6, '0001', 'Orio', 2, 6, 4, 15, NULL, NULL, NULL, NULL, 14, 16, 0.2, '2018-08-30 17:00:00', '2018-08-12 17:00:00', '500', 1, 'Test', 1, '2018-08-09 08:25:50', 1, '2018-08-10 09:07:03', 0, NULL, NULL),
(7, '001', 'Koko', 1, 1, 4, 15, 2, 5, 7, 3, 12, 16, 0.2, '2018-09-28 17:00:00', '2018-09-07 17:00:00', '500', 2, 'This is test', 1, '2018-08-09 08:57:57', 1, '2018-08-11 03:28:49', 0, NULL, NULL),
(8, '14522', 'Ka', 1, 1, 4, 15, NULL, NULL, NULL, 3, 12, 16, 0.2, '2018-09-07 17:00:00', '2018-09-07 17:00:00', '500', 2, 'ot let', 1, '2018-08-09 09:01:36', NULL, '2018-08-09 09:01:36', 0, NULL, NULL),
(9, '00122257', 'kado', 1, 1, 4, 15, 2, NULL, NULL, 3, 12, 16, 0.2, '2018-01-08 17:00:00', '2018-10-08 17:00:00', '500', 1, 'ot let', 1, '2018-08-09 09:03:37', 1, '2018-08-10 08:19:29', 0, NULL, NULL),
(10, '4895415', 'Kaka', 1, 1, 4, 15, 2, 5, 7, 3, 12, 16, 0.2, '2018-08-30 17:00:00', '2018-08-26 17:00:00', '500', 2, 'Otek', 1, '2018-08-09 09:05:19', 1, '2018-08-10 09:07:28', 0, NULL, NULL),
(11, '1444', 'Paracetamol', 1, 1, 4, 15, 2, 5, 15, 3, 12, 16, 0.2, '2018-10-07 17:00:00', '2022-10-07 17:00:00', '500', 3, 'para test', 1, '2018-08-10 04:30:11', NULL, '2018-08-10 04:30:12', 0, NULL, NULL),
(12, '1455', 'MOka', 2, NULL, NULL, NULL, 2, 5, 7, 3, 14, 16, 0.2, '2018-10-07 17:00:00', '2023-10-07 17:00:00', '500', 1, 'Nothing', 1, '2018-08-10 04:34:59', NULL, '2018-08-10 04:34:59', 0, NULL, NULL),
(13, '778', 'Kocacetal', 1, NULL, NULL, NULL, 2, 5, 7, 3, 14, 16, 0.2, '2018-10-07 17:00:00', '2023-10-07 17:00:00', '500', 2, 'Nothing', 1, '2018-08-10 04:42:15', NULL, '2018-08-10 04:42:15', 0, NULL, NULL),
(14, '778899', 'Seakheng', 1, 6, 4, 15, 2, 5, 7, 3, 12, 16, 0.2, '2018-10-07 17:00:00', '2033-10-07 17:00:00', '500', 1, 'Ot yol', 1, '2018-08-10 04:44:25', NULL, '2018-08-10 04:44:25', 0, NULL, NULL),
(15, '778866', 'Coca Cola', 3, NULL, NULL, NULL, NULL, NULL, NULL, 3, 12, 16, 0, '2018-10-07 17:00:00', '2022-10-07 17:00:00', '500', 1, 'ooo', 1, '2018-08-10 04:48:03', NULL, '2018-08-10 04:48:03', 0, NULL, NULL),
(16, '784255', 'Eyer', 2, 1, 4, 15, 2, 5, 7, 4, 12, 16, 1, '2018-10-24 17:00:00', '2022-10-27 17:00:00', '500', 1, 'It ok', 1, '2018-08-10 05:55:15', 1, '2018-08-11 03:29:34', 0, NULL, NULL),
(17, '998877', 'Ice green tea', 1, 1, 4, 15, NULL, NULL, NULL, 4, 14, 16, 0.2, '2018-08-10 17:00:00', '2027-08-10 17:00:00', '500', 3, 'Ach', 1, '2018-08-11 04:22:30', 1, '2018-08-11 04:23:18', 0, NULL, NULL),
(18, '69651', 'Ko item', 1, 7, NULL, NULL, 7, NULL, NULL, 7, 12, 16, 0.2, '2018-08-10 17:00:00', '2021-08-10 17:00:00', '500', 2, 'ko', 1, '2018-08-11 05:35:37', 1, '2018-08-11 05:35:56', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppiler_id` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `remark` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suppiler_id` (`suppiler_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `suppiler_id`, `discount`, `tax`, `payment_method_id`, `grand_total`, `remark`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 4, 0.2, 0.2, 1, 252.8, 'Otek', 1, '2018-08-09 09:05:19', NULL, '2018-08-09 09:05:19'),
(2, 1, 0.2, 0.2, 2, 297.8, 'para test', 1, '2018-08-10 04:30:12', NULL, '2018-08-10 04:30:12'),
(3, 1, 0.2, 2, 1, 234.8, 'Nothing', 1, '2018-08-10 04:34:59', NULL, '2018-08-10 04:34:59'),
(4, 2, 0.2, 2, 1, 234.8, 'Nothing', 1, '2018-08-10 04:42:15', NULL, '2018-08-10 04:42:15'),
(5, 1, 0.2, 2, 1, 252.8, 'Ot yol', 1, '2018-08-10 04:44:25', NULL, '2018-08-10 04:44:25'),
(6, 2, 0, 1, 2, 180, 'ooo', 1, '2018-08-10 04:48:03', NULL, '2018-08-10 04:48:03'),
(7, 5, 1, 2, 1, 252, 'It ok', 1, '2018-08-10 05:55:15', NULL, '2018-08-10 05:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

DROP TABLE IF EXISTS `purchase_item`;
CREATE TABLE IF NOT EXISTS `purchase_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_items_in_pack` int(11) DEFAULT NULL,
  `current_item_unit_cost` double DEFAULT NULL,
  `current_sub_items_in_item` int(11) DEFAULT NULL,
  `current_sub_item_unit_cost` double DEFAULT NULL,
  `current_qty` int(11) DEFAULT NULL,
  `current_price` double DEFAULT NULL,
  `purchase_items_in_pack` int(11) DEFAULT NULL,
  `purchase_items_unit_cost` double NOT NULL,
  `purchase_sub_items_in_item` int(11) DEFAULT NULL,
  `purchase_sub_items_unit_cost` int(11) NOT NULL,
  `purchase_qty` int(11) DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_id`, `product_id`, `current_items_in_pack`, `current_item_unit_cost`, `current_sub_items_in_item`, `current_sub_item_unit_cost`, `current_qty`, `current_price`, `purchase_items_in_pack`, `purchase_items_unit_cost`, `purchase_sub_items_in_item`, `purchase_sub_items_unit_cost`, `purchase_qty`, `purchase_price`) VALUES
(1, 5, 14, 0, 0, 0, 0, 0, 0, 4, 12, 5, 5, 12, 15),
(2, 7, 16, 0, 0, 0, 0, 0, 0, 4, 12, 5, 5, 12, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rank_number`
--

DROP TABLE IF EXISTS `rank_number`;
CREATE TABLE IF NOT EXISTS `rank_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank_number`
--

INSERT INTO `rank_number` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'India product', 'The best Quanlity.', 1, '2018-08-07 06:23:53', NULL, '2018-08-07 06:23:53'),
(2, 'Thai', 'The good production.', 1, '2018-08-07 06:24:17', NULL, '2018-08-07 06:24:17'),
(3, 'Cambodia', 'was update local product.', 1, '2018-08-07 06:24:29', 1, '2018-08-07 06:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Admin', 'Full Control, control all part of system.', NULL, '2018-08-03 21:12:16', NULL, '2018-08-03 21:18:54'),
(2, 'Saler', 'Sell product in stock.', NULL, '2018-08-03 21:13:00', 1, '2018-08-06 21:12:52'),
(3, 'Supplier', 'Someone who import product to systems.', NULL, '2018-08-03 21:19:44', NULL, '2018-08-03 21:19:44'),
(4, 'Stock', 'Someone control in stock was updated.', 1, '2018-08-06 21:09:39', 1, '2018-08-07 04:55:50'),
(5, 'Super Admin', 'Full Control', 1, '2018-08-08 07:44:53', NULL, '2018-08-08 07:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `contact` text,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `contact`, `phone`, `email`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Admin , Eyer', 'PP,Cambodia', '014452247', '014452247', 'kokdara@gmail.com', 1, '2018-08-03 08:09:51', 1, '2018-08-07 04:55:18'),
(2, 'Tang Konghuy', 'PP', 'PP', '012456465', 'konghuy99@gmail.com', NULL, '2018-08-03 02:41:28', NULL, '2018-08-03 02:41:28'),
(3, 'Tang Konghuy', 'PP', 'PP', '012545622', 'konghuy99@gmail.com', NULL, '2018-08-03 02:41:53', NULL, '2018-08-03 02:41:53'),
(4, 'Chan Dara', 'Cambodia', '01554236', '01554236', 'darakdok@gmail.com', NULL, '2018-08-03 02:45:20', NULL, '2018-08-03 20:48:01'),
(5, 'Sok Seakly', 'PP', '0154521141', '015455588', 'seakly@gmail.com', NULL, '2018-08-03 02:46:15', NULL, '2018-08-03 02:46:15'),
(6, 'Seakheng Thai', 'PP', 'PP', '015422545', 'henng@gmail.com', NULL, '2018-08-03 03:30:20', NULL, '2018-08-03 03:30:20'),
(7, 'Sok Tearareach', 'TK,VB', 'PP', '13456222', 'teara1506@gmail.com', NULL, '2018-08-03 05:49:18', 1, '2018-08-07 04:50:07'),
(8, 'Rathana Nob', 'PP', 'PP', '015422554', 'rathana@gmail.com', NULL, '2018-08-03 20:47:39', NULL, '2018-08-03 20:47:39'),
(9, 'Tang Konghuy', 'PP', 'PP', '015452245', 'konghuy99@gmail.com', 1, '2018-08-06 21:47:01', NULL, '2018-08-06 21:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'Dara kok', 'darakok@gmail.com', '123', 1, '2018-08-07 07:22:15', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tang konghuy', 'konghuy99@gmail.com', '$2y$10$FMi2H6ipDESyaOphbaNLb.9NZs5gji2VijgJQNsUhTUtDUZwMy2Eu', 'gevawspAAf0VxBufY5kG1phWwPBpCWwOVgF8mJzXssdjwDMNWnTkN4aac0L6', '2018-07-31 10:22:54', '2018-07-31 10:22:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_master_ibfk_2` FOREIGN KEY (`rank_number_id`) REFERENCES `rank_number` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_master_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_master_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`suppiler_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD CONSTRAINT `purchase_item_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
