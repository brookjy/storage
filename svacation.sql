-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2018 at 07:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svacation`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_service`
--

CREATE TABLE `food_service` (
  `sid` int(10) NOT NULL,
  `serviceType` varchar(10) COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `service1` int(2) NOT NULL,
  `service2` int(2) NOT NULL,
  `dateToDeliver` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_service`
--

INSERT INTO `food_service` (`sid`, `serviceType`, `time`, `service1`, `service2`, `dateToDeliver`) VALUES
(2, '订餐服务', '2018-01-09', 1, 0, ''),
(3, '订餐服务', '2018-01-10', 1, 0, 'morning'),
(4, '订餐服务', '2018-01-10', 1, 0, 'morning'),
(5, '订餐服务', '2018-01-09', 1, 0, 'morning'),
(6, '订餐服务', '2018-01-10', 1, 0, 'morning'),
(7, '订餐服务', '2018-01-10', 1, 0, 'morning'),
(8, '订餐服务', '2018-01-09', 1, 0, 'night'),
(9, '订餐服务', '2018-01-10', 1, 0, 'noon'),
(10, '订餐服务', '2018-01-10', 1, 0, 'night');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(100) NOT NULL,
  `type` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `specialNote` varchar(50) COLLATE utf8_bin NOT NULL,
  `wishList` varchar(50) COLLATE utf8_bin NOT NULL,
  `additions` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `username` varchar(10) COLLATE utf8_bin NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `weChat` varchar(20) COLLATE utf8_bin NOT NULL,
  `timeDeliver` varchar(20) COLLATE utf8_bin NOT NULL,
  `create_time` date NOT NULL,
  `role` varchar(10) COLLATE utf8_bin NOT NULL,
  `salt` varchar(6) COLLATE utf8_bin NOT NULL,
  `address` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `phone`, `email`, `password`, `weChat`, `timeDeliver`, `create_time`, `role`, `salt`, `address`) VALUES
(1, '123123', 123123123, '123@gmail.com', '6636c5b6dfe2bde7b475', '123123', '123123', '0000-00-00', '1', 'srO6SO', NULL),
(3, '123123', 123, '123@gmail.com', '2b3f9ff145a3bd6d0b3d', '123', '123', '0000-00-00', '1', 'incH45', NULL),
(8, '123123', 123123, '123@gmail.com', '33655145f604b47685346e60c82e1939c80a1a0275294916541e1c5ad370dd60', '123123', '123123', '0000-00-00', '1', 'krNQ4q', NULL),
(9, '321', 321, '123@gmail.com', 'b8db38c2f09709b63c1fe830df03f38fe30b510c7b7c0d11c4f917c6d93010a0', '321', '123', '0000-00-00', '1', '1neVB5', NULL),
(10, '123', 123, '123@gmail.com', '6ec9eac1929f9ec48ce48f9f73cf31ac701b7f644d4f45064edb95bbab6a8214', '123', '123', '0000-00-00', '1', 'eQez4m', NULL),
(11, '123', 123, '123@gmail.com', '446781f77401a0e74650b6515352ad11cd76e20dcd6b5d061566d3e3421b6b5c', '123', '123', '0000-00-00', '1', '7gHfIm', NULL),
(12, '1234', 1234, '1234@gmail.com', 'f0c411f690af6ec854b6037b0acdbad482f220430cc465bcf88bfe717fa4d604', '1234', '1234', '0000-00-00', '1', 'TKmrjj', NULL),
(13, '12345', 123456, '123456@gmail.com', '5093b20eea0b161e1649c5ebe3e95d5733d0a916e84a493a47805c436f56c73b', '12345', '12345', '0000-00-00', '1', '2mfe0a', 'sampleaddress'),
(14, '123456', 123456, '123456@gmail.com', '6315b3bdecf91090dd5f7f28e3aa9f956a4538c7f2f4e21c591214b2a71ca037', '123456', '123456', '2018-01-08', '1', 'i6hLHV', '???');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_service`
--
ALTER TABLE `food_service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_service`
--
ALTER TABLE `food_service`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
