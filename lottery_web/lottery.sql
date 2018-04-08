-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 10:25 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_table`
--

CREATE TABLE IF NOT EXISTS `agent_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agent_table`
--

INSERT INTO `agent_table` (`id`, `username`, `password`) VALUES
(1, 'Ram', '123'),
(3, 'hisham', 'hash');

-- --------------------------------------------------------

--
-- Table structure for table `image_info`
--

CREATE TABLE IF NOT EXISTS `image_info` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(250) NOT NULL,
  `filepath` varchar(250) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `image_info`
--

INSERT INTO `image_info` (`tid`, `filename`, `filepath`) VALUES
(1, 'vdvdv', 'vdvfvd'),
(2, 'ticket2', 'photo/ticket2'),
(3, 'ticket3', 'photo/ticket3'),
(4, 'ticket4', '/opt/lampp/htdocs/lottery/lottery_web/photo/ticket4'),
(5, 'ticket5', '/opt/lampp/htdocs/lottery/lottery_web/photo/ticket5'),
(6, 'ticket6', '/opt/lampp/htdocs/lottery/lottery_web/photo/ticket6'),
(7, 'ticket7', 'photo/ticket7'),
(8, 'ticket8', 'photo/ticket8'),
(9, 'ticket9', 'photo/ticket9'),
(10, 'ticket10', 'photo/ticket10'),
(11, 'ticket11', 'photo/ticket11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `temp_ticket_info`
--

CREATE TABLE IF NOT EXISTS `temp_ticket_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` varchar(20) NOT NULL,
  `y` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `temp_ticket_info`
--

INSERT INTO `temp_ticket_info` (`id`, `x`, `y`) VALUES
(9, '1256', '1258');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE IF NOT EXISTS `ticket_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secret_code` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`id`, `secret_code`, `code`, `mobile_number`) VALUES
(2, '1256', '1259', '9946128222');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
