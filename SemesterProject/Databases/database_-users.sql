-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2021 at 12:08 AM
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
-- Database: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `AccNumber` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Username`, `Email`, `Password`, `AccNumber`) VALUES
('JohnDoe1', 'JohnDoe@person.com', 'doejohn', '00000001'),
('Test', 'Test@test.com', 'test123', '00000002'),
('Test1', 'a', 'a', '00000003'),
('vb', 'b', 'b', '00000004'),
('Admin', 'Admin@techquest.com', 'nimdA', '00000000'),
('', '', '', ''),
('test', 'test@test.com', 'test1', '00000005'),
('JaneDoe', 'JaneDoe@does.com', 'janice', '00000006'),
('druen1', 'ggdruen@gmail.com', '1234', '00000007'),
('moseln', 'moseln@lopers.edu', 'pass', '00000008');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Item` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `AccNumber` text NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Item`, `Quantity`, `AccNumber`, `Category`) VALUES
('Ryzen 7 3700X', 4, '00000001', 'cpu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
