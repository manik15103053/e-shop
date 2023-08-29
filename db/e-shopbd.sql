-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 09:17 PM
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
(14, '2', '1', '1', '2023-08-29 12:19:34', '2023-08-29 13:16:05'),
(15, '2', '3', '1', '2023-08-29 12:19:46', '2023-08-29 13:16:08');

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
(7, '2023_08_29_062354_create_carts_table', 4);

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
(1, 3, 'Samsung a57', 'samsung-a57', 'This is the best product', 'This is the best product', '5000', '4500', 'uploads/images/product/1693070866.jpeg', '5', '20', 1, 0, 'This is the best product', 'This is the best product', 'This is the best product', '2023-08-26 11:27:46', '2023-08-28 11:15:23'),
(3, 3, 'iPhone 13maxpro', 'iphone-13maxpro', 'This is This is best title', 'This is This is best title', '21000', '20000', 'uploads/images/product/1693161809.jpg', '4', '10', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:43:29', '2023-08-28 11:15:06'),
(4, 3, 'Oppo a57', 'oppo-a57', 'This is This is best title', 'This is This is best title', '10000', '9000', 'uploads/images/product/1693161904.jpg', '4', '40', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:44:39', '2023-08-28 11:14:43'),
(5, 4, 'Lenovo', 'lenovo', 'This is This is best title', 'This is This is best title', '5000', '4000', 'uploads/images/product/1693161957.png', '4', '20', 1, 1, 'This is This is best title', 'This is This is best title', 'This is This is best title', '2023-08-27 12:45:57', '2023-08-28 11:14:23'),
(6, 4, 'HP Laptop', 'hp-laptop', 'This is the best laptop', 'This is the best laptop', '50000', '45000', 'uploads/images/product/1693162012.jpg', '4', '20', 1, 1, 'This is the best laptop', 'This is the best laptop', 'This is the best laptop', '2023-08-27 12:46:52', '2023-08-28 11:14:09');

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
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HAA2EuenucmHj5WrQUACQOLdU29SpWmz3kYYYe/v1gCBzvK2dyxlK', 1, NULL, '2023-08-25 22:28:20', '2023-08-25 22:28:20'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$CPVtnE16S.AEd.NLGAYuD.T8.pEhjI1xyrXYti0Af2wzHNRoRMHvC', 0, NULL, '2023-08-25 23:01:43', '2023-08-25 23:01:43');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
