-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2021 at 12:07 AM
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
-- Database: `products`
--
CREATE DATABASE IF NOT EXISTS `products` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `products`;

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

DROP TABLE IF EXISTS `console`;
CREATE TABLE IF NOT EXISTS `console` (
  `Brand` varchar(25) DEFAULT NULL,
  `Item` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Price` float(10,2) DEFAULT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('MICROSOFT', 'Xbox One X', '1TB NBA 2k20 Bundle, Black, CYV-00343', 499.99, NULL, NULL),
('MICROSOFT', 'Xbox Series S', 'Digital Edition Fortnite and Rocket League System Bundle', 299.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

DROP TABLE IF EXISTS `cpu`;
CREATE TABLE IF NOT EXISTS `cpu` (
  `Brand` varchar(25) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('Intel', 'Core i7-12700K', 'Core i7 12th Gen Alder Lake 12-Core (8P+4E) 3.6 GHz LGA 1700 125W Intel UHD Graphics 770 Desktop Processor - BX8071512700K', 449.99, '5.00', 0),
('AMD', 'Ryzen 7 3700x', '3rd Gen - RYZEN 7 3700X Matisse (Zen 2) 8-Core 3.6 GHz (4.4 GHz Max Boost) Socket AM4 65W 100-100000071BOX Desktop Processor', 326.99, '5.00', 0),
('AMD', 'Ryzen 5 3600x', 'Hexa-core (6 Core) 3.80 GHz Processor - Retail Pack - 32 MB Cache - 4.40 GHz Overclocking Speed - 7 nm - Socket AM4 - 95 W - 12 Threads', 322.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

DROP TABLE IF EXISTS `gpu`;
CREATE TABLE IF NOT EXISTS `gpu` (
  `Brand` varchar(25) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('GIGABYTE NVIDIA', 'GeForce RTX 3080', 'GeForce RTX 3080 GAMING OC 10GB GDDR6X PCI Express 4.0 Graphics Card GNU209', 699.99, NULL, NULL),
('MSI', 'GeForce RTX 2060 Super', 'Gaming 8GB GDRR6 256-bit HDMI/DP G-SYNC Turing Architecture Overclocked Graphics Card (RTX 2060 Super Gaming X)', 399.99, NULL, NULL),
('MSI', 'GTX 1650', 'D6 VENTUS XS OCV1 Graphics Card, PCI-E, VR & 4K HDR Ready Video Card', 159.99, NULL, NULL),
('MSI', 'GTX 1660', 'D6 VENTUS XS OCV1 Graphics Card, PCI-E, VR & 4K HDR Ready Video Card', 179.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memory`
--

DROP TABLE IF EXISTS `memory`;
CREATE TABLE IF NOT EXISTS `memory` (
  `Brand` varchar(25) DEFAULT NULL,
  `Item` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Price` float(10,2) DEFAULT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `memory`
--

INSERT INTO `memory` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('CORSAIR', 'Vengeance RGB PRO', '16GB (2PK 8GB) 3.2GHz PC4-25600 DDR4 DIMM Unbuffered Non-ECC Desktop Memory Kit with RGB Lighting - Black', 79.99, NULL, NULL),
('CORSAIR', 'Vengeance LPX', '16GB (2PK x 8GB) 3.2 GHz DDR4 DRAM Desktop Memory Kit - Black', 75.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

DROP TABLE IF EXISTS `motherboard`;
CREATE TABLE IF NOT EXISTS `motherboard` (
  `Brand` varchar(25) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('ASUS ROG', 'STRIX Z490-E GAMING', 'LGA 1200 (Intel 10th Gen) Intel Z490 (WiFi 6) SATA 6Gb/s ATX Intel Motherboard (14+2 Power Stages, DDR4 4600, Intel 2.5 Gb Ethernet, Bluetooth v5.1, Dual M.2 and AURA Sync)', 463.69, NULL, NULL),
('ASUS TUF', 'GAMING Z490-PLUS', '(WI-FI) LGA 1200 (Intel 10th Gen) Intel Z490 (WiFi 6) SATA 6Gb/s ATX Intel Motherboard (Dual M.2, 12+2 Power Stages, USB 3.2 Front Panel Type-C, Intel WiFi 6 & 1Gb LAN, Aura Sync)', 266.90, NULL, NULL),
('ASUS PRIME', 'Z490-A', 'LGA 1200 (Intel 10th Gen) Intel Z490 SATA 6Gb/s ATX Intel Motherboard (14 DrMOS Power Stages, Dual M.2, Intel 2.5Gb Ethernet, USB 3.2 Front Panel Type-C, Thunderbolt 3 Support, Aura Sync RGB)', 229.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

DROP TABLE IF EXISTS `psu`;
CREATE TABLE IF NOT EXISTS `psu` (
  `Brand` varchar(25) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('EVGA', 'GQ Series 850W', 'ATX12V/ EPS12V 80 Plus Gold Modular Power Supply - Black', 159.99, NULL, NULL),
('EVGA', 'BR Series 700W', 'ATX12V /EPS12V 80 Plus Power Supply DC-DC Technology - Black', 79.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ssd`
--

DROP TABLE IF EXISTS `ssd`;
CREATE TABLE IF NOT EXISTS `ssd` (
  `Brand` varchar(25) DEFAULT NULL,
  `Item` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Price` float(10,2) DEFAULT NULL,
  `DiscountVal` decimal(5,2) DEFAULT NULL,
  `DiscountOn` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `ssd`
--

INSERT INTO `ssd` (`Brand`, `Item`, `Description`, `Price`, `DiscountVal`, `DiscountOn`) VALUES
('SAMSUNG', '870 QVO Series', '2.5\" 1TB SATA III V-NAND Internal Solid State Drive (SSD) MZ-77Q1T0B/AM', 109.95, NULL, NULL),
('WESTERN DIGITAL', 'WD BLACK SN850', 'NVMe M.2 2280 1TB PCI-Express 4.0 x4 3D NAND Internal Solid State Drive (SSD) WDS100T1X0E', 160.00, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
