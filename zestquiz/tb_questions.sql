-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 04:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zestquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_questions`
--

CREATE TABLE IF NOT EXISTS `tb_questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `questitle` varchar(50) NOT NULL,
  `questitle_slug` varchar(50) NOT NULL,
  `question` longtext NOT NULL,
  `answerType` enum('Single','Multiple') NOT NULL,
  `questionMarks` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_questions`
--

INSERT INTO `tb_questions` (`qid`, `questitle`, `questitle_slug`, `question`, `answerType`, `questionMarks`, `image`, `status`, `createdon`) VALUES
(1, 'question', 'question', '<p>question1</p>', 'Single', 0, '', 'Active', '2018-04-10 14:43:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
