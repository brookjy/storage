-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 12:47 AM
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `aid` int(10) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`aid`, `address`, `type`, `lat`, `lng`, `update_at`) VALUES
(1, 'RIVA 517-7008 River Rd', 'apt', 49.1705, -123.157, '2018-01-30'),
(2, 'Mandarin 767-6288 No.3 Rd', 'apt', 49.22, -123.222, '2018-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(5) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permission` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`, `permission`) VALUES
(2, 'brook', 'b79624284645b7cba19d76a417e493fe9e767745d4313fdfc35107c92a5db909', '1/2/3/4/5/6/7/8'),
(3, 'Chuck', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7'),
(4, 'Todd', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7'),
(5, 'Carmond', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7'),
(6, 'Liulaoshi', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7');

-- --------------------------------------------------------

--
-- Table structure for table `flight_service`
--

CREATE TABLE `flight_service` (
  `fid` int(50) NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `numCars` int(3) NOT NULL,
  `additionalNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_service`
--

INSERT INTO `flight_service` (`fid`, `serviceToken`, `user`, `time`, `numCars`, `additionalNote`) VALUES
(1, '14483', 'kqdo4b', '2018-02-28 10:00:00', 2, '带我打无'),
(2, '31658', 'kqdo4b', '2018-03-07 10:00:00', 1, '打撒奥');

-- --------------------------------------------------------

--
-- Table structure for table `food_service`
--

CREATE TABLE `food_service` (
  `sid` int(10) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(5) COLLATE utf8_bin NOT NULL,
  `startDate` date NOT NULL,
  `startTime` varchar(5) COLLATE utf8_bin NOT NULL,
  `endDate` date NOT NULL,
  `endTime` varchar(5) COLLATE utf8_bin NOT NULL,
  `num_ppl` int(3) DEFAULT NULL,
  `address` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `display` int(10) NOT NULL DEFAULT '1',
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_service`
--

INSERT INTO `food_service` (`sid`, `user`, `serviceToken`, `serviceType`, `startDate`, `startTime`, `endDate`, `endTime`, `num_ppl`, `address`, `createdAt`, `display`, `finish`) VALUES
(3, '0GtwFX', '88415 ', '宝妈月子餐', '2018-02-23', '早', '2018-02-24', '早', NULL, '医院', '0000-00-00 00:00:00', 1, NULL),
(4, 'kqdo4b', '82854 ', '宝妈月子餐', '2018-03-01', '早', '2018-03-02', '早', NULL, '家', '2018-02-26 15:19:51', 0, NULL),
(5, 'kqdo4b', '85187 ', '待产餐', '2018-02-27', '早', '2018-03-01', '早', 1, '家', '2018-02-26 15:35:03', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(10) NOT NULL,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(10) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `activate` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `token`, `serviceType`, `user_id`, `time`, `activate`) VALUES
(1, '2435', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(2, '22480', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(3, '27709', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(4, '23452', '医疗接送', '0GtwFX', '2018-02-22 00:00:00', NULL),
(8, '88415', '宝妈月子餐', '0GtwFX', '2018-02-22 00:00:00', NULL),
(9, '14483', '接机送机', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(10, '31658', '接机送机', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(11, '720', '医疗接送', 'kqdo4b', '2018-02-26 00:00:00', NULL),
(13, '4303', '住房维修', 'kqdo4b', '2018-02-26 11:57:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_service`
--

CREATE TABLE `housekeeping_service` (
  `hid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `accompany` int(2) NOT NULL,
  `maid` int(2) NOT NULL,
  `additionalNote` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_service`
--

CREATE TABLE `medical_service` (
  `sid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `medicalServiceType` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_bin,
  `finish` int(2) DEFAULT NULL,
  `times` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_service`
--

INSERT INTO `medical_service` (`sid`, `user`, `serviceToken`, `medicalServiceType`, `time`, `additional`, `finish`, `times`) VALUES
(1, '0GtwFX', '2435 ', '王医生', '2018-02-23 14:00:00', 'xxx', NULL, NULL),
(2, '0GtwFX', '22480 ', '王医生', '2018-02-24 14:00:00', '24', NULL, NULL),
(3, '0GtwFX', '27709 ', '王医生', '2018-02-25 14:00:00', '25', NULL, NULL),
(4, '0GtwFX', '23452 ', '王医生', '2018-02-26 14:00:00', '26', NULL, NULL),
(5, 'kqdo4b', '720 ', '王医生', '2018-02-27 10:00:00', 'dwadwad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_service`
--

CREATE TABLE `pickup_service` (
  `pid` int(100) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `departure` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destination` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `num_ppl` int(2) DEFAULT NULL,
  `additional` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `origin_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `doujiang` int(5) DEFAULT NULL,
  `tiandoujiang` int(5) DEFAULT NULL,
  `niunai` int(5) DEFAULT NULL,
  `guozhi` int(5) DEFAULT NULL,
  `furu` int(5) DEFAULT NULL,
  `zhacai` int(5) DEFAULT NULL,
  `laoganma` int(5) DEFAULT NULL,
  `ganlancai` int(5) DEFAULT NULL,
  `xianyadan` int(5) DEFAULT NULL,
  `huashengjiang` int(5) DEFAULT NULL,
  `caomeijiang` int(5) DEFAULT NULL,
  `shengjidan` int(5) DEFAULT NULL,
  `maipian` int(5) DEFAULT NULL,
  `culiangmianbao` int(5) DEFAULT NULL,
  `doushabao` int(5) DEFAULT NULL,
  `xiaomantou` int(5) DEFAULT NULL,
  `shouzhuabing` int(5) DEFAULT NULL,
  `jiaozi` int(5) DEFAULT NULL,
  `miantiao` int(5) DEFAULT NULL,
  `dami` int(5) DEFAULT NULL,
  `xiaomi` int(5) DEFAULT NULL,
  `hongdou` int(5) DEFAULT NULL,
  `lvdou` int(5) DEFAULT NULL,
  `pingguo` int(5) DEFAULT NULL,
  `xiangjiao` int(5) DEFAULT NULL,
  `chengzi` int(5) DEFAULT NULL,
  `guoli` int(5) DEFAULT NULL,
  `juzi` int(5) DEFAULT NULL,
  `xihongshi` int(5) DEFAULT NULL,
  `bocai` int(5) DEFAULT NULL,
  `digua` int(5) DEFAULT NULL,
  `huanggua` int(5) DEFAULT NULL,
  `tudou` int(5) DEFAULT NULL,
  `you` int(5) DEFAULT NULL,
  `yan` int(5) DEFAULT NULL,
  `jiang` int(5) DEFAULT NULL,
  `cu` int(5) DEFAULT NULL,
  `tang` int(5) DEFAULT NULL,
  `locker` int(2) DEFAULT NULL,
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `repair_service`
--

CREATE TABLE `repair_service` (
  `rid` int(10) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `repairNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `replyNote` varchar(100) DEFAULT NULL,
  `finish` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_service`
--

INSERT INTO `repair_service` (`rid`, `user`, `serviceToken`, `time`, `repairNote`, `replyNote`, `finish`) VALUES
(3, 'kqdo4b', '4303', '2018-02-26 11:57:55', 'hahaha', '1111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `username` varchar(10) COLLATE utf8_bin NOT NULL,
  `phone` bigint(50) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `weChat` varchar(50) COLLATE utf8_bin NOT NULL,
  `timeDeliver` varchar(50) COLLATE utf8_bin NOT NULL,
  `create_time` date NOT NULL,
  `role` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `salt` varchar(6) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `flight` int(5) DEFAULT '1',
  `special_medical` int(2) DEFAULT '0',
  `pickup` int(5) DEFAULT NULL,
  `pickupTotal` int(20) DEFAULT NULL,
  `medicals` int(5) DEFAULT NULL,
  `medicalsTotal` int(20) DEFAULT NULL,
  `isActive` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `phone`, `email`, `password`, `weChat`, `timeDeliver`, `create_time`, `role`, `salt`, `address`, `flight`, `special_medical`, `pickup`, `pickupTotal`, `medicals`, `medicalsTotal`, `isActive`) VALUES
(1, 'brook', 7789226676, '123@gmail.com', '087f2fe94ae39f97c1e146839e14d0ac2975fc6519528b0c880fd0b9b8a419a4', 'xxx', '2018-02-23', '2018-02-22', '1', '0GtwFX', '9320 Gormond Rd Richmond V7E1N5', 1, 1, 1, 2, 2, 8, 1),
(2, '12345', 12345, '123@gmail.com', 'a663d49d3d3385cb31bd5d58d06253a56ef4d1da0bea6adaa36dbed210c248af', '12345', '2018-02-17', '2018-02-26', '1', 'kqdo4b', 'Ora 602-6200 River Rd', 0, 1, 2, 2, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `flight_service`
--
ALTER TABLE `flight_service`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `food_service`
--
ALTER TABLE `food_service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `medical_service`
--
ALTER TABLE `medical_service`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `serviceToken` (`serviceToken`);

--
-- Indexes for table `pickup_service`
--
ALTER TABLE `pickup_service`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase_service`
--
ALTER TABLE `purchase_service`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `repair_service`
--
ALTER TABLE `repair_service`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flight_service`
--
ALTER TABLE `flight_service`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_service`
--
ALTER TABLE `food_service`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  MODIFY `hid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_service`
--
ALTER TABLE `medical_service`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pickup_service`
--
ALTER TABLE `pickup_service`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_service`
--
ALTER TABLE `purchase_service`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repair_service`
--
ALTER TABLE `repair_service`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
