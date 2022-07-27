-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myqueennew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Image_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image_ch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ware_house_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `ware_house_id`, `name`, `detail`, `address`, `pincode`, `country`, `created_at`, `updated_at`) VALUES
(3, 1, 'asdasd', 'asd', 'Debasis', '123123', 'Aruba', '2021-10-20 17:14:38', '2021-10-20 18:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(26, 27, 7, 10, '2022-02-19 01:02:47', '2022-02-19 01:02:47'),
(27, 29, 7, 1, '2022-02-19 01:19:02', '2022-02-19 01:19:02'),
(32, 43, 7, 3, '2022-02-28 04:11:21', '2022-02-28 04:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forcasts`
--

CREATE TABLE `forcasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderid` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_29_065821_create_referals_table', 1),
(6, '2022_01_31_120303_create_pv_points_table', 1),
(8, '2022_02_07_055007_create_rankings_table', 1),
(9, '2022_02_07_070022_create_products_table', 1),
(10, '2022_02_07_120928_create_carts_table', 1),
(11, '2022_02_10_073156_create_shipping_charges_table', 1),
(12, '2022_02_10_102305_create_coupons_table', 1),
(13, '2022_02_10_111215_create_orders_table', 1),
(14, '2022_02_10_120614_create_offline_pays_table', 1),
(15, '2022_02_10_120629_create_m_c_t_pays_table', 1),
(16, '2022_02_10_120643_create_order_items_table', 1),
(17, '2022_02_10_134158_create_admins_table', 1),
(18, '2022_02_10_150104_create_billings_table', 1),
(19, '2022_02_10_150224_create_shippings_table', 1),
(20, '2022_02_10_150600_create_self_picks_table', 1),
(21, '2022_02_11_092857_create_banners_table', 1),
(22, '2022_02_11_120400_create_promotions_table', 1),
(23, '2022_02_03_105902_create_mlm_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_users`
--

CREATE TABLE `mlm_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponser_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placement_id_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mlm_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mlm_users`
--

INSERT INTO `mlm_users` (`id`, `user_id`, `branch_id`, `member_id`, `qrcode`, `postcode`, `nationality`, `sponser_id`, `placement_id`, `placement`, `birthday`, `referal_code`, `gender`, `country`, `state`, `mobile_no`, `email_id`, `contact_address`, `account_holder`, `bank_name`, `payment_information`, `branch`, `account_no`, `placement_id_type`, `mlm_status`, `left_id`, `right_id`, `created_at`, `updated_at`) VALUES
(19, 'MQU0000060', 'singapore', 'MLM0000003', '/referal_qr_code/img-1648463290.png', '638455', '638455', 'MQU0000058', NULL, NULL, '2022-03-25', 'MQRF0000074', 'female', 'India', 'Tripura', '8870296295', 'nandhutamil1997@gmail.com', '155/179A,second Street,Minnave\r\nSalangapalayam', 'nandhu', 'DBS', 'VIET', 'Erode', '6677888889', NULL, '1', NULL, NULL, '2022-03-28 04:57:44', '2022-03-28 04:58:10'),
(20, 'MQU0000061', 'singapore', 'MLM0000004', '/referal_qr_code/img-1648475471.png', '638455', '638455', 'MQU0000001', NULL, NULL, '2022-03-03', 'MQRF0000001', 'male', 'India', 'Tamil Nadu', '8870296295', 'nandhutamil1997@gmail.com', '155/179A,second Street,Minnave\r\nSalangapalayam', 'vicky', 'DBS', 'NZ', 'Erode', '6677888889', NULL, '1', NULL, NULL, '2022-03-28 08:20:19', '2022-03-28 08:21:11'),
(21, 'MQU0000062', 'singapore', 'MLM0000005', '/referal_qr_code/img-1648475764.png', '638455', '638455', 'MQU0000061', NULL, NULL, '2022-03-16', 'MQRF0000077', 'female', 'India', 'Tamil Nadu', '8870296295', 'nandhuchills@gmail.com', '155/179A,second Street,Minnave\r\nSalangapalayam', 'nandhu', 'DBS', 'KR', 'kolkata', '5676776', NULL, '1', NULL, NULL, '2022-03-28 08:25:25', '2022-03-28 08:26:04'),
(22, 'MQU0000064', 'singapore', 'MLM0000006', '/referal_qr_code/img-1648532201.png', '638455', '638455', 'MQU0000063', 'MQU0000001', '0', '2022-03-12', 'MQRF0000079', 'female', 'India', 'Tamil Nadu', '8870296295', 'nandhutamil1997@gmail.com', '155/179A,second Street,Minnave\r\nSalangapalayam', 'vicky', 'DBS', 'NZ', 'chennai', '6677888889', NULL, '1', 'MQU0000064', NULL, '2022-03-29 00:06:06', '2022-03-29 00:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `m_c_t_pays`
--

CREATE TABLE `m_c_t_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_c_t_pays`
--

INSERT INTO `m_c_t_pays` (`id`, `user_id`, `order_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '88.00', 0, '2022-02-14 06:21:23', '2022-02-14 06:21:23'),
(2, 16, 2, '528.00', 0, '2022-02-14 08:02:41', '2022-02-14 08:02:41'),
(3, 16, 3, '528.00', 0, '2022-02-14 08:55:25', '2022-02-14 08:55:25'),
(4, 16, 4, '616.00', 0, '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(5, 16, 5, '176.00', 0, '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(6, 1, 6, '176.00', 0, '2022-02-16 02:36:23', '2022-02-16 02:36:23'),
(7, 1, 7, '0.00', 0, '2022-02-16 02:37:00', '2022-02-16 02:37:00'),
(8, 1, 8, '88.00', 0, '2022-02-16 02:37:50', '2022-02-16 02:37:50'),
(9, 1, 9, '0.00', 0, '2022-02-16 02:37:50', '2022-02-16 02:37:50'),
(10, 1, 10, '0.00', 0, '2022-02-16 02:37:53', '2022-02-16 02:37:53'),
(11, 1, 11, '88.00', 0, '2022-02-16 06:12:39', '2022-02-16 06:12:39'),
(12, 1, 12, '88.00', 0, '2022-02-16 06:15:53', '2022-02-16 06:15:53'),
(13, 1, 13, '0.00', 0, '2022-02-16 06:16:04', '2022-02-16 06:16:04'),
(14, 1, 14, '0.00', 0, '2022-02-16 06:18:19', '2022-02-16 06:18:19'),
(15, 1, 15, '88.00', 0, '2022-02-16 06:21:36', '2022-02-16 06:21:36'),
(16, 1, 16, '88.00', 0, '2022-02-16 06:24:40', '2022-02-16 06:24:40'),
(17, 1, 17, '88.00', 0, '2022-02-16 06:25:30', '2022-02-16 06:25:30'),
(18, 1, 18, '88.00', 0, '2022-02-16 06:26:11', '2022-02-16 06:26:11'),
(19, 1, 19, '88.00', 0, '2022-02-16 06:31:00', '2022-02-16 06:31:00'),
(20, 1, 20, '88.00', 0, '2022-02-16 06:32:40', '2022-02-16 06:32:40'),
(21, 23, 21, '616.00', 0, '2022-02-17 05:27:42', '2022-02-17 05:27:42'),
(22, 39, 23, '264.00', 0, '2022-02-28 00:51:56', '2022-02-28 00:51:56'),
(23, 41, 24, '88.00', 0, '2022-02-28 03:53:31', '2022-02-28 03:53:31'),
(24, 41, 25, '0.00', 0, '2022-02-28 03:56:20', '2022-02-28 03:56:20'),
(25, 44, 26, '616.00', 0, '2022-02-28 04:31:16', '2022-02-28 04:31:16'),
(26, 44, 27, '0.00', 0, '2022-02-28 04:31:32', '2022-02-28 04:31:32'),
(27, 46, 37, '0.00', 0, '2022-02-28 05:03:04', '2022-02-28 05:03:04'),
(28, 49, 8, '880.00', 0, '2022-03-16 06:00:38', '2022-03-16 06:00:38'),
(29, 50, 9, '1320.00', 0, '2022-03-16 06:03:35', '2022-03-16 06:03:35'),
(30, 52, 10, '1408.00', 0, '2022-03-16 06:30:26', '2022-03-16 06:30:26'),
(31, 53, 11, '880.00', 0, '2022-03-16 06:36:19', '2022-03-16 06:36:19'),
(32, 55, 12, '880.00', 0, '2022-03-16 06:51:15', '2022-03-16 06:51:15'),
(33, 56, 13, '880.00', 0, '2022-03-16 21:51:35', '2022-03-16 21:51:35'),
(34, 65, 14, '880.00', 0, '2022-03-21 12:00:24', '2022-03-21 12:00:24'),
(35, 65, 15, '0.00', 0, '2022-03-21 12:03:36', '2022-03-21 12:03:36'),
(36, 69, 16, '880.00', 0, '2022-03-21 12:37:49', '2022-03-21 12:37:49'),
(37, 69, 17, '880.00', 0, '2022-03-21 12:39:04', '2022-03-21 12:39:04'),
(38, 69, 18, '0.00', 0, '2022-03-21 12:40:19', '2022-03-21 12:40:19'),
(39, 69, 19, '0.00', 0, '2022-03-21 12:41:44', '2022-03-21 12:41:44'),
(40, 69, 20, '0.00', 0, '2022-03-21 12:42:31', '2022-03-21 12:42:31'),
(41, 69, 21, '0.00', 0, '2022-03-21 12:44:43', '2022-03-21 12:44:43'),
(42, 72, 23, '880.00', 0, '2022-03-21 21:50:11', '2022-03-21 21:50:11'),
(43, 72, 24, '0.00', 0, '2022-03-21 21:50:21', '2022-03-21 21:50:21'),
(44, 72, 25, '0.00', 0, '2022-03-21 21:50:23', '2022-03-21 21:50:23'),
(45, 72, 26, '0.00', 0, '2022-03-21 21:50:38', '2022-03-21 21:50:38'),
(46, 72, 27, '0.00', 0, '2022-03-21 21:53:00', '2022-03-21 21:53:00'),
(47, 72, 28, '0.00', 0, '2022-03-21 21:53:06', '2022-03-21 21:53:06'),
(48, 72, 29, '0.00', 0, '2022-03-21 21:54:00', '2022-03-21 21:54:00'),
(49, 72, 30, '0.00', 0, '2022-03-21 22:10:47', '2022-03-21 22:10:47'),
(50, 72, 31, '0.00', 0, '2022-03-21 22:10:52', '2022-03-21 22:10:52'),
(51, 72, 32, '0.00', 0, '2022-03-21 22:11:17', '2022-03-21 22:11:17'),
(52, 72, 33, '0.00', 0, '2022-03-21 22:11:22', '2022-03-21 22:11:22'),
(53, 72, 34, '0.00', 0, '2022-03-21 22:12:29', '2022-03-21 22:12:29'),
(54, 72, 35, '0.00', 0, '2022-03-21 22:12:34', '2022-03-21 22:12:34'),
(55, 72, 36, '0.00', 0, '2022-03-21 22:17:41', '2022-03-21 22:17:41'),
(56, 72, 37, '0.00', 0, '2022-03-21 22:17:47', '2022-03-21 22:17:47'),
(57, 74, 38, '880.00', 0, '2022-03-21 22:50:02', '2022-03-21 22:50:02'),
(58, 75, 39, '880.00', 0, '2022-03-21 22:55:55', '2022-03-21 22:55:55'),
(59, 75, 40, '0.00', 0, '2022-03-21 22:56:02', '2022-03-21 22:56:02'),
(60, 75, 41, '0.00', 0, '2022-03-21 22:56:10', '2022-03-21 22:56:10'),
(61, 76, 42, '1144.00', 0, '2022-03-21 23:03:01', '2022-03-21 23:03:01'),
(62, 77, 43, '880.00', 0, '2022-03-22 00:23:45', '2022-03-22 00:23:45'),
(63, 79, 44, '880.00', 0, '2022-03-26 01:19:59', '2022-03-26 01:19:59'),
(64, 80, 45, '880.00', 0, '2022-03-27 10:44:46', '2022-03-27 10:44:46'),
(65, 80, 46, '0.00', 0, '2022-03-27 10:44:59', '2022-03-27 10:44:59'),
(66, 80, 47, '0.00', 0, '2022-03-27 10:45:09', '2022-03-27 10:45:09'),
(67, 80, 48, '0.00', 0, '2022-03-27 10:45:43', '2022-03-27 10:45:43'),
(68, 81, 49, '880.00', 0, '2022-03-27 11:40:03', '2022-03-27 11:40:03'),
(69, 82, 50, '880.00', 0, '2022-03-27 12:27:01', '2022-03-27 12:27:01'),
(70, 82, 51, '0.00', 0, '2022-03-27 12:32:21', '2022-03-27 12:32:21'),
(71, 82, 52, '880.00', 0, '2022-03-27 12:33:03', '2022-03-27 12:33:03'),
(72, 82, 53, '0.00', 0, '2022-03-27 12:33:10', '2022-03-27 12:33:10'),
(73, 82, 54, '0.00', 0, '2022-03-27 12:33:18', '2022-03-27 12:33:18'),
(74, 82, 55, '0.00', 0, '2022-03-27 12:35:15', '2022-03-27 12:35:15'),
(75, 82, 56, '880.00', 0, '2022-03-27 12:35:56', '2022-03-27 12:35:56'),
(76, 82, 57, '880.00', 0, '2022-03-27 12:39:23', '2022-03-27 12:39:23'),
(77, 82, 58, '0.00', 0, '2022-03-27 12:39:29', '2022-03-27 12:39:29'),
(78, 82, 59, '0.00', 0, '2022-03-27 12:39:30', '2022-03-27 12:39:30'),
(79, 82, 60, '0.00', 0, '2022-03-27 12:39:38', '2022-03-27 12:39:38'),
(80, 82, 61, '0.00', 0, '2022-03-27 12:39:55', '2022-03-27 12:39:55'),
(81, 82, 62, '880.00', 0, '2022-03-27 12:43:09', '2022-03-27 12:43:09'),
(82, 82, 63, '0.00', 0, '2022-03-27 12:43:38', '2022-03-27 12:43:38'),
(83, 82, 64, '0.00', 0, '2022-03-27 12:44:24', '2022-03-27 12:44:24'),
(84, 83, 65, '880.00', 0, '2022-03-27 22:24:35', '2022-03-27 22:24:35'),
(85, 84, 66, '880.00', 0, '2022-03-27 22:30:31', '2022-03-27 22:30:31'),
(86, 85, 67, '880.00', 0, '2022-03-27 23:03:09', '2022-03-27 23:03:09'),
(87, 86, 68, '1760.00', 0, '2022-03-27 23:11:38', '2022-03-27 23:11:38'),
(88, 87, 69, '1760.00', 0, '2022-03-27 23:17:10', '2022-03-27 23:17:10'),
(89, 88, 70, '1760.00', 0, '2022-03-28 02:49:27', '2022-03-28 02:49:27'),
(90, 89, 71, '880.00', 0, '2022-03-28 04:28:59', '2022-03-28 04:28:59'),
(91, 90, 72, '1320.00', 0, '2022-03-28 04:38:47', '2022-03-28 04:38:47'),
(92, 91, 73, '880.00', 0, '2022-03-28 04:58:10', '2022-03-28 04:58:10'),
(93, 92, 74, '880.00', 0, '2022-03-28 08:21:10', '2022-03-28 08:21:10'),
(94, 93, 75, '1320.00', 0, '2022-03-28 08:26:04', '2022-03-28 08:26:04'),
(95, 95, 76, '880.00', 0, '2022-03-29 00:06:40', '2022-03-29 00:06:40'),
(96, 95, 77, '880.00', 0, '2022-03-29 00:08:06', '2022-03-29 00:08:06'),
(97, 95, 78, '880.00', 0, '2022-03-29 00:14:41', '2022-03-29 00:14:41'),
(98, 95, 79, '880.00', 0, '2022-03-29 00:15:53', '2022-03-29 00:15:53'),
(99, 95, 80, '880.00', 0, '2022-03-29 00:18:10', '2022-03-29 00:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `offline_pays`
--

CREATE TABLE `offline_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `screen_shot` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offline_pays`
--

INSERT INTO `offline_pays` (`id`, `user_id`, `order_id`, `screen_shot`, `status`, `created_at`, `updated_at`) VALUES
(1, 44, 30, 'Offline_pay/order_id_30.jpg', 0, '2022-02-28 04:35:03', '2022-02-28 04:35:03'),
(2, 44, 31, 'Offline_pay/order_id_31.png', 0, '2022-02-28 04:37:41', '2022-02-28 04:37:41'),
(3, 44, 32, 'Offline_pay/order_id_32.png', 0, '2022-02-28 04:40:12', '2022-02-28 04:40:12'),
(4, 44, 33, 'Offline_pay/order_id_33.png', 0, '2022-02-28 04:42:56', '2022-02-28 04:42:56'),
(5, 44, 34, 'Offline_pay/order_id_34.png', 0, '2022-02-28 04:45:33', '2022-02-28 04:45:33'),
(6, 44, 35, 'Offline_pay/order_id_35.png', 0, '2022-02-28 04:52:13', '2022-02-28 04:52:13'),
(7, 46, 36, 'Offline_pay/order_id_36.png', 0, '2022-02-28 05:02:55', '2022-02-28 05:02:55'),
(8, 46, 38, 'Offline_pay/order_id_38.png', 0, '2022-02-28 05:03:56', '2022-02-28 05:03:56'),
(9, 46, 39, 'Offline_pay/order_id_39.png', 0, '2022-02-28 05:05:54', '2022-02-28 05:05:54'),
(10, 47, 40, 'Offline_pay/order_id_40.png', 0, '2022-02-28 05:49:37', '2022-02-28 05:49:37'),
(11, 48, 41, 'Offline_pay/order_id_41.png', 0, '2022-02-28 06:18:13', '2022-02-28 06:18:13'),
(12, 70, 22, 'Offline_pay/order_id_22.png', 0, '2022-03-21 21:33:36', '2022-03-21 21:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_unique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bill_same_ship` int(20) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_sum` decimal(20,2) NOT NULL,
  `total_pv` decimal(20,2) NOT NULL,
  `in_house_status` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `how_may_discount` decimal(20,2) NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount_price` decimal(20,2) DEFAULT NULL,
  `shipping_charge` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `self_pick_order_status` int(11) NOT NULL DEFAULT 0,
  `status_for_matching_bonus` int(11) NOT NULL DEFAULT 0,
  `status_for_direct_bonus` int(11) NOT NULL DEFAULT 0,
  `status_of_leadership_bonus` int(11) NOT NULL DEFAULT 0,
  `status_for_old_order` int(6) NOT NULL DEFAULT 0 COMMENT '0. Not MLM member 1. MLM Member 2. MAtching Bonus received for this order',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_unique`, `user_id`, `payment_method`, `shipping_method`, `user_ip`, `order_currency`, `is_bill_same_ship`, `billing_id`, `shipping_id`, `status_id`, `order_sum`, `total_pv`, `in_house_status`, `coupon_code`, `discount_amount`, `how_may_discount`, `discount_type`, `after_discount_price`, `shipping_charge`, `total`, `payment_status`, `self_pick_order_status`, `status_for_matching_bonus`, `status_for_direct_bonus`, `status_of_leadership_bonus`, `status_for_old_order`, `created_at`, `updated_at`, `quantity`) VALUES
(1, 'MQO0000001', 24, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '40.00', '40.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '40.00', 1, 5, 0, 1, 1, 2, '2022-01-06 08:21:03', '2022-01-06 08:35:04', NULL),
(2, 'MQO0000002', 25, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '20.00', '20.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '20.00', 1, 5, 1, 1, 1, 2, '2022-01-06 08:25:44', '2022-01-06 08:35:04', NULL),
(3, 'MQO0000003', 16, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '60.00', '60.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '60.00', 1, 5, 1, 1, 1, 2, '2022-01-06 08:45:25', '2022-01-06 09:14:21', NULL),
(4, 'MQO0000004', 9, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '100.00', '100.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '100.00', 1, 5, 0, 1, 1, 2, '2022-01-06 09:13:40', '2022-01-06 09:14:29', NULL),
(5, 'MQO0000005', 27, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '200.00', '200.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '200.00', 1, 5, 0, 0, 0, 0, '2022-03-05 05:42:46', '2022-03-05 05:43:51', NULL),
(6, 'MQO0000006', 20, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '240.00', '240.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '240.00', 1, 5, 1, 1, 1, 2, '2022-03-05 06:04:10', '2022-03-05 06:08:18', NULL),
(7, 'MQO0000007', 27, 'MCT Pay', 'Self-Pickup', '::1', '$', 0, 0, 0, 0, '300.00', '300.00', 3, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '300.00', 1, 5, 0, 1, 1, 2, '2022-03-05 06:07:23', '2022-03-05 06:08:14', NULL),
(8, 'MQO0000008', 49, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-16 06:00:38', '2022-03-16 06:00:38', 10),
(9, 'MQO0000009', 50, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '1320.00', '1320.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1320.00', 0, 0, 0, 0, 0, 0, '2022-03-16 06:03:35', '2022-03-16 06:03:35', 15),
(10, 'MQO0000010', 52, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '1408.00', '1408.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1408.00', 0, 0, 0, 0, 0, 0, '2022-03-16 06:30:26', '2022-03-16 06:30:26', 16),
(11, 'MQO0000011', 53, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-16 06:36:19', '2022-03-16 06:36:19', 10),
(12, 'MQO0000012', 55, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-16 06:51:15', '2022-03-16 06:51:15', 10),
(13, 'MQO0000013', 56, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, 0, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 1, 6, 0, 0, 0, 0, '2022-03-16 21:51:35', '2022-03-16 21:51:35', 10),
(14, 'MQO0000014', 65, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:00:24', '2022-03-21 12:00:24', 10),
(15, 'MQO0000015', 65, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:03:36', '2022-03-21 12:03:36', 0),
(16, 'MQO0000016', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:37:49', '2022-03-21 12:37:49', 10),
(17, 'MQO0000017', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:39:04', '2022-03-21 12:39:04', 10),
(18, 'MQO0000018', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:40:19', '2022-03-21 12:40:19', 0),
(19, 'MQO0000019', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:41:44', '2022-03-21 12:41:44', 0),
(20, 'MQO0000020', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:42:31', '2022-03-21 12:42:31', 0),
(21, 'MQO0000021', 69, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 12:44:43', '2022-03-21 12:44:43', 0),
(22, 'MQO0000022', 70, 'Pay Now', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:33:36', '2022-03-21 21:33:36', 10),
(23, 'MQO0000023', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:50:11', '2022-03-21 21:50:11', 10),
(24, 'MQO0000024', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:50:21', '2022-03-21 21:50:21', 0),
(25, 'MQO0000025', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:50:23', '2022-03-21 21:50:23', 0),
(26, 'MQO0000026', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:50:38', '2022-03-21 21:50:38', 0),
(27, 'MQO0000027', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:53:00', '2022-03-21 21:53:00', 0),
(28, 'MQO0000028', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:53:06', '2022-03-21 21:53:06', 0),
(29, 'MQO0000029', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 21:54:00', '2022-03-21 21:54:00', 0),
(30, 'MQO0000030', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:10:47', '2022-03-21 22:10:47', 0),
(31, 'MQO0000031', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:10:52', '2022-03-21 22:10:52', 0),
(32, 'MQO0000032', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:11:17', '2022-03-21 22:11:17', 0),
(33, 'MQO0000033', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:11:22', '2022-03-21 22:11:22', 0),
(34, 'MQO0000034', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:12:29', '2022-03-21 22:12:29', 0),
(35, 'MQO0000035', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:12:34', '2022-03-21 22:12:34', 0),
(36, 'MQO0000036', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:17:41', '2022-03-21 22:17:41', 0),
(37, 'MQO0000037', 72, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:17:47', '2022-03-21 22:17:47', 0),
(38, 'MQO0000038', 74, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:50:02', '2022-03-21 22:50:02', 10),
(39, 'MQO0000039', 75, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:55:55', '2022-03-21 22:55:55', 10),
(40, 'MQO0000040', 75, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:56:02', '2022-03-21 22:56:02', 0),
(41, 'MQO0000041', 75, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-21 22:56:10', '2022-03-21 22:56:10', 0),
(42, 'MQO0000042', 76, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1144.00', '1144.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1144.00', 0, 0, 0, 0, 0, 0, '2022-03-21 23:03:01', '2022-03-21 23:03:01', 13),
(43, 'MQO0000043', 77, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-22 00:23:45', '2022-03-22 00:23:45', 10),
(44, 'MQO0000044', 79, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-26 01:19:59', '2022-03-26 01:19:59', 10),
(45, 'MQO0000045', 80, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 10:44:46', '2022-03-27 10:44:46', 10),
(46, 'MQO0000046', 80, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 10:44:59', '2022-03-27 10:44:59', 0),
(47, 'MQO0000047', 80, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 10:45:08', '2022-03-27 10:45:08', 0),
(48, 'MQO0000048', 80, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 10:45:43', '2022-03-27 10:45:43', 0),
(49, 'MQO0000049', 81, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 11:40:03', '2022-03-27 11:40:03', 10),
(50, 'MQO0000050', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:27:01', '2022-03-27 12:27:01', 10),
(51, 'MQO0000051', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:32:21', '2022-03-27 12:32:21', 0),
(52, 'MQO0000052', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:33:03', '2022-03-27 12:33:03', 10),
(53, 'MQO0000053', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:33:10', '2022-03-27 12:33:10', 0),
(54, 'MQO0000054', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:33:18', '2022-03-27 12:33:18', 0),
(55, 'MQO0000055', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:35:15', '2022-03-27 12:35:15', 0),
(56, 'MQO0000056', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:35:56', '2022-03-27 12:35:56', 10),
(57, 'MQO0000057', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:39:23', '2022-03-27 12:39:23', 10),
(58, 'MQO0000058', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:39:29', '2022-03-27 12:39:29', 0),
(59, 'MQO0000059', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:39:30', '2022-03-27 12:39:30', 0),
(60, 'MQO0000060', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:39:38', '2022-03-27 12:39:38', 0),
(61, 'MQO0000061', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:39:55', '2022-03-27 12:39:55', 0),
(62, 'MQO0000062', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:43:09', '2022-03-27 12:43:09', 10),
(63, 'MQO0000063', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:43:38', '2022-03-27 12:43:38', 0),
(64, 'MQO0000064', 82, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '2022-03-27 12:44:24', '2022-03-27 12:44:24', 0),
(65, 'MQO0000065', 83, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 22:24:35', '2022-03-27 22:24:35', 10),
(66, 'MQO0000066', 84, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 22:30:31', '2022-03-27 22:30:31', 10),
(67, 'MQO0000067', 85, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-27 23:03:09', '2022-03-27 23:03:09', 10),
(68, 'MQO0000068', 86, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1760.00', '1760.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1760.00', 0, 0, 0, 0, 0, 0, '2022-03-27 23:11:38', '2022-03-27 23:11:38', 20),
(69, 'MQO0000069', 87, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1760.00', '1760.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1760.00', 0, 0, 0, 0, 0, 0, '2022-03-27 23:17:10', '2022-03-27 23:17:10', 20),
(70, 'MQO0000070', 88, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1760.00', '1760.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1760.00', 0, 0, 0, 0, 0, 0, '2022-03-28 02:49:27', '2022-03-28 02:49:27', 20),
(71, 'MQO0000071', 89, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-28 04:28:59', '2022-03-28 04:28:59', 10),
(72, 'MQO0000072', 90, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1320.00', '1320.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1320.00', 0, 0, 0, 0, 0, 0, '2022-03-28 04:38:47', '2022-03-28 04:38:47', 15),
(73, 'MQO0000073', 91, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-28 04:58:10', '2022-03-28 04:58:10', 10),
(74, 'MQO0000074', 92, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-28 08:21:10', '2022-03-28 08:21:10', 10),
(75, 'MQO0000075', 93, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '1320.00', '1320.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '1320.00', 0, 0, 0, 0, 0, 0, '2022-03-28 08:26:04', '2022-03-28 08:26:04', 15),
(76, 'MQO0000076', 95, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-29 00:06:40', '2022-03-29 00:06:40', 10),
(77, 'MQO0000077', 95, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-29 00:08:06', '2022-03-29 00:08:06', 10),
(78, 'MQO0000078', 95, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-29 00:14:41', '2022-03-29 00:14:41', 10),
(79, 'MQO0000079', 95, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-29 00:15:53', '2022-03-29 00:15:53', 10),
(80, 'MQO0000080', 95, 'MCT Pay', 'Self-Pickup', '127.0.0.1', '$', 0, 0, 0, NULL, '880.00', '880.00', NULL, NULL, '0.00', '0.00', NULL, '0.00', '0.00', '880.00', 0, 0, 0, 0, 0, 0, '2022-03-29 00:18:10', '2022-03-29 00:18:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `pv` decimal(20,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `product_id`, `price`, `pv`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 7, '88.00', '88.00', 1, '2022-02-14 06:21:23', '2022-02-14 06:21:23'),
(2, 16, 2, 7, '88.00', '88.00', 4, '2022-02-14 08:02:41', '2022-02-14 08:02:41'),
(3, 16, 2, 8, '88.00', '88.00', 1, '2022-02-14 08:02:41', '2022-02-14 08:02:41'),
(4, 16, 2, 9, '88.00', '88.00', 1, '2022-02-14 08:02:41', '2022-02-14 08:02:41'),
(5, 16, 3, 8, '88.00', '88.00', 6, '2022-02-14 08:55:25', '2022-02-14 08:55:25'),
(6, 16, 4, 8, '88.00', '88.00', 2, '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(7, 16, 4, 9, '88.00', '88.00', 2, '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(8, 16, 4, 7, '88.00', '88.00', 3, '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(9, 16, 5, 7, '88.00', '88.00', 1, '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(10, 16, 5, 8, '88.00', '88.00', 1, '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(11, 1, 6, 8, '88.00', '88.00', 2, '2022-02-16 02:36:23', '2022-02-16 02:36:23'),
(12, 1, 8, 8, '88.00', '88.00', 1, '2022-02-16 02:37:50', '2022-02-16 02:37:50'),
(13, 1, 11, 8, '88.00', '88.00', 1, '2022-02-16 06:12:39', '2022-02-16 06:12:39'),
(14, 1, 12, 8, '88.00', '88.00', 1, '2022-02-16 06:15:53', '2022-02-16 06:15:53'),
(15, 1, 15, 8, '88.00', '88.00', 1, '2022-02-16 06:21:36', '2022-02-16 06:21:36'),
(16, 1, 16, 9, '88.00', '88.00', 1, '2022-02-16 06:24:40', '2022-02-16 06:24:40'),
(17, 1, 17, 8, '88.00', '88.00', 1, '2022-02-16 06:25:30', '2022-02-16 06:25:30'),
(18, 1, 18, 8, '88.00', '88.00', 1, '2022-02-16 06:26:11', '2022-02-16 06:26:11'),
(19, 1, 19, 8, '88.00', '88.00', 1, '2022-02-16 06:31:00', '2022-02-16 06:31:00'),
(20, 1, 20, 9, '88.00', '88.00', 1, '2022-02-16 06:32:40', '2022-02-16 06:32:40'),
(21, 23, 21, 9, '88.00', '88.00', 1, '2022-02-17 05:27:42', '2022-02-17 05:27:42'),
(22, 23, 21, 8, '88.00', '88.00', 6, '2022-02-17 05:27:42', '2022-02-17 05:27:42'),
(23, 39, 23, 7, '88.00', '88.00', 1, '2022-02-28 00:51:56', '2022-02-28 00:51:56'),
(24, 39, 23, 9, '88.00', '88.00', 1, '2022-02-28 00:51:56', '2022-02-28 00:51:56'),
(25, 39, 23, 8, '88.00', '88.00', 1, '2022-02-28 00:51:56', '2022-02-28 00:51:56'),
(26, 41, 24, 7, '88.00', '88.00', 1, '2022-02-28 03:53:31', '2022-02-28 03:53:31'),
(27, 44, 26, 8, '88.00', '88.00', 5, '2022-02-28 04:31:16', '2022-02-28 04:31:16'),
(28, 44, 26, 9, '88.00', '88.00', 1, '2022-02-28 04:31:16', '2022-02-28 04:31:16'),
(29, 44, 26, 7, '88.00', '88.00', 1, '2022-02-28 04:31:16', '2022-02-28 04:31:16'),
(30, 44, 33, 8, '88.00', '88.00', 7, '2022-02-28 04:42:56', '2022-02-28 04:42:56'),
(31, 46, 36, 9, '88.00', '88.00', 11, '2022-02-28 05:02:55', '2022-02-28 05:02:55'),
(32, 47, 40, 8, '88.00', '88.00', 8, '2022-02-28 05:49:37', '2022-02-28 05:49:37'),
(33, 48, 41, 7, '88.00', '88.00', 25, '2022-02-28 06:18:13', '2022-02-28 06:18:13'),
(34, 50, 42, 7, '88.00', '88.00', 10, '2022-03-01 04:33:58', '2022-03-01 04:33:58'),
(35, 51, 43, 7, '88.00', '88.00', 12, '2022-03-01 07:16:50', '2022-03-01 07:16:50'),
(36, 53, 44, 7, '88.00', '88.00', 10, '2022-03-02 08:01:36', '2022-03-02 08:01:36'),
(37, 54, 45, 7, '88.00', '88.00', 10, '2022-03-02 23:38:48', '2022-03-02 23:38:48'),
(38, 56, 46, 7, '88.00', '88.00', 10, '2022-03-03 01:11:40', '2022-03-03 01:11:40'),
(39, 58, 47, 7, '88.00', '88.00', 10, '2022-03-03 04:54:34', '2022-03-03 04:54:34'),
(40, 59, 48, 7, '88.00', '88.00', 10, '2022-03-03 06:50:01', '2022-03-03 06:50:01'),
(41, 60, 49, 7, '88.00', '88.00', 10, '2022-03-03 08:17:48', '2022-03-03 08:17:48'),
(42, 62, 50, 8, '88.00', '88.00', 21, '2022-03-04 02:22:59', '2022-03-04 02:22:59'),
(43, 65, 51, 7, '88.00', '88.00', 10, '2022-03-05 01:33:54', '2022-03-05 01:33:54'),
(44, 66, 52, 7, '88.00', '88.00', 10, '2022-03-05 03:11:36', '2022-03-05 03:11:36'),
(45, 67, 53, 8, '88.00', '88.00', 12, '2022-03-05 03:32:14', '2022-03-05 03:32:14'),
(46, 68, 54, 7, '88.00', '88.00', 10, '2022-03-06 22:40:15', '2022-03-06 22:40:15'),
(47, 69, 55, 7, '88.00', '88.00', 9, '2022-03-06 23:10:15', '2022-03-06 23:10:15'),
(48, 70, 58, 7, '88.00', '88.00', 10, '2022-03-06 23:27:44', '2022-03-06 23:27:44'),
(49, 71, 59, 8, '88.00', '88.00', 10, '2022-03-06 23:31:12', '2022-03-06 23:31:12'),
(50, 72, 60, 8, '88.00', '88.00', 10, '2022-03-07 04:37:01', '2022-03-07 04:37:01'),
(51, 76, 61, 7, '88.00', '88.00', 1, '2022-03-10 00:47:11', '2022-03-10 00:47:11'),
(52, 76, 64, 8, '88.00', '88.00', 20, '2022-03-10 00:48:40', '2022-03-10 00:48:40'),
(53, 77, 66, 8, '88.00', '88.00', 8, '2022-03-10 00:53:15', '2022-03-10 00:53:15'),
(54, 78, 67, 8, '88.00', '88.00', 10, '2022-03-10 00:57:09', '2022-03-10 00:57:09'),
(55, 79, 69, 7, '88.00', '88.00', 19, '2022-03-10 03:25:01', '2022-03-10 03:25:01'),
(56, 80, 72, 8, '88.00', '88.00', 10, '2022-03-10 03:46:24', '2022-03-10 03:46:24'),
(57, 81, 73, 8, '88.00', '88.00', 18, '2022-03-10 05:03:35', '2022-03-10 05:03:35'),
(58, 84, 74, 8, '88.00', '88.00', 10, '2022-03-11 01:21:11', '2022-03-11 01:21:11'),
(59, 84, 74, 9, '88.00', '88.00', 4, '2022-03-11 01:21:11', '2022-03-11 01:21:11'),
(60, 55, 12, 8, '88.00', '88.00', 10, '2022-03-16 06:51:15', '2022-03-16 06:51:15'),
(61, 56, 13, 8, '88.00', '88.00', 10, '2022-03-16 21:51:36', '2022-03-16 21:51:36'),
(62, 65, 14, 8, '88.00', '88.00', 10, '2022-03-21 12:00:24', '2022-03-21 12:00:24'),
(63, 69, 16, 7, '88.00', '88.00', 10, '2022-03-21 12:37:49', '2022-03-21 12:37:49'),
(64, 69, 17, 8, '88.00', '88.00', 10, '2022-03-21 12:39:04', '2022-03-21 12:39:04'),
(65, 70, 22, 8, '88.00', '88.00', 10, '2022-03-21 21:33:36', '2022-03-21 21:33:36'),
(66, 72, 23, 8, '88.00', '88.00', 10, '2022-03-21 21:50:11', '2022-03-21 21:50:11'),
(67, 74, 38, 8, '88.00', '88.00', 10, '2022-03-21 22:50:02', '2022-03-21 22:50:02'),
(68, 75, 39, 8, '88.00', '88.00', 10, '2022-03-21 22:55:55', '2022-03-21 22:55:55'),
(69, 76, 42, 8, '88.00', '88.00', 13, '2022-03-21 23:03:01', '2022-03-21 23:03:01'),
(70, 77, 43, 8, '88.00', '88.00', 10, '2022-03-22 00:23:45', '2022-03-22 00:23:45'),
(71, 79, 44, 8, '88.00', '88.00', 10, '2022-03-26 01:19:59', '2022-03-26 01:19:59'),
(72, 80, 45, 8, '88.00', '88.00', 10, '2022-03-27 10:44:46', '2022-03-27 10:44:46'),
(73, 81, 49, 8, '88.00', '88.00', 10, '2022-03-27 11:40:03', '2022-03-27 11:40:03'),
(74, 82, 50, 8, '88.00', '88.00', 10, '2022-03-27 12:27:01', '2022-03-27 12:27:01'),
(75, 82, 52, 8, '88.00', '88.00', 10, '2022-03-27 12:33:03', '2022-03-27 12:33:03'),
(76, 82, 56, 8, '88.00', '88.00', 10, '2022-03-27 12:35:56', '2022-03-27 12:35:56'),
(77, 82, 57, 7, '88.00', '88.00', 10, '2022-03-27 12:39:23', '2022-03-27 12:39:23'),
(78, 82, 62, 8, '88.00', '88.00', 10, '2022-03-27 12:43:09', '2022-03-27 12:43:09'),
(79, 83, 65, 8, '88.00', '88.00', 10, '2022-03-27 22:24:35', '2022-03-27 22:24:35'),
(80, 84, 66, 8, '88.00', '88.00', 10, '2022-03-27 22:30:31', '2022-03-27 22:30:31'),
(81, 85, 67, 8, '88.00', '88.00', 10, '2022-03-27 23:03:09', '2022-03-27 23:03:09'),
(82, 86, 68, 8, '88.00', '88.00', 20, '2022-03-27 23:11:38', '2022-03-27 23:11:38'),
(83, 87, 69, 8, '88.00', '88.00', 20, '2022-03-27 23:17:10', '2022-03-27 23:17:10'),
(84, 88, 70, 7, '88.00', '88.00', 10, '2022-03-28 02:49:27', '2022-03-28 02:49:27'),
(85, 88, 70, 8, '88.00', '88.00', 10, '2022-03-28 02:49:27', '2022-03-28 02:49:27'),
(86, 89, 71, 8, '88.00', '88.00', 10, '2022-03-28 04:28:59', '2022-03-28 04:28:59'),
(87, 90, 72, 8, '88.00', '88.00', 15, '2022-03-28 04:38:47', '2022-03-28 04:38:47'),
(88, 91, 73, 8, '88.00', '88.00', 10, '2022-03-28 04:58:10', '2022-03-28 04:58:10'),
(89, 92, 74, 8, '88.00', '88.00', 10, '2022-03-28 08:21:10', '2022-03-28 08:21:10'),
(90, 93, 75, 8, '88.00', '88.00', 15, '2022-03-28 08:26:04', '2022-03-28 08:26:04'),
(91, 95, 76, 8, '88.00', '88.00', 10, '2022-03-29 00:06:40', '2022-03-29 00:06:40'),
(92, 95, 77, 8, '88.00', '88.00', 10, '2022-03-29 00:08:06', '2022-03-29 00:08:06'),
(93, 95, 78, 8, '88.00', '88.00', 10, '2022-03-29 00:14:41', '2022-03-29 00:14:41'),
(94, 95, 79, 8, '88.00', '88.00', 10, '2022-03-29 00:15:53', '2022-03-29 00:15:53'),
(95, 95, 80, 8, '88.00', '88.00', 10, '2022-03-29 00:18:10', '2022-03-29 00:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Processing', '2021-10-19 07:07:03', '2021-10-19 07:07:03'),
(2, 'Order Placed', '2021-10-19 07:07:03', '2021-10-19 07:07:03'),
(3, 'In transit', '2021-10-19 07:07:55', '2021-10-19 07:07:55'),
(4, 'On The Way', '2021-10-19 07:07:55', '2021-10-19 07:07:55'),
(5, 'Delivered', '2021-10-19 07:09:27', '2021-10-19 07:09:27'),
(6, 'Cancelled', '2021-10-19 13:44:12', '2021-10-19 13:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usemethod` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productimagee` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `productimagec` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galleryimagee` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galleryimagec` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopbannere` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopbannerc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `regularprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offerprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagetitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metakeyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videotitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videosource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_components_image_eng` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_components_image_chn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effects_image_eng` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effects_image_chn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_image_eng` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_image_chn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `pv`, `usemethod`, `size`, `description`, `productimagee`, `productimagec`, `galleryimagee`, `galleryimagec`, `shopbannere`, `shopbannerc`, `status`, `category_id`, `regularprice`, `saleprice`, `offerprice`, `pagetitle`, `pageurl`, `metadescription`, `metakeyword`, `stock`, `features`, `videotitle`, `videosource`, `main_components_image_eng`, `main_components_image_chn`, `effects_image_eng`, `effects_image_chn`, `method_image_eng`, `method_image_chn`, `created_at`, `updated_at`) VALUES
(7, 'MQ freckle essence', '88', '<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Wash your face.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">MQ Anti-Blu-ray Fine Spray</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Then apply MQ freckle essence</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">sooner or later</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">28-day cycle</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Obviously see the effect of desalination freckle</span></p>', '30', '<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Water; Benzoic acid, 3,4,5-trihydroxybenzoic acid; Tranexamic acid; Nicotinamide; Glycerol; Dipropyl glycol; Hydroxy acetophenone; Potassium glycyrrhizinate; Octanediol; 1-aminoethyl phosphinic acid; Sodium hyaluronate; N-acetyl-D-glucosamine; Allantoin; EDTA tetrasodium; xanthan</span></p>', 'product/product_imagee/pic1.jpg', 'product//product_imagec/product_imagec26_11_21_05_11MQ freckle essence.jpg', 'product//gallery_imagee/gallery_imagee26_11_21_05_11MQ freckle essencei8PB6.jpg', 'product//gallery_imagec/gallery_imagec26_11_21_05_11MQ freckle essenceNh2Yl.jpg', '', '', 1, 3, '88', '88', '88', NULL, NULL, NULL, NULL, '1', '<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">1) Reduced aperture</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">2) Prevent DNA damage caused by UV light</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">3) Prevents melanin production</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">4) Reduces vasodilation and redness</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">5) Reduces inflammation</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">6) Stop melanin transfer</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">7) Skin Brightening</span></p>', NULL, NULL, 'product//main_components_image_eng/MQ freckle essence_main_components_image_eng26_11_21_05_11.png', 'product//main_components_image_chn/MQ freckle essence_main_components_image_chn26_11_21_05_11.png', 'product//effects_image_eng/MQ freckle essence_effects_image_eng26_11_21_05_11.jpg', 'product//effects_image_chn/MQ freckle essence_effects_image_chn26_11_21_05_11.jpg', 'product//method_image_eng/MQ freckle essence_method_image_eng26_11_21_05_11.png', 'product//method_image_chn/MQ freckle essence_method_image_chn26_11_21_05_11.png', '2021-11-25 21:17:06', '2021-11-25 21:17:06'),
(8, 'MQ Avocado Neckline Repair Massage Cream', '88', '<p><span id=\"docs-internal-guid-2d900fd3-7fff-46fd-ed40-d95728ae60cf\"><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">clean skin, evenly apply appropriate amount of products to the neck, gently massage until absorbed.</span></span></p>', '30', '<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">water, caprylic acid / decanoate, ethyl hexyl palmitate, glycerol, propanediol, whale wax stearol, whale wax stearyl glucosides, trehalose, butter fruit tree (BUTYROSPERMUMPARIKI) fruit tree (ALOE BARBADENSIS) extract, sodium hyaluronate, xanthan gum, p-light acetophenone, light benzoate, essence, CI 15985 CI 19140, ginseng (PANAX GINSENG) root extract, Glycyrrhiza uralensis Fisch root extract, hexapeptide-1, Fullerene, nicotine, mint (MENTHAARVENSIS) extract</span></p>', 'product/product_imagee/pic2.jpg', 'product//product_imagec/product_imagec26_11_21_05_11MQ Avocado Neckline Repair Massage Cream.jpg', 'product//gallery_imagee/gallery_imagee26_11_21_05_11MQ Avocado Neckline Repair Massage CreamZSKpC.jpg', 'product//gallery_imagec/gallery_imagec26_11_21_05_11MQ Avocado Neckline Repair Massage Creamna5aT.jpg', '', '', 1, 3, '88', '88', '88', NULL, NULL, NULL, NULL, '1', '<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">1) Improve Neck Lines</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">2) Lymphatic Detox</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">3) Upgrade </span><span style=\"font-size: 11pt; font-family: \'Quattrocento Sans\',sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">🇻</span><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"> face</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">4) Improve the crease</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">5) Improvement of Decree Lines</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">6) Dilute Fine Lines</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">7) Replenish Skin Moisture</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">8) Improves skin\'s brightness and tenderness</span></p>', NULL, NULL, 'product//main_components_image_eng/MQ Avocado Neckline Repair Massage Cream_main_components_image_eng26_11_21_05_11.png', 'product//main_components_image_chn/MQ Avocado Neckline Repair Massage Cream_main_components_image_chn26_11_21_05_11.png', 'product//effects_image_eng/MQ Avocado Neckline Repair Massage Cream_effects_image_eng26_11_21_05_11.jpg', 'product//effects_image_chn/MQ Avocado Neckline Repair Massage Cream_effects_image_chn26_11_21_05_11.jpg', 'product//method_image_eng/MQ Avocado Neckline Repair Massage Cream_method_image_eng26_11_21_05_11.png', 'product//method_image_chn/MQ Avocado Neckline Repair Massage Cream_method_image_chn26_11_21_05_11.png', '2021-11-25 21:37:56', '2021-11-25 21:37:56'),
(9, 'MQ Coconut Oil Amino Acid Facial Cleanser', '88', '<p><span id=\"docs-internal-guid-64cfd0ef-7fff-7aa4-8cff-8c2f258b75e5\"><span style=\"font-size: 11pt; font-family: \'Quattrocento Sans\', sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">1) </span><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Cleanse morning and evening (effective in removing makeup)</span></span></p>\r\n<p><span id=\"docs-internal-guid-211b80e0-7fff-a1c1-c2d8-88e257d8fbdd\"><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">2) </span><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; color: #202124; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Take appropriate amount of water or warm water to make rich bubbles</span></span></p>\r\n<p><span id=\"docs-internal-guid-47f38701-7fff-c820-14f6-053f63ae7517\"><span style=\"font-size: 11pt; font-family: \'Quattrocento Sans\', sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">3) </span><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Gently massage a small amount using circular motions onto damp skin</span></span></p>\r\n<p><span id=\"docs-internal-guid-a4f7ea20-7fff-eae6-872e-a5b54dcd76f8\"><span style=\"font-size: 11pt; font-family: \'Quattrocento Sans\', sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">4) </span><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Rinse using warm water and pat dry with a soft face cloth</span></span></p>', '30', '<p><span id=\"docs-internal-guid-2e01741f-7fff-cdbb-93b8-bd657cd39aee\"><span style=\"font-size: 11pt; font-family: Calibri, sans-serif; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Water, Sodium lauroyl isethionate, Sodium cocoyl amino acid, Cocamidopropyl betaine, Glycerin, Stearic acid, Ethylene glycol distearate, Acrylic (ester) copolymer, Yellow crude gum, Cocos nucifera oil, Potassium hydroxide, Disodium EDTA, Caprylic hydroxamic acid, Ethylhexyl glycerol</span></span></p>', 'product/product_imagee/pic3.jpg', 'product//product_imagec/product_imagec26_11_21_05_11MQ Coconut Oil Amino Acid Facial Cleanser.jpg', 'product//gallery_imagee/gallery_imagee26_11_21_05_11MQ Coconut Oil Amino Acid Facial CleanserBs1Gb.jpg', 'product//gallery_imagec/gallery_imagec26_11_21_05_11MQ Coconut Oil Amino Acid Facial Cleanserpglo5.jpg', '', '', 1, 3, '88', '88', '88', NULL, NULL, NULL, NULL, '1', '<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">1️)&nbsp; Balance and soothe the skin</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">2️) Gentle exfoliation</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">3️) remove blackheads</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">4️) Dissolve excess oil</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">5️)&nbsp; In addition to mites and anti-acne</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">6️)&nbsp; Whitening and moisturizing</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.295; margin-top: 0pt; margin-bottom: 8pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">7️)&nbsp; Brighten skin tone</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.542857142857143; margin-top: -1pt; margin-bottom: -1pt;\"><span style=\"font-size: 11pt; font-family: Calibri,sans-serif; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">8️)&nbsp; Purifies the skin, tightens the pores, and does not tighten after use!</span></p>', NULL, NULL, 'product//main_components_image_eng/MQ Coconut Oil Amino Acid Facial Cleanser_main_components_image_eng26_11_21_05_11.jpg', 'product//main_components_image_chn/MQ Coconut Oil Amino Acid Facial Cleanser_main_components_image_chn26_11_21_05_11.jpg', 'product//effects_image_eng/MQ Coconut Oil Amino Acid Facial Cleanser_effects_image_eng26_11_21_05_11.jpg', 'product//effects_image_chn/MQ Coconut Oil Amino Acid Facial Cleanser_effects_image_chn26_11_21_05_11.jpg', 'product//method_image_eng/MQ Coconut Oil Amino Acid Facial Cleanser_method_image_eng26_11_21_05_11.png', 'product//method_image_chn/MQ Coconut Oil Amino Acid Facial Cleanser_method_image_chn26_11_21_05_11.png', '2021-11-25 21:46:06', '2021-11-25 21:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Image_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image_ch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_points`
--

CREATE TABLE `pv_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pv_points`
--

INSERT INTO `pv_points` (`id`, `user_id`, `product_id`, `point`, `order_id`, `created_at`, `updated_at`) VALUES
(1, '16', '8', '88', '3', '2022-02-14 08:55:25', '2022-02-14 08:55:25'),
(2, '16', '7', '88', '4', '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(3, '16', '7', '88', '5', '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(4, '16', '8', '88', '5', '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(5, '1', '8', '88', '11', '2022-02-16 06:12:39', '2022-02-16 06:12:39'),
(6, '1', '8', '88', '15', '2022-02-16 06:21:36', '2022-02-16 06:21:36'),
(7, '1', '9', '88', '16', '2022-02-16 06:24:41', '2022-02-16 06:24:41'),
(8, '1', '8', '88', '17', '2022-02-16 06:25:30', '2022-02-16 06:25:30'),
(9, '1', '8', '88', '18', '2022-02-16 06:26:11', '2022-02-16 06:26:11'),
(10, '1', '8', '88', '19', '2022-02-16 06:31:00', '2022-02-16 06:31:00'),
(11, '1', '9', '88', '20', '2022-02-16 06:32:40', '2022-02-16 06:32:40'),
(12, '23', '9', '88', '21', '2022-02-17 05:27:43', '2022-02-17 05:27:43'),
(13, '23', '8', '88', '21', '2022-02-17 05:27:43', '2022-02-17 05:27:43'),
(14, '47', '8', '88', '40', '2022-02-28 05:49:38', '2022-02-28 05:49:38'),
(15, '48', '7', '88', '41', '2022-02-28 06:18:13', '2022-02-28 06:18:13'),
(16, '49', '8', '88', '8', '2022-03-16 06:00:39', '2022-03-16 06:00:39'),
(17, '50', '8', '88', '9', '2022-03-16 06:03:35', '2022-03-16 06:03:35'),
(18, '52', '8', '88', '10', '2022-03-16 06:30:27', '2022-03-16 06:30:27'),
(19, '53', '8', '88', '11', '2022-03-16 06:36:19', '2022-03-16 06:36:19'),
(20, '55', '8', '88', '12', '2022-03-16 06:51:15', '2022-03-16 06:51:15'),
(21, '56', '8', '88', '13', '2022-03-16 21:51:36', '2022-03-16 21:51:36'),
(22, '65', '8', '88', '14', '2022-03-21 12:00:25', '2022-03-21 12:00:25'),
(23, '69', '7', '88', '16', '2022-03-21 12:37:50', '2022-03-21 12:37:50'),
(24, '69', '8', '88', '17', '2022-03-21 12:39:04', '2022-03-21 12:39:04'),
(25, '70', '8', '88', '22', '2022-03-21 21:33:37', '2022-03-21 21:33:37'),
(26, '72', '8', '88', '23', '2022-03-21 21:50:11', '2022-03-21 21:50:11'),
(27, '74', '8', '88', '38', '2022-03-21 22:50:02', '2022-03-21 22:50:02'),
(28, '75', '8', '88', '39', '2022-03-21 22:55:55', '2022-03-21 22:55:55'),
(29, '76', '8', '88', '42', '2022-03-21 23:03:01', '2022-03-21 23:03:01'),
(30, '77', '8', '88', '43', '2022-03-22 00:23:45', '2022-03-22 00:23:45'),
(31, '79', '8', '88', '44', '2022-03-26 01:20:00', '2022-03-26 01:20:00'),
(32, '80', '8', '88', '45', '2022-03-27 10:44:47', '2022-03-27 10:44:47'),
(33, '81', '8', '88', '49', '2022-03-27 11:40:03', '2022-03-27 11:40:03'),
(34, '82', '8', '88', '50', '2022-03-27 12:27:01', '2022-03-27 12:27:01'),
(35, '82', '8', '88', '52', '2022-03-27 12:33:04', '2022-03-27 12:33:04'),
(36, '82', '8', '88', '56', '2022-03-27 12:35:56', '2022-03-27 12:35:56'),
(37, '82', '7', '88', '57', '2022-03-27 12:39:24', '2022-03-27 12:39:24'),
(38, '82', '8', '88', '62', '2022-03-27 12:43:09', '2022-03-27 12:43:09'),
(39, '83', '8', '88', '65', '2022-03-27 22:24:36', '2022-03-27 22:24:36'),
(40, '84', '8', '88', '66', '2022-03-27 22:30:31', '2022-03-27 22:30:31'),
(41, '85', '8', '88', '67', '2022-03-27 23:03:09', '2022-03-27 23:03:09'),
(42, '86', '8', '88', '68', '2022-03-27 23:11:38', '2022-03-27 23:11:38'),
(43, '87', '8', '88', '69', '2022-03-27 23:17:10', '2022-03-27 23:17:10'),
(44, '88', '7', '88', '70', '2022-03-28 02:49:28', '2022-03-28 02:49:28'),
(45, '88', '8', '88', '70', '2022-03-28 02:49:28', '2022-03-28 02:49:28'),
(46, '89', '8', '88', '71', '2022-03-28 04:29:00', '2022-03-28 04:29:00'),
(47, '90', '8', '88', '72', '2022-03-28 04:38:48', '2022-03-28 04:38:48'),
(48, '91', '8', '88', '73', '2022-03-28 04:58:10', '2022-03-28 04:58:10'),
(49, '92', '8', '88', '74', '2022-03-28 08:21:11', '2022-03-28 08:21:11'),
(50, '93', '8', '88', '75', '2022-03-28 08:26:04', '2022-03-28 08:26:04'),
(51, '95', '8', '88', '76', '2022-03-29 00:06:41', '2022-03-29 00:06:41'),
(52, '95', '8', '88', '77', '2022-03-29 00:08:06', '2022-03-29 00:08:06'),
(53, '95', '8', '88', '78', '2022-03-29 00:14:42', '2022-03-29 00:14:42'),
(54, '95', '8', '88', '79', '2022-03-29 00:15:53', '2022-03-29 00:15:53'),
(55, '95', '8', '88', '80', '2022-03-29 00:18:10', '2022-03-29 00:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `type`, `details`, `points`, `created_at`, `updated_at`) VALUES
(1, 'Normal Member', 'Normal Member', '88', '2021-10-21 04:58:19', '2021-10-21 04:58:19'),
(2, 'Silver Member\n', 'Silver Member\n', '500', '2021-10-21 04:58:19', '2021-10-21 04:58:19'),
(3, 'Gold Member', 'Gold Member', '1000', '2021-10-21 04:59:10', '2021-10-21 04:59:10'),
(4, 'Diamond Member', 'Diamond Member', '2000', '2021-10-21 04:59:10', '2021-10-21 04:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`id`, `user_id`, `referal_code`, `created_at`, `updated_at`) VALUES
(1, 'MQU0000001', 'MQRF0000001', '2022-02-13 05:00:45', '2022-02-13 05:00:45'),
(16, 'MQU0000002', 'MQRF0000002', '2022-02-14 05:20:41', '2022-02-14 05:20:41'),
(17, 'MQU0000003', 'MQRF0000003', '2022-02-15 02:37:18', '2022-02-15 02:37:18'),
(18, 'MQU0000004', 'MQRF0000004', '2022-02-15 03:46:11', '2022-02-15 03:46:11'),
(19, 'MQU0000002', 'MQRF0000005', '2022-02-15 22:39:17', '2022-02-15 22:39:17'),
(20, 'MQU0000003', 'MQRF0000006', '2022-02-15 23:05:25', '2022-02-15 23:05:25'),
(21, 'MQU0000004', 'MQRF0000007', '2022-02-16 02:27:44', '2022-02-16 02:27:44'),
(22, 'MQU0000005', 'MQRF0000008', '2022-02-16 02:29:04', '2022-02-16 02:29:04'),
(23, 'MQU0000002', 'MQRF0000009', '2022-02-17 05:20:45', '2022-02-17 05:20:45'),
(24, 'MQU0000003', 'MQRF0000010', '2022-02-17 23:30:13', '2022-02-17 23:30:13'),
(25, 'MQU0000004', 'MQRF0000011', '2022-02-18 02:40:16', '2022-02-18 02:40:16'),
(26, 'MQU0000003', 'MQRF0000012', '2022-02-18 23:44:16', '2022-02-18 23:44:16'),
(27, 'MQU0000003', 'MQRF0000013', '2022-02-18 23:59:14', '2022-02-18 23:59:14'),
(28, 'MQU0000004', 'MQRF0000014', '2022-02-19 01:06:30', '2022-02-19 01:06:30'),
(29, 'MQU0000005', 'MQRF0000015', '2022-02-19 01:18:02', '2022-02-19 01:18:02'),
(30, 'MQU0000006', 'MQRF0000016', '2022-02-19 02:53:22', '2022-02-19 02:53:22'),
(31, 'MQU0000007', 'MQRF0000017', '2022-02-20 22:12:42', '2022-02-20 22:12:42'),
(32, 'MQU0000003', 'MQRF0000018', '2022-02-21 23:04:11', '2022-02-21 23:04:11'),
(33, 'MQU0000003', 'MQRF0000019', '2022-02-24 00:19:17', '2022-02-24 00:19:17'),
(34, 'MQU0000004', 'MQRF0000020', '2022-02-24 01:10:04', '2022-02-24 01:10:04'),
(35, 'MQU0000005', 'MQRF0000021', '2022-02-24 02:07:35', '2022-02-24 02:07:35'),
(36, 'MQU0000006', 'MQRF0000022', '2022-02-24 23:30:41', '2022-02-24 23:30:41'),
(37, 'MQU0000007', 'MQRF0000023', '2022-02-28 00:40:18', '2022-02-28 00:40:18'),
(38, 'MQU0000008', 'MQRF0000024', '2022-02-28 00:49:30', '2022-02-28 00:49:30'),
(39, 'MQU0000009', 'MQRF0000025', '2022-02-28 03:47:44', '2022-02-28 03:47:44'),
(40, 'MQU0000010', 'MQRF0000026', '2022-02-28 03:50:04', '2022-02-28 03:50:04'),
(41, 'MQU0000011', 'MQRF0000027', '2022-02-28 04:09:20', '2022-02-28 04:09:20'),
(42, 'MQU0000012', 'MQRF0000028', '2022-02-28 04:10:43', '2022-02-28 04:10:43'),
(43, 'MQU0000013', 'MQRF0000029', '2022-02-28 04:29:28', '2022-02-28 04:29:28'),
(44, 'MQU0000014', 'MQRF0000030', '2022-02-28 04:59:25', '2022-02-28 04:59:25'),
(45, 'MQU0000015', 'MQRF0000031', '2022-02-28 05:01:36', '2022-02-28 05:01:36'),
(46, 'MQU0000016', 'MQRF0000032', '2022-02-28 05:47:44', '2022-02-28 05:47:44'),
(47, 'MQU0000017', 'MQRF0000033', '2022-02-28 06:16:13', '2022-02-28 06:16:13'),
(48, 'MQU0000018', 'MQRF0000034', '2022-03-16 05:48:09', '2022-03-16 05:48:09'),
(49, 'MQU0000019', 'MQRF0000035', '2022-03-16 06:02:30', '2022-03-16 06:02:30'),
(50, 'MQU0000020', 'MQRF0000036', '2022-03-16 06:10:51', '2022-03-16 06:10:51'),
(51, 'MQU0000021', 'MQRF0000037', '2022-03-16 06:14:55', '2022-03-16 06:14:55'),
(52, 'MQU0000022', 'MQRF0000038', '2022-03-16 06:35:25', '2022-03-16 06:35:25'),
(53, 'MQU0000023', 'MQRF0000039', '2022-03-16 06:42:39', '2022-03-16 06:42:39'),
(54, 'MQU0000024', 'MQRF0000040', '2022-03-16 06:49:53', '2022-03-16 06:49:53'),
(55, 'MQU0000025', 'MQRF0000041', '2022-03-16 21:50:08', '2022-03-16 21:50:08'),
(56, 'MQU0000026', 'MQRF0000042', '2022-03-17 11:29:47', '2022-03-17 11:29:47'),
(57, 'MQU0000027', 'MQRF0000043', '2022-03-17 23:44:10', '2022-03-17 23:44:10'),
(58, 'MQU0000028', 'MQRF0000044', '2022-03-17 23:53:21', '2022-03-17 23:53:21'),
(59, 'MQU0000029', 'MQRF0000045', '2022-03-18 00:07:57', '2022-03-18 00:07:57'),
(60, 'MQU0000030', 'MQRF0000046', '2022-03-21 05:48:39', '2022-03-21 05:48:39'),
(61, 'MQU0000031', 'MQRF0000047', '2022-03-21 05:50:17', '2022-03-21 05:50:17'),
(62, 'MQU0000032', 'MQRF0000048', '2022-03-21 05:54:10', '2022-03-21 05:54:10'),
(63, 'MQU0000033', 'MQRF0000049', '2022-03-21 11:42:01', '2022-03-21 11:42:01'),
(64, 'MQU0000034', 'MQRF0000050', '2022-03-21 11:57:41', '2022-03-21 11:57:41'),
(65, 'MQU0000035', 'MQRF0000051', '2022-03-21 12:19:55', '2022-03-21 12:19:55'),
(66, 'MQU0000036', 'MQRF0000052', '2022-03-21 12:21:38', '2022-03-21 12:21:38'),
(67, 'MQU0000037', 'MQRF0000053', '2022-03-21 12:27:01', '2022-03-21 12:27:01'),
(68, 'MQU0000038', 'MQRF0000054', '2022-03-21 12:36:38', '2022-03-21 12:36:38'),
(69, 'MQU0000039', 'MQRF0000055', '2022-03-21 21:31:58', '2022-03-21 21:31:58'),
(70, 'MQU0000040', 'MQRF0000056', '2022-03-21 21:43:00', '2022-03-21 21:43:00'),
(71, 'MQU0000041', 'MQRF0000057', '2022-03-21 21:48:24', '2022-03-21 21:48:24'),
(72, 'MQU0000042', 'MQRF0000058', '2022-03-21 22:45:05', '2022-03-21 22:45:05'),
(73, 'MQU0000043', 'MQRF0000059', '2022-03-21 22:49:08', '2022-03-21 22:49:08'),
(74, 'MQU0000044', 'MQRF0000060', '2022-03-21 22:54:32', '2022-03-21 22:54:32'),
(75, 'MQU0000045', 'MQRF0000061', '2022-03-21 23:01:37', '2022-03-21 23:01:37'),
(76, 'MQU0000046', 'MQRF0000062', '2022-03-22 00:22:43', '2022-03-22 00:22:43'),
(77, 'MQU0000047', 'MQRF0000063', '2022-03-26 00:43:32', '2022-03-26 00:43:32'),
(78, 'MQU0000048', 'MQRF0000064', '2022-03-26 01:03:48', '2022-03-26 01:03:48'),
(79, 'MQU0000049', 'MQRF0000065', '2022-03-27 10:41:41', '2022-03-27 10:41:41'),
(80, 'MQU0000050', 'MQRF0000066', '2022-03-27 11:38:47', '2022-03-27 11:38:47'),
(81, 'MQU0000051', 'MQRF0000067', '2022-03-27 12:25:39', '2022-03-27 12:25:39'),
(82, 'MQU0000052', 'MQRF0000068', '2022-03-27 22:23:15', '2022-03-27 22:23:15'),
(83, 'MQU0000053', 'MQRF0000069', '2022-03-27 22:29:27', '2022-03-27 22:29:27'),
(84, 'MQU0000054', 'MQRF0000070', '2022-03-27 23:01:59', '2022-03-27 23:01:59'),
(85, 'MQU0000055', 'MQRF0000071', '2022-03-27 23:10:33', '2022-03-27 23:10:33'),
(86, 'MQU0000056', 'MQRF0000072', '2022-03-27 23:16:06', '2022-03-27 23:16:06'),
(87, 'MQU0000057', 'MQRF0000073', '2022-03-28 02:47:31', '2022-03-28 02:47:31'),
(88, 'MQU0000058', 'MQRF0000074', '2022-03-28 04:25:44', '2022-03-28 04:25:44'),
(89, 'MQU0000059', 'MQRF0000075', '2022-03-28 04:38:01', '2022-03-28 04:38:01'),
(90, 'MQU0000060', 'MQRF0000076', '2022-03-28 04:57:16', '2022-03-28 04:57:16'),
(91, 'MQU0000061', 'MQRF0000077', '2022-03-28 08:19:46', '2022-03-28 08:19:46'),
(92, 'MQU0000062', 'MQRF0000078', '2022-03-28 08:24:32', '2022-03-28 08:24:32'),
(93, 'MQU0000063', 'MQRF0000079', '2022-03-29 00:03:32', '2022-03-29 00:03:32'),
(94, 'MQU0000064', 'MQRF0000080', '2022-03-29 00:05:41', '2022-03-29 00:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `self_picks`
--

CREATE TABLE `self_picks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `self_picks`
--

INSERT INTO `self_picks` (`id`, `user_id`, `order_id`, `country`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 'Singapore', 'Bihar', '851204', '2022-02-14 06:21:23', '2022-02-14 06:21:23'),
(2, 16, 2, 'Singapore', 'Bihar', '851204', '2022-02-14 08:02:41', '2022-02-14 08:02:41'),
(3, 16, 3, 'Singapore', 'Bihar', '851204', '2022-02-14 08:55:25', '2022-02-14 08:55:25'),
(4, 16, 4, 'Singapore', 'Bihar', '851204', '2022-02-14 08:56:47', '2022-02-14 08:56:47'),
(5, 16, 5, 'Singapore', 'Bihar', '851204', '2022-02-14 09:07:24', '2022-02-14 09:07:24'),
(6, 1, 6, 'Singapore', 'Delhi', '457845', '2022-02-16 02:36:23', '2022-02-16 02:36:23'),
(7, 1, 7, 'Singapore', 'Delhi', '457845', '2022-02-16 02:37:00', '2022-02-16 02:37:00'),
(8, 1, 8, 'Singapore', 'Delhi', '457845', '2022-02-16 02:37:50', '2022-02-16 02:37:50'),
(9, 1, 9, 'Singapore', 'Delhi', '457845', '2022-02-16 02:37:50', '2022-02-16 02:37:50'),
(10, 1, 10, 'Singapore', 'Delhi', '457845', '2022-02-16 02:37:53', '2022-02-16 02:37:53'),
(11, 1, 11, 'Singapore', 'Delhi', '457845', '2022-02-16 06:12:39', '2022-02-16 06:12:39'),
(12, 1, 12, 'Singapore', 'Delhi', '457845', '2022-02-16 06:15:53', '2022-02-16 06:15:53'),
(13, 1, 13, 'Singapore', 'Delhi', '457845', '2022-02-16 06:16:04', '2022-02-16 06:16:04'),
(14, 1, 14, 'Singapore', 'Delhi', '457845', '2022-02-16 06:18:19', '2022-02-16 06:18:19'),
(15, 1, 15, 'Singapore', 'Delhi', '457845', '2022-02-16 06:21:36', '2022-02-16 06:21:36'),
(16, 1, 16, 'Singapore', 'Delhi', '457845', '2022-02-16 06:24:40', '2022-02-16 06:24:40'),
(17, 1, 17, 'Singapore', 'Delhi', '457845', '2022-02-16 06:25:30', '2022-02-16 06:25:30'),
(18, 1, 18, 'Singapore', 'Delhi', '457845', '2022-02-16 06:26:11', '2022-02-16 06:26:11'),
(19, 1, 19, 'Singapore', 'Delhi', '457845', '2022-02-16 06:31:00', '2022-02-16 06:31:00'),
(20, 1, 20, 'Singapore', 'Delhi', '457845', '2022-02-16 06:32:40', '2022-02-16 06:32:40'),
(21, 23, 21, 'Singapore', 'Bihar', '801503', '2022-02-17 05:27:42', '2022-02-17 05:27:42'),
(22, 39, 23, 'Singapore', 'xyz', '123456', '2022-02-28 00:51:56', '2022-02-28 00:51:56'),
(23, 41, 24, 'Singapore', 'xyz', '123456', '2022-02-28 03:53:31', '2022-02-28 03:53:31'),
(24, 41, 25, 'Singapore', 'xyz', '123456', '2022-02-28 03:56:20', '2022-02-28 03:56:20'),
(25, 44, 26, 'Singapore', 'xyzy', '123456', '2022-02-28 04:31:16', '2022-02-28 04:31:16'),
(26, 44, 27, 'Singapore', 'xyzy', '123456', '2022-02-28 04:31:32', '2022-02-28 04:31:32'),
(27, 44, 30, 'Singapore', 'xyzy', '123456', '2022-02-28 04:35:03', '2022-02-28 04:35:03'),
(28, 44, 31, 'Singapore', 'xyzy', '123456', '2022-02-28 04:37:41', '2022-02-28 04:37:41'),
(29, 44, 32, 'Singapore', 'xyzy', '123456', '2022-02-28 04:40:12', '2022-02-28 04:40:12'),
(30, 44, 33, 'Singapore', 'xyzy', '123456', '2022-02-28 04:42:56', '2022-02-28 04:42:56'),
(31, 44, 34, 'Singapore', 'xyzy', '123456', '2022-02-28 04:45:33', '2022-02-28 04:45:33'),
(32, 44, 35, 'Singapore', 'xyzy', '123456', '2022-02-28 04:52:13', '2022-02-28 04:52:13'),
(33, 46, 36, 'Singapore', 'xxxx', '123456', '2022-02-28 05:02:55', '2022-02-28 05:02:55'),
(34, 46, 37, 'Singapore', 'xxxx', '123456', '2022-02-28 05:03:04', '2022-02-28 05:03:04'),
(35, 46, 38, 'Singapore', 'xxxx', '123456', '2022-02-28 05:03:56', '2022-02-28 05:03:56'),
(36, 46, 39, 'Singapore', 'xxxx', '123456', '2022-02-28 05:05:54', '2022-02-28 05:05:54'),
(37, 47, 40, 'Singapore', 'sfsdfds', '324234', '2022-02-28 05:49:37', '2022-02-28 05:49:37'),
(38, 48, 41, 'Singapore', 'xyyx', '822054', '2022-02-28 06:18:13', '2022-02-28 06:18:13'),
(39, 49, 8, 'Singapore', 'vbytre', '098765', '2022-03-16 06:00:38', '2022-03-16 06:00:38'),
(40, 50, 9, 'Singapore', 'vcdsa', '6000004', '2022-03-16 06:03:35', '2022-03-16 06:03:35'),
(41, 52, 10, 'Singapore', 'xyyx', '654321', '2022-03-16 06:30:26', '2022-03-16 06:30:26'),
(42, 53, 11, 'Singapore', 'vbytre', '6000004', '2022-03-16 06:36:19', '2022-03-16 06:36:19'),
(43, 55, 12, 'Singapore', 'vcdsa', '098765', '2022-03-16 06:51:15', '2022-03-16 06:51:15'),
(44, 56, 13, 'Singapore', 'vbytre', '654321', '2022-03-16 21:51:36', '2022-03-16 21:51:36'),
(45, 65, 14, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:00:24', '2022-03-21 12:00:24'),
(46, 65, 15, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:03:36', '2022-03-21 12:03:36'),
(47, 69, 16, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:37:49', '2022-03-21 12:37:49'),
(48, 69, 17, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:39:04', '2022-03-21 12:39:04'),
(49, 69, 18, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:40:19', '2022-03-21 12:40:19'),
(50, 69, 19, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:41:44', '2022-03-21 12:41:44'),
(51, 69, 20, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:42:31', '2022-03-21 12:42:31'),
(52, 69, 21, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 12:44:43', '2022-03-21 12:44:43'),
(53, 70, 22, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:33:36', '2022-03-21 21:33:36'),
(54, 72, 23, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:50:11', '2022-03-21 21:50:11'),
(55, 72, 24, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:50:21', '2022-03-21 21:50:21'),
(56, 72, 25, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:50:23', '2022-03-21 21:50:23'),
(57, 72, 26, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:50:38', '2022-03-21 21:50:38'),
(58, 72, 27, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:53:00', '2022-03-21 21:53:00'),
(59, 72, 28, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:53:06', '2022-03-21 21:53:06'),
(60, 72, 29, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 21:54:00', '2022-03-21 21:54:00'),
(61, 72, 30, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:10:47', '2022-03-21 22:10:47'),
(62, 72, 31, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:10:52', '2022-03-21 22:10:52'),
(63, 72, 32, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:11:17', '2022-03-21 22:11:17'),
(64, 72, 33, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:11:22', '2022-03-21 22:11:22'),
(65, 72, 34, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:12:29', '2022-03-21 22:12:29'),
(66, 72, 35, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:12:34', '2022-03-21 22:12:34'),
(67, 72, 36, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:17:41', '2022-03-21 22:17:41'),
(68, 72, 37, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:17:47', '2022-03-21 22:17:47'),
(69, 74, 38, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 22:50:02', '2022-03-21 22:50:02'),
(70, 75, 39, 'Singapore', 'Tamil Nadu', '638455', '2022-03-21 22:55:55', '2022-03-21 22:55:55'),
(71, 75, 40, 'Singapore', 'Tamil Nadu', '638455', '2022-03-21 22:56:02', '2022-03-21 22:56:02'),
(72, 75, 41, 'Singapore', 'Tamil Nadu', '638455', '2022-03-21 22:56:10', '2022-03-21 22:56:10'),
(73, 76, 42, 'Singapore', 'Tamilnadu', '638455', '2022-03-21 23:03:01', '2022-03-21 23:03:01'),
(74, 77, 43, 'Singapore', 'Tamilnadu', '638455', '2022-03-22 00:23:45', '2022-03-22 00:23:45'),
(75, 79, 44, 'Singapore', 'Tamilnadu', '638455', '2022-03-26 01:19:59', '2022-03-26 01:19:59'),
(76, 80, 45, 'Singapore', 'TamilNadu', '638455', '2022-03-27 10:44:46', '2022-03-27 10:44:46'),
(77, 80, 46, 'Singapore', 'TamilNadu', '638455', '2022-03-27 10:44:59', '2022-03-27 10:44:59'),
(78, 80, 47, 'Singapore', 'TamilNadu', '638455', '2022-03-27 10:45:09', '2022-03-27 10:45:09'),
(79, 80, 48, 'Singapore', 'TamilNadu', '638455', '2022-03-27 10:45:43', '2022-03-27 10:45:43'),
(80, 81, 49, 'Singapore', 'Tamilnaduuu', '638459', '2022-03-27 11:40:03', '2022-03-27 11:40:03'),
(81, 82, 50, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:27:01', '2022-03-27 12:27:01'),
(82, 82, 51, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:32:21', '2022-03-27 12:32:21'),
(83, 82, 52, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:33:03', '2022-03-27 12:33:03'),
(84, 82, 53, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:33:10', '2022-03-27 12:33:10'),
(85, 82, 54, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:33:18', '2022-03-27 12:33:18'),
(86, 82, 55, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:35:15', '2022-03-27 12:35:15'),
(87, 82, 56, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:35:56', '2022-03-27 12:35:56'),
(88, 82, 57, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:39:23', '2022-03-27 12:39:23'),
(89, 82, 58, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:39:29', '2022-03-27 12:39:29'),
(90, 82, 59, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:39:30', '2022-03-27 12:39:30'),
(91, 82, 60, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:39:38', '2022-03-27 12:39:38'),
(92, 82, 61, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:39:55', '2022-03-27 12:39:55'),
(93, 82, 62, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:43:09', '2022-03-27 12:43:09'),
(94, 82, 63, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:43:38', '2022-03-27 12:43:38'),
(95, 82, 64, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 12:44:24', '2022-03-27 12:44:24'),
(96, 83, 65, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 22:24:35', '2022-03-27 22:24:35'),
(97, 84, 66, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 22:30:31', '2022-03-27 22:30:31'),
(98, 85, 67, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 23:03:09', '2022-03-27 23:03:09'),
(99, 86, 68, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 23:11:38', '2022-03-27 23:11:38'),
(100, 87, 69, 'Singapore', 'Tamilnadu', '638455', '2022-03-27 23:17:10', '2022-03-27 23:17:10'),
(101, 88, 70, 'Singapore', 'Tamilnadu', '638455', '2022-03-28 02:49:27', '2022-03-28 02:49:27'),
(102, 89, 71, 'Singapore', 'bvnvb', '822054', '2022-03-28 04:28:59', '2022-03-28 04:28:59'),
(103, 90, 72, 'Singapore', 'Tamilnadu', '638455', '2022-03-28 04:38:47', '2022-03-28 04:38:47'),
(104, 91, 73, 'Singapore', 'Tamilnadu', '638455', '2022-03-28 04:58:10', '2022-03-28 04:58:10'),
(105, 92, 74, 'Singapore', 'Tamilnadu', '638455', '2022-03-28 08:21:10', '2022-03-28 08:21:10'),
(106, 93, 75, 'Singapore', 'Tamilnadu', '638455', '2022-03-28 08:26:04', '2022-03-28 08:26:04'),
(107, 95, 76, 'Singapore', 'Tamilnadu', '638455', '2022-03-29 00:06:41', '2022-03-29 00:06:41'),
(108, 95, 77, 'Singapore', 'Tamilnadu', '638455', '2022-03-29 00:08:06', '2022-03-29 00:08:06'),
(109, 95, 78, 'Singapore', 'Tamilnadu', '638455', '2022-03-29 00:14:41', '2022-03-29 00:14:41'),
(110, 95, 79, 'Singapore', 'Tamilnadu', '638455', '2022-03-29 00:15:53', '2022-03-29 00:15:53'),
(111, 95, 80, 'Singapore', 'Tamilnadu', '638455', '2022-03-29 00:18:10', '2022-03-29 00:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `referal_code`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'MQU0000001', 'Admin', 'MQRF0000001', 'admin@gmail.com', '$2y$10$KrSVdZ.z/4mrP.GX7u8HwercyTmrC2bI2xWiwGGNmnnETCpDkyyfK', NULL, NULL, '2022-02-13 05:00:45', '2022-02-13 05:00:45'),
(23, 'MQU0000002', 'Abhijeet Kumar', 'MQRF0000001', 'test9@gmail.com', '$2y$10$KAnDRO5mDkTu8IldpixIfOnwXbaXW6gKGNqPRAUI7Ze.OJPG56/ZS', NULL, NULL, '2022-02-17 05:20:45', '2022-02-17 05:20:45'),
(34, 'MQU0000003', 'Amrit', 'MQRF0000001', 'amrit@gmail.com', '$2y$10$AZD27Y.I6d2LdmfNcU5N0earCto.vLG1MoUXYpm1SAtvw2he3Qrvm', NULL, NULL, '2022-02-24 00:19:17', '2022-02-24 00:19:17'),
(35, 'MQU0000004', 'Amrit123', 'MQRF0000001', 'amrit123@gmail.com', '$2y$10$xPiv0hykyqQSY0P43wNNwus8hE5Dcwhr3AG/AZpsli7D8ejzsXzJO', NULL, NULL, '2022-02-24 01:10:04', '2022-02-24 01:10:04'),
(36, 'MQU0000005', 'Amrit1234', 'MQRF0000001', 'amrit1234@gmail.com', '$2y$10$0goh2VmK7r.fDqQGORHh1.l6/D7yor3oKKjqr3euGDyDDZdh34z1.', NULL, NULL, '2022-02-24 02:07:35', '2022-02-24 02:07:35'),
(37, 'MQU0000006', 'test1234', 'MQRF0000001', 'test1234@gmail.com', '$2y$10$XGNrIQUKLg7Ir7EekTfcrurKZUHaS6Z4SBIBz7t83OVCeQmSt5Vk6', NULL, NULL, '2022-02-24 23:30:41', '2022-02-24 23:30:41'),
(38, 'MQU0000007', 'Nandhu', 'MQRF0000001', 'nandhutamil1997@gmail.com', '$2y$10$vSXaAkOZRwkCjABw2mVOsOIdKGWKO2VMojfvHzL9julOQOwDWtf9q', NULL, NULL, '2022-02-28 00:40:18', '2022-02-28 00:40:18'),
(39, 'MQU0000008', 'new', 'MQRF0000001', 'new@gmail.com', '$2y$10$v6fPc.6.1hX6rNak3AynFOu.4oqac9wRcqy0IuKty63It8f/WVfq2', NULL, NULL, '2022-02-28 00:49:29', '2022-02-28 00:49:29'),
(40, 'MQU0000009', 'Nandhu', 'MQRF0000001', 'madhu8@gmail.com', '$2y$10$/VZQANgIHXEX7d6G0073dOzUB5QdxMEHUinLDyCj3bH0d0JQO7fyK', NULL, NULL, '2022-02-28 03:47:44', '2022-02-28 03:47:44'),
(41, 'MQU0000010', 'user3', 'MQRF0000001', 'user@gmail.com', '$2y$10$71dtBIAWs002fRlrFU137uSwf3BB1Vxl5HzPgzcKIQUpCAW83BGEe', NULL, NULL, '2022-02-28 03:50:04', '2022-02-28 03:50:04'),
(42, 'MQU0000011', 'Rajesh', 'MQRF0000001', 'rajesh@gmail.com', '$2y$10$Vj9.R3s0UwyKTT.0ccKsRuSBDBDs8vP7TogdYy0nNI6vCNZuZIRxe', NULL, NULL, '2022-02-28 04:09:20', '2022-02-28 04:09:20'),
(43, 'MQU0000012', 'user5', 'MQRF0000001', 'user5@gmail.com', '$2y$10$ZUpIbtJW4xUHG2bSiaDFOOYWrb8sCZLNJ7lCmVJnrDFOIq7vja2m6', NULL, NULL, '2022-02-28 04:10:43', '2022-02-28 04:10:43'),
(44, 'MQU0000013', 'Nandhini', 'MQRF0000001', 'nandhutamil199788@gmail.com', '$2y$10$DDcSF6JQcYl0padbbrOln.QU.fc.n./FSJ.z6h6CNRshoxT4U9UM2', NULL, NULL, '2022-02-28 04:29:28', '2022-02-28 04:29:28'),
(45, 'MQU0000014', 'Nandhini', 'MQRF0000001', 'nandhutamil1998@gmail.com', '$2y$10$FfeZlO2JUA79AaalxamD3..swQGab2LKqOuEAQHmnhr68A2QykM9K', NULL, NULL, '2022-02-28 04:59:25', '2022-02-28 04:59:25'),
(46, 'MQU0000015', 'user11', 'MQRF0000001', 'user11@gmail.com', '$2y$10$APYhl5EjSYDLLJo9M8/yVekGLXIqytqJ7EM69Ry2UGOtP5vKPQ3wq', NULL, NULL, '2022-02-28 05:01:36', '2022-02-28 05:01:36'),
(47, 'MQU0000016', 'Nandhini', 'MQRF0000001', 'nandhutamil199s7@gmail.com', '$2y$10$88.S6PFs1WdL5oXaYIk9ieKNfgPKswZInzV5hBG0tGuzTm.mScrZ2', NULL, NULL, '2022-02-28 05:47:44', '2022-02-28 05:47:44'),
(48, 'MQU0000017', 'Vignesh', 'MQRF0000001', 'vicky@gmail.com', '$2y$10$sI5psHDxTxPibqqLk1MIluJnvwlyZyU/X5a/oj2UN4QX6bD.WX7di', NULL, NULL, '2022-02-28 06:16:13', '2022-02-28 06:16:13'),
(49, 'MQU0000018', 'Nandhu1', 'MQRF0000001', 'nan11@gmail.com', '$2y$10$tH7aXpSHsPQD/2sqZehy7etJe8WsMS8X8Ee/y6pATiIb/OkR8hSl2', NULL, NULL, '2022-03-16 05:48:09', '2022-03-16 05:48:09'),
(50, 'MQU0000019', 'ttt', 'MQRF0000001', 'ttt@gmail.com', '$2y$10$MBsdH.dtiqi1Iwn0qkpv4O5ekhUQGg8wNWRR2391zrnwQNCdXioE2', NULL, NULL, '2022-03-16 06:02:30', '2022-03-16 06:02:30'),
(51, 'MQU0000020', 'Nandhu4', 'MQRF0000001', 'nan4@gmail.com', '$2y$10$HnZYvaFWgcB/TF7vPOymkOuHu3UYP2c/N8Mo7Pnr0X73OuprJKfMy', NULL, NULL, '2022-03-16 06:10:51', '2022-03-16 06:10:51'),
(52, 'MQU0000021', 'bbbbbbbbb', 'MQRF0000001', 'nh@gmail.com', '$2y$10$.4HRmO/NQsv8GH4PYzKtauxub.BjTtJCih/znf/nHOmLnGse/47ZW', NULL, NULL, '2022-03-16 06:14:55', '2022-03-16 06:14:55'),
(53, 'MQU0000022', 'nnnnnnnnn', 'MQRF0000001', 'tgy@gmail.com', '$2y$10$cfW.umwec1PhFvgBP3RIsuyBtiSfF9JluFft93kIpk4rr/j.faHi6', NULL, NULL, '2022-03-16 06:35:25', '2022-03-16 06:35:25'),
(54, 'MQU0000023', 'Nandhucccc', 'MQRF0000001', 'nandhutattmil1997@gmail.com', '$2y$10$M.YBARr06ulqMpBL/xjC/er.7ul7agP0RwgLGbRia4EN27DwdQBoe', NULL, NULL, '2022-03-16 06:42:39', '2022-03-16 06:42:39'),
(55, 'MQU0000024', 'Nandhu77', 'MQRF0000001', 'nandhini.laravel@gmail.com', '$2y$10$Bt0VA8G0OhPzMb00901gOeX9NQEUOMGx22tqNDSEDxzgRLBtPaBbO', NULL, NULL, '2022-03-16 06:49:53', '2022-03-16 06:49:53'),
(56, 'MQU0000025', 'vvv', 'MQRF0000001', 'vvnv@gmail.com', '$2y$10$Mechz4C1Php/H6vtOZX.wOat9Uo.SVP8XpU2gM4jgnLbb/QuLvDgW', NULL, NULL, '2022-03-16 21:50:08', '2022-03-16 21:50:08'),
(57, 'MQU0000026', 'Nandhuaa', 'MQRF0000001', 'nandiaani@gmail.com', '$2y$10$rwLVmckmhdk6sUBaQTAL4eQEu6WqG9bddvbYdf01eKCSj.mnTx/sS', NULL, NULL, '2022-03-17 11:29:47', '2022-03-17 11:29:47'),
(58, 'MQU0000027', 'nandy', 'MQRF0000001', 'nandhutamijl1997@gmail.com', '$2y$10$Bnk/0AHOZTj39EjPjDw3FueGQIO3HTMWccWa/ZQ7xODgdRE4MTOOG', NULL, NULL, '2022-03-17 23:44:10', '2022-03-17 23:44:10'),
(59, 'MQU0000028', 'jhgdh', 'MQRF0000043', 'nandhini.laraveggl@gmail.com', '$2y$10$f86RXyd0dZOADlK7C.L/Je7Hh5Y.9s4q0TqhMLAYyTIHs2qJQBHOu', NULL, NULL, '2022-03-17 23:53:21', '2022-03-17 23:53:21'),
(60, 'MQU0000029', 'Nandhini3', 'MQRF0000001', 'nandhini.lraravel@gmail.com', '$2y$10$P.1ezp7JW7pBOwE8IYeRdeElRwvkoj6JEePqYHFlYjUExakjqRak.', NULL, NULL, '2022-03-18 00:07:57', '2022-03-18 00:07:57'),
(61, 'MQU0000030', 'Nandhiniq', 'MQRF0000001', 'adminq@gmail.com', '$2y$10$j//7KLIcpo9uQZDRf9edk.FhJXc4zQRN8V.b6LM770QFpW6WgfU9W', NULL, NULL, '2022-03-21 05:48:39', '2022-03-21 05:48:39'),
(62, 'MQU0000031', 'bmbb', 'MQRF0000001', 'ghgh@gmail.com', '$2y$10$oPJmXR717ocBuzv2UHPjluw3qG2VirhMjZYfFHt2AByFzuWeCfbXu', NULL, NULL, '2022-03-21 05:50:17', '2022-03-21 05:50:17'),
(63, 'MQU0000032', 'nnnnnnnnnnnnnn', 'MQRF0000001', 'nkp@gmail.com', '$2y$10$zXieyiyw7WvmMkZh7Ekyi.QXzXwaXWjtm.X6BUiky3HeASdHFSQ.O', NULL, NULL, '2022-03-21 05:54:10', '2022-03-21 05:54:10'),
(64, 'MQU0000033', 'Nandhiniwww', 'MQRF0000001', 'nandhutamilt1997@gmail.com', '$2y$10$VT9ZMIyLFw3VaKw9mc/sQOLrXl2V2ZdsODHlWrW0hqPFYe1qCarf2', NULL, NULL, '2022-03-21 11:42:01', '2022-03-21 11:42:01'),
(65, 'MQU0000034', 'ghghff', 'MQRF0000033', 'nandhuttamil1997@gmail.com', '$2y$10$Is5G0VTUcLffW6d34v2P5Oc8x0Y0j.Ge/LJGEr8MIxjviktnJfNiG', NULL, NULL, '2022-03-21 11:57:41', '2022-03-21 11:57:41'),
(66, 'MQU0000035', 'hjgjhg', 'MQRF0000033', 'nandhuthamil1997@gmail.com', '$2y$10$CeK6fMQUq37acA..6JYJSe.u4hnmCyExtFbuH6.6vvBb1nN6G9Mga', NULL, NULL, '2022-03-21 12:19:55', '2022-03-21 12:19:55'),
(67, 'MQU0000036', 'hjgjhgt', 'MQRF0000033', 'nandhuthamilb1997@gmail.com', '$2y$10$MQcYC5pA29Tl.lRVjo.D7uTcoR46aV2Fy.muxBplZDWWdKGa2nK5y', NULL, NULL, '2022-03-21 12:21:38', '2022-03-21 12:21:38'),
(68, 'MQU0000037', 'ghjj', 'MQRF0000033', 'nandhuthamiln1997@gmail.com', '$2y$10$p3W82awj0KNa5ZeUr/.eoOGxR.1b9xZXedSdfieT.CkCdEFIVe95W', NULL, NULL, '2022-03-21 12:27:01', '2022-03-21 12:27:01'),
(69, 'MQU0000038', 'ghjjyuyu', 'MQRF0000033', 'nandhuthamhiln1997@gmail.com', '$2y$10$nYEumG1hzrIbJK1bOLFmGuZa5BV6hv/EjM.vIKZp0mN6nVAbkg7OO', NULL, NULL, '2022-03-21 12:36:38', '2022-03-21 12:36:38'),
(70, 'MQU0000039', 'Nandhuvv', 'MQRF0000033', 'nandhu@gmail.com', '$2y$10$KFBGwdbE1F83Bko8TA4Fou0/8ZJh7xqvQdGDNLAGJtSNhENFwj1Zu', NULL, NULL, '2022-03-21 21:31:58', '2022-03-21 21:31:58'),
(71, 'MQU0000040', 'Nandhinivicky', 'nandhutamil1997@gmail.com', 'nandhuchills@gmail.com', '$2y$10$Vm.cdCBqhwrMtWvNySMy9eDJaaCepRRZepdSI0OpCStzq0JiL6YAO', NULL, NULL, '2022-03-21 21:43:00', '2022-03-21 21:43:00'),
(72, 'MQU0000041', 'Nandhinivicky', 'MQRF0000001', 'nandhuchillsc@gmail.com', '$2y$10$8ctqfvhEQXFiNC1fNG2/D.50MZezQelOvyEormIszW7GNkUc1VHxS', NULL, NULL, '2022-03-21 21:48:24', '2022-03-21 21:48:24'),
(73, 'MQU0000042', 'Nandhiniv', 'MQRF0000001', 'nandhuchillsd@gmail.com', '$2y$10$M3PQLjJasQukpf4o0H0yDes3FtpmYVoVmhoxMUm1IiCtIIXamdj.C', NULL, NULL, '2022-03-21 22:45:05', '2022-03-21 22:45:05'),
(74, 'MQU0000043', 'Nandhinivc', 'MQRF0000058', 'nandhutamil199r7@gmail.com', '$2y$10$W8ls/cvJNgffyzV7mE70zOqpLELB0AtLp3WbzH8th3FKIOCx80YE.', NULL, NULL, '2022-03-21 22:49:08', '2022-03-21 22:49:08'),
(75, 'MQU0000044', 'Thamilarasic', 'MQRF0000001', 'thamilnandhu1999@gmail.com', '$2y$10$k5FjsGJ/Ht/AqpiGyO2fJ.4W18dJWoGOlrAD4PmSJCNpYmRvBh/mm', NULL, NULL, '2022-03-21 22:54:32', '2022-03-21 22:54:32'),
(76, 'MQU0000045', 'vignesh', 'MQRF0000060', 'thamilnandhuchandran@gmail.com', '$2y$10$geI6zR4xams3VEEdBS4RD.PCKBA/eZA.3jP76u/zSqPoYdJ8WEsni', NULL, NULL, '2022-03-21 23:01:37', '2022-03-21 23:01:37'),
(77, 'MQU0000046', 'Nandhinivas', 'MQRF0000058', 'nandhutamil1y997@gmail.com', '$2y$10$Ylfjx3KUjP.x6jpD/zE19Oq3Z4Ed35RnCo8ArmZwn8xqp.mQn8uJy', NULL, NULL, '2022-03-22 00:22:43', '2022-03-22 00:22:43'),
(78, 'MQU0000047', 'bassb', 'MQRF0000069', 'ggdghd@gmail.com', '$2y$10$yL1audKRgYV3JX/JPPRCROjAXcCq7rr.MuCWpe.UWhCN6hNM2pmJO', NULL, NULL, '2022-03-26 00:43:32', '2022-03-26 00:43:32'),
(79, 'MQU0000048', 'xxxyyy', 'MQRF0000033', 'xxyy@gmail.com', '$2y$10$oMnnVwJEGymVHIoQAjQQ1.72fQGnJ7Wdv3N0rJonxyLv0YkUnkPH2', NULL, NULL, '2022-03-26 01:03:48', '2022-03-26 01:03:48'),
(80, 'MQU0000049', 'Nandhinivvv', 'MQRF0000033', 'nandhutamil1uu997@gmail.com', '$2y$10$rCUzSD.okrFGLIL8QPt9xetwo8tbywaRAxEDm4qKIKCVmHp8uMXqe', NULL, NULL, '2022-03-27 10:41:41', '2022-03-27 10:41:41'),
(81, 'MQU0000050', 'user1', 'MQRF0000033', 'nandhutamil19979@gmail.com', '$2y$10$fopJqzEkn/E7QC/0lwpDOehh1RdofW7TbLvMWtJVxd58fkCrnSGGG', NULL, NULL, '2022-03-27 11:38:47', '2022-03-27 11:38:47'),
(82, 'MQU0000051', 'user3', 'MQRF0000001', 'user3@gmail.com', '$2y$10$dYCZpP4goPJqXWa5PvVbL.tzA7pxOF/Drqni8EqOzY9TlRd0wyMee', NULL, NULL, '2022-03-27 12:25:39', '2022-03-27 12:25:39'),
(83, 'MQU0000052', 'Nandhinicc', 'MQRF0000033', 'nandhutamilii1997@gmail.com', '$2y$10$4e4drKBdOZmhbjtBI5odjOCfkmNHuU7vtgicDGXBvhGVO.MB5Jxsa', NULL, NULL, '2022-03-27 22:23:15', '2022-03-27 22:23:15'),
(84, 'MQU0000053', 'Nandhinibb', 'MQRF0000033', 'nandhutamil19917@gmail.com', '$2y$10$M2EWUVyVpd9V/ug0QgIdWu5094oWJMLQwNareYFAx0RAbw7q7jmFe', NULL, NULL, '2022-03-27 22:29:27', '2022-03-27 22:29:27'),
(85, 'MQU0000054', 'Nandhinivvv', 'MQRF0000033', 'nandhutamil199799@gmail.com', '$2y$10$cFJwQw5ZElKes/9tHIqMUehCkLMNUPJ8sm2OZ6Y7GNbn8J3da9f5.', NULL, NULL, '2022-03-27 23:01:59', '2022-03-27 23:01:59'),
(86, 'MQU0000055', 'Nandhinixxxx', 'MQRF0000033', 'nandhutamil19970@gmail.com', '$2y$10$eticNBw63nmAD8ip4xRSN.cqX1sJkztf0ztpNcCE05XJ91VetOrMK', NULL, NULL, '2022-03-27 23:10:33', '2022-03-27 23:10:33'),
(87, 'MQU0000056', 'user5', 'MQRF0000071', 'user50@gmail.com', '$2y$10$7imQ6pQXX4p6FKJSp/tjheDQrpRlzmoFWzifk.ZPc0G5wm7mA2Xme', NULL, NULL, '2022-03-27 23:16:06', '2022-03-27 23:16:06'),
(88, 'MQU0000057', 'Nandhin', 'MQRF0000033', 'tamil1997@gmail.com', '$2y$10$ZEus96ZMfzfy.t67US.zP.bA.HTHtNMw2hTZ48bENB5NToPR6F79y', NULL, NULL, '2022-03-28 02:47:31', '2022-03-28 02:47:31'),
(89, 'MQU0000058', 'Nandhu', 'MQRF0000001', 'nandhugjghfjk@gmail.com', '$2y$10$dlNxgD40YwEh4LNFOePeH.N55Z6ncn5E4.1vEwqvNZF/6dTBwmIma', NULL, NULL, '2022-03-28 04:25:44', '2022-03-28 04:25:44'),
(90, 'MQU0000059', 'Nandhini', 'MQRF0000074', 'nandhutamil190@gmail.com', '$2y$10$6.FbsjQF10UwbMTcU.7A9OCLW6foIIFeHYtFHztuC3YReZ7BODStq', NULL, NULL, '2022-03-28 04:38:01', '2022-03-28 04:38:01'),
(91, 'MQU0000060', 'vsncvc', 'MQRF0000074', 'nandhutamil18997@gmail.com', '$2y$10$4Q1pXdQ7zJuzUBOViX4kGe9z1g.Xq7JATnJOSTVLMUEd2EzBH3oSO', NULL, NULL, '2022-03-28 04:57:16', '2022-03-28 04:57:16'),
(92, 'MQU0000061', 'Nandhinivv', 'MQRF0000001', 'nandhutamil19897@gmail.com', '$2y$10$KQTaQdkrVfORdk.65a4Dzu1ilyFtDDCKDPIYv5OBBGs4C3OdE.B3i', NULL, NULL, '2022-03-28 08:19:46', '2022-03-28 08:19:46'),
(93, 'MQU0000062', 'user6', 'MQRF0000077', 'user6@gmail.com', '$2y$10$BRvz9XCJJZtIaKX6OAA7QuQsL/QJA0i71wX2qGXGAsW4XAAX463x2', NULL, NULL, '2022-03-28 08:24:32', '2022-03-28 08:24:32'),
(94, 'MQU0000063', 'vvvvvvv', 'MQRF0000001', 'vvvv@gmail.com', '$2y$10$ysRTwrOSbrYOiHFqtEbk8.lPT0HVB8bWajGJBjSPm1aTMXVBxgou.', NULL, NULL, '2022-03-29 00:03:32', '2022-03-29 00:03:32'),
(95, 'MQU0000064', 'Nandhinivvvvv', 'MQRF0000079', 'nandhutamil01997@gmail.com', '$2y$10$HzuRi2CIgpT9fAHtfUwTGuhWx.TjQOjH6jfMfga4FitIa/a13lz/y', NULL, NULL, '2022-03-29 00:05:41', '2022-03-29 00:05:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forcasts`
--
ALTER TABLE `forcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_users`
--
ALTER TABLE `mlm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_c_t_pays`
--
ALTER TABLE `m_c_t_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_pays`
--
ALTER TABLE `offline_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_points`
--
ALTER TABLE `pv_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referals`
--
ALTER TABLE `referals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_picks`
--
ALTER TABLE `self_picks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forcasts`
--
ALTER TABLE `forcasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mlm_users`
--
ALTER TABLE `mlm_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_c_t_pays`
--
ALTER TABLE `m_c_t_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `offline_pays`
--
ALTER TABLE `offline_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_points`
--
ALTER TABLE `pv_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `self_picks`
--
ALTER TABLE `self_picks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
