-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2013 at 09:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpdesk`
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
('1363287787', '', '2167', '201300005', '1', '2167', '2013-03-14 20:03:07', '2167', '2013-03-14 20:03:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `assign_details`
--

INSERT INTO `assign_details` (`ass_id`, `activity`, `ass_detail`, `status`, `emp_id`, `assd_id`, `del_status`) VALUES
('1363253242', NULL, NULL, '2', 'pp', 1, ''),
('1363275512', NULL, NULL, '1', '2167', 6, ''),
('1363276503', NULL, NULL, '1', 'foofoo', 34, '1'),
('1363253603', NULL, NULL, '2', 'pp', 36, '1'),
('1363253603', NULL, NULL, '2', 'll', 37, '1'),
('1363287787', NULL, NULL, '1', '2167', 38, ''),
('1363287787', NULL, NULL, '1', 'pp', 40, '1');

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

INSERT INTO `cases` (`case_ID`, `title`, `description`, `com_id`, `wsitem_id`, `section_id`, `admin_id`, `attachments`, `issused`, `problemtype_id`, `work_by`, `work_date`, `close_by`, `close_date`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('201300001', 'test1', 'test1', '0003', '000004', '4', '2167', '', '3', '102', 'foofoo', '2013-03-14 10:27:22', 'foofoo', '2013-03-14 10:29:55', '2167', '2013-03-14 10:26:34', '2167', '2013-03-14 10:27:22'),
('201300002', 'test2', 'test2', '0003', '000003', '3', '2167', '', '1', NULL, '2167', '2013-03-14 16:38:32', NULL, NULL, '2167', '2013-03-14 10:27:08', '2167', '2013-03-14 16:38:32'),
('201300003', 'test3', 'test3', '0001', '000005', '4', 'foofoo', '', '3', '1', 'll', '2013-03-14 10:33:23', '2167', '2013-03-14 20:02:51', 'foofoo', '2013-03-14 10:32:41', 'xx', '2013-03-14 10:33:23'),
('201300004', 'test', 'test', '0002', '000002', '4', '2167', '', '1', NULL, 'pp', '2013-03-14 16:55:03', NULL, NULL, '2167', '2013-03-14 13:51:02', 'll', '2013-03-14 16:55:03'),
('201300005', 'sss', 'ddd', '0001', '------------', '3', '2167', '', '1', NULL, 'xx', '2013-03-14 20:03:07', NULL, NULL, '2167', '2013-03-14 19:34:37', '2167', '2013-03-14 20:03:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `ass_id`, `comment_detail`, `emp_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '1363253242', 'กากกกกก', '2167', '1', '2167', '2013-03-14 10:27:37', NULL, NULL),
(2, '1363253242', 'test', '2167', '1', '2167', '2013-03-14 10:27:49', NULL, NULL),
(3, '1363253242', 'testt', 'foofoo', '1', 'foofoo', '2013-03-14 10:29:37', NULL, NULL),
(4, '1363253603', 'เม้าเสีย', 'xx', '1', 'xx', '2013-03-14 10:33:55', NULL, NULL),
(5, '1363253603', 'ซ่อมได้มั้ย', 'xx', '1', 'xx', '2013-03-14 10:34:06', NULL, NULL);

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
('xx', 0, '01d6a026f8c80c742d5e49e215f16844', 'xx', 'xx', '1', 'T', 'HR', 'pp', '2013-03-09 09:37:27', '', '0000-00-00 00:00:00'),
('ll', 0, '664542847d15bb0b843252857b439594', 'll', 'll', '3', 'T', 'll', '2167', '2013-03-14 16:50:45', '', '0000-00-00 00:00:00');

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
('000004', 'item_4', 'Dell', 'jk4598', '02154478', '125478', '0003', 'Keyboard', 'T', '1111', '2013-03-03 00:00:00', '', NULL),
('000008', 'flashdrive', 'zz', 'zz', 'zz', '', '0001', 'Dell', 'T', '2167', '2013-03-14 09:26:26', '', NULL),
('000005', 'mouse', 'belkin', '1234', '1234', '1234567', '0001', 'belkin', 'T', 'foofoo', '2013-03-14 10:32:09', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
