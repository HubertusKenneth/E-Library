-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2025 at 04:00 PM
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
-- Database: `ELibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `year`, `genre`, `description`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Avengers: The Ultimate Guide', 'DK Publishing', 'Dorling Kindersley', '2012', 'Superhero', 'A visual guide to the Avengers team and its members.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(2, 'Iron Man: Extremis', 'Warren Ellis', 'Marvel Comics', '2005', 'Comic', 'The story arc that redefined Iron Man for the modern age.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(3, 'Captain America: Winter Soldier', 'Ed Brubaker', 'Marvel Comics', '2006', 'Comic', 'Captain America uncovers the truth about Bucky Barnes.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(4, 'Thor: God of Thunder – The God Butcher', 'Jason Aaron', 'Marvel Comics', '2013', 'Comic', 'Thor faces the terrifying villain Gorr the God Butcher.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(5, 'The Infinity Gauntlet', 'Jim Starlin', 'Marvel Comics', '1991', 'Comic', 'Thanos wields the Infinity Gauntlet to reshape the universe.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(6, 'Avengers: Disassembled', 'Brian Michael Bendis', 'Marvel Comics', '2004', 'Comic', 'The Avengers face their darkest hour as the team falls apart.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(7, 'Hawkeye: My Life as a Weapon', 'Matt Fraction', 'Marvel Comics', '2012', 'Comic', 'Follow Hawkeye’s solo adventures outside the Avengers.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(8, 'Black Widow: Forever Red', 'Margaret Stohl', 'Marvel Press', '2015', 'Novel', 'A YA novel exploring Black Widow’s past and her new ally.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(9, 'Doctor Strange: The Oath', 'Brian K. Vaughan', 'Marvel Comics', '2007', 'Comic', 'Doctor Strange investigates a conspiracy against the medical world.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(10, 'Avengers vs. X-Men', 'Various', 'Marvel Comics', '2012', 'Comic', 'The Avengers and the X-Men clash over the fate of the Phoenix Force.', NULL, '2025-09-22 12:56:42', '2025-09-22 12:56:42'),
(11, 'Gw Ganteng', 'Hubertus Kenneth Alfragisa', 'HKA', '2005', 'Love Yourself', 'Anjay', 'covers/DitDpSeg9t1EDE1kAq0zCUOFQeCrNx7BB11JEctB.jpg', '2025-09-23 08:57:36', '2025-09-23 08:57:36'),
(12, 'Halo', 'Hubertus Kenneth Alfragisa', 'HKA', '2000', 'Love Yourself', '-', 'covers/zliMYSulKUsy5bXJDOjETkKaL6jvhYBTpjg49GWl.png', '2025-10-08 02:16:11', '2025-10-08 02:16:11'),
(13, 'Hubertussssssss', 'Hubertus Kenneth Alfragisa', 'HKA', '2005', 'Love Yourself', 'Wow', 'covers/A2NBSbRXXIYLHDGQk0jOp2FfMP9jTQgW0UJ0G0Nb.png', '2025-10-08 02:25:52', '2025-10-08 02:25:52'),
(14, 'Shinchan', 'Yoshito Usui', 'ComicsOne', '1990', 'Comedy', NULL, 'covers/adyIgaDMQk3hbvJtIPbPKPcZFRf10EVhmWS2NnYu.jpg', '2025-10-08 06:44:25', '2025-10-08 06:44:25');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2025-09-22 08:36:24', '2025-09-22 08:36:24'),
(7, 2, 2, '2025-09-22 08:36:26', '2025-09-22 08:36:26'),
(8, 2, 3, '2025-09-22 09:07:24', '2025-09-22 09:07:24'),
(11, 1, 2, '2025-09-30 20:02:46', '2025-09-30 20:02:46');

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
(4, '2025_09_22_110241_create_books_table', 1),
(5, '2025_09_22_110313_create_favorites_table', 1),
(6, '2025_09_23_134654_add_role_to_users_table', 2),
(7, '2025_10_08_100000_create_user_activities_table', 3);

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
('asTz1wzlKseqEQfYIodMyk3oRIgdpiagFj66N4za', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNWRkdXJZNFM3cnFqejVmbGRBOXRoZlVsWTRjNXBzWG5EV1J3S2prQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1759931991);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Test01', 'test@test.com', NULL, '$2y$12$r2sA1QGAERzQ8Yh1QTsZU.yVsPcCI.J78pdcgy2xfBzDAQt7cWB6u', NULL, '2025-09-22 05:17:28', '2025-09-22 05:17:28', 'user'),
(2, 'Kenn', 'hubertusk26@gmail.com', NULL, '$2y$12$2buWkdYn1GsLWC.vfAgNuuaZd0JOc8iv9EWjR/xCkFt.gdBLXbtSC', NULL, '2025-09-22 08:36:04', '2025-09-22 08:36:04', 'user'),
(3, 'admin', 'admin@library.com', NULL, '$2y$12$KunmWfafjGUxphZpPDtxOuCTuswvEfsNhdsP3mAjq9iUfJkd0lATS', NULL, '2025-09-22 09:51:10', '2025-10-08 06:59:19', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `action`, `model_type`, `model_id`, `description`, `properties`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, 'profile_update', 'App\\Models\\User', 1, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:35:00', '2025-10-08 06:35:00'),
(2, 3, 'login', NULL, NULL, 'User logged in', '{\"method\":\"POST\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/login\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:42:45', '2025-10-08 06:42:45'),
(3, 3, 'book_create', 'App\\Models\\Book', NULL, 'Created new book', '{\"method\":\"POST\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/books\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:44:25', '2025-10-08 06:44:25'),
(4, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:51:35', '2025-10-08 06:51:35'),
(5, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:51:37', '2025-10-08 06:51:37'),
(6, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:51:45', '2025-10-08 06:51:45'),
(7, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:52:03', '2025-10-08 06:52:03'),
(8, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:53:05', '2025-10-08 06:53:05'),
(9, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:53:36', '2025-10-08 06:53:36'),
(10, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:53:48', '2025-10-08 06:53:48'),
(11, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:54:52', '2025-10-08 06:54:52'),
(12, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:54:53', '2025-10-08 06:54:53'),
(13, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:54:57', '2025-10-08 06:54:57'),
(14, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:57:10', '2025-10-08 06:57:10'),
(15, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:57:11', '2025-10-08 06:57:11'),
(16, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:57:12', '2025-10-08 06:57:12'),
(17, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:57:26', '2025-10-08 06:57:26'),
(18, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:03', '2025-10-08 06:59:03'),
(19, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:05', '2025-10-08 06:59:05'),
(20, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:08', '2025-10-08 06:59:08'),
(21, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:16', '2025-10-08 06:59:16'),
(22, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:19', '2025-10-08 06:59:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_book_id_unique` (`user_id`,`book_id`),
  ADD KEY `favorites_book_id_foreign` (`book_id`);

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
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_created_at_index` (`user_id`,`created_at`),
  ADD KEY `user_activities_action_created_at_index` (`action`,`created_at`),
  ADD KEY `user_activities_model_type_model_id_index` (`model_type`,`model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
