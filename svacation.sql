-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2018 at 04:20 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'Mandarin 767-6288 No.3 Rd', 'apt', 49.22, -123.222, '2018-01-30'),
(3, '9320 Gormond Rd Richmond V7E1N5', 'apt', 49.1446, -123.187, '2018-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `addresscoordinate`
--

CREATE TABLE `addresscoordinate` (
  `aid` int(5) NOT NULL,
  `address` varchar(64) NOT NULL,
  `coordinate` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresscoordinate`
--

INSERT INTO `addresscoordinate` (`aid`, `address`, `coordinate`) VALUES
(1, '9320 Gormond Rd Richmond V7E1N5', '{lat: 49.1446514, lng: -123.1871603}'),
(11, 'Ora 602-6200 River Rd', '{lat: 40.2749927, lng: -111.6709053}'),
(12, '6200 River Rd', '{lat: 39.0940505, lng: -84.6869927}'),
(13, '6951 Hollybridge Way', '{lat: 49.1734288, lng: -123.148336}'),
(14, '3331 Bourmond Ave Richmond V7E1A1', '{lat: 49.147778, lng: -123.190864}'),
(15, '3400 Raymond Ave Richmond V7E1A9', '{lat: 49.145671, lng: -123.186885}');

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
(2, 'brook', 'b79624284645b7cba19d76a417e493fe9e767745d4313fdfc35107c92a5db909', '1/2/3/4/5/6/7/8/9/10'),
(3, 'Chuck', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7/8/9/10'),
(4, 'Todd', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7/8/9'),
(5, 'Carmond', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7/8/9'),
(6, 'Liulaoshi', 'cff3e7ca36573093f97c89acc9d314c96450fb7c35c0bd0d5226ed513c7b5b9e', '1/2/3/4/5/6/7/8/9');

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
  `num_ppl` int(5) DEFAULT NULL,
  `packages` int(5) DEFAULT NULL,
  `additionalNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_service`
--

INSERT INTO `flight_service` (`fid`, `serviceToken`, `user`, `time`, `numCars`, `num_ppl`, `packages`, `additionalNote`) VALUES
(5, '19247', '26yshO', '2018-03-06 20:00:00', 1, 1, 1, '测试'),
(6, '89693', 'tCKOvy', '2018-03-11 18:58:00', 1, 1, 2, '陈逵，电话13840454345');

-- --------------------------------------------------------

--
-- Table structure for table `food_service`
--

CREATE TABLE `food_service` (
  `sid` int(10) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) COLLATE utf8_bin NOT NULL,
  `serviceType` varchar(5) COLLATE utf8_bin NOT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `num_ppl` int(3) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `display` int(10) NOT NULL DEFAULT '1',
  `finish` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_service`
--

INSERT INTO `food_service` (`sid`, `user`, `serviceToken`, `serviceType`, `startDate`, `startTime`, `endDate`, `endTime`, `num_ppl`, `createdAt`, `display`, `finish`) VALUES
(29, 'iLOQwq', '84167 ', '孕妈待产餐', '2018-02-01', '早', '2018-04-30', '早', NULL, '2018-03-05 17:20:04', 1, NULL),
(30, 'sKm8LU', '21537 ', '孕妈待产餐', '2018-03-07', '早', '2018-03-09', '早', NULL, '2018-03-05 17:24:16', 1, NULL),
(31, '26yshO', '18962 ', '孕妈月子餐', '2018-03-06', '早', '2018-03-14', '早', NULL, '2018-03-05 20:00:38', 1, NULL),
(32, '26yshO', '58964 ', '孕妈待产餐', '2018-03-06', '中', '2018-03-21', '早', NULL, '2018-03-05 20:00:50', 1, NULL),
(33, '26yshO', '92031 ', '待产餐', '2018-03-06', '晚', '2018-03-28', '早', 1, '2018-03-05 20:01:00', 1, NULL);

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
(59, '41879', '医疗接送', 'tCKOvy', '2018-03-05 00:00:00', NULL),
(61, '84167', '孕妈待产餐', 'iLOQwq', '2018-03-05 17:20:04', NULL),
(62, '21537', '孕妈待产餐', 'sKm8LU', '2018-03-05 17:24:16', NULL),
(63, '18962', '孕妈月子餐', '26yshO', '2018-03-05 20:00:38', NULL),
(64, '58964', '孕妈待产餐', '26yshO', '2018-03-05 20:00:50', NULL),
(65, '92031', '待产餐', '26yshO', '2018-03-05 20:01:00', NULL),
(66, '66836', '医疗接送', '26yshO', '2018-03-05 00:00:00', NULL),
(67, '94500', '采购服务', '26yshO', '2018-03-05 20:03:18', NULL),
(68, '56326', '住房维修', '26yshO', '2018-03-05 20:03:44', NULL),
(69, '34561', '接送服务', '26yshO', '2018-03-05 00:00:00', NULL),
(70, '91237', '孕产服务', '26yshO', '2018-03-05 00:00:00', NULL),
(71, '19247', '接机送机', '26yshO', '2018-03-05 00:00:00', NULL),
(72, '89693', '接机送机', 'tCKOvy', '2018-03-06 00:00:00', NULL),
(73, '97544', '接送服务', 'tCKOvy', '2018-03-07 00:00:00', NULL);

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

--
-- Dumping data for table `housekeeping_service`
--

INSERT INTO `housekeeping_service` (`hid`, `user`, `serviceToken`, `time`, `accompany`, `maid`, `additionalNote`, `finish`) VALUES
(2, '26yshO', '91237 ', '2018-04-11', 1, 0, '测试', NULL);

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
(10, 'tCKOvy', '41879 ', '王医生', '2018-03-06 10:00:00', '', NULL, NULL),
(11, '26yshO', '66836 ', 'B超', '2018-03-06 20:00:00', '', NULL, NULL);

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

--
-- Dumping data for table `pickup_service`
--

INSERT INTO `pickup_service` (`pid`, `user`, `serviceToken`, `date`, `time`, `departure`, `destination`, `num_ppl`, `additional`, `finish`) VALUES
(4, '26yshO', '34561 ', '2018-03-07', '1:00PM - 1:30PM', '家', '沃尔玛', 1, '', NULL),
(5, 'tCKOvy', '97544 ', '2018-03-12', '10:00AM - 11:30AM', '家', '奥特莱斯', 2, '2个大人', NULL);

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

--
-- Dumping data for table `purchase_service`
--

INSERT INTO `purchase_service` (`pid`, `user`, `serviceToken`, `property`, `date`, `origin_address`, `doujiang`, `tiandoujiang`, `niunai`, `guozhi`, `furu`, `zhacai`, `laoganma`, `ganlancai`, `xianyadan`, `huashengjiang`, `caomeijiang`, `shengjidan`, `maipian`, `culiangmianbao`, `doushabao`, `xiaomantou`, `shouzhuabing`, `jiaozi`, `miantiao`, `dami`, `xiaomi`, `hongdou`, `lvdou`, `pingguo`, `xiangjiao`, `chengzi`, `guoli`, `juzi`, `xihongshi`, `bocai`, `digua`, `huanggua`, `tudou`, `you`, `yan`, `jiang`, `cu`, `tang`, `locker`, `finish`) VALUES
(6, '26yshO', '94500', 'house', '2018-03-05 20:03:18', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL);

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
  `replyNote` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `finish` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_service`
--

INSERT INTO `repair_service` (`rid`, `user`, `serviceToken`, `time`, `repairNote`, `replyNote`, `finish`) VALUES
(10, '26yshO', '56326', '2018-03-05 20:03:44', '测试', NULL, 0);

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
  `flightTotal` int(10) DEFAULT '1',
  `special_medical` int(5) DEFAULT '0',
  `special_medicalTotal` int(10) DEFAULT '0',
  `pickup` int(5) DEFAULT NULL,
  `pickupTotal` int(20) DEFAULT NULL,
  `medicals` int(5) DEFAULT NULL,
  `medicalsTotal` int(20) DEFAULT NULL,
  `isActive` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `phone`, `email`, `password`, `weChat`, `timeDeliver`, `create_time`, `role`, `salt`, `address`, `flight`, `flightTotal`, `special_medical`, `special_medicalTotal`, `pickup`, `pickupTotal`, `medicals`, `medicalsTotal`, `isActive`) VALUES
(29, '王加', 7783172586, '409630229@qq.com', 'b952e049925dca0717b5a4e4fa76f348738e506aea7acd5b4abec8dae712a222', 'kukumalu930', '2018-04-07', '2018-02-22', '1', 'hbwsxu', '3331 Bourmond Ave Richmond V7E1A1', 1, 1, 1, 1, 6, 6, 6, 6, 1),
(30, '张亚男', 18640013200, '59367871@qq.com', 'ab47aa567908f8f4da66d2844958dc465c824cd9e2716ba014f68f4b43c47275', '59367871', '2018-04-01', '2018-02-22', '1', 'tCKOvy', '3331 Bourmond Ave Richmond V7E1A1', 1, 2, 1, 1, 6, 7, 6, 7, 1),
(31, '王莉', 2368669966, '2356545203@qq.com', '6ede8d8cdf3750f78f70f47cfb11b45ddaa1fdb947361a1c2d7aa90351627dd2', 'WANGGENGBAO307', '2018-03-23', '2018-03-05', '1', 'iLOQwq', '3331 Bourmond Ave Richmond V7E1A1', 1, 1, 1, 1, 6, 6, 6, 6, 1),
(33, '佟遥', 7783163567, '362477@qq.com', 'a690bd7df3493417cfce10370b8f3c574f280d9807ae60d9a939263030d453fc', '362477', '2018-04-11', '2018-03-06', '1', '2igzLY', '', 1, 1, 1, 1, 6, 6, 6, 6, 1),
(34, '贾莉莉', 7786362799, '49473920@qq.com', 'c891d7991a86def100e58b9b092dd8e0d87aa84c683c5065b58d6d2af23e0c0b', 'Lily115143', '2018-03-21', '2018-03-06', '1', 'xBxBKx', '', 1, 1, 1, 1, 6, 6, 6, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `addresscoordinate`
--
ALTER TABLE `addresscoordinate`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `address` (`address`);

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
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `addresscoordinate`
--
ALTER TABLE `addresscoordinate`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `flight_service`
--
ALTER TABLE `flight_service`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `food_service`
--
ALTER TABLE `food_service`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  MODIFY `hid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medical_service`
--
ALTER TABLE `medical_service`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pickup_service`
--
ALTER TABLE `pickup_service`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase_service`
--
ALTER TABLE `purchase_service`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `repair_service`
--
ALTER TABLE `repair_service`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
