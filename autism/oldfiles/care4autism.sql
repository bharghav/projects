-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2016 at 05:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `care4autism`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_providers`
--

CREATE TABLE IF NOT EXISTS `tb_providers` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `speciality` varchar(90) NOT NULL,
  `provider_cat` varchar(250) NOT NULL,
  `service_locations` varchar(220) NOT NULL,
  `ages_served` varchar(50) NOT NULL,
  `languages` varchar(250) NOT NULL,
  `insurance_accepted` varchar(50) NOT NULL,
  `regional_fund` varchar(200) NOT NULL,
  `website` varchar(50) NOT NULL,
  `review_comment` text NOT NULL,
  `fb_URL` varchar(50) NOT NULL,
  `link_URL` varchar(50) NOT NULL,
  `google_URL` varchar(59) NOT NULL,
  `Inst_URL` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_providers`
--

INSERT INTO `tb_providers` (`id`, `name`, `Email`, `Phone`, `description`, `location`, `speciality`, `provider_cat`, `service_locations`, `ages_served`, `languages`, `insurance_accepted`, `regional_fund`, `website`, `review_comment`, `fb_URL`, `link_URL`, `google_URL`, `Inst_URL`, `status`) VALUES
(1, 'demo', 'ani@gmail.com', '34675547', 'test demo', 'location', 'spe', 'Applied Behavioral Analysis', 'Home', 'Birth to 3', 'English', 'Aetna', 'Yes', 'ani.com', '', 'fb', 'link', 'google', 'inst', 'Active'),
(2, 'bharghav', 'bharghav.chinna@tt.com', '7575798', 'short', 'vizag', 'test', 'Applied Behavioral Analysis', 'Home', 'Birth to 3', 'English', 'Aetna', 'Yes', 'test', '', 'fb', 'link', 'google', 'inst', 'Active'),
(3, 'murali', 'murali@gmail.com', '34675547', 'test', 'vizag', 'test', 'Applied Behavioral Analysis', 'Home', 'Birth to 3', 'English', 'Aetna', 'Yes', 'ani.com', '', 'fb', 'link', 'google', 'inst', 'Active'),
(4, 'raja', 'raja@gmail.com', '346346346', 'test', '', 'test', 'Applied Behavioral Analysis', 'Home', 'Birth to 3', 'English', 'Aetna', 'Yes', 'www.raja.com', '', 'fb', 'link', 'google', 'insta', 'Active'),
(5, 'Behavior Frontiers', 'info@behaviorfrontiers.com', '888-922-2843', 'Innovative ABA Training ( In-person, online, seminars, field training) and ABA Treatment programs for children with Autism and other special needs. Training programs are designed to help parents & professionals confidently and effectively use ABA techniques and also become certified behavior instructors. Treatment programs are delivered by knowledgeable and highly trained clinical staff members in home, school , clinic , regional centers and community settings', 'Los Angeles,Texas', 'Behavior assessment and design of behavior treatement plan', 'Applied Behavioral Analysis', 'Home', 'Birth to 3', 'English', 'Aetna', 'Yes', 'www.behaviorfrontiers.com', 'test nice comment', '', '', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `nochild` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agegroup` varchar(50) NOT NULL,
  `viaemail` varchar(50) NOT NULL,
  `listzip` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `zip_code`, `nochild`, `email`, `agegroup`, `viaemail`, `listzip`, `status`) VALUES
(1, 'bharghav', 'TVRJek5EVTI=', '55446', '5', 'bharghav@gmail.com', '2-6 years', 'yes', '56822', 'Active'),
(2, 'admin', 'WVdSdGFXND0=', '568255', '5', 'admin@admin.com', '2-6 years', 'yes', '5611123', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
