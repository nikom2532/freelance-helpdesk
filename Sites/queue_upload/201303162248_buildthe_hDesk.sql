-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2013 at 10:53 PM
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
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `ass_id` varchar(20) CHARACTER SET tis620 NOT NULL,
  `accepted` char(1) CHARACTER SET tis620 DEFAULT NULL,
  `emp_id` varchar(6) CHARACTER SET tis620 DEFAULT NULL,
  `case_id` varchar(10) CHARACTER SET tis620 NOT NULL,
  `status` char(1) CHARACTER SET tis620 DEFAULT NULL,
  `create_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ass_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`ass_id`, `accepted`, `emp_id`, `case_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('1363253242', '', '2167', '201300001', '1', '2167', '2013-03-14 10:27:22', '2167', '2013-03-14 10:27:22'),
('1363253603', '', 'xx', '201300003', '1', 'foofoo', '2013-03-14 10:33:23', 'foofoo', '2013-03-14 10:33:23'),
('1363275512', '', '2167', '201300002', '1', '2167', '2013-03-14 16:38:32', '2167', '2013-03-14 16:38:32'),
('1363276503', '', 'll', '201300004', '1', '2167', '2013-03-14 16:55:03', '2167', '2013-03-14 16:55:03'),
('1363287787', '', '2167', '201300005', '1', '2167', '2013-03-14 20:03:07', '2167', '2013-03-14 20:03:07'),
('1363322247', '', 'pp', '201300007', '1', 'pp', '2013-03-15 11:37:27', 'pp', '2013-03-15 11:37:27'),
('1363322358', '', '2167', '201300008', '1', 'xx', '2013-03-15 11:39:18', 'xx', '2013-03-15 11:39:18'),
('1363324851', '', '2167', '201300006', '1', 'pp', '2013-03-15 12:20:51', 'pp', '2013-03-15 12:20:51'),
('1363324913', '', '2167', '201300009', '1', '2167', '2013-03-15 12:21:53', '2167', '2013-03-15 12:21:53'),
('1363355819', '', '2167', '201300010', '1', '2167', '2013-03-15 20:56:59', '2167', '2013-03-15 20:56:59'),
('1363355823', '', '2167', '201300011', '1', '2167', '2013-03-15 20:57:03', '2167', '2013-03-15 20:57:03'),
('1363355826', '', '2167', '201300012', '1', '2167', '2013-03-15 20:57:06', '2167', '2013-03-15 20:57:06'),
('1363362465', '', '2167', '201300017', '1', '2167', '2013-03-15 22:47:45', '2167', '2013-03-15 22:47:45'),
('1363410931', '', 'pp', '201300018', '1', 'pp', '2013-03-16 12:15:31', 'pp', '2013-03-16 12:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `assign_details`
--

CREATE TABLE IF NOT EXISTS `assign_details` (
  `ass_id` varchar(11) CHARACTER SET tis620 NOT NULL,
  `activity` int(10) DEFAULT NULL,
  `ass_detail` varchar(6) CHARACTER SET tis620 DEFAULT NULL,
  `status` char(1) CHARACTER SET tis620 DEFAULT NULL,
  `emp_id` varchar(6) CHARACTER SET tis620 DEFAULT NULL,
  `assd_id` int(11) NOT NULL AUTO_INCREMENT,
  `del_status` varchar(10) CHARACTER SET tis620 NOT NULL,
  PRIMARY KEY (`assd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `assign_details`
--

INSERT INTO `assign_details` (`ass_id`, `activity`, `ass_detail`, `status`, `emp_id`, `assd_id`, `del_status`) VALUES
('1363287787', NULL, NULL, '2', 'pp', 42, '1'),
('1363287787', NULL, NULL, '2', 'foofoo', 43, '1'),
('1363322247', NULL, NULL, '1', 'pp', 45, ''),
('1363322247', NULL, NULL, '1', 'xx', 46, '1'),
('1363322358', NULL, NULL, '1', '2167', 47, ''),
('1363324851', NULL, NULL, '1', '2167', 48, ''),
('1363324851', NULL, NULL, '1', 'xx', 49, '1'),
('1363324913', NULL, NULL, '1', '2167', 50, ''),
('1363324913', NULL, NULL, '1', 'foofoo', 51, '1'),
('1363355819', NULL, NULL, '1', '2167', 52, ''),
('1363355819', NULL, NULL, '1', '2167', 53, ''),
('1363355823', NULL, NULL, '1', '2167', 54, ''),
('1363355826', NULL, NULL, '1', '2167', 55, ''),
('1363355823', NULL, NULL, '1', 'pp', 56, '1'),
('1363362465', NULL, NULL, '1', '2167', 57, ''),
('1363355826', NULL, NULL, '1', 'ppff', 58, '1'),
('1363410931', NULL, NULL, '1', 'pp', 59, ''),
('1363410931', NULL, NULL, '1', 'foofoo', 64, '1');

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
('201300005', 'sss', 'ddd', '0001', '------------', '3', '2167', '', '3', '1', 'xx', '2013-03-14 20:03:07', 'pp', '2013-03-16 20:57:11', '2167', '2013-03-14 19:34:37', '2167', '2013-03-17 00:00:00'),
('201300006', 'test555', 'test555', '', '', '', 'pp', '', '1', NULL, 'xx', '2013-03-15 12:20:51', NULL, NULL, 'pp', '2013-03-15 11:33:27', '2167', '2013-03-15 12:20:51'),
('201300007', 'test666', 'test666', '0003', '', '6', 'pp', '', '1', '1', 'xx', '2013-03-15 11:37:27', NULL, NULL, 'pp', '2013-03-15 11:37:18', 'pp', '2013-03-15 11:37:27'),
('201300008', 'คอมเสีย', 'คอมเสีย', '0002', '', '4', 'xx', '0208-07_pr', '1', NULL, '2167', '2013-03-15 11:39:18', NULL, NULL, 'xx', '2013-03-15 11:38:35', '2167', '2013-03-15 11:39:18'),
('201300009', 'ทดสอบ', 'ทดสอบ', '0001', '000005', '3', '2167', '', '1', '11', 'foofoo', '2013-03-15 12:21:53', NULL, NULL, '2167', '2013-03-15 12:21:34', '2167', '2013-03-15 12:21:53'),
('201300010', 'test7', 'test7', '0003', '000003', '7', '2167', '', '1', NULL, '2167', '2013-03-15 20:56:59', NULL, NULL, '2167', '2013-03-15 13:36:00', '2167', '2013-03-19 00:00:00'),
('201300011', '2', '2', '0001', '000001', '5', '2167', 'foursquare_photo_tmp.jpg', '1', NULL, 'foofoo', '2013-03-15 20:57:03', NULL, NULL, '2167', '2013-03-15 16:53:05', '2167', '2013-03-18 00:00:00'),
('201300012', 'testttt', 'testttt', '0001', '000005', '3', '2167', '0208-07_project_questions.png', '1', NULL, 'ppff', '2013-03-15 20:57:06', NULL, NULL, '2167', '2013-03-15 17:21:55', '2167', '2013-03-15 20:57:06'),
('201300013', 'ทดสอบ', 'ทดสอบ', '0001', '000008', '4', '2167', '146314_tumblr_mb9pplbsyw1rxgpuuo1_500_large.jpg', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 17:24:07', NULL, NULL),
('201300014', 'คอมเสีย', 'คอมเสีย', '0003', '000004', '6', '2167', 'Inventory.txt', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 17:25:32', NULL, NULL),
('201300015', 'ทดสอบแจ้ง', 'llllllllll', '0001', '000008', '1', '2167', '28-300x264.jpg', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 18:42:49', NULL, NULL),
('201300016', 'ทดสอบแจ้งงาน', 'คอมเตอร์เต', '0001', '000008', '1', '1000', 'Java-Pretest.docx', '0', NULL, NULL, NULL, NULL, NULL, '2167', '2013-03-15 20:47:55', NULL, NULL),
('201300017', 'testtest', 'testtest', '0002', '000002', '4', 'xx', '', '1', NULL, '2167', '2013-03-15 22:47:45', NULL, NULL, '2167', '2013-03-15 22:05:19', '2167', '2013-03-12 22:05:19'),
('201300018', '10', '10', '0001', '000001', '5', 'pp', '201300018animated-overlay.gif,', '1', NULL, 'foofoo', '2013-03-21 12:15:31', NULL, NULL, 'pp', '2013-03-21 12:15:24', 'pp', '2013-03-21 12:15:31'),
('201300019', '13', '13', '0001', '000008', '5', 'pp', '201300019201303161211_buildthe_hDesk.sql,', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 12:37:16', NULL, '2013-03-16 12:37:16'),
('201300020', '15', '15', '0001', '000005', '5', 'pp', '201300020201303161211_buildthe_hDesk.sql,', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 13:44:45', NULL, '2013-03-16 13:44:45'),
('201300021', '16', '16', '0001', '000001', '5', 'pp', '201300021201303161211_buildthe_hDesk.sql,', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 18:36:07', NULL, '2013-03-16 18:36:07'),
('201300022', '17', '17', '0001', '000008', '5', 'pp', '201303161850 Backup from wesassycom_desk.sql', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 18:59:33', NULL, NULL),
('201300023', '111', '111', '0003', '000004', '2', 'pp', '28-300x264.jpg', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 19:32:42', NULL, NULL),
('201300024', 'qqqqqq', 'qqqqqqqqq', '0003', '000004', '1', 'pp', '09_05_2012_1424เขา0.jpg', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 20:06:01', NULL, NULL),
('201300025', 'qw', 'qw', '0003', '000004', '1', 'pp', 'a1.jpg', '0', NULL, NULL, NULL, NULL, NULL, 'pp', '2013-03-16 20:07:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ass_id` varchar(11) CHARACTER SET tis620 NOT NULL,
  `comment_detail` varchar(100) CHARACTER SET tis620 DEFAULT NULL,
  `emp_id` varchar(6) CHARACTER SET tis620 NOT NULL,
  `status` char(1) CHARACTER SET tis620 DEFAULT NULL,
  `create_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `ass_id`, `comment_detail`, `emp_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '1363253242', 'กากกกกก', '2167', '1', '2167', '2013-03-14 10:27:37', NULL, NULL),
(2, '1363253242', 'test', '2167', '1', '2167', '2013-03-14 10:27:49', NULL, NULL),
(3, '1363253242', 'testt', 'foofoo', '1', 'foofoo', '2013-03-14 10:29:37', NULL, NULL),
(4, '1363253603', 'เม้าเสีย', 'xx', '1', 'xx', '2013-03-14 10:33:55', NULL, NULL),
(5, '1363253603', 'ซ่อมได้มั้ย', 'xx', '1', 'xx', '2013-03-14 10:34:06', NULL, NULL),
(6, '1363322247', 'test', 'pp', '1', 'pp', '2013-03-15 11:37:42', NULL, NULL),
(7, '1363324913', 'test', '2167', '1', '2167', '2013-03-15 12:22:17', NULL, NULL),
(8, '1363287787', 'ทดสอบ', '2167', '1', '2167', '2013-03-16 00:55:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `com_id` varchar(10) NOT NULL,
  `com_detail` varchar(100) NOT NULL,
  `wsitem_id` varchar(10) NOT NULL,
  `isused` varchar(2) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`com_id`, `com_detail`, `wsitem_id`, `isused`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('0001', 'Com_1', '', 'T', '2167', '2013-01-13 21:05:39', '2167', '0000-00-00 00:00:00'),
('0002', 'Com_2', '000002', 'T', '2167', '2013-03-04 00:00:00', '', '0000-00-00 00:00:00'),
('0003', 'Com_3', '000003', 'T', '1111', '2013-03-04 00:00:00', '', '0000-00-00 00:00:00'),
('0004', 'Com_4', '000004', 'T', '1000', '2013-03-04 00:00:00', '', '0000-00-00 00:00:00'),
('005', 'testCom', '', 'T', '2167', '2013-03-15 13:35:11', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` varchar(10) NOT NULL,
  `hos_id` int(2) NOT NULL,
  `epassword` varchar(40) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `esurname` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL,
  `isworking` varchar(2) NOT NULL,
  `position` varchar(100) NOT NULL,
  `create_by` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `hos_id`, `epassword`, `ename`, `esurname`, `level`, `isworking`, `position`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('2167', 0, 'b59c67bf196a4758191e42f76670ceba', 'ผู้ดูแล', 'ระบบ', '3', 'T', 'สารสนเทศ', '', '0000-00-00 00:00:00', 'pp', '2013-03-16 10:42:43'),
('1000', 0, '', 'ทดสอบ', 'ระบบ', '2', 'T', 'สารสนเทศ', '2167', '2012-12-02 15:38:33', '2167', '2013-03-15 13:34:02'),
('ppff', 0, '', 'ppff', 'ppff', '1', 'T', 'IT', '2167', '2013-03-04 18:22:07', '2167', '2013-03-15 13:33:49'),
('pp', 0, 'bfa86719756bb1193fc792d04d8d2f71', 'pp', 'pp', '2', 'T', 'IT', '2167', '2013-03-04 18:24:07', '2167', '2013-03-04 18:49:24'),
('foofoo', 0, 'b8edafdf64d52d894c4941294e0bd92e', 'foofoo', 'foofoo', '2', 'T', 'IT', '2167', '2013-03-04 18:25:01', '', '0000-00-00 00:00:00'),
('xx', 0, '01d6a026f8c80c742d5e49e215f16844', 'xx', 'xx', '1', 'T', 'HR', 'pp', '2013-03-09 09:37:27', '', '0000-00-00 00:00:00'),
('ll', 0, '664542847d15bb0b843252857b439594', 'll', 'll', '3', 'T', 'll', '2167', '2013-03-14 16:50:45', '', '0000-00-00 00:00:00'),
('test', 0, '', 'testt', 'testt', '2', 'T', 'Account', '2167', '2013-03-15 13:28:44', '2167', '2013-03-15 13:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) CHARACTER SET tis620 NOT NULL,
  `news_detail` varchar(100) CHARACTER SET tis620 NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(10) CHARACTER SET tis620 NOT NULL,
  `isused` varchar(2) CHARACTER SET tis620 NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(10) CHARACTER SET tis620 NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_detail`, `create_date`, `create_by`, `isused`, `update_date`, `update_by`) VALUES
(18, 'หัวข้อข่าว 1', 'รายละเอียดข่า 1                              ', '2012-08-27 11:37:32', '2167', 'F', '2013-03-16 22:49:57', 'll'),
(19, 'หัวข้อข่าว 2', 'รายละเอียดข่าว 2', '2012-08-27 11:39:30', '2167', 'T', '0000-00-00 00:00:00', ''),
(20, '', 'ทดสอบข่าว11', '2013-03-16 01:55:53', '2167', 'T', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `problemtype`
--

CREATE TABLE IF NOT EXISTS `problemtype` (
  `problemtype_id` int(15) NOT NULL AUTO_INCREMENT,
  `detail` varchar(25) NOT NULL,
  `isused` varchar(2) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`problemtype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `problemtype`
--

INSERT INTO `problemtype` (`problemtype_id`, `detail`, `isused`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Problem-Hardware', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:18:21'),
(2, 'Problem-Software', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:18:32'),
(3, 'Problem-Network', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:18:47'),
(4, 'Problem-Application', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:19:00'),
(5, 'Problem-Human Error', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:19:12'),
(6, 'Problem-Other', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:27:57'),
(7, 'Request-Report', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 'Request-Program', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:28:27'),
(9, 'Request-Modified Data', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:32:31'),
(10, 'Request-Training', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:32:55'),
(11, 'Request-Technical Advice', 'T', '', '0000-00-00 00:00:00', '9054', '2010-06-30 20:34:22'),
(12, 'Request-Hardware', 'T', '', '0000-00-00 00:00:00', '9054', '2010-07-20 19:09:16'),
(101, 'Request-Others', 'T', '9054', '2010-07-20 19:09:40', '', '0000-00-00 00:00:00'),
(102, 'Request-Notebook & Projec', 'T', '2163', '2012-02-22 10:03:52', '', '0000-00-00 00:00:00'),
(103, 'Request-Internet', 'T', '2163', '2012-03-22 14:38:41', '', '0000-00-00 00:00:00'),
(104, 'Request-Website', 'T', '2167', '2012-04-30 08:16:50', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(10) NOT NULL AUTO_INCREMENT,
  `section_detail` varchar(40) NOT NULL,
  `isused` varchar(2) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_detail`, `isused`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, ' แผนกโสตทัศนศิลป์ ', 'T', '', '0000-00-00 00:00:00', '2167', '2012-09-06 11:22:22'),
(2, ' แผนกคลังสินค้า (STORE)', 'T', '', '0000-00-00 00:00:00', '2167', '2012-09-06 13:46:26'),
(3, ' แผนกซ่อมบำรุง', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, ' แผนกโภชนาการ', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'สารสนเทศ (IT)', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'บัญชี', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 'บุคคล (HR)', 'T', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ws_item`
--

CREATE TABLE IF NOT EXISTS `ws_item` (
  `wsitem_id` varchar(12) NOT NULL,
  `wsitem_detail` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `serial` varchar(30) NOT NULL,
  `it_asset` varchar(100) NOT NULL,
  `com_id` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `isused` varchar(2) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`wsitem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `ws_item`
--

INSERT INTO `ws_item` (`wsitem_id`, `wsitem_detail`, `brand`, `model`, `serial`, `it_asset`, `com_id`, `name`, `isused`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('000001', 'item_1', 'seagate', 'x0157', '0123456', '01587', '0001', 'Ram', 'F', '1000', '2013-03-04 00:00:00', 'pp', '2013-03-16 22:27:12'),
('000002', 'item_2', 'Intel', 'sd1234', '854169', '01233', '0002', 'Hardisk', 'T', '2167', '2013-03-05 00:00:00', '', '0000-00-00 00:00:00'),
('000003', 'item_3', 'HP', 'x1257', '125647', '215887', '0003', 'Monitor', 'T', '2167', '2013-03-02 00:00:00', '', '0000-00-00 00:00:00'),
('000004', 'item_4', 'Dell', 'jk4598', '02154478', '125478', '0003', 'Keyboard', 'T', '1111', '2013-03-03 00:00:00', '', NULL),
('000008', 'flashdrive', 'zz', 'zz', 'zz', '', '0001', 'Dell', 'T', '2167', '2013-03-14 09:26:26', '', NULL),
('000005', 'mouse', 'belkin', '1234', '1234', '1234567', '0001', 'belkin', 'T', 'foofoo', '2013-03-14 10:32:09', '', NULL),
('11', '11', '11', '11', '11', '', '0001', '', 'T', 'pp', '2013-03-16 02:20:28', '', NULL),
('22', '22', '22', '22', '22', '', '0004', '', 'T', 'pp', '2013-03-16 02:20:46', '', NULL),
('33', '33', '33', '33', '33', '', '005', '', 'T', 'pp', '2013-03-16 02:20:57', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
