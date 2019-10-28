-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2019 at 05:19 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cygli`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `GR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`GR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GR_ID`, `NAME`) VALUES
(100, '3-ПР-11');

-- --------------------------------------------------------

--
-- Table structure for table `LISTS`
--

CREATE TABLE IF NOT EXISTS `LISTS` (
  `LI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ST_ID` int(11) NOT NULL,
  `WR_ID` int(11) NOT NULL,
  `RATING` int(11) NOT NULL,
  PRIMARY KEY (`LI_ID`),
  KEY `WO_ID` (`WR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `LG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `WR_ID` int(11) DEFAULT NULL,
  `QUEST` varchar(300) DEFAULT NULL,
  `ANSWER` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`LG_ID`),
  KEY `NT_ID` (`WR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mods`
--

CREATE TABLE IF NOT EXISTS `mods` (
  `MD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`MD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `MO_ID` int(11) NOT NULL,
  `NAME` int(11) DEFAULT NULL,
  PRIMARY KEY (`MO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  `GR_ID` int(11) DEFAULT NULL,
  `ADC` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ST_ID`),
  KEY `GR_ID` (`GR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ST_ID`, `NAME`, `GR_ID`, `ADC`) VALUES
(10, 'Игорь', 100, 'И0932');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `SB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` int(11) NOT NULL,
  PRIMARY KEY (`SB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `WEIGHTS`
--

CREATE TABLE IF NOT EXISTS `WEIGHTS` (
  `WE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TASK_NUM` int(11) DEFAULT NULL,
  `WEIGHT` double DEFAULT NULL,
  `WR_ID` int(11) NOT NULL,
  PRIMARY KEY (`WE_ID`),
  KEY `WO_ID` (`WR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `WO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGIN` varchar(100) NOT NULL,
  PRIMARY KEY (`WO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`WO_ID`, `NAME`, `PASSWORD`, `LOGIN`) VALUES
(30, 'Крутина Ольга Михайловна', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `WR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATE` varchar(50) DEFAULT NULL,
  `SB_ID` int(11) NOT NULL,
  `WO_ID` int(11) NOT NULL,
  `MO_ID` int(11) NOT NULL,
  `THEME` varchar(150) NOT NULL,
  `MD_ID` int(11) NOT NULL,
  PRIMARY KEY (`WR_ID`),
  KEY `SB_ID` (`SB_ID`),
  KEY `WO_ID` (`WO_ID`),
  KEY `MO_ID` (`MO_ID`),
  KEY `MD_ID` (`MD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `LISTS`
--
ALTER TABLE `LISTS`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`GR_ID`) REFERENCES `groups` (`GR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `WEIGHTS`
--
ALTER TABLE `WEIGHTS`
  ADD CONSTRAINT `weights_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_4` FOREIGN KEY (`MD_ID`) REFERENCES `mods` (`MD_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`SB_ID`) REFERENCES `subjects` (`SB_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_2` FOREIGN KEY (`WO_ID`) REFERENCES `workers` (`WO_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_3` FOREIGN KEY (`MO_ID`) REFERENCES `modules` (`MO_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
