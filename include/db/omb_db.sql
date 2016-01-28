-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 03:40 PM
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
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_1` varchar(200) NOT NULL,
  `street_2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `owner` int(11) NOT NULL,
  `owner_type` varchar(100) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`address_id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
(2, '17 Warriors Street', '', 'Golden State', 'AL', '777777', 41, 'Administrator'),
(3, '17 Warriors Street', '', 'Golden State', 'AL', '777777', 42, 'Administrator'),
(4, '17 Warriors Street', '', 'Golden State', 'AL', '7777', 43, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT`
--

CREATE TABLE IF NOT EXISTS `CONTACT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`id`, `first_name`, `last_name`, `phone_number`, `details`, `user_id`) VALUES
(1, 'Raihan', 'Ahmed', '9177753732', 'This is Raihan''s contact information.', 1),
(2, 'Tameem', 'Imamdad', '(555) 555-5555', 'Tameem''s details.', 2),
(3, 'Actor', 'Actor', '555-555-5555', 'Actor''s Contact Info', 13),
(7, 'Stef', 'Curry', '777-777-7777', '', 41),
(8, 'Stef', 'Curry', '777-777-7777', '', 42),
(9, 'Stef', 'Curry', '77777', '', 43);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_ROLE_USER`
--

CREATE TABLE IF NOT EXISTS `EVENT_ROLE_USER` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ROLE`
--

CREATE TABLE IF NOT EXISTS `ROLE` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Actor'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `SCRIPTS`
--

CREATE TABLE IF NOT EXISTS `SCRIPTS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `synopsis` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `password`, `role_id`, `active`, `email`) VALUES
(1, '0c5a7d1c8dd69398dd851382e169e366656b7bba4efafeafb0b7253b953b0dfcb08052f8ffed52f49238bb3cf52c8c25', 1, 1, 'raymanahmed@gmail.com'),
(2, '5ecaf34c43cd885cdc8e67022427a78d9aa2b4881e9c69f814469bac18166ace601aae163ab647fc883846d1c2e42378', 1, 1, 'tameem_imamdad@gmail.com'),
(43, '657be7e9fd7fcdde684be28753cd8374d5d4def84a02b252f7455295c81c5ee0d9a4ce343fd335e480a4ede3e407d6f9', 1, 0, 'stef_curry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `USER_SCRIPT`
--

CREATE TABLE IF NOT EXISTS `USER_SCRIPT` (
  `user_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `VENUE`
--

CREATE TABLE IF NOT EXISTS `VENUE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
