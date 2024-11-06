-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 06, 2024 at 01:45 PM
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
-- Table structure for table `ElectronicsProducts`
--

CREATE TABLE IF NOT EXISTS `ElectronicsProducts` (
`ElectronicsProductID` int(11) NOT NULL,
  `ElectronicsProductCode` varchar(10) NOT NULL,
  `ElectronicsProductName` varchar(255) NOT NULL,
  `ElectronicsDescription` text NOT NULL,
  `ElectronicsModel` varchar(50) NOT NULL,
  `ElectronicsSize` varchar(10) DEFAULT NULL,
  `ElectronicsColor` varchar(30) DEFAULT NULL,
  `ElectronicsCategoryID` int(11) NOT NULL,
  `ElectronicsWholesalePrice` decimal(10,2) NOT NULL,
  `ElectronicsListPrice` decimal(10,2) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `ElectronicsProducts`
--

INSERT INTO `ElectronicsProducts` (`ElectronicsProductID`, `ElectronicsProductCode`, `ElectronicsProductName`, `ElectronicsDescription`, `ElectronicsModel`, `ElectronicsSize`, `ElectronicsColor`, `ElectronicsCategoryID`, `ElectronicsWholesalePrice`, `ElectronicsListPrice`, `DateCreated`) VALUES
(18, 'IP', 'iP', 'Latest iPhone 16 Model TEST77', 'IPHONE16TESTER77', NULL, NULL, 66, 799.00, 899.00, '2024-10-10 08:36:20'),
(19, 'SAMS23', 'Samsung Galaxy S23', 'Samsung’s latest flagship smartphone. Features an advanced camera system.', 'SAMS23', NULL, NULL, 66, 799.00, 999.00, '2024-10-10 08:36:20'),
(20, 'PIXEL7P', 'Google Pixel 7 Pro', 'Pixel’s smartest phone yet. Comes with Google’s most advanced AI.', 'PIXEL7P', NULL, NULL, 66, 799.00, 1049.00, '2024-10-10 08:36:20'),
(21, 'HPENVY', 'HP Envy 13', 'HP Envy Laptop', 'HPENV13', NULL, NULL, 61, 999.00, 1199.00, '2024-10-10 08:36:20'),
(22, 'MACBKM2', 'MacBook M2', 'The latest MacBook powered by the M2 chip. Sleek design with advanced performance.', 'MACBKM2', NULL, NULL, 61, 999.00, 1099.00, '2024-10-10 08:36:20'),
(23, 'DELXPS15', 'Dell XPS 15', 'Powerful laptop built for creators. Known for its stunning display.', 'DELXPS15', NULL, NULL, 61, 1099.00, 1499.00, '2024-10-10 08:36:20'),
(24, 'APLWTCH09', 'Apple Watch Series 9', 'Last Year''s Apple Watch with a stunning display! Offers a Long Lasting Battery Life!', 'WATCH09', NULL, NULL, 62, 299.00, 329.00, '2024-10-10 08:36:20'),
(25, 'FITCHG5', 'Fitbit Charge 5', 'Health tracker with built-in GPS. Monitors heart rate and sleep patterns.', 'FITCHG5', NULL, NULL, 62, 139.00, 169.00, '2024-10-10 08:36:20'),
(26, 'GALSWTCH5', 'Samsung Galaxy Watch 5', 'Samsung’s latest smartwatch with health tracking features. Long-lasting battery life.', 'GALSWTCH5', NULL, NULL, 62, 249.00, 299.00, '2024-10-10 08:36:20'),
(27, 'AIRPODSMPX', 'Apple AirPods Max', 'Apple Noise Cancelling Headphones', 'AIRPDSMAX', NULL, NULL, 63, 499.00, 549.00, '2024-10-10 08:36:20'),
(28, 'BOSE700', 'Bose 700', 'Over-ear wireless headphones with noise cancellation. Premium sound quality.', 'BOSE700', NULL, NULL, 63, 399.00, 499.00, '2024-10-10 08:36:20'),
(29, 'SNYXM4', 'Sony WH-1000XM4', 'Industry-leading noise-cancelling headphones. Crystal clear audio with long battery life.', 'SNYXM4', NULL, NULL, 63, 249.00, 349.00, '2024-10-10 08:36:20'),
(30, 'SONYA7III', 'Sony A7 III', 'Full-frame mirrorless camera', 'SONYA7III', NULL, NULL, 64, 1999.00, 2299.00, '2024-10-10 08:36:20'),
(31, 'CANRE5', 'Canon EOS R5', 'Mirrorless camera with a 45MP sensor. Ideal for professional photographers.', 'CANRE5', NULL, NULL, 64, 3199.00, 3799.00, '2024-10-10 08:36:20'),
(32, 'NIKZ6II', 'Nikon Z6 II', 'High-end mirrorless camera with dual processors. Excellent image quality and video performance.', 'NIKZ6II', NULL, NULL, 64, 1899.00, 2499.00, '2024-10-10 08:36:20'),
(41, '33', 'iPhone 16 Plus', 'The Latest Plus Model for an iPhone. It has a whopping 6.7-inch display!', 'IPHN16P', NULL, NULL, 66, 799.00, 899.00, '2024-10-21 17:42:46'),
(42, '42', 'iPhone 16 Pro', 'The Latest iPhone Pro Model. Larger than Ever Battery Capacity!', 'IPH16PR', NULL, NULL, 66, 899.00, 999.00, '2024-10-21 17:51:28'),
(43, '43', 'iPhone 15', 'The Last Generation iPhone Model. It has a whopping 6.1-inch display!', 'IPHN15', NULL, NULL, 66, 699.00, 799.00, '2024-10-21 17:59:08'),
(44, '44', 'iPhone 15 Pro', 'The Latest iPhone Pro Model. Larger than Ever Battery Capacity!', 'IPN15PR', NULL, NULL, 66, 799.00, 899.00, '2024-10-21 18:07:03'),
(50, '50', 'iPhone 16 Pro Max', 'The Latest Pro Max Model for an iPhone. It has a whopping 6.7-inch display! NOW ON DISCOUNT!!!', 'IPN16MX', NULL, NULL, 66, 999.00, 1099.00, '2024-10-21 18:26:59'),
(53, '505', 'jjdkdsldfdsfdds', 'lkfjsdlfjdkslfjskdfjlskfjlskdjfdsjfksdljfkldjfklsdjfsdkljfkdsjfkldjflkdsjfldjfljfksdjflkdsjflkfjkldfjdjflkjfsdkljfdlskjfdlkfjldjlkfdjfklsdjflsdjdlsfjsdklfjdslfjkldfsjdsljkldsfjdfjlk', 'IPHONE15TSAS', NULL, NULL, 66, 799.00, 899.00, '2024-11-03 15:03:03'),
(54, '507', 'iPhone 14 Pro', 'The iPhone 14 Pro features a powerful A16 Bionic chip, a stunning 48MP camera system, and a sleek design with Dynamic Island for an immersive experience.', 'IPN14P', NULL, NULL, 66, 499.00, 599.00, '2024-11-05 10:38:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ElectronicsProducts`
--
ALTER TABLE `ElectronicsProducts`
 ADD PRIMARY KEY (`ElectronicsProductID`), ADD UNIQUE KEY `ElectronicsProductCode` (`ElectronicsProductCode`), ADD KEY `ElectronicsCategoryID` (`ElectronicsCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ElectronicsProducts`
--
ALTER TABLE `ElectronicsProducts`
MODIFY `ElectronicsProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ElectronicsProducts`
--
ALTER TABLE `ElectronicsProducts`
ADD CONSTRAINT `ElectronicsProducts_ibfk_1` FOREIGN KEY (`ElectronicsCategoryID`) REFERENCES `ElectronicsCategories` (`ElectronicsCategoryID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
