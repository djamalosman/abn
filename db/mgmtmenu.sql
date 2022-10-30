-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2019 at 02:14 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xplmjdmx_mgmtmenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_level`
--

CREATE TABLE `t_level` (
  `t_levelid` varchar(2) NOT NULL,
  `f_levelname` varchar(100) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_level`
--

INSERT INTO `t_level` (`t_levelid`, `f_levelname`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('3', 'Staff', 1, 'System', '2018-10-10', 'System', '2018-10-10'),
('4', 'Admin Staff', 1, 'System', '2018-10-10', 'System', '2018-10-10'),
('1', 'Manager', 1, 'System', '2018-10-10', 'System', '2018-10-10'),
('2', 'Supervisor', 1, 'System', '2018-10-10', 'System', '2018-10-10'),
('99', 'Super Administrator', 1, 'System', '2018-10-10', 'System', '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `t_levelmdetail`
--

CREATE TABLE `t_levelmdetail` (
  `f_levelid` varchar(2) NOT NULL,
  `f_menuid` varchar(5) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_levelmdetail`
--

INSERT INTO `t_levelmdetail` (`f_levelid`, `f_menuid`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('01', 'D010', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D009', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D008', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D007', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D006', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D005', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D004', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D003', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D002', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'D001', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('99', 'D097', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D096', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D031', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D030', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D029', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D028', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D027', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D026', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D025', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D024', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D023', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D022a', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021g', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021f', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021e', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021d', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021c', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021b', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D021a', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D017', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D016', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D012a', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D004', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D015', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('02', 'D001', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'D096', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'D097', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'D098', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'D099', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('99', 'D014', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D013', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D012', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D011', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D009', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D008', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D007', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D001', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D098', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'D099', 1, 'System', '2018-10-18', 'System', '2018-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `t_levelmdetail_copy`
--

CREATE TABLE `t_levelmdetail_copy` (
  `id` int(3) NOT NULL,
  `f_levelid` varchar(2) NOT NULL,
  `f_menuid` varchar(5) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_levelmdetail_copy`
--

INSERT INTO `t_levelmdetail_copy` (`id`, `f_levelid`, `f_menuid`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
(1, '01', 'D001', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(2, '99', 'D002', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(3, '99', 'D003', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(4, '99', 'D004', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(5, '99', 'D005', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(6, '99', 'D006', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(7, '99', 'D007', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(8, '99', 'D008', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(9, '99', 'D009', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(10, '99', 'D010', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(11, '99', 'D011', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(12, '99', 'D012', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(13, '99', 'D013', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(14, '99', 'D014', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(15, '99', 'D015', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(16, '99', 'D016', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(17, '99', 'D017', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(18, '99', 'D018', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(19, '99', 'D019', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(20, '99', 'D020', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(21, '99', 'D021', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(22, '99', 'D022', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(23, '99', 'D023', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(24, '99', 'D024', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(25, '99', 'D025', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(26, '99', 'D026', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(27, '99', 'D027', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(28, '99', 'D028', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(29, '99', 'D029', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(30, '99', 'D030', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(31, '99', 'D031', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(32, '99', 'D099', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(33, '99', 'D098', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(34, '99', 'D097', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(35, '99', 'D096', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(36, '99', 'D095', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(37, '01', 'D002', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(38, '01', 'D004', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(39, '99', 'D001', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(40, '01', 'D005', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(41, '01', 'D006', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(42, '01', 'D007', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(43, '01', 'D008', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(44, '01', 'D009', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(45, '01', 'D010', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
(46, '01', 'D003', 1, 'System', '2018-09-01', 'System', '2018-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `t_levelmheader`
--

CREATE TABLE `t_levelmheader` (
  `f_levelid` varchar(2) NOT NULL,
  `f_menuid` varchar(5) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_levelmheader`
--

INSERT INTO `t_levelmheader` (`f_levelid`, `f_menuid`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('01', 'H03', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'H01', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('02', 'H99', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'H02', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('01', 'H01', 1, 'System', '2018-09-10', 'System', '2018-09-10'),
('99', 'H99', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H13', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H12', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H11', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H10', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('07', 'H01', 0, 'System', '2018-09-01', 'System', '2018-09-01'),
('07', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('07', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H09', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H08', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H06', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H05', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H04', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H03', 1, 'System', '2018-10-18', 'System', '2018-10-18'),
('99', 'H01', 1, 'System', '2018-10-18', 'System', '2018-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `t_levelmheader_copy`
--

CREATE TABLE `t_levelmheader_copy` (
  `f_levelid` varchar(2) NOT NULL,
  `f_menuid` varchar(5) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_levelmheader_copy`
--

INSERT INTO `t_levelmheader_copy` (`f_levelid`, `f_menuid`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('99', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H02', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('01', 'H03', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H04', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H05', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H06', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H07', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H08', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H09', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H10', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H11', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H12', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H13', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('99', 'H99', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('02', 'H02', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('02', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('01', 'H03', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('01', 'H02', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('01', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('07', 'H01', 0, 'System', '2018-09-01', 'System', '2018-09-01'),
('07', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01'),
('07', 'H01', 1, 'System', '2018-09-01', 'System', '2018-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `t_menudetail`
--

CREATE TABLE `t_menudetail` (
  `f_mheaderid` varchar(5) NOT NULL,
  `f_parentid` varchar(5) NOT NULL,
  `f_itemid` varchar(5) NOT NULL,
  `f_itemname` varchar(100) NOT NULL,
  `f_itemnotes` varchar(200) DEFAULT NULL,
  `f_itemsts` int(1) NOT NULL,
  `f_itemurl` varchar(300) DEFAULT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menudetail`
--

INSERT INTO `t_menudetail` (`f_mheaderid`, `f_parentid`, `f_itemid`, `f_itemname`, `f_itemnotes`, `f_itemsts`, `f_itemurl`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('H03', 'H03', 'D008', 'Data Collector', 'System', 1, 'content/read_um_agent', 'System', '2019-09-01', 'System', '2019-09-01'),
('H03', 'H03', 'D007', 'Data Employees', 'System', 1, 'content/read_um_datakaryawan', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D004', 'Data Postal Code', 'System', 1, 'content/read_ms_kodepos', 'System', '2019-09-01', 'System', '2019-09-01'),
('H01', 'H01', 'D001', 'Dashboard', 'System', 1, 'menu/home', 'System', '2019-09-01', 'System', '2019-09-01'),
('H03', 'H03', 'D009', 'Tracking Collector', 'System', 1, 'content/read_um_map', 'System', '2019-09-01', 'System', '2019-09-01'),
('H03', 'H03', 'D010', 'Data Non Employee', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H04', 'H04', 'D011', 'Account Lists', 'System', 1, 'content/read_tgh_list', 'System', '2019-09-01', 'System', '2019-09-01'),
('H05', 'H05', 'D012', 'Data by Agent', 'System', 1, 'content/read_as_data', 'System', '2019-09-01', 'System', '2019-09-01'),
('H05', 'H05', 'D013', 'Manual Assignment', 'System', 1, 'content/read_as_datamanual', 'System', '2019-09-01', 'System', '2019-09-01'),
('H06', 'H06', 'D014', 'SP Administration', 'System', 1, 'content/read_sp_administration', 'System', '2019-09-01', 'System', '2019-09-01'),
('H06', 'H06', 'D015', 'SP Monitoring', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D016', 'Apps Scheduler', 'System', 1, 'setting/read_schedulers', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D017', 'APK Version', 'System', 1, 'apk/Anagata-app-c24system.apk', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D018', 'Action Code', 'System', 1, 'content/read_param_actiocode', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D019', 'Collector Type', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D020', 'DKH Contact Log', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021', 'Action Plan', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H09', 'H09', 'D023', 'Reminder Call', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H09', 'H09', 'D024', 'Call Back', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H10', 'H10', 'D025', 'Data Visit', 'System', 1, 'content/read_dt_visit', 'System', '2019-09-01', 'System', '2019-09-01'),
('H10', 'H10', 'D026', 'Data Survey', 'System', 1, 'content/read_dt_survey', 'System', '2019-09-01', 'System', '2019-09-01'),
('H11', 'H11', 'D027', 'Daily Visit Report', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H12', 'H12', 'D028', 'Auction Document', 'System', 1, 'content/read_mt_lelang', 'System', '2019-09-01', 'System', '2019-09-01'),
('H12', 'H12', 'D029', 'Delq & WO', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H13', 'H13', 'D030', 'Data Audit Logs', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H13', 'H13', 'D031', 'Activity Logs', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H99', 'H99', 'D099', 'Menu Header', 'System', 1, 'menu/read_headermenu', 'System', '2019-09-01', 'System', '2019-09-01'),
('H99', 'H99', 'D098', 'Menu Detail', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H99', 'H99', 'D097', 'Level User', 'System', 1, 'menu/read_level', 'System', '2019-09-01', 'System', '2019-09-01'),
('H99', 'H99', 'D096', 'Data User Dashboard', 'System', 1, 'menu/read_user', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021a', 'Data City', 'System', 1, 'content/read_param_city', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021d', 'Data Agency', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021e', 'Document SP', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021c', 'Data Branch', 'System', 1, 'content/read_param_branch', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021g', 'Data Mail SP', 'System', 1, 'URL Setting Here', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021b', 'Data Area', 'System', 1, 'content/read_param_area', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D021f', 'Data Product', 'System', 1, 'content/read_ms_produk', 'System', '2019-09-01', 'System', '2019-09-01'),
('H08', 'H08', 'D012a', 'Assignment Parameter', 'System', 1, 'content/read_as_agentproduct', 'System', '2019-09-01', 'System', '2019-09-01'),
('H09', '', '', '', NULL, 0, NULL, '', '0000-00-00', '', '0000-00-00'),
('H09', 'H09', 'D022a', 'Pending Instalment', 'System', 1, 'content/read_va_instalment', 'System', '2019-09-01', 'System', '2019-09-01'),
('H05', 'H05', 'D012a', 'Data by Branch', 'System', 1, 'content/read_as_data_by_branch', 'System', '2019-09-01', 'System', '2019-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `t_menuheader`
--

CREATE TABLE `t_menuheader` (
  `f_menuid` varchar(5) NOT NULL,
  `f_menuname` varchar(100) NOT NULL,
  `f_menunotes` varchar(200) NOT NULL,
  `f_status` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menuheader`
--

INSERT INTO `t_menuheader` (`f_menuid`, `f_menuname`, `f_menunotes`, `f_status`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`, `icon`) VALUES
('H01', 'Home', 'System', 1, 'System', '2019-09-01', 'System', '2018-09-06', 'fa fa-home'),
('H03', 'Employee', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-users'),
('H04', 'Loan Accounts', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-credit-card'),
('H05', 'Assignment', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-tasks'),
('H06', 'SP Management', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-cubes'),
('H08', 'Parameter', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-recycle'),
('H09', 'Visit Action', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-table'),
('H10', 'Visit / Survey Result', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-table'),
('H11', 'Report', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-table'),
('H12', 'Monitoring', 'System', 1, 'System', '2019-09-01', 'System', '2019-02-07', 'fa fa-table'),
('H13', 'System Logger', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-table'),
('H99', 'System', 'System', 1, 'System', '2019-09-01', 'System', '2019-09-01', 'fa fa-table'),
('H19', 'ACSESS', 'System', 1, 'System', '2019-02-07', 'System', '2019-02-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_sisvalue`
--

CREATE TABLE `t_sisvalue` (
  `f_sisid` varchar(20) NOT NULL,
  `f_strvalue` varchar(200) NOT NULL,
  `f_numvalue` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `f_userid` varchar(20) NOT NULL,
  `f_username` varchar(150) NOT NULL,
  `f_userpswd` varchar(100) NOT NULL,
  `f_userlevel` varchar(2) NOT NULL,
  `f_active` int(1) NOT NULL,
  `f_usercreate` varchar(100) NOT NULL,
  `f_datecreate` date NOT NULL,
  `f_userupdate` varchar(100) NOT NULL,
  `f_dateupdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`f_userid`, `f_username`, `f_userpswd`, `f_userlevel`, `f_active`, `f_usercreate`, `f_datecreate`, `f_userupdate`, `f_dateupdate`) VALUES
('1117', 'Rudy Bunyamin', '1117', '99', 1, 'System', '2018-09-01', 'System', '2018-10-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_levelmdetail_copy`
--
ALTER TABLE `t_levelmdetail_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menudetail`
--
ALTER TABLE `t_menudetail`
  ADD UNIQUE KEY `idx_mdetail1` (`f_mheaderid`,`f_parentid`,`f_itemid`);

--
-- Indexes for table `t_menuheader`
--
ALTER TABLE `t_menuheader`
  ADD UNIQUE KEY `idx_mheader1` (`f_menuid`);

--
-- Indexes for table `t_sisvalue`
--
ALTER TABLE `t_sisvalue`
  ADD PRIMARY KEY (`f_sisid`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`f_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_levelmdetail_copy`
--
ALTER TABLE `t_levelmdetail_copy`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
