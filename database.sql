-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2021 at 12:00 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fjxufomy_nashravacodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Nashrava', 1, 24, 24, '2021-05-26 10:36:04', '2021-05-26 10:36:23'),
(6, 'Shelly\'s Signature', 1, 24, 24, '2021-05-26 10:36:14', '2021-05-26 10:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Suit Set', 'public/upload/category_image\\hmI4xQ7irc2iKaTNo3ge4sBrGWoVQzkExfp0x24Y.jpg', 1, 1, 24, '2021-03-06 00:03:33', '2021-07-06 11:19:52'),
(2, 'Jeans', 'public/upload/category_image\\f6kWSkNHQqAJ7jOOGIKzlQNylXUOrtFWy4KXnTqU.jpg', 1, 1, 1, '2021-03-06 22:47:24', '2021-03-23 10:14:46'),
(3, 'Western Fashion', 'public/upload/category_image\\BIOOLzg4dEby26Oj0qwWpP8cMJeSq1JhXxGQpmV3.jpg', 1, 1, 1, '2021-03-06 22:47:55', '2021-03-23 10:14:11'),
(4, 'Salwar Kameez', 'public/upload/category_image/btiDLgupjxhVzr6wHrJArHk4SdHyUVTb36Aeon3v.jpg', 1, 1, 29, '2021-03-06 22:48:11', '2021-05-26 10:43:54'),
(5, 'Kurti', 'public/upload/category_image/atBDuE1uNt2yMGtFFjYbK4wMIlg5wP69pQYrjGuO.jpg', 1, 1, 24, '2021-03-06 22:48:26', '2021-05-26 10:55:53');

-- --------------------------------------------------------
--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `products`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', '123', '17,18,19,20,21,22,23', 'shaykat12345@gmail.com', 'Single Times', 'Fixed', 200, '2021-07-14', 1, '2021-07-03 19:12:15', '2021-07-03 19:12:15'),
(2, 'Manual', '890', '17,18,19,20,21,22,23,24', 'shaykat12345@gmail.com', 'Multiple Times', 'Fixed', 300, '2021-07-07', 1, '2021-07-05 11:41:47', '2021-07-05 11:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chalan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Pending , 1 = Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `test_price`, `chalan_no`, `date`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '23423', '2021-06-05', 0, 24, NULL, '2021-06-06 00:15:27', '2021-06-06 00:15:27'),
(2, '2', NULL, '1213', '2021-06-05', 1, 24, 24, '2021-06-06 00:16:09', '2021-06-06 00:16:14'),
(3, '3', NULL, 'null', '2021-06-22', 1, 29, 29, '2021-06-22 12:00:04', '2021-06-22 12:01:32'),
(4, '4', NULL, 'null', '2021-07-03', 1, 29, 29, '2021-07-04 01:40:16', '2021-07-04 01:40:19'),
(5, '4', NULL, '123', '2021-07-03', 0, 29, NULL, '2021-07-04 01:40:18', '2021-07-04 01:40:18'),
(6, '4', NULL, 'null', '2021-07-03', 1, 29, 29, '2021-07-04 01:41:20', '2021-07-04 01:41:24'),
(7, '5', NULL, '12', '2021-07-03', 0, 29, NULL, '2021-07-04 01:42:12', '2021-07-04 01:42:12'),
(8, '5', NULL, 'null', '2021-07-03', 1, 29, 29, '2021-07-04 01:43:08', '2021-07-04 01:43:31'),
(9, '6', NULL, '12', '2021-07-03', 0, 29, NULL, '2021-07-04 01:48:11', '2021-07-04 01:48:11'),
(10, '7', NULL, '121', '2021-07-03', 1, 29, 29, '2021-07-04 02:09:43', '2021-07-04 02:09:52'),
(11, '8', NULL, 'null', '2021-07-04', 1, 29, 29, '2021-07-04 13:16:47', '2021-07-04 13:16:56'),
(12, '9', NULL, '12123563', '2021-07-05', 0, 29, NULL, '2021-07-05 19:03:02', '2021-07-05 19:03:02'),
(13, '10', NULL, '12', '2021-07-05', 0, 29, NULL, '2021-07-05 19:20:47', '2021-07-05 19:20:47'),
(14, '11', NULL, '2', '2021-07-05', 0, 29, NULL, '2021-07-05 19:22:43', '2021-07-05 19:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_customers`
--

CREATE TABLE `invoice_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_customers`
--

INSERT INTO `invoice_customers` (`id`, `customer_name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 'Don', '01774361932', NULL, 'London', 1, NULL, NULL, '2021-04-08 00:04:18', '2021-04-08 00:04:18'),
(10, 'Don', '01774361932', NULL, 'London', 1, NULL, NULL, '2021-04-08 00:05:27', '2021-04-08 00:05:27'),
(11, 'Don', '01774361932', NULL, 'London', 1, NULL, NULL, '2021-04-08 00:05:55', '2021-04-08 00:05:55'),
(12, 'Don', '01774361932', NULL, 'London', 1, NULL, NULL, '2021-04-08 00:06:32', '2021-04-08 00:06:32'),
(13, 'sinky', '01976504051', NULL, 'mohammadpur', 1, NULL, NULL, '2021-04-17 00:08:30', '2021-04-17 00:08:30'),
(14, 'Jon', '01786660914', NULL, 'adabar', 1, NULL, NULL, '2021-04-17 00:09:22', '2021-04-17 00:09:22'),
(15, 'Lucy', '01976504051', NULL, 'Dhaka', 1, NULL, NULL, '2021-04-17 00:10:15', '2021-04-17 00:10:15'),
(16, 'Abul Kasem', '01199826044', NULL, 'Dhanmondi', 1, NULL, NULL, '2021-07-04 13:16:47', '2021-07-04 13:16:47'),
(17, 'dip', '01789162422', NULL, 'Plot 03, Road 19,Sector 13', 1, NULL, NULL, '2021-07-05 19:22:43', '2021-07-05 19:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-06-05', 1, 1, 4, 500, 700, 350000, NULL, 0, '2021-06-06 00:15:27', '2021-06-06 00:15:27'),
(2, '2021-06-05', 2, 3, 7, 1, 5000, 5000, NULL, 1, '2021-06-06 00:16:09', '2021-06-06 00:16:14'),
(3, '2021-06-22', 3, 5, 10, 1, 500, 500, NULL, 1, '2021-06-22 12:00:04', '2021-06-22 12:01:32'),
(4, '2021-07-03', 4, 2, 6, 1, 500, 500, NULL, 1, '2021-07-04 01:40:16', '2021-07-04 01:40:19'),
(5, '2021-07-03', 6, 3, 7, 1, 5000, 5000, NULL, 1, '2021-07-04 01:41:20', '2021-07-04 01:41:24'),
(6, '2021-07-03', 8, 3, 7, 1, 5000, 5000, NULL, 1, '2021-07-04 01:43:08', '2021-07-04 01:43:31'),
(7, '2021-07-03', 9, 2, 6, 12, 500, 6000, NULL, 0, '2021-07-04 01:48:11', '2021-07-04 01:48:11'),
(8, '2021-07-03', 10, 2, 6, 10, 500, 5000, NULL, 1, '2021-07-04 02:09:43', '2021-07-04 02:09:52'),
(9, '2021-07-04', 11, 2, 6, 2, 500, 1000, NULL, 1, '2021-07-04 13:16:47', '2021-07-04 13:16:56'),
(11, '2021-07-05', 13, 5, 13, 7, 990, 6930, NULL, 0, '2021-07-05 19:20:47', '2021-07-05 19:20:47'),
(12, '2021-07-05', 13, 5, 10, 1, 500, 500, NULL, 0, '2021-07-05 19:20:47', '2021-07-05 19:20:47'),
(13, '2021-07-05', 14, 5, 10, 2, 500, 1000, NULL, 0, '2021-07-05 19:22:43', '2021-07-05 19:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoice__payments`
--

CREATE TABLE `invoice__payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `vat` int(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice__payments`
--

INSERT INTO `invoice__payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `vat`, `total_amount`, `discount_amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'full_paid', 349990, 0, NULL, 349990, 10, '2021-06-05', '2021-06-06 00:15:27', '2021-06-06 00:15:27'),
(2, 2, 10, 'partial_paid', 10, 4990, NULL, 5000, NULL, '2021-06-05', '2021-06-06 00:16:09', '2021-06-06 00:16:09'),
(3, 3, 13, 'full_due', 0, 500, NULL, 500, 0, '2021-06-22', '2021-06-22 12:00:04', '2021-06-22 12:00:04'),
(4, 4, 9, 'partial_paid', 100, 400, NULL, 500, NULL, '2021-07-03', '2021-07-04 01:40:16', '2021-07-04 01:40:16'),
(5, 6, 9, 'full_paid', 5000, 0, NULL, 5000, NULL, '2021-07-03', '2021-07-04 01:41:20', '2021-07-04 01:41:20'),
(6, 8, 9, 'full_paid', 4220, 0, 20, 4220, 900, '2021-07-03', '2021-07-04 01:43:08', '2021-07-04 01:43:08'),
(7, 9, 9, 'full_paid', 6000, 0, NULL, 6000, NULL, '2021-07-03', '2021-07-04 01:48:11', '2021-07-04 01:48:11'),
(8, 10, 13, 'full_paid', 5000, 0, NULL, 5000, NULL, '2021-07-03', '2021-07-04 02:09:43', '2021-07-04 02:09:43'),
(9, 11, 16, 'full_paid', 1000, 0, NULL, 1000, NULL, '2021-07-04', '2021-07-04 13:16:47', '2021-07-04 13:16:47'),
(10, 13, 9, 'full_due', 0, 7430, NULL, 7430, NULL, '2021-07-05', '2021-07-05 19:20:47', '2021-07-05 19:20:47'),
(11, 14, 17, 'full_due', 0, 1000, NULL, 1000, NULL, '2021-07-05', '2021-07-05 19:22:43', '2021-07-05 19:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoice__payment__details`
--

CREATE TABLE `invoice__payment__details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice__payment__details`
--

INSERT INTO `invoice__payment__details` (`id`, `invoice_id`, `current_paid_amount`, `payment_type`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 349990, 'cash', '2021-06-05', NULL, '2021-06-06 00:15:27', '2021-06-06 00:15:27'),
(2, 2, 10, 'cash', '2021-06-05', NULL, '2021-06-06 00:16:09', '2021-06-06 00:16:09'),
(3, 3, 0, 'cash', '2021-06-22', NULL, '2021-06-22 12:00:04', '2021-06-22 12:00:04'),
(4, 4, 100, 'bkash', '2021-07-03', NULL, '2021-07-04 01:40:16', '2021-07-04 01:40:16'),
(5, 6, 5000, 'bkash', '2021-07-03', NULL, '2021-07-04 01:41:20', '2021-07-04 01:41:20'),
(6, 8, 4220, 'cash', '2021-07-03', NULL, '2021-07-04 01:43:08', '2021-07-04 01:43:08'),
(7, 9, 6000, 'cash', '2021-07-03', NULL, '2021-07-04 01:48:11', '2021-07-04 01:48:11'),
(8, 10, 5000, 'cash', '2021-07-03', NULL, '2021-07-04 02:09:43', '2021-07-04 02:09:43'),
(9, 11, 1000, 'bkash', '2021-07-04', NULL, '2021-07-04 13:16:47', '2021-07-04 13:16:47'),
(10, 13, 0, 'cash', '2021-07-05', NULL, '2021-07-05 19:20:47', '2021-07-05 19:20:47'),
(11, 14, 0, 'cash', '2021-07-05', NULL, '2021-07-05 19:22:43', '2021-07-05 19:22:43');

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
(45, '2021_02_18_064311_create_categories_table', 2),
(46, '2021_02_18_091700_create_brands_table', 2),
(47, '2021_02_18_110835_create_sub_categories_table', 2),
(48, '2021_02_22_064457_create_products_table', 2),
(49, '2021_02_23_054008_create_customers_table', 2),
(50, '2021_02_23_111744_create_orders_table', 2),
(51, '2021_02_24_042417_create_order_details_table', 2),
(52, '2021_02_24_045447_create_shippings_table', 2),
(54, '2021_02_24_050242_create_sizes_table', 2),
(55, '2021_02_24_065707_create_product_sub_images_table', 2),
(57, '2021_02_24_074655_create_product_sizes_table', 2),
(58, '2021_02_26_042853_create_coupons_table', 2),
(59, '2021_03_06_045419_create_payments_table', 2),
(60, '2021_03_10_101224_create_purchases_table', 3),
(61, '2020_11_16_071912_create_suppliers_table', 4),
(62, '2020_11_17_050314_create_units_table', 4),
(63, '2021_03_15_041713_create_sliders_table', 5),
(64, '2021_03_18_042851_create_size_measurements_table', 6),
(66, '2021_03_18_052443_create_product_measurements_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_total_amount` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=pending and 1=approved',
  `selling_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `payment_id`, `order_no`, `order_total_amount`, `status`, `selling_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(48, 31, 45, 49, 1, 10000, 1, '2021-06-22', '2021-05-26 11:47:33', '2021-06-22 09:49:41', NULL),
(49, 32, 46, 50, 2, 4260, 1, '2021-06-22', '2021-05-30 06:35:41', '2021-06-22 12:03:00', NULL),
(50, 30, 48, 51, 3, 2800, 0, NULL, '2021-07-03 19:15:12', '2021-07-03 19:15:12', NULL),
(51, 37, 49, 52, 4, 500, 0, NULL, '2021-07-04 02:35:25', '2021-07-04 02:35:25', NULL),
(52, 30, 50, 53, 5, 2260, 0, NULL, '2021-07-05 11:33:02', '2021-07-05 11:33:02', NULL),
(53, 30, 50, 54, 6, 1520, 0, NULL, '2021-07-05 11:44:05', '2021-07-05 11:44:05', NULL),
(54, 30, 50, 55, 7, 2040, 0, NULL, '2021-07-05 11:46:52', '2021-07-05 11:46:52', NULL),
(55, 38, 51, 56, 8, 3160, 1, '2021-07-05', '2021-07-05 19:13:19', '2021-07-05 19:14:52', NULL),
(56, 40, 52, 57, 9, 790, 1, '2021-07-06', '2021-07-06 18:13:48', '2021-07-06 21:24:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(50) DEFAULT NULL,
  `coupon_id` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `size_id`, `quantity`, `customer_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(51, 48, 19, 6, 11, 2, NULL, NULL, '2021-05-26 11:47:33', '2021-05-26 11:47:33'),
(52, 49, 21, 6, 11, 2, NULL, NULL, '2021-05-30 06:35:41', '2021-05-30 06:35:41'),
(53, 49, 22, 6, 12, 1, NULL, NULL, '2021-05-30 06:35:41', '2021-05-30 06:35:41'),
(54, 50, 22, 0, 0, 1, 30, 1, '2021-07-03 19:15:12', '2021-07-03 19:15:12'),
(55, 51, 20, 0, 0, 1, 37, NULL, '2021-07-04 02:35:25', '2021-07-04 02:35:25'),
(56, 52, 21, 0, 0, 2, 30, NULL, '2021-07-05 11:33:02', '2021-07-05 11:33:02'),
(57, 52, 23, 0, 0, 1, 30, NULL, '2021-07-05 11:33:02', '2021-07-05 11:33:02'),
(58, 53, 24, 0, 0, 1, 30, 2, '2021-07-05 11:44:05', '2021-07-05 11:44:05'),
(59, 53, 23, 0, 0, 1, 30, NULL, '2021-07-05 11:44:06', '2021-07-05 11:44:06'),
(60, 54, 24, 0, 0, 2, 30, 2, '2021-07-05 11:46:52', '2021-07-05 11:46:52'),
(61, 54, 23, 0, 0, 1, 30, NULL, '2021-07-05 11:46:52', '2021-07-05 11:46:52'),
(62, 55, 25, 0, 0, 4, 38, NULL, '2021-07-05 19:13:19', '2021-07-05 19:13:19'),
(63, 56, 25, 0, 0, 1, 40, NULL, '2021-07-06 18:13:48', '2021-07-06 18:13:48');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `transaction_no`, `created_at`, `updated_at`) VALUES
(25, 'Bkash', 'xy3454hf', '2021-03-31 15:12:07', '2021-03-31 15:12:07'),
(26, 'Cash_on_delivery', NULL, '2021-03-31 15:32:20', '2021-03-31 15:32:20'),
(27, 'Cash_on_delivery', NULL, '2021-04-03 12:29:57', '2021-04-03 12:29:57'),
(28, 'Cash_on_delivery', NULL, '2021-04-03 13:57:27', '2021-04-03 13:57:27'),
(29, 'Cash_on_delivery', NULL, '2021-04-03 14:08:48', '2021-04-03 14:08:48'),
(30, 'Cash_on_delivery', NULL, '2021-04-03 14:26:42', '2021-04-03 14:26:42'),
(31, 'Cash_on_delivery', NULL, '2021-04-03 14:27:16', '2021-04-03 14:27:16'),
(32, 'Cash_on_delivery', NULL, '2021-04-03 14:42:03', '2021-04-03 14:42:03'),
(33, 'Cash_on_delivery', NULL, '2021-04-03 14:42:36', '2021-04-03 14:42:36'),
(34, 'Cash_on_delivery', NULL, '2021-04-03 14:43:10', '2021-04-03 14:43:10'),
(35, 'Cash_on_delivery', NULL, '2021-04-03 14:55:34', '2021-04-03 14:55:34'),
(36, 'Cash_on_delivery', NULL, '2021-04-03 14:56:08', '2021-04-03 14:56:08'),
(37, 'Cash_on_delivery', NULL, '2021-04-03 14:56:40', '2021-04-03 14:56:40'),
(38, 'Cash_on_delivery', NULL, '2021-04-03 15:27:40', '2021-04-03 15:27:40'),
(39, 'Cash_on_delivery', NULL, '2021-04-03 15:28:11', '2021-04-03 15:28:11'),
(40, 'Cash_on_delivery', NULL, '2021-04-03 15:28:52', '2021-04-03 15:28:52'),
(41, 'Cash_on_delivery', NULL, '2021-04-03 15:29:59', '2021-04-03 15:29:59'),
(42, 'Cash_on_delivery', NULL, '2021-04-03 15:31:31', '2021-04-03 15:31:31'),
(43, 'Cash_on_delivery', NULL, '2021-04-03 15:32:08', '2021-04-03 15:32:08'),
(44, 'Cash_on_delivery', NULL, '2021-04-03 15:33:32', '2021-04-03 15:33:32'),
(45, 'Cash_on_delivery', NULL, '2021-04-03 15:34:06', '2021-04-03 15:34:06'),
(46, 'Cash_on_delivery', NULL, '2021-04-04 11:22:15', '2021-04-04 11:22:15'),
(47, 'Bkash', 'xy3454hf', '2021-04-05 11:47:33', '2021-04-05 11:47:33'),
(48, 'Cash_on_delivery', NULL, '2021-04-05 11:51:02', '2021-04-05 11:51:02'),
(49, 'Cash_on_delivery', NULL, '2021-05-26 11:47:33', '2021-05-26 11:47:33'),
(50, 'Cash_on_delivery', NULL, '2021-05-30 06:35:41', '2021-05-30 06:35:41'),
(51, 'Cash_on_delivery', NULL, '2021-07-03 19:15:12', '2021-07-03 19:15:12'),
(52, 'Cash_on_delivery', NULL, '2021-07-04 02:35:25', '2021-07-04 02:35:25'),
(53, 'Cash_on_delivery', NULL, '2021-07-05 11:33:02', '2021-07-05 11:33:02'),
(54, 'Cash_on_delivery', NULL, '2021-07-05 11:44:05', '2021-07-05 11:44:05'),
(55, 'Cash_on_delivery', NULL, '2021-07-05 11:46:52', '2021-07-05 11:46:52'),
(56, 'Cash_on_delivery', NULL, '2021-07-05 19:13:19', '2021-07-05 19:13:19'),
(57, 'Cash_on_delivery', NULL, '2021-07-06 18:13:48', '2021-07-06 18:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `best_status` tinyint(4) NOT NULL DEFAULT '0',
  `offers` tinyint(2) NOT NULL DEFAULT '0',
  `new_arrival` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `product_name`, `image`, `title`, `slug`, `price`, `discount`, `qty`, `details`, `status`, `best_status`, `offers`, `new_arrival`, `created_at`, `updated_at`) VALUES
(17, 4, 9, 5, '10', 'public/upload/product_image/kmNlvIbeA6QUymsOu2UNgIFQb5MzmaYi6PH3nxGz.jpg', 'Formal Shirt', 'kurti', 500, NULL, 6, 'good productkllll', 1, 1, 1, 1, '2021-05-26 10:51:32', '2021-07-06 23:21:59'),
(18, 4, 9, 5, '8', 'public/upload/product_image/2ZeMo24dx3Z5hhXfVGLTL17OS6bCg5spAZddQbkO.jpg', 'choclate', 'american-shirt', 600, NULL, 10, 'good product', 1, 1, 1, 1, '2021-05-26 10:58:47', '2021-07-06 23:21:54'),
(19, 4, 9, 6, '7', 'public/upload/product_image/FzwwwkQMogoohguprhptDZKSG7iV019AJoaSvqoI.jpg', 'Web Developer (Laravel)', 'shirtsh', 5000, NULL, 1, 'good product', 1, 1, 1, 1, '2021-05-26 11:00:38', '2021-07-06 23:21:48'),
(20, 5, 7, 5, '6', 'public/upload/product_image/0xsJ3wlzoL8c7nmCwtapimagl9yN5WWMXu1s50U8.jpg', 'Polo Shirts', 'shirtsss', 500, NULL, -15, 'good product', 1, 1, 1, 1, '2021-05-26 11:01:39', '2021-07-06 23:21:44'),
(21, 2, 8, 6, '4', 'public/upload/product_image/Hi0l2tsXdnWpZDmBh9YYbKDh3IZJLoDKSjFlRMm1.jpg', 'T- Shirtss', 'pantss', 700, 70, 98, 'good product', 1, 1, 1, 1, '2021-05-26 11:02:54', '2021-07-06 23:21:40'),
(22, 4, 9, 6, '9', 'public/upload/product_image/jfgmotfHC4XYSVHnBUpqrjWHos02C8olJWqzpFWL.jpg', 'best product in town', 'shirtspant', 3000, NULL, 0, 'good product', 1, 1, 1, 1, '2021-05-26 11:12:04', '2021-07-06 23:21:34'),
(23, 4, 10, 5, '9', 'public/upload/product_image/VXYsqbwOiSFBxh9pRHdjvpY6O9euYGRyubBcTOjv.jpg', 'Test Shirt', 'test-shirt', 1200, 200, 1, 'The is a test.', 1, 0, 0, 1, '2021-06-29 15:30:07', '2021-07-06 23:21:30'),
(24, 5, 11, 5, '12', 'public/upload/product_image/ASqbogvVGwg9jRAlnLjkI6KAxQcSsyZhuWQofr8C.jpg', 'NashraVa Lace Straight Kurti', 'dark-black', 1020, 200, 30, 'A Perfect Summer Wear where Comfort blends with Trend\r\nMaterial: 100% Cotton ( Imported Fabric- Jaipuri Cotton)', 1, 0, 0, 1, '2021-07-04 13:28:48', '2021-07-06 23:21:26'),
(25, 5, 11, 5, '13', 'public/upload/product_image/z56KHraYHslyr5ZVrCova6TdZbIZ7OUNkkLJBFIY.jpg', 'NashraVa Core Straight Kurti', 'crimpson-red', 990, 200, 35, 'Super Comfortable Summer Wear\r\n\r\n100% Cotton\r\nScreen Print\r\nReady to Wear', 1, 1, 1, 1, '2021-07-05 18:47:39', '2021-07-06 23:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_measurements`
--

CREATE TABLE `product_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `x_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x_large` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xx_large` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_measurements`
--

INSERT INTO `product_measurements` (`id`, `product_id`, `size_id`, `x_small`, `small`, `medium`, `large`, `x_large`, `xx_large`, `created_at`, `updated_at`) VALUES
(8, 22, 2, '20', '30', '40', '50', '60', '70', '2021-05-26 12:28:47', '2021-05-26 12:28:47'),
(9, 22, 3, '20', '77', '45', '50', '60', '70', '2021-05-26 12:29:56', '2021-05-26 12:29:56'),
(10, 17, 2, '23', '23', '33', '12', '334', '33', '2021-06-22 12:22:00', '2021-06-22 12:22:00'),
(11, 17, 2, '36', '38', '40', '42', '44', '46', '2021-07-04 12:52:02', '2021-07-04 12:52:02'),
(12, 17, 4, '36', '38', '40', '42', '44', '46', '2021-07-04 12:52:48', '2021-07-04 12:52:48'),
(13, 24, 2, '36', '38', '40', '42', '44', '46', '2021-07-04 13:30:10', '2021-07-04 13:30:10'),
(14, 24, 4, '36', '38', '40', '42', '44', '46', '2021-07-04 13:30:39', '2021-07-04 13:30:39'),
(15, 24, 3, '42', '42', '42', '42', '42', '42', '2021-07-04 13:31:13', '2021-07-04 13:31:13'),
(16, 25, 2, '36', '38', '40', '42', '44', '46', '2021-07-05 18:48:27', '2021-07-05 18:48:27'),
(17, 25, 3, '42', '42', '42', '42', '42', '42', '2021-07-05 18:48:59', '2021-07-05 18:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(48, 18, 11, '2021-05-26 10:58:47', '2021-05-26 10:58:47'),
(55, 23, 11, '2021-06-29 15:31:19', '2021-06-29 15:31:19'),
(56, 23, 12, '2021-06-29 15:31:19', '2021-06-29 15:31:19'),
(59, 24, NULL, '2021-07-04 14:43:07', '2021-07-04 14:43:07'),
(60, 24, 11, '2021-07-04 14:43:07', '2021-07-04 14:43:07'),
(61, 25, 11, '2021-07-05 18:47:39', '2021-07-05 18:47:39'),
(63, 22, 12, '2021-07-06 16:03:13', '2021-07-06 16:03:13'),
(65, 19, 11, '2021-07-06 16:29:01', '2021-07-06 16:29:01'),
(66, 20, 11, '2021-07-06 16:29:34', '2021-07-06 16:29:34'),
(67, 21, 11, '2021-07-06 16:30:23', '2021-07-06 16:30:23'),
(69, 17, 11, '2021-07-06 16:31:26', '2021-07-06 16:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(60, 17, '202105260451product-03.jpg', '2021-05-26 10:51:32', '2021-05-26 10:51:32'),
(61, 17, '202105260451product-10.jpg', '2021-05-26 10:51:32', '2021-05-26 10:51:32'),
(62, 17, '202105260451product-11 - Copy.jpg', '2021-05-26 10:51:32', '2021-05-26 10:51:32'),
(63, 17, '202105260451product-11.jpg', '2021-05-26 10:51:32', '2021-05-26 10:51:32'),
(64, 17, '202105260451product-detail-02.jpg', '2021-05-26 10:51:32', '2021-05-26 10:51:32'),
(65, 18, '202105260458product-02.jpg', '2021-05-26 10:58:47', '2021-05-26 10:58:47'),
(66, 18, '202105260458product-04.jpg', '2021-05-26 10:58:47', '2021-05-26 10:58:47'),
(67, 18, '202105260458product-08.jpg', '2021-05-26 10:58:47', '2021-05-26 10:58:47'),
(68, 18, '202105260458product-10 - Copy (2).jpg', '2021-05-26 10:58:47', '2021-05-26 10:58:47'),
(69, 19, '202105260500product-04.jpg', '2021-05-26 11:00:38', '2021-05-26 11:00:38'),
(70, 19, '202105260500product-07.jpg', '2021-05-26 11:00:38', '2021-05-26 11:00:38'),
(71, 19, '202105260500product-08.jpg', '2021-05-26 11:00:38', '2021-05-26 11:00:38'),
(72, 19, '202105260500product-10 - Copy (2).jpg', '2021-05-26 11:00:38', '2021-05-26 11:00:38'),
(73, 20, '202105260501product-03.jpg', '2021-05-26 11:01:39', '2021-05-26 11:01:39'),
(74, 20, '202105260501product-11 - Copy.jpg', '2021-05-26 11:01:39', '2021-05-26 11:01:39'),
(75, 20, '202105260501product-detail-01.jpg', '2021-05-26 11:01:39', '2021-05-26 11:01:39'),
(76, 20, '202105260501product-min-02.jpg', '2021-05-26 11:01:39', '2021-05-26 11:01:39'),
(77, 21, '202105260502product-07.jpg', '2021-05-26 11:02:54', '2021-05-26 11:02:54'),
(78, 21, '202105260502product-08 - Copy.jpg', '2021-05-26 11:02:54', '2021-05-26 11:02:54'),
(79, 21, '202105260502product-10 - Copy (2).jpg', '2021-05-26 11:02:54', '2021-05-26 11:02:54'),
(80, 21, '202105260502product-10 - Copy (3).jpg', '2021-05-26 11:02:54', '2021-05-26 11:02:54'),
(81, 22, '202105260512product-03.jpg', '2021-05-26 11:12:04', '2021-05-26 11:12:04'),
(82, 22, '202105260512product-11 - Copy.jpg', '2021-05-26 11:12:04', '2021-05-26 11:12:04'),
(83, 22, '202105260512product-detail-02.jpg', '2021-05-26 11:12:04', '2021-05-26 11:12:04'),
(84, 22, '202105260512product-min-02.jpg', '2021-05-26 11:12:04', '2021-05-26 11:12:04'),
(85, 23, '202106290930large_xhdpi_post_image_d0272a20a002f9e281fb1dce7f9f158f.jpg', '2021-06-29 15:30:07', '2021-06-29 15:30:07'),
(86, 24, '202107040728_DSC0061.jpg', '2021-07-04 13:28:48', '2021-07-04 13:28:48'),
(87, 24, '202107040728_DSC0064 - Copy.jpg', '2021-07-04 13:28:48', '2021-07-04 13:28:48'),
(88, 24, '202107040728_DSC0064.jpg', '2021-07-04 13:28:48', '2021-07-04 13:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `category_id`, `supplier_id`, `product_name`, `purchase_no`, `purchase_date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 'Half shirt', '1', '2021-03-10', NULL, 100, 100, 10000, 1, 1, NULL, '2021-03-10 05:50:42', '2021-03-10 05:50:42'),
(5, 1, NULL, 'Half Pant', '1', '2021-03-10', NULL, 100, 100, 10000, 1, 1, NULL, '2021-03-10 05:50:42', '2021-03-10 05:50:42'),
(6, 2, NULL, 'Pineapple T-Shirt', '420', '2021-03-10', NULL, 10, 9000, 90000, 1, 1, NULL, '2021-03-10 05:53:22', '2021-03-10 05:53:22'),
(7, 3, NULL, 'Half shirt', '7', '2021-03-13', NULL, 4, 500, 2500, 1, 1, NULL, '2021-03-12 22:52:44', '2021-06-06 00:16:14'),
(8, 1, 3, 'Copy', '7', '2021-03-16', NULL, 10, 500, 1500, 1, 1, NULL, '2021-03-16 00:19:32', '2021-07-06 11:40:39'),
(9, 1, NULL, 'Shirt', '001', '2021-03-02', NULL, 1, 1000, 1000, 1, 1, NULL, '2021-03-20 17:11:14', '2021-03-20 17:11:14'),
(10, 5, 1, 'Kurti', '99', '2021-03-30', NULL, 10, 1200, 12000, 1, 1, NULL, '2021-03-29 09:45:07', '2021-07-06 11:27:33'),
(11, 1, NULL, 'Test Product', '1', '2021-06-29', NULL, 47, 5000, 235000, 1, 29, NULL, '2021-06-29 15:57:23', '2021-06-29 15:57:23'),
(12, 5, 1, 'NashraVa Lace Straight Kurti Dark Black', '4/7/21', '2021-07-04', NULL, 30, 450, 13500, 1, 29, NULL, '2021-07-04 13:24:49', '2021-07-06 11:32:50'),
(13, 5, NULL, 'Core Straight Kurti', '123456', '2021-07-06', NULL, 50, 500, 25000, 1, 29, NULL, '2021-07-05 18:43:45', '2021-07-05 18:43:45'),
(14, 1, NULL, 'Test Product', '22', '2021-07-02', NULL, 100, 1000, 100000, 1, 29, NULL, '2021-07-05 22:35:19', '2021-07-05 22:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_address` longtext COLLATE utf8mb4_unicode_ci,
  `del_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile_no`, `address`, `country`, `city`, `del_first_name`, `del_last_name`, `del_email`, `del_mobile_no`, `del_address`, `del_city`, `del_country`, `shipping_area`, `created_at`, `updated_at`) VALUES
(1, 10, 'Shaykat', 'Ali', NULL, '01774361932', 'hjjvjv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 01:58:16', '2021-03-06 01:58:16'),
(2, 10, 'Shaykat', 'Ali', NULL, '01774361932', 'hjjvjv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 02:00:06', '2021-03-06 02:00:06'),
(3, 10, 'Shaykat', 'Ali', NULL, '01774361932', 'adbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 02:30:53', '2021-03-06 02:30:53'),
(4, 10, 'Shaykat', 'Ali', NULL, '01774361932', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 02:32:30', '2021-03-06 02:32:30'),
(5, 10, 'Shaykat', 'Ali', NULL, '01786660914', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 02:42:08', '2021-03-06 02:42:08'),
(6, 10, 'Shaykat', 'Ali', NULL, '01786660914', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-06 03:59:51', '2021-03-06 03:59:51'),
(7, 10, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 00:14:07', '2021-03-07 00:14:07'),
(8, 10, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 00:16:41', '2021-03-07 00:16:41'),
(9, 10, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 00:20:04', '2021-03-07 00:20:04'),
(10, 1, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 04:38:00', '2021-03-07 04:38:00'),
(11, 4, 'Shaykat', 'Ali', 'jon@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 04:58:18', '2021-03-07 04:58:18'),
(12, 4, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-07 23:40:52', '2021-03-07 23:40:52'),
(13, 5, 'Shaykat', 'Ali', 'shaykat932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08 00:26:06', '2021-03-08 00:26:06'),
(14, 5, 'Shaykat', 'Ali', 'shaykat932@gmail.com', '01792985242', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08 00:27:54', '2021-03-08 00:27:54'),
(15, 6, 'Aashab', 'Tahmeed', 'aashab@gmail.com', '01774361932', 'Kakrail', 'Bangladesh', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08 00:38:02', '2021-03-08 00:38:02'),
(16, 5, 'Shaykat', 'Tahmeed', 'jon@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-08 02:24:02', '2021-03-08 02:24:02'),
(17, 8, 'Aashab', 'Tahmeed', 'example@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-09 00:46:49', '2021-03-09 00:46:49'),
(18, 1, 'Aashab', 'Tahmeed', 'shaykatali932@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-10 23:15:45', '2021-03-10 23:15:45'),
(19, 9, 'Shaykat', 'Tahmeed', 'example@gmail.com', '01786660914', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-10 23:18:59', '2021-03-10 23:18:59'),
(20, 9, 'Shaykat', 'Tahmeed', 'example@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-10 23:38:08', '2021-03-10 23:38:08'),
(21, 9, 'Shaykat', 'Ali', 'example@gmail.com', '01786660914', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-10 23:53:07', '2021-03-10 23:53:07'),
(22, 10, 'Aashab', 'Tahmeed', 'jon@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-11 00:07:09', '2021-03-11 00:07:09'),
(23, 20, 'Shaykat', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-18 02:27:26', '2021-03-18 02:27:26'),
(24, 20, 'Aashab', 'Tahmeed', 'example@gmail.com', '01792985242', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-18 02:44:10', '2021-03-18 02:44:10'),
(25, 20, 'Aashab', 'Tahmeed', 'admin@example.com', '01792985242', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-18 02:55:01', '2021-03-18 02:55:01'),
(26, 1, 'shihab', 'Zaman', 'shihab_iub@hotmail.com', '01722148628', 'Dhaka', 'Bangladesh', 'Dhanmondi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-20 17:04:24', '2021-03-20 17:04:24'),
(27, 21, 'Intel', 'Chipset', 'goleni8542@naymio.com', '01150060066', '#146 Villa de Carlos, 54 Blue Street, White County, North Bound', 'Indonesia', 'New Orleans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-21 13:17:55', '2021-03-21 13:17:55'),
(28, 20, 'Aashab', 'Tahmeed', 'jon@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-21 14:02:52', '2021-03-21 14:02:52'),
(29, 20, 'Shaykat', 'Tahmeed', 'admin@example.com', '01792985242', 'Rangpur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-21 14:04:12', '2021-03-21 14:04:12'),
(30, 20, 'Aashab', 'Tahmeed', 'jon@gmail.com', '01792985242', 'dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-28 11:31:15', '2021-03-28 11:31:15'),
(31, 20, 'Aashab', 'Tahmeed', 'jon@gmail.com', '01792985242', 'dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-28 11:31:15', '2021-03-28 11:31:15'),
(32, 20, 'Aashab', 'Tahmeed', 'admin@example.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-31 15:11:52', '2021-03-31 15:11:52'),
(33, 25, 'Simon', 'Avishek', 'Avishek@GMAIL.COM', '01976504051', 'Bangla Address', 'Bangladesh', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-31 15:32:02', '2021-03-31 15:32:02'),
(34, 20, 'Aashab', 'Tahmeed', 'jon@gmail.com', '01786660914', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 12:29:48', '2021-04-03 12:29:48'),
(35, 26, 'Tonmoy', 'khan', 'honda.tanmoy@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 13:57:20', '2021-04-03 13:57:20'),
(36, 26, 'Tonmoy', 'Tahmeed', 'jon@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 14:08:41', '2021-04-03 14:08:41'),
(37, 26, 'Tonmoy', 'Tahmeed', 'jon@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 14:26:35', '2021-04-03 14:26:35'),
(38, 26, 'Tonmoy', 'khan', 'honda.tanmoy@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 14:41:56', '2021-04-03 14:41:56'),
(39, 26, 'Tonmoy', 'Tahmeed', 'two@gmail.com', '01774361932', 'dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 14:55:27', '2021-04-03 14:55:27'),
(40, 26, 'Tonmoy', 'Tahmeed', 'shaykatali932@gmail.com', '01774361932', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 15:27:34', '2021-04-03 15:27:34'),
(41, 26, 'huhu', 'uiui', 'tanmoy@iciclecorporation.com', '01776888999', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-03 15:31:22', '2021-04-03 15:31:22'),
(42, 27, 'Aashab', 'Tahmeed', 'beliketahmeed@gmail.com', '01976504051', '84/6 Kakrail, Ramna, Dhaka 1000', 'Bangladesh', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-04 11:22:03', '2021-04-04 11:22:03'),
(43, 28, 'sajid', 'khan', 'sajid123@gmail.com', '01774361932', 'Dhaka', NULL, NULL, 'mamlin', 'jahan', 'mamlin@gmail.com', '01792985242', 'Adabar', NULL, NULL, NULL, '2021-04-05 11:47:20', '2021-04-05 11:47:20'),
(44, 28, 'sajid', 'khan', 'sajid123@gmail.com', '01976504051', 'Adabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-05 11:50:53', '2021-04-05 11:50:53'),
(45, 31, 'Tonmoy', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'London', 'Bangladesh', 'Dhaka', 'Tonmoy', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'London', 'Dhaka', 'Bangladesh', NULL, '2021-05-26 11:47:24', '2021-05-26 11:47:24'),
(46, 32, 'First Name', 'First Name', 'shaykatali932@gmail.com', '01774361932', 'London', 'Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-30 06:31:49', '2021-05-30 06:31:49'),
(47, 32, 'Tonmoy', 'Ali', 'shaykatali932@gmail.com', '01774361932', 'London', 'Bangladesh', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhaka', '2021-05-30 09:11:47', '2021-05-30 09:11:47'),
(48, 30, 'Moumita', 'Aman', NULL, '01722148628', 'dhanmondi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-03 19:14:58', '2021-07-03 19:14:58'),
(49, 37, 'shihab', 'Pervez', 'shihab@iciclecorporation.com', '01985889470', '67/B Dhanmondi', 'Bangladesh', 'dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 02:35:05', '2021-07-04 02:35:05'),
(50, 30, 'Zeenat', 'Zaman', NULL, '01722148628', 'dhanmondi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 11:32:51', '2021-07-05 11:32:51'),
(51, 38, 'Md', 'Ataullah', 'mdataullah702@gmail.com', '01738574949', 'Dbsjsj', 'Bangladesh', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 19:12:57', '2021-07-05 19:12:57'),
(52, 40, 'Dip', 'Bali', 'taifdip2014@gmail.com', '01789162422', '5 Katherine Road\r\nEast Ham', 'United Kingdom', 'London', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-06 18:13:39', '2021-07-06 18:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_costs`
--

CREATE TABLE `shipping_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_costs`
--

INSERT INTO `shipping_costs` (`id`, `shipping_area`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '70', '2021-05-29 19:37:02', '2021-06-29 15:43:24'),
(2, 'Outside Of Dhaka', '100', '2021-05-29 19:39:17', '2021-06-29 15:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 'xml', 24, NULL, '2021-05-26 10:35:45', '2021-05-26 10:35:45'),
(12, 'long', 24, 29, '2021-05-26 10:35:49', '2021-07-04 13:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `size_measurements`
--

CREATE TABLE `size_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_measurements`
--

INSERT INTO `size_measurements` (`id`, `measurement`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Bust', 1, 1, '2021-03-17 23:09:26', '2021-03-29 09:46:52'),
(3, 'Height', 1, 1, '2021-03-17 23:45:14', '2021-03-18 00:48:42'),
(4, 'Waist', 1, NULL, '2021-03-18 00:49:13', '2021-03-18 00:49:13'),
(5, 'Hips', 1, NULL, '2021-03-18 00:49:23', '2021-03-18 00:49:23'),
(6, 'Sleeve Length', 1, NULL, '2021-04-11 12:55:41', '2021-04-11 12:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upper` tinyint(4) NOT NULL DEFAULT '1',
  `middle` tinyint(4) NOT NULL DEFAULT '2',
  `lower` tinyint(4) NOT NULL DEFAULT '3',
  `highlight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopnow_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `image`, `upper`, `middle`, `lower`, `highlight`, `short_text`, `shopnow_url`, `explore_url`, `created_at`, `updated_at`) VALUES
(1, 'Slider 1', '202107020931202106211035BANNER-1.png', 1, 2, 3, 'London Style', 'this is test subtitle', NULL, NULL, '2021-07-02 14:37:36', '2021-07-02 15:31:07'),
(2, 'Slider two', '202107020931202106211035BANNER-2.png', 1, 2, 3, 'London Style2', 'this is test subtitle2', NULL, NULL, '2021-07-02 14:38:25', '2021-07-06 11:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'mobile', '0123456789', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(2, 'email', 'info@nashrava.com', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(3, 'facebook', '#', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(4, 'twitter', '#', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(5, 'linkedin', '#', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(6, 'google', 'www.google.com', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(7, 'rss', '#', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(8, 'banner_image', 'public/upload/banner_image/VFnp5A5cjUrz6akE5yA3CG60uS1ONtqH0s3svsLN.png', '2021-06-30 09:10:24', '2021-07-06 16:46:22'),
(9, 'address', '1234 Lucian street', '2021-07-02 15:39:55', '2021-07-06 16:46:22'),
(10, 'facebook_page_id', NULL, '2021-07-02 15:39:55', '2021-07-06 16:46:22'),
(11, 'facebook_page_access_token', NULL, '2021-07-02 15:39:55', '2021-07-06 16:46:22'),
(12, 'aboutus', '<p>NashraVa as a fashion retailer, inspires authentic self expression through offering brands with variety of product lines. This helps our customers to flaunt their personal style in day to day life.<br />\r\nOur designs are unique and styles are always updating depending on trends and seasons.<br />\r\nProduct lines include wide range of contemporary ready to wear fashion which enables an easy access to global fashion for customers at a great value.<br />\r\nNashraVa aspires to doing more than selling cloths proudly.<br />\r\nWe are passionately committed to deliver our customers fashion, quality and comfort with most convenient shopping experience by consistently developing it everyday.</p>', '2021-07-05 02:31:48', '2021-07-05 03:29:49'),
(13, 'delivery', '<p>Please&nbsp;note&nbsp;that&nbsp;all&nbsp;charges&nbsp;are&nbsp;set&nbsp;by&nbsp;the&nbsp;courier&nbsp;services&nbsp;which&nbsp;may&nbsp;fluctuate&nbsp;unusually.We&nbsp;may&nbsp;update&nbsp;delivery&nbsp;charges&nbsp;if&nbsp;necessary.</p>\r\n\r\n<p><strong>Inside&nbsp;Dhaka:</strong><br />\r\nCash&nbsp;on&nbsp;delivery&nbsp;(Inside&nbsp;Dhaka&nbsp;2-3&nbsp;working&nbsp;days):&nbsp;Tk.&nbsp;80</p>\r\n\r\n<p><strong>Outside&nbsp;Dhaka:</strong><br />\r\nHome&nbsp;Delivery&nbsp;by&nbsp;Pathao&nbsp;(&nbsp;4&nbsp;to&nbsp;5&nbsp;working&nbsp;days&nbsp;):&nbsp;Tk.&nbsp;120.00</p>\r\n\r\n<p>Delivery&nbsp;to&nbsp;Shundarban&nbsp;branch&nbsp;Full&nbsp;Payment&nbsp;Should&nbsp;be&nbsp;made&nbsp;in&nbsp;advance&nbsp;(2-3&nbsp;days):&nbsp;Tk.&nbsp;150</p>\r\n\r\n<p>Delivery&nbsp;to&nbsp;S.A&nbsp;Paribahan&nbsp;branch&nbsp;Full&nbsp;Payment&nbsp;Should&nbsp;be&nbsp;made&nbsp;in&nbsp;advance&nbsp;(2-3&nbsp;days):&nbsp;Tk.&nbsp;150</p>', '2021-07-05 02:31:48', '2021-07-05 03:29:49'),
(14, 'terms', '<p><strong>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY TO MAKE SURE THAT YOU UNDERSTAND THEM BEFORE USING OUR WEBSITE. IF YOU CONTINUE TO USE THE SERVICES OR ORDER PRODUCTS FROM OUR WEBSITE, This will be taken AS YOUR ACCEPTANCE OF THESE TERMS AND CONDITIONS. </strong></p>\r\n\r\n<p><strong>Product information:</strong> All information provided in the description of the products displayed on the website are attempted to be as accurate as possible. There might be slight change for shade differences that occur from screen resolution issues.Although we attempt to display accurately, we cannot guarantee that your computer&rsquo;s display of the images accurately reflects the true of the products. The sizes may vary depending on different designs. Please contact our Customer Care Team if you would like more information about a product.</p>\r\n\r\n<p><strong>Purchase Terms:</strong> The Website allows you to check your order and correct any errors before completing a purchase or transaction. Please take the time to read and check your order at each page of the order process as you are responsible for ensuring that the information is accurate.</p>\r\n\r\n<p><strong>Order Delivery: </strong>Delivery time and charges are determined by courier partner. So delivery charges may change from time to time according to their conditions. Delivery time depends on location, but approximate delivery time will be mentioned to you while you place an order. We have no control on delivery charges and time.</p>\r\n\r\n<p><strong>Guarantee/Warranty:</strong> We can ensure that all our products are thoroughly tested before the launch to ensure longevity and durability of the&nbsp;product. Please note that the durability and longevity of any product depends on the care and usage of the product. We will not be held responsible for any issues occurring due to misuse or improper care of any product.</p>\r\n\r\n<p><strong>Exchange Conditions</strong>: <em>ADDITIONAL DELIVERY CHARGE FOR EXCHANGE .</em>For exchange customer must receive the delivery, make the payment and keep the product unused. Customer Care Team should be informed by calling: <strong><em>01309286974</em></strong> within <strong>3 days</strong> of receiving the delivery.<br />\r\nCustomer has to mention size and of desired product that they want to exchange with. We will send the exchanged product. While receiving the new product customer has to return the previous product to deliverymanplus delivery charge.<br />\r\nIn case of exchanging with a product of higher value, additional amount must be paid during exchange delivery. If customer is from out of Dhaka, unfortunately customer must pay additional delivery charge of Shundarban/ S.A Paribahan to return the product to our office.<br />\r\nNashraVa will bear the cost of resending the exchanged product. The product must be returned to our office first via any courier service. After receiving the product we will send the exchanged product.<br />\r\nCustomer can exchange any ordered product for 1 time only. Returned product must be in unused condition with no marks and all packaging intact, including the shoe box.We will not accept any used /damaged product.</p>\r\n\r\n<p><br />\r\n<strong>Your Account: </strong>If you use this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password.</p>\r\n\r\n<p><br />\r\n<strong>Price: </strong>Price and availability information provided on this website is subject to change without notice. All prices quoted are in Bangladeshi Taka.</p>\r\n\r\n<p><br />\r\n<strong>Availability in Store: </strong>We aren&rsquo;t authorized to provide exact availability. We will not be taking any responsibility if they are sold out by the time you visit. VAT Queries (online shopping): E-commerce purchases are not included under the taxation laws, so we are not taking any VAT for online purchases.</p>\r\n\r\n<p><br />\r\n<strong>Brand Copyrights</strong>: We hold our copyrights &amp; trademarks exclusively for our products on any of the display- website, social media, store.</p>\r\n\r\n<p><br />\r\n<strong>Changes:</strong> We may modify, alter or update the terms and conditions of this website from time to time. We will notify you of any such modifications to this website by posting notice of such changes in Facebook. If you continue using this site after the modifications it will constitute your acceptance of the modified terms and policies.</p>\r\n\r\n<p><br />\r\n<strong>Termination</strong> We reserve the right, at its sole discretion, to terminate your access to all or any part of this site, with or without notice.</p>', '2021-07-05 02:31:48', '2021-07-05 03:29:49'),
(15, 'newarrival_image', 'public/upload/newarrival_image/WEsIJ9OQd81vtpO1aUCDDSxEYHXKlGcGVF0yPh22.jpg', '2021-07-06 10:39:31', '2021-07-06 10:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 5, 'Shirt', 1, 24, NULL, '2021-05-26 10:37:07', '2021-05-26 10:37:07'),
(8, 2, 'Pant', 1, 24, NULL, '2021-05-26 10:37:16', '2021-05-26 10:37:16'),
(9, 4, 'T-Shirt', 1, 24, NULL, '2021-05-26 10:37:26', '2021-05-26 10:37:26'),
(10, 5, 'Test Sub Category Kurti', 1, 29, 29, '2021-06-29 15:13:52', '2021-06-29 15:14:22'),
(11, 5, 'Core Straight Kurti', 1, 29, NULL, '2021-07-04 12:42:55', '2021-07-04 12:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Amazing You Supply', '01774361932', 'example@gmail.com', 'Dhanmondi', 1, 1, 24, '2021-03-10 04:43:33', '2021-05-26 10:38:20'),
(2, 'Shelly\'s Signature Supply', '01774361932', 'shaykatali932@gmail.com', 'london', 1, 1, 24, '2021-03-10 04:44:39', '2021-05-26 10:38:07'),
(3, 'Nashrava Core Supply', '01792985242', 'example@gmail.com', 'Dhanmondi', 1, 1, 24, '2021-03-10 04:47:16', '2021-05-26 10:37:32'),
(4, 'Nashrava Supply', '01774361932', 'example@gmail.com', 'Dhaka', 1, 1, 24, '2021-03-10 04:51:02', '2021-05-26 10:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Piece', 1, 1, 1, '2021-03-10 04:54:18', '2021-03-10 04:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `code`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'customer', 'Sawban Ahmed', 'sawban@example.com', NULL, '$2y$10$1GgazBRBqOUTwws7RWmBGu/w6l8X5CnxLARh4YwSkb3SkJTZNXNlK', '01792985242', '4136', NULL, NULL, 1, NULL, '2021-03-11 01:25:06', '2021-07-06 11:18:08'),
(15, 'customer', 'Sawban', 'example@gmail.com', NULL, '$2y$10$jc6uBVBS6wTtUiZDxHLs.OVw31/OVCRlyC99YDfF6rIqwITczWH8.', '01792985242', '1443', NULL, NULL, 1, NULL, '2021-03-11 01:26:25', '2021-03-11 01:26:25'),
(16, 'customer', 'Rifat', 'rifat@gmail.com', NULL, '$2y$10$XpOiE3HFWBqLZjPxjka8auAnsoTwsf5b7RGjG4np2sOXyEHKY8Qo2', '01792985242', '8244', NULL, NULL, 1, NULL, '2021-03-11 01:33:43', '2021-03-11 01:33:43'),
(17, 'user', 'Two', 'gggg@gmail.com', NULL, '$2y$10$qDcRz72yTajXiBMRkTOwBeEtP3zCklgb3.7Xnq5Yz4CcdBmn.VjE2', NULL, NULL, NULL, NULL, 1, NULL, '2021-03-12 23:16:11', '2021-03-12 23:16:11'),
(18, 'customer', 'Doni', 'doni@gmail.com', NULL, '$2y$10$Wo6Sj9inGznfi/lQ2urnu.zTUxHMXSYaHjD/Qy5z5otzJaZcdqww2', '01792985242', '5150', NULL, NULL, 1, NULL, '2021-03-12 23:19:38', '2021-03-12 23:19:38'),
(19, 'customer', 'Two', 'two@gmail.com', NULL, '$2y$10$R8nXsVrdAiEhfcmTaLlK2uNL9hsF3QmEbwKtbvcqgPDTIWUBxhDmW', '01792985242', '3453', NULL, NULL, 1, NULL, '2021-03-16 05:50:43', '2021-03-16 05:50:43'),
(20, 'customer', 'Tamzid', 'tamzid@gmail.com', NULL, '$2y$10$9ZrxEzIs.8yRYA.hj4JcoOqYMZflGwsx8dlDPPx92Ya6QZViPmwk6', '01792985242', '9594', NULL, NULL, 1, NULL, '2021-03-18 02:20:34', '2021-03-18 02:20:34'),
(21, 'customer', 'AcerHpAsus', 'goleni8542@naymio.com', NULL, '$2y$10$p2bioBu2RJxjC.4J1BY1Hu.H7of1O5qHGiW8esdWEAsxm9mraZZyG', '01150060066', '1659', NULL, NULL, 1, NULL, '2021-03-21 13:06:29', '2021-03-21 13:06:29'),
(22, 'customer', 'fgsdfgdfg', 'seller@example.com', NULL, '$2y$10$HQAb2tpTVEd7zRx7RLUMButZSW372fvOvCVOka3icUSM7EeCUIBR2', NULL, '575', NULL, NULL, 1, NULL, '2021-03-27 23:21:38', '2021-03-27 23:21:38'),
(23, 'customer', 'dgfgdfg', 'dgdgdg@dfgdfg', NULL, '$2y$10$wBWDW0A048PlQ/BuMGPDlu0gzQIBLZQ0o2MNakk6x8XNGU8HmWl8G', NULL, '5809', NULL, NULL, 1, NULL, '2021-03-27 23:28:36', '2021-03-27 23:28:36'),
(24, 'admin', 'shaykat', 'shaykatali932@gmail.com', NULL, '$2y$10$swoFz/s2.2Bs0ZcuF2RyTuSqSUyksSFMVYvB6di8F0xEYV3k6GGX.', NULL, NULL, NULL, NULL, 1, NULL, '2021-03-28 11:25:30', '2021-03-28 11:25:30'),
(25, 'customer', 'Simon', 'Avishek@GMAIL.COM', NULL, '$2y$10$zFcEHv9ihofDCNY58gYqi.rNMnHr8/f5bswpnNJDfo5VtFMxykZ/i', '01976504051', '2902', NULL, NULL, 1, NULL, '2021-03-31 15:29:28', '2021-03-31 15:35:12'),
(26, 'customer', 'tonmoy', 'honda.tanmoy@gmail.com', NULL, '$2y$10$Va/wApntiMTdfUzYXp/H0uFJ1NZ5xrpNOaKsVpmLTRi4Jsd3KUh3.', '01792985242', '6835', NULL, NULL, 1, NULL, '2021-04-03 13:55:41', '2021-04-03 13:55:41'),
(27, 'customer', 'Aashab Tahmeed', 'beliketahmeed@gmail.com', NULL, '$2y$10$OV6ecVNFT0u.n5u8Q38mhecKBjWrxFb5yvcrS.KB5goYndJ7RQjhq', '01976504051', '794', NULL, NULL, 1, NULL, '2021-04-04 11:20:12', '2021-04-04 11:20:12'),
(28, 'customer', 'sajid', 'sajid123@gmail.com', NULL, '$2y$10$t7.Ldvbo7OAU4L4Jo1XJdeS9cbyafPIakRlqEYX2fQixWnRhEN5Bu', '01792985242', '8841', NULL, NULL, 1, NULL, '2021-04-05 11:35:22', '2021-04-05 11:35:22'),
(29, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$q6XG8FYDUg9IpGYyc.TCauVgbXGjL.5bqRUK/OfczEFaEOYuq8WUG', NULL, NULL, NULL, NULL, 1, NULL, '2021-05-26 10:09:36', '2021-05-26 11:27:23'),
(30, 'customer', 'shaykat', 'shaykat12345@gmail.com', NULL, '$2y$10$Y1oxNITaM.lkXx7PMQyq9uJHAZmvUzq6s0kEh5NrKwJ4ZNeeXDxlu', '01774361933', '6379', NULL, NULL, 1, NULL, '2021-05-26 11:44:47', '2021-05-26 11:44:47'),
(31, 'customer', 'Tonmoy Ali', 'shaykat999@gmail.com', NULL, '$2y$10$KLXidkBkcDD855NkccNIeerM/IZvXh/I6ALxU4Ieu8MYh.e408tJu', '01774361932', '3000', NULL, NULL, 1, NULL, '2021-05-26 11:45:13', '2021-05-26 11:45:13'),
(32, 'customer', 'robin', 'robin@gmail.com', NULL, '$2y$10$otmEGJkjRO5VsVlO0K1pDOIjB6wUgxZd5slEhaYtMskryybtYjO0m', '01774361333', '7905', NULL, NULL, 1, NULL, '2021-05-30 06:26:09', '2021-05-30 06:26:09'),
(33, 'user', 'Tahmeed Test Admin', 'tahmeed@iciclecorporation.com', NULL, '$2y$10$GLCiS6myGJVXkk39q6hCLunxwCwTXenmZ4WLXJf.n0rwXc7o8EVbO', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-22 09:39:37', '2021-06-22 09:41:15'),
(34, 'user', 'Tahmeed User', 'tahmeed@gmail.com', NULL, '$2y$10$tsda6dfuqD90PXi0BQa62eiRL3ZMoCjKlu/MDmxHqWgmc6f9SnTmW', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-22 09:40:39', '2021-06-22 09:40:39'),
(35, NULL, 'Portia Velazquez', 'wafido@mailinator.com', NULL, '$2y$10$fklgxKRp0S5F0oI/1NKfkex663gtyQpAOJfDDwUCM94jY5ti1FFHS', NULL, NULL, NULL, NULL, 1, NULL, '2021-06-27 23:01:45', '2021-06-27 23:01:45'),
(36, 'customer', 'Emerald Sampson', 'wowomenila@mailinator.com', NULL, '$2y$10$QGhoJrYPCJKeCOGq8PKLduv8i9vMID5SRKBWd3lZ38hTbT0aMTRuW', '19', '2461', NULL, NULL, 1, NULL, '2021-06-28 10:17:14', '2021-06-28 10:17:14'),
(37, 'customer', 'shihab pervez', 'shihab@iciclecorporation.com', NULL, '$2y$10$yOrMB49BhEooIKiGL.XRzumf.3G.E6xzU5xeZqEL7Z21W59KkxVAK', '01985889470', '5517', NULL, NULL, 1, NULL, '2021-07-04 02:31:38', '2021-07-04 02:31:38'),
(38, 'customer', 'MD Ataullah', 'mdataullah702@gmail.com', NULL, '$2y$10$Sc.DX2Ai1qvjXV1EjI7E8ePy6HsEALi2TF4KKmCNhdUAjmeAl4NXe', '01738574949', '4116', NULL, NULL, 1, NULL, '2021-07-05 19:10:32', '2021-07-05 19:10:32'),
(39, 'customer', 'Test User', 'moumitasub@gmail.com', NULL, '$2y$10$vJRlr0IQAPKdOb3BwXjgjONDg59L04hmNzgh3gR1R57Xo6E92prIC', NULL, NULL, NULL, NULL, 1, NULL, '2021-07-06 11:18:46', '2021-07-06 11:19:27'),
(40, 'customer', 'Dip', 'taifdip2014@gmail.com', NULL, '$2y$10$2vc2bfjNmON2vZ1gujH1VuKAqa645zIMJNHC31JzbIA19w5e7S6yS', '01789162422', '2374', NULL, NULL, 1, NULL, '2021-07-06 18:12:01', '2021-07-06 18:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_customers`
--
ALTER TABLE `invoice_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice__payments`
--
ALTER TABLE `invoice__payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice__payment__details`
--
ALTER TABLE `invoice__payment__details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `product_measurements`
--
ALTER TABLE `product_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_measurements`
--
ALTER TABLE `size_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice_customers`
--
ALTER TABLE `invoice_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice__payments`
--
ALTER TABLE `invoice__payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice__payment__details`
--
ALTER TABLE `invoice__payment__details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
  
--
-- AUTO_INCREMENT for table `product_measurements`
--
ALTER TABLE `product_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `size_measurements`
--
ALTER TABLE `size_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
