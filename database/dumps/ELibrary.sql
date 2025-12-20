-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2025 at 08:23 PM
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `pdf_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `year`, `genre`, `description`, `cover`, `created_at`, `updated_at`, `pdf_path`, `pdf_name`) VALUES
(20, 'Art in Focus', 'Jean Morman Unsworth', 'Glencoe/McGraw-Hill', '2000', 'Art', 'Art in focus: Aesthetics, criticism, history, studio.', 'covers/ArtInFocus_image.jpg', NULL, NULL, 'pdfs/ArtInFocus_Gene_A_Mittler.pdf', 'ArtInFocus_Gene_A_Mittler.pdf'),
(21, 'Contemporary Painting', 'Suzanne Hudson', 'Thames & Hudson', '2021', 'Art', 'Renowned critic and art historian Suzanne Hudson offers an intelligent and original survey of the subject: a rigorous critical snapshot that brings together more than 250 renowned artists from around the world, whose ideas and aesthetics characterize the painting of our time.', 'covers/ContemporaryPainting_image.jpg', NULL, NULL, 'pdfs/ContemporaryPainting_Suzanne_Hudson.pdf', 'ContemporaryPainting_Suzanne_Hudson.pdf'),
(22, 'Patterns', 'Drusilla Cole', 'Laurence King Publishing', '2009', 'Art', 'This stunning picture book chronicles one hundred years of classic patterns, featuring designs in a wide variety of styles, art movements, and countries of origin to give an overview of surface design from the beginning of the last century to the present day.', 'covers/Patterns_image.jpg', NULL, NULL, 'pdfs/Patterns_drusilla_cole.pdf', 'Patterns_drusilla_cole.pdf'),
(23, 'Stages Of Rot', 'Linnea Sterte', 'Koguchi Press', '2017', 'Art', 'An alien desert comes to life around the body of a dying whale. Animals, insects, and ancient peoples scramble for its remains, making their homes among its bones, struggling through a millennia-long process of decay.', 'covers/StagesOfRot_image.jpg', NULL, NULL, 'pdfs/StagesOfRot_Linnea_Sterte.pdf', 'StagesOfRot_Linnea_Sterte.pdf'),
(24, 'The Wrong Shoes', 'Tom Percival', 'Simon & Schuster Children\'s UK', '2025', 'Art', 'Will has the wrong shoes – he\'s always known it but doesn\'t know how to change it. Navigating the difficulties of home and school when you feel you stick out is tough, but finding confidence with the help and empathy of friends can be all you need to see the way.', 'covers/TheWrongShoes_image.jpg', NULL, NULL, 'pdfs/TheWrongShoes_Tom_Percival.pdf', 'TheWrongShoes_Tom_Percival.pdf'),
(25, 'Disney\'s World', 'Leonard Mosley', 'Stein and Day', '1985', 'Biography', 'Draws an intimate portrait of the man whose imagination spawned a family of classic cartoon characters, a powerful film studio, and an entertainment empire.', 'covers/DisneysWorldABiography_image.jpg', NULL, NULL, 'pdfs/DisneysWorldABiography_LeonardMosley.pdf', 'DisneysWorldABiography_LeonardMosley.pdf'),
(26, 'Gas Man', 'Colin Black', 'HarperCollins Publishers', '2022', 'Biography', 'Razor-sharp and forthright, Gas Man is a disarming and frequently hilarious account of life in one of the most fascinating and thrilling professions at medicine\'s frontline.', 'covers/GasMan_image.jpg', NULL, NULL, 'pdfs/GasMan_ColinBlack.pdf', 'GasMan_ColinBlack.pdf'),
(27, 'Honourable Man My Life In The CIA', 'William Colby', 'Simon and Schuster', '1978', 'Biography', 'The veteran intelligence agent and former CIA director recalls the events, developments, and people of his career, describes the CIA\'s organization, workings, and procedures, and profiles famous and hazy world figures.', 'covers/HonourableManMyLifeInTheCIA_image.jpg', NULL, NULL, 'pdfs/HonourableManMyLifeInTheCIA_WilliamColby.pdf', 'HonourableManMyLifeInTheCIA_WilliamColby.pdf'),
(28, 'Leap Year', 'Helen Russell', 'Hodder & Stoughton', '2017', 'Biography', 'How to make big decisions, be more resilient, and change your life for good. Having spent the last few years in Denmark uncovering the secrets of the happiest country in the world...', 'covers/LeapYear_image.jpg', NULL, NULL, 'pdfs/LeapYear_HelenRussell.pdf', 'LeapYear_HelenRussell.pdf'),
(29, 'The Business Of Being Me', 'Issa Rae', 'Brilliance Publishing / Amazon Original Stories', '2025', 'Biography', 'In this funny and inspiring essay about ambition, persistence, self-discovery, and the thrilling—if unpredictable—business of creativity, Issa Rae charts her aspirational journey of finding her voice and shaping it into a groundbreaking career.', 'covers/TheBusinessOfBeingMe_image.jpg', NULL, NULL, 'pdfs/TheBusinessOfBeingMe_IssaRae.pdf', 'TheBusinessOfBeingMe_IssaRae.pdf'),
(30, 'Christmas At Hogwarts', 'JK Rowling', 'Scholastic/Bloomsbury', '2024', 'Fantasy', 'With text from one of the most beloved moments in J.K. Rowling\'s bestselling original novel, Harry Potter and the Philosopher\'s Stone... this new illustrated book promises to be the perfect festive treat.', 'covers/ChristmasAtHogwarts_image.jpg', NULL, NULL, 'pdfs/ChristmasAtHogwarts_JK_Rowling.pdf', 'ChristmasAtHogwarts_JK_Rowling.pdf'),
(31, 'Dragon Planet', 'Dan Wells', 'Audible Studios', '2019', 'Fantasy', 'Zero and Nyx are stranded on an unknown planet with no way to communicate, being chased by thieves, and with another storm bearing down on them.', 'covers/DragonPlanetCover.png', NULL, NULL, 'pdfs/DragonPlanet_DanWells.pdf', 'DragonPlanet_DanWells.pdf'),
(32, 'Flammen Sturm', 'Juliette Cross', 'Dark Intense', '2025', 'Fantasy', 'Alles verschlingende Dark Romantasy ab 16 Jahren - Historische Fantasy trifft auf epische Romance im antiken Rom. (German: All-consuming Dark Romantasy from age 16 - Historical Fantasy meets epic Romance in ancient Rome).', 'covers/Flammensturm_image.jpg', NULL, NULL, 'pdfs/FlammenSturm_Juliette_Cross.pdf', 'FlammenSturm_Juliette_Cross.pdf'),
(33, 'Hana Tara Hata', 'Tere Liye', 'Sabak Grip Nusantara', '2025', 'Fantasy', 'Tentang seorang pemilik kekuatan “membaca alam sekitar”. Tentang seorang ibu yang sangat menyayangi anaknya. Rasa sakit. Kehilangan. Pengorbanan. Kebencian. Memaafkan. Tumpah menjadi satu.', 'covers/HanaTaraHata_image.jpg', NULL, NULL, 'pdfs/HanaTaraHata_Tere_Liye.pdf', 'HanaTaraHata_Tere_Liye.pdf'),
(34, 'Storm Signal', 'P L Matthews', 'Kindle', '2025', 'Fantasy', 'Skye\'s tech magic and Zephyra\'s wild air magic don\'t exactly blend... With the storm building—both magical and emotional—the sisters will have to figure out how to work together to clear Zephyra\'s name.', 'covers/StormSignal_image.jpg', NULL, NULL, 'pdfs/StormSignal_P_L_Matthews.pdf', 'StormSignal_P_L_Matthews.pdf'),
(35, '1962The War That Wasnt', 'Shiv Kunal Verma', 'Aleph Book Company', '2016', 'History', 'In this definitive account of the conflict... Shiv Kunal Verma takes us on an uncomfortable journey through one of the most disastrous episodes of independent India\'s history.', 'covers/1962TheWarThatWasnt_image.jpg', NULL, NULL, 'pdfs/1962TheWarThatWasnt_ShivKunalVerma.pdf', '1962TheWarThatWasnt_ShivKunalVerma.pdf'),
(36, 'Confessions Of An Actor', 'Laurence Olivier', 'Simon & Schuster', '1982', 'History', 'An autobiography by the English actor discusses his theatrical and film career and offers a candid account of his personal life, focusing on his relationship with actress Vivien Leigh.', 'covers/ConfessionsOfAnActor_image.jpg', NULL, NULL, 'pdfs/ConfessionsOfAnActor_LaurenceOlivier.pdf', 'ConfessionsOfAnActor_LaurenceOlivier.pdf'),
(37, 'Democratic Ideals And Reality', 'Halford John Mackinder', 'Henry Holt and Co.', '1919', 'History', 'He argued that interior Asia and eastern Europe (the Heartland) were the geographic keys to world power; the role of Britain and the United States was to preserve a balance between the powers contending for control of this heartland.', 'covers/DemocraticIdealsAndReality_image.jpg', NULL, NULL, 'pdfs/DemocraticIdealsAndReality_HalfordJohnMackinder.pdf', 'DemocraticIdealsAndReality_HalfordJohnMackinder.pdf'),
(38, 'Le Mariage', 'Dorothy West', 'Doubleday', '1995', 'History', 'In the 1950s, a girl from the black bourgeoisie in Martha\'s Vineyard announces her engagement to a white musician. The novel follows the impact this has on her family and the community around them.', 'covers/LeMariage_image.jpg', NULL, NULL, 'pdfs/LeMariage_DorothyWest.pdf', 'LeMariage_DorothyWest.pdf'),
(39, 'The Egypt Code', 'Robert Bauval', 'Disinformation Company Limited', '2008', 'History', 'Robert Bauval... completes his groundbreaking investigation of astronomy as related to Egyptian monuments and related religious texts. The Egypt Code revisits the Pyramid Age and the Old Kingdom, proposing a vast skyground correlation for the MemphiteHeliopolis region.', 'covers/TheEgyptCode_image.jpg', NULL, NULL, 'pdfs/TheEgyptCode_RobertBauval.pdf', 'TheEgyptCode_RobertBauval.pdf'),
(40, 'Everything Changes But You', 'Sarah Bennett', 'Boldwood Books Ltd.', '2025', 'Romance', 'The focus of this story is Issy and Liam. The relationship between these two is just the right mixture of everything happening to them alone as well as together. (A brand new dreamy seaside romance).', 'covers/EverythingChangesButYou_image.png', NULL, NULL, 'pdfs/EverythingChangesButYou_SarahBennett.pdf', 'EverythingChangesButYou_SarahBennett.pdf'),
(41, 'Fake AChance On Me', 'Rebecca Chase', 'Kindle', '2025', 'Romance', 'Fake dating and intimacy lessons with the town\'s hottest, baddest rugby player to overcome my health issues? Bad idea. Catching feelings for him? A mistake that will shatter my heart.', 'covers/FakeAChanceOnMe_image.jpg', NULL, NULL, 'pdfs/FakeAChanceOnMe_RebeccaChase.pdf', 'FakeAChanceOnMe_RebeccaChase.pdf'),
(42, 'Love PRN', 'Cadence Rush', 'Cadence Rush Books', '2025', 'Romance', 'Quinn will have to tackle her demons and the grim realities of the nursing profession if she has any hope of surviving her new career, and truly moving on from the horrors of her past.', 'covers/LovePRN_image.jpg', NULL, NULL, 'pdfs/LovePRN_CadenceRush.pdf', 'LovePRN_CadenceRush.pdf'),
(43, 'The Number You Are Trying To Reach Is Not Reachable', 'Andara Kirana', 'Bukune', '2016', 'Romance', 'The Number You Are Trying to Reach is Not Reachable. (A fictional title with no further description available in the search snippets).', 'covers/TheNumberYouAreTryingToReachIsNotReachable_image.jpg', NULL, NULL, 'pdfs/TheNumberYouAreTryingToReachIsNotReachable_AndaraKirana.pdf', 'TheNumberYouAreTryingToReachIsNotReachable_AndaraKirana.pdf'),
(44, 'Unlucky In Love', 'Kiva Hart', 'Abbix Publishing Company', '2025', 'Romance', 'Brooke must decide whether the life she built in New York is worth holding onto, or if returning to Cedar Valley and rekindling the love she left behind is the second chance she never knew she needed. (A Small Town Romance with a Little Bit of Thanksgiving Magic).', 'covers/UnluckyInLove_image.jpg', NULL, NULL, 'pdfs/UnluckyInLove_KivaHart.pdf', 'UnluckyInLove_KivaHart.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `book_user_reads`
--

CREATE TABLE `book_user_reads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_user_reads`
--

INSERT INTO `book_user_reads` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 2, 21, '2025-12-15 17:35:14', '2025-12-15 17:35:14'),
(2, 2, 20, '2025-12-15 17:35:25', '2025-12-15 17:35:25'),
(3, 2, 22, '2025-12-15 17:35:32', '2025-12-15 17:35:32'),
(4, 2, 23, '2025-12-16 11:49:46', '2025-12-16 11:49:46'),
(5, 2, 24, '2025-12-16 11:49:52', '2025-12-16 11:49:52'),
(6, 2, 25, '2025-12-16 11:50:00', '2025-12-16 11:50:00'),
(7, 2, 26, '2025-12-16 11:50:06', '2025-12-16 11:50:06'),
(8, 2, 27, '2025-12-16 11:50:10', '2025-12-16 11:50:10'),
(9, 2, 28, '2025-12-16 11:50:15', '2025-12-16 11:50:15'),
(10, 2, 29, '2025-12-16 11:50:20', '2025-12-16 11:50:20'),
(11, 2, 30, '2025-12-16 11:50:23', '2025-12-16 11:50:23'),
(12, 2, 32, '2025-12-16 11:50:40', '2025-12-16 11:50:40'),
(13, 2, 33, '2025-12-16 11:50:47', '2025-12-16 11:50:47'),
(14, 2, 34, '2025-12-16 11:50:53', '2025-12-16 11:50:53'),
(15, 6, 20, '2025-12-16 11:53:14', '2025-12-16 11:53:14'),
(16, 6, 21, '2025-12-16 11:53:17', '2025-12-16 11:53:17'),
(17, 6, 22, '2025-12-16 11:53:25', '2025-12-16 11:53:25'),
(18, 6, 23, '2025-12-16 11:53:29', '2025-12-16 11:53:29'),
(19, 6, 24, '2025-12-16 11:53:34', '2025-12-16 11:53:34'),
(20, 6, 25, '2025-12-16 11:53:38', '2025-12-16 11:53:38'),
(21, 6, 26, '2025-12-16 11:53:42', '2025-12-16 11:53:42'),
(22, 6, 27, '2025-12-16 11:53:46', '2025-12-16 11:53:46'),
(23, 6, 28, '2025-12-16 11:53:50', '2025-12-16 11:53:50'),
(24, 6, 43, '2025-12-16 12:04:10', '2025-12-16 12:04:10'),
(25, 6, 32, '2025-12-16 12:06:02', '2025-12-16 12:06:02'),
(26, 6, 37, '2025-12-16 12:06:22', '2025-12-16 12:06:22');

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
(39, 2, 21, '2025-12-15 17:50:21', '2025-12-15 17:50:21');

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
(7, '2025_10_08_100000_create_user_activities_table', 3),
(8, '2025_12_15_005538_add_pdf_to_books_table', 4),
(9, '2025_12_16_003140_create_book_user_reads_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('hubertusk26@gmail.com', '$2y$12$rPquA4.vHBlyBJW6qkm61OdcbnCnYzloqKo.Dl2bESeMt8FteSUTK', '2025-12-15 12:33:02');

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
('b0zaLbRtGmvQ8ATm36zENkpc0muZPWg3KoPIhsdP', 14, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieXVqbTdLaDB0QnNFRmR5U3FnZjNqQ3hWdUV0VzA1ajc4c05pRlhpMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O30=', 1766172076);

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
(3, 'admin', 'admin@library.com', NULL, '$2y$12$KunmWfafjGUxphZpPDtxOuCTuswvEfsNhdsP3mAjq9iUfJkd0lATS', NULL, '2025-09-22 09:51:10', '2025-10-08 06:59:19', 'admin'),
(5, 'fendy', 'fendy@gmail.com', NULL, '$2y$12$i3c9tzs0P4DxdXM5nQzTMOPYvCkYnz3QEIJkKbDSn2ko8czPIxbl2', NULL, '2025-12-15 13:08:58', '2025-12-15 13:08:58', 'user'),
(6, 'Vyone', 'vyone@gmail.com', NULL, '$2y$12$bnnKgfHXYIoNxtbj50DVO.BQHRRASWt8M.oygRXgzj8p/WOxEcJQS', NULL, '2025-12-16 11:53:07', '2025-12-16 11:53:07', 'user'),
(14, 'superadmin', 'super@admin.com', NULL, '$2y$12$ollYXZEH5icTYYJQbn0tvePTB9yCy6CSvEjD1pyW9Inw8kAgkQnAa', NULL, '2025-12-19 18:33:14', '2025-12-19 18:32:04', 'super_admin');

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
(22, 3, 'profile_update', 'App\\Models\\User', 3, 'Updated profile information', '{\"method\":\"PATCH\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/profile\",\"actual_method\":\"PATCH\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-08 06:59:19', '2025-10-08 06:59:19'),
(23, 3, 'login', NULL, NULL, 'User logged in', '{\"method\":\"POST\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/login\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-08 07:01:18', '2025-10-08 07:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_user_reads`
--
ALTER TABLE `book_user_reads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_user_reads_user_id_book_id_unique` (`user_id`,`book_id`),
  ADD KEY `book_user_reads_book_id_foreign` (`book_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `book_user_reads`
--
ALTER TABLE `book_user_reads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_user_reads`
--
ALTER TABLE `book_user_reads`
  ADD CONSTRAINT `book_user_reads_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_user_reads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
