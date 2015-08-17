-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-17 05:59:03
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tagexing2`
--

-- --------------------------------------------------------

--
-- 表的结构 `bikes`
--

CREATE TABLE IF NOT EXISTS `bikes` (
  `id` int(10) unsigned NOT NULL,
  `qrcode_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` enum('normal','rented','broken','repairing','repaired') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `stop_id` int(10) unsigned DEFAULT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `bikes`
--

INSERT INTO `bikes` (`id`, `qrcode_id`, `name`, `state`, `stop_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, '宏旭号', 'rented', NULL, '03995', '2015-08-10 04:05:26', '2015-08-13 10:08:06');

-- --------------------------------------------------------

--
-- 表的结构 `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `log` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_08_04_000001_create_users', 1),
('2015_08_04_000002_create_stops', 1),
('2015_08_04_000003_create_rank', 1),
('2015_08_04_000004_create_bikes', 1),
('2015_08_04_000005_create_logs', 1),
('2015_08_04_000006_create_score', 1),
('2015_08_04_000007_create_rent', 1),
('2015_08_04_000001_create_users', 1),
('2015_08_04_000002_create_stops', 1),
('2015_08_04_000003_create_rank', 1),
('2015_08_04_000004_create_bikes', 1),
('2015_08_04_000005_create_logs', 1),
('2015_08_04_000006_create_score', 1),
('2015_08_04_000007_create_rent', 1);

-- --------------------------------------------------------

--
-- 表的结构 `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(10) unsigned NOT NULL,
  `min_score` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `max_time` int(11) NOT NULL,
  `max_time_special` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `rank`
--

INSERT INTO `rank` (`id`, `min_score`, `name`, `max_time`, `max_time_special`, `created_at`, `updated_at`) VALUES
(2, 0, '初级骑手', 2, 3, '2015-08-10 02:46:38', '2015-08-10 02:46:38'),
(3, 60, '入门骑手', 4, 6, '2015-08-10 02:47:54', '2015-08-10 02:47:54'),
(4, 80, '高级骑手', 6, 9, '2015-08-10 02:48:42', '2015-08-10 02:48:42');

-- --------------------------------------------------------

--
-- 表的结构 `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `id` int(10) unsigned NOT NULL,
  `type` enum('rent','return') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `max_time` int(11) NOT NULL,
  `bike_id` int(10) unsigned NOT NULL,
  `stop_id` int(10) unsigned NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `broken_type` enum('lock','bike','other') COLLATE utf8_unicode_ci DEFAULT NULL,
  `broken_desp` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `rent`
--

INSERT INTO `rent` (`id`, `type`, `user_id`, `max_time`, `bike_id`, `stop_id`, `password`, `broken_type`, `broken_desp`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'rent', 15, 4, 1, 1, '123456', NULL, NULL, NULL, '2015-08-13 04:30:00', '2015-08-10 14:26:27'),
(3, 'return', 15, 4, 1, 2, '35721', NULL, NULL, NULL, '2015-08-13 09:38:18', '2015-08-13 09:38:18'),
(9, 'rent', 15, 4, 1, 2, '123456', NULL, NULL, NULL, '2015-08-13 09:46:10', '2015-08-13 09:46:10'),
(10, 'return', 15, 4, 1, 1, '03995', NULL, NULL, NULL, '2015-08-13 09:49:33', '2015-08-13 09:49:33'),
(11, 'rent', 15, 4, 1, 1, '03995', NULL, NULL, NULL, '2015-08-13 10:08:06', '2015-08-13 10:08:06');

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `score` int(11) NOT NULL,
  `reason` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`id`, `user_id`, `score`, `reason`, `created_at`, `updated_at`) VALUES
(1, 15, -5, '还车超时1小时', '2015-08-13 09:39:10', '2015-08-13 09:39:10'),
(2, 15, 2, '成功按时还车！加分', '2015-08-13 09:49:33', '2015-08-13 09:49:33');

-- --------------------------------------------------------

--
-- 表的结构 `stops`
--

CREATE TABLE IF NOT EXISTS `stops` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `stops`
--

INSERT INTO `stops` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, '教八', '123', '2015-08-10 04:03:39', '2015-08-10 04:03:39'),
(2, '学11', '456', '2015-08-10 04:04:14', '2015-08-10 04:04:14');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `openid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` enum('register','auth','normal','rented','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'register',
  `free_at` datetime DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '60',
  `total` int(11) NOT NULL DEFAULT '0',
  `message` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth` int(11) NOT NULL DEFAULT '0',
  `school` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_type` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `openid`, `name`, `gender`, `email`, `mobile`, `qq`, `state`, `free_at`, `score`, `total`, `message`, `auth`, `school`, `student_id`, `department`, `student_type`, `created_at`, `updated_at`) VALUES
(15, 'Hello, World!', '许宏旭', 'male', 'xuhongxu96@qq.com', '17888829772', '469614686', 'rented', NULL, 62, 0, NULL, 0, '北京师范大学', '201411212027', '信息科学与技术学院', '本科生', '2015-08-07 14:41:39', '2015-08-13 10:08:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bikes_qrcode_id_unique` (`qrcode_id`),
  ADD UNIQUE KEY `bikes_name_unique` (`name`),
  ADD KEY `bikes_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rank_min_score_unique` (`min_score`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_user_id_foreign` (`user_id`),
  ADD KEY `rent_bike_id_foreign` (`bike_id`),
  ADD KEY `rent_stop_id_foreign` (`stop_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score_user_id_foreign` (`user_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stops_name_unique` (`name`),
  ADD UNIQUE KEY `stops_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_openid_unique` (`openid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- 限制导出的表
--

--
-- 限制表 `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`);

--
-- 限制表 `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- 限制表 `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `rent_stop_id_foreign` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`id`),
  ADD CONSTRAINT `rent_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- 限制表 `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
