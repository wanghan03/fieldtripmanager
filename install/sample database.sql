-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2014 at 12:46 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `FIELD_TRIP`
--

CREATE TABLE IF NOT EXISTS `FIELD_TRIP` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `destination` varchar(100) COLLATE ascii_bin NOT NULL,
  `classhour` varchar(200) COLLATE ascii_bin NOT NULL,
  `numstudent` int(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `fund` varchar(50) COLLATE ascii_bin DEFAULT NULL,
  `objective` varchar(1000) COLLATE ascii_bin NOT NULL,
  `classactivities` varchar(1000) COLLATE ascii_bin NOT NULL,
  `why` varchar(1000) COLLATE ascii_bin NOT NULL,
  `followup` varchar(1000) COLLATE ascii_bin NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `comments` varchar(1000) COLLATE ascii_bin DEFAULT NULL,
  `approvalDate` timestamp NULL DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `FIELD_TRIP`
--

INSERT INTO `FIELD_TRIP` (`eventid`, `userid`, `date`, `startTime`, `endTime`, `destination`, `classhour`, `numstudent`, `cost`, `fund`, `objective`, `classactivities`, `why`, `followup`, `approval`, `comments`, `approvalDate`, `created`) VALUES
(1, 2, '2014-05-13', '08:00:00', '13:30:00', 'Detroit Zoo', 'Human Anatomy, AP Biology - first and third hour', 58, 15, '', 'Learning goals throughout the year will be observed-such as cellular respiration, ecology, etc\r\n', 'School year has been spent on studying organisms and how they function (both classes)', 'Enjoyable way to think about how what was learned in class can be applied', 'Observation logs will be filled out, students will discuss what they observed and how they relate to things learned in the classroom throughout the year', 0, '', NULL, '2014-03-19 22:23:43'),
(2, 2, '2014-03-25', '12:15:00', '01:57:00', 'Pet Store', 'Biology 4th hour', 15, 4, NULL, 'Explore food chain system', 'Students will be figuring out whether or not pets are carnivore, herbivore, or omnivore and its food chain system', 'To give student a different way to learn.', 'A test will be given following ', 1, '', '2014-03-18 17:21:16', '2014-03-19 21:26:31'),
(3, 2, '2014-05-12', '08:00:00', '13:30:00', 'Detroit Zoo', 'Human Anatomy, AP Biology - second and fifth hour', 61, 15, '', 'Learning goals throughout the year will be observed-such as cellular respiration, ecology, etc\r\n', 'School year has been spent on studying organisms and how they function (both classes)\r\n', 'Enjoyable way to think about how what was learned in class can be applied\r\n', 'Observation logs will be filled out, students will discuss what they observed and how they relate to things learned in the classroom throughout the year\r\n', 1, '', '2014-03-22 23:08:26', '2014-03-19 22:33:47'),
(4, 2, '2014-05-15', '08:00:00', '13:30:00', 'Detroit Zoo', 'Human Anatomy, AP Biology - fifth and sixth hour', 47, 14, '', 'Learning goals throughout the year will be observed-such as cellular respiration, ecology, etc\r\n', 'School year has been spent on studying organisms and how they function (both classes)\r\n', 'Enjoyable way to think about how what was learned in class can be applied\r\n', 'Observation logs will be filled out, students will discuss what they observed and how they relate to things learned in the classroom throughout the year\r\n', -1, 'No good.', '2014-03-23 00:01:22', '2014-03-19 22:36:11'),
(5, 2, '2014-04-18', '09:00:00', '13:00:00', 'Detroit Institute of Arts', 'IB Art Studies', 68, 20, '', 'To observe different techniques used in the displays that were previously taught in class throughout the year', 'All year is spent observing different techniques ', 'Students will learn to use a thoughtful, open approach to art and asked to identify specifics learned in class through real life examples', 'Observation log, discussing what we saw', 0, '', NULL, '2014-03-19 22:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `password` varchar(40) COLLATE ascii_bin NOT NULL,
  `privilege` int(1) NOT NULL,
  `name` varchar(30) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `lastLogin` timestamp NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`userid`, `username`, `password`, `privilege`, `name`, `email`, `lastLogin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 4, 'Admin User', 'no@email.provided', '2014-03-22 22:45:46'),
(2, 'teacher', '4a82cb6db537ef6c5b53d144854e146de79502e8', 3, 'Teacher User', 'no@email.provided', '2014-03-23 00:02:20'),
(3, 'attendance', 'f61b43b4164a1f114e6a0257266d846f0a30a379', 2, 'Attendance User', 'no@email.provided', '2014-02-07 12:15:47'),
(4, 'student', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', 1, 'Student User', 'no@email.provided', '2014-03-19 22:30:48'),
(5, 'admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 4, 'Admin User2', 'no@email.provided', '2014-03-18 12:04:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
