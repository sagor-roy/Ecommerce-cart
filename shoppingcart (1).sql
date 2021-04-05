-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 02:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `discount`, `created_at`, `updated_at`) VALUES
(1, '2k21', 2, NULL, NULL),
(2, '2k20', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Sagor Roy', 'sagor@gmail.com', 1785400204, NULL, '$2y$10$cv6HM8Jb/2QorLDF4LJbfuSg7oKSay8h71NSeVYAATINGQiPk052m', NULL, '2021-03-16 20:27:19', '2021-03-16 20:27:19'),
(8, 'John Doe', 'john@gmail.com', 2365874965, NULL, '$2y$10$PW/XFNlodaKthXphpdeoAenj1A/yKCL/D9aVWnj2DM943c6mVEZ4W', NULL, '2021-03-17 05:11:38', '2021-03-17 05:11:38'),
(9, 'Ms Dhoni', 'dhoni@gmail.com', 1254789637, NULL, '$2y$10$Yvr4Lzfp3XOU9MQTw1urEOe34RlhiHnMhJe0iCTnJWtixYOl4krCm', NULL, '2021-03-24 18:04:43', '2021-03-24 18:04:43'),
(10, 'Rohit Sharma', 'rohit@gmail.com', 1785412478, NULL, '$2y$10$DWdq0MujSuLyWBLIJNIdb.YrdgJ84JCR46CgLl0VCkzjLLiLkDR8C', NULL, '2021-03-31 11:42:49', '2021-03-31 11:42:49'),
(11, 'Rishabh Pant', 'pant@gmail.com', 1254788956, NULL, '$2y$10$gSWtgl5FAZgO14152bxlMOq3wRsphFWjnUlAkF7OJ4sc5apIl9YFW', NULL, '2021-03-31 18:49:17', '2021-03-31 18:49:17'),
(12, 'Bal Pakna', 'bal@gmail.com', 1254785478, NULL, '$2y$10$dOa1BzkrjFIMlrK5TMtV9uTSwIyd5vwcvkWBR.5uHe7vHUMPjRbdm', NULL, '2021-03-31 18:51:09', '2021-03-31 18:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `like` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `product_id`, `like`, `created_at`, `updated_at`) VALUES
(1, 7, 21, 1, '2021-03-30 06:23:45', '2021-03-30 06:23:45'),
(3, 7, 19, 1, '2021-03-30 06:39:26', '2021-03-30 06:39:26'),
(4, 7, 22, 1, '2021-03-30 06:39:44', '2021-03-30 06:39:44'),
(5, 8, 21, 1, '2021-03-30 06:46:12', '2021-03-30 06:46:12'),
(6, 8, 20, 1, '2021-03-30 06:47:56', '2021-03-30 06:47:56'),
(7, 8, 18, 1, '2021-03-30 06:51:18', '2021-03-30 06:51:18'),
(8, 8, 10, 1, '2021-03-30 06:51:46', '2021-03-30 06:51:46'),
(9, 8, 17, 1, '2021-03-30 06:52:10', '2021-03-30 06:52:10'),
(10, 7, 18, 1, '2021-03-30 06:53:52', '2021-03-30 06:53:52'),
(11, 9, 21, 1, '2021-03-30 06:56:55', '2021-03-30 06:56:55'),
(12, 9, 22, 1, '2021-03-30 06:57:41', '2021-03-30 06:57:41'),
(13, 9, 18, 1, '2021-03-30 06:58:49', '2021-03-30 06:58:49'),
(14, 7, 16, 1, '2021-03-31 05:23:58', '2021-03-31 05:23:58'),
(15, 7, 17, 1, '2021-03-31 05:25:06', '2021-03-31 05:25:06'),
(16, 10, 23, 1, '2021-03-31 11:44:37', '2021-03-31 11:44:37'),
(17, 10, 22, 1, '2021-03-31 11:45:55', '2021-03-31 11:45:55'),
(18, 10, 21, 1, '2021-03-31 12:29:59', '2021-03-31 12:29:59'),
(19, 10, 16, 1, '2021-03-31 14:06:04', '2021-03-31 14:06:04'),
(20, 10, 9, 1, '2021-03-31 14:16:28', '2021-03-31 14:16:28'),
(21, 10, 10, 1, '2021-03-31 14:30:28', '2021-03-31 14:30:28'),
(22, 10, 20, 1, '2021-03-31 14:31:30', '2021-03-31 14:31:30'),
(23, 10, 11, 1, '2021-03-31 16:30:43', '2021-03-31 16:30:43'),
(24, 7, 23, 1, '2021-03-31 18:10:31', '2021-03-31 18:10:31'),
(25, 7, 15, 1, '2021-03-31 18:18:29', '2021-03-31 18:18:29'),
(26, 7, 12, 1, '2021-04-01 07:22:49', '2021-04-01 07:22:49'),
(27, 10, 13, 1, '2021-04-01 19:18:51', '2021-04-01 19:18:51');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_13_161116_create_customers_table', 2),
(10, '2021_03_14_051728_create_products_table', 3),
(11, '2021_03_14_174148_create_reviews_table', 4),
(12, '2021_03_15_164949_create_carts_table', 5),
(13, '2021_03_16_113056_create_coupons_table', 6),
(14, '2021_03_16_230253_create_orders_table', 7),
(15, '2021_03_16_230416_create_order_items_table', 7),
(16, '2021_03_16_230459_create_shippings_table', 7),
(19, '2021_03_30_115430_create_likes_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment`, `subtotal`, `discount`, `total`, `invoice`, `created_at`, `updated_at`) VALUES
(31, 7, 'hand-cash', 8885, NULL, 8885, '08e32c11d4', '2021-03-24 19:20:01', NULL),
(32, 7, 'hand-cash', 700, NULL, 700, '3322b22ae0', '2021-03-24 19:33:00', NULL),
(33, 9, 'hand-cash', 350, NULL, 350, 'c0c235a1be', '2021-03-24 19:33:33', NULL),
(34, 9, 'hand-cash', 4950, NULL, 4950, 'a4870ae8fc', '2021-03-24 19:44:17', NULL),
(35, 9, 'hand-cash', 1750, NULL, 1750, 'f2f17a8110', '2021-03-24 20:05:13', NULL),
(36, 7, 'hand-cash', 700, NULL, 700, '350f7d4c42', '2021-03-24 20:05:39', NULL),
(37, 7, 'hand-cash', 14645, 2, 14352, '9870fc5147', '2021-03-29 15:51:37', NULL),
(38, 10, 'hand-cash', 48690, 2, 47716, 'e9e767b761', '2021-03-31 11:52:05', NULL),
(39, 10, 'hand-cash', 110040, 2, 107839, '44f4b5a746', '2021-04-01 19:10:21', NULL),
(40, 10, 'hand-cash', 8607, 2, 8435, '0e3a259fd7', '2021-04-01 19:22:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(49, 31, 21, 3, '2021-03-24 19:20:01', NULL),
(50, 31, 22, 5, '2021-03-24 19:20:01', NULL),
(51, 31, 20, 5, '2021-03-24 19:20:01', NULL),
(52, 32, 22, 2, '2021-03-24 19:33:00', NULL),
(53, 33, 22, 1, '2021-03-24 19:33:33', NULL),
(54, 34, 21, 5, '2021-03-24 19:44:17', NULL),
(55, 35, 22, 5, '2021-03-24 20:05:13', NULL),
(56, 36, 22, 2, '2021-03-24 20:05:39', NULL),
(57, 37, 7, 2, '2021-03-29 15:51:37', NULL),
(58, 37, 21, 2, '2021-03-29 15:51:37', NULL),
(59, 37, 20, 5, '2021-03-29 15:51:37', NULL),
(60, 38, 23, 10, '2021-03-31 11:52:05', NULL),
(61, 38, 21, 2, '2021-03-31 11:52:05', NULL),
(62, 38, 19, 10, '2021-03-31 11:52:05', NULL),
(63, 39, 22, 5, '2021-04-01 19:10:21', NULL),
(64, 39, 17, 1, '2021-04-01 19:10:21', NULL),
(65, 40, 23, 2, '2021-04-01 19:22:17', NULL),
(66, 40, 20, 5, '2021-04-01 19:22:17', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` bigint(20) UNSIGNED DEFAULT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `desc`, `code`, `stock`, `price`, `discount`, `status`, `f_img`, `s_img`, `t_img`, `created_at`, `updated_at`) VALUES
(5, 'Nike shoes', 'nike-shoes', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '4e72fed20c', 0, 1250, NULL, 'active', 'uploads/products/4e72fed20ca06a5_01.jpg', 'uploads/products/4e72fed20ca06a5_02.jpg', 'uploads/products/4e72fed20ca06a5_03.jpg', '2021-03-14 07:04:19', '2021-03-14 07:04:19'),
(6, 'Casio watch', 'casio-watch', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '75ba7c3b03', 5, 1870, 2, 'active', 'uploads/products/fbd41a674eb5267_01.jpg', 'uploads/products/fbd41a674eb5267_02.jpg', 'uploads/products/75ba7c3b037a392_03.jpg', '2021-03-14 07:08:14', '2021-03-17 05:19:37'),
(7, 'Addidas shoes', 'addidas-shoes', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '7db3155b1e', 3, 4250, NULL, 'active', 'uploads/products/7db3155b1e691a3_01.jpg', 'uploads/products/7db3155b1e691a3_02.jpg', 'uploads/products/7db3155b1e691a3_03.jpg', '2021-03-14 07:10:01', '2021-03-29 15:51:37'),
(8, 'Shirt for man', 'shirt-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '5a466b37d8', 0, 950, 3, 'active', 'uploads/products/b0f8bac5b9e0db3_01.jpg', 'uploads/products/5a466b37d8a3591_02.jpg', 'uploads/products/5a466b37d8a3591_03.jpg', '2021-03-14 07:10:56', '2021-03-17 05:19:37'),
(9, 'Lather bag', 'lather-bag', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '56c07581ae', 24, 3500, 2, 'active', 'uploads/products/55e40e7187d0e91_01.jpg', 'uploads/products/55e40e7187d0e91_02.jpg', 'uploads/products/55e40e7187d0e91_03.jpg', '2021-03-14 07:12:34', '2021-03-22 17:54:49'),
(10, 'Ladies hil', 'ladies-hil', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '6cc3507d83', NULL, 1670, NULL, 'active', 'uploads/products/98282d3693fba59_01.jpg', 'uploads/products/6cc3507d83b5ed2_02.jpg', 'uploads/products/6cc3507d83b5ed2_03.jpg', '2021-03-14 07:13:33', '2021-03-14 07:13:33'),
(11, 'Sunglass for man', 'sunglass-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', 'ab29f71d7e', 25, 800, 2, 'active', 'uploads/products/11ad83e75ad7d2e_01.jpg', 'uploads/products/11ad83e75ad7d2e_02.jpg', 'uploads/products/ab29f71d7e983d7_03.jpg', '2021-03-14 07:15:02', '2021-03-14 07:15:02'),
(12, 'Jacket for woman', 'jacket-for-woman', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '511e2a4c61', 40, 4750, 5, 'active', 'uploads/products/511e2a4c610be6c_01.jpg', 'uploads/products/511e2a4c610be6c_02.jpg', 'uploads/products/511e2a4c610be6c_03.jpg', '2021-03-14 07:16:10', '2021-03-17 05:27:53'),
(13, 'Casual shoes for man', 'casual-shoes-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', 'bd82ba4ba9', 100, 2750, NULL, 'active', 'uploads/products/10be68673424792_01.jpg', 'uploads/products/10be68673424792_02.jpg', 'uploads/products/bd82ba4ba91505c_03.jpg', '2021-03-14 07:17:48', '2021-03-14 07:17:48'),
(14, 'Apex shoes for man', 'apex-shoes-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '93e1356caa', 0, 1470, NULL, 'active', 'uploads/products/9bef3cd9405d890_01.webp', 'uploads/products/93e1356caa31b9c_02.webp', 'uploads/products/93e1356caa31b9c_03.webp', '2021-03-14 09:27:52', '2021-03-16 19:03:27'),
(15, 'Ladies casual shoes', 'ladies-casual-shoes', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '430f4fcebd', 30, 1500, 5, 'active', 'uploads/products/be22ee3027489ca_01.webp', 'uploads/products/be22ee3027489ca_02.webp', 'uploads/products/be22ee3027489ca_03.jpg', '2021-03-14 09:30:23', '2021-03-16 19:03:27'),
(16, 'Samsung galaxy-J5', 'samsung-galaxy-j5', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '04d3ad7ec1', 10, 27500, NULL, 'active', 'uploads/products/d6b477c9ffa364e_01.png', 'uploads/products/04d3ad7ec1c004d_02.jpg', 'uploads/products/04d3ad7ec1c004d_03.jpg', '2021-03-16 19:54:49', '2021-03-16 19:54:49'),
(17, 'Apple Laptop model 250g5', 'apple-laptop-model-250g5', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '7601300910', 0, 110500, 2, 'active', 'uploads/products/5c5f183181e75a7_03.jpg', 'uploads/products/5c5f183181e75a7_02.jpg', 'uploads/products/5c5f183181e75a7_01.jpg', '2021-03-16 20:02:06', '2021-04-01 19:10:21'),
(18, 'Denim bags for travel', 'denim-bags-for-travel', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum isIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '5f104f3832', 15, 1450, NULL, 'active', 'uploads/products/5f104f3832b1f11_01.jpg', 'uploads/products/5f104f3832b1f11_02.jpg', 'uploads/products/5f104f3832b1f11_03.jpg', '2021-03-16 20:08:22', '2021-03-16 20:08:22'),
(19, 'Couple shirt and punjabi', 'couple-shirt-and-punjabi', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '4fa386a06e', 0, 2450, NULL, 'active', 'uploads/products/0383e6cedcb914a_01.jpg', 'uploads/products/0383e6cedcb914a_02.jpg', 'uploads/products/58e2c61062cd8c7_03.jpg', '2021-03-17 13:26:36', '2021-03-31 11:52:05'),
(20, 'Denim shirt for man', 'denim-shirt-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', 'eddaf6665d', 0, 850, 2, 'active', 'uploads/products/8d4773b7f793155_01.jpg', 'uploads/products/e6fe9478bceb7f8_02.jpg', 'uploads/products/eddaf6665d314bd_03.jpg', '2021-03-17 13:35:12', '2021-04-01 19:22:17'),
(21, 'Bata casual for man', 'bata-casual-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', 'd12a008f16', 1, 990, NULL, 'active', 'uploads/products/0a31a3769e8a72f_01.jpg', 'uploads/products/0a31a3769e8a72f_02.jpg', 'uploads/products/0a31a3769e8a72f_03.jpg', '2021-03-17 13:43:49', '2021-03-31 11:52:05'),
(22, 'Brand t-shirt for man', 'brand-t-shirt-for-man', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '8587f39eee', 0, 350, NULL, 'active', 'uploads/products/a2b2c5a449d7f41_01.jpg', 'uploads/products/d5e9847d8d87d38_02.jpg', 'uploads/products/50c64edcead52f3_03.jpg', '2021-03-17 13:52:30', '2021-04-01 19:10:21'),
(23, 'Ladies casual looffer', 'ladies-casual-looffer', 'Ladies casual loofferLadies casual loofferLadies casual looffer Ladies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual loofferLadies casual looffer', '1438a2d0a8', 8, 2290, 3, 'active', 'uploads/products/3b79e004a92e226_01.jpg', 'uploads/products/63fa694390786d0_02.jpg', 'uploads/products/1438a2d0a814c73_03.jpg', '2021-03-31 11:34:51', '2021-04-01 19:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(54, 7, 10, 3, 'good', '2021-03-16 20:28:06', '2021-03-16 20:28:06'),
(55, 7, 17, 4, 'this product is nice', '2021-03-16 20:28:24', '2021-03-16 20:28:24'),
(56, 7, 18, 2, 'nice', '2021-03-16 20:29:08', '2021-03-16 20:29:08'),
(57, 7, 16, 1, 'price very high', '2021-03-16 20:29:36', '2021-03-16 20:29:36'),
(58, 7, 15, 5, 'this product is nice', '2021-03-16 20:29:51', '2021-03-16 20:29:51'),
(59, 7, 14, 3, 'good', '2021-03-16 20:30:06', '2021-03-16 20:30:06'),
(60, 7, 13, 1, 'bad', '2021-03-16 20:30:30', '2021-03-16 20:30:30'),
(61, 7, 12, 5, 'this product is nice', '2021-03-16 20:30:44', '2021-03-16 20:30:44'),
(62, 7, 11, 2, 'nice', '2021-03-16 20:30:59', '2021-03-16 20:30:59'),
(63, 7, 9, 3, 'good', '2021-03-16 20:31:15', '2021-03-16 20:31:15'),
(64, 7, 8, 5, 'this product is nice', '2021-03-16 20:31:29', '2021-03-16 20:31:29'),
(65, 7, 5, 3, 'good', '2021-03-16 20:31:45', '2021-03-16 20:31:45'),
(66, 7, 6, 5, 'this product is nice', '2021-03-16 20:31:56', '2021-03-16 20:31:56'),
(67, 7, 7, 1, 'price very high', '2021-03-16 20:32:11', '2021-03-16 20:32:11'),
(68, 7, 22, 3, 'looking good', '2021-03-18 06:36:10', '2021-03-18 06:36:10'),
(69, 7, 21, 5, 'nice', '2021-03-18 06:36:55', '2021-03-18 06:36:55'),
(70, 7, 20, 4, 'good', '2021-03-18 06:37:17', '2021-03-18 06:37:17'),
(71, 7, 19, 2, 'not bad', '2021-03-18 06:37:53', '2021-03-18 06:37:53'),
(72, 9, 17, NULL, 'bad', '2021-03-24 18:05:28', '2021-03-24 18:05:28'),
(73, 9, 17, NULL, 'very bad', '2021-03-24 18:05:49', '2021-03-24 18:05:49'),
(74, 9, 17, 5, 'used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is', '2021-03-24 18:06:44', '2021-03-24 18:06:44'),
(75, 7, 22, 3, 'good', '2021-03-29 15:44:26', '2021-03-29 15:44:26'),
(76, 7, 22, NULL, 'very bad', '2021-03-29 15:44:51', '2021-03-29 15:44:51'),
(77, 7, 21, NULL, 'bad', '2021-03-29 15:55:12', '2021-03-29 15:55:12'),
(78, 7, 22, NULL, 'very bad', '2021-03-31 05:31:21', '2021-03-31 05:31:21'),
(79, 10, 23, 2, 'not bad', '2021-03-31 11:44:57', '2021-03-31 11:44:57'),
(80, 10, 22, 5, 'this product is nice', '2021-03-31 11:46:12', '2021-03-31 11:46:12'),
(81, 10, 23, 5, 'this product is nice', '2021-03-31 12:31:56', '2021-03-31 12:31:56'),
(82, 7, 23, 5, 'nice', '2021-03-31 18:09:28', '2021-03-31 18:09:28'),
(83, 7, 23, NULL, 'very bad', '2021-03-31 18:09:40', '2021-03-31 18:09:40'),
(84, 7, 12, NULL, 'bad', '2021-04-01 13:42:07', '2021-04-01 13:42:07'),
(85, 10, 13, 5, 'this product is nice', '2021-04-01 19:19:04', '2021-04-01 19:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `email`, `number`, `address`, `city`, `country`, `post`, `created_at`, `updated_at`) VALUES
(21, 31, 'Sagor Roy', 'sagor@gmail.com', '01785400204', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-03-24 19:20:01', NULL),
(22, 32, 'Sagor Roy', 'sagor@gmail.com', '01785400204', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-03-24 19:33:00', NULL),
(23, 34, 'Ms Dhoni', 'dhoni@gmail.com', '01254789637', 'birgonj', 'Dinajpur', 'bangladesh', 46546, '2021-03-24 19:44:17', NULL),
(24, 35, 'Ms Dhoni', 'dhoni@gmail.com', '01254789637', 'birgonj', 'Dinajpur', 'bangladesh', 54564, '2021-03-24 20:05:13', NULL),
(25, 37, 'Sagor Roy', 'sagor@gmail.com', '01785400204', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-03-29 15:51:37', NULL),
(26, 38, 'Rohit Sharma', 'rohit@gmail.com', '01785412478', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-03-31 11:52:05', NULL),
(27, 39, 'Rohit Sharma', 'rohit@gmail.com', '01785412478', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-04-01 19:10:22', NULL),
(28, 40, 'Rohit Sharma', 'rohit@gmail.com', '01785412478', 'mirpur-14,senapolli', 'Dhaka', 'bangladesh', 5220, '2021-04-01 19:22:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sagor', 'admin@gmail.com', NULL, '$2y$10$eQSTbLd5irGj2CmLsD2e3./75ZyiJOhWN.XXU73FdSp.DZ1.ogwzO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_number_unique` (`number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
