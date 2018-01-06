-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2018 at 07:05 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faker`
--

-- --------------------------------------------------------

--
-- Table structure for table `mktk_attributes`
--

CREATE TABLE `mktk_attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_attributes`
--

INSERT INTO `mktk_attributes` (`attribute_id`, `attribute_name`, `status`) VALUES
(1, 'Color', 1),
(4, 'Size', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_gift`
--

CREATE TABLE `mktk_gift` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `gift_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_decription` longtext COLLATE utf8mb4_unicode_ci,
  `long_decription` longtext COLLATE utf8mb4_unicode_ci,
  `sell_price` double(8,2) NOT NULL DEFAULT '0.00',
  `active_price` double(8,2) NOT NULL DEFAULT '0.00',
  `special_price` double(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounted_price` double(8,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) DEFAULT NULL,
  `stock_status` int(11) DEFAULT '1',
  `lower_stock` int(11) DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT '1',
  `new_arrival` int(11) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT '0',
  `rating` decimal(2,1) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_gift`
--

INSERT INTO `mktk_gift` (`id`, `cat_id`, `created_by`, `gift_name`, `alias`, `gift_sku`, `short_decription`, `long_decription`, `sell_price`, `active_price`, `special_price`, `discount_type`, `discount_value`, `discounted_price`, `quantity`, `stock_status`, `lower_stock`, `featured`, `new_arrival`, `access`, `hits`, `rating`, `review`, `publish`, `meta_keywords`, `meta_des`, `created_at`, `updated_at`) VALUES
(21, 2, 1, 'My Gift RT RT', 'my-gift-rt-rt', 'my-gift-rt-rt', NULL, NULL, 1300.00, 1040.00, 0.00, 'percentage', '20', 1040.00, NULL, 1, NULL, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, '2017-12-20 05:09:50', '2017-12-28 02:59:38'),
(22, 2, 1, 'Data Gift', 'Data Gift', 'Data Gift', 'ddddddddddddd', 'dddddddddddddddd', 200.00, 200.00, 0.00, 'none', NULL, 0.00, 8, 1, 2, 1, 1, 1, 30, '3.0', NULL, 1, NULL, NULL, '2017-12-20 05:13:06', '2017-12-28 03:11:02'),
(23, 1, 1, 'Symphony Mobile M100', 'symphony-mobile-m100', 'symphony-mobile-m100', 'There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum Short description', 'There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum', 35000.00, 35000.00, 0.00, 'none', NULL, 0.00, 15, 1, 5, 1, 1, 1, 14, '2.8', NULL, 1, NULL, NULL, '2017-12-28 03:30:33', '2017-12-30 03:23:23'),
(24, 1, 1, 'New Theme Car', 'new-theme-car', 'new-theme-car', 'ssssssssss', 'saaaaaaaaaaaaaaa', 34000.00, 34000.00, 0.00, 'none', NULL, 0.00, 50, 1, 4, 1, 1, 1, 2, '5.0', NULL, 0, 'New Theme Car   1', 'New Theme Car 2', '2017-12-28 04:25:16', '2017-12-28 06:48:16'),
(25, 2, 1, 'Smart Watch', 'smart-watch', 'smart-watch', 'DES', 'DESS', 2000.00, 2000.00, 0.00, 'none', NULL, 0.00, 100, 1, 10, 1, 1, 1, 4, '4.5', NULL, 1, 'Hello Meta         Rion', 'Hello Description      Rion', '2017-12-28 04:55:14', '2017-12-28 07:04:07'),
(26, 2, 1, 'New Toyota Car', 'new-toyota-cars', 'new-toyota-car', NULL, NULL, 0.00, 0.00, 0.00, NULL, NULL, 0.00, NULL, 1, NULL, 1, 1, 1, 2, '3.5', NULL, 1, NULL, NULL, '2017-12-28 07:08:41', '2017-12-28 07:12:29'),
(27, 6, 1, 'new-toyota-car brand', 'new-toyota-car-brands', 'new-toyota-car-brand', NULL, NULL, 0.00, 0.00, 0.00, NULL, NULL, 0.00, NULL, 1, NULL, 0, 0, 1, 10, NULL, NULL, 1, NULL, NULL, '2017-12-28 07:11:56', '2017-12-28 07:15:59'),
(28, 7, 1, 'Smart Watch dal', 'smart-watchss', 'smart-watch-dal', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 2500.00, 2500.00, 0.00, 'none', NULL, 0.00, NULL, 1, NULL, 1, 0, 1, 16, '3.0', NULL, 1, NULL, NULL, '2017-12-28 07:20:47', '2018-01-03 01:39:42'),
(29, 1, 1, 'Samsung S40', 'samsung-s40', 'samsung-s40', NULL, NULL, 64000.00, 57600.00, 0.00, 'percentage', '10', 57600.00, NULL, 1, NULL, 1, 1, 1, 16, '3.5', NULL, 1, NULL, NULL, '2017-12-30 07:05:32', '2017-12-30 07:06:34'),
(30, 8, 1, 'Polo T-Shirt', 'polo-t-shirt', 'polo-t-shirt', NULL, NULL, 2000.00, 2000.00, 0.00, 'none', NULL, 0.00, 15, 1, 5, 1, 1, 1, 106, NULL, NULL, 1, NULL, NULL, '2018-01-03 01:49:11', '2018-01-03 01:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_gift_attribute`
--

CREATE TABLE `mktk_gift_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_gift_attribute`
--

INSERT INTO `mktk_gift_attribute` (`id`, `gift_id`, `attribute_id`, `value`, `additional_price`, `quantity`, `created_at`, `updated_at`) VALUES
(14, 30, 1, 'Black', '300', 22, NULL, NULL),
(15, 30, 1, 'Silver', '300', 10, NULL, NULL),
(21, 30, 4, '7 inch', '200', 12, NULL, NULL),
(23, 30, 4, '9 Inch', '200', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_gift_categories`
--

CREATE TABLE `mktk_gift_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_gift_categories`
--

INSERT INTO `mktk_gift_categories` (`id`, `name`, `alias`, `parent`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', 0, 0, '2017-12-16 18:00:00', NULL),
(2, 'Computer Accessories', 'computer-accessories', 0, 1, '2017-12-16 18:00:00', NULL),
(5, 'Beauty Kits', 'Beauty-Kits', 0, 1, NULL, NULL),
(6, 'Tour tickets', 'Tour-tickets', 0, 1, NULL, NULL),
(7, 'Wedding Accessories', 'wedding-accessories', 0, 1, NULL, NULL),
(8, 'New Catgeory', 'new-category', 0, 1, NULL, NULL),
(9, 'New Brana', 'New Brana', 0, 1, NULL, NULL),
(11, 'Trip Packages', 'trip-packages', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_gift_media`
--

CREATE TABLE `mktk_gift_media` (
  `media_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_image` varchar(200) NOT NULL,
  `default_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_gift_media`
--

INSERT INTO `mktk_gift_media` (`media_id`, `gift_id`, `gift_image`, `default_image`) VALUES
(25, 25, 'G4yXbfTzes67eVkTmjha.jpg', 1),
(26, 23, 'XRnviY4oa9oa0uAx37o4.jpg', 0),
(27, 23, 'I3tRwrDDT0tXTOyKMKXy.jpg', 1),
(28, 25, '70ak8w2FT4GXMwKWtxUZ.jpg', 0),
(29, 28, 'ReYa8hxsLYv0ePWWPY8W.jpg', 1),
(30, 23, 'joR2vvtt0VHMA3IcOMjD.jpg', NULL),
(31, 23, 'u8TzRww2dZ23ilNsv9Yx.jpg', NULL),
(32, 23, '3DSp6lf1DTkKtRV0MULc.jpg', NULL),
(33, 29, 'FMdvQ1U69oXQkioqtiH0.jpg', NULL),
(34, 29, '8bYWjdFJvgohp5Q6jHfs.jpg', 1),
(35, 22, 'WCTRf6ruBe1cIjVzEoTj.jpg', 1),
(37, 26, 'kHQ3UohVCPCHqzTAWjF4.jpg', NULL),
(38, 28, 'MWm0w8wd4J4NwUrute9L.jpg', NULL),
(39, 28, 'KJH6eWgdX3Jz9XrWnqbN.jpg', NULL),
(40, 28, '1vdX3o90BuHGw2FJEcDD.jpg', NULL),
(41, 28, 'FsKRXgkF0YJrbEiARMUc.jpg', NULL),
(42, 30, 'dTt94hpmzC3LAJ8vEGKm.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_gift_rating`
--

CREATE TABLE `mktk_gift_rating` (
  `id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rated_value` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_gift_rating`
--

INSERT INTO `mktk_gift_rating` (`id`, `gift_id`, `user_id`, `rated_value`) VALUES
(1, 1, 1, '3.5'),
(2, 2, 1, '1.5'),
(3, 2, 1, '1.0'),
(4, 2, 1, '1.5'),
(5, 2, 8, '2.5'),
(6, 23, 8, '1.0'),
(7, 23, 2, '4.5'),
(8, 29, 8, '3.5'),
(9, 28, 8, '3.0'),
(10, 26, 8, '3.5'),
(11, 25, 8, '4.5'),
(12, 24, 8, '5.0'),
(13, 22, 8, '3.0');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_manage_coupons`
--

CREATE TABLE `mktk_manage_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_value` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_newsletter_subscribers`
--

CREATE TABLE `mktk_newsletter_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_newsletter_subscribers`
--

INSERT INTO `mktk_newsletter_subscribers` (`subscriber_id`, `subscriber_email`, `status`, `created_at`) VALUES
(1, 'admin@metaedu.com', 1, '2017-12-31 00:09:58'),
(2, 'rion@metaedu.com', 1, '2017-12-31 00:13:01'),
(3, 'sakib@gmail.com', 1, '2017-12-31 00:15:44'),
(4, 'sakib@gmail.com', 1, '2017-12-31 00:15:58'),
(5, 'rion.mrk@gmail.com', 1, '2017-12-31 00:21:44'),
(6, 'khalid@gmail.com', 1, '2017-12-31 00:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_order`
--

CREATE TABLE `mktk_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `recipt_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_holder_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_price` double(8,2) NOT NULL,
  `main_total_price` double(8,2) NOT NULL,
  `total_sell_price` double(8,2) NOT NULL,
  `coupon_discount` double(8,2) DEFAULT NULL,
  `coupon_code` double(8,2) DEFAULT NULL,
  `discounted_total_price` double(8,2) DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_order_detail`
--

CREATE TABLE `mktk_order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_holder_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_no` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_shipping_address`
--

CREATE TABLE `mktk_shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `shipping_address` text,
  `country` varchar(11) DEFAULT NULL,
  `state` varchar(11) DEFAULT NULL,
  `city` varchar(11) DEFAULT NULL,
  `cell_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `additional_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mktk_shipping_address`
--

INSERT INTO `mktk_shipping_address` (`id`, `user_id`, `first_name`, `last_name`, `shipping_address`, `country`, `state`, `city`, `cell_number`, `email_address`, `additional_info`) VALUES
(1, 1, 'rion KR', 'Khondaker', 'Mirpur', 'Bangladesh', 'Dhaka', 'Dhakas', '0188888', 'shipp@gmail.com', 'My Additional Info'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'sHIPP', 'aDDRESS', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 'Zobair Khondaker', 'Rion', 'Mohammadpur, Dhaka', 'Bangladesh', 'Dhaka', 'Dhaka', '1783854089', 'rion.mrk@gmail.com', 'Personal Home'),
(6, 8, 'Rafsan', 'Chowdhury', 'Orchid Community Center, 3ed floor, Ave 6, Road 6', 'Bangladesh', 'Dhaka', 'Mohammadpur', '+8801783854089', 'apon.mac@gmail.com', 'Additional Information - Shipping Address');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_system_detail`
--

CREATE TABLE `mktk_system_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_system_detail`
--

INSERT INTO `mktk_system_detail` (`id`, `type`, `details`) VALUES
(1, 'system_title', 'My Gifts Title'),
(2, 'system_email', 'apon.mac@gmail.com'),
(3, 'cell_no', '+88 01783854084'),
(4, 'telephone', '+131028378873'),
(5, 'address', 'Mohammadpur, Dhaka'),
(6, 'image', 'sVc8o8uLtI3QAsufTu09.png'),
(7, 'system_offline', '1'),
(8, 'coupon_service', '1'),
(9, 'description', 'details data description  -rion'),
(10, 'meta_key_word', 'meta_key_word details rion'),
(11, 'meta_description', 'meta_description details rion'),
(12, 'currency_name', 'bd'),
(13, 'currency_symbol', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_users`
--

CREATE TABLE `mktk_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `veryfiy_status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_users`
--

INSERT INTO `mktk_users` (`id`, `user_name`, `user_email`, `password`, `user_type`, `veryfiy_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'shovon@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 8, 0, '3be756b5243f8dc3f2fb410d353784a9', '2017-12-14 03:13:07', NULL),
(4, 'Vendor2', 'vendor2@gmail.com', NULL, 3, 0, 'c40707ff09ce9db1bd6bf0769560a2c9', '2017-12-14 03:54:29', NULL),
(6, NULL, 'rion.mfrk@gmail.com', NULL, 2, 0, '3be756b5243f8dc3f2fb410d353784a9', '2017-12-16 23:33:59', NULL),
(7, NULL, 'ashik@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 0, '89c9aa9bf0654476dcfadc80183fa45f', '2017-12-17 23:47:16', NULL),
(8, NULL, 'sr.rafsan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 0, 'a287b653980ad8827661557f1fb3ebb9', '2017-12-19 22:46:46', NULL),
(9, NULL, 'shafis@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 0, '2c8aa85f71c36ef96a519eb2a680b0d5', '2017-12-23 04:29:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_users_detail`
--

CREATE TABLE `mktk_users_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_smart_points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_users_detail`
--

INSERT INTO `mktk_users_detail` (`id`, `user_id`, `first_name`, `last_name`, `cell_no`, `address`, `country`, `state`, `city_name`, `zip_code`, `birth_date`, `gender`, `profession`, `intro_text`, `blood_group`, `image`, `total_smart_points`, `created_at`, `updated_at`) VALUES
(1, 1, 'RIOn', NULL, '017873647859', 'Address', NULL, NULL, NULL, NULL, '1991-01-01', 1, NULL, NULL, 'A+', '0HtZRp5LxCHYqygyvBv9.png', NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'Dhaka', 'Bye', '019355567', 'ADDRESS', NULL, NULL, NULL, NULL, '1991-01-01', 1, NULL, NULL, 'A+', 'VdrCGhRZqUytbfTqkTDI.jpg', NULL, NULL, NULL),
(5, 6, 'Zobair Khondaker', 'Rion', '01783854089', 'Mohammadpur, Dhaka', 'Bangladesh', 'Dhaka', 'Dhaka', '1207', '1991-01-01', 1, '2', 'This is About Rion K', 'O+', '1lVv6fPjgirMRQhrfewi.jpg', NULL, NULL, NULL),
(6, 8, 'Rafsan', 'Chowdhury', '+8801783854088', 'Orchid Community Center, 3ed floor, Ave 6, Road 6', 'Bangladesh', 'Dhaka', 'Mirpur', '1216', '1991-01-01', 2, '2', 'This is some information about me', 'O+', 'HQq4Pv0hXD0CgE3oZqxw.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_users_smart_point`
--

CREATE TABLE `mktk_users_smart_point` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_users_vendor`
--

CREATE TABLE `mktk_users_vendor` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compnay_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_users_vendor`
--

INSERT INTO `mktk_users_vendor` (`id`, `user_id`, `first_name`, `last_name`, `personal_address`, `cell_no`, `company_name`, `compnay_address`, `business_type`, `intro_text`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 9, 'Shafis', 'Ahmed', 'Address', '01899999', 'Metakave', 'Mirpur', 'IT farm', 'Intro text', 'ikmQa9iVZiNn9Lyx4I9l.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_user_cart`
--

CREATE TABLE `mktk_user_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_holder_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_user_coupons`
--

CREATE TABLE `mktk_user_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_user_settings`
--

CREATE TABLE `mktk_user_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activation` int(11) NOT NULL DEFAULT '1',
  `email_notification` int(11) NOT NULL DEFAULT '1',
  `newsletter_subscription` int(11) NOT NULL DEFAULT '1',
  `interested_in` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_user_settings`
--

INSERT INTO `mktk_user_settings` (`id`, `user_id`, `activation`, `email_notification`, `newsletter_subscription`, `interested_in`) VALUES
(1, 6, 0, 1, 1, NULL),
(2, 4, 0, 1, 1, NULL),
(3, 7, 0, 1, 1, NULL),
(4, 8, 1, 0, 0, NULL),
(5, 9, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mktk_user_wish_list`
--

CREATE TABLE `mktk_user_wish_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `wish_list_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `bride_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_details` text COLLATE utf8mb4_unicode_ci,
  `access` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` int(11) DEFAULT '1',
  `access_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mktk_user_wish_list`
--

INSERT INTO `mktk_user_wish_list` (`id`, `user_id`, `type`, `wish_list_name`, `event_date`, `no_of_people`, `bride_name`, `groom_name`, `event_venue`, `event_details`, `access`, `status`, `access_code`, `created_date`, `updated_date`) VALUES
(1, 8, 1, 'gfgdd', '2018-03-03', 100, NULL, NULL, 'gvxsdvgxsdg', 'sgfsgsdg', 'private', 1, '6', '2018-01-02 12:05:59', NULL),
(2, 8, 12, 'sfvsd', '2018-03-03', 100, NULL, NULL, 'rhfhfttfryh', 'rthtfrhrfhrr', 'private', 1, '645419', '2018-01-02 12:05:59', '2018-01-03 01:32:22'),
(3, 8, 6, 'rrrr', '2018-03-03', 100, NULL, NULL, 'dgdgd', 'dgfdgdg', 'private', 1, '656572', '2018-01-02 12:05:59', '2018-01-03 01:25:56'),
(5, 8, 10, 'Wedding', '2018-03-03', 100092, NULL, NULL, 'address venue', 'details venue', 'private', 1, '294824', '2018-01-02 12:07:24', NULL),
(6, 8, 6, 'My WeddingS', '2018-03-03', 500, NULL, NULL, 'Mirpur Community Center', 'Mirpur Community Center events', 'private', 1, '568630', '2018-01-02 12:14:26', '2018-01-03 01:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `mktk_user_wish_list_gift`
--

CREATE TABLE `mktk_user_wish_list_gift` (
  `id` int(10) UNSIGNED NOT NULL,
  `wishlist_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mktk_wishlist_category`
--

CREATE TABLE `mktk_wishlist_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mktk_wishlist_category`
--

INSERT INTO `mktk_wishlist_category` (`id`, `category_name`, `category_alias`) VALUES
(6, 'Wedding Ceremony', 'wedding-ceremony'),
(11, 'Birthday Party', 'birthday-party'),
(12, 'Party/Celebration', 'party-celebration'),
(13, 'Other', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mktk_attributes`
--
ALTER TABLE `mktk_attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `mktk_gift`
--
ALTER TABLE `mktk_gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_gift_attribute`
--
ALTER TABLE `mktk_gift_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_gift_categories`
--
ALTER TABLE `mktk_gift_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_gift_category_gift_name_unique` (`name`),
  ADD UNIQUE KEY `mktk_gift_category_alias_unique` (`alias`);

--
-- Indexes for table `mktk_gift_media`
--
ALTER TABLE `mktk_gift_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `mktk_gift_rating`
--
ALTER TABLE `mktk_gift_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_manage_coupons`
--
ALTER TABLE `mktk_manage_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_manage_coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `mktk_newsletter_subscribers`
--
ALTER TABLE `mktk_newsletter_subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `mktk_order`
--
ALTER TABLE `mktk_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_order_order_number_unique` (`order_number`),
  ADD UNIQUE KEY `mktk_order_recipt_no_unique` (`recipt_no`),
  ADD UNIQUE KEY `mktk_order_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `mktk_order_detail`
--
ALTER TABLE `mktk_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_order_detail_gift_sku_unique` (`gift_sku`);

--
-- Indexes for table `mktk_shipping_address`
--
ALTER TABLE `mktk_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_system_detail`
--
ALTER TABLE `mktk_system_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_users`
--
ALTER TABLE `mktk_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `mktk_users_user_name_unique` (`user_name`);

--
-- Indexes for table `mktk_users_detail`
--
ALTER TABLE `mktk_users_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_users_smart_point`
--
ALTER TABLE `mktk_users_smart_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_users_vendor`
--
ALTER TABLE `mktk_users_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_user_cart`
--
ALTER TABLE `mktk_user_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_user_coupons`
--
ALTER TABLE `mktk_user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_user_settings`
--
ALTER TABLE `mktk_user_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_user_wish_list`
--
ALTER TABLE `mktk_user_wish_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mktk_user_wish_list_access_code_unique` (`access_code`);

--
-- Indexes for table `mktk_user_wish_list_gift`
--
ALTER TABLE `mktk_user_wish_list_gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mktk_wishlist_category`
--
ALTER TABLE `mktk_wishlist_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mktk_attributes`
--
ALTER TABLE `mktk_attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mktk_gift`
--
ALTER TABLE `mktk_gift`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `mktk_gift_attribute`
--
ALTER TABLE `mktk_gift_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mktk_gift_categories`
--
ALTER TABLE `mktk_gift_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mktk_gift_media`
--
ALTER TABLE `mktk_gift_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `mktk_gift_rating`
--
ALTER TABLE `mktk_gift_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mktk_manage_coupons`
--
ALTER TABLE `mktk_manage_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mktk_newsletter_subscribers`
--
ALTER TABLE `mktk_newsletter_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mktk_order`
--
ALTER TABLE `mktk_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mktk_order_detail`
--
ALTER TABLE `mktk_order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mktk_shipping_address`
--
ALTER TABLE `mktk_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mktk_system_detail`
--
ALTER TABLE `mktk_system_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mktk_users`
--
ALTER TABLE `mktk_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mktk_users_detail`
--
ALTER TABLE `mktk_users_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mktk_users_vendor`
--
ALTER TABLE `mktk_users_vendor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mktk_user_settings`
--
ALTER TABLE `mktk_user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mktk_user_wish_list`
--
ALTER TABLE `mktk_user_wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mktk_wishlist_category`
--
ALTER TABLE `mktk_wishlist_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
