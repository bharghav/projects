-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 05:01 PM
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
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `questitle` varchar(50) NOT NULL,
  `questitle_slug` varchar(50) NOT NULL,
  `question` longtext NOT NULL,
  `questionType` enum('Single','Multiple') NOT NULL,
  `questionMarks` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_questions`
--

INSERT INTO `tb_questions` (`qid`, `catid`, `subcatid`, `subid`, `questitle`, `questitle_slug`, `question`, `questionType`, `questionMarks`, `image`, `status`, `createdon`) VALUES
(1, 0, 0, 0, 'qurstion1', 'qurstion1', '<p>question1</p>', 'Single', 10, '', 'Active', '2018-04-11 10:46:06'),
(2, 0, 0, 0, 'question2', 'question2', '<p>question2</p>', 'Multiple', 10, '', 'Active', '2018-04-11 10:47:29'),
(3, 0, 0, 0, 'question4123', 'question4123', '<p>question4123</p>', 'Multiple', 10, '', 'Active', '2018-04-11 10:56:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
