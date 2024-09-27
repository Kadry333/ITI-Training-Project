-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 11:05 AM
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
-- Database: `laravel`
--

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
(13, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(20, '2014_10_12_100000_create_password_resets_table', 2),
(21, '2019_08_19_000000_create_failed_jobs_table', 2),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(23, '2024_09_11_212923_add_user_id_to_posts_table', 2),
(24, '2024_09_23_124543_add_role_to_users_table', 2),
(25, '2024_09_23_125018_add_columns_to_users_table', 2),
(26, '2024_09_23_125517_add_role_to_users_table', 2),
(27, '2024_09_23_171257_add_borrowing_fields_to_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `borrowed_at` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `created_by`, `created_at`, `updated_at`, `user_id`, `borrowed_at`, `return_date`) VALUES
(1, 'first', 'book1', '2024-09-19 21:00:00', '2024-09-26 15:18:51', NULL, NULL, '2024-09-26'),
(7, 'second', 'hassan', '2024-09-10 21:00:00', '2024-09-26 19:58:39', 4, '2024-09-26', NULL),
(15, 'seven', 'hassan', '2024-09-10 07:00:45', '2024-09-26 15:19:23', 9, '2024-09-26', NULL),
(16, 'eight', 'ibrahim', '2024-09-10 07:00:56', '2024-09-26 15:19:25', 9, '2024-09-26', NULL),
(17, 'nine', 'hoda', '2024-09-09 21:00:00', '2024-09-26 19:58:43', 4, '2024-09-26', NULL),
(18, 'ten', 'nada', '2024-09-10 07:01:24', '2024-09-10 07:01:24', NULL, NULL, NULL),
(19, 'eleven', 'hla', '2024-09-10 07:01:37', '2024-09-26 19:58:48', NULL, NULL, '2024-09-26'),
(20, 'twelve', 'talia', '2024-09-10 07:01:59', '2024-09-10 07:01:59', NULL, NULL, NULL),
(25, 'First Post', 'Someone', '2024-09-09 21:00:00', '2024-09-10 08:00:32', NULL, NULL, NULL),
(26, 'Second Post', 'guest', '2024-09-09 21:00:00', '2024-09-10 08:00:32', NULL, NULL, NULL),
(27, 'First Post', 'Someone', '2024-09-09 21:00:00', '2024-09-10 08:04:19', NULL, NULL, NULL),
(28, 'Second Post', 'guest', '2024-09-09 21:00:00', '2024-09-10 08:04:19', NULL, NULL, NULL),
(32, 'hello', 'User 1', '2024-09-13 11:48:47', '2024-09-13 11:48:47', 4, NULL, NULL),
(33, 'book', 'hamada', '2024-09-13 11:49:05', '2024-09-13 11:49:05', 4, NULL, NULL),
(34, 'phone', 'mohamed', '2024-09-13 11:49:26', '2024-09-13 11:49:26', 4, NULL, NULL),
(36, 'Voluptatem enim non modi dolores voluptas.', 'Dean Jakubowski', '1973-03-08 22:27:16', '2024-09-13 11:54:41', 3, NULL, NULL),
(37, 'Nemo ad id exercitationem quis consequatur.', 'Nayeli Koepp', '1991-02-07 16:15:39', '2024-09-13 11:54:41', 3, NULL, NULL),
(38, 'Qui veniam quasi itaque deserunt ea.', 'Uriah Herman II', '2019-05-16 03:55:21', '2024-09-13 11:54:41', 3, NULL, NULL),
(39, 'Eos nobis quas ipsum sed ut et rerum.', 'Danyka Aufderhar', '2020-04-22 15:47:30', '2024-09-13 11:54:41', 3, NULL, NULL),
(40, 'At illum non et possimus rem aspernatur quasi.', 'Dr. Jessyca Doyle', '2003-01-13 17:13:45', '2024-09-13 11:54:41', 3, NULL, NULL),
(41, 'Saepe ut non eos optio ut quam illum.', 'Prof. Donnell Deckow', '1998-03-09 16:33:27', '2024-09-13 11:54:41', 4, NULL, NULL),
(42, 'Quidem sapiente totam et deserunt cum voluptatem delectus.', 'Michele Toy', '1980-05-20 23:39:51', '2024-09-13 11:54:41', 4, NULL, NULL),
(43, 'Recusandae minus atque eos voluptatem possimus.', 'Louvenia Wiegand', '1978-05-17 07:29:54', '2024-09-13 11:54:41', 4, NULL, NULL),
(44, 'Atque ut et sapiente saepe vero quos.', 'Miss Alvera Botsford', '2007-01-26 06:47:34', '2024-09-13 11:54:41', 4, NULL, NULL),
(45, 'Laudantium aliquid et blanditiis sed et praesentium omnis.', 'Prof. Rahul Fritsch MD', '1977-08-18 18:11:42', '2024-09-13 11:54:41', 4, NULL, NULL),
(46, 'Amet quas voluptatibus dolore iusto.', 'Willis Zemlak', '2000-01-17 14:56:32', '2024-09-13 11:54:41', 5, NULL, NULL),
(47, 'Veniam vel consectetur occaecati corrupti.', 'Avery Kemmer', '2000-02-04 00:03:00', '2024-09-13 11:54:41', 5, NULL, NULL),
(48, 'Sed dolorem dolorem non inventore est et.', 'Eda Hartmann', '2021-08-25 02:34:56', '2024-09-13 11:54:41', 5, NULL, NULL),
(49, 'Sint qui qui nisi vel quibusdam recusandae est.', 'Ayana Runolfsdottir', '1971-02-18 03:02:17', '2024-09-13 11:54:41', 5, NULL, NULL),
(50, 'Optio nisi dolor in numquam quas et consequatur et.', 'Mr. Sheridan Skiles', '1996-03-14 09:17:15', '2024-09-13 11:54:41', 5, NULL, NULL),
(51, 'Deleniti ut in itaqu', 'Sunt reiciendis ulla', '2024-09-13 12:03:21', '2024-09-13 12:03:21', 5, NULL, NULL),
(52, 'Molestias sapiente m', 'Laborum pariatur Al', '2024-09-16 06:38:56', '2024-09-16 06:38:56', 6, NULL, NULL),
(54, 'Iure officiis non su', 'Ducimus sed debitis', '2024-09-16 06:40:39', '2024-09-16 06:40:39', 7, NULL, NULL),
(55, 'Velit nulla ullam e', 'Mollitia iusto reici', '2024-09-16 06:40:45', '2024-09-26 15:19:18', 9, '2024-09-26', NULL),
(56, 'Expedita quis ullam', 'Sunt reiciendis ulla', '2024-09-15 21:00:00', '2024-09-16 08:34:56', 7, NULL, NULL),
(57, 'Optio explicabo A', 'Sunt reiciendis ulla', '2024-09-16 08:34:33', '2024-09-16 08:34:33', 7, NULL, NULL);

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
  `role` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Kareem Kadry', 'kareemkadry@email.com', NULL, '$2y$10$SMaS0wrGktJu.P/ICNoeQ.lVXb.bXL2CgSZCSMmbES.YsQik2/Qoa', NULL, '2024-09-11 20:41:07', '2024-09-23 11:05:02', 'admin'),
(4, 'user', 'user@email.com', NULL, '$2y$10$7SKrH6xaQmDW8UMs4Esaiu2Dl6j1PywxSLb9kaAKrns9lkan1a6Ji', NULL, '2024-09-11 21:13:38', '2024-09-11 21:13:38', 'student'),
(5, 'user2', 'user2@email.com', NULL, '$2y$10$FpQI9CWfsQJZONl7jKt3Ve4VSFr.X.QEae37EFaApTTMMH9QSYyOm', 'xsQYtCSMQj9gh3chUcbkxmp22Tk75v5NO3r2JC7XIovu1rJE1TmX0ut91lhz', '2024-09-13 11:50:51', '2024-09-13 11:50:51', 'student'),
(6, 'guest', 'guest@email.com', NULL, '$2y$10$ttKSeYke9feuklsAUT3hRudEymPuueryqa7TE5kcue9VKGlEYFF92', NULL, '2024-09-16 06:38:45', '2024-09-16 06:38:45', 'student'),
(7, 'guest2', 'guest2@email.com', NULL, '$2y$10$KqTMs3uJtzYCxGB9oLXcR.Ywo7NCGygvgfYM5j.eBvfTj4PDeT2vi', NULL, '2024-09-16 06:40:32', '2024-09-16 06:40:32', 'student'),
(8, 'Kareem Kadry', 'ahmed@email.com', NULL, '$2y$10$f/9Rq9MaG6BxK7et1YlcnePl1XmjocIVIAHjWmBG2el1fvZ57k/nG', NULL, '2024-09-23 09:52:25', '2024-09-23 09:52:25', 'student'),
(9, 'test2', 'test2@email.com', NULL, '$2y$10$ltvIeQeeIfXseoSOlx0XTOTwDy5kgufD8bTTSGb2M4FzD9uV/KnUC', NULL, '2024-09-23 12:16:12', '2024-09-23 12:16:12', 'student'),
(11, 'Kareem Hossam', 'kareem_hossam@email.com', NULL, '$2y$10$UqD34PWEnZD0tQxrMJgb7emyGlhE8Us5/EevfTwEGszLeyVezTkHe', 'K25jmnrSI8371wiJkk03JgnnZtpKZxKrymYvIApJoEiXGoz5rtpzRXeAyqbc', '2024-09-26 15:13:00', '2024-09-26 15:13:00', 'admin');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
