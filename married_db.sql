-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2024 at 04:21 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `married_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `status` int DEFAULT '0',
  `update_user_id` bigint UNSIGNED DEFAULT NULL,
  `create_user_id` bigint UNSIGNED DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `desc`, `meta_key`, `parent_id`, `sequence`, `status`, `update_user_id`, `create_user_id`, `notes`, `created_at`, `updated_at`, `code`) VALUES
(18, 'Translate', 'translate', NULL, 'translate', 0, 0, 1, 1, NULL, NULL, NULL, '2024-04-28 09:33:11', 'translate'),
(22, 'سياسة الخصوصية', 'privacy', '<p class=\"lead\"></p><h2>سياسة الخصوصية للمستخدمين</h2>\r\n\r\n<p>شكرًا لاختيارك موقع صراحة. إنّ موقعنا يحترم خصوصيتك ويحرص على حماية بياناتك الشخصية. يمكنك الاطلاع على بنود سياسة الخصوصية أدناه لمعرفة المزيد.</p>\r\n\r\n<p>توضّح سياسة الخصوصية هذه، الأساس الذي سنقوم بموجبه بجمع واستخدام بياناتك الشخصية، كما تذكر أيضًا جميع الإجراءات التي نتبعها لضمان خصوصية معلوماتك. وأخيرًا، تحدّد السياسة الخيارات المتاحة أمامك فيما يتعلّق بجمع بياناتك الشخصية واستخدامها والكشف عنها.</p>\r\n\r\n<p>باستخدامك لموقع فرصة والاستفادة من خدماتنا فإنك توافق على التعامل مع بياناتك الشخصية بما يتفق مع سياسة الخصوصية هذه.</p><p></p>', NULL, NULL, 0, 1, 28, NULL, NULL, '2024-06-26 19:56:01', '2024-08-09 16:19:22', 'page'),
(35, 'الشروط و الاحكام', 'terms', NULL, NULL, NULL, 0, 1, 1, NULL, NULL, '2024-07-16 08:17:16', '2024-07-16 08:17:34', 'page'),
(36, 'تصويت', 'vote', NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-07-28 12:30:36', '2024-07-28 12:30:36', 'ques');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `createuser_id` bigint UNSIGNED DEFAULT NULL,
  `updateuser_id` bigint UNSIGNED DEFAULT NULL,
  `mobile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '1',
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `facebook_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balance` int DEFAULT '0',
  `balance` int DEFAULT '0',
  `lang_id` bigint UNSIGNED DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `user_name`, `role`, `token`, `createuser_id`, `updateuser_id`, `mobile`, `remember_token`, `created_at`, `updated_at`, `image`, `is_active`, `desc`, `country`, `gender`, `birthdate`, `facebook_id`, `total_balance`, `balance`, `lang_id`, `code`, `expire_at`) VALUES
(63, 'علاء', 'soriaty@msn.com', NULL, '$2y$12$tma2NGCykM2uwT144EfXEOuf7R.mNmLGmW52yfKrevrjEK.1aeeDq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-31 20:32:57', '2024-07-31 20:32:57', NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 7, NULL, NULL),
(81, 'najy', 'najyms@gmail.com', NULL, '$2y$12$XeNeevyNTL.gc8XsJMYdcuJBr8HnWe/YnQcaNrgdBRixlSFu50WjK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-05 13:10:26', '2024-08-05 14:12:48', NULL, 1, NULL, NULL, NULL, NULL, NULL, 2, 2, 7, NULL, NULL),
(82, 'aa', 'najims833@gmail.com', NULL, '$2y$12$O1dlNOwHcLuycdYx8EHKAOoUwfycFsBQJmE1lPoDUFN1XDGcXdU1O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-05 14:03:12', '2024-08-05 14:03:12', NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 7, '787179', '2024-08-05 16:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `clients_options`
--

DROP TABLE IF EXISTS `clients_options`;
CREATE TABLE IF NOT EXISTS `clients_options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `option_id` bigint UNSIGNED DEFAULT NULL,
  `val_str` text COLLATE utf8mb4_unicode_ci,
  `val_int` int DEFAULT NULL,
  `val_date` datetime DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_points`
--

DROP TABLE IF EXISTS `clients_points`;
CREATE TABLE IF NOT EXISTS `clients_points` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `points_sum` int DEFAULT '0',
  `gift_sum` int DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `level_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_socials`
--

DROP TABLE IF EXISTS `clients_socials`;
CREATE TABLE IF NOT EXISTS `clients_socials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `social_id` bigint UNSIGNED DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `status` int DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htmlcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_default` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `notes`, `sequence`, `status`, `image`, `htmlcode`, `created_at`, `updated_at`, `is_default`) VALUES
(7, 'ar', 'العربية', NULL, 0, 1, 'ar7.svg', NULL, '2024-04-09 22:20:21', '2024-07-06 13:52:52', 1),
(8, 'en', 'English', NULL, 0, 0, 'en8.svg', NULL, '2024-04-09 22:21:07', '2024-07-31 19:31:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lang_posts`
--

DROP TABLE IF EXISTS `lang_posts`;
CREATE TABLE IF NOT EXISTS `lang_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `main_table` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_trans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_trans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dep_id` bigint UNSIGNED DEFAULT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `optionvalue_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=620 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lang_posts`
--

INSERT INTO `lang_posts` (`id`, `lang_id`, `category_id`, `post_id`, `main_table`, `title_trans`, `content_trans`, `name`, `notes`, `created_at`, `updated_at`, `dep_id`, `property_id`, `optionvalue_id`) VALUES
(292, 8, 28, NULL, NULL, 'science1', 'science', NULL, NULL, '2024-07-01 13:25:04', '2024-07-01 20:03:29', NULL, NULL, NULL),
(293, 7, 28, NULL, NULL, 'علوم', 'علوم', NULL, NULL, '2024-07-01 13:28:27', '2024-07-01 13:28:27', NULL, NULL, NULL),
(294, 7, 33, NULL, NULL, 'عواصم ودول', 'عواصم الدول و معلومات عن الدول', NULL, NULL, '2024-07-06 18:19:12', '2024-07-06 18:19:12', NULL, NULL, NULL),
(295, 8, 33, NULL, NULL, 'Capitals & Countries', 'Capitals', NULL, NULL, '2024-07-06 18:20:05', '2024-07-06 18:20:05', NULL, NULL, NULL),
(296, 7, 24, NULL, NULL, 'تاريخ', 'اختبر نفسك واكتشف إلى أي مدى أنت مطلع بالتاريخ .. وهل تعلم الكثير من المعلومات التاريخية أم لا عن التاريخ العربي والعالمي . واكتشف إلى أي مدى أنت مطلع بالتاريخ .. وهل تعلم الكثير من المعلومات التاريخية', NULL, NULL, '2024-07-06 19:57:15', '2024-07-07 12:48:49', NULL, NULL, NULL),
(297, 8, 24, NULL, NULL, 'History', 'eng history', NULL, NULL, '2024-07-06 19:57:39', '2024-07-07 12:49:02', NULL, NULL, NULL),
(298, 8, 25, NULL, NULL, 'Geography', 'Geography   Geography', NULL, NULL, '2024-07-06 19:58:58', '2024-07-08 20:55:57', NULL, NULL, NULL),
(299, 7, 25, NULL, NULL, 'جغرافيا', 'جغرافيا اسئلة حول البلدان والانهار', NULL, NULL, '2024-07-06 19:59:14', '2024-07-08 20:55:48', NULL, NULL, NULL),
(300, 7, NULL, 83, NULL, 'الرئيسية', NULL, NULL, NULL, '2024-07-09 11:58:13', '2024-08-09 14:18:57', NULL, NULL, NULL),
(301, 8, NULL, 83, NULL, 'Home', NULL, NULL, NULL, '2024-07-09 11:58:24', '2024-08-09 14:18:44', NULL, NULL, NULL),
(304, 8, NULL, 86, NULL, 'Profile', NULL, NULL, NULL, '2024-07-09 12:10:03', '2024-07-09 12:10:03', NULL, NULL, NULL),
(305, 7, NULL, 86, NULL, 'حسابي', NULL, NULL, NULL, '2024-07-09 12:10:59', '2024-07-09 12:10:59', NULL, NULL, NULL),
(306, 7, 34, NULL, NULL, 'معلومات عامة', NULL, NULL, NULL, '2024-07-09 12:36:17', '2024-07-09 12:36:17', NULL, NULL, NULL),
(307, 8, 34, NULL, NULL, 'General Information', NULL, NULL, NULL, '2024-07-09 12:36:33', '2024-07-09 12:36:33', NULL, NULL, NULL),
(308, 7, NULL, 87, NULL, 'تسجيل دخول', NULL, NULL, NULL, '2024-07-09 19:38:41', '2024-07-09 19:38:41', NULL, NULL, NULL),
(309, 8, NULL, 87, NULL, 'Login', NULL, NULL, NULL, '2024-07-09 19:38:55', '2024-07-09 19:38:55', NULL, NULL, NULL),
(310, 7, NULL, 88, NULL, 'اسم المستخدم', NULL, NULL, NULL, '2024-07-09 19:52:52', '2024-07-09 19:52:52', NULL, NULL, NULL),
(311, 8, NULL, 88, NULL, 'Username', NULL, NULL, NULL, '2024-07-09 19:53:11', '2024-07-09 19:53:11', NULL, NULL, NULL),
(312, 7, NULL, 89, NULL, 'البريد الإلكتروني', NULL, NULL, NULL, '2024-07-09 20:03:16', '2024-07-09 20:51:27', NULL, NULL, NULL),
(313, 8, NULL, 89, NULL, 'Email', NULL, NULL, NULL, '2024-07-09 20:03:25', '2024-07-09 20:03:25', NULL, NULL, NULL),
(314, 7, NULL, 90, NULL, 'كلمة المرور', NULL, NULL, NULL, '2024-07-09 20:04:59', '2024-07-09 20:04:59', NULL, NULL, NULL),
(315, 8, NULL, 90, NULL, 'Password', NULL, NULL, NULL, '2024-07-09 20:05:09', '2024-07-09 20:05:09', NULL, NULL, NULL),
(316, 7, NULL, 91, NULL, 'تأكيد كلمة المرور', NULL, NULL, NULL, '2024-07-09 20:06:50', '2024-07-09 20:06:50', NULL, NULL, NULL),
(317, 8, NULL, 91, NULL, 'Confirm Password', NULL, NULL, NULL, '2024-07-09 20:07:28', '2024-07-09 20:07:28', NULL, NULL, NULL),
(318, 7, NULL, 92, NULL, 'الصورة الشخصية', NULL, NULL, NULL, '2024-07-09 20:21:27', '2024-07-09 20:21:27', NULL, NULL, NULL),
(319, 8, NULL, 92, NULL, 'Personal Picture', NULL, NULL, NULL, '2024-07-09 20:22:29', '2024-07-09 20:22:29', NULL, NULL, NULL),
(320, 7, NULL, 93, NULL, 'حساب جديد', NULL, NULL, NULL, '2024-07-09 20:36:31', '2024-07-09 20:36:31', NULL, NULL, NULL),
(321, 8, NULL, 93, NULL, 'New Account', NULL, NULL, NULL, '2024-07-09 20:37:03', '2024-07-09 20:37:03', NULL, NULL, NULL),
(322, 7, NULL, 94, NULL, 'إنشاء حساب جديد', NULL, NULL, NULL, '2024-07-09 20:38:38', '2024-07-09 20:38:38', NULL, NULL, NULL),
(323, 8, NULL, 94, NULL, 'Create New Account', NULL, NULL, NULL, '2024-07-09 20:39:59', '2024-07-09 20:39:59', NULL, NULL, NULL),
(324, 7, NULL, 95, NULL, 'أدخل اسم المستخدم', NULL, NULL, NULL, '2024-07-09 20:43:04', '2024-07-09 20:43:04', NULL, NULL, NULL),
(325, 8, NULL, 95, NULL, 'Enter Username', NULL, NULL, NULL, '2024-07-09 20:46:12', '2024-07-09 20:46:12', NULL, NULL, NULL),
(326, 7, NULL, 98, NULL, 'أدخل البريد الإلكتروني', NULL, NULL, NULL, '2024-07-09 20:50:40', '2024-07-09 20:50:40', NULL, NULL, NULL),
(327, 8, NULL, 98, NULL, 'Enter Email', NULL, NULL, NULL, '2024-07-09 20:50:55', '2024-07-09 20:50:55', NULL, NULL, NULL),
(328, 7, NULL, 100, NULL, 'أدخل كلمة المرور', NULL, NULL, NULL, '2024-07-09 20:53:23', '2024-07-09 20:53:23', NULL, NULL, NULL),
(329, 8, NULL, 100, NULL, 'Enter Password', NULL, NULL, NULL, '2024-07-09 20:53:38', '2024-07-09 20:53:38', NULL, NULL, NULL),
(330, 7, NULL, 101, NULL, 'أدخل تأكيد كلمة المرور', NULL, NULL, NULL, '2024-07-09 20:57:01', '2024-07-09 20:57:01', NULL, NULL, NULL),
(331, 8, NULL, 101, NULL, 'Enter Confirm Password', NULL, NULL, NULL, '2024-07-09 20:57:12', '2024-07-09 20:57:12', NULL, NULL, NULL),
(332, 8, NULL, 102, NULL, 'Enter Personal Picture', NULL, NULL, NULL, '2024-07-09 21:00:17', '2024-07-09 21:00:17', NULL, NULL, NULL),
(333, 7, NULL, 103, NULL, 'بالتسجيل في الموقع, أنت توافق على', NULL, NULL, NULL, '2024-07-09 21:09:55', '2024-07-09 21:09:55', NULL, NULL, NULL),
(334, 8, NULL, 103, NULL, 'By registering on the site, you agree to', NULL, NULL, NULL, '2024-07-09 21:15:13', '2024-07-09 21:15:13', NULL, NULL, NULL),
(335, 7, NULL, 104, NULL, 'الخصوصية', NULL, NULL, NULL, '2024-07-09 21:18:17', '2024-07-09 21:18:17', NULL, NULL, NULL),
(336, 8, NULL, 104, NULL, 'Privacy', NULL, NULL, NULL, '2024-07-09 21:18:29', '2024-07-09 21:18:29', NULL, NULL, NULL),
(337, 7, NULL, 105, NULL, 'الشروط والأحكام', NULL, NULL, NULL, '2024-07-09 21:20:59', '2024-07-09 21:20:59', NULL, NULL, NULL),
(338, 8, NULL, 105, NULL, 'Terms and Conditions', NULL, NULL, NULL, '2024-07-09 21:21:13', '2024-07-09 21:21:13', NULL, NULL, NULL),
(339, 7, NULL, 106, NULL, 'دخول', NULL, NULL, NULL, '2024-07-09 21:32:29', '2024-07-09 21:32:29', NULL, NULL, NULL),
(340, 8, NULL, 106, NULL, 'Sign Up', NULL, NULL, NULL, '2024-07-09 21:33:27', '2024-07-09 21:35:35', NULL, NULL, NULL),
(341, 7, NULL, 107, NULL, 'هل بالفعل لديك حساب', NULL, NULL, NULL, '2024-07-09 21:44:13', '2024-07-09 21:44:13', NULL, NULL, NULL),
(342, 8, NULL, 107, NULL, 'Do you already have an account', NULL, NULL, NULL, '2024-07-09 21:44:37', '2024-07-09 21:44:37', NULL, NULL, NULL),
(343, 7, NULL, 108, NULL, 'دخول', NULL, NULL, NULL, '2024-07-09 21:46:18', '2024-07-09 21:46:18', NULL, NULL, NULL),
(344, 8, NULL, 108, NULL, 'Login', NULL, NULL, NULL, '2024-07-09 21:46:27', '2024-07-09 21:46:27', NULL, NULL, NULL),
(345, 7, NULL, 109, NULL, 'حساب جديد', NULL, NULL, NULL, '2024-07-09 21:55:05', '2024-07-09 21:55:05', NULL, NULL, NULL),
(346, 8, NULL, 109, NULL, 'New Account', NULL, NULL, NULL, '2024-07-09 21:55:23', '2024-07-09 21:55:23', NULL, NULL, NULL),
(347, 7, NULL, 110, NULL, 'تسجيل الدخول', NULL, NULL, NULL, '2024-07-09 22:03:32', '2024-07-09 22:03:32', NULL, NULL, NULL),
(348, 8, NULL, 110, NULL, 'Login', NULL, NULL, NULL, '2024-07-09 22:05:29', '2024-07-09 22:05:29', NULL, NULL, NULL),
(349, 7, NULL, 112, NULL, 'البريد الإلكتروني', NULL, NULL, NULL, '2024-07-09 22:07:57', '2024-07-09 22:07:57', NULL, NULL, NULL),
(350, 8, NULL, 112, NULL, 'Email', NULL, NULL, NULL, '2024-07-09 22:08:07', '2024-07-09 22:08:07', NULL, NULL, NULL),
(351, 7, NULL, 113, NULL, 'كلمة المرور', NULL, NULL, NULL, '2024-07-09 22:10:29', '2024-07-09 22:10:29', NULL, NULL, NULL),
(352, 8, NULL, 113, NULL, 'Password', NULL, NULL, NULL, '2024-07-09 22:10:42', '2024-07-09 22:10:42', NULL, NULL, NULL),
(353, 7, NULL, 114, NULL, 'هل نسيت كلمة المرور؟', NULL, NULL, NULL, '2024-07-09 22:13:16', '2024-07-09 22:13:16', NULL, NULL, NULL),
(354, 8, NULL, 114, NULL, 'Forgot your password?', NULL, NULL, NULL, '2024-07-09 22:13:36', '2024-07-09 22:13:36', NULL, NULL, NULL),
(355, 7, NULL, 115, NULL, 'استعادة كلمة المرور', NULL, NULL, NULL, '2024-07-09 22:19:48', '2024-07-09 22:19:48', NULL, NULL, NULL),
(356, 8, NULL, 115, NULL, 'Password Recovery', NULL, NULL, NULL, '2024-07-09 22:19:59', '2024-07-09 22:19:59', NULL, NULL, NULL),
(357, 7, NULL, 116, NULL, 'ليس لديك حساب؟', NULL, NULL, NULL, '2024-07-09 22:25:01', '2024-07-09 22:25:01', NULL, NULL, NULL),
(358, 8, NULL, 116, NULL, 'Don\'t have an account?', NULL, NULL, NULL, '2024-07-09 22:25:18', '2024-07-09 22:25:18', NULL, NULL, NULL),
(359, 7, NULL, 117, NULL, 'سجل الآن', NULL, NULL, NULL, '2024-07-09 22:27:12', '2024-07-09 22:27:12', NULL, NULL, NULL),
(360, 8, NULL, 117, NULL, 'Register Now', NULL, NULL, NULL, '2024-07-09 22:27:26', '2024-07-09 22:27:26', NULL, NULL, NULL),
(361, 7, NULL, 118, NULL, 'أدخل البريد الإلكتروني', NULL, NULL, NULL, '2024-07-09 22:32:38', '2024-07-09 22:32:38', NULL, NULL, NULL),
(362, 8, NULL, 118, NULL, 'Enter Email', NULL, NULL, NULL, '2024-07-09 22:32:51', '2024-07-09 22:32:51', NULL, NULL, NULL),
(363, 7, NULL, 119, NULL, 'أدخل كلمة المرور', NULL, NULL, NULL, '2024-07-09 22:35:04', '2024-07-09 22:35:04', NULL, NULL, NULL),
(364, 8, NULL, 119, NULL, 'Enter Password', NULL, NULL, NULL, '2024-07-09 22:35:18', '2024-07-09 22:35:18', NULL, NULL, NULL),
(367, 7, NULL, 120, NULL, 'رصيدك:', NULL, NULL, NULL, '2024-07-09 23:12:03', '2024-07-09 23:12:03', NULL, NULL, NULL),
(368, 8, NULL, 120, NULL, 'Your balance:', NULL, NULL, NULL, '2024-07-09 23:12:22', '2024-07-09 23:12:22', NULL, NULL, NULL),
(369, 7, NULL, 121, NULL, 'أهلا بك يا', NULL, NULL, NULL, '2024-07-09 23:14:20', '2024-07-09 23:14:20', NULL, NULL, NULL),
(370, 8, NULL, 121, NULL, 'Welcome', NULL, NULL, NULL, '2024-07-09 23:14:52', '2024-07-09 23:14:52', NULL, NULL, NULL),
(371, 7, NULL, 122, NULL, 'حسابي', NULL, NULL, NULL, '2024-07-09 23:25:31', '2024-07-09 23:25:31', NULL, NULL, NULL),
(372, 8, NULL, 122, NULL, 'Profile', NULL, NULL, NULL, '2024-07-09 23:25:43', '2024-07-09 23:25:43', NULL, NULL, NULL),
(373, 7, NULL, 123, NULL, 'تسجيل خروج', NULL, NULL, NULL, '2024-07-09 23:27:26', '2024-07-09 23:27:26', NULL, NULL, NULL),
(374, 8, NULL, 123, NULL, 'Logout', NULL, NULL, NULL, '2024-07-09 23:27:38', '2024-07-09 23:27:38', NULL, NULL, NULL),
(389, 7, NULL, 131, NULL, 'الرئيسية', NULL, NULL, NULL, '2024-07-10 20:29:49', '2024-07-10 20:29:49', NULL, NULL, NULL),
(390, 8, NULL, 131, NULL, 'Home', NULL, NULL, NULL, '2024-07-10 20:30:00', '2024-07-10 20:30:00', NULL, NULL, NULL),
(391, 7, NULL, 132, NULL, 'سجل دخول لتستطيع التصويت', NULL, NULL, NULL, '2024-07-10 20:35:25', '2024-07-31 11:27:33', NULL, NULL, NULL),
(392, 8, NULL, 132, NULL, 'Log in to participate in the vote', NULL, NULL, NULL, '2024-07-10 20:37:40', '2024-07-31 11:28:08', NULL, NULL, NULL),
(393, 7, NULL, 133, NULL, 'اختر تصويت', NULL, NULL, NULL, '2024-07-10 20:42:24', '2024-07-31 19:25:08', NULL, NULL, NULL),
(394, 8, NULL, 133, NULL, 'Choose vote', NULL, NULL, NULL, '2024-07-10 20:42:59', '2024-07-31 19:25:25', NULL, NULL, NULL),
(395, 7, NULL, 134, NULL, 'لايوجد أسئلة', NULL, NULL, NULL, '2024-07-10 20:57:34', '2024-07-10 20:57:34', NULL, NULL, NULL),
(396, 7, NULL, 135, NULL, 'حقل البريد الإلكتروني مطلوب', NULL, NULL, NULL, '2024-07-10 21:00:59', '2024-07-10 21:00:59', NULL, NULL, NULL),
(397, 8, NULL, 135, NULL, 'Email field is required', NULL, NULL, NULL, '2024-07-10 21:02:02', '2024-07-10 21:02:02', NULL, NULL, NULL),
(398, 7, NULL, 136, NULL, 'حقل كلمة المرور مطلوب', NULL, NULL, NULL, '2024-07-10 21:03:37', '2024-07-10 21:03:37', NULL, NULL, NULL),
(399, 8, NULL, 136, NULL, 'Password field is required', NULL, NULL, NULL, '2024-07-10 21:04:04', '2024-07-10 21:04:04', NULL, NULL, NULL),
(400, 7, NULL, 137, NULL, 'حقل اسم المستخدم مطلوب', NULL, NULL, NULL, '2024-07-10 21:07:26', '2024-07-10 21:07:26', NULL, NULL, NULL),
(401, 8, NULL, 137, NULL, 'Username field is required', NULL, NULL, NULL, '2024-07-10 21:07:48', '2024-07-10 21:07:48', NULL, NULL, NULL),
(402, 7, NULL, 138, NULL, 'حقل البريد الإلكتروني مطلوب', NULL, NULL, NULL, '2024-07-10 21:09:03', '2024-07-10 21:09:03', NULL, NULL, NULL),
(403, 8, NULL, 138, NULL, 'Email field is required', NULL, NULL, NULL, '2024-07-10 21:09:15', '2024-07-10 21:09:15', NULL, NULL, NULL),
(404, 7, NULL, 139, NULL, 'حقل كلمة المرور مطلوب', NULL, NULL, NULL, '2024-07-10 21:10:14', '2024-07-10 21:10:14', NULL, NULL, NULL),
(405, 8, NULL, 139, NULL, 'Password field is required', NULL, NULL, NULL, '2024-07-10 21:10:45', '2024-07-10 21:10:45', NULL, NULL, NULL),
(406, 7, NULL, 140, NULL, 'حقل تأكيد كلمة المرور مطلوب', NULL, NULL, NULL, '2024-07-10 21:13:08', '2024-07-10 21:13:08', NULL, NULL, NULL),
(407, 8, NULL, 140, NULL, 'Confirm Password field is required', NULL, NULL, NULL, '2024-07-10 21:13:42', '2024-07-10 21:13:42', NULL, NULL, NULL),
(408, 7, NULL, 141, NULL, 'حقل الصورة الشخصية مطلوب', NULL, NULL, NULL, '2024-07-10 21:15:29', '2024-07-10 21:15:29', NULL, NULL, NULL),
(409, 8, NULL, 141, NULL, 'Personal Picture field is required', NULL, NULL, NULL, '2024-07-10 21:15:43', '2024-07-10 21:15:43', NULL, NULL, NULL),
(412, 8, NULL, 134, NULL, 'No Questions', NULL, NULL, NULL, '2024-07-10 21:20:50', '2024-07-10 21:20:50', NULL, NULL, NULL),
(431, 7, NULL, 152, NULL, 'هذا الحقل مطلوب', NULL, NULL, NULL, '2024-07-13 21:04:02', '2024-07-13 21:04:02', NULL, NULL, NULL),
(432, 8, NULL, 152, NULL, 'This field is required', NULL, NULL, NULL, '2024-07-13 21:04:29', '2024-07-13 21:04:29', NULL, NULL, NULL),
(433, 7, NULL, 153, NULL, 'هذا الحقل يجب ان يكون عنوان بريد الكتروني', NULL, NULL, NULL, '2024-07-13 21:05:33', '2024-07-13 21:05:33', NULL, NULL, NULL),
(434, 8, NULL, 153, NULL, 'This field must be an Email address', NULL, NULL, NULL, '2024-07-13 21:06:11', '2024-07-13 21:06:23', NULL, NULL, NULL),
(435, 7, NULL, 154, NULL, 'هذا الحقل يجب ان يكون مطابق لكلمة المرور', NULL, NULL, NULL, '2024-07-13 21:07:13', '2024-07-13 21:07:13', NULL, NULL, NULL),
(436, 8, NULL, 154, NULL, 'Not match password', NULL, NULL, NULL, '2024-07-13 21:08:32', '2024-07-13 21:08:32', NULL, NULL, NULL),
(437, 7, NULL, 155, NULL, 'كلمة المرور يجب ان تكون مكونة من 8 الى 16 محرف', NULL, NULL, NULL, '2024-07-13 21:11:37', '2024-07-13 21:12:56', NULL, NULL, NULL),
(438, 8, NULL, 155, NULL, 'This field must be between 8 to 16 letter', NULL, NULL, NULL, '2024-07-13 21:14:24', '2024-07-13 21:14:24', NULL, NULL, NULL),
(439, 7, NULL, 156, NULL, 'تم انشاء الحساب بنجاح', NULL, NULL, NULL, '2024-07-14 11:10:53', '2024-07-14 11:10:53', NULL, NULL, NULL),
(440, 8, NULL, 156, NULL, 'Account successfully created', NULL, NULL, NULL, '2024-07-14 11:11:17', '2024-07-14 11:11:17', NULL, NULL, NULL),
(441, 7, NULL, 157, NULL, 'لم يتم انشاء الحساب', NULL, NULL, NULL, '2024-07-14 11:14:19', '2024-07-14 11:14:19', NULL, NULL, NULL),
(442, 8, NULL, 157, NULL, 'The account has not been created', NULL, NULL, NULL, '2024-07-14 11:14:49', '2024-07-14 11:14:49', NULL, NULL, NULL),
(443, 7, NULL, 158, NULL, 'تعديل بيانات الحساب', NULL, NULL, NULL, '2024-07-15 07:48:22', '2024-07-15 07:48:22', NULL, NULL, NULL),
(444, 8, NULL, 158, NULL, 'Modify Account Information', NULL, NULL, NULL, '2024-07-15 07:48:42', '2024-07-15 07:57:31', NULL, NULL, NULL),
(445, 7, NULL, 159, NULL, 'تغيير كلمة المرور', NULL, NULL, NULL, '2024-07-15 07:56:46', '2024-07-15 07:56:46', NULL, NULL, NULL),
(446, 8, NULL, 159, NULL, 'Change Password', NULL, NULL, NULL, '2024-07-15 07:57:13', '2024-07-15 07:57:13', NULL, NULL, NULL),
(447, 7, NULL, 160, NULL, 'كلمة المرور القديمة', NULL, NULL, NULL, '2024-07-15 07:59:45', '2024-07-15 07:59:45', NULL, NULL, NULL),
(448, 8, NULL, 160, NULL, 'Old Password', NULL, NULL, NULL, '2024-07-15 07:59:58', '2024-07-15 07:59:58', NULL, NULL, NULL),
(449, 7, NULL, 161, NULL, 'كلمة المرور الجديدة', NULL, NULL, NULL, '2024-07-15 08:00:51', '2024-07-15 08:00:51', NULL, NULL, NULL),
(450, 8, NULL, 161, NULL, 'New Password', NULL, NULL, NULL, '2024-07-15 08:01:09', '2024-07-15 08:01:09', NULL, NULL, NULL),
(451, 7, NULL, 162, NULL, 'تأكيد كلمة المرور', NULL, NULL, NULL, '2024-07-15 08:02:59', '2024-07-15 08:02:59', NULL, NULL, NULL),
(452, 8, NULL, 162, NULL, 'Confirm Password', NULL, NULL, NULL, '2024-07-15 08:03:10', '2024-07-15 08:03:10', NULL, NULL, NULL),
(453, 7, NULL, 163, NULL, 'أدخل كلمة المرور القديمة', NULL, NULL, NULL, '2024-07-15 08:04:43', '2024-07-15 08:04:43', NULL, NULL, NULL),
(454, 8, NULL, 163, NULL, 'Enter old password', NULL, NULL, NULL, '2024-07-15 08:05:26', '2024-07-15 08:05:26', NULL, NULL, NULL),
(455, 7, NULL, 164, NULL, 'أدخل كلمة المرور الجديدة', NULL, NULL, NULL, '2024-07-15 08:07:49', '2024-07-15 08:07:49', NULL, NULL, NULL),
(456, 8, NULL, 164, NULL, 'Enter new password', NULL, NULL, NULL, '2024-07-15 08:08:14', '2024-07-15 08:08:14', NULL, NULL, NULL),
(457, 7, NULL, 165, NULL, 'أدخل كلمة المرور', NULL, NULL, NULL, '2024-07-15 08:10:06', '2024-07-15 08:10:06', NULL, NULL, NULL),
(458, 8, NULL, 165, NULL, 'Enter password', NULL, NULL, NULL, '2024-07-15 08:10:20', '2024-07-15 08:10:20', NULL, NULL, NULL),
(459, 7, NULL, 166, NULL, 'تغيير', NULL, NULL, NULL, '2024-07-15 08:11:50', '2024-07-15 08:11:50', NULL, NULL, NULL),
(460, 8, NULL, 166, NULL, 'Change', NULL, NULL, NULL, '2024-07-15 08:12:38', '2024-07-15 08:12:38', NULL, NULL, NULL),
(461, 7, NULL, 167, NULL, 'تعديل المعلومات الشخصية', NULL, NULL, NULL, '2024-07-15 08:16:19', '2024-07-15 08:16:19', NULL, NULL, NULL),
(462, 8, NULL, 167, NULL, 'Modify Personal Information', NULL, NULL, NULL, '2024-07-15 08:16:48', '2024-07-15 08:16:48', NULL, NULL, NULL),
(463, 7, NULL, 168, NULL, 'اسم المستخدم', NULL, NULL, NULL, '2024-07-15 08:29:25', '2024-07-15 08:31:08', NULL, NULL, NULL),
(464, 8, NULL, 168, NULL, 'Username', NULL, NULL, NULL, '2024-07-15 08:30:09', '2024-07-15 08:31:15', NULL, NULL, NULL),
(465, 7, NULL, 169, NULL, 'الدولة', NULL, NULL, NULL, '2024-07-15 08:32:54', '2024-07-15 08:32:54', NULL, NULL, NULL),
(466, 8, NULL, 169, NULL, 'Country', NULL, NULL, NULL, '2024-07-15 08:33:06', '2024-07-15 08:33:06', NULL, NULL, NULL),
(467, 7, NULL, 170, NULL, 'أدخل اسم المستخدم', NULL, NULL, NULL, '2024-07-15 08:34:28', '2024-07-15 08:34:28', NULL, NULL, NULL),
(468, 8, NULL, 170, NULL, 'Enter Username', NULL, NULL, NULL, '2024-07-15 08:34:33', '2024-07-15 08:34:33', NULL, NULL, NULL),
(469, 7, NULL, 171, NULL, 'الجنس', NULL, NULL, NULL, '2024-07-15 08:35:28', '2024-07-15 08:35:28', NULL, NULL, NULL),
(470, 8, NULL, 171, NULL, 'Gender', NULL, NULL, NULL, '2024-07-15 08:35:40', '2024-07-15 08:35:40', NULL, NULL, NULL),
(471, 7, NULL, 172, NULL, 'اختر', NULL, NULL, NULL, '2024-07-15 08:49:09', '2024-07-15 08:49:09', NULL, NULL, NULL),
(472, 8, NULL, 172, NULL, 'Choose', NULL, NULL, NULL, '2024-07-15 08:49:22', '2024-07-15 08:49:22', NULL, NULL, NULL),
(473, 7, NULL, 173, NULL, 'ذكر', NULL, NULL, NULL, '2024-07-15 08:51:42', '2024-07-15 08:51:42', NULL, NULL, NULL),
(474, 8, NULL, 173, NULL, 'Male', NULL, NULL, NULL, '2024-07-15 08:51:49', '2024-07-15 08:51:49', NULL, NULL, NULL),
(475, 7, NULL, 174, NULL, 'أنثى', NULL, NULL, NULL, '2024-07-15 08:52:46', '2024-07-15 08:52:46', NULL, NULL, NULL),
(476, 8, NULL, 174, NULL, 'Female', NULL, NULL, NULL, '2024-07-15 08:52:53', '2024-07-15 08:52:53', NULL, NULL, NULL),
(477, 7, NULL, 175, NULL, 'الصورة الشخصية', NULL, NULL, NULL, '2024-07-15 08:54:34', '2024-07-15 08:54:34', NULL, NULL, NULL),
(478, 8, NULL, 175, NULL, 'Personal Picture', NULL, NULL, NULL, '2024-07-15 08:54:50', '2024-07-15 08:54:50', NULL, NULL, NULL),
(479, 7, NULL, 102, NULL, 'أدخل الصورة الشخصية', NULL, NULL, NULL, '2024-07-15 08:56:29', '2024-07-15 08:56:29', NULL, NULL, NULL),
(480, 8, NULL, 176, NULL, 'Enter Personal Picture', NULL, NULL, NULL, '2024-07-15 08:56:53', '2024-07-15 08:56:53', NULL, NULL, NULL),
(481, 7, NULL, 176, NULL, 'أدخل الصورة الشخصية', NULL, NULL, NULL, '2024-07-15 08:57:07', '2024-07-15 08:57:07', NULL, NULL, NULL),
(482, 7, NULL, 177, NULL, 'يجب أن يكون الملف صورة', NULL, NULL, NULL, '2024-07-15 09:01:30', '2024-07-15 09:01:30', NULL, NULL, NULL),
(483, 8, NULL, 177, NULL, 'The file must be an image', NULL, NULL, NULL, '2024-07-15 09:01:52', '2024-07-15 09:01:52', NULL, NULL, NULL),
(484, 7, NULL, 178, NULL, 'تعديل', NULL, NULL, NULL, '2024-07-15 09:05:43', '2024-07-15 09:06:24', NULL, NULL, NULL),
(485, 8, NULL, 178, NULL, 'Update', NULL, NULL, NULL, '2024-07-15 09:05:54', '2024-07-15 09:05:54', NULL, NULL, NULL),
(486, 7, NULL, 179, NULL, 'سحب الرصيد', NULL, NULL, NULL, '2024-07-15 09:08:07', '2024-07-15 09:08:07', NULL, NULL, NULL),
(487, 8, NULL, 179, NULL, 'Withdraw a balance', NULL, NULL, NULL, '2024-07-15 09:08:16', '2024-07-15 09:08:16', NULL, NULL, NULL),
(488, 7, NULL, 180, NULL, 'الرصيد غير كافي', NULL, NULL, NULL, '2024-07-15 09:14:56', '2024-07-15 09:14:56', NULL, NULL, NULL),
(489, 8, NULL, 180, NULL, 'The balance is insufficient', NULL, NULL, NULL, '2024-07-15 09:15:08', '2024-07-15 09:15:08', NULL, NULL, NULL),
(490, 7, NULL, 181, NULL, 'حذف الحساب', NULL, NULL, NULL, '2024-07-15 09:17:00', '2024-07-15 09:17:00', NULL, NULL, NULL),
(491, 8, NULL, 181, NULL, 'Delete Account', NULL, NULL, NULL, '2024-07-15 09:17:29', '2024-07-15 09:17:29', NULL, NULL, NULL),
(492, 7, NULL, 182, NULL, 'ستفقد جميع أنواع المحتوى والبيانات الواردة والنقاط في هذا الحساب', NULL, NULL, NULL, '2024-07-15 09:19:27', '2024-07-15 09:19:27', NULL, NULL, NULL),
(493, 8, NULL, 182, NULL, 'You will lose all types of content, data received and points in this account', NULL, NULL, NULL, '2024-07-15 09:19:46', '2024-07-15 09:19:46', NULL, NULL, NULL),
(494, 8, NULL, 183, NULL, 'Delete', NULL, NULL, NULL, '2024-07-15 09:21:29', '2024-07-15 09:21:29', NULL, NULL, NULL),
(495, 7, NULL, 183, NULL, 'حذف', NULL, NULL, NULL, '2024-07-15 09:21:39', '2024-07-15 09:21:39', NULL, NULL, NULL),
(498, 7, NULL, 185, NULL, 'أدخل عدد النقاط المطلوب سحبها', NULL, NULL, NULL, '2024-07-15 09:26:38', '2024-07-15 09:26:38', NULL, NULL, NULL),
(499, 8, NULL, 185, NULL, 'Enter the number of points to be withdrawn', NULL, NULL, NULL, '2024-07-15 09:26:53', '2024-07-15 09:26:53', NULL, NULL, NULL),
(500, 7, NULL, 186, NULL, 'رصيدك:', NULL, NULL, NULL, '2024-07-15 09:29:06', '2024-07-15 09:29:06', NULL, NULL, NULL),
(501, 8, NULL, 186, NULL, 'Your balance:', NULL, NULL, NULL, '2024-07-15 09:29:22', '2024-07-15 09:29:22', NULL, NULL, NULL),
(502, 7, NULL, 187, NULL, 'القيمة:', NULL, NULL, NULL, '2024-07-15 09:31:24', '2024-07-15 09:31:24', NULL, NULL, NULL),
(503, 8, NULL, 187, NULL, 'The value:', NULL, NULL, NULL, '2024-07-15 09:31:41', '2024-07-15 09:31:41', NULL, NULL, NULL),
(504, 7, NULL, 188, NULL, 'سحب', NULL, NULL, NULL, '2024-07-15 09:32:58', '2024-07-15 09:32:58', NULL, NULL, NULL),
(505, 8, NULL, 188, NULL, 'Withdraw', NULL, NULL, NULL, '2024-07-15 09:33:40', '2024-07-15 09:33:40', NULL, NULL, NULL),
(506, 7, NULL, 189, NULL, 'هذا الحقل يجب ان لا يحوي رموز', NULL, NULL, NULL, '2024-07-15 11:32:11', '2024-07-15 11:32:11', NULL, NULL, NULL),
(507, 8, NULL, 189, NULL, 'This field must contain alpha-numeric only', NULL, NULL, NULL, '2024-07-15 11:33:17', '2024-07-15 11:33:17', NULL, NULL, NULL),
(508, 7, NULL, 190, NULL, 'اسم المستخدم موجود', NULL, NULL, NULL, '2024-07-15 11:34:18', '2024-07-15 11:34:18', NULL, NULL, NULL),
(509, 8, NULL, 190, NULL, 'The user name is already exist', NULL, NULL, NULL, '2024-07-15 11:34:37', '2024-07-15 11:34:37', NULL, NULL, NULL),
(510, 7, NULL, 191, NULL, 'عنوان البريد الاكتروني موجود', NULL, NULL, NULL, '2024-07-15 11:35:17', '2024-07-15 11:35:17', NULL, NULL, NULL),
(511, 8, NULL, 191, NULL, 'Email is already exist', NULL, NULL, NULL, '2024-07-15 11:35:52', '2024-07-15 11:35:52', NULL, NULL, NULL),
(512, 7, NULL, 192, NULL, 'الملف يجب ان يكون صورة', NULL, NULL, NULL, '2024-07-15 11:37:00', '2024-07-15 11:37:00', NULL, NULL, NULL),
(513, 8, NULL, 192, NULL, 'File must be an image', NULL, NULL, NULL, '2024-07-15 11:37:14', '2024-07-15 11:37:19', NULL, NULL, NULL),
(514, 7, NULL, 193, NULL, 'هذا الحقل يجب ان يحوي من1 الى 100 حرف', NULL, NULL, NULL, '2024-07-15 11:41:54', '2024-07-15 11:41:54', NULL, NULL, NULL),
(515, 8, NULL, 193, NULL, 'This field must be between 1 to 100 letter', NULL, NULL, NULL, '2024-07-15 11:42:50', '2024-07-15 11:42:50', NULL, NULL, NULL),
(516, 7, NULL, 194, NULL, 'البريد الالكتروني او كلمة المرور غير صحيحة', NULL, NULL, NULL, '2024-07-15 12:04:30', '2024-07-15 12:04:30', NULL, NULL, NULL),
(517, 8, NULL, 194, NULL, 'Email or password is incorrect', NULL, NULL, NULL, '2024-07-15 12:04:59', '2024-07-15 12:04:59', NULL, NULL, NULL),
(518, 7, NULL, 195, NULL, 'لم يتم تسجيل الدخول', NULL, NULL, NULL, '2024-07-15 12:10:38', '2024-07-15 12:10:38', NULL, NULL, NULL),
(519, 8, NULL, 195, NULL, 'Login Failed', NULL, NULL, NULL, '2024-07-15 12:10:59', '2024-07-15 12:10:59', NULL, NULL, NULL),
(520, 7, NULL, 196, NULL, 'كلمة المرور غير صحيحة', NULL, NULL, NULL, '2024-07-15 12:38:22', '2024-07-15 12:38:22', NULL, NULL, NULL),
(521, 8, NULL, 196, NULL, 'Incorrect password', NULL, NULL, NULL, '2024-07-15 12:38:40', '2024-07-15 12:38:40', NULL, NULL, NULL),
(522, 7, NULL, 197, NULL, 'تمت العملية بنجاح', NULL, NULL, NULL, '2024-07-15 13:07:16', '2024-07-15 13:07:16', NULL, NULL, NULL),
(523, 8, NULL, 197, NULL, 'Success', NULL, NULL, NULL, '2024-07-15 13:07:58', '2024-07-15 13:07:58', NULL, NULL, NULL),
(524, 7, NULL, 198, NULL, 'لم تنجح العملية', NULL, NULL, NULL, '2024-07-15 13:08:30', '2024-07-15 13:08:30', NULL, NULL, NULL),
(525, 8, NULL, 198, NULL, 'Failed', NULL, NULL, NULL, '2024-07-15 13:08:48', '2024-07-15 13:08:48', NULL, NULL, NULL),
(526, 7, NULL, 199, NULL, 'تم حذف الحساب بنجاح!', NULL, NULL, NULL, '2024-07-15 13:13:06', '2024-07-15 13:13:06', NULL, NULL, NULL),
(527, 8, NULL, 199, NULL, 'Account is deleted !', NULL, NULL, NULL, '2024-07-15 13:13:35', '2024-07-15 13:13:43', NULL, NULL, NULL),
(528, 7, NULL, 200, NULL, 'اختر الدولة', NULL, NULL, NULL, '2024-07-15 13:17:07', '2024-07-15 13:17:07', NULL, NULL, NULL),
(529, 8, NULL, 200, NULL, 'Choose country', NULL, NULL, NULL, '2024-07-15 13:17:44', '2024-07-15 13:17:44', NULL, NULL, NULL),
(530, 7, NULL, 201, NULL, 'هذا الحقل يجب ان يحوي ارقام فقط', NULL, NULL, NULL, '2024-07-15 13:35:32', '2024-07-15 13:35:32', NULL, NULL, NULL),
(531, 8, NULL, 201, NULL, 'This field must contain only numbers.', NULL, NULL, NULL, '2024-07-15 13:35:59', '2024-07-15 13:35:59', NULL, NULL, NULL),
(532, 7, NULL, 202, NULL, 'هذا الحقل يجب ان يكون اكبر من 0', NULL, NULL, NULL, '2024-07-15 13:37:37', '2024-07-15 13:37:37', NULL, NULL, NULL),
(533, 8, NULL, 202, NULL, 'This field must be greater than 0', NULL, NULL, NULL, '2024-07-15 13:38:09', '2024-07-15 13:38:09', NULL, NULL, NULL),
(534, 7, NULL, 203, NULL, 'عدد النقاط اكبر من الرصيد', NULL, NULL, NULL, '2024-07-15 13:40:45', '2024-07-15 13:40:45', NULL, NULL, NULL),
(535, 8, NULL, 203, NULL, 'The points is greater than balance', NULL, NULL, NULL, '2024-07-15 13:41:10', '2024-07-15 13:41:10', NULL, NULL, NULL),
(536, 7, NULL, 204, NULL, 'عدد النقاط اقل من الحد الادنى المطلوب للسحب', NULL, NULL, NULL, '2024-07-15 13:42:31', '2024-07-15 13:42:31', NULL, NULL, NULL),
(537, 8, NULL, 204, NULL, 'The points is less than minimum value', NULL, NULL, NULL, '2024-07-15 13:43:31', '2024-07-15 13:43:31', NULL, NULL, NULL),
(538, 7, 22, NULL, NULL, 'سياسة الخصوصية', '<p>شكرًا لاختيارك موقع Quiz. إنّ موقعنا يحترم خصوصيتك ويحرص على حماية بياناتك الشخصية. يمكنك الاطلاع على بنود سياسة الخصوصية أدناه لمعرفة المزيد.</p>\r\n\r\n<p>توضّح سياسة الخصوصية هذه، الأساس الذي سنقوم بموجبه بجمع واستخدام بياناتك الشخصية، كما تذكر أيضًا جميع الإجراءات التي نتبعها لضمان خصوصية معلوماتك. وأخيرًا، تحدّد السياسة الخيارات المتاحة أمامك فيما يتعلّق بجمع بياناتك الشخصية واستخدامها والكشف عنها.</p>\r\n\r\n<p>باستخدامك الموقع والاستفادة من خدماتنا فإنك توافق على التعامل مع بياناتك الشخصية بما يتفق مع سياسة الخصوصية هذه.</p>', NULL, NULL, '2024-07-16 08:13:42', '2024-07-16 08:16:23', NULL, NULL, NULL),
(539, 8, 22, NULL, NULL, 'Privacy Policy', '<p>Thank you for choosing Quiz. Our website respects your privacy and is keen to protect your personal data. You can view the terms of the privacy policy below to learn more.</p>\r\n\r\n<p>This Privacy Policy explains the basis on which we will collect and use your personal data, and also sets out all the procedures we follow to ensure the privacy of your information. Finally, the Policy sets out the choices available to you regarding the collection, use and disclosure of your personal data.</p>\r\n\r\n<p>By using the Forsa website and benefiting from our services, you agree to treat your personal data in accordance with this privacy policy.</p>', NULL, NULL, '2024-07-16 08:14:07', '2024-07-16 08:15:00', NULL, NULL, NULL),
(540, 7, 35, NULL, NULL, 'الشروط و الاحكام', '<p>اتفاقية استخدام الموقع الالكتروني</p>\r\n<p>\r\nيوافق المستخدم على شروط وأحكام الاتفاقية عند استخدام الموقع الالكتروني ، وفي حالة عدم الرضا عنه أو عن المحتويات يمكنه التوقف عن استخدامه</p>', NULL, NULL, '2024-07-16 08:17:51', '2024-07-16 08:30:04', NULL, NULL, NULL),
(541, 8, 35, NULL, NULL, 'Terms and Conditions', NULL, NULL, NULL, '2024-07-16 08:18:01', '2024-07-16 08:18:01', NULL, NULL, NULL),
(548, 7, NULL, 208, NULL, 'التسجيل باستخدام Gmail', NULL, NULL, NULL, '2024-07-31 11:31:38', '2024-07-31 11:31:38', NULL, NULL, NULL),
(549, 8, NULL, 208, NULL, 'Login by Gmail', NULL, NULL, NULL, '2024-07-31 11:32:03', '2024-07-31 11:32:03', NULL, NULL, NULL),
(550, 7, NULL, 209, NULL, 'أو', NULL, NULL, NULL, '2024-07-31 11:35:37', '2024-07-31 11:35:37', NULL, NULL, NULL),
(551, 8, NULL, 209, NULL, 'or', NULL, NULL, NULL, '2024-07-31 11:35:46', '2024-07-31 11:35:46', NULL, NULL, NULL),
(552, 7, 38, NULL, NULL, 'عربي', '<p>سشؤ</p>', NULL, NULL, '2024-08-09 18:49:10', '2024-08-09 18:49:10', NULL, NULL, NULL),
(553, 8, 38, NULL, NULL, 'scsc', '<p>scsccaaa</p>', NULL, NULL, '2024-08-09 18:49:24', '2024-08-09 18:49:24', NULL, NULL, NULL),
(566, 7, NULL, NULL, NULL, 'معلومات تسجيل الدخول', NULL, NULL, NULL, '2024-08-12 09:03:32', '2024-08-12 09:03:32', 10, NULL, NULL),
(567, 8, NULL, NULL, NULL, 'Login info', NULL, NULL, NULL, '2024-08-12 09:03:52', '2024-08-12 09:03:52', 10, NULL, NULL),
(568, 7, NULL, NULL, NULL, 'الجنسية و الإقامة', NULL, NULL, NULL, '2024-08-12 09:04:17', '2024-08-12 09:04:17', 11, NULL, NULL),
(569, 8, NULL, NULL, NULL, 'Nationality and residence', NULL, NULL, NULL, '2024-08-12 09:04:57', '2024-08-12 09:04:57', 11, NULL, NULL),
(570, 7, NULL, NULL, NULL, 'الحالة الإجتماعية', NULL, NULL, NULL, '2024-08-12 09:05:15', '2024-08-12 09:05:15', 12, NULL, NULL),
(571, 8, NULL, NULL, NULL, 'Marital status', NULL, NULL, NULL, '2024-08-12 09:05:38', '2024-08-12 09:05:38', 12, NULL, NULL),
(572, 7, NULL, NULL, NULL, 'مواصفاتك', NULL, NULL, NULL, '2024-08-12 09:06:33', '2024-08-12 09:06:33', 13, NULL, NULL),
(573, 8, NULL, NULL, NULL, 'Your specifications', NULL, NULL, NULL, '2024-08-12 09:06:54', '2024-08-12 09:06:54', 13, NULL, NULL),
(574, 7, NULL, NULL, NULL, 'الإلتزام الديني', NULL, NULL, NULL, '2024-08-12 09:07:26', '2024-08-12 09:07:26', 14, NULL, NULL),
(575, 8, NULL, NULL, NULL, 'Religious commitment', NULL, NULL, NULL, '2024-08-12 09:07:40', '2024-08-12 09:07:40', 14, NULL, NULL),
(576, 7, NULL, NULL, NULL, 'الدراسة و العمل', NULL, NULL, NULL, '2024-08-12 09:07:58', '2024-08-12 09:07:58', 15, NULL, NULL),
(577, 8, NULL, NULL, NULL, 'Study and work', NULL, NULL, NULL, '2024-08-12 09:08:18', '2024-08-12 09:08:18', 15, NULL, NULL),
(578, 7, NULL, NULL, NULL, 'مواصفات شريكة حياتك التي ترغب الإرتباط بها', 'مواصفات شريك حياتك الذي ترغبين الإرتباط به', NULL, NULL, '2024-08-12 09:09:44', '2024-08-12 09:09:44', 16, NULL, NULL),
(579, 8, NULL, NULL, NULL, 'Specifications of the life partner you want to marry', '<p>Specifications of the life partner you want to marry<br></p>', NULL, NULL, '2024-08-12 09:10:12', '2024-08-12 09:10:12', 16, NULL, NULL),
(580, 7, NULL, NULL, NULL, 'تحدث عن نفسك', NULL, NULL, NULL, '2024-08-12 09:10:40', '2024-08-12 09:10:40', 17, NULL, NULL),
(581, 8, NULL, NULL, NULL, 'Talk about yourself', NULL, NULL, NULL, '2024-08-12 09:11:12', '2024-08-12 09:11:12', 17, NULL, NULL),
(582, 7, NULL, NULL, NULL, 'البيانات السرية', NULL, NULL, NULL, '2024-08-12 09:11:37', '2024-08-12 09:11:37', 18, NULL, NULL),
(583, 8, NULL, NULL, NULL, 'Confidential data', NULL, NULL, NULL, '2024-08-12 09:11:56', '2024-08-12 09:11:56', 18, NULL, NULL),
(584, 7, NULL, NULL, NULL, 'رقم العضوية', NULL, NULL, NULL, '2024-08-12 09:13:14', '2024-08-12 09:13:14', NULL, 4, NULL),
(585, 8, NULL, NULL, NULL, 'Membership number', NULL, NULL, NULL, '2024-08-12 09:13:34', '2024-08-12 09:13:34', NULL, 4, NULL),
(586, 7, NULL, NULL, NULL, 'مكان الإقامة', NULL, NULL, NULL, '2024-08-12 09:14:08', '2024-08-12 09:14:08', NULL, 5, NULL),
(587, 8, NULL, NULL, NULL, 'Place of residence', NULL, NULL, NULL, '2024-08-12 09:14:27', '2024-08-12 09:14:27', NULL, 5, NULL),
(588, 7, NULL, NULL, NULL, 'الجنسية', NULL, NULL, NULL, '2024-08-12 09:15:24', '2024-08-12 09:16:31', NULL, 6, NULL),
(589, 8, NULL, NULL, NULL, 'Nationality', NULL, NULL, NULL, '2024-08-12 09:16:48', '2024-08-12 09:16:48', NULL, 6, NULL),
(590, 8, NULL, NULL, NULL, 'City', NULL, NULL, NULL, '2024-08-12 09:17:44', '2024-08-12 09:17:44', NULL, 7, NULL),
(591, 7, NULL, NULL, NULL, 'المدينة', NULL, NULL, NULL, '2024-08-12 09:17:56', '2024-08-12 09:17:56', NULL, 7, NULL),
(592, 7, NULL, NULL, NULL, 'نوع الزواج', NULL, NULL, NULL, '2024-08-12 09:19:26', '2024-08-12 09:19:26', NULL, 8, NULL),
(593, 8, NULL, NULL, NULL, 'Type of marriage', NULL, NULL, NULL, '2024-08-12 09:19:41', '2024-08-12 09:19:41', NULL, 8, NULL),
(594, 7, NULL, NULL, NULL, 'الحالة العائلية', NULL, NULL, NULL, '2024-08-12 09:20:29', '2024-08-12 09:20:29', NULL, 9, NULL),
(595, 8, NULL, NULL, NULL, 'Family situation', NULL, NULL, NULL, '2024-08-12 09:21:05', '2024-08-12 09:21:05', NULL, 9, NULL),
(596, 7, NULL, NULL, NULL, 'العمر', NULL, NULL, NULL, '2024-08-12 09:21:32', '2024-08-12 09:21:32', NULL, 10, NULL),
(597, 8, NULL, NULL, NULL, 'Age', NULL, NULL, NULL, '2024-08-12 09:21:47', '2024-08-12 09:21:47', NULL, 10, NULL),
(598, 7, NULL, NULL, NULL, 'عدد الأطفال', NULL, NULL, NULL, '2024-08-12 09:22:10', '2024-08-12 09:22:10', NULL, 11, NULL),
(599, 8, NULL, NULL, NULL, 'Number of children', NULL, NULL, NULL, '2024-08-12 09:22:28', '2024-08-12 09:22:28', NULL, 11, NULL),
(600, 7, NULL, NULL, NULL, 'زوجة اولى', NULL, NULL, NULL, '2024-08-12 11:33:46', '2024-08-12 11:33:46', NULL, NULL, 1),
(601, 8, NULL, NULL, NULL, 'First wife', NULL, NULL, NULL, '2024-08-12 11:34:03', '2024-08-12 11:34:03', NULL, NULL, 1),
(602, 7, NULL, NULL, NULL, 'زوجة ثانية', NULL, NULL, NULL, '2024-08-12 11:35:09', '2024-08-12 11:35:09', NULL, NULL, 2),
(603, 8, NULL, NULL, NULL, 'Second wife', NULL, NULL, NULL, '2024-08-12 11:35:27', '2024-08-12 11:35:27', NULL, NULL, 2),
(604, 7, NULL, NULL, NULL, 'الوزن', NULL, NULL, NULL, '2024-08-12 13:13:06', '2024-08-12 13:13:06', NULL, 13, NULL),
(605, 7, NULL, NULL, NULL, 'الطول', NULL, NULL, NULL, '2024-08-12 13:13:31', '2024-08-12 13:13:31', NULL, 14, NULL),
(606, 7, NULL, NULL, NULL, 'لون البشرة', NULL, NULL, NULL, '2024-08-12 13:14:15', '2024-08-12 13:14:15', NULL, 15, NULL),
(607, 7, NULL, NULL, NULL, 'بنية الجسم', NULL, NULL, NULL, '2024-08-12 13:14:32', '2024-08-12 13:14:32', NULL, 16, NULL),
(608, 7, NULL, NULL, NULL, 'التدين', NULL, NULL, NULL, '2024-08-12 13:15:01', '2024-08-12 13:15:01', NULL, 17, NULL),
(609, 7, NULL, NULL, NULL, 'الصلاة', NULL, NULL, NULL, '2024-08-12 13:15:18', '2024-08-12 13:15:18', NULL, 18, NULL),
(610, 7, NULL, NULL, NULL, 'التدخين', NULL, NULL, NULL, '2024-08-12 13:15:59', '2024-08-12 13:15:59', NULL, 19, NULL),
(611, 7, NULL, NULL, NULL, 'اللحية', NULL, NULL, NULL, '2024-08-12 13:16:15', '2024-08-12 13:16:15', NULL, 20, NULL),
(612, 7, NULL, NULL, NULL, 'المستوى التعليمي', NULL, NULL, NULL, '2024-08-12 13:16:38', '2024-08-12 13:16:38', NULL, 21, NULL),
(613, 7, NULL, NULL, NULL, 'مجال العمل', NULL, NULL, NULL, '2024-08-12 13:17:07', '2024-08-12 13:17:07', NULL, 22, NULL),
(614, 7, NULL, NULL, NULL, 'الدخل الشهري', NULL, NULL, NULL, '2024-08-12 13:17:48', '2024-08-12 13:17:48', NULL, 23, NULL),
(615, 7, NULL, NULL, NULL, 'الوضع المادي', NULL, NULL, NULL, '2024-08-12 13:18:10', '2024-08-12 13:18:10', NULL, 24, NULL),
(616, 7, NULL, NULL, NULL, 'الوظيفة', NULL, NULL, NULL, '2024-08-12 13:18:32', '2024-08-12 13:18:32', NULL, 25, NULL),
(617, 7, NULL, NULL, NULL, 'الحالة الصحية', NULL, NULL, NULL, '2024-08-12 13:18:54', '2024-08-12 13:18:54', NULL, 26, NULL),
(618, 7, NULL, NULL, NULL, 'مواصفات شريكة حياتك التي ترغب الإرتباط بها', NULL, NULL, NULL, '2024-08-12 13:19:26', '2024-08-12 13:19:26', NULL, 27, NULL),
(619, 7, NULL, NULL, NULL, 'تحدث عن نفسك', NULL, NULL, NULL, '2024-08-12 13:19:50', '2024-08-12 13:19:50', NULL, 28, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int DEFAULT '0',
  `answers_count` int DEFAULT '0',
  `points` int DEFAULT '0',
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `value`, `answers_count`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الاول', 1, 3, 0, '1', '2024-07-01 21:16:42', '2024-07-20 19:27:13'),
(2, 'الثاني', 2, 5, 5, '1', '2024-07-01 21:17:13', '2024-07-20 19:26:57'),
(4, 'الثالث', 3, 30, 5, '1', '2024-07-10 13:30:41', '2024-07-13 19:25:28'),
(5, 'الرابع', 4, 40, 5, '1', '2024-07-10 13:31:07', '2024-07-13 19:25:40'),
(6, 'الخامس', 5, 50, 5, '1', '2024-07-10 13:31:36', '2024-07-13 19:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `is_active`) VALUES
(1, 'header-social', 1),
(2, 'footer-social', 1),
(3, 'footer-sec-1', 1),
(4, 'footer-sec-2', 1),
(5, 'footer-sec-3', 1),
(6, 'footer-social-title', 1),
(7, 'footer-bottom', 1),
(8, 'main-menu', 1),
(9, 'whatsbutton', 1),
(10, 'footer-menu', 1),
(11, 'cats', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_settings`
--

DROP TABLE IF EXISTS `location_settings`;
CREATE TABLE IF NOT EXISTS `location_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `setting_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `is_active` int DEFAULT '0',
  `main_table` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_settings`
--

INSERT INTO `location_settings` (`id`, `location_id`, `setting_id`, `type`, `dep`, `sequence`, `is_active`, `main_table`, `category_id`, `post_id`) VALUES
(7, 1, 16, NULL, NULL, 0, 1, NULL, NULL, NULL),
(9, 1, 15, NULL, NULL, 3, 1, NULL, NULL, NULL),
(10, 1, 14, NULL, NULL, 1, 1, NULL, NULL, NULL),
(13, 2, 14, NULL, NULL, 1, 1, NULL, NULL, NULL),
(14, 2, 15, NULL, NULL, 2, 1, NULL, NULL, NULL),
(15, 2, 16, NULL, NULL, 0, 1, NULL, NULL, NULL),
(16, 2, 17, NULL, NULL, 3, 1, NULL, NULL, NULL),
(17, 3, NULL, NULL, NULL, 0, 1, 'posts', NULL, 1),
(18, 4, NULL, NULL, NULL, 1, 1, 'posts', NULL, 2),
(19, 5, NULL, NULL, NULL, 2, 1, 'posts', NULL, 3),
(20, 6, NULL, NULL, NULL, 3, 1, 'posts', NULL, 4),
(21, 7, NULL, NULL, NULL, 4, 1, 'posts', NULL, 5),
(29, 1, 17, NULL, NULL, 2, 1, NULL, NULL, NULL),
(30, 9, 19, NULL, NULL, 1, 1, NULL, NULL, NULL),
(49, 10, NULL, NULL, NULL, 0, 1, 'categories', 22, NULL),
(50, 10, NULL, NULL, NULL, 1, 1, 'categories', 21, NULL),
(72, 11, NULL, NULL, NULL, 0, 1, 'categories', 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mediastore`
--

DROP TABLE IF EXISTS `mediastore`;
CREATE TABLE IF NOT EXISTS `mediastore` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=436 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediastore`
--

INSERT INTO `mediastore` (`id`, `name`, `caption`, `title`, `local_path`, `type`, `sequence`, `created_at`, `updated_at`) VALUES
(15, '6264415.webp', '', '', 'projects', 'image', 0, '2024-04-13 20:22:08', '2024-04-13 20:22:09'),
(24, '1741124.webp', '', '', 'projects', 'image', 0, '2024-04-19 08:00:10', '2024-04-19 08:00:11'),
(42, '4029642.webp', '', '', 'projects', 'image', 0, '2024-04-19 19:56:29', '2024-04-20 14:06:58'),
(43, '9275843.webp', 'dd', '', 'projects', 'image', 0, '2024-04-19 19:56:29', '2024-04-20 14:50:04'),
(45, '5126345.webp', 'ee', '', 'projects', 'image', 0, '2024-04-19 20:25:45', '2024-04-19 20:25:45'),
(47, '1612547.webp', '', '', 'projects', 'image', 0, '2024-04-19 20:25:46', '2024-04-19 20:26:14'),
(50, '1697350.webp', '', '', 'projects', 'image', 0, '2024-04-19 21:48:58', '2024-04-19 21:48:58'),
(51, '7113051.webp', '', '', 'projects', 'image', 0, '2024-04-19 21:57:39', '2024-04-20 14:08:44'),
(62, '2201762.mp4', 'sacas', '', 'projects', 'video', 0, '2024-04-20 15:15:49', '2024-04-20 15:15:49'),
(74, '8149174.mp4', '', '', 'projects', 'video', 0, '2024-04-20 19:42:14', '2024-04-20 19:42:14'),
(116, '27274116.webp', '', '', 'posts', 'image', 0, '2024-05-06 09:08:19', '2024-05-16 15:21:54'),
(117, '30015117.webp', '', '', 'posts', 'image', 0, '2024-05-06 09:08:50', '2024-05-16 15:07:33'),
(118, '63385118.webp', '', '', 'posts', 'image', 0, '2024-05-06 09:10:02', '2024-05-16 15:22:19'),
(119, '18843119.webp', '', '', 'posts', 'image', 0, '2024-05-06 09:10:41', '2024-05-16 15:21:28'),
(233, '24720233.pdf', '', '', 'categories', 'pdf', 0, '2024-05-09 11:57:49', '2024-05-09 12:02:30'),
(234, '17754234.webp', '', '', 'posts', 'image', 0, '2024-05-16 14:12:31', '2024-05-16 15:23:09'),
(235, '95264235.webp', '', '', 'posts', 'image', 0, '2024-05-16 14:13:29', '2024-05-16 15:23:27'),
(236, '42468236.webp', '', '', 'posts', 'image', 0, '2024-05-16 14:14:00', '2024-05-16 15:23:48'),
(237, '81326237.webp', '', '', 'posts', 'image', 0, '2024-05-16 14:14:34', '2024-05-16 15:24:17'),
(296, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:15:00', '2024-05-20 15:15:00'),
(297, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:16:23', '2024-05-20 15:16:23'),
(298, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:16:41', '2024-05-20 15:16:41'),
(299, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:19:03', '2024-05-20 15:19:03'),
(300, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:19:38', '2024-05-20 15:19:38'),
(301, NULL, '', '', 'posts', 'image', 0, '2024-05-20 15:21:13', '2024-05-20 15:21:13'),
(328, '74003328.webp', '', '', 'categories', 'image', 0, '2024-05-20 21:09:00', '2024-05-20 21:09:01'),
(329, '37614329.mp4', '', '', 'categories', 'video', 0, '2024-05-20 21:09:29', '2024-05-20 21:09:29'),
(339, '75501339.webp', '', '', 'categories', 'image', 0, '2024-05-22 20:03:10', '2024-05-22 20:03:10'),
(340, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:28:37', '2024-05-26 19:28:37'),
(341, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:28:43', '2024-05-26 19:28:43'),
(342, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:28:45', '2024-05-26 19:28:45'),
(343, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:28:47', '2024-05-26 19:28:47'),
(348, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:30:50', '2024-05-26 19:30:50'),
(353, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:39:09', '2024-05-26 19:39:09'),
(354, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:39:56', '2024-05-26 19:39:56'),
(355, NULL, '', '', 'posts', 'image', 0, '2024-05-26 19:41:57', '2024-05-26 19:41:57'),
(428, '61535428.webp', 'علوم', '', 'categories', 'image', 0, '2024-07-01 20:03:00', '2024-07-09 07:56:17'),
(430, '51332430.webp', '', '', 'categories', 'image', 0, '2024-07-06 18:20:24', '2024-07-09 08:02:18'),
(431, '14683431.webp', '', '', 'categories', 'image', 0, '2024-07-06 19:58:00', '2024-07-09 07:48:42'),
(432, '76499432.webp', '', '', 'categories', 'image', 0, '2024-07-06 20:12:40', '2024-07-09 07:51:05'),
(435, '91804435.webp', '', '', 'categories', 'image', 0, '2024-07-09 12:41:56', '2024-07-09 12:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `media_posts`
--

DROP TABLE IF EXISTS `media_posts`;
CREATE TABLE IF NOT EXISTS `media_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `main_table` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `status` int DEFAULT '0',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=348 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_posts`
--

INSERT INTO `media_posts` (`id`, `media_id`, `category_id`, `post_id`, `main_table`, `sequence`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(3, 77, 3, NULL, NULL, 0, 1, NULL, '2024-04-28 12:59:32', '2024-04-28 12:59:32'),
(4, 78, 3, NULL, NULL, 0, 1, NULL, '2024-04-28 13:04:03', '2024-04-28 13:04:03'),
(5, 79, 3, NULL, NULL, 0, 1, NULL, '2024-04-28 13:11:16', '2024-04-28 13:11:16'),
(6, 80, 3, NULL, NULL, 0, 1, NULL, '2024-04-28 13:11:16', '2024-04-28 13:11:16'),
(42, 116, NULL, 24, NULL, 0, 1, NULL, '2024-05-06 09:08:19', '2024-05-06 09:08:19'),
(43, 117, NULL, 22, NULL, 0, 1, NULL, '2024-05-06 09:08:50', '2024-05-06 09:08:50'),
(44, 118, NULL, 25, NULL, 0, 1, NULL, '2024-05-06 09:10:02', '2024-05-06 09:10:02'),
(45, 119, NULL, 23, NULL, 0, 1, NULL, '2024-05-06 09:10:41', '2024-05-06 09:10:41'),
(159, 233, 17, NULL, NULL, 0, 1, NULL, '2024-05-09 11:57:49', '2024-05-09 11:57:49'),
(160, 234, NULL, 33, NULL, 0, 1, NULL, '2024-05-16 14:12:31', '2024-05-16 14:12:31'),
(161, 235, NULL, 34, NULL, 0, 1, NULL, '2024-05-16 14:13:29', '2024-05-16 14:13:29'),
(162, 236, NULL, 35, NULL, 0, 1, NULL, '2024-05-16 14:14:00', '2024-05-16 14:14:00'),
(163, 237, NULL, 36, NULL, 0, 1, NULL, '2024-05-16 14:14:35', '2024-05-16 14:14:35'),
(248, 328, 19, NULL, NULL, 0, 1, NULL, '2024-05-20 21:09:01', '2024-05-20 21:09:01'),
(249, 329, 19, NULL, NULL, 0, 1, NULL, '2024-05-20 21:09:29', '2024-05-20 21:09:29'),
(259, 339, 20, NULL, NULL, 0, 1, NULL, '2024-05-22 20:03:10', '2024-05-22 20:03:10'),
(340, 428, 28, NULL, NULL, 0, 1, NULL, '2024-07-01 20:03:00', '2024-07-01 20:03:00'),
(342, 430, 33, NULL, NULL, 0, 1, NULL, '2024-07-06 18:20:25', '2024-07-06 18:20:25'),
(343, 431, 24, NULL, NULL, 0, 1, NULL, '2024-07-06 19:58:00', '2024-07-06 19:58:00'),
(344, 432, 25, NULL, NULL, 0, 1, NULL, '2024-07-06 20:12:40', '2024-07-06 20:12:40'),
(347, 435, 34, NULL, NULL, 0, 1, NULL, '2024-07-09 12:41:56', '2024-07-09 12:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `media_projects`
--

DROP TABLE IF EXISTS `media_projects`;
CREATE TABLE IF NOT EXISTS `media_projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint UNSIGNED DEFAULT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `status` int DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_projects`
--

INSERT INTO `media_projects` (`id`, `created_at`, `updated_at`, `project_id`, `media_id`, `sequence`, `status`, `notes`) VALUES
(15, '2024-04-13 20:22:09', '2024-04-13 20:22:09', 4, 15, 0, 1, NULL),
(24, '2024-04-19 08:00:11', '2024-04-19 08:00:11', 6, 24, 0, 1, NULL),
(42, '2024-04-19 19:56:29', '2024-04-19 19:56:29', 1, 42, 0, 1, NULL),
(43, '2024-04-19 19:56:29', '2024-04-19 19:56:29', 1, 43, 0, 1, NULL),
(45, '2024-04-19 20:25:45', '2024-04-19 20:25:45', 1, 45, 0, 1, NULL),
(47, '2024-04-19 20:25:46', '2024-04-19 20:25:46', 1, 47, 0, 1, NULL),
(50, '2024-04-19 21:48:58', '2024-04-19 21:48:58', 1, 50, 0, 1, NULL),
(51, '2024-04-19 21:57:39', '2024-04-19 21:57:39', 1, 51, 0, 1, NULL),
(74, '2024-04-20 19:42:14', '2024-04-20 19:42:14', 1, 74, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(113, '2024_06_24_160945_add_total_balance_to_clients_table', 1),
(114, '2024_06_29_171614_create_questions_table', 1),
(115, '2024_06_29_171616_create_answers_table', 1),
(116, '2024_06_29_171617_create_levels_table', 1),
(117, '2024_06_29_171619_create_answers_clients_table', 1),
(118, '2024_06_29_171620_create_clients_points_table', 1),
(119, '2024_06_29_171621_create_points_trans_table', 1),
(120, '2024_06_24_160945_add_lang_id_to_clients_table', 2),
(121, '2024_07_02_142203_add_question_id_to_answers_table', 3),
(122, '2024_07_02_142236_add_level_id_to_lang_posts_table', 3),
(123, '2024_07_02_150744_add_sequence_to_answers_table', 4),
(124, '2024_07_10_214609_add_category_id_to_answers_clients_table', 5),
(125, '2024_07_13_141010_add_pointsrate_to_points_trans_table', 6),
(126, '2024_07_13_141010_add_balance_before_to_points_trans_table', 7),
(127, '2024_08_10_180702_create_properties_table', 8),
(128, '2024_08_10_180704_create_optionsvalues_table', 8),
(129, '2024_08_10_180705_create_clients_options_table', 8),
(130, '2024_08_10_190103_add_image_to_properties_table', 9),
(131, '2024_08_10_203607_create_properties_deps_table', 10),
(132, '2024_08_10_204045_add_dep_id_to_properties_table', 11),
(133, '2024_08_10_221511_add_dep_id_to_lang_posts_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `optionsvalues`
--

DROP TABLE IF EXISTS `optionsvalues`;
CREATE TABLE IF NOT EXISTS `optionsvalues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_int` int DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `optionsvalues`
--

INSERT INTO `optionsvalues` (`id`, `name`, `is_active`, `value`, `value_int`, `notes`, `property_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'زوجة اولى', 1, NULL, 1, 'male_only', 8, 'integer', '2024-08-11 13:38:36', '2024-08-12 11:33:10'),
(2, 'زوجة ثانية', 1, NULL, 2, 'male_only', 8, 'integer', '2024-08-11 13:40:45', '2024-08-12 11:34:55'),
(6, 'اعزب', 1, 'single', NULL, NULL, 9, 'string', '2024-08-12 11:38:31', '2024-08-12 11:38:31'),
(7, 'متزوج', 1, 'married', NULL, NULL, 9, 'string', '2024-08-12 11:39:05', '2024-08-12 11:39:05'),
(8, 'مطلق', 1, 'divorced', NULL, NULL, 9, 'string', '2024-08-12 11:39:26', '2024-08-12 11:39:26'),
(9, 'ارمل', 1, 'widower', NULL, NULL, 9, 'string', '2024-08-12 11:40:02', '2024-08-12 11:40:02'),
(10, 'ابيض', 1, 'white', NULL, NULL, 15, 'string', '2024-08-12 11:43:47', '2024-08-12 11:43:47'),
(11, 'حنطي مائل للبياض', 1, 'wheatish-white', NULL, NULL, 15, 'string', '2024-08-12 11:44:52', '2024-08-12 11:44:52'),
(12, 'حنطي مائل للسمار', 1, 'wheatish-brown', NULL, NULL, 15, 'string', '2024-08-12 11:45:56', '2024-08-12 11:45:56'),
(13, 'اسمر فاتح', 1, 'light-brown', NULL, NULL, 15, 'string', '2024-08-12 11:48:20', '2024-08-12 11:48:20'),
(14, 'اسمر غامق', 1, 'dark-brown', NULL, NULL, 15, 'string', '2024-08-12 11:48:56', '2024-08-12 11:48:56'),
(15, 'اسود', 1, 'black', NULL, NULL, 15, 'string', '2024-08-12 11:49:21', '2024-08-12 11:49:21'),
(16, 'نحيف', 1, 'slim', NULL, NULL, 16, 'string', '2024-08-12 11:50:07', '2024-08-12 11:50:07'),
(17, 'متوسط البنية', 1, 'average', NULL, NULL, 16, 'string', '2024-08-12 11:52:19', '2024-08-12 11:52:19'),
(18, 'قوام رياضي', 1, 'athlete', NULL, NULL, 16, 'string', '2024-08-12 11:53:03', '2024-08-12 11:53:03'),
(19, 'سمين', 1, 'fat', NULL, NULL, 16, 'string', '2024-08-12 11:53:21', '2024-08-12 11:53:21'),
(20, 'ضخم', 1, 'huge', NULL, NULL, 16, 'string', '2024-08-12 11:53:49', '2024-08-12 11:53:49'),
(21, 'غير متدين', 1, 'irreligious', NULL, NULL, 17, 'string', '2024-08-12 11:54:52', '2024-08-12 11:54:52'),
(22, 'متدين قليلا', 1, 'little-religious', NULL, NULL, 17, 'string', '2024-08-12 11:55:19', '2024-08-12 11:55:19'),
(23, 'متدين', 1, 'religious', NULL, NULL, 17, 'string', '2024-08-12 11:55:58', '2024-08-12 11:55:58'),
(24, 'متدين كثيرا', 1, 'very-religious', NULL, NULL, 17, 'string', '2024-08-12 11:56:25', '2024-08-12 11:56:25'),
(25, 'أفضل أن لا أقول', 1, 'not-say', NULL, NULL, 17, 'string', '2024-08-12 11:57:06', '2024-08-12 11:57:06'),
(26, 'أصلي دائما', 1, 'always', NULL, NULL, 18, 'string', '2024-08-12 11:58:09', '2024-08-12 11:58:09'),
(27, 'أصلي اغلب الأوقات', 1, 'most', NULL, NULL, 18, 'string', '2024-08-12 11:58:48', '2024-08-12 11:58:48'),
(28, 'أصلي بعض الاحيان', 1, 'sometimes', NULL, NULL, 18, 'string', '2024-08-12 11:59:16', '2024-08-12 11:59:16'),
(29, 'لا أصلي', 1, 'no-pray', NULL, NULL, 18, 'string', '2024-08-12 12:00:05', '2024-08-12 12:00:05'),
(30, 'أفضل أن لا أقول', 1, 'not-say', NULL, NULL, 18, 'string', '2024-08-12 12:01:06', '2024-08-12 12:01:06'),
(31, 'لا', 1, NULL, 0, NULL, 19, 'integer', '2024-08-12 12:02:31', '2024-08-12 12:02:31'),
(32, 'نعم', 1, NULL, 1, NULL, 19, 'integer', '2024-08-12 12:02:46', '2024-08-12 12:02:46'),
(33, 'لا', 1, NULL, 0, NULL, 20, 'integer', '2024-08-12 12:03:41', '2024-08-12 12:03:41'),
(34, 'نعم', 1, NULL, 1, NULL, 20, 'integer', '2024-08-12 12:03:54', '2024-08-12 12:03:54'),
(35, 'اعدادية', 1, 'intermediate', NULL, NULL, 21, 'string', '2024-08-12 12:06:41', '2024-08-12 12:06:41'),
(36, 'ثانوية', 1, 'high', NULL, NULL, 21, 'string', '2024-08-12 12:07:12', '2024-08-12 12:07:12'),
(37, 'جامعية', 1, 'university', NULL, NULL, 21, 'string', '2024-08-12 12:07:40', '2024-08-12 12:07:40'),
(38, 'دكتوراه', 1, 'phd', NULL, NULL, 21, 'string', '2024-08-12 12:08:30', '2024-08-12 12:08:30'),
(39, 'دراسة ذاتية', 1, 'self', NULL, NULL, 21, 'string', '2024-08-12 12:08:59', '2024-08-12 12:08:59'),
(40, 'بدون عمل حاليا', 1, 'unemployed', NULL, NULL, 22, 'string', '2024-08-12 12:11:50', '2024-08-12 12:11:50'),
(41, 'لا زلت أدرس', 1, 'still-study', NULL, NULL, 22, 'string', '2024-08-12 12:13:00', '2024-08-12 12:13:00'),
(42, 'سكرتارية', 1, 'secretary', NULL, NULL, 22, 'string', '2024-08-12 12:13:33', '2024-08-12 12:13:33'),
(43, 'مجال الفن / الأدب', 1, 'art', NULL, NULL, 22, 'string', '2024-08-12 12:14:01', '2024-08-12 12:14:01'),
(44, 'الإدارة', 1, 'management', NULL, NULL, 22, 'string', '2024-08-12 12:14:27', '2024-08-12 12:14:27'),
(45, 'مجال التجارة', 1, 'business', NULL, NULL, 22, 'string', '2024-08-12 12:14:52', '2024-08-12 12:14:52'),
(46, 'مجال الأغذية', 1, 'food', NULL, NULL, 22, 'string', '2024-08-12 12:15:41', '2024-08-12 12:15:41'),
(47, 'مجال الإنشاءات والبناء', 1, 'building', NULL, NULL, 22, 'string', '2024-08-12 12:16:12', '2024-08-12 12:16:12'),
(48, 'مجال القانون', 1, 'law', NULL, NULL, 22, 'string', '2024-08-12 12:16:32', '2024-08-12 12:16:32'),
(49, 'مجال الطب', 1, 'medical', NULL, NULL, 22, 'string', '2024-08-12 12:17:01', '2024-08-12 12:17:01'),
(50, 'السياسة / الحكومة', 1, 'government', NULL, NULL, 22, 'string', '2024-08-12 12:17:34', '2024-08-12 12:17:34'),
(51, 'متقاعد', 1, 'retired', NULL, NULL, 22, 'string', '2024-08-12 12:17:56', '2024-08-12 12:17:56'),
(52, 'التسويق والمبيعات', 1, 'marketing', NULL, NULL, 22, 'string', '2024-08-12 12:18:34', '2024-08-12 12:18:34'),
(53, 'عمل خاص', 1, 'self-employed', NULL, NULL, 22, 'string', '2024-08-12 12:19:21', '2024-08-12 12:19:21'),
(54, 'مجال التدريس', 1, 'teaching', NULL, NULL, 22, 'string', '2024-08-12 12:19:42', '2024-08-12 12:19:42'),
(55, 'مجال الهندسة / العلوم', 1, 'engineering', NULL, NULL, 22, 'string', '2024-08-12 12:20:21', '2024-08-12 12:20:21'),
(56, 'مجال النقل', 1, 'transport', NULL, NULL, 22, 'string', '2024-08-12 12:20:44', '2024-08-12 12:20:44'),
(57, 'مجال الكمبيوتر أو المعلومات', 1, 'computer', NULL, NULL, 22, 'string', '2024-08-12 12:21:02', '2024-08-12 12:21:02'),
(58, 'شيء آخر', 1, 'other', NULL, NULL, 22, 'string', '2024-08-12 12:21:21', '2024-08-12 12:21:21'),
(59, 'فقير', 1, 'poor', NULL, NULL, 24, 'string', '2024-08-12 12:23:55', '2024-08-12 12:23:55'),
(60, 'قريب من المتوسط', 1, 'near-average', NULL, NULL, 24, 'string', '2024-08-12 12:24:34', '2024-08-12 12:24:34'),
(61, 'متوسط', 1, 'middle', NULL, NULL, 24, 'string', '2024-08-12 12:25:06', '2024-08-12 12:25:06'),
(62, 'اكثر من المتوسط', 1, 'above-average', NULL, NULL, 24, 'string', '2024-08-12 12:25:47', '2024-08-12 12:25:47'),
(63, 'جيد', 1, 'good', NULL, NULL, 24, 'string', '2024-08-12 12:26:10', '2024-08-12 12:26:10'),
(64, 'ميسور', 1, 'well', NULL, NULL, 24, 'string', '2024-08-12 12:26:49', '2024-08-12 12:26:49'),
(65, 'ثري', 1, 'rich', NULL, NULL, 24, 'string', '2024-08-12 12:27:33', '2024-08-12 12:27:33'),
(66, 'بدون دخل شهري', 1, '0', NULL, NULL, 23, 'string', '2024-08-12 12:37:14', '2024-08-12 12:37:14'),
(67, 'اقل من 50', 1, '1,50', NULL, NULL, 23, 'string', '2024-08-12 12:39:30', '2024-08-12 12:39:30'),
(68, 'بين 50 و 100', 1, '50,100', NULL, NULL, 23, 'string', '2024-08-12 12:40:05', '2024-08-12 12:40:05'),
(69, 'بين 100 و 200', 1, '100,200', NULL, NULL, 23, 'string', '2024-08-12 12:40:29', '2024-08-12 12:40:29'),
(70, 'بين 200 و 500', 1, '200,500', NULL, NULL, 23, 'string', '2024-08-12 12:41:03', '2024-08-12 12:41:03'),
(71, 'بين 500 و 1000', 1, '1000,501', NULL, NULL, 23, 'string', '2024-08-12 12:41:37', '2024-08-12 12:41:37'),
(72, 'اكثر من 1000', 1, '1000', NULL, NULL, 23, 'string', '2024-08-12 12:42:38', '2024-08-12 12:42:38'),
(73, 'بصحة جيدة و الحمد لله', 1, 'good', NULL, NULL, 26, 'string', '2024-08-12 12:45:00', '2024-08-12 12:45:00'),
(74, 'اعاقة حركية', 1, 'motor', NULL, NULL, 26, 'string', '2024-08-12 12:45:33', '2024-08-12 12:45:33'),
(75, 'اعاقة ذهنية', 1, 'mental', NULL, NULL, 26, 'string', '2024-08-12 12:46:18', '2024-08-12 12:46:18'),
(76, 'اكتئاب', 1, 'depression', NULL, NULL, 26, 'string', '2024-08-12 12:46:48', '2024-08-12 12:46:48'),
(77, 'انحناء  وتقـوس', 1, 'curvature', NULL, NULL, 26, 'string', '2024-08-12 12:47:31', '2024-08-12 12:47:31'),
(78, 'انفصام شخصية', 1, 'schizophrenia', NULL, NULL, 26, 'string', '2024-08-12 12:48:19', '2024-08-12 12:48:19'),
(79, 'باطنية', 1, 'stomach', NULL, NULL, 26, 'string', '2024-08-12 12:51:48', '2024-08-12 12:51:48'),
(80, 'برص', 1, 'gecko', NULL, NULL, 26, 'string', '2024-08-12 12:52:20', '2024-08-12 12:52:20'),
(81, 'بصريــة', 1, 'optic', NULL, NULL, 26, 'string', '2024-08-12 12:53:15', '2024-08-12 12:53:15'),
(82, 'بهاق', 1, 'vitiligo', NULL, NULL, 26, 'string', '2024-08-12 12:53:38', '2024-08-12 12:53:38'),
(83, 'حروق مشوهة', 1, 'burns', NULL, NULL, 26, 'string', '2024-08-12 12:54:00', '2024-08-12 12:54:00'),
(84, 'سكري', 1, 'diabetes', NULL, NULL, 26, 'string', '2024-08-12 12:54:45', '2024-08-12 12:54:45'),
(85, 'سمعية', 1, 'hearing', NULL, NULL, 26, 'string', '2024-08-12 12:55:13', '2024-08-12 12:55:13'),
(86, 'الكلام - النطق', 1, 'speech', NULL, NULL, 26, 'string', '2024-08-12 12:55:37', '2024-08-12 12:55:37'),
(87, 'سمنة مفرطة', 1, 'fat', NULL, NULL, 26, 'string', '2024-08-12 12:56:08', '2024-08-12 12:56:08'),
(88, 'شلل أطفال', 1, 'infantile-paralysis', NULL, NULL, 26, 'string', '2024-08-12 12:57:09', '2024-08-12 12:57:09'),
(89, 'شلل رباعي', 1, 'quadriplegia', NULL, NULL, 26, 'string', '2024-08-12 12:57:42', '2024-08-12 12:57:42'),
(90, 'شلل نصفي', 1, 'hemiplegia', NULL, NULL, 26, 'string', '2024-08-12 12:58:00', '2024-08-12 12:58:00'),
(91, 'صدفية', 1, 'psoriasis', NULL, NULL, 26, 'string', '2024-08-12 12:58:22', '2024-08-12 12:58:22'),
(92, 'صرع', 1, 'epilepsy', NULL, NULL, 26, 'string', '2024-08-12 12:58:54', '2024-08-12 12:58:54'),
(93, 'عجز جنـسي', 1, 'sexual-impotence', NULL, NULL, 26, 'string', '2024-08-12 12:59:16', '2024-08-12 12:59:16'),
(94, 'عقم', 1, 'sterility', NULL, NULL, 26, 'string', '2024-08-12 12:59:45', '2024-08-12 12:59:45'),
(95, 'فقدان طرف أو عضو', 1, 'loss-organ', NULL, NULL, 26, 'string', '2024-08-12 13:00:08', '2024-08-12 13:00:08'),
(96, 'قزم', 1, 'dwarf', NULL, NULL, 26, 'string', '2024-08-12 13:00:42', '2024-08-12 13:00:42'),
(97, 'متلازمة داون', 1, 'dawns', NULL, NULL, 26, 'string', '2024-08-12 13:02:26', '2024-08-12 13:02:26'),
(98, 'نفسية', 1, 'psychic', NULL, NULL, 26, 'string', '2024-08-12 13:09:51', '2024-08-12 13:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points_trans`
--

DROP TABLE IF EXISTS `points_trans`;
CREATE TABLE IF NOT EXISTS `points_trans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int DEFAULT '0',
  `process_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pointsrate` int DEFAULT '0',
  `cash` decimal(8,2) DEFAULT '0.00',
  `balance_before` int DEFAULT '0',
  `balance_after` int DEFAULT '0',
  `notes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `status` int DEFAULT '0',
  `update_user_id` bigint UNSIGNED DEFAULT NULL,
  `create_user_id` bigint UNSIGNED DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `meta_key`, `content`, `category_id`, `sequence`, `status`, `update_user_id`, `create_user_id`, `notes`, `created_at`, `updated_at`, `code`) VALUES
(83, 'home', 'home', NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 11:21:51', '2024-07-09 11:57:56', 'footer-menu'),
(86, 'profile', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 12:09:33', '2024-07-09 12:09:33', 'footer-menu'),
(87, 'login', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 19:38:13', '2024-07-09 19:38:13', 'header'),
(88, 'user-name', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 19:52:26', '2024-07-09 19:52:26', 'register'),
(89, 'email', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:02:54', '2024-07-09 20:02:54', 'register'),
(90, 'password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:04:38', '2024-07-09 20:04:38', 'register'),
(91, 'confirm-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:06:27', '2024-07-09 20:06:27', 'register'),
(92, 'image', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:09:09', '2024-07-09 20:09:09', 'register'),
(93, 'page-title', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:36:16', '2024-07-09 20:36:16', 'register'),
(94, 'card-title', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:38:24', '2024-07-09 20:38:24', 'register'),
(95, 'name-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:42:04', '2024-07-09 20:42:04', 'register'),
(98, 'email-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:49:33', '2024-07-09 20:49:33', 'register'),
(100, 'password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:52:54', '2024-07-09 20:52:54', 'register'),
(101, 'confirm-password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:56:31', '2024-07-09 20:56:31', 'register'),
(102, 'image-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 20:58:50', '2024-07-09 20:58:50', 'register'),
(103, 'policy', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:04:45', '2024-07-09 21:04:45', 'register'),
(104, 'policy-privacy', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:17:57', '2024-07-09 21:17:57', 'register'),
(105, 'policy-conditions', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:20:39', '2024-07-09 21:20:39', 'register'),
(106, 'sign-up', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:31:35', '2024-07-09 21:31:35', 'register'),
(107, 'already-account', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:43:53', '2024-07-09 21:43:53', 'register'),
(108, 'login', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:45:49', '2024-07-09 21:45:49', 'register'),
(109, 'new-account', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 21:54:11', '2024-07-09 21:54:11', 'header'),
(110, 'login', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:03:07', '2024-07-09 22:03:07', 'login'),
(112, 'email', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:07:32', '2024-07-09 22:07:32', 'login'),
(113, 'password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:09:40', '2024-07-09 22:09:40', 'login'),
(114, 'forgot-password', 'forgot-password', NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:12:33', '2024-07-09 22:18:44', 'login'),
(115, 'recovery-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:19:23', '2024-07-09 22:19:23', 'login'),
(116, 'no-account', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:24:26', '2024-07-09 22:24:26', 'login'),
(117, 'register', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:26:54', '2024-07-09 22:26:54', 'login'),
(118, 'email-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:32:08', '2024-07-09 22:32:08', 'login'),
(119, 'password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 22:34:45', '2024-07-09 22:34:45', 'login'),
(120, 'balance', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 23:11:33', '2024-07-09 23:11:33', 'header'),
(121, 'welcome', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 23:13:51', '2024-07-09 23:13:51', 'header'),
(122, 'profile', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 23:25:14', '2024-07-09 23:25:14', 'header'),
(123, 'logout', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-09 23:27:00', '2024-07-09 23:27:00', 'header'),
(131, 'home_page', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 20:29:37', '2024-07-10 20:29:37', 'home_page'),
(132, 'before-choose', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 20:34:58', '2024-07-10 20:34:58', 'home_page'),
(133, 'after-login', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 20:41:59', '2024-07-10 20:41:59', 'home_page'),
(134, 'no-questions', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 20:57:01', '2024-07-10 20:57:01', 'quiz'),
(135, 'email-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:00:37', '2024-07-10 21:00:37', 'login'),
(136, 'password-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:03:07', '2024-07-10 21:03:07', 'login'),
(137, 'username-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:06:51', '2024-07-10 21:06:51', 'register'),
(138, 'email-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:08:43', '2024-07-10 21:08:43', 'register'),
(139, 'password-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:09:51', '2024-07-10 21:09:51', 'register'),
(140, 'confirm-password-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:12:41', '2024-07-10 21:12:41', 'register'),
(141, 'image-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-10 21:15:10', '2024-07-10 21:15:10', 'register'),
(152, 'required', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-13 20:59:19', '2024-07-13 20:59:19', 'register-error'),
(153, 'input-email', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-13 20:59:44', '2024-07-13 20:59:44', 'register-error'),
(154, 'input-same', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-13 21:00:33', '2024-07-13 21:00:33', 'register-error'),
(155, 'password-between', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-13 21:01:05', '2024-07-13 21:01:05', 'register-error'),
(156, 'success-register', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-14 11:07:21', '2024-07-14 11:07:21', 'register'),
(157, 'fail-register', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-14 11:10:08', '2024-07-14 11:10:08', 'register'),
(158, 'modify-account', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 07:47:47', '2024-07-15 07:47:47', 'profile'),
(159, 'change-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 07:56:24', '2024-07-15 07:56:24', 'profile'),
(160, 'old-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 07:59:19', '2024-07-15 07:59:19', 'profile'),
(161, 'new-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:00:29', '2024-07-15 08:00:29', 'profile'),
(162, 'confirm-password', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:02:29', '2024-07-15 08:02:29', 'profile'),
(163, 'old-password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:04:09', '2024-07-15 08:04:09', 'profile'),
(164, 'new-password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:07:18', '2024-07-15 08:07:18', 'profile'),
(165, 'confirm-password-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:09:44', '2024-07-15 08:09:44', 'profile'),
(166, 'change-btn', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:11:31', '2024-07-15 08:11:31', 'profile'),
(167, 'modify-personal', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:15:56', '2024-07-15 08:15:56', 'profile'),
(168, 'user-name', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:28:53', '2024-07-15 08:28:53', 'profile'),
(169, 'country', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:32:35', '2024-07-15 08:32:35', 'profile'),
(170, 'name-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:34:11', '2024-07-15 08:34:11', 'profile'),
(171, 'gender', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:35:04', '2024-07-15 08:35:04', 'profile'),
(172, 'choose', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:48:52', '2024-07-15 08:48:52', 'profile'),
(173, 'male', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:51:24', '2024-07-15 08:51:24', 'profile'),
(174, 'female', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:52:28', '2024-07-15 08:52:28', 'profile'),
(175, 'image', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:54:01', '2024-07-15 08:54:01', 'profile'),
(176, 'image-placeholder', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:55:25', '2024-07-15 08:55:25', 'profile'),
(177, 'image-message', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 08:59:15', '2024-07-15 08:59:15', 'profile'),
(178, 'update-btn', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:05:14', '2024-07-15 09:05:14', 'profile'),
(179, 'balance', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:07:37', '2024-07-15 09:07:37', 'profile'),
(180, 'not-enough', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:13:51', '2024-07-15 09:13:51', 'profile'),
(181, 'delete-account', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:16:35', '2024-07-15 09:16:35', 'profile'),
(182, 'warning', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:19:05', '2024-07-15 09:19:05', 'profile'),
(183, 'delete-btn', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:21:08', '2024-07-15 09:21:08', 'profile'),
(185, 'points-number', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:26:21', '2024-07-15 09:26:21', 'profile'),
(186, 'your-balance', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:28:48', '2024-07-15 09:28:48', 'profile'),
(187, 'value', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:31:02', '2024-07-15 09:31:02', 'profile'),
(188, 'pull', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 09:32:40', '2024-07-15 09:32:40', 'profile'),
(189, 'no-symbols', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 11:19:26', '2024-07-15 11:19:26', 'register-error'),
(190, 'user-name-exist', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 11:21:07', '2024-07-15 11:21:07', 'register-error'),
(191, 'email-exist', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 11:22:05', '2024-07-15 11:22:05', 'register-error'),
(192, 'file-image', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 11:24:28', '2024-07-15 11:24:28', 'register-error'),
(193, 'input-between', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 11:30:57', '2024-07-15 11:30:57', 'register-error'),
(194, 'auth-failed', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 12:03:16', '2024-07-15 12:03:16', 'register-error'),
(195, 'fail-login', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 12:10:08', '2024-07-15 12:10:08', 'login'),
(196, 'incorrect-pass', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 12:37:38', '2024-07-15 12:37:38', 'profile-error'),
(197, 'success-process', 'success-process', NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:05:22', '2024-07-15 13:06:05', 'profile'),
(198, 'fail-process', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:06:47', '2024-07-15 13:06:47', 'profile'),
(199, 'account-deleted', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:12:36', '2024-07-15 13:12:36', 'profile'),
(200, 'choose-country', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:16:43', '2024-07-15 13:16:43', 'profile'),
(201, 'only-number', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:32:59', '2024-07-15 13:32:59', 'pull'),
(202, 'points-greater', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:34:03', '2024-07-15 13:34:03', 'pull'),
(203, 'points-lessequal', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:34:36', '2024-07-15 13:34:36', 'pull'),
(204, 'points-greaterqual', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-15 13:34:56', '2024-07-15 13:34:56', 'pull'),
(208, 'login-by-gmail', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-31 11:29:44', '2024-07-31 11:29:44', 'register'),
(209, 'or', NULL, NULL, NULL, 18, 0, 1, NULL, NULL, NULL, '2024-07-31 11:35:20', '2024-07-31 11:35:20', 'register');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_multivalue` int DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `is_active`, `type`, `is_multivalue`, `notes`, `created_at`, `updated_at`, `image`, `dep_id`) VALUES
(4, 'serial_id', 1, 'string', 0, NULL, '2024-08-11 12:02:25', '2024-08-11 12:02:25', NULL, 10),
(5, 'residence', 1, 'string', 0, NULL, '2024-08-11 12:04:20', '2024-08-11 12:04:20', NULL, 11),
(6, 'nationality', 1, 'string', 0, NULL, '2024-08-11 12:04:47', '2024-08-11 12:04:47', NULL, 11),
(7, 'city', 1, 'string', 0, NULL, '2024-08-11 12:05:05', '2024-08-11 12:05:05', NULL, 11),
(8, 'wife_num', 1, 'integer', 1, 'male_only', '2024-08-11 12:08:40', '2024-08-11 12:08:40', NULL, 12),
(9, 'family_status', 1, 'string', 1, NULL, '2024-08-11 12:09:35', '2024-08-11 12:09:35', NULL, 12),
(10, 'age', 1, 'integer', 0, NULL, '2024-08-11 12:10:00', '2024-08-11 12:10:00', NULL, 12),
(11, 'children_num', 1, 'integer', 0, NULL, '2024-08-11 12:12:09', '2024-08-11 12:12:09', NULL, 12),
(13, 'weight', 1, 'integer', 0, NULL, '2024-08-12 09:24:05', '2024-08-12 09:24:05', NULL, 13),
(14, 'height', 1, 'integer', 0, NULL, '2024-08-12 09:24:47', '2024-08-12 09:24:47', NULL, 13),
(15, 'skin', 1, 'string', 1, NULL, '2024-08-12 09:26:36', '2024-08-12 13:14:09', NULL, 13),
(16, 'body', 1, 'string', 1, NULL, '2024-08-12 09:27:22', '2024-08-12 09:27:22', NULL, 13),
(17, 'religiosity', 1, 'string', 1, NULL, '2024-08-12 09:28:09', '2024-08-12 09:28:09', NULL, 14),
(18, 'prayer', 1, 'string', 1, NULL, '2024-08-12 09:28:34', '2024-08-12 09:28:34', NULL, 14),
(19, 'smoking', 1, 'integer', 1, NULL, '2024-08-12 09:29:40', '2024-08-12 09:29:40', NULL, 14),
(20, 'beard', 1, 'integer', 1, NULL, '2024-08-12 09:30:16', '2024-08-12 09:30:16', NULL, 14),
(21, 'education', 1, 'string', 1, NULL, '2024-08-12 09:32:16', '2024-08-12 09:32:16', NULL, 15),
(22, 'work', 1, 'string', 1, NULL, '2024-08-12 09:32:48', '2024-08-12 09:32:48', NULL, 15),
(23, 'income', 1, 'string', 1, NULL, '2024-08-12 09:35:58', '2024-08-12 09:35:58', NULL, 15),
(24, 'financial', 1, 'string', 1, NULL, '2024-08-12 09:37:52', '2024-08-12 09:37:52', NULL, 15),
(25, 'job', 1, 'string', 0, NULL, '2024-08-12 09:38:50', '2024-08-12 09:38:50', NULL, 15),
(26, 'health', 1, 'string', 1, NULL, '2024-08-12 09:39:35', '2024-08-12 09:39:35', NULL, 15),
(27, 'partner', 1, 'string', 0, NULL, '2024-08-12 09:58:20', '2024-08-12 09:58:20', NULL, 16),
(28, 'about_me', 1, 'string', 0, NULL, '2024-08-12 09:59:19', '2024-08-12 09:59:19', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `properties_deps`
--

DROP TABLE IF EXISTS `properties_deps`;
CREATE TABLE IF NOT EXISTS `properties_deps` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties_deps`
--

INSERT INTO `properties_deps` (`id`, `name`, `image`, `notes`, `created_at`, `updated_at`) VALUES
(10, 'login_info', NULL, NULL, '2024-08-11 11:55:33', '2024-08-11 11:55:33'),
(11, 'nationality', NULL, NULL, '2024-08-11 11:56:01', '2024-08-11 11:56:01'),
(12, 'social_status', NULL, NULL, '2024-08-11 11:56:28', '2024-08-11 11:56:28'),
(13, 'my_description', NULL, NULL, '2024-08-11 11:57:34', '2024-08-11 11:57:34'),
(14, 'religion', NULL, NULL, '2024-08-11 11:58:25', '2024-08-11 11:58:25'),
(15, 'study_job', NULL, NULL, '2024-08-11 11:59:08', '2024-08-11 11:59:08'),
(16, 'partner_description', NULL, NULL, '2024-08-11 11:59:47', '2024-08-11 11:59:47'),
(17, 'about_me', NULL, NULL, '2024-08-11 12:00:03', '2024-08-11 12:00:03'),
(18, 'secret_info', NULL, NULL, '2024-08-11 12:00:21', '2024-08-11 12:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `value2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `value3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dep` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int DEFAULT '0',
  `section` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name1`, `value1`, `name2`, `value2`, `name3`, `value3`, `category`, `dep`, `sequence`, `section`, `location`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Site Title', 'Zawag', 'Description', 'Saraha', 'Meta', 'Saraha', 'site-info', 'title', 0, NULL, NULL, 1, NULL, '2024-08-08 12:10:03'),
(3, 'Favicon', '759703.png', '', '', NULL, NULL, 'site-info', 'icon', 0, NULL, NULL, 1, NULL, '2024-08-08 12:11:34'),
(12, 'Phone', '+8468466', NULL, NULL, NULL, NULL, 'header-info', 'phone', 0, NULL, 'header', 1, NULL, '2024-06-15 21:18:26'),
(13, 'Email', 'info@Saraha.com', NULL, NULL, NULL, NULL, 'header-info', 'email', 0, NULL, 'header', 1, NULL, '2024-06-15 21:18:14'),
(14, 'Name', 'facebook.com', 'Code', 'facebook', 'Link', 'https://facebook.com', 'site-info', 'facebook', 0, '', '', 1, '2024-04-22 17:01:22', '2024-08-08 12:10:13'),
(17, 'Name', 'twitter.com', 'Code', 'twitter', 'Link', 'https://twitter.com', 'site-info', 'twitter', 0, '', '', 1, '2024-04-22 17:02:28', '2024-08-08 12:10:13'),
(19, 'whatsapp', '+905011291958', NULL, NULL, NULL, NULL, 'site-info', 'whatsapp', 0, NULL, 'whatsapp', 1, NULL, '2024-04-30 16:30:46'),
(20, 'Location', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385396.3211659778!2d28.6825179770093!3d41.00537019816266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVsLCBUw7xya2l5ZQ!5e0!3m2!1sen!2s!4v1717320062098!5m2!1sen!2s', NULL, NULL, NULL, NULL, 'site-info', 'location', 0, NULL, 'location', 1, NULL, '2024-06-02 16:22:05'),
(21, 'contact_email', 'support@Saraha.com', 'password', 'Sum3eDzf{4fa', '', '', 'site-info', 'contact_email', 0, NULL, NULL, 1, NULL, '2024-06-15 21:18:00'),
(22, 'Logo', '3132322.png', 'Logo', '442003.png', NULL, NULL, 'site-info', 'logo', 0, NULL, NULL, 1, NULL, '2024-08-08 12:11:30'),
(23, 'meta1', '<meta name=\"description\" content=\"تصويت\">   \r\n      <meta name=\"keywords\" content=\"Vote,تصويت\" />', NULL, NULL, NULL, NULL, 'header-info', 'header', 0, '', '', 1, '2024-06-25 20:43:12', '2024-07-31 20:35:51'),
(28, 'script', '<script></script>', NULL, NULL, NULL, NULL, 'footer-info', 'footer', 0, '', '', 1, '2024-06-26 07:47:00', '2024-06-26 07:47:00'),
(29, 'Min points', '2', '', '', '', '', 'question', 'minpoints', 0, '', '', 1, '2024-04-22 17:02:28', '2024-07-17 14:57:53'),
(30, 'Points rate', '2', '', '', '', '', 'question', 'pointsrate', 0, '', '', 1, '2024-04-22 17:02:28', '2024-07-17 14:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `htmlcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `image`, `code`, `notes`, `is_active`, `created_at`, `updated_at`, `link`, `htmlcode`) VALUES
(1, 'فايسبوك', NULL, 'facebook', NULL, 1, '2024-06-21 13:34:31', '2024-06-21 13:34:31', 'https://www.facebook.com', 'casc'),
(3, 'تويتر', NULL, 'x', NULL, 1, '2024-06-21 14:27:35', '2024-06-22 07:31:11', 'twitter.com', 'X'),
(4, 'موقع آخر', NULL, 'other', NULL, 1, '2024-06-22 07:31:03', '2024-06-22 07:31:03', NULL, 'global');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `createuser_id` bigint UNSIGNED DEFAULT NULL,
  `updateuser_id` bigint UNSIGNED DEFAULT NULL,
  `mobile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `user_name`, `role`, `token`, `createuser_id`, `updateuser_id`, `mobile`, `remember_token`, `created_at`, `updated_at`, `image`, `is_active`) VALUES
(26, 'علاء', 'soriaty@msn.com', NULL, '$2y$12$oxpJED.zDHAY2qNTiWMgpeihOl8e5Tb4Vcs0/Cw1U0Lnhw94T6/s6', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, 'ahZQwT1tYaz0dG0AHMPscnaSY7lshGPmJjEeP8AXeJJ2MYwcrJLkdW53nY10', '2024-06-25 12:38:07', '2024-08-07 12:30:41', NULL, 1),
(28, 'ahmad', 'najyms@gmail.com', NULL, '$2y$12$wIaEUQ/d2duR5qtUKq83i.U3.BjQK/O1yxXFvL3U5PcVyG4QpXI92', NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, '2024-08-07 12:32:09', '2024-08-07 12:35:08', NULL, 1),
(30, 'adadww', 'awwan@gmail.com', NULL, '$2y$12$vht/xFBllv5pUf4j6BjvgeypLEO9VsnxaJ3Cpe6qh/8IcFPRsmSpO', NULL, NULL, NULL, 'admin', NULL, 28, 28, NULL, NULL, '2024-08-08 09:25:57', '2024-08-08 09:32:34', '6513130.webp', 1),
(31, 'dd', 'admindd@gmail.com', NULL, '$2y$12$vgCh0E1WqkxerKu8Afm5QOFFWpLwyHqCoIosTEw9hPVvO4z3GUa3i', NULL, NULL, NULL, 'admin', NULL, 28, 28, NULL, NULL, '2024-08-08 09:37:23', '2024-08-08 09:48:52', '4039331.webp', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
