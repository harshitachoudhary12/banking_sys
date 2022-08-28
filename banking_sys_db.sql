-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 09:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_sys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit_stmt`
--

CREATE TABLE `deposit_stmt` (
  `id` int(110) NOT NULL,
  `user_id` int(110) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `date_time` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `sender_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_stmt`
--

INSERT INTO `deposit_stmt` (`id`, `user_id`, `amt`, `date_time`, `status`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 3, '10000', '2022-08-27 09:49:16', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(2, 3, '10000', '2022-08-27 09:51:49', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(3, 3, '10000', '2022-08-27 09:52:26', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(4, 3, '10000', '2022-08-27 10:00:12', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(5, 3, '10000', '2022-08-27 10:00:50', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(6, 3, '10000', '2022-08-27 10:02:21', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(7, 3, '10000', '2022-08-27 10:03:40', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(8, 3, '10000', '2022-08-27 10:05:44', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(9, 3, '10000', '2022-08-27 10:07:07', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(10, 3, '10000', '2022-08-27 10:08:01', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(11, 3, '10000', '2022-08-27 10:20:35', 'pending', NULL, '2022-08-27 14:05:40', NULL),
(12, 3, '10000', '2022-08-27 10:28:41', 'success', NULL, '2022-08-27 14:05:40', '2022-08-27 05:03:49'),
(13, 3, '10', '2022-08-28 12:29:03', 'pending', NULL, '2022-08-28 12:29:04', NULL),
(14, 3, '10', '2022-08-28 12:34:46', 'pending', NULL, '2022-08-28 12:34:46', NULL),
(15, 3, '100', '2022-08-28 12:34:54', 'pending', NULL, '2022-08-28 12:34:54', NULL),
(16, 3, '100', '2022-08-28 12:38:48', 'pending', NULL, '2022-08-28 12:38:48', NULL),
(17, 3, '100', '2022-08-28 12:39:15', 'pending', NULL, '2022-08-28 12:39:15', NULL),
(18, 4, '100', '2022-08-28 12:42:30', 'success', NULL, '2022-08-28 12:43:00', '2022-08-28 07:13:00'),
(19, 3, '102', '2022-08-28 12:44:09', 'pending', NULL, '2022-08-28 12:44:10', NULL),
(20, 3, '102', '2022-08-28 12:47:07', 'success', NULL, '2022-08-28 19:31:33', NULL),
(21, 6, '100', '2022-08-28 19:21:35', 'success', 3, '2022-08-28 19:21:35', NULL),
(22, 6, '100', '2022-08-28 19:21:58', 'success', 3, '2022-08-28 19:21:58', NULL),
(23, 6, '100', '2022-08-28 19:23:00', 'success', 3, '2022-08-28 19:23:00', NULL),
(24, 6, '100', '2022-08-28 19:23:44', 'success', 3, '2022-08-28 19:23:44', NULL),
(25, 6, '100', '2022-08-28 19:24:17', 'success', 3, '2022-08-28 19:24:17', NULL),
(26, 6, '100', '2022-08-28 19:25:00', 'success', 3, '2022-08-28 19:25:00', NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `api_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_role`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Harshita Choudhary 12', 'harshitachoudhary12@gmail.com', NULL, '$2y$10$tvZF7lVb.qjMXA4YeZARyehFvn7DmQ7sS0SZ1Bj..k8cKGHVeQbsy', NULL, 1, '', '2022-08-26 05:46:13', '2022-08-27 15:17:19'),
(3, 'test1', 'test1@gmail.com', '2022-08-26 21:47:49', '$2y$10$GClaPOlQ9tTGmNSJzP5AvORQYQOHA.pPGrMs1xl1Md4fqkMe283YO', NULL, 4, '', '2022-08-26 14:19:22', '2022-08-27 15:17:01'),
(4, 'test2', 'test2@gmail.com', NULL, '$2y$10$bxV0.Y37vTC0Qy2LaEIwWedvEYAHoRsE3u2AcShoimzwX.hYLNEDy', NULL, 3, '', NULL, '2022-08-27 15:16:44'),
(5, 'test3', 'test3@gmail.com', NULL, '$2y$10$tvZF7lVb.qjMXA4YeZARyehFvn7DmQ7sS0SZ1Bj..k8cKGHVeQbsy', 'PshH4nOdFAE4yjy3TZdPpXhYrkTK1cgaXh6oH4IRaFSDyb1ZgV9yMhiUP3Hl', NULL, '', '2022-08-27 16:26:23', '2022-08-27 16:26:23'),
(6, 'api test user', 'test5@gmail.com', NULL, '$2y$10$qsPjABByozCVA.8Q0z.TW.rWKWcvDLtAvpkWsAM0NtIDmEqDPcffO', NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2Jhbmtpbmdfc3lzdGVtX2pvYl90YXNrL2FwaS9sb2dpbl91c2VyIiwiaWF0IjoxNjYxNzEyOTg1LCJleHAiOjE2NjE3MTY1ODUsIm5iZiI6MTY2MTcxMjk4NSwianRpIjoiRW80M3RTUzFiODl4b080SyIsInN1YiI6IjYiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.3UQo854-AJQ5RHEI02K7leySldVk1wCF8qkoL4R8haI', NULL, '2022-08-28 13:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2022-08-26 10:58:59'),
(3, 'support', NULL, NULL),
(4, 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_stmt`
--

CREATE TABLE `withdraw_stmt` (
  `id` int(110) NOT NULL,
  `user_id` int(110) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `receiver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw_stmt`
--

INSERT INTO `withdraw_stmt` (`id`, `user_id`, `amt`, `date_time`, `status`, `receiver_id`, `created_at`, `updated_at`) VALUES
(1, 3, '1000', '2022-08-27 14:05:00', 1, NULL, '2022-08-27 14:30:20', '2022-08-27 09:00:20'),
(2, 3, '2000', '2022-08-27 14:07:40', 0, NULL, '2022-08-27 14:07:40', NULL),
(3, 3, '2000', '2022-08-27 14:08:07', 0, NULL, '2022-08-27 14:08:07', NULL),
(4, 3, '102', '2022-08-28 13:26:58', 0, NULL, '2022-08-28 13:26:58', NULL),
(5, 3, '1020000', '2022-08-28 13:36:52', 0, NULL, '2022-08-28 13:36:52', NULL),
(6, 3, '1020000', '2022-08-28 13:37:22', 0, NULL, '2022-08-28 13:37:22', NULL),
(8, 3, '100', '2022-08-28 19:25:00', 1, 6, '2022-08-28 19:25:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit_stmt`
--
ALTER TABLE `deposit_stmt`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_stmt`
--
ALTER TABLE `withdraw_stmt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit_stmt`
--
ALTER TABLE `deposit_stmt`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw_stmt`
--
ALTER TABLE `withdraw_stmt`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
