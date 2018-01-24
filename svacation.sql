-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2018 at 08:08 PM
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
(1, 'food_service', 'food_service', 'NULL'),
(2, 'brook', 'b79624284645b7cba19d76a417e493fe9e767745d4313fdfc35107c92a5db909', '1/2/3/4/5/6/7/8');

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
  `num_ppl` int(3) NOT NULL,
  `address` varchar(5) COLLATE utf8_bin NOT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_service`
--

INSERT INTO `food_service` (`sid`, `user`, `serviceToken`, `serviceType`, `startDate`, `startTime`, `endDate`, `endTime`, `num_ppl`, `address`, `finish`) VALUES
(78, '2mfe0a', '86743 ', '宝妈月子餐', '2018-01-24', '早', '2018-01-27', '早', 0, '医院', 0);

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
(32, '76568', '采购服务', '2mfe0a', '2018-01-12', 0),
(33, '81457', '订餐服务', 'eQez4m', '2018-01-14', 0),
(34, '59803', '采购服务', 'eQez4m', '2018-01-14', 0),
(35, '90950', '医疗接送', 'eQez4m', '2018-01-14', 0),
(36, '28300', '订餐服务', 'eQez4m', '2018-01-14', 0),
(37, '73160', '医疗接送', 'eQez4m', '2018-01-14', 0),
(38, '23637', '医疗接送', '2mfe0a', '2018-01-15', 0),
(41, '16690', '住房维修', '2mfe0a', '2018-01-15', 0),
(42, '88812', '住房维修', '2mfe0a', '2018-01-15', 0),
(43, '52364', '孕产服务', '2mfe0a', '2018-01-15', 0),
(44, '85755', '医疗接送', '2mfe0a', '2018-01-15', 0),
(45, '58151', '医疗接送', '2mfe0a', '2018-01-15', 0),
(46, '81962', '订餐服务', '2mfe0a', '2018-01-15', 0),
(47, '82892', '孕产服务', '2mfe0a', '2018-01-15', 0),
(48, '56731', '订餐服务', '2mfe0a', '2018-01-15', 0),
(49, '62548', '订餐服务', '2mfe0a', '2018-01-15', 0),
(50, '39238', '订餐服务', '2mfe0a', '2018-01-15', 0),
(51, '71833', '订餐服务', '2mfe0a', '2018-01-15', 0),
(52, '21759', '采购服务', '2mfe0a', '2018-01-15', 0),
(53, '59248', '采购服务', '2mfe0a', '2018-01-15', 0),
(54, '99732', '采购服务', '2mfe0a', '2018-01-15', 0),
(55, '37083', '医疗接送', '2mfe0a', '2018-01-15', 0),
(56, '77541', '采购服务', '2mfe0a', '2018-01-15', 0),
(57, '45970', '采购服务', '2mfe0a', '2018-01-15', 0),
(58, '17229', '孕产服务', '2mfe0a', '2018-01-15', 0),
(59, '67453', '医疗接送', '2mfe0a', '2018-01-16', 0),
(60, '92180', '医疗接送', '2mfe0a', '2018-01-16', 0),
(61, '71558', '医疗接送', '2mfe0a', '2018-01-16', 0),
(62, '47349', '医疗接送', '2mfe0a', '2018-01-16', 0),
(63, '13730', '医疗接送', '2mfe0a', '2018-01-16', 0),
(64, '88081', '医疗接送', '2mfe0a', '2018-01-16', 0),
(65, '28125', '医疗接送', '2mfe0a', '2018-01-16', 0),
(66, '30776', '医疗接送', '2mfe0a', '2018-01-16', 0),
(67, '86994', '医疗接送', '2mfe0a', '2018-01-16', 0),
(68, '73252', '医疗接送', '2mfe0a', '2018-01-16', 0),
(69, '10392', '医疗接送', '2mfe0a', '2018-01-16', 0),
(70, '61997', '医疗接送', '2mfe0a', '2018-01-16', 0),
(71, '28427', '医疗接送', '2mfe0a', '2018-01-16', 0),
(72, '81634', '医疗接送', '2mfe0a', '2018-01-16', 0),
(73, '20736', '医疗接送', '2mfe0a', '2018-01-16', 0),
(74, '67406', '医疗接送', '2mfe0a', '2018-01-16', 0),
(75, '70729', '医疗接送', '2mfe0a', '2018-01-16', 0),
(76, '39835', '医疗接送', '2mfe0a', '2018-01-16', 0),
(77, '329', '医疗接送', '2mfe0a', '2018-01-16', 0),
(78, '60580', '医疗接送', '2mfe0a', '2018-01-16', 0),
(79, '96484', '医疗接送', '2mfe0a', '2018-01-16', 0),
(80, '39911', '医疗接送', '2mfe0a', '2018-01-16', 0),
(81, '74219', '医疗接送', '2mfe0a', '2018-01-16', 0),
(82, '75561', '医疗接送', '2mfe0a', '2018-01-16', 0),
(83, '27659', '医疗接送', '2mfe0a', '2018-01-16', 0),
(84, '18085', '医疗接送', '2mfe0a', '2018-01-16', 0),
(85, '96200', '医疗接送', '2mfe0a', '2018-01-16', 0),
(86, '22398', '医疗接送', '2mfe0a', '2018-01-16', 0),
(87, '63019', '医疗接送', '2mfe0a', '2018-01-16', 0),
(88, '6326', '医疗接送', '2mfe0a', '2018-01-16', 0),
(89, '28956', '医疗接送', '2mfe0a', '2018-01-16', 0),
(90, '39799', '医疗接送', '2mfe0a', '2018-01-16', 0),
(91, '41049', '月子餐', '2mfe0a', '2018-01-16', 0),
(92, '22159', '孕妇月子餐', '2mfe0a', '2018-01-16', 0),
(93, '41148', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(94, '19833', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(95, '35722', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(96, '79817', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(97, '93096', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(98, '74934', '', '2mfe0a', '2018-01-17', 0),
(99, '22385', '', '2mfe0a', '2018-01-17', 0),
(100, '60306', '', '2mfe0a', '2018-01-17', 0),
(101, '87768', '', '2mfe0a', '2018-01-17', 0),
(102, '18745', '', '2mfe0a', '2018-01-17', 0),
(103, '46032', '宝妈月子餐', '2mfe0a', '2018-01-17', 0),
(104, '47782', '采购服务', '2mfe0a', '2018-01-17', 0),
(105, '39745', '医疗接送', '2mfe0a', '2018-01-17', 0),
(106, '86410', '', '2mfe0a', '2018-01-17', 0),
(107, '29949', '采购服务', '2mfe0a', '2018-01-17', 0),
(108, '16147', '住房维修', '2mfe0a', '2018-01-17', 0),
(109, '81491', '住房维修', '2mfe0a', '2018-01-17', 0),
(110, '98490', '孕产服务', '2mfe0a', '2018-01-17', 0),
(111, '2548', '孕产服务', '2mfe0a', '2018-01-17', 0),
(112, '98480', '住房维修', '2mfe0a', '2018-01-18', 0),
(113, '2703', '', '2mfe0a', '2018-01-18', 0),
(114, '4435', '', '2mfe0a', '2018-01-18', 0),
(115, '43600', '接送服务', '2mfe0a', '2018-01-18', 0),
(116, '79092', '接送服务', '2mfe0a', '2018-01-18', 0),
(117, '66363', '宝妈月子餐', '2mfe0a', '2018-01-18', 0),
(118, '26696', '接送服务', '2mfe0a', '2018-01-18', 0),
(119, '8598', '医疗接送', '2mfe0a', '2018-01-18', 0),
(120, '61076', '接送服务', '2mfe0a', '2018-01-19', 0),
(121, '82979', '宝妈待产餐', '2mfe0a', '2018-01-19', 0),
(122, '20719', '采购服务', '2mfe0a', '2018-01-19', 0),
(123, '35922', '住房维修', '2mfe0a', '2018-01-19', 0),
(124, '14216', '接送服务', '2mfe0a', '2018-01-19', 0),
(125, '55218', '医疗接送', '2mfe0a', '2018-01-19', 0),
(126, '30895', '医疗接送', '2mfe0a', '2018-01-22', 0),
(127, '60097', '宝妈月子餐', '2mfe0a', '2018-01-23', 0),
(128, '34087', '医疗接送', '2mfe0a', '2018-01-23', 0),
(129, '86743', '宝妈月子餐', '2mfe0a', '2018-01-23', 0),
(130, '39611', '住房维修', '2mfe0a', '2018-01-23', 0),
(131, '52266', '接送服务', '2mfe0a', '2018-01-23', 0),
(132, '99857', '孕产服务', '2mfe0a', '2018-01-23', 0),
(133, '49737', '孕产服务', '2mfe0a', '2018-01-23', 0),
(134, '82547', '孕产服务', '2mfe0a', '2018-01-23', 0),
(135, '31412', '采购服务', '2mfe0a', '2018-01-23', 0);

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
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housekeeping_service`
--

INSERT INTO `housekeeping_service` (`hid`, `user`, `serviceToken`, `time`, `accompany`, `maid`, `additionalNote`, `finish`) VALUES
(1, '2mfe0a', '52364 ', '2018-01-16', 0, 1, '2121212', 0),
(2, '2mfe0a', '82892 ', '2018-01-17', 1, 1, 'xqxx', 0),
(3, '2mfe0a', '17229 ', '2018-01-16', 0, 0, 'gtyvyt', 0),
(4, '2mfe0a', '98490 ', '2018-02-28', 1, 1, 'dwdw', 0),
(5, '2mfe0a', '2548 ', '2018-02-28', 1, 1, 'dwdw', 0),
(6, '2mfe0a', '99857 ', '0000-00-00', 0, 1, 'dd', 0),
(7, '2mfe0a', '49737 ', '2018-03-03', 0, 1, '123', 0),
(8, '2mfe0a', '82547 ', '2018-02-28', 0, 1, 'ji', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medical_service`
--

CREATE TABLE `medical_service` (
  `sid` int(100) NOT NULL,
  `user` varchar(10) NOT NULL,
  `serviceToken` varchar(10) NOT NULL,
  `medicalServiceType` text NOT NULL,
  `time` datetime NOT NULL,
  `additional` text NOT NULL,
  `finish` int(2) NOT NULL,
  `times` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_service`
--

INSERT INTO `medical_service` (`sid`, `user`, `serviceToken`, `medicalServiceType`, `time`, `additional`, `finish`, `times`) VALUES
(14, 'eQez4m', '90950 ', '出院', '2018-01-15 00:00:00', '', 0, 0),
(15, 'eQez4m', '73160 ', 'B超', '2018-01-24 00:00:00', '中文', 0, 0),
(16, '2mfe0a', '23637 ', '住院', '2018-01-17 00:00:00', 'dqwdq', 0, 0),
(17, '2mfe0a', '85755 ', '看医生', '2018-01-17 00:00:00', 'dwdwqd', 0, 0),
(18, '2mfe0a', '58151 ', '住院', '2018-01-16 00:00:00', '我要住院！！', 0, 0),
(19, '2mfe0a', '37083 ', '看医生', '2018-01-16 00:00:00', '年级您', 0, 0),
(20, '2mfe0a', '67453 ', '王医生', '2018-01-17 00:00:00', '2', 0, 0),
(21, '2mfe0a', '92180 ', '王医生', '2018-01-17 00:00:00', '', 0, 0),
(22, '2mfe0a', '71558 ', '王医生', '2018-01-17 11:00:00', '21e', 0, 0),
(23, '2mfe0a', '47349 ', '王医生', '2018-01-17 16:00:00', '21e', 0, 0),
(24, '2mfe0a', '13730 ', '王医生', '2018-01-17 11:00:00', 'swss', 0, 0),
(25, '2mfe0a', '88081 ', '王医生', '0000-00-00 00:00:00', 'swss', 0, 0),
(26, '2mfe0a', '28125 ', '王医生', '2018-01-18 11:00:00', 'swss', 0, 0),
(27, '2mfe0a', '30776 ', '王医生', '2018-01-18 00:00:00', 'swss', 0, 0),
(28, '2mfe0a', '86994 ', '王医生', '2018-01-18 12:00:00', 'swss', 0, 0),
(29, '2mfe0a', '73252 ', '王医生', '2018-01-18 12:00:00', 'swss', 0, 0),
(30, '2mfe0a', '10392 ', '王医生', '2018-01-18 12:00:00', 'swss', 0, 0),
(31, '2mfe0a', '61997 ', '王医生', '2018-01-18 12:15:00', 'swss', 0, 0),
(32, '2mfe0a', '28427 ', '王医生', '2018-01-18 12:15:00', 'swss', 0, 0),
(33, '2mfe0a', '81634 ', '王医生', '2018-01-17 12:00:00', 'dw', 0, 0),
(34, '2mfe0a', '20736 ', '王医生', '2018-01-17 12:00:00', 'dw', 0, 0),
(35, '2mfe0a', '67406 ', '王医生', '2018-01-17 12:18:00', 'dw', 0, 0),
(36, '2mfe0a', '70729 ', '王医生', '2018-01-17 12:18:00', 'dwdqdd', 0, 0),
(37, '2mfe0a', '39835 ', '王医生', '2018-01-17 12:21:00', 'dqwd', 0, 0),
(38, '2mfe0a', '329 ', 'B超', '2018-01-19 12:00:00', 'dwdqdwq', 0, 0),
(39, '2mfe0a', '60580 ', 'B超', '2018-01-17 12:33:00', 'dwdd', 0, 0),
(40, '2mfe0a', '96484 ', 'B超', '2018-01-17 12:41:00', 'dwdd', 0, 0),
(41, '2mfe0a', '39911 ', '王医生', '2018-01-18 14:22:00', '12', 0, 0),
(42, '2mfe0a', '74219 ', 'B超', '2018-01-20 14:33:00', '请问', 0, 0),
(43, '2mfe0a', '75561 ', '王医生', '2018-01-19 14:36:00', 'cscs', 0, 0),
(44, '2mfe0a', '27659 ', '王医生', '2018-01-19 14:36:00', 'cscs', 0, 0),
(45, '2mfe0a', '18085 ', '王医生', '2018-01-19 14:36:00', 'cscs', 0, 0),
(46, '2mfe0a', '96200 ', '王医生', '2018-01-19 14:36:00', 'cscs', 0, 0),
(47, '2mfe0a', '22398 ', '王医生', '2018-01-19 14:36:00', 'cscs', 0, 0),
(48, '2mfe0a', '63019 ', '王医生', '2018-01-25 14:39:00', 'cscc', 0, 0),
(49, '2mfe0a', '6326 ', '王医生', '2018-01-25 14:39:00', 'cscc', 0, 0),
(50, '2mfe0a', '28956 ', '王医生', '2018-01-25 14:39:00', 'cscc', 0, 0),
(51, '2mfe0a', '39799 ', '王医生', '2018-01-21 14:43:00', 'davva', 0, 0),
(52, '2mfe0a', '39745 ', '王医生', '2018-01-27 15:04:00', 'ddwd', 0, 0),
(53, '2mfe0a', '2703 ', '', '0000-00-00 00:00:00', 'd', 0, 0),
(54, '2mfe0a', '4435 ', '', '0000-00-00 00:00:00', 'd', 0, 0),
(55, '2mfe0a', '8598 ', '王医生', '2018-01-19 18:01:00', '啥', 0, 0),
(56, '2mfe0a', '55218 ', '王医生', '2018-01-28 17:04:00', '的纷纷', 0, 0),
(57, '2mfe0a', '30895 ', '王医生', '2018-01-31 11:20:00', 'And (Select count(*) from 表名)<>0', 0, 0),
(58, '2mfe0a', '34087 ', '王医生', '2018-01-25 13:18:00', 'dwdqd', 0, 0);

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
  `num_ppl` int(2) NOT NULL,
  `additional` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_service`
--

INSERT INTO `pickup_service` (`pid`, `user`, `serviceToken`, `date`, `time`, `departure`, `destination`, `num_ppl`, `additional`, `finish`) VALUES
(2, '2mfe0a', '79092 ', '2018-01-19', '10:00AM - 11:30AM', '1', '1', 2, '222', 0),
(3, '2mfe0a', '26696 ', '2018-01-19', '10:00AM - 11:30AM', '1', '1', 21, '3123213', 0),
(4, '2mfe0a', '61076 ', '2018-01-26', '10:00AM - 11:30AM', '4', '3', 12, '31323', 0),
(5, '2mfe0a', '14216 ', '2018-01-21', '10:00AM - 11:30AM', '3', '3', 12, '12123', 0),
(6, '2mfe0a', '52266 ', '2018-01-25', '10:00AM - 11:30AM', '1', '1', 123, '13', 0);

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
  `potato` int(5) DEFAULT NULL,
  `tomato` int(5) DEFAULT NULL,
  `rice` int(5) DEFAULT NULL,
  `locker` int(2) NOT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `purchase_service`
--

INSERT INTO `purchase_service` (`pid`, `user`, `serviceToken`, `property`, `date`, `origin_address`, `potato`, `tomato`, `rice`, `locker`, `finish`) VALUES
(5, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', 1, 2, 2, 0, 0),
(6, '2mfe0a', '', 'apartment', '2018-01-11 00:00:00', '3', 2, 2, 2, 0, 0),
(7, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', 1, 1, 3, 0, 0),
(8, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '1', 1, 1, 3, 0, 0),
(9, '2mfe0a', '', 'house', '2018-01-11 00:00:00', '2', 2, 2, 3, 0, 0),
(10, '2mfe0a', '51876', 'house', '2018-01-12 00:00:00', '1', 3, 2, 2, 0, 0),
(11, '2mfe0a', '82481', 'house', '2018-01-12 00:00:00', '4', 2, 1, 3, 0, 0),
(12, '2mfe0a', '99801', 'house', '2018-01-12 00:00:00', '3', 1, 2, 3, 0, 0),
(13, '2mfe0a', '76568', 'house', '2018-01-12 00:00:00', '1', 5, 1, 2, 0, 0),
(14, 'eQez4m', '59803', 'house', '2018-01-14 00:00:00', '1', 1, 0, 0, 0, 0),
(15, '2mfe0a', '21759', 'house', '2018-01-15 00:00:00', '1', 0, 0, 0, 0, 0),
(16, '2mfe0a', '59248', 'house', '2018-01-15 00:00:00', '1', 0, 0, 0, 0, 0),
(17, '2mfe0a', '99732', 'house', '2018-01-15 00:00:00', '1', 0, 0, 0, 0, 0),
(18, '2mfe0a', '77541', 'house', '2018-01-15 00:00:00', '1', 0, 0, 0, 0, 0),
(19, '2mfe0a', '45970', 'apartment', '2018-01-15 00:00:00', '1', 1, 1, 1, 0, 0),
(20, '2mfe0a', '47782', 'house', '2018-01-17 14:58:26', '3', 3, 1, 3, 0, 0),
(21, '2mfe0a', '29949', 'house', '2018-01-17 15:20:29', 'audis', 3, 3, 3, 0, 0),
(23, '2mfe0a', '31412', 'house', '2018-01-23 14:59:51', 'audi', 3, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `repair_service`
--

CREATE TABLE `repair_service` (
  `rid` int(10) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `serviceToken` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `water` int(2) NOT NULL,
  `gas` int(2) NOT NULL,
  `electric` int(2) NOT NULL,
  `other` int(2) NOT NULL,
  `additionalNote` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `finish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_service`
--

INSERT INTO `repair_service` (`rid`, `user`, `serviceToken`, `time`, `water`, `gas`, `electric`, `other`, `additionalNote`, `finish`) VALUES
(1, '2mfe0a', '93623', '2018-01-24', 1, 1, 1, 0, '', 0),
(2, '2mfe0a', '25247', '2018-01-24', 1, 1, 1, 0, '', 0),
(3, '2mfe0a', '16690', '2018-01-24', 0, 1, 1, 1, '1234', 0),
(4, '2mfe0a', '88812', '2018-01-18', 0, 1, 0, 0, '123', 0),
(5, '2mfe0a', '16147', '2018-01-17', 1, 0, 0, 0, 'dqwd', 0),
(6, '2mfe0a', '81491', '2018-01-25', 0, 1, 0, 0, 'dwqd', 0),
(7, '2mfe0a', '98480', '2018-01-19', 0, 1, 0, 0, 'dwqd', 0),
(8, '2mfe0a', '35922', '2018-01-20', 0, 1, 1, 0, '看看', 0),
(9, '2mfe0a', '39611', '2018-01-25', 0, 1, 0, 0, 'jj', 0);

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
  `role` varchar(10) COLLATE utf8_bin NOT NULL,
  `salt` varchar(6) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pickup` int(5) DEFAULT NULL,
  `medicals` int(5) DEFAULT NULL,
  `isActive` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `phone`, `email`, `password`, `weChat`, `timeDeliver`, `create_time`, `role`, `salt`, `address`, `pickup`, `medicals`, `isActive`) VALUES
(3, '123123', 12333, '123@gmail.com', '2b3f9ff145a3bd6d0b3d', '123', '123', '0000-00-00', '1', 'incH45', 'volvo', 0, 0, 0),
(8, '123123', 2147483647, '123@gmail.com', '33655145f604b47685346e60c82e1939c80a1a0275294916541e1c5ad370dd60', '123123', '123123', '0000-00-00', '1', 'krNQ4q', 'volvo', 0, 0, 0),
(9, '321', 321, '123@gmail.com', 'b8db38c2f09709b63c1fe830df03f38fe30b510c7b7c0d11c4f917c6d93010a0', '321', '123', '0000-00-00', '1', '1neVB5', NULL, 0, 0, 0),
(10, '123', 123, '123@gmail.com', '6ec9eac1929f9ec48ce48f9f73cf31ac701b7f644d4f45064edb95bbab6a8214', '123', '123', '0000-00-00', '1', 'eQez4m', NULL, 0, 0, 0),
(11, '123', 123, '123@gmail.com', '446781f77401a0e74650b6515352ad11cd76e20dcd6b5d061566d3e3421b6b5c', '123', '123', '0000-00-00', '1', '7gHfIm', NULL, 0, 0, 0),
(12, '1234', 1234, '1234@gmail.com', 'f0c411f690af6ec854b6037b0acdbad482f220430cc465bcf88bfe717fa4d604', '1234', '1234', '0000-00-00', '1', 'TKmrjj', NULL, 0, 0, 0),
(13, '12345', 7788848, '123456@gmail.com', '5093b20eea0b161e1649c5ebe3e95d5733d0a916e84a493a47805c436f56c73b', '12345', '12345', '0000-00-00', '1', '2mfe0a', 'audi', 1, 1, 1),
(14, '123456', 123456, '123456@gmail.com', '6315b3bdecf91090dd5f7f28e3aa9f956a4538c7f2f4e21c591214b2a71ca037', '123456', '123456', '2018-01-08', '1', 'i6hLHV', '???', 0, 0, 0),
(15, '1231234', 44123123, '123@gmail.com', 'c69f7f5612cac6a4b228ecccfb61c89e8bb253e7588b631c2dd9cee827766b20', '123123', '123123', '2018-01-19', '1', 'exs0rs', NULL, 0, 0, 0),
(16, '123123@', 123123, '123@gmail.com', 'd9e20f9597556dee95208e98da24d433ee6aef91ba487f6e4223a1ac11798d6c', '123', '123123', '2018-01-19', '1', 'juRHOx', NULL, 0, 0, 0),
(17, '123123321', 123123, '123@gmail.com', '95cb2bec1757fc26d337afae2d68330147e037bd16dd00bce144940b01002558', '123', '123', '2018-01-19', '1', 'QgZkXh', NULL, 0, 0, 0),
(18, '888888', 123, '123@gmail.com', '4b631678fb350e2dfbdf1a19866ecb9566d983d3982bcea6e622ab1e6ba1de4e', '123123', '123123', '2018-01-19', '1', 'U1FIv5', NULL, 0, 0, 0),
(19, '123555', 0, '123456@gmail.com', 'b119d80b55d11c70a0425c585635a4b4f63daeaf0edbb9ddeb39866960d449cc', '123', '123', '2018-01-19', '1', 'yyBfVc', NULL, 0, 0, 0),
(20, '1231234444', 33123123, 'qwe@1.com', 'ec3a5a72c871e4f2e9b5fee87400f4bb2128175add43d231aec050c6e9a37481', 'qwe', '123', '2018-01-19', '1', 'Gjc9tQ', NULL, 0, 0, 0),
(21, '1231231231', 2, '3@1.com', '74a4ebe6c9cba540526dbf15048788df324250695f228106b439fd0d39465b67', '123', '123123', '2018-01-22', '1', '7wA38z', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_service`
--
ALTER TABLE `food_service`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `housekeeping_service`
--
ALTER TABLE `housekeeping_service`
  MODIFY `hid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_service`
--
ALTER TABLE `medical_service`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pickup_service`
--
ALTER TABLE `pickup_service`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_service`
--
ALTER TABLE `purchase_service`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `repair_service`
--
ALTER TABLE `repair_service`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
