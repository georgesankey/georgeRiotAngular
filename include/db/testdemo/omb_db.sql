-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2016 at 10:43 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
use omb_db;

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE IF NOT EXISTS `ADDRESS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_1` varchar(200) NOT NULL,
  `street_2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `owner` int(11) NOT NULL,
  `owner_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
(6, 'Jamaica', '', 'New York', 'NY', '11432', 1, '1'),
(7, 'Chicago Place', '', 'Chicago', 'IL', '23213', 2, '1'),
(8, 'Charlie Town', '', 'Charleston', 'NY', '89779', 3, '1'),
(24, '575 Wakefield Lane', '', 'New York', 'NY', '11432', 68, '1'),
(25, '500 What Up', '', 'New York', 'NY', '11432', 69, '1'),
(26, '500 Way', '', 'New York', 'NY', '11073', 70, '1'),
(27, '47th Street Broadway', '', 'New York', 'NY', '17777', 1, '2'),
(28, '500 Titanic Way', '', 'Los Angeles', 'CA', '123455', 71, '1'),
(29, '404 Not Found', '', 'New York', 'NY', '10775', 72, '1'),
(30, 'New York Lane', '', 'New York', 'NY', '145664', 2, '2'),
(31, '500 Actor Way', '', 'New York', 'NY', '110777', 73, '1'),
(32, '500 Bollywood', '', 'Los Angeles', 'CA', '11034', 75, '1'),
(34, '270 Park Ave', '', 'New York', 'NY', '23123', 79, '1'),
(35, '270 Park Ave', '', 'New York', 'NY', '89089', 80, '1');

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT`
--

CREATE TABLE IF NOT EXISTS `CONTACT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `cell_number` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_number` varchar(500) NOT NULL,
  `work_number` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`id`, `first_name`, `last_name`, `cell_number`, `details`, `user_id`, `home_number`, `work_number`) VALUES
(1, 'Raihan', 'Admin', '9177753732', 'This is Raihan''s contact information.', 1, '', ''),
(2, 'Tameem', 'Imamdad', '(555) 555-5555', 'Tameem''s details.', 2, '', ''),
(11, 'Charlie', 'He', '98080989080', '', 3, '1', '2'),
(27, 'Raihan', 'Actor', '7777777', '', 68, '', ''),
(28, 'Raihan', 'Staff', '54345435354', '', 69, '', ''),
(29, 'Raihan', 'Ahmed', '4314343243', '', 70, '', ''),
(30, 'George', 'Lucas', '555-555-5555', 'This is the Point of Contact for Broadway.', 0, '555-555-5553', '555-555-5554'),
(31, 'Leo', 'Dicaprio', '453345435', '', 71, '', ''),
(32, 'Charlie', 'Staff', '4554354', '', 72, '', ''),
(33, 'Dr. Philip', 'Nolan', '545-345-5532', 'This is a detail for the NYH contact.', 0, '43234324234', ''),
(34, 'Charlie', 'Actor', '', '', 73, '', ''),
(35, 'Tameem', 'Actor', '3422343', '', 75, '89789789', '798789787'),
(39, 'George', 'Sankey', '324234234', '', 79, '78989897897', '78989797'),
(40, 'Marshall', 'Cho', '8908008', '', 80, '89098908890980', '890980890980');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT`
--

CREATE TABLE IF NOT EXISTS `EVENT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrator` int(11) NOT NULL,
  `show_name` varchar(100) NOT NULL,
  `show_status` varchar(100) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `repeat_status` varchar(1000) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `EVENT`
--

INSERT INTO `EVENT` (`id`, `administrator`, `show_name`, `show_status`, `from_date`, `to_date`, `repeat_status`, `venue_id`, `comments`, `created_time`) VALUES
(2, 1, 'Aladdin', 'Cancelled', '2016-03-17 17:00:00', '2016-03-17 18:00:00', '1', 1, 'These are comments about the show Aladdin!', '2016-03-14 04:00:00'),
(3, 1, 'Wicked', 'Cancelled', '2016-03-18 11:00:00', '2016-03-18 13:00:00', '1', 2, 'This is show comments about Wicked.', '2016-03-15 14:58:44'),
(4, 2, 'Fiddler on the Roof', 'Deferred', '2016-03-14 14:00:00', '2016-03-14 18:00:00', '1', 2, 'These are the comments for Fiddler on the Roof. ', '2016-03-18 07:37:15'),
(6, 68, 'April Madness', 'Scheduled', '2016-04-07 11:30:00', '2016-04-07 12:00:00', '1', 1, '', '2016-04-14 04:53:33'),
(8, 3, 'Fiddler on the Roof', 'Scheduled', '2016-04-11 10:30:00', '2016-04-11 12:00:00', '1', 1, '', '2016-04-14 18:33:33'),
(9, 3, 'Scooby Doo', 'Scheduled', '2016-04-13 09:00:00', '2016-04-13 16:30:00', '1', 2, '', '2016-04-14 18:34:18'),
(10, 3, ' Google Event', 'Cancelled', '2016-04-11 14:00:00', '2016-04-11 15:30:00', '1', 1, '', '2016-04-14 18:34:50'),
(11, 3, 'Google', 'Cancelled', '2016-04-15 09:30:00', '2016-04-15 11:00:00', '1', 1, '', '2016-04-14 18:35:15'),
(12, 3, 'Awaiting Approval', 'Deferred', '2016-04-12 11:30:00', '2016-04-12 14:00:00', '1', 1, '', '2016-04-14 18:36:13'),
(13, 3, 'Event 2', 'Deferred', '2016-04-12 09:00:00', '2016-04-12 09:30:00', '1', 1, '', '2016-04-14 18:40:11'),
(14, 3, 'Awaiting Approval', 'Deferred', '2016-04-14 11:00:00', '2016-04-14 12:30:00', '1', 2, '', '2016-04-14 18:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_ROLE_USER`
--

CREATE TABLE IF NOT EXISTS `EVENT_ROLE_USER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `EVENT_ROLE_USER`
--

INSERT INTO `EVENT_ROLE_USER` (`id`, `user_id`, `event_id`, `role_id`, `status`) VALUES
(1, 68, 2, 4, '1'),
(2, 70, 2, 4, '0'),
(3, 71, 2, 4, '0'),
(4, 69, 2, 3, '0'),
(5, 72, 2, 3, '0'),
(6, 2, 2, 2, '0'),
(7, 3, 2, 2, '0'),
(8, 68, 3, 4, '0'),
(9, 70, 3, 4, '0'),
(10, 71, 3, 4, '0'),
(11, 69, 3, 3, '0'),
(14, 3, 3, 2, '0'),
(59, 1, 2, 3, '0'),
(78, 71, 4, 3, '0'),
(84, 72, 3, 2, '0'),
(89, 72, 4, 3, '0'),
(97, 1, 3, 4, '0'),
(98, 3, 4, 4, '0'),
(102, 2, 5, 4, '0'),
(103, 2, 3, 4, '0'),
(104, 2, 4, 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_SCRIPT`
--

CREATE TABLE IF NOT EXISTS `EVENT_SCRIPT` (
  `event_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EVENT_SCRIPT`
--

INSERT INTO `EVENT_SCRIPT` (`event_id`, `script_id`) VALUES
(2, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 3),
(4, 1),
(5, 2),
(5, 4),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `NOTIFICATION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICATION` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `NOTIFICATION`
--

INSERT INTO `NOTIFICATION` (`id`, `userId`, `message`, `date`, `status`) VALUES
(3, 2, 'A show has been assigned to you', '2016-03-27', 'Accepted'),
(4, 2, 'Show "Aladin" has been modified', '2016-03-29', 'Rejected'),
(5, 2, 'test message', '2016-03-09', ''),
(6, 2, 'test notification for user 2', '2016-03-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `ROLE`
--

CREATE TABLE IF NOT EXISTS `ROLE` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Team Leader'),
(3, 'Staff'),
(4, 'Actor');

-- --------------------------------------------------------

--
-- Table structure for table `SCRIPTS`
--

CREATE TABLE IF NOT EXISTS `SCRIPTS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `synopsis` longtext NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SCRIPTS`
--

INSERT INTO `SCRIPTS` (`id`, `name`, `synopsis`, `creator`) VALUES
(1, 'Aladdin Part 1', '...', 3),
(2, 'Aladdin Part 2', '...', 3),
(3, 'Wicked Script', 'This is the script for Wicked. Comments?', 1),
(4, 'Fiddler on the Roof Script', '...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `password`, `role_id`, `active`, `email`) VALUES
(1, 'e193d4669eab0ae21d1acf37a98f95a605a8e86c210e9db02445bac62351dbdbd856ee8aca7b5953cde8f43c996a03b0', 1, 1, 'ray_admin@gmail.com'),
(2, '5ecaf34c43cd885cdc8e67022427a78d9aa2b4881e9c69f814469bac18166ace601aae163ab647fc883846d1c2e42378', 1, 1, 'tameem_imamdad@gmail.com'),
(3, '0984196b975cfb4660f50c9be5911d3fa5a595220987a1c6820f1e1253a1eae5ab94db02af53d0d1916448c0f4eadd54', 1, 1, 'charlie'),
(68, 'e193d4669eab0ae21d1acf37a98f95a605a8e86c210e9db02445bac62351dbdbd856ee8aca7b5953cde8f43c996a03b0', 4, 1, 'ray_actor@gmail.com'),
(69, '5d26029e024ed9bf222a815b12990253cd2ba169585e954bee4b6934b2c4a311e60b8d3ea2e82918add72c6b9793bd31', 3, 1, 'ray_staff@gmail.com'),
(70, '403ed71753c01bbb9ae225f63cb34a9951694738a2f79b4ccfc1bae6507b6e22feb6542f60f677d23ad30516256aba1f', 4, 1, 'raihanahmed@gmail.com'),
(71, 'a61fe22e1dc11a07ed766100d4726105caecb2cb463fd62979f110a2a4fb0b3f894db2f076eaa8570703e08deda455a4', 4, 1, 'leonardo_dicaprio@gmail.com'),
(72, '093a5acd32bbd2cd5baa9b3a8c97bda16ea00da14e16568385bbcb09f28a475b158418c0632bc382d098c8a192596144', 3, 1, 'charlie_staff@gmail.com'),
(73, 'f3be856efc23dd7872042a8e6d204b4952ddb89937b70814eb4077aa15760c0d83480427ace7d7ec1c1d75160592a541', 4, 0, 'charlie_actor@gmail.com'),
(75, '8df1bd58222f1fb0bd85593252a95e7c9d526bfc04bf431e7195ccc48a033593edf4ebe4096b63e77e7e96d23e6800d1', 4, 0, 'tameem_actor@gmail.com'),
(79, '7d5189792a14862355bc379d93603dac48ce206833644d733589d528f51a57378632bf58762a0a03e6d6679ee1535ac5', 4, 0, 'george_sankey@gmail.com'),
(80, 'bc3ba3566a2fd26ec65a88a672b934ac23645eeeff9019d360ba08aa57a03f265533b1783e0910a7d4622beda9821c80', 4, 0, 'marshallcho@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `USER_SCRIPT`
--

CREATE TABLE IF NOT EXISTS `USER_SCRIPT` (
  `user_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER_SCRIPT`
--

INSERT INTO `USER_SCRIPT` (`user_id`, `script_id`) VALUES
(3, 1),
(3, 2),
(1, 1),
(2, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `USER_STATUS`
--

CREATE TABLE IF NOT EXISTS `USER_STATUS` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `USER_STATUS`
--

INSERT INTO `USER_STATUS` (`status_id`, `status`) VALUES
(-1, 'Rejected'),
(0, 'Pending'),
(1, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `VENUE`
--

CREATE TABLE IF NOT EXISTS `VENUE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `comments` longtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `VENUE`
--

INSERT INTO `VENUE` (`id`, `name`, `comments`) VALUES
(1, 'Broadway Theatre', 'These are comments about the Broadway Theatre venue.'),
(2, 'New York Hospital', 'This is a comment about the New York Hospital.');

-- --------------------------------------------------------

--
-- Table structure for table `VENUE_CONTACT`
--

CREATE TABLE IF NOT EXISTS `VENUE_CONTACT` (
  `venue_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VENUE_CONTACT`
--

INSERT INTO `VENUE_CONTACT` (`venue_id`, `contact_id`) VALUES
(1, 30),
(2, 33);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD CONSTRAINT `notif_user` FOREIGN KEY (`userId`) REFERENCES `USER` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `user_role_id_to_role_id` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
