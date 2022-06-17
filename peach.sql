-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 15, 2022 at 01:02 PM
-- Server version: 8.0.28
-- PHP Version: 8.0.15
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '動物', '2022-05-15 12:28:25', '2022-05-15 12:28:25');
INSERT INTO `roles_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'デザイン', '2022-05-15 12:56:38', '2022-05-15 12:56:38'),
(2, '原稿', '2022-05-15 12:56:38', '2022-05-15 12:56:38');
INSERT INTO `roles` (`id`, `roles_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'イラスト作成', '2022-05-15 13:00:18', '2022-05-15 13:00:18'),
(2, 1, 'イラスト・本文の配置', '2022-05-15 00:00:00', '2022-05-15 13:00:18'),
(3, 2, 'アイデア出し', '2022-05-15 13:01:08', '2022-05-15 13:01:08'),
(4, 2, 'コンセプト作り', '2022-05-15 13:01:08', '2022-05-15 13:01:08');
-- ALTER TABLE `categories`
--   ADD PRIMARY KEY (`id`);
-- ALTER TABLE `failed_jobs`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);
-- ALTER TABLE `migrations`
--   ADD PRIMARY KEY (`id`);
-- ALTER TABLE `offers`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `offers_recruit_id_foreign` (`recruit_id`),
--   ADD KEY `offers_user_id_foreign` (`user_id`);
-- ALTER TABLE `password_resets`
--   ADD KEY `password_resets_email_index` (`email`);
-- ALTER TABLE `personal_access_tokens`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
--   ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);
-- ALTER TABLE `recruits`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `recruits_user_id_foreign` (`user_id`),
--   ADD KEY `recruits_category_id_foreign` (`category_id`);
-- ALTER TABLE `roles`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `roles_roles_categories_id_foreign` (`roles_categories_id`);
-- ALTER TABLE `roles_categories`
--   ADD PRIMARY KEY (`id`);
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `users_email_unique` (`email`);
-- ALTER TABLE `categories`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- ALTER TABLE `failed_jobs`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
-- ALTER TABLE `migrations`
--   MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
-- ALTER TABLE `offers`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
-- ALTER TABLE `personal_access_tokens`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
-- ALTER TABLE `recruits`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
-- ALTER TABLE `roles`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
-- ALTER TABLE `roles_categories`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
-- ALTER TABLE `users`
--   MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- ALTER TABLE `offers`
--   ADD CONSTRAINT `offers_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruits` (`id`),
--   ADD CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
-- ALTER TABLE `recruits`
--   ADD CONSTRAINT `recruits_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
--   ADD CONSTRAINT `recruits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
-- ALTER TABLE `roles`
--   ADD CONSTRAINT `roles_roles_categories_id_foreign` FOREIGN KEY (`roles_categories_id`) REFERENCES `roles_categories` (`id`);
-- COMMIT;
