-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 06:07 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shahrasti`
--

-- --------------------------------------------------------

--
-- Table structure for table `babosthas`
--

CREATE TABLE IF NOT EXISTS `babosthas` (
  `id` int(11) NOT NULL,
  `entryform_id` int(11) NOT NULL,
  `subcategory_id` varchar(255) DEFAULT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `maincategory_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `babosthas`
--

INSERT INTO `babosthas` (`id`, `entryform_id`, `subcategory_id`, `childcategory_id`, `maincategory_id`, `designation_id`) VALUES
(1, 60, '11', 0, 0, 0),
(2, 62, '13', 0, 0, 0),
(3, 63, '11', 0, 0, 0),
(4, 64, '13', 7, 1, 0),
(5, 66, '11', 4, 5, 21),
(6, 66, '11', 4, 5, 22),
(7, 67, '13', 7, 1, 20),
(8, 67, '11', 4, 5, 22),
(9, 67, '11', 4, 5, 22),
(10, 67, '11', 4, 5, 22),
(11, 67, '11', 4, 5, 22),
(12, 67, '11', 4, 5, 22),
(13, 67, '11', 4, 5, 22),
(14, 67, '11', 4, 5, 22),
(15, 67, '11', 4, 5, 22),
(16, 67, '11', 4, 5, 22),
(17, 68, '13', 7, 1, 20),
(18, 69, '13', 7, 1, 20),
(19, 70, '11', 4, 5, 22),
(20, 70, '13', 7, 1, 20),
(21, 70, NULL, NULL, -1, NULL),
(22, 70, NULL, NULL, -1, NULL),
(23, 70, NULL, NULL, -1, NULL),
(24, 70, NULL, NULL, -1, NULL),
(25, 70, NULL, NULL, -1, NULL),
(26, 70, NULL, NULL, -1, NULL),
(27, 70, NULL, NULL, -1, NULL),
(28, 70, NULL, NULL, -1, NULL),
(29, 71, '13', 7, 1, 20),
(30, 71, '11', 4, 5, 22),
(31, 71, NULL, NULL, NULL, NULL),
(32, 71, NULL, NULL, NULL, NULL),
(33, 71, NULL, NULL, NULL, NULL),
(34, 71, NULL, NULL, NULL, NULL),
(35, 71, NULL, NULL, NULL, NULL),
(36, 71, NULL, NULL, NULL, NULL),
(37, 71, NULL, NULL, NULL, NULL),
(38, 71, NULL, NULL, NULL, NULL),
(39, 72, '13', 7, 1, 20),
(40, 72, NULL, NULL, NULL, NULL),
(41, 72, '12', 4, 5, 24),
(42, 72, NULL, NULL, NULL, NULL),
(43, 72, NULL, NULL, NULL, NULL),
(44, 72, NULL, NULL, NULL, NULL),
(45, 72, NULL, NULL, NULL, NULL),
(46, 72, NULL, NULL, NULL, NULL),
(47, 72, NULL, NULL, NULL, NULL),
(48, 72, NULL, NULL, NULL, NULL),
(49, 73, '11', 4, 5, 22),
(50, 73, '10', 7, 1, 20),
(51, 73, NULL, NULL, NULL, NULL),
(52, 73, NULL, NULL, NULL, NULL),
(53, 73, NULL, NULL, NULL, NULL),
(54, 73, NULL, NULL, NULL, NULL),
(55, 73, NULL, NULL, NULL, NULL),
(56, 73, NULL, NULL, NULL, NULL),
(57, 73, NULL, NULL, NULL, NULL),
(58, 73, NULL, NULL, NULL, NULL),
(59, 74, '11', 4, 5, 22),
(60, 74, NULL, NULL, NULL, NULL),
(61, 74, NULL, NULL, NULL, NULL),
(62, 74, NULL, NULL, NULL, NULL),
(63, 74, NULL, NULL, NULL, NULL),
(64, 74, NULL, NULL, NULL, NULL),
(65, 74, NULL, NULL, NULL, NULL),
(66, 74, NULL, NULL, NULL, NULL),
(67, 74, NULL, NULL, NULL, NULL),
(68, 74, NULL, NULL, NULL, NULL),
(69, 75, NULL, NULL, NULL, NULL),
(70, 75, NULL, NULL, NULL, NULL),
(71, 75, NULL, NULL, NULL, NULL),
(72, 75, NULL, NULL, NULL, NULL),
(73, 75, NULL, NULL, NULL, NULL),
(74, 75, NULL, NULL, NULL, NULL),
(75, 75, NULL, NULL, NULL, NULL),
(76, 75, NULL, NULL, NULL, NULL),
(77, 75, NULL, NULL, NULL, NULL),
(78, 75, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `weeks` tinyint(4) NOT NULL,
  `time` time NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `racquet` char(1) NOT NULL,
  `checkIn` char(1) NOT NULL,
  `checkOut` char(1) NOT NULL,
  `paymentType` char(1) NOT NULL,
  `type` char(1) NOT NULL,
  `slot` varchar(15) NOT NULL,
  `tennise_id` int(11) NOT NULL,
  `tid` double NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(75) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `member_id`, `day`, `weeks`, `time`, `trainee_id`, `racquet`, `checkIn`, `checkOut`, `paymentType`, `type`, `slot`, `tennise_id`, `tid`, `name`, `status`, `created`, `modified`) VALUES
(1, 27, 4, 45, '11:15:00', 2, '1', '1', '1', '1', '1', 'Non-Prime', 223, 45201511031115, '', '1', '2015-11-03 11:15:00', '2015-11-03 10:59:55'),
(2, 27, 4, 45, '12:00:00', 6, '1', '', '', '2', '1', 'Non-Prime', 224, 45201511031200, '', '1', '2015-11-03 12:00:00', '2015-11-03 11:00:32'),
(3, 27, 4, 45, '12:45:00', 8, '1', '', '', '1', '1', 'Non-Prime', 225, 45201511031245, '', '1', '2015-11-03 12:45:00', '2015-11-03 11:01:24'),
(4, 27, 4, 45, '13:30:00', 7, '1', '', '', '1', '1', 'Non-Prime', 226, 45201511030130, '', '2', '2015-11-03 13:30:00', '2015-11-03 12:04:27'),
(5, 0, 4, 45, '13:30:00', 1, '1', '', '', '1', '2', 'Non-Prime', 247, 45201511030130, '', '2', '2015-11-03 13:30:00', '2015-11-03 12:04:27'),
(6, 0, 5, 45, '06:00:00', 2, '1', '', '', '1', '2', 'Prime', 237, 45201511040600, '', '2', '2015-11-04 06:00:00', '2015-11-03 12:12:47'),
(7, 25, 4, 45, '14:15:00', 1, '1', '', '', '1', '2', 'Non-Prime', 248, 45201511030215, '', '1', '2015-11-03 14:15:00', '2015-11-03 14:16:20'),
(8, 25, 4, 45, '16:30:00', 7, '1', '', '', '1', '2', 'Prime', 251, 45201511030430, '', '1', '2015-11-03 16:30:00', '2015-11-03 14:17:06'),
(9, 25, 4, 45, '15:00:00', 2, '1', '', '', '1', '2', 'Non-Prime', 249, 45201511030300, '', '1', '2015-11-03 15:00:00', '2015-11-03 14:17:30'),
(10, 25, 4, 45, '15:45:00', 6, '1', '', '', '2', '2', 'Non-Prime', 250, 45201511030345, '', '1', '2015-11-03 15:45:00', '2015-11-03 14:17:49'),
(11, 25, 4, 45, '18:45:00', 9, '1', '', '', '2', '2', 'Non-Prime', 236, 45201511030645, '', '1', '2015-11-03 18:45:00', '2015-11-03 14:18:17'),
(12, 25, 4, 45, '20:15:00', 9, '1', '', '', '2', '2', 'Non-Prime', 256, 45201511030815, '', '1', '2015-11-03 20:15:00', '2015-11-03 14:27:16'),
(13, 27, 5, 45, '12:00:00', 3, '1', '', '', '1', '1', 'Non-Prime', 224, 45201511041200, '', '2', '2015-11-04 12:00:00', '2015-11-04 02:39:32'),
(14, 27, 5, 45, '12:45:00', 7, '1', '', '', '2', '1', 'Non-Prime', 225, 45201511041245, '', '2', '2015-11-04 12:45:00', '2015-11-04 12:43:49'),
(15, 27, 5, 45, '13:30:00', 9, '1', '', '', '1', '1', 'Non-Prime', 226, 45201511040130, '', '2', '2015-11-04 13:30:00', '2015-11-04 12:47:36'),
(16, 27, 5, 45, '14:15:00', 1, '1', '', '', '2', '1', 'Non-Prime', 227, 45201511040215, '', '2', '2015-11-04 14:15:00', '2015-11-04 12:47:24'),
(17, 27, 5, 45, '12:45:00', 10, '1', '', '', '1', '2', 'Non-Prime', 246, 45201511041245, '', '2', '2015-11-04 12:45:00', '2015-11-04 12:43:49'),
(18, 27, 5, 45, '13:30:00', 2, '1', '', '', '1', '2', 'Non-Prime', 247, 45201511040130, '', '2', '2015-11-04 13:30:00', '2015-11-04 12:47:36'),
(19, 27, 5, 45, '14:15:00', 11, '1', '', '', '1', '2', 'Non-Prime', 248, 45201511040215, '', '2', '2015-11-04 14:15:00', '2015-11-04 12:47:24'),
(20, 27, 5, 45, '15:00:00', 2, '2', '', '', '1', '1', 'Non-Prime', 228, 45201511040300, '', '1', '2015-11-04 15:00:00', '2015-11-04 12:28:07'),
(21, 27, 5, 45, '16:30:00', 9, '1', '', '', '2', '1', 'Non-Prime', 230, 45201511040430, '', '1', '2015-11-04 16:30:00', '2015-11-04 12:28:58'),
(22, 27, 5, 45, '18:00:00', 7, '1', '', '', '1', '1', 'Prime', 232, 45201511040600, 'tonmoy', '1', '2015-11-04 18:00:00', '2015-11-04 12:29:39'),
(23, 27, 5, 45, '20:15:00', 9, '1', '', '', '1', '1', 'Non-Prime', 234, 45201511040815, '', '1', '2015-11-04 20:15:00', '2015-11-04 12:30:04'),
(24, 27, 5, 45, '15:45:00', 6, '1', '', '', '1', '2', 'Non-Prime', 250, 45201511040345, '', '2', '2015-11-04 15:45:00', '2015-11-04 12:47:08'),
(25, 27, 5, 45, '21:00:00', 0, '1', '', '', '1', '2', 'Non-Prime', 257, 45201511040900, '', '2', '2015-11-04 21:00:00', '2015-11-04 12:46:31'),
(26, 27, 5, 45, '19:30:00', 9, '1', '', '', '1', '2', 'Non-Prime', 255, 45201511040730, '', '2', '2015-11-04 19:30:00', '2015-11-04 12:46:51'),
(27, 27, 6, 45, '07:30:00', 3, '1', '', '', '2', '1', 'Non-Prime', 218, 45201511050730, '', '1', '2015-11-05 07:30:00', '2015-11-04 13:00:13'),
(28, 27, 6, 45, '09:45:00', 9, '2', '', '', '1', '1', 'Non-Prime', 221, 45201511050945, '', '1', '2015-11-05 09:45:00', '2015-11-04 13:00:52'),
(29, 27, 6, 45, '12:00:00', 10, '1', '', '', '2', '1', 'Non-Prime', 224, 45201511051200, '', '1', '2015-11-05 12:00:00', '2015-11-04 13:01:23'),
(30, 27, 6, 45, '13:30:00', 1, '1', '', '', '1', '1', 'Non-Prime', 226, 45201511050130, '', '1', '2015-11-05 13:30:00', '2015-11-04 13:01:55'),
(31, 20, 6, 45, '06:00:00', 2, '1', '', '', '1', '1', 'Prime', 216, 45201511050600, 'Esteyak', '2', '2015-11-05 06:00:00', '2015-11-05 00:15:37'),
(32, 20, 6, 45, '12:45:00', 7, '2', '', '', '2', '1', 'Non-Prime', 225, 45201511051245, '', '1', '2015-11-05 12:45:00', '2015-11-05 12:12:09'),
(33, 27, 1, 46, '11:15:00', 1, '1', '', '', '1', '1', 'Non-Prime', 287, 46201511071115, 'tonmoy', '1', '2015-11-07 11:15:00', '2015-11-07 10:33:13'),
(34, 27, 1, 46, '16:30:00', 7, '1', '', '', '2', '1', 'Other', 294, 46201511070430, '', '1', '2015-11-07 16:30:00', '2015-11-07 10:35:10'),
(35, 27, 2, 46, '08:15:00', 2, '1', '', '', '1', '1', 'Non-Prime', 283, 46201511080815, '', '1', '2015-11-08 08:15:00', '2015-11-07 10:35:57'),
(36, 27, 2, 46, '12:45:00', 9, '1', '', '', '1', '1', 'Non-Prime', 289, 46201511081245, '', '1', '2015-11-08 12:45:00', '2015-11-07 10:37:47'),
(37, 27, 1, 46, '11:15:00', 7, '1', '', '', '2', '2', 'Non-Prime', 266, 46201511071115, '', '1', '2015-11-07 11:15:00', '2015-11-07 10:53:37'),
(38, 27, 1, 46, '17:15:00', 11, '1', '', '', '2', '2', 'Non-Prime', 274, 46201511070515, '', '1', '2015-11-07 17:15:00', '2015-11-07 10:55:38'),
(39, 27, 2, 46, '09:00:00', 2, '1', '', '', '2', '2', 'Non-Prime', 263, 46201511080900, '', '1', '2015-11-08 09:00:00', '2015-11-07 10:56:23'),
(40, 27, 2, 46, '12:45:00', 3, '1', '', '', '1', '2', 'Non-Prime', 268, 46201511081245, '', '1', '2015-11-08 12:45:00', '2015-11-07 10:57:12'),
(41, 27, 5, 46, '12:00:00', 6, '1', '', '', '2', '1', 'Non-Prime', 288, 46201511111200, '', '1', '2015-11-11 12:00:00', '2015-11-11 11:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `maincategory_id` char(1) DEFAULT NULL,
  `subcategory_id` char(1) DEFAULT NULL,
  `union_id` char(1) DEFAULT NULL,
  `person_name` varchar(255) NOT NULL,
  `designation_id` char(1) NOT NULL,
  `cell_no` varchar(18) NOT NULL,
  `ward` char(1) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE IF NOT EXISTS `childcategories` (
  `id` int(11) NOT NULL,
  `maincategory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `maincategory_id`, `name`, `created`, `modified`) VALUES
(3, 10, 'à¦ªà§à¦°à¦§à¦¾à¦¨ à¦¶à¦¿à¦•à§à¦·à¦• (à¦®à§‡à¦¹à§‡à¦° à¦‰à¦šà§à¦š à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à§Ÿ)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, 'à¦•à¦²à§‡à¦œ', '0000-00-00 00:00:00', '2016-05-02 13:44:48'),
(5, 0, 'à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 'à¦¬à§à¦¯à¦¬à¦¸à¦¾à§Ÿà§€', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'à¦­à§‚à¦®à¦¿ à¦…à¦«à¦¿à¦¸ (à¦®à§‡à¦¹à§‡à¦° à¦¦à¦•à§à¦·à¦¿à¦£)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'à¦®à¦¾à¦¦à§à¦°à¦¾à¦¸à¦¾', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'à¦­à§‚à¦®à¦¿ à¦…à¦«à¦¿à¦¸ (à¦®à§‡à¦¹à§‡à¦° à¦‰à¦¤à§à¦¤à¦°)', '0000-00-00 00:00:00', '2016-05-01 16:44:47'),
(14, 3, 'à¦†à¦¶à¦¾', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 'à¦¶à¦¾à¦“à¦¨ à¦²à¦¿à¦®à¦¿à¦Ÿà§‡à¦¡', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, '212', '2016-05-01 15:42:49', '2016-05-01 15:42:49'),
(17, 9, 'à¦®à¦¾à¦› ', '2016-05-02 09:11:39', '2016-05-02 09:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `contentimages`
--

CREATE TABLE IF NOT EXISTS `contentimages` (
  `id` int(11) unsigned NOT NULL,
  `imgTitlebn` varchar(150) DEFAULT NULL,
  `imgTxtbn` int(200) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT '1',
  `content_id` varchar(255) DEFAULT NULL,
  `imgTitle` varchar(100) DEFAULT NULL,
  `imgTxt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) unsigned NOT NULL,
  `perlament_id` int(11) DEFAULT NULL,
  `title` varchar(2000) DEFAULT NULL,
  `titlebn` varchar(500) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `contenttype_id` int(11) NOT NULL,
  `contName` varchar(2000) DEFAULT NULL,
  `content` longtext,
  `contentbn` longtext NOT NULL,
  `type` int(11) DEFAULT NULL,
  `publishDate` datetime DEFAULT NULL,
  `favorite` tinyint(1) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `perlament_id`, `title`, `titlebn`, `slug`, `contenttype_id`, `contName`, `content`, `contentbn`, `type`, `publishDate`, `favorite`, `created`) VALUES
(1, NULL, 'Slider 01', '', 'slider-01', 0, NULL, '', '', 2, NULL, NULL, '0000-00-00 00:00:00'),
(2, NULL, 'slider 2', '', 'slider-2', 0, NULL, '<p>slider 2</p>', '', 2, NULL, NULL, '0000-00-00 00:00:00'),
(5, NULL, 'slider 3', '', 'slider-3', 0, NULL, '<p>slider 3</p>', '', 2, NULL, NULL, '0000-00-00 00:00:00'),
(9, NULL, 'About Us ', '', 'about-us', 0, NULL, '<p>The tennis section of the AEEA offers two international sized hard courts which can be used from 6 AM to 10 PM. During the evening time powerful flood lights illuminate the premises. Our markers are very experienced and are able to introduce you to some of the ''secrets'' of this sport. On weekends and holidays part of the afternoons are reserved for social tennis when players of all categories can play against each other and have a fun time</p>', '', 3, NULL, NULL, '0000-00-00 00:00:00'),
(10, NULL, 'Facilities and Services', '', 'facilities-and-services', 0, NULL, '<p>Two Hard Courts</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(11, NULL, '', '', '', 0, NULL, '<p>Flood Light at Night</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(13, NULL, '', '', '-1', 0, NULL, '<p>Racquet Rental</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(14, NULL, '', '', '-2', 0, NULL, '<p>Experienced Markers</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(15, NULL, '', '', '-3', 0, NULL, '<p>Children Tennis Clinic</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(16, NULL, '', '', '-4', 0, NULL, '<p>Social Time</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(17, NULL, '', '', '-5', 0, NULL, '<p>Ball Boys</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(18, NULL, '', '', '-6', 0, NULL, '<p>Availability of Sports Drinks</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(19, NULL, '', '', '-7', 0, NULL, '<p>Ice Bags for The Hot Season</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(20, NULL, '', '', '-8', 0, NULL, '<p>One Squash Court</p>', '', 17, NULL, NULL, '0000-00-00 00:00:00'),
(21, NULL, 'Test', '', 'test', 1, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', 9, NULL, NULL, '0000-00-00 00:00:00'),
(22, NULL, 'Test 2', '', 'test-2', 2, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', 9, NULL, NULL, '0000-00-00 00:00:00'),
(23, NULL, 'Test 3', '', 'test-3', 3, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', 9, NULL, NULL, '0000-00-00 00:00:00'),
(24, NULL, 'image', '', 'image', 0, NULL, '<p>aaaaaa</p>', '', 8, NULL, NULL, '0000-00-00 00:00:00'),
(25, NULL, 'Booking Process ', '', 'booking-process', 0, NULL, '<p>To reserve a court, select a date and time-slot. Log-in with your email and Password. Select a Trainer(marker) and Racquet Rental if needed. Then select a payment method and confirm your reservation. Cancellation fees apply if cancelled less than 24 hours before reservation.</p>', '', 1, NULL, NULL, '0000-00-00 00:00:00'),
(26, NULL, 'TENNIS COURT POLICY', '', 'tennis-court-policy', 0, NULL, '<ul class="nor-ul">\r\n<li>Social tennis time on weekends or during embassy holidays is as follows:\r\n<ul>\r\n<li>Court 1: 12:00 PM to 5:15 PM</li>\r\n<li>Court 2: 12:00 PM to 5:15 PM</li>\r\n</ul>\r\n</li>\r\n<li>Proper tennis attire, particularly shoes with non-marking soles, is required at all times.</li>\r\n<li>Do not walk across the court when courts are busy.</li>\r\n<li>Abusive language will not be tolerated on the tennis court or anywhere.</li>\r\n<li>Guests are not permitted to play during social time, even if members are not waiting to play.</li>\r\n<li>No more than five minutes may be used for "warm-up" in preparation for playing a set during social time.</li>\r\n</ul>', '', 1, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE IF NOT EXISTS `contenttypes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `ctype` varchar(50) NOT NULL DEFAULT '["3"]'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `name`, `slug`, `ctype`) VALUES
(1, 'Present Events', 'present-event', '["9"]'),
(2, 'Past Events', 'past-events', '["9"]'),
(3, 'Upcoming Events', 'upcoming-events', '["9"]'),
(4, 'Public Exam', 'public-exam', '["12"]'),
(5, 'Admission Exam', 'admission-exam', '["12"]'),
(7, 'Electronics', 'electronics', '["16"]'),
(8, 'Budget Hotel', 'budget-hotel', '["16"]'),
(9, 'Hotel', 'hotel', '["16"]'),
(10, 'Restaurants', 'restaurants', '["16"]'),
(11, 'Travels & Tours', 'travels-tours', '["16"]');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(11) NOT NULL,
  `childcategory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `childcategory_id`, `name`, `created`, `modified`) VALUES
(9, 0, 'à¦¸à¦‚à¦¸à¦¦ à¦¸à¦¦à¦¸à§à¦¯', '2016-04-26 17:39:17', '2016-04-26 17:39:17'),
(10, 0, 'à¦‰à¦ªà¦œà§‡à¦²à¦¾ à¦šà§‡à§Ÿà¦¾à¦°à¦®à§à¦¯à¦¾à¦¨', '2016-04-26 17:39:30', '2016-04-26 17:39:30'),
(11, 0, 'à¦‰à¦ªà¦œà§‡à¦²à¦¾ à¦¨à¦¿à¦°à§à¦¬à¦¾à¦¹à§€ à¦…à¦«à¦¿à¦¸à¦¾à¦°', '2016-04-26 17:39:59', '2016-04-26 17:39:59'),
(12, 0, 'à¦®à§‡à§Ÿà¦°, à¦ªà§Œà¦°à¦¸à¦­à¦¾', '2016-04-26 17:40:23', '2016-04-26 17:40:23'),
(13, 0, 'à¦¸à¦¹à¦•à¦¾à¦°à§€ à¦•à¦®à¦¿à¦¶à¦¨à¦¾à¦°( à¦­à§‚à¦®à¦¿)', '2016-04-26 17:41:18', '2016-04-26 17:41:18'),
(14, 0, '.............................  à¦•à¦°à§à¦®à¦•à¦°à§à¦¤à¦¾', '2016-04-26 17:41:35', '2016-04-26 22:30:25'),
(15, 0, 'à¦…à¦«à¦¿à¦¸ à¦¸à¦¹à¦•à¦¾à¦°à§€', '2016-04-26 17:42:33', '2016-04-26 17:42:33'),
(16, 0, 'à¦‰à¦ªà¦œà§‡à¦²à¦¾ à¦Ÿà§‡à¦•à¦¨à¦¿à¦¶à¦¿à§Ÿà¦¾à¦¨', '2016-04-26 17:43:09', '2016-04-26 17:43:09'),
(17, 0, 'à¦¶à¦¿à¦•à§à¦·à¦¾ à¦…à¦«à¦¿à¦¸à¦¾à¦°', '2016-04-28 10:57:37', '2016-04-28 10:57:37'),
(18, 0, 'à¦®à§Žà¦¸à§à¦¯ à¦…à¦«à¦¿à¦¸à¦¾à¦° ', '2016-04-28 10:59:00', '2016-04-28 10:59:00'),
(19, 6, 'à¦®à§à¦¯à¦¾à¦¨à§‡à¦œà¦¾à¦° ', '2016-05-01 19:32:22', '2016-05-02 09:17:05'),
(20, 7, 'à¦†à¦¸à¦¿à¦²à§à¦¯à¦¾à¦¨à§à¦¡', '2016-05-01 19:50:24', '2016-05-02 09:17:28'),
(21, 13, 'à¦­à§à¦®à¦¿ à¦…à¦«à¦¿à¦¸à¦¾à¦° ', '2016-05-01 19:50:36', '2016-05-02 09:17:42'),
(22, 4, 'à¦•à§‡à¦°à¦¾à¦¨à§€', '2016-05-02 13:46:04', '2016-05-02 13:46:04'),
(23, 3, ';lkj;l', '2016-05-02 18:41:08', '2016-05-02 18:41:08'),
(24, 4, 'à¦†à¦¦à¦¿à¦¨à¦¾ ', '2016-05-02 20:26:02', '2016-05-02 20:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `entryforms`
--

CREATE TABLE IF NOT EXISTS `entryforms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cell_no` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `maincategory_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `problem_id` int(11) NOT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` char(1) NOT NULL,
  `ovijog` char(1) NOT NULL,
  `bitoron` char(1) NOT NULL,
  `piechart` smallint(1) NOT NULL DEFAULT '1',
  `piechart2` smallint(1) NOT NULL DEFAULT '1',
  `babosthagrohonkari2` varchar(500) DEFAULT NULL,
  `babosthagrohonkari1` varchar(500) DEFAULT NULL,
  `babosthagrohonkari3` varchar(500) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entryforms`
--

INSERT INTO `entryforms` (`id`, `user_id`, `name`, `cell_no`, `address`, `maincategory_id`, `subcategory_id`, `problem_id`, `childcategory_id`, `description`, `deadline`, `status`, `ovijog`, `bitoron`, `piechart`, `piechart2`, `babosthagrohonkari2`, `babosthagrohonkari1`, `babosthagrohonkari3`, `created`, `modified`) VALUES
(1, 0, 'Sujon', '000909', 'Mohammadpur', 3, 3, 2, NULL, 'Arif Uddin. Done!', '2016-04-27', '2', '', '', 1, 1, NULL, NULL, NULL, '2016-04-22 16:21:19', '2016-04-26 22:10:13'),
(3, 0, 'Jahedul', '+8801746128199', 'Dhaka', 2, 2, 2, NULL, 'General!', '2016-04-25', '2', '', '', 1, 1, NULL, NULL, NULL, '2016-04-25 17:47:25', '2016-04-27 12:42:51'),
(5, 0, 'Tajul', '01914190123', 'Suchi Para uttar, ', 4, -1, 4, NULL, 'Every day he disturbed him when she going to school.', '2016-04-28', '2', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 11:22:44', '2016-04-27 12:41:55'),
(8, 0, 'Rezwan', '0191128348374', 'Meher uttar', 3, 7, 5, NULL, 'fdgadkljflkadj', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 12:30:56', '2016-04-27 10:41:11'),
(9, 0, 'Ifty', '0191923839', 'Suchi para, south', 2, 5, 1, NULL, 'à¦‰à¦ªà¦œà§‡à¦²à¦¾à¦•à¦²à¦¸à§‡à¦¨à§à¦Ÿà¦¾à¦°à§‡à¦¨à¦¿à¦®à§à¦¨à¦²à¦¿à¦–à¦¿à¦¤à¦¨à¦¾à¦—à¦°à¦¿à¦•à¦…à¦­à¦¿à¦¯à§‹à¦—/à¦¤à¦¥à§à¦¯ à¦“à¦¸à§‡à¦¬à¦¾à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤à¦†à¦¬à§‡à¦¦à¦¨/à¦®à¦¤à¦¾à¦®à¦¤/à¦¸à§à¦ªà¦¾à¦°à¦¿à¦¶à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤à¦¬à¦¿à¦·à§Ÿà¦Ÿà¦¿à¦†à¦ªà¦¨à¦¾à¦°à¦…à¦¬à¦—à¦¤à¦¿ à¦“ à¦ªà§à¦°à§à¦°à§Ÿà§‹à¦œà¦¨à§€à§Ÿà¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾à¦—à§à¦°à¦¹à¦£à§‡à¦°à¦œà¦¨à§à¦¯à¦…à¦¨à§à¦°à§‹à¦§à¦•à¦°à¦¾à¦¹â€™à¦²-', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 12:48:46', '2016-04-27 10:41:58'),
(10, 0, 'fkalksdjf', 'dfasdf', 'dsfasd', 2, 5, 1, NULL, 'fadsfasdf', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 12:59:01', '2016-04-27 10:42:13'),
(11, 0, 'dfasdf', 'dfasdf', 'dsfasd', 2, 5, 2, NULL, 'fasdfasdf', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 13:06:05', '2016-04-27 10:43:25'),
(12, 0, 'à¦®à¦¾à¦¸à§à¦¦ à¦†à¦²à¦®', '01714804392', 'à¦‡à¦‰ à¦à¦¨ à¦“ à¦…à¦«à¦¿à¦¸,à¦¶à¦¾à¦¹à¦°à¦¾à¦¸à§à¦¤à¦¿,à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', 1, 4, 8, NULL, 'à¦Ÿà§‡à¦·à§à¦Ÿ.........................................................', '2016-05-10', '2', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 14:17:15', '2016-04-29 16:08:27'),
(13, 0, 'à¦®à¦¾à¦¸à§à¦¦ à¦†à¦²à¦®', '01714804392', 'à¦†à§Ÿà¦¨à¦¾à¦¤à¦²à§€,à¦¶à¦¾à¦¹à¦°à¦¾à¦¸à§à¦¤à¦¿,à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', 1, 4, 8, NULL, 'Select this text and delete it or replace it with your own. To save changes to this template for future use, choose Save As from the File menu. In the Save As Type box, choose Document Template. Next time you want to use it, choose New from the File menu, and then double-click your template.\r\n[CLICK HERE AND TYPE RETURN ADDRESS]\r\n\r\n', '2016-04-30', '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 15:37:54', '2016-04-27 10:26:20'),
(14, 0, 'Mahmud', '+8801746128199', 'Dhaka', 4, 6, 3, NULL, 'Let''s sort out the issues!', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 21:37:34', '2016-04-27 10:26:02'),
(15, 0, 'Mahmud', '+8801746128199', 'Dhaka', 1, 4, 4, NULL, 'Nothing!', '2016-04-27', '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 21:51:47', '2016-04-27 12:40:38'),
(16, 0, 'Mahmud', '+8801746128199', 'Test!', 2, 5, 2, NULL, 'Test!', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-26 22:06:12', '2016-04-26 22:10:01'),
(17, 0, 'demo', '0290290292', 'demo', 4, 6, 6, NULL, 'demo', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 01:54:00', '2016-04-27 10:19:00'),
(18, 0, 'Riyad', '01820012311', 'Meher North, Sharasti', 1, 4, 4, NULL, 'Phone er maddome uttakto kore.', NULL, '3', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 10:15:14', '2016-04-27 10:18:36'),
(19, 0, 'à¦†à¦¨à§‹à§Ÿà¦¾à¦° à¦¹à§‹à¦¸à§‡à¦¨', '01730067068', 'à¦¨à§‹à§Ÿà¦¾à¦—à¦¾à¦“, à¦¶à¦¾à¦¹à¦°à¦¾à¦¸à§à¦¤à¦¿, à¦šà¦¾à¦à¦¦à¦ªà§à¦°', 1, -1, 1, NULL, 'à¦†à¦œ à¦¦à§à¦ªà§à¦° à§¨à¦Ÿà¦¾à§Ÿ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦—à§à¦°à¦¾à¦®à§‡à¦° à¦‰à¦¤à§à¦¤à¦° à¦ªà¦¾à¦°à§à¦¶à§à¦¬à§‡ à¦œà¦®à¦¿à¦° à¦¦à¦–à¦² à¦¨à¦¿à§Ÿà§‡ à¦¬à¦¿à¦°à§‡à¦¾à¦§ à¦¬à¦¿à¦¦à§à¦¯à¦®à¦¾à¦¨', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 14:21:16', '2016-04-29 16:41:56'),
(20, 0, 'Mahmud', '+8801746128199', 'Mirpur, Dhaka', 2, 5, 8, NULL, 'Please solve the problem as soon as possible.', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 15:51:15', '2016-04-27 15:51:15'),
(21, 2, 'employee', '333', '333', 1, 4, 3, NULL, '3333', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 17:19:18', '2016-04-27 17:19:18'),
(22, 2, 'Arif', '01795452237', 'Shyamoli, Dhaka', 3, 7, 2, NULL, 'land related', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-27 21:20:30', '2016-04-27 21:20:30'),
(23, 1, 'Late Night', '2323', 'Late Night', 2, 5, 2, NULL, 'Late Night', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-28 02:02:29', '2016-04-28 02:02:29'),
(24, 1, 'Blank', '223', 'Blank', 4, 7, 5, NULL, 'Blank', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-28 02:03:30', '2016-04-28 02:03:30'),
(25, 1, 'aaaa', '222', 'sss', 2, 5, 3, NULL, 'sssss', NULL, '1', '', '', 1, 1, NULL, NULL, NULL, '2016-04-28 02:09:52', '2016-04-28 02:09:52'),
(26, 1, 'bangladesh', '01193834898', 'asdfasdf', 2, 5, 2, NULL, 'dfasdf', NULL, '1', '1', '2', 1, 1, '2. Mehadi', '1. Jahid', '3. Masud ', '2016-04-29 16:37:52', '2016-04-29 16:37:52'),
(27, 1, 'à¦œà¦¹à¦¿à¦°à§à¦² à¦‡à¦¸à¦²à¦¾à¦® ', '01911245671', 'à¦®à§‡à¦¹à§‡à¦° à¦‰à¦¤à§à¦¤à¦°, à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à¥¤', 2, 5, 1, NULL, 'à¦ªà§à¦°à¦¤à¦¿à¦¦à¦¿à¦¨ à¦¸à§à¦•à§à¦²à§‡ à¦¯à¦¾à¦“à§Ÿà¦¾à¦° à¦¸à¦®à§Ÿ à¦†à¦®à¦¾à¦° à¦®à§‡à§Ÿà§‡à¦•à§‡ à¦¬à¦¿à¦°à¦•à§à¦¤ à¦•à¦°à§‡à¦¨à¥¤ ', NULL, '1', '1', '2', 1, 1, 'à§¨à¥¤ à¦ªà§à¦²à¦¿à¦¶ à¦…à¦«à¦¿à¦¸à¦¾à¦°', 'à§§à¥¤ à¦‰à¦ªà¦œà§‡à¦²à¦¾ à¦šà§‡à§Ÿà¦¾à¦°à¦®à§à¦¯à¦¾à¦¨, à¦¶à¦¾à¦¹à¦°à¦¾à¦¸à§à¦¤à¦¿à¥¤', 'à§©à¥¤ à¦‡à¦‰à¦ªà¦¿ à¦šà§‡à§Ÿà¦¾à¦°à¦®à§à¦¯à¦¾à¦¨à¥¤', '2016-04-29 16:50:46', '2016-04-29 16:50:46'),
(28, 1, 'ss', '22', 'ss', 1, 0, 2, NULL, 'sss', NULL, '1', '1', '1', 1, 1, '', '', '', '2016-05-02 01:42:24', '2016-05-02 01:42:24'),
(29, 1, 'vvvv', '3333', 'vvv', 1, 0, 2, NULL, 'vvv', NULL, '1', '1', '1', 1, 1, '', '', '', '2016-05-02 09:23:57', '2016-05-02 09:23:57'),
(30, 1, 'wwe', '222', 'dsd', NULL, 0, 1, NULL, 'sdsd', NULL, '1', '1', '1', 1, 1, '', '', '', '2016-05-02 09:26:34', '2016-05-02 09:26:34'),
(31, 1, 'sas', '32323', 'dsd', 5, 0, 3, 11, 'sdsd', NULL, '1', '1', '', 1, 1, '', '', '', '2016-05-02 13:49:25', '2016-05-02 13:49:25'),
(32, 1, 'sdds', '22', '22', 5, 0, 3, 11, '222', '2016-05-18', '1', '1', '', 1, 1, '', '', '', '2016-05-02 13:57:34', '2016-05-02 13:57:34'),
(33, 1, 'ssdsd', 'sdsd', 'sdsd', 5, 0, 1, 11, 'ssdsd', NULL, '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:01:36', '2016-05-02 14:01:36'),
(34, 1, 'WW', 'WQWQW', 'QWQW', 5, 0, 1, 11, 'QWQW', '2016-05-01', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:11:22', '2016-05-02 14:11:22'),
(35, 1, 'sdsd', '232323', 'ssddsd', 5, 0, 2, 11, 'sdsd', '2016-05-02', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:15:30', '2016-05-02 14:15:30'),
(36, 1, '32332', '323', '2323', 5, 0, 2, 11, '2323', '2016-05-11', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:17:29', '2016-05-02 14:17:29'),
(37, 1, 'ssd', '232323', '2323', 1, 0, 1, NULL, '323', '2016-05-31', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:24:55', '2016-05-02 14:24:55'),
(38, 1, 'fdfdf', '333', '333', 5, 7, 1, 11, '333', '2016-05-17', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:51:13', '2016-05-02 14:51:13'),
(39, 1, 'sdsd', '232323', '3434', 5, 7, 1, 11, '3434', '2016-05-24', '1', '1', '', 1, 1, '', '', '', '2016-05-02 14:52:34', '2016-05-02 14:52:34'),
(40, 1, 'dsdsd', '2323', 'sdsd', 5, 4, 4, 11, 'dsdsd', '2016-05-04', '1', '1', '', 1, 1, '', '', '', '2016-05-02 15:28:38', '2016-05-02 15:28:38'),
(41, 1, 'sdsd', '434', '3434', 5, 4, 1, 11, '3434', '2016-05-04', '1', '1', '', 1, 1, '', '', '', '2016-05-02 15:30:04', '2016-05-02 15:30:04'),
(42, 1, 'ssdsd', '43434', 'sdsd', 5, 4, 1, 11, '3434', '2016-05-25', '1', '1', '', 1, 1, '', '', '', '2016-05-02 15:31:07', '2016-05-02 15:31:07'),
(43, 1, 'sdsdsd', '233', '23232', 5, 4, 0, 11, '233', '2016-05-18', '1', '1', '', 1, 1, '', '', '', '2016-05-02 15:34:46', '2016-05-02 15:34:46'),
(44, 1, 'sdsd', '222', 'sdsd', 5, 4, 0, 11, 'sdsd', '2016-05-18', '1', '1', '', 1, 1, '', '', '', '2016-05-02 15:43:41', '2016-05-02 15:43:41'),
(45, 1, 'ewewe', '333', 'ewe', 5, 4, 1, 11, 'ewe', '2016-05-31', '1', '1', '', 1, 1, '', '', '', '2016-05-02 16:15:30', '2016-05-02 16:15:30'),
(46, 1, 'ewewe', '333', 'ewe', 5, 0, 1, NULL, 'ewe', '2016-05-31', '1', '1', '', 1, 1, '', '', '', '2016-05-02 16:15:57', '2016-05-02 16:15:57'),
(47, 1, 'sdsd', '232323', 'wewe', 5, 4, 1, 11, 'ewe', '2016-05-20', '1', '1', '', 1, 1, '', '', '', '2016-05-02 16:19:06', '2016-05-02 16:19:06'),
(48, 1, 'don', '2323', 'à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', 1, 7, 1, 10, 'à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', '2016-05-19', '1', '1', '1', 1, 1, NULL, NULL, NULL, '2016-05-05 00:36:10', '2016-05-05 00:36:10'),
(49, 1, 'Raja', '23223', 'à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', 5, 11, 1, 4, 'à¦šà¦¾à¦à¦¦à¦ªà§à¦°à¥¤', NULL, '1', '1', '1', 1, 1, NULL, NULL, NULL, '2016-05-05 00:44:26', '2016-05-05 00:44:26'),
(50, 1, 'ererer', '3333', 'dddd', 1, 4, 3, 7, 'dddd', '2016-05-31', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 11:56:15', '2016-05-05 11:56:15'),
(51, 1, 'dsdsd', '232323', 'sdsdds', 1, 4, 4, 7, 'ssdsd', '2016-05-03', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:00:52', '2016-05-05 12:00:52'),
(52, 1, 'kakoli', '3933930', 'okdd!', 5, 4, 4, 4, 'dddddddd!!!', '2016-05-17', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:04:25', '2016-05-05 12:04:25'),
(53, 1, 'wfafr', '333', 'ddd', 1, 4, 2, 7, 'ddd', '2016-05-17', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:06:26', '2016-05-05 12:06:26'),
(54, 1, 'sddsdsd', '232323', 'dfdf', 5, 7, 4, 4, 'fdfdf', '2016-05-18', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:11:09', '2016-05-05 12:11:09'),
(55, 1, 'sdd', '222', 'sdsd', 1, 7, 2, 7, 'ssd', '2016-05-03', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:14:36', '2016-05-05 12:14:36'),
(56, 1, 'sdsd', '232323', 'ssdsd', 1, 4, 3, 7, 'sdsd', '2016-05-12', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:18:03', '2016-05-05 12:18:03'),
(57, 1, 'sdsd', '232323', 'ssdsd', 1, 4, 3, 7, 'sdsd', '2016-05-12', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:20:16', '2016-05-05 12:20:16'),
(58, 1, 'fdfd', '333', 'dfdfd', 1, 4, 2, 7, 'fdfd', '2016-05-12', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:32:08', '2016-05-05 12:32:08'),
(59, 1, 'sdsd', '2323', 'ssd', 5, 7, 3, 4, 'sdsd', '2016-05-10', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:35:07', '2016-05-05 12:35:07'),
(60, 1, 'dsdsd', '232323', 'ssd', 1, 4, 1, 7, 'sdsd', '2016-05-19', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:42:27', '2016-05-05 12:42:27'),
(61, 1, 'dsd', '333', 'sdsd', 1, 13, 3, 7, 'dsd', '2016-05-26', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 12:50:25', '2016-05-05 12:50:25'),
(62, 1, 'sdsdsd', '232323', 'sdds', 5, 11, 1, 4, 'sdsdsd', '2016-05-10', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 13:03:45', '2016-05-16 11:41:56'),
(63, 1, 'dsddssd', '22323', '2333', 1, 13, 3, 7, '232323', '2016-05-10', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 13:21:43', '2016-05-05 13:21:43'),
(64, 1, 'dsd', '2323', 'sdsd', 5, 11, 1, 4, 'sds', '2016-05-24', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 13:25:37', '2016-05-05 13:25:37'),
(65, 1, 'sdsd', '232323', 'dsds', 1, 13, 1, 7, 'sdsd', '2016-05-11', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 13:30:02', '2016-05-05 13:30:02'),
(66, 1, 'sdsd', '333', 'sdsd', 1, 13, 2, 7, 'sdsd', '2016-05-25', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-05 13:31:23', '2016-05-05 13:31:23'),
(67, 1, 'à¦®à§‡à¦¹à§‡à¦¦à§€', '343434', '44343434', 1, 13, 2, 7, 'sdsdsdsd', '2016-05-18', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-06 03:04:30', '2016-05-06 03:04:30'),
(68, 1, 'dd', '33', 'dd', -1, NULL, 2, 7, '33', '2016-05-19', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-09 12:01:32', '2016-05-09 12:01:32'),
(69, 1, 'dd', '33', 'dd', 1, 13, 2, 7, '33', '2016-05-19', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-09 12:01:49', '2016-05-09 12:01:49'),
(70, 1, 'dsd', '232323', 'ssd', 1, 13, 1, 7, 'sdsd', '2016-05-11', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-09 18:59:20', '2016-05-09 18:59:20'),
(71, 1, 'sss', '333', 'ss', 5, 12, 1, 4, 'sss', '2016-05-10', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-09 21:53:31', '2016-05-09 21:53:31'),
(72, 1, 'sdsdsd', '43434', 'sddsd', 5, 11, 3, 4, 'sdsdsd', '2016-05-17', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-09 22:01:01', '2016-05-09 22:01:01'),
(73, 1, 'cxc', 'xcxc', 'cxc', 1, 13, 3, 7, 'cxc', NULL, '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-13 02:34:04', '2016-05-13 02:34:04'),
(74, 1, 'dfddf', 'à§¦à§§à§­à§§à§ªà§¨à§©à§®à§©à§­', 'à¦¸à¦¦à¦¸à¦¦', 5, 11, 3, 4, 'à¦¸à¦¦à¦¸à¦¦à¦¸à¦¦', '2016-05-24', '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-16 12:00:39', '2016-05-16 12:00:39'),
(75, 1, 'à¦¸à¦¦à¦¸à¦¦à¦¸à¦¦', 'à§¦à§§à§­à§§à§¯à§ªà§¨à§©à§®à§©à§­', 'à¦¸à¦¦à¦¸à¦¦', 10, -1, 4, 3, 'à¦¸à¦¦à¦¸à¦¦', NULL, '1', '1', '2', 1, 1, NULL, NULL, NULL, '2016-05-16 12:01:36', '2016-05-16 12:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `maincategories`
--

CREATE TABLE IF NOT EXISTS `maincategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maincategories`
--

INSERT INTO `maincategories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'à¦­à§‚à¦®à¦¿ à¦†à¦«à¦¿à¦¸', '2016-04-22 10:21:47', '2016-04-28 10:07:13'),
(2, 'à¦¬à§‡à¦¸à¦°à¦•à¦¾à¦°à¦¿ à¦¸à¦‚à¦¸à§à¦¥à¦¾', '2016-04-22 10:21:54', '2016-04-26 20:02:30'),
(3, 'à¦à¦¨à¦œà¦¿à¦“/à¦¬à§à¦¯à¦¾à¦‚à¦•', '2016-04-22 10:22:02', '2016-04-26 20:03:10'),
(4, 'à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦¬à§à¦¯à¦•à§à¦¤à¦¿à¦¤à§à¦¬', '2016-04-26 11:19:12', '2016-04-26 20:03:38'),
(5, 'à¦¶à¦¿à¦•à§à¦·à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨', '2016-04-26 17:20:38', '2016-04-26 20:04:02'),
(9, 'à¦®à§Žà¦¸à§à¦¯ à¦…à¦«à¦¿à¦¸', '2016-04-28 10:11:37', '2016-04-28 10:12:17'),
(10, 'à¦¶à¦¿à¦•à§à¦·à¦¾ à¦…à¦«à¦¿à¦¸ ', '2016-04-28 10:13:01', '2016-04-28 10:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `membershipId` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `membershipId`, `type`, `email`, `mobileNo`, `status`, `created`, `modified`) VALUES
(1, 'MOnir', 3454325, '1', 'k', '56435646', '1', '2015-08-18 12:00:37', '2015-10-06 15:23:16'),
(2, 'riaj', 321, '1', 'Bhola', '01717240834', '1', '2015-08-18 12:47:01', '2015-08-18 12:47:01'),
(3, 'Riajul Islam', 123, '1', 'BD', '01717240834', '1', '2015-08-26 11:51:40', '2015-08-26 11:51:40'),
(4, 'Prince', 500, '1', 'Dhaka', '017834329423', '1', '2015-08-27 13:59:35', '2015-08-27 13:59:35'),
(5, 'Ami Nije', 123, '2', 'Gazipur', '02823823626362', '1', '2015-08-31 08:32:34', '2015-08-31 08:32:34'),
(6, 'Some One', 9999, '1', 'Dhaka Bangladesh', '01717240834', '1', '2015-08-31 19:30:47', '2015-08-31 19:30:47'),
(7, 'ovi-test', 111222333, '1', 'abcd', '01854894959', '1', '2015-10-07 11:17:38', '2015-10-07 16:19:46'),
(8, 'Esteyak Mahmud', 5555, '2', 'Barisal', '018256455654', '1', '2015-10-14 11:12:45', '2015-10-14 11:12:45'),
(9, 'Tiger Khan', 6666, '2', 'Dhaka', '0178787887', '1', '2015-10-14 11:15:59', '2015-10-14 11:15:59'),
(10, 'Asad Ali', 7777, '1', 'Rajshai', '012121554', '1', '2015-10-14 11:17:00', '2015-10-14 11:17:00'),
(11, 'Humaun Kabir', 8888, '1', 'Patuakhali', '0212211155', '1', '2015-10-14 11:17:47', '2015-10-14 11:17:47'),
(12, 'Pagla Baba', 101010, '1', 'Manikgonj', '0213221414', '1', '2015-10-14 12:20:01', '2015-10-14 12:20:01'),
(13, 'Salma Akter', 202020, '2', 'Feni', '032111212474', '1', '2015-10-14 12:20:50', '2015-10-14 12:20:50'),
(14, 'Jane Doe', 1001, '2', 'jane@gmail.com', '019123445566', '1', '2015-10-14 13:43:28', '2015-10-27 15:26:21'),
(15, 'Farhana', 1002, '1', 'someone@test.com', '01811223344', '1', '2015-10-15 14:10:14', '2015-10-15 14:10:14'),
(16, 'Hasan Khan', 88565, '1', 'mehedi@gmail.com', '01714831710', '1', '2015-10-17 11:48:59', '2015-10-17 11:48:59'),
(17, 'Mehedi Hasan', 4567, '2', 'mehedi1@gmail.com', '01928136257', '1', '2015-10-17 11:50:29', '2015-10-17 11:50:29'),
(18, 'Solaiman Kakku', 2580, '1', 'hhhhh@gmail.com', '03211555445', '1', '2015-10-18 15:16:51', '2015-10-18 15:16:51'),
(19, 'Farhan Khan', 909090, '1', 'farhankhan@gmail.com', '01717240834', '1', '2015-10-18 15:57:53', '2015-10-18 15:57:53'),
(21, 'Habib Ahmed', 123123, '1', 'habib.b@gmail.com', '01717240834', '1', '2015-10-19 12:46:26', '2015-10-19 12:46:26'),
(23, 'dada', 1289, '1', 'esteyak17mahamud@gmail.com', '74556', '1', '2015-10-23 00:49:02', '2015-10-23 00:49:02'),
(24, 'ggg', 56567, '1', 'gggg@y.v', '7755', '1', '2015-10-23 00:59:17', '2015-10-23 00:59:17'),
(25, 'Slaiman Hossain', 102030, '1', 'solaymancse@gmail.com', '0122211122', '1', '2015-10-27 16:56:17', '2015-10-27 16:56:17'),
(26, 'Salma Kanchan', 202030, '2', 'seful.cse@gmail.com', '210152454', '1', '2015-10-27 16:57:32', '2015-10-27 16:57:32'),
(27, 'Imrul ', 303040, '1', 'emrul.01745@gmail.com', '2122211', '1', '2015-10-27 16:58:43', '2015-10-27 16:58:43'),
(28, 'Riaj Ahmed', 1, '1', 'riaj.csp@gmail.com', '0122111', '1', '2015-10-31 12:40:52', '2015-10-31 12:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT '0',
  `type` tinyint(2) NOT NULL,
  `menu_type` char(1) DEFAULT NULL,
  `content_id` int(11) DEFAULT '0',
  `url` varchar(250) CHARACTER SET utf8 DEFAULT '#',
  `role` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `parent_id`, `type`, `menu_type`, `content_id`, `url`, `role`, `status`, `order`) VALUES
(1, 'Home', 'home', 0, 2, '1', NULL, '/pages/index', 1, 1, 0),
(2, 'Book Tennis', 'book-tennis', 0, 2, '1', NULL, '#', 1, 1, 0),
(3, 'Book Tennis Court 1', 'book-tennis-court-1', 2, 2, '1', NULL, '/tennises/tenniscourt/1', 1, 1, 0),
(5, 'Home', 'home-2', 0, 2, '2', NULL, '/pages/index', 1, 1, 0),
(6, 'User Guide', 'user-guide', 0, 1, '2', 25, '', 1, 1, 0),
(7, 'Rules & Regulation', 'rules-regulation', 0, 1, '2', 26, '', 1, 1, 0),
(8, 'Book Tennis Court 2', 'book-tennis-court-2', 2, 2, '1', NULL, '/tennises/tenniscourt/2', 1, 1, 0),
(9, 'Book Squash', 'book-squash', 0, 2, '1', NULL, '/squashes/squashcourt', 1, 1, 0),
(10, 'Events', 'events-1', 0, 2, '2', NULL, '/pages/events', 1, 1, 0),
(11, 'Contact', 'contact-1', 0, 2, '1', NULL, '/pages/contact/', 1, 1, 0),
(12, 'Gallery', 'gallery', 0, 2, '2', NULL, '/pages/gallery', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `name`, `created`, `modified`) VALUES
(1, 'à¦ªà¦¾à¦°à¦¿à¦¬à¦¾à¦°à¦¿à¦• à¦¬à¦¿à¦°à§‹à¦§ ', '2016-04-11 17:26:58', '2016-04-26 10:53:52'),
(2, 'à¦¸à¦¾à¦®à¦¾à¦œà¦¿à¦• à¦¬à¦¿à¦°à§‹à¦§ ', '2016-04-12 17:30:27', '2016-04-26 10:54:17'),
(3, 'à¦°à¦¾à¦œà¦¨à§ˆà¦¤à¦¿à¦• à¦¬à¦¿à¦°à§‹à¦§ ', '2016-04-17 11:23:47', '2016-04-26 10:53:23'),
(4, 'à¦‡à¦­à¦Ÿà¦¿à¦œà¦¿à¦‚ ', '2016-04-17 11:23:55', '2016-04-26 10:52:34'),
(5, 'à¦œà¦®à¦¿ à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤ à¦¬à¦¿à¦°à§‹à¦§ ', '2016-04-26 10:52:01', '2016-04-26 10:52:01'),
(6, 'à¦¯à§Œà¦¤à§à¦• ', '2016-04-26 10:55:16', '2016-04-26 10:55:16'),
(7, 'à¦¬à¦¾à¦²à§à¦¯ à¦¬à¦¿à¦¬à¦¾à¦¹ ', '2016-04-26 10:55:46', '2016-04-26 10:55:46'),
(8, 'à¦¶à¦¿à¦•à§à¦·à¦¾ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨ à¦¸à¦‚à¦•à§à¦°à¦¾à¦¨à§à¦¤ ', '2016-04-26 10:56:47', '2016-04-26 10:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `rackuet` float NOT NULL,
  `noShowprime` float NOT NULL,
  `noShownonprime` float NOT NULL,
  `dayShift` float NOT NULL,
  `nightShift` float NOT NULL,
  `nightShiftstartTime` time NOT NULL,
  `trainerRate` float NOT NULL,
  `status` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `rackuet`, `noShowprime`, `noShownonprime`, `dayShift`, `nightShift`, `nightShiftstartTime`, `trainerRate`, `status`, `created`, `modified`) VALUES
(3, 1, 5, 2, 1.5, 3, '16:00:00', 1.25, '1', '2015-09-23 12:41:44', '2015-10-14 14:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL,
  `maincategory_id` char(1) NOT NULL,
  `childcategory_id` int(11) NOT NULL,
  `union_id` int(11) DEFAULT NULL,
  `ward` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `cell_no` varchar(20) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `others` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `maincategory_id`, `childcategory_id`, `union_id`, `ward`, `designation_id`, `person_name`, `cell_no`, `address`, `others`, `created`, `modified`) VALUES
(6, '4', 6, NULL, NULL, 9, 'Mahatab', '2323233299', 'Shyamoly', 'ok!', '2016-04-26 11:54:09', '2016-04-28 10:34:44'),
(9, '2', 7, NULL, NULL, 12, 'monir', '23232', '22', 'sdsd', '2016-05-01 19:53:43', '2016-05-02 08:41:13'),
(10, '1', 7, NULL, NULL, 20, 'sasasa', '22', '22', '22', '2016-05-02 01:41:41', '2016-05-05 00:21:14'),
(11, '5', 4, NULL, NULL, 22, 'à¦®à§‡à¦¹à§‡à¦¦à§€ à¦¹à¦¾à¦¸à¦¾à¦¨ ', '2323323', '2323', '23223', '2016-05-02 13:46:38', '2016-05-02 13:46:38'),
(12, '5', 4, NULL, NULL, 24, 'à¦¹à¦¾à¦¸à¦¾à¦¨', '34434', '3434', '43434', '2016-05-05 00:10:44', '2016-05-05 00:10:44'),
(13, '1', 7, NULL, NULL, 20, 'Hasan', '0303030', 'done!', 'Done!', '2016-05-05 01:42:24', '2016-05-05 01:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `tennises`
--

CREATE TABLE IF NOT EXISTS `tennises` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `sat` varchar(15) NOT NULL,
  `sun` varchar(15) NOT NULL,
  `mon` varchar(15) NOT NULL,
  `tue` varchar(15) NOT NULL,
  `wed` varchar(15) NOT NULL,
  `thu` varchar(15) NOT NULL,
  `fri` varchar(15) NOT NULL,
  `weeks` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tennises`
--

INSERT INTO `tennises` (`id`, `time`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `weeks`, `type`, `status`, `created`, `modified`) VALUES
(258, '18:45:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:06:15', '2015-10-14 14:51:54'),
(259, '06:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:07:44', '2015-10-04 12:07:44'),
(260, '06:45:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:08:10', '2015-10-04 12:08:10'),
(261, '07:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:11:08', '2015-10-04 12:11:08'),
(262, '08:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:11:27', '2015-10-04 12:11:27'),
(263, '09:00:00', 'Prime', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 46, '2', '1', '2015-10-04 12:14:34', '2015-10-04 12:14:34'),
(264, '09:45:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 46, '2', '1', '2015-10-04 12:15:00', '2015-10-04 12:15:00'),
(265, '10:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:15:26', '2015-10-04 12:15:26'),
(266, '11:15:00', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:15:50', '2015-10-04 12:15:50'),
(267, '12:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '2', '1', '2015-10-04 12:16:12', '2015-10-04 12:16:12'),
(268, '12:45:00', 'Social', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '2', '1', '2015-10-04 12:17:32', '2015-10-04 12:17:32'),
(269, '13:30:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '2', '1', '2015-10-04 12:18:00', '2015-10-04 12:18:00'),
(270, '14:15:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '2', '1', '2015-10-04 12:18:41', '2015-10-04 12:18:41'),
(271, '15:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '2', '1', '2015-10-04 12:19:05', '2015-10-04 12:19:05'),
(272, '15:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 'Social', 46, '2', '1', '2015-10-04 12:20:10', '2015-10-04 12:20:10'),
(273, '16:30:00', 'Social', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Social', 46, '2', '1', '2015-10-04 12:20:37', '2015-10-04 12:20:37'),
(274, '17:15:00', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:21:00', '2015-11-04 12:42:17'),
(275, '18:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:21:40', '2015-10-04 12:21:40'),
(276, '18:45:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:22:06', '2015-10-04 12:22:06'),
(277, '19:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:22:36', '2015-10-04 12:22:36'),
(278, '20:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:23:00', '2015-10-04 12:23:00'),
(279, '21:00:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '2', '1', '2015-10-04 12:23:19', '2015-10-04 12:23:19'),
(280, '06:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:34:32', '2015-10-04 11:34:32'),
(281, '06:45:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:35:27', '2015-10-14 14:53:55'),
(282, '07:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:54:24', '2015-10-04 11:54:24'),
(283, '08:15:00', 'Non-Prime', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:54:43', '2015-10-04 11:54:43'),
(284, '09:00:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:55:03', '2015-10-14 14:55:10'),
(285, '09:45:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 46, '1', '1', '2015-10-04 11:55:34', '2015-10-04 11:55:34'),
(286, '10:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:56:02', '2015-10-04 11:56:02'),
(287, '11:15:00', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 11:56:23', '2015-10-04 11:56:23'),
(288, '12:00:00', 'Social', 'Non-Prime', 'Social', 'Non-Prime', '27', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:56:44', '2015-10-04 11:56:44'),
(289, '12:45:00', 'Social', '27', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:57:05', '2015-10-04 11:57:05'),
(290, '13:30:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:57:36', '2015-10-04 11:57:36'),
(291, '14:15:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:58:00', '2015-10-04 11:58:00'),
(292, '15:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:58:23', '2015-10-04 11:58:23'),
(293, '15:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 46, '1', '1', '2015-10-04 11:59:12', '2015-10-04 11:59:12'),
(294, '16:30:00', '27', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Social', 46, '1', '1', '2015-10-04 11:59:36', '2015-10-04 11:59:36'),
(295, '17:15:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 12:00:02', '2015-10-04 12:00:02'),
(296, '18:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 12:00:27', '2015-10-04 12:00:27'),
(297, '19:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 12:06:40', '2015-10-04 12:06:40'),
(298, '20:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 12:07:03', '2015-10-04 12:07:03'),
(299, '21:00:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 46, '1', '1', '2015-10-04 12:07:22', '2015-10-04 12:07:22'),
(300, '06:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:34:32', '2015-10-04 11:34:32'),
(301, '06:45:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:35:27', '2015-10-14 14:53:55'),
(302, '07:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:54:24', '2015-10-04 11:54:24'),
(303, '08:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:54:43', '2015-10-04 11:54:43'),
(304, '09:00:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:55:03', '2015-10-14 14:55:10'),
(305, '09:45:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 47, '1', '1', '2015-10-04 11:55:34', '2015-10-04 11:55:34'),
(306, '10:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:56:02', '2015-10-04 11:56:02'),
(307, '11:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 11:56:23', '2015-10-04 11:56:23'),
(308, '12:00:00', 'Social', 'Non-Prime', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:56:44', '2015-10-04 11:56:44'),
(309, '12:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:57:05', '2015-10-04 11:57:05'),
(310, '13:30:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:57:36', '2015-10-04 11:57:36'),
(311, '14:15:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:58:00', '2015-10-04 11:58:00'),
(312, '15:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:58:23', '2015-10-04 11:58:23'),
(313, '15:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '1', '1', '2015-10-04 11:59:12', '2015-10-04 11:59:12'),
(314, '16:30:00', 'Social', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Social', 47, '1', '1', '2015-10-04 11:59:36', '2015-10-31 12:19:25'),
(315, '17:15:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 12:00:02', '2015-11-04 16:02:03'),
(316, '18:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 12:00:27', '2015-10-04 12:00:27'),
(317, '19:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 12:06:40', '2015-10-04 12:06:40'),
(318, '20:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 12:07:03', '2015-10-04 12:07:03'),
(319, '21:00:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '1', '1', '2015-10-04 12:07:22', '2015-10-04 12:07:22'),
(320, '18:45:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:06:15', '2015-10-14 14:51:54'),
(321, '06:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:07:44', '2015-10-04 12:07:44'),
(322, '06:45:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:08:10', '2015-10-04 12:08:10'),
(323, '07:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:11:08', '2015-10-04 12:11:08'),
(324, '08:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:11:27', '2015-10-04 12:11:27'),
(325, '09:00:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 47, '2', '1', '2015-10-04 12:14:34', '2015-10-04 12:14:34'),
(326, '09:45:00', 'Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Prime', 47, '2', '1', '2015-10-04 12:15:00', '2015-10-04 12:15:00'),
(327, '10:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:15:26', '2015-10-04 12:15:26'),
(328, '11:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:15:50', '2015-10-04 12:15:50'),
(329, '12:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '2', '1', '2015-10-04 12:16:12', '2015-10-04 12:16:12'),
(330, '12:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '2', '1', '2015-10-04 12:17:32', '2015-10-04 12:17:32'),
(331, '13:30:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '2', '1', '2015-10-04 12:18:00', '2015-10-04 12:18:00'),
(332, '14:15:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '2', '1', '2015-10-04 12:18:41', '2015-10-04 12:18:41'),
(333, '15:00:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 47, '2', '1', '2015-10-04 12:19:05', '2015-10-04 12:19:05'),
(334, '15:45:00', 'Social', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Social', 'Social', 47, '2', '1', '2015-10-04 12:20:10', '2015-10-04 12:20:10'),
(335, '16:30:00', 'Social', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Social', 47, '2', '1', '2015-10-04 12:20:37', '2015-10-04 12:20:37'),
(336, '17:15:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:21:00', '2015-10-04 12:21:00'),
(337, '18:00:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:21:40', '2015-10-04 12:21:40'),
(338, '18:45:00', 'Non-Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:22:06', '2015-10-04 12:22:06'),
(339, '19:30:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:22:36', '2015-10-04 12:22:36'),
(340, '20:15:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:23:00', '2015-10-04 12:23:00'),
(341, '21:00:00', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 'Non-Prime', 47, '2', '1', '2015-10-04 12:23:19', '2015-10-04 12:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE IF NOT EXISTS `unions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'à¦Ÿà¦¾à¦®à¦Ÿà¦¾ à¦‰à¦¤à§à¦¤à¦° à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-11 14:02:31', '2016-04-26 15:15:29'),
(2, 'à¦Ÿà¦¾à¦®à¦Ÿà¦¾ à¦¦à¦•à§à¦·à¦¿à¦£ à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-11 14:09:38', '2016-04-26 15:15:53'),
(3, 'à¦®à§‡à¦¹à§‡à¦° à¦‰à¦¤à§à¦¤à¦° à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-11 14:17:28', '2016-04-26 15:16:15'),
(4, 'à¦®à§‡à¦¹à§‡à¦° à¦¦à¦•à§à¦·à¦¿à¦£ à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-11 14:18:59', '2016-04-26 15:16:26'),
(5, 'à¦°à¦¾à§Ÿà¦¶à§à¦°à§€ à¦‰à¦¤à§à¦¤à¦° à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:16:50', '2016-04-26 15:16:50'),
(6, 'à¦°à¦¾à§Ÿà¦¶à§à¦°à§€ à¦¦à¦•à§à¦·à¦¿à¦£ à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:17:04', '2016-04-26 15:17:04'),
(7, 'à¦¸à§‚à¦šà¦¿à¦ªà¦¾à§œà¦¾ à¦‰à¦¤à§à¦¤à¦°  à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:17:20', '2016-04-26 15:17:20'),
(8, 'à¦¸à§‚à¦šà¦¿à¦ªà¦¾à§œà¦¾ à¦¦à¦•à§à¦·à¦¿à¦£ à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:17:36', '2016-04-26 15:17:36'),
(9, 'à¦šà¦¿à¦¤à§‹à¦·à§€ à¦ªà§‚à¦°à§à¦¬  à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:18:11', '2016-04-26 15:18:11'),
(10, 'à¦šà¦¿à¦¤à§‹à¦·à§€ à¦ªà¦¶à§à¦šà¦¿à¦®  à¦‡à¦‰à¦¨à¦¿à§Ÿà¦¨', '2016-04-26 15:18:26', '2016-04-26 15:18:26'),
(11, 'à¦¶à¦¾à¦¹à¦°à¦¾à¦¸à§à¦¤à¦¿ à¦ªà§Œà¦°à¦¸à¦­à¦¾', '2016-04-26 15:18:46', '2016-04-26 15:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `member_id` int(11) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobileNo`, `email`, `member_id`, `username`, `password`, `role`, `status`, `created`, `modified`) VALUES
(1, 'UNO', '01719423837', 'prince.uiu091@gmail.com', 0, 'admin', 'a1ae10439ba4848333447ec7a48b4029781b69ba', '1', '1', '2015-09-20 12:48:02', '2016-04-16 15:56:06'),
(2, 'employee', '01714804392', 'tech.shahrasti@gmail.com', 0, 'employee', 'a1ae10439ba4848333447ec7a48b4029781b69ba', '3', '1', '2016-04-25 17:13:19', '2016-04-26 23:58:44'),
(3, 'masud', '01714804392', 'techshahrasti@gmail.com', 0, 'masud', 'a1ae10439ba4848333447ec7a48b4029781b69ba', '2', '1', '2016-04-26 15:01:11', '2016-05-15 13:29:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babosthas`
--
ALTER TABLE `babosthas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentimages`
--
ALTER TABLE `contentimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cont` (`contName`(255),`type`);

--
-- Indexes for table `contenttypes`
--
ALTER TABLE `contenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entryforms`
--
ALTER TABLE `entryforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincategories`
--
ALTER TABLE `maincategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `parent_id` (`parent_id`) USING BTREE;

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tennises`
--
ALTER TABLE `tennises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babosthas`
--
ALTER TABLE `babosthas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contentimages`
--
ALTER TABLE `contentimages`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contenttypes`
--
ALTER TABLE `contenttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `entryforms`
--
ALTER TABLE `entryforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `maincategories`
--
ALTER TABLE `maincategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tennises`
--
ALTER TABLE `tennises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
