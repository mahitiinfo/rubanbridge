-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 10:17 AM
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
  `budget` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `deliver_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `actual_budget` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `actual_orders` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `actual_deliver_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `camps_id_unique` (`id`),
  KEY `camps_card_id_index` (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rb_camps`
--

INSERT INTO `rb_camps` (`id`, `card_id`, `name`, `start_date`, `end_date`, `no_of_people`, `target`, `address`, `geoPoint`, `document`, `budget`, `order`, `deliver_time`, `status`, `comments`, `actual_budget`, `actual_orders`, `actual_deliver_time`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 'test', '2015-12-22', '2015-12-29', '234', 'etet', 'Kunigal Town Rd, Kunigal, Karnataka 572130, India', '\0\0\0\0\0\0\0)8/Z\r*@\0\0\0€BS@', '', '', '', '', 0, '', '', '', '', 0, '2015-12-07 04:08:56', '2015-12-07 04:08:56'),
(2, 2, 'Camp One', '2015-12-08', '2015-12-09', '23432', '23432', 'Mahiti Infotech Pvt. Ltd., #6, 1st Floor, Ganesh Chambers, Dodda Banasawadi, Main Road, Bengaluru, Karnataka 560045, India', '\0\0\0\0\0\0\0ÃÇqñ*@:¯±KjS@', '{"fileName":"349d982ea4cc4239b7d3554335e92a72.xlsx","filePath":"\\/uploads\\/camp\\/349d982ea4cc4239b7d3554335e92a72.xlsx","fileSize":1361922,"fileType":"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","fileExtension":"xlsx","fileOriginalName":"Karnataka Villages.xlsx"}', '', '', '', 0, '', '', '', '', 0, '2015-12-07 04:30:12', '2015-12-07 23:09:33'),
(3, 2, 'Camp two', '2015-12-08', '2015-12-09', '23432', '23432', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0\0Fü¸Fì)@ñÿ¯„peS@', '{"fileName":"83800e8634544b428899bade43947cd2.png","filePath":"\\/uploads\\/camp\\/83800e8634544b428899bade43947cd2.png","fileSize":7695,"fileType":"image\\/png","fileExtension":"png","fileOriginalName":"agriculture.png"}', '', '', '', 0, '', '', '', '', 0, '2015-12-07 04:30:20', '2015-12-07 23:02:46'),
(4, 2, 'Eye camp', '2015-12-08', '2015-12-24', '345', '23', 'Mahadevapura, Mahadevapura, Bengaluru, Karnataka, India', '\0\0\0\0\0\0\0=X‰û)@`V(ÒýkS@', '{"fileName":"5cd325f6e6ad479c9988f304ca2a7622.png","filePath":"\\/uploads\\/camp\\/5cd325f6e6ad479c9988f304ca2a7622.png","fileSize":7695,"fileType":"image\\/png","fileExtension":"png","fileOriginalName":"agriculture.png"}', '345', '33', '4', 2, 'test', '3456', '22', '3', 0, '2015-12-08 05:10:33', '2015-12-08 05:31:06'),
(5, 2, 'Eye Camp in bangalore', '2015-12-29', '2015-12-29', '1234', '234', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ö›‰éBì)@ptÎOqeS@', '0', '234', '234', '4', 0, '', '', '', '', 0, '2015-12-08 05:17:13', '2015-12-08 05:17:13'),
(6, 2, 'Two', '2015-12-22', '2015-12-17', '43', '23', 'Mahiti Infotech Pvt. Ltd., #6, 1st Floor, Ganesh Chambers, Dodda Banasawadi, Main Road, Bengaluru, Karnataka 560045, India', '\0\0\0\0\0\0\0ÃÇqñ*@:¯±KjS@', '{"fileName":"bb12b8ab06bc44418f669bf8faac993c.png","filePath":"\\/uploads\\/camp\\/bb12b8ab06bc44418f669bf8faac993c.png","fileSize":7695,"fileType":"image\\/png","fileExtension":"png","fileOriginalName":"agriculture.png"}', '23', '23', '2', 2, 'this is done', '22', '11', '20', 0, '2015-12-08 23:37:46', '2015-12-08 23:38:13'),
(7, 9, 'Camp1 - R1', '2016-01-07', '2015-12-15', '100', '20', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ùD‡iAì)@\0\0€FueS@', '0', '150000', '20', '2', 2, 'camp completed succesfully', '100000', '25', '2', 0, '2015-12-09 04:02:39', '2015-12-09 04:18:25'),
(8, 9, 'Card 1 - R2', '2015-12-09', '2015-12-15', '200', '200', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0OC½ˆNì)@Ð òteS@', '0', '20000', '200', '2', 3, 'incomplete camp -', '1000', '1', '2', 0, '2015-12-09 04:19:28', '2015-12-09 04:22:09'),
(9, 12, 'Eye TEst', '2015-12-22', '2015-12-15', '2', '2', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ö›‰éBì)@mtÎOqeS@', '0', '22', '2', '2', 1, 'asdfsdfsdf', '1', '1', '1', 0, '2015-12-10 07:17:40', '2015-12-10 07:22:36'),
(10, 14, 'Eye Camp', '2015-12-15', '2015-12-22', '1', '1', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ö›‰éBì)@mtÎOqeS@', '0', '1', '1', '1', 1, 'testet e e e etetet erwer', '2', '2', '', 0, '2015-12-11 05:25:21', '2015-12-11 10:53:06'),
(11, 17, 'new camp', '2015-12-28', '2015-12-22', '1', '', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ö›‰éBì)@mtÎOqeS@', '', '1', '1', '1', 1, 'sfsdfasdfsad', '2', '2', '', 0, '2015-12-15 05:54:56', '2015-12-15 07:11:19'),
(12, 16, 'new camp2', '2015-12-22', '2015-12-28', '2', '', '1st Cross Rd, Sampangi Rama Nagar, Bengaluru, Karnataka 560002, India', '\0\0\0\0\0\0\0ö›‰éBì)@mtÎOqeS@', '', '2', '2', '2', 1, 'asdfs sdf sdafsadf', '1', '1', '1', 0, '2015-12-15 05:55:22', '2015-12-15 07:14:09');

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
  `state_id` int(11) NOT NULL,
  `taluk_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cards_id_unique` (`id`),
  KEY `cards_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `rb_cards`
--

INSERT INTO `rb_cards` (`id`, `project_id`, `sector_id`, `district_id`, `name`, `camps`, `deliver_time`, `total_villagers`, `budget`, `orders`, `start_date`, `end_date`, `comments`, `image`, `active`, `status`, `state_id`, `taluk_id`, `added_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Card one', 12, '2', '3333', '1000', '43', '2015-12-29', '2015-12-30', 'Project TwoProject TwoProject TwoProject TwoProject TwoProject Two', 'education.png', 1, 1, 0, 0, 0, 0, '2015-12-02 08:20:51', '2015-12-04 03:01:53', NULL),
(2, 2, 1, 1, 'Card two', 11, '33', '2323', '5467886', '44', '2015-12-29', '2015-12-30', 'Project TwoProject TwoProject TwoProject Two', 'water-icon.png', 1, 2, 0, 0, 0, 0, '2015-12-02 08:21:21', '2015-12-08 23:26:52', NULL),
(3, 1, 3, 1, 'Eye Testing', 45, '43', '787', '3456', '234', '2015-12-24', '2015-12-31', 'Eye testing', 'madical.png', 1, 0, 0, 0, 0, 0, '2015-12-03 07:48:25', '2015-12-04 05:02:16', NULL),
(4, 1, 1, 1, 'Growing grapes', 12, '123', '34555', '550000', '223', '2015-12-01', '2015-12-26', 'Comment', 'hand-wash-icon.png', 1, 0, 0, 0, 0, 0, '2015-12-04 05:01:59', '2015-12-04 05:02:59', NULL),
(5, 1, 3, 1, 'Left eye chcek up', 22, '3232', '3232', '32323', '232', '2015-12-01', '2015-12-31', 'ewwqe', '', 1, 0, 0, 0, 0, 0, '2015-12-04 05:05:23', '2015-12-04 05:05:23', NULL),
(6, 3, 2, 1, 'Test Card', 22, '32', '222', '2221', '12', '2015-12-23', '2015-12-25', 'teste', '', 1, 0, 0, 0, 0, 0, '2015-12-04 06:37:27', '2015-12-04 06:37:27', NULL),
(8, 1, 1, 1, 'Test Card two', 333, '33', '333', '333', '33', '2015-12-22', '2015-12-30', 'asd asd sadf sad sd dfs', 'agriculture.png', 1, 0, 0, 0, 0, 0, '2015-12-07 05:35:35', '2015-12-07 05:37:43', NULL),
(9, 4, 3, 1, 'Region 1', 2, '2', '200', '30000', '50', '2015-12-09', '2015-12-12', 'Region 1 - eye neetralaya', '0', 1, 0, 0, 0, 0, 0, '2015-12-09 03:48:31', '2015-12-09 03:48:31', NULL),
(10, 4, 3, 1, 'Region 2', 2, '2', '400', '20000', '15', '2015-12-08', '2015-12-15', 'Region 2 - Eye neetralaya', '0', 1, 0, 0, 0, 0, 0, '2015-12-09 03:53:05', '2015-12-09 03:53:05', NULL),
(11, 4, 3, 1, 'Eye card', 45, '56', '234', '3456', '23', '2016-01-07', '2015-12-24', 'tet sa sa asd sad fsddfs', '0', 1, 0, 0, 0, 0, 0, '2015-12-09 07:38:12', '2015-12-09 07:38:12', NULL),
(12, 5, 2, 1, 'Timeline Card', 3, '3', '3', '32', '2', '2015-12-30', '2015-12-16', 'teteteeetetette', 'hand-wash-icon.png', 1, 0, 0, 0, 0, 0, '2015-12-10 03:15:29', '2015-12-10 03:15:29', NULL),
(13, 5, 2, 1, 'Timeline two', 3, '2', '23', '2', '2', '2015-12-29', '2015-12-10', 'Timeline twoTimeline two', 'agriculture.png', 1, 0, 0, 0, 0, 0, '2015-12-10 06:09:56', '2015-12-10 06:09:56', NULL),
(14, 5, 2, 1, 'new eye', 2, '3', '3', '3', '3', '2015-12-22', '2015-12-22', 'asdfasdf', 'agriculture.png', 1, 0, 0, 0, 0, 0, '2015-12-10 07:07:40', '2015-12-10 07:07:40', NULL),
(15, 5, 2, 1, 'Another Eye Test', 1, '1', '1', '1', '1', '2015-12-15', '2015-12-29', 'Another Eye TestAnother Eye TestAnother Eye TestAnother Eye TestAnother Eye Test', 'education.png', 1, 1, 0, 0, 0, 0, '2015-12-11 04:57:50', '2015-12-11 04:57:50', NULL),
(16, 6, 1, 1, 'new card', 1, '1', '1', '1', '1', '2015-12-29', '2015-12-23', 'sdsfd', '0', 1, 1, 0, 0, 0, 0, '2015-12-15 05:53:17', '2015-12-15 05:53:17', NULL),
(17, 6, 1, 1, 'new card 2', 1, '1', '1', '1', '1', '2015-12-22', '2015-12-16', 'teeteetet', '0', 1, 1, 0, 0, 0, 0, '2015-12-15 05:53:52', '2015-12-15 05:53:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_disputes`
--

CREATE TABLE IF NOT EXISTS `rb_disputes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `disputes_id_unique` (`id`),
  KEY `disputes_project_id_index` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rb_disputes`
--

INSERT INTO `rb_disputes` (`id`, `project_id`, `reason`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 6, 'Fake order', 1, 1, 1, '2015-12-15 09:54:06', '2015-12-15 10:23:14'),
(2, 6, 'Fake registration', 0, 1, 0, '2015-12-15 10:18:59', '2015-12-15 10:18:59'),
(3, 6, 'Other', 0, 1, 0, '2015-12-15 10:19:28', '2015-12-15 10:19:28'),
(4, 6, 'Fake order', 0, 1, 0, '2015-12-15 10:33:34', '2015-12-15 10:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `rb_district`
--

CREATE TABLE IF NOT EXISTS `rb_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `rb_district` (`id`, `state_id`, `district`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Banglore', '2015-12-14 12:28:51', '2015-12-14 12:28:51', NULL);

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
(2, 'Client', '{"ruban.home":"1","users.updateprofile":"1","users.profileudpate":"1","projects.create":"1","projects.edit":"1","projects.view":"1","projects.update":"1","projects.ajax":"1","cards.create":"1","cards.edit":"1","cards.view":"1","cards.update":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.import":"1","districts.ajax":"1","payouts.create":"1","payouts.edit":"1","payouts.view":"1","payouts.update":"1"}', 1, '2015-12-02 07:35:20', '2015-12-15 05:45:17', NULL),
(3, 'Partner', '{"ruban.home":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","cards.view":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1","camps.edit":"1","camps.view":"1","camps.update":"1","camps.download":"1","camps.import":"1","camps.getcamp":"1","tasks.create":"1","tasks.edit":"1","tasks.view":"1","tasks.update":"1"}', 1, '2015-12-02 07:35:20', '2015-12-14 09:18:14', NULL),
(4, 'Operator', '{"ruban.home":"1","users.view":"1","users.profile":"1","users.updateprofile":"1","users.profileudpate":"1","projects.view":"1","projects.ajax":"1","cards.edit":"1","cards.view":"1","cards.update":"1","cards.ajaxDistrict":"1","cards.updatepartner":"1","cards.assignupdate":"1","districts.ajax":"1","camps.create":"1","camps.edit":"1","camps.view":"1","camps.update":"1","camps.download":"1","camps.getcamp":"1","tasks.create":"1","tasks.edit":"1","tasks.view":"1","tasks.update":"1","payouts.create":"1","payouts.edit":"1","payouts.view":"1","payouts.update":"1"}', 1, '2015-12-02 07:35:20', '2015-12-15 05:45:30', NULL);

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
('2015_12_07_064319_create_camps_table', 7),
('2015_12_10_064738_create_timeline_table', 8),
('2015_12_14_114005_create_tasks_table', 9),
('2015_12_15_140115_create_disputes_table', 10);

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
(3, 3),
(3, 9),
(3, 8),
(3, 10),
(3, 12),
(3, 14),
(3, 17),
(3, 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rb_permissions`
--

INSERT INTO `rb_permissions` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', '["ruban.home"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(2, 'Users', '["users.create","users.view","users.delete","users.update","users.profile","users.updateprofile","users.profileudpate"]', '2015-12-02 07:37:55', '2015-12-04 02:09:15', NULL),
(3, 'Groups', '["groups.view","groups.create","groups.update","groups.delete"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(4, 'Permissions', '["permissions.view","permissions.create","permissions.update","permissions.delete"]', '2015-12-02 07:37:55', '2015-12-02 07:37:55', NULL),
(5, 'Projects', '["projects.create","projects.edit","projects.view","projects.delete","projects.update","projects.ajax"]', '2015-12-02 07:37:55', '2015-12-10 03:12:18', NULL),
(6, 'Cards', '["cards.create","cards.edit","cards.view","cards.delete","cards.update","cards.ajaxDistrict","cards.updatepartner","cards.assignupdate"]', '2015-12-02 07:37:55', '2015-12-03 07:34:17', NULL),
(7, 'Districts', '["districts.create","districts.view","districts.delete","districts.update","districts.import","districts.ajax"]', '2015-12-02 07:37:55', '2015-12-03 07:34:06', NULL),
(8, 'Camps', '["camps.create","camps.edit","camps.view","camps.delete","camps.update","camps.download","camps.import","camps.getcamp"]', '2015-12-07 02:03:12', '2015-12-14 09:17:43', NULL),
(9, 'Tasks', '["tasks.create","tasks.edit","tasks.view","tasks.delete","tasks.update","tasks.import","tasks.importstore"]', '2015-12-14 06:26:29', '2015-12-14 09:38:35', NULL),
(10, 'Payouts', '["payouts.create","payouts.edit","payouts.view","payouts.delete","payouts.update"]', '2015-12-15 05:43:18', '2015-12-15 05:43:18', NULL);

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
  `state_id` int(11) NOT NULL,
  `taluk_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rb_projects`
--

INSERT INTO `rb_projects` (`id`, `name`, `sector_id`, `district_id`, `camps`, `deliver_time`, `total_villagers`, `budget`, `orders`, `start_date`, `end_date`, `comments`, `image`, `active`, `status`, `state_id`, `taluk_id`, `added_by`, `updated_by`, `payment_status`, `payment_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Project One', 3, 1, 123, '32', '1000000', '12345', '456', '2015-12-15', '2015-12-22', 'project One,project One,project One,project Oneproject Oneproject Oneproject Oneproject One', 'madical.png', 1, 1, 0, 0, 0, 0, 0, NULL, '2015-12-02 08:18:51', '2015-12-02 08:18:51', NULL),
(2, 'Project Two', 2, 1, 123, '22', '12333', '456', '3333', '2015-12-29', '2015-12-31', 'Project Two Project TwoProject TwoProject TwoProject TwoProject Two', 'education.png', 1, 2, 0, 0, 0, 0, 0, NULL, '2015-12-02 08:19:54', '2015-12-02 08:19:54', NULL),
(3, 'Test Project', 2, 1, 1111, '332', '45678', '3233', '32', '2015-12-15', '2015-12-29', 'test', 'education.png', 1, 2, 0, 0, 0, 0, 0, NULL, '2015-12-04 06:36:44', '2015-12-15 05:49:46', NULL),
(4, 'Eye Neetralaya', 3, 1, 4, '2', '800', '75000', '200', '2015-12-07', '2015-12-15', 'Netralaya - eye testing', '0', 1, 1, 0, 0, 0, 0, 0, NULL, '2015-12-09 03:42:00', '2015-12-09 03:42:00', NULL),
(5, 'Timeline project', 2, 1, 5, '56', '500', '5000', '45', '2015-12-29', '2015-12-30', 'teste', 'hand-wash-icon.png', 1, 2, 0, 0, 0, 0, 0, NULL, '2015-12-10 03:09:01', '2015-12-10 03:09:01', NULL),
(6, 'new project', 1, 1, 1, '1', '1', '1', '1', '2015-12-28', '2015-12-28', 'testet', '0', 1, 2, 0, 0, 0, 0, 1, '2015-12-15 17:13:45', '2015-12-14 12:45:47', '2015-12-15 11:43:45', NULL);

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
-- Table structure for table `rb_state`
--

CREATE TABLE IF NOT EXISTS `rb_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rb_state`
--

INSERT INTO `rb_state` (`id`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Karnataka', '2015-12-14 12:28:51', '2015-12-14 12:28:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_taluk`
--

CREATE TABLE IF NOT EXISTS `rb_taluk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `taluk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rb_taluk`
--

INSERT INTO `rb_taluk` (`id`, `district_id`, `taluk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Banglore', '2015-12-14 12:28:51', '2015-12-14 12:28:51', NULL),
(2, 1, 'Anekal', '2015-12-14 12:28:52', '2015-12-14 12:28:52', NULL),
(3, 1, 'Bangalore North', '2015-12-14 12:28:52', '2015-12-14 12:28:52', NULL),
(4, 1, 'Bangalore South', '2015-12-14 12:28:53', '2015-12-14 12:28:53', NULL),
(5, 1, 'Bangalore East', '2015-12-14 12:28:56', '2015-12-14 12:28:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_tasks`
--

CREATE TABLE IF NOT EXISTS `rb_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_value` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_people` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tasks_id_unique` (`id`),
  KEY `tasks_card_id_index` (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `rb_tasks`
--

INSERT INTO `rb_tasks` (`id`, `card_id`, `camp_id`, `title`, `order_value`, `delivery_time`, `no_of_people`, `description`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 14, 0, 'test', '3', '3', '3', '3', 1, 0, 0, '2015-12-14 07:24:56', '2015-12-14 08:44:31'),
(2, 12, 9, 'teset', '1', '1', '1', 'xsad', 0, 0, 0, '2015-12-14 09:22:11', '2015-12-14 09:24:03'),
(3, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:47:08', '2015-12-14 10:47:08'),
(4, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:47:08', '2015-12-14 10:47:08'),
(5, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:47:08', '2015-12-14 10:47:08'),
(6, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:47:08', '2015-12-14 10:47:08'),
(7, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:47:08', '2015-12-14 10:47:08'),
(8, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:49:23', '2015-12-14 10:49:23'),
(9, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:49:23', '2015-12-14 10:49:23'),
(10, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:49:23', '2015-12-14 10:49:23'),
(11, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:49:23', '2015-12-14 10:49:23'),
(12, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:49:23', '2015-12-14 10:49:23'),
(13, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:50:30', '2015-12-14 10:50:30'),
(14, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:50:30', '2015-12-14 10:50:30'),
(15, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:50:30', '2015-12-14 10:50:30'),
(16, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:50:30', '2015-12-14 10:50:30'),
(17, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:50:30', '2015-12-14 10:50:30'),
(18, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:51:56', '2015-12-14 10:51:56'),
(19, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:51:56', '2015-12-14 10:51:56'),
(20, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:51:57', '2015-12-14 10:51:57'),
(21, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:51:57', '2015-12-14 10:51:57'),
(22, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:51:57', '2015-12-14 10:51:57'),
(23, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:52:36', '2015-12-14 10:52:36'),
(24, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:52:36', '2015-12-14 10:52:36'),
(25, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:52:36', '2015-12-14 10:52:36'),
(26, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:52:36', '2015-12-14 10:52:36'),
(27, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:52:36', '2015-12-14 10:52:36'),
(28, 1, 4, 'Banglore', '899', '5473', '521', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:53:58', '2015-12-14 10:53:58'),
(29, 1, 4, 'Anekal', '900', '5474', '522', 'Bommasandra Census Town', 0, 0, 0, '2015-12-14 10:53:58', '2015-12-14 10:53:58'),
(30, 1, 4, 'Bangalore North', '901', '5475', '523', 'Chikkabidarakallu Census Town', 0, 0, 0, '2015-12-14 10:53:58', '2015-12-14 10:53:58'),
(31, 1, 4, 'Bangalore South', '902', '5476', '524', 'Konappana Agrahara Census Town', 0, 0, 0, '2015-12-14 10:53:58', '2015-12-14 10:53:58'),
(32, 14, 4, 'Bangalore East', '903', '5477', '525', 'BBMP Municipal Corporation', 0, 0, 0, '2015-12-14 10:53:59', '2015-12-14 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `rb_timeline`
--

CREATE TABLE IF NOT EXISTS `rb_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_type` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `timeline_id_unique` (`id`),
  KEY `timeline_object_id_index` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `rb_timeline`
--

INSERT INTO `rb_timeline` (`id`, `object_id`, `object_type`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'create', 'Timeline project project has created', '2015-12-10 03:09:02', '2015-12-10 03:09:02'),
(2, 12, 2, 'create', 'Timeline card card has created', '2015-12-10 03:15:29', '2015-12-10 03:15:29'),
(3, 12, 3, 'assign', 'Timeline card  card has assigned to vijay', '2015-12-10 03:17:57', '2015-12-10 03:17:57'),
(4, 5, 1, 'update', 'Timeline project project has created', '2015-12-10 03:19:28', '2015-12-10 03:19:28'),
(5, 13, 2, 'create', 'Timeline project project has created', '2015-12-10 06:09:57', '2015-12-10 06:09:57'),
(6, 14, 2, 'create', '<a href="javascript:;">new eye</a> card has been created.', '2015-12-10 07:07:40', '2015-12-10 07:07:40'),
(7, 9, 4, 'create', '<a href="javascript:;">Eye TEst</a> camp has been created.', '2015-12-10 07:17:40', '2015-12-10 07:17:40'),
(8, 5, 1, 'update', '<a href="javascript:;">Timeline project</a> project has been updated.', '2015-12-10 07:20:30', '2015-12-10 07:20:30'),
(9, 9, 4, 'update', '<a href="javascript:;">Eye TEst</a> camp has been updated.', '2015-12-10 07:22:36', '2015-12-10 07:22:36'),
(10, 14, 3, 'assign', '<a href="javascript:;">new eye</a> has assigned to Vijay R.', '2015-12-10 07:23:27', '2015-12-10 07:23:27'),
(11, 14, 2, 'update', '<a href="javascript:;">new eye</a> card has been updated.', '2015-12-10 13:09:35', '2015-12-10 13:09:35'),
(12, 15, 2, 'create', '<a href="javascript:;">Another Eye Test</a> card has been created.', '2015-12-11 04:57:50', '2015-12-11 04:57:50'),
(13, 10, 4, 'create', '<a href="javascript:;">Eye Camp</a> camp has been created.', '2015-12-11 05:25:21', '2015-12-11 05:25:21'),
(14, 10, 4, 'update', '<a href="javascript:;">Eye Camp</a> camp has been updated.', '2015-12-11 05:26:03', '2015-12-11 05:26:03'),
(15, 10, 4, 'update', '<a href="javascript:;">Eye Camp</a> camp has been updated by Vijay R.', '2015-12-11 10:24:12', '2015-12-11 10:24:12'),
(16, 10, 4, 'update', '<a href="javascript:;">Eye Camp</a> camp has been updated by Vijay R.', '2015-12-11 10:46:26', '2015-12-11 10:46:26'),
(17, 10, 4, 'update', '<a href="javascript:;">R</a> changed the Eye Camp camp status to Completed.', '2015-12-11 10:48:23', '2015-12-11 10:48:23'),
(18, 10, 4, 'update', '<a href="javascript:;">Vijay R</a> changed the Eye Camp camp status to Incompleted.', '2015-12-11 10:53:06', '2015-12-11 10:53:06'),
(19, 2, 5, 'create', '<a href="javascript:;">teete</a> task has been created by Vijay R.', '2015-12-14 07:22:44', '2015-12-14 07:22:44'),
(20, 3, 5, 'create', '<a href="javascript:;">teete</a> task has been created by Vijay R.', '2015-12-14 07:23:04', '2015-12-14 07:23:04'),
(21, 1, 5, 'create', '<a href="javascript:;">test</a> task has been created by Vijay R.', '2015-12-14 07:24:56', '2015-12-14 07:24:56'),
(22, 1, 5, 'update', '<a href="javascript:;">Vijay R</a> changed the test task status to Completed.', '2015-12-14 08:44:31', '2015-12-14 08:44:31'),
(23, 2, 5, 'create', '<a href="javascript:;">12</a> task has been created by Vijay R.', '2015-12-14 09:22:12', '2015-12-14 09:22:12'),
(24, 2, 5, 'update', '<a href="javascript:;">12</a> task has been updated by Vijay R.', '2015-12-14 09:22:22', '2015-12-14 09:22:22'),
(25, 2, 5, 'update', '<a href="javascript:;">teset</a> task has been updated by Vijay R.', '2015-12-14 09:24:03', '2015-12-14 09:24:03'),
(26, 6, 1, 'create', '<a href="javascript:;">new project</a> project has been created by Venkatesan C.', '2015-12-14 12:45:47', '2015-12-14 12:45:47'),
(27, 6, 1, 'update', '<a href="javascript:;">new project</a> project has been updated by Venkatesan C.', '2015-12-14 12:46:08', '2015-12-14 12:46:08'),
(28, 6, 1, 'update', '<a href="javascript:;">new project</a> project has been updated by Venkatesan C.', '2015-12-14 12:49:14', '2015-12-14 12:49:14'),
(29, 6, 1, 'update', '<a href="javascript:;">new project</a> project has been updated by Arun Kumar.', '2015-12-15 05:28:12', '2015-12-15 05:28:12'),
(30, 6, 1, 'update', '<a href="javascript:;">new project</a> project has been updated by Arun Kumar.', '2015-12-15 05:49:36', '2015-12-15 05:49:36'),
(31, 3, 1, 'update', '<a href="javascript:;">Test Project</a> project has been updated by Arun Kumar.', '2015-12-15 05:49:46', '2015-12-15 05:49:46'),
(32, 16, 2, 'create', '<a href="javascript:;">new card</a> card has been created by Venkatesan C.', '2015-12-15 05:53:18', '2015-12-15 05:53:18'),
(33, 17, 2, 'create', '<a href="javascript:;">new card 2</a> card has been created by Venkatesan C.', '2015-12-15 05:53:52', '2015-12-15 05:53:52'),
(34, 17, 3, 'assign', '<a href="javascript:;">new card 2</a> card has been assigned to Vijay R by Venkatesan C.', '2015-12-15 05:54:23', '2015-12-15 05:54:23'),
(35, 16, 3, 'assign', '<a href="javascript:;">new card</a> card has been assigned to Vijay R by Venkatesan C.', '2015-12-15 05:54:30', '2015-12-15 05:54:30'),
(36, 11, 4, 'create', '<a href="javascript:;">new camp</a> camp has been created by Venkatesan C.', '2015-12-15 05:54:57', '2015-12-15 05:54:57'),
(37, 12, 4, 'create', '<a href="javascript:;">new camp2</a> camp has been created by Venkatesan C.', '2015-12-15 05:55:22', '2015-12-15 05:55:22'),
(38, 11, 4, 'update', '<a href="javascript:;">Vijay R</a> changed the new camp camp status to Completed.', '2015-12-15 05:55:48', '2015-12-15 05:55:48'),
(39, 11, 4, 'update', '<a href="javascript:;">new camp</a> camp has been updated by Vijay R.', '2015-12-15 07:11:19', '2015-12-15 07:11:19'),
(40, 12, 4, 'update', '<a href="javascript:;">Vijay R</a> changed the new camp2 camp status to Completed.', '2015-12-15 07:14:09', '2015-12-15 07:14:09');

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
(1, 1, 'Venkatesan', 'venkatesangee@gmail.com', '$2y$10$IR4FuY2Z3QwBUDedlgsqiO4WV9YWDTYXSDzLr4903TIsjSLbdz2em', 'Venkatesan', 'C', '', '', '0', '', 1, 'oSy4fSk8srzjmqn1Erdkouf92spCXqCzwin07p35SOUMisX91na7htQZE9EG', '2015-12-02 07:37:51', '2015-12-15 12:42:46', NULL),
(2, 2, 'Arun', 'arun.kumar@mahiti.org', '$2y$10$4Oy5LU7nRvH0Uk8jzYNlUOZasW3xrgzdy1kVe0IoMp1bxAEvqXG7W', 'Arun', 'Kumar', '', '', '0', '', 1, 'c3LMKzVYhystCs0eg5MWatmvNT69tMKrBtjZYq66w4q9Kh4PoAaKpobK1Nbz', '2015-12-02 07:37:51', '2015-12-15 05:50:49', NULL),
(3, 3, 'Vijay', 'vijay@mahiti.org', '$2y$10$PpBwsC7FbRVqVZ88nh4yQ.IVGlYyB.xZn05T6.sUfD3od3io78G1.', 'Vijay', 'R', 'Mahit info Tech', 'Bangalore', '885985555', 'agriculture.png', 1, 'UmPMENfYcniyYp570r034o3Ps908bvIeRJRLqLYM6OthKwwTK4dGGIdcdWM3', '2015-12-02 07:37:52', '2015-12-15 07:14:12', NULL),
(4, 4, 'Venkatesan', 'venkatesan.c@mahiti.org', '$2y$10$QkcujPwNNkux89FT5WJ1xeUG2/lELMSMgu4oc.TJqVtAZJyHSmHky', 'Venkatesan', 'C', '', '', '0', '', 1, 'wOz8C5rCiFlDSUJZIJO7Pg1U8gp2X9bd5Eryzysjbfn3LLG9covKHB5B4lJs', '2015-12-02 07:37:52', '2015-12-15 12:44:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_village`
--

CREATE TABLE IF NOT EXISTS `rb_village` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `taluk_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rb_village`
--

INSERT INTO `rb_village` (`id`, `district_id`, `taluk_id`, `village`, `stcode`, `dtcode`, `sdtcode`, `tvcode`, `population`, `malepopulation`, `femalepopulation`, `geoPoint`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, 'BBMP Municipal Corporation', '567', '903', '5477', '525', '3500', '2500', '1000', '\0\0\0\0\0\0\04-±2\n*@)ËÇºiS@', '2015-12-14 12:30:47', '2015-12-14 12:31:33', NULL),
(2, 1, 2, 'Bommasandra Census Town', '564', '900', '5474', '522', '4000', '3000', '1000', '\0\0\0\0\0\0\0¶ŸŒña¦)@ÀDˆ+oS@', '2015-12-14 12:31:32', '2015-12-14 12:31:32', NULL),
(3, 1, 3, 'Chikkabidarakallu Census Town', '565', '901', '5475', '523', '6000', '2000', '4000', '\0\0\0\0\0\0\0»”X*@>Ð\nY_S@', '2015-12-14 12:31:33', '2015-12-14 12:31:33', NULL),
(4, 1, 4, 'Konappana Agrahara Census Town', '566', '902', '5476', '524', '3000', '1000', '2000', '\0\0\0\0\0\0\0&Ä\\Rµµ)@È‚Z¿jS@', '2015-12-14 12:31:33', '2015-12-14 12:31:33', NULL);

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
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(33, 3),
(33, 4),
(33, 5),
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
(1, 3),
(1, 4),
(1, 5);

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
-- Constraints for table `rb_disputes`
--
ALTER TABLE `rb_disputes`
  ADD CONSTRAINT `disputes_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `rb_cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rb_users`
--
ALTER TABLE `rb_users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `rb_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
