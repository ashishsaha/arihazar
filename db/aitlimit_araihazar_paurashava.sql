-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 10:38 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitlimit_araihazar_paurashava`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'certificate@gmail.com', NULL, '$2a$12$cwOzhCJy76/.z489a8ycDuw4GibkCPXmfwTZyJ8DBXGVvLAQWlmGi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `community` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `president` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_rickshaw_driver_licenses`
--

CREATE TABLE `auto_rickshaw_driver_licenses` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `slno` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `mname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `age` varchar(50) NOT NULL,
  `nid` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `current_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `upjela` varchar(256) CHARACTER SET utf8 NOT NULL,
  `post` varchar(256) CHARACTER SET utf8 NOT NULL,
  `licenseno` varchar(100) NOT NULL,
  `taka_receive_no` varchar(100) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `vat` double(20,2) NOT NULL,
  `others` double(20,2) DEFAULT NULL,
  `total` double(20,2) NOT NULL,
  `licensefee` double(50,2) NOT NULL,
  `issuedate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_rickshaw_owner_licenses`
--

CREATE TABLE `auto_rickshaw_owner_licenses` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `slno` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `mname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `nid` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `upjela` varchar(256) CHARACTER SET utf8 NOT NULL,
  `post` varchar(256) CHARACTER SET utf8 NOT NULL,
  `current_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `modelno` varchar(100) DEFAULT NULL,
  `licenseno` varchar(100) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `taka_receive_no` varchar(100) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `licensefee` double(20,2) NOT NULL,
  `vat` double(20,2) NOT NULL,
  `tinplate` double(20,2) NOT NULL,
  `name_change_fees` double(20,2) NOT NULL,
  `others` double(20,2) DEFAULT NULL,
  `total` double(20,2) NOT NULL,
  `issuedate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_rickshaw_types`
--

CREATE TABLE `auto_rickshaw_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` double(8,2) NOT NULL,
  `vat` double(8,2) NOT NULL,
  `tin_plate` double(8,2) NOT NULL DEFAULT '0.00',
  `total` double(20,2) NOT NULL,
  `name_change_fees` double(8,2) NOT NULL DEFAULT '0.00',
  `others` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `old_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) NOT NULL DEFAULT '1',
  `bank_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `bank_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `old_id`, `sister_concern_id`, `bank_name`, `bank_code`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'সোনালী ব্যাংক লিঃ', NULL, 1, '2023-12-03 19:05:39', '2023-12-03 19:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_details_id` int(10) UNSIGNED NOT NULL,
  `old_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) NOT NULL DEFAULT '1',
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `upangsho_id` int(11) NOT NULL DEFAULT '0',
  `acc_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_code` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `acc_details` varchar(191) CHARACTER SET utf8 NOT NULL,
  `open_balance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_balance` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_details_id`, `old_id`, `sister_concern_id`, `bank_id`, `branch_id`, `upangsho_id`, `acc_no`, `acc_code`, `acc_details`, `open_balance`, `update_balance`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 1, 1, '৩৬০২০০২০০১৩৬০', '০০১', 'আড়াইহাজার পৌরসভা বেতন হিসাব', '60172', NULL, 1, '2023-12-03 19:13:47', '2023-12-03 19:13:47'),
(2, NULL, 1, 1, 1, 1, '৩৬০২০০২০০১৩৬১', '০০২', 'বিভিন্ন বাজার বিভিন্ন স্টান্ড হিসাব', '456982', NULL, 1, '2023-12-03 19:17:15', '2023-12-03 19:17:15'),
(3, NULL, 1, 1, 1, 1, '৩৬০২০০২০০১৩৬২', '০০৩', 'আড়াইহাজার পৌরসভা হোল্ডিং কর হিসাব', '48632', NULL, 1, '2023-12-03 19:18:54', '2023-12-03 19:18:54'),
(4, NULL, 1, 1, 1, 1, '৩৬০২০০১০১৫২৬৪', '০০৪', 'আড়াই হাজার পৌরসভা জামানত হিসাব', '560566', NULL, 1, '2023-12-03 19:20:40', '2023-12-03 19:20:40'),
(5, NULL, 1, 1, 1, 1, '৩৬০২০৩৩০১১৩৬৫', '০০৫', 'প্রশাসক আড়াইহাজার পৌরসভা , পৌরকর', '26260', NULL, 1, '2023-12-03 19:24:27', '2023-12-03 19:24:27'),
(6, NULL, 1, 1, 1, 1, '৩৬০২০৩৩০১১২৬৬', '০০৬', 'পৌরসভা হাট বাজার হিসাব', '7349', NULL, 1, '2023-12-03 19:27:32', '2023-12-03 19:28:12'),
(7, NULL, 1, 1, 1, 1, '৩৬০২০৩৩০১১২৫৮', '০০৭', 'আড়াইহাজার পৌরসভা ভূমি রেভিনিউ হিঃ', '29897', NULL, 1, '2023-12-03 19:30:28', '2023-12-03 19:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details_up`
--

CREATE TABLE `bank_details_up` (
  `bank_details_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `upangsho_id` int(11) NOT NULL DEFAULT '0',
  `acc_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_code` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `acc_details` varchar(191) CHARACTER SET utf8 NOT NULL,
  `open_balance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_balance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_opn__blances`
--

CREATE TABLE `bank_opn__blances` (
  `open_bal_id` int(10) UNSIGNED NOT NULL,
  `bank_details_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `spid` int(11) NOT NULL,
  `emid` int(11) NOT NULL,
  `bonus` varchar(50) NOT NULL,
  `salary_status` int(11) DEFAULT '2',
  `houserent` varchar(50) DEFAULT '0',
  `treatment` varchar(50) DEFAULT '0',
  `tifin` varchar(50) DEFAULT '0',
  `wash` varchar(50) DEFAULT '0',
  `education` varchar(50) DEFAULT '0',
  `tour` varchar(50) DEFAULT '0',
  `mobile` varchar(50) DEFAULT '0',
  `tranport` varchar(50) DEFAULT '0',
  `mohargho` varchar(50) DEFAULT '0',
  `pfloanadvance` varchar(50) NOT NULL DEFAULT '0',
  `pf_found` varchar(54) NOT NULL,
  `relig` int(10) NOT NULL,
  `profund_status` int(1) NOT NULL DEFAULT '2',
  `pfprocesdate` date NOT NULL,
  `otherloan` varchar(50) NOT NULL DEFAULT '0',
  `graduaty` int(11) NOT NULL,
  `graduaty_status` int(1) NOT NULL DEFAULT '2',
  `graduaty_process_date` date DEFAULT NULL,
  `others` varchar(100) NOT NULL DEFAULT '1',
  `fiscal_year` varchar(220) NOT NULL,
  `fyear` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  `other_status` int(1) NOT NULL DEFAULT '2',
  `yearmonth` varchar(20) NOT NULL,
  `processdate` date NOT NULL,
  `salcashprodate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_processes`
--

CREATE TABLE `bonus_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `total` double(50,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_types`
--

CREATE TABLE `bonus_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bonus_religion_status` tinyint(4) NOT NULL COMMENT 'eid_ul_fitor=1,eid_ul_azha=1,boishakh=3,durgapuja=2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus_types`
--

INSERT INTO `bonus_types` (`id`, `name`, `bonus_religion_status`, `created_at`, `updated_at`) VALUES
(1, 'ঈদ উল ফিতর', 1, '2023-07-15 06:26:03', '2023-07-15 06:26:03'),
(2, 'ঈদ উল আজহা', 1, '2023-07-15 06:26:03', '2023-07-15 06:26:03'),
(3, 'পহেলা বৈশাখ', 3, '2023-07-15 06:26:03', '2023-07-15 06:26:03'),
(4, 'দূর্গা পুজা', 2, '2023-07-15 06:26:03', '2023-07-15 06:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `boraddos`
--

CREATE TABLE `boraddos` (
  `upangsho_id` int(10) UNSIGNED NOT NULL,
  `upangsho_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `upangsho_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boraddos`
--

INSERT INTO `boraddos` (`upangsho_id`, `upangsho_name`, `upangsho_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'উন্নয়ন', '', 1, NULL, NULL, NULL),
(5, 'রাজস্ব', '', 1, NULL, NULL, NULL),
(6, 'প্রকল্প', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `old_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) NOT NULL DEFAULT '1',
  `bank_id` int(11) NOT NULL,
  `branch_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `old_id`, `sister_concern_id`, `bank_id`, `branch_name`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'আড়াইহাজার শাখা', 1, '2023-12-03 19:06:28', '2023-12-03 19:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `bidget_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `upangsho_id` int(11) NOT NULL,
  `inout_id` int(11) NOT NULL,
  `khattype_id` int(11) DEFAULT NULL,
  `khtattypetype_id` int(11) NOT NULL DEFAULT '0',
  `khat_id` int(11) NOT NULL,
  `budget_amo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`bidget_id`, `user_id`, `upangsho_id`, `inout_id`, `khattype_id`, `khtattypetype_id`, `khat_id`, `budget_amo`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 2, 2, '7000000', '2023-24', 1, '2023-11-18 22:11:15', '2023-11-18 22:11:15'),
(2, 2, 1, 1, 1, 2, 1, '2000000', '2023-24', 1, '2023-11-18 22:12:23', '2023-11-18 22:12:23'),
(3, 2, 1, 1, 1, 0, 3, '20000000', '2023-24', 1, '2023-11-18 22:17:08', '2023-11-18 22:17:08'),
(4, 2, 1, 1, 1, 0, 453, '700000', '2023-24', 1, '2023-11-18 22:25:12', '2023-11-18 22:25:12'),
(5, 2, 1, 1, 1, 39, 454, '2700000', '2023-24', 1, '2023-11-18 22:31:06', '2023-11-18 22:31:06'),
(6, 2, 1, 1, 1, 39, 455, '300000', '2023-24', 1, '2023-11-18 22:31:54', '2023-11-18 22:31:54'),
(7, 2, 1, 1, 1, 0, 292, '600000', '2023-24', 1, '2023-11-18 22:32:57', '2023-11-18 22:32:57'),
(8, 2, 1, 1, 1, 0, 293, '300000', '2023-24', 1, '2023-11-18 22:33:38', '2023-11-18 22:33:38'),
(9, 2, 1, 1, 1, 0, 456, '100000', '2023-24', 1, '2023-11-18 22:36:49', '2023-11-18 22:36:49'),
(10, 2, 1, 1, 2, 6, 22, '300000', '2023-24', 1, '2023-11-19 22:54:55', '2023-11-19 22:54:55'),
(11, 2, 1, 1, 2, 6, 21, '200000', '2023-24', 1, '2023-11-19 22:55:27', '2023-11-19 22:55:27'),
(12, 2, 1, 1, 2, 7, 289, '800000', '2023-24', 1, '2023-11-19 22:56:29', '2023-11-19 22:56:29'),
(13, 2, 1, 1, 2, 7, 288, '200000', '2023-24', 1, '2023-11-19 22:56:54', '2023-11-19 22:56:54'),
(14, 2, 1, 1, 3, 0, 302, '200000', '2023-24', 1, '2023-11-19 22:58:55', '2023-11-19 22:58:55'),
(15, 2, 1, 1, 3, 0, 457, '400000', '2023-24', 1, '2023-11-19 23:02:16', '2023-11-19 23:02:16'),
(16, 2, 1, 1, 3, 0, 458, '200000', '2023-24', 1, '2023-11-19 23:04:05', '2023-11-19 23:04:05'),
(17, 2, 1, 1, 3, 0, 67, '300000', '2023-24', 1, '2023-11-19 23:04:47', '2023-11-19 23:04:47'),
(18, 2, 1, 1, 4, 0, 57, '1500000', '2023-24', 1, '2023-11-19 23:06:14', '2023-11-19 23:06:14'),
(19, 2, 1, 1, 3, 0, 459, '200000', '2023-24', 1, '2023-11-19 23:12:26', '2023-11-19 23:12:26'),
(20, 2, 1, 1, 3, 0, 460, '1500000', '2023-24', 1, '2023-11-19 23:14:54', '2023-11-19 23:14:54'),
(21, 2, 1, 1, 3, 0, 461, '100000', '2023-24', 1, '2023-11-19 23:18:53', '2023-11-19 23:18:53'),
(22, 2, 1, 1, 3, 0, 462, '100000', '2023-24', 1, '2023-11-19 23:21:21', '2023-11-19 23:21:21'),
(23, 2, 1, 1, 3, 0, 463, '100000', '2023-24', 1, '2023-11-19 23:24:26', '2023-11-19 23:24:26'),
(24, 2, 1, 1, 3, 0, 73, '200000', '2023-24', 1, '2023-11-19 23:25:15', '2023-11-19 23:25:15'),
(25, 2, 1, 1, 4, 0, 74, '40000000', '2023-24', 1, '2023-11-22 23:28:59', '2023-11-22 23:28:59'),
(26, 2, 1, 1, 4, 0, 464, '100000', '2023-24', 1, '2023-11-22 23:40:31', '2023-11-22 23:40:31'),
(27, 2, 1, 1, 4, 0, 465, '17000000', '2023-24', 1, '2023-11-22 23:41:12', '2023-11-22 23:41:12'),
(28, 2, 1, 1, 4, 0, 77, '200000', '2023-24', 1, '2023-11-22 23:41:54', '2023-11-22 23:41:54'),
(29, 2, 1, 1, 8, 0, 358, '800000', '2023-24', 1, '2023-11-22 23:43:16', '2023-11-22 23:43:16'),
(30, 2, 1, 1, 8, 0, 361, '300000', '2023-24', 1, '2023-11-22 23:43:57', '2023-11-22 23:43:57'),
(31, 2, 1, 1, 8, 0, 466, '6000000', '2023-24', 1, '2023-11-22 23:45:50', '2023-11-22 23:45:50'),
(32, 2, 1, 1, 8, 0, 351, '800000', '2023-24', 1, '2023-11-22 23:46:41', '2023-11-22 23:46:41'),
(33, 2, 1, 1, 8, 0, 467, '450000', '2023-24', 1, '2023-11-22 23:51:35', '2023-11-22 23:51:35'),
(34, 2, 1, 1, 8, 0, 93, '5000000', '2023-24', 1, '2023-11-22 23:52:16', '2023-11-22 23:52:16'),
(35, 2, 3, 1, 82, 0, 468, '10000000', '2023-24', 1, '2023-11-23 01:06:04', '2023-11-23 01:06:04'),
(36, 2, 3, 1, 82, 0, 469, '10000000', '2023-24', 1, '2023-11-23 01:08:45', '2023-11-23 01:08:45'),
(37, 2, 3, 1, 82, 0, 470, '2500000', '2023-24', 1, '2023-11-23 01:11:45', '2023-11-23 01:11:45'),
(38, 2, 3, 1, 82, 0, 471, '10000000', '2023-24', 1, '2023-11-23 01:13:02', '2023-11-23 01:13:02'),
(39, 2, 3, 1, 82, 0, 472, '1000000', '2023-24', 1, '2023-11-23 01:15:53', '2023-11-23 01:15:53'),
(40, 2, 3, 1, 83, 0, 473, '15000000', '2023-24', 1, '2023-11-27 14:20:10', '2023-11-27 14:20:10'),
(41, 2, 3, 1, 83, 0, 474, '280000000', '2023-24', 1, '2023-11-27 14:21:11', '2023-11-27 14:21:11'),
(42, 2, 3, 1, 83, 0, 475, '30000000', '2023-24', 1, '2023-11-27 14:21:50', '2023-11-27 14:21:50'),
(43, 2, 3, 1, 83, 0, 476, '10000000', '2023-24', 1, '2023-11-27 14:22:27', '2023-11-27 14:22:27'),
(44, 2, 3, 1, 83, 0, 477, '3000000', '2023-24', 1, '2023-11-27 14:23:35', '2023-11-27 14:23:35'),
(45, 2, 3, 1, 83, 0, 478, '15850000', '2023-24', 1, '2023-11-27 14:24:16', '2023-11-27 14:24:16'),
(46, 2, 3, 1, 83, 0, 479, '2500000', '2023-24', 1, '2023-12-01 20:02:36', '2023-12-01 20:02:36'),
(47, 2, 1, 2, 9, 0, 19, '2000000', '2023-24', 1, '2023-12-01 20:04:06', '2023-12-01 20:04:06'),
(48, 2, 1, 2, 9, 0, 309, '6500000', '2023-24', 1, '2023-12-01 20:05:15', '2023-12-01 20:05:15'),
(49, 2, 1, 2, 9, 0, 480, '3000000', '2023-24', 1, '2023-12-01 20:10:10', '2023-12-01 20:10:10'),
(50, 2, 1, 2, 9, 0, 481, '100000', '2023-24', 1, '2023-12-01 20:12:26', '2023-12-01 20:12:26'),
(51, 2, 1, 2, 9, 0, 316, '200000', '2023-24', 1, '2023-12-01 20:17:19', '2023-12-01 20:17:19'),
(52, 2, 1, 2, 9, 0, 30, '100000', '2023-24', 1, '2023-12-01 20:18:12', '2023-12-01 20:18:12'),
(53, 2, 1, 2, 9, 0, 321, '100000', '2023-24', 1, '2023-12-01 20:21:38', '2023-12-01 20:21:38'),
(54, 2, 1, 2, 9, 0, 320, '100000', '2023-24', 1, '2023-12-01 20:23:47', '2023-12-01 20:23:47'),
(55, 2, 1, 2, 9, 0, 318, '200000', '2023-24', 1, '2023-12-01 20:25:19', '2023-12-01 20:25:19'),
(56, 2, 1, 2, 9, 0, 328, '100000', '2023-24', 1, '2023-12-01 20:28:17', '2023-12-01 20:28:17'),
(57, 2, 1, 2, 76, 0, 422, '1000000', '2023-24', 1, '2023-12-02 01:25:41', '2023-12-02 01:25:41'),
(58, 2, 1, 2, 76, 0, 423, '500000', '2023-24', 1, '2023-12-02 01:28:28', '2023-12-02 01:28:28'),
(59, 2, 1, 2, 76, 0, 424, '500000', '2023-24', 1, '2023-12-02 01:31:08', '2023-12-02 01:31:08'),
(60, 2, 1, 2, 76, 0, 425, '50000', '2023-24', 1, '2023-12-02 01:32:45', '2023-12-02 01:32:45'),
(61, 2, 1, 2, 84, 0, 482, '700000', '2023-24', 1, '2023-12-02 01:39:54', '2023-12-02 01:39:54'),
(62, 2, 1, 2, 84, 0, 483, '100000', '2023-24', 1, '2023-12-02 01:47:32', '2023-12-02 01:47:32'),
(63, 2, 1, 2, 84, 0, 484, '500000', '2023-24', 1, '2023-12-02 01:48:01', '2023-12-02 01:48:01'),
(64, 2, 1, 2, 84, 0, 485, '500000', '2023-24', 1, '2023-12-02 01:48:32', '2023-12-02 01:48:32'),
(65, 2, 1, 2, 84, 0, 486, '250000', '2023-24', 1, '2023-12-02 01:49:14', '2023-12-02 01:49:14'),
(66, 2, 1, 2, 84, 0, 487, '100000', '2023-24', 1, '2023-12-02 01:49:40', '2023-12-02 01:49:40'),
(67, 2, 1, 2, 85, 0, 488, '800000', '2023-24', 1, '2023-12-02 04:08:46', '2023-12-02 04:08:46'),
(68, 2, 1, 2, 85, 0, 489, '400000', '2023-24', 1, '2023-12-02 04:09:21', '2023-12-02 04:09:21'),
(69, 2, 1, 2, 85, 0, 490, '200000', '2023-24', 1, '2023-12-02 04:09:52', '2023-12-02 04:09:52'),
(70, 2, 1, 2, 85, 0, 491, '200000', '2023-24', 1, '2023-12-02 04:10:39', '2023-12-02 04:10:39'),
(71, 2, 1, 2, 85, 0, 492, '20000', '2023-24', 1, '2023-12-02 04:11:28', '2023-12-02 04:11:28'),
(72, 2, 1, 2, 85, 0, 493, '100000', '2023-24', 1, '2023-12-02 04:11:54', '2023-12-02 04:11:54'),
(73, 2, 1, 2, 85, 0, 494, '100000', '2023-24', 1, '2023-12-02 04:12:27', '2023-12-02 04:12:27'),
(74, 2, 1, 2, 85, 0, 495, '100000', '2023-24', 1, '2023-12-02 04:12:54', '2023-12-02 04:12:54'),
(75, 2, 1, 2, 85, 0, 496, '50000', '2023-24', 1, '2023-12-02 04:13:33', '2023-12-02 04:13:33'),
(76, 2, 1, 2, 85, 0, 497, '200000', '2023-24', 1, '2023-12-02 04:14:06', '2023-12-02 04:14:06'),
(77, 2, 1, 2, 85, 0, 498, '600000', '2023-24', 1, '2023-12-02 04:14:43', '2023-12-02 04:14:43'),
(78, 2, 1, 2, 85, 0, 499, '500000', '2023-24', 1, '2023-12-02 04:15:12', '2023-12-02 04:15:12'),
(79, 2, 1, 2, 85, 0, 500, '1000000', '2023-24', 1, '2023-12-02 04:15:50', '2023-12-02 04:15:50'),
(80, 2, 1, 2, 85, 0, 501, '100000', '2023-24', 1, '2023-12-02 04:16:31', '2023-12-02 04:16:31'),
(81, 2, 1, 2, 85, 0, 502, '100000', '2023-24', 1, '2023-12-02 04:17:11', '2023-12-02 04:17:11'),
(82, 2, 1, 2, 68, 0, 367, '300000', '2023-24', 1, '2023-12-02 04:22:09', '2023-12-02 04:22:09'),
(83, 2, 1, 2, 68, 0, 366, '500000', '2023-24', 1, '2023-12-02 04:22:55', '2023-12-02 04:22:55'),
(84, 2, 1, 2, 68, 0, 503, '100000', '2023-24', 1, '2023-12-07 17:28:42', '2023-12-07 17:28:42'),
(85, 2, 1, 2, 68, 0, 504, '50000', '2023-24', 1, '2023-12-07 17:30:18', '2023-12-07 17:30:18'),
(86, 2, 1, 2, 68, 0, 505, '100000', '2023-24', 1, '2023-12-07 17:36:15', '2023-12-07 17:36:15'),
(87, 2, 1, 2, 68, 0, 506, '200000', '2023-24', 1, '2023-12-07 18:20:23', '2023-12-07 18:20:23'),
(88, 2, 1, 2, 68, 0, 507, '100000', '2023-24', 1, '2023-12-07 18:21:38', '2023-12-07 18:21:38'),
(89, 2, 1, 2, 68, 0, 508, '50000', '2023-24', 1, '2023-12-07 18:22:43', '2023-12-07 18:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `budget_logs`
--

CREATE TABLE `budget_logs` (
  `bdgtlog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `khat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  `year` varchar(30) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `apprby` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_rate` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_banks`
--

CREATE TABLE `cashbook_banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `bank_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_bank_details`
--

CREATE TABLE `cashbook_bank_details` (
  `bank_details_id` int(10) UNSIGNED NOT NULL,
  `old_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `upangsho_id` int(11) NOT NULL DEFAULT '0',
  `acc_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_code` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `acc_details` varchar(191) CHARACTER SET utf8 NOT NULL,
  `open_balance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_balance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_branches`
--

CREATE TABLE `cashbook_branches` (
  `branch_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `branch_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_incoexpenses`
--

CREATE TABLE `cashbook_incoexpenses` (
  `incoexpenses_id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT '0',
  `upangsho_id` int(11) NOT NULL,
  `inout_id` int(11) NOT NULL,
  `khattype_id` int(11) NOT NULL,
  `khtattypetype_id` int(11) DEFAULT '0',
  `khat_id` int(11) NOT NULL,
  `taxnontax` varchar(11) DEFAULT NULL,
  `khat_des` text CHARACTER SET utf8,
  `year` varchar(100) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `acc_no` varchar(256) NOT NULL,
  `vourcher_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `chalan_no` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `check_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `amount` varchar(30) NOT NULL DEFAULT '0',
  `note` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vat_tax_status` int(11) DEFAULT NULL,
  `uncashstatus` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `receiver_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `receive_datwe` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_khats`
--

CREATE TABLE `cashbook_khats` (
  `khat_id` int(10) UNSIGNED NOT NULL,
  `khattype` int(11) NOT NULL,
  `upangsho_id` int(11) NOT NULL,
  `txntx` int(11) NOT NULL DEFAULT '2',
  `tax_type_id` int(11) DEFAULT NULL,
  `tax_type_type_id` int(11) DEFAULT '0',
  `serilas` int(10) DEFAULT NULL,
  `khat_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_tax_types`
--

CREATE TABLE `cashbook_tax_types` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `upangsho_id` int(11) DEFAULT NULL,
  `taxnontaxid` int(11) NOT NULL DEFAULT '2',
  `khat_id` int(11) DEFAULT NULL,
  `subormain` int(11) DEFAULT '0',
  `tax_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashbook_tax_type_types`
--

CREATE TABLE `cashbook_tax_type_types` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `upangsho_id` int(11) DEFAULT NULL,
  `tnt` int(11) NOT NULL DEFAULT '2',
  `khat_id` int(11) DEFAULT NULL,
  `khtattype_id` int(11) NOT NULL DEFAULT '0',
  `serialise` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_name2` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `parmanent_address` text COLLATE utf8mb4_unicode_ci,
  `certificate_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `character_certificates`
--

CREATE TABLE `character_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--

CREATE TABLE `cleaners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cleaner_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` tinyint(1) NOT NULL DEFAULT '1',
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction_day` int(11) NOT NULL DEFAULT '0',
  `daily_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `deduct_salary` double(50,2) NOT NULL DEFAULT '0.00',
  `bonus` double(20,2) NOT NULL DEFAULT '0.00',
  `others_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `notes` int(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cleaner_bonus_logs`
--

CREATE TABLE `cleaner_bonus_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cleaner_id` bigint(20) UNSIGNED NOT NULL,
  `bonus` double(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cleaner_salary_logs`
--

CREATE TABLE `cleaner_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cleaner_id` bigint(20) UNSIGNED NOT NULL,
  `deduction_day` int(11) NOT NULL DEFAULT '0',
  `daily_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `others_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `deduct_salary` double(50,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holding_no` text COLLATE utf8mb4_unicode_ci,
  `area_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `sub_type_id` int(10) UNSIGNED NOT NULL,
  `fees` double(50,2) NOT NULL,
  `vat_percent` double(8,2) NOT NULL,
  `vat` double(8,2) NOT NULL,
  `sub_total` double(50,2) NOT NULL,
  `discount_type` tinyint(4) NOT NULL DEFAULT '2',
  `discount_percent` double NOT NULL DEFAULT '0',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `grand_total` double(50,2) NOT NULL,
  `old_grand_total` double(50,2) DEFAULT NULL,
  `collect_by` int(10) UNSIGNED NOT NULL COMMENT 'Fees Collector',
  `update_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Fees Approve',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=not approve,1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_areas`
--

CREATE TABLE `collection_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_closings`
--

CREATE TABLE `collection_closings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `approve_by` int(11) DEFAULT NULL,
  `closing_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_sub_types`
--

CREATE TABLE `collection_sub_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` double(50,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_types`
--

CREATE TABLE `collection_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `eid` int(11) NOT NULL,
  `branchid` int(11) DEFAULT NULL,
  `shaka_id` int(11) DEFAULT NULL,
  `scaleid` int(11) DEFAULT NULL,
  `emp_id` int(30) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `mname` varchar(190) CHARACTER SET utf8 DEFAULT NULL,
  `relig` int(11) DEFAULT NULL,
  `mob` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `designation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `houserent` varchar(50) DEFAULT '0',
  `treatment` varchar(50) DEFAULT '0',
  `tifin` varchar(50) DEFAULT '0',
  `wash` varchar(50) DEFAULT '0',
  `education` varchar(50) DEFAULT '0',
  `tour` varchar(50) DEFAULT '0',
  `mobile` varchar(50) DEFAULT '0',
  `tranport` varchar(50) DEFAULT '0',
  `mohargho` varchar(50) DEFAULT '0',
  `increment` varchar(50) DEFAULT '0',
  `loaninstall` varchar(50) DEFAULT '0',
  `salaryaccno` text CHARACTER SET utf8,
  `pfaccno` varchar(50) DEFAULT NULL,
  `grataccno` varchar(50) DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `satatus` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `presdate` date DEFAULT NULL,
  `srintidate` date DEFAULT NULL,
  `retireddate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cotractoraccounts`
--

CREATE TABLE `cotractoraccounts` (
  `conacc_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT '0',
  `contractor_id` int(11) NOT NULL,
  `project_id` text CHARACTER SET utf8 NOT NULL,
  `estmatekhat_id` int(11) NOT NULL,
  `estmatekhat_subid` int(11) DEFAULT NULL,
  `project_price` varchar(100) DEFAULT NULL,
  `contact_price` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bill_amnt` varchar(100) NOT NULL,
  `bankact` int(11) DEFAULT NULL,
  `security_money` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `incometax` varchar(100) NOT NULL,
  `bill_type` int(12) DEFAULT NULL,
  `contact_date` date DEFAULT NULL,
  `contractyear` varchar(100) NOT NULL,
  `prev_bill_amount` varchar(255) NOT NULL,
  `total_bill` varchar(100) DEFAULT '0',
  `bill_paid` int(10) NOT NULL DEFAULT '0',
  `bill_due` varchar(100) DEFAULT NULL,
  `acc_no` text CHARACTER SET utf8 NOT NULL,
  `check_no` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `vaocher_no` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

CREATE TABLE `counselors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'প্রশাসন বিভাগ', 1, '2019-07-08 15:37:20', '2019-07-08 15:37:20'),
(5, 'প্রকৌশল বিভাগ', 1, '2019-07-08 15:39:29', '2019-07-08 15:39:29'),
(6, 'স্বাস্থ্য পরিবার পরিকল্পনা ও পরিচ্ছন্নতা বিভাগ', 1, '2019-07-08 15:44:49', '2019-07-08 15:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd', NULL, NULL),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd', NULL, NULL),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd', NULL, NULL),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd', NULL, NULL),
(5, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd', NULL, NULL),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd', NULL, NULL),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd', NULL, NULL),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd', NULL, NULL),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd', NULL, NULL),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 0, 0, 'www.mymensingh.gov.bd', NULL, NULL),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd', NULL, NULL),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd', NULL, NULL),
(13, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd', NULL, NULL),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd', NULL, NULL),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd', NULL, NULL),
(16, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd', NULL, NULL),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd', NULL, NULL),
(18, 5, 'Bogura', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd', NULL, NULL),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd', NULL, NULL),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd', NULL, NULL),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd', NULL, NULL),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd', NULL, NULL),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd', NULL, NULL),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd', NULL, NULL),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd', NULL, NULL),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd', NULL, NULL),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd', NULL, NULL),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd', NULL, NULL),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd', NULL, NULL),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd', NULL, NULL),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd', NULL, NULL),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd', NULL, NULL),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd', NULL, NULL),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd', NULL, NULL),
(35, 1, 'Barishal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd', NULL, NULL),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd', NULL, NULL),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd', NULL, NULL),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd', NULL, NULL),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd', NULL, NULL),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd', NULL, NULL),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd', NULL, NULL),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd', NULL, NULL),
(43, 2, 'Chattogram', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd', NULL, NULL),
(44, 2, 'Cumilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd', NULL, NULL),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd', NULL, NULL),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd', NULL, NULL),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd', NULL, NULL),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd', NULL, NULL),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd', NULL, NULL),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd', NULL, NULL),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd', NULL, NULL),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd', NULL, NULL),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd', NULL, NULL),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd', NULL, NULL),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd', NULL, NULL),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd', NULL, NULL),
(57, 4, 'Jashore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd', NULL, NULL),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd', NULL, NULL),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd', NULL, NULL),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd', NULL, NULL),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd', NULL, NULL),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd', NULL, NULL),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd', NULL, NULL),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', 'বরিশাল', NULL, NULL),
(2, 'Chattogram', 'চট্টগ্রাম', NULL, NULL),
(3, 'Dhaka', 'ঢাকা', NULL, NULL),
(4, 'Khulna', 'খুলনা', NULL, NULL),
(5, 'Rajshahi', 'রাজশাহী', NULL, NULL),
(6, 'Rangpur', 'রংপুর', NULL, NULL),
(7, 'Sylhet', 'সিলেট', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eid` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `shaka_id` int(11) NOT NULL,
  `upananso` int(11) DEFAULT NULL,
  `scaleid` int(11) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mname` varchar(190) CHARACTER SET utf8 NOT NULL,
  `relig` int(11) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `email` varchar(190) DEFAULT NULL,
  `nid` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `salary` varchar(50) NOT NULL,
  `houserent` varchar(50) DEFAULT '0',
  `treatment` varchar(50) DEFAULT '0',
  `tifin` varchar(50) DEFAULT '0',
  `wash` varchar(50) DEFAULT '0',
  `education` varchar(50) DEFAULT '0',
  `tax` float DEFAULT '0',
  `tour` varchar(50) DEFAULT '0',
  `special_benefits` double(50,2) NOT NULL DEFAULT '0.00',
  `mobile` varchar(50) DEFAULT '0',
  `tranport` varchar(50) DEFAULT '0',
  `mohargho` varchar(50) DEFAULT '0',
  `increment` varchar(50) DEFAULT '0',
  `loaninstall` varchar(50) DEFAULT '0',
  `less_install` varchar(255) DEFAULT NULL,
  `pf_found` varchar(90) NOT NULL DEFAULT '0',
  `salaryaccno` varchar(50) NOT NULL,
  `pfaccno` varchar(50) NOT NULL,
  `graduaty` varchar(255) DEFAULT NULL,
  `grataccno` varchar(50) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `others` varchar(255) NOT NULL DEFAULT '0',
  `satatus` int(11) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `joindate` date DEFAULT NULL,
  `presdate` date DEFAULT NULL,
  `srintidate` date DEFAULT NULL,
  `retireddate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_certificates`
--

CREATE TABLE `family_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_certificate_details`
--

CREATE TABLE `family_certificate_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_certificate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL COMMENT '1 = wife,2=son,3=daughter',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_certificate_englishes`
--

CREATE TABLE `family_certificate_englishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_certificate_english_details`
--

CREATE TABLE `family_certificate_english_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_certificate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` tinyint(4) NOT NULL COMMENT '1= husband,2=wife,3=son,4=daughter,5=self',
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_areas`
--

CREATE TABLE `holding_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `road_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_assessments`
--

CREATE TABLE `holding_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holding_tax_payer_id` int(11) DEFAULT NULL,
  `holding_info_id` int(11) DEFAULT NULL,
  `holding_assessment_setting_id` int(11) DEFAULT NULL,
  `consider_holding_tax` double(14,2) DEFAULT NULL,
  `actual_assesment` double(14,2) DEFAULT NULL,
  `Yearly_construct_assesment` double(14,2) DEFAULT NULL,
  `Maintenance_deduct` double(14,2) DEFAULT NULL,
  `owner_deduct` double(14,2) DEFAULT NULL,
  `re_interim_assessment` tinyint(4) DEFAULT NULL,
  `total_approximate_rent` double(14,2) DEFAULT NULL,
  `total_monthly_rent` double(14,2) DEFAULT NULL,
  `Yearly_assesment` double(14,2) DEFAULT NULL,
  `holding_tax` double(14,2) DEFAULT NULL,
  `light_tax` double(14,2) DEFAULT NULL,
  `water_supply_tax` double(14,2) DEFAULT NULL,
  `consrvancy_tax` double(14,2) DEFAULT NULL,
  `other_tax` double(14,2) DEFAULT NULL,
  `total_tax` double(14,2) DEFAULT NULL,
  `paid_status` tinyint(4) DEFAULT NULL,
  `secretary` tinyint(4) DEFAULT NULL,
  `mayor` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_assessment_settings`
--

CREATE TABLE `holding_assessment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holding_tax_rate` double(8,2) NOT NULL,
  `light_rate` double(8,2) NOT NULL,
  `consevancy_rate` double(8,2) NOT NULL,
  `water_rate` double(8,2) NOT NULL,
  `other_rate` double(8,2) NOT NULL,
  `financial_years` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_flag` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_bills`
--

CREATE TABLE `holding_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_payer_id` int(10) UNSIGNED NOT NULL,
  `bill_session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'বিলের অর্থ বৎসর',
  `due_session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'বকেয়া শুরুর অর্থ বৎসর',
  `due_amount` double(8,2) NOT NULL COMMENT 'পূর্বের বকেয়া',
  `due_paid` double(8,2) NOT NULL DEFAULT '0.00',
  `due_rebate` double(8,2) NOT NULL DEFAULT '0.00',
  `surcharge` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '5% of due_amount ',
  `rebate_amount` double(8,2) NOT NULL DEFAULT '0.00' COMMENT 'discount ',
  `first_installment` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '1 ম কিস্তি ',
  `first_installment_paid` double(8,2) NOT NULL DEFAULT '0.00',
  `first_installment_rebate` double(8,2) NOT NULL DEFAULT '0.00',
  `second_installment` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '২ য় কিস্তি ',
  `second_installment_paid` double(8,2) NOT NULL DEFAULT '0.00',
  `second_installment_rebate` double(8,2) NOT NULL DEFAULT '0.00',
  `third_installment` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '৩ য় কিস্তি ',
  `third_installment_paid` double(8,2) NOT NULL DEFAULT '0.00',
  `third_installment_rebate` double(8,2) NOT NULL DEFAULT '0.00',
  `fourth_installment` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '৪ র্থ কিস্তি',
  `fourth_installment_paid` double(8,2) NOT NULL DEFAULT '0.00',
  `fourth_installment_rebate` double(8,2) NOT NULL DEFAULT '0.00',
  `yearly_rent` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '১০ মাসের ভাড়া',
  `status` int(11) NOT NULL DEFAULT '1',
  `installment_type` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `last_pay_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_categories`
--

CREATE TABLE `holding_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxable` tinyint(1) DEFAULT NULL,
  `tax_rate` double(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_facilities`
--

CREATE TABLE `holding_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxable` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_infos`
--

CREATE TABLE `holding_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `holding_tax_payer_id` int(10) UNSIGNED DEFAULT NULL,
  `holding_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_holding_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holding_category_id` int(10) UNSIGNED DEFAULT NULL,
  `use_type_id` int(11) DEFAULT NULL,
  `structure_type_id` int(11) DEFAULT NULL,
  `holding_facility_id` int(10) UNSIGNED DEFAULT NULL,
  `moholla_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_id` int(10) UNSIGNED DEFAULT NULL,
  `holding_area_id` int(10) UNSIGNED DEFAULT NULL,
  `usingHolding_id` int(11) DEFAULT NULL,
  `loan_deduct` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_pays`
--

CREATE TABLE `holding_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_tax_payers`
--

CREATE TABLE `holding_tax_payers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_tenant_infos`
--

CREATE TABLE `holding_tenant_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holding_tax_payer_id` int(11) NOT NULL,
  `holding_info_id` int(11) NOT NULL,
  `structure_type_id` int(11) NOT NULL,
  `tenant_floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_rent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holding_use_types`
--

CREATE TABLE `holding_use_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holding_use_types`
--

INSERT INTO `holding_use_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'আবাসিক', '2018-02-10 23:34:17', '2023-09-18 10:53:32'),
(2, 'বাণিজ্যিক', '2018-02-10 23:34:36', '2018-02-10 23:34:36'),
(3, 'মিশ্র-ব্যবহার', '2018-02-10 23:34:50', '2018-02-10 23:34:50'),
(4, 'শিক্ষা-প্রতিষ্ঠান', '2018-02-10 23:35:06', '2018-02-10 23:35:06'),
(5, 'কারখানা', '2018-02-10 23:35:17', '2018-02-10 23:35:17'),
(6, 'অফিস', '2018-02-10 23:35:30', '2018-02-10 23:35:30'),
(7, 'দাপ্তরিক', '2021-06-28 23:02:46', '2021-06-28 23:02:46'),
(8, 'ক্লিনিক', '2021-08-08 01:26:22', '2021-08-08 01:26:22'),
(9, 'হাসপাতাল', '2021-08-08 01:26:44', '2021-08-08 01:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `incoexpenses`
--

CREATE TABLE `incoexpenses` (
  `incoexpenses_id` int(11) NOT NULL,
  `cashbook_incoexpenses_id` int(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT '0',
  `upangsho_id` int(11) NOT NULL,
  `inout_id` int(11) NOT NULL,
  `khattype_id` int(11) NOT NULL,
  `khtattypetype_id` int(11) DEFAULT '0',
  `khat_id` int(11) NOT NULL,
  `proklpo_id` int(11) DEFAULT NULL,
  `taxnontax` varchar(11) DEFAULT NULL,
  `khat_des` text CHARACTER SET utf8,
  `year` varchar(100) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `acc_no` varchar(256) NOT NULL,
  `vourcher_no` varchar(255) DEFAULT NULL,
  `chalan_no` varchar(255) DEFAULT NULL,
  `check_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cheque_amount` double(100,2) NOT NULL DEFAULT '0.00',
  `amount` varchar(30) NOT NULL DEFAULT '0',
  `note` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vat_tax_status` int(11) DEFAULT NULL,
  `uncashstatus` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `receiver_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `receive_datwe` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoexpenses`
--

INSERT INTO `incoexpenses` (`incoexpenses_id`, `cashbook_incoexpenses_id`, `user_id`, `upangsho_id`, `inout_id`, `khattype_id`, `khtattypetype_id`, `khat_id`, `proklpo_id`, `taxnontax`, `khat_des`, `year`, `bank_id`, `branch_id`, `acc_no`, `vourcher_no`, `chalan_no`, `check_no`, `cheque_amount`, `amount`, `note`, `status`, `vat_tax_status`, `uncashstatus`, `date`, `receiver_name`, `receive_datwe`, `created_at`, `updated_at`) VALUES
(1, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6120', '', 0.00, '2000', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:14:27', '2023-12-03 22:14:27'),
(2, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6121', '', 0.00, '300', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:25:58', '2023-12-03 22:25:58'),
(3, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6122', '', 0.00, '375', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:26:24', '2023-12-03 22:26:24'),
(5, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6123', '', 0.00, '1400', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:46:50', '2023-12-03 22:46:50'),
(6, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6124', '', 0.00, '690', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:48:02', '2023-12-03 22:48:02'),
(7, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6125', '', 0.00, '2150', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:48:37', '2023-12-03 22:48:37'),
(8, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6126', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:48:57', '2023-12-03 22:48:57'),
(9, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6127', '', 0.00, '350', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:49:41', '2023-12-03 22:49:41'),
(10, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6128', '', 0.00, '80', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:49:59', '2023-12-03 22:49:59'),
(11, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6129', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:50:15', '2023-12-03 22:50:15'),
(12, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6130', '', 0.00, '4830', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:50:39', '2023-12-03 22:50:39'),
(13, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6131', '', 0.00, '150', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:51:31', '2023-12-03 22:51:31'),
(14, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6132', '', 0.00, '320', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:51:51', '2023-12-03 22:51:51'),
(15, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6133', '', 0.00, '1930', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:52:09', '2023-12-03 22:52:09'),
(16, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6134', '', 0.00, '1500', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:52:27', '2023-12-03 22:52:27'),
(17, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6135', '', 0.00, '680', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:52:54', '2023-12-03 22:52:54'),
(18, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6136', '', 0.00, '390', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:53:35', '2023-12-03 22:53:35'),
(19, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6137', '', 0.00, '700', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:53:55', '2023-12-03 22:53:55'),
(20, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6138', '', 0.00, '90', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:54:09', '2023-12-03 22:54:09'),
(21, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6139', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:54:23', '2023-12-03 22:54:23'),
(22, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6140', '', 0.00, '220', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:54:45', '2023-12-03 22:54:45'),
(23, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6141', '', 0.00, '2250', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:55:09', '2023-12-03 22:55:09'),
(24, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6142', '', 0.00, '330', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:55:26', '2023-12-03 22:55:26'),
(25, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6143', '', 0.00, '60', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:55:45', '2023-12-03 22:55:45'),
(26, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6144', '', 0.00, '360', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:56:06', '2023-12-03 22:56:06'),
(27, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6145', '', 0.00, '280', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:56:46', '2023-12-03 22:56:46'),
(28, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6146', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:57:03', '2023-12-03 22:57:03'),
(29, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6147', '', 0.00, '660', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:57:56', '2023-12-03 22:57:56'),
(30, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6148', '', 0.00, '110', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:58:28', '2023-12-03 22:58:28'),
(31, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6149', '', 0.00, '2790', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:58:49', '2023-12-03 22:58:49'),
(32, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6150', '', 0.00, '180', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 22:59:43', '2023-12-03 22:59:43'),
(33, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6151', '', 0.00, '70', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-03 23:00:05', '2023-12-03 23:00:05'),
(34, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8876', '', 0.00, '1480', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-04 22:26:47', '2023-12-04 22:26:47'),
(35, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8063', '', 0.00, '1825', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-04 22:27:39', '2023-12-04 22:27:39'),
(36, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8064', '', 0.00, '1825', NULL, 1, 1, 0, '2023-12-03', NULL, '2023-12-03', '2023-12-04 22:28:17', '2023-12-04 22:28:17'),
(37, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8894', '', 0.00, '2034', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:29:30', '2023-12-04 22:29:30'),
(38, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8895', '', 0.00, '2400', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:29:59', '2023-12-04 22:29:59'),
(39, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8896', '', 0.00, '1825', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:30:29', '2023-12-04 22:30:29'),
(40, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8897', '', 0.00, '1480', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:30:55', '2023-12-04 22:30:55'),
(41, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8898', '', 0.00, '1595', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:31:31', '2023-12-04 22:31:31'),
(42, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8899', '', 0.00, '2400', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:32:00', '2023-12-04 22:32:00'),
(43, NULL, '12', 1, 1, 1, 0, 453, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '619', '', 0.00, '6553', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:33:11', '2023-12-04 22:33:11'),
(44, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6154', '', 0.00, '2000', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:34:05', '2023-12-04 22:34:05'),
(45, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6155', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:34:39', '2023-12-04 22:34:39'),
(46, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6156', '', 0.00, '2160', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:35:15', '2023-12-04 22:35:15'),
(47, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6157', '', 0.00, '1200', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:35:57', '2023-12-04 22:35:57'),
(48, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6158', '', 0.00, '340', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:36:27', '2023-12-04 22:36:27'),
(49, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6159', '', 0.00, '850', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:37:00', '2023-12-04 22:37:00'),
(50, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6160', '', 0.00, '60', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:37:27', '2023-12-04 22:37:27'),
(51, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6161', '', 0.00, '1100', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:38:05', '2023-12-04 22:38:05'),
(52, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6162', '', 0.00, '150', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:38:32', '2023-12-04 22:38:32'),
(53, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6163', '', 0.00, '880', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:39:03', '2023-12-04 22:39:03'),
(54, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6164', '', 0.00, '550', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:39:54', '2023-12-04 22:39:54'),
(55, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6165', '', 0.00, '60', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:40:19', '2023-12-04 22:40:19'),
(56, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6166', '', 0.00, '60', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:40:51', '2023-12-04 22:40:51'),
(57, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6167', '', 0.00, '24000', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:41:42', '2023-12-04 22:41:42'),
(58, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6168', '', 0.00, '220', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:42:04', '2023-12-04 22:42:04'),
(59, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6169', '', 0.00, '2000', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:42:38', '2023-12-04 22:42:38'),
(60, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6170', '', 0.00, '350', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:43:05', '2023-12-04 22:43:05'),
(61, NULL, '12', 1, 1, 1, 2, 2, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6171', '', 0.00, '450', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:43:28', '2023-12-04 22:43:28'),
(62, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6173', '', 0.00, '2600', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:43:55', '2023-12-04 22:43:55'),
(63, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6174', '', 0.00, '650', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:44:23', '2023-12-04 22:44:23'),
(64, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6175', '', 0.00, '200', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:44:52', '2023-12-04 22:44:52'),
(65, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6176', '', 0.00, '110', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:45:18', '2023-12-04 22:45:18'),
(66, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6177', '', 0.00, '440', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:45:45', '2023-12-04 22:45:45'),
(67, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6178', '', 0.00, '4000', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-04 22:46:30', '2023-12-04 22:46:30'),
(68, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6172', '', 0.00, '440', NULL, 1, 1, 0, '2023-12-04', NULL, '2023-12-04', '2023-12-05 22:06:29', '2023-12-05 22:06:29'),
(69, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6180', '', 0.00, '550', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:21:29', '2023-12-05 22:21:29'),
(70, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6181', '', 0.00, '110', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:22:10', '2023-12-05 22:22:10'),
(71, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6182', '', 0.00, '880', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:22:42', '2023-12-05 22:22:42'),
(72, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6183', '', 0.00, '60', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:23:19', '2023-12-05 22:23:19'),
(73, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6184', '', 0.00, '660', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:24:02', '2023-12-05 22:24:02'),
(74, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6185', '', 0.00, '480', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:24:30', '2023-12-05 22:24:30'),
(75, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6186', '', 0.00, '80', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:24:54', '2023-12-05 22:24:54'),
(76, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6187', '', 0.00, '320', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:25:35', '2023-12-05 22:25:35'),
(77, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6188', '', 0.00, '950', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:25:57', '2023-12-05 22:25:57'),
(78, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6189', '', 0.00, '8500', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:26:37', '2023-12-05 22:26:37'),
(79, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6190', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:27:00', '2023-12-05 22:27:00'),
(80, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6191', '', 0.00, '330', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:27:30', '2023-12-05 22:27:30'),
(81, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6192', '', 0.00, '990', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:27:56', '2023-12-05 22:27:56'),
(82, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6193', '', 0.00, '780', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:28:25', '2023-12-05 22:28:25'),
(83, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6194', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:28:50', '2023-12-05 22:28:50'),
(84, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6195', '', 0.00, '330', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:29:19', '2023-12-05 22:29:19'),
(85, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6196', '', 0.00, '3000', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:29:49', '2023-12-05 22:29:49'),
(86, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6198', '', 0.00, '220', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:30:28', '2023-12-05 22:30:28'),
(87, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6199', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:31:01', '2023-12-05 22:31:01'),
(88, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6200', '', 0.00, '1050', NULL, 1, 1, 0, '2023-12-05', NULL, '2023-12-05', '2023-12-05 22:31:35', '2023-12-05 22:31:35'),
(89, NULL, '12', 1, 1, 1, 0, 453, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '620', '', 0.00, '600', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:19:25', '2023-12-06 20:19:25'),
(90, NULL, '12', 1, 1, 1, 0, 453, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '621', '', 0.00, '5427', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:20:19', '2023-12-06 20:20:19'),
(91, NULL, '12', 1, 1, 3, 0, 73, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8978', '', 0.00, '2000', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:21:43', '2023-12-06 20:21:43'),
(92, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8976', '', 0.00, '1000', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:22:48', '2023-12-06 20:22:48'),
(93, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8980', '', 0.00, '1000', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:23:20', '2023-12-06 20:23:20'),
(94, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8979', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:23:56', '2023-12-06 20:23:56'),
(95, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8989', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:24:25', '2023-12-06 20:24:25'),
(96, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8992', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:25:14', '2023-12-06 20:25:14'),
(97, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8994', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:25:37', '2023-12-06 20:25:37'),
(98, NULL, '12', 1, 1, 3, 0, 457, NULL, '2', NULL, '2023-24', 1, 1, '5', NULL, '8995', '', 0.00, '500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 20:25:57', '2023-12-06 20:25:57'),
(99, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8814', '', 0.00, '6425', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:17:04', '2023-12-06 23:17:04'),
(100, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8900', '', 0.00, '2170', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:17:39', '2023-12-06 23:17:39'),
(101, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8425', '', 0.00, '1825', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:18:14', '2023-12-06 23:18:14'),
(102, NULL, '12', 1, 1, 1, 39, 454, NULL, '2', NULL, '2023-24', 1, 1, '6', NULL, '8813', '', 0.00, '2975', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:18:47', '2023-12-06 23:18:47'),
(103, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6197', '', 0.00, '5500', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:20:45', '2023-12-06 23:20:45'),
(104, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6201', '', 0.00, '320', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:21:16', '2023-12-06 23:21:16'),
(105, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6202', '', 0.00, '110', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:21:48', '2023-12-06 23:21:48'),
(106, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6203', '', 0.00, '220', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:22:13', '2023-12-06 23:22:13'),
(107, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6204', '', 0.00, '130', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:22:39', '2023-12-06 23:22:39'),
(108, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6205', '', 0.00, '1130', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:23:02', '2023-12-06 23:23:02'),
(109, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6206', '', 0.00, '2680', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:23:28', '2023-12-06 23:23:28'),
(111, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6209', '', 0.00, '220', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:25:20', '2023-12-06 23:25:20'),
(112, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6211', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:25:44', '2023-12-06 23:25:44'),
(113, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6212', '', 0.00, '110', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:26:08', '2023-12-06 23:26:08'),
(114, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6213', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:26:28', '2023-12-06 23:26:28'),
(115, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6214', '', 0.00, '300', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:26:54', '2023-12-06 23:26:54'),
(116, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6208', '', 0.00, '100', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:40:06', '2023-12-06 23:40:06'),
(117, NULL, '12', 1, 1, 1, 2, 1, NULL, '1', NULL, '2023-24', 1, 1, '3', NULL, '6207', '', 0.00, '300', NULL, 1, 1, 0, '2023-12-06', NULL, '2023-12-06', '2023-12-06 23:40:42', '2023-12-06 23:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `income_certificates`
--

CREATE TABLE `income_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=bangla, 2= english ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_certificates`
--

INSERT INTO `income_certificates` (`id`, `serial_no`, `name`, `father_husband`, `mother`, `area_name`, `road_name`, `word_no`, `post_office`, `thana`, `upazila`, `certificate_details`, `status`, `created_at`, `updated_at`) VALUES
(1, '000001', 'মোঃ আবদুস সালাম', 'মোঃ আঃ কাদির ভূইয়া', 'মোসাঃ রাহিমা বেগম', 'লাসারদী গোয়ালপাড়া', 'রদী গোয়ালপাড়া', '০৮', 'আড়াইহাজার', 'আড়াইহাজার', 'আড়াইহাজার', 'তিনি অত্র পৌরসভার ০৮ নং ওয়ার্ডের স্থায়ী বাসিন্দা। অত্র পৌরসভার ০৮ নং ওয়ার্ড  কাউন্সিলর জনাব মোঃ জাকির হোসেন এর তদন্ত সাপেক্ষে জানা যায় যে,   \r\nতাহার মাসিক/বার্ষিক আয় ৫০০০০.০০ টাকা মাত্র।', 1, '2023-12-06 22:30:42', '2023-12-06 22:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `khats`
--

CREATE TABLE `khats` (
  `khat_id` int(10) UNSIGNED NOT NULL,
  `account_khat_id` int(11) DEFAULT NULL COMMENT 'this table refers',
  `khat_id_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `old_khat_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) NOT NULL DEFAULT '1',
  `khattype` int(11) NOT NULL,
  `txntx` int(11) DEFAULT NULL,
  `upangsho_id` int(11) NOT NULL,
  `tax_type_id` int(11) DEFAULT NULL,
  `tax_type_type_id` int(11) DEFAULT '0',
  `serilas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khat_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khats`
--

INSERT INTO `khats` (`khat_id`, `account_khat_id`, `khat_id_json`, `old_khat_id`, `sister_concern_id`, `khattype`, `txntx`, `upangsho_id`, `tax_type_id`, `tax_type_type_id`, `serilas`, `khat_name`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 2, '১)', 'গৃহ ও ভূমির উপর কর বকেয়া', 1, '2023-10-11 18:09:29', '2023-10-11 18:14:29'),
(2, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 2, '২)', 'গৃহ ও ভূমির উপর কর চলতি', 1, '2023-10-11 08:31:37', '2023-10-11 08:45:01'),
(3, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 0, 'খ.', 'স্থাবর সম্পত্তি হস্তান্তর', 1, '2023-10-11 08:33:40', '2023-10-11 08:33:40'),
(19, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, 'ক.', 'পৌরসভার মেয়র ও কাউন্সিলরগণের  সম্মানী ভাতা', 1, '2023-10-11 20:30:15', '2023-10-11 20:30:15'),
(21, NULL, NULL, NULL, 1, 1, NULL, 1, 2, 6, '১)', 'লাইটিং (বকেয়া)', 1, '2023-10-11 20:32:03', '2023-10-11 20:32:03'),
(22, NULL, NULL, NULL, 1, 1, NULL, 1, 2, 6, '২)', 'লাইটিং (চলতি)', 1, '2023-10-11 20:32:54', '2023-10-11 20:32:54'),
(30, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'ভ্রমণ ভাতা ব্যয়', 1, '2023-10-11 20:38:53', '2023-11-06 20:29:13'),
(57, NULL, NULL, NULL, 1, 1, NULL, 1, 4, 0, NULL, 'হাট বাজার ইজারা', 1, '2023-10-12 14:56:09', '2023-11-06 20:03:17'),
(67, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'বিভিন্ন সার্টিফিকেট', 1, '2023-10-12 15:09:18', '2023-11-06 19:09:37'),
(73, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'বিভিন্ন ফরম', 1, '2023-10-12 15:13:11', '2023-11-06 19:10:05'),
(74, NULL, NULL, NULL, 1, 1, NULL, 1, 4, 0, NULL, 'দরপত্র সিডিউল', 1, '2023-10-12 15:13:54', '2023-11-06 20:44:37'),
(77, NULL, NULL, NULL, 1, 1, NULL, 1, 4, 0, NULL, 'বিবিধ আয় (খাত বর্হিভুত)', 1, '2023-10-12 15:17:55', '2023-11-06 20:58:42'),
(93, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'ত্রাণ তহবিলে অনুদান প্রাপ্তি', 1, '2023-10-12 15:31:59', '2023-11-06 21:22:04'),
(288, NULL, NULL, NULL, 1, 1, NULL, 1, 2, 7, '১)', 'কনজারভেন্সী (বকেয়া)', 1, '2023-10-18 17:26:30', '2023-10-18 17:26:30'),
(289, NULL, NULL, NULL, 1, 1, NULL, 1, 2, 7, '২)', 'কনজারভেন্সী (চলতি)', 1, '2023-10-18 17:27:27', '2023-10-18 17:28:15'),
(292, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 0, NULL, 'জন্ম, বিবাহ,দত্তক গ্রহণ উপর কর', 1, '2023-11-06 17:49:19', '2023-11-06 17:49:19'),
(293, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 0, NULL, 'বিজ্ঞাপন কর', 1, '2023-11-06 17:51:59', '2023-11-06 17:51:59'),
(302, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'ঠিকাদারী লাইসেন্স তালিকা-ভূক্তি ও নবায়ন ফিস', 1, '2023-11-06 18:44:33', '2023-11-06 18:44:33'),
(309, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'পৌর কর্মকর্তা ও কর্মচারীদের বেতন ভাতা (পানি শাখা ব্যতীত)', 1, '2023-11-06 20:12:57', '2023-11-06 20:12:57'),
(316, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'কর্মকর্তা-কর্মচারী  শ্রান্তি ও  চিত্ত বিনোদন ভাতা', 1, '2023-11-06 20:23:28', '2023-12-01 20:16:38'),
(318, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'নববর্ষ ভাতা', 1, '2023-11-06 20:27:27', '2023-12-01 20:25:08'),
(320, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'পরিছন্ন কর্মীদের পোশাক', 1, '2023-11-06 20:33:18', '2023-12-01 20:23:38'),
(321, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'কর্মচারীদের অতিরিক্ত কাজের বিল', 1, '2023-11-06 20:36:20', '2023-12-01 20:21:17'),
(328, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'দরপত্র কমিটি সম্মানী ভাতা', 1, '2023-11-06 20:45:32', '2023-12-01 20:27:49'),
(351, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'বেতন ভাতা সহায়তা মঞ্জরী', 1, '2023-11-06 21:18:07', '2023-11-06 21:18:07'),
(358, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'ডেঙ্গুু,মশক নিধন, পরিস্কার পরিচ্ছন্নতা ও প্রচার খাতে মঞ্জরী', 1, '2023-11-06 21:24:36', '2023-11-06 21:24:36'),
(361, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'কোভিড-১৯ নমুনা সংগ্রহ ফি', 1, '2023-11-06 21:27:19', '2023-11-06 21:27:19'),
(366, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, NULL, 'মুদ্রণ খরচ', 1, '2023-11-07 01:21:40', '2023-11-07 01:21:40'),
(367, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, NULL, 'এসেসমেন্ট খরচ', 1, '2023-11-07 01:23:14', '2023-11-07 01:23:14'),
(422, NULL, NULL, NULL, 1, 2, NULL, 1, 76, 0, NULL, 'যানবাহন জ্বালানি / ভাড়া', 1, '2023-11-07 16:52:46', '2023-12-02 01:25:17'),
(423, NULL, NULL, NULL, 1, 2, NULL, 1, 76, 0, NULL, 'যানবাহন ক্রয় / রেজিস্ট্রেশন (জিপিগাড়ি ,মোটর ,সাইকেল ক্রয়  )', 1, '2023-11-07 16:54:23', '2023-12-02 01:28:07'),
(424, NULL, NULL, NULL, 1, 2, NULL, 1, 76, 0, NULL, 'যানবাহন মেরামত করন', 1, '2023-11-07 16:55:32', '2023-12-02 01:30:50'),
(425, NULL, NULL, NULL, 1, 2, NULL, 1, 76, 0, NULL, 'যানবাহন তৈরী /ক্রয়/ মেরামত', 1, '2023-11-07 16:57:12', '2023-12-02 01:32:34'),
(453, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 0, NULL, 'ইমারত নির্মাণ/পুনঃ নির্মাণ', 1, '2023-11-18 22:23:36', '2023-11-18 22:24:38'),
(454, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 39, NULL, 'পেশা,  ব্যবসা ও কলিং কর  চলতি', 1, '2023-11-18 22:29:50', '2023-11-18 22:29:50'),
(455, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 39, NULL, 'পেশা,  ব্যবসা ও কলিং কর  বকেয়া', 1, '2023-11-18 22:30:13', '2023-11-18 22:30:13'),
(456, NULL, NULL, NULL, 1, 1, NULL, 1, 1, 0, NULL, 'আমোদ প্রমোদ কর', 1, '2023-11-18 22:36:19', '2023-11-18 22:36:19'),
(457, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'ওয়ারিশ সনদ', 1, '2023-11-19 23:01:28', '2023-11-19 23:01:28'),
(458, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'নাম জারি ফিস', 1, '2023-11-19 23:03:30', '2023-11-19 23:03:30'),
(459, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'অস্থায়ী গরু / ছাগলের  হাট', 1, '2023-11-19 23:11:58', '2023-11-19 23:11:58'),
(460, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'সিএনজি , টেম্পু ও মাইক্রো স্ট্যান্ড ইজারা', 1, '2023-11-19 23:14:23', '2023-11-19 23:14:23'),
(461, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'গণ শোচাগার ইজারা', 1, '2023-11-19 23:18:23', '2023-11-19 23:18:23'),
(462, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'রোড রোলার / মিকচার মেশিন ভাড়া ও অন্যান্য', 1, '2023-11-19 23:20:56', '2023-11-19 23:20:56'),
(463, NULL, NULL, NULL, 1, 1, NULL, 1, 3, 0, NULL, 'কোন সংস্থা ব্যাক্তি কতৃক রাস্তা কর্তন ক্ষতি পূরণ', 1, '2023-11-19 23:23:59', '2023-11-19 23:23:59'),
(464, NULL, NULL, NULL, 1, 1, NULL, 1, 4, 0, NULL, 'অনাপত্তিকর ছাড়পত্র', 1, '2023-11-22 23:38:22', '2023-11-22 23:38:22'),
(465, NULL, NULL, NULL, 1, 1, NULL, 1, 4, 0, NULL, 'বেতন ভাতা বাবদ স্থানান্তর', 1, '2023-11-22 23:39:52', '2023-11-22 23:39:52'),
(466, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'LGCRRP', 1, '2023-11-22 23:45:05', '2023-11-22 23:45:05'),
(467, NULL, NULL, NULL, 1, 1, NULL, 1, 8, 0, NULL, 'নগর শুল্কের পরিবর্তে মঞ্জুরি', 1, '2023-11-22 23:50:53', '2023-11-22 23:50:53'),
(468, NULL, NULL, NULL, 1, 1, NULL, 3, 82, 0, NULL, 'উন্নয়ন সহায়ক তহবিল হতে থোক বরাদ্ধ', 1, '2023-11-23 01:05:17', '2023-11-23 01:05:17'),
(469, NULL, NULL, NULL, 1, 1, NULL, 3, 82, 0, NULL, 'উন্নয়ন সহায়ক তহবিল হতে বিশেষ  বরাদ্ধ', 1, '2023-11-23 01:08:03', '2023-11-23 01:08:03'),
(470, NULL, NULL, NULL, 1, 1, NULL, 3, 82, 0, NULL, 'পৌর ভবন / এর ভাণ্ডারী ওয়াল নির্মাণ ও অন্যান্য', 1, '2023-11-23 01:11:13', '2023-11-23 01:11:13'),
(471, NULL, NULL, NULL, 1, 1, NULL, 3, 82, 0, NULL, 'মার্কেট নির্মাণ / সংস্কার', 1, '2023-11-23 01:12:26', '2023-11-23 01:12:26'),
(472, NULL, NULL, NULL, 1, 1, NULL, 3, 82, 0, NULL, 'দুর্যোগ  /  বন্যায় ক্ষতিগ্রস্থ ,মশক নিধন ও করোনা ১৯', 1, '2023-11-23 01:15:21', '2023-11-23 01:15:21'),
(473, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'Local govt.covid-19,Response & Recovery Project (LGCRRP)', 1, '2023-11-27 14:09:02', '2023-11-27 14:09:02'),
(474, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'ইউজিআই আই পি -৩', 1, '2023-11-27 14:11:24', '2023-11-27 14:11:24'),
(475, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'গুরুত্বপূর্ণ শহর অবকাঠামো উন্নয়ণ প্রকল্প', 1, '2023-11-27 14:14:01', '2023-11-27 14:14:01'),
(476, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'জলবায়ু পরিবর্তনের ট্রাস্ট ফান্ড', 1, '2023-11-27 14:15:47', '2023-11-27 14:15:47'),
(477, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'সড়ক বাতি  (সৌর বিদ্যুৎ)', 1, '2023-11-27 14:16:32', '2023-11-27 14:16:32'),
(478, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'রাজস্ব তহবিল হতে স্থানন্তরিত', 1, '2023-11-27 14:19:20', '2023-11-27 14:19:20'),
(479, NULL, NULL, NULL, 1, 1, NULL, 3, 83, 0, NULL, 'বিবিধ আয়', 1, '2023-12-01 20:01:51', '2023-12-01 20:01:51'),
(480, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'কর্মকর্তা-কর্মচারী সি পি এফ ও আনুতোষিক', 1, '2023-12-01 20:09:34', '2023-12-01 20:09:34'),
(481, NULL, NULL, NULL, 1, 2, NULL, 1, 9, 0, NULL, 'কর্মকর্তা-কর্মচারী উৎসব ভাতা', 1, '2023-12-01 20:11:40', '2023-12-01 20:11:40'),
(482, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'ষ্টেশনারী', 1, '2023-12-02 01:39:22', '2023-12-02 01:39:22'),
(483, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'টেলিফোন, ডাক , তার ও ফ্যাক্স (ক্রয় /মেরামত )', 1, '2023-12-02 01:41:47', '2023-12-02 01:41:47'),
(484, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'বিদ্যুৎ বিল (অফিস )', 1, '2023-12-02 01:42:49', '2023-12-02 01:42:49'),
(485, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'বিদ্যুৎ বিল (সড়ক বাতি )', 1, '2023-12-02 01:43:20', '2023-12-02 01:43:20'),
(486, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'বৈদুত্যিক মালামাল', 1, '2023-12-02 01:44:16', '2023-12-02 01:44:16'),
(487, NULL, NULL, NULL, 1, 2, NULL, 1, 84, 0, NULL, 'শ্রেণী উন্নত করুন ব্যয়', 1, '2023-12-02 01:46:28', '2023-12-02 01:46:28'),
(488, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'আসবাবপত্র ক্রয় ও মেরামত', 1, '2023-12-02 03:51:01', '2023-12-02 03:51:01'),
(489, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'বিজ্ঞাপন বিল / প্রচার', 1, '2023-12-02 03:51:42', '2023-12-02 03:51:42'),
(490, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'ফটোকপি বিল /টুনারক্রয় /  মেরামত', 1, '2023-12-02 03:52:58', '2023-12-02 03:52:58'),
(491, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'ক্রোকারিজ মালামাল ক্রয়', 1, '2023-12-02 04:01:56', '2023-12-02 04:01:56'),
(492, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'পত্রিকা বিল (অফিস)', 1, '2023-12-02 04:02:27', '2023-12-02 04:02:27'),
(493, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'ইন্টারনেট বিল', 1, '2023-12-02 04:02:53', '2023-12-02 04:02:53'),
(494, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'গৃহনির্মাণ / মোটর সাইকেল ঋণ', 1, '2023-12-02 04:03:20', '2023-12-02 04:03:20'),
(495, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'নির্বাচন / শপথ', 1, '2023-12-02 04:03:47', '2023-12-02 04:03:47'),
(496, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'নিবন্ধন ফিস', 1, '2023-12-02 04:04:22', '2023-12-02 04:04:22'),
(497, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'বাজেট খরচ', 1, '2023-12-02 04:04:49', '2023-12-02 04:04:49'),
(498, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'আপ্পায়ন ব্যয়', 1, '2023-12-02 04:05:16', '2023-12-02 04:05:16'),
(499, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'অফিস সরঞ্জামাদি /কম্পিউটার ও প্রিন্টার (ক্রয়  /মেরামত )', 1, '2023-12-02 04:05:54', '2023-12-02 04:05:54'),
(500, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'বিবিধ দিবস / শোক দিবস', 1, '2023-12-02 04:06:21', '2023-12-02 04:06:21'),
(501, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'অন্যান্য (অপ্রত্যাশিত ব্যয় )/ যাতায়াত', 1, '2023-12-02 04:06:54', '2023-12-02 04:06:54'),
(502, NULL, NULL, NULL, 1, 2, NULL, 1, 85, 0, NULL, 'সংবর্ধনা (বিশেষ অথিতি আগমন)/ বিদায় অনুষ্টান', 1, '2023-12-02 04:07:19', '2023-12-02 04:07:19'),
(503, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'গ)', 'মাইকিং খরচ', 1, '2023-12-07 17:27:24', '2023-12-07 17:27:24'),
(504, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'ঘ)', 'রিবেট প্রদান', 1, '2023-12-07 17:29:33', '2023-12-07 17:29:33'),
(505, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'ঙ)', 'ব্যাংক চার্জ', 1, '2023-12-07 17:35:33', '2023-12-07 17:35:33'),
(506, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'চ)', 'ব্যানার তৈরী', 1, '2023-12-07 17:39:36', '2023-12-07 17:39:36'),
(507, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'ছ)', 'লিফলেট', 1, '2023-12-07 17:40:18', '2023-12-07 17:40:18'),
(508, NULL, NULL, NULL, 1, 2, NULL, 1, 68, 0, 'জ )', 'কর বর্ষ ঘোষনা', 1, '2023-12-07 18:17:23', '2023-12-07 18:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `khattypes`
--

CREATE TABLE `khattypes` (
  `khat_id` int(11) NOT NULL,
  `khat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khattypes`
--

INSERT INTO `khattypes` (`khat_id`, `khat`, `created_at`, `updated_at`) VALUES
(0, '0', '2019-03-01 00:00:00', '2019-03-02 00:00:00'),
(1, 'আয়', '2019-02-26 08:24:24', '2019-02-26 13:36:41'),
(2, 'ব্যয়', '2019-02-26 08:24:24', '2019-02-26 11:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `landless_certificates`
--

CREATE TABLE `landless_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `parmanent_address` text COLLATE utf8mb4_unicode_ci,
  `certificate_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_status` int(2) NOT NULL DEFAULT '2' COMMENT '2 to add loan , 1 for repayloan',
  `status` int(11) NOT NULL DEFAULT '1',
  `repay_loan_pf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `repay_loan_other` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `monthly_installment_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'পি এফ লোন', NULL, NULL),
(2, 'গৃহনির্মাণ লোন', NULL, NULL),
(3, 'কম্পিউটার লোন', NULL, NULL),
(4, 'মটর সাইকেল লোন', NULL, NULL),
(5, 'বাই সাইকেল লোন', NULL, NULL),
(6, 'অন্যান্য', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_29_103539_create_munus_table', 1),
(4, '2019_01_03_112826_permission_table', 1),
(5, '2019_01_03_120147_sub_menus_table', 1),
(6, '2019_01_03_120839_user_roles_table', 1),
(7, '2019_01_15_055542_create_upangshos_table', 1),
(8, '2019_01_15_055705_create_tax_types_table', 1),
(9, '2019_01_15_055912_create_expence_khats_table', 1),
(10, '2019_01_15_060017_create_income_khats_table', 1),
(11, '2019_01_15_060144_create_budgets_table', 1),
(12, '2019_01_15_060248_create_banks_table', 1),
(13, '2019_01_15_060419_create_bank_opn__blances_table', 1),
(14, '2019_01_15_060710_create_bank_details_table', 1),
(15, '2019_01_15_062839_create_incomes_table', 1),
(16, '2019_01_15_062913_create_expenses_table', 1),
(17, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(18, '2019_08_19_000000_create_failed_jobs_table', 2),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(20, '2023_06_24_060556_create_notifications_table', 2),
(21, '2023_07_13_105442_create_salary_scales_table', 3),
(22, '2023_07_13_110337_create_departments_table', 4),
(23, '2023_07_13_121954_create_loan_types_table', 5),
(24, '2023_07_13_123823_create_loans_table', 6),
(25, '2023_07_15_113153_create_bonus_types_table', 7),
(26, '2023_07_19_094710_create_sister_concerns_table', 8),
(27, '2023_09_18_104104_create_holding_areas_table', 9),
(28, '2023_09_18_104246_create_holding_bills_table', 9),
(29, '2023_09_18_104255_create_holding_pays_table', 9),
(30, '2023_09_18_104321_create_holding_tax_payers_table', 9),
(31, '2023_09_18_162612_create_holding_use_types_table', 10),
(32, '2023_09_18_170534_create_structure_types_table', 11),
(33, '2023_09_18_180342_create_ward_infos_table', 12),
(34, '2023_09_19_103652_create_holding_categories_table', 13),
(35, '2023_09_19_141813_create_holding_infos_table', 14),
(36, '2023_09_20_104940_create_holding_facilities_table', 15),
(37, '2023_09_20_112920_create_structure_holding_infos_table', 16),
(38, '2023_09_20_144656_create_holding_tenant_infos_table', 17),
(39, '2023_09_20_153959_create_holding_assessment_settings_table', 18),
(40, '2023_09_20_154857_create_holding_assessments_table', 19),
(41, '2023_09_22_115812_create_sign_boards_table', 20),
(42, '2023_09_22_120547_create_business_types_table', 21),
(43, '2023_09_22_173335_create_trade_users_table', 22),
(44, '2023_09_25_102448_create_trade_ledgers_table', 23),
(45, '2023_09_25_102537_create_trade_collects_table', 23),
(46, '2023_09_25_102619_create_trade_inspactor_reports_table', 23),
(47, '2023_09_25_102713_create_trade_collect_and_arrears_table', 23),
(48, '2023_09_25_110126_create_divisions_table', 24),
(49, '2023_09_25_110147_create_districts_table', 25),
(50, '2023_09_25_110323_create_upazilas_table', 25),
(127, '2014_10_12_000000_create_users_table', 1),
(128, '2014_10_12_100000_create_password_resets_table', 1),
(129, '2019_08_19_000000_create_failed_jobs_table', 1),
(130, '2020_01_18_195136_create_admins_table', 1),
(131, '2020_01_19_103259_create_certificates_table', 1),
(132, '2020_01_20_061414_create_family_certificates_table', 1),
(133, '2020_01_20_061434_create_family_certificate_details_table', 1),
(134, '2020_01_21_082633_create_family_certificate_englishes_table', 1),
(135, '2020_01_21_082645_create_family_certificate_english_details_table', 1),
(136, '2020_01_23_103713_create_character_certificates_table', 1),
(137, '2020_01_25_090123_create_nationality_certificates_table', 1),
(138, '2020_02_04_091734_create_counselors_table', 1),
(139, '2020_02_08_111741_create_nationality_certificate_engs_table', 1),
(140, '2020_03_21_093130_create_unmarriage_certificate_bns_table', 1),
(141, '2020_03_21_112414_create_remarriage_certificate_bns_table', 1),
(142, '2020_03_22_081237_create_income_certificates_table', 1),
(143, '2020_03_29_094043_create_oyarish_certificates_table', 1),
(144, '2020_03_29_094128_create_oyarish_certificate_families_table', 1),
(145, '2020_03_29_094136_create_oyarish_certificate_family_details_table', 1),
(146, '2020_12_31_074550_create_landless_certificates_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nationality_certificates`
--

CREATE TABLE `nationality_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `road_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_office` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nationality_certificate_engs`
--

CREATE TABLE `nationality_certificate_engs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `road_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_office` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oyarish_certificates`
--

CREATE TABLE `oyarish_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `counselor_id` int(11) DEFAULT NULL,
  `word_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moholla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oyarish_certificate_families`
--

CREATE TABLE `oyarish_certificate_families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oyarish_certificate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alive_status` tinyint(4) DEFAULT NULL COMMENT '1=alive,0=death',
  `status` tinyint(4) NOT NULL COMMENT '1 = wife,2=son,3=daughter',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oyarish_certificate_family_details`
--

CREATE TABLE `oyarish_certificate_family_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oyarish_certificate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oyarish_certificate_family_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alive_status` tinyint(4) DEFAULT NULL COMMENT '1=alive,0=death',
  `status` tinyint(4) NOT NULL COMMENT '1 = wife,2=son,3=daughter',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectpayments`
--

CREATE TABLE `projectpayments` (
  `pid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `proklpo_id` int(11) NOT NULL,
  `bankact` int(11) NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `bill_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `payment_date` date NOT NULL,
  `prev_bill_amount1` varchar(255) DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `commints` longtext CHARACTER SET utf8,
  `check_nos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remarriage_certificate_bns`
--

CREATE TABLE `remarriage_certificate_bns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=bangla, 2= english ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaryproces`
--

CREATE TABLE `salaryproces` (
  `spid` int(11) NOT NULL,
  `onudan` decimal(50,2) NOT NULL DEFAULT '0.00',
  `emid` int(11) NOT NULL,
  `f_load_id` int(11) DEFAULT NULL,
  `o_load_id` int(11) DEFAULT NULL,
  `salary` varchar(50) NOT NULL,
  `salary_status` int(11) DEFAULT '2',
  `houserent` varchar(50) DEFAULT '0',
  `treatment` varchar(50) DEFAULT '0',
  `tifin` varchar(50) DEFAULT '0',
  `wash` varchar(50) DEFAULT '0',
  `education` varchar(50) DEFAULT '0',
  `tax` float DEFAULT '0',
  `tour` varchar(50) DEFAULT '0',
  `mobile` varchar(50) DEFAULT '0',
  `tranport` varchar(50) DEFAULT '0',
  `mohargho` varchar(50) DEFAULT '0',
  `special_benefits` double NOT NULL DEFAULT '0',
  `pfloanadvance` varchar(50) NOT NULL DEFAULT '0',
  `pf_found` varchar(54) NOT NULL,
  `profund_status` int(1) NOT NULL DEFAULT '2',
  `pfprocesdate` date DEFAULT NULL,
  `otherloan` varchar(50) NOT NULL DEFAULT '0',
  `graduaty` int(11) DEFAULT NULL,
  `graduaty_status` int(1) NOT NULL DEFAULT '2',
  `graduaty_process_date` date DEFAULT NULL,
  `others` varchar(100) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '2',
  `other_status` int(1) NOT NULL DEFAULT '2',
  `fyear` varchar(256) NOT NULL,
  `yearmonth` varchar(20) NOT NULL,
  `earn_vat` varchar(255) DEFAULT NULL,
  `processdate` date DEFAULT NULL,
  `salcashprodate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_processes`
--

CREATE TABLE `salary_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `bi_monthly` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `total` double(50,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_scales`
--

CREATE TABLE `salary_scales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shakhas`
--

CREATE TABLE `shakhas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biv_id` int(11) NOT NULL,
  `shaka_name` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shakhas`
--

INSERT INTO `shakhas` (`id`, `user_id`, `biv_id`, `shaka_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 4, 'প্রশাসন শাখা', 0, NULL, NULL),
(5, 4, 4, 'সাধারণ  শাখা', 0, NULL, NULL),
(6, 4, 4, 'হিসাব  শাখা', 0, NULL, NULL),
(7, 4, 4, 'আসেসমেন্ত  শাখা', 0, NULL, NULL),
(8, 4, 4, 'কর আদায / লাইসেন্স  শাখা', 0, NULL, NULL),
(9, 4, 4, 'পৌর বাজার  শাখা', 0, NULL, NULL),
(10, 4, 4, 'শিক্ষা / সাংস্কৃতিক / পাঠাগার  শাখা', 0, NULL, NULL),
(11, 4, 5, 'পানি সরবরাহ ও পয়:নিস্কাশণ', 0, NULL, NULL),
(12, 4, 5, 'পূর্ত, বিদ্যুৎ ও যান্ত্রিক  শাখা', 0, NULL, NULL),
(13, 4, 6, 'পরিচ্ছন্নতা  শাখা', 0, NULL, NULL),
(14, 4, 6, 'স্বাস্থ্য পরিবার পরিচ্ছন্নতা  শাখা', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sign_boards`
--

CREATE TABLE `sign_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sign_board_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_board_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sign_boards`
--

INSERT INTO `sign_boards` (`id`, `sign_board_type`, `sign_board_rate`, `created_at`, `updated_at`) VALUES
(1, 'সাধারন (বেসরকারি)', '100.00', '2018-03-15 00:56:45', '2018-05-23 15:30:31'),
(2, 'সাধারণ(সরকারি)', '150.00', '2018-03-21 00:27:44', '2018-05-23 15:30:42'),
(3, 'আলোক   সজ্জিত (বেসরকারি)', '150.00', '2018-05-23 15:30:15', '2018-05-23 15:30:15'),
(4, 'আলোক সজ্জিত ( সরকারি)', '200.00', '2018-05-23 15:31:49', '2018-05-23 15:31:49'),
(6, 'প্রযোজ্য নহে', '0', '2018-10-22 23:23:27', '2018-10-22 23:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `sister_concerns`
--

CREATE TABLE `sister_concerns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sister_concerns`
--

INSERT INTO `sister_concerns` (`id`, `name`, `role`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'অ্যাকাউন্ট', 2, 1, 1, '2023-07-19 03:48:26', '2023-07-19 03:48:26'),
(2, 'এইচআর এবং পেরোল', 3, 2, 0, '2023-07-19 03:48:26', '2023-07-19 03:48:26'),
(3, 'সুইপার বিল', 4, 3, 0, '2023-07-19 03:48:26', '2023-07-19 03:48:26'),
(4, 'ক্যাশবুক', 5, 4, 0, '2023-07-19 03:48:26', '2023-07-19 03:48:26'),
(5, 'হোল্ডিং ট্যাক্স\r\n', 6, 5, 0, '2023-07-19 03:48:26', '2023-07-19 03:48:26'),
(6, 'ট্রেড লাইসেন্স', 7, 6, 0, '2023-09-22 03:59:49', '2023-09-22 03:59:49'),
(7, 'আদায়', 8, 7, 1, '2023-09-22 03:59:49', '2023-09-22 03:59:49'),
(8, 'অটো রিক্সা লাইসেন্স', 9, 8, 0, '2023-09-22 03:59:49', '2023-09-22 03:59:49'),
(9, 'সার্টিফিকেট', 10, 9, 1, '2023-09-29 03:59:49', '2023-09-29 03:59:49'),
(10, 'স্টক ডিস্ট্রিবিউশন', 11, 10, 1, '2023-09-29 03:59:49', '2023-09-29 03:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `stock_categories`
--

CREATE TABLE `stock_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_employees`
--

CREATE TABLE `stock_employees` (
  `id` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `shaka_id` int(11) NOT NULL,
  `upananso` int(11) DEFAULT NULL,
  `scaleid` int(11) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mname` varchar(190) CHARACTER SET utf8 NOT NULL,
  `relig` int(11) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `email` varchar(190) DEFAULT NULL,
  `nid` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `salary` varchar(50) NOT NULL,
  `houserent` varchar(50) DEFAULT '0',
  `treatment` varchar(50) DEFAULT '0',
  `tifin` varchar(50) DEFAULT '0',
  `wash` varchar(50) DEFAULT '0',
  `education` varchar(50) DEFAULT '0',
  `tax` float DEFAULT '0',
  `tour` varchar(50) DEFAULT '0',
  `mobile` varchar(50) DEFAULT '0',
  `tranport` varchar(50) DEFAULT '0',
  `mohargho` varchar(50) DEFAULT '0',
  `increment` varchar(50) DEFAULT '0',
  `loaninstall` varchar(50) DEFAULT '0',
  `less_install` varchar(255) DEFAULT NULL,
  `pf_found` varchar(90) NOT NULL DEFAULT '0',
  `salaryaccno` varchar(50) NOT NULL,
  `pfaccno` varchar(50) NOT NULL,
  `graduaty` varchar(255) DEFAULT NULL,
  `grataccno` varchar(50) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `others` varchar(255) NOT NULL DEFAULT '0',
  `satatus` int(11) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `joindate` date DEFAULT NULL,
  `presdate` date DEFAULT NULL,
  `srintidate` date DEFAULT NULL,
  `retireddate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_product_purchase_orders`
--

CREATE TABLE `stock_product_purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `unit_price` double(20,2) NOT NULL,
  `total` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase_inventories`
--

CREATE TABLE `stock_purchase_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` double(8,2) NOT NULL,
  `avg_unit_price` double(20,2) NOT NULL,
  `last_unit_price` double(20,2) NOT NULL,
  `total` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase_inventory_logs`
--

CREATE TABLE `stock_purchase_inventory_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=In; 2=Distribution',
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `purchase_order_id` int(10) UNSIGNED DEFAULT NULL,
  `distribution_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` double(8,2) NOT NULL,
  `unit_price` double(20,2) DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisition_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase_orders`
--

CREATE TABLE `stock_purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `receive_date` date DEFAULT NULL,
  `total` double(20,2) NOT NULL,
  `paid` double(20,2) NOT NULL,
  `due` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase_payments`
--

CREATE TABLE `stock_purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` int(10) UNSIGNED NOT NULL,
  `transaction_method` tinyint(4) DEFAULT NULL COMMENT '1=Cash; 2=Bank',
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `bank_account_id` int(10) UNSIGNED DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_sub_categories`
--

CREATE TABLE `stock_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_suppliers`
--

CREATE TABLE `stock_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_units`
--

CREATE TABLE `stock_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_holding_infos`
--

CREATE TABLE `structure_holding_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `holding_tax_payer_id` int(11) NOT NULL,
  `holding_info_id` int(11) NOT NULL,
  `structure_type_id` int(11) NOT NULL,
  `use_type_id` int(11) NOT NULL,
  `total_floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_use_floor_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_use_floor_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unuse_floor_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_length` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `construction_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `construction_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprox_monthly_rent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_types`
--

CREATE TABLE `structure_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `structure_types`
--

INSERT INTO `structure_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'পাকা', '2018-02-10 17:37:57', '2018-02-10 17:37:57'),
(2, 'আধা পাকা', '2018-02-10 17:38:08', '2023-09-18 11:29:37'),
(3, 'কাচা', '2018-02-10 17:38:19', '2018-02-10 17:38:19'),
(4, 'মিশ্র', '2018-02-10 17:38:30', '2018-02-24 18:31:52'),
(5, 'কাচা (মেঝে পাকা)', '2020-09-26 21:26:01', '2020-09-26 21:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `sweeper_bonuses`
--

CREATE TABLE `sweeper_bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_processes_id` bigint(20) UNSIGNED NOT NULL,
  `cleaner_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `bonus` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `total` double(50,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sweeper_salaries`
--

CREATE TABLE `sweeper_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_processes_id` bigint(20) UNSIGNED NOT NULL,
  `cleaner_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `bi_monthly` int(11) NOT NULL,
  `deduction_day` int(11) NOT NULL DEFAULT '0',
  `daily_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `others_salary` double(20,2) NOT NULL DEFAULT '0.00',
  `deduct_salary` double(50,2) NOT NULL DEFAULT '0.00',
  `total` double(50,2) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE `tax_types` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `old_tax_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) DEFAULT '1',
  `upangsho_id` int(11) DEFAULT NULL,
  `khat_id` int(11) DEFAULT NULL,
  `subormain` int(11) DEFAULT '0',
  `tax_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_types`
--

INSERT INTO `tax_types` (`tax_id`, `old_tax_id`, `sister_concern_id`, `upangsho_id`, `khat_id`, `subormain`, `tax_name`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 1, 0, 'করসমূহ', 1, '2023-10-11 18:06:44', '2023-10-11 18:06:44'),
(2, NULL, 1, 1, 1, 0, 'রেইট', 1, '2023-10-11 18:15:56', '2023-10-11 18:15:56'),
(3, NULL, 1, 1, 1, 0, 'লাইসেন্স, ফিস ও সম্পত্তি ভাড়া', 1, '2023-10-11 18:16:12', '2023-11-06 18:37:53'),
(4, NULL, 1, 1, 1, 0, 'অন্যান্য আয়', 1, '2023-10-11 18:16:27', '2023-11-06 20:01:07'),
(8, NULL, 1, 1, 1, 0, 'উন্নয়ন খাত ব্যতীত সরকারী অনুদান', 1, '2023-10-11 18:18:55', '2023-11-06 21:13:42'),
(9, NULL, 1, 1, 2, 0, 'সাধারণ সংস্থাপন ব্যয়', 1, '2023-10-11 18:19:48', '2023-11-06 20:05:02'),
(68, NULL, 1, 1, 2, 0, 'কর আদায় খরচ', 1, '2023-11-07 01:20:29', '2023-11-07 01:20:29'),
(76, NULL, 1, 1, 2, 0, 'যানবাহন ও স্থায়ী সম্পত্তি ক্রয়', 1, '2023-11-07 16:52:10', '2023-11-07 16:52:10'),
(82, NULL, 1, 3, 1, 0, 'সরকার প্রদত্ত উন্নয়ন সহায়তা মঞ্জুরী', 1, '2023-11-23 00:42:15', '2023-11-23 00:42:15'),
(83, NULL, 1, 3, 1, 0, 'অন্যান্য', 1, '2023-11-23 01:17:21', '2023-11-23 01:17:21'),
(84, NULL, 1, 1, 2, 0, 'ষ্টেশনারী ও বিবিধ', 1, '2023-12-02 01:37:48', '2023-12-02 01:37:48'),
(85, NULL, 1, 1, 2, 0, 'আনুসঙ্গিক ব্যয়', 1, '2023-12-02 03:49:39', '2023-12-02 03:49:39'),
(86, NULL, 1, 1, 2, 0, 'স্বাস্থ্য ও পয়ঃপ্রণালী', 1, '2023-12-07 18:40:45', '2023-12-07 18:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `tax_type_types`
--

CREATE TABLE `tax_type_types` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `old_tax_id` int(11) DEFAULT NULL,
  `sister_concern_id` int(11) NOT NULL DEFAULT '1',
  `upangsho_id` int(11) DEFAULT NULL,
  `tnt` int(11) DEFAULT NULL,
  `khat_id` int(11) DEFAULT NULL,
  `khtattype_id` int(11) NOT NULL DEFAULT '0',
  `serialise` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_name2` varchar(191) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_type_types`
--

INSERT INTO `tax_type_types` (`tax_id`, `old_tax_id`, `sister_concern_id`, `upangsho_id`, `tnt`, `khat_id`, `khtattype_id`, `serialise`, `tax_name2`, `status`, `created_at`, `updated_at`) VALUES
(0, NULL, 0, 0, NULL, 0, 0, NULL, 'নাই', 1, '2023-10-11 18:08:57', '2023-10-11 18:08:57'),
(2, NULL, 1, 1, NULL, 1, 1, 'ক)', 'গৃহ ও ভূমির উপর কর (বকেয়া ও চলতি):', 1, '2023-10-11 18:08:57', '2023-10-11 18:08:57'),
(6, NULL, 1, 1, NULL, 1, 2, 'ক.', 'লাইটিং', 1, '2023-10-11 08:53:09', '2023-11-06 18:13:54'),
(7, NULL, 1, 1, NULL, 1, 2, 'খ.', 'কনজারভেন্সী', 1, '2023-10-11 08:57:35', '2023-11-06 18:17:12'),
(39, NULL, 1, 1, NULL, 1, 1, NULL, 'পেশাঃ ব্যবসা ও কলিং (চলতি,বকেয়া)', 1, '2023-11-18 22:28:39', '2023-11-18 22:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `team_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_collects`
--

CREATE TABLE `trade_collects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trade_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collect_details` tinyint(4) DEFAULT NULL,
  `trade_arrears` double(20,2) DEFAULT NULL,
  `trade_surcharge` double(20,2) DEFAULT NULL,
  `present_trade` double(20,2) DEFAULT NULL,
  `signborad` double(20,2) DEFAULT NULL,
  `extra` double(20,2) DEFAULT NULL,
  `total_collect_amount` double(20,2) DEFAULT NULL,
  `collect_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_collect_and_arrears`
--

CREATE TABLE `trade_collect_and_arrears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `financial_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_holding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_collect_holding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demand_arrears` double(20,2) DEFAULT NULL,
  `demand_present_tax` double(20,2) DEFAULT NULL,
  `collect_arrears` double(20,2) DEFAULT NULL,
  `collect_present_tax` double(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_inspactor_reports`
--

CREATE TABLE `trade_inspactor_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trade_user_id` int(10) UNSIGNED DEFAULT NULL,
  `org_name` tinyint(4) DEFAULT NULL,
  `correct_org_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` tinyint(4) DEFAULT NULL,
  `correct_owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` tinyint(4) DEFAULT NULL,
  `correct_business_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_start_date` tinyint(4) DEFAULT NULL,
  `correct_business_start_date` date DEFAULT NULL,
  `business_capital` tinyint(4) DEFAULT NULL,
  `correct_business_capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_address` tinyint(4) DEFAULT NULL,
  `correct_org_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_holding_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_shop_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_ward_id` int(11) DEFAULT NULL,
  `correct_road_id` int(11) DEFAULT NULL,
  `correct_district_id` int(11) DEFAULT NULL,
  `correct_upazila_id` int(11) DEFAULT NULL,
  `sign_board_type` tinyint(4) DEFAULT NULL,
  `correct_sign_board_type` int(11) DEFAULT NULL,
  `sign_board_size` tinyint(4) DEFAULT NULL,
  `correct_sign_board_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_application` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_ledgers`
--

CREATE TABLE `trade_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrears` double(20,2) DEFAULT NULL,
  `surcharge` double(20,2) DEFAULT NULL,
  `licence_fee` double(20,2) DEFAULT NULL,
  `signboard_fee` double(20,2) DEFAULT NULL,
  `extra_fee` double(20,2) DEFAULT NULL,
  `renewal_date` date DEFAULT NULL,
  `financial_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_users`
--

CREATE TABLE `trade_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_husband_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holding_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `road_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT '0',
  `licence_issue_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signboard_id` int(11) DEFAULT NULL,
  `signboard_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signboard_fee` double(20,2) DEFAULT NULL,
  `licence_fee` double(20,2) DEFAULT '0.00',
  `financial_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrears` double(20,2) DEFAULT '0.00',
  `arrears_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_rate` double(20,2) DEFAULT NULL,
  `renewal_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_status` tinyint(4) NOT NULL DEFAULT '0',
  `business_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_paid_capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_tax` tinyint(4) DEFAULT NULL,
  `total_employers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `machine_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biddut_generator` tinyint(4) DEFAULT NULL,
  `motor_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `bin_vat` tinyint(4) NOT NULL DEFAULT '0',
  `bin_vat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_telephone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_web_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `marital_status` enum('বিবাহিত','অবিবাহিত') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_tin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_scan_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_tin_scan_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_tin_scan_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bin_vat_scan_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_paid_voucher_scan_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_sheet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_tenant_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_drowing_paper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_drowing_paper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspector` tinyint(4) NOT NULL DEFAULT '0',
  `inspactor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspactor_report` longtext COLLATE utf8mb4_unicode_ci,
  `secretary` tinyint(4) NOT NULL DEFAULT '0',
  `secretary_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secretary_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mayor` tinyint(4) NOT NULL DEFAULT '0',
  `mayor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mayor_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unmarriage_certificate_bns`
--

CREATE TABLE `unmarriage_certificate_bns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_husband` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=bangla, 2= english ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upangshos`
--

CREATE TABLE `upangshos` (
  `upangsho_id` int(10) UNSIGNED NOT NULL,
  `upangsho_name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `upangsho_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upangshos`
--

INSERT INTO `upangshos` (`upangsho_id`, `upangsho_name`, `upangsho_code`, `status`, `created_at`, `updated_at`) VALUES
(0, 'নাই', 'নাই', 1, NULL, NULL),
(1, 'উপাংশ ১ ( রাজস্ব হিসাব )', 'উপ-১', 1, '2019-02-26 04:12:24', '2023-10-09 06:38:18'),
(2, 'উপাংশ ২ (রাজস্ব হিসাব )', 'উপ-২', 1, '2019-03-01 23:52:10', '2023-10-09 19:00:05'),
(3, 'উন্নয়ন হিসাব', 'উন্ন-১', 1, '2019-03-04 04:31:02', '2019-03-04 04:31:02'),
(4, 'মুল্ধন হিসাব', '৩', 1, '2023-09-27 19:12:45', '2023-09-27 19:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী', NULL, NULL),
(2, 34, 'Bamna Upazila', 'বামনা', NULL, NULL),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর', NULL, NULL),
(4, 34, 'Betagi Upazila', 'বেতাগি', NULL, NULL),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা', NULL, NULL),
(6, 34, 'Taltali Upazila', 'তালতলী', NULL, NULL),
(7, 35, 'Muladi Upazila', 'মুলাদি', NULL, NULL),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ', NULL, NULL),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা', NULL, NULL),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর', NULL, NULL),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ', NULL, NULL),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা', NULL, NULL),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী', NULL, NULL),
(14, 35, 'Hizla Upazila', 'হিজলা', NULL, NULL),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ ', NULL, NULL),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর', NULL, NULL),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর', NULL, NULL),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন', NULL, NULL),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন', NULL, NULL),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান', NULL, NULL),
(21, 36, 'Lalmohan Upazila', 'লালমোহন', NULL, NULL),
(22, 36, 'Manpura Upazila', 'মনপুরা', NULL, NULL),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন', NULL, NULL),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর', NULL, NULL),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া', NULL, NULL),
(26, 37, 'Nalchity Upazila', 'নালচিতি', NULL, NULL),
(27, 37, 'Rajapur Upazila', 'রাজাপুর', NULL, NULL),
(28, 38, 'Bauphal Upazila', 'বাউফল', NULL, NULL),
(29, 38, 'Dashmina Upazila', 'দশমিনা', NULL, NULL),
(30, 38, 'Galachipa Upazila', 'গলাচিপা', NULL, NULL),
(31, 38, 'Kalapara Upazila', 'কালাপারা', NULL, NULL),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ ', NULL, NULL),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর', NULL, NULL),
(34, 38, 'Dumki Upazila', 'ডুমকি', NULL, NULL),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি', NULL, NULL),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', NULL, NULL),
(37, 39, 'Kaukhali', 'কাউখালি', NULL, NULL),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', NULL, NULL),
(39, 39, 'Nazirpur', 'নাজিরপুর', NULL, NULL),
(40, 39, 'Nesarabad', 'নেসারাবাদ', NULL, NULL),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', NULL, NULL),
(42, 39, 'Zianagar', 'জিয়ানগর', NULL, NULL),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', NULL, NULL),
(44, 40, 'Thanchi', 'থানচি', NULL, NULL),
(45, 40, 'Lama', 'লামা', NULL, NULL),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', NULL, NULL),
(47, 40, 'Ali kadam', 'আলী কদম', NULL, NULL),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', NULL, NULL),
(49, 40, 'Ruma', 'রুমা', NULL, NULL),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর', NULL, NULL),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ', NULL, NULL),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর', NULL, NULL),
(53, 41, 'Nabinagar Upazila', 'নবীনগর', NULL, NULL),
(54, 41, 'Sarail Upazila', 'সরাইল', NULL, NULL),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', NULL, NULL),
(56, 41, 'Kasba Upazila', 'কসবা', NULL, NULL),
(57, 41, 'Akhaura Upazila', 'আখাউরা', NULL, NULL),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর', NULL, NULL),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর', NULL, NULL),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', NULL, NULL),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', NULL, NULL),
(62, 42, 'Haimchar', 'হাইমচর', NULL, NULL),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', NULL, NULL),
(64, 42, 'Kachua', 'কচুয়া', NULL, NULL),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', NULL, NULL),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', NULL, NULL),
(67, 42, 'Shahrasti', 'শাহরাস্তি', NULL, NULL),
(68, 43, 'Anwara Upazila', 'আনোয়ারা', NULL, NULL),
(69, 43, 'Banshkhali Upazila', 'বাশখালি', NULL, NULL),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি', NULL, NULL),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ', NULL, NULL),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি', NULL, NULL),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী', NULL, NULL),
(74, 43, 'Lohagara Upazila', 'লোহাগারা', NULL, NULL),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই', NULL, NULL),
(76, 43, 'Patiya Upazila', 'পটিয়া', NULL, NULL),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া', NULL, NULL),
(78, 43, 'Raozan Upazila', 'রাউজান', NULL, NULL),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ', NULL, NULL),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া', NULL, NULL),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড', NULL, NULL),
(82, 44, 'Barura Upazila', 'বড়ুরা', NULL, NULL),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া', NULL, NULL),
(84, 44, 'Burichong Upazila', 'বুড়িচং', NULL, NULL),
(85, 44, 'Chandina Upazila', 'চান্দিনা', NULL, NULL),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম', NULL, NULL),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি', NULL, NULL),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার', NULL, NULL),
(89, 44, 'Homna Upazila', 'হোমনা', NULL, NULL),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর', NULL, NULL),
(91, 44, 'Laksam Upazila', 'লাকসাম', NULL, NULL),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ', NULL, NULL),
(93, 44, 'Meghna Upazila', 'মেঘনা', NULL, NULL),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর', NULL, NULL),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট', NULL, NULL),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ', NULL, NULL),
(97, 44, 'Titas Upazila', 'তিতাস', NULL, NULL),
(98, 45, 'Chakaria Upazila', 'চকরিয়া', NULL, NULL),
(100, 45, 'Cox\'s Bazar Sadar Upazila', 'কক্স বাজার সদর', NULL, NULL),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া', NULL, NULL),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী', NULL, NULL),
(103, 45, 'Ramu Upazila', 'রামু', NULL, NULL),
(104, 45, 'Teknaf Upazila', 'টেকনাফ', NULL, NULL),
(105, 45, 'Ukhia Upazila', 'উখিয়া', NULL, NULL),
(106, 45, 'Pekua Upazila', 'পেকুয়া', NULL, NULL),
(107, 46, 'Feni Sadar', 'ফেনী সদর', NULL, NULL),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', NULL, NULL),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', NULL, NULL),
(110, 46, 'Parshuram', 'পরশুরাম', NULL, NULL),
(111, 46, 'Fhulgazi', 'ফুলগাজি', NULL, NULL),
(112, 46, 'Sonagazi', 'সোনাগাজি', NULL, NULL),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা ', NULL, NULL),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি', NULL, NULL),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি', NULL, NULL),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি', NULL, NULL),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি', NULL, NULL),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা', NULL, NULL),
(119, 47, 'Panchhari Upazila', 'পানছড়ি', NULL, NULL),
(120, 47, 'Ramgarh Upazila', 'রামগড়', NULL, NULL),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর', NULL, NULL),
(122, 48, 'Raipur Upazila', 'রায়পুর', NULL, NULL),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ', NULL, NULL),
(124, 48, 'Ramgati Upazila', 'রামগতি', NULL, NULL),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর', NULL, NULL),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর', NULL, NULL),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ', NULL, NULL),
(128, 49, 'Chatkhil Upazila', 'চাটখিল', NULL, NULL),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ', NULL, NULL),
(130, 49, 'Shenbag Upazila', 'শেনবাগ', NULL, NULL),
(131, 49, 'Hatia Upazila', 'হাতিয়া', NULL, NULL),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট ', NULL, NULL),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি', NULL, NULL),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর ', NULL, NULL),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর', NULL, NULL),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি', NULL, NULL),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি', NULL, NULL),
(138, 50, 'Barkal Upazila', 'বরকল', NULL, NULL),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি', NULL, NULL),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি', NULL, NULL),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই', NULL, NULL),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু', NULL, NULL),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর ', NULL, NULL),
(144, 50, 'Kaukhali Upazila', 'কাউখালি', NULL, NULL),
(145, 1, 'Dhamrai Upazila', 'ধামরাই', NULL, NULL),
(146, 1, 'Dohar Upazila', 'দোহার', NULL, NULL),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ', NULL, NULL),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ', NULL, NULL),
(149, 1, 'Savar Upazila', 'সাভার', NULL, NULL),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর', NULL, NULL),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী', NULL, NULL),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা', NULL, NULL),
(153, 2, 'Madhukhali Upazila', 'মধুখালি', NULL, NULL),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা', NULL, NULL),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড', NULL, NULL),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন ', NULL, NULL),
(157, 2, 'Sadarpur Upazila', 'সদরপুর', NULL, NULL),
(158, 2, 'Shaltha Upazila', 'শালথা', NULL, NULL),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', NULL, NULL),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', NULL, NULL),
(161, 3, 'Kapasia', 'কাপাসিয়া', NULL, NULL),
(162, 3, 'Sripur', 'শ্রীপুর', NULL, NULL),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', NULL, NULL),
(164, 3, 'Tongi', 'টঙ্গি', NULL, NULL),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর', NULL, NULL),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি', NULL, NULL),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া', NULL, NULL),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর', NULL, NULL),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া', NULL, NULL),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ', NULL, NULL),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ', NULL, NULL),
(172, 5, 'Islampur Upazila', 'ইসলামপুর', NULL, NULL),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর', NULL, NULL),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ', NULL, NULL),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা', NULL, NULL),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি ', NULL, NULL),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', NULL, NULL),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম', NULL, NULL),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর', NULL, NULL),
(180, 6, 'Bhairab Upazila', 'ভৈরব', NULL, NULL),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর ', NULL, NULL),
(182, 6, 'Itna Upazila', 'ইটনা', NULL, NULL),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ', NULL, NULL),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি', NULL, NULL),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর', NULL, NULL),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর', NULL, NULL),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন', NULL, NULL),
(188, 6, 'Nikli Upazila', 'নিকলি', NULL, NULL),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা', NULL, NULL),
(190, 6, 'Tarail Upazila', 'তাড়াইল', NULL, NULL),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', NULL, NULL),
(192, 7, 'Kalkini', 'কালকিনি', NULL, NULL),
(193, 7, 'Rajoir', 'রাজইর', NULL, NULL),
(194, 7, 'Shibchar', 'শিবচর', NULL, NULL),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর', NULL, NULL),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর', NULL, NULL),
(197, 8, 'Shibalaya Upazila', 'শিবালয়', NULL, NULL),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া', NULL, NULL),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর', NULL, NULL),
(200, 8, 'Ghior Upazila', 'ঘিওর', NULL, NULL),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর', NULL, NULL),
(202, 9, 'Lohajang Upazila', 'লোহাজং', NULL, NULL),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর', NULL, NULL),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর', NULL, NULL),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান', NULL, NULL),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি', NULL, NULL),
(207, 9, 'Gazaria Upazila', 'গজারিয়া', NULL, NULL),
(208, 10, 'Bhaluka', 'ভালুকা', NULL, NULL),
(209, 10, 'Trishal', 'ত্রিশাল', NULL, NULL),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', NULL, NULL),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', NULL, NULL),
(212, 10, 'Dhobaura', 'ধবারুয়া', NULL, NULL),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', NULL, NULL),
(214, 10, 'Gaffargaon', 'গফরগাঁও', NULL, NULL),
(215, 10, 'Gauripur', 'গৌরিপুর', NULL, NULL),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', NULL, NULL),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', NULL, NULL),
(218, 10, 'Nandail', 'নন্দাইল', NULL, NULL),
(219, 10, 'Phulpur', 'ফুলপুর', NULL, NULL),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার', NULL, NULL),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও', NULL, NULL),
(222, 11, 'Bandar', 'বান্দার', NULL, NULL),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর', NULL, NULL),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ', NULL, NULL),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ', NULL, NULL),
(226, 12, 'Belabo Upazila', 'বেলাবো', NULL, NULL),
(227, 12, 'Monohardi Upazila', 'মনোহরদি', NULL, NULL),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর', NULL, NULL),
(229, 12, 'Palash Upazila', 'পলাশ', NULL, NULL),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর', NULL, NULL),
(231, 12, 'Shibpur Upazila', 'শিবপুর', NULL, NULL),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', NULL, NULL),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', NULL, NULL),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', NULL, NULL),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', NULL, NULL),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', NULL, NULL),
(237, 13, 'Madan Upazilla', 'মদন', NULL, NULL),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', NULL, NULL),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', NULL, NULL),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', NULL, NULL),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', NULL, NULL),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি', NULL, NULL),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট', NULL, NULL),
(244, 14, 'Pangsha Upazila', 'পাংশা', NULL, NULL),
(245, 14, 'Kalukhali Upazila', 'কালুখালি', NULL, NULL),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর', NULL, NULL),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', NULL, NULL),
(248, 15, 'Damudya Upazila', 'দামুদিয়া', NULL, NULL),
(249, 15, 'Naria Upazila', 'নড়িয়া', NULL, NULL),
(250, 15, 'Jajira Upazila', 'জাজিরা', NULL, NULL),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ', NULL, NULL),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট ', NULL, NULL),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি', NULL, NULL),
(254, 16, 'Nakla Upazila', 'নাকলা', NULL, NULL),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি', NULL, NULL),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর', NULL, NULL),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি', NULL, NULL),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর', NULL, NULL),
(259, 17, 'Sakhipur Upazila', 'সখিপুর', NULL, NULL),
(260, 17, 'Basail Upazila', 'বসাইল', NULL, NULL),
(261, 17, 'Madhupur Upazila', 'মধুপুর', NULL, NULL),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল', NULL, NULL),
(263, 17, 'Kalihati Upazila', 'কালিহাতি', NULL, NULL),
(264, 17, 'Nagarpur Upazila', 'নগরপুর', NULL, NULL),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর', NULL, NULL),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর', NULL, NULL),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার', NULL, NULL),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর', NULL, NULL),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি', NULL, NULL),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর', NULL, NULL),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি', NULL, NULL),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট', NULL, NULL),
(273, 55, 'Kachua Upazila', 'কচুয়া', NULL, NULL),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট ', NULL, NULL),
(275, 55, 'Mongla Upazila', 'মংলা', NULL, NULL),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ', NULL, NULL),
(277, 55, 'Rampal Upazila', 'রামপাল', NULL, NULL),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা', NULL, NULL),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা', NULL, NULL),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর', NULL, NULL),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর ', NULL, NULL),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা', NULL, NULL),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর', NULL, NULL),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর', NULL, NULL),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া ', NULL, NULL),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর', NULL, NULL),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা', NULL, NULL),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর ', NULL, NULL),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা', NULL, NULL),
(290, 57, 'Sharsha Upazila', 'সারশা', NULL, NULL),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর', NULL, NULL),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর', NULL, NULL),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ', NULL, NULL),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর ', NULL, NULL),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা', NULL, NULL),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা', NULL, NULL),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা', NULL, NULL),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা ', NULL, NULL),
(299, 59, 'Dacope Upazila', 'ডাকপে', NULL, NULL),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া', NULL, NULL),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া', NULL, NULL),
(302, 59, 'Koyra Upazila', 'কয়ড়া', NULL, NULL),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা', NULL, NULL),
(304, 59, 'Phultala Upazila', 'ফুলতলা', NULL, NULL),
(305, 59, 'Rupsa Upazila', 'রূপসা', NULL, NULL),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', NULL, NULL),
(307, 60, 'Kumarkhali', 'কুমারখালি', NULL, NULL),
(308, 60, 'Daulatpur', 'দৌলতপুর', NULL, NULL),
(309, 60, 'Mirpur', 'মিরপুর', NULL, NULL),
(310, 60, 'Bheramara', 'ভেরামারা', NULL, NULL),
(311, 60, 'Khoksa', 'খোকসা', NULL, NULL),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর', NULL, NULL),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর', NULL, NULL),
(314, 61, 'Shalikha Upazila', 'শালিখা', NULL, NULL),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর', NULL, NULL),
(316, 62, 'angni Upazila', 'আংনি', NULL, NULL),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর', NULL, NULL),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর', NULL, NULL),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', NULL, NULL),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', NULL, NULL),
(321, 63, 'Kalia Upazilla', 'কালিয়া', NULL, NULL),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর', NULL, NULL),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি ', NULL, NULL),
(324, 64, 'Debhata Upazila', 'দেভাটা', NULL, NULL),
(325, 64, 'Tala Upazila', 'তালা', NULL, NULL),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া', NULL, NULL),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ', NULL, NULL),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর', NULL, NULL),
(329, 18, 'Adamdighi', 'আদমদিঘী', NULL, NULL),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', NULL, NULL),
(331, 18, 'Sherpur', 'শেরপুর', NULL, NULL),
(332, 18, 'Dhunat', 'ধুনট', NULL, NULL),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', NULL, NULL),
(334, 18, 'Gabtali', 'গাবতলি', NULL, NULL),
(335, 18, 'Kahaloo', 'কাহালু', NULL, NULL),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', NULL, NULL),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', NULL, NULL),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', NULL, NULL),
(339, 18, 'Shibganj', 'শিবগঞ্জ', NULL, NULL),
(340, 18, 'Sonatala', 'সোনাতলা', NULL, NULL),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', NULL, NULL),
(342, 19, 'Akkelpur', 'আক্কেলপুর', NULL, NULL),
(343, 19, 'Kalai', 'কালাই', NULL, NULL),
(344, 19, 'Khetlal', 'খেতলাল', NULL, NULL),
(345, 19, 'Panchbibi', 'পাঁচবিবি', NULL, NULL),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর', NULL, NULL),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর', NULL, NULL),
(348, 20, 'Manda Upazila', 'মান্দা', NULL, NULL),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর', NULL, NULL),
(350, 20, 'Atrai Upazila', 'আত্রাই', NULL, NULL),
(351, 20, 'Raninagar Upazila', 'রাণীনগর', NULL, NULL),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা', NULL, NULL),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট ', NULL, NULL),
(354, 20, 'Sapahar Upazila', 'সাপাহার', NULL, NULL),
(355, 20, 'Porsha Upazila', 'পোরশা', NULL, NULL),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি', NULL, NULL),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর', NULL, NULL),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম', NULL, NULL),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া', NULL, NULL),
(360, 21, 'Lalpur Upazila', 'লালপুর', NULL, NULL),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর', NULL, NULL),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম', NULL, NULL),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট', NULL, NULL),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর', NULL, NULL),
(365, 22, 'Nachole Upazila', 'নাচোল', NULL, NULL),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর', NULL, NULL),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ', NULL, NULL),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া', NULL, NULL),
(369, 23, 'Bera Upazila', 'বেড়া', NULL, NULL),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা', NULL, NULL),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর', NULL, NULL),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর', NULL, NULL),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী', NULL, NULL),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর', NULL, NULL),
(375, 23, 'Santhia Upazila', 'সাথিয়া', NULL, NULL),
(376, 23, 'Sujanagar Upazila', 'সুজানগর', NULL, NULL),
(377, 24, 'Bagha', 'বাঘা', NULL, NULL),
(378, 24, 'Bagmara', 'বাগমারা', NULL, NULL),
(379, 24, 'Charghat', 'চারঘাট', NULL, NULL),
(380, 24, 'Durgapur', 'দুর্গাপুর', NULL, NULL),
(381, 24, 'Godagari', 'গোদাগারি', NULL, NULL),
(382, 24, 'Mohanpur', 'মোহনপুর', NULL, NULL),
(383, 24, 'Paba', 'পবা', NULL, NULL),
(384, 24, 'Puthia', 'পুঠিয়া', NULL, NULL),
(385, 24, 'Tanore', 'তানোর', NULL, NULL),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর', NULL, NULL),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি', NULL, NULL),
(388, 25, 'Chauhali Upazila', 'চৌহালি', NULL, NULL),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা', NULL, NULL),
(390, 25, 'Kazipur Upazila', 'কাজীপুর', NULL, NULL),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ', NULL, NULL),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর', NULL, NULL),
(393, 25, 'Tarash Upazila', 'তারাশ', NULL, NULL),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া', NULL, NULL),
(395, 26, 'Birampur Upazila', 'বিরামপুর', NULL, NULL),
(396, 26, 'Birganj', 'বীরগঞ্জ', NULL, NULL),
(397, 26, 'Biral Upazila', 'বিড়াল', NULL, NULL),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ', NULL, NULL),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর', NULL, NULL),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি', NULL, NULL),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট', NULL, NULL),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর', NULL, NULL),
(403, 26, 'Kaharole Upazila', 'কাহারোল', NULL, NULL),
(404, 26, 'Khansama Upazila', 'খানসামা', NULL, NULL),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর', NULL, NULL),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', NULL, NULL),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর', NULL, NULL),
(408, 27, 'Fulchhari', 'ফুলছড়ি', NULL, NULL),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', NULL, NULL),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', NULL, NULL),
(411, 27, 'Palashbari', 'পলাশবাড়ী', NULL, NULL),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', NULL, NULL),
(413, 27, 'Saghata', 'সাঘাটা', NULL, NULL),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', NULL, NULL),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', NULL, NULL),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', NULL, NULL),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', NULL, NULL),
(418, 28, 'Phulbari', 'ফুলবাড়ি', NULL, NULL),
(419, 28, 'Rajarhat', 'রাজারহাট', NULL, NULL),
(420, 28, 'Ulipur', 'উলিপুর', NULL, NULL),
(421, 28, 'Chilmari', 'চিলমারি', NULL, NULL),
(422, 28, 'Rowmari', 'রউমারি', NULL, NULL),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', NULL, NULL),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', NULL, NULL),
(425, 29, 'Aditmari', 'আদিতমারি', NULL, NULL),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', NULL, NULL),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', NULL, NULL),
(428, 29, 'Patgram', 'পাটগ্রাম', NULL, NULL),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', NULL, NULL),
(430, 30, 'Saidpur', 'সৈয়দপুর', NULL, NULL),
(431, 30, 'Jaldhaka', 'জলঢাকা', NULL, NULL),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', NULL, NULL),
(433, 30, 'Domar', 'ডোমার', NULL, NULL),
(434, 30, 'Dimla', 'ডিমলা', NULL, NULL),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', NULL, NULL),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', NULL, NULL),
(437, 31, 'Boda', 'বোদা', NULL, NULL),
(438, 31, 'Atwari', 'আটোয়ারি', NULL, NULL),
(439, 31, 'Tetulia', 'তেতুলিয়া', NULL, NULL),
(440, 32, 'Badarganj', 'বদরগঞ্জ', NULL, NULL),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', NULL, NULL),
(442, 32, 'Gangachara', 'গঙ্গাচরা', NULL, NULL),
(443, 32, 'Kaunia', 'কাউনিয়া', NULL, NULL),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', NULL, NULL),
(445, 32, 'Pirgachha', 'পীরগাছা', NULL, NULL),
(446, 32, 'Pirganj', 'পীরগঞ্জ', NULL, NULL),
(447, 32, 'Taraganj', 'তারাগঞ্জ', NULL, NULL),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর', NULL, NULL),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ', NULL, NULL),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি', NULL, NULL),
(451, 33, 'Haripur Upazila', 'হরিপুর', NULL, NULL),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল', NULL, NULL),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', NULL, NULL),
(454, 51, 'Baniachang', 'বানিয়াচং', NULL, NULL),
(455, 51, 'Bahubal', 'বাহুবল', NULL, NULL),
(456, 51, 'Chunarughat', 'চুনারুঘাট', NULL, NULL),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', NULL, NULL),
(458, 51, 'Lakhai', 'লাক্ষাই', NULL, NULL),
(459, 51, 'Madhabpur', 'মাধবপুর', NULL, NULL),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', NULL, NULL),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ', NULL, NULL),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', NULL, NULL),
(463, 52, 'Barlekha', 'বড়লেখা', NULL, NULL),
(464, 52, 'Juri', 'জুড়ি', NULL, NULL),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', NULL, NULL),
(466, 52, 'Kulaura', 'কুলাউরা', NULL, NULL),
(467, 52, 'Rajnagar', 'রাজনগর', NULL, NULL),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', NULL, NULL),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', NULL, NULL),
(470, 53, 'Chhatak', 'ছাতক', NULL, NULL),
(471, 53, 'Derai', 'দেড়াই', NULL, NULL),
(472, 53, 'Dharampasha', 'ধরমপাশা', NULL, NULL),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', NULL, NULL),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', NULL, NULL),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', NULL, NULL),
(476, 53, 'Sulla', 'সুল্লা', NULL, NULL),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', NULL, NULL),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', NULL, NULL),
(479, 53, 'Tahirpur', 'তাহিরপুর', NULL, NULL),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', NULL, NULL),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', NULL, NULL),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', NULL, NULL),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা', NULL, NULL),
(484, 54, 'Balaganj', 'বালাগঞ্জ', NULL, NULL),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', NULL, NULL),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', NULL, NULL),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', NULL, NULL),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', NULL, NULL),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর', NULL, NULL),
(490, 54, 'Kanaighat', 'কানাইঘাট', NULL, NULL),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', NULL, NULL),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sister_concern_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `sub_role` int(11) NOT NULL DEFAULT '1',
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sister_concern_id`, `role`, `sub_role`, `is_super_admin`, `name`, `email`, `username`, `email_verified_at`, `password`, `plain_password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 'Admin', 'ctashiqkhan@gmail.com', 'admin', NULL, '$2a$12$wuXwdQyG6T51caY4OikI0.3m/op3hgYfVyNDf6CrjF/zGc8LkkjH.', 'admin@34', 1, 'YwxwpcEQVGrtYj3zNXUaa1EcxT4w075tiXsFalUnjjYjjP6WWZMCQe0qJ8Mw', '2023-06-23 23:44:50', '2023-11-04 14:49:51'),
(2, 1, 2, 1, 1, 'ERP Admin', NULL, 'erpadmin', NULL, '$2a$12$7ifsYjCIB6F9N5QvAzgzbehoS5y.A/SQPWgyBcP6227iMPp4ywieW', 'araihazar@345', 1, NULL, '2023-07-12 12:21:55', '2023-12-07 17:26:28'),
(12, 1, 2, 1, 0, 'Accountant', 'accountant@gmail.com', 'accountant', NULL, '$2y$10$Sf38LtAXkxg0QTTiAsJUA.4tLbR1v0MWkmhM7tuozLsBigOMuzGem', 'araihazar4321', 1, NULL, '2023-12-03 20:52:10', '2023-12-03 20:52:10'),
(13, 7, 8, 1, 0, 'Collection', 'collection@gmail.com', 'collector', NULL, '$2y$10$D2WX6Geu6IAFdOVMww2WaOsjgopkUJLW9HRyty/ekak0sW/FK9vfW', 'collector421', 1, NULL, '2023-12-04 17:36:02', '2023-12-04 17:36:02'),
(15, 9, 10, 1, 0, 'Certificate', 'certificate@gmail.com', 'certificate', NULL, '$2y$10$K82ot9udkRWr1cqFAJekH.6DpgSo06KEjMWtTK4aWlozitUnThDkq', 'certificate442', 1, NULL, '2023-12-04 17:45:06', '2023-12-04 17:45:06'),
(16, 10, 11, 1, 0, 'Stock Distribution', 'stock@gmail.com', 'stock', NULL, '$2y$10$K4hJ7x6JwMLm3187KS4Tt.sdPbh6yahyGxIkaVx/Tank7Hozj6mkW', 'stock4429', 1, NULL, '2023-12-04 18:56:18', '2023-12-04 18:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `ward_infos`
--

CREATE TABLE `ward_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ward_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ward_infos`
--

INSERT INTO `ward_infos` (`id`, `ward_no`, `area`, `created_at`, `updated_at`) VALUES
(1, '1', '১.মধ্য লটাখোলা, ২.পশ্চিম লটাখোলা, ৩.পূর্ব লটাখোলা', '2018-02-10 23:28:01', '2018-03-01 22:44:07'),
(2, '2', '', '2018-02-10 23:28:09', '2018-02-24 23:10:39'),
(3, '3', '', '2018-02-20 03:48:01', '2018-02-24 23:11:40'),
(4, '4', '', '2018-02-10 23:28:24', '2018-02-24 23:11:13'),
(5, '5', '', '2018-02-20 03:48:12', '2018-02-24 23:11:47'),
(6, '6', '', '2018-02-20 03:48:21', '2018-02-24 23:11:53'),
(7, '7', '', '2018-02-10 23:28:41', '2018-02-24 23:11:19'),
(8, '8', '', '2018-02-10 23:28:47', '2018-02-24 23:11:25'),
(9, '9', '', '2018-02-10 23:28:53', '2018-02-24 23:11:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_rickshaw_driver_licenses`
--
ALTER TABLE `auto_rickshaw_driver_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_rickshaw_owner_licenses`
--
ALTER TABLE `auto_rickshaw_owner_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_rickshaw_types`
--
ALTER TABLE `auto_rickshaw_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_details_id`);

--
-- Indexes for table `bank_details_up`
--
ALTER TABLE `bank_details_up`
  ADD PRIMARY KEY (`bank_details_id`);

--
-- Indexes for table `bank_opn__blances`
--
ALTER TABLE `bank_opn__blances`
  ADD PRIMARY KEY (`open_bal_id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`spid`);

--
-- Indexes for table `bonus_processes`
--
ALTER TABLE `bonus_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_types`
--
ALTER TABLE `bonus_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boraddos`
--
ALTER TABLE `boraddos`
  ADD PRIMARY KEY (`upangsho_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`bidget_id`);

--
-- Indexes for table `budget_logs`
--
ALTER TABLE `budget_logs`
  ADD PRIMARY KEY (`bdgtlog_id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashbook_banks`
--
ALTER TABLE `cashbook_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `cashbook_bank_details`
--
ALTER TABLE `cashbook_bank_details`
  ADD PRIMARY KEY (`bank_details_id`);

--
-- Indexes for table `cashbook_branches`
--
ALTER TABLE `cashbook_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cashbook_incoexpenses`
--
ALTER TABLE `cashbook_incoexpenses`
  ADD PRIMARY KEY (`incoexpenses_id`);

--
-- Indexes for table `cashbook_khats`
--
ALTER TABLE `cashbook_khats`
  ADD PRIMARY KEY (`khat_id`);

--
-- Indexes for table `cashbook_tax_types`
--
ALTER TABLE `cashbook_tax_types`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `cashbook_tax_type_types`
--
ALTER TABLE `cashbook_tax_type_types`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_certificates`
--
ALTER TABLE `character_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaner_bonus_logs`
--
ALTER TABLE `cleaner_bonus_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaner_salary_logs`
--
ALTER TABLE `cleaner_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_areas`
--
ALTER TABLE `collection_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_closings`
--
ALTER TABLE `collection_closings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_sub_types`
--
ALTER TABLE `collection_sub_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_types`
--
ALTER TABLE `collection_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `cotractoraccounts`
--
ALTER TABLE `cotractoraccounts`
  ADD PRIMARY KEY (`conacc_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_certificates`
--
ALTER TABLE `family_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_certificate_details`
--
ALTER TABLE `family_certificate_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_certificate_englishes`
--
ALTER TABLE `family_certificate_englishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_certificate_english_details`
--
ALTER TABLE `family_certificate_english_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_areas`
--
ALTER TABLE `holding_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_assessments`
--
ALTER TABLE `holding_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_assessment_settings`
--
ALTER TABLE `holding_assessment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_bills`
--
ALTER TABLE `holding_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_categories`
--
ALTER TABLE `holding_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `holding_categories_category_name_unique` (`name`);

--
-- Indexes for table `holding_facilities`
--
ALTER TABLE `holding_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_infos`
--
ALTER TABLE `holding_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_No` (`client_no`);

--
-- Indexes for table `holding_pays`
--
ALTER TABLE `holding_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_tax_payers`
--
ALTER TABLE `holding_tax_payers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_tenant_infos`
--
ALTER TABLE `holding_tenant_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_use_types`
--
ALTER TABLE `holding_use_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoexpenses`
--
ALTER TABLE `incoexpenses`
  ADD PRIMARY KEY (`incoexpenses_id`);

--
-- Indexes for table `income_certificates`
--
ALTER TABLE `income_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khats`
--
ALTER TABLE `khats`
  ADD PRIMARY KEY (`khat_id`);

--
-- Indexes for table `khattypes`
--
ALTER TABLE `khattypes`
  ADD PRIMARY KEY (`khat_id`);

--
-- Indexes for table `landless_certificates`
--
ALTER TABLE `landless_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality_certificates`
--
ALTER TABLE `nationality_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality_certificate_engs`
--
ALTER TABLE `nationality_certificate_engs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oyarish_certificates`
--
ALTER TABLE `oyarish_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oyarish_certificate_families`
--
ALTER TABLE `oyarish_certificate_families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oyarish_certificate_family_details`
--
ALTER TABLE `oyarish_certificate_family_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projectpayments`
--
ALTER TABLE `projectpayments`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `remarriage_certificate_bns`
--
ALTER TABLE `remarriage_certificate_bns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaryproces`
--
ALTER TABLE `salaryproces`
  ADD PRIMARY KEY (`spid`);

--
-- Indexes for table `salary_processes`
--
ALTER TABLE `salary_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_scales`
--
ALTER TABLE `salary_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shakhas`
--
ALTER TABLE `shakhas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_boards`
--
ALTER TABLE `sign_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sister_concerns`
--
ALTER TABLE `sister_concerns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_categories`
--
ALTER TABLE `stock_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_employees`
--
ALTER TABLE `stock_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_product_purchase_orders`
--
ALTER TABLE `stock_product_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_purchase_inventories`
--
ALTER TABLE `stock_purchase_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_purchase_inventory_logs`
--
ALTER TABLE `stock_purchase_inventory_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_purchase_orders`
--
ALTER TABLE `stock_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_purchase_payments`
--
ALTER TABLE `stock_purchase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_suppliers`
--
ALTER TABLE `stock_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_units`
--
ALTER TABLE `stock_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_holding_infos`
--
ALTER TABLE `structure_holding_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `structure_holding_infos_holding_tax_payer_id_foreign` (`holding_tax_payer_id`),
  ADD KEY `structure_holding_infos_holding_info_id_foreign` (`holding_info_id`),
  ADD KEY `structure_holding_infos_structure_type_id_foreign` (`structure_type_id`),
  ADD KEY `structure_holding_infos_use_type_id_foreign` (`use_type_id`);

--
-- Indexes for table `structure_types`
--
ALTER TABLE `structure_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sweeper_bonuses`
--
ALTER TABLE `sweeper_bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sweeper_salaries`
--
ALTER TABLE `sweeper_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_types`
--
ALTER TABLE `tax_types`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `tax_type_types`
--
ALTER TABLE `tax_type_types`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_collects`
--
ALTER TABLE `trade_collects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_collect_and_arrears`
--
ALTER TABLE `trade_collect_and_arrears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_inspactor_reports`
--
ALTER TABLE `trade_inspactor_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_ledgers`
--
ALTER TABLE `trade_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_users`
--
ALTER TABLE `trade_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unmarriage_certificate_bns`
--
ALTER TABLE `unmarriage_certificate_bns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upangshos`
--
ALTER TABLE `upangshos`
  ADD PRIMARY KEY (`upangsho_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ward_infos`
--
ALTER TABLE `ward_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ward_infos_ward_no_unique` (`ward_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_rickshaw_driver_licenses`
--
ALTER TABLE `auto_rickshaw_driver_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_rickshaw_owner_licenses`
--
ALTER TABLE `auto_rickshaw_owner_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_rickshaw_types`
--
ALTER TABLE `auto_rickshaw_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_details_up`
--
ALTER TABLE `bank_details_up`
  MODIFY `bank_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_opn__blances`
--
ALTER TABLE `bank_opn__blances`
  MODIFY `open_bal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `spid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_processes`
--
ALTER TABLE `bonus_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_types`
--
ALTER TABLE `bonus_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boraddos`
--
ALTER TABLE `boraddos`
  MODIFY `upangsho_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `bidget_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `budget_logs`
--
ALTER TABLE `budget_logs`
  MODIFY `bdgtlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_banks`
--
ALTER TABLE `cashbook_banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_bank_details`
--
ALTER TABLE `cashbook_bank_details`
  MODIFY `bank_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_branches`
--
ALTER TABLE `cashbook_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_incoexpenses`
--
ALTER TABLE `cashbook_incoexpenses`
  MODIFY `incoexpenses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_khats`
--
ALTER TABLE `cashbook_khats`
  MODIFY `khat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_tax_types`
--
ALTER TABLE `cashbook_tax_types`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashbook_tax_type_types`
--
ALTER TABLE `cashbook_tax_type_types`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `character_certificates`
--
ALTER TABLE `character_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cleaners`
--
ALTER TABLE `cleaners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cleaner_bonus_logs`
--
ALTER TABLE `cleaner_bonus_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cleaner_salary_logs`
--
ALTER TABLE `cleaner_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_areas`
--
ALTER TABLE `collection_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_closings`
--
ALTER TABLE `collection_closings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_sub_types`
--
ALTER TABLE `collection_sub_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_types`
--
ALTER TABLE `collection_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cotractoraccounts`
--
ALTER TABLE `cotractoraccounts`
  MODIFY `conacc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_certificates`
--
ALTER TABLE `family_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_certificate_details`
--
ALTER TABLE `family_certificate_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_certificate_englishes`
--
ALTER TABLE `family_certificate_englishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_certificate_english_details`
--
ALTER TABLE `family_certificate_english_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_areas`
--
ALTER TABLE `holding_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_assessments`
--
ALTER TABLE `holding_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_assessment_settings`
--
ALTER TABLE `holding_assessment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_bills`
--
ALTER TABLE `holding_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_categories`
--
ALTER TABLE `holding_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_facilities`
--
ALTER TABLE `holding_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_infos`
--
ALTER TABLE `holding_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_pays`
--
ALTER TABLE `holding_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_tax_payers`
--
ALTER TABLE `holding_tax_payers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_tenant_infos`
--
ALTER TABLE `holding_tenant_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holding_use_types`
--
ALTER TABLE `holding_use_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incoexpenses`
--
ALTER TABLE `incoexpenses`
  MODIFY `incoexpenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `income_certificates`
--
ALTER TABLE `income_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khats`
--
ALTER TABLE `khats`
  MODIFY `khat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `khattypes`
--
ALTER TABLE `khattypes`
  MODIFY `khat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landless_certificates`
--
ALTER TABLE `landless_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `nationality_certificates`
--
ALTER TABLE `nationality_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nationality_certificate_engs`
--
ALTER TABLE `nationality_certificate_engs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oyarish_certificates`
--
ALTER TABLE `oyarish_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oyarish_certificate_families`
--
ALTER TABLE `oyarish_certificate_families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oyarish_certificate_family_details`
--
ALTER TABLE `oyarish_certificate_family_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectpayments`
--
ALTER TABLE `projectpayments`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remarriage_certificate_bns`
--
ALTER TABLE `remarriage_certificate_bns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaryproces`
--
ALTER TABLE `salaryproces`
  MODIFY `spid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_processes`
--
ALTER TABLE `salary_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_scales`
--
ALTER TABLE `salary_scales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shakhas`
--
ALTER TABLE `shakhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sign_boards`
--
ALTER TABLE `sign_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sister_concerns`
--
ALTER TABLE `sister_concerns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_categories`
--
ALTER TABLE `stock_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_employees`
--
ALTER TABLE `stock_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_product_purchase_orders`
--
ALTER TABLE `stock_product_purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_purchase_inventories`
--
ALTER TABLE `stock_purchase_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_purchase_inventory_logs`
--
ALTER TABLE `stock_purchase_inventory_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_purchase_orders`
--
ALTER TABLE `stock_purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_purchase_payments`
--
ALTER TABLE `stock_purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_suppliers`
--
ALTER TABLE `stock_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_units`
--
ALTER TABLE `stock_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structure_holding_infos`
--
ALTER TABLE `structure_holding_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structure_types`
--
ALTER TABLE `structure_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sweeper_bonuses`
--
ALTER TABLE `sweeper_bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sweeper_salaries`
--
ALTER TABLE `sweeper_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_types`
--
ALTER TABLE `tax_types`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tax_type_types`
--
ALTER TABLE `tax_type_types`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_collects`
--
ALTER TABLE `trade_collects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_collect_and_arrears`
--
ALTER TABLE `trade_collect_and_arrears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_inspactor_reports`
--
ALTER TABLE `trade_inspactor_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_ledgers`
--
ALTER TABLE `trade_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_users`
--
ALTER TABLE `trade_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unmarriage_certificate_bns`
--
ALTER TABLE `unmarriage_certificate_bns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upangshos`
--
ALTER TABLE `upangshos`
  MODIFY `upangsho_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ward_infos`
--
ALTER TABLE `ward_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
