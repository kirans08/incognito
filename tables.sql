-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2015 at 04:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `incognito`
--
CREATE DATABASE IF NOT EXISTS `incognito` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `incognito`;

-- --------------------------------------------------------

--
-- Table structure for table `answer_log`
--

CREATE TABLE IF NOT EXISTS `answer_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `answer` varchar(40) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clues`
--

CREATE TABLE IF NOT EXISTS `clues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `clue_status` int(11) DEFAULT NULL,
  `clue1` text,
  `clue2` text,
  `clue3` text,
  `clue4` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`),
  UNIQUE KEY `level_4` (`level`),
  KEY `level_2` (`level`),
  KEY `level_3` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `question` varchar(40) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `finish` varchar(40) DEFAULT NULL,
  `title_clue` varchar(40) DEFAULT NULL,
  `html_clue` varchar(40) DEFAULT NULL,
  `cookie_clue` varchar(40) DEFAULT NULL,
  `textbox_clue` varchar(40) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `difficulty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storyid` int(11) NOT NULL,
  `imgid` int(15) DEFAULT NULL,
  `storylevel` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fb_userid` bigint(40) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `user_profile` varchar(100) DEFAULT NULL,
  `level` int(4) DEFAULT NULL,
  `pass_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `college` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `mobileno` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid` (`userid`),
  UNIQUE KEY `fb_userid` (`fb_userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2328 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
