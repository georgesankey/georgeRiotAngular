-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 10:18 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`address_id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
(2, '17 Warriors Street', '', 'Golden State', 'AL', '777777', 41, 'Administrator');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`id`, `first_name`, `last_name`, `phone_number`, `details`, `user_id`) VALUES
(1, 'Raihan', 'Ahmed', '9177753732', 'This is Raihan''s contact information.', 1),
(2, 'Tameem', 'Imamdad', '(555) 555-5555', 'Tameem''s details.', 2),
(3, 'Actor', 'Actor', '555-555-5555', 'Actor''s Contact Info', 13),
(7, 'Stef', 'Curry', '777-777-7777', '', 41);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `password`, `role_id`, `active`, `email`) VALUES
(1, '0c5a7d1c8dd69398dd851382e169e366656b7bba4efafeafb0b7253b953b0dfcb08052f8ffed52f49238bb3cf52c8c25', 1, 1, 'raymanahmed@gmail.com'),
(2, '5ecaf34c43cd885cdc8e67022427a78d9aa2b4881e9c69f814469bac18166ace601aae163ab647fc883846d1c2e42378', 1, 1, 'tameem_imamdad@gmail.com'),
(3, '7c829f61e36742b6c5681f00013d34ab39e26f0802ebefd117aa0bdc509f57ad6e2e9ddc6e7dd68cc719ade4d637d2ac', 1, 0, ''),
(4, '3bf51fb9175f6b7340e06d8496a0a9d8182acdbf391e221e9dce9c0a2b6764d2202570793405c69f6352dffa2bf40a2b', 3, 0, ''),
(5, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 3, 0, ''),
(6, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 3, 0, ''),
(7, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 3, 1, 'poo@gmail.com'),
(8, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 3, 0, ''),
(9, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 0, ''),
(10, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 0, ''),
(11, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 0, ''),
(12, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 0, ''),
(13, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 1, 'actor@gmail.com'),
(14, '504b6c1da4281f18a399948e1a3bcc734225e3c32d352a43a62bc108413cad4306eafdc41cf7a53812079b67638ca432', 2, 0, ''),
(15, '', 2, 1, ''),
(16, '', 2, 0, ''),
(17, '', 2, 0, ''),
(18, '', 2, 0, ''),
(19, '', 2, 0, ''),
(20, '', 2, 0, ''),
(21, '', 2, 0, ''),
(22, '', 2, 0, ''),
(23, '', 2, 0, ''),
(32, '', 1, 0, ''),
(33, '', 1, 0, ''),
(34, '', 1, 0, ''),
(35, '98ca4fb0df3f398a29beda6c8e1b5acab3f94624cb467199632b54a91e04cdbb72689f614453dcdc05edb6dadf2e5e7b', 1, 1, ''),
(41, '718b6e71c85a644228916abf1b2266a0977967acf5ec50bfacead959d9a128c22002c49f49fb39170069eacc10453246', 1, 1, 'stefcurry@gmail.com');

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
