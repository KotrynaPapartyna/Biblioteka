-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2021 at 07:05 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'Vergie', 'Rempel', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(2, 'Augustus', 'VonRueden', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(3, 'Anjali', 'Sipes', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(4, 'Emmett', 'Terry', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(7, 'Petra', 'Prohaska', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(8, 'Omari', 'Yundt', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(9, 'Jeanie', 'Prosacco', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(10, 'Janick', 'Wunsch', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(11, 'Sonny', 'Pfannerstill', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(12, 'Crystel', 'Marvin', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(13, 'Keaton', 'Quitzon', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(14, 'Elaina', 'Green', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(15, 'Gracie', 'Dibbert', '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(18, 'Vardas', 'AutoriausPavarde', '2021-11-04 12:44:25', '2021-11-04 12:44:25'),
(19, 'Vardas', 'AutoriausPavarde', '2021-11-04 16:29:56', '2021-11-04 16:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_author_id_foreign` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `pages`, `about`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Pavadinimas', '22', '200', 'lialialia', 14, '2021-11-04 09:04:29', '2021-11-04 16:04:48'),
(2, 'Dr.', '1566', '1634', 'Iusto dolores veritatis commodi dolorum mollitia et vitae dolores facilis ea ad doloremque id tempore qui voluptas labore voluptatem iure rem rerum iusto esse.', 2, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(3, 'Mrs.', '1634', '1646', 'Voluptas autem aperiam autem sit ullam aut aut a perspiciatis non non et quis omnis aut.', 3, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(4, 'Dr.', '1920', '1090', 'Voluptatem sunt error ut voluptatem accusamus cumque quae voluptas voluptatibus possimus voluptas placeat harum expedita in quas non consequatur.', 4, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(7, 'Mr.', '1847', '1436', 'Enim aliquam reiciendis voluptatem explicabo voluptatem voluptatem labore ut et et eum porro eius nemo temporibus ipsum.', 7, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(8, 'Dr.', '1557', '1849', 'Quis quisquam dolores reprehenderit cumque odit animi in excepturi totam quis nulla distinctio enim consequuntur eos voluptate iusto inventore laboriosam nisi.', 8, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(9, 'Dr.', '1706', '1995', 'Ea suscipit culpa quis molestias omnis eligendi quasi neque commodi dolores ea voluptatem earum reprehenderit adipisci architecto asperiores.', 9, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(10, 'Mr.', '1165', '1865', 'Expedita enim distinctio facere adipisci dolorem unde provident quia placeat id mollitia earum velit autem animi dolor aut ducimus.', 10, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(11, 'Dr.', '1464', '1184', 'In minima deserunt voluptatem maiores vel sint libero autem aspernatur nobis sint sunt fuga ea ipsum sit modi tenetur sequi autem sequi ducimus et incidunt dolorem et.', 11, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(12, 'Mr.', '1684', '1642', 'Sint dolore excepturi aut optio id ut enim sit fugit nostrum illum nihil tempora quis ad dolor sit dolore recusandae nihil sint molestiae fugiat quae occaecati labore.', 12, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(13, 'Prof.', '1324', '1370', 'Enim repellat sunt vero et dicta est hic repellat ea eveniet tenetur ut eius fuga velit.', 13, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(15, 'Miss', '1770', '1478', 'Ea non quia quas similique sed vitae vel in cupiditate itaque asperiores qui est unde natus voluptas qui iusto quisquam omnis id magni.', 15, '2021-11-04 09:04:29', '2021-11-04 09:04:29'),
(16, 'Pavadinimas', '22', '200', 'fdbfdfgb', 1, '2021-11-04 15:40:00', '2021-11-04 15:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_03_170544_create_authors_table', 1),
(5, '2021_11_03_170559_create_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vardas', 'info@info.com', NULL, '$2y$10$47n.YaSXFv2c5Rzu8Y6yteIW4lvo.0VluQ3zfsFbQ08Hr.m6fWvLK', NULL, '2021-11-04 09:05:35', '2021-11-04 09:05:35'),
(2, 'Kotryna', 'kmarkeviciute@gmail.com', NULL, '$2y$10$z2uGwJfjMHntoaIzIZ1cTus61CWhG7nXA3a2XQtxu3JKRaD1atF4y', NULL, '2021-11-04 11:56:23', '2021-11-04 11:56:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
