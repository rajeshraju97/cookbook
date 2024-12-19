-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 05:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$jgyY9./OE1tZkkzNM0v6I..CRZjIHjUsj5odXUkPzTYKBRcX7rNkG', '2024-12-11 04:47:29', '2024-12-11 04:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_type_id` bigint(20) UNSIGNED NOT NULL,
  `dish_name` varchar(255) NOT NULL,
  `dish_image` varchar(255) NOT NULL,
  `dish_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `dish_type_id`, `dish_name`, `dish_image`, `dish_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chicken Curry (Kodi Kora)', '1734085706.jpg', 'This is the tastiest chicken curry you can make at how with our finest ingredients for as many members you can want.', '2024-12-13 03:44:58', '2024-12-13 04:58:26'),
(3, 4, 'Chicken Briyani', '1734431288.png', 'CHICKEN BRIYANI', '2024-12-17 04:58:08', '2024-12-17 04:58:08'),
(4, 4, 'Mutton Briyani', '1734431811.png', 'mutton briyani', '2024-12-17 05:06:51', '2024-12-17 05:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `dish_types`
--

CREATE TABLE `dish_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dish_types`
--

INSERT INTO `dish_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'curries', '2024-12-13 00:46:13', '2024-12-13 01:04:17'),
(4, 'Rice Dishes', '2024-12-13 01:08:35', '2024-12-13 01:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ingredients`)),
  `no_of_members` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `dish_id`, `ingredients`, `no_of_members`, `created_at`, `updated_at`) VALUES
(1, 3, '{\"Rice\":{\"quantity\":\"1\",\"unit\":\"1 kg\",\"price\":\"150\",\"type\":\"fixed\"}}', 10, '2024-12-17 07:41:44', '2024-12-17 07:41:44'),
(2, 4, '{\"Rice\":{\"quantity\":\"1\",\"unit\":\"1 kg\",\"price\":\"150\",\"type\":\"fixed\"}}', 10, '2024-12-17 07:42:03', '2024-12-17 07:42:03'),
(3, 1, '{\n    \"Chicken\": {\n        \"unit\": \"1 kg\",\n        \"quantity\": 1,\n        \"price\": 150,\n        \"type\": \"variable\"\n    },\n    \"Onions\": {\n        \"unit\": \"300 g\",\n        \"quantity\": 1,\n        \"price\": 25,\n        \"type\": \"variable\"\n    },\n    \"Tomatoes\": {\n        \"unit\": \"200 g\",\n        \"quantity\": 1,\n        \"price\": 10,\n        \"type\": \"variable\"\n    },\n    \"Ginger-garlic paste\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 10,\n        \"type\": \"variable\"\n    },\n    \"Green chilies\": {\n        \"unit\": \"30 g\",\n        \"quantity\": 1,\n        \"price\": 10,\n        \"type\": \"variable\"\n    },\n    \"Curry leaves\": {\n        \"unit\": \"15 g\",\n        \"quantity\": 1,\n        \"price\": 10,\n        \"type\": \"variable\"\n    },\n    \"Coriander powder\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 5,\n        \"type\": \"fixed\"\n    },\n    \"Cumin powder\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 5,\n        \"type\": \"fixed\"\n    },\n    \"Red chili powder\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 5,\n        \"type\": \"fixed\"\n    },\n    \"Turmeric powder\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 5,\n        \"type\": \"fixed\"\n    },\n    \"Garam masala\": {\n        \"unit\": \"1 pack\",\n        \"quantity\": 1,\n        \"price\": 5,\n        \"type\": \"fixed\"\n    },\n    \"Coconut milk\": {\n        \"unit\": \"200 ml\",\n        \"quantity\": 1,\n        \"price\": 50,\n        \"type\": \"variable\"\n    },\n    \"Coriander leaves\": {\n        \"unit\": \"20 g\",\n        \"quantity\": 1,\n        \"price\": 10,\n        \"type\": \"variable\"\n    }\n}\n', 10, '2024-12-17 07:42:24', '2024-12-17 07:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_05_050729_create_ingredients_table', 2),
(5, '2024_12_05_052335_add_no_members_to_ingredients_table', 3),
(6, '2024_12_05_060430_create_orders_table', 4),
(7, '2024_12_11_063517_create_dishes_table', 5),
(8, '2024_12_11_101031_create__admin_table', 5),
(9, '2024_12_11_101031_create_admin_table', 6),
(10, '2024_12_11_101031_create_admins_table', 7),
(11, '2024_12_13_043017_create_dish_types_table', 8),
(12, '2024_12_13_071154_create_dishes_table', 9),
(13, '2024_12_13_072548_add_dish_description_table', 10),
(15, '2024_12_13_112442_create_ingredients_table', 11),
(16, '2024_12_18_091839_create_user_addresses_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ingredients`)),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('Cart','Pending Payment','Processing','Completed','Cancelled') NOT NULL DEFAULT 'Cart',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `dish_id`, `ingredients`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, 1, '[{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Chicken\",\"unit\":\"1 kg\",\"scaled_price\":\"150\"},{\"selected\":\"1\",\"quantity\":\"2.0\",\"name\":\"Onions\",\"unit\":\"300 g\",\"scaled_price\":\"25\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Tomatoes\",\"unit\":\"200 g\",\"scaled_price\":\"10\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Ginger-garlic paste\",\"unit\":\"1 pack\",\"scaled_price\":\"10\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Green chilies\",\"unit\":\"30 g\",\"scaled_price\":\"10\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Curry leaves\",\"unit\":\"15 g\",\"scaled_price\":\"10\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Coriander powder\",\"unit\":\"1 pack\",\"scaled_price\":\"5\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Cumin powder\",\"unit\":\"1 pack\",\"scaled_price\":\"5\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Red chili powder\",\"unit\":\"1 pack\",\"scaled_price\":\"5\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Turmeric powder\",\"unit\":\"1 pack\",\"scaled_price\":\"5\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Garam masala\",\"unit\":\"1 pack\",\"scaled_price\":\"5\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Coconut milk\",\"unit\":\"200 ml\",\"scaled_price\":\"50\"},{\"selected\":\"1\",\"quantity\":\"1\",\"name\":\"Coriander leaves\",\"unit\":\"20 g\",\"scaled_price\":\"10\"}]', 325.00, 'Cart', '2024-12-18 01:58:31', '2024-12-18 01:58:31'),
(6, 5, 3, '[{\"selected\":\"1\",\"quantity\":\"2.5\",\"name\":\"Rice\",\"unit\":\"1 kg\",\"scaled_price\":\"150\"}]', 375.00, 'Cart', '2024-12-18 01:59:01', '2024-12-18 01:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KOnW5eE2EpN2yTV0tApMTrBXDUvYpeDMnc94EhcR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnFidGZGc2c0WHdWd3FxOXJUVTZ6VDM2eVpQU2JjVGpUZDg4cmVBTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2dldC1pbmdyZWRpZW50cy8xMDEvMTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUxOiJsb2dpbl91c2VyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1734007484),
('zFjdALyLy9AeaeHkZcAJnvXjj76mb3pJqhwxIBP9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUdWanRPZGlXN2lZR3BmajlTYVpjeU94dGRsR1F6akFZZENFamZQaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734064024);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `user_level` varchar(256) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `mobile`, `user_level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'yeswanth Malla', 'user1', 'sandy@gamil.com', '7702619719', 'user', NULL, '$2y$12$YSpSRcJtMEYv1aUYzhkGrO/gYYfL19KvOAMCnKBQDrz4G3TnnnVF.', NULL, '2024-12-11 02:38:12', '2024-12-11 02:38:12'),
(4, 'test2', 'test2', 'test2@gmail.com', '1234567890', 'user', NULL, '$2y$12$dEpazElISKu.IXYKKwfc4eQNgc7syYqkmfMv5mnUUmeAJal7RNcdO', NULL, '2024-12-11 02:47:21', '2024-12-11 02:47:21'),
(5, 'test3', 'test3', 'test3@gmail.com', '7788996655', 'user', NULL, '$2y$12$DV4ZoVmu4Ztvd77hEUxVT.I7ZvaSE4T24QwYigy6HSPmIJVmP56ma', NULL, '2024-12-11 02:51:57', '2024-12-11 02:51:57'),
(6, 'test4', 'test4', 'test4@gmail.com', '2345678901', 'user', NULL, '$2y$12$B33.CQoBNX6tjsCOx23VyOOrzlWB5K6D6vUO4E1y8lGBtcvzPIm8G', NULL, '2024-12-11 04:22:00', '2024-12-11 04:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `label`, `address_line_1`, `address_line_2`, `city`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 5, 'Home', 'Sc colony', 'Thimmarajupeta,Thimmarajupeta post,Atchuthapuram Mandal', 'Vishakapatnam', '531011', '2024-12-18 04:29:36', '2024-12-18 04:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_dish_type_id_foreign` (`dish_type_id`);

--
-- Indexes for table `dish_types`
--
ALTER TABLE `dish_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_dish_id_foreign` (`dish_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_dish_id_foreign` (`dish_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dish_types`
--
ALTER TABLE `dish_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_dish_type_id_foreign` FOREIGN KEY (`dish_type_id`) REFERENCES `dish_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
