-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 10:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_mangement`
--

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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_Id` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phone` varchar(255) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_departments` varchar(255) DEFAULT NULL,
  `emp_position` varchar(255) DEFAULT NULL,
  `emp_salary` decimal(10,2) DEFAULT NULL,
  `emp_joining_date` date DEFAULT NULL,
  `emp_timing` varchar(255) DEFAULT NULL,
  `emp_total_leaves` varchar(255) NOT NULL DEFAULT '15',
  `emp_total_taken` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_Id`, `emp_name`, `emp_email`, `emp_phone`, `emp_address`, `emp_departments`, `emp_position`, `emp_salary`, `emp_joining_date`, `emp_timing`, `emp_total_leaves`, `emp_total_taken`, `created_at`, `updated_at`) VALUES
(1, 7, 'Cody Drake', 'kagivepulo@mailinator.com', '03118246767', 'Dicta laudantium vo', 'Fugiat ex rerum par', 'Aut quia voluptatem', 991689.00, '2025-07-17', 'Aliqua Explicabo S', '15', '0', '2025-07-17 02:17:29', '2025-07-17 02:17:29');

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
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_07_17_044149_create_employees_table', 2);

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
('5pYuCcIp1KdqwO9DCUlGqIc2oa5pdcvaa8nVTUio', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTjBLejRycFZvZ2tEUmhUa2lJdDdhYU9JaXZzSzdBWHRzMlFrRjRTNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2NzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzUyNzI2OTc1O31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4MjoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYy9hZG1pbi9yZWdpc3RlciI7fX0=', 1752731956),
('a8pIH3TaK1mTQH9gVLbGHg9wxbsOLgnHGDKdT4iV', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTWFzZ3VwTzFiVHpYQ1c1SmRDT0hKRUtQSzFQQ1NLUzRDajJCNGFvbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2NzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjgzOiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljL2FkbWluL2VtcGxveWVlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzUyNzMyNTY3O319', 1752737399),
('fpKiYezTC8hPHk5HYPBQcyjNTof287CK0pcZWKM7', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMmxCVGZ0b3A0YktRYWFKQ0RHNnZiSzA0TmNPUGJJcEd4WGhRY2pNMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2NzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjczOiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTI3Mzg0ODQ7fX0=', 1752739027),
('FUzTO018U6F3st5CK8oUtQ2ZtqivOZlEkiNXGS3K', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU091RlZnY3lteUlPa0FQVDV3Yks2aXpQS0owQWR4SlI2SmJFMnMzdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2NzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjczOiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTI3MzIxOTE7fX0=', 1752732191),
('fzwLac1y27JSUzoxV4CsDPY3UloWCRbuxQRNGkDK', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZDdzYjlFbzdNVWRYajFscW1tZHFsTmhZVVdmSURXV1hVV1lQT25GWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3MzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYy9hZG1pbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjY3OiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1752732539),
('iisioHrjUaFJAV1Anqn163HmVvVDFFUMEUm2Pj3R', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibjV3Qk5oQlRQQUQxaFhJa0VrcEE0UjNjaWY5Skd2RHJEYWNMcjNkQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752738436),
('kBC71u5enLA3EKQgVjcwa96KpUeJFlZi5zyPAYRA', 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQWxucTZNeFNlWjhaWTBET2p3V2RGWHFlamlQcklGYjFuVXBKVE9FViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo4MjoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYy9hZG1pbi9yZWdpc3RlciI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjY3OiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTI3MzIwNzQ7fX0=', 1752732075),
('wBcLwkrs9TfsSHpo2NgwzXit5JZnStoAUymc9GSh', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRGlrYkpIUGlxY25VbGQ0b3dYbml5ZGN3RHoxMnk3OTA5Y3J1SHJseSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3MzoiaHR0cDovL2xvY2FsaG9zdC9iaWxhbC9sYXJhdmVsL3NtYXJ0X2xlYXZlX21hbmFnZW1lbnRfc3lzdGVtL3B1YmxpYy9hZG1pbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjczOiJodHRwOi8vbG9jYWxob3N0L2JpbGFsL2xhcmF2ZWwvc21hcnRfbGVhdmVfbWFuYWdlbWVudF9zeXN0ZW0vcHVibGljL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTI3MzIzMTY7fX0=', 1752732316),
('ws04lJzqu5Yfre9xSshX1KYKKguHOXB2EETksyYA', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiREFjSHdTTzZlQ2pySFJYMDVIUkxwbHVla01hOXFSY1NNY2lramNpTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752738436);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Utype` varchar(255) NOT NULL DEFAULT 'EMP' COMMENT 'EMP FOR EMPOLYEE AND ADM FOR ADMIN ',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `Utype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bilal Khan', 'bilalkhan4841o@gmail.com', 'ADM', NULL, '$2y$12$84ybNX6xsvRkuIJ7CsIoku1i2pw5O/WamRaxY5IJvPG480MoRxUsy', NULL, '2025-07-16 02:48:23', '2025-07-16 02:48:23'),
(2, 'Bilal Khan', 'admin2@gmail.com', 'EMP', NULL, '$2y$12$QCB.7466MzOLFTeuHXN/xefneBbsEsoaT4JgA2lcjRLrD3MsZm4vi', NULL, '2025-07-16 02:48:59', '2025-07-16 02:48:59'),
(3, 'Bilal Khan', 'agentbillu2@gmail.com', 'EMP', NULL, '$2y$12$BJTNF0lgg4PwHA5k7paSRuGaGhAxSjJAo2Dx8sgFfZR7jlhvvcVC2', NULL, '2025-07-16 03:12:35', '2025-07-16 03:12:35'),
(4, 'user1', 'uesr1@gmail.com', 'EMP', NULL, '$2y$12$j5b6pPuse9SIghpcwA5QwOaIVIlfljRFvLNo3A6mJxiCZgYDHJ2EO', NULL, '2025-07-16 04:49:03', '2025-07-16 04:49:03'),
(5, 'user2', 'user2@gmail.com', 'EMP', NULL, '$2y$12$H5UE8OMRIdaQzZVG.t/DL.F0rlca3BFeJIwZBY.HmqEepASs8TABC', NULL, '2025-07-17 00:59:15', '2025-07-17 00:59:15'),
(6, 'user3', 'user3@gmail.com', 'EMP', NULL, '$2y$12$Ngk/PrKcWBwc1OrHLgB56e9daL3tb3Xvsgr3p56YZl1WZtQMal.Oy', NULL, '2025-07-17 01:08:58', '2025-07-17 01:08:58'),
(7, 'Cody Drake', 'kagivepulo@mailinator.com', 'EMP', NULL, '$2y$12$HQ1oGt53wN6O5w8QhA6PpeLvK73r2Ay6IqFJzywUgPt25UPbfzBga', NULL, '2025-07-17 02:17:29', '2025-07-17 02:17:29');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_user_id_unique` (`user_Id`),
  ADD UNIQUE KEY `employees_emp_email_unique` (`emp_email`),
  ADD UNIQUE KEY `employees_emp_phone_unique` (`emp_phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_Id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
