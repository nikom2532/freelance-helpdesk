-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2013 at 05:08 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildthe_hDesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `case_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `com_id` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `wsitem_id` varchar(12) CHARACTER SET tis620 NOT NULL,
  `section_id` varchar(2) CHARACTER SET tis620 DEFAULT NULL,
  `admin_id` varchar(10) CHARACTER SET tis620 NOT NULL,
  `attachments` varchar(200) CHARACTER SET tis620 DEFAULT NULL,
  `issused` char(1) CHARACTER SET tis620 DEFAULT NULL,
  `problemtype_id` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `work_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `work_date` datetime DEFAULT NULL,
  `close_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  `create_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`case_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_ID`, `title`, `description`, `com_id`, `wsitem_id`, `section_id`, `admin_id`, `attachments`, `issused`, `problemtype_id`, `work_by`, `work_date`, `close_by`, `close_date`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('201300001', 'test1', 'test1', '0003', '000004', '4', '2167', '', '3', '102', 'foofoo', '2013-03-14 10:27:22', 'foofoo', '2013-03-14 10:29:55', '2167', '2013-03-14 10:26:34', '2167', '2013-03-14 10:27:22'),
('201300002', 'test2', 'test2', '0003', '000003', '3', '2167', '', '1', NULL, '2167', '2013-03-14 16:38:32', NULL, NULL, '2167', '2013-03-14 10:27:08', '2167', '2013-03-14 16:38:32'),
('201300003', 'test3', 'test3', '0001', '000005', '4', 'foofoo', '', '3', '1', 'll', '2013-03-14 10:33:23', '2167', '2013-03-14 20:02:51', 'foofoo', '2013-03-14 10:32:41', 'xx', '2013-03-14 10:33:23'),
('201300004', 'test', 'test', '0002', '000002', '4', '2167', 'menu_searc', '1', NULL, 'pp', '2013-03-14 16:55:03', NULL, NULL, '2167', '2013-03-14 13:51:02', 'll', '2013-03-14 16:55:03'),
('201300005', 'sss', 'ddd', '0001', '------------', '3', '2167', '', '1', NULL, 'xx', '2013-03-14 20:03:07', NULL, NULL, '2167', '2013-03-14 19:34:37', '2167', '2013-03-14 20:03:07'),
('201300006', 'test555', 'test555', '', '', '', 'pp', '', '1', NULL, 'xx', '2013-03-15 12:20:51', NULL, NULL, 'pp', '2013-03-15 11:33:27', '2167', '2013-03-15 12:20:51'),
('201300007', 'test666', 'test666', '0003', '', '6', 'pp', '', '1', '1', 'xx', '2013-03-15 11:37:27', NULL, NULL, 'pp', '2013-03-15 11:37:18', 'pp', '2013-03-15 11:37:27'),
('201300008', 'คอมเสีย', 'คอมเสีย', '0002', '', '4', 'xx', '0208-07_pr', '1', NULL, '2167', '2013-03-15 11:39:18', NULL, NULL, 'xx', '2013-03-15 11:38:35', '2167', '2013-03-15 11:39:18'),
('201300009', 'ทดสอบ', 'ทดสอบ', '0001', '000005', '3', '2167', '', '1', '11', 'foofoo', '2013-03-15 12:21:53', NULL, NULL, '2167', '2013-03-15 12:21:34', '2167', '2013-03-15 12:21:53'),
('201300010', 'test7', 'test7', '0003', '000003', '7', '2167', '', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 13:36:00', NULL, NULL),
('201300011', '2', '2', '0001', '000001', '5', '2167', 'foursquare_photo_tmp.jpg', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 16:53:05', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
