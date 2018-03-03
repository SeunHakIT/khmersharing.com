-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2017 at 12:59 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hdmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Khmer Movies', '\n\nThis category display only move in khmers', 1, '2017-12-12 12:56:06', '0000-00-00 00:00:00'),
(17, 'Chinese Movies', 'This category contain all of Chinese Movie', 1, '2017-12-11 13:09:43', '0000-00-00 00:00:00'),
(20, 'Korean Movie sss', 'This category for Korean Movie', 1, '2017-12-12 12:59:33', '0000-00-00 00:00:00'),
(21, 'Thai movie. Uuuuu', 'Long movieuuuuuu', 1, '2017-12-12 12:59:59', '0000-00-00 00:00:00'),
(22, 'Tattoo', 'Hhh', 0, '2017-12-12 12:58:41', '0000-00-00 00:00:00'),
(23, 'Yey', 'Y', 0, '2017-12-12 12:58:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_videos`
--

CREATE TABLE IF NOT EXISTS `sub_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `main` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `cby` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub_videos`
--

INSERT INTO `sub_videos` (`id`, `title`, `url`, `image`, `main`, `status`, `cby`, `cdate`) VALUES
(1, 'Jang U Chi 2003 ep 01', 'xEaseSz0ptM', '810Capture.PNG', 24, 1, 1, NULL),
(2, 'Jang U Chi 2003 Ep 02', '6b-HduugBik', '7906Capture.PNG', 24, 1, 1, NULL),
(3, 'Jang U Chi 2003 Ep 05', 'dBEnfzeBV0E', '4751Capture.PNG', 24, 0, 1, NULL),
(4, 'Movie boxing', 'Hhhhhh', '6691image.jpg', 25, 1, 1, NULL),
(5, 'Movie boxing', 'Hhhhhh', '9892image.jpg', 25, 1, 1, NULL),
(6, 'Toto', 'Juju', '917image.jpg', 28, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `cby` tinyint(4) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `status`, `cby`, `cdate`) VALUES
(1, 'sor seng an', 'sengan', 'sengan', 1, 1, NULL, NULL),
(2, 'Pu Seak', 'hseak', 'hseak@123', 1, 1, NULL, NULL),
(3, 'user', 'user', 'user@123', 1, 1, NULL, NULL),
(4, 'user1', 'user1', 'user1@123', 1, 1, NULL, NULL),
(5, 'Sopheap', 'sopheap', 'sopheap@123', 1, 1, NULL, NULL),
(6, 'Chanthy', 'chanthy', '2757', 1, 1, NULL, NULL),
(7, 'Mardy', 'mardy', '0088', 1, 1, NULL, NULL),
(8, 'Theana', 'theana', 'nana09', 1, 1, NULL, NULL),
(9, 'rattana', 'rattana', 'rattana@123', 1, 1, NULL, NULL),
(10, 'Socheat', 'socheat', 'socheat@123', 1, 1, NULL, NULL),
(11, 'Narong', 'narong', 'narong@123', 1, 1, NULL, NULL),
(12, 'Mengthay', 'mengthay', 'mengthay@123', 1, 1, NULL, NULL),
(13, 'Te socheatay', 'socheata', 'socheata@123', 1, 1, NULL, NULL),
(14, 'Ieng Soknalean', 'nalean', 'nalean@123', 1, 1, NULL, NULL),
(15, 'Neang Siem', 'siem', 'siem@123', 1, 1, NULL, NULL),
(16, 'Rattana', 'ratana', 'ratana@123', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `cby` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `image`, `url`, `category`, `status`, `cby`, `cdate`) VALUES
(24, 'Love romantic movies 2017 - Chinese movies with English subtitles', '9917thumb-1.png', 'p3zzAkzRWK4', 17, 0, 1, NULL),
(25, 'The three kingdom', '6731thumb-2.jpg', 'QuMYmsTT7WY', 17, 1, 1, NULL),
(26, 'Testing', '3747image.jpg', 'Yyyy', 17, 1, 1, NULL),
(27, 'Testing', '1773image.jpg', 'Yyyy', 17, 1, 1, NULL),
(28, 'Toto', '1518image.jpg', 'Uuuuu', 20, 1, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
