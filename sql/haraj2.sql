-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 12:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haraj2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_mime_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `designation`, `auth_id`, `profile_pic`, `profile_pic_url`, `pic_mime_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 1, 'profile_11102022_1665485097.jpg', 'http://localhost/haraj_final/profile/profile_11102022_1665485097.jpg', NULL, 1, NULL, '2022-10-11 04:44:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Advertiser table',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Category table',
  `type_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on Types table',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'PK on City table',
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(24,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_informations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details_informations`)),
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == Pending, 1 == Published, 2 == Sold',
  `is_price_negotiable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == No, 1 == Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_expire_date` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `location_embeded_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_type` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT 0,
  `ad_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `advertiser_id`, `category_id`, `type_id`, `city_id`, `sub_category_id`, `title`, `slug`, `price`, `image`, `description`, `condition`, `authenticity`, `brand`, `color`, `edition`, `features`, `details_informations`, `status`, `is_price_negotiable`, `created_at`, `updated_at`, `feature_expire_date`, `view_count`, `location_embeded_map`, `fuel_type`, `is_featured`, `ad_type_id`) VALUES
(1, 1, 1, 0, 1, 5, 'vivo X80 Lite', 'vivo-x80-lite', '300000.00', '2022-09-28-1664347485.png', '<h1 class=\"specs-phone-name-title\" data-spec=\"modelname\" style=\"margin: -2px 0px 0px; padding: 0px 0px 0px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 300; font-stretch: normal; font-size: 28px; line-height: 47px; font-family: Google-Oswald, Arial, sans-serif; vertical-align: baseline; color: rgb(255, 255, 255); float: left; text-shadow: rgba(0, 0, 0, 0.4) 1px 1px 2px;\">vivo X80 Lite</h1><ul class=\"social-share sharrre close\" style=\"margin-right: 1px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; list-style-position: initial; list-style-image: initial; position: relative; float: right; height: 44px; color: rgb(0, 0, 0);\"><li class=\"help help-social\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left; height: 44px;\"></li></ul>', 'like new', 'Refurbished', 'ABC Brand', 'light-blue', '8th', NULL, '{\"Memory\": null, \"Battery\": \"8000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-09-28 00:44:45', '2022-09-28 00:44:45', NULL, 11, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3746527.452679472!2d90.3443647!3d23.506657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664344496081!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(2, 2, 1, 0, 1, 6, 'Samsung A120', 'samsung-a120', '10000.00', '2022-09-28-1664347655.png', '<b>Samsung A120</b><br>', 'new', 'Original', 'ABC Brand', 'red', '8th', NULL, '{\"Memory\": \"12GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"3g\"}', 1, 0, '2022-09-28 00:47:35', '2022-09-28 00:47:35', NULL, 4, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3746527.452679472!2d90.3443647!3d23.506657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664347556295!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(4, 1, 1, 0, 1, 5, 'Test Data', 'test-data', '1000.00', '2022-09-28-1664370581.png', 'Test Data<br>', 'new', 'Refurbished', 'Brand one', 'dark-blue', NULL, NULL, '{\"Memory\": \"8GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-09-28 07:09:41', '2022-09-28 07:09:41', NULL, 1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664370317159!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(5, 1, 1, 0, 1, 5, 'Test Data Two', 'test-data-two', '1000.00', '2022-09-28-1664370581.png', 'Test Data<br>', 'new', 'Refurbished', 'Brand one', 'dark-blue', NULL, NULL, '{\"Memory\": \"8GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-09-28 07:09:41', '2022-09-28 07:09:41', NULL, 22, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664370317159!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(6, 1, 1, 0, 1, 5, 'Test Data Three', 'test-data-three', '1000.00', '2022-09-28-1664370581.png', 'Test Data<br>', 'new', 'Refurbished', 'Brand one', 'dark-blue', NULL, NULL, '{\"Memory\": \"8GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-09-28 07:09:41', '2022-09-28 07:09:41', NULL, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664370317159!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(9, 1, 7, 0, 1, 8, 'AAAAAAaa', 'aaaaaaaa', '900000.00', '2022-09-29-1664451446.png', 'AAAAAAaa<br>', 'used', 'original', 'Brand', 'dark-green', '9th', NULL, '{\"gear\": \"straight\", \"run_km\": \"90000\", \"edition\": \"9th\", \"traction\": \"rear wheel drive\", \"body_type\": \"saloon\", \"engine_cc\": \"9000\", \"year_decade\": null, \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-09-29 05:37:26', '2022-09-29 05:37:26', NULL, 171, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.609605322508!2d90.40309515!3d23.750859549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664531703200!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"petrol\",\"cng\",\"hybrid\",\"electric\",\"octane\"]', NULL, NULL),
(10, 1, 7, 0, 1, 8, 'aslfsdl', 'aslfsdl', '98988.00', '2022-09-29-1664464549.png', 'asldfhsdlkfh', 'used', 'refubrished', 'sdfsd', 'dark-green', 'asdfd', NULL, '{\"gear\": \"straight\", \"run_km\": \"90\", \"edition\": \"asdfd\", \"traction\": \"rear wheel drive\", \"body_type\": \"saloon\", \"engine_cc\": \"900\", \"year_decade\": \"2003-2013\", \"transmission\": \"manual\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-09-29 09:15:49', '2022-09-29 09:15:49', NULL, 76, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.609605322508!2d90.40309515!3d23.750859549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664531703200!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"cng\",\"hybrid\"]', NULL, NULL),
(11, 1, 7, 0, 1, 9, 'SDFSDF', 'sdfsdf', '90000.00', '2022-09-29-1664470511.png', 'SDFSDF', 'like new', 'original', 'SDFD', 'dark-green', '8TH', NULL, '{\"gear\": \"straight\", \"run_km\": \"9000\", \"edition\": \"8TH\", \"traction\": \"other\", \"body_type\": \"other\", \"engine_cc\": \"129\", \"year_decade\": \"2014-2024\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-09-29 10:55:11', '2022-09-29 10:55:11', NULL, 102, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.609605322508!2d90.40309515!3d23.750859549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664531703200!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"hybrid\",\"electric\"]', NULL, NULL),
(14, 1, 11, 0, 1, NULL, 'General Category Data Update', 'general-category-data-update', '9000.00', '2022-09-30-1664535644.png', 'General Category Data Update<br>', 'used', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-09-30 03:58:21', '2022-09-30 05:00:44', NULL, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.609605322508!2d90.40309515!3d23.750859549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1664531703200!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL),
(15, 1, 1, 0, 1, 6, 'My Mobile', 'my-mobile', '30000.00', '2022-10-11-1665502561.png', 'My Mobile', 'used', 'Refurbished', 'XYZ', 'brown', '7th', NULL, '{\"Memory\": \"120\", \"Battery\": \"128\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 09:36:01', '2022-10-11 09:36:01', NULL, 0, NULL, NULL, NULL, NULL),
(16, 1, 1, 0, 1, 5, 'Celling My Mobile', 'celling-my-mobile', '20000.00', '2022-10-11-1665502971.png', 'Celling My Mobile', 'new', 'Refurbished', 'BrAND', 'brown', 'AAA', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 09:42:51', '2022-10-11 09:42:51', NULL, 0, NULL, NULL, NULL, NULL),
(17, 1, 1, 0, 1, 5, 'Testing Another', 'testing-another', '40000.00', '2022-10-11-1665507707.png', 'Testing Another', 'used', 'Original', 'Brand', 'yellow', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:01:48', '2022-10-11 11:01:48', NULL, 0, NULL, NULL, NULL, NULL),
(18, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508120.png', 'Abar Testing', 'new', 'Original', 'Brand', 'light-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:08:40', '2022-10-11 11:08:40', NULL, 0, NULL, NULL, NULL, NULL),
(19, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508156.png', 'Abar Testing', 'new', 'Original', 'Brand', 'light-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:09:16', '2022-10-11 11:09:16', NULL, 0, NULL, NULL, NULL, NULL),
(20, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665508223.png', 'Abar Testing', 'new', 'Original', 'Brand', 'light-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:10:23', '2022-10-11 11:10:23', NULL, 0, NULL, NULL, NULL, NULL),
(21, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665509641.png', 'Abar Testing', 'new', 'Original', 'Brand', 'light-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:34:01', '2022-10-11 11:34:01', NULL, 1, NULL, NULL, NULL, NULL),
(22, 1, 1, 0, 1, 5, 'Abar Testing', 'abar-testing', '90000.00', '2022-10-11-1665510634.png', 'Abar Testing', 'new', 'Original', 'Brand', 'light-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 11:50:34', '2022-10-11 11:50:34', NULL, 0, NULL, NULL, NULL, NULL),
(23, 1, 1, 0, 1, 5, 'SELECTED CATEGORY', 'selected-category', '90000.00', '2022-10-11-1665511893.png', 'SELECTED CATEGORY', 'like new', 'Original', 'Brand', 'brown', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 12:11:33', '2022-10-11 12:11:33', NULL, 0, NULL, NULL, NULL, NULL),
(24, 1, 1, 0, 1, 5, 'SELECTED CATEGORY', 'selected-category', '90000.00', '2022-10-11-1665511920.png', 'SELECTED CATEGORY', 'like new', 'Original', 'Brand', 'brown', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 12:12:00', '2022-10-11 12:12:00', NULL, 0, NULL, NULL, NULL, NULL),
(25, 1, 1, 0, 1, 5, 'YOU CAN UPLOAD UP TO 10 PHOTOS', 'you-can-upload-up-to-10-photos', '90000.00', '2022-10-11-1665512203.png', 'YOU CAN UPLOAD UP TO 10 PHOTOS', 'used', 'Original', 'ABC Brand', NULL, '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"3G\"}', 1, 0, '2022-10-11 12:16:43', '2022-10-11 12:16:43', NULL, 0, NULL, NULL, NULL, NULL),
(26, 1, 1, 0, 1, 5, 'Testing', 'testing', '90000.00', '2022-10-12-1665573535.png', 'Testing', 'like new', 'Original', 'Brand', 'light-blue', 'Edition', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 05:18:55', '2022-10-12 05:18:55', NULL, 0, NULL, NULL, NULL, NULL),
(27, 1, 1, 0, 1, 5, 'Testing Done', 'testing-done', '90000.00', '2022-10-12-1665588480.png', 'Testing Done', 'new', 'Original', 'Brand', 'dark-blue', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 09:28:00', '2022-10-12 09:28:00', NULL, 0, NULL, NULL, NULL, NULL),
(28, 1, 1, 0, 1, 6, 'Testing Payment Data', 'testing-payment-data', '90000.00', '2022-10-12-1665594711.png', 'Testing Payment Data', 'used', 'Original', 'Brand', 'dark-green', '8th', NULL, '{\"Memory\": \"128 GB\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-10-12 11:11:51', '2022-10-12 11:11:51', NULL, 2, NULL, NULL, NULL, NULL),
(29, 1, 11, 0, 1, NULL, 'Again testing Data', 'again-testing-data', '90000.00', '2022-10-12-1665594980.png', 'Again testing Data', 'used', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-12 11:16:20', '2022-10-12 11:16:20', NULL, 20, NULL, NULL, 0, NULL),
(30, 1, 11, 0, 1, NULL, 'Again Testing', 'again-testing', '90000.00', '2022-10-12-1665595306.png', 'Again Testing', 'like new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-12 11:21:46', '2022-10-13 11:21:46', NULL, 0, NULL, NULL, 0, NULL),
(31, 1, 1, 0, 1, 5, 'Again testing', 'again-testing', '90000.00', '2022-10-12-1665595398.png', 'Again testing', 'new', 'Original', 'Brand', 'brown', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-12 11:23:18', '2022-10-12 11:23:18', NULL, 0, NULL, NULL, 0, NULL),
(32, 1, 1, 0, 1, 6, 'Samsung Phone', 'samsung-phone', '90000.00', '2022-10-12-1665595710.png', 'Samsung Phone', 'new', 'Original', 'Brand', 'burgundy', '9th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4g\"}', 1, 0, '2022-10-12 11:28:30', '2022-10-12 11:28:30', NULL, 19, NULL, NULL, 0, NULL),
(33, 1, 1, 0, 1, 6, 'Samsung Phone', 'samsung-phone', '90000.00', '2022-10-12-1665595867.png', 'Samsung Phone', 'new', 'Refurbished', 'Brand', 'yellow', '9th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"$G\"}', 1, 0, '2022-10-12 11:31:07', '2022-10-12 11:31:44', NULL, 3, NULL, NULL, 1, 1),
(34, 1, 1, 0, 1, 6, 'Samsung', 'samsung', '90000.00', '2022-10-13-1665646139.png', 'Samsung', 'new', NULL, 'Brand', 'light-green', '8th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-11 06:00:00', '2022-10-13 01:29:49', '2022-10-19 18:00:00', 11, NULL, NULL, 1, 3),
(35, 1, 1, 0, 1, 6, 'Testing data', 'testing-data', '90000.00', '2022-10-15-1665836235.png', 'Testing data', 'used', 'Original', 'XYZ', 'dark-blue', '9th', NULL, '{\"Memory\": \"128\", \"Battery\": \"9000\", \"Display\": \"Amuled\", \"NETWORK\": \"4G\"}', 1, 0, '2022-10-15 06:17:16', '2022-10-15 06:17:16', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665836173000!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(36, 1, 11, 0, 1, NULL, 'Others Category', 'others-category', '90000.00', '2022-10-16-1665901286.png', 'Others Category', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:21:26', '2022-10-16 00:21:26', NULL, 0, NULL, NULL, 0, NULL),
(37, 1, 7, 0, 1, 8, 'Car one', 'car-one', '90000.00', '2022-10-16-1665901427.png', 'Car one', 'used', 'original', 'adsd', 'dark-blue', NULL, NULL, '{\"gear\": \"straight\", \"run_km\": \"100000\", \"edition\": null, \"traction\": \"rear wheel drive\", \"body_type\": \"suv4x4\", \"engine_cc\": \"1000\", \"year_decade\": \"1981-1991\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:23:47', '2022-10-16 00:23:47', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"hybrid\",\"electric\"]', 0, NULL),
(38, 1, 11, 0, 1, NULL, 'Electronics', 'electronics', '90000.00', '2022-10-16-1665901769.png', 'Electronics', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:29:29', '2022-10-16 00:29:29', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(39, 1, 7, 0, 1, 8, 'sdfsdf', 'sdfsdf', '90000.00', '2022-10-16-1665902491.png', 'sdfsdf', 'used', NULL, '8jj', 'dark-blue', NULL, NULL, '{\"gear\": \"automatic\", \"run_km\": \"9000\", \"edition\": null, \"traction\": \"rear wheel drive\", \"body_type\": \"coupe/Sports\", \"engine_cc\": \"1000\", \"year_decade\": \"1992-2002\", \"transmission\": \"automatic\", \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:41:31', '2022-10-16 00:41:31', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"octane\",\"other\"]', 0, NULL),
(40, 1, 7, 0, 1, 10, 'আস্ফসদফসদ', 'asfsdfsd', '90000.00', '2022-10-16-1665902669.png', 'সদফসদফ', 'used', 'original', 'Brand', 'red', '8th', NULL, '{\"gear\": null, \"run_km\": \"7000\", \"edition\": \"8th\", \"traction\": \"rear wheel drive\", \"body_type\": \"coupe/Sports\", \"engine_cc\": \"1900\", \"year_decade\": \"1992-2002\", \"transmission\": null, \"year_of_manufacture\": \"2000\"}', 1, 0, '2022-10-16 00:44:29', '2022-10-16 00:44:29', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '[\"diesel\",\"electric\",\"octane\"]', 0, NULL),
(41, 1, 11, 0, 1, NULL, 'AAaaaaaa1s', 'aaaaaaaa1s', '9000.00', '2022-10-16-1665902765.png', 'adddd', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:46:05', '2022-10-16 00:46:05', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(42, 1, 11, 0, 1, NULL, 'AAAAAAaaaA', 'aaaaaaaaaa', '90000.00', '2022-10-16-1665902926.png', 'AAAAAAaaaA', 'used', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:48:46', '2022-10-16 00:48:46', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(43, 1, 11, 0, 1, NULL, 'General Products', 'general-products', '90000.00', '2022-10-16-1665903124.png', 'General Products', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:52:04', '2022-10-16 00:52:04', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(44, 1, 11, 0, 1, NULL, 'Other ad', 'other-ad', '90000.00', '2022-10-16-1665903215.png', 'Other ad', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:53:35', '2022-10-16 00:53:35', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(45, 1, 11, 0, 1, NULL, 'POST AN AD', 'post-an-ad', '90000.00', '2022-10-16-1665903413.png', 'POST AN AD', 'new', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 00:56:53', '2022-10-16 00:56:53', NULL, 0, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL),
(46, 1, 2, 0, 1, 12, 'sdjfhklsd', 'sdjfhklsd', '90000.00', '2022-10-16-1665911008.png', 'sldjfhlsdfh', 'used', 'Original', 'asdfsd', 'dark-green', NULL, NULL, NULL, 1, 0, '2022-10-10 18:00:00', '2022-10-16 03:15:41', '2022-10-19 18:00:00', 4, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1),
(47, 1, 2, 0, 1, 12, 'Walton Freezer', 'walton-freezer', '90000.00', '2022-10-16-1665912299.png', 'Walton Freezer', 'like new', 'Original', 'Walton', 'brown', NULL, NULL, '{\"model\": \"AZ200\"}', 1, 0, '2022-10-10 18:00:00', '2022-10-16 03:25:57', '2022-10-19 18:00:00', 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665901351099!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1),
(48, 1, 2, 0, 1, 12, 'Refrigerator', 'refrigerator', '90000.00', '2022-10-16-1665920198.png', 'Refrigerator', 'new', 'Original', 'Brand', 'brown', NULL, NULL, '{\"model\": \"SC8\"}', 1, 0, '2022-10-16 05:36:38', '2022-10-16 05:36:38', NULL, 8, NULL, NULL, 0, NULL),
(49, 1, 16, 0, 1, 17, 'Eye Frame', 'eye-frame', '900.00', '2022-10-16-1665932590.png', 'Eye Frame', 'used', NULL, 'Brand', NULL, NULL, NULL, NULL, 1, 0, '2022-10-16 09:03:10', '2022-10-16 09:03:10', NULL, 6, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14607.604248453179!2d90.38425380000001!3d23.750907299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665932116374!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `registration_code` int(11) NOT NULL,
  `about` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == Not varified, 1 == Verified',
  `show_mobile_no` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 == No, 1 == Yes',
  `last_seen` datetime DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_status` tinyint(4) NOT NULL DEFAULT 0,
  `chat_delete_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `first_name`, `last_name`, `mobile_no`, `designation`, `email`, `username`, `password`, `facebook_id`, `city_id`, `registration_code`, `about`, `status`, `show_mobile_no`, `last_seen`, `deleted_at`, `created_at`, `updated_at`, `google_id`, `remember_token`, `image`, `chat_status`, `chat_delete_by`) VALUES
(1, 'Muhammad', 'Hannan', '01717121213', NULL, 'mdhannan.info@gmail.com', 'mdhannan.info@gmail.com', '$2y$10$cdACBs/iFbgmXKli/K5PpusSRxcf8kDZLtIm7tcXGgCtsPsAOJ0MC', NULL, 1, 882630, 'Laravel Developer', 1, 1, '2022-10-21 10:07:47', NULL, '2022-10-08 04:11:33', '2022-10-21 04:07:47', NULL, NULL, '2022-10-11-1665501623.png', 1, NULL),
(2, 'Tanvir', 'Ahmed', '01718191912', NULL, 'ahannan.info@gmail.com', 'ahannan.info@gmail.com', '$2y$10$5fNLwnSc8ELo2nXrL.agAuVNw3ft.fcslvuoQ3/JNZzR4gda2HRqe', NULL, 1, 519853, NULL, 1, 1, '2022-10-21 10:07:50', NULL, '2022-10-08 04:14:14', '2022-10-21 04:07:50', NULL, NULL, '2022-10-11-1665479537.png', 1, NULL),
(3, 'Rafia Afsana', 'Rinky', '01771890738', NULL, 'rinky@gmail.com', 'rinky@gmail.com\r\n', '$2y$10$5fNLwnSc8ELo2nXrL.agAuVNw3ft.fcslvuoQ3/JNZzR4gda2HRqe', NULL, 1, 519890, 'No seller', 1, 1, '2022-10-21 06:20:31', NULL, '2022-10-08 04:14:14', '2022-10-21 00:20:31', NULL, NULL, '2022-10-11-1665479537.png', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_complains`
--

CREATE TABLE `ad_complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `complain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_complains`
--

INSERT INTO `ad_complains` (`id`, `advertisement_id`, `complain`, `complain_details`, `created_at`, `updated_at`) VALUES
(1, 4, 'shouldn\'t be on your site', 'Test', '2022-10-01 03:53:14', '2022-10-01 03:53:14'),
(2, 4, 'illegal product', NULL, '2022-10-01 03:56:13', '2022-10-01 03:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL COMMENT 'PK on advertisements table',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `advertisement_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, '166434748519056.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(2, 1, '166434748573074.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(3, 1, '166434748584686.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(4, 1, '166434748592329.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(5, 1, '166434748561270.jpg', '2022-09-28 00:44:45', '2022-09-28 00:44:45'),
(6, 2, '166434765510827.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(7, 2, '166434765537729.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(8, 2, '166434765592782.jpg', '2022-09-28 00:47:35', '2022-09-28 00:47:35'),
(9, 3, '166435757499611.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(10, 3, '166435757478013.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(11, 3, '166435757432668.jpg', '2022-09-28 03:32:54', '2022-09-28 03:32:54'),
(12, 4, '166437058180825.jpg', '2022-09-28 07:09:41', '2022-09-28 07:09:41'),
(13, 4, '166437058192457.jpg', '2022-09-28 07:09:41', '2022-09-28 07:09:41'),
(14, 7, '166444814264768.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(15, 7, '166444814245398.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(16, 7, '166444814251683.jpg', '2022-09-29 04:42:22', '2022-09-29 04:42:22'),
(17, 8, '166445107537586.jpg', '2022-09-29 05:31:15', '2022-09-29 05:31:15'),
(18, 9, '166445144685479.jpg', '2022-09-29 05:37:26', '2022-09-29 05:37:26'),
(19, 9, '166445144628941.jpg', '2022-09-29 05:37:26', '2022-09-29 05:37:26'),
(20, 10, '166446454971227.jpg', '2022-09-29 09:15:49', '2022-09-29 09:15:49'),
(21, 11, '166447051118422.png', '2022-09-29 10:55:11', '2022-09-29 10:55:11'),
(22, 15, '166550256137456.jpg', '2022-10-11 09:36:01', '2022-10-11 09:36:01'),
(23, 16, '16655029716677.jpg', '2022-10-11 09:42:51', '2022-10-11 09:42:51'),
(24, 17, '166550770811468.jpg', '2022-10-11 11:01:48', '2022-10-11 11:01:48'),
(25, 17, '166550770899811.jpg', '2022-10-11 11:01:48', '2022-10-11 11:01:48'),
(26, 18, '166550812017269.jpg', '2022-10-11 11:08:40', '2022-10-11 11:08:40'),
(27, 19, '166550815675347.jpg', '2022-10-11 11:09:16', '2022-10-11 11:09:16'),
(28, 20, '166550822369677.jpg', '2022-10-11 11:10:23', '2022-10-11 11:10:23'),
(29, 21, '166550964166263.jpg', '2022-10-11 11:34:01', '2022-10-11 11:34:01'),
(30, 22, '166551063420028.jpg', '2022-10-11 11:50:34', '2022-10-11 11:50:34'),
(31, 23, '166551189355081.jpg', '2022-10-11 12:11:33', '2022-10-11 12:11:33'),
(32, 23, '166551189325074.jpg', '2022-10-11 12:11:33', '2022-10-11 12:11:33'),
(33, 24, '166551192027144.jpg', '2022-10-11 12:12:00', '2022-10-11 12:12:00'),
(34, 24, '166551192041469.jpg', '2022-10-11 12:12:00', '2022-10-11 12:12:00'),
(35, 25, '16655122037081.jpg', '2022-10-11 12:16:43', '2022-10-11 12:16:43'),
(36, 26, '166557353520279.jpg', '2022-10-12 05:18:55', '2022-10-12 05:18:55'),
(37, 27, '166558848076711.jpeg', '2022-10-12 09:28:00', '2022-10-12 09:28:00'),
(38, 31, '166559539854816.jpg', '2022-10-12 11:23:18', '2022-10-12 11:23:18'),
(39, 32, '166559571079151.jpg', '2022-10-12 11:28:30', '2022-10-12 11:28:30'),
(40, 33, '166559586711169.jpg', '2022-10-12 11:31:07', '2022-10-12 11:31:07'),
(41, 34, '166564614066891.jpg', '2022-10-13 01:29:00', '2022-10-13 01:29:00'),
(42, 35, '166583623667529.jpg', '2022-10-15 06:17:16', '2022-10-15 06:17:16'),
(43, 37, '166590142788019.jpg', '2022-10-16 00:23:47', '2022-10-16 00:23:47'),
(44, 39, '166590249186042.jpeg', '2022-10-16 00:41:31', '2022-10-16 00:41:31'),
(45, 40, '166590266974211.jpg', '2022-10-16 00:44:29', '2022-10-16 00:44:29'),
(46, 40, '166590266939248.jpg', '2022-10-16 00:44:29', '2022-10-16 00:44:29'),
(47, 46, '166591100813966.jpg', '2022-10-16 03:03:29', '2022-10-16 03:03:29'),
(48, 47, '166591229940782.jpg', '2022-10-16 03:24:59', '2022-10-16 03:24:59'),
(49, 47, '166591229991119.jpg', '2022-10-16 03:24:59', '2022-10-16 03:24:59'),
(50, 48, '166592019894955.jpg', '2022-10-16 05:36:38', '2022-10-16 05:36:38'),
(51, 48, '166592019884855.jpg', '2022-10-16 05:36:38', '2022-10-16 05:36:38'),
(52, 49, '16659325906244.jpg', '2022-10-16 09:03:10', '2022-10-16 09:03:10'),
(53, 49, '166593259093232.jpg', '2022-10-16 09:03:10', '2022-10-16 09:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE `ad_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` double(24,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`, `start_date`, `end_date`, `price`) VALUES
(1, 'Featured ad for 3 days', 'featured-ad-for-3-days', 1, '2022-10-11 10:25:14', '2022-10-11 10:39:06', '2022-10-11 00:00:00', '2022-10-13 23:59:00', 900.00),
(2, 'Featured ad for 7 days', 'featured-ad-for-7-days', 1, '2022-10-11 10:41:11', '2022-10-11 10:41:11', '2022-10-12 00:00:00', '2022-10-17 23:59:00', 1000.00),
(3, 'Featured ad for 14 days', 'featured-ad-for-14-days', 1, '2022-10-11 10:43:27', '2022-10-11 10:43:27', '2022-10-11 12:00:00', '2022-10-26 11:00:00', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1 = Admin',
  `gender` tinyint(4) NOT NULL DEFAULT 1,
  `dob` date DEFAULT NULL,
  `about` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` bigint(20) DEFAULT NULL,
  `google_id` bigint(20) DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code_expire` datetime DEFAULT NULL,
  `is_first_login` tinyint(4) NOT NULL DEFAULT 1,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Admin',
  `can_login` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Can login, 0 = Can not login',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_user` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 == Admin, 0 == User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile_no`, `password`, `model_id`, `gender`, `dob`, `about`, `facebook_id`, `google_id`, `activation_code`, `salt`, `activation_code_expire`, `is_first_login`, `user_type`, `can_login`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `image`, `is_user`) VALUES
(1, 'Muhammad', 'Hannan', 'admin@admin.com', 'admin@admin.com', '01744894492', '$2y$10$yRiqZPnaJo0dEZwapoCbnupdqOX.1fpE12AkgbswRl919vEE3Jrnq', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, NULL, '2022-10-01 11:26:18', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_roles`
--

CREATE TABLE `auth_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_roles`
--

INSERT INTO `auth_roles` (`id`, `auth_id`, `role_id`, `user_group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-09-27 23:39:54', '2022-10-01 11:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#a3ce71',
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wheels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Active and 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `slug`, `icon`, `bg_color`, `category_type`, `image`, `wheels`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mobile Phones', 'mobile-phones', '<i class=\"fas fa-mobile-alt\"></i>', '#000000', 'mobiles', '2022-10-01-1664641426.png', NULL, 1, NULL, '2022-10-01 10:23:46'),
(2, 0, 'Electronics', 'electronics', '<i class=\"fas fa-mobile-alt\"></i>', '#000000', 'electronics', NULL, NULL, 1, NULL, '2022-09-27 23:49:03'),
(5, 1, 'Vivo', 'vivo', '<i class=\"fas fa-mobile-alt\"></i>', '#f21c1c', 'mobiles', '2022-10-01-1664641631.png', NULL, 1, '2022-09-27 23:48:31', '2022-10-01 10:27:11'),
(6, 1, 'Samsung', 'samsung', '<i class=\"fas fa-mobile-alt\"></i>', '#2de6b8', 'mobiles', '2022-10-01-1664641609.png', NULL, 1, '2022-09-27 23:50:05', '2022-10-01 10:26:49'),
(7, 0, 'Vehicle', 'vehicle', '<i class=\"fas fa-basketball-ball\"></i>', '#e62d2d', 'vehicles', NULL, NULL, 1, '2022-09-29 00:42:35', '2022-09-29 00:42:35'),
(8, 7, 'Car', 'car', '<i class=\"fas fa-basketball-ball\"></i>', '#fb5656', 'vehicles', '2022-10-01-1664641459.png', '4', 1, '2022-09-29 00:43:26', '2022-10-01 10:24:19'),
(9, 7, 'Motorbikes', 'motorbikes', '<i class=\"fas fa-basketball-ball\"></i>', '#f83535', 'vehicles', '2022-10-01-1664641658.png', '2', 1, '2022-09-29 05:18:41', '2022-10-01 10:27:38'),
(10, 7, 'Three Wheeler', 'three-wheeler', '<i class=\"fas fa-basketball-ball\"></i>', '#f25a5a', 'vehicles', '2022-10-16-1665903675.png', '3', 1, '2022-09-29 05:22:35', '2022-10-16 01:01:15'),
(11, 0, 'Others', 'others', '<i class=\"fas fa-basketball-ball\"></i>', '#f53d3d', 'general', NULL, NULL, 1, '2022-09-29 10:58:27', '2022-09-29 11:06:00'),
(12, 2, 'Refrigerator', 'refrigerator', '<i class=\"fas fa-basketball-ball\"></i>', '#0c7318', 'electronics', '2022-10-16-1665909024.png', NULL, 1, '2022-10-16 02:30:24', '2022-10-16 02:30:24'),
(14, 0, 'Furniture', 'furniture', '<i class=\"fas fa-basketball-ball\"></i>', '#000000', 'home_and_garden', '2022-10-16-1665913469.png', NULL, 1, '2022-10-16 03:44:29', '2022-10-16 03:44:29'),
(15, 14, 'Home and Living', 'home-and-living', '<i class=\"fas fa-basketball-ball\"></i>', '#e74040', 'home_and_garden', '2022-10-16-1665913502.png', NULL, 1, '2022-10-16 03:45:02', '2022-10-16 03:45:02'),
(16, 0, 'Fashion and Beauty', 'fashion-and-beauty', '<i class=\"fas fa-basketball-ball\"></i>', '#dd2c2c', 'fashion_beauty', '2022-10-16-1665919993.png', NULL, 1, '2022-10-16 05:33:13', '2022-10-16 05:33:13'),
(17, 16, 'Traditional Wear', 'traditional-wear', '<i class=\"fas fa-basketball-ball\"></i>', '#000000', 'fashion_beauty', '2022-10-16-1665920132.png', NULL, 1, '2022-10-16 05:35:32', '2022-10-16 05:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `category_items`
--

CREATE TABLE `category_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 = Turkey for now',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ankara', 'ankara', 1, NULL, NULL),
(2, 1, 'Istanbul', 'istanbul', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Inactive 1 = Active',
  `position` tinyint(4) NOT NULL,
  `vote_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `meta_title`, `meta_tags`, `meta_description`, `description`, `status`, `position`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, 'Legal and privacy information', 'legal-and-privacy-information', 'Legal and privacy information', NULL, 'Legal and privacy information<br>', 'Legal and privacy information<br>', 1, 4, NULL, '2022-10-02 08:13:45', '2022-10-16 12:07:51'),
(2, 'About us', 'about-us', 'about us', NULL, 'about us<br>', '<span style=\"display: inline !important;\">about us</span><br>', 1, 2, NULL, '2022-10-02 08:18:54', '2022-10-02 08:19:49'),
(3, 'Announcements', 'announcements', 'Announcements', NULL, 'Announcements<br>', 'Announcements<br>', 1, 4, NULL, '2022-10-02 08:21:05', '2022-10-02 08:21:05'),
(4, 'Possible problems', 'possible-problems', 'Possible problems', NULL, 'Possible problems<br>', 'Possible problems<br>', 1, 4, NULL, '2022-10-02 08:23:35', '2022-10-02 08:23:35'),
(5, 'Help', 'help', 'Help', NULL, '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></div>', '<span style=\"display: inline !important;\">Help Text</span><br><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\">Help Text</span><br></span></span></span></div><div><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><span style=\"display: inline !important;\"><br></span></span></span></span></div>', 1, 4, NULL, '2022-10-16 09:21:44', '2022-10-16 09:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_type` tinyint(4) NOT NULL COMMENT '1 => fiat, 2 => crypto',
  `rate` decimal(28,8) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => active, 0 => inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'PK users table',
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `advertiser_id`, `user_type`, `mail_sender`, `email_from`, `email_to`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'mdhannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Muhammad<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 636633</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-09-29 00:21:33', '2022-09-29 00:21:33'),
(2, 4, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'ahannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Fatiha<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 377060</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-04 23:19:36', '2022-10-04 23:19:36'),
(3, 1, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'mdhannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Muhammad<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 882630</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-08 04:11:33', '2022-10-08 04:11:33'),
(4, 2, NULL, 'smtp', 'AppDevs Solution noreply@appdevs.net', 'ahannan.info@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello Tanvir<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\"><div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> 519853</b></font></div></td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '2022-10-08 04:14:14', '2022-10-08 04:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2021-01-05 12:49:06'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-06 22:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For joining us. <br></div><div>Please use the below code to verify your email address.<br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 11:04:05', '2022-09-28 23:48:53'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 11:04:05', '2020-03-07 13:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-07 13:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 11:04:05', '2020-03-07 13:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 06:00:00', '2020-05-03 14:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Add money Completed Successfully', '<div>Your payment of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{method_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 06:00:00', '2021-06-30 18:09:23'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Add money Request Submitted Successfully', '<div>Your Add money request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{method_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 06:00:00', '2021-06-30 18:10:02'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 06:00:00', '2020-06-14 06:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 06:00:00', '2020-06-14 06:00:00'),
(217, 'SEND_INVOICE_MAIL', 'Send Invoice to mail', 'Invoice Of your payment', 'You have an invoice to pay. Please follow the URL below to successful payment.<br><b>Invoice URL : <a class=\"btn btn--info\" href=\" {{url}}\">Click</a><br><br></b><div>You can also download the invoice via below URL,</div><div><b>Download : <a href=\"{{download_url}}\" class=\"btn btn--info\">Download</a></b><br></div>', NULL, '{\"url\":\"invoice url\",\"download_url\":\"Download link of invoice\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-20 17:55:52'),
(226, 'REQUEST_MONEY', 'Request Money', 'Request Money', '<div>Money Request <b>{{amount}} {{curr_code}}</b> from <b>{{requestor}}</b>&nbsp; at <b>{{time}}</b>.&nbsp;</div><div><br></div><div><b>Requestor Note</b>: {{note}}<br></div>', 'Money Request {{amount}} {{curr_code}} from {{requestor}}  at {{time}}.', '{\"amount\":\"Receive amount\",\"curr_code\":\"currency code\", \"requestor\":\"user name or mail of requestor\",\"time\":\"Request time and date\",\"note\":\"Note from requestor\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 22:17:24'),
(227, 'ACCEPT_REQUEST_MONEY_REQUESTOR', 'Accept request money mail to requestor', 'Accept Request Money', '<div>Your Money Request <b>{{amount}} {{curr_code}}</b> to<b> {{to_requested}}</b>&nbsp; has been accepted at <b>{{time}}</b>.&nbsp; Charge: <b>{{charge}}</b> <b>{{curr_code}}</b></div><div>Your new balance is : <b>{{balance}}</b> <b>{{curr_code}}</b></div><div>TrxID : <b>{{trx}}</b><br></div>', 'Money Request {{amount}} {{curr_code}} from {{requestor}}  at {{time}}.', '{\"amount\":\"Request amount\",\"curr_code\":\"currency code\", \"to_requested\":\"Requeted to whom\",\"time\":\"Request time and date\",\"balance\":\"New Balance\",\"trx\":\"Transaction id\",\"charge\":\"money request charge\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 23:03:02'),
(228, 'ACCEPT_REQUEST_MONEY', 'Accept request money', 'Accept Request Money', '<div>Your\'ve Accepted Money Request <b>{{amount}} {{curr_code}}</b> from&nbsp;<b> {{requestor}}</b>&nbsp; at <b>{{time}}</b>.&nbsp;</div><div>Your new balance is : <b>{{balance}}</b> <b>{{curr_code}}</b></div><div>TrxID : <b>{{trx}}</b><br></div>', 'Your\'ve Accepted Money Request {{amount}} {{curr_code}} from  {{requestor}}  at {{time}}. \r\nYour new balance is : {{balance}} {{curr_code}}\r\nTrxID : {{trx}}', '{\"amount\":\"Request amount\",\"curr_code\":\"currency code\", \"requestor\":\"Requestor\",\"time\":\"Accept time and date\",\"balance\":\"New Balance\",\"trx\":\"Transaction id\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-29 22:50:39'),
(229, 'GET_INVOICE_PAYMENT', 'Get Invoice Payment', 'Get Invoice Payment', 'Payment <b>{{total_amount}} {{curr_code}}</b>&nbsp; of Invoice <b>#{{invoice_id}} </b>has been received successfully, from <b>{{from_user}}</b> at <b>{{time}}.<br></b><div>You got after charge<b> : {{get_amount}} </b>{{curr_code}} .<br></div><div>Charge : {{charge}} {{curr_code}} .<br>TrxID : {{trx}}.<br><br>Your New Balance is {{post_balance}} {{curr_code}} .<br></div>', 'Payment {{total_amount}} {{curr_code}}  of Invoice #{{invoice_id}} has been received successfully, from {{from_user}} at {{time}}.\r\nYou got after charge : {{get_amount}} {{curr_code}} .\r\nCharge : {{charge}} {{curr_code}} .\r\nTrxID : {{trx}}.\r\n\r\nYour New Balance is {{post_balance}} {{curr_code}} .', '{\"total_amount\":\"invoice total amount\",\"get_amount\":\"get amount after charge\",\"charge\":\"invoice charge\",\"curr_code\":\"currency code\",\"invoice_id\":\"invoice id\",\"time\":\"payment time and date\",\"from_user\":\"from whom get payment\",\"trx\":\"Transaction id\",\"post_balance\":\"post balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 17:52:12'),
(230, 'PAY_INVOICE_PAYMENT', 'Pay Invoice Payment', 'Pay Invoice Payment', 'Payment <b>{{total_amount}} {{curr_code}}</b>&nbsp; of Invoice <b>#{{invoice_id}} </b>has been&nbsp; successful, to<b> {{to_user}}</b> at <b>{{time}}.<br></b><div><br></div><div>TrxID : {{trx}}.</div><br>Your New Balance is {{post_balance}} {{curr_code}} .', '', '{\"total_amount\":\"invoice total amount\",\"curr_code\":\"currency code\",\"invoice_id\":\"invoice id\",\"time\":\"payment time and date\",\"to_user\":\"to whom pay the payment\",\"trx\":\"Transaction id\",\"post_balance\":\"post balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 17:53:35'),
(231, 'MONEY_IN', 'Money In', 'Money In', '<div>Cash In <b>{{amount}} {{curr_code}}</b> from <b>{{agent}}</b> successful. <br></div>Your New Balance <b>{{balance}} {{curr_code}}</b>. <div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', 'Cash In  {{amount}} {{curr_code}} from {{agent}} successful.\r\nYour New Balance {{balance}} {{curr_code}}. TrxID {{trx}} at {{time}}.', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"agent\":\"Agent user name or mail\",\"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"New Balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-09 23:53:02'),
(232, 'MONEY_IN_AGENT', 'Money In  Agent', 'Money In', '<div>Cash In <b>{{amount}} {{curr_code}}</b> to <b>{{user}}</b> successful.&nbsp; Charge {{charge}} {{curr_code}}<br></div><div>Your Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Cash in <b>{{amount}} {{curr_code}}</b> to <b>{{user}}</b> successful. <br></div><div>Your Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"user\":\"User name or email\",\"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"Remaining Balance\",\"charge\":\"cash in charge\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-09 23:53:14'),
(233, 'MONEY_IN_COMMISSION_AGENT', 'Money In Commission of Agent', 'Cash In Commission', '<div>Commission of <b>{{amount}} {{curr_code}}</b> Cash in received successfully. <br></div><div>Total Commission : {{commission}} {{curr_Code}}<br></div><div>Your New Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Commission of <b>{{amount}} {{curr_code}}</b> cash in received successfully. <br></div><div>Your New Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Cash in amount\",\"curr_code\":\"currency code\", \"trx\":\"transaction id\",\"time\":\"cash in time and date\",\"balance\":\"New Balance\",\"commission\":\"Cash in commission to agent\"}', 1, 1, '2019-09-14 07:14:22', '2021-06-30 20:34:27'),
(234, 'PAYMENT_VER_CODE', 'Payment Verification', 'Payment Verification', '<div>Please use below code to verify your payment.<br></div><div><br></div><div>Your payment verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', NULL, '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 11:04:05', '2021-01-03 11:35:10'),
(235, 'MERCHANT_PAYMENT', 'Merchant Payment', 'Payment Successful.', '<div>Payment <b>{{amount}} {{curr_code}}</b> received from&nbsp;<b>{{</b><span style=\"white-space: nowrap;\"><b style=\"\"><font size=\"3\">customer_name</font></b></span><b>}}</b> successful. <br></div><div>Charge <b>{{charge}} {{curr_code}}</b>, Remaining Balance <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '<div>Payment <b>{{amount}} {{curr_code}}</b> from <b>{{customer_name}}</b> successful. <br></div><div>Charge <b>{{charge}} {{curr_code}}</b>, New Balance  is <b>{{balance}} {{curr_code}}</b>. </div><div>TrxID <b>{{trx}}</b> at <b>{{time}}</b>.</div>', '{\"amount\":\"Payment amount\",\"curr_code\":\"currency code\", \"customer_name\":\"Customer name or mail\",\"charge\":\"Payment charge\",\"trx\":\"transaction id\",\"time\":\"payment time and date\",\"balance\":\"Remaining Balance\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-20 17:33:40'),
(236, 'OTP', 'OTP Verification', 'OTP Verification', '', '', '{\"code\":\"Verification Code\"}', 1, 1, '2019-09-14 07:14:22', '2021-08-20 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Help section',
  `status` tinyint(4) DEFAULT NULL COMMENT '1=>enable, 2=>disable	',
  `deleted_at` datetime DEFAULT NULL,
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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `advertiser_id`, `advertisement_id`, `qty`, `created_at`, `updated_at`) VALUES
(10, 3, 1, 1, '2022-09-28 10:05:51', '2022-09-28 10:05:51'),
(11, 3, 2, 1, '2022-09-28 10:05:54', '2022-09-28 10:05:54'),
(13, 3, 3, 1, '2022-09-28 10:17:18', '2022-09-28 10:17:18'),
(14, 3, 5, 1, '2022-09-28 11:11:41', '2022-09-28 11:11:41'),
(15, 3, 6, 1, '2022-09-28 11:14:44', '2022-09-28 11:14:44'),
(16, 1, 32, 1, '2022-10-13 03:56:44', '2022-10-13 03:56:44'),
(17, 1, 28, 1, '2022-10-13 03:57:37', '2022-10-13 03:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `feature_ads`
--

CREATE TABLE `feature_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `ad_type_id` int(10) UNSIGNED NOT NULL COMMENT 'Paid ad types',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data_values`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"image\": null, \"keywords\": [\"admin\", \"blog\"], \"description\": \"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\", \"social_title\": \"WEBSITENAME\", \"social_description\": \"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit\"}', '2022-10-16 09:27:21', '2022-10-16 09:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `gateway_parameters` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `crypto` tinyint(4) DEFAULT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_form` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `code`, `alias`, `image`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', '101', 'Paypal', '5f6f1bd8678601601117144.jpg', 0, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"muhamedhassnmuhamed@gmail.com\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2022-10-12 09:50:47'),
(2, 'Stripe', '103', 'Stripe', '5f6f1d4bc69e71601117515.jpg', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51L0r39F7YjcJbu9H8O5cDv15w2K4krqWZw6ISQ2yBw85VaYrMC45ofJlIs05NY3lTmqQHONqZvebMIwxPSrHOyrN00Mi5bmGOD\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 07:14:22', '2022-10-12 05:42:09'),
(3, 'PayStack', '107', 'Paystack', '5f7096563dfb71601214038.jpg', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"sk_test_8c0f6fa0f6d915ec0cd5e1b190ef3e23d68cf0cc\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_8c0f6fa0f6d915ec0cd5e1b190ef3e23d68cf0cc\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, NULL, '2019-09-14 07:14:22', '2022-10-14 21:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(24,2) DEFAULT NULL,
  `max_amount` decimal(24,2) DEFAULT NULL,
  `percent_charge` decimal(24,2) DEFAULT NULL,
  `fixed_charge` decimal(24,2) DEFAULT NULL,
  `rate` decimal(24,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark` tinyint(4) DEFAULT NULL,
  `cur_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_sym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mail_config`)),
  `sms_config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sms_config`)),
  `ev` tinyint(4) DEFAULT NULL,
  `en` tinyint(4) DEFAULT NULL,
  `sv` tinyint(4) DEFAULT NULL,
  `sn` tinyint(4) DEFAULT NULL,
  `otp_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verification` tinyint(4) DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `force_ssl` tinyint(4) DEFAULT NULL,
  `secure_password` tinyint(4) DEFAULT NULL,
  `agree` tinyint(4) DEFAULT NULL,
  `registration` tinyint(4) DEFAULT NULL,
  `withdraw_status` tinyint(4) DEFAULT NULL,
  `deposit_status` tinyint(4) DEFAULT NULL,
  `kyc_verification` tinyint(4) DEFAULT NULL,
  `devlopment_mode` tinyint(4) DEFAULT NULL,
  `active_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiat_currency_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto_currency_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cron_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apps_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`apps_settings`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `site_sub_title`, `dark`, `cur_text`, `cur_sym`, `email_from`, `sms_api`, `base_color`, `secondary_color`, `component_color`, `mail_config`, `sms_config`, `ev`, `en`, `sv`, `sn`, `otp_expiration`, `otp_verification`, `timezone`, `force_ssl`, `secure_password`, `agree`, `registration`, `withdraw_status`, `deposit_status`, `kyc_verification`, `devlopment_mode`, `active_template`, `email_template`, `fiat_currency_api`, `crypto_currency_api`, `qr_template`, `sys_version`, `cron_run`, `created_at`, `updated_at`, `domain_name`, `apps_settings`) VALUES
(1, 'AppDevs Solution', 'Quality Mind Development', 0, NULL, NULL, 'noreply@appdevs.net', 'hi {{name}}, {{message}}', '#23970c', '#2030ac', '#d41616', '{\"enc\": \"ssl\", \"host\": \"appdevs.net\", \"name\": \"smtp\", \"port\": \"465\", \"password\": \"QP2fsLk?80Ac\", \"username\": \"noreply@appdevs.net\"}', '{\"from\": \"----------------------\", \"name\": \"clickatell\", \"apiv2_key\": \"-------------------------------\", \"auth_token\": \"---------------------------\", \"account_sid\": \"-----------------------\", \"nexmo_api_key\": \"----------------------\", \"infobip_password\": \"----------------------\", \"infobip_username\": \"--------------\", \"nexmo_api_secret\": \"----------------------\", \"clickatell_api_key\": \"----------------------------\", \"text_magic_username\": \"-----------------------\", \"message_bird_api_key\": \"-------------------\", \"sms_broadcast_password\": \"-----------------------------\", \"sms_broadcast_username\": \"----------------------\"}', 1, 1, 1, 1, '60', 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, 'basic', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n  <!--[if !mso]><!-->\r\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n  <!--<![endif]-->\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <title></title>\r\n  <style type=\"text/css\">\r\n.ReadMsgBody { width: 100%; background-color: #ffffff; }\r\n.ExternalClass { width: 100%; background-color: #ffffff; }\r\n.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }\r\nhtml { width: 100%; }\r\nbody { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }\r\ntable { border-spacing: 0; table-layout: fixed; margin: 0 auto;border-collapse: collapse; }\r\ntable table table { table-layout: auto; }\r\n.yshortcuts a { border-bottom: none !important; }\r\nimg:hover { opacity: 0.9 !important; }\r\na { color: #0087ff; text-decoration: none; }\r\n.textbutton a { font-family: \'open sans\', arial, sans-serif !important;}\r\n.btn-link a { color:#FFFFFF !important;}\r\n\r\n@media only screen and (max-width: 480px) {\r\nbody { width: auto !important; }\r\n*[class=\"table-inner\"] { width: 90% !important; text-align: center !important; }\r\n*[class=\"table-full\"] { width: 100% !important; text-align: center !important; }\r\n/* image */\r\nimg[class=\"img1\"] { width: 100% !important; height: auto !important; }\r\n}\r\n</style>\r\n\r\n\r\n\r\n  <p><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#414a51\" align=\"center\">\r\n    <tbody><tr>\r\n      <td height=\"50\"><br></td>\r\n    </tr>\r\n    <tr>\r\n      <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n          <tbody><tr>\r\n            <td width=\"600\" align=\"center\">\r\n              <!--header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                <tbody><tr>\r\n                  <td style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#0087ff\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\" align=\"center\"><div align=\"center\"><a href=\"https://premium.appdevs.net/xpay/admin/dashboard\" class=\"sidebar__main-logo\"><img src=\"https://premium.appdevs.net/xpay/assets/images/logoIcon/light_logo.png\" alt=\"image\"></a><br></div></td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n              <!--end header-->\r\n              <table class=\"table-inner\" width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n                <tbody><tr>\r\n                  <td style=\"text-align:center;vertical-align:top;font-size:0;\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"35\"><br></td>\r\n                      </tr>\r\n                      <!--logo-->\r\n                      <tr>\r\n                        <td style=\"vertical-align:top;font-size:0;\" align=\"center\">\r\n                          \r\n                        <br></td>\r\n                      </tr>\r\n                      <!--end logo-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n                      <!--headline-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\" align=\"center\">Hello {{fullname}}<br></td>\r\n                      </tr>\r\n                      <!--end headline-->\r\n                      <tr>\r\n                        <td style=\"text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n                          <table width=\"40\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                            <tbody><tr>\r\n                              <td style=\" border-bottom:3px solid #0087ff;\" height=\"20\"><br></td>\r\n                            </tr>\r\n                          </tbody></table>\r\n                        </td>\r\n                      </tr>\r\n                      <tr>\r\n                        <td height=\"20\"><br></td>\r\n                      </tr>\r\n                      <!--content-->\r\n                      <tr>\r\n                        <td style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\" align=\"left\">{{message}}</td>\r\n                      </tr>\r\n                      <!--end content-->\r\n                      <tr>\r\n                        <td height=\"40\"><br></td>\r\n                      </tr>\r\n              \r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\" height=\"45\" bgcolor=\"#f4f4f4\" align=\"center\">\r\n                    <table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n                      <tbody><tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                      <!--preference-->\r\n                      <tr>\r\n                        <td class=\"preference-link\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\" align=\"center\">\r\n                          © 2022 AppDevs . All Rights Reserved. \r\n                        </td>\r\n                      </tr>\r\n                      <!--end preference-->\r\n                      <tr>\r\n                        <td height=\"10\"><br></td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"60\"><br></td>\r\n    </tr>\r\n  </tbody></table></p>', '14360e0ed85986d6bf9c3aa1a7fd85080000', 'f45ece6d-9f1a-4ed5-841c-647a603d4c0800000', '617569babbeb21635084730.png', NULL, '{\"fiat_cron\":\"2021-10-24T13:28:21.505940Z\",\"crypto_cron\":\"2021-10-24T13:28:16.481555Z\"}', NULL, '2022-10-03 01:30:17', 'http://localhost/haraj_final', '{\"ios_status\": 1, \"ios_app_link\": \"https://stackoverflow.com/\", \"google_play_status\": 1, \"play_store_app_link\": \"https://mzamin.com/\"}');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `deleted_from` int(12) NOT NULL DEFAULT 0,
  `deleted_to` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `deleted_from`, `deleted_to`, `created_at`, `updated_at`) VALUES
(101, 2, 1, 'hi', 1, 0, 0, '2022-10-21 03:36:57', '2022-10-21 04:07:09'),
(102, 1, 2, 'No problem', 0, 0, 0, '2022-10-21 03:41:06', '2022-10-21 03:41:06'),
(103, 1, 2, 'No problem', 0, 0, 0, '2022-10-21 03:41:11', '2022-10-21 03:41:11'),
(104, 1, 2, 'No problem', 0, 0, 0, '2022-10-21 03:41:16', '2022-10-21 03:41:16'),
(105, 1, 2, 'No problem', 0, 0, 0, '2022-10-21 03:41:26', '2022-10-21 03:41:26'),
(106, 1, 2, 'Ok', 0, 0, 0, '2022-10-21 03:41:34', '2022-10-21 03:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_users`
--

CREATE TABLE `message_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `is_block` int(11) NOT NULL,
  `is_deleted_from` int(2) NOT NULL DEFAULT 0,
  `is_deleted_to` int(2) NOT NULL DEFAULT 0,
  `is_important_from` int(2) NOT NULL DEFAULT 0,
  `is_important_to` int(2) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_users`
--

INSERT INTO `message_users` (`id`, `from`, `to`, `is_block`, `is_deleted_from`, `is_deleted_to`, `is_important_from`, `is_important_to`, `date`, `created_at`, `updated_at`) VALUES
(8, 2, 1, 0, 0, 0, 0, 1, '2022-10-21 09:41:34', '2022-10-21 03:36:57', '2022-10-21 04:05:46');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_09_30_123517_create_permission_groups_table', 1),
(4, '2019_09_30_123523_create_permissions_table', 1),
(5, '2019_09_30_123524_create_roles_table', 1),
(6, '2019_09_30_123525_create_group_role_permission_table', 1),
(7, '2019_09_30_123527_create_auths_table', 1),
(8, '2019_10_01_073858_create_admin_users_table', 1),
(9, '2019_10_02_073857_create_users_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_12_05_145431_create_posts_table', 1),
(12, '2021_12_05_150220_create_categories_table', 1),
(13, '2021_12_05_151849_create_user_groups_table', 1),
(14, '2021_12_11_132449_add_about_to_auths_table', 1),
(15, '2021_12_11_132449_add_slug_to_posts_table', 1),
(16, '2022_08_17_130624_create_email_sms_templates_table', 1),
(17, '2022_08_17_134454_create_support_tickets_table', 1),
(18, '2022_08_20_103433_create_business_settings_table', 1),
(19, '2022_08_21_165813_create_currencies_table', 1),
(20, '2022_08_21_180140_create_gateways_table', 1),
(21, '2022_08_21_184425_create_gateway_currencies_table', 1),
(22, '2022_08_23_143449_create_general_settings_table', 1),
(23, '2022_08_25_164813_create_extensions_table', 1),
(24, '2022_08_26_014151_create_frontends_table', 1),
(25, '2022_08_28_114406_add_user_type_support_tickets_table', 1),
(26, '2022_08_28_154757_create_support_messages_table', 1),
(27, '2022_08_28_181841_create_email_logs_table', 1),
(28, '2022_08_28_182346_create_support_attachments_table', 1),
(29, '2022_08_29_010148_create_languages_table', 1),
(30, '2022_08_30_145520_make_name_code_unique_column_in_languages_table', 1),
(31, '2022_09_04_143436_create_cms_pages_table', 1),
(32, '2022_09_07_001536_create_ad_types_table', 1),
(33, '2022_09_07_131656_create_category_items_table', 1),
(34, '2022_09_08_113339_create_cities_table', 1),
(35, '2022_09_08_171118_add_date_fields_to_ad_types_table', 1),
(36, '2022_09_10_190100_create_advertisements_table', 1),
(37, '2022_09_10_190529_create_ad_images_table', 1),
(39, '2022_09_22_025647_create_favourites_table', 1),
(40, '2022_09_24_101917_add_views_to_advertisements_table', 1),
(41, '2022_12_11_132449_add_image_to_auths_table', 1),
(42, '2022_12_11_132499_add_ad_location_to_advertisements_table', 1),
(44, '2019_09_30_123528_create_auth_roles_table', 2),
(45, '2022_09_15_054850_create_advertisers_table', 3),
(46, '2022_10_01_091051_create_ad_complains_table', 4),
(48, '2022_10_02_075238_create_social_media_table', 5),
(49, '2022_10_03_091243_create_user_queries_table', 6),
(50, '2022_10_04_104049_create_messages_table', 7),
(51, '2022_10_05_171737_create_ratings_table', 8),
(52, '2022_10_06_172604_google_id_to_advertisers_table', 9),
(53, '2022_10_09_094708_create_messaged_ads_table', 10),
(54, '2022_10_11_172048_create_feature_ads_table', 11),
(55, '2022_10_09_094708_create_user_contacts_table', 12),
(56, '2022_10_20_160647_create_message_users_table', 13);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `permission_group_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'view_permission_group', 'View', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, 'add_permission_group', 'Add', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(3, 'edit_permission_group', 'Edit', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(4, 'delete_permission_group', 'Delete', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(5, 'execute_permission_group', 'Execute', 1, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(6, 'view_permission', 'View', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(7, 'add_permission', 'Add', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(8, 'edit_permission', 'Edit', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(9, 'delete_permission', 'Delete', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(10, 'execute_delete_permission', 'Execute', 2, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(11, 'view_role', 'View', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(12, 'add_role', 'Add', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(13, 'edit_role', 'Edit', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(14, 'delete_role', 'Delete', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(15, 'execute_role', 'Execute', 3, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(16, 'view_dashboard', 'View', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(17, '', 'Add', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(18, '', 'Edit', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(19, '', 'Delete', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(20, 'execute_dashboard', 'Execute', 4, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(21, 'view_admin_user', 'View', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(22, 'add_admin_user', 'Add', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(23, 'edit_admin_user', 'Edit', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(24, 'delete_admin_user', 'Delete', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(25, 'execute_admin_user', 'Execute', 5, 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Permission group', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, 'Permission', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(3, 'User role', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(4, 'Dashboard', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(5, 'Admin User', 1, NULL, '2022-09-27 23:39:54', '2022-09-27 23:39:54');

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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertiser_id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `advertiser_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2022-10-05 11:42:30', '2022-10-05 11:42:30'),
(2, 1, 10, '2022-10-05 11:42:30', '2022-10-05 11:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_by`, `edited_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 1, 1, 0, NULL, '2022-09-27 23:38:06', '2022-09-27 23:38:06'),
(3, 'User Role', 1, 1, 0, NULL, '2022-10-01 11:21:12', '2022-10-01 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `permissions`, `role_id`, `created_at`, `updated_at`) VALUES
(1, ',view_dashboard,', 1, '2022-09-27 23:39:54', '2022-09-27 23:39:54'),
(2, ',view_permission_group,view_permission,view_role,view_dashboard,view_admin_user,', 3, '2022-10-01 11:21:12', '2022-10-01 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `title`, `icon`, `social_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '<i class=\"fab fa-facebook\"></i>', 'https://web.facebook.com/profile.php?id=100075711382480', 1, '2022-10-02 12:56:14', '2022-10-02 23:35:53'),
(2, 'Twitter', '<i class=\"fab fa-twitter\"></i>', 'https://web.facebook.com/profile.php?id=100075711382480', 1, '2022-10-02 13:10:54', '2022-10-02 23:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL COMMENT 'PK support_tickets table',
  `admin_id` int(10) UNSIGNED NOT NULL COMMENT 'PK admin_users table',
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'FK users table',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` int(10) UNSIGNED NOT NULL DEFAULT 11 COMMENT 'PK on auths table 11 = Registerd user',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_mobile_no` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_mime_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(10) UNSIGNED NOT NULL,
  `message_sender_id` int(10) UNSIGNED NOT NULL,
  `advertiser_id` int(11) NOT NULL,
  `advertisement_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertisement_price` double(24,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `advertisement_id`, `message_sender_id`, `advertiser_id`, `advertisement_title`, `advertisement_price`, `created_at`, `updated_at`) VALUES
(1, 34, 2, 1, 'Samsung', 90000.00, '2022-10-14 04:33:32', '2022-10-14 04:33:32'),
(2, 1, 2, 1, 'Samsung', 90000.00, '2022-10-14 04:33:32', '2022-10-14 04:33:32'),
(3, 29, 1, 1, 'Again testing Data', 90000.00, '2022-10-15 11:31:27', '2022-10-15 11:31:27'),
(4, 29, 1, 1, 'Again testing Data', 90000.00, '2022-10-15 11:34:17', '2022-10-15 11:34:17'),
(5, 47, 1, 1, 'Walton Freezer', 90000.00, '2022-10-18 10:47:57', '2022-10-18 10:47:57'),
(6, 10, 2, 1, 'aslfsdl', 98988.00, '2022-10-20 11:00:31', '2022-10-20 11:00:31'),
(7, 10, 2, 1, 'aslfsdl', 98988.00, '2022-10-20 11:01:14', '2022-10-20 11:01:14'),
(8, 49, 1, 1, 'Eye Frame', 900.00, '2022-10-20 11:01:49', '2022-10-20 11:01:49'),
(9, 49, 1, 1, 'Eye Frame', 900.00, '2022-10-20 11:02:46', '2022-10-20 11:02:46'),
(10, 10, 2, 1, 'aslfsdl', 98988.00, '2022-10-20 11:22:07', '2022-10-20 11:22:07'),
(11, 10, 2, 1, 'aslfsdl', 98988.00, '2022-10-20 11:23:09', '2022-10-20 11:23:09'),
(12, 46, 3, 1, 'sdjfhklsd', 90000.00, '2022-10-20 11:42:17', '2022-10-20 11:42:17'),
(13, 9, 2, 1, 'AAAAAAaa', 900000.00, '2022-10-21 03:32:52', '2022-10-21 03:32:52'),
(14, 9, 2, 1, 'AAAAAAaa', 900000.00, '2022-10-21 03:36:57', '2022-10-21 03:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'PK of Roles table',
  `auth_roles` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active and 0=Inactive',
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `role_id`, `auth_roles`, `code`, `group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Admin Group', 1, '2022-10-01 23:05:54', '2022-10-01 11:05:54', '2022-10-01 11:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `subject`, `user_message`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Hannan', 'mdhannan.info@gmail.com', 'Subject', 'Message', NULL, '2022-10-03 03:29:23', '2022-10-03 03:29:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_users_auth_id_foreign` (`auth_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisers_email_unique` (`email`),
  ADD UNIQUE KEY `advertisers_username_unique` (`username`),
  ADD UNIQUE KEY `advertisers_registration_code_unique` (`registration_code`);

--
-- Indexes for table `ad_complains`
--
ALTER TABLE `ad_complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_types`
--
ALTER TABLE `ad_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad_types_title_unique` (`title`);

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auths_email_unique` (`email`),
  ADD UNIQUE KEY `auths_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `auths_username_unique` (`username`);

--
-- Indexes for table `auth_roles`
--
ALTER TABLE `auth_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `category_items`
--
ALTER TABLE `category_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_items_title_unique` (`title`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_title_unique` (`title`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_pages_title_unique` (`title`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extensions_name_unique` (`name`),
  ADD UNIQUE KEY `extensions_act_unique` (`act`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_advertisement_id_index` (`advertisement_id`);

--
-- Indexes for table `feature_ads`
--
ALTER TABLE `feature_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_users`
--
ALTER TABLE `message_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_media_title_unique` (`title`),
  ADD UNIQUE KEY `social_media_icon_unique` (`icon`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_complains`
--
ALTER TABLE `ad_complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `ad_types`
--
ALTER TABLE `ad_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_roles`
--
ALTER TABLE `auth_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category_items`
--
ALTER TABLE `category_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feature_ads`
--
ALTER TABLE `feature_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `message_users`
--
ALTER TABLE `message_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `admin_users_auth_id_foreign` FOREIGN KEY (`auth_id`) REFERENCES `auths` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
