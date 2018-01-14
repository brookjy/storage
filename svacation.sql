-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2018 at 06:36 AM
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
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `service1` int(2) NOT NULL,
  `service2` int(2) NOT NULL,
  `dateToDeliver` varchar(10) COLLATE utf8_bin NOT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_service`
--

INSERT INTO `food_service` (`sid`, `user`, `serviceToken`, `time`, `service1`, `service2`, `dateToDeliver`, `finish`) VALUES
(28, '2mfe0a', '50045 ', '2018-01-13', 1, 0, 'morning', 0),
(29, '2mfe0a', '79329 ', '2018-01-13', 0, 0, '早', 0),
(30, '2mfe0a', '53165 ', '2018-01-13', 1, 0, '早', 0),
(31, '2mfe0a', '92746 ', '2018-01-13', 0, 0, '晚', 0),
(32, '2mfe0a', '33662 ', '2018-01-14', 0, 0, '早', 0),
(33, '2mfe0a', '80563 ', '2018-01-14', 0, 0, '早', 0),
(34, '2mfe0a', '20944 ', '2018-01-14', 0, 1, '早', 0),
(35, '2mfe0a', '27374 ', '2018-01-14', 1, 1, '中', 0),
(36, '2mfe0a', '48548 ', '2018-01-14', 1, 0, '中', 0),
(37, '2mfe0a', '58603 ', '2018-01-14', 1, 0, '中', 0),
(38, '2mfe0a', '80860 ', '2018-01-12', 1, 0, '早', 0),
(39, '2mfe0a', '72099 ', '2018-01-12', 1, 0, '早', 0),
(40, '2mfe0a', '52617 ', '2018-01-12', 1, 1, '早', 0),
(41, '2mfe0a', '70305 ', '2018-01-12', 1, 1, '早', 0),
(42, '2mfe0a', '85011 ', '2018-01-12', 1, 1, '早', 0),
(43, '2mfe0a', '6542 ', '2018-01-12', 1, 1, '早', 0),
(44, '2mfe0a', '91026 ', '2018-01-12', 1, 1, '早', 0),
(45, '2mfe0a', '41330 ', '2018-01-12', 1, 1, '早', 0),
(46, '2mfe0a', '3789 ', '2018-01-12', 1, 1, '早', 0),
(47, '2mfe0a', '31778 ', '2018-01-12', 1, 1, '早', 0),
(48, '2mfe0a', '29981 ', '2018-01-12', 1, 1, '早', 0),
(49, '2mfe0a', '53169 ', '2018-01-12', 1, 0, '早', 0),
(50, '2mfe0a', '8305 ', '2018-01-12', 1, 0, '早', 0),
(51, '2mfe0a', '19767 ', '2018-01-12', 1, 0, '早', 0),
(52, '2mfe0a', '43855 ', '2018-01-13', 1, 1, '晚', 0),
(53, '2mfe0a', '63082 ', '2018-01-13', 1, 1, '晚', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(10) NOT NULL,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(10) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `token`, `serviceType`, `user_id`, `time`, `activate`) VALUES
(1, '', '采购服务', '2mfe0a', '2018-01-11', 0),
(2, '', '采购服务', '2mfe0a', '2018-01-11', 0),
(3, '51876', '采购服务', '2mfe0a', '2018-01-12', 0),
(4, '82481', '采购服务', '2mfe0a', '2018-01-12', 0),
(5, '99801', '采购服务', '2mfe0a', '2018-01-12', 0),
(6, '50045', '订餐服务', '2mfe0a', '2018-01-12', 0),
(7, '79329', '订餐服务', '2mfe0a', '2018-01-12', 0),
(8, '53165', '订餐服务', '2mfe0a', '2018-01-12', 0),
(9, '92746', '订餐服务', '2mfe0a', '2018-01-12', 0),
(10, '33662', '订餐服务', '2mfe0a', '2018-01-12', 0),
(11, '80563', '订餐服务', '2mfe0a', '2018-01-12', 0),
(12, '20944', '订餐服务', '2mfe0a', '2018-01-12', 0),
(13, '27374', '订餐服务', '2mfe0a', '2018-01-12', 0),
(14, '48548', '订餐服务', '2mfe0a', '2018-01-12', 0),
(15, '58603', '订餐服务', '2mfe0a', '2018-01-12', 0),
(16, '80860', '订餐服务', '2mfe0a', '2018-01-12', 0),
(17, '72099', '订餐服务', '2mfe0a', '2018-01-12', 0),
(18, '52617', '订餐服务', '2mfe0a', '2018-01-12', 0),
(19, '70305', '订餐服务', '2mfe0a', '2018-01-12', 0),
(20, '85011', '订餐服务', '2mfe0a', '2018-01-12', 0),
(21, '6542', '订餐服务', '2mfe0a', '2018-01-12', 0),
(22, '91026', '订餐服务', '2mfe0a', '2018-01-12', 0),
(23, '41330', '订餐服务', '2mfe0a', '2018-01-12', 0),
(24, '3789', '订餐服务', '2mfe0a', '2018-01-12', 0),
(25, '31778', '订餐服务', '2mfe0a', '2018-01-12', 0),
(26, '29981', '订餐服务', '2mfe0a', '2018-01-12', 0),
(27, '53169', '订餐服务', '2mfe0a', '2018-01-12', 0),
(28, '8305', '订餐服务', '2mfe0a', '2018-01-12', 0),
(29, '19767', '订餐服务', '2mfe0a', '2018-01-12', 0),
(30, '43855', '订餐服务', '2mfe0a', '2018-01-12', 0),
(31, '63082', '订餐服务', '2mfe0a', '2018-01-12', 0),
(32, '76568', '采购服务', '2mfe0a', '2018-01-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_service`
--

CREATE TABLE `purchase_service` (
  `pid` int(10) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `property` varchar(10) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `origin_address` varchar(10) COLLATE utf8_bin NOT NULL,
  `option_address` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `potato` int(5) DEFAULT NULL,
  `tomato` int(5) DEFAULT NULL,
  `rice` int(5) DEFAULT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `purchase_service`
--

INSERT INTO `purchase_service` (`pid`, `user`, `serviceToken`, `property`, `date`, `origin_address`, `option_address`, `potato`, `tomato`, `rice`, `finish`) VALUES
(1, '2mfe0a', '', '', '2018-01-11 00:00:00', '3', '', 1, 1, 2, 0),
(2, '2mfe0a', '', '', '2018-01-11 00:00:00', '3', '', 2, 2, 2, 0),
(3, '2mfe0a', '', '', '2018-01-11 00:00:00', '3', '', 2, 2, 2, 0),
(4, '2mfe0a', '', '', '2018-01-11 00:00:00', '3', '', 2, 2, 2, 0),
(5, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', '', 1, 2, 2, 0),
(6, '2mfe0a', '', 'apartment', '2018-01-11 00:00:00', '3', '', 2, 2, 2, 0),
(7, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', '', 1, 1, 3, 0),
(8, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', '', 1, 1, 3, 0),
(9, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '2', '', 2, 2, 3, 0),
(10, '2mfe0a', '51876', 'house', '2018-01-12 00:00:00', '1', '', 3, 2, 2, 0),
(11, '2mfe0a', '82481', 'house', '2018-01-12 00:00:00', '4', '123123dada', 2, 1, 3, 0),
(12, '2mfe0a', '99801', 'house', '2018-01-12 00:00:00', '3', '', 1, 2, 3, 0),
(13, '2mfe0a', '76568', 'house', '2018-01-12 00:00:00', '1', '', 5, 1, 2, 0);

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
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `purchase_service`
--
ALTER TABLE `purchase_service`
  ADD PRIMARY KEY (`pid`);

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
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `purchase_service`
--
ALTER TABLE `purchase_service`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
