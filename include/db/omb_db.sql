-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2016 at 02:47 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `omb_db`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
(6, 'Jamaica', '', 'New York', 'NY', '11432', 1, '1'),
(7, 'Chicago Place', '', 'Chicago', 'IL', '23213', 2, '1'),
(8, 'Charlie Town', '', 'Charleston', 'NY', '89779', 3, '1'),
(24, '575 Wakefield Lane', '', 'New York', 'NY', '11432', 68, '4'),
(25, '500 What Up', '', 'New York', 'NY', '11432', 69, '3'),
(26, '500 Way', '', 'New York', 'NY', '11073', 70, '4'),
(27, '47th Street Broadway', '', 'New York', 'NY', '17777', 1, '5'),
(28, '500 Titanic Way', '', 'Los Angeles', 'CA', '123455', 71, '4'),
(29, '404 Not Found', '', 'New York', 'NY', '10775', 72, '4'),
(30, 'New York Lane', '', 'New York', 'NY', '145664', 2, '5');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
(30, 'Broadway', 'Contact', '555-555-5555', 'This is the Point of Contact for Broadway.', 0, '555-555-5553', '555-555-5554'),
(31, 'Leo', 'Dicaprio', '453345435', '', 71, '', ''),
(32, 'Charlie', 'Staff', '4554354', '', 72, '', ''),
(33, 'New York Hospital', 'Contact', '545-345-5532', 'This is a detail for the NYH contact.', 0, '43234324234', '');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT`
--

CREATE TABLE IF NOT EXISTS `EVENT` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `EVENT`
--

INSERT INTO `EVENT` (`id`, `administrator`, `show_name`, `show_status`, `from`, `to`, `repeat_status`, `venue_id`, `comments`, `created_time`) VALUES
(2, 1, 'Aladdin', '1', '2016-03-15 17:31:00', '2016-03-15 18:00:00', '1', 1, 'These are comments about the show Aladdin!', '2016-03-14 04:00:00'),
(3, 1, 'Wicked', '1', '2016-03-25 00:00:00', '2016-03-26 01:00:00', '1', 2, 'This is show comments about Wicked.', '2016-03-15 14:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_ROLE_USER`
--

CREATE TABLE IF NOT EXISTS `EVENT_ROLE_USER` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EVENT_ROLE_USER`
--

INSERT INTO `EVENT_ROLE_USER` (`user_id`, `event_id`, `role_id`, `status`) VALUES
(68, 2, 4, 0),
(70, 2, 4, 0),
(71, 2, 4, 0),
(69, 2, 3, 0),
(72, 2, 3, 0),
(2, 2, 2, 0),
(3, 2, 2, 0),
(68, 3, 4, 0),
(70, 3, 4, 0),
(71, 3, 4, 0),
(69, 3, 3, 0),
(72, 3, 3, 0),
(2, 3, 2, 0),
(3, 3, 2, 0);

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
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ROLE`
--

CREATE TABLE IF NOT EXISTS `ROLE` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Team Leader'),
(3, 'Staff'),
(4, 'Actor'),
(5, 'Venue');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `SCRIPTS`
--

INSERT INTO `SCRIPTS` (`id`, `name`, `synopsis`, `creator`) VALUES
(1, 'Aladdin Part 1', '...', 3),
(2, 'Aladdin Part 2', '...', 3),
(3, 'Wicked Script', 'This is the script for Wicked. Comments?', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

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
(72, '093a5acd32bbd2cd5baa9b3a8c97bda16ea00da14e16568385bbcb09f28a475b158418c0632bc382d098c8a192596144', 3, 1, 'charlie_staff@gmail.com');

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
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `VENUE`
--

CREATE TABLE IF NOT EXISTS `VENUE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
-- Constraints for table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `user_role_id_to_role_id` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
