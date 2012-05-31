-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 29, 2012 at 02:21 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `system-downloads`
--

CREATE TABLE IF NOT EXISTS `system-downloads` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `host_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `system-members`
--

CREATE TABLE IF NOT EXISTS `system-members` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `host_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `rights` int(2) NOT NULL DEFAULT '0', 
  `company_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `rep_f_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `rep_l_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `rep_sur` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `rep_title` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `rep_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `mail_address` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `province` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `pcode` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `tel_no` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `fax_no` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `member_since` int(5) NOT NULL DEFAULT '0',
  `web_address` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `company_info` longtext CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Table structure for table `system-news`
--

CREATE TABLE IF NOT EXISTS `system-news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(10) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `system-pages`
--

CREATE TABLE IF NOT EXISTS `system-pages` (
  `page` varchar(255) NOT NULL,
  `content` varchar(25555) NOT NULL,
  `tbl1` varchar(2555) NOT NULL,
  `tbl2` varchar(2555) NOT NULL,
  `tbl3` varchar(2555) NOT NULL,
  `tbl4` varchar(2555) NOT NULL,
  `tbl5` varchar(2555) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
