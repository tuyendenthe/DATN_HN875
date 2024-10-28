-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2024 at 10:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptoptechzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bill_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `bill_id` bigint UNSIGNED NOT NULL,
  `bill_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2024-09-29 12:00:35', '2024-09-29 12:00:35'),
(2, 'tuyendenthe', NULL, '2024-09-29 12:00:42', '2024-09-29 12:00:42'),
(3, 'admin123', NULL, '2024-09-29 12:00:49', '2024-09-29 12:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fix_book`
--

CREATE TABLE `fix_book` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `time_end` datetime NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `product_id`, `time_end`, `created_at`, `updated_at`) VALUES
(7, 4, '2024-10-24 12:05:00', '2024-10-22 09:30:03', '2024-10-23 10:04:37'),
(8, 5, '2024-10-24 12:06:00', '2024-10-22 09:30:39', '2024-10-23 10:05:12'),
(9, 1, '2024-10-24 00:06:00', '2024-10-23 10:03:26', '2024-10-23 10:04:57'),
(10, 2, '2024-10-24 00:06:00', '2024-10-23 10:03:37', '2024-10-23 10:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_21_095817_categories', 1),
(6, '2024_09_21_095827_category_post', 1),
(7, '2024_09_21_095840_status', 1),
(8, '2024_09_21_095906_contact', 1),
(9, '2024_09_21_095915_fix_book', 1),
(10, '2024_09_21_100010_products', 1),
(11, '2024_09_21_100011_variants', 1),
(12, '2024_09_21_101707_vouchers', 1),
(13, '2024_09_21_101741_posts', 1),
(14, '2024_09_21_101816_comments', 1),
(15, '2024_09_21_102102_bills', 1),
(16, '2024_09_21_102115_bill_detail', 1),
(17, '2024_09_25_002807_slides', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('calot957@gmail.com', '$2y$12$icYpDRREXGFed52QfKzKsu0Lsq57PnBE20zZIqGapCMMDcqt4/e52', '2024-10-03 04:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_short` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_post_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_short` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `image`, `content`, `content_short`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Product 1', 0, 'images/products/ao_aKIsLSTRxr32G8dllZb4ynvg8O5SqMAaosfLGIZX.png', 'KCr1LrDJxuhZxAIC5nFfvkFxbNbtgRapUxRk2jGzUkuwCBh0id', '9fj9q0C1BvhOKfjXY0i8', 2, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(2, 2, 'Product 2', 0, 'images/products/ao_aKIsLSTRxr32G8dllZb4ynvg8O5SqMAaosfLGIZX.png', 'gXDYWmqGqzJJWwDioW2CTOrkyaoVaeWhPEtq3gYV7A7WCePFeO', '9Bk4BqSsoonmfWBSBZSW', 5, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(3, 3, 'Product 3', 0, 'images/products/ao_aKIsLSTRxr32G8dllZb4ynvg8O5SqMAaosfLGIZX.png', '0oE4pIia9M0huzfPb0MTMNt62l1IaJbAg370nRmQ5fzzLe6JRB', 'JN80qK1iR9TY3EosDfFy', 5, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(4, 1, 'Product 4', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', 'CjHSKhNWBLLVNDhDjERkIXVyRxpgrTdDrNfmG33GM4qsuuKulV', 'TCmTLv5txiqv9DXMpZEJ', 2, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(5, 2, 'Product 5', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', 'VCejDX3SL7nbqVIECgNVYNvixGhtGjpqU1QcDRarFeTgt5bNcx', 'jz8YvPUjjXNy3oLJkvFx', 4, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(6, 3, 'Product 6', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', '0fE8s6NjSZn6KcZ0Oc07wYYm1vcFEO3YeAIAJwiu2aNdsbdjdF', 'Fek7Q3j0dLqvLowCI5Vz', 1, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(7, 1, 'Product 7', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', '4yuXZCRr8mMepYqezxHnFsCcQOzHfeLOgMgodZAfQ3r8vHrscm', 'WuuEOKcxiiGpe8m0cZOk', 4, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(8, 2, 'Product 8', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', '7fibpeSPieHyVM0zgbsiXIFivipo9pKxERaX3unK7kYYXJbyaC', 'DhAcUOxICWMbGChSU43r', 3, NULL, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(9, 3, 'Product 9', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', '9aeeA9dpqxPn8nwCZnDOxhnlhFqIuAPEYTErRJEa9HlL1deUrw', 'QUAgI9s2Fsm4fZvLhso8', 2, '2024-09-30 01:11:02', NULL, '2024-09-29 11:58:54', '2024-09-30 01:11:02'),
(10, 1, 'Product 10', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', 'fdBhyyEjaimuhTdia3MgoeK4rB6bNe9H77DpiHP3B3B38w7CoQ', '8RGLeO3gmCRBsbTECMOy', 1, '2024-09-30 01:10:55', NULL, '2024-09-29 11:58:54', '2024-09-30 01:10:55'),
(11, 2, 'admin', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', 'sdvsdv', 'sdsdcsd', NULL, NULL, NULL, '2024-09-30 01:49:10', '2024-09-30 01:49:10'),
(12, 1, 'adminsczx', 0, 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', 'dvdcd', 'cscasca', NULL, NULL, NULL, '2024-09-30 01:50:56', '2024-09-30 01:50:56'),
(13, NULL, 'test', 0, 'images/products/test_oII0UDb6BfSzH6AhWasP8dSifUWSa1HKH5ozprvn.jpg', 'oklaaaa', 'ok la', NULL, NULL, NULL, '2024-09-30 03:58:40', '2024-09-30 03:58:40'),
(14, NULL, 'ao', 0, 'images/products/ao_aKIsLSTRxr32G8dllZb4ynvg8O5SqMAaosfLGIZX.png', 'gregeq', 'rgeqg', NULL, NULL, NULL, '2024-10-01 06:10:00', '2024-10-01 06:10:00'),
(15, NULL, 'ABCDE', 0, 'images/products/ABCDE_5HL7pwaOt4MepqaH5SLa1lKdfxMKViwKBfExU5ED.jpg', 'b', 'a', NULL, NULL, NULL, '2024-10-19 22:47:06', '2024-10-19 22:47:06'),
(16, NULL, 'tung', 232, 'images/products/tung_yCXDo1umm7drGmmaQsZuqxrXbeSNGSGEmWXXgW7V.jpg', '1', '1', NULL, NULL, NULL, '2024-10-19 22:48:44', '2024-10-19 22:48:44'),
(17, NULL, 'admin12', 20000, 'images/products/admin12_rkW24yTjTZNLfVKgm5OrOzvOluJsgyv28YQJ93pv.jpg', '4545', 'sdfsd', NULL, NULL, NULL, '2024-10-20 07:04:37', '2024-10-20 07:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '\'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg\'', NULL, NULL, NULL, NULL),
(2, '\'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg\'', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add` int DEFAULT NULL,
  `rank` int DEFAULT NULL,
  `poin` int DEFAULT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1 admin | 2 user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `add`, `rank`, `poin`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tuyendenthe', 'hvt901tranvantuyen@gmail.com', '$2y$12$MlM./3PkBOwT5a0SFPCvZOgA.ynd9zd4rC3m8Dw97kMGee0bRXg2W', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '1', NULL, '2024-09-30 02:42:29', '2024-09-30 02:42:29'),
(2, 'tuyendenthe', 'hvt910tranvantuyen@gmail.com', '$2y$12$TtHOrwSxDWuVUzHNO4s4RutEzzdXoTM/D4vcEssJj.pAAY76qYUG6', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '2', NULL, '2024-09-30 04:05:35', '2024-09-30 04:14:20'),
(3, 'trung', 'calot957@gmail.com', '$2y$12$YE4B7ieoZR9XzL0x6xlG2uKAhFBxgrqaGBqdLCgF.CYQCCKZqT9qK', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '1', NULL, '2024-10-01 05:57:45', '2024-10-01 06:08:45'),
(4, 'trung', 'trungnqph31643@fpt.edu.vn', '$2y$12$ZLeWIbp6xbm601ihUEKUPOsoc8yygknNXdv7lEcd2nhBdE6thvUqq', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '1', NULL, '2024-10-08 08:07:42', '2024-10-08 08:07:42'),
(5, 'ttrung', 'admin@gmail.com', '$2y$12$.gFMZKcHDrq/sqXY8PzfveyyKGIfn/tsbGYDj8JEwkrP7gZgtQ6E6', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '1', NULL, '2024-10-20 05:16:41', '2024-10-20 05:16:41'),
(6, 'admin123', 'hvt900tranvantuyen@gmail.com', '$2y$12$7VlN4q59DpAcHDvIQ/ygyu/Rsuu1ReQzA.0P.86bKo2NdLHUl7Dt6', 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg', NULL, NULL, NULL, '1', NULL, '2024-10-20 06:42:53', '2024-10-20 06:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `type` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `type`, `name`, `price`, `quantity`, `product_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Variant 1 for Product 1', 838, 2, 1, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(2, 1, 'Variant 2 for Product 1', 813, 1, 1, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(3, 1, 'Variant 1 for Product 2', 413, 81, 2, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(4, 1, 'Variant 2 for Product 2', 258, 31, 2, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(5, 1, 'Variant 1 for Product 3', 418, 64, 3, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(6, 1, 'Variant 2 for Product 3', 798, 50, 3, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(7, 1, 'Variant 1 for Product 4', 285, 83, 4, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(8, 1, 'Variant 2 for Product 4', 359, 13, 4, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(9, 1, 'Variant 1 for Product 5', 923, 100, 5, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(10, 1, 'Variant 2 for Product 5', 847, 77, 5, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(11, 1, 'Variant 1 for Product 6', 681, 86, 6, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(12, 1, 'Variant 2 for Product 6', 785, 32, 6, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(13, 1, 'Variant 1 for Product 7', 238, 55, 7, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(14, 1, 'Variant 2 for Product 7', 578, 88, 7, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(15, 1, 'Variant 1 for Product 8', 142, 61, 8, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(16, 1, 'Variant 2 for Product 8', 153, 59, 8, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(17, 1, 'Variant 1 for Product 9', 543, 78, 9, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(18, 1, 'Variant 2 for Product 9', 680, 6, 9, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(19, 1, 'Variant 1 for Product 10', 775, 16, 10, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(20, 1, 'Variant 2 for Product 10', 975, 38, 10, NULL, '2024-09-29 11:58:54', '2024-09-29 11:58:54'),
(21, 1, 'tuyendenthe', 399000, 28, 2, NULL, '2024-09-30 01:13:39', '2024-09-30 01:13:39'),
(22, 1, 'admin', 399000, 5, 13, NULL, '2024-09-30 03:59:02', '2024-09-30 03:59:02'),
(23, 1, 'tuyendenthe', 350000, 3, 13, NULL, '2024-09-30 03:59:15', '2024-09-30 03:59:15'),
(24, 1, 'do', 232, 4, 14, NULL, '2024-10-01 06:10:21', '2024-10-01 06:10:21'),
(25, 1, 'ao', 232, 435, 14, NULL, '2024-10-01 06:10:30', '2024-10-01 06:10:30'),
(26, 1, 'Ram 16', 1500, 12, 1, NULL, '2024-10-19 22:22:40', '2024-10-19 22:22:40'),
(27, 1, 'Phiển bản 12', 1500, 26, 1, NULL, '2024-10-19 22:37:08', '2024-10-19 22:37:08'),
(28, 3, '16GB', 1500, 10, 2, NULL, '2024-10-19 22:57:18', '2024-10-19 22:57:18'),
(29, 3, '16', 300000, 1, 14, NULL, '2024-10-20 05:18:00', '2024-10-20 05:18:00'),
(30, 1, '44444', 399000, 12, 13, NULL, '2024-10-20 07:01:27', '2024-10-20 07:01:27'),
(31, 1, '8', 6125, 55, 13, NULL, '2024-10-20 07:02:07', '2024-10-20 07:02:07'),
(32, 1, 'đỏ', 5, 111, 13, NULL, '2024-10-20 07:02:22', '2024-10-20 07:02:22'),
(33, 1, '44444', 350000, 12, 13, NULL, '2024-10-20 07:03:53', '2024-10-20 07:03:53'),
(34, 1, 'da', 399000, 12, 17, NULL, '2024-10-20 07:04:56', '2024-10-20 07:04:56'),
(35, 1, '44444', 399000, 15, 17, NULL, '2024-10-20 07:05:13', '2024-10-20 07:05:13'),
(36, 1, 'do', 350000, 123, 17, NULL, '2024-10-20 07:05:29', '2024-10-20 07:05:29'),
(37, 2, 'admin', 300000, 15, 17, NULL, '2024-10-20 07:17:52', '2024-10-21 07:14:34'),
(38, 2, 'admin', 399000, 15, 17, NULL, '2024-10-20 07:18:21', '2024-10-20 07:18:21'),
(39, 3, '15', 399000, 12, 17, NULL, '2024-10-20 07:18:49', '2024-10-20 07:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price_sale` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher_code`, `quantity`, `price_sale`, `start_date`, `end_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123', 20, 100, '2024-10-20', '2024-10-31', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_status_id_foreign` (`status_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_product_id_foreign` (`product_id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_status_id_foreign` (`status_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fix_book`
--
ALTER TABLE `fix_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fix_book_status_id_foreign` (`status_id`);

--
-- Indexes for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_post_id_foreign` (`category_post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_posts`
--
ALTER TABLE `category_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fix_book`
--
ALTER TABLE `fix_book`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `fix_book`
--
ALTER TABLE `fix_book`
  ADD CONSTRAINT `fix_book_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD CONSTRAINT `flash_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_post_id_foreign` FOREIGN KEY (`category_post_id`) REFERENCES `category_posts` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
