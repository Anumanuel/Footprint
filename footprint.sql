-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 15, 2022 at 03:13 PM
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
-- Database: `footprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'anush', 'anush123@gmail.com', 'anush123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`brand_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_img`, `cat_id`, `brand_status`) VALUES
(1, 'Nike', '', 5, '1'),
(2, 'Adidas ', '', 5, '1'),
(3, 'Puma', '', 5, '1'),
(4, 'Sparx', '', 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_img_back` varchar(255) NOT NULL,
  `cat_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `cat_id_2` (`cat_id`),
  KEY `cat_id_3` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`, `cat_img_back`, `cat_status`) VALUES
(1, 'Men', 'men02.png', 'red-black-brush-stroke-banner-background-perfect-canva.jpg', '1'),
(2, 'Women', 'women01.png', 'purple-pink-watercolor-texture-background.jpg', '1'),
(3, 'Kids', 'kids04.png', 'abstract-smooth-orange-background-layout-designstudioroom-web-template-business-report-with-smooth-c.jpg', '1'),
(4, 'Slippers', 'slipper.png', 'old-cement-wall-texture.jpg', '1'),
(5, 'Shoes', 'shoe-pair-2.png', 'abstract-luxury-gradient-blue-background-smooth-dark-blue-with-black-vignette-studio-banner.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_email` varchar(100) NOT NULL,
  `b_number` varchar(100) NOT NULL,
  `b_address` text NOT NULL,
  `b_country` varchar(100) NOT NULL,
  `b_state` varchar(100) NOT NULL,
  `b_city` varchar(100) NOT NULL,
  `b_pin` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_number` varchar(100) NOT NULL,
  `s_address` varchar(200) NOT NULL,
  `order_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `order_date` timestamp NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `r_id` (`r_id`),
  KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `r_id`, `unique_id`, `b_name`, `b_email`, `b_number`, `b_address`, `b_country`, `b_state`, `b_city`, `b_pin`, `s_name`, `s_number`, `s_address`, `order_status`, `order_date`) VALUES
(1, 1, 2507, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-09 08:43:02'),
(2, 1, 9563, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-09 08:43:38'),
(3, 1, 1390, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-09 08:44:08'),
(4, 1, 5870, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-09 10:04:24'),
(5, 1, 5980, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-19 16:23:03'),
(6, 1, 7916, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-26 07:26:11'),
(7, 1, 2563, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-26 08:00:31'),
(8, 1, 5323, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-26 08:02:13'),
(9, 1, 8753, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:02:59'),
(10, 1, 3615, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:04:14'),
(11, 1, 2044, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:05:18'),
(12, 1, 7243, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:05:25'),
(13, 1, 4231, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:07:12'),
(14, 1, 4344, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:09:05'),
(15, 1, 4695, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-26 08:11:25'),
(16, 1, 4675, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-26 08:14:00'),
(17, 1, 8331, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 05:44:45'),
(18, 1, 2689, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '2', '2022-08-27 07:40:28'),
(19, 1, 4056, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 07:41:17'),
(20, 1, 2066, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:52:23'),
(21, 1, 2285, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:52:48'),
(22, 1, 1387, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:54:29'),
(23, 1, 5480, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:57:14'),
(24, 1, 2576, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:57:50'),
(25, 1, 9853, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 11:59:51'),
(26, 1, 5939, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 12:00:15'),
(27, 1, 6147, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 15:22:01'),
(28, 1, 5004, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 15:22:39'),
(29, 1, 3425, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 15:25:06'),
(30, 1, 9726, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-27 15:25:48'),
(31, 1, 7031, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-29 05:27:07'),
(32, 1, 4333, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-29 05:45:55'),
(33, 1, 5147, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-29 05:46:28'),
(34, 1, 1760, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-08-29 05:52:46'),
(35, 4, 1537, 'Anush', 'anush323@gmail.com', '9148265569', 'udupi,karnataka', 'India', 'Karnataka', 'Udupi', '574122', 'Anush', '9148265569', 'udupi,karnataka', '1', '2022-08-29 06:45:54'),
(36, 1, 2170, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-03 08:57:42'),
(37, 1, 2062, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-03 09:00:28'),
(38, 1, 2801, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-03 09:01:32'),
(39, 1, 2512, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-06 06:45:35'),
(40, 1, 4258, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-06 07:35:37'),
(41, 1, 7820, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-06 07:36:26'),
(42, 1, 7379, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-10 08:55:08'),
(43, 1, 7763, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-13 05:21:53'),
(44, 1, 3982, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-13 05:22:28'),
(45, 1, 2926, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-13 12:08:56'),
(46, 1, 8302, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-13 12:09:31'),
(47, 1, 9593, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'Anush K R', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', '1', '2022-09-20 04:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders_list`
--

DROP TABLE IF EXISTS `orders_list`;
CREATE TABLE IF NOT EXISTS `orders_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `unique_id` varchar(25) NOT NULL,
  `pro_qty` varchar(100) NOT NULL,
  PRIMARY KEY (`list_id`),
  KEY `pro_id` (`pro_id`),
  KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_list`
--

INSERT INTO `orders_list` (`list_id`, `pro_id`, `unique_id`, `pro_qty`) VALUES
(1, 2, '2507', '1'),
(2, 1, '9563', '1'),
(3, 1, '1390', '4'),
(4, 2, '5870', '1'),
(5, 4, '5980', '3'),
(6, 6, '7916', '1'),
(7, 2, '2563', '1'),
(8, 2, '5323', '1'),
(9, 2, '8753', '1'),
(10, 2, '3615', '1'),
(11, 2, '2044', '1'),
(12, 2, '7243', '1'),
(13, 2, '4231', '1'),
(14, 2, '4344', '1'),
(15, 2, '4695', '1'),
(16, 2, '4675', '1'),
(17, 2, '8331', '3'),
(18, 6, '2689', '2'),
(19, 6, '4056', '1'),
(20, 2, '2066', '1'),
(21, 2, '2285', '1'),
(22, 2, '1387', '20'),
(23, 2, '5480', '1'),
(24, 7, '2576', '6'),
(25, 7, '9853', '2'),
(26, 7, '5939', '3'),
(27, 1, '6147', '1'),
(28, 1, '5004', '3'),
(29, 2, '3425', '1'),
(30, 1, '9726', '1'),
(31, 6, '7031', '1'),
(32, 6, '4333', '1'),
(33, 4, '4333', '1'),
(34, 6, '5147', '1'),
(35, 4, '5147', '1'),
(36, 1, '1760', '1'),
(37, 9, '1760', '1'),
(38, 2, '1537', '1'),
(39, 9, '1537', '1'),
(40, 2, '2170', '1'),
(41, 2, '2062', '1'),
(42, 2, '2801', '1'),
(43, 2, '2512', '1'),
(44, 2, '4258', '1'),
(45, 2, '7820', '1'),
(46, 9, '7379', '1'),
(47, 1, '7763', '1'),
(48, 1, '3982', '1'),
(49, 1, '2926', '1'),
(50, 1, '8302', '2'),
(51, 2, '8302', '1'),
(52, 6, '9593', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) NOT NULL,
  `pro_gender` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `pro_detail` text NOT NULL,
  `pro_detail_long` text NOT NULL,
  `pro_pre_price` varchar(2000) NOT NULL,
  `pro_price` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_quantity` varchar(255) NOT NULL,
  `pro_status` enum('0','1') NOT NULL DEFAULT '1',
  `pro_added` timestamp NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `pro_id` (`pro_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_gender`, `pro_detail`, `pro_detail_long`, `pro_pre_price`, `pro_price`, `brand_id`, `cat_id`, `pro_quantity`, `pro_status`, `pro_added`) VALUES
(1, 'Nike', '1', 'Men Black Court Legacy nN Sneakers', 'Whenever you see the Nike Sunburst or the name Next Nature (NN), \r\nyou see one more step on our journey towards zero carbon and zero waste.\r\nPebbled leather gives you high-quality durability and comfort.\r\nFull-length rubber outsole with herringbone pattern delivers multi-surface traction.\r\nCanvas trim\r\nPadded collar', '1500', '1299', 1, 1, '25', '1', '2022-07-25 07:36:43'),
(2, 'Nike ', '1', 'Men Orange OnDeck Thong Flip-Flops', 'A pair of orange solid thong flip-flops\r\nSynthetic upper\r\nCushioned footbed\r\nPatterned rubber outsole\r\nThe foam midsole delivers the perfect amount of lightweight cushioning\r\nSynthetic\r\nWipe with a clean dry cloth', '1999', ' 1440', 1, 1, '20', '1', '2022-07-28 16:24:23'),
(3, 'Nike', '1', 'NikeZoomX Invincible Run Flyknit', 'Mens Road Running Shoes. Keep pushing your runs to the limit. The Nike ZoomX Invincible Run Flyknit 2 keeps you going with the same super-soft feel that lets you feel the potential when your foot hits the pavement. We created the shoe with plenty of snappy responsiveness and our highest level of support to keep you feeling secure and competitive. Its one of our most tested shoes, still designed for you to stay on the track and away from the sidelines.', '5999', '3499', 1, 1, '40', '1', '2022-08-05 05:12:39'),
(4, 'Nike', '2', 'Nike Air Zoom Alphafly NEXT 2', 'Womens Road Racing Shoes. Once you take a few strides in the Nike Air Zoom Alphafly NEXT 2, you will never look at your favourite pair of old racing shoes the same way again. These rocket ships are made to help shave precious time off your personal records without surrendering the foundation you need to go the full distance. A thick, lightweight support system marries the 2 worlds of comfort and speed in holy running matrimony. Enjoy the greatest energy return of all our racing shoes while you chase your personal bests and leave the competition in the dust. Colour Shown: Mint Foam/Volt/Coconut Milk/Cave Purple Style: DV9425-300', '4799', '3599', 1, 2, '30', '1', '2022-08-05 05:42:32'),
(5, 'Nike', '0', 'Nike SB Zoom Blazer Low Pro GT', 'Rebuilt using insights from Grant Taylor, the Nike SB Zoom Blazer Low Pro GT is a fresh take on a favourite skate shoe. The updated design has higher taping to give you more durability. Colour Shown: White/White/White/Black Style: DC7695-100', '4599', '2999', 1, 5, '35', '1', '2022-08-05 08:01:26'),
(6, 'Adidas', '1', 'ADIDAS 4DFWD PULSE SHOES', 'Harness the power of adidas 4D for a smoother run every time the rubber meets the road. These adidas 4DFWD Pulse Shoes have a 3D-printed heel cradle that is precisely angled to guide your foot forward on every step and absorb impact so every run feels easier.\r\nRegular fit\r\nLace closure\r\nTextile upper\r\nadidas 4D midsole\r\nRubber outsole\r\nWeight: 333 g (size U.K. 8.5)\r\nTextile lining\r\nPrimegreen\r\nColor: Core Black / Cloud White / Carbon\r\nProduct code: Q46450', '7999', '4999', 2, 1, '50', '1', '2022-08-05 08:07:53'),
(7, 'Adidas', '3', 'ADIDAS ZX 8000 X LEGOÂ® SHOES', 'BRING A SENSE OF PLAY TO YOUR DAY WITH THE ADIDAS ZX 8000 X LEGOÂ® SHOES.\r\nA toy is something to be played with. These juniors adidas ZX 8000 shoes are a reminder the power of creativity, showcasing the elements that make LEGOÂ® bricks celebrated around the world. Bold colours. Bricks. Have some fun.', '3499', '1999', 2, 3, '50', '1', '2022-08-06 07:53:59'),
(8, 'Adidas', '2', 'ADILETTE SLIDES Wonder Mauve / Cloud White / Wonder Mauve', 'COMFY VELVET SLIDES FOR ALL YOUR LOUNGING NEEDS.\r\nLove it or hate it, sandals with socks is an iconic pairing. Even more iconic? These adidas Adilette slides with the 3-Stripes. We have refined their classic look with soft velvet so you can feel cosy when temperatures get chilly. The perfect weekend companion for lounging around at home while staying super snug.', '1999', '999', 2, 2, '30', '1', '2022-08-06 08:18:50'),
(9, 'Puma', '1', 'PUMA Ketava mens Flip-Flops', 'Lay the style & beat the comfort statement with the PUMA Ketava Mens Flip-Flops an all season favorite , perfect for leisure.\r\nCurved strap for look great feel & fit\r\nPUMA insignia & branding at the footbed\r\nPUMA Logo on the strap\r\nRubber Outsole for great traction\r\nColour: Dark Slate-Spring Blue-Puma Black', '3099', '1299', 3, 4, '20', '1', '2022-08-28 08:48:39'),
(10, 'Puma', '0', 'Galaxy Comfort V3 Unisex Slippers', 'Lounge in comfort with the Galaxy Comfort V3 sandals.\r\n Style: 385316_05\r\nComfortable style by PUMA\r\nPUMA branding details\r\nSignature PUMA design elements\r\n Colour: Mykonos Blue-PUMA White', '2699', '1799', 3, 4, '30', '1', '2022-08-28 09:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `pro_img_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_img_png` varchar(200) NOT NULL,
  `pro_img_1` varchar(255) NOT NULL,
  `pro_img_2` varchar(255) NOT NULL,
  `pro_img_3` varchar(255) NOT NULL,
  `pro_img_4` varchar(200) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_img_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`pro_img_id`, `pro_img_png`, `pro_img_1`, `pro_img_2`, `pro_img_3`, `pro_img_4`, `pro_id`) VALUES
(1, '0afadb3f-9dcb-46f7-9806-4ef2f56f1e071626353632289-Nike-SB-Chron-2-Skate-Shoe-5651626353631889-1.png', '0afadb3f-9dcb-46f7-9806-4ef2f56f1e071626353632289-Nike-SB-Chron-2-Skate-Shoe-5651626353631889-1.jpg', '03f7ce4a-479e-4479-ad3a-9bb76b3bdd301626353632258-Nike-SB-Chron-2-Skate-Shoe-5651626353631889-5.jpg', 'cee49903-3efa-4128-8636-97f70535b7511626353632283-Nike-SB-Chron-2-Skate-Shoe-5651626353631889-2.webp', 'd3ab4e09-e591-4fd2-b541-58b9bfab1ca61626353632268-Nike-SB-Chron-2-Skate-Shoe-5651626353631889-4.jpg', 1),
(2, '2c68f688-754b-4b2f-bd9d-8159df838c331645519582835-Nike-On-Deck-Mens-Flip-Flop-8841645519582458-1.png', '2c68f688-754b-4b2f-bd9d-8159df838c331645519582835-Nike-On-Deck-Mens-Flip-Flop-8841645519582458-1.webp', '2af5d3f8-b908-4d16-bddf-d269d54b3a681645519582828-Nike-On-Deck-Mens-Flip-Flop-8841645519582458-2.webp', '47c1472a-f6d7-4f4c-ad7f-7ac010bfdfbb1645519582804-Nike-On-Deck-Mens-Flip-Flop-8841645519582458-5.webp', '64a9ad69-4d9b-44e4-873f-637b23e68a451645519582796-Nike-On-Deck-Mens-Flip-Flop-8841645519582458-6.webp', 2),
(3, 'f8eeaa87-50a9-4215-9076-ce58798f4688.png', 'zoomx-invincible-run-flyknit-2-road-running-shoes-xrCMmF.jpg', '69956b92-20ab-42b5-9a79-d571413ccef2.webp', 'cec0d008-1c1b-43bc-9819-c798baf760cb.webp', '1f93783e-3335-4921-a41f-896561849878.webp', 3),
(4, 'air-zoom-alphafly-next-2-road-racing-shoes-RPr2Bt.png', '56f25e5a-dbb9-48a8-9115-d5edfbc3fb70.webp', 'air-zoom-alphafly-next-2-road-racing-shoes-RPr2Bt.jpg', 'air-zoom-alphafly-next-2-road-racing-shoes-RPr2Bt (1).jpg', '4cf14c5f-a716-4690-a431-0438f6555b14.webp', 4),
(7, '1659686536_f738286c-96d8-4653-908b-92ae80bb1809.png', '1659686536_f738286c-96d8-4653-908b-92ae80bb1809.webp', '1659686536_3235c926-42d8-4847-aad0-200823e91a70.webp', '1659686536_e039906f-d10e-49d2-a729-d2d55f0ebc97.webp', '1659686536_sb-zoom-blazer-low-pro-gt-skate-shoes-ckWK6g.jpg', 5),
(8, 'eb3976c263224980b2c9ad2600cc1596_9366.png', 'eb3976c263224980b2c9ad2600cc1596_9366.webp', '839c5cebe5a44664ba87ad470114e8b5_9366.webp', '5f984b37dae74246a562ad2600cc22a3_9366.webp', '5678914a4ba349e09229ad2600cc2759_9366.webp', 6),
(9, 'adidas_ZX_8000_x_LEGO(r)_Shoes_Green_GZ8208_04_standard.png', 'adidas_ZX_8000_x_LEGO(r)_Shoes_Green_GZ8208_04_standard.jpg', 'adidas_ZX_8000_x_LEGO(r)_Shoes_Green_GZ8208_02_standard.jpg', 'f0c8110433044e0abcd9acc90172c34c_9366.webp', 'b2fc319302d84f77aba9acc901765ac2_9366.webp', 7),
(10, 'b239e452d2ff419e88ceade4014712fc_9366.png', 'Adilette_Slides_Pink_GX3372_02_standard_hover (2).jpg', 'a1d973c2fe2a43e0a26cade40146c62b_9366.webp', '38f506da71b841ef8f65ade40147305f_9366.webp', '464d86931ddb464bb75dade401472779_9366.webp', 8),
(11, 'PUMA-Ketava-Men-Flip-Flops.png', 'PUMA-Ketava-Mens-Flip-Flops.webp', 'PUMA-Ketava-Mens-Flip-Flops (1).webp', 'PUMA-Ketava-Mens-Flip-Flops (2).webp', 'PUMA-Ketava-Men-Flip-Flops.jpg', 9),
(12, 'Galaxy-Comfort-V3 - Unisex-Slippers.png', 'Galaxy-Comfort-V3--Unisex-Slippers.webp', 'Galaxy-Comfort-V3--Unisex-Slippers.jpg', 'Galaxy-Comfort-V3--Unisex-Slippers (1).webp', 'Galaxy-Comfort-V3--Unisex-Slippers (3).webp', 10);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_fname` varchar(255) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_number` varchar(255) NOT NULL,
  `r_address` varchar(255) DEFAULT NULL,
  `r_country` varchar(255) DEFAULT NULL,
  `r_states` varchar(255) DEFAULT NULL,
  `r_city` varchar(255) DEFAULT NULL,
  `r_pincode` varchar(255) DEFAULT NULL,
  `r_password` varchar(255) NOT NULL,
  `r_regdate` timestamp NOT NULL,
  `r_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`r_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `r_fname`, `r_email`, `r_number`, `r_address`, `r_country`, `r_states`, `r_city`, `r_pincode`, `r_password`, `r_regdate`, `r_status`) VALUES
(1, 'Anush K R', 'anush333@gmail.com', '9148265569', 'Bajagoli, Koodabettu road, Karkala, Udupi', 'India', 'Karnataka', 'Karkala', '574122', 'anush333', '2022-07-12 18:30:00', '1'),
(2, 'vinush', 'vinush123@gmail.com', '9632440464', NULL, NULL, NULL, NULL, NULL, 'vinush123', '2022-07-15 16:28:39', '1'),
(3, 'Reetha', 'reetha333@gmail.com', '9632440464', '', '', '', '', '', 'reetha333', '2022-08-27 07:35:30', '1'),
(4, 'Anush', 'anush323@gmail.com', '9148265569', 'udupi,karnataka', 'India', 'Karnataka', 'Udupi', '574122', 'anush323', '2022-08-29 06:09:55', '1'),
(5, 'anush', 'anush007@gmail.com', '9148265569', NULL, NULL, NULL, NULL, NULL, 'anush007', '2022-09-06 06:37:10', '1'),
(6, 'Manuel', 'manuel333@gmail.com', '9148264405', NULL, NULL, NULL, NULL, NULL, 'manuel333', '2022-09-13 05:39:19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `pro_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `size_7` varchar(200) NOT NULL,
  `size_8` varchar(200) NOT NULL,
  `size_9` varchar(200) NOT NULL,
  `size_10` varchar(200) NOT NULL,
  `size_11` varchar(200) NOT NULL,
  PRIMARY KEY (`pro_size_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`pro_size_id`, `pro_id`, `size_7`, `size_8`, `size_9`, `size_10`, `size_11`) VALUES
(1, 1, '0', '4', '0', '10', '1'),
(2, 8, '4', '19', '3', '7', '2'),
(3, 2, '10', '0', '2', '4', '0'),
(4, 3, '9', '4', '2', '0', '1'),
(5, 4, '0', '10', '9', '3', '1'),
(6, 5, '4', '26', '7', '0', '9'),
(7, 6, '7', '6', '10', '10', '9'),
(8, 7, '5', '4', '1', '4', '9'),
(9, 9, '6', '7', '8', '0', '10'),
(10, 10, '7', '0', '7', '8', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brand_type` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `register` FOREIGN KEY (`r_id`) REFERENCES `registration` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_list`
--
ALTER TABLE `orders_list`
  ADD CONSTRAINT `productid` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `brandsid` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `pro_img` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `prosize` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
