-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 05:33 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_1` varchar(200) NOT NULL,
  `street_2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `owner` int(11) NOT NULL,
  `owner_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `cell_number` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_number` varchar(500) NOT NULL,
  `work_number` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `cell_number`, `details`, `user_id`, `home_number`, `work_number`) VALUES
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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrator` int(11) NOT NULL,
  `show_name` varchar(100) NOT NULL,
  `show_status` varchar(100) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `repeat_status` varchar(1000) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `administrator`, `show_name`, `show_status`, `from`, `to`, `repeat_status`, `venue_id`, `comments`, `created_time`) VALUES
(2, 1, 'Aladdin', 'Scheduled', '2016-03-17 17:00:00', '2016-03-17 18:00:00', '1', 1, 'These are comments about the show Aladdin!', '2016-03-14 04:00:00'),
(3, 1, 'Wicked', 'Deferred', '2016-03-18 08:00:00', '2016-03-18 10:00:00', '1', 2, 'This is show comments about Wicked.', '2016-03-15 14:58:44'),
(4, 2, 'Fiddler on the Roof', 'Cancelled', '2016-03-17 08:00:00', '2016-03-17 12:00:00', '1', 1, 'These are the comments for Fiddler on the Roof. ', '2016-03-18 07:37:15'),
(5, 2, 'The Lion King', 'Scheduled', '2016-04-08 08:00:00', '2016-04-08 10:00:00', '1', 1, 'These are the comments for the comedy show.', '2016-03-18 07:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `event_role_user`
--

DROP TABLE IF EXISTS `event_role_user`;
CREATE TABLE IF NOT EXISTS `event_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_role_user`
--

INSERT INTO `event_role_user` (`id`, `user_id`, `event_id`, `role_id`, `status`) VALUES
(1, 68, 2, 4, '0'),
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
(12, 72, 3, 3, '0'),
(13, 2, 3, 2, '0'),
(14, 3, 3, 2, '0'),
(15, 68, 4, 4, '0'),
(16, 70, 4, 4, '0'),
(17, 71, 4, 4, '0'),
(18, 69, 4, 3, '0'),
(19, 72, 4, 3, '0'),
(20, 2, 4, 2, '0'),
(21, 3, 4, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `event_script`
--

DROP TABLE IF EXISTS `event_script`;
CREATE TABLE IF NOT EXISTS `event_script` (
  `event_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_script`
--

INSERT INTO `event_script` (`event_id`, `script_id`) VALUES
(2, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userId`, `message`, `date`, `status`) VALUES
(3, 2, 'A show has been assigned to you', '2016-03-27', 'Accepted'),
(4, 2, 'Show "Aladin" has been modified', '2016-03-29', 'Rejected'),
(5, 2, 'test message', '2016-03-09', ''),
(6, 2, 'test notification for user 2', '2016-03-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Team Leader'),
(3, 'Staff'),
(4, 'Actor');

-- --------------------------------------------------------

--
-- Table structure for table `scripts`
--

DROP TABLE IF EXISTS `scripts`;
CREATE TABLE IF NOT EXISTS `scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `synopsis` longtext NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scripts`
--

INSERT INTO `scripts` (`id`, `name`, `synopsis`, `creator`) VALUES
(1, 'Aladdin Part 1', '...', 3),
(2, 'Aladdin Part 2', '...', 3),
(3, 'Wicked Script', 'This is the script for Wicked. Comments?', 1),
(4, 'Fiddler on the Roof Script', '...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `role_id`, `active`, `email`) VALUES
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
-- Table structure for table `user_script`
--

DROP TABLE IF EXISTS `user_script`;
CREATE TABLE IF NOT EXISTS `user_script` (
  `user_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_script`
--

INSERT INTO `user_script` (`user_id`, `script_id`) VALUES
(3, 1),
(3, 2),
(1, 1),
(2, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status`) VALUES
(-1, 'Rejected'),
(0, 'Pending'),
(1, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `comments`) VALUES
(1, 'Broadway Theatre', 'These are comments about the Broadway Theatre venue.'),
(2, 'New York Hospital', 'This is a comment about the New York Hospital.');

-- --------------------------------------------------------

--
-- Table structure for table `venue_contact`
--

DROP TABLE IF EXISTS `venue_contact`;
CREATE TABLE IF NOT EXISTS `venue_contact` (
  `venue_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_contact`
--

INSERT INTO `venue_contact` (`venue_id`, `contact_id`) VALUES
(1, 30),
(2, 33);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notif_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id_to_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
