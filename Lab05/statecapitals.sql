-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2013 at 08:14 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `statecapitals`
--
CREATE DATABASE IF NOT EXISTS `statecapitals` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `statecapitals`;

-- --------------------------------------------------------

--
-- Table structure for table `capitals`
--

CREATE TABLE IF NOT EXISTS `capitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(20) NOT NULL,
  `capital` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `capitals`
--

INSERT INTO `capitals` (`id`, `state`, `capital`) VALUES
(1, 'Alabama', 'Montgomery'),
(2, 'Alaska', 'Juneau'),
(3, 'Arizona', 'Phoenix'),
(4, 'Arkansas', 'Little Rock'),
(5, 'California', 'Sacramento'),
(6, 'Colorado', 'Denver'),
(7, 'Connecticut', 'Hartford'),
(8, 'Delaware', 'Dover'),
(9, 'Florida', 'Tallahassee'),
(10, 'Georgia', 'Atlanta'),
(11, 'Hawaii', 'Honolulu'),
(12, 'Idaho', 'Boise'),
(13, 'Illinois', 'Springfield'),
(14, 'Indiana', 'Indianapolis'),
(15, 'Iowa', 'Des Moines'),
(16, 'Kansas', 'Topeka'),
(17, 'Kentucky', 'Frankfort'),
(18, 'Louisiana', 'Baton Rouge'),
(19, 'Maine', 'Augusta'),
(20, 'Maryland', 'Annapolis'),
(21, 'Massachusetts', 'Boston'),
(22, 'Michigan', 'Lansing'),
(23, 'Minnesota', 'Saint Paul'),
(24, 'Mississippi', 'Jackson'),
(25, 'Missouri', 'Jefferson City'),
(26, 'Montana', 'Helena'),
(27, 'Nebraska', 'Lincoln'),
(28, 'Nevada', 'Carson City'),
(29, 'New Hampshire', 'Concord'),
(30, 'New Jersey', 'Trenton'),
(31, 'New Mexico', 'Santa Fe'),
(32, 'New York', 'Albany'),
(33, 'North Carolina', 'Raleigh'),
(34, 'North Dakota', 'Bismarck'),
(35, 'Ohio', 'Columbus'),
(36, 'Oklahoma', 'Oklahoma City'),
(37, 'Oregon', 'Salem'),
(38, 'Pennsylvania', 'Harrisburg'),
(39, 'Rhode Island', 'Providence'),
(40, 'South Carolina', 'Columbia'),
(41, 'South Dakota', 'Pierre'),
(42, 'Tennessee', 'Nashville'),
(43, 'Texas', 'Austin'),
(44, 'Utah', 'Salt Lake City'),
(45, 'Vermont', 'Montpelier'),
(46, 'Virginia', 'Richmond'),
(47, 'Washington', 'Olympia'),
(48, 'West Virginia', 'Charleston'),
(49, 'Wisconsin', 'Madison'),
(50, 'Wyoming', 'Cheyenne');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
