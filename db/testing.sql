-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2023 at 08:17 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

DROP TABLE IF EXISTS `admin_details`;
CREATE TABLE IF NOT EXISTS `admin_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `username`, `password`, `email`) VALUES
(4, 'admin', 'password', 'admin@gmail.com'),
(5, 'nadun', '12345', 'nadun@yahoo.com'),
(6, 'gobbaaysha', 'aysha123', 'aysha@nibm.lk'),
(7, 'eran', 'intel', 'eran@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `name`, `description`, `price`, `photo`, `availability`, `category`) VALUES
(1, 'Asus Laptop', 'High Performance', '840000', 'uploads/laptop.jpg', 'NO', 'laptop'),
(6, 'Iphone 14', 'Best Camera', '569000', 'uploads/iphone.jpg', 'YES', 'phone'),
(8, 'Hand Free', 'Best Quality', '7897', 'uploads/headphone.jpg', 'NO', ''),
(10, 'Macbook Pro', '3Y Warranty', '625000', 'uploads/mac.jpg', 'YES', 'laptop'),
(11, 'Airpod Pro', 'Brand New', '85000', 'uploads/airpod.jpeg', 'YES', ''),
(12, 'Galaxy Buds Pro', 'Best Quality', '48000', 'uploads/buds.webp', 'YES', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
