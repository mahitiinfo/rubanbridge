-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 10:30 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rubanbridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `rb_camps`
--

CREATE TABLE IF NOT EXISTS `rb_camps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `no_of_people` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `geoPoint` point NOT NULL,
  `document` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `camps_id_unique` (`id`),
  KEY `camps_card_id_index` (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rb_camps`
--

INSERT INTO `rb_camps` (`id`, `card_id`, `name`, `start_date`, `end_date`, `no_of_people`, `target`, `address`, `geoPoint`, `document`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 'test', '2015-12-22', '2015-12-29', '234', 'etet', 'Kunigal Town Rd, Kunigal, Karnataka 572130, India', '\0\0\0\0\0\0\0)8/Z\r*@\0\0\0€BS@', '', 0, '2015-12-07 04:08:56', '2015-12-07 04:08:56'),
(2, 2, 'Camp One', '2015-12-08', '2015-12-09', '23432', '23432', 'Mahiti Infotech Pvt. Ltd., #6, 1st Floor, Ganesh Chambers, Dodda Banasawadi, Main Road, Bengaluru, Karnataka 560045, India', '\0\0\0\0\0\0\0ÃÇqñ*@:¯±KjS@', '{"fileName":"349d982ea4cc4239b7d3554335e92a72.xlsx","filePath":"\\/uploads\\/camp\\/349d982ea4cc4239b7d3554335e92a72.xlsx","fileSize":1361922,"fileType":"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","fileExtension":"xlsx","fileOriginalName":"Karnataka Villages.xlsx"}', 0, '2015-12-07 04:30:12', '2015-12-07 23:09:33'),
(3, 2, 'Camp two', '2015-12-08', '2015-12-09', '23432', '23432', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0\0Fü¸Fì)@ñÿ¯„peS@', '{"fileName":"83800e8634544b428899bade43947cd2.png","filePath":"\\/uploads\\/camp\\/83800e8634544b428899bade43947cd2.png","fileSize":7695,"fileType":"image\\/png","fileExtension":"png","fileOriginalName":"agriculture.png"}', 0, '2015-12-07 04:30:20', '2015-12-07 23:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `rb_cards`
--

CREATE TABLE IF NOT EXISTS `rb_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `camps` int(11) NOT NULL,
  `deliver_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total_villagers` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `orders` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cards_id_unique` (`id`),
  KEY `cards_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rb_cards`
--

INSERT INTO `rb_cards` (`id`, `project_id`, `sector_id`, `district_id`, `name`, `camps`, `deliver_time`, `total_villagers`, `budget`, `orders`, `start_date`, `end_date`, `comments`, `image`, `active`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Card one', 12, '2', '3333', '1000', '43', '2015-12-29', '2015-12-30', 'Project TwoProject TwoProject TwoProject TwoProject TwoProject Two', 'education.png', 1, 1, '2015-12-02 08:20:51', '2015-12-04 03:01:53', NULL),
(2, 2, 1, 1, 'Card two', 11, '33', '2323', '54', '44', '2015-12-29', '2015-12-30', 'Project TwoProject TwoProject TwoProject Two', 'water-icon.png', 1, 2, '2015-12-02 08:21:21', '2015-12-04 03:02:02', NULL),
(3, 1, 3, 1, 'Eye Testing', 45, '43', '787', '3456', '234', '2015-12-24', '2015-12-31', 'Eye testing', 'madical.png', 1, 0, '2015-12-03 07:48:25', '2015-12-04 05:02:16', NULL),
(4, 1, 1, 1, 'Growing grapes', 12, '123', '34555', '550000', '223', '2015-12-01', '2015-12-26', 'Comment', 'hand-wash-icon.png', 1, 0, '2015-12-04 05:01:59', '2015-12-04 05:02:59', NULL),
(5, 1, 3, 1, 'Left eye chcek up', 22, '3232', '3232', '32323', '232', '2015-12-01', '2015-12-31', 'ewwqe', '', 1, 0, '2015-12-04 05:05:23', '2015-12-04 05:05:23', NULL),
(6, 3, 2, 1, 'Test Card', 22, '32', '222', '2221', '12', '2015-12-23', '2015-12-25', 'teste', '', 1, 0, '2015-12-04 06:37:27', '2015-12-04 06:37:27', NULL),
(8, 1, 1, 1, 'Test Card two', 333, '33', '333', '333', '33', '2015-12-22', '2015-12-30', 'asd asd sadf sad sd dfs', 'agriculture.png', 1, 0, '2015-12-07 05:35:35', '2015-12-07 05:37:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_district`
--

CREATE TABLE IF NOT EXISTS `rb_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `district_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rb_district`
--

INSERT INTO `rb_district` (`id`, `state`, `district`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'Tumkur', '2015-12-03 01:30:34', '2015-12-03 01:30:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_groups`
--

CREATE TABLE IF NOT EXISTS `rb_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_id_unique` (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rb_groups`
--

INSERT INTO `rb_groups` (`id`, `name`, `permissions`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '{"superuser":1}', 1, '2015-12-02 07:35:20', '2015-12-04 04:47:15', NULL),
(2, 'Client', '{"ruban.home":"1","users.updateprofile":"1","users.profileudpate":"1","projects.view":"1","projects.create":"1","projects.update":"1","projects.delete":"1","cards.create":"1","cards.edit":"1","cards.view":"1","cards.delete":"1","cards.update":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.import":"1","districts.ajax":"1"}', 1, '2015-12-02 07:35:20', '2015-12-04 04:53:43', NULL),
(3, 'Partner', '{"ruban.home":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","cards.view":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1","camps.create":"1","camps.edit":"1","camps.view":"1","camps.delete":"1","camps.update":"1","camps.download":"1"}', 1, '2015-12-02 07:35:20', '2015-12-07 23:01:16', NULL),
(4, 'Operator', '{"ruban.home":"1","users.view":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","projects.view":"1","cards.view":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1"}', 1, '2015-12-02 07:35:20', '2015-12-04 04:55:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_migrations`
--

CREATE TABLE IF NOT EXISTS `rb_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rb_migrations`
--

INSERT INTO `rb_migrations` (`migration`, `batch`) VALUES
('2011_01_30_102906_create_groups_table', 1),
('2014_10_12_000000_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 2),
('2015_11_01_063820_create_sector_table', 2),
('2015_11_25_121446_create_project_table', 2),
('2015_11_30_064840_create_cards_table', 2),
('2015_12_01_041521_create_permissions_table', 2),
('2015_12_01_051710_create_district_table', 2),
('2015_12_02_130358_create_district_table', 3),
('2015_12_03_054853_create_district_sector_table', 4),
('2015_12_03_054853_create_village_sector_table', 5),
('2015_12_03_064507_create_village_table', 5),
('2015_12_03_060843_create_partner_cards_table', 6),
('2015_12_07_064319_create_camps_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `rb_partner_card`
--

CREATE TABLE IF NOT EXISTS `rb_partner_card` (
  `partner_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rb_partner_card`
--

INSERT INTO `rb_partner_card` (`partner_id`, `card_id`) VALUES
(3, 2),
(3, 1),
(3, 4),
(3, 5),
(3, 6),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rb_partner_district_sector`
--

CREATE TABLE IF NOT EXISTS `rb_partner_district_sector` (
  `partner_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rb_partner_district_sector`
--

INSERT INTO `rb_partner_district_sector` (`partner_id`, `district_id`, `sector_id`) VALUES
(3, 1, 1),
(3, 1, 2),
(3, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rb_password_resets`
--

CREATE TABLE IF NOT EXISTS `rb_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rb_permissions`
--

CREATE TABLE IF NOT EXISTS `rb_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rb_permissions`
--

INSERT INTO `rb_permissions` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', '["ruban.home"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(2, 'Users', '["users.create","users.view","users.delete","users.update","users.profile","users.updateprofile","users.profileudpate"]', '2015-12-02 07:37:55', '2015-12-04 02:09:15', NULL),
(3, 'Groups', '["groups.view","groups.create","groups.update","groups.delete"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(4, 'Permissions', '["permissions.view","permissions.create","permissions.update","permissions.delete"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(5, 'Projects', '["projects.view","projects.create","projects.update","projects.delete"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(6, 'Cards', '["cards.create","cards.edit","cards.view","cards.delete","cards.update","cards.ajaxDistrict","cards.updatepartner","cards.assignupdate"]', '2015-12-02 07:37:55', '2015-12-03 07:34:17', NULL),
(7, 'Districts', '["districts.create","districts.view","districts.delete","districts.update","districts.import","districts.ajax"]', '2015-12-02 07:37:55', '2015-12-03 07:34:06', NULL),
(8, 'Camps', '["camps.create","camps.edit","camps.view","camps.delete","camps.update","camps.download"]', '2015-12-07 02:03:12', '2015-12-07 23:01:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_projects`
--

CREATE TABLE IF NOT EXISTS `rb_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sector_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `camps` int(11) NOT NULL,
  `deliver_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total_villagers` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `orders` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rb_projects`
--

INSERT INTO `rb_projects` (`id`, `name`, `sector_id`, `district_id`, `camps`, `deliver_time`, `total_villagers`, `budget`, `orders`, `start_date`, `end_date`, `comments`, `image`, `active`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Project One', 3, 1, 123, '32', '1000000', '12345', '456', '2015-12-15', '2015-12-22', 'project One,project One,project One,project Oneproject Oneproject Oneproject Oneproject One', 'madical.png', 1, 1, '2015-12-02 08:18:51', '2015-12-02 08:18:51', NULL),
(2, 'Project Two', 2, 1, 123, '22', '12333', '456', '3333', '2015-12-29', '2015-12-31', 'Project Two Project TwoProject TwoProject TwoProject TwoProject Two', 'education.png', 1, 2, '2015-12-02 08:19:54', '2015-12-02 08:19:54', NULL),
(3, 'Test Project', 2, 1, 1111, '332', '45678', '3233', '32', '2015-12-15', '2015-12-29', 'test', 'education.png', 1, 1, '2015-12-04 06:36:44', '2015-12-04 06:36:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_sector`
--

CREATE TABLE IF NOT EXISTS `rb_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sector_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rb_sector`
--

INSERT INTO `rb_sector` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Agriculture', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL),
(2, 'Education', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL),
(3, 'Health Care', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL),
(4, 'Water', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL),
(5, 'House', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL),
(6, 'Hand', '2015-12-02 07:37:53', '2015-12-02 07:37:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_users`
--

CREATE TABLE IF NOT EXISTS `rb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `pancard` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_group_id_index` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rb_users`
--

INSERT INTO `rb_users` (`id`, `group_id`, `name`, `email`, `password`, `first_name`, `last_name`, `company_name`, `address`, `pancard`, `image`, `active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Venkatesan', 'venkatesangee@gmail.com', '$2y$10$IR4FuY2Z3QwBUDedlgsqiO4WV9YWDTYXSDzLr4903TIsjSLbdz2em', 'Venkatesan', 'C', '', '', '0', '', 1, 'p5Mg9Mk3OdGxOFjLPti6HAZUc6BE33FMWs9opk4ieOKJarGqLaR5xQUOpePJ', '2015-12-02 07:37:51', '2015-12-07 23:28:36', NULL),
(2, 2, 'Arun', 'arun.kumar@mahiti.org', '$2y$10$4Oy5LU7nRvH0Uk8jzYNlUOZasW3xrgzdy1kVe0IoMp1bxAEvqXG7W', 'Arun', 'Kumar', '', '', '0', '', 1, 'snD0qtdj15tEJz43OvEED3XsZ6OJvzGoLRY8KbqXyC4pLlGEH22d3S8Apzt7', '2015-12-02 07:37:51', '2015-12-07 05:38:13', NULL),
(3, 3, 'Vijay', 'vijay@mahiti.org', '$2y$10$PpBwsC7FbRVqVZ88nh4yQ.IVGlYyB.xZn05T6.sUfD3od3io78G1.', 'Vijay', 'R', 'Mahit info Tech', 'Bangalore', '885985555', 'agriculture.png', 1, 'sYom71QIJJq3DBy8iPZb9TsYj6DaMXCFawgCZqUe10TWcqqZNhwlfuJCBQCR', '2015-12-02 07:37:52', '2015-12-07 23:10:49', NULL),
(4, 4, 'Venkatesan', 'venkatesan.c@mahiti.org', '$2y$10$QkcujPwNNkux89FT5WJ1xeUG2/lELMSMgu4oc.TJqVtAZJyHSmHky', 'Venkatesan', 'C', '', '', '0', '', 1, 'rzpE9apOmOzUo8Bu04V8R8tMNKCPtR7UB09FYFfXbs4iuZymNicUpQyJm5xE', '2015-12-02 07:37:52', '2015-12-07 05:54:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_village`
--

CREATE TABLE IF NOT EXISTS `rb_village` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `taluk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dtcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sdtcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tvcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `population` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `malepopulation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `femalepopulation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geoPoint` point NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `village_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rb_village`
--

INSERT INTO `rb_village` (`id`, `district_id`, `taluk`, `village`, `stcode`, `dtcode`, `sdtcode`, `tvcode`, `population`, `malepopulation`, `femalepopulation`, `geoPoint`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Mysore', 'Chikkanayakanahalli', '563', '899', '5473', '521', '3000', '1500', '1500', '\0\0\0\0\0\0\0×£p=\n×*@Ház®''S@', '2015-12-03 01:30:34', '2015-12-03 01:30:34', NULL),
(2, 1, 'Hangarahalli', 'Kunigal', '564', '900', '5474', '522', '4000', '3000', '1000', '\0\0\0\0\0\0\0\n×£p=\n*@R¸…ëAS@', '2015-12-03 01:30:35', '2015-12-03 01:30:35', NULL),
(3, 1, 'Hebbathanahalli', 'Mallasandara', '565', '901', '5475', '523', '6000', '2000', '4000', '\0\0\0\0\0\0\0hé\n¶*@ý3ƒøÀ`S@', '2015-12-03 01:30:35', '2015-12-03 01:30:35', NULL),
(4, 1, 'Adityapatna', 'Turuvekere', '566', '902', '5476', '524', '3000', '1000', '2000', '\0\0\0\0\0\0\0QfƒL2R*@t{Ic´*S@', '2015-12-03 01:30:36', '2015-12-03 01:30:36', NULL),
(5, 1, 'Abbanakuppe', 'Gubbi', '567', '903', '5477', '525', '3500', '2500', '1000', '\0\0\0\0\0\0\0B]Â¡Ÿ*@4J—þ%<S@', '2015-12-03 01:30:37', '2015-12-03 01:30:37', NULL),
(6, 1, 'Hosakote', 'Sira', '568', '904', '5478', '526', '5000', '1000', '4000', '\0\0\0\0\0\0\0­Šp“Q}+@O¯”eˆ9S@', '2015-12-03 01:30:37', '2015-12-03 01:30:37', NULL),
(7, 1, 'Halhalli', 'Bhalki', '569', '905', '5479', '527', '4000', '3000', '1000', '\0\0\0\0\0\0\0­Šp“Q}+@O¯”eˆ9S@', '2015-12-03 01:30:37', '2015-12-03 01:30:37', NULL),
(8, 1, 'Magadi', 'Tavarekere', '570', '906', '5480', '528', '4000', '3000', '1000', '\0\0\0\0\0\0\0j¼t“´)@Çº¸BS@', '2015-12-03 01:30:38', '2015-12-03 01:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_village_sector`
--

CREATE TABLE IF NOT EXISTS `rb_village_sector` (
  `village_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rb_village_sector`
--

INSERT INTO `rb_village_sector` (`village_id`, `sector_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 3),
(5, 4),
(5, 5),
(6, 3),
(6, 4),
(6, 5),
(7, 2),
(7, 5),
(8, 6),
(8, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rb_camps`
--
ALTER TABLE `rb_camps`
  ADD CONSTRAINT `camps_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `rb_cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rb_cards`
--
ALTER TABLE `rb_cards`
  ADD CONSTRAINT `cards_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `rb_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rb_users`
--
ALTER TABLE `rb_users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `rb_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
