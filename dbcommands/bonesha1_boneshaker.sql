-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2014 at 09:01 PM
-- Server version: 5.1.73-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bonesha1_boneshaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory_sub_type`
--

CREATE TABLE IF NOT EXISTS `accessory_sub_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accessory_sub_type`
--

INSERT INTO `accessory_sub_type` (`id`, `name`, `insert_date`, `available`) VALUES
(1, 'Cu termomentru', '2014-01-18 09:37:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accessory_type`
--

CREATE TABLE IF NOT EXISTS `accessory_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `accessory_type`
--

INSERT INTO `accessory_type` (`id`, `name`, `available`) VALUES
(1, 'Pedala', 0),
(2, 'Nume', 0),
(3, 'Manusa', 0),
(4, 'manusa', 0),
(5, 'Incalzitor mana', 0),
(6, 'Incalzitor picior', 0),
(7, 'Cauciucuri', 0),
(10, 'Jenti', 0),
(11, 'Butuci', 0),
(12, 'Spite', 0),
(13, 'Pedalier', 0),
(14, 'Pinioane', 0),
(15, 'Lanturi', 0),
(16, 'Lanturi', 0),
(17, 'Frane', 0),
(18, 'Ghidoane', 0),
(19, 'Mansoane', 0),
(20, 'Furci', 0),
(21, 'Sa/Tija sa', 0),
(22, 'Intretinere', 1),
(23, 'Lumini', 1),
(24, 'Inchizatoare', 1),
(25, 'Ciclocomputere', 1),
(26, 'Ceasuri', 1),
(27, 'Altele', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `itemname` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `userid` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `bizrule` text COLLATE latin1_general_ci,
  `data` text COLLATE latin1_general_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrator', '1', '', 's:0:"";'),
('Authority', '11', NULL, NULL),
('User', '1', '', 's:0:"";');

-- --------------------------------------------------------

--
-- Table structure for table `bb_set`
--

CREATE TABLE IF NOT EXISTS `bb_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `bb_set_maker` (`maker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bicycle_description`
--

CREATE TABLE IF NOT EXISTS `bicycle_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `freewheel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `spokes` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `tires` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `handlebar` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `stem` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `headset` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `seatpost` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `saddle` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `pedals` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `frame_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `speed_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `fork_id` int(11) DEFAULT NULL,
  `derailleur_front_id` int(11) DEFAULT NULL,
  `derailleur_rear_id` int(11) DEFAULT NULL,
  `shifter_id` int(11) DEFAULT NULL,
  `brake_lever_id` int(11) DEFAULT NULL,
  `brake_system_id` int(11) DEFAULT NULL,
  `chain_wheel_id` int(11) DEFAULT NULL,
  `bb_set_id` int(11) DEFAULT NULL,
  `chain_id` int(11) DEFAULT NULL,
  `front_hub_id` int(11) DEFAULT NULL,
  `rear_hub_id` int(11) DEFAULT NULL,
  `rim_id` int(11) DEFAULT NULL,
  `front_rim_id` int(11) DEFAULT NULL,
  `rear_rim_id` int(11) DEFAULT NULL,
  `front_tire_id` int(11) DEFAULT NULL,
  `rear_tire_id` int(11) DEFAULT NULL,
  `front_rear_tire_id` int(11) DEFAULT NULL,
  `front_rear_rim_id` int(11) DEFAULT NULL,
  `rear_shock_id` int(11) DEFAULT NULL,
  `wheel_size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `bicycle_description_frame_id` (`frame_id`),
  KEY `bicycle_description_size_id` (`size_id`),
  KEY `bicycle_description_speed` (`speed_id`),
  KEY `bicycle_description_color` (`color_id`),
  KEY `bicycle_descripton_fork` (`fork_id`),
  KEY `bicycle_description_derailleur_front` (`derailleur_front_id`),
  KEY `bicycle_description_derailleur_rear` (`derailleur_rear_id`),
  KEY `bicycle_descripton_shifer` (`shifter_id`),
  KEY `bicycle_description_brake_lever` (`brake_lever_id`),
  KEY `bicycle_description_brake_system` (`brake_system_id`),
  KEY `bicycle_description_chain_wheel` (`chain_wheel_id`),
  KEY `bicycle_description_bb_set` (`bb_set_id`),
  KEY `bicycle_description_chain` (`chain_id`),
  KEY `bicycle_description_front_hub` (`front_hub_id`),
  KEY `bicycle_description_rear_hub` (`rear_hub_id`),
  KEY `bicycle_description_rim` (`rim_id`),
  KEY `bicycle_description_front_rim` (`front_rim_id`),
  KEY `bicycle_description_rear_rim` (`rear_rim_id`),
  KEY `bicycle_description_front_tire_id` (`front_tire_id`),
  KEY `bicycle_description_rear_tire_id` (`rear_tire_id`),
  KEY `bicycle_description_front_rear_tire_id` (`front_rear_tire_id`),
  KEY `bicycle_description_front_rear_rim_id` (`front_rear_rim_id`),
  KEY `bicycle_description_rear_shock_id` (`rear_shock_id`),
  KEY `bicycle_description_wheel_size` (`wheel_size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=134 ;

--
-- Dumping data for table `bicycle_description`
--

INSERT INTO `bicycle_description` (`id`, `product_id`, `freewheel`, `spokes`, `tires`, `handlebar`, `stem`, `headset`, `seatpost`, `saddle`, `pedals`, `frame_id`, `size_id`, `speed_id`, `color_id`, `fork_id`, `derailleur_front_id`, `derailleur_rear_id`, `shifter_id`, `brake_lever_id`, `brake_system_id`, `chain_wheel_id`, `bb_set_id`, `chain_id`, `front_hub_id`, `rear_hub_id`, `rim_id`, `front_rim_id`, `rear_rim_id`, `front_tire_id`, `rear_tire_id`, `front_rear_tire_id`, `front_rear_rim_id`, `rear_shock_id`, `wheel_size_id`) VALUES
(21, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, 9, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 5, 9, 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 6, 12, 9, 10, 10, 11, 13, NULL, 6, 5, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(24, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 6, 12, 8, 11, 12, 11, 13, NULL, 7, 4, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(27, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 6, 11, 7, 10, 8, 9, 13, NULL, 6, 4, NULL, 5, 2, 2, NULL, 1, 3, 3, 4, NULL, NULL, NULL, NULL),
(28, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 6, 12, 10, 11, 12, 13, 13, NULL, 7, 4, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(29, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 6, 12, 10, 11, 12, 13, 14, NULL, 8, 4, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(30, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 7, 10, NULL, 12, 14, 15, 15, NULL, 9, 6, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 6, 11, 7, NULL, 8, 9, 13, NULL, 6, 4, NULL, NULL, 2, 2, NULL, 1, 1, 4, 3, NULL, NULL, NULL, NULL),
(34, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 6, 12, NULL, NULL, 10, 11, 13, NULL, 6, 5, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(35, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 6, 12, NULL, NULL, 12, 13, 13, NULL, 7, 4, NULL, 6, 2, 2, NULL, 2, 2, 3, 4, NULL, NULL, NULL, NULL),
(36, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 6, 12, NULL, NULL, 7, 13, 14, NULL, 8, 4, NULL, 6, 2, 2, NULL, 1, 1, 3, 3, NULL, NULL, NULL, NULL),
(39, 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 6, 12, NULL, NULL, 12, 13, 14, NULL, 8, NULL, NULL, NULL, 2, 2, NULL, 2, 2, 3, 4, NULL, NULL, NULL, NULL),
(40, 162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 11, 12, NULL, 22, 7, 11, 13, NULL, 7, 4, NULL, 6, 23, 23, NULL, 24, 25, 3, 4, NULL, NULL, NULL, NULL),
(41, 194, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, 14, 11, NULL, 26, 30, 9, 13, NULL, 6, 4, NULL, 5, 2, 2, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 1),
(42, 192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 8, 13, NULL, 14, NULL, 16, 16, NULL, 10, 7, NULL, 8, 3, 4, NULL, 4, 5, 5, 6, NULL, NULL, NULL, NULL),
(43, 193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 8, 14, NULL, 14, 17, 18, 17, NULL, 11, 8, NULL, 9, 6, 7, NULL, 6, 7, 8, 7, NULL, NULL, NULL, NULL),
(48, 188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, 8, 14, NULL, 15, 19, 20, 18, NULL, 12, 9, NULL, 10, 8, 8, NULL, 8, 8, 9, 9, NULL, NULL, NULL, NULL),
(49, 186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 8, 14, NULL, 16, 16, 16, 16, NULL, 13, 10, NULL, 9, 10, 11, NULL, 10, 11, 11, 12, NULL, NULL, NULL, NULL),
(50, 182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 8, 15, NULL, 17, 22, 23, 19, NULL, 11, 11, NULL, 9, 12, 13, NULL, 12, 12, 13, 14, NULL, NULL, NULL, NULL),
(51, 183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 9, 14, NULL, 18, 21, 24, 19, NULL, 14, 12, NULL, 9, 14, 15, NULL, 10, 10, 15, 16, NULL, NULL, NULL, NULL),
(53, 184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 9, 14, NULL, 19, 25, 26, 20, NULL, 15, 13, NULL, 9, 14, 15, NULL, 13, 13, 14, 14, NULL, NULL, NULL, NULL),
(54, 253, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 9, 15, NULL, 17, 21, 23, 19, NULL, 11, 11, NULL, 9, 12, 12, NULL, 12, 12, 14, 14, NULL, NULL, NULL, NULL),
(55, 181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 9, 15, NULL, 20, 17, 23, 17, NULL, 16, 14, NULL, 9, 16, 17, NULL, 14, 15, 17, 18, NULL, NULL, NULL, NULL),
(56, 180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 9, 10, NULL, 12, 14, 22, 21, NULL, 17, 6, NULL, 7, 18, 19, NULL, 15, 14, 19, 20, NULL, NULL, NULL, NULL),
(57, 179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 9, 10, NULL, 12, 27, 13, 22, NULL, 17, 15, NULL, 7, 18, 18, NULL, 14, 14, 19, 20, NULL, NULL, NULL, NULL),
(58, 178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, 9, 10, NULL, 12, 27, 9, 22, NULL, 18, 16, NULL, 7, 18, 18, NULL, 15, 15, 21, 22, NULL, NULL, NULL, NULL),
(59, 177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, 9, 10, NULL, 9, 27, 9, 22, NULL, 19, 16, NULL, 7, 18, 18, NULL, 16, 17, 21, 21, NULL, NULL, NULL, NULL),
(60, 176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, 9, 12, NULL, 12, 12, 11, 13, NULL, 19, 4, NULL, 6, 18, 18, NULL, 16, 16, 3, 4, NULL, NULL, NULL, NULL),
(61, 175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, 10, 14, NULL, 15, 19, 19, 18, NULL, 12, 17, NULL, 10, 8, 8, NULL, 8, 9, 14, 14, NULL, NULL, NULL, NULL),
(62, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 10, 14, NULL, 18, 28, 23, 23, NULL, 20, 18, NULL, 9, 8, 8, NULL, 18, 19, 23, 24, NULL, NULL, NULL, NULL),
(63, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 10, 14, NULL, 16, 16, 16, 16, NULL, 21, 10, NULL, 9, 10, 20, NULL, 10, 10, 25, 26, NULL, NULL, NULL, NULL),
(64, 172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 10, 14, NULL, 19, 25, 25, 20, NULL, 15, 13, NULL, 9, 21, 22, NULL, 20, 21, 14, 14, NULL, NULL, NULL, NULL),
(65, 171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 11, 14, NULL, 18, 22, 24, 19, NULL, 14, 12, NULL, 9, 14, 15, NULL, 10, 11, 27, 28, NULL, NULL, NULL, NULL),
(66, 170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 11, 15, NULL, 17, 22, 23, 19, NULL, 11, 11, NULL, 9, 12, 13, NULL, 12, 12, 14, 14, NULL, NULL, NULL, NULL),
(67, 168, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 11, 15, NULL, 21, 17, 23, 17, NULL, 22, 19, NULL, 9, 16, 17, NULL, 20, 21, 14, 14, NULL, NULL, NULL, NULL),
(68, 167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 11, 15, NULL, 20, 17, 23, 17, NULL, 16, 14, NULL, 9, 19, 19, NULL, 22, 23, 18, 18, NULL, NULL, NULL, NULL),
(69, 166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 11, 10, NULL, 22, 14, 22, 21, NULL, 17, 6, NULL, 7, 18, 19, NULL, 23, 23, 19, 20, NULL, NULL, NULL, NULL),
(70, 165, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 11, 10, NULL, 22, 27, 13, 22, NULL, 17, 15, NULL, 7, 18, 18, NULL, 22, 22, 19, 19, NULL, NULL, NULL, NULL),
(71, 164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 11, 10, NULL, 22, 27, 9, 22, NULL, 18, 16, NULL, 7, 18, 18, NULL, 24, 25, 3, 3, NULL, NULL, NULL, NULL),
(72, 163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 11, 10, NULL, 22, 27, 9, 22, NULL, 7, 16, NULL, 7, 18, 23, NULL, 24, 24, 4, 3, NULL, NULL, NULL, NULL),
(75, 161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 6, 12, NULL, 10, 10, 11, 13, NULL, 6, 5, NULL, 6, 2, 2, NULL, 1, 2, 3, 3, NULL, NULL, NULL, NULL),
(76, 160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 6, 11, NULL, 10, 8, 9, 13, NULL, 6, 4, NULL, 5, 2, 2, NULL, 1, 1, 3, 4, NULL, NULL, NULL, NULL),
(77, 219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 47, 12, 15, NULL, 21, 17, 23, 17, NULL, 22, 20, NULL, 9, 16, 16, NULL, NULL, NULL, NULL, NULL, 17, 20, NULL, 2),
(78, 218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 47, 12, 15, NULL, 23, 17, 23, 17, NULL, 16, 14, NULL, 9, 16, 16, NULL, NULL, NULL, NULL, NULL, 17, 23, NULL, 2),
(79, 217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 12, 10, NULL, 9, 14, 21, 21, NULL, 17, 6, NULL, 7, 2, 24, NULL, NULL, NULL, NULL, NULL, 19, 22, NULL, 2),
(80, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 12, 10, NULL, 9, 27, 13, 22, NULL, 17, 15, NULL, 7, 2, 2, NULL, NULL, NULL, NULL, NULL, 19, 22, NULL, 2),
(81, 215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 13, 10, NULL, 11, 27, 9, 22, NULL, 18, 16, NULL, 7, 2, 2, NULL, NULL, NULL, NULL, NULL, 29, 26, NULL, 3),
(82, 214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 13, 12, NULL, 11, 7, 11, 13, NULL, 7, 4, NULL, 6, 2, 2, NULL, NULL, NULL, NULL, NULL, 29, 26, NULL, 3),
(83, 213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 13, 12, NULL, 10, 10, 11, 13, NULL, 6, 5, NULL, 6, 2, 2, NULL, NULL, NULL, NULL, NULL, 29, 27, NULL, 3),
(84, 212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 13, 11, NULL, 10, 8, 9, 13, NULL, 6, 4, NULL, 5, 2, 2, NULL, NULL, NULL, NULL, NULL, 29, 27, NULL, 3),
(85, 204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 15, NULL, 24, 28, 28, 23, NULL, 20, 21, NULL, 9, 25, 26, NULL, NULL, NULL, NULL, NULL, 30, 28, NULL, 1),
(86, 203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 15, NULL, 24, 28, 28, 23, NULL, 11, 21, NULL, 9, 16, 16, NULL, NULL, NULL, NULL, NULL, 31, 29, NULL, 1),
(87, 202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 15, NULL, 24, 17, 28, 17, NULL, 22, 22, NULL, 9, 16, 16, NULL, NULL, NULL, NULL, NULL, 31, 29, NULL, 1),
(88, 201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 15, NULL, 24, 17, 28, 17, NULL, 16, 23, NULL, 9, 16, 16, NULL, NULL, NULL, NULL, NULL, 32, 30, NULL, 1),
(89, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 10, NULL, 25, 14, 22, 21, NULL, 17, 24, NULL, 7, 2, 24, NULL, NULL, NULL, NULL, NULL, 32, 30, NULL, 1),
(90, 199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 14, 10, NULL, 25, 27, 13, 22, NULL, 17, 24, NULL, 7, 2, 2, NULL, NULL, NULL, NULL, NULL, 32, 30, NULL, 1),
(91, 198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51, 14, 10, NULL, 25, 27, 9, 22, NULL, 18, 16, NULL, 7, 2, 2, NULL, NULL, NULL, NULL, NULL, 32, 30, NULL, 1),
(92, 197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, 14, 12, NULL, 25, 30, 11, 13, NULL, 7, 4, NULL, 6, 2, 2, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 1),
(93, 196, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, 14, 12, NULL, 25, 30, 11, 13, NULL, 6, 4, NULL, 6, 2, 2, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 1),
(94, 195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 53, 14, 12, NULL, 26, 30, 11, 13, NULL, 6, 5, NULL, 6, 2, 27, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 1),
(95, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, 15, 16, NULL, 27, NULL, 25, 20, NULL, 24, 25, NULL, 9, 28, 29, NULL, NULL, NULL, NULL, NULL, 34, 31, 4, 3),
(96, 190, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, 15, 16, NULL, 28, NULL, 31, 24, NULL, 25, 26, NULL, 9, 30, 31, NULL, NULL, NULL, NULL, NULL, 35, 32, 2, 3),
(97, 191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, 15, 17, NULL, 32, NULL, 32, 24, NULL, 26, 27, NULL, NULL, 30, 31, NULL, NULL, NULL, NULL, NULL, 35, 32, 3, 3),
(98, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 16, 14, NULL, 33, 33, 34, 25, NULL, NULL, 28, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 33, NULL, 1),
(99, 224, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, 16, 18, NULL, 34, 35, 36, 26, NULL, 17, 28, NULL, 11, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, 1),
(100, 223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, 16, 10, NULL, 34, 37, 33, 22, NULL, 17, 24, NULL, 11, 2, 2, NULL, NULL, NULL, NULL, NULL, 37, 30, NULL, 1),
(101, 222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 16, 10, NULL, 35, 37, 33, 22, NULL, 6, 24, NULL, 11, 2, 32, NULL, NULL, NULL, NULL, NULL, 37, 30, NULL, 1),
(102, 221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, 16, 12, NULL, 34, 30, 38, 13, NULL, 7, 4, NULL, 12, 2, 2, NULL, NULL, NULL, NULL, NULL, 37, 30, NULL, 1),
(103, 220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 16, 12, NULL, 35, 30, 38, 13, NULL, 6, 4, NULL, 12, 2, 2, NULL, NULL, NULL, NULL, NULL, 37, 30, NULL, 1),
(104, 236, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, 17, 19, NULL, 36, 39, 40, 27, NULL, 27, 29, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 34, NULL, 1),
(105, 235, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, 17, 19, NULL, NULL, 41, 42, 28, NULL, 28, 30, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, 35, NULL, 1),
(106, 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, 17, 19, NULL, NULL, 41, 42, 28, NULL, 29, 31, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 36, NULL, 1),
(108, 233, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, 17, 14, NULL, NULL, 43, 36, 29, NULL, 30, 32, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 37, NULL, 1),
(109, 232, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 18, 14, NULL, NULL, 43, 36, 29, NULL, 31, 32, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 37, NULL, 1),
(110, 254, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 19, 15, NULL, 37, 44, 23, 31, NULL, 32, 33, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 38, 5, 2),
(111, 255, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 19, 15, NULL, 37, 45, 24, 32, NULL, 14, 34, NULL, 9, 33, 15, NULL, NULL, NULL, NULL, NULL, 42, 39, 6, 2),
(112, 256, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 19, 15, NULL, 38, 46, 18, 33, NULL, 11, 11, NULL, 9, 21, 22, NULL, NULL, NULL, NULL, NULL, 42, 39, 7, 2),
(113, 257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61, 20, 14, NULL, 39, 47, 48, NULL, NULL, 12, 9, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, 8, 8, 4),
(114, 258, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61, 20, 14, NULL, 40, 49, 23, 30, NULL, 33, 18, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 18, 9, 4),
(115, 259, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 62, 20, 14, NULL, 16, 50, 51, 16, NULL, 13, 10, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, 18, 8, 4),
(116, 260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 63, 20, 14, NULL, 40, 52, 24, 32, NULL, 14, 12, NULL, 9, 14, 22, NULL, NULL, NULL, NULL, NULL, 16, 10, 10, 4),
(117, 261, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 63, 20, 15, NULL, 42, 45, 23, 32, NULL, 11, 11, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 40, 10, 4),
(118, 231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 18, 15, NULL, 44, 33, 33, 35, NULL, 31, 35, NULL, 9, 34, 35, NULL, NULL, NULL, NULL, NULL, 40, 42, NULL, 1),
(119, 229, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 18, 18, NULL, 44, 35, 53, 36, NULL, 31, 36, NULL, 11, 32, 32, NULL, NULL, NULL, NULL, NULL, 40, 41, NULL, 1),
(120, 230, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 21, 18, NULL, 44, 35, 53, 36, NULL, 31, 36, NULL, 11, 32, 32, NULL, NULL, NULL, NULL, NULL, 40, 41, NULL, 1),
(121, 228, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59, 18, 20, NULL, 43, 54, 38, 37, NULL, 34, 37, NULL, 12, 2, 32, NULL, NULL, NULL, NULL, NULL, 40, 43, NULL, 1),
(122, 227, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64, 18, 12, NULL, 45, 55, 38, 37, NULL, 34, 38, NULL, 12, 2, 32, NULL, NULL, NULL, NULL, NULL, 45, 43, NULL, 1),
(123, 226, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64, 18, 20, NULL, 45, 54, 38, 37, NULL, 34, 39, NULL, 12, 2, 32, NULL, NULL, NULL, NULL, NULL, 45, 43, NULL, 1),
(124, 247, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 65, 18, 19, NULL, 46, 56, 57, 38, NULL, 27, 29, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 34, NULL, 1),
(125, 246, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, 18, 19, NULL, 47, 41, 34, 28, NULL, 28, 30, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 35, NULL, 1),
(126, 245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, 18, 19, NULL, 47, 58, 59, 39, NULL, 35, 40, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 44, NULL, 1),
(127, 244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, 18, 19, NULL, 47, 41, 34, 28, NULL, 30, 31, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 45, NULL, 1),
(128, 243, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, 18, 14, NULL, 48, 43, 36, 29, NULL, 30, 32, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 46, NULL, 1),
(129, 242, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 18, 19, NULL, 48, 41, 34, 28, NULL, 30, 31, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 45, NULL, 1),
(130, 241, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 18, 14, NULL, 48, 43, 36, 29, NULL, 30, 32, NULL, 9, 36, 37, NULL, NULL, NULL, NULL, NULL, 40, 47, NULL, 1),
(131, 240, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 18, 14, NULL, 44, 33, 60, 34, NULL, 31, 41, NULL, 9, 34, 34, NULL, NULL, NULL, NULL, NULL, 40, 47, NULL, 1),
(132, 239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 18, 18, NULL, 44, 35, 61, 36, NULL, 31, 36, NULL, 11, 32, 32, NULL, NULL, NULL, NULL, NULL, 40, 47, NULL, 1),
(133, 238, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, 18, 20, NULL, 43, 54, 62, 37, NULL, 34, 37, NULL, 12, 2, 32, NULL, NULL, NULL, NULL, NULL, 40, 43, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bicycle_size`
--

CREATE TABLE IF NOT EXISTS `bicycle_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `bicycle_size`
--

INSERT INTO `bicycle_size` (`id`, `size`, `valid`) VALUES
(5, '52', b'1'),
(6, '16-18-20-22', b'1'),
(7, '17-19-21-23', b'1'),
(8, '15-17-19-21', b'1'),
(9, '15-17-19-21-23', b'1'),
(10, '15-17-18.5-20-21.5', b'1'),
(11, '13.5-15-17-18.5-20-21.5-23', b'1'),
(12, '13.5-15-17-18.5-20', b'1'),
(13, '14.5-16-18-20', b'1'),
(14, '46(L)-48-50L-52-55-58', b'1'),
(15, 'S/M/L', b'1'),
(16, '47(L)-50-52(L)-54-56-', b'1'),
(17, 'XS-S-S/M-M/L-L-XL', b'1'),
(18, 'XXS-XS-S-S/M-M/L-L-XL', b'1'),
(19, '15.5-17-19-21', b'1'),
(20, '15.5-17-19-21-23', b'1'),
(21, '44-47-50-52', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `brake_lever`
--

CREATE TABLE IF NOT EXISTS `brake_lever` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `brake_lever_maker_id` (`maker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brake_system`
--

CREATE TABLE IF NOT EXISTS `brake_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `brake_system_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `brake_system`
--

INSERT INTO `brake_system` (`id`, `maker_id`, `name`, `valid`) VALUES
(6, 19, 'V-Break Linear', b'1'),
(7, 33, 'Novela', b'1'),
(8, 33, 'HDC-300', b'1'),
(9, 33, 'Draco', b'1'),
(10, NULL, 'Shimano XT 203 Ice', b'1'),
(11, NULL, 'Shimano M615 ', b'1'),
(12, NULL, 'Avid XX', b'1'),
(13, NULL, 'Avid Elixir 5', b'1'),
(14, NULL, 'Shimano SLX Ice', b'1'),
(15, NULL, 'Magura MT4', b'1'),
(16, NULL, 'Shimano M445', b'1'),
(17, NULL, 'Tektro HDC 301', b'1'),
(18, NULL, 'Promax DSK Hydraulic', b'1'),
(19, NULL, 'Tektro Novela', b'1'),
(20, NULL, 'Shimano XT Ice', b'1'),
(21, NULL, 'Avid Elixir 7', b'1'),
(22, NULL, 'Shimano 505', b'1'),
(23, 27, 'Zee', b'1'),
(24, 27, 'Zee', b'1'),
(25, 27, 'Deore', b'1'),
(26, NULL, 'Avid Elixir 1', b'1'),
(27, 27, 'Dura Ace', b'1'),
(28, 27, 'Ultegra', b'1'),
(29, 27, 'R561', b'1'),
(30, NULL, 'Merida Road Pro', b'1'),
(31, NULL, 'Merida Road Comp', b'1'),
(32, 27, 'SLX', b'1'),
(33, 27, 'XT fin 180 ice', b'1'),
(34, NULL, 'Road Dual Pivot', b'1'),
(35, NULL, 'Campagnolo Athena', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `chain`
--

CREATE TABLE IF NOT EXISTS `chain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `chain_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `chain`
--

INSERT INTO `chain` (`id`, `maker_id`, `name`, `valid`) VALUES
(5, 34, 'Z50', b'1'),
(6, 34, 'Z51', b'1'),
(7, 34, 'Z99', b'1'),
(8, NULL, 'KMC X11', b'1'),
(9, NULL, 'KMC X10', b'1'),
(10, NULL, 'KMC X10SL', b'1'),
(11, 34, 'X9', b'1'),
(12, 34, 'Z7 8s', b'1'),
(13, 27, 'Dura Ace 11s', b'1'),
(14, 27, '11s', b'1'),
(15, NULL, 'Campagnolo Chorus 11s', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `chain_wheel`
--

CREATE TABLE IF NOT EXISTS `chain_wheel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `chain_wheel_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `chain_wheel`
--

INSERT INTO `chain_wheel` (`id`, `maker_id`, `name`, `valid`) VALUES
(4, 29, 'M 131', b'1'),
(5, 30, 'XCC ', b'1'),
(6, 29, 'M 430', b'1'),
(7, NULL, 'SRAM X1', b'1'),
(8, NULL, 'Shimano Deore 36/24', b'1'),
(9, NULL, 'SRAM XO 38/24', b'1'),
(10, NULL, 'SRAM S2210 Carbon 38/24', b'1'),
(11, NULL, 'Shimano M622 40/30/22', b'1'),
(12, NULL, 'Shimano SLX 38/24', b'1'),
(13, NULL, 'SRAM S1000 38/24', b'1'),
(14, NULL, 'Shimano M522 Okta 42/32/24', b'1'),
(15, NULL, 'Shimano M391 44/33/22', b'1'),
(16, NULL, 'SR Suntour XCM', b'1'),
(17, NULL, 'SRAM XX 39/26', b'1'),
(18, NULL, 'Shimano XT 38/24', b'1'),
(19, NULL, 'Shimano M612', b'1'),
(20, NULL, 'Shimano M610', b'1'),
(21, NULL, 'Shimano XT 48/36/26', b'1'),
(22, NULL, 'Shimano T611 48-36-26', b'1'),
(23, NULL, 'Suntour NCX FX', b'1'),
(24, 30, 'XCR', b'1'),
(25, NULL, 'FSA Gravity light 36t Mega', b'1'),
(26, NULL, 'FSA Moto X 36t', b'1'),
(27, NULL, 'FSA Step Up ISIS 36T', b'1'),
(28, NULL, 'FSA Omega 48-34', b'1'),
(29, 27, 'Dura Ace 50-34', b'1'),
(30, 27, 'Ultegra 50-34', b'1'),
(31, NULL, 'FSA Energy 50-34 Mega11', b'1'),
(32, 27, 'R565 50-34', b'1'),
(33, 27, 'XT 40-30-22', b'1'),
(34, 27, 'SLX 40-30-22', b'1'),
(35, 27, 'Tiagra 50-39-30', b'1'),
(36, 27, 'R345 octa 50-34', b'1'),
(37, NULL, 'FSA Tempo 50-34', b'1'),
(38, NULL, 'Merida Road SP-T 50-39-30', b'1'),
(39, NULL, 'merida Road SP-D 52-39', b'1'),
(40, NULL, 'Campagnolo Athena 50-34', b'1'),
(41, 27, 'Tiagra 50-34', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `valid`) VALUES
(7, 'Alb / Verde', b'1'),
(8, 'alb/albastru, negru/rosu', b'1'),
(9, 'negru/galben', b'1'),
(10, 'alb/verde, negru/rosu', b'1'),
(11, 'Rock Shox Sid XX', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `component_sub_type`
--

CREATE TABLE IF NOT EXISTS `component_sub_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `component_type`
--

CREATE TABLE IF NOT EXISTS `component_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `component_type`
--

INSERT INTO `component_type` (`id`, `name`, `available`) VALUES
(1, 'Telescop', 1),
(2, 'Angrenaj pedalier', 1),
(3, 'Anvelope (cauciuc)', 1),
(4, 'Butuci', 1),
(5, 'Butuc pedalier', 1),
(6, 'Cabluri si camasi', 1),
(7, 'Camere', 1),
(8, 'Cuvete (head set)', 1),
(9, 'Frane', 1),
(10, 'Ghidoane si atasabile', 1),
(11, 'Jante', 1),
(12, 'Lanturi', 1),
(13, 'Manete', 1),
(14, 'Manson si ghidolina', 1),
(15, 'Pedale', 1),
(16, 'Pinioane', 1),
(17, 'Pipe', 1),
(18, 'Roti', 1),
(19, 'Schimbatoare fata', 1),
(20, 'Schimbatoare spate', 1),
(21, 'Sei', 1),
(22, 'Tije&colier sa', 1),
(23, 'Spite', 1);

-- --------------------------------------------------------

--
-- Table structure for table `derailleur`
--

CREATE TABLE IF NOT EXISTS `derailleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `derailleur_maker_id` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `derailleur`
--

INSERT INTO `derailleur` (`id`, `maker_id`, `name`, `valid`) VALUES
(5, 19, 'Altus', b'1'),
(6, 19, 'TY10', b'1'),
(7, 19, 'M 190', b'1'),
(8, 29, 'TY 10', b'1'),
(9, 29, 'Altus', b'1'),
(10, 29, 'M 310', b'1'),
(11, 29, 'Acera-X', b'1'),
(12, 29, 'M 190', b'1'),
(13, 29, 'Alivio', b'1'),
(14, 27, 'M390', b'1'),
(15, 29, 'Deore XT 9', b'1'),
(16, NULL, 'Sram XO', b'1'),
(17, NULL, 'SH Deore', b'1'),
(18, NULL, 'Sh Deore Shadow', b'1'),
(19, NULL, 'SRAM XX', b'1'),
(20, NULL, 'SRAM XX', b'1'),
(21, NULL, 'Shimano SLX', b'1'),
(22, NULL, 'Shimano SLX', b'1'),
(23, NULL, 'Shimano XT Shadow', b'1'),
(24, NULL, 'Shimano SLX Shadow', b'1'),
(25, NULL, 'SRAM X9', b'1'),
(26, NULL, 'SRAM X9', b'1'),
(27, NULL, 'Shimano M370', b'1'),
(28, NULL, 'Shimano XT', b'1'),
(29, NULL, 'Shimano M130', b'1'),
(30, 27, 'M191', b'1'),
(31, NULL, 'SRAM X7 Type2', b'1'),
(32, NULL, 'SRAM X4', b'1'),
(33, 27, 'Tiagra', b'1'),
(34, 27, 'Ultegra SS', b'1'),
(35, 27, 'Sora D', b'1'),
(36, 27, '105 SS', b'1'),
(37, 27, 'M371', b'1'),
(38, 27, 'Claris GS', b'1'),
(39, 27, 'Dura Ace', b'1'),
(40, 27, 'Dura Ace', b'1'),
(41, 27, 'Ultegra D', b'1'),
(42, 27, 'Ultegra GS', b'1'),
(43, 27, '105 D', b'1'),
(44, 27, 'XT HD triple', b'1'),
(45, 27, 'SLX HD triple', b'1'),
(46, 27, 'Deore H35 triple', b'1'),
(47, NULL, 'Avid XX HD double', b'1'),
(48, NULL, 'Avid XX long', b'1'),
(49, 27, 'XT HD double', b'1'),
(50, NULL, 'SRAM X0 HD double', b'1'),
(51, NULL, 'SRAM XO long T2', b'1'),
(52, 27, 'SLX HD double', b'1'),
(53, 27, 'Sora GS', b'1'),
(54, 27, 'Claris D', b'1'),
(55, 27, 'Claris T', b'1'),
(56, 27, 'Dura Ace Di2', b'1'),
(57, 27, 'Dura Ace 11 Di2', b'1'),
(58, NULL, 'Campagnolo Athena', b'1'),
(59, NULL, 'Campagnolo Athena', b'1'),
(60, 27, 'Tiagra SS', b'1'),
(61, 27, 'Sora SS', b'1'),
(62, 27, 'Claris SS', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE IF NOT EXISTS `equipment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id`, `name`, `available`) VALUES
(1, 'Manusi', 1),
(2, 'Pantaloni', 0),
(3, 'Incalzitor mana', 0),
(7, 'Tricou', 0),
(8, 'Casti', 1),
(9, 'Pantofi spd', 1),
(10, 'Ochelari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fork`
--

CREATE TABLE IF NOT EXISTS `fork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `fork_maker_id` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `fork`
--

INSERT INTO `fork` (`id`, `maker_id`, `name`, `valid`) VALUES
(7, 21, 'Furca', b'1'),
(8, 19, 'SR Suntour XCT 100', b'1'),
(9, 19, 'XCM HLO100', b'1'),
(10, 30, 'XCT 100', b'1'),
(11, 30, 'XCT MLO 100', b'1'),
(12, 30, '29 XCM HLO 100', b'1'),
(13, NULL, 'XCR', b'1'),
(14, NULL, 'Fox Float CTD BV LV Performance', b'1'),
(15, NULL, 'Rock Shox Sid XX', b'1'),
(16, NULL, 'Rock Shox Reba RL', b'1'),
(17, NULL, 'Manitou Marvel', b'1'),
(18, NULL, 'Fox Float 32 CTD Evolution 100', b'1'),
(19, NULL, 'Rock Shox Recon Gold', b'1'),
(20, NULL, 'Rock Shox XC 30 TK29 100', b'1'),
(21, NULL, 'RST FirstAir 100', b'1'),
(22, NULL, 'SR Suntour XCM 100 Hlo', b'1'),
(23, NULL, 'Rock Shox XC30 ', b'1'),
(24, NULL, 'Suntour NCX lite E-RL 63', b'1'),
(25, 30, 'NEX ML 63', b'1'),
(26, 30, 'M3010 50', b'1'),
(27, NULL, 'Rock Shox Lyrk RC2DH CL170 BLK Taper', b'1'),
(28, NULL, 'Rock Shox Domain RC CL 180 S Black Taper', b'1'),
(29, 30, 'Durolux RC2 20 QLC DS 180 CTS', b'1'),
(30, 30, 'Durolux RC2 20 QLC DS 180 CTS', b'1'),
(31, 30, 'Durolux RC2 20 QLC DS 180 CTS', b'1'),
(32, 30, 'Durolux RC2 20 QLC DS 180 CTS', b'1'),
(33, NULL, 'Speeder carbon', b'1'),
(34, NULL, 'Speeder lite disc', b'1'),
(35, NULL, 'speeder lite', b'1'),
(36, NULL, 'Ride Carbon Lite', b'1'),
(37, 32, '32 Float 650B CTD Evolution 150', b'1'),
(38, NULL, 'Rock Shox Sector27 TK air 150 poplock', b'1'),
(39, NULL, 'Rock Shox SID XXS 29QRSA100 BLK TL36', b'1'),
(40, 32, '32 Float 29 CTD Remote ready O/C evolutione 120', b'1'),
(41, 32, 'Float CTD SV BV Performance', b'1'),
(42, NULL, 'Manitou Marvel comp 29 TS air 120 taper', b'1'),
(43, NULL, 'road carbon full', b'1'),
(44, NULL, 'road carbon full', b'1'),
(45, NULL, 'road carbon long M5', b'1'),
(46, NULL, 'Scultura Carbon superlite', b'1'),
(47, NULL, 'scultura carbon lite', b'1'),
(48, NULL, 'road carbon comp', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `frame`
--

CREATE TABLE IF NOT EXISTS `frame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `maker_id` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `frame`
--

INSERT INTO `frame` (`id`, `maker_id`, `name`, `valid`) VALUES
(30, 19, 'Road Race Lite', b'1'),
(31, 19, 'matts OV-V', b'1'),
(32, 19, 'Matts TFS comp', b'1'),
(33, 19, 'AL matts OV-V', b'1'),
(34, 19, 'AL matts OV-D', b'1'),
(35, 19, 'AL matts speed D', b'1'),
(36, 19, 'Big Nine TFS-D', b'1'),
(37, NULL, 'cadr', b'1'),
(38, 19, 'One Sixty D-Single BSC VPP A-link', b'1'),
(39, NULL, 'Big Nine Carbon Superlite', b'1'),
(40, NULL, 'Carbon Comp', b'1'),
(41, NULL, 'AL Lite', b'1'),
(42, NULL, 'Big Nine Speed', b'1'),
(43, NULL, 'Big Seven Carbon Superlite', b'1'),
(44, NULL, 'Big Seven HFS', b'1'),
(45, NULL, 'Big Seven TFS', b'1'),
(46, NULL, 'Big Seven Speed', b'1'),
(47, NULL, 'Juliet pro 27', b'1'),
(48, NULL, 'Juliet Comp 27', b'1'),
(49, NULL, 'Juliet speed ', b'1'),
(50, NULL, 'Crossway TFS ', b'1'),
(51, NULL, 'crossway speed', b'1'),
(52, NULL, 'Crosway D', b'1'),
(53, NULL, 'Crossway V', b'1'),
(54, NULL, 'One Eighty-D-Single VPP A-link R14', b'1'),
(55, NULL, 'Speeder ride V', b'1'),
(56, NULL, 'Speeder ride D', b'1'),
(57, NULL, 'Ride carbon Pro-E', b'1'),
(58, NULL, 'Ride Carbon Comp-E', b'1'),
(59, NULL, 'Ride lite-single', b'1'),
(60, NULL, 'One Forty 27-D-Single BSC VPP A-link R12', b'1'),
(61, NULL, 'Big 99 SL R12', b'1'),
(62, NULL, 'Big 99 Pro R12', b'1'),
(63, NULL, 'Big 99 comp-single R12', b'1'),
(64, NULL, 'Ride-EQ-single', b'1'),
(65, NULL, 'Scultura SL E', b'1'),
(66, NULL, 'Scultura Pro E', b'1'),
(67, NULL, 'Scultura comp', b'1'),
(68, NULL, 'Scultura lite', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_product`
--

CREATE TABLE IF NOT EXISTS `home_page_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `insert_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_page_product_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hub`
--

CREATE TABLE IF NOT EXISTS `hub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `hub_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `hub`
--

INSERT INTO `hub` (`id`, `maker_id`, `name`, `valid`) VALUES
(1, NULL, 'alloy QR', b'1'),
(2, NULL, 'Alloy QR', b'1'),
(3, NULL, 'DT 350', b'1'),
(4, NULL, 'DT 350', b'1'),
(5, NULL, 'Shimano Zen', b'1'),
(6, NULL, 'Shimano Zen', b'1'),
(7, NULL, 'Shimano XT 12 CEN', b'1'),
(8, NULL, 'Fulcrum', b'1'),
(9, NULL, 'Fulcrum', b'1'),
(10, NULL, 'SRAM M506', b'1'),
(11, NULL, 'SRAM M506', b'1'),
(12, NULL, 'Mavic crosride', b'1'),
(13, NULL, 'Mavic Crosride', b'1'),
(14, NULL, 'Shimano SLX', b'1'),
(15, NULL, 'Shimano SLX 12', b'1'),
(16, NULL, 'Shimano M435', b'1'),
(17, NULL, 'Shimano M435', b'1'),
(18, NULL, 'Disc F Alloy', b'1'),
(19, NULL, 'Shimano 475', b'1'),
(20, NULL, 'SRAM M746', b'1'),
(21, NULL, 'Shimano Deore 15', b'1'),
(22, NULL, 'Shimano Deore 12', b'1'),
(23, NULL, 'Disc Alloy', b'1'),
(24, NULL, 'Shimano M475', b'1'),
(25, NULL, 'Shimano XT Cen', b'1'),
(26, NULL, 'Shimano XT cen', b'1'),
(27, NULL, 'Alloy Cassette-8', b'1'),
(28, NULL, 'HB-M640 20mm thru axle', b'1'),
(29, NULL, 'FH-M648 12*142mm E-thru axle', b'1'),
(30, NULL, 'DH Pro 20mm 32H', b'1'),
(31, NULL, 'DH Pro  12mm axle 32H', b'1'),
(32, 27, '2200', b'1'),
(33, 27, 'SLX cen 15', b'1'),
(34, 27, 'Tiagra', b'1'),
(35, 27, 'Tiagra', b'1'),
(36, 27, '105', b'1'),
(37, 27, '105', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `itemchildren`
--

CREATE TABLE IF NOT EXISTS `itemchildren` (
  `parent` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `child` varchar(64) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `bizrule` text COLLATE latin1_general_ci,
  `data` text COLLATE latin1_general_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrator', 2, NULL, NULL, NULL),
('Authority', 2, NULL, NULL, NULL),
('Create Post', 0, NULL, NULL, NULL),
('Create User', 0, NULL, NULL, NULL),
('Delete Post', 0, NULL, NULL, NULL),
('Delete User', 0, NULL, NULL, NULL),
('Edit Post', 0, NULL, NULL, NULL),
('Edit User', 0, NULL, NULL, NULL),
('Post Manager', 1, NULL, NULL, NULL),
('User', 2, NULL, NULL, NULL),
('User Manager', 1, NULL, NULL, NULL),
('View Post', 0, NULL, NULL, NULL),
('View User', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  `submenu_only` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `name`, `insert_date`, `available`, `submenu_only`) VALUES
(1, 'Biciclete', '2012-04-16 15:22:54', 1, 0),
(2, 'Accesorii', '2012-04-16 15:22:54', 1, 0),
(3, 'Echipamente', '2012-04-16 15:22:54', 1, 1),
(4, 'Componente', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE IF NOT EXISTS `maker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type_id` int(11) NOT NULL,
  `name` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `item_type_id` (`item_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`id`, `item_type_id`, `name`, `insert_date`, `available`) VALUES
(19, 1, 'Merida', NULL, 1),
(20, 1, 'Caprine', NULL, 1),
(21, 1, 'Mongoose', NULL, 1),
(22, 1, 'Specialized', NULL, 1),
(23, 1, 'Neuzer', NULL, 1),
(24, 1, 'Wheeler', NULL, 0),
(25, 1, 'Mali', NULL, 1),
(26, 1, 'DHS', NULL, 0),
(27, 2, 'Shimano', NULL, 1),
(28, 3, 'Northwave', NULL, 1),
(29, 2, 'Shimano', NULL, 0),
(30, 2, 'SR Suntour', NULL, 1),
(31, 2, 'RST', NULL, 1),
(32, 2, 'Fox', NULL, 1),
(33, 2, 'Tektro', NULL, 1),
(34, 2, 'KMC', NULL, 1),
(35, 2, 'Sigma', NULL, 1),
(36, 2, 'Schwalbe', NULL, 1),
(37, 3, 'Merida', NULL, 1),
(38, 2, 'BikeFun', NULL, 1),
(40, 2, 'Merida', NULL, 1),
(41, 4, 'Fox', NULL, 1),
(42, 4, 'BikeFun', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_user`
--

CREATE TABLE IF NOT EXISTS `newsletter_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `newsletter_user_status_id` (`status_id`),
  KEY `newsletter_user_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `newsletter_user`
--

INSERT INTO `newsletter_user` (`id`, `status_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 5),
(7, 2, 9),
(6, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_user_status`
--

CREATE TABLE IF NOT EXISTS `newsletter_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter_user_status`
--

INSERT INTO `newsletter_user_status` (`id`, `status`) VALUES
(1, 'Unconfirmed'),
(2, 'Confirmed'),
(3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `offer_title` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `offer_description` text COLLATE latin1_general_ci,
  `discount_percent` int(11) DEFAULT NULL,
  `offer_price` decimal(10,3) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `available` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_product_id` (`product_id`),
  KEY `photo_order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=384 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `product_id`, `order_id`) VALUES
(31, 72, 1),
(32, 72, 2),
(33, 72, 2),
(34, 73, 1),
(35, 74, 1),
(36, 75, 1),
(37, 76, 1),
(38, 76, 2),
(39, 77, 1),
(40, 77, 2),
(41, 78, 1),
(42, 78, 2),
(43, 80, 1),
(44, 80, 2),
(45, 81, 1),
(46, 81, 2),
(47, 82, 1),
(48, 82, 2),
(49, 83, 1),
(50, 84, 1),
(51, 84, 2),
(52, 85, 1),
(53, 85, 2),
(54, 86, 1),
(55, 87, 1),
(56, 88, 1),
(57, 89, 1),
(58, 90, 1),
(59, 90, 2),
(60, 91, 1),
(61, 91, 2),
(62, 92, 1),
(63, 92, 2),
(64, 93, 1),
(65, 93, 2),
(66, 94, 1),
(67, 95, 1),
(68, 96, 1),
(69, 97, 1),
(70, 98, 1),
(71, 99, 1),
(72, 100, 1),
(74, 102, 1),
(75, 103, 1),
(76, 104, 1),
(77, 104, 2),
(78, 105, 1),
(79, 107, 1),
(80, 108, 1),
(81, 109, 1),
(94, 110, 1),
(95, 111, 1),
(96, 111, 2),
(97, 112, 1),
(98, 112, 2),
(99, 113, 1),
(100, 113, 2),
(101, 114, 1),
(102, 115, 1),
(103, 116, 1),
(104, 117, 1),
(105, 118, 1),
(106, 119, 1),
(107, 120, 1),
(108, 121, 1),
(109, 122, 1),
(110, 122, 2),
(111, 123, 1),
(112, 123, 2),
(113, 124, 1),
(114, 125, 1),
(115, 125, 1),
(116, 126, 1),
(117, 127, 1),
(118, 127, 2),
(119, 127, 2),
(120, 128, 1),
(121, 128, 2),
(122, 128, 2),
(123, 129, 1),
(124, 129, 2),
(125, 129, 2),
(126, 129, 2),
(127, 130, 1),
(128, 131, 1),
(129, 131, 2),
(134, 133, 1),
(135, 134, 1),
(136, 135, 1),
(137, 135, 2),
(138, 135, 2),
(154, 138, 1),
(155, 139, 1),
(156, 140, 2),
(157, 141, 1),
(158, 132, 1),
(159, 132, 2),
(162, 142, 1),
(164, 143, 1),
(165, 144, 1),
(166, 146, 1),
(167, 147, 1),
(168, 148, 1),
(169, 149, 1),
(173, 153, 1),
(175, 155, 1),
(176, 136, 1),
(177, 136, 2),
(178, 156, 1),
(179, 157, 1),
(180, 160, 1),
(181, 160, 2),
(182, 161, 1),
(189, 165, 1),
(190, 165, 2),
(191, 164, 1),
(192, 164, 2),
(193, 163, 1),
(194, 163, 2),
(195, 162, 1),
(196, 162, 2),
(197, 166, 1),
(198, 166, 2),
(199, 167, 1),
(200, 168, 1),
(201, 169, 1),
(202, 170, 1),
(203, 171, 1),
(204, 172, 1),
(205, 173, 1),
(206, 174, 1),
(207, 175, 1),
(208, 176, 1),
(209, 176, 2),
(210, 177, 1),
(211, 177, 2),
(212, 178, 1),
(213, 178, 2),
(214, 179, 1),
(215, 179, 2),
(216, 180, 1),
(217, 180, 2),
(218, 181, 1),
(219, 181, 2),
(220, 182, 1),
(221, 183, 1),
(222, 184, 1),
(223, 185, 1),
(224, 186, 1),
(225, 187, 1),
(226, 188, 1),
(227, 189, 1),
(228, 190, 1),
(229, 191, 1),
(230, 192, 1),
(231, 193, 1),
(232, 194, 1),
(233, 194, 2),
(234, 194, 2),
(235, 194, 2),
(236, 195, 1),
(237, 195, 2),
(238, 196, 1),
(239, 196, 2),
(240, 196, 2),
(241, 196, 2),
(242, 197, 1),
(243, 197, 2),
(244, 197, 2),
(245, 197, 2),
(246, 198, 1),
(247, 198, 2),
(248, 198, 2),
(249, 198, 2),
(250, 199, 1),
(251, 199, 2),
(252, 199, 2),
(253, 199, 2),
(254, 200, 1),
(255, 200, 2),
(256, 200, 2),
(257, 200, 2),
(258, 201, 1),
(259, 201, 2),
(260, 201, 2),
(261, 201, 2),
(262, 202, 1),
(263, 202, 2),
(264, 203, 1),
(265, 203, 2),
(266, 204, 1),
(267, 204, 2),
(268, 205, 1),
(269, 205, 2),
(270, 206, 1),
(271, 206, 2),
(272, 207, 1),
(273, 207, 2),
(274, 207, 2),
(275, 208, 1),
(276, 208, 2),
(277, 209, 1),
(278, 209, 2),
(279, 209, 2),
(280, 210, 1),
(281, 210, 2),
(282, 211, 1),
(283, 212, 1),
(284, 213, 1),
(285, 214, 1),
(286, 214, 2),
(287, 215, 1),
(288, 215, 2),
(289, 216, 1),
(290, 217, 1),
(291, 218, 1),
(292, 219, 1),
(293, 220, 1),
(294, 220, 2),
(295, 221, 1),
(296, 221, 2),
(297, 222, 1),
(298, 222, 2),
(299, 223, 1),
(300, 223, 2),
(301, 224, 1),
(302, 224, 2),
(303, 225, 1),
(304, 225, 2),
(305, 226, 1),
(306, 227, 1),
(307, 228, 1),
(308, 229, 1),
(309, 230, 1),
(310, 231, 1),
(311, 232, 1),
(312, 232, 2),
(313, 233, 1),
(314, 234, 1),
(315, 235, 1),
(316, 236, 1),
(317, 237, 1),
(318, 238, 1),
(319, 239, 1),
(320, 240, 1),
(321, 240, 2),
(322, 241, 1),
(323, 242, 1),
(324, 243, 1),
(325, 244, 1),
(326, 245, 1),
(327, 246, 1),
(328, 246, 2),
(329, 247, 1),
(330, 248, 1),
(331, 250, 1),
(332, 251, 1),
(333, 249, 1),
(334, 188, 1),
(335, 252, 1),
(336, 252, 2),
(337, 253, 1),
(338, 161, 1),
(339, 160, 1),
(340, 160, 2),
(341, 254, 1),
(342, 255, 1),
(343, 256, 1),
(344, 257, 1),
(345, 258, 1),
(346, 259, 1),
(347, 260, 1),
(348, 261, 1),
(349, 263, 1),
(350, 264, 1),
(351, 265, 1),
(352, 266, 1),
(353, 267, 1),
(354, 268, 1),
(355, 269, 1),
(356, 270, 1),
(357, 271, 1),
(358, 272, 1),
(359, 273, 1),
(360, 274, 1),
(361, 275, 1),
(362, 276, 1),
(363, 277, 1),
(364, 278, 1),
(365, 279, 1),
(366, 280, 1),
(367, 281, 1),
(368, 282, 1),
(369, 282, 2),
(370, 283, 1),
(372, 285, 1),
(373, 284, 1),
(374, 286, 1),
(375, 286, 2),
(376, 287, 1),
(377, 288, 1),
(378, 289, 1),
(379, 290, 1),
(380, 291, 1),
(381, 292, 1),
(382, 293, 1),
(383, 294, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo_order`
--

CREATE TABLE IF NOT EXISTS `photo_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_order` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `photo_order`
--

INSERT INTO `photo_order` (`id`, `photo_order`) VALUES
(1, 'PRIMARY'),
(2, 'SECONDARY');

-- --------------------------------------------------------

--
-- Table structure for table `photo_source`
--

CREATE TABLE IF NOT EXISTS `photo_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `photo_source_path` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `photo_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_source_photo_id` (`photo_id`),
  KEY `photo_source_photo_type_id` (`photo_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1342 ;

--
-- Dumping data for table `photo_source`
--

INSERT INTO `photo_source` (`id`, `photo_id`, `photo_source_path`, `photo_type_id`) VALUES
(66, 31, 'images/products/bicycle/29fff8a0f97e867ce78c6cb0fd63110f.jpeg', 3),
(67, 31, 'images/products/bicycle/454c40cdf5a4fd64885db8e2102653e8.jpeg', 4),
(68, 31, 'images/products/bicycle/b200042faee9675da3bd3b99c943dc6c.jpeg', 2),
(69, 32, 'images/products/bicycle/1e95f15377c17242f8eaee32a14e8b3b.jpeg', 3),
(70, 32, 'images/products/bicycle/c8ecf7015e662c9ce54d6ef2af82ee2f.jpeg', 4),
(71, 32, 'images/products/bicycle/4dd326c48a749da76160dcbba1dd864c.jpeg', 2),
(72, 33, 'images/products/bicycle/71c1f433303e6f9155abec6747dfd773.jpeg', 3),
(73, 33, 'images/products/bicycle/b62761e1cc9829919b0ee169390d505b.jpeg', 4),
(74, 33, 'images/products/bicycle/9cecbcb5423967b19dd17dd4227ea697.jpeg', 2),
(75, 34, 'images/products/bicycle/4a06b4399ed1ce28d382a34b7b4bb94a.jpeg', 3),
(76, 34, 'images/products/bicycle/9e5bf4112308193bf6814a1c2b1a410f.jpeg', 4),
(77, 34, 'images/products/bicycle/5d5cbda3615717f6bc30899d8a63eb1f.jpeg', 2),
(78, 35, 'images/products/bicycle/6afa5c69f788c248db371b98ac09cd7f.jpg', 3),
(79, 35, 'images/products/bicycle/daa2cbe985f51d79bb802d4d15166976.jpg', 4),
(80, 35, 'images/products/bicycle/8bd4c338a131f08a4567f26aeb75192b.jpg', 2),
(81, 36, 'images/products/bicycle/2777d667ee463072936339df3e4be1e1.jpg', 3),
(82, 36, 'images/products/bicycle/acfb61fd637b9229acddad971ca101dc.jpg', 4),
(83, 36, 'images/products/bicycle/6bee8e225d34bcb0e6d6c7f59b452062.jpg', 2),
(84, 37, 'images/products/bicycle/ec2903285ac792075f58fd6feae1cbd5.jpg', 3),
(85, 37, 'images/products/bicycle/579bea88aaeb0aa84d77386b8da01aeb.jpg', 4),
(86, 37, 'images/products/bicycle/23296c724032b0796eca6a39e422cb8a.jpg', 2),
(87, 38, 'images/products/bicycle/7fb0a0cf944d11e95890331d60015b30.jpg', 3),
(88, 38, 'images/products/bicycle/5a0f657a5769a59abe53306181562f96.jpg', 4),
(89, 38, 'images/products/bicycle/d78e9f08207e3181820a569a77857889.jpg', 2),
(90, 39, 'images/products/bicycle/4ff28041a5ca3908138ad86ebeb7d9ab.jpg', 3),
(91, 39, 'images/products/bicycle/fda2f9adecdddfb273d017aef5e30fd2.jpg', 4),
(92, 39, 'images/products/bicycle/9b37bdfdf0edc56399fe489c266e59f2.jpg', 2),
(93, 40, 'images/products/bicycle/95d6801a04a5e263fcbd88abf08ece24.jpg', 3),
(94, 40, 'images/products/bicycle/4f291fa7f152e704fd6942cbc12f3b6c.jpg', 4),
(95, 40, 'images/products/bicycle/b9569942e3bcb24aab31bae0834c4cdb.jpg', 2),
(96, 41, 'images/products/bicycle/df12fa16bf6916dfe8d40481d911db79.jpg', 3),
(97, 41, 'images/products/bicycle/fbb3c0cd5f57350d32c8078e1c343356.jpg', 4),
(98, 41, 'images/products/bicycle/3c17eaa541fce3f22d6a1f5b59b9f29b.jpg', 2),
(99, 42, 'images/products/bicycle/893880b633d4abd4eceb18a24b902857.jpg', 3),
(100, 42, 'images/products/bicycle/e01db4ef17ce02de3c583f944ea58a53.jpg', 4),
(101, 42, 'images/products/bicycle/9fda57572bac843f4bfd0f91dfe171f6.jpg', 2),
(102, 43, 'images/products/bicycle/493fa6d461c479bb627bca06fd42d4d1.jpg', 3),
(103, 43, 'images/products/bicycle/ae3e6a84ecc255e9d1773cf09317ebfb.jpg', 4),
(104, 43, 'images/products/bicycle/3c11784727f165a953c8c0f152ca413a.jpg', 2),
(105, 44, 'images/products/bicycle/a680d688632cb5ab0d7d099b95778633.jpg', 3),
(106, 44, 'images/products/bicycle/23ddd486a4c62744c25fc14092cc6891.jpg', 4),
(107, 44, 'images/products/bicycle/823ea1fa6b7bb23faabd25984bbe8303.jpg', 2),
(108, 45, 'images/products/bicycle/e56415e80045b7f68bca63d51db65c3e.jpg', 3),
(109, 45, 'images/products/bicycle/980198c8f2082f1463170c1b7573c0a0.jpg', 4),
(110, 45, 'images/products/bicycle/576ee9a76b83ad92b52828fc59d70f22.jpg', 2),
(111, 46, 'images/products/bicycle/0ad3c81ffdf5effdfa7fe91ce2982c34.jpg', 3),
(112, 46, 'images/products/bicycle/5fbdb6c39a28c49ae4d417ebe4ea1568.jpg', 4),
(113, 46, 'images/products/bicycle/3063e6ed14c2753683ed627b0446acaa.jpg', 2),
(114, 47, 'images/products/bicycle/5a3a4560826ca1aaa484abe66db35613.jpg', 3),
(115, 47, 'images/products/bicycle/667541ed46207956cc7bad7918e70c36.jpg', 4),
(116, 47, 'images/products/bicycle/d5c3cb1a5c39872446b031b6a7652b1e.jpg', 2),
(117, 48, 'images/products/bicycle/f6819ab1b028fe349f0402e0a0db6839.jpg', 3),
(118, 48, 'images/products/bicycle/fd61212627f8e3104b29bf05b755d338.jpg', 4),
(119, 48, 'images/products/bicycle/d77a17952f11de010ff59bc775e904b4.jpg', 2),
(120, 49, 'images/products/bicycle/7b0a012995e1ee91819435323ef205fa.jpg', 3),
(121, 49, 'images/products/bicycle/2084e9697553163582078eb834cb79be.jpg', 4),
(122, 49, 'images/products/bicycle/49ed1dee45d1bae34af1c8c29100b14e.jpg', 2),
(123, 50, 'images/products/bicycle/ff40bc440af1110b4dcf3c45856c7944.jpg', 3),
(124, 50, 'images/products/bicycle/baa28fdaf0e672baf5398658a40760e8.jpg', 4),
(125, 50, 'images/products/bicycle/509cbc9da85fb4d1bfd8f3037bb9401f.jpg', 2),
(126, 51, 'images/products/bicycle/61784f8248e3a38c943e5f87e7e3dad0.jpg', 3),
(127, 51, 'images/products/bicycle/102c6c072d2c92a11b2063697e56001f.jpg', 4),
(128, 51, 'images/products/bicycle/9711355fd0ea09757264b7a13b3f95ba.jpg', 2),
(129, 52, 'images/products/bicycle/1ddc681a3d36087a988562136ed3e092.jpg', 3),
(130, 52, 'images/products/bicycle/8772321e6cae1c610d68fe99ef433d98.jpg', 4),
(131, 52, 'images/products/bicycle/470f60be99eaed628db774e8e296486e.jpg', 2),
(132, 53, 'images/products/bicycle/362bfa3c85290487fd5ca44432015723.jpg', 3),
(133, 53, 'images/products/bicycle/94c0cfb4bf44e2fc99bf262aeeed930b.jpg', 4),
(134, 53, 'images/products/bicycle/308bd2e568289118131acdc9293fd7bb.jpg', 2),
(135, 54, 'images/products/bicycle/52db0091360414933c5d58290d17657b.jpg', 3),
(136, 54, 'images/products/bicycle/406ce6926dd488a1841f722c0e0f924c.jpg', 4),
(137, 54, 'images/products/bicycle/b8b537b11dcd89ea5edbf10b807208fb.jpg', 2),
(138, 55, 'images/products/bicycle/84a8b225a27aa1e11cec71981740cf68.jpg', 3),
(139, 55, 'images/products/bicycle/e4c460f8d30d52ff0cb9777560988b5f.jpg', 4),
(140, 55, 'images/products/bicycle/8be54e41fa7a50ef755b5d266dd9fce3.jpg', 2),
(141, 56, 'images/products/bicycle/46806085eddf3da33a575d8f051cf071.jpg', 3),
(142, 56, 'images/products/bicycle/9a16bd78b59a2d3b65d7c2bcd769fa39.jpg', 4),
(143, 56, 'images/products/bicycle/da376f413f181fa732f8f7e0a2473986.jpg', 2),
(144, 57, 'images/products/bicycle/06c73cc9415b0a872b3d12147a8a33d4.jpg', 3),
(145, 57, 'images/products/bicycle/b9a37189c64ae719c3d438b7c91ce205.jpg', 4),
(146, 57, 'images/products/bicycle/9856971670ccdc32caf48090e61ca453.jpg', 2),
(147, 58, 'images/products/bicycle/00ca2d84d5fad6656247cb613758f2f7.jpg', 3),
(148, 58, 'images/products/bicycle/99d5ea4a77041c09de335963dde0ad4d.jpg', 4),
(149, 58, 'images/products/bicycle/dc0885924d7dd67fe8297f4e315d26ab.jpg', 2),
(150, 59, 'images/products/bicycle/0263c4b92968197d512189d1a310e9cb.jpg', 3),
(151, 59, 'images/products/bicycle/2dce3dea6215ee8f4b7bb89238df8a18.jpg', 4),
(152, 59, 'images/products/bicycle/4e0a695c2f36c1dd85640fdc8e355e56.jpg', 2),
(153, 60, 'images/products/bicycle/1dc4d75291348d3fd9a55cfb22a918d5.jpg', 3),
(154, 60, 'images/products/bicycle/81418156ad0ee87053ef00073670eee9.jpg', 4),
(155, 60, 'images/products/bicycle/c0996e2a276ffa894744c49eddbebef8.jpg', 2),
(156, 61, 'images/products/bicycle/674b6b3f34980d8ef63a8fdc19695ac3.jpg', 3),
(157, 61, 'images/products/bicycle/ab1b5742b07146bd4c53c3cf7e7f11d9.jpg', 4),
(158, 61, 'images/products/bicycle/b2fd4bba1b96da22b9a65505fdc9a7b3.jpg', 2),
(159, 62, 'images/products/bicycle/2ee54b90301c6cdad85b761a1e8a6070.jpg', 3),
(160, 62, 'images/products/bicycle/10507b33ba8e4254528ccd8475aab1f6.jpg', 4),
(161, 62, 'images/products/bicycle/71fbf3e2c1bfea6a566725c0463ae6b5.jpg', 2),
(162, 63, 'images/products/bicycle/fb7cbdf774345e738977599bcc663415.jpg', 3),
(163, 63, 'images/products/bicycle/54cdaad07274174cfb435ae39d817994.jpg', 4),
(164, 63, 'images/products/bicycle/f677be38b18f728a1c2b5bcacc54bd5b.jpg', 2),
(165, 64, 'images/products/bicycle/6234a3830f32d683c058b175bc830753.jpg', 3),
(166, 64, 'images/products/bicycle/94707404e9ca0dedd9ce33720effbf6a.jpg', 4),
(167, 64, 'images/products/bicycle/2383815512235deb3afb0e6ef84b9ce5.jpg', 2),
(168, 65, 'images/products/bicycle/2c43693a077757013e67d977bdee1deb.jpg', 3),
(169, 65, 'images/products/bicycle/ffe6095b5b89a7a50b9769f363dfc6a4.jpg', 4),
(170, 65, 'images/products/bicycle/ac1824995c37a1591e1a4bf6acfec4d4.jpg', 2),
(171, 66, 'images/products/bicycle/4c7b669575fcf8598c7379f1b1c8b8f6.jpg', 3),
(172, 66, 'images/products/bicycle/f84f3fd83673fe18a0fecfdfe81a8716.jpg', 4),
(173, 66, 'images/products/bicycle/ea8ade9d4ac92f63fd16b9a55bac6cc5.jpg', 2),
(174, 67, 'images/products/bicycle/4e243fe7e13db6a897b2dde53d3032ab.jpg', 3),
(175, 67, 'images/products/bicycle/f4f5857d746e73defdb4bcd269c61007.jpg', 4),
(176, 67, 'images/products/bicycle/afd605d7a6d61e9decb1c437e511421a.jpg', 2),
(177, 68, 'images/products/bicycle/655a80a2e631a673374f89acc52393b0.jpg', 3),
(178, 68, 'images/products/bicycle/88f901c8f2f4be43f972bd7839fb91b0.jpg', 4),
(179, 68, 'images/products/bicycle/4758dbaa1f867a4c2aee9dd9fd6a448a.jpg', 2),
(180, 69, 'images/products/bicycle/9a3787416f99cc1f22a0b6c5784b0de1.jpg', 3),
(181, 69, 'images/products/bicycle/73f4e33a2970fb3c8681d468245c73fc.jpg', 4),
(182, 69, 'images/products/bicycle/fc0e6c1fe5c8d1147ded353b82ed1f25.jpg', 2),
(183, 70, 'images/products/bicycle/c76eef3844290508c0cec37214ad70bf.jpg', 3),
(184, 70, 'images/products/bicycle/aa0c9d453e8065f8daa3000ea1fd9071.jpg', 4),
(185, 70, 'images/products/bicycle/6a493c38e4fd132c86b3c6948f8451f7.jpg', 2),
(186, 71, 'images/products/bicycle/a0ce569ede3e073494a718136740f45f.jpg', 3),
(187, 71, 'images/products/bicycle/fa7197672a70e9960f87ff66e82ac581.jpg', 4),
(188, 71, 'images/products/bicycle/7c761ee5f345fb36ebabb3f3d984fa2b.jpg', 2),
(189, 72, 'images/products/bicycle/58542b36985f308223cfcc996d8c50e0.jpg', 3),
(190, 72, 'images/products/bicycle/ff51127831f0d4be5518457652d1faed.jpg', 4),
(191, 72, 'images/products/bicycle/04ef78b6c2fa0d6c48f5b66285120522.jpg', 2),
(196, 74, 'images/products/equipment/a730eb6a0bcbb59cca15cc7e6589f879.jpg', 3),
(197, 74, 'images/products/equipment/0afcbcb38054f1aee9fe3c6a9a60f754.jpg', 4),
(198, 74, 'images/products/equipment/e3d794262d60cf7ec2328822796cd2a7.jpg', 2),
(200, 75, 'images/products/bicycle/2f07e3c0a9769623857a8996804b21a8.jpg', 3),
(201, 75, 'images/products/bicycle/a35cc34c6866f6ceb7af592968c802be.jpg', 4),
(202, 75, 'images/products/bicycle/2b701030679871261895f3b4c254a1b2.jpg', 2),
(203, 75, 'images/products/bicycle/12ac4179622f792de241e31f150d3d1f.jpg', 1),
(204, 76, 'images/products/bicycle/d6e0d0f178f027210cc0d766b6e9c39f.jpg', 3),
(205, 76, 'images/products/bicycle/9a6973975b1fb74ac3d4957db225a7e3.jpg', 4),
(206, 76, 'images/products/bicycle/c80af91f040a04f807e621346d8f026c.jpg', 2),
(207, 76, 'images/products/bicycle/65b322dc0177f26dd8111a025a798163.jpg', 1),
(208, 77, 'images/products/bicycle/50fc8f036dd6973627ae99d459cefad8.jpg', 3),
(209, 77, 'images/products/bicycle/0ac612d8c6429560b4988a3218b8af79.jpg', 4),
(210, 77, 'images/products/bicycle/1c2564a238c9200c00d07fb79533acf5.jpg', 2),
(211, 77, 'images/products/bicycle/62814bbdb6aedca11c9147cd9738f5f8.jpg', 1),
(213, 74, 'images/products/equipment/b1d62e287d6b7e2547dfd89d9e402e6c.jpg', 1),
(214, 78, 'images/products/accessory/16291f4101848dbc80232b07766a54bb.jpg', 3),
(215, 78, 'images/products/accessory/9acd129d06a4daf5e582110f5253f25f.jpg', 4),
(216, 78, 'images/products/accessory/8c702bf3bf7d5d903931d65335762d59.jpg', 2),
(217, 78, 'images/products/accessory/cee08f22179d678d5c9e6c3f2289355d.jpg', 1),
(218, 35, 'images/products/bicycle/10795be209eaaa8fd6a4364a8b3aefa3.jpg', 1),
(219, 36, 'images/products/bicycle/546a36ff966fde69bafb6d37234f3d68.jpg', 1),
(220, 37, 'images/products/bicycle/70f25ed94a7cd30084e5ebb39d961a79.jpg', 1),
(221, 38, 'images/products/bicycle/244a64677026d800c7aeea9e60d51ce8.jpg', 1),
(222, 41, 'images/products/bicycle/62f28fd21bbd3aba28943da31dd5a588.jpg', 1),
(223, 42, 'images/products/bicycle/a2c374320d26a12f0b7c89b6126cb50f.jpg', 1),
(224, 39, 'images/products/bicycle/1528d7f3939be83fa74503b516eb1e34.jpg', 1),
(225, 40, 'images/products/bicycle/7f84d8d7967d542ecd619048a196d9a5.jpg', 1),
(226, 79, 'images/products/accessory/23cceea96cd6fd422876d77e9b6b7b15.jpg', 3),
(227, 79, 'images/products/accessory/164d4a5edad1fdcbbef157914166d4be.jpg', 4),
(228, 79, 'images/products/accessory/d50ce7ffecd0ff956382f932bbf747d4.jpg', 2),
(229, 79, 'images/products/accessory/22d6201a524a1e0df33ba4d62e2a9207.jpg', 1),
(230, 80, 'images/products/equipment/85dbc8e25d878b21f69605c5f2cf9d76.jpg', 3),
(231, 80, 'images/products/equipment/92093bb270a30c9a330497ac2a970a89.jpg', 4),
(232, 80, 'images/products/equipment/9ff5c05c4be93342b5909ea677480103.jpg', 2),
(233, 80, 'images/products/equipment/89730162e7f8ec3cec05e4a5d5f7ab54.jpg', 1),
(234, 81, 'images/products/equipment/8a6db256e04f245c05b3df39797d24d7.jpg', 3),
(235, 81, 'images/products/equipment/3c5e79ca1aaacc9281c68ed2dc03b625.jpg', 4),
(236, 81, 'images/products/equipment/3aa4e860b6c6bc7b56665f816b5afae4.jpg', 2),
(237, 81, 'images/products/equipment/56a54de1240cb3cea07bb00b71d4b777.jpg', 1),
(286, 94, 'images/products/equipment/c7872f0204d3bb5d550c78b1d4c7ecc4.jpg', 3),
(287, 94, 'images/products/equipment/f367f0ad01dc8676ff1f90bba81e7d40.jpg', 4),
(288, 94, 'images/products/equipment/5698c49fadc158bddbeaf810123bfd93.jpg', 2),
(289, 94, 'images/products/equipment/d0ad26916d50c3283b21ea5372d081e7.jpg', 1),
(290, 95, 'images/products/equipment/74de271a76ad53345436055ed3011ab7.jpg', 3),
(291, 95, 'images/products/equipment/cce18791a2afeee465736914eba55270.jpg', 4),
(292, 95, 'images/products/equipment/e28fb31ed069c0cac12f454d59a7a7fa.jpg', 2),
(293, 95, 'images/products/equipment/ef85812e33551337976f662bf567b41a.jpg', 1),
(294, 96, 'images/products/equipment/f24644fafc4b8e6150258e3a84f4e79d.jpg', 3),
(295, 96, 'images/products/equipment/4aee8e02ed60a7ff45bef396fae6ba41.jpg', 4),
(296, 96, 'images/products/equipment/63be68c145ab1d256432c804cd7c0f3f.jpg', 2),
(297, 96, 'images/products/equipment/524c05b5d2987f23f7b2f1a235d1e83a.jpg', 1),
(298, 97, 'images/products/equipment/1291918b561af3413a68c00033358529.jpg', 3),
(299, 97, 'images/products/equipment/0e070f49de3abe3091677b6e1eda40aa.jpg', 4),
(300, 97, 'images/products/equipment/7fb271af14ad45192fb62533a4feffb1.jpg', 2),
(301, 97, 'images/products/equipment/358893eb6498e47b4a6e30d64d5d1f90.jpg', 1),
(302, 98, 'images/products/equipment/f0eed3b6fc369d826ed9439e1659ccef.jpg', 3),
(303, 98, 'images/products/equipment/e156b610893c013c9bb221b82e315b6f.jpg', 4),
(304, 98, 'images/products/equipment/899a6fbd1e55983ee1e205055c315890.jpg', 2),
(305, 98, 'images/products/equipment/beb2122e25c18880c498906e12444684.jpg', 1),
(306, 99, 'images/products/equipment/af9e39034cd5c6bd26dac390a408547c.jpg', 3),
(307, 99, 'images/products/equipment/5ee7cbb14a9a86ead7044e213c415a74.jpg', 4),
(308, 99, 'images/products/equipment/e65240f29129cdb340c902cce52ac038.jpg', 2),
(309, 99, 'images/products/equipment/bb6bf9d1747596d1812e8f8ad356954f.jpg', 1),
(310, 100, 'images/products/equipment/538f199257b2f8b07d9d37ee2fa0bef1.jpg', 3),
(311, 100, 'images/products/equipment/3e7c0d680058bcd3b03f312192b8708f.jpg', 4),
(312, 100, 'images/products/equipment/9902a598c43d132092959252af8f0e11.jpg', 2),
(313, 100, 'images/products/equipment/19f470092b7c7008207424fd3cdded68.jpg', 1),
(314, 101, 'images/products/equipment/d934b311539cccb670981e35f47c96ca.jpg', 3),
(315, 101, 'images/products/equipment/da3ac56648ff1ee96b550bf05ddcfcd2.jpg', 4),
(316, 101, 'images/products/equipment/427b76f96d26b2732645119921cf96d2.jpg', 2),
(317, 101, 'images/products/equipment/bc2da4a06be44bce348552ae00d28dc7.jpg', 1),
(318, 102, 'images/products/equipment/9e14a727773479df61b21fa029036433.jpg', 3),
(319, 102, 'images/products/equipment/d7cbd7330452146e67f0f2fdea86b100.jpg', 4),
(320, 102, 'images/products/equipment/b0a83a4ae4ef261665510c198b824773.jpg', 2),
(321, 102, 'images/products/equipment/18de08745565f9c69096bbeb41fa4886.jpg', 1),
(322, 103, 'images/products/equipment/4450496ac434114803332aa2b5b5499a.jpg', 3),
(323, 103, 'images/products/equipment/a2f73d3955551390ddd37dc1afa5bfe7.jpg', 4),
(324, 103, 'images/products/equipment/efa0d7f61ffa92f9fee11fd3786d5b2b.jpg', 2),
(325, 103, 'images/products/equipment/aff33cfef7192c40aefd9409dc3436b2.jpg', 1),
(326, 104, 'images/products/equipment/942f6673ff74b08618998e6b8743b682.jpg', 3),
(327, 104, 'images/products/equipment/191b9e8cf449c6633d854b039f124a1e.jpg', 4),
(328, 104, 'images/products/equipment/905763488689ce2731f1c083a30567c9.jpg', 2),
(329, 104, 'images/products/equipment/9d87f4d474576810f5a7a98aa7b310b3.jpg', 1),
(330, 105, 'images/products/equipment/ad2bf05be5d46842ab4056e6f21fb285.jpg', 3),
(331, 105, 'images/products/equipment/086944b6d11ab1e97c76a03457021db4.jpg', 4),
(332, 105, 'images/products/equipment/df3660d1d13a5098d217d020583f66c5.jpg', 2),
(333, 105, 'images/products/equipment/4a653357ec52d44a613e041481397373.jpg', 1),
(334, 106, 'images/products/equipment/afae21f03cefcb40e4d445483907dc92.jpg', 3),
(335, 106, 'images/products/equipment/1e9f175ac13e3e08f14d8c8e9da9a89e.jpg', 4),
(336, 106, 'images/products/equipment/c2ee3c014ca52e63358c1d7d39fc162d.jpg', 2),
(337, 106, 'images/products/equipment/6a0b59147d9a77a139c5ee313ab82e49.jpg', 1),
(338, 107, 'images/products/equipment/1d556c9771bfbe6935817762d9887fd2.jpg', 3),
(339, 107, 'images/products/equipment/780db0207b7d78fab81c32f25cc7a1c2.jpg', 4),
(340, 107, 'images/products/equipment/cfa0a8e2a0863e4dd01b8761ab44d3be.jpg', 2),
(341, 107, 'images/products/equipment/27146d2eece119513ba65cba3d644633.jpg', 1),
(342, 108, 'images/products/equipment/fa72c7a183a9505de8d9515b98e0e976.jpg', 3),
(343, 108, 'images/products/equipment/8644b7d229820e8e2326dc3a7e39c58b.jpg', 4),
(344, 108, 'images/products/equipment/0de446b2b9b6d6dfc9ab622d25135eb9.jpg', 2),
(345, 108, 'images/products/equipment/5d71dfaac50fa20f30da15d10b8d7984.jpg', 1),
(346, 109, 'images/products/equipment/4df1ca560fca8a693332b48d46329987.jpg', 3),
(347, 109, 'images/products/equipment/f1803e91499c4957c7132edbfafeb3ab.jpg', 4),
(348, 109, 'images/products/equipment/f4e393f2f8fe9ab1cebefe8ac7d167c0.jpg', 2),
(349, 109, 'images/products/equipment/5a9170e904a29918182b80d55e069631.jpg', 1),
(350, 110, 'images/products/equipment/b0d7297598736ac09789d1397081e885.jpg', 3),
(351, 110, 'images/products/equipment/d9a8e2d3ae8d0a707c71d78ca01c857d.jpg', 4),
(352, 110, 'images/products/equipment/f7f90e622987a8f6b3b4197b8d8d47f6.jpg', 2),
(353, 110, 'images/products/equipment/61b2b89087b73e456f82cc1ab2a31220.jpg', 1),
(354, 111, 'images/products/equipment/865cd0f9e0f5b5a3843d50788e4e415f.jpg', 3),
(355, 111, 'images/products/equipment/670c20bb916f7969ed207ad01890e2f6.jpg', 4),
(356, 111, 'images/products/equipment/ad8555e101f2153492b089288aac5aca.jpg', 2),
(357, 111, 'images/products/equipment/8be3d0d54a9fb439842eabd049bd2314.jpg', 1),
(358, 112, 'images/products/equipment/a3481a0eb0fb123de547d8f4cd5c961f.jpg', 3),
(359, 112, 'images/products/equipment/15d271567b15afaf6fc8aecfb910725d.jpg', 4),
(360, 112, 'images/products/equipment/5a543e9478490ebe7050922d19d79348.jpg', 2),
(361, 112, 'images/products/equipment/b33b592c7ceedca20886ef08cf6f7ed4.jpg', 1),
(362, 113, 'images/products/equipment/992de455a15af26c492b0f1b18100969.jpg', 3),
(363, 113, 'images/products/equipment/c8dd6b83acc07bcb26c96341c62e4add.jpg', 4),
(364, 113, 'images/products/equipment/6953e91b418bdf118b708695e745eea5.jpg', 2),
(365, 113, 'images/products/equipment/186954b7d616862f229d03cbb953dbcf.jpg', 1),
(366, 114, 'images/products/equipment/248aa00443fcda808fa0c1fa545c3283.jpg', 3),
(367, 114, 'images/products/equipment/b1a538d25cc6a5be14ad730037868f09.jpg', 4),
(368, 114, 'images/products/equipment/33f2ebbb54185dc170ce8b365803269f.jpg', 2),
(369, 114, 'images/products/equipment/e200fdfac6ef30e8f3ffb7de6d314c64.jpg', 1),
(370, 115, 'images/products/equipment/5f73f1632eb3e603456ed906d4282f5b.jpg', 3),
(371, 115, 'images/products/equipment/597e76a29d91aab61761b655f832361d.jpg', 4),
(372, 115, 'images/products/equipment/c03a0a27571957b7a9a7718453da2566.jpg', 2),
(373, 115, 'images/products/equipment/96915e1bbab9f682bb7f6d03020bb29b.jpg', 1),
(374, 116, 'images/products/equipment/5329402b556dc929619b5a07a70006d6.jpg', 3),
(375, 116, 'images/products/equipment/bf5485bf330315d4ad323001a40d76af.jpg', 4),
(376, 116, 'images/products/equipment/bffb5e3377ed4bcb27106a6ccb4d6a35.jpg', 2),
(377, 116, 'images/products/equipment/960f640cdc10ef3ff6ad8cd317308bd4.jpg', 1),
(378, 117, 'images/products/equipment/f3973759885a2e96c8973bfc635279a2.jpg', 3),
(379, 117, 'images/products/equipment/44ea567e9f2e3245a5f41e55adbcd609.jpg', 4),
(380, 117, 'images/products/equipment/7250e62a9659b37c340ea01a8096ac59.jpg', 2),
(381, 117, 'images/products/equipment/faee6d9985f1ba29368c8f51201693c5.jpg', 1),
(382, 118, 'images/products/equipment/e650880089185275fd35d956693209d3.jpg', 3),
(383, 118, 'images/products/equipment/77968eeb4cecd0ed6bcbbdeeee225492.jpg', 4),
(384, 118, 'images/products/equipment/ea205bdfa6ca88e52f65dbae87ee68f5.jpg', 2),
(385, 118, 'images/products/equipment/334dd04d2ae772cd9939ec9494b3d84d.jpg', 1),
(386, 119, 'images/products/equipment/6a368176e529b216efeae167167df0a8.jpg', 3),
(387, 119, 'images/products/equipment/5cfd5a5456356a3489c88f26aa5e514f.jpg', 4),
(388, 119, 'images/products/equipment/568fe876c387c3f020ebdf9d9b3b1394.jpg', 2),
(389, 119, 'images/products/equipment/5f6cd45e3a34480312e0ecfea2bc3e45.jpg', 1),
(390, 120, 'images/products/equipment/4bfa0697bc70154e02619eb3af0a1393.jpg', 3),
(391, 120, 'images/products/equipment/72a6fe2dd1c9dbac2c7bdc00b09d9fc1.jpg', 4),
(392, 120, 'images/products/equipment/aa71e8aab2025a45558d837f2be8f025.jpg', 2),
(393, 120, 'images/products/equipment/1cfd2fd2eb3d24c386bd08391a69cbc4.jpg', 1),
(394, 121, 'images/products/equipment/3055e62ae3c7b8d6947376621d927764.jpg', 3),
(395, 121, 'images/products/equipment/197bd5e78a5aaf636fe60aa361eef63e.jpg', 4),
(396, 121, 'images/products/equipment/f17edae489c3eaa1291bd1d47327d4ed.jpg', 2),
(397, 121, 'images/products/equipment/01e016e7ffa092e757dae9595c729f5a.jpg', 1),
(398, 122, 'images/products/equipment/6730c568c1c38f0b3789128ebddeec52.jpg', 3),
(399, 122, 'images/products/equipment/8eb5214854294d75487190466d94632c.jpg', 4),
(400, 122, 'images/products/equipment/c476dd642c4c3f9028d181419792321e.jpg', 2),
(401, 122, 'images/products/equipment/b2d217abaf5d621fdc29588acee66eb3.jpg', 1),
(402, 123, 'images/products/equipment/af1e9f8d40040333c1bbfc6bbc84939b.jpg', 3),
(403, 123, 'images/products/equipment/982a1f3029fe7a45969e92c85e3f2714.jpg', 4),
(404, 123, 'images/products/equipment/71c8157c5cdb0d44a8028d2aba899122.jpg', 2),
(405, 123, 'images/products/equipment/dc63ff0ec9c055ef3ea028f10c65ea8d.jpg', 1),
(406, 124, 'images/products/equipment/06905b4ba76a384f141c2c2b2d518aa2.jpg', 3),
(407, 124, 'images/products/equipment/f3869e361593834e40d971c60dfb0af7.jpg', 4),
(408, 124, 'images/products/equipment/192301834f4fc5e80c43303da1ed95dd.jpg', 2),
(409, 124, 'images/products/equipment/47df7b6be107cc2778bb3b83711469d8.jpg', 1),
(410, 125, 'images/products/equipment/ae3b15aa4003566cb7fcf3914a8c4de4.jpg', 3),
(411, 125, 'images/products/equipment/8d501c22fafd2c058c09020d3bc52358.jpg', 4),
(412, 125, 'images/products/equipment/e0b6e571bd7e73fbe4008fd399c250f7.jpg', 2),
(413, 125, 'images/products/equipment/7a9d19a17530a9b06aab5ea9e6b6aba4.jpg', 1),
(414, 126, 'images/products/equipment/29e23ccc1c2a7aea0c7d99e8e8b63fd7.jpg', 3),
(415, 126, 'images/products/equipment/b577aeff2f1f76a11e2fa02f589bd280.jpg', 4),
(416, 126, 'images/products/equipment/a1c821dfac82f1851cd6d95f60b66d1c.jpg', 2),
(417, 126, 'images/products/equipment/869a05b5d24863c8f590fce29a6ba190.jpg', 1),
(418, 127, 'images/products/equipment/c3575355e848cebfcda98563e9e8b7ea.jpg', 3),
(419, 127, 'images/products/equipment/31831b94103d954b4ffd857c2742dba7.jpg', 4),
(420, 127, 'images/products/equipment/291c16fafffa75a0d2127580549d59e5.jpg', 2),
(421, 127, 'images/products/equipment/b68e5295346157814d5300e1de3adb4e.jpg', 1),
(422, 128, 'images/products/equipment/95c009c6b68ad53ca775b681839b5406.jpg', 3),
(423, 128, 'images/products/equipment/ae2ad8a24f36fac48a197fe84678f00f.jpg', 4),
(424, 128, 'images/products/equipment/e4cf325f13c4a5891b1ad323c46487cb.jpg', 2),
(425, 128, 'images/products/equipment/70a460257fd29186956b54729d59f096.jpg', 1),
(426, 129, 'images/products/equipment/968e57002d0ef20acaae400ef1574e17.jpg', 3),
(427, 129, 'images/products/equipment/2e5f5ad5792adfef1ba56cdd2a1ca17b.jpg', 4),
(428, 129, 'images/products/equipment/70c9218b243ddcd0f89424b37a501265.jpg', 2),
(429, 129, 'images/products/equipment/54ab32397b8b34e450eb6cf3024cbaf2.jpg', 1),
(442, 134, 'images/products/equipment/4951cea5b7bee01223cc12504bfee1e2.jpg', 3),
(443, 134, 'images/products/equipment/4099671fdfbe4b0e274957ba14547591.jpg', 4),
(444, 134, 'images/products/equipment/7e6f05349c2faab1e171746584d6f371.jpg', 2),
(445, 134, 'images/products/equipment/8060a077aaff4e229af8d622edb3c6ca.jpg', 1),
(446, 135, 'images/products/equipment/e231daaa3bed92916d9ce6212029f97f.jpg', 3),
(447, 135, 'images/products/equipment/5ceed8ff2db82eba080077c74220be61.jpg', 4),
(448, 135, 'images/products/equipment/586f201e2fc570425025a686187dacd8.jpg', 2),
(449, 135, 'images/products/equipment/ebf0366354a72a3b50071e36bf64e3e4.jpg', 1),
(450, 136, 'images/products/equipment/15e8171924847fa51a2b6dcb3b13d2b4.jpg', 3),
(451, 136, 'images/products/equipment/1dc7af6b315726edd0a36855c8e89528.jpg', 4),
(452, 136, 'images/products/equipment/cdb04c7b2ee90b370f455b25a0672235.jpg', 2),
(453, 136, 'images/products/equipment/d3497fac50bba419c4155a0d590bf33d.jpg', 1),
(454, 137, 'images/products/equipment/b81e3f13f1410350c2f28ec239e6a308.jpg', 3),
(455, 137, 'images/products/equipment/fe24c33cc10780e2bf698b1b79c6a5e4.jpg', 4),
(456, 137, 'images/products/equipment/90950ccc050b61471811ec7f674d61d0.jpg', 2),
(457, 137, 'images/products/equipment/1441fd6f60d3e41a622fdab3f1e14cc3.jpg', 1),
(486, 157, 'images/products/equipment/d6cb8fc35079847d398d45bb0efb2fab.jpg', 3),
(487, 157, 'images/products/equipment/1df538306784089301408c503db0d381.jpg', 4),
(488, 157, 'images/products/equipment/0fbfc1bed3e66fc2b70eecabda728b2b.jpg', 2),
(489, 157, 'images/products/equipment/7683b07f8e3d65896926457a84d89650.jpg', 1),
(490, 158, 'images/products/equipment/08cb767dc5c6e98bbd03f5696527ddeb.jpg', 3),
(491, 158, 'images/products/equipment/b61a88dc2396a7235513aa733cfe26a6.jpg', 4),
(492, 158, 'images/products/equipment/01483e662dfb0f5e153c2082bd5b8ff3.jpg', 2),
(493, 158, 'images/products/equipment/1d3134fac2640db49625bb31fb8c1924.jpg', 1),
(494, 159, 'images/products/equipment/d95e4816a2f3d816a37808720605e86c.jpg', 3),
(495, 159, 'images/products/equipment/ff05a8054008634ac49172a3ef3b3d04.jpg', 4),
(496, 159, 'images/products/equipment/6a6579381abfe3bddc0cdce2d1aa1a8f.jpg', 2),
(497, 159, 'images/products/equipment/cf9712adf142be7e6c4aee34bb9d6260.jpg', 1),
(498, 167, 'images/products/equipment/82c73f18e8f27960d73800b9b0b5414f.jpg', 3),
(499, 167, 'images/products/equipment/2934ea78b7192cc59ffeb38c9567de80.jpg', 4),
(500, 167, 'images/products/equipment/5520e304cc2294b4712f2382d36763d8.jpg', 2),
(501, 167, 'images/products/equipment/75196f156116babb7c1d8127b0e6530a.jpg', 1),
(502, 173, 'images/products/equipment/03711d99a8d1a5867c4103b4f498f42e.jpg', 3),
(503, 173, 'images/products/equipment/1a0e6bf834c6513d97a05500f87dba16.jpg', 4),
(504, 173, 'images/products/equipment/c43aef7f88c722ab7d564b44ae2fcce4.jpg', 2),
(505, 173, 'images/products/equipment/c90cd25818fb1d6a10ebd7de96495559.jpg', 1),
(506, 175, 'images/products/equipment/9fb71a235688d1e4dd5ce1bfff95320c.JPG', 3),
(507, 175, 'images/products/equipment/706968453f25c3cbb48cd9d4790ef305.JPG', 4),
(508, 175, 'images/products/equipment/caf575ba5178c1588ce692c0fd9d929a.JPG', 2),
(509, 175, 'images/products/equipment/6fef01e1d7eb7436832ef6bd3edd4745.JPG', 1),
(510, 176, 'images/products/equipment/d3f8681bb8d81af8aceaf144130a95f1.jpg', 3),
(511, 176, 'images/products/equipment/d3df92a3b62e6d45ff2793df02cf6131.jpg', 4),
(512, 176, 'images/products/equipment/7921e74672cab9e8759d9e9a569aa02c.jpg', 2),
(513, 176, 'images/products/equipment/d53e0e2964dcaa0811c2b70b800e1ad3.jpg', 1),
(514, 177, 'images/products/equipment/0bff014e0be433dd40937ddcc1c14bbd.jpg', 3),
(515, 177, 'images/products/equipment/37f1123d6eb0f3ca73474e1a23317242.jpg', 4),
(516, 177, 'images/products/equipment/ec4352f685bef1a2eb936b6004cfc9ef.jpg', 2),
(517, 177, 'images/products/equipment/aaa96aa541900faf27ae0ebed19551cf.jpg', 1),
(518, 178, 'images/products/equipment/82b5a8c97cf059738fd9f7a46ae1c9f1.jpg', 3),
(519, 178, 'images/products/equipment/0f75db9cecc6c0ed990c286603daacf3.jpg', 4),
(520, 178, 'images/products/equipment/f7886d18af3c6c3d1a0de4393cc24844.jpg', 2),
(521, 178, 'images/products/equipment/b61b160ea9e703ad3213549f9d1b98a1.jpg', 1),
(522, 179, 'images/products/accessory/7d0a2b8e0fe2d8076b6425869adfc459.jpg', 3),
(523, 179, 'images/products/accessory/fda8af8492016313f824e53c8f355a9e.jpg', 4),
(524, 179, 'images/products/accessory/345e8be5d530b3bf60d8c7277da52524.jpg', 2),
(525, 179, 'images/products/accessory/3c5f4cdb76c63311a66fc1efd20137c0.jpg', 1),
(526, 180, 'images/products/bicycle/6e10632b53a78744e80edeba11123fbb.jpg', 3),
(527, 180, 'images/products/bicycle/97624937e8d3089ba99c774b0e0d7733.jpg', 4),
(528, 180, 'images/products/bicycle/1544381d86d122dba1df1acea870237b.jpg', 2),
(529, 180, 'images/products/bicycle/5fe6ed95c36c142eadf601ab08cca8f2.jpg', 1),
(530, 181, 'images/products/bicycle/b58e01e80cd137c12a94aec64b6956e8.jpg', 3),
(531, 181, 'images/products/bicycle/3a50c07cacd88eabca83765b367b16f0.jpg', 4),
(532, 181, 'images/products/bicycle/0bfa8f92ec622ea617d9f988d4f301ed.jpg', 2),
(533, 181, 'images/products/bicycle/1aa80bb7bd665fea2599302f2e54f0a0.jpg', 1),
(534, 182, 'images/products/bicycle/80fd83b7c1566b75600c134162272b76.jpg', 3),
(535, 182, 'images/products/bicycle/bba0ecfb49e1bf548174cd16d4e0d7e5.jpg', 4),
(536, 182, 'images/products/bicycle/2958a813b9f3b0e72c596457c7a363f7.jpg', 2),
(537, 182, 'images/products/bicycle/277ca26bfcdcd961a7c4109703d32ff5.jpg', 1),
(562, 189, 'images/products/bicycle/fb479f9516f9d9d37bbdf84913ba94d9.jpg', 3),
(563, 189, 'images/products/bicycle/f17d4d909a4084c16dc1c8b541ecbef3.jpg', 4),
(564, 189, 'images/products/bicycle/2ccd5bfcbbc2f9600985421bb60fc45c.jpg', 2),
(565, 189, 'images/products/bicycle/83928bcb76623297f2f7838af609d784.jpg', 1),
(566, 190, 'images/products/bicycle/20fa2bafd64188f267fee05fce454b07.jpg', 3),
(567, 190, 'images/products/bicycle/de027de16ef4c8848f616386b6bcff48.jpg', 4),
(568, 190, 'images/products/bicycle/e2f4289f6086484e880a657fe4405f2c.jpg', 2),
(569, 190, 'images/products/bicycle/0b823440b4648d6fb0947df2061a2005.jpg', 1),
(570, 191, 'images/products/bicycle/339642ab52202e3f13902c33b582ba0b.jpg', 3),
(571, 191, 'images/products/bicycle/04ccd74609fa1d52c93c2ddc334e14b8.jpg', 4),
(572, 191, 'images/products/bicycle/0089146c6cfb2b2f427df02732052931.jpg', 2),
(573, 191, 'images/products/bicycle/f426bf42af9f54e31236f4814c15d876.jpg', 1),
(574, 192, 'images/products/bicycle/d99b3f15ac51d60118d6b18fd9b2a8ec.jpg', 3),
(575, 192, 'images/products/bicycle/c969443423a81439b47155f7a82e9791.jpg', 4),
(576, 192, 'images/products/bicycle/b56c651724f0b7dd419f5c40171af7df.jpg', 2),
(577, 192, 'images/products/bicycle/682d79d0ac1a1835260f9c0fff39f416.jpg', 1),
(578, 193, 'images/products/bicycle/82fd4462894cb663eb04fa7d464f4d86.jpg', 3),
(579, 193, 'images/products/bicycle/01c8c1fb53617216db895590b0482650.jpg', 4),
(580, 193, 'images/products/bicycle/1d854bea34884645e7d41261852c4894.jpg', 2),
(581, 193, 'images/products/bicycle/53e351f1fad71eefbfb0d2abe9ed2382.jpg', 1),
(582, 194, 'images/products/bicycle/ca3473cef98416a0588dfba243337c35.jpg', 3),
(583, 194, 'images/products/bicycle/d75d1ab60afc10b77fc51cbaf76afae5.jpg', 4),
(584, 194, 'images/products/bicycle/5af4ee99e933b5fb36bbb509533be1f7.jpg', 2),
(585, 194, 'images/products/bicycle/5ac7f73ac8688c3fb73a2c3bfe2f349d.jpg', 1),
(586, 195, 'images/products/bicycle/d8d8439aeb59da205621923a9f96a0cf.jpg', 3),
(587, 195, 'images/products/bicycle/d4ceb0152bb34839e077198513a46eda.jpg', 4),
(588, 195, 'images/products/bicycle/ad4075a77ca225d26aa65d60bf988833.jpg', 2),
(589, 195, 'images/products/bicycle/c020c70311b2d5c5904e873b561029d9.jpg', 1),
(590, 196, 'images/products/bicycle/03f52802db3048b670398daf2cce7fac.jpg', 3),
(591, 196, 'images/products/bicycle/98ec0d4facf57c2774e6f356cb72903b.jpg', 4),
(592, 196, 'images/products/bicycle/e7cd888d32a05c621ca92d9daf17c4da.jpg', 2),
(593, 196, 'images/products/bicycle/15767e539d63bb20c78422f6132d5761.jpg', 1),
(594, 197, 'images/products/bicycle/2fddab8b83269803546dc68d56a126d1.jpg', 3),
(595, 197, 'images/products/bicycle/b3426fc57896847e50d72c98d90540f5.jpg', 4),
(596, 197, 'images/products/bicycle/ecdbb901f74731993dd96b4b7d8b27b9.jpg', 2),
(597, 197, 'images/products/bicycle/7c60ef65e6e91a8ad155b3bf9e35362e.jpg', 1),
(598, 198, 'images/products/bicycle/629eff2d6b953e4be2b60d0ade800669.jpg', 3),
(599, 198, 'images/products/bicycle/7a170dfabbe2e53e01d0ce03f678ad73.jpg', 4),
(600, 198, 'images/products/bicycle/c501ed6dbf7b6c950a97bd808417ec8f.jpg', 2),
(601, 198, 'images/products/bicycle/7a2e51b519a64bf0942535926378e471.jpg', 1),
(602, 199, 'images/products/bicycle/a708bd14f2e70ff9e7191d9378038ce1.jpg', 3),
(603, 199, 'images/products/bicycle/6b5742170d4b4c64d4507b3c16d73d28.jpg', 4),
(604, 199, 'images/products/bicycle/39d9e8241208238fb90c8e0aac424dfe.jpg', 2),
(605, 199, 'images/products/bicycle/fab95109baa349ecafeff1aaf4363ed1.jpg', 1),
(606, 200, 'images/products/bicycle/8004a0d71dcaba7e367d0da9f720dfa6.jpg', 3),
(607, 200, 'images/products/bicycle/95698726d2a71d08caf0675ab225c576.jpg', 4),
(608, 200, 'images/products/bicycle/9b7a9f80ddb26b0720b8deb03a5f51da.jpg', 2),
(609, 200, 'images/products/bicycle/68cc5f189c34e230adad67e182378214.jpg', 1),
(610, 201, 'images/products/bicycle/d5b917d4967295d7ebe0119cd43acf24.jpg', 3),
(611, 201, 'images/products/bicycle/0f85a8e4779635dc648142e839605b6e.jpg', 4),
(612, 201, 'images/products/bicycle/8a094080357093b9a1ecf1ee8f2ffb71.jpg', 2),
(613, 201, 'images/products/bicycle/8ca3cbd0c7fd45ad5a21aee46078d007.jpg', 1),
(614, 202, 'images/products/bicycle/0dce420183ddd75f8c1f58aa60da5fb4.jpg', 3),
(615, 202, 'images/products/bicycle/8ee24035271bd7b2c515f47c5fce50c3.jpg', 4),
(616, 202, 'images/products/bicycle/4c00b7659217a054e20d85f24455f945.jpg', 2),
(617, 202, 'images/products/bicycle/2cdea82f469b0ea2fa8bdb37576731bd.jpg', 1),
(618, 203, 'images/products/bicycle/5c3054011446e320d048767e8b4b0acf.jpg', 3),
(619, 203, 'images/products/bicycle/63f1b1ecd47e7d72412fc78fe9b2fc60.jpg', 4),
(620, 203, 'images/products/bicycle/6c85a5e9f7590b062b966a501c327267.jpg', 2),
(621, 203, 'images/products/bicycle/707e7b39aecd405d62d7d4e127496b3d.jpg', 1),
(622, 204, 'images/products/bicycle/91be71ab212c015f3318d5a77ac3e460.jpg', 3),
(623, 204, 'images/products/bicycle/fd66cdbd90d7a4a3a9277f986cdc7f4d.jpg', 4),
(624, 204, 'images/products/bicycle/227cca7a5758e77dd55996ebb0b2bb97.jpg', 2),
(625, 204, 'images/products/bicycle/a7cc282bad5529e9a19b0390e5265e11.jpg', 1),
(626, 205, 'images/products/bicycle/7f3ac2fee2b866cd2698119370b1efe3.jpg', 3),
(627, 205, 'images/products/bicycle/33645a123516f060ad7626a28fd00243.jpg', 4),
(628, 205, 'images/products/bicycle/44b1401d75a43af76f769f76d49fc17a.jpg', 2),
(629, 205, 'images/products/bicycle/f11816ffb07fde2faf8e4f966e956e8a.jpg', 1),
(630, 206, 'images/products/bicycle/579cc04b649951c0104c8904dfa2eb3d.jpg', 3),
(631, 206, 'images/products/bicycle/158ce51564846eae7f83e4c339f65da6.jpg', 4),
(632, 206, 'images/products/bicycle/2be2e2e2a202d2c7ccb79fc481a1a761.jpg', 2),
(633, 206, 'images/products/bicycle/313d58529a0bbc087e955d0310ebfa2f.jpg', 1),
(634, 207, 'images/products/bicycle/41d27976c042232e1c88d3aab2852d81.jpg', 3),
(635, 207, 'images/products/bicycle/808ae9b443f4fb226bad0c90cfd66b34.jpg', 4),
(636, 207, 'images/products/bicycle/75e410dc5b73d59211c40edd1a0a4de2.jpg', 2),
(637, 207, 'images/products/bicycle/da17f596e9e1ef59d9e46bcfb47a4e40.jpg', 1),
(638, 208, 'images/products/bicycle/7601e92600700a5b244021ae7b3f6046.jpg', 3),
(639, 208, 'images/products/bicycle/2db6229c96fdbc84be8125f9f22ca47b.jpg', 4),
(640, 208, 'images/products/bicycle/fbe9d2dbc18285b13594e413121571a7.jpg', 2),
(641, 208, 'images/products/bicycle/ae9137559f2d96ab959da8f659a0b5ac.jpg', 1),
(642, 209, 'images/products/bicycle/b7ab8c87f736df8625fcc50aa36778a3.jpg', 3),
(643, 209, 'images/products/bicycle/7a9a47b5bb8882b43a48b3aeeaea2a83.jpg', 4),
(644, 209, 'images/products/bicycle/0cff39c27659d23a8f1a6bd3a039b880.jpg', 2),
(645, 209, 'images/products/bicycle/70f7fae6563db767f25526e44eaf57db.jpg', 1),
(646, 210, 'images/products/bicycle/664f66f587f9583af342748d17f10222.jpg', 3),
(647, 210, 'images/products/bicycle/2ec2f3c339516dddfe31b8d2e531b7f4.jpg', 4),
(648, 210, 'images/products/bicycle/4a029e3374e058b7a90b451e1f1a62ef.jpg', 2),
(649, 210, 'images/products/bicycle/e982b69fe822e8705ecb43cf344b4f5a.jpg', 1),
(650, 211, 'images/products/bicycle/b2f88ff309e19c3eac9daeb738c26e5d.jpg', 3),
(651, 211, 'images/products/bicycle/01f19008a2487d8afc818110239ded81.jpg', 4),
(652, 211, 'images/products/bicycle/776bf5c5bffe70494884a7590dc82a1b.jpg', 2),
(653, 211, 'images/products/bicycle/5e7a00f8dd19705517973815c239532f.jpg', 1),
(654, 212, 'images/products/bicycle/b545d804296dc588d2692b7782f0d418.jpg', 3),
(655, 212, 'images/products/bicycle/1ae9975a02c5bcb11c6a246b0b8ac141.jpg', 4),
(656, 212, 'images/products/bicycle/081ee12e540d687a5a17c94350e96a64.jpg', 2),
(657, 212, 'images/products/bicycle/1f15bbf3ec5f69fbf102357782e25abe.jpg', 1),
(658, 213, 'images/products/bicycle/14d16d1064e0a3575293f2bb1df86609.jpg', 3),
(659, 213, 'images/products/bicycle/4720ae2a464d2ed2c223cc822b0b9270.jpg', 4),
(660, 213, 'images/products/bicycle/c053f267338054e9aab931a8789cb634.jpg', 2),
(661, 213, 'images/products/bicycle/4d267487851f31345254082b2aed4c07.jpg', 1),
(662, 214, 'images/products/bicycle/9187065c922403929d062f44d936fe0e.jpg', 3),
(663, 214, 'images/products/bicycle/531d61a04eaef8f8956be262d017b7c4.jpg', 4),
(664, 214, 'images/products/bicycle/61322cc159dee7d798874beb5190507f.jpg', 2),
(665, 214, 'images/products/bicycle/62e824b019182f18fcddfa2a3c3e5bce.jpg', 1),
(666, 215, 'images/products/bicycle/97532d3992520196b75629db4dff1ac3.jpg', 3),
(667, 215, 'images/products/bicycle/645db6669f6db10f327f942823072358.jpg', 4),
(668, 215, 'images/products/bicycle/1819d0bf998d23e5b8f28edc9f51e479.jpg', 2),
(669, 215, 'images/products/bicycle/6f40e0ee450e06dee7ae14574fc24ba2.jpg', 1),
(670, 216, 'images/products/bicycle/fad814e6a83a39ab3d2052e588aa70c8.jpg', 3),
(671, 216, 'images/products/bicycle/a1d9b2f4210117ac2f9e0c8ec20d1d60.jpg', 4),
(672, 216, 'images/products/bicycle/2103f5325b744eddb9f303634a2cd804.jpg', 2),
(673, 216, 'images/products/bicycle/d070183c80887241bae3fa03449648af.jpg', 1),
(674, 217, 'images/products/bicycle/1456a2f07336cc972d0d398c09748cac.jpg', 3),
(675, 217, 'images/products/bicycle/a0a205eed93132384d193329b4369623.jpg', 4),
(676, 217, 'images/products/bicycle/6f465c52efb7b2971785e1bba67f475c.jpg', 2),
(677, 217, 'images/products/bicycle/c3c097ca5497bdf1e067482c989cf0ab.jpg', 1),
(678, 218, 'images/products/bicycle/8c53145c6a5ad107ac87e948b69f904b.jpg', 3),
(679, 218, 'images/products/bicycle/9086e7353344bc6378d15714eb414fb3.jpg', 4),
(680, 218, 'images/products/bicycle/0f25ebcebf00fd32f9d874f5da6f35f8.jpg', 2),
(681, 218, 'images/products/bicycle/f01e2d249585fc59b606127ccd51107b.jpg', 1),
(682, 219, 'images/products/bicycle/8b93cf72c28c25c62c504f29b935dcff.jpg', 3),
(683, 219, 'images/products/bicycle/20143bf353f631e3c3f120a4522c79ab.jpg', 4),
(684, 219, 'images/products/bicycle/838da0bbc55c27fc20aa7c55d2b89fab.jpg', 2),
(685, 219, 'images/products/bicycle/25bdd101b78d61942106544f7f853a2c.jpg', 1),
(686, 220, 'images/products/bicycle/e0fd260c044ba874c2e21a9fbbe52dee.jpg', 3),
(687, 220, 'images/products/bicycle/c52893c1dd62c638faed34fcb9cceafa.jpg', 4),
(688, 220, 'images/products/bicycle/2c85d57ccfc478c4f9880d043a8c2ee7.jpg', 2),
(689, 220, 'images/products/bicycle/8893133dcdb514ec49672be541a4ebab.jpg', 1),
(690, 221, 'images/products/bicycle/1da8983f67f2f68d57365e2fc598c917.jpg', 3),
(691, 221, 'images/products/bicycle/d402cbbdb97de2d51044db90181bed83.jpg', 4),
(692, 221, 'images/products/bicycle/5661f1d0c24b0ffabfbd3be4d1a04816.jpg', 2),
(693, 221, 'images/products/bicycle/ec2b7795ae3bed606ea30a46af19edba.jpg', 1),
(694, 222, 'images/products/bicycle/2dd78e17bd17f404680ea2ecb215a36c.jpg', 3),
(695, 222, 'images/products/bicycle/4b42e5493afe73c2df5e4c6fe4fd07dc.jpg', 4),
(696, 222, 'images/products/bicycle/b92821de7385534b0a36ff12ebde09de.jpg', 2),
(697, 222, 'images/products/bicycle/cce484a2e0f7d68134393dd7529b4063.jpg', 1),
(698, 223, 'images/products/bicycle/0a947e8c05adcee9b27bbc642ac4a39e.jpg', 3),
(699, 223, 'images/products/bicycle/483f498a2a7b84c62a16bf0856d095f0.jpg', 4),
(700, 223, 'images/products/bicycle/86e8cdc01f7a4a7c6ab9c55e08ee8f3c.jpg', 2),
(701, 223, 'images/products/bicycle/6c27a35166ed1ac813198a381817bd51.jpg', 1),
(702, 224, 'images/products/bicycle/9e53f66c522e868bb24eb6c9745811ee.jpg', 3),
(703, 224, 'images/products/bicycle/de61142ce32c4c4943850404da54fe8b.jpg', 4),
(704, 224, 'images/products/bicycle/500ef9ba988d737954f9ea8f62804ead.jpg', 2),
(705, 224, 'images/products/bicycle/08ce890799b29361650dab934740285e.jpg', 1),
(706, 225, 'images/products/bicycle/beac964c69782a8d95579fb18f4ba31d.jpg', 3),
(707, 225, 'images/products/bicycle/db886a9c5a9437f3f2a6a16587615123.jpg', 4),
(708, 225, 'images/products/bicycle/64fff889a5baff62df6af4d68ee7b5b3.jpg', 2),
(709, 225, 'images/products/bicycle/46b164f1bb34fa39b896b26f25fbc275.jpg', 1),
(710, 226, 'images/products/bicycle/cefab6da36a2c2309c869a3abdd6d951.jpg', 3),
(711, 226, 'images/products/bicycle/0d660af6708eca93fb0cc9c38be77a6b.jpg', 4),
(712, 226, 'images/products/bicycle/4966c04a7a705695222f693ab25408a1.jpg', 2),
(713, 226, 'images/products/bicycle/b77cf09a42e3f5b412fc3cb999d249a2.jpg', 1),
(714, 227, 'images/products/bicycle/d474e04e0a5ff9982a384c12abcdb128.jpg', 3),
(715, 227, 'images/products/bicycle/0ddf973d0b95d3804d4b58a2d5bc16cf.jpg', 4),
(716, 227, 'images/products/bicycle/5f5f6a8038792e086d3dbf17ba2ac399.jpg', 2),
(717, 227, 'images/products/bicycle/3a7ccecfa55e54cd0d977aa6e4e6bc81.jpg', 1),
(718, 228, 'images/products/bicycle/c5f1e22b5502f45661933ab8bd8a68ef.jpg', 3),
(719, 228, 'images/products/bicycle/f473301b669f44128a26c4fa91d137e4.jpg', 4),
(720, 228, 'images/products/bicycle/cb5a958d2e1f23204d667eb6660b89ff.jpg', 2),
(721, 228, 'images/products/bicycle/e5909afb49b5f92f5d3f24479642782a.jpg', 1),
(722, 229, 'images/products/bicycle/943645d8013ba8314e56f70419636d98.jpg', 3),
(723, 229, 'images/products/bicycle/cb6bca38b3a87d992f2456a0e421a860.jpg', 4),
(724, 229, 'images/products/bicycle/c70de2af85393bc2037cfb919638ec54.jpg', 2),
(725, 229, 'images/products/bicycle/446ab19da0725d1e348500d58dbc4c4a.jpg', 1),
(726, 230, 'images/products/bicycle/c3d960a45945671557934b004b137e77.jpg', 3),
(727, 230, 'images/products/bicycle/60de3bde9f3bbdee88293052b4c03388.jpg', 4),
(728, 230, 'images/products/bicycle/6fae700d083b06f24c1e1b749f21f3a4.jpg', 2),
(729, 230, 'images/products/bicycle/3675fcb8442a26097cd485f2b34be6d5.jpg', 1),
(730, 231, 'images/products/bicycle/bb8afc68b4913dc4007e70697b36902b.jpg', 3),
(731, 231, 'images/products/bicycle/b25e7b5b329484265c4300aff0e1e81b.jpg', 4),
(732, 231, 'images/products/bicycle/6ba7926fbfc7a4e6d168bc6491c0697d.jpg', 2),
(733, 231, 'images/products/bicycle/e560929d35b359cfc1e8f3ba83cfcadd.jpg', 1),
(734, 232, 'images/products/bicycle/d1547b2dc2678663679469e12ced6547.jpg', 3),
(735, 232, 'images/products/bicycle/1077c6f99787ea13b24b347214fd92ab.jpg', 4),
(736, 232, 'images/products/bicycle/caec456ea983ddf9695cd63f5ae0bf77.jpg', 2),
(737, 232, 'images/products/bicycle/3daaedfbdc123f0374006002ea0c7d49.jpg', 1),
(738, 233, 'images/products/bicycle/9dc9d6da96fa0f38ffc3ba2baa916282.jpg', 3),
(739, 233, 'images/products/bicycle/7e43dec391444931241a0b6fc34aeb82.jpg', 4),
(740, 233, 'images/products/bicycle/1e0d843c6778829e03c7d122d6b317e4.jpg', 2),
(741, 233, 'images/products/bicycle/d5cf855a6ff6b7389ff99dc3daef33ab.jpg', 1),
(742, 234, 'images/products/bicycle/71e9ca91023d1a990fc6e5d1cec3bcc4.jpg', 3),
(743, 234, 'images/products/bicycle/8fe3d22ee27f032b86c6700c473d798c.jpg', 4),
(744, 234, 'images/products/bicycle/97ccc8df9333e9aa6bfd5221099d7624.jpg', 2),
(745, 234, 'images/products/bicycle/538f73f45748dcb715a4473d32f07e75.jpg', 1),
(746, 235, 'images/products/bicycle/e248dbbbd1f99b455fb3dfb9a43d9a77.jpg', 3),
(747, 235, 'images/products/bicycle/3f9b205256e879a666a15db99877a00a.jpg', 4),
(748, 235, 'images/products/bicycle/998347f398da84d2f39e92a63fc1da98.jpg', 2),
(749, 235, 'images/products/bicycle/e29900ec5bd2f514c28e87dfbf44aaff.jpg', 1),
(750, 236, 'images/products/bicycle/23c7ac0e84ded78a28c12dbfa7392446.jpg', 3),
(751, 236, 'images/products/bicycle/882590e624eb7df658899fd50274001b.jpg', 4),
(752, 236, 'images/products/bicycle/2c60a805a97537ced24fd1716ee5496e.jpg', 2),
(753, 236, 'images/products/bicycle/c5013a41d4e15744ae8820272311f727.jpg', 1),
(754, 237, 'images/products/bicycle/645b074eeec47046bffc940d546ae5f4.jpg', 3),
(755, 237, 'images/products/bicycle/6f13c6e22d377bbc030cd28e3282cab5.jpg', 4),
(756, 237, 'images/products/bicycle/bf742b3de54655847d6a44a204e411dc.jpg', 2),
(757, 237, 'images/products/bicycle/3f7d78f0ca6d91bdc424748784569d4f.jpg', 1),
(758, 238, 'images/products/bicycle/dbfb7cadd28047e51710039acf08bd01.jpg', 3),
(759, 238, 'images/products/bicycle/fc3270ed37362a93cc83f67773e0f1bf.jpg', 4),
(760, 238, 'images/products/bicycle/f8a9518c64d67e4709d9aa62597fa6be.jpg', 2),
(761, 238, 'images/products/bicycle/48493c8d8dd94dd1175209ee05ebd1b6.jpg', 1),
(762, 239, 'images/products/bicycle/a7980bb62c3ceae4c62c70fae30ce06a.jpg', 3),
(763, 239, 'images/products/bicycle/e087ad43cb2024a4c84b7ea3418f9445.jpg', 4),
(764, 239, 'images/products/bicycle/141c85bb3d42d65c69a4c9bbf1386e6b.jpg', 2),
(765, 239, 'images/products/bicycle/cb89ba60cc48c17a815a5e74d17bc29d.jpg', 1),
(766, 240, 'images/products/bicycle/28720407b525464fe4e77ea97ec2f167.jpg', 3),
(767, 240, 'images/products/bicycle/cc69431d1a4ecca047bd571d2bbf1ab6.jpg', 4),
(768, 240, 'images/products/bicycle/a5ebab77f44e239c0a73f680da0e45e6.jpg', 2),
(769, 240, 'images/products/bicycle/2362d101a5f615af61df1ed1c8feb5fb.jpg', 1),
(770, 241, 'images/products/bicycle/1a7c3260a99ef75b4ea8c08faa7e7c28.jpg', 3),
(771, 241, 'images/products/bicycle/fd6318d88f431693db9bef1271d36a28.jpg', 4),
(772, 241, 'images/products/bicycle/db83d479d60d999661374d8b9d71e6ad.jpg', 2),
(773, 241, 'images/products/bicycle/fc07683eb8f2db091f9fab3abf9fb6a3.jpg', 1),
(774, 242, 'images/products/bicycle/8a91eb611b95fc158dfa3bec8fd4f7b3.jpg', 3),
(775, 242, 'images/products/bicycle/c2a2ee3184f861992992ebe362e47cf9.jpg', 4),
(776, 242, 'images/products/bicycle/6fcf90f6936cb23484a4919e0f34910d.jpg', 2),
(777, 242, 'images/products/bicycle/8ecb02e6204904c80a254da641ce5b2e.jpg', 1),
(778, 243, 'images/products/bicycle/15f97288bdd4b4b43996ecaf7cba145c.jpg', 3),
(779, 243, 'images/products/bicycle/7a85c2d1b4b3c1428ac7ad2db0a173f9.jpg', 4),
(780, 243, 'images/products/bicycle/398026b000e2bdba1da26f2152197cf7.jpg', 2),
(781, 243, 'images/products/bicycle/bdadb8e55b15c41d64843d4f016fa69d.jpg', 1),
(782, 244, 'images/products/bicycle/0700ae5589c89dca565d85527789df5a.jpg', 3),
(783, 244, 'images/products/bicycle/df7bc4f1d98f4c7923e0e8c452333152.jpg', 4),
(784, 244, 'images/products/bicycle/38a310bb0920b6da2bd1e79c28f35b89.jpg', 2),
(785, 244, 'images/products/bicycle/3fa1f7b991c6c13534ef2534ce9904c5.jpg', 1),
(786, 245, 'images/products/bicycle/488cdd8254a1d43906f4c2469f0668de.jpg', 3),
(787, 245, 'images/products/bicycle/9a82a36367f1f57bbdeaf5ddad2b2dda.jpg', 4),
(788, 245, 'images/products/bicycle/17836185715edda24fac905b6ec9fc9c.jpg', 2),
(789, 245, 'images/products/bicycle/8ab0caf5e59cb1b2e5868642d1b0acee.jpg', 1),
(790, 246, 'images/products/bicycle/acaff12bf34042194e8ad79364fe7db5.jpg', 3),
(791, 246, 'images/products/bicycle/eae6e85f183662cdfe93d0a6aaad19bd.jpg', 4),
(792, 246, 'images/products/bicycle/0137c560c1f2bb15f0ac034f273a9fc9.jpg', 2),
(793, 246, 'images/products/bicycle/2a4663bd59eb8b7195c7b284a975bf74.jpg', 1),
(794, 247, 'images/products/bicycle/941db010f12c43c3157df2931ac01996.jpg', 3),
(795, 247, 'images/products/bicycle/2212ab5356fceb9570e599a93f4a49ce.jpg', 4),
(796, 247, 'images/products/bicycle/68d680e5df5a7fbafe52885fd2fb3bea.jpg', 2),
(797, 247, 'images/products/bicycle/8c0b5a8577eb4b58001de31fe476bcd1.jpg', 1),
(798, 248, 'images/products/bicycle/1fb8a315f3cf83f2e8bad6b031c2bef8.jpg', 3),
(799, 248, 'images/products/bicycle/402dcc8cfd0c841a0cb1da36b9dcb92c.jpg', 4),
(800, 248, 'images/products/bicycle/b2ce461faf62207804a474bfa650cb39.jpg', 2),
(801, 248, 'images/products/bicycle/0b0d06e78d8ae8efb65820cf5af791e0.jpg', 1),
(802, 249, 'images/products/bicycle/5514c758d6186487b0af7a182b338127.jpg', 3),
(803, 249, 'images/products/bicycle/663d44848f3223d5c7e130a8d6cdd4b6.jpg', 4),
(804, 249, 'images/products/bicycle/073d8c7da9cab5d40067de932df52d7e.jpg', 2),
(805, 249, 'images/products/bicycle/6a1361e25540c05a23171e700f6fb780.jpg', 1),
(806, 250, 'images/products/bicycle/50440d48562174be7d8b9c362126267a.jpg', 3),
(807, 250, 'images/products/bicycle/6680c42548a1f9420f6935082f212dc7.jpg', 4),
(808, 250, 'images/products/bicycle/c5b4b8cd8ac04288fea69ca9bb8665e3.jpg', 2),
(809, 250, 'images/products/bicycle/e9b78e2dca325418e34424ee193ab5ec.jpg', 1),
(810, 251, 'images/products/bicycle/89228b0f8efef34e7f3f7705a15b16b5.jpg', 3),
(811, 251, 'images/products/bicycle/b969fd374ecef8f770e52a73cc6d8368.jpg', 4),
(812, 251, 'images/products/bicycle/3c9529c7901565e0c11427c8aa65fb78.jpg', 2),
(813, 251, 'images/products/bicycle/4275e495766fc59d08c02f18f98bfeac.jpg', 1),
(814, 252, 'images/products/bicycle/76e341dd5cf70ee245c2af4dacbb3795.jpg', 3),
(815, 252, 'images/products/bicycle/708383ba34ed0396626bf717cc2f64bc.jpg', 4),
(816, 252, 'images/products/bicycle/c1e7713a4f547130f1a715564663491b.jpg', 2),
(817, 252, 'images/products/bicycle/0fca9a7792632c0486030f178a2b5bd4.jpg', 1),
(818, 253, 'images/products/bicycle/f4552397645d6d9600bcf22baa491c48.jpg', 3),
(819, 253, 'images/products/bicycle/79de842f60fef5a6571d00eb83301824.jpg', 4),
(820, 253, 'images/products/bicycle/3a81a81d93dc5055cfe1275e1a0f451c.jpg', 2),
(821, 253, 'images/products/bicycle/2d76136d5482a6adc5b26526b586413b.jpg', 1),
(822, 254, 'images/products/bicycle/d4bbb09e733fcb3d9e89da26011aafac.jpg', 3),
(823, 254, 'images/products/bicycle/b27a8bdd8b151053fa2bac93dd18fa73.jpg', 4),
(824, 254, 'images/products/bicycle/9ec99b07b7addbe5aa81582efa9e5c37.jpg', 2),
(825, 254, 'images/products/bicycle/5a3cdb41e16a4e1dda29b0f3900755c2.jpg', 1),
(826, 255, 'images/products/bicycle/665be6946ce5ec723e763695b8db7cf9.jpg', 3),
(827, 255, 'images/products/bicycle/85036cf25c08f0ca251ec63216c43b88.jpg', 4),
(828, 255, 'images/products/bicycle/02e44908c466801f60f5eee46f37b980.jpg', 2);
INSERT INTO `photo_source` (`id`, `photo_id`, `photo_source_path`, `photo_type_id`) VALUES
(829, 255, 'images/products/bicycle/24984cfc12756a95f1dbb31c26325fad.jpg', 1),
(830, 256, 'images/products/bicycle/c22f167317027916949d478a724bbfac.jpg', 3),
(831, 256, 'images/products/bicycle/33d2d1ccc2259877c73d850b0de384db.jpg', 4),
(832, 256, 'images/products/bicycle/a33ffcfd7acc94cf6198c92679c79232.jpg', 2),
(833, 256, 'images/products/bicycle/6a1a49729ce2fcc190d824c7ddb1bfde.jpg', 1),
(834, 257, 'images/products/bicycle/e5b07299b4b12d03ec34334ae1549fa0.jpg', 3),
(835, 257, 'images/products/bicycle/47b080488e26458fc582318cf96814a5.jpg', 4),
(836, 257, 'images/products/bicycle/e0ef892aafab3acd16bd4ef7b17a1e35.jpg', 2),
(837, 257, 'images/products/bicycle/411e132ccbc95a7432422e401c19b511.jpg', 1),
(838, 258, 'images/products/bicycle/7a50347edfa2a983f7765791c17f1c11.jpg', 3),
(839, 258, 'images/products/bicycle/2344b6e1f0f189ea9ccd3478564cf801.jpg', 4),
(840, 258, 'images/products/bicycle/0b4dafa705a67ab69825bdbcdbe19911.jpg', 2),
(841, 258, 'images/products/bicycle/ca782c1aa63a04ec48825a8fcbe5c9e1.jpg', 1),
(842, 259, 'images/products/bicycle/a89a5dbeef8638bc2b8e9455a7e9d14a.jpg', 3),
(843, 259, 'images/products/bicycle/6710c7422052c2835045b6363126f41c.jpg', 4),
(844, 259, 'images/products/bicycle/f678e0deb78082161c4888d8096f70ce.jpg', 2),
(845, 259, 'images/products/bicycle/a1be47a9db36efe04e5c421c24ff10ad.jpg', 1),
(846, 260, 'images/products/bicycle/e688e72ed41b071f999831918a6a0ed2.jpg', 3),
(847, 260, 'images/products/bicycle/71448019ab3d9023133eb7d71c2324c7.jpg', 4),
(848, 260, 'images/products/bicycle/c6d51072f3db04e90c960f29ed86323e.jpg', 2),
(849, 260, 'images/products/bicycle/b82d50fd1b41e761b3a3d24960b0e972.jpg', 1),
(850, 261, 'images/products/bicycle/57eeaf6f5904e469551c12324d18738f.jpg', 3),
(851, 261, 'images/products/bicycle/a0e09e8952c0733f870bda55d0a0ca0e.jpg', 4),
(852, 261, 'images/products/bicycle/a502bbd013e1eae0d81928ac7da19495.jpg', 2),
(853, 261, 'images/products/bicycle/d9dc5fa5ffdf3f260c8349cc9b26b0f9.jpg', 1),
(854, 262, 'images/products/bicycle/3bb58df7b7f82c3e6c51a1935437c1ca.jpg', 3),
(855, 262, 'images/products/bicycle/e0981881d6f6430fd571511871ddab1a.jpg', 4),
(856, 262, 'images/products/bicycle/e60b9b747a66a66117c9d399e1143133.jpg', 2),
(857, 262, 'images/products/bicycle/037139085082372934f4c1eb9e6a67e9.jpg', 1),
(858, 263, 'images/products/bicycle/a090f29bbc21319218b4acfd556ce499.jpg', 3),
(859, 263, 'images/products/bicycle/a3b6426ff7c2fade132ed19bc5d177d4.jpg', 4),
(860, 263, 'images/products/bicycle/221d528ab5af8c6ce4f4ff7536b9cf9a.jpg', 2),
(861, 263, 'images/products/bicycle/f7f45b1ff40f5a9462242b82959432ee.jpg', 1),
(862, 264, 'images/products/bicycle/4a6a306a29ff7d7cd269371cc15f2d01.jpg', 3),
(863, 264, 'images/products/bicycle/bfd5f16a76b1552b3b367474dedf8508.jpg', 4),
(864, 264, 'images/products/bicycle/7564fd5e8bfd1e6f67a0c8d6c822b765.jpg', 2),
(865, 264, 'images/products/bicycle/489ab91fcebe603d939a3a4f7cae4e5a.jpg', 1),
(866, 265, 'images/products/bicycle/38f83fbc5c5b109fb87343befd0c9727.jpg', 3),
(867, 265, 'images/products/bicycle/2020916166ee42a30ece7fada19ee2ff.jpg', 4),
(868, 265, 'images/products/bicycle/b89cf5a44f896fbe20dc4a9cb6597ad8.jpg', 2),
(869, 265, 'images/products/bicycle/e25c062836dfdc744339d0598dc58f00.jpg', 1),
(870, 266, 'images/products/bicycle/97665f470c3eddf3b7d58fa70d8ee64f.jpg', 3),
(871, 266, 'images/products/bicycle/f82b93c1f0b0525743c5647564311b4b.jpg', 4),
(872, 266, 'images/products/bicycle/ade9cad6e2c4fbf12efc3e635deed39b.jpg', 2),
(873, 266, 'images/products/bicycle/bc0cf6ecbebb6acb1a2ed289eb3a76e4.jpg', 1),
(874, 267, 'images/products/bicycle/4e901605fdc32327c00b3ac0bd446b50.jpg', 3),
(875, 267, 'images/products/bicycle/2c91bd1d7f47f93f3f80d82c59020f8c.jpg', 4),
(876, 267, 'images/products/bicycle/8e646209b699ff9adf8a16e42f641e5b.jpg', 2),
(877, 267, 'images/products/bicycle/d86b6a0e49d44f294319ad241cf453b9.jpg', 1),
(878, 268, 'images/products/bicycle/7ad3df9888d9d0526d17316b551027f5.jpg', 3),
(879, 268, 'images/products/bicycle/2b05b2950ae97c16a11e12c2f02d9a5b.jpg', 4),
(880, 268, 'images/products/bicycle/c4177583fc67ed12020a348a26b87d7d.jpg', 2),
(881, 268, 'images/products/bicycle/058b6c3b26bc4a170b3cb60faa15a7a1.jpg', 1),
(882, 269, 'images/products/bicycle/f967fea52fd88e04b26574fa9818d777.jpg', 3),
(883, 269, 'images/products/bicycle/9cac58ae4279f97ad8d9420da97c9729.jpg', 4),
(884, 269, 'images/products/bicycle/17b9e5b7ef36cfdfad7af560adcdcafe.jpg', 2),
(885, 269, 'images/products/bicycle/7e9686f9bbdd9b6a7ab6781f6eb6ae4f.jpg', 1),
(886, 270, 'images/products/bicycle/e9645271e81104fa6a13606ddaf0002f.jpg', 3),
(887, 270, 'images/products/bicycle/f070fafd06e8a5f577a0275074195940.jpg', 4),
(888, 270, 'images/products/bicycle/cfed10a8c1ef8ca686b07cb21b393362.jpg', 2),
(889, 270, 'images/products/bicycle/9ac659221e9ef36680e617ecdbc816cb.jpg', 1),
(890, 271, 'images/products/bicycle/742e5107395f0150efa2a87f117aeff4.jpg', 3),
(891, 271, 'images/products/bicycle/2ce66ce9d2a1dfd151831e801e4bb162.jpg', 4),
(892, 271, 'images/products/bicycle/5e5b2c721bb92f877e08f0ae3c74d8f4.jpg', 2),
(893, 271, 'images/products/bicycle/cd6a0ce7364a09a41e701f173f906253.jpg', 1),
(894, 272, 'images/products/bicycle/5eaade717d04b3884820b7e1c24407dd.jpg', 3),
(895, 272, 'images/products/bicycle/006e99a1249191460270c85e15a46ef7.jpg', 4),
(896, 272, 'images/products/bicycle/8d3317b16e6babd726ff1e6498cfb8aa.jpg', 2),
(897, 272, 'images/products/bicycle/7edc03cc6f4dcb8206f704e632f97758.jpg', 1),
(898, 273, 'images/products/bicycle/fafc43d4a96b0dae76e9001729c360e7.jpg', 3),
(899, 273, 'images/products/bicycle/8e6238040033efadc102f933a710f124.jpg', 4),
(900, 273, 'images/products/bicycle/4c12db29a424b1cabbc0442f499a6c83.jpg', 2),
(901, 273, 'images/products/bicycle/26720f2c841d3556577745f101163e37.jpg', 1),
(902, 274, 'images/products/bicycle/ddcf3dc18d7fc599b2f26f08720ff97e.jpg', 3),
(903, 274, 'images/products/bicycle/3496a5e344fe2d36a8faa3a368cc08b3.jpg', 4),
(904, 274, 'images/products/bicycle/b24367f77de6f03015e57e5d65777df2.jpg', 2),
(905, 274, 'images/products/bicycle/c77c5d617137e0f2ec1b4bada1abbc88.jpg', 1),
(906, 275, 'images/products/bicycle/6ead0a2269dc64ac39026d535f1dc91d.jpg', 3),
(907, 275, 'images/products/bicycle/62664d32d917c9f859beb7719f14331f.jpg', 4),
(908, 275, 'images/products/bicycle/002ab7de2db64cf4deb094180eeea644.jpg', 2),
(909, 275, 'images/products/bicycle/8b8873facbac9ea0c0079575814258a5.jpg', 1),
(910, 276, 'images/products/bicycle/b3e5218f0b1e7c9fe68fe1dafb7d4c37.jpg', 3),
(911, 276, 'images/products/bicycle/564d791ac1221512552f385a0090d5b9.jpg', 4),
(912, 276, 'images/products/bicycle/6fd434e6450060ac4342d648e284d99c.jpg', 2),
(913, 276, 'images/products/bicycle/49fb39d8847ebf46663f137253f82f32.jpg', 1),
(914, 277, 'images/products/bicycle/a175c06bdf87790e6725c47334f643be.jpg', 3),
(915, 277, 'images/products/bicycle/2758c4b2f373e9fa67cdf121da91762b.jpg', 4),
(916, 277, 'images/products/bicycle/97e59ee5f18e0c4000008480d37acdeb.jpg', 2),
(917, 277, 'images/products/bicycle/b185cb06cc5e18b1e90cf9942b4549ad.jpg', 1),
(918, 278, 'images/products/bicycle/e2efedf4d4c14a5df90b511f4f1c8a1d.jpg', 3),
(919, 278, 'images/products/bicycle/052c9be42ec5d5356dfb1c62b29b1c1f.jpg', 4),
(920, 278, 'images/products/bicycle/02c726c699126c6a32e646243acba49d.jpg', 2),
(921, 278, 'images/products/bicycle/93c611ef268ac1a27392e132f51a8da5.jpg', 1),
(922, 279, 'images/products/bicycle/7896e7a6b0f5e1769879999520e052bf.jpg', 3),
(923, 279, 'images/products/bicycle/3006a0b54d325d2550223c242892f51b.jpg', 4),
(924, 279, 'images/products/bicycle/4b79a13561650c8e3bbb715fa3d6545d.jpg', 2),
(925, 279, 'images/products/bicycle/ca7a8a39e1a674422a67563cf312afdf.jpg', 1),
(926, 280, 'images/products/bicycle/be02b32daa21ccf4caac0980ec9ab749.jpg', 3),
(927, 280, 'images/products/bicycle/67f85d333a297a211ed3fbc6294b7fdd.jpg', 4),
(928, 280, 'images/products/bicycle/64201f4b99f2638850fb4c7b9316f5a7.jpg', 2),
(929, 280, 'images/products/bicycle/586654759f0fdcfe3f17408ad9dd8f99.jpg', 1),
(930, 281, 'images/products/bicycle/f249947aac97341208a542237414bba4.jpg', 3),
(931, 281, 'images/products/bicycle/a26192d12935b496246ff26b18647c8e.jpg', 4),
(932, 281, 'images/products/bicycle/944c7a9db0783e146e8b6da776f55c0d.jpg', 2),
(933, 281, 'images/products/bicycle/a4f9e780f149d5e9d4aa1b422051a278.jpg', 1),
(934, 282, 'images/products/bicycle/3dc7ed74f0f688cf3c840f6d457cffaf.jpg', 3),
(935, 282, 'images/products/bicycle/a1b183be00d8e3462827cdcb20609eb8.jpg', 4),
(936, 282, 'images/products/bicycle/bd7672063a1f6136d214f7f7328c0f9a.jpg', 2),
(937, 282, 'images/products/bicycle/8e9a60d41b424020d448e8e46bcf789a.jpg', 1),
(938, 283, 'images/products/bicycle/1dc17989aea5ada41cad926d1da734bf.jpg', 3),
(939, 283, 'images/products/bicycle/b04cff538de50c856d851faed56f0ee7.jpg', 4),
(940, 283, 'images/products/bicycle/d9e0ffc6ab3391aad45ae6a60763b38a.jpg', 2),
(941, 283, 'images/products/bicycle/e37ac1f1a2af11cb169148941cfdc798.jpg', 1),
(942, 284, 'images/products/bicycle/cf445270b6d2ec87ca3846b7cf03e555.jpg', 3),
(943, 284, 'images/products/bicycle/8bfe1f933f55e0663df701eb34dd9b11.jpg', 4),
(944, 284, 'images/products/bicycle/8ba27c1b36b6c9bbbeccda6f5b79a7c4.jpg', 2),
(945, 284, 'images/products/bicycle/f82181b608ce5bcb057915ce1160b27b.jpg', 1),
(946, 285, 'images/products/bicycle/0131ad537c82beb169de1c4f3c2a2835.jpg', 3),
(947, 285, 'images/products/bicycle/2d8a9cecc002ac56003885c95bfe6e90.jpg', 4),
(948, 285, 'images/products/bicycle/35ec680c3f19a4df9ddebabea9b959d4.jpg', 2),
(949, 285, 'images/products/bicycle/789b7c991eb965cd8ef66eacfb1780ee.jpg', 1),
(950, 286, 'images/products/bicycle/63e0f3087643fe9bcc6770821c5f60e0.jpg', 3),
(951, 286, 'images/products/bicycle/f1f811cf62a5571cd0e5be5a83477cea.jpg', 4),
(952, 286, 'images/products/bicycle/d2ea262c886de8b7f584c81e6c4dc283.jpg', 2),
(953, 286, 'images/products/bicycle/4a22e31d0981ab2c73ac54cabd4d93c2.jpg', 1),
(954, 287, 'images/products/bicycle/aab4bea4f203d6c7fdf181e87cae4bef.jpg', 3),
(955, 287, 'images/products/bicycle/3ed23ae4524d75eb80be82721ac3a7ca.jpg', 4),
(956, 287, 'images/products/bicycle/81b21fdd64099ed8807f73b1ce4e8b2b.jpg', 2),
(957, 287, 'images/products/bicycle/1f95d7a829f7c0bade266c07e5a860c0.jpg', 1),
(958, 288, 'images/products/bicycle/a34401f9eff953c720f04385370097f6.jpg', 3),
(959, 288, 'images/products/bicycle/9ab51a4434ff9f2c97917a9f299ae7dd.jpg', 4),
(960, 288, 'images/products/bicycle/c7554a496b1743407fa32dc87546a181.jpg', 2),
(961, 288, 'images/products/bicycle/5518da2fa23ae95fc01f3c5a7455c1da.jpg', 1),
(962, 289, 'images/products/bicycle/f91fdc011a96f3a32905dfb967d97fa4.jpg', 3),
(963, 289, 'images/products/bicycle/ba92388d61152f2c1f76d7eb040fa925.jpg', 4),
(964, 289, 'images/products/bicycle/6deea038b082c3b66276e15316c6d1ab.jpg', 2),
(965, 289, 'images/products/bicycle/b572f9230fae480b807296de4f50799c.jpg', 1),
(966, 290, 'images/products/bicycle/27bbfcd85fd5b0fe43ec1787633db113.jpg', 3),
(967, 290, 'images/products/bicycle/7167fc322e01be3f878503cfe1434f80.jpg', 4),
(968, 290, 'images/products/bicycle/0dd9cfce97a55ac414448b72c46a8707.jpg', 2),
(969, 290, 'images/products/bicycle/511f974f808de3b49adbbb74a3903570.jpg', 1),
(970, 291, 'images/products/bicycle/9b583992e61f96e336cdea1c55c8305c.jpg', 3),
(971, 291, 'images/products/bicycle/8511a31bc312db028fb64377524bea93.jpg', 4),
(972, 291, 'images/products/bicycle/b0c87c6cca322e2b2276f72ce30be569.jpg', 2),
(973, 291, 'images/products/bicycle/d2cdc57003e7e34cfa100e23ec2dca5c.jpg', 1),
(974, 292, 'images/products/bicycle/288ea82df9a1cf1e765c6b507d5c5d1d.jpg', 3),
(975, 292, 'images/products/bicycle/da6cfd8968c41fbd50551ebb920a6139.jpg', 4),
(976, 292, 'images/products/bicycle/b675e7c27a46de04462bedf7bcf915de.jpg', 2),
(977, 292, 'images/products/bicycle/fa2187adb5c294ef658ddf4cac229823.jpg', 1),
(978, 293, 'images/products/bicycle/76ce6a9e620421165f7246b25b3e9b71.jpg', 3),
(979, 293, 'images/products/bicycle/758f30872a07e428dd3cddb9a7e165a2.jpg', 4),
(980, 293, 'images/products/bicycle/38bb552a9289cdcd36c070d7a575834f.jpg', 2),
(981, 293, 'images/products/bicycle/b362309e1999104cab725f5c45a57591.jpg', 1),
(982, 294, 'images/products/bicycle/e674b99a079b7f7319ae4af797ec043a.jpg', 3),
(983, 294, 'images/products/bicycle/47e96bcf511ef72cbcfb5be6b52a526d.jpg', 4),
(984, 294, 'images/products/bicycle/3424631666403f8fcfc23e5370fbbc28.jpg', 2),
(985, 294, 'images/products/bicycle/60e57c68c4bd8ef4e3693fdec090ca12.jpg', 1),
(986, 295, 'images/products/bicycle/b0de7eae99785ea7a086d2f50e1f08ce.jpg', 3),
(987, 295, 'images/products/bicycle/a0845600e331748dc976e0a297d3a189.jpg', 4),
(988, 295, 'images/products/bicycle/d89c4c05fb6949aaf8ef8cb7540714a9.jpg', 2),
(989, 295, 'images/products/bicycle/b7f5f96a62730f068bcb158cd0718213.jpg', 1),
(990, 296, 'images/products/bicycle/88a3cd2564ebada2b3687c8916ee86f0.jpg', 3),
(991, 296, 'images/products/bicycle/41fcc4329ab99375e801fce1a9417ee1.jpg', 4),
(992, 296, 'images/products/bicycle/e121cf0c7f7f90f6aa51648b74f78eb9.jpg', 2),
(993, 296, 'images/products/bicycle/a7e4b9643147672e8f3819358fe4ebd6.jpg', 1),
(994, 297, 'images/products/bicycle/186e87c45110609bb42ca6f4f551de6b.jpg', 3),
(995, 297, 'images/products/bicycle/e8f9ca23bf48a8574f2b733c70d762f9.jpg', 4),
(996, 297, 'images/products/bicycle/257f644a77b21cadb35201cb8f6e1c7e.jpg', 2),
(997, 297, 'images/products/bicycle/3741a152b1b041e9906d5d7f8e44993b.jpg', 1),
(998, 298, 'images/products/bicycle/9c7fb211022a9d4ba3a14cfd61a8b91b.jpg', 3),
(999, 298, 'images/products/bicycle/c4862a1465a5bfc0aae462bbdea317ce.jpg', 4),
(1000, 298, 'images/products/bicycle/7c30010303703c17ef713809105d05ee.jpg', 2),
(1001, 298, 'images/products/bicycle/91281827c844da18537d316f82342bf4.jpg', 1),
(1002, 299, 'images/products/bicycle/709eef48bd20a465db92e7407bebae3c.jpg', 3),
(1003, 299, 'images/products/bicycle/5ecbc33843d4a8ca8feb3ed932ef098b.jpg', 4),
(1004, 299, 'images/products/bicycle/9262b0f0eb3d33c1368ef72e35a384e9.jpg', 2),
(1005, 299, 'images/products/bicycle/9918e307ca5338845d4d28a4bc3b5bb1.jpg', 1),
(1006, 300, 'images/products/bicycle/8f28f03b1397a21ae3f06917c512b361.jpg', 3),
(1007, 300, 'images/products/bicycle/5254dacbc01c984dcfb6eb4ed567628d.jpg', 4),
(1008, 300, 'images/products/bicycle/1f1583f4a61c4c77fb2b6d1d7b68ba25.jpg', 2),
(1009, 300, 'images/products/bicycle/9e0182b20819db8a45fca595595f7688.jpg', 1),
(1010, 301, 'images/products/bicycle/cf95447d05797f3b9c29afb399a43424.jpg', 3),
(1011, 301, 'images/products/bicycle/3867ee3cb9a5c580c2f05d2fe081d970.jpg', 4),
(1012, 301, 'images/products/bicycle/e5aa5530a5a9c0dc6cf239ad37d460b1.jpg', 2),
(1013, 301, 'images/products/bicycle/efaaa07ef9491b3e24056ef79d6ad6c3.jpg', 1),
(1014, 302, 'images/products/bicycle/8bad5f09e1935a24b0ff14ef134f97e8.jpg', 3),
(1015, 302, 'images/products/bicycle/f78a35f57f3cf2260804b9ad663bf74f.jpg', 4),
(1016, 302, 'images/products/bicycle/b85b9f047a577354a7c1ce3ade7acc1f.jpg', 2),
(1017, 302, 'images/products/bicycle/c42b358ca39b0e95bc3cb8e9eedacc5b.jpg', 1),
(1018, 303, 'images/products/bicycle/7f4e98d77d490f8d667f63afd9ed0d4e.jpg', 3),
(1019, 303, 'images/products/bicycle/429fb164deb56c0e4c6af199e04ea722.jpg', 4),
(1020, 303, 'images/products/bicycle/610a2ed539e668c7c6bc164868cfbcdc.jpg', 2),
(1021, 303, 'images/products/bicycle/336926ff214a0188721d0179159e52e0.jpg', 1),
(1022, 304, 'images/products/bicycle/d20ecd944b2c2c042f0b3e81e34c4800.jpg', 3),
(1023, 304, 'images/products/bicycle/d6fc49f0f10e2dff265a78501329d3e4.jpg', 4),
(1024, 304, 'images/products/bicycle/8c962eb58eb7b0363127e7681e841a3b.jpg', 2),
(1025, 304, 'images/products/bicycle/9dcdcffa9ba58b437765fc5ded6d6ecd.jpg', 1),
(1026, 305, 'images/products/bicycle/22b203cbd5abf4f7cc271f4edfdd4fcb.jpg', 3),
(1027, 305, 'images/products/bicycle/d6173f58368a0b4754883cab0c2f5c40.jpg', 4),
(1028, 305, 'images/products/bicycle/6ff6303ff9bcb47551c0add918410c83.jpg', 2),
(1029, 305, 'images/products/bicycle/1777e722af4b8930c4c0a37d53f95f9a.jpg', 1),
(1030, 306, 'images/products/bicycle/0669717dfbe9bd9b3323e1dccba7d044.jpg', 3),
(1031, 306, 'images/products/bicycle/c8d752e208b5611af05f9b6a5ac89f11.jpg', 4),
(1032, 306, 'images/products/bicycle/cf576f6dd6f203042f17fdd38d07afd3.jpg', 2),
(1033, 306, 'images/products/bicycle/ca105e824da3a570a744ffb03dd2cc50.jpg', 1),
(1034, 307, 'images/products/bicycle/133ddc3f2d3cd08f8db4b03729fc2e77.jpg', 3),
(1035, 307, 'images/products/bicycle/959077f375db98065eafbea8e6b9066c.jpg', 4),
(1036, 307, 'images/products/bicycle/01526c7b5915c22a055565ebc4dc9036.jpg', 2),
(1037, 307, 'images/products/bicycle/2462acf8a7d87886719892c5d3cdd7d9.jpg', 1),
(1038, 308, 'images/products/bicycle/7922449faa5b3ca469f636fb745b3d81.jpg', 3),
(1039, 308, 'images/products/bicycle/94fda37629a0911d225a0f2e4e5ab76d.jpg', 4),
(1040, 308, 'images/products/bicycle/69c19241ad40addca671ef92d87923c1.jpg', 2),
(1041, 308, 'images/products/bicycle/beba9442674322f0a86901bf0bf44047.jpg', 1),
(1042, 309, 'images/products/bicycle/66c31d4a16be1b3d5138912e90baa8c7.jpg', 3),
(1043, 309, 'images/products/bicycle/5d6e48e6b93bf7fcf426ca6d9e80a332.jpg', 4),
(1044, 309, 'images/products/bicycle/eb7ce927366bf735eb483d1a32c58f87.jpg', 2),
(1045, 309, 'images/products/bicycle/3599d6174ac46c9d32727ed40c0874bf.jpg', 1),
(1046, 310, 'images/products/bicycle/acc761b63326f43e2a24f5cee1de2386.jpg', 3),
(1047, 310, 'images/products/bicycle/2bbcb6273cb025208773848bf3d0db7a.jpg', 4),
(1048, 310, 'images/products/bicycle/16bd42e2369d27a72e160f9c43968ce5.jpg', 2),
(1049, 310, 'images/products/bicycle/945d861d919e83497d001607976967dd.jpg', 1),
(1050, 311, 'images/products/bicycle/1d826313d76ebebc9f0845c0c0984315.jpg', 3),
(1051, 311, 'images/products/bicycle/f4823b07d50c512a023667b7650177e0.jpg', 4),
(1052, 311, 'images/products/bicycle/20cafa6c4e044470f744a61277c925a6.jpg', 2),
(1053, 311, 'images/products/bicycle/ba4da788d52498ace3e4f83794e12804.jpg', 1),
(1054, 312, 'images/products/bicycle/ddd4dfcb5bfcf5ffbd7123a495f98c8e.jpg', 3),
(1055, 312, 'images/products/bicycle/51ee632667c9b1943a5e6a5878fef64c.jpg', 4),
(1056, 312, 'images/products/bicycle/8357e05a195817bf287ff64f753402b5.jpg', 2),
(1057, 312, 'images/products/bicycle/e629807365e37c29b8d8049646e2ef41.jpg', 1),
(1058, 313, 'images/products/bicycle/7c1aeb4ef37ce1b6bbe0b4c6de868651.jpg', 3),
(1059, 313, 'images/products/bicycle/4adc6385c133717810f646acfc32e03f.jpg', 4),
(1060, 313, 'images/products/bicycle/e8fe68ed5a7d74eb6c097475bea19e4b.jpg', 2),
(1061, 313, 'images/products/bicycle/a58fbbac1e071d53533d2d0b23471846.jpg', 1),
(1062, 314, 'images/products/bicycle/b671f89b9a5890365e971e42075bfd36.jpg', 3),
(1063, 314, 'images/products/bicycle/05985b0f4d7426c1170f1e1880d84e1c.jpg', 4),
(1064, 314, 'images/products/bicycle/8a12194471cc96faef9302e3c62ff3ed.jpg', 2),
(1065, 314, 'images/products/bicycle/507e80e1089be41f26c2320cc8998d8a.jpg', 1),
(1066, 315, 'images/products/bicycle/1f2e750d6a0f0301a984a535e6e57338.jpg', 3),
(1067, 315, 'images/products/bicycle/9e46569579f302c93800f09d2a824e15.jpg', 4),
(1068, 315, 'images/products/bicycle/5e0704796c3e7ee5155dbacd0729fb46.jpg', 2),
(1069, 315, 'images/products/bicycle/7f925f89c3c700e67ee6c16151d9762f.jpg', 1),
(1070, 316, 'images/products/bicycle/466628d5c8eabc7f4cd24dfccf8df950.jpg', 3),
(1071, 316, 'images/products/bicycle/f96953f80423b17267a205fd3c59b321.jpg', 4),
(1072, 316, 'images/products/bicycle/44dbd577484bbdf12ba6b460c5ca5a9e.jpg', 2),
(1073, 316, 'images/products/bicycle/2f83ec0d4dc21c1250f2ba595e0f1ee9.jpg', 1),
(1074, 317, 'images/products/bicycle/6fa8893ef9fa659ef146df2d258c06a4.jpg', 3),
(1075, 317, 'images/products/bicycle/fe01d3cee27c5dd3a1dce2d1c39c8290.jpg', 4),
(1076, 317, 'images/products/bicycle/0c14e72576a8a9e3b618bb9e97a4a785.jpg', 2),
(1077, 317, 'images/products/bicycle/dad8c65c4c3d31d28c232fc2bc2a2fd3.jpg', 1),
(1078, 318, 'images/products/bicycle/e0d6ca7c9e0ea302f0abec3eba38a46b.jpg', 3),
(1079, 318, 'images/products/bicycle/8ac04f18deddd1e4c9f56ec95efd9e3b.jpg', 4),
(1080, 318, 'images/products/bicycle/4520b24dcd5cbe81d836e024fe9b7a39.jpg', 2),
(1081, 318, 'images/products/bicycle/530e67ec211c4f90db60a08d59e6d16e.jpg', 1),
(1082, 319, 'images/products/bicycle/93b267fed5374248cf62fedcdc59a9ee.jpg', 3),
(1083, 319, 'images/products/bicycle/7278449c236f75adf0ce748d40d2bb8d.jpg', 4),
(1084, 319, 'images/products/bicycle/2cae6bc707ca04239bbce60c9e91b9f7.jpg', 2),
(1085, 319, 'images/products/bicycle/7e8c7f75eda874379f970cf41db450a7.jpg', 1),
(1086, 320, 'images/products/bicycle/a5f4c410e77d4237b9b39a275d8ba2ad.jpg', 3),
(1087, 320, 'images/products/bicycle/49dc1b79653cfb714646123221bbc0e6.jpg', 4),
(1088, 320, 'images/products/bicycle/d5b9f9bb4179d893e3ff9e3b8c6a4786.jpg', 2),
(1089, 320, 'images/products/bicycle/eb5de7bdfa4341ecce0723a374d66bd4.jpg', 1),
(1090, 321, 'images/products/bicycle/0b144d5cb0d35b9be44203f293b6a2e6.jpg', 3),
(1091, 321, 'images/products/bicycle/29ffd19004aba879ae6d2cdbcc636a64.jpg', 4),
(1092, 321, 'images/products/bicycle/9a03162d9897cfc08e2b3394ec0f91a8.jpg', 2),
(1093, 321, 'images/products/bicycle/324367e0c25e442e33c1a954ee71159d.jpg', 1),
(1094, 322, 'images/products/bicycle/4af30ad3da36432e5b2369bc6a9262b0.jpg', 3),
(1095, 322, 'images/products/bicycle/7e58b6c6866f14cf95d4423a14ede173.jpg', 4),
(1096, 322, 'images/products/bicycle/1709e96ceb108dfd19c527c641872ab4.jpg', 2),
(1097, 322, 'images/products/bicycle/df0eb28eba01cdbb798e5f8b47dc990d.jpg', 1),
(1098, 323, 'images/products/bicycle/93832f90aaa7cfc3d05c5a5c1393d074.jpg', 3),
(1099, 323, 'images/products/bicycle/88ab6d32a61033250ccd05a74dc346b6.jpg', 4),
(1100, 323, 'images/products/bicycle/123119b11a00d5dc5577dff27d8fb334.jpg', 2),
(1101, 323, 'images/products/bicycle/abfa3176c0d2dc7dcbfef6db343613f5.jpg', 1),
(1102, 324, 'images/products/bicycle/eacfd29b7b8ddbdb32772eb77ea12d0c.jpg', 3),
(1103, 324, 'images/products/bicycle/da97db501b12a844b50c2c419d2be07f.jpg', 4),
(1104, 324, 'images/products/bicycle/6a3c7266e5a4734a44df729f7e1b40ae.jpg', 2),
(1105, 324, 'images/products/bicycle/9cdc1fcc5bf83dd9dbc9c8b47489e28e.jpg', 1),
(1106, 325, 'images/products/bicycle/ffa3b205bc0f1d9d7ef73e446e712102.jpg', 3),
(1107, 325, 'images/products/bicycle/2c41a1ce6c3de708007c9e80f73dd4ba.jpg', 4),
(1108, 325, 'images/products/bicycle/c76e46ee04f10eadb15ca09a2fbc779c.jpg', 2),
(1109, 325, 'images/products/bicycle/8d262afc158dc98d2528673ab8158aed.jpg', 1),
(1110, 326, 'images/products/bicycle/1c1ba53002453cf8fa43151cb902ab8f.jpg', 3),
(1111, 326, 'images/products/bicycle/c9dfe22e5c73afff8ec85d8c4266ca4a.jpg', 4),
(1112, 326, 'images/products/bicycle/e78defe1e82a3a0cd811855164d7a596.jpg', 2),
(1113, 326, 'images/products/bicycle/3acf3edcff1ca82662bf924cea3a073b.jpg', 1),
(1114, 327, 'images/products/bicycle/ef934723035910a93646d6cba60f1033.jpg', 3),
(1115, 327, 'images/products/bicycle/56bc824cba973fa8c6be27b79e19f165.jpg', 4),
(1116, 327, 'images/products/bicycle/d7fc60f48bafad757ca3fc8b6a9fad16.jpg', 2),
(1117, 327, 'images/products/bicycle/4c68cf339f96b9ca7da99e1e8f1b8797.jpg', 1),
(1118, 328, 'images/products/bicycle/c70648eb95d7a4a2314c959f7215d700.jpg', 3),
(1119, 328, 'images/products/bicycle/de83c816bc622dc51db17a867bb38f9c.jpg', 4),
(1120, 328, 'images/products/bicycle/fc263ed54e894436d783c30900e3cb99.jpg', 2),
(1121, 328, 'images/products/bicycle/dc1803fb046cbbf4aa3bc5fda370b096.jpg', 1),
(1122, 329, 'images/products/bicycle/cb69a323328c16db4f39c6876313ba48.jpg', 3),
(1123, 329, 'images/products/bicycle/2a8189bd574801cced026f27d97ad7a4.jpg', 4),
(1124, 329, 'images/products/bicycle/46d5ca91a89036585fbdf99af558179a.jpg', 2),
(1125, 329, 'images/products/bicycle/951446991b58d7786d45d476f6dcbc4a.jpg', 1),
(1126, 330, 'images/products/bicycle/61d8f04acde15b0a3dde70ad55eb62ce.jpg', 3),
(1127, 330, 'images/products/bicycle/7b00fa22778d31dded773672ecd91ed5.jpg', 4),
(1128, 330, 'images/products/bicycle/a92e7aa2e7f19bdba191bf2c73bc6bb2.jpg', 2),
(1129, 330, 'images/products/bicycle/abd08b4a715409bd139f3b9bd7f2be22.jpg', 1),
(1130, 331, 'images/products/bicycle/16705642e8873ce3f4e1c7c290ba275b.jpg', 3),
(1131, 331, 'images/products/bicycle/f7d1c35fdbb71185964595326b14b432.jpg', 4),
(1132, 331, 'images/products/bicycle/1e2d774d15f2a80b09312a222d55a54b.jpg', 2),
(1133, 331, 'images/products/bicycle/a5a4512e01527814b81f4b267eec68db.jpg', 1),
(1134, 332, 'images/products/bicycle/ee056fc7055e332afc57311222c66f50.jpg', 3),
(1135, 332, 'images/products/bicycle/5b61c8bc964b97d4ade88f5fe970b3b8.jpg', 4),
(1136, 332, 'images/products/bicycle/89e41c45a85454a648c58afd0ecaaef3.jpg', 2),
(1137, 332, 'images/products/bicycle/bb87053b9ab868d2986bc6140127e0da.jpg', 1),
(1138, 333, 'images/products/bicycle/be1e7c01330b235c91234a59a30c2f27.jpg', 3),
(1139, 333, 'images/products/bicycle/a7a7dfb687c456d2235ad7051dc00d9e.jpg', 4),
(1140, 333, 'images/products/bicycle/e76d7595e56b81e290d7f290db0ab31a.jpg', 2),
(1141, 333, 'images/products/bicycle/750177ea78a829ff712826f21b42c55d.jpg', 1),
(1142, 334, 'images/products/bicycle/2a092b38d5df98e3157e32eb50734096.jpg', 3),
(1143, 334, 'images/products/bicycle/cc4a4b5779410bca1b5516f9af45884c.jpg', 4),
(1144, 334, 'images/products/bicycle/145ff5511cf052f5d8e8f46f8d0aad1d.jpg', 2),
(1145, 334, 'images/products/bicycle/d35821f11ee9196619f915e6666847fc.jpg', 1),
(1146, 335, 'images/products/component/7d2f7c1d4c501a60ca3db172b75dc180.jpg', 3),
(1147, 335, 'images/products/component/0f03cf4029929100dfb95ce7f3afd62a.jpg', 4),
(1148, 335, 'images/products/component/08971b01a7e444ca7481473247026d8c.jpg', 2),
(1149, 335, 'images/products/component/44f173c6a7f986dbef5d04a7d6535032.jpg', 1),
(1150, 336, 'images/products/component/12a5103571f1f43100e90a16cdb4d74a.jpg', 3),
(1151, 336, 'images/products/component/c0577ac2892b96b6328a1df3c587628c.jpg', 4),
(1152, 336, 'images/products/component/e9139ff7797b49667d8257bc6be0776b.jpg', 2),
(1153, 336, 'images/products/component/97392a68fa1fa4a22c0cc79a1af1a021.jpg', 1),
(1154, 337, 'images/products/bicycle/a5af60544371520265ee78d1e95b6e19.jpg', 3),
(1155, 337, 'images/products/bicycle/1a8e3894f8930a4b1c936f1b362ab155.jpg', 4),
(1156, 337, 'images/products/bicycle/47095673d344f3af0c3030a615ee6f41.jpg', 2),
(1157, 337, 'images/products/bicycle/6e30f54d24c7b0a8cc95e298de7fbfed.jpg', 1),
(1158, 338, 'images/products/bicycle/ddea95c76c86e9854674e5cdb5d8efc8.jpg', 3),
(1159, 338, 'images/products/bicycle/f7dc2f56516fab0a307a782dd55ceb12.jpg', 4),
(1160, 338, 'images/products/bicycle/f5d69eae7da5b1ae1d64c0197ca23ab5.jpg', 2),
(1161, 338, 'images/products/bicycle/bd9286a850e97483b25e79042f6d00c5.jpg', 1),
(1162, 339, 'images/products/bicycle/a601d95abef1e7dd41ade2ef226788fd.jpg', 3),
(1163, 339, 'images/products/bicycle/3041cec88b6430eaffc614cb5e4888a5.jpg', 4),
(1164, 339, 'images/products/bicycle/fd4ff700da8b84db65812066ea5252f6.jpg', 2),
(1165, 339, 'images/products/bicycle/8397ab2fef31459bbc65fd7f3bd48917.jpg', 1),
(1166, 340, 'images/products/bicycle/bb00f850a3dc4fae92dfc6339e24b8e7.jpg', 3),
(1167, 340, 'images/products/bicycle/ee3359f09748cbb72f494f37aee224bd.jpg', 4),
(1168, 340, 'images/products/bicycle/6b1ddacbe44faf3e9b99081407bcee3b.jpg', 2),
(1169, 340, 'images/products/bicycle/4be7ea60528c6230ad9c51d3ab04ea8a.jpg', 1),
(1170, 341, 'images/products/bicycle/e13f25824a83052b8b54726e86c39b34.jpg', 3),
(1171, 341, 'images/products/bicycle/89a48c3023acca760a7a1e6e673e6c03.jpg', 4),
(1172, 341, 'images/products/bicycle/7d2756c9fc3aa3d3951c99400c444ac1.jpg', 2),
(1173, 341, 'images/products/bicycle/1f911de19878c14e47c47959fa14c273.jpg', 1),
(1174, 342, 'images/products/bicycle/544246588e175079193e38e41684f152.jpg', 3),
(1175, 342, 'images/products/bicycle/24d0b1f64bec23ef745787a692e7b1f5.jpg', 4),
(1176, 342, 'images/products/bicycle/5353321a1dc6f79f56866dbe3225f197.jpg', 2),
(1177, 342, 'images/products/bicycle/eb9fd54110428712d071a8c36d7ae0aa.jpg', 1),
(1178, 343, 'images/products/bicycle/d4eca1fc1c15bc573b8a55cc085c96ca.jpg', 3),
(1179, 343, 'images/products/bicycle/4fe1c68541f035a0b878e254c8ce2eff.jpg', 4),
(1180, 343, 'images/products/bicycle/8cbe35cf449370268c78f88ca8ca609d.jpg', 2),
(1181, 343, 'images/products/bicycle/34b5db415c267a7d872e00ec03a4db61.jpg', 1),
(1182, 344, 'images/products/bicycle/ac214acdd4d2c72d516538b55ce915d1.jpg', 3),
(1183, 344, 'images/products/bicycle/651a2b6a30d802e4b966e8f47e072252.jpg', 4),
(1184, 344, 'images/products/bicycle/dcbebf8afceb43b9ed5a0000705081de.jpg', 2),
(1185, 344, 'images/products/bicycle/23d8af6df8587780b8e29eed713afe7c.jpg', 1),
(1186, 345, 'images/products/bicycle/1c8df4e638c4167856c255aeaa482ccf.jpg', 3),
(1187, 345, 'images/products/bicycle/4e7dca69cb2309062637e995fbc1a073.jpg', 4),
(1188, 345, 'images/products/bicycle/44ab3da6d82b37160072cc2bd4eacb01.jpg', 2),
(1189, 345, 'images/products/bicycle/9eb0965f99b0344830ea4d23353dd679.jpg', 1),
(1190, 346, 'images/products/bicycle/0a969e884dfa172169b342d3236df198.jpg', 3),
(1191, 346, 'images/products/bicycle/762970ed2bbc5c79a5a97df8f068f99d.jpg', 4),
(1192, 346, 'images/products/bicycle/f350ff2113af8e9d8f1ef1046d338629.jpg', 2),
(1193, 346, 'images/products/bicycle/3cfe647cd6b20ebd8de8157a4ce31f7c.jpg', 1),
(1194, 347, 'images/products/bicycle/9531431ba4d6e7b45a88bb41c8a8fcf7.jpg', 3),
(1195, 347, 'images/products/bicycle/500e5d006b283372bb8ad73295d492a7.jpg', 4),
(1196, 347, 'images/products/bicycle/c002b663e46456705e9ed550195927ea.jpg', 2),
(1197, 347, 'images/products/bicycle/0d6eed342ac99d296e9c9174a99b70f8.jpg', 1),
(1198, 348, 'images/products/bicycle/cc0cf043bb119ea5b46de19b2cb01575.jpg', 3),
(1199, 348, 'images/products/bicycle/25b02660ab63c915176bcbee947bca62.jpg', 4),
(1200, 348, 'images/products/bicycle/86ca257c3cb8cde0eef2a5143fb1a72a.jpg', 2),
(1201, 348, 'images/products/bicycle/9a35f4e6d703c15f5d5e5f2dffbaf333.jpg', 1),
(1202, 349, 'images/products/accessory/97201886db5d990f7bac664d348859a7.jpg', 3),
(1203, 349, 'images/products/accessory/730805a92e02fbb2af755d8e117596bc.jpg', 4),
(1204, 349, 'images/products/accessory/be796a0471f1ca016f35ddec91c5cde2.jpg', 2),
(1205, 349, 'images/products/accessory/8bc1052079376c7a24e7dbc7ce5c1c93.jpg', 1),
(1206, 350, 'images/products/accessory/232ca2d3215fb14e97578e0cd937afaf.jpg', 3),
(1207, 350, 'images/products/accessory/126d8071d96274cef53e540f2947e36f.jpg', 4),
(1208, 350, 'images/products/accessory/690435becc3e94a316af21078680b4a8.jpg', 2),
(1209, 350, 'images/products/accessory/5061062611a7df4c7661816703b38c91.jpg', 1),
(1210, 351, 'images/products/component/0841039359d8990849c7c0f1970f7bd8.jpg', 3),
(1211, 351, 'images/products/component/5b17ef8b8b7b1f891200c1547c88e808.jpg', 4),
(1212, 351, 'images/products/component/6b7c55ffae72590c852bef5ef0bfe7a9.jpg', 2),
(1213, 351, 'images/products/component/835017781cd8ca42ef7ad451df80e73a.jpg', 1),
(1214, 352, 'images/products/component/cecf27fec4d6f67f435ef815070cd518.jpg', 3),
(1215, 352, 'images/products/component/2e8933492b6af4279eab9757295a9c33.jpg', 4),
(1216, 352, 'images/products/component/b1ee060d5294d85e623ae6e127c6fa5f.jpg', 2),
(1217, 352, 'images/products/component/9b9c498f32d1126b81955c7a212abe74.jpg', 1),
(1218, 353, 'images/products/component/c4f9a0610d2bc5ca9ac9153c20cd0528.jpg', 3),
(1219, 353, 'images/products/component/b02f012537b741ca73a9ce6577201c27.jpg', 4),
(1220, 353, 'images/products/component/ea95a7f9b9052e215a4343453914e329.jpg', 2),
(1221, 353, 'images/products/component/ae51c26f9338dd333ec734beeb48bfb6.jpg', 1),
(1222, 354, 'images/products/component/015b5aa742eab4502e68e709be5cef2c.jpg', 3),
(1223, 354, 'images/products/component/583167842c22438e98cde2457b881d7d.jpg', 4),
(1224, 354, 'images/products/component/58e500707231af03d4b58a08a405198e.jpg', 2),
(1225, 354, 'images/products/component/8707ced50a16b707a258db3c4df3a825.jpg', 1),
(1226, 355, 'images/products/component/e65c6d92caaa54969c837d274baa6343.jpg', 3),
(1227, 355, 'images/products/component/af5e83b99b46601ed80f0fb6e2cc50bd.jpg', 4),
(1228, 355, 'images/products/component/96d52135325ec44cb261d55592ea0530.jpg', 2),
(1229, 355, 'images/products/component/8aceaaa6bdce039118af870f6e84d89e.jpg', 1),
(1230, 356, 'images/products/component/40e4d47f63f444056a58facd755744a2.jpg', 3),
(1231, 356, 'images/products/component/83aba3bfe566e8588b1233be58f6d598.jpg', 4),
(1232, 356, 'images/products/component/a6232ea5032b46e3753e896c82c4ce18.jpg', 2),
(1233, 356, 'images/products/component/08567eb3dd04bcd6666664fe5c7ddd97.jpg', 1),
(1234, 357, 'images/products/component/94d1961ddfb9deb8e145eb2e5dd2ca34.jpg', 3),
(1235, 357, 'images/products/component/a1cc265bf649b836f9a67790fbd155df.jpg', 4),
(1236, 357, 'images/products/component/6923076f9def936a910db9190ed22207.jpg', 2),
(1237, 357, 'images/products/component/e6dd09b46efee24acabf9bd8d50ce74b.jpg', 1),
(1238, 358, 'images/products/component/5f0c4f1ec25d341f913a4e0287b93ccf.jpg', 3),
(1239, 358, 'images/products/component/b2022906e4eec2ed3c36ea61715fb375.jpg', 4),
(1240, 358, 'images/products/component/fd26391f43a4a684817a763e0d792c2b.jpg', 2),
(1241, 358, 'images/products/component/9bd3d9c2d2dec1e2e289ed0a32f4b936.jpg', 1),
(1242, 359, 'images/products/component/e9d418d51c6c90e8da4c672cdf492185.jpg', 3),
(1243, 359, 'images/products/component/c44da8f8265e3150f497c98dc761d150.jpg', 4),
(1244, 359, 'images/products/component/9d1ce9c76e8df7b480fbf9e92c27de4d.jpg', 2),
(1245, 359, 'images/products/component/8cc04f7ae100299222bfe03410674fc0.jpg', 1),
(1246, 360, 'images/products/component/5178d84e0bf7a703a268bbc82e7cf265.jpg', 3),
(1247, 360, 'images/products/component/95e7ad067d2f43278f41ccbb128991d6.jpg', 4),
(1248, 360, 'images/products/component/7b0f7ff38e2c2086d35fb25861d9783a.jpg', 2),
(1249, 360, 'images/products/component/d21a7e0d4ed727f39b3b8eced36682d5.jpg', 1),
(1250, 361, 'images/products/component/42f41c20ac989d8d7a6106e5c8f0cbbd.jpg', 3),
(1251, 361, 'images/products/component/175c544adb7fe68ea32cf36bb9fd15bb.jpg', 4),
(1252, 361, 'images/products/component/b75016f576a921361df8733f8e6770cb.jpg', 2),
(1253, 361, 'images/products/component/9786fd7afe75d93a6d7e2cdd5634c444.jpg', 1),
(1254, 362, 'images/products/component/b393a359dbe27c0f60db25ede36ac574.jpg', 3),
(1255, 362, 'images/products/component/092585f80bcd4dc86c0a461d4ddc3933.jpg', 4),
(1256, 362, 'images/products/component/613c1b8d4ad00da15b495eb458bb64cc.jpg', 2),
(1257, 362, 'images/products/component/d89e11392e60c0e492845398d5e212e1.jpg', 1),
(1258, 363, 'images/products/component/90d5beac539406b681e374127866bb1a.jpg', 3),
(1259, 363, 'images/products/component/d61854fe66c245f7a8b6d366afc83292.jpg', 4),
(1260, 363, 'images/products/component/3c80f9c3104a683ea4c8b6856a052c95.jpg', 2),
(1261, 363, 'images/products/component/5a8d7223f1985e4a3dfb5dfe81a77f4e.jpg', 1),
(1262, 364, 'images/products/component/b523fb8e863521ec87f35b3181a44bfb.jpg', 3),
(1263, 364, 'images/products/component/b096238095390a32edc2c9fa5bcb8981.jpg', 4),
(1264, 364, 'images/products/component/46a734aed26141394f21e5faff9694fc.jpg', 2),
(1265, 364, 'images/products/component/e09ba9f700bbbfcc65e41b1f0f073bda.jpg', 1),
(1266, 365, 'images/products/component/de8adf05a0c477bb5839bf7ee7dfc990.jpg', 3),
(1267, 365, 'images/products/component/be9c678ab79e5303ececf884da8819f2.jpg', 4),
(1268, 365, 'images/products/component/9352d87aaa4112852696fd95c90d05bf.jpg', 2),
(1269, 365, 'images/products/component/1fcc8ea9ca4bbe002c2294dbc6fa9084.jpg', 1),
(1270, 366, 'images/products/component/70084fd6fabc7c60a70e250c40162df7.jpg', 3),
(1271, 366, 'images/products/component/8e6fd8c3b73b0eff11117133745c80a0.jpg', 4),
(1272, 366, 'images/products/component/5055aaf562c0af1645a0af361a2cfec0.jpg', 2),
(1273, 366, 'images/products/component/4c4ce3347363e4f2bf2b9d54555c7f0d.jpg', 1),
(1274, 367, 'images/products/component/ea02f1bb366858e267250faf05defa75.jpg', 3),
(1275, 367, 'images/products/component/5b7c57b449ac3eb834a5a320367997e8.jpg', 4),
(1276, 367, 'images/products/component/2b25958f1b27ae0e4697d007ffd0a0ad.jpg', 2),
(1277, 367, 'images/products/component/acf35fbffb623e83ff02f727dee6ff71.jpg', 1),
(1278, 368, 'images/products/component/51d4fa700240ba3ac9137f5e74d30af2.jpg', 3),
(1279, 368, 'images/products/component/8f704aedcdae0d22478493bd88e8cbaf.jpg', 4),
(1280, 368, 'images/products/component/3a3322ace4ed9e47b92890caabd510e6.jpg', 2),
(1281, 368, 'images/products/component/544ad3cb2f0a3a95e04572d099f2a1c2.jpg', 1),
(1282, 369, 'images/products/component/e19f61fc94ac68c9038af41dc533e2f8.jpg', 3),
(1283, 369, 'images/products/component/a19e2c315587bc8e95f39fdfabc801cb.jpg', 4),
(1284, 369, 'images/products/component/1d2229a626f53562220fdfddfd5d8917.jpg', 2),
(1285, 369, 'images/products/component/3296d05b41a88f7449de7a0352cfd0cd.jpg', 1),
(1286, 370, 'images/products/component/f5500fc4c6292fd88b6e5067f59bcb65.jpg', 3),
(1287, 370, 'images/products/component/5230534f5ce9e67f96a825c330872671.jpg', 4),
(1288, 370, 'images/products/component/193e89910eb517325c6c526b5f171457.jpg', 2),
(1289, 370, 'images/products/component/5baa1f125efac6125fa3162906248193.jpg', 1),
(1294, 372, 'images/products/component/e5488076644b780770b99f87e7e7df44.jpg', 3),
(1295, 372, 'images/products/component/c816dfdab540506eaa25d752fc74a419.jpg', 4),
(1296, 372, 'images/products/component/4988b8b26df75c1a535cb420b7576569.jpg', 2),
(1297, 372, 'images/products/component/19160031dd2627301d189cf54ecf6f36.jpg', 1),
(1298, 373, 'images/products/component/333f5ca438fd926c801ff2c485d6ddec.jpg', 3),
(1299, 373, 'images/products/component/afc8d872ae23eb92631585ecdbd88141.jpg', 4),
(1300, 373, 'images/products/component/0afd67ea491950927937636a7aa7f55c.jpg', 2),
(1301, 373, 'images/products/component/8ad2681c7e70e43422fc5eccc6bd9b37.jpg', 1),
(1302, 374, 'images/products/component/176fc2607003da1bff95bba2547117c4.jpg', 3),
(1303, 374, 'images/products/component/5ab497ead041c6fa5f632285f6a7c61e.jpg', 4),
(1304, 374, 'images/products/component/34655a1a67a871222fd6f8845bd5deee.jpg', 2),
(1305, 374, 'images/products/component/85f66f43d512b6c778fe7155879c2601.jpg', 1),
(1306, 375, 'images/products/component/fff22861432ecbde423e059ad3045562.jpg', 3),
(1307, 375, 'images/products/component/bc461c47a832f20d176541e4f9f7a2d8.jpg', 4),
(1308, 375, 'images/products/component/27d75c8480cb9a0c7e7d1455e7165b74.jpg', 2),
(1309, 375, 'images/products/component/440d8345432833a7f7df41cf6336cdc8.jpg', 1),
(1310, 376, 'images/products/component/20ce6a8d5d58f4a3989c82a49c155fb6.jpg', 3),
(1311, 376, 'images/products/component/ac26610708e143e202bf1196529b2276.jpg', 4),
(1312, 376, 'images/products/component/11b6ee171aad18b93f7173ecd67a6022.jpg', 2),
(1313, 376, 'images/products/component/839c3a0f409477a700411df624ed5627.jpg', 1),
(1314, 377, 'images/products/component/6cc21ffd82aa446c16e74688aea5181d.jpg', 3),
(1315, 377, 'images/products/component/ba60c3fa329c6e244301613aab4b5513.jpg', 4),
(1316, 377, 'images/products/component/18af42f96af693979ad3a59abe2d1244.jpg', 2),
(1317, 377, 'images/products/component/9f92a08d1784539721c0ffbf6ff516f8.jpg', 1),
(1318, 378, 'images/products/component/b6b81844f88ea698595ffbcd6f17e092.jpg', 3),
(1319, 378, 'images/products/component/6f5b53637ebe36d1afa2582cd88ad89b.jpg', 4),
(1320, 378, 'images/products/component/9cd599790ac38d95f268755b70f64068.jpg', 2),
(1321, 378, 'images/products/component/9d076b3b9d55f9a0aeee38a357338e64.jpg', 1),
(1322, 379, 'images/products/component/5e82c196e0b436dbb1ec9a700cafffc8.jpg', 3),
(1323, 379, 'images/products/component/ef87dfe59fe4feaea9bb6e2fc785acc8.jpg', 4),
(1324, 379, 'images/products/component/2674bd372f86dea579970b283c3a5832.jpg', 2),
(1325, 379, 'images/products/component/b30e65e695a81fb4e75e1e994c95fb02.jpg', 1),
(1326, 380, 'images/products/component/5387f64659c25dd4219908c6f89713d5.jpg', 3),
(1327, 380, 'images/products/component/90060ef542ebedc15e7615e6b9882bbe.jpg', 4),
(1328, 380, 'images/products/component/2409719dc09c25663488030ebf7427de.jpg', 2),
(1329, 380, 'images/products/component/1da337a04226b78eb12d57a6a6acaf4a.jpg', 1),
(1330, 381, 'images/products/component/4ffaf05f5d317835be28675166f53a42.jpg', 3),
(1331, 381, 'images/products/component/22a55e5d76f7a362a6d16fbdc742c63f.jpg', 4),
(1332, 381, 'images/products/component/84cb8b6ef86ffa657d444d7ffd012c31.jpg', 2),
(1333, 381, 'images/products/component/cd3e2090ec5feb7db29fcb09605e21b8.jpg', 1),
(1334, 382, 'images/products/component/f7d1086d1ab0b2a260406d2ce58eb24e.jpg', 3),
(1335, 382, 'images/products/component/8f83fbb885c4834fc8d681aeb99e1973.jpg', 4),
(1336, 382, 'images/products/component/c7a92a55c706569ab92ef0d56db34b96.jpg', 2),
(1337, 382, 'images/products/component/097a1d37ae8b37b4fd4f544e40aa1fcf.jpg', 1),
(1338, 383, 'images/products/component/6e728ce07d5b74406d5c4fd28ef87368.jpg', 3),
(1339, 383, 'images/products/component/95a1f8342178b55f9ae3bde531567abb.jpg', 4),
(1340, 383, 'images/products/component/2783ab3c73df1959c3aa12d284d6d207.jpg', 2),
(1341, 383, 'images/products/component/b7037fd7dad3c092e0d7f6fa5aefee7e.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo_type`
--

CREATE TABLE IF NOT EXISTS `photo_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_type` varchar(100) DEFAULT NULL,
  `photo_width` int(11) NOT NULL,
  `photo_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `photo_type`
--

INSERT INTO `photo_type` (`id`, `photo_type`, `photo_width`, `photo_height`) VALUES
(1, 'BIG', 800, 600),
(2, 'MEDIUM', 300, 200),
(3, 'THUMB', 90, 63),
(4, 'GENERAL_DISPLAY', 120, 75);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `sub_product_id` int(11) DEFAULT NULL,
  `name` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE latin1_general_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `accessory_type_id` int(11) DEFAULT NULL,
  `equipment_type_id` int(11) DEFAULT NULL,
  `component_type_id` int(11) DEFAULT NULL,
  `accessory_sub_type_id` int(11) DEFAULT NULL,
  `component_sub_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maker_id` (`maker_id`),
  KEY `item_type_id` (`item_type_id`),
  KEY `sub_product_id` (`sub_product_id`),
  KEY `accessory_type_id` (`accessory_type_id`),
  KEY `product_equipment_type_id` (`equipment_type_id`),
  KEY `product_component_type_id` (`component_type_id`),
  KEY `product_accessory_sub_type_id` (`accessory_sub_type_id`),
  KEY `product_component_sub_type_id` (`component_sub_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=295 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `maker_id`, `item_type_id`, `sub_product_id`, `name`, `description`, `price`, `available`, `created_at`, `updated_at`, `accessory_type_id`, `equipment_type_id`, `component_type_id`, `accessory_sub_type_id`, `component_sub_type_id`) VALUES
(72, 19, 1, 3, 'Road Race Lite', 'Cadrele Race au o geometrie asemanatoare cu cea a modelelor de carbon care au fost concepute de-a lungul anilor pentru competitii si au avut rezultate competitionale excelente.<div>Materialul din care sunt realizate este aluminiu Prolite 66, tuburi triplu trase, cel mai bun de la Merida. </div>', '7700.00', 0, '2013-02-11 21:21:25', '2013-11-21 23:50:21', NULL, NULL, NULL, NULL, NULL),
(73, 19, 1, 3, 'Road Race Lite', 'În clasificarea pe baza materialelor din care sunt confectionate cadrele, în paleta cursierelor din aluminiu, Merida a creat doua familii care reflecta nevoile utilizatorilor. <br>Seria Race este dedicata competitiilor, performantei.<br>Seria Ride a fost conceputa de catre inginerii proiectanti de la Merida pentru o pedalare mai confortabila, ture pe sosea.<br>Aceasta diferenta se manifesta atât în configurarea cadrelor, cât si prin echiparea lor.\r\n<br>Cadrele Race au o geometrie asemanatoare cu cea a modelelor de carbon care au fost concepute de-a lungul anilor pentru competitii si au avut rezultate competitionale excelente. <br>Materialul din care sunt realizate este aluminiu <b>Prolite</b> <b>66</b>, tuburi triplu trase, cel mai bun de la Merida. <br>Diferitele seturi cu care sunt echipate bicicletele si coloristica variata reflecta încadrarea bicicletei în paleta.<br>Caracteristica comuna a cadrelor este tubul superior usor curbat si, depinzând de fortele care apar, în diferite zone se folosesc tuburi cu diametru diferit. Îmbinarile între tuburi se realizeaza cu o tehnologie speciala de sudura si o finisare pe masura. <br>Una dintre cele mai frumoase zone ale întregii structuri este tubul superior cu forma sa aparte împreuna cu cablul pentru frâna spate care este ascuns. <br>Imaginea de ansamblu ne sugereaza o eleganta pura pentru aceasta bicicleta. <br>Pentru 2012 am montat o furca full carbon mai usoara începând cu nivelul de echipare Shimano Sora si cadre unice Race Lite, varianta usoara.', '7700.00', 0, '2013-02-11 22:31:07', '2013-04-03 23:29:39', NULL, NULL, NULL, NULL, NULL),
(74, 19, 1, 6, 'MATTS 10', 'Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n', '1650.00', 1, '2013-02-19 22:57:47', '2013-11-15 17:34:36', NULL, NULL, NULL, NULL, NULL),
(75, 19, 1, 6, 'MATTS 15', 'Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n', '1790.00', 1, '2013-02-19 22:47:40', '2013-11-15 17:29:21', NULL, NULL, NULL, NULL, NULL),
(76, 19, 1, 6, 'MATTS 20-MD', 'Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n', '2090.00', 0, '2013-02-19 23:02:55', '2013-11-14 16:04:59', NULL, NULL, NULL, NULL, NULL),
(77, 19, 1, 6, 'MATTS 40-MD', 'Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n', '2190.00', 0, '2013-02-19 23:09:31', '2013-11-14 16:04:45', NULL, NULL, NULL, NULL, NULL),
(78, 19, 1, 6, 'MATTS 40-D', 'Matts- Active line\r\nModelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n', '2390.00', 1, '2013-02-19 23:11:38', '2013-05-14 06:29:19', NULL, NULL, NULL, NULL, NULL),
(80, 19, 1, 7, 'MATTS TFS 100', 'descriere', '2790.00', 0, '2013-02-21 12:43:39', '2013-11-14 16:05:01', NULL, NULL, NULL, NULL, NULL),
(81, 19, 1, 7, 'MATTS TFS 300', '<p class="MsoNormal"><b>Matts TFS- hardtail\r\npentru sport<o:p></o:p></b></p>\r\n\r\n<p class="MsoNormal">Sunt modelele recomandate pentru ture si competitii, pentru\r\ncei ce doresc randament si performanta. Au o geometrie a cadrului inspirata de\r\nla modelul de varf&nbsp; O. Nine,\r\nfbricata&nbsp; din tuburi de AL dublu tras, cu\r\ntehnologia Tehno Forming System. Toate modelele Matts TFS sunt echipate cu\r\nfrane disc hidraulice, si furca 100 mm</p>', '3290.00', 0, '2013-02-21 12:51:32', '2013-11-14 16:05:06', NULL, NULL, NULL, NULL, NULL),
(82, 19, 1, 7, 'MATTS TFS 500', 'Descriere', '4490.00', 0, '2013-02-21 12:54:38', '2013-11-14 16:05:03', NULL, NULL, NULL, NULL, NULL),
(83, 19, 1, 7, 'MATTS TFS 600', 'descriere', '4490.00', 0, '2013-02-21 12:55:36', '2013-11-14 16:05:09', NULL, NULL, NULL, NULL, NULL),
(84, 19, 1, 7, 'MATTS TFS 900', 'descriere', '5390.00', 0, '2013-02-21 12:58:10', '2013-11-14 16:05:12', NULL, NULL, NULL, NULL, NULL),
(85, 19, 1, 7, 'MATTS TFS 1000', 'descriere', '6190.00', 0, '2013-02-21 13:01:12', '2013-11-14 16:05:15', NULL, NULL, NULL, NULL, NULL),
(86, 19, 1, NULL, 'MATTS LITE XT-M', 'descriere', '7990.00', 0, '2013-02-21 13:07:04', '2013-11-14 16:05:17', NULL, NULL, NULL, NULL, NULL),
(87, 19, 1, NULL, 'MATTS LITE Team Issue', 'descriere', '7490.00', 0, '2013-02-21 13:08:33', '2013-11-14 16:05:19', NULL, NULL, NULL, NULL, NULL),
(88, 19, 1, 6, 'JULIET 10-V', '<span style="color: rgb(34, 34, 34); font-family: ''Helvetica Neue'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255);">Matts- Active line Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore. Sunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.</span>', '1690.00', 1, '2013-02-21 13:13:34', '2013-06-08 14:43:54', NULL, NULL, NULL, NULL, NULL),
(89, 19, 1, 6, 'JULIET 15', '<span style="color: rgb(34, 34, 34); font-family: ''Helvetica Neue'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255);">Matts- Active line Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore. Sunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.</span>', '1790.00', 1, '2013-02-21 13:14:40', '2013-06-10 12:29:32', NULL, NULL, NULL, NULL, NULL),
(90, 19, 1, 6, 'JULIET 20-MD', '<p class="MsoNormal"><span style="font-size:9.0pt;font-family:Arial;color:#222222;\r\nbackground:white">Matts- Active line Modelele Matts sunt destinate atat\r\ndeplasarilor zilnice cat si excursiilor de mai multe ore. Sunt biciclete\r\nhardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a\r\nfurcii de 100mm, frane pe disc iar la modelele de baza frane V.</span></p>', '2090.00', 0, '2013-02-21 13:15:55', '2013-11-14 16:05:24', NULL, NULL, NULL, NULL, NULL),
(91, 19, 1, 6, 'JULIET 20-V', 'descriere', '1990.00', 0, '2013-02-21 13:16:58', '2013-11-14 16:05:28', NULL, NULL, NULL, NULL, NULL),
(92, 19, 1, 6, 'JULIET 40-D', '<p class="MsoNormal"><span style="font-size:9.0pt;font-family:Arial;color:#222222;\r\nbackground:white">Matts- Active line Modelele Matts sunt destinate atat\r\ndeplasarilor zilnice cat si excursiilor de mai multe ore. Sunt biciclete\r\nhardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a\r\nfurcii de 100mm, frane pe disc iar la modelele de baza frane V.</span></p>', '2390.00', 0, '2013-02-21 13:18:52', '2013-11-14 16:05:26', NULL, NULL, NULL, NULL, NULL),
(93, 19, 1, 6, 'JULIET 40-MD', 'descriere', '0.00', 1, '2013-02-21 13:21:52', '2013-05-14 06:40:13', NULL, NULL, NULL, NULL, NULL),
(94, 19, 1, 7, 'JULIET 100', '<p class="MsoNormal"><span style="font-size:9.0pt;font-family:Arial;color:#222222;\r\nbackground:white">Matts- Active line Modelele Matts sunt destinate atat\r\ndeplasarilor zilnice cat si excursiilor de mai multe ore. Sunt biciclete\r\nhardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a\r\nfurcii de 100mm, frane pe disc iar la modelele de baza frane V.</span></p>', '2690.00', 1, '2013-02-21 13:26:01', '2013-06-10 12:53:32', NULL, NULL, NULL, NULL, NULL),
(95, 19, 1, 7, 'JULIET 300', 'descriere', '3390.00', 0, '2013-02-21 13:26:43', '2013-11-14 16:05:32', NULL, NULL, NULL, NULL, NULL),
(96, 19, 1, 7, 'JULIET 500', 'descriere', '0.00', 0, '2013-02-21 13:27:30', '2013-11-14 16:05:35', NULL, NULL, NULL, NULL, NULL),
(97, 19, 1, 6, 'Juliet 900', 'descriere', '0.00', 0, '2013-02-22 12:38:28', '2013-11-14 16:05:37', NULL, NULL, NULL, NULL, NULL),
(98, 19, 1, 7, 'JULIET 1000', 'descriere', '5890.00', 1, '2013-02-21 13:29:10', '2013-05-14 06:44:22', NULL, NULL, NULL, NULL, NULL),
(99, 19, 1, NULL, 'JULIET XT-Edition', 'descriere', '7290.00', 0, '2013-02-22 12:39:20', '2013-11-14 16:05:40', NULL, NULL, NULL, NULL, NULL),
(100, 19, 1, 13, 'RACE LITE 901', 'descriere', '4190.00', 0, '2013-02-21 13:37:43', '2013-11-14 16:05:44', NULL, NULL, NULL, NULL, NULL),
(101, 27, 2, NULL, 'M520', 'Ez csak teszt. ha megjelenik ki kell venni.', '140.00', 0, '2013-02-23 16:56:49', '2013-02-26 23:24:49', 1, NULL, NULL, NULL, NULL),
(102, 28, 3, NULL, 'Manusi de iarna', 'Ez csak teszt, ha megjelenik ki kell venni.', '140.00', 0, '2013-02-23 16:58:39', '2013-02-27 08:50:37', NULL, 1, NULL, NULL, NULL),
(103, 19, 1, 6, 'BIG NINE TFS 100', '', '3190.00', 1, '2013-02-25 23:29:34', '2013-05-14 06:46:08', NULL, NULL, NULL, NULL, NULL),
(104, 19, 1, 6, 'BIG NINE TFS 300', '', '3690.00', 1, '2013-02-25 23:32:58', '2013-05-14 06:47:07', NULL, NULL, NULL, NULL, NULL),
(105, 29, 2, NULL, 'MT540', 'Ez csak teszt, ha megjelenik, ki kell venni.', '140.00', 0, '2013-02-27 14:35:00', '2013-02-27 14:35:17', 1, NULL, NULL, NULL, NULL),
(106, 19, 3, NULL, 'Pantaloni', 'Pantaloni . teszt - ki kell venni.', '100.00', 0, '2013-03-05 12:03:32', '2013-03-05 12:03:39', NULL, 2, NULL, NULL, NULL),
(107, 28, 2, NULL, 'Extreme Arm Warmer', 'Ez csak teszt. Ha megjelenik ki kell venni.', '200.00', 0, '2013-03-07 21:14:35', '2013-03-07 21:15:00', 5, NULL, NULL, NULL, NULL),
(108, 22, 3, NULL, 'Extreme Arm Warmer', 'Ez csak teszt, ha megjelenik ki kell venni.', '110.00', 0, '2013-03-07 21:15:44', '2013-03-07 21:16:13', NULL, 3, NULL, NULL, NULL),
(109, 28, 3, NULL, 'Rebel R3 SBS', '<div><b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>:38-47</div><div><b>Talpa</b>:Speedlight 3D fibra sticla</div><div><b>Incidere</b>: SBS si doi arici</div><div><b>Brant</b>: Performance Pro</div><div><b>Culori</b>: alb-verde</div>', '685.00', 1, '2013-03-15 00:08:37', '2013-04-02 23:29:34', NULL, 9, NULL, NULL, NULL),
(110, 28, 3, NULL, 'Workout', '<b>Utilizare:</b>&nbsp;indoor / <b>Marimi: </b>37 - 47<div><b>Talpa:</b>&nbsp;Touring combinat cu cauciuc natural</div><div><b>Inchidere: </b>2+1 arici</div><div><b>Brant: </b>Performance Advance</div><div><b>Culori: </b>negru</div>', '405.00', 1, '2013-03-15 00:11:26', '2013-04-02 23:22:16', NULL, 9, NULL, NULL, NULL),
(111, 28, 3, NULL, 'Sparta SBS', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 40-48&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced-combinat cu carbon cauciuc&nbsp;</div><div><b>Incidere</b>: SBS + 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru-rosu / alb-rosu</div>', '550.00', 1, '2013-03-15 00:28:12', '2013-04-02 23:31:52', NULL, 9, NULL, NULL, NULL),
(112, 28, 3, NULL, 'Sparta', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 39-50&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced combinata cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru / alb-negru</div>', '420.00', 1, '2013-03-15 00:29:36', '2013-04-02 23:33:29', NULL, 9, NULL, NULL, NULL),
(113, 28, 3, NULL, 'Spike Pro', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 35-48&nbsp;<div><b>Talpa</b>: Jaws combinat cu cauciuc natural&nbsp;</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru / alb-negru</div>', '360.00', 1, '2013-03-15 00:31:37', '2013-04-02 23:34:39', NULL, 9, NULL, NULL, NULL),
(114, 28, 3, NULL, 'Vega SBS Dama', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced-combinat cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: SBS + 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru - fuchsia</div>', '550.00', 1, '2013-03-15 00:34:26', '2013-04-02 23:35:51', NULL, 9, NULL, NULL, NULL),
(115, 28, 3, NULL, 'Vega Dama', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced- combinat cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-negru-fuchsia</div>', '420.00', 1, '2013-03-15 00:35:41', '2013-04-02 23:36:50', NULL, 9, NULL, NULL, NULL),
(116, 28, 3, NULL, 'Elisir Pro Dama', '<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws- combinat cu cauciuc natural</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru-carbon</div>', '360.00', 1, '2013-03-15 00:36:41', '2013-04-02 23:37:34', NULL, 9, NULL, NULL, NULL),
(117, 28, 3, NULL, 'Workout', 'Indoor', '0.00', 0, '2013-03-15 00:38:08', '2013-03-26 22:33:42', NULL, 9, NULL, NULL, NULL),
(118, 28, 3, NULL, 'Jet 365', '<b>Utilizare</b>: Trecking /&nbsp;<b>Marimi</b>: 36-47&nbsp;<div><b>Talpa</b>: Touring combinat cu cauciuc natural&nbsp;</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-albastru</div>', '360.00', 1, '2013-03-15 00:39:33', '2013-04-02 23:17:50', NULL, 9, NULL, NULL, NULL),
(119, 28, 3, NULL, 'Mission', '<b>Utilizare</b>: Tour /&nbsp;<b>Marimi</b>: 40-47&nbsp;<div><b>Talpa</b>: Bike''n walk vibram&nbsp;</div><div><b>Inchidere</b>: siret si arici&nbsp;</div><div><b>Brant</b>: freeride&nbsp;</div><div><b>Culori</b>: negru</div>', '420.00', 1, '2013-03-15 00:40:52', '2013-04-02 23:14:05', NULL, 9, NULL, NULL, NULL),
(120, 28, 3, NULL, 'Venus Dama', '<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa: </b>insertii de carbon&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-mov</div>', '420.00', 1, '2013-03-15 00:42:16', '2013-04-02 23:12:04', NULL, 9, NULL, NULL, NULL),
(121, 28, 3, NULL, 'Jet Pro', '<b>Utilizare</b>: Road / <b>Marimi: </b>39-47<div><b>Talpa</b>: NRG-combinat cu fibra de sticla</div><div><b>Inchidere</b>: 3 arici</div><div><b>Brant</b>: air sport</div><div><b>Culori</b>: alb</div>', '360.00', 1, '2013-03-15 00:43:29', '2013-04-02 23:58:14', NULL, 9, NULL, NULL, NULL),
(122, 28, 3, NULL, 'Fighter', '<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 39-48<div><b>Talpa</b>: ranforsata cu carbon</div><div><b>Inchidere</b>: 3 arici</div><div><b>Brant</b>: Performance advance</div><div><b>Culori</b>: negru / alb-rosu-arginti<br></div>', '420.00', 1, '2013-03-15 00:44:46', '2013-04-02 23:03:19', NULL, 9, NULL, NULL, NULL),
(123, 28, 3, NULL, 'Fighter SBS', '<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 39-47&nbsp;<div><b>Talpa</b>: Insertie carbon</div><div><b>Inchidere: </b>SBS + 2 arici</div><div><b>Brant: </b>Performance Advance</div><div><b>Culori: </b>negru-rosu / alb-argintiu</div>', '550.00', 1, '2013-03-15 00:46:26', '2013-04-02 23:07:56', NULL, 9, NULL, NULL, NULL),
(124, 28, 3, NULL, 'Typhoon evo SBS', '<b>Utilizare:&nbsp;</b>Road / <b>Marimi: </b>40-45.5<div><b>Talpa: </b>3straturi carbon, insertii lemn</div><div><b>Inchidere: </b>SBS + 2 arici</div><div><b>Culori: </b>alb</div>', '765.00', 1, '2013-03-15 00:47:56', '2013-04-02 23:00:37', NULL, 9, NULL, NULL, NULL),
(125, 28, 3, NULL, 'Extreme Tech Mtb SBS', '<b>Utilizare: </b>MTB / <b>Marimi: </b>41-45<div><b>Talpa: </b>Speedlight Carbon 3D</div><div><b>Inchidere: </b>SBS + SLW</div><div><b>Brant: </b>Extreme Air</div><div><b>Culori:</b>&nbsp;verde-portocaliu</div>', '1130.00', 1, '2013-03-15 00:49:45', '2013-04-02 22:55:51', NULL, 9, NULL, NULL, NULL),
(126, 28, 3, NULL, 'Extreme Tech SBS', '<b>Utilizare:&nbsp;</b>Road / <b>Marimi: </b>41-45<div><b>Talpa: </b>Carbon ultrausor</div><div><b>Inchidere: </b>SBS + SLW</div><div><b>Brant: </b>Extreme Air</div><div><b>Culori: v</b>erde-portocalui</div>', '1415.00', 1, '2013-03-15 00:50:56', '2013-04-02 22:42:10', NULL, 9, NULL, NULL, NULL),
(127, 37, 3, NULL, 'Casca MG-1', '', '0.00', 1, '2013-03-18 23:52:04', NULL, NULL, 8, NULL, NULL, NULL),
(128, 37, 3, NULL, 'Casca MG-2', '', '0.00', 1, '2013-03-18 23:53:42', NULL, NULL, 8, NULL, NULL, NULL),
(129, 37, 3, NULL, 'Casca MG-3', '', '0.00', 1, '2013-03-18 23:56:21', NULL, NULL, 8, NULL, NULL, NULL),
(130, 37, 3, NULL, 'Ochelari', 'Lentila policarbonat. Rama alba, lentile gri.<div>Saculet protectie este si baticul de sters. Protectie UV 100%, UV A , -B</div>', '59.00', 1, '2013-03-18 23:59:47', '2013-04-02 23:50:04', NULL, 10, NULL, NULL, NULL),
(131, 37, 3, NULL, 'Ochelari', 'Lentile policarbonat. Rama alba/verde curcubeu de campion.<div>Lentila gri, toc solid, batic de sters</div><div>Protectie UV 100%, UV A, -B</div>', '95.00', 1, '2013-03-19 00:02:51', '2013-04-02 23:53:18', NULL, 10, NULL, NULL, NULL),
(132, 37, 3, NULL, 'Ochelari', 'Lentile policarbonat interschimbabile in functie de conditiile de lumina.<div>Rama lucioasa negru/verde, toc solid batic de sters.<div>Protectie UV 100%, UV &nbsp;A -B</div></div>', '109.00', 1, '2013-03-19 00:05:08', '2013-04-03 00:01:03', NULL, 10, NULL, NULL, NULL),
(133, 37, 3, NULL, 'Ochelari', 'Lentile policarbonat. Rama lucioasa neagra.<div>Lentile auri maro. Saculetul de protectie este si baticul de stergere</div><div>Protectie UV 100%. UV A, -B</div>', '95.00', 1, '2013-03-19 23:47:24', '2013-04-03 00:10:41', NULL, 10, NULL, NULL, NULL),
(134, 37, 3, NULL, 'Ochelari', 'Lentile policarbonat.&nbsp;<div>Rama gri titan, lentile portocalii. Tamponase nas reglabile.</div><div>Saculetul de protectie este si batic de sters.</div><div>Protectie UV 100%, UV A UV A, -B</div>', '59.00', 1, '2013-03-19 23:49:00', '2013-04-03 07:36:28', NULL, 10, NULL, NULL, NULL),
(135, 37, 3, NULL, 'Ochelari', 'Lentile policarbonat interschimbabile in fuctie de conditii meteo.<div>Rama lucioasa negru. toc solid batic de sters</div><div>Protectie UV 100%, UV A, -B</div>', '0.00', 1, '2013-03-19 23:51:41', '2013-04-03 00:13:41', NULL, 10, NULL, NULL, NULL),
(136, 37, 3, NULL, 'Pro - scurt', '', '0.00', 1, '2013-03-20 00:11:42', '2013-03-26 21:39:29', NULL, 1, NULL, NULL, NULL),
(137, 28, 3, NULL, 'TESZT', 'TESZT', '1.00', 0, '2013-03-25 20:30:38', '2013-03-25 20:36:37', NULL, 1, NULL, NULL, NULL),
(138, 28, 3, NULL, 'TESZT', 'TESZT', '1.00', 0, '2013-03-25 20:31:36', '2013-03-25 20:36:39', NULL, 1, NULL, NULL, NULL),
(139, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 21:08:11', '2013-03-25 21:15:31', NULL, 1, NULL, NULL, NULL),
(140, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 21:15:50', '2013-03-25 21:20:17', NULL, 1, NULL, NULL, NULL),
(141, 28, 3, NULL, 'TESZT', 'TESZT', '1.00', 0, '2013-03-25 21:20:35', '2013-03-25 21:21:05', NULL, 1, NULL, NULL, NULL),
(142, 37, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:08:59', '2013-03-25 22:09:17', NULL, 1, NULL, NULL, NULL),
(143, 37, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:30:08', '2013-03-25 22:32:51', NULL, 1, NULL, NULL, NULL),
(144, 37, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:32:35', '2013-03-25 22:32:50', NULL, 1, NULL, NULL, NULL),
(145, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:45:33', '2013-03-25 22:46:16', NULL, 1, NULL, NULL, NULL),
(146, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:45:51', '2013-03-25 22:46:15', NULL, 1, NULL, NULL, NULL),
(147, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:52:22', '2013-03-25 22:52:32', NULL, 1, NULL, NULL, NULL),
(148, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 22:59:45', '2013-03-25 23:00:08', NULL, 1, NULL, NULL, NULL),
(149, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 23:03:09', '2013-03-25 23:03:29', NULL, 1, NULL, NULL, NULL),
(150, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 23:12:27', '2013-03-25 23:13:07', NULL, 1, NULL, NULL, NULL),
(151, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 23:19:47', '2013-03-25 23:22:31', NULL, 1, NULL, NULL, NULL),
(152, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 23:23:21', '2013-03-25 23:23:36', NULL, 1, NULL, NULL, NULL),
(153, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-25 23:24:38', '2013-03-25 23:24:47', NULL, 1, NULL, NULL, NULL),
(154, 28, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-26 09:55:32', '2013-03-26 09:56:02', NULL, 1, NULL, NULL, NULL),
(155, 37, 3, NULL, 'TESZT', 'TESZT', '0.00', 0, '2013-03-26 14:44:45', '2013-03-26 14:45:31', NULL, 1, NULL, NULL, NULL),
(156, 28, 3, NULL, 'Rebel R3', '<b>Utilizare: </b>MTB / <b>Marimi: </b>38-47<div><b>Talpa: </b>Speedlight 3D fibre de sticla</div><div><b>Inchidere: </b>3 arici</div><div><b>Brant: </b>Performance Pro</div><div><b>Culori: </b>alb-negru</div>', '565.00', 1, '2013-04-02 23:43:28', NULL, NULL, 9, NULL, NULL, NULL),
(157, 36, 2, NULL, 'Rocket Ron', 'Ez csak teszt. Ha megjelenik ki kell venni.', '100.00', 0, '2013-04-11 21:23:14', '2013-04-11 21:31:42', 7, NULL, NULL, NULL, NULL),
(158, 30, 2, NULL, 'XCT 80', '', '0.00', 0, '2013-06-08 14:56:37', '2014-03-18 22:58:43', 20, NULL, NULL, NULL, NULL),
(159, 30, 2, NULL, 'XCM MLO 100', '', '0.00', 0, '2013-06-10 12:54:20', '2014-03-18 22:58:44', 20, NULL, NULL, NULL, NULL),
(160, 19, 1, 6, '2014 Matts 10-V', '', '1650.00', 1, '2013-10-22 23:09:50', '2013-11-15 17:38:29', NULL, NULL, NULL, NULL, NULL),
(161, 19, 1, 6, '2014 Matts 15-V', '', '1790.00', 1, '2013-10-22 23:25:37', '2013-11-15 17:34:02', NULL, NULL, NULL, NULL, NULL),
(162, 19, 1, 6, '2014 Big Seven 20-MD', '', '2090.00', 1, '2013-10-28 23:54:22', '2013-11-15 17:11:25', NULL, NULL, NULL, NULL, NULL),
(163, 19, 1, 6, '2014 Big Seven 40MD', '', '2350.00', 1, '2013-10-28 23:57:45', '2013-11-15 17:09:44', NULL, NULL, NULL, NULL, NULL),
(164, 19, 1, 6, '2014 Big Seven 40', '', '2550.00', 1, '2013-10-29 00:00:09', '2013-11-15 17:07:37', NULL, NULL, NULL, NULL, NULL),
(165, 19, 1, 6, '2014 Big Seven 100', '', '2990.00', 1, '2013-10-29 00:03:26', '2013-11-15 16:47:07', NULL, NULL, NULL, NULL, NULL),
(166, 19, 1, 6, '2014 Big Seven 300', '', '3290.00', 1, '2013-10-29 00:16:20', '2013-11-15 16:44:26', NULL, NULL, NULL, NULL, NULL),
(167, 19, 1, 7, '2014 Big Seven 500', '', '4490.00', 1, '2013-10-29 00:19:21', '2013-11-15 16:40:55', NULL, NULL, NULL, NULL, NULL),
(168, 19, 1, 7, '2014 Big Seven 900', '', '4790.00', 1, '2013-10-29 00:21:51', '2013-11-15 16:38:02', NULL, NULL, NULL, NULL, NULL),
(169, 19, 1, 7, '2014 Big Seven XT Edition', '', '6190.00', 0, '2013-10-29 00:26:52', '2013-10-29 00:30:11', NULL, NULL, NULL, NULL, NULL),
(170, 19, 1, 7, '2014 Big Seven 1000', '', '5990.00', 1, '2013-10-29 00:29:05', '2013-11-15 16:33:47', NULL, NULL, NULL, NULL, NULL),
(171, 19, 1, 7, '2014 Big Seven 1500', '', '7490.00', 1, '2013-10-29 00:32:16', '2013-11-15 16:30:57', NULL, NULL, NULL, NULL, NULL),
(172, 19, 1, 7, '2014 Big Seven Team Issue', '', '6790.00', 1, '2013-10-29 00:34:53', '2013-11-15 15:05:07', NULL, NULL, NULL, NULL, NULL),
(173, 19, 1, 7, '2014 Big Seven CF X0 Edition', '', '11900.00', 1, '2013-10-29 00:38:11', '2013-11-15 15:00:52', NULL, NULL, NULL, NULL, NULL),
(174, 19, 1, 7, '2014 Big Seven CF 3000', '', '12700.00', 1, '2013-10-29 00:39:54', '2013-11-15 14:56:35', NULL, NULL, NULL, NULL, NULL),
(175, 19, 1, 7, '2014 Big Seven CF Team', '', '26900.00', 1, '2013-10-29 00:41:38', '2013-11-15 14:51:24', NULL, NULL, NULL, NULL, NULL),
(176, 19, 1, 6, '2014 Big Nine 20MD', '', '2090.00', 1, '2013-10-29 00:46:56', '2013-11-15 14:45:02', NULL, NULL, NULL, NULL, NULL),
(177, 19, 1, 6, '2014 Big Nine 40MD', '', '2350.00', 1, '2013-10-29 00:49:59', '2013-11-15 14:42:03', NULL, NULL, NULL, NULL, NULL),
(178, 19, 1, 6, '2014 Big Nine 40', '', '2550.00', 1, '2013-10-29 00:51:54', '2013-11-15 13:59:51', NULL, NULL, NULL, NULL, NULL),
(179, 19, 1, 6, '2014 Big Nine 100', '', '2990.00', 1, '2013-10-29 00:53:57', '2013-11-15 13:55:42', NULL, NULL, NULL, NULL, NULL),
(180, 19, 1, 6, '2014 Big Nine 300', '', '3290.00', 1, '2013-10-29 00:55:34', '2013-11-15 13:51:18', NULL, NULL, NULL, NULL, NULL),
(181, 19, 1, 7, '2014 Big Nine 500', '', '4490.00', 1, '2013-10-29 01:01:08', '2013-11-15 13:46:08', NULL, NULL, NULL, NULL, NULL),
(182, 19, 1, 7, '2014 Big Nine CF 1000', '', '8490.00', 1, '2013-10-29 01:03:39', '2013-11-15 13:34:30', NULL, NULL, NULL, NULL, NULL),
(183, 19, 1, 7, '2014 Big Nine 1500', '', '7490.00', 1, '2013-10-29 01:05:16', '2013-11-14 16:53:32', NULL, NULL, NULL, NULL, NULL),
(184, 19, 1, 7, '2014 Big Nine Team Issue', '', '6990.00', 1, '2013-10-29 01:08:16', '2013-11-14 17:13:28', NULL, NULL, NULL, NULL, NULL),
(185, 19, 1, 7, '2014 Big Nine CF 1000', '', '8490.00', 1, '2013-10-29 01:10:46', NULL, NULL, NULL, NULL, NULL, NULL),
(186, 19, 1, 7, '2014 Big Nine CF X0 Edition', '', '11500.00', 1, '2013-10-29 01:13:01', '2013-11-14 16:16:51', NULL, NULL, NULL, NULL, NULL),
(187, 19, 1, 7, '2014 Big Nine  CF 5000', '', '17500.00', 1, '2013-10-29 01:15:00', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 19, 1, 7, '2014 Big Nine CF Team', '', '23900.00', 1, '2013-10-29 01:16:57', '2013-11-14 16:09:27', NULL, NULL, NULL, NULL, NULL),
(189, 19, 1, 8, 'Freddy 1', '', '14900.00', 1, '2013-10-29 13:51:31', '2013-11-29 17:49:43', NULL, NULL, NULL, NULL, NULL),
(190, 19, 1, 8, 'Freddy 3', '', '9490.00', 1, '2013-10-29 13:52:51', '2013-11-29 17:38:23', NULL, NULL, NULL, NULL, NULL),
(191, 19, 1, 8, 'Freddy 5', '', '7490.00', 1, '2013-10-29 13:54:47', '2013-11-29 17:47:50', NULL, NULL, NULL, NULL, NULL),
(192, 19, 1, 8, '2014 One Sixty 1', '', '14900.00', 1, '2013-10-29 13:57:27', '2013-11-14 15:39:21', NULL, NULL, NULL, NULL, NULL),
(193, 19, 1, 8, '2014 One Sixty 5', '', '8990.00', 1, '2013-10-29 13:58:55', '2013-11-14 15:48:32', NULL, NULL, NULL, NULL, NULL),
(194, 19, 1, 11, '2014 Crossway 10', '', '1650.00', 1, '2013-11-13 15:25:21', '2013-11-29 16:45:20', NULL, NULL, NULL, NULL, NULL),
(195, 19, 1, 11, '2014 Crossway 15', '', '1790.00', 1, '2013-11-13 15:27:00', '2013-11-29 16:41:14', NULL, NULL, NULL, NULL, NULL),
(196, 19, 1, 11, '2014 Crossway 20-V', '', '1950.00', 1, '2013-11-13 15:46:06', '2013-11-29 14:50:57', NULL, NULL, NULL, NULL, NULL),
(197, 19, 1, 11, '2014 Crosway 20-MD', '', '2090.00', 1, '2013-11-13 15:47:54', '2013-11-29 14:47:08', NULL, NULL, NULL, NULL, NULL),
(198, 19, 1, 11, '2014 Crossway 40D', '', '2490.00', 1, '2013-11-13 15:50:24', '2013-11-28 13:56:06', NULL, NULL, NULL, NULL, NULL),
(199, 19, 1, 11, '2014 Crossway 100', '', '2890.00', 1, '2013-11-13 15:52:16', '2013-11-28 13:35:49', NULL, NULL, NULL, NULL, NULL),
(200, 19, 1, 11, '2014 Crossway 300', '', '3290.00', 1, '2013-11-13 15:54:11', '2013-11-27 16:28:42', NULL, NULL, NULL, NULL, NULL),
(201, 19, 1, 11, '2014 Crossway 500', '', '3990.00', 1, '2013-11-13 15:55:51', '2013-11-27 16:16:28', NULL, NULL, NULL, NULL, NULL),
(202, 19, 1, 11, '2014 Crossway900', '', '4490.00', 1, '2013-11-13 15:57:13', '2013-11-27 16:02:16', NULL, NULL, NULL, NULL, NULL),
(203, 19, 1, 11, '2014 Crossway XT Edition', '', '5590.00', 1, '2013-11-13 15:58:29', '2013-11-27 15:52:17', NULL, NULL, NULL, NULL, NULL),
(204, 19, 1, 11, '2014 Crossway 3000', '', '6990.00', 1, '2013-11-13 15:59:53', '2013-11-27 15:47:56', NULL, NULL, NULL, NULL, NULL),
(205, 19, 1, 12, '2014 Dakar 612 Walk', '', '749.00', 1, '2013-11-14 06:44:37', NULL, NULL, NULL, NULL, NULL, NULL),
(206, 19, 1, 12, '2014 Dakar 616', '', '1050.00', 1, '2013-11-14 06:47:17', NULL, NULL, NULL, NULL, NULL, NULL),
(207, 19, 1, 12, '2014 Dakar 620', '', '1350.00', 1, '2013-11-14 06:52:06', NULL, NULL, NULL, NULL, NULL, NULL),
(208, 19, 1, 12, '2014 Dakar 620 Race', '', '1790.00', 1, '2013-11-14 06:55:31', '2013-11-14 07:13:20', NULL, NULL, NULL, NULL, NULL),
(209, 19, 1, 12, '2014 Dakar 624', '', '1490.00', 1, '2013-11-14 06:58:42', NULL, NULL, NULL, NULL, NULL, NULL),
(210, 19, 1, 12, '2014 Dakar 624 Race', '', '1950.00', 1, '2013-11-14 07:00:44', NULL, NULL, NULL, NULL, NULL, NULL),
(211, 19, 1, 12, '2014 Dakar 624 SUS', '', '1790.00', 1, '2013-11-14 07:03:51', NULL, NULL, NULL, NULL, NULL, NULL),
(212, 19, 1, 6, '2014 Juliet 10-V', '', '1650.00', 1, '2013-11-14 07:09:49', '2013-11-27 15:38:35', NULL, NULL, NULL, NULL, NULL),
(213, 19, 1, 6, '2014 Juliet 15-V', '', '1790.00', 1, '2013-11-14 07:12:04', '2013-11-27 15:36:30', NULL, NULL, NULL, NULL, NULL),
(214, 19, 1, 6, '2014 Juliet 20-MD', '', '2090.00', 1, '2013-11-14 07:15:09', '2013-11-27 15:33:06', NULL, NULL, NULL, NULL, NULL),
(215, 19, 1, 6, '2014 Juliet 40 D', '', '2390.00', 1, '2013-11-14 07:17:39', '2013-11-27 15:30:01', NULL, NULL, NULL, NULL, NULL),
(216, 19, 1, 6, '2014 Juliet 100 B', '', '2850.00', 1, '2013-11-14 07:19:38', '2013-11-27 15:23:50', NULL, NULL, NULL, NULL, NULL),
(217, 19, 1, 6, '2014 Juliet 300 B', '', '3290.00', 1, '2013-11-14 07:21:13', '2013-11-27 15:21:22', NULL, NULL, NULL, NULL, NULL),
(218, 19, 1, 7, '2014 Juliet 500 B', '', '4490.00', 1, '2013-11-14 07:26:05', '2013-11-27 15:17:17', NULL, NULL, NULL, NULL, NULL),
(219, 19, 1, 7, '2014 Juliet 900 B', '', '4790.00', 1, '2013-11-14 07:27:52', '2013-11-27 15:06:16', NULL, NULL, NULL, NULL, NULL),
(220, 19, 1, 3, '2014 Speeder T1', '', '2390.00', 1, '2013-11-14 13:20:13', '2013-12-03 13:29:46', NULL, NULL, NULL, NULL, NULL),
(221, 19, 1, 3, '2014 Speeder T1 MD', '', '2690.00', 1, '2013-11-14 13:23:45', '2013-12-03 13:27:12', NULL, NULL, NULL, NULL, NULL),
(222, 19, 1, 3, '2014 Speeder T2', '', '2890.00', 1, '2013-11-14 13:25:29', '2013-12-03 13:22:29', NULL, NULL, NULL, NULL, NULL),
(223, 19, 1, 3, '2014 Speeder T2 D', '', '3190.00', 1, '2013-11-14 13:27:06', '2013-12-03 13:18:09', NULL, NULL, NULL, NULL, NULL),
(224, 19, 1, 3, '2014 Speeder T3 D', '', '3790.00', 1, '2013-11-14 13:28:49', '2013-12-03 13:13:36', NULL, NULL, NULL, NULL, NULL),
(225, 19, 1, 3, '2014 Speeder T5', '', '4990.00', 1, '2013-11-14 13:30:09', '2013-12-03 13:08:00', NULL, NULL, NULL, NULL, NULL),
(226, 19, 1, 3, '2014 Ride 88', '', '2990.00', 1, '2013-11-14 13:40:09', '2013-12-17 01:00:37', NULL, NULL, NULL, NULL, NULL),
(227, 19, 1, 3, '2014 Ride 88-24', '', '3090.00', 1, '2013-11-14 13:41:39', '2013-12-17 00:55:42', NULL, NULL, NULL, NULL, NULL),
(228, 19, 1, 3, '2014 Ride 90', '', '3290.00', 1, '2013-11-14 13:42:50', '2013-12-17 00:49:38', NULL, NULL, NULL, NULL, NULL),
(229, 19, 1, 3, '2014 Ride 91', '', '3890.00', 1, '2013-11-14 13:44:18', '2013-12-17 00:39:14', NULL, NULL, NULL, NULL, NULL),
(230, 19, 1, 3, '2014 Ride Juliet 91', '', '3890.00', 1, '2013-11-14 13:45:42', '2013-12-17 00:43:26', NULL, NULL, NULL, NULL, NULL),
(231, 19, 1, 3, '2014 Ride 93-30', '', '4690.00', 1, '2013-11-14 13:47:13', '2013-12-17 00:33:58', NULL, NULL, NULL, NULL, NULL),
(232, 19, 1, 3, '2014 Ride 94', '', '5290.00', 1, '2013-11-14 13:48:48', '2013-12-12 16:44:58', NULL, NULL, NULL, NULL, NULL),
(233, 19, 1, 3, '2014 Ride CF 94', '', '6990.00', 1, '2013-11-14 13:50:08', '2013-12-12 16:39:02', NULL, NULL, NULL, NULL, NULL),
(234, 19, 1, 3, '2014 Ride CF 95', '', '8490.00', 1, '2013-11-14 13:51:39', '2013-12-12 16:25:47', NULL, NULL, NULL, NULL, NULL),
(235, 19, 1, 3, '2014 Ride CF 97', '', '14900.00', 1, '2013-11-14 13:53:09', '2013-12-12 16:18:31', NULL, NULL, NULL, NULL, NULL),
(236, 19, 1, 3, '2014 Ride CF Team', '', '24900.00', 1, '2013-11-14 13:54:21', '2013-12-12 16:10:10', NULL, NULL, NULL, NULL, NULL),
(237, 19, 1, 3, '2014 WARP CF Team', '', '37500.00', 1, '2013-11-14 13:56:20', NULL, NULL, NULL, NULL, NULL, NULL),
(238, 19, 1, 3, '2014 Scultura 900', '', '3290.00', 1, '2013-11-14 14:59:02', '2013-12-17 01:51:51', NULL, NULL, NULL, NULL, NULL),
(239, 19, 1, 3, '2014 Scultura 901', '', '3990.00', 1, '2013-11-14 14:59:58', '2013-12-17 01:48:25', NULL, NULL, NULL, NULL, NULL),
(240, 19, 1, 3, '2014 Scultura 903', '', '4790.00', 1, '2013-11-14 15:01:40', '2013-12-17 01:44:49', NULL, NULL, NULL, NULL, NULL),
(241, 19, 1, 3, '2014 Scultura 904', '', '5590.00', 1, '2013-11-14 15:02:49', '2013-12-17 01:40:34', NULL, NULL, NULL, NULL, NULL),
(242, 19, 1, 3, '2014 Scultura 905', '', '6990.00', 1, '2013-11-14 15:04:11', '2013-12-17 01:36:18', NULL, NULL, NULL, NULL, NULL),
(243, 19, 1, 3, '2014 Scultura CF 904', '', '7190.00', 1, '2013-11-14 15:05:28', '2013-12-17 01:33:11', NULL, NULL, NULL, NULL, NULL),
(244, 19, 1, 3, '2014 Scultura CF 905', '', '8990.00', 1, '2013-11-14 15:06:44', '2013-12-17 01:29:22', NULL, NULL, NULL, NULL, NULL),
(245, 19, 1, 3, '2014 Scultura CF 906 C', '', '9990.00', 1, '2013-11-14 15:09:25', '2013-12-17 01:24:52', NULL, NULL, NULL, NULL, NULL),
(246, 19, 1, 3, '2014 Scultura CF 907', '', '13500.00', 1, '2013-11-14 15:12:45', '2013-12-17 01:14:38', NULL, NULL, NULL, NULL, NULL),
(247, 19, 1, 3, '2014 Scultura CF Team E', '', '29900.00', 1, '2013-11-14 15:15:14', '2013-12-17 01:10:31', NULL, NULL, NULL, NULL, NULL),
(248, 19, 1, 3, '2014 Reacto CF Team', '', '26900.00', 1, '2013-11-14 15:16:39', NULL, NULL, NULL, NULL, NULL, NULL),
(249, 19, 1, 3, '2014 Cyclo Cross 3', '', '4190.00', 1, '2013-11-14 15:18:06', '2013-11-14 15:21:16', NULL, NULL, NULL, NULL, NULL),
(250, 19, 1, 3, '2014 Cyclo Cross 4', '', '4790.00', 1, '2013-11-14 15:19:18', NULL, NULL, NULL, NULL, NULL, NULL),
(251, 19, 1, 3, '2014 Cyclo Cross 5', '', '6990.00', 1, '2013-11-14 15:20:14', NULL, NULL, NULL, NULL, NULL, NULL),
(252, 41, 4, NULL, 'Float', '<div>CSAK TESZT!&nbsp;</div><div><br></div>Every FLOAT shock features our all-new CTD technology. The FLOAT line packs a ton of performance and pedaling efficiency into a lightweight package, for XC racing to All-mountain riding.', '0.00', 0, '2013-11-14 23:01:21', '2013-11-14 23:04:47', NULL, NULL, 1, NULL, NULL),
(253, 19, 1, 7, '2014 Big Nine 1000', '', '5990.00', 1, '2013-11-15 13:36:52', '2013-11-15 13:39:06', NULL, NULL, NULL, NULL, NULL),
(254, 19, 1, 15, '2014 One Forty 2-B', '', '11900.00', 1, '2013-12-16 21:50:43', '2013-12-16 22:36:21', NULL, NULL, NULL, NULL, NULL),
(255, 19, 1, 15, '2014 One Forty 3-B', '', '9990.00', 1, '2013-12-16 22:39:33', '2013-12-16 22:51:38', NULL, NULL, NULL, NULL, NULL),
(256, 19, 1, 15, '2014 One Forty 5-B', '', '8290.00', 1, '2013-12-16 22:54:51', '2013-12-16 23:08:12', NULL, NULL, NULL, NULL, NULL),
(257, 19, 1, 7, '2014 Big Ninety-Nine CF Team', '', '26900.00', 1, '2013-12-16 23:13:43', '2013-12-16 23:21:52', NULL, NULL, NULL, NULL, NULL),
(258, 19, 1, 7, '2014 Big Ninety-Nine CF 3000', '', '19500.00', 1, '2013-12-16 23:28:08', '2013-12-16 23:42:56', NULL, NULL, NULL, NULL, NULL),
(259, 19, 1, 7, '2014 Big Ninety-Nine CF X0-edition', '', '17500.00', 1, '2013-12-16 23:45:54', '2013-12-16 23:54:08', NULL, NULL, NULL, NULL, NULL),
(260, 19, 1, 7, '2014 Big Ninety-Nine 1500', '', '9490.00', 1, '2013-12-17 00:03:12', '2013-12-17 00:12:14', NULL, NULL, NULL, NULL, NULL),
(261, 19, 1, 7, '2014 Big Ninety-Nine 1000', '', '8290.00', 1, '2013-12-17 00:15:02', '2013-12-17 00:23:01', NULL, NULL, NULL, NULL, NULL),
(262, 35, 2, NULL, 'Sigma term', 'Sigma term', '435.00', 0, '2014-01-18 09:49:15', '2014-03-18 22:58:50', 25, NULL, NULL, 1, NULL),
(263, 38, 2, NULL, 'Amsterdam', '', '0.00', 0, '2014-03-18 22:55:34', '2014-03-18 22:58:40', 21, NULL, NULL, NULL, NULL),
(264, 38, 2, NULL, 'Amsterdam', '', '0.00', 0, '2014-03-18 22:55:41', '2014-03-18 22:58:47', 21, NULL, NULL, NULL, NULL),
(265, 42, 4, NULL, 'Amserdam', '', '0.00', 1, '2014-03-18 23:03:39', NULL, NULL, NULL, 21, NULL, NULL),
(266, 42, 4, NULL, 'Aspen', '', '0.00', 1, '2014-03-18 23:05:20', NULL, NULL, NULL, 21, NULL, NULL),
(267, 42, 4, NULL, 'Barcelona', '', '0.00', 1, '2014-03-18 23:06:20', NULL, NULL, NULL, 21, NULL, NULL),
(268, 42, 4, NULL, 'Basel', '', '0.00', 1, '2014-03-18 23:07:36', NULL, NULL, NULL, 21, NULL, NULL),
(269, 42, 4, NULL, 'Chamonix', '', '0.00', 1, '2014-03-18 23:08:54', NULL, NULL, NULL, 21, NULL, NULL),
(270, 42, 4, NULL, 'Davos', '', '0.00', 1, '2014-03-18 23:09:56', NULL, NULL, NULL, 21, NULL, NULL),
(271, 42, 4, NULL, 'Firenze', '', '0.00', 1, '2014-03-18 23:11:09', NULL, NULL, NULL, 21, NULL, NULL),
(272, 42, 4, NULL, 'Granada', '', '0.00', 1, '2014-03-18 23:12:15', NULL, NULL, NULL, 21, NULL, NULL),
(273, 42, 4, NULL, 'LA White', '', '0.00', 1, '2014-03-18 23:14:05', NULL, NULL, NULL, 21, NULL, NULL),
(274, 42, 4, NULL, 'Lugano', '', '0.00', 1, '2014-03-18 23:15:09', NULL, NULL, NULL, 21, NULL, NULL),
(275, 42, 4, NULL, 'Miami', '', '0.00', 1, '2014-03-18 23:17:52', NULL, NULL, NULL, 21, NULL, NULL),
(276, 42, 4, NULL, 'Sevilla', '', '0.00', 1, '2014-03-18 23:19:02', NULL, NULL, NULL, 21, NULL, NULL),
(277, 42, 4, NULL, 'Trento', '', '0.00', 1, '2014-03-18 23:20:11', NULL, NULL, NULL, 21, NULL, NULL),
(278, 42, 4, NULL, 'Valencia', '', '0.00', 1, '2014-03-18 23:21:21', NULL, NULL, NULL, 21, NULL, NULL),
(279, 42, 4, NULL, 'Venezia', '', '0.00', 1, '2014-03-18 23:23:06', NULL, NULL, NULL, 21, NULL, NULL),
(280, 42, 4, NULL, 'Verona', '', '0.00', 1, '2014-03-18 23:24:08', NULL, NULL, NULL, 21, NULL, NULL),
(281, 42, 4, NULL, 'Vienna', '', '0.00', 1, '2014-03-18 23:25:01', NULL, NULL, NULL, 21, NULL, NULL),
(282, 42, 4, NULL, 'Trap', '', '178.00', 1, '2014-03-21 22:40:22', NULL, NULL, NULL, 15, NULL, NULL),
(283, 42, 4, NULL, 'Forester II', '', '58.00', 0, '2014-03-21 22:42:10', '2014-03-21 22:47:17', NULL, NULL, 15, NULL, NULL),
(284, 42, 4, NULL, 'Forester II', '', '58.00', 1, '2014-03-21 22:42:15', '2014-03-21 22:48:34', NULL, NULL, 15, NULL, NULL),
(285, 42, 4, NULL, 'Mountainer II', '', '52.00', 1, '2014-03-21 22:45:15', NULL, NULL, NULL, 15, NULL, NULL),
(286, 42, 4, NULL, 'Uplander', '', '49.00', 1, '2014-03-21 22:50:58', NULL, NULL, NULL, 15, NULL, NULL),
(287, 42, 4, NULL, 'City', '', '24.00', 1, '2014-03-21 22:54:13', NULL, NULL, NULL, 15, NULL, NULL),
(288, 42, 4, NULL, 'Comfort', '', '21.00', 1, '2014-03-21 22:56:21', NULL, NULL, NULL, 15, NULL, NULL),
(289, 42, 4, NULL, 'Jump', '', '45.00', 1, '2014-03-21 22:57:44', NULL, NULL, NULL, 15, NULL, NULL),
(290, 42, 4, NULL, 'Alpine pp', '', '12.00', 1, '2014-03-21 22:59:29', NULL, NULL, NULL, 15, NULL, NULL),
(291, 42, 4, NULL, 'Dual Trap', '', '222.00', 1, '2014-03-21 23:08:41', NULL, NULL, NULL, 15, NULL, NULL),
(292, 42, 4, NULL, 'Confort II', '<span class="Apple-tab-span" style="white-space:pre">			</span>', '49.00', 1, '2014-03-21 23:12:18', NULL, NULL, NULL, 15, NULL, NULL),
(293, 42, 4, NULL, 'Kid', '', '11.00', 1, '2014-03-21 23:13:59', NULL, NULL, NULL, 15, NULL, NULL),
(294, 42, 4, NULL, 'Kid', '', '11.00', 1, '2014-03-21 23:13:59', NULL, NULL, NULL, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_keywords`
--

CREATE TABLE IF NOT EXISTS `product_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `keywords` longtext COLLATE latin1_general_ci,
  `details_keywords` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`id`),
  KEY `product_keyword_product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=275 ;

--
-- Dumping data for table `product_keywords`
--

INSERT INTO `product_keywords` (`id`, `product_id`, `keywords`, `details_keywords`) VALUES
(82, 74, 'MeridaBiciclete MATTS 10Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n1650 RON   ', 'Merida AL matts OV-V16-18-20-223x7Alb / VerdeSR Suntour XCT 100Shimano TY 10Shimano AltusShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z50Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(83, 75, 'MeridaBiciclete MATTS 15Modelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n1790 RON   ', 'Merida AL matts OV-V16-18-20-223x8negru/galbenSR Suntour XCT 100Shimano M 310Shimano Acera-XShimano ST-EF 51Merida V-Break LinearSR Suntour XCC KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(84, 76, 'MeridaBiciclete MATTS 20-MDModelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n2090 RON   ', 'Merida AL matts OV-D16-18-20-223x8alb/albastru, negru/rosuSR Suntour XCT MLO 100Shimano M 190Shimano Acera-XShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(85, 77, 'MeridaBiciclete MATTS 40-MDModelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n2190 RON   ', 'Merida AL matts speed D16-18-20-223x8alb/verde, negru/rosuSR Suntour XCT MLO 100Shimano M 190Shimano AlivioShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(86, 78, 'MeridaBiciclete MATTS 40-DMatts- Active line\r\nModelele Matts sunt destinate atat deplasarilor zilnice cat si excursiilor de mai multe ore.\r\nSunt biciclete hardtail usoare realizate din tuburi de aluminiu racelite 6061 cu cursa a furcii de 100mm, frane pe disc iar la modelele de baza frane V.\r\n2390 RON   ', 'Merida AL matts speed D16-18-20-223x8alb/verde, negru/rosuSR Suntour XCT MLO 100Shimano M 190Shimano AlivioShimano SL-M360Tektro HDC-300Shimano M 131KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(87, 80, 'MeridaBiciclete MATTS TFS 100descriere2790 RON   ', ''),
(88, 81, 'MeridaBiciclete MATTS TFS 300<p class="MsoNormal"><b>Matts TFS- hardtail\r\npentru sport<o:p></o:p></b></p>\r\n\r\n<p class="MsoNormal">Sunt modelele recomandate pentru ture si competitii, pentru\r\ncei ce doresc randament si performanta. Au o geometrie a cadrului inspirata de\r\nla modelul de varf&nbsp; O. Nine,\r\nfbricata&nbsp; din tuburi de AL dublu tras, cu\r\ntehnologia Tehno Forming System. Toate modelele Matts TFS sunt echipate cu\r\nfrane disc hidraulice, si furca 100 mm</p>3290 RON   ', ''),
(89, 82, 'MeridaBiciclete MATTS TFS 500Descriere4490 RON   ', ''),
(90, 83, 'MeridaBiciclete MATTS TFS 600descriere4490 RON   ', ''),
(91, 84, 'MeridaBiciclete MATTS TFS 900descriere5390 RON   ', ''),
(92, 85, 'MeridaBiciclete MATTS TFS 1000descriere6190 RON   ', ''),
(93, 86, 'MeridaBiciclete MATTS LITE XT-Mdescriere7990 RON   ', ''),
(94, 87, 'MeridaBiciclete MATTS LITE Team Issuedescriere7490 RON   ', ''),
(95, 88, 'MeridaBiciclete JULIET 10-Vdescriere1690 RON   ', 'Merida AL matts OV-V16-18-20-223x7Alb / VerdeShimano TY 10Shimano AltusShimano ST-EF 51Merida V-Break LinearShimano M 131Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(96, 89, 'MeridaBiciclete JULIET 15descriere1850 RON   ', 'Merida AL matts OV-V16-18-20-223x8Shimano M 310Shimano Acera-XShimano ST-EF 51Merida V-Break LinearSR Suntour XCC KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(97, 90, 'MeridaBiciclete JULIET 20-MDdescriere2190 RON   ', 'Merida AL matts OV-D16-18-20-223x8Shimano M 190Shimano AlivioShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(98, 91, 'MeridaBiciclete JULIET 20-Vdescriere1990 RON   ', ''),
(99, 92, 'MeridaBiciclete JULIET 40-Ddescriere2490 RON   ', 'Merida AL matts speed D16-18-20-223x8Merida M 190Shimano AlivioShimano SL-M360Tektro HDC-300Shimano M 131KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(100, 93, 'MeridaBiciclete JULIET 40-MDdescriere0 RON   ', ''),
(101, 94, 'MeridaBiciclete JULIET 100descriere2790 RON   ', 'Merida AL matts speed D16-18-20-223x8Shimano M 190Shimano AlivioShimano SL-M360Tektro HDC-300Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(102, 95, 'MeridaBiciclete JULIET 300descriere3390 RON   ', ''),
(103, 96, 'MeridaBiciclete JULIET 500descriere0 RON   ', ''),
(104, 97, 'MeridaBiciclete Juliet 900descriere0 RON   ', ''),
(105, 98, 'MeridaBiciclete JULIET 1000descriere5890 RON   ', ''),
(106, 99, 'MeridaBiciclete JULIET XT-Editiondescriere7290 RON   ', ''),
(107, 100, 'MeridaBicicleteSoseaRACE LITE 901descriere4190 RON   ', ''),
(108, 103, 'MeridaBiciclete BIG NINE TFS 1003190 RON   ', ''),
(109, 104, 'MeridaBiciclete BIG NINE TFS 3003690 RON   ', 'Merida Big Nine TFS-D17-19-21-233x9SR Suntour 29 XCM HLO 100Shimano M390Shimano Deore XT 9Shimano SL-M430Tektro DracoShimano M 430KMC Z99'),
(110, 109, 'NorthwaveEchipamente Rebel R3 SBS<div><b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>:38-47</div><div><b>Talpa</b>:Speedlight 3D fibra sticla</div><div><b>Incidere</b>: SBS si doi arici</div><div><b>Brant</b>: Performance Pro</div><div><b>Culori</b>: alb-verde</div>685 RON  Pantofi spd', ''),
(111, 110, 'NorthwaveEchipamente Workout<b>Utilizare:</b>&nbsp;indoor / <b>Marimi: </b>37 - 47<div><b>Talpa:</b>&nbsp;Touring combinat cu cauciuc natural</div><div><b>Inchidere: </b>2+1 arici</div><div><b>Brant: </b>Performance Advance</div><div><b>Culori: </b>negru</div>405 RON  Pantofi spd', ''),
(112, 111, 'NorthwaveEchipamente Sparta SBS<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 40-48&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced-combinat cu carbon cauciuc&nbsp;</div><div><b>Incidere</b>: SBS + 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru-rosu / alb-rosu</div>550 RON  Pantofi spd', ''),
(113, 112, 'NorthwaveEchipamente Sparta<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 39-50&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced combinata cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru / alb-negru</div>420 RON  Pantofi spd', ''),
(114, 113, 'NorthwaveEchipamente Spike Pro<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 35-48&nbsp;<div><b>Talpa</b>: Jaws combinat cu cauciuc natural&nbsp;</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru / alb-negru</div>360 RON  Pantofi spd', ''),
(115, 114, 'NorthwaveEchipamente Vega SBS Dama<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced-combinat cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: SBS + 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru - fuchsia</div>550 RON  Pantofi spd', ''),
(116, 115, 'NorthwaveEchipamente Vega Dama<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws Carbon Reinforced- combinat cu carbon cauciuc&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-negru-fuchsia</div>420 RON  Pantofi spd', ''),
(117, 116, 'NorthwaveEchipamente Elisir Pro Dama<b>Utilizare</b>: MTB /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa</b>: Jaws- combinat cu cauciuc natural</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: negru-carbon</div>360 RON  Pantofi spd', ''),
(118, 118, 'NorthwaveEchipamente Jet 365<b>Utilizare</b>: Trecking /&nbsp;<b>Marimi</b>: 36-47&nbsp;<div><b>Talpa</b>: Touring combinat cu cauciuc natural&nbsp;</div><div><b>Inchidere</b>: 2 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-albastru</div>360 RON  Pantofi spd', ''),
(119, 119, 'NorthwaveEchipamente Mission<b>Utilizare</b>: Tour /&nbsp;<b>Marimi</b>: 40-47&nbsp;<div><b>Talpa</b>: Bike''n walk vibram&nbsp;</div><div><b>Inchidere</b>: siret si arici&nbsp;</div><div><b>Brant</b>: freeride&nbsp;</div><div><b>Culori</b>: negru</div>420 RON  Pantofi spd', ''),
(120, 120, 'NorthwaveEchipamente Venus Dama<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 36-41&nbsp;<div><b>Talpa: </b>insertii de carbon&nbsp;</div><div><b>Inchidere</b>: 3 arici&nbsp;</div><div><b>Brant</b>: Performance Advance&nbsp;</div><div><b>Culori</b>: alb-mov</div>420 RON  Pantofi spd', ''),
(121, 121, 'NorthwaveEchipamente Jet Pro<b>Utilizare</b>: Road / <b>Marimi: </b>39-47<div><b>Talpa</b>: NRG-combinat cu fibra de sticla</div><div><b>Inchidere</b>: 3 arici</div><div><b>Brant</b>: air sport</div><div><b>Culori</b>: alb</div>360 RON  Pantofi spd', ''),
(122, 122, 'NorthwaveEchipamente Fighter<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 39-48<div><b>Talpa</b>: ranforsata cu carbon</div><div><b>Inchidere</b>: 3 arici</div><div><b>Brant</b>: Performance advance</div><div><b>Culori</b>: negru / alb-rosu-arginti<br></div>420 RON  Pantofi spd', ''),
(123, 123, 'NorthwaveEchipamente Fighter SBS<b>Utilizare</b>: Road /&nbsp;<b>Marimi</b>: 39-47&nbsp;<div><b>Talpa</b>: Insertie carbon</div><div><b>Inchidere: </b>SBS + 2 arici</div><div><b>Brant: </b>Performance Advance</div><div><b>Culori: </b>negru-rosu / alb-argintiu</div>550 RON  Pantofi spd', ''),
(124, 124, 'NorthwaveEchipamente Typhoon evo SBS<b>Utilizare:&nbsp;</b>Road / <b>Marimi: </b>40-45.5<div><b>Talpa: </b>3straturi carbon, insertii lemn</div><div><b>Inchidere: </b>SBS + 2 arici</div><div><b>Culori: </b>alb</div>765 RON  Pantofi spd', ''),
(125, 125, 'NorthwaveEchipamente Extreme Tech Mtb SBS<b>Utilizare: </b>MTB / <b>Marimi: </b>41-45<div><b>Talpa: </b>Speedlight Carbon 3D</div><div><b>Inchidere: </b>SBS + SLW</div><div><b>Brant: </b>Extreme Air</div><div><b>Culori:</b>&nbsp;verde-portocaliu</div>1130 RON  Pantofi spd', ''),
(126, 126, 'NorthwaveEchipamente Extreme Tech SBS<b>Utilizare:&nbsp;</b>Road / <b>Marimi: </b>41-45<div><b>Talpa: </b>Carbon ultrausor</div><div><b>Inchidere: </b>SBS + SLW</div><div><b>Brant: </b>Extreme Air</div><div><b>Culori: v</b>erde-portocalui</div>1415 RON  Pantofi spd', ''),
(127, 127, 'MeridaEchipamente Casca MG-10 RON  Casti', ''),
(128, 128, 'MeridaEchipamente Casca MG-20 RON  Casti', ''),
(129, 129, 'MeridaEchipamente Casca MG-30 RON  Casti', ''),
(130, 130, 'MeridaEchipamente OchelariLentila policarbonat. Rama alba, lentile gri.<div>Saculet protectie este si baticul de sters. Protectie UV 100%, UV A , -B</div>59 RON  Ochelari', ''),
(131, 131, 'MeridaEchipamente OchelariLentile policarbonat. Rama alba/verde curcubeu de campion.<div>Lentila gri, toc solid, batic de sters</div><div>Protectie UV 100%, UV A, -B</div>95 RON  Ochelari', ''),
(132, 132, 'MeridaEchipamente OchelariLentile policarbonat interschimbabile in functie de conditiile de lumina.<div>Rama lucioasa negru/verde, toc solid batic de sters.<div>Protectie UV 100%, UV &nbsp;A -B</div></div>109 RON  Ochelari', ''),
(133, 133, 'MeridaEchipamente OchelariLentile policarbonat. Rama lucioasa neagra.<div>Lentile auri maro. Saculetul de protectie este si baticul de stergere</div><div>Protectie UV 100%. UV A, -B</div>95 RON  Ochelari', ''),
(134, 134, 'MeridaEchipamente OchelariLentile policarbonat.&nbsp;<div>Rama gri titan, lentile portocalii. Tamponase nas reglabile.</div><div>Saculetul de protectie este si batic de sters.</div><div>Protectie UV 100%, UV A UV A, -B</div>59 RON  Ochelari', ''),
(135, 135, 'MeridaEchipamente OchelariLentile policarbonat interschimbabile in fuctie de conditii meteo.<div>Rama lucioasa negru. toc solid batic de sters</div><div>Protectie UV 100%, UV A, -B</div>0 RON  Ochelari', ''),
(136, 136, 'MeridaEchipamente Pro - scurt0 RON  Manusi', ''),
(137, 156, 'NorthwaveEchipamente Rebel R3<b>Utilizare: </b>MTB / <b>Marimi: </b>38-47<div><b>Talpa: </b>Speedlight 3D fibre de sticla</div><div><b>Inchidere: </b>3 arici</div><div><b>Brant: </b>Performance Pro</div><div><b>Culori: </b>alb-negru</div>565 RON  Pantofi spd', ''),
(138, 158, 'SR SuntourAccesorii XCT 800 RON Furci ', ''),
(139, 159, 'SR SuntourAccesorii XCM MLO 1000 RON Furci ', ''),
(140, 160, 'MeridaBicicleteMTB Hobby2014 matts 10-V0 RON   ', 'Merida matts OV-V16-18-20-223x7SR Suntour XCT 100Shimano TY 10Shimano AltusShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z50Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(141, 161, 'MeridaBicicleteMTB Hobby2014 Matts 15-V0 RON   ', 'Merida matts OV-V16-18-20-223x8SR Suntour XCT 100Shimano M 310Shimano Acera-XShimano ST-EF 51Merida V-Break LinearSR Suntour XCC KMC Z51Alloy QRAlloy QRMatts compMatts compMerida 2.1Merida 2.1'),
(142, 162, 'MeridaBicicleteMTB Hobby2014 Big Seven 20-MD0 RON   ', 'Big Seven Speed13.5-15-17-18.5-20-21.5-233x8SR Suntour XCM 100 HloMerida M 190Shimano Acera-XShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Disc AlloyDisc AlloyBig SevenBig SevenMerida 2.1Merida 2.1'),
(143, 163, 'MeridaBicicleteMTB Hobby2014 Big Seven 40MD0 RON   ', 'Big Seven Speed13.5-15-17-18.5-20-21.5-233x9SR Suntour XCM 100 HloShimano M370Shimano AltusShimano Altus RapidfireTektro NovelaSR Suntour XCMKMC Z99Disc F AlloyDisc AlloyBig SevenBig SevenMerida 2.1Merida 2.1'),
(144, 164, 'MeridaBicicleteMTB Hobby2014 Big Seven 400 RON   ', 'Big Seven Speed13.5-15-17-18.5-20-21.5-233x9SR Suntour XCM 100 HloShimano M370Shimano AltusShimano Altus RapidfirePromax DSK HydraulicSR Suntour XCMKMC Z99Disc F AlloyDisc F AlloyBig SevenBig SevenMerida 2.1Merida 2.1'),
(145, 165, 'MeridaBicicleteMTB Hobby2014 Big Seven 1002990 RON   ', 'Big Seven TFS13.5-15-17-18.5-20-21.5-233x9SR Suntour XCM 100 HloShimano M370Shimano AlivioShimano Altus RapidfireTektro HDC 301Shimano M391 44/33/22KMC Z99Disc F AlloyDisc F AlloyBig Seven CompBig Seven CompMerida Race 2.1Merida Race 2.1'),
(146, 166, 'MeridaBicicleteMTB Hobby2014 Big Seven 3003290 RON   ', 'Big Seven TFS13.5-15-17-18.5-20-21.5-233x9SR Suntour XCM 100 HloShimano M390Shimano SLXShimano Acera X RapidfireTektro HDC 301Shimano M 430KMC Z99Disc F AlloyShimano 475Big Seven CompBig Seven CompMerida Race 2.1Merida Race 2.1'),
(147, 167, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven 5004490 RON   ', 'Big Seven TFS13.5-15-17-18.5-20-21.5-233x10Rock Shox XC 30 TK29 100SH DeoreShimano XT ShadowSh DeoreShimano M445Shimano M522 Okta 42/32/24KMC X10Shimano 475Shimano 475Big Seven CompBig Seven CompMerida Race Lite 2.1Merida Race Lite 2.1'),
(148, 168, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven 9004790 RON   ', 'Big Seven TFS13.5-15-17-18.5-20-21.5-233x10RST FirstAir 100SH DeoreShimano XT ShadowSh DeoreShimano 505Shimano M612KMC X10Shimano M435Shimano M435Big Seven ProBig Seven ProMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(149, 169, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven XT Edition6190 RON   ', ''),
(150, 170, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven 10005990 RON   ', 'Big Seven HFS13.5-15-17-18.5-20-21.5-233x10Manitou MarvelShimano SLXShimano XT ShadowShimano SLXShimano M615 Shimano M622 40/30/22KMC X10Mavic crosrideMavic CrosrideMavic CrosrideMavic CrosrideMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(151, 171, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven 15007490 RON   ', 'Big Seven HFS13.5-15-17-18.5-20-21.5-232x10Fox Float 32 CTD Evolution 100Shimano SLXShimano SLX ShadowShimano SLXShimano SLX IceShimano SLX 38/24KMC X10Shimano SLXShimano SLX 12Mavic EN321Mavic EN321Swalbe Rocket Ron 2.1 PerformanceSchwalbe Rocket Ron 2.1 Performance'),
(152, 172, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven Team Issue6790 RON   ', 'Big Seven HFS15-17-18.5-20-21.52x10Rock Shox Recon GoldSRAM X9SRAM X9SRAM X9Magura MT4SRAM S1000 38/24KMC X10Shimano Deore 15Shimano Deore 12Big Seven ProBig Seven ProMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(153, 173, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven CF X0 Edition11900 RON   ', 'Carbon Comp15-17-18.5-20-21.52x10Rock Shox Reba RLSram XOSram XOSRAM XOAvid Elixir 7SRAM S2210 Carbon 38/24KMC X10SRAM M506SRAM M746Mavic EN321Mavic EN321Schwalbe Racing Ralph 2.1 PerformanceSchwalbe Schwalbe Racing Ralph 2.1 Performance'),
(154, 174, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven CF 300012700 RON   ', 'Carbon Comp15-17-18.5-20-21.52x10Fox Float 32 CTD Evolution 100Shimano XTShimano XT ShadowShimano XTShimano XT IceShimano XT 38/24KMC X10FulcrumFulcrumFulcrum Red PowerFulcrum Red PowerSchwalbe Racing Ralph 2.1 EvoSchwalbe Racing Ralph 2.1 Evo'),
(155, 175, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Seven CF Team26900 RON   ', 'Big Seven Carbon Superlite15-17-18.5-20-21.52x10Rock Shox Sid XXSRAM XXSRAM XXSRAM XXAvid XXSRAM XX 39/26KMC X10SLFulcrumFulcrumFulcrum RED MetalFulcrum RED MetalMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(156, 176, 'MeridaBicicleteMTB Hobby2014 Big Nine 20MD2090 RON   ', 'Big Nine Speed15-17-19-21-233x8SR Suntour 29 XCM HLO 100Shimano M 190Shimano Acera-XShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Disc F AlloyDisc F AlloyBig Nine DBig Nine DMerida 2.1Merida 2.1'),
(157, 177, 'MeridaBicicleteMTB Hobby2014 Big Nine 40MD2350 RON   ', 'Big Nine Speed15-17-19-21-233x9Merida XCM HLO100Shimano M370Shimano AltusShimano Altus RapidfireTektro NovelaSR Suntour XCMKMC Z99Disc F AlloyDisc F AlloyBig Nine DBig Nine DMerida 2.2Merida 2.2'),
(158, 178, 'MeridaBicicleteMTB Hobby2014 Big Nine 402550 RON   ', 'Big Nine Speed15-17-19-21-233x9SR Suntour 29 XCM HLO 100Shimano M370Shimano AltusShimano Altus RapidfirePromax DSK HydraulicSR Suntour XCMKMC Z99Disc F AlloyDisc F AlloyBig Nine Comp DBig Nine Comp DMerida 2.2Merida 2.2'),
(159, 179, 'MeridaBicicleteMTB Hobby2014 Big Nine 1002990 RON   ', 'Merida Big Nine TFS-D15-17-19-21-233x9SR Suntour 29 XCM HLO 100Shimano M370Shimano AlivioShimano Altus RapidfireTektro HDC 301Shimano M391 44/33/22KMC Z99Disc F AlloyDisc F AlloyBig Nine Comp DBig Nine Comp DMerida Race 2.1Merida Race 2.1'),
(160, 180, 'MeridaBicicleteMTB Hobby2014 Big Nine 3003290 RON   ', 'Merida Big Nine TFS-D15-17-19-21-233x9SR Suntour 29 XCM HLO 100Shimano M390Shimano SLXShimano Acera X RapidfireTektro HDC 301Shimano M 430KMC Z99Disc F AlloyShimano 475Big Nine Comp DBig Nine Comp DMerida Race 2.1Merida Race 2.1'),
(161, 181, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine 5004490 RON   ', 'Merida Big Nine TFS-D15-17-19-21-233x10Rock Shox XC 30 TK29 100SH DeoreShimano XT ShadowSh DeoreShimano M445Shimano M522 Okta 42/32/24KMC X10Shimano M435Shimano M435Big Nine Comp DBig Nine Comp DMerida Race Lite 2.1Merida Race Lite 2.1'),
(162, 182, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine 10005990 RON   ', 'Carbon Comp15-17-19-213x10Manitou MarvelShimano SLXShimano XT ShadowShimano SLXShimano M615 Shimano M622 40/30/22KMC X10Mavic crosrideMavic CrosrideMavic CrosrideMavic CrosrideMaxxis CrossmarkMaxxis Crossmark 2.1'),
(163, 183, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine 15007490 RON   ', 'AL Lite15-17-19-21-232x10Fox Float 32 CTD Evolution 100Shimano SLXShimano SLX ShadowShimano SLXShimano SLX IceShimano SLX 38/24KMC X10Shimano SLXShimano SLX 12Mavic EN321Mavic EN321Continental X-King 2.2Continental X-King 2.2'),
(164, 184, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine Team Issue6990 RON   ', 'AL Lite15-17-19-21-232x10Rock Shox Recon GoldSRAM X9SRAM X9SRAM X9Magura MT4SRAM S1000 38/24KMC X10Shimano SLXShimano SLX 12Big Nine Pro DBig Nine Pro DMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(165, 185, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine CF 10008490 RON   ', ''),
(166, 186, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine CF X0 Edition11500 RON   ', 'Carbon Comp15-17-19-212x10Rock Shox Reba RLSram XOSram XOSRAM XOAvid Elixir 5SRAM S2210 Carbon 38/24KMC X10SRAM M506SRAM M506Mavic EN321Mavic EN321Schwalbe Racing Ralph 2.25Schwalbe Racing Ralph 2.25'),
(167, 187, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine  CF 500017500 RON   ', ''),
(168, 188, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine CF Team23900 RON   ', 'Big Nine Carbon Superlite15-17-19-212x10Rock Shox Sid XXSRAM XXSRAM XXSRAM XXAvid XXSRAM XO 38/24KMC X10SLFulcrumFulcrumFulcrum RED MetalFulcrum RED MetalMaxxis Aspen 2.1Maxxis Aspen 2.1'),
(169, 189, 'MeridaBicicleteDH FreerideFreddy 114900 RON   ', 'One Eighty-D-Single VPP A-link R14S/M/L1x10Rock Shox Lyrk RC2DH CL170 BLK TaperSRAM X9SRAM X9Shimano ZeeFSA Gravity light 36t MegaKMC X10HB-M640 20mm thru axleFH-M648 12*142mm E-thru axleMagic MaryAlex SUPRA D eyelet 32HRS Vivid Air26'),
(170, 190, 'MeridaBicicleteDH FreerideFreddy 39490 RON   ', 'One Eighty-D-Single VPP A-link R14S/M/L1x10Rock Shox Domain RC CL 180 S Black TaperSRAM X7 Type2SRAM X5Shimano DeoreFSA Moto X 36tKMC X10DH Pro 20mm 32HDH Pro  12mm axle 32HMaxxis Minion DHR II 2.4MTX 33RS KAGE RC 216x63 LM26'),
(171, 191, 'MeridaBicicleteDH FreerideFreddy 57490 RON   ', 'One Eighty-D-Single VPP A-link R14S/M/L1x8SR Suntour Durolux RC2 20 QLC DS 180 CTSSRAM X4SRAM X5Avid Elixir 1FSA Step Up ISIS 36TDH Pro 20mm 32HDH Pro  12mm axle 32HMaxxis Minion DHR II 2.4MTX 33RS KAGE R A226'),
(172, 192, 'MeridaBicicleteDH Freeride2014 One Sixty 114900 RON   ', 'Merida One Sixty D-Single BSC VPP A-link15-17-19-211x11Fox Float CTD BV LV PerformanceSram XOSRAM XOShimano XT 203 IceSRAM X1KMC X11DT 350DT 350SunRingle Inferno 29SunRingle Inferno Schwalbe Hans DampfSchwalbe Hans Dampf'),
(173, 193, 'MeridaBicicleteDH Freeride2014 One Sixty 58990 RON   ', 'Merida One Sixty D-Single BSC VPP A-link15-17-19-212x10Fox Float CTD BV LV PerformanceSH DeoreSh Deore ShadowSh DeoreShimano M615 Shimano Deore 36/24KMC X10Shimano ZenShimano XT 12 CENAlex MD23 DAlex MD23 DSchwalbe Hans Dampf 2.4Schwalbe Hans Dampf 2.4'),
(174, 194, 'MeridaBicicleteTreking2014 Crossway 101650 RON   ', 'Crossway V46(L)-48-50L-52-55-583x7SR Suntour M3010 50Shimano M191Shimano AltusShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z50Alloy QRAlloy QRCross 40C700'),
(175, 195, 'MeridaBicicleteTreking2014 Crossway 151790 RON   ', 'Crossway V46(L)-48-50L-52-55-583x8SR Suntour M3010 50Shimano M191Shimano Acera-XShimano ST-EF 51Merida V-Break LinearSR Suntour XCC KMC Z51Alloy QRAlloy Cassette-8Cross 40C700'),
(176, 196, 'MeridaBicicleteTreking2014 Crossway 20-V1950 RON   ', 'Crossway V46(L)-48-50L-52-55-583x8SR Suntour NEX ML 63Shimano M191Shimano Acera-XShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z51Alloy QRAlloy QRCross 40C700'),
(177, 197, 'MeridaBicicleteTreking2014 Crosway 20-MD2090 RON   ', 'Crosway D46(L)-48-50L-52-55-583x8SR Suntour NEX ML 63Shimano M191Shimano Acera-XShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Alloy QRAlloy QRCross 40C700'),
(178, 198, 'MeridaBicicleteTreking2014 Crossway 40D2490 RON   ', 'crossway speed46(L)-48-50L-52-55-583x9SR Suntour NEX ML 63Shimano M370Shimano AltusShimano Altus RapidfirePromax DSK HydraulicSR Suntour XCMKMC Z99Alloy QRAlloy QRMerida speed 40 refMerida Comp700'),
(179, 199, 'MeridaBicicleteTreking2014 Crossway 1002890 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x9SR Suntour NEX ML 63Shimano M370Shimano AlivioShimano Altus RapidfireTektro HDC 301SR Suntour XCRKMC Z99Alloy QRAlloy QRMerida speed 40 refMerida Comp700'),
(180, 200, 'MeridaBicicleteTreking2014 Crossway 3003290 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x9SR Suntour NEX ML 63Shimano M390Shimano SLXShimano Acera X RapidfireTektro HDC 301SR Suntour XCRKMC Z99Alloy QRShimano M475Merida speed 40 refMerida Comp700'),
(181, 201, 'MeridaBicicleteTreking2014 Crossway 5003990 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x10Suntour NCX lite E-RL 63SH DeoreShimano XTSh DeoreShimano M445Suntour NCX FXKMC X10Shimano M435Shimano M435Merida speed 40 refMerida Comp700'),
(182, 202, 'MeridaBicicleteTreking2014 Crossway9004490 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x10Suntour NCX lite E-RL 63SH DeoreShimano XTSh DeoreShimano 505Shimano T611 48-36-26KMC X10Shimano M435Shimano M435Merida speed lite 40KVMerida Pro D700'),
(183, 203, 'MeridaBicicleteTreking2014 Crossway XT Edition5590 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x10Suntour NCX lite E-RL 63Shimano XTShimano XTShimano XTShimano M615 Shimano XT 48/36/26KMC X10Shimano M435Shimano M435Merida speed lite 40KVMerida Pro D700'),
(184, 204, 'MeridaBicicleteTreking2014 Crossway 30006990 RON   ', 'Crossway TFS 46(L)-48-50L-52-55-583x10Suntour NCX lite E-RL 63Shimano XTShimano XTShimano XTShimano XT IceShimano XT 48/36/26KMC X10Shimano XT CenShimano XT cenSchwalbe Smart Sam perfMerida XCD Lite700'),
(185, 205, 'MeridaBicicleteCopii2014 Dakar 612 Walk749 RON   ', ''),
(186, 206, 'MeridaBicicleteCopii2014 Dakar 6161050 RON   ', ''),
(187, 207, 'MeridaBicicleteCopii2014 Dakar 6201350 RON   ', ''),
(188, 208, 'MeridaBicicleteCopii2014 Dakar 620 Race1490 RON   ', ''),
(189, 209, 'MeridaBicicleteCopii2014 Dakar 6241490 RON   ', ''),
(190, 210, 'MeridaBicicleteCopii2014 Dakar 624 Race1950 RON   ', ''),
(191, 211, 'MeridaBicicleteCopii2014 Dakar 624 SUS1790 RON   ', ''),
(192, 212, 'MeridaBicicleteMTB Hobby2014 Juliet 10-V1650 RON   ', 'Juliet speed 14.5-16-18-203x7SR Suntour XCT 100Shimano TY 10Shimano AltusShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z50Alloy QRAlloy QRMerida 1.95Juliet V26'),
(193, 213, 'MeridaBicicleteMTB Hobby2014 Juliet 15-V1790 RON   ', 'Juliet speed 14.5-16-18-203x8SR Suntour XCT 100Shimano M 310Shimano Acera-XShimano ST-EF 51Merida V-Break LinearSR Suntour XCC KMC Z51Alloy QRAlloy QRMerida 1.95Juliet V26'),
(194, 214, 'MeridaBicicleteMTB Hobby2014 Juliet 20-MD2090 RON   ', 'Juliet speed 14.5-16-18-203x8SR Suntour XCT MLO 100Merida M 190Shimano Acera-XShimano ST-EF 51Tektro NovelaShimano M 131KMC Z51Alloy QRAlloy QRMerida 1.95Juliet D26'),
(195, 215, 'MeridaBicicleteMTB Hobby2014 Juliet 40 D2390 RON   ', 'Juliet speed 14.5-16-18-203x9SR Suntour XCT MLO 100Shimano M370Shimano AltusShimano Altus RapidfirePromax DSK HydraulicSR Suntour XCMKMC Z99Alloy QRAlloy QRMerida 1.95Juliet D26'),
(196, 216, 'MeridaBicicleteMTB Hobby2014 Juliet 100 B2850 RON   ', 'Juliet Comp 2713.5-15-17-18.5-203x9Merida XCM HLO100Shimano M370Shimano AlivioShimano Altus RapidfireTektro HDC 301Shimano M391 44/33/22KMC Z99Alloy QRAlloy QRMerida Race 2.1Big Seven Comp27.5'),
(197, 217, 'MeridaBicicleteMTB Hobby2014 Juliet 300 B3290 RON   ', 'Juliet Comp 2713.5-15-17-18.5-203x9Merida XCM HLO100Shimano M390Shimano SLXShimano Acera X RapidfireTektro HDC 301Shimano M 430KMC Z99Alloy QRShimano M475Merida Race 2.1Big Seven Comp27.5'),
(198, 218, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Juliet 500 B4490 RON   ', 'Juliet pro 2713.5-15-17-18.5-203x10Rock Shox XC30 SH DeoreShimano XT ShadowSh DeoreShimano M445Shimano M522 Okta 42/32/24KMC X10Shimano M435Shimano M435Merida Race Lite 2.1Big Seven Comp27.5'),
(199, 219, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Juliet 900 B4790 RON   ', 'Juliet pro 2713.5-15-17-18.5-203x10RST FirstAir 100SH DeoreShimano XT ShadowSh DeoreShimano 505Shimano M610KMC X10Shimano M435Shimano M435Merida Race Lite 2.1Big Seven Pro27.5'),
(200, 220, 'MeridaBicicleteSosea2014 Speeder T12390 RON   ', 'Speeder ride V47(L)-50-52(L)-54-56-3x8speeder liteShimano M191Shimano Claris GSShimano ST-EF 51Merida V-Break LinearShimano M 131KMC Z7 8sAlloy QRAlloy QRMaxxis Detonator 32Merida Comp700'),
(201, 221, 'MeridaBicicleteSosea2014 Speeder T1 MD2690 RON   ', 'Speeder ride D47(L)-50-52(L)-54-56-3x8Speeder lite discShimano M191Shimano Claris GSShimano ST-EF 51Tektro NovelaShimano M 131KMC Z7 8sAlloy QRAlloy QRMaxxis Detonator 32Merida Comp700'),
(202, 222, 'MeridaBicicleteSosea2014 Speeder T22890 RON   ', 'Speeder ride V47(L)-50-52(L)-54-56-3x9speeder liteShimano M371Shimano TiagraShimano Altus RapidfireMerida V-Break LinearSR Suntour XCRKMC X9Alloy QRShimano 2200Maxxis Detonator 32Merida Comp700'),
(203, 223, 'MeridaBicicleteSosea2014 Speeder T2 D3190 RON   ', 'Speeder ride D47(L)-50-52(L)-54-56-3x9Speeder lite discShimano M371Shimano TiagraShimano Altus RapidfireTektro HDC 301SR Suntour XCRKMC X9Alloy QRAlloy QRMaxxis Detonator 32Merida Comp700'),
(204, 224, 'MeridaBicicleteSosea2014 Speeder T3 D3790 RON   ', 'Speeder ride D47(L)-50-52(L)-54-56-2x9Speeder lite discShimano Sora DShimano 105 SSShimano Sora rapidfireTektro HDC 301FSA Omega 48-34KMC X9Alloy QRAlloy QRMerida Comp700'),
(205, 225, 'MeridaBicicleteSosea2014 Speeder T54990 RON   ', 'Speeder ride V47(L)-50-52(L)-54-56-2x10Speeder carbonShimano TiagraShimano Ultegra SSShimano Tiagra rapidfireFSA Omega 48-34KMC X10Maxxis Detonator 28 60Fulcrum Racing comp CX700'),
(206, 226, 'MeridaBicicleteSosea2014 Ride 882990 RON   ', 'Ride-EQ-singleXXS-XS-S-S/M-M/L-L-XL2x8road carbon long M5Shimano Claris DShimano Claris GSShimano ClarisRoad Dual Pivotmerida Road SP-D 52-39KMC Z7 8sAlloy QRShimano 2200Kenda K193 Alex R450 Black/NC700'),
(207, 227, 'MeridaBicicleteSosea2014 Ride 88-243090 RON   ', 'Ride-EQ-singleXXS-XS-S-S/M-M/L-L-XL3x8road carbon long M5Shimano Claris TShimano Claris GSShimano ClarisRoad Dual PivotMerida Road SP-T 50-39-30KMC Z7 8sAlloy QRShimano 2200Kenda K193 Alex R450 Black/NC700'),
(208, 228, 'MeridaBicicleteSosea2014 Ride 903290 RON   ', 'Ride lite-singleXXS-XS-S-S/M-M/L-L-XL2x8road carbon fullShimano Claris DShimano Claris GSShimano ClarisRoad Dual PivotFSA Tempo 50-34KMC Z7 8sAlloy QRShimano 2200Continental Ultra Sport IIAlex R450 Black/NC700'),
(209, 229, 'MeridaBicicleteSosea2014 Ride 913890 RON   ', 'Ride lite-singleXXS-XS-S-S/M-M/L-L-XL2x9road carbon fullShimano Sora DShimano Sora GSShimano Sora Dual controlMerida Road CompShimano R345 octa 50-34KMC X9Shimano 2200Shimano 2200Continental Ultra Sport IIAlex Race24700'),
(210, 230, 'MeridaBicicleteSosea2014 Ride Juliet 913890 RON   ', 'Ride lite-single44-47-50-522x9road carbon fullShimano Sora DShimano Sora GSShimano Sora Dual controlMerida Road CompShimano R345 octa 50-34KMC X9Shimano 2200Shimano 2200Continental Ultra Sport IIAlex Race24700'),
(211, 231, 'MeridaBicicleteSosea2014 Ride 93-304690 RON   ', 'Ride lite-singleXXS-XS-S-S/M-M/L-L-XL3x10road carbon fullShimano TiagraShimano TiagraShimano Tiagra Dual ControlMerida Road CompShimano Tiagra 50-39-30KMC X10Shimano TiagraShimano TiagraContinental Ultra Sport IIAlex Race24700'),
(212, 232, 'MeridaBicicleteSosea2014 Ride 945290 RON   ', 'Ride lite-singleXXS-XS-S-S/M-M/L-L-XL2x10Shimano 105 DShimano 105 SSShimano 105Merida Road CompShimano R565 50-34KMC X10Continental Ultra Sport IIShimano R501700'),
(213, 233, 'MeridaBicicleteSosea2014 Ride CF 946990 RON   ', 'Ride Carbon Comp-EXS-S-S/M-M/L-L-XL2x10Shimano 105 DShimano 105 SSShimano 105Merida Road ProShimano R565 50-34KMC X10Continental Ultra Sport IIShimano R501700'),
(214, 234, 'MeridaBicicleteSosea2014 Ride CF 958490 RON   ', 'Ride Carbon Comp-EXS-S-S/M-M/L-L-XL2X11Shimano Ultegra DShimano Ultegra GSShimano Ultegra Dual ControlShimano R561FSA Energy 50-34 Mega11KMC X11Continental Ultra Sport IIMavic Aksium WTS 25700'),
(215, 235, 'MeridaBicicleteSosea2014 Ride CF 9714900 RON   ', 'Ride carbon Pro-EXS-S-S/M-M/L-L-XL2X11Shimano Ultegra DShimano Ultegra GSShimano Ultegra Dual ControlShimano UltegraShimano Ultegra 50-34Shimano 11sContinental Grand Sport Race 25Fulcrum Racing3700'),
(216, 236, 'MeridaBicicleteSosea2014 Ride CF Team24900 RON   ', 'Ride carbon Pro-EXS-S-S/M-M/L-L-XL2X11Ride Carbon LiteShimano Dura AceShimano Dura AceShimano Dura AceShimano Dura AceShimano Dura Ace 50-34Shimano Dura Ace 11sContinental Grand Prix 4000s 25kvFulcrum Racing 1700'),
(217, 237, 'MeridaBicicleteSosea2014 WARP CF Team37500 RON   ', ''),
(218, 238, 'MeridaBicicleteSosea2014 Scultura 9003290 RON   ', 'Scultura liteXXS-XS-S-S/M-M/L-L-XL2x8road carbon fullShimano Claris DShimano Claris SSShimano ClarisRoad Dual PivotFSA Tempo 50-34KMC Z7 8sAlloy QRShimano 2200Continental Ultra Sport IIAlex R450 Black/NC700'),
(219, 239, 'MeridaBicicleteSosea2014 Scultura 9013990 RON   ', 'Scultura liteXXS-XS-S-S/M-M/L-L-XL2x9road carbon fullShimano Sora DShimano Sora SSShimano Sora Dual controlMerida Road CompShimano R345 octa 50-34KMC X9Shimano 2200Shimano 2200Continental Ultra Sport IIMerida MR500700'),
(220, 240, 'MeridaBicicleteSosea2014 Scultura 9034790 RON   ', 'Scultura liteXXS-XS-S-S/M-M/L-L-XL2x10road carbon fullShimano TiagraShimano Tiagra SSShimano Tiagra Dual ControlMerida Road CompShimano Tiagra 50-34KMC X10Shimano TiagraShimano TiagraContinental Ultra Sport IIMerida MR500700'),
(221, 241, 'MeridaBicicleteSosea2014 Scultura 9045590 RON   ', 'Scultura liteXXS-XS-S-S/M-M/L-L-XL2x10road carbon compShimano 105 DShimano 105 SSShimano 105Merida Road ProShimano R565 50-34KMC X10Shimano 105Shimano 105Continental Ultra Sport IIMerida MR500700'),
(222, 242, 'MeridaBicicleteSosea2014 Scultura 9056990 RON   ', 'Scultura liteXXS-XS-S-S/M-M/L-L-XL2X11road carbon compShimano Ultegra DShimano Ultegra SSShimano Ultegra Dual ControlMerida Road ProFSA Energy 50-34 Mega11KMC X11Continental Ultra Sport IIFulcrum Racing7700'),
(223, 243, 'MeridaBicicleteSosea2014 Scultura CF 9047190 RON   ', 'Scultura compXXS-XS-S-S/M-M/L-L-XL2x10road carbon compShimano 105 DShimano 105 SSShimano 105Merida Road ProShimano R565 50-34KMC X10Continental Ultra Sport IIFulcrum Racing Sport700'),
(224, 244, 'MeridaBicicleteSosea2014 Scultura CF 9058990 RON   ', 'Scultura compXXS-XS-S-S/M-M/L-L-XL2X11scultura carbon liteShimano Ultegra DShimano Ultegra SSShimano Ultegra Dual ControlMerida Road ProFSA Energy 50-34 Mega11KMC X11Continental Ultra Sport IIFulcrum Racing7700'),
(225, 245, 'MeridaBicicleteSosea2014 Scultura CF 906 C9990 RON   ', 'Scultura compXXS-XS-S-S/M-M/L-L-XL2X11scultura carbon liteCampagnolo AthenaCampagnolo AthenaCampagnolo Athena CarbonCampagnolo AthenaCampagnolo Athena 50-34Campagnolo Chorus 11sContinental Ultra Sport IICampagnolo Khamsin700'),
(226, 246, 'MeridaBicicleteSosea2014 Scultura CF 90713500 RON   ', 'Scultura Pro EXXS-XS-S-S/M-M/L-L-XL2X11scultura carbon liteShimano Ultegra DShimano Ultegra SSShimano Ultegra Dual ControlShimano UltegraShimano Ultegra 50-34Shimano 11sContinental Grand Prix 4000S 23 kvFulcrum Racing3700'),
(227, 247, 'MeridaBicicleteSosea2014 Scultura CF Team E29900 RON   ', 'Scultura SL EXXS-XS-S-S/M-M/L-L-XL2X11Scultura Carbon superliteShimano Dura Ace Di2Shimano Dura Ace 11 Di2Shimano Dura Ace Di2Shimano Dura AceShimano Dura Ace 50-34Shimano Dura Ace 11sContinental Grand Prix 4000S 23 kvFulcrum Racing 1700'),
(228, 248, 'MeridaBicicleteSosea2014 Reacto CF Team26900 RON   ', ''),
(229, 249, 'MeridaBicicleteSosea2014 Ciclo Cross 34190 RON   ', ''),
(230, 250, 'MeridaBicicleteSosea2014 Cyclo Cross 44790 RON   ', ''),
(231, 251, 'MeridaBicicleteSosea2014 Cyclo Cross 56990 RON   ', ''),
(232, 252, 'FoxComponente Float<div>CSAK TESZT!&nbsp;</div><div><br></div>Every FLOAT shock features our all-new CTD technology. The FLOAT line packs a ton of performance and pedaling efficiency into a lightweight package, for XC racing to All-mountain riding.0 RON   ', ''),
(233, 253, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Nine 10005990 RON   ', 'AL Lite15-17-19-21-233x10Manitou MarvelShimano SLXShimano XT ShadowShimano SLXShimano M615 Shimano M622 40/30/22KMC X10Mavic crosrideMavic crosrideMavic CrosrideMavic CrosrideMaxxis Crossmark 2.1Maxxis Crossmark 2.1'),
(234, 254, 'MeridaBicicleteAll Mountain2014 One Forty 2-B11900 RON   ', 'One Forty 27-D-Single BSC VPP A-link R1215.5-17-19-213x10Fox 32 Float 650B CTD Evolution 150Shimano XT HD tripleShimano XT ShadowShimano XT ispecShimano SLXShimano XT 40-30-22KMC X10Schwalbe Nobby Nic 2.35 Evo foldSun Ringle ChargerComp 27 F15R12Fox Float CTD BV LV Performance27.5'),
(235, 255, 'MeridaBicicleteAll Mountain2014 One Forty 3-B9990 RON   ', 'One Forty 27-D-Single BSC VPP A-link R1215.5-17-19-213x10Fox 32 Float 650B CTD Evolution 150Shimano SLX HD tripleShimano SLX ShadowShimano SLX ispecShimano SLX IceShimano SLX 40-30-22KMC X10Shimano SLX cen 15Shimano SLX 12Schwalbe Nobby Nic 2.35 performance foldAlex MD23-27 DFox Float CTD LV (no BV) Evolution27.5'),
(236, 256, 'MeridaBicicleteAll Mountain2014 One Forty 5-B8290 RON   ', 'One Forty 27-D-Single BSC VPP A-link R1215.5-17-19-213x10Rock Shox Sector27 TK air 150 poplockShimano Deore H35 tripleSh Deore ShadowShimano Deore ispecShimano M615 Shimano M622 40/30/22KMC X10Shimano Deore 15Shimano Deore 12Schwalbe Nobby Nic 2.35 performance foldAlex MD23-27 DRock Shox Monarch RT27.5'),
(237, 257, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Ninety-Nine CF Team26900 RON   ', 'Big 99 SL R1215.5-17-19-21-232x10Rock Shox SID XXS 29QRSA100 BLK TL36Avid XX HD doubleAvid XX longAvid XXSRAM XO 38/24KMC X10Maxxis Aspen 29 Exception 2.1Fulcrum RED MetalRock Shox Monarh  XX X-lock MMX right29'),
(238, 258, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Ninety-Nine CF 300019500 RON   ', 'Big 99 SL R1215.5-17-19-21-232x10Fox 32 Float 29 CTD Remote ready O/C evolutione 120Shimano XT HD doubleShimano XT ShadowShimano XT ispecShimano XT fin 180 iceShimano XT 38/24KMC X10Schwalbe Racing Ralph Evo 29 2.25 Fulcrum Red PowerFox Float CTD Remote BV SV Factory29'),
(239, 259, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Ninety-Nine CF X0-edition17500 RON   ', 'Big 99 Pro R1215.5-17-19-21-232x10Rock Shox Reba RLSRAM X0 HD doubleSRAM XO long T2SRAM XOAvid Elixir 5SRAM S2210 Carbon 38/24KMC X10Maxxis Aspen 29 Exception 2.1Fulcrum Red PowerRock Shox Monarh  XX X-lock MMX right29'),
(240, 260, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Ninety-Nine 15009490 RON   ', 'Big 99 comp-single R1215.5-17-19-21-232x10Fox 32 Float 29 CTD Remote ready O/C evolutione 120Shimano SLX HD doubleShimano SLX ShadowShimano SLX ispecShimano SLX IceShimano SLX 38/24KMC X10Shimano SLXShimano Deore 12Continental X-King 2.2Mavic EN321Fox Float CTD SV BV performance29'),
(241, 261, 'MeridaBicicleteMTB Spotr, XC, Maraton2014 Big Ninety-Nine 10008290 RON   ', 'Big 99 comp-single R1215.5-17-19-21-233x10Manitou Marvel comp 29 TS air 120 taperShimano SLX HD tripleShimano XT ShadowShimano SLX ispecShimano M615 Shimano M622 40/30/22KMC X10Maxxis Crossmark 2.1Mavic CrossRide disc 29Fox Float CTD SV BV performance29'),
(242, 262, 'SigmaAccesorii Sigma termSigma term435 RON CiclocomputereCu termomentru  ', ''),
(243, 263, 'BikeFunAccesorii Amsterdam0 RON Sa/Tija sa   ', ''),
(244, 264, 'BikeFunAccesorii Amsterdam0 RON Sa/Tija sa   ', ''),
(245, 265, 'BikeFunComponente Amserdam0 RON     ', ''),
(246, 266, 'BikeFunComponente Aspen0 RON     ', ''),
(247, 267, 'BikeFunComponente Barcelona0 RON     ', ''),
(248, 268, 'BikeFunComponente Basel0 RON     ', ''),
(249, 269, 'BikeFunComponente Chamonix0 RON     ', ''),
(250, 270, 'BikeFunComponente Davos0 RON     ', ''),
(251, 271, 'BikeFunComponente Firenze0 RON     ', ''),
(252, 272, 'BikeFunComponente Granada0 RON     ', ''),
(253, 273, 'BikeFunComponente LA White0 RON     ', ''),
(254, 274, 'BikeFunComponente Lugano0 RON     ', ''),
(255, 275, 'BikeFunComponente Miami0 RON     ', ''),
(256, 276, 'BikeFunComponente Sevilla0 RON     ', ''),
(257, 277, 'BikeFunComponente Trento0 RON     ', ''),
(258, 278, 'BikeFunComponente Valencia0 RON     ', ''),
(259, 279, 'BikeFunComponente Venezia0 RON     ', ''),
(260, 280, 'BikeFunComponente Verona0 RON     ', ''),
(261, 281, 'BikeFunComponente Vienna0 RON     ', ''),
(262, 282, 'BikeFunComponente Trap178 RON     ', ''),
(263, 283, 'BikeFunComponente Forester II58 RON     ', ''),
(264, 284, 'BikeFunComponente Forester II58 RON     ', ''),
(265, 285, 'BikeFunComponente Mountainer II52 RON     ', ''),
(266, 286, 'BikeFunComponente Uplander49 RON     ', ''),
(267, 287, 'BikeFunComponente City24 RON     ', ''),
(268, 288, 'BikeFunComponente Comfort21 RON     ', ''),
(269, 289, 'BikeFunComponente Jump45 RON     ', ''),
(270, 290, 'BikeFunComponente Alpine pp12 RON     ', ''),
(271, 291, 'BikeFunComponente Dual Trap222 RON     ', ''),
(272, 292, 'BikeFunComponente Confort II<span class="Apple-tab-span" style="white-space:pre">			</span>49 RON     ', ''),
(273, 293, 'BikeFunComponente Kid11 RON     ', ''),
(274, 294, 'BikeFunComponente Kid11 RON     ', '');

-- --------------------------------------------------------

--
-- Table structure for table `rear_shock`
--

CREATE TABLE IF NOT EXISTS `rear_shock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rear_shock_maker_id` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rear_shock`
--

INSERT INTO `rear_shock` (`id`, `maker_id`, `name`, `valid`) VALUES
(1, 41, 'FOX_TEST', 1),
(2, NULL, 'RS KAGE RC 216x63 LM', 1),
(3, NULL, 'RS KAGE R A2', 1),
(4, NULL, 'RS Vivid Air', 1),
(5, 41, 'Float CTD BV LV Performance', 1),
(6, 41, 'Float CTD LV (no BV) Evolution', 1),
(7, NULL, 'Rock Shox Monarch RT', 1),
(8, NULL, 'Rock Shox Monarh  XX X-lock MMX right', 1),
(9, 41, 'Float CTD Remote BV SV Factory', 1),
(10, 41, 'Float CTD SV BV performance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rim`
--

CREATE TABLE IF NOT EXISTS `rim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `rim_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `rim`
--

INSERT INTO `rim` (`id`, `maker_id`, `name`, `valid`) VALUES
(1, NULL, 'Matts comp', b'1'),
(2, NULL, 'Matts comp', b'1'),
(3, NULL, 'Matts comp', b'1'),
(4, NULL, 'SunRingle Inferno 29', b'1'),
(5, NULL, 'SunRingle Inferno ', b'1'),
(6, NULL, 'Alex MD23 D', b'1'),
(7, NULL, 'Alex MD23 D', b'1'),
(8, NULL, 'Fulcrum RED Metal', b'1'),
(9, NULL, 'Fulcrum RED Metal', b'1'),
(10, NULL, 'Mavic EN321', b'1'),
(11, NULL, 'Mavic EN321', b'1'),
(12, NULL, 'Mavic Crosride', b'1'),
(13, NULL, 'Big Nine Pro D', b'1'),
(14, NULL, 'Big Nine Comp D', b'1'),
(15, NULL, 'Big Nine Comp D', b'1'),
(16, NULL, 'Big Nine D', b'1'),
(17, NULL, 'Big Nine D', b'1'),
(18, NULL, 'Fulcrum Red Power', b'1'),
(19, NULL, 'Fulcrum Red Power', b'1'),
(20, NULL, 'Big Seven Pro', b'1'),
(21, NULL, 'Big Seven Pro', b'1'),
(22, NULL, 'Big Seven Comp', b'1'),
(23, NULL, 'Big Seven Comp', b'1'),
(24, NULL, 'Big Seven', b'1'),
(25, NULL, 'Big Seven', b'1'),
(26, NULL, 'Juliet D', b'1'),
(27, NULL, 'Juliet V', b'1'),
(28, NULL, 'Merida XCD Lite', b'1'),
(29, NULL, 'Merida Pro D', b'1'),
(30, NULL, 'Merida Comp', b'1'),
(31, NULL, 'Alex SUPRA D eyelet 32H', b'1'),
(32, NULL, 'MTX 33', b'1'),
(33, NULL, 'Fulcrum Racing comp CX', b'1'),
(34, NULL, 'Fulcrum Racing 1', b'1'),
(35, NULL, 'Fulcrum Racing3', b'1'),
(36, NULL, 'Mavic Aksium WTS 25', b'1'),
(37, 27, 'R501', b'1'),
(38, NULL, 'Sun Ringle ChargerComp 27 F15R12', b'1'),
(39, NULL, 'Alex MD23-27 D', b'1'),
(40, NULL, 'Mavic CrossRide disc 29', b'1'),
(41, NULL, 'Alex Race24', b'1'),
(42, NULL, 'Alex Race24', b'1'),
(43, NULL, 'Alex R450 Black/NC', b'1'),
(44, NULL, 'Campagnolo Khamsin', b'1'),
(45, NULL, 'Fulcrum Racing7', b'1'),
(46, NULL, 'Fulcrum Racing Sport', b'1'),
(47, NULL, 'Merida MR500', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `shifter`
--

CREATE TABLE IF NOT EXISTS `shifter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `shifter_maker` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `shifter`
--

INSERT INTO `shifter` (`id`, `maker_id`, `name`, `valid`) VALUES
(13, 29, 'ST-EF 51', b'1'),
(14, 29, 'SL-M360', b'1'),
(15, 29, 'SL-M430', b'1'),
(16, NULL, 'SRAM XO', b'1'),
(17, NULL, 'Sh Deore', b'1'),
(18, NULL, 'SRAM XX', b'1'),
(19, NULL, 'Shimano SLX', b'1'),
(20, NULL, 'SRAM X9', b'1'),
(21, NULL, 'Shimano Acera X Rapidfire', b'1'),
(22, NULL, 'Shimano Altus Rapidfire', b'1'),
(23, NULL, 'Shimano XT', b'1'),
(24, NULL, 'SRAM X5', b'1'),
(25, 27, 'Tiagra rapidfire', b'1'),
(26, 27, 'Sora rapidfire', b'1'),
(27, 27, 'Dura Ace', b'1'),
(28, 27, 'Ultegra Dual Control', b'1'),
(29, 27, '105', b'1'),
(30, 27, 'XT ispec', b'1'),
(31, 27, 'XT ispec', b'1'),
(32, 27, 'SLX ispec', b'1'),
(33, 27, 'Deore ispec', b'1'),
(34, 27, 'Tiagra Dual Control', b'1'),
(35, 27, 'Tiagra Dual Control', b'1'),
(36, 27, 'Sora Dual control', b'1'),
(37, 27, 'Claris', b'1'),
(38, 27, 'Dura Ace Di2', b'1'),
(39, NULL, 'Campagnolo Athena Carbon', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `speed`
--

CREATE TABLE IF NOT EXISTS `speed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `valid` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `speed`
--

INSERT INTO `speed` (`id`, `name`, `valid`) VALUES
(9, '10', b'1'),
(10, '3x9', b'1'),
(11, '3x7', b'1'),
(12, '3x8', b'1'),
(13, '1x11', b'1'),
(14, '2x10', b'1'),
(15, '3x10', b'1'),
(16, '1x10', b'1'),
(17, '1x8', b'1'),
(18, '2x9', b'1'),
(19, '2X11', b'1'),
(20, '2x8', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_product`
--

CREATE TABLE IF NOT EXISTS `sub_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `sub_product`
--

INSERT INTO `sub_product` (`id`, `name`, `insert_date`, `available`) VALUES
(2, 'XC', '2012-04-16 00:00:00', NULL),
(3, 'Sosea', '2012-04-16 00:00:00', NULL),
(4, 'Maraton', '2012-04-16 00:00:00', NULL),
(5, 'Downhill', '2012-04-16 00:00:00', NULL),
(6, 'MTB Hobby', '2013-05-14 06:09:18', 1),
(7, 'MTB Spotr, XC, Maraton', '2013-05-14 06:10:44', 1),
(8, 'DH Freeride', '2013-05-14 06:11:46', 1),
(9, 'BMX', '2013-05-14 06:12:09', 1),
(10, 'Oras', '2013-05-14 06:13:18', 1),
(11, 'Treking', '2013-05-14 06:18:59', 1),
(12, 'Copii', '2013-05-14 06:19:20', 1),
(13, 'Sosea', '2013-05-14 06:57:14', NULL),
(14, 'Sosea, Tura, Fitnes', '2013-11-13 15:21:48', NULL),
(15, 'All Mountain', '2013-12-16 21:47:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1390251555),
('m140120_183806_user_rights', 1390251555);

-- --------------------------------------------------------

--
-- Table structure for table `tire`
--

CREATE TABLE IF NOT EXISTS `tire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tire_maker_id` (`maker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tire`
--

INSERT INTO `tire` (`id`, `maker_id`, `name`, `valid`) VALUES
(1, 36, 'Igniter', 1),
(2, NULL, 'Ikon', 1),
(3, NULL, 'Merida 2.1', 1),
(4, NULL, 'Merida 2.1', 1),
(5, NULL, 'Schwalbe Hans Dampf', 1),
(6, NULL, 'Schwalbe Hans Dampf', 1),
(7, NULL, 'Schwalbe Hans Dampf 2.4', 1),
(8, NULL, 'Schwalbe Hans Dampf 2.4', 1),
(9, NULL, 'Maxxis Aspen 2.1', 1),
(10, NULL, 'Maxxis Aspen 2.1', 1),
(11, NULL, 'Schwalbe Racing Ralph 2.25', 1),
(12, NULL, 'Schwalbe Racing Ralph 2.25', 1),
(13, NULL, 'Maxxis Crossmark', 1),
(14, NULL, 'Maxxis Crossmark 2.1', 1),
(15, NULL, 'Continental X-King 2.2', 1),
(16, NULL, 'Continental X-King 2.2', 1),
(17, NULL, 'Merida Race Lite 2.1', 1),
(18, NULL, 'Merida Race Lite 2.1', 1),
(19, NULL, 'Merida Race 2.1', 1),
(20, NULL, 'Merida Race 2.1', 1),
(21, NULL, 'Merida 2.2', 1),
(22, NULL, 'Merida 2.2', 1),
(23, NULL, 'Schwalbe Racing Ralph 2.1 Evo', 1),
(24, NULL, 'Schwalbe Racing Ralph 2.1 Evo', 1),
(25, NULL, 'Schwalbe Racing Ralph 2.1 Performance', 1),
(26, 36, 'Schwalbe Racing Ralph 2.1 Performance', 1),
(27, NULL, 'Swalbe Rocket Ron 2.1 Performance', 1),
(28, NULL, 'Schwalbe Rocket Ron 2.1 Performance', 1),
(29, NULL, 'Merida 1.95', 1),
(30, NULL, 'Schwalbe Smart Sam perf', 1),
(31, NULL, 'Merida speed lite 40KV', 1),
(32, NULL, 'Merida speed 40 ref', 1),
(33, NULL, 'Cross 40C', 1),
(34, NULL, 'Magic Mary', 1),
(35, NULL, 'Maxxis Minion DHR II 2.4', 1),
(36, NULL, 'Maxxis Detonator 28 60', 1),
(37, NULL, 'Maxxis Detonator 32', 1),
(38, NULL, 'Continental Grand Prix 4000s 25kv', 1),
(39, NULL, 'Continental Grand Sport Race 25', 1),
(40, NULL, 'Continental Ultra Sport II', 1),
(41, 36, 'Nobby Nic 2.35 Evo fold', 1),
(42, 36, 'Nobby Nic 2.35 performance fold', 1),
(43, NULL, 'Maxxis Aspen 29 Exception 2.1', 1),
(44, 36, 'Racing Ralph Evo 29 2.25 ', 1),
(45, NULL, 'Kenda K193 ', 1),
(46, NULL, 'Continental Grand Prix 4000S 23 kv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `password_hash` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `telephone` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `confirmation_code` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_user_email` (`email`),
  KEY `user_status` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `password_hash`, `first_name`, `last_name`, `email`, `last_login`, `telephone`, `status_id`, `confirmation_code`) VALUES
(1, 'boneshaker_admin', '21232f297a57a5a743894a0e4a801fc3', '', 'Boneshaker', 'Admin', 'boneshaker@mailinator.com', NULL, NULL, 1, NULL),
(2, 'orban.laszlo@mailinator.com', 'da315965003fce1bfb8bbeca5a8afbad', '560cde0d2bc7b61a2f7f49f9fdb7250b', NULL, NULL, 'orban.laszlo@mailinator.com', NULL, NULL, 7, '3f495ceaf73d4885ae31c79b0d610592'),
(3, 'orban.laszlo1@mailinator.com', '1de8c6c088436cf7bd2f0961af4dd9b2', 'e8614fe65b015a5099e563244aa579b9', NULL, NULL, 'orban.laszlo1@mailinator.com', NULL, NULL, 7, 'cb4f29a99cfbbbb72dc75bb9f81064ba'),
(4, 'orban.laszlo2@mailinator.com', '35a6f1104d4986d6e614068707a89abd', '4a8393a2163b76e82f918dfe1bba3c64', 'Laszlo', 'Orban', 'orban.laszlo2@mailinator.com', NULL, NULL, 1, '0288b51f6f0210bdb61b466ed3cd9127'),
(5, 'orban.laszlo3@mailinator.com', '37599a1163bb951fe09f92458438a7b5', '70775f7c32ca8af7af5500e7a0eafa65', NULL, NULL, '5orban.laszlo3@mailinator.com', NULL, NULL, 7, '0893a1a42558af78b25193f1339dcc9a'),
(8, 'orban.laszlo11@mailinator.com', 'bde67b7e77bd42a7632a6c3cee44aec6', '3d7a97c43109304eb2e9e934c127703b', NULL, NULL, 'orban.laszlo11@mailinator.com', NULL, NULL, 7, '5fd83695fdce0e9002c6322658bc256b'),
(9, 'laci22002@gmail.com', '9013d74bf8c32b3c125317bcab79c36a', '614c8f72b00ab6b3badeec8f7609fa6a', NULL, NULL, 'laci22002@gmail.com', NULL, NULL, 7, 'f1de6e61c817f924a318606453d5cbad'),
(10, 'laci22002@yahoo.com', 'ac55a7f611f6752822c20b877287761c', 'e2acbbd8a183b4d673d840d68fa847d7', 'Laszlo', 'Orban', 'laci22002@yahoo.com', NULL, NULL, 7, '72146ff4107e8047fc4ebbce5f79e3e2'),
(11, 'bone_auth', 'f02801715140909e1a8f88b0e1b815f7', 'e78069bb589b19ffefe1493726c166f0', 'Bone', 'Authority', 'orban.laszlo@yahoo.com', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Deleted'),
(4, 'Unconfirmed'),
(5, 'Confirmed'),
(6, 'Locked'),
(7, 'Email not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `wheel_size`
--

CREATE TABLE IF NOT EXISTS `wheel_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wheel_size`
--

INSERT INTO `wheel_size` (`id`, `name`, `valid`) VALUES
(1, '700', 1),
(2, '27.5', 1),
(3, '26', 1),
(4, '29', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bb_set`
--
ALTER TABLE `bb_set`
  ADD CONSTRAINT `bb_set_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `bicycle_description`
--
ALTER TABLE `bicycle_description`
  ADD CONSTRAINT `bicycle_description_bb_set` FOREIGN KEY (`bb_set_id`) REFERENCES `bb_set` (`id`),
  ADD CONSTRAINT `bicycle_description_brake_lever` FOREIGN KEY (`brake_lever_id`) REFERENCES `brake_lever` (`id`),
  ADD CONSTRAINT `bicycle_description_brake_system` FOREIGN KEY (`brake_system_id`) REFERENCES `brake_system` (`id`),
  ADD CONSTRAINT `bicycle_description_chain` FOREIGN KEY (`chain_id`) REFERENCES `chain` (`id`),
  ADD CONSTRAINT `bicycle_description_chain_wheel` FOREIGN KEY (`chain_wheel_id`) REFERENCES `chain_wheel` (`id`),
  ADD CONSTRAINT `bicycle_description_derailleur_front` FOREIGN KEY (`derailleur_front_id`) REFERENCES `derailleur` (`id`),
  ADD CONSTRAINT `bicycle_description_derailleur_rear` FOREIGN KEY (`derailleur_rear_id`) REFERENCES `derailleur` (`id`),
  ADD CONSTRAINT `bicycle_description_front_hub` FOREIGN KEY (`front_hub_id`) REFERENCES `hub` (`id`),
  ADD CONSTRAINT `bicycle_description_front_rear_rim_id` FOREIGN KEY (`front_rear_rim_id`) REFERENCES `rim` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_description_front_rear_tire_id` FOREIGN KEY (`front_rear_tire_id`) REFERENCES `tire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_description_front_rim` FOREIGN KEY (`front_rim_id`) REFERENCES `rim` (`id`),
  ADD CONSTRAINT `bicycle_description_front_tire_id` FOREIGN KEY (`front_tire_id`) REFERENCES `tire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_description_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `bicycle_description_ibfk_2` FOREIGN KEY (`frame_id`) REFERENCES `frame` (`id`),
  ADD CONSTRAINT `bicycle_description_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `bicycle_size` (`id`),
  ADD CONSTRAINT `bicycle_description_ibfk_4` FOREIGN KEY (`speed_id`) REFERENCES `speed` (`id`),
  ADD CONSTRAINT `bicycle_description_ibfk_5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `bicycle_description_rear_hub` FOREIGN KEY (`rear_hub_id`) REFERENCES `hub` (`id`),
  ADD CONSTRAINT `bicycle_description_rear_rim` FOREIGN KEY (`rear_rim_id`) REFERENCES `rim` (`id`),
  ADD CONSTRAINT `bicycle_description_rear_shock_id` FOREIGN KEY (`rear_shock_id`) REFERENCES `rear_shock` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_description_rear_tire_id` FOREIGN KEY (`rear_tire_id`) REFERENCES `tire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_description_wheel_size` FOREIGN KEY (`wheel_size_id`) REFERENCES `wheel_size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicycle_descripton_fork` FOREIGN KEY (`fork_id`) REFERENCES `fork` (`id`),
  ADD CONSTRAINT `bicycle_descripton_shifer` FOREIGN KEY (`shifter_id`) REFERENCES `shifter` (`id`);

--
-- Constraints for table `brake_lever`
--
ALTER TABLE `brake_lever`
  ADD CONSTRAINT `brake_lever_maker_id` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `brake_system`
--
ALTER TABLE `brake_system`
  ADD CONSTRAINT `brake_system_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `chain`
--
ALTER TABLE `chain`
  ADD CONSTRAINT `chain_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `chain_wheel`
--
ALTER TABLE `chain_wheel`
  ADD CONSTRAINT `chain_wheel_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `derailleur`
--
ALTER TABLE `derailleur`
  ADD CONSTRAINT `derailleur_maker_id` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `fork`
--
ALTER TABLE `fork`
  ADD CONSTRAINT `fork_maker_id` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `frame`
--
ALTER TABLE `frame`
  ADD CONSTRAINT `frame_ibfk_1` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `home_page_product`
--
ALTER TABLE `home_page_product`
  ADD CONSTRAINT `home_page_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `hub`
--
ALTER TABLE `hub`
  ADD CONSTRAINT `hub_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `itemchildren`
--
ALTER TABLE `itemchildren`
  ADD CONSTRAINT `itemchildren_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemchildren_ibfk_2` FOREIGN KEY (`child`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maker`
--
ALTER TABLE `maker`
  ADD CONSTRAINT `maker_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`id`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_order_id` FOREIGN KEY (`order_id`) REFERENCES `photo_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photo_source`
--
ALTER TABLE `photo_source`
  ADD CONSTRAINT `photo_source_photo_id` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_source_photo_type_id` FOREIGN KEY (`photo_type_id`) REFERENCES `photo_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_accessory_sub_type_id` FOREIGN KEY (`accessory_sub_type_id`) REFERENCES `accessory_sub_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_component_sub_type_id` FOREIGN KEY (`component_sub_type_id`) REFERENCES `component_sub_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_component_type_id` FOREIGN KEY (`component_type_id`) REFERENCES `component_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_equipment_type_id` FOREIGN KEY (`equipment_type_id`) REFERENCES `equipment_type` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`sub_product_id`) REFERENCES `sub_product` (`id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`accessory_type_id`) REFERENCES `accessory_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_keywords`
--
ALTER TABLE `product_keywords`
  ADD CONSTRAINT `product_keyword_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rear_shock`
--
ALTER TABLE `rear_shock`
  ADD CONSTRAINT `rear_shock_maker_id` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rim`
--
ALTER TABLE `rim`
  ADD CONSTRAINT `rim_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `shifter`
--
ALTER TABLE `shifter`
  ADD CONSTRAINT `shifter_maker` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `tire`
--
ALTER TABLE `tire`
  ADD CONSTRAINT `tire_maker_id` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
