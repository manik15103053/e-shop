-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shopbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `prod_qty` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(44, '1', '4', '1', '2023-09-06 13:08:20', '2023-09-06 13:08:20'),
(81, '3', '1', '8', '2023-09-10 03:22:10', '2023-09-10 03:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` varchar(191) NOT NULL,
  `meta_keywords` varchar(191) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Mobile Phone', 'mobile-phone', 'This is the best Mobile Phone', 0, 1, 'Mobile Phone', 'This is the best Mobile Phone', 'Mobile Phone', 'uploads/images/category/1693064356.jpeg', '2023-08-26 09:37:31', '2023-08-28 10:05:32'),
(4, 'Laptop', 'laptop', 'This is the best Laptop', 0, 1, 'Laptop', 'This is the best Laptop', 'This is the best Laptop', 'uploads/images/category/1693065470.jpg', '2023-08-26 09:57:50', '2023-08-28 10:05:22'),
(5, 'Camera', 'camera', 'This is the best Camera', 0, 1, 'This is the best Camera', 'This is the best Camera', 'This is the best Camera', 'uploads/images/category/1693238817.png', '2023-08-28 10:06:57', '2023-08-28 10:06:57'),
(6, 'Monitor', 'monitor', 'This is the best monitor', 0, 1, 'This is the best monitor', 'This is the best monitor', 'This is the best monitor', 'uploads/images/category/1693238865.jpg', '2023-08-28 10:07:45', '2023-08-28 10:07:45'),
(7, 'Smart watch', 'smart-watch', 'This is the best smart watch', 0, 1, 'This is the best smart watch', 'This is the best smart watch', 'This is the best smart watch', 'uploads/images/category/1693238911.png', '2023-08-28 10:08:31', '2023-08-28 10:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(5, '2023_08_26_063029_create_categories_table', 2),
(6, '2023_08_26_162016_create_products_table', 3),
(7, '2023_08_29_062354_create_carts_table', 4),
(8, '2023_09_02_151352_create_orders_table', 5),
(9, '2023_09_02_151938_create_order_items_table', 5),
(10, '2023_09_04_065901_create_wishlists_table', 6),
(11, '2023_09_08_041026_create_ratings_table', 7),
(13, '2023_09_08_145535_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `address2` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `pincode` varchar(191) NOT NULL,
  `total_price` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) DEFAULT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `total_price`, `status`, `message`, `tracking_no`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(14, 2, 'User', 'Manik', 'user@gmail.com', '01770802187', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 54000, 0, NULL, 'sharma6931', 'COD', NULL, '2023-09-07 23:37:06', '2023-09-07 23:37:06'),
(15, 2, 'User', 'Manik', 'user@gmail.com', '01770802187', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 8500, 0, NULL, 'sharma6346', 'COD', NULL, '2023-09-08 07:30:53', '2023-09-08 07:30:53'),
(16, 3, 'Md Manik', 'Manik', 'manik@gmail.com', '01770802185', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 13500, 0, NULL, 'sharma1650', 'COD', NULL, '2023-09-08 07:39:02', '2023-09-08 07:39:02'),
(17, 3, 'Md Manik', 'Manik', 'manik@gmail.com', '01770802185', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 45000, 0, NULL, 'sharma6504', 'COD', NULL, '2023-09-08 10:41:22', '2023-09-08 10:41:22'),
(18, 3, 'Md Manik', 'Manik', 'manik@gmail.com', '01770802185', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 20000, 0, NULL, 'sharma6065', 'COD', NULL, '2023-09-09 23:39:41', '2023-09-09 23:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(17, '14', '4', '1', '9000', '2023-09-07 23:37:06', '2023-09-07 23:37:06'),
(18, '14', '6', '1', '45000', '2023-09-07 23:37:07', '2023-09-07 23:37:07'),
(19, '15', '5', '1', '4000', '2023-09-08 07:30:54', '2023-09-08 07:30:54'),
(20, '15', '1', '1', '4500', '2023-09-08 07:30:55', '2023-09-08 07:30:55'),
(21, '16', '1', '1', '4500', '2023-09-08 07:39:02', '2023-09-08 07:39:02'),
(22, '16', '4', '1', '9000', '2023-09-08 07:39:03', '2023-09-08 07:39:03'),
(23, '17', '6', '1', '45000', '2023-09-08 10:41:23', '2023-09-08 10:41:23'),
(24, '18', '3', '1', '20000', '2023-09-09 23:39:41', '2023-09-09 23:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(191) NOT NULL,
  `selling_price` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `qty` varchar(191) NOT NULL,
  `tax` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `trending` tinyint(4) DEFAULT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Samsung a57', 'samsung-a57', 'This is the best product', 'This is the best product', '5000', '4500', 'uploads/images/product/1693070866.jpeg', '9', '20', 1, 0, 'This is the best product', 'This is the best product', 'This is the best product', '2023-08-26 11:27:46', '2023-09-08 07:39:03'),
(3, 3, 'iPhone 13maxpro', 'iphone-13maxpro', 'This is This is best title', 'This is This is best title', '21000', '20000', 'uploads/images/product/1693161809.jpg', '18', '10', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:43:29', '2023-09-09 23:39:41'),
(4, 3, 'Oppo a57', 'oppo-a57', 'This is This is best title', 'This is This is best title', '10000', '9000', 'uploads/images/product/1693161904.jpg', '17', '40', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:44:39', '2023-09-08 07:39:03'),
(5, 4, 'Lenovo', 'lenovo', 'This is This is best title', 'This is This is best title', '5000', '4000', 'uploads/images/product/1693161957.png', '19', '20', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:45:57', '2023-09-08 07:30:54'),
(6, 4, 'HP Laptop', 'hp-laptop', 'This is the best laptop', 'This is the best laptop', '50000', '45000', 'uploads/images/product/1693162012.jpg', '17', '20', 1, 1, 'This is the best laptop', 'This is the best laptop', 'This is the best laptop', '2023-08-27 12:46:52', '2023-09-08 10:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `stars_rated` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(4, '2', '6', '4', '2023-09-07 23:37:56', '2023-09-07 23:37:56'),
(5, '2', '4', '3', '2023-09-08 00:18:11', '2023-09-09 23:32:21'),
(6, '2', '1', '3', '2023-09-08 07:31:13', '2023-09-08 13:22:03'),
(7, '3', '1', '5', '2023-09-08 07:39:26', '2023-09-08 10:37:06'),
(8, '2', '5', '2', '2023-09-08 13:35:27', '2023-09-08 13:37:07'),
(9, '3', '6', '5', '2023-09-09 23:38:02', '2023-09-09 23:38:02'),
(10, '3', '4', '4', '2023-09-09 23:38:42', '2023-09-10 00:07:39'),
(11, '3', '3', '2', '2023-09-09 23:39:53', '2023-09-10 00:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `user_review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '3', '6', 'This is The best review product', '2023-09-08 12:23:51', '2023-09-08 12:27:53'),
(2, '2', '1', 'Test Review', '2023-09-08 12:36:35', '2023-09-08 12:36:35'),
(3, '2', '5', 'This is the best test', '2023-09-08 13:35:02', '2023-09-08 13:35:02'),
(4, '2', '4', 'This is the best review', '2023-09-09 23:13:39', '2023-09-09 23:13:39'),
(5, '3', '3', 'This is the best reviewcvgbc', '2023-09-09 23:40:10', '2023-09-09 23:40:43'),
(6, '3', '4', 'This is the best review for test This is the best review for test This is the best review for test This is the best review for test This is the best review for test', '2023-09-10 00:05:56', '2023-09-10 00:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HAA2EuenucmHj5WrQUACQOLdU29SpWmz3kYYYe/v1gCBzvK2dyxlK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-08-25 22:28:20', '2023-08-25 22:28:20'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$CPVtnE16S.AEd.NLGAYuD.T8.pEhjI1xyrXYti0Af2wzHNRoRMHvC', 'Manik', '01770802187', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 0, NULL, '2023-08-25 23:01:43', '2023-09-03 11:56:08'),
(3, 'Md Manik', 'manik@gmail.com', NULL, '$2y$10$gb7iCc79t2DD4EY60anV0OGGBaT1VE6lCfoIKS8yuLcSX.1lcZqZ2', 'Manik', '01770802185', 'Dhaka Bangladesh', 'Dhaka Bangladesh', 'Dhaka', 'Dhaka', 'Bangladesh', '1231', 0, NULL, '2023-09-08 07:37:37', '2023-09-08 07:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
