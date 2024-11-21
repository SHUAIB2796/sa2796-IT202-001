-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 21, 2024 at 03:23 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sa2796`
--

-- --------------------------------------------------------

--
-- Table structure for table `ElectronicsCategories`
--

CREATE TABLE IF NOT EXISTS `ElectronicsCategories` (
`ElectronicsCategoryID` int(11) NOT NULL,
  `ElectronicsCategoryCode` varchar(10) NOT NULL,
  `ElectronicsCategoryName` varchar(255) NOT NULL,
  `AisleNumber` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `ElectronicsCategories`
--

INSERT INTO `ElectronicsCategories` (`ElectronicsCategoryID`, `ElectronicsCategoryCode`, `ElectronicsCategoryName`, `AisleNumber`, `DateCreated`) VALUES
(61, 'LAPT', 'Laptops', 5, '2024-10-09 17:51:03'),
(62, 'SMRTW', 'Smartwatches', 7, '2024-10-09 17:51:03'),
(63, 'HDPH', 'Headphones', 3, '2024-10-09 17:51:03'),
(64, 'DGCAM', 'Digital Cameras', 9, '2024-10-09 17:51:03'),
(66, 'SMART', 'Smartphones', 1, '2024-10-09 18:52:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ElectronicsCategories`
--
ALTER TABLE `ElectronicsCategories`
 ADD PRIMARY KEY (`ElectronicsCategoryID`), ADD UNIQUE KEY `ElectronicsCategoryCode` (`ElectronicsCategoryCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ElectronicsCategories`
--
ALTER TABLE `ElectronicsCategories`
MODIFY `ElectronicsCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
