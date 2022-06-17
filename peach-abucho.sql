-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 09, 2022 at 11:44 PM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peach`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, '動物', '2022-05-15 12:28:25', '2022-05-15 12:28:25');
(1, '昔話', '2022-05-16 12:28:25', '2022-05-15 12:28:25');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_14_035611_create_book_categories_table', 1),
(6, '2022_04_15_105109_create_roles_book_categories_table', 1),
(7, '2022_04_15_144530_create_roles_table', 1),
(8, '2022_04_15_163621_create_recruit_role_table', 1),
(9, '2022_04_16_123323_create_recruits_table', 1),
(10, '2022_04_20_052411_create_offer_table', 1),
(11, '2022_04_20_062455_create_offer_recruit_role_table', 1),
(12, '2022_04_28_232147_add_recruit_id_column_to_recruit_role_table', 1),
(14, '2022_05_03_221818_create_rooms_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `recruit_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_recruit_role`
--

CREATE TABLE `offer_recruit_role` (
  `id` bigint UNSIGNED NOT NULL,
  `offer_id` bigint UNSIGNED NOT NULL,
  `recruit_role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruits`
--

CREATE TABLE `recruits` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `budget` int NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_deadline` datetime NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruit_role`
--

CREATE TABLE `recruit_role` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `reward` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recruit_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `roles_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'イラスト作成', '2022-05-15 13:00:18', '2022-05-15 13:00:18'),
(2, 1, 'イラスト・本文の配置', '2022-05-15 00:00:00', '2022-05-15 13:00:18'),
(3, 2, 'アイデア出し', '2022-05-15 13:01:08', '2022-05-15 13:01:08'),
(4, 2, 'コンセプト作り', '2022-05-15 13:01:08', '2022-05-15 13:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles_categories`
--

CREATE TABLE `roles_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_categories`
--

INSERT INTO `roles_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'デザイン', '2022-05-15 12:56:38', '2022-05-15 12:56:38'),
(2, '原稿', '2022-05-15 12:56:38', '2022-05-15 12:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `first_user_id` bigint UNSIGNED NOT NULL,
  `second_user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `first_user_id`, `second_user_id`, `created_at`, `updated_at`) VALUES
(13, 1, 3, '2022-06-06 07:59:34', '2022-06-06 07:59:34'),
(14, 2, 3, '2022-06-06 08:01:59', '2022-06-06 08:01:59'),
(15, 1, 2, '2022-06-06 08:44:31', '2022-06-06 08:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `room_user`
--

CREATE TABLE `room_user` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_user`
--

INSERT INTO `room_user` (`id`, `room_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'taeadf', '2022-06-06 05:44:15', '2022-06-06 05:44:15'),
(3, 14, 2, 'test', '2022-06-06 05:45:44', '2022-06-06 05:45:44'),
(4, 15, 1, 'to user id 2, from user id 1. room id:15.', '2022-06-06 07:25:27', '2022-06-06 07:25:27'),
(5, 14, 3, 'テスト room id:14, user_id:3.', '2022-06-08 09:49:57', '2022-06-06 09:49:57'),
(6, 15, 2, 'to user id 1, from user id 2.', '2022-06-06 09:51:23', '2022-06-06 09:51:23'),
(7, 14, 2, 'abuchoへ、任務が完了しました。', '2022-06-09 16:16:00', '2022-06-09 16:16:00'),
(11, 14, 2, 'See ya !', '2022-06-09 16:23:38', '2022-06-09 16:23:38'),
(27, 14, 2, 'Good bye !', '2022-06-09 17:18:20', '2022-06-09 17:18:20'),
(30, 14, 2, 'haha', '2022-06-09 17:23:12', '2022-06-09 17:23:12'),
(31, 14, 3, 'oh no !!!', '2022-06-09 17:24:17', '2022-06-09 17:24:17'),
(32, 15, 2, 'ya !', '2022-06-09 17:25:14', '2022-06-09 17:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'taguchi', 'yuma@example.com', NULL, '$2y$10$gUTEB6DYCnxDX2RrUSXN8Ozm/5UORSWRhuzmnACdXrDkyAsG9EHpi', 'HYkjwZDkjmUfIEsgnf0AUv9FLIHGGinlzB6kxZbL49ynKK97tu5vvxboX9RV', '2022-06-09 15:27:25', '2022-06-02 15:27:25'),
(2, 'syo', 'syo@example.com', NULL, '$2y$10$WKsfjSTqfbfgF6nZ2e4TNeDCjYejQ9eLFNNaFVrNwc4X3iFgbrG22', 'ZnIJIEUtV8xLfJhv3ItA5U8E2cUiyOHJITXhdi57TRQcfyDCwrLt1cIbA7Zr', '2022-06-04 01:17:10', '2022-06-04 01:17:10'),
(3, 'abucho', 'abucho@example.com', NULL, '$2y$10$071mb.kE.Fbm3J5I8C8WJ.wTP.sUWFU61rXwNT7ii8r4IhE0OHrF2', NULL, '2022-06-06 07:58:38', '2022-06-06 07:58:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_recruit_id_foreign` (`recruit_id`),
  ADD KEY `offers_user_id_foreign` (`user_id`);

--
-- Indexes for table `offer_recruit_role`
--
ALTER TABLE `offer_recruit_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_recruit_role_offer_id_foreign` (`offer_id`),
  ADD KEY `offer_recruit_role_recruit_role_id_foreign` (`recruit_role_id`);

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
-- Indexes for table `recruits`
--
ALTER TABLE `recruits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruits_user_id_foreign` (`user_id`),
  ADD KEY `recruits_category_id_foreign` (`category_id`);

--
-- Indexes for table `recruit_role`
--
ALTER TABLE `recruit_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruit_role_role_id_foreign` (`role_id`),
  ADD KEY `recruit_role_recruit_id_foreign` (`recruit_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_roles_category_id_foreign` (`roles_category_id`);

--
-- Indexes for table `roles_categories`
--
ALTER TABLE `roles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_first_user_id_foreign` (`first_user_id`),
  ADD KEY `rooms_second_user_id_foreign` (`second_user_id`);

--
-- Indexes for table `room_user`
--
ALTER TABLE `room_user`
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
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_recruit_role`
--
ALTER TABLE `offer_recruit_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruits`
--
ALTER TABLE `recruits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruit_role`
--
ALTER TABLE `recruit_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles_categories`
--
ALTER TABLE `roles_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_recruit_role`
--
ALTER TABLE `offer_recruit_role`
  ADD CONSTRAINT `offer_recruit_role_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offer_recruit_role_recruit_role_id_foreign` FOREIGN KEY (`recruit_role_id`) REFERENCES `recruit_role` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recruits`
--
ALTER TABLE `recruits`
  ADD CONSTRAINT `recruits_category_id_foreign` FOREIGN KEY (`book_category_id`) REFERENCES `book_categories` (`id`),
  ADD CONSTRAINT `recruits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recruit_role`
--
ALTER TABLE `recruit_role`
  ADD CONSTRAINT `recruit_role_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recruit_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_roles_category_id_foreign` FOREIGN KEY (`roles_category_id`) REFERENCES `roles_categories` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_first_user_id_foreign` FOREIGN KEY (`first_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_second_user_id_foreign` FOREIGN KEY (`second_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
