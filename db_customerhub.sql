-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 05:07 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_customerhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_password` varchar(10) NOT NULL,
  `Admin_contact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_password`, `Admin_contact`) VALUES
(100, '_admin_', '9731113846');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Custid` int(12) DEFAULT NULL,
  `bill_id` int(11) NOT NULL,
  `Cust_name` varchar(250) DEFAULT NULL,
  `bill_date` datetime DEFAULT NULL,
  `total_amt` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Custid`, `bill_id`, `Cust_name`, `bill_date`, `total_amt`) VALUES
(153, 11, 'Prashwi', '2021-07-11 03:46:23', 70.00),
(153, 12, 'Prashwi', '2021-07-11 03:47:22', 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `chan_name` varchar(100) DEFAULT NULL,
  `chan_category` varchar(50) DEFAULT NULL,
  `chan_rate` float(10,2) DEFAULT NULL,
  `chan_id` int(11) NOT NULL,
  `pack_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`chan_name`, `chan_category`, `chan_rate`, `chan_id`, `pack_no`) VALUES
('SONY WAH', 'MOVIES', 14.00, 2, 6),
('SONY MARATHI', 'GEC', 11.00, 3, 6),
('SONY PAL', 'SONY INDIA', 12.00, 4, 6),
('SONY YAY', 'KIDS', 10.00, 5, 6),
('ZEE NEWS', 'NEWS', 10.00, 6, 7),
('SONY MAX', 'MOVIES', 25.00, 7, 6),
('ZEE ACTION', 'MOVIES', 14.00, 8, 7),
('ZEE KANNADA', 'GEC', 12.00, 9, 7),
('ZEE HINDUSTAN', 'NEWS', 14.00, 10, 7),
('ZEE ZEST', 'INFO', 9.00, 11, 7),
('WION', 'NEWS', 9.00, 12, 7),
('UDAYA MUSIC', 'SUN GROUP', 12.00, 13, 8),
('UDAYA TV', 'GEC', 12.00, 14, 8),
('UDAYA MOVIES', 'MOVIES', 14.00, 15, 8),
('UDAYA COMEDY', 'GEC', 11.00, 16, 8);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pack_no` int(100) DEFAULT NULL,
  `Custid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE `package_detail` (
  `pack_no` int(11) NOT NULL,
  `pack_name` varchar(100) DEFAULT NULL,
  `pack_rate` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`pack_no`, `pack_name`, `pack_rate`) VALUES
(6, 'SONY INDIA 31', 70.00),
(7, 'ZEE PRIME PACK KANNADA-SD', 60.00),
(8, 'SUN BOUQUET 7 KANNADA BASIC', 60.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `CustId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`CustId`, `name`, `email`, `phone`, `address`) VALUES
(148, 'Pavan Kumar Shetty', 'Pavanshetty123@gmail.com', 2147483647, 'Mukka,Surathkal,Karnataka'),
(149, 'Vasthavi', 'vasthavi08@gmail.com', 2147483647, 'Keertheshwar, Manjeshwar, Kasaragodu, Kerala - 671323'),
(153, 'Vanitha Ashok', 'vanitha123@gmail.com', 2147483647, 'Mogarnaad, Panemangalore, bantwal'),
(156, 'Prashwi', 'Sangeeta123@gmail.com', 2147483647, 'Devinagara,'),
(157, 'Vilas', 'VaishnuVilas@gmail.com', 2147483647, 'kerala'),
(158, 'Prashwi', 'vasthavi05@gmail.com', 2147483647, 'Devinagara,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `Custid` (`Custid`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`chan_id`,`pack_no`),
  ADD KEY `pack_no` (`pack_no`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD KEY `pack_no` (`pack_no`),
  ADD KEY `Custid` (`Custid`);

--
-- Indexes for table `package_detail`
--
ALTER TABLE `package_detail`
  ADD PRIMARY KEY (`pack_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CustId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `chan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `package_detail`
--
ALTER TABLE `package_detail`
  MODIFY `pack_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `CustId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`Custid`) REFERENCES `users` (`CustId`);

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_ibfk_1` FOREIGN KEY (`pack_no`) REFERENCES `package_detail` (`pack_no`) ON DELETE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`pack_no`) REFERENCES `package_detail` (`pack_no`),
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`Custid`) REFERENCES `users` (`CustId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
