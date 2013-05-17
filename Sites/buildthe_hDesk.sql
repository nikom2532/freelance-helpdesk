-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2013 at 02:43 PM
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
('00', NULL, '2167', 'C001', '1', '2167', '2013-03-05 00:00:00', NULL, NULL),
('13', '1', '2167', '201300008', '1', '2167', '2013-03-09 06:51:04', NULL, NULL),
('1362809481', '1', '2167', '201300009', '1', '2167', '2013-03-09 07:11:21', NULL, NULL),
('1362812745', '1', '2167', '201300010', '1', '2167', '2013-03-09 08:05:45', NULL, NULL),
('1362813037', '1', '2167', 'C002', '1', '1000', '2013-03-09 08:10:37', NULL, NULL),
('1362816741', '1', 'pp', 'C004', '1', 'ppff', '2013-03-09 09:12:21', NULL, NULL),
('1362818150', '1', 'pp', '201300011', '1', 'pp', '2013-03-09 09:35:50', NULL, NULL),
('1362840749', '1', '2167', '201300014', '1', '2167', '2013-03-09 15:52:29', NULL, NULL),
('1362892102', '', '2167', '201300012', '1', 'foofoo', '2013-03-10 06:08:22', NULL, NULL),
('1362895026', '', '2167', '201300015', '1', '2167', '2013-03-10 12:57:06', NULL, NULL),
('1362895232', '', '2167', '201300016', '1', '2167', '2013-03-10 13:00:32', NULL, NULL);

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
  PRIMARY KEY (`assd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `assign_details`
--

INSERT INTO `assign_details` (`ass_id`, `activity`, `ass_detail`, `status`, `emp_id`, `assd_id`) VALUES
('', NULL, NULL, '1', 'foofoo', 1),
('', NULL, NULL, '1', '2167', 2),
('', NULL, NULL, '1', '2167', 3),
('', NULL, NULL, '1', '2167', 4),
('', NULL, NULL, '1', '2167', 5),
('1362812745', NULL, NULL, '1', 'pp', 6),
('1362812745', NULL, NULL, '1', 'foofoo', 7),
('1362816741', NULL, NULL, '1', 'pp', 8),
('1362812745', NULL, NULL, '1', 'pp', 9),
('1362812745', NULL, NULL, '1', 'pp', 10),
('1362812745', NULL, NULL, '1', '2167', 11),
('1362818150', NULL, NULL, '1', 'pp', 12),
('1362818150', NULL, NULL, '1', 'foofoo', 13),
('1362809481', NULL, NULL, '1', 'xx', 14),
('1362840749', NULL, NULL, '2', '2167', 15),
('1362840749', NULL, NULL, '2', 'xx', 16),
('1362892102', NULL, NULL, '1', '2167', 17),
('1362892102', NULL, NULL, '1', 'foofoo', 18),
('1362895026', NULL, NULL, '2', '2167', 19),
('1362895232', NULL, NULL, '1', '2167', 20);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `case_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `com_id` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
  `section_id` varchar(2) CHARACTER SET tis620 DEFAULT NULL,
  `admin_id` varchar(10) CHARACTER SET tis620 NOT NULL,
  `attachments` varchar(10) CHARACTER SET tis620 DEFAULT NULL,
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

INSERT INTO `cases` (`case_ID`, `title`, `description`, `com_id`, `section_id`, `admin_id`, `attachments`, `issused`, `problemtype_id`, `work_by`, `work_date`, `close_by`, `close_date`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('201300006', 'aaaa', 'aaaa', '000002', '2', '2167', '2013000061', '1', '5', NULL, NULL, NULL, NULL, '2167', '2013-03-08 19:39:17', NULL, NULL),
('201300007', '121212', '121212', '000003', '2', 'foofoo', '', '1', '7', NULL, NULL, NULL, NULL, '2167', '2013-03-08 21:34:55', NULL, NULL),
('201300008', '343434', '343443', '000002', '4', '2167', '', '1', '9', '2167', '2013-03-09 06:51:04', NULL, NULL, '2167', '2013-03-08 21:36:09', NULL, NULL),
('201300009', '454545', '454545', '000003', '3', 'pp', '', '1', '5', 'xx', '2013-03-09 07:11:21', NULL, NULL, '2167', '2013-03-08 21:56:47', NULL, NULL),
('201300010', '55555', '555555', '000002', '1', 'foofoo', '2013000101', '1', '8', '2167', '2013-03-09 08:05:45', NULL, NULL, '2167', '2013-03-08 22:01:28', NULL, NULL),
('201300011', 'xxxxx', 'xxxxx', '000003', '2', '2167', '', '1', '5', 'foofoo', '2013-03-09 09:35:50', NULL, NULL, 'pp', '2013-03-09 09:35:36', NULL, NULL),
('201300012', 'hhhhh', 'hhhhhh', '000002', '4', '2167', '201300012f', '1', '10', 'foofoo', '2013-03-10 06:08:22', NULL, NULL, 'foofoo', '2013-03-09 15:17:08', NULL, NULL),
('201300013', '', '', '', '', '', '', '0', '8', NULL, NULL, NULL, NULL, 'foofoo', '2013-03-09 15:37:40', NULL, NULL),
('201300014', '1234', '1234', '0002', '4', '2167', '201300014f', '3', '5', 'xx', '2013-03-09 15:52:29', '2167', '2013-03-10 06:05:14', '2167', '2013-03-09 15:52:06', NULL, NULL),
('201300015', '89898989', '89898989', '0002', '1', '2167', '', '3', '101', '2167', '2013-03-10 12:57:06', '2167', '2013-03-10 12:58:35', '2167', '2013-03-10 12:56:37', NULL, NULL),
('201300016', 'xxxxxxxxxxxx', 'xxxxxxxxxx', '0002', '1', 'foofoo', '', '1', NULL, '2167', '2013-03-10 13:00:32', NULL, NULL, '2167', '2013-03-10 12:59:47', NULL, NULL),
('C001', 'Problem_1', 'aaaaaaaaa', '0001', '1', '', NULL, '2', '1', '2167', NULL, NULL, NULL, 'pp', '2013-03-03 00:00:00', NULL, NULL),
('C002', 'Problem_2', 'bbbbbbbb', '0002', '3', '', NULL, '1', '5', '2167', '2013-03-09 08:10:37', NULL, NULL, '1000', '0000-00-00 00:00:00', NULL, NULL),
('C003', 'Problem_3', 'cccccc', '0003', '6', '2167', NULL, '3', '4', '1000', '2013-03-03 00:00:00', '2167', '2013-03-08 21:29:51', '2167', '2013-03-04 00:00:00', '2167', '2013-03-04 00:00:00'),
('C004', 'Problem_4', 'bbbbbbbb', '0004', '5', '', NULL, '1', '5', 'pp', '2013-03-09 09:12:21', NULL, NULL, 'ppff', '2013-03-04 00:00:00', NULL, NULL),
('C005', 'Problem_5', 'sssssss', '0003', '4', '2167', NULL, '3', '5', '2167', '2013-03-04 00:00:00', '2167', '2013-03-10 06:03:21', 'pp', '2013-03-01 00:00:00', 'foofoo', '2013-03-04 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `ass_id`, `comment_detail`, `emp_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '', 'test1', '2167', '1', '2167', '2013-03-09 08:05:13', NULL, NULL),
(2, '1362813037', 'rainy', '2167', '1', '2167', '2013-03-09 08:12:09', NULL, NULL),
(3, '1362813037', 'rainy2', '2167', '1', '2167', '2013-03-09 08:16:10', NULL, NULL),
(4, '1362813037', 'rainy_agai', '2167', '1', '2167', '2013-03-09 08:20:03', NULL, NULL),
(5, '', 'test 20130', '2167', '1', '2167', '2013-03-09 08:23:06', NULL, NULL),
(6, '', '', '2167', '1', '2167', '2013-03-09 08:23:31', NULL, NULL),
(7, '1362812745', 'from main1', '2167', '1', '2167', '2013-03-09 08:52:43', NULL, NULL),
(8, '1362812745', 'from main ', '2167', '1', '2167', '2013-03-09 08:52:54', NULL, NULL),
(9, '', 'www', 'pp', '1', 'pp', '2013-03-09 09:12:32', NULL, NULL),
(10, '1362812745', 'from main ', 'pp', '1', 'pp', '2013-03-09 09:31:19', NULL, NULL),
(11, '1362812745', 'from main1', 'pp', '1', 'pp', '2013-03-09 09:31:43', NULL, NULL),
(12, '1362812745', 'FROM MAIN xxxxxxxxxxxxxxxx', 'pp', '1', 'pp', '2013-03-09 09:32:54', NULL, NULL),
(13, '1362818150', '11111111111', 'pp', '1', 'pp', '2013-03-09 09:36:19', NULL, NULL),
(14, '1362809481', 'hello aaaaa sccd', 'xx', '1', 'xx', '2013-03-09 09:40:51', NULL, NULL),
(15, '1362812745', 'สวัสดี', '2167', '1', '2167', '2013-03-09 15:00:16', NULL, NULL),
(16, '1362840749', '44444', '2167', '1', '2167', '2013-03-09 15:52:39', NULL, NULL),
(17, '1362840749', 'ssss', '2167', '1', '2167', '2013-03-10 06:03:44', NULL, NULL),
(18, '1362840749', 'ggg', '2167', '1', '2167', '2013-03-10 06:03:58', NULL, NULL),
(19, '1362840749', 'test', 'xx', '1', 'xx', '2013-03-10 06:04:22', NULL, NULL),
(20, '1362892102', 'Network', '2167', '1', '2167', '2013-03-10 06:08:38', NULL, NULL),
(21, '1362892102', 'dddd', '2167', '1', '2167', '2013-03-10 06:09:29', NULL, NULL),
(22, '1362892102', 'dddd', '2167', '1', '2167', '2013-03-10 06:10:26', NULL, NULL),
(23, '1362892102', 'dddd', '2167', '1', '2167', '2013-03-10 06:10:30', NULL, NULL),
(24, '1362892102', 't', '2167', '1', '2167', '2013-03-10 06:10:37', NULL, NULL),
(25, '1362892102', '', '2167', '1', '2167', '2013-03-10 06:12:02', NULL, NULL),
(26, '1362892102', 'uuuu', '2167', '1', '2167', '2013-03-10 06:12:08', NULL, NULL),
(27, '1362892102', 'yy', '2167', '1', '2167', '2013-03-10 06:12:59', NULL, NULL),
(28, '', 'qq', '2167', '1', '2167', '2013-03-10 06:15:26', NULL, NULL),
(29, '1362892102', 'yuuu', '2167', '1', '2167', '2013-03-10 06:20:23', NULL, NULL),
(30, '1362892102', 'oooo', '2167', '1', '2167', '2013-03-10 06:21:20', NULL, NULL),
(31, '1362892102', 'lll', '2167', '1', '2167', '2013-03-10 06:25:26', NULL, NULL),
(32, '1362892102', '888', '2167', '1', '2167', '2013-03-10 06:25:50', NULL, NULL),
(33, '1362892102', 'hhh', '2167', '1', '2167', '2013-03-10 06:26:50', NULL, NULL),
(34, '1362892102', 'y', '2167', '1', '2167', '2013-03-10 06:31:08', NULL, NULL),
(35, '1362892102', 'yyy', '2167', '1', '2167', '2013-03-10 06:33:17', NULL, NULL),
(36, '1362892102', 'uui', '2167', '1', '2167', '2013-03-10 06:35:23', NULL, NULL),
(37, '1362892102', 'rrr', '2167', '1', '2167', '2013-03-10 06:36:20', NULL, NULL),
(38, '1362892102', '[', '2167', '1', '2167', '2013-03-10 06:36:54', NULL, NULL),
(39, '1362892102', '8888', '2167', '1', '2167', '2013-03-10 12:54:49', NULL, NULL),
(40, '1362812745', '77777', '2167', '1', '2167', '2013-03-10 12:55:50', NULL, NULL),
(41, '1362895026', '00000000000', '2167', '1', '2167', '2013-03-10 12:57:18', NULL, NULL),
(42, '1362895026', 'popopop', '2167', '1', '2167', '2013-03-10 12:58:02', NULL, NULL);

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
('0004', 'Com_4', '000004', 'T', '1000', '2013-03-04 00:00:00', '', '0000-00-00 00:00:00');

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
('2167', 0, 'b7231b6610e0274a7c2bc27efffe6e9c', 'น่ารัก', 'มาก', '3', 'T', 'สารสนเทศ', '', '0000-00-00 00:00:00', '2167', '2013-02-28 02:31:25'),
('1000', 0, 'b7231b6610e0274a7c2bc27efffe6e9c', 'ทดสอบ', 'ระบบ', '0', 'T', 'สารสนเทศ', '2167', '2012-12-02 15:38:33', '', '0000-00-00 00:00:00'),
('ppff', 0, '4f6c69618b93af38fbd9c958dc8db209', 'ppff', 'ppff', '0', 'T', 'IT', '2167', '2013-03-04 18:22:07', '', '0000-00-00 00:00:00'),
('pp', 0, 'bfa86719756bb1193fc792d04d8d2f71', 'pp', 'pp', '2', 'T', 'IT', '2167', '2013-03-04 18:24:07', '2167', '2013-03-04 18:49:24'),
('foofoo', 0, 'b8edafdf64d52d894c4941294e0bd92e', 'foofoo', 'foofoo', '2', 'T', 'IT', '2167', '2013-03-04 18:25:01', '', '0000-00-00 00:00:00'),
('xx', 0, '01d6a026f8c80c742d5e49e215f16844', 'xx', 'xx', '1', 'T', 'HR', 'pp', '2013-03-09 09:37:27', '', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_detail`, `create_date`, `create_by`, `isused`, `update_date`, `update_by`) VALUES
(18, 'หัวข้อข่าว 1', 'รายละเอียดข่า 1                    ', '2012-08-27 11:37:32', '2167', 'T', '2013-01-13 16:24:43', '2167'),
(19, 'หัวข้อข่าว 2', 'รายละเอียดข่าว 2', '2012-08-27 11:39:30', '2167', 'T', '0000-00-00 00:00:00', '');

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
('000001', 'item_1', 'seagate', 'x0157', '0123456', '01587', '0001', 'Ram', 'T', '1000', '2013-03-04 00:00:00', '', '0000-00-00 00:00:00'),
('000002', 'item_2', 'Intel', 'sd1234', '854169', '01233', '0002', 'Hardisk', 'T', '2167', '2013-03-05 00:00:00', '', '0000-00-00 00:00:00'),
('000003', 'item_3', 'HP', 'x1257', '125647', '215887', '0003', 'Monitor', 'T', '2167', '2013-03-02 00:00:00', '', '0000-00-00 00:00:00'),
('000004', 'item_4', 'Dell', 'jk4598', '02154478', '125478', '0004', 'Keyboard', 'T', '1111', '2013-03-03 00:00:00', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
