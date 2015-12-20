-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2015 at 07:03 PM
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
-- Table structure for table `AVAILABILITY`
--

CREATE TABLE IF NOT EXISTS `AVAILABILITY` (
  `availability_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`availability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT`
--

CREATE TABLE IF NOT EXISTS `CONTACT` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `work_number` varchar(80) DEFAULT NULL,
  `cell_number` varchar(80) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `contacter_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `comments` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `contacter_id` (`contacter_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`contact_id`, `email`, `first_name`, `last_name`, `work_number`, `cell_number`, `position`, `contacter_id`, `facility_id`, `comments`) VALUES
(1, 'admin@omb.org', 'Jackie', 'Miller', '(555)555-5555', '(555)555-5555', 'Artistic Director', 1, 1, 'This is the point of contact for OMB. ');

-- --------------------------------------------------------

--
-- Table structure for table `FACILITY`
--

CREATE TABLE IF NOT EXISTS `FACILITY` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_1` varchar(200) NOT NULL,
  `address_2` varchar(200) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_type_id` int(11) NOT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`facility_id`),
  KEY `facility_type_id` (`facility_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `FACILITY`
--

INSERT INTO `FACILITY` (`facility_id`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `facility_name`, `facility_type_id`, `phone_number`) VALUES
(1, '121 W 27th St', NULL, 'New York', 'NY', 10010, 'Only Make Believe', 1, '(646) 336-1500'),
(2, '200 Medicine Way', NULL, 'New York', 'NY', 11355, 'New York Hospital', 2, '(555)324-3424'),
(3, '300 Tylenol Road', NULL, 'New York', 'NY', 34245, 'Mayo Clinic Hospital', 2, '(718)234-4567'),
(4, '450 Advil Road', NULL, 'Jersey City', 'NJ', 11423, 'JCity Hospital', 2, '(234)234-2433'),
(5, '420 Medicinal Way', NULL, 'San Francisco', 'CA', 12333, 'San Fran Hospital', 2, '(243)342-3242'),
(6, '306 Memory Lane', 'PO BOX 23234', 'Flushing', 'NY', 11355, 'Elmhurst Hospital', 2, '(213)343-5427');

-- --------------------------------------------------------

--
-- Table structure for table `FACILITY_TYPE`
--

CREATE TABLE IF NOT EXISTS `FACILITY_TYPE` (
  `facility_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`facility_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `FACILITY_TYPE`
--

INSERT INTO `FACILITY_TYPE` (`facility_type_id`, `type`) VALUES
(1, 'Headquarters'),
(2, 'Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `NOTIFICATION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICATION` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(10000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_id` int(11) NOT NULL,
  `read_boolean` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notification_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `NOTIFICATION`
--

INSERT INTO `NOTIFICATION` (`notification_id`, `message`, `date_time`, `to_id`, `read_boolean`) VALUES
(1, 'This is a notification!', '2015-11-25 19:44:42', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `REQUEST`
--

CREATE TABLE IF NOT EXISTS `REQUEST` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(10000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_id`),
  KEY `to_id` (`to_id`),
  KEY `from_id` (`from_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `REQUEST`
--

INSERT INTO `REQUEST` (`request_id`, `message`, `date_time`, `to_id`, `from_id`, `approved`) VALUES
(1, 'This is my request to you Raihan!', '2015-11-25 19:56:22', 1, 2, 0);

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
(2, 'Actor'),
(3, 'Leader'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `SHOW`
--

CREATE TABLE IF NOT EXISTS `SHOW` (
  `show_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `duration_minutes` int(11) NOT NULL,
  PRIMARY KEY (`show_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `SHOW`
--

INSERT INTO `SHOW` (`show_id`, `name`, `facility_id`, `duration_minutes`) VALUES
(1, 'Aladdin', 2, 120),
(2, 'Wicked', 3, 150),
(3, '39th Step', 4, 100),
(4, 'Lion King', 5, 200),
(5, 'Book of Mormon', 6, 150);

-- --------------------------------------------------------

--
-- Table structure for table `SHOW_REOCCURING`
--

CREATE TABLE IF NOT EXISTS `SHOW_REOCCURING` (
  `show_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`show_id`,`date_time`),
  KEY `show_id` (`show_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SHOW_ROLE_USER`
--

CREATE TABLE IF NOT EXISTS `SHOW_ROLE_USER` (
  `role_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`show_id`,`user_id`),
  KEY `role_id` (`role_id`),
  KEY `show_id` (`show_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SHOW_ROLE_USER`
--

INSERT INTO `SHOW_ROLE_USER` (`role_id`, `show_id`, `user_id`) VALUES
(2, 1, 14),
(2, 1, 15),
(2, 2, 16),
(2, 2, 17),
(2, 3, 18),
(2, 3, 19),
(2, 4, 20),
(2, 4, 21),
(2, 5, 22),
(2, 5, 23),
(3, 1, 9),
(3, 2, 10),
(3, 3, 11),
(3, 4, 12),
(3, 5, 13),
(4, 1, 4),
(4, 2, 5),
(4, 3, 6),
(4, 4, 7),
(4, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `SHOW_USER_LOGS`
--

CREATE TABLE IF NOT EXISTS `SHOW_USER_LOGS` (
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `showed_up` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(10000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`show_id`,`user_id`,`date_time`),
  KEY `show_id` (`show_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_1` varchar(200) DEFAULT NULL,
  `address_2` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `username`, `password`, `first_name`, `last_name`, `role_id`, `email`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `phone_number`, `active`) VALUES
(1, 'raihahmed', '*A0F6B35C825FF4ED1D4E03601BB97A1361E15FB7', 'Raihan', 'Ahmed', 1, 'raymanahmed@gmail.com', '123 Memory Lane', NULL, 'New York', 'NY', 11432, '(917)775-3732', 1),
(2, 'tameem_imamdad', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Tameem', 'Imamdad', 1, 'tameem.imamdad@Jpmorgan.com', '123 Memory Lane', NULL, 'Jersey City', 'NY', 11111, '(555)555-5555', 1),
(3, 'connie_chen', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Connie', 'Chen', 1, 'connie.g.chen@jpmchase.com', '500 Alohmora Lane', NULL, 'London', 'UK', 22222, '(555)555-5555', 0),
(4, 'camille_pons', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Camille', 'Pons', 4, 'camille_pons@gmail.com', '235 Maple Road', NULL, 'Albany', 'NY', 12230, '(345)344-3434', 0),
(5, 'jeremiah_brook', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Jeremiah', 'Brook', 4, 'jeremiah_brook@gmail.com', '235 Williamsburg', NULL, 'Brooklyn', 'NY', 12230, '(345)344-3434', 0),
(6, 'donald_duck', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Donald', 'Duck', 4, 'donald_duck@gmail.com', '235 Duck Dynasty', NULL, 'Duckland  County', 'NY', 12230, '(345)344-3433', 0),
(7, 'filet_minyon', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Filet', 'Minyon', 4, 'filet_minyon@gmail.com', '235 Steak', NULL, 'Steakland', 'NY', 12235, '(345)344-3499', 0),
(8, 'noboru_wattaya', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Noboru', 'Wattaya', 4, 'noboru_wattaya@gmail.com', '200 Windup way', NULL, 'Haruki', 'NY', 13123, '(456)234-4354', 0),
(9, 'leonardo_dicaprio', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Leonardo', 'Dicaprio', 2, 'leonardo_dicaprio@gmail.com', '456 Titanic Boulevard', NULL, 'Buffalo', 'NY', 12234, '(344)345-6778', 0),
(10, 'johnny_depp', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Johnny', 'Depp', 2, 'johnny_depp@gmail.com', '423 Edward Road', NULL, 'Upstate', 'NY', 12232, '(344)345-6723', 0),
(11, 'anne_hathaway', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Anne', 'Hathaway', 2, 'anne_hathaway@gmail.com', '320 Catwoman Lane', NULL, 'Gotham', 'NY', 10000, '(234)323-2434', 0),
(12, 'meryl_streep', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Meryl', 'Streep', 2, 'meryl_streep@gmail.com', '200 Meryl Road', NULL, 'Meryl', 'NY', 21314, '(242)242-2323', 0),
(13, 'emma_watson', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Emma', 'Watson', 2, 'emma_watson@gmail.com', 'Emma Road', NULL, 'London', 'NY', 12203, '(342)243-3524', 0),
(14, 'jennifer_lawrence', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Jennifer', 'Lawrence', 2, 'jennifer_lawrence@gmail.com', 'Silver Linings Road', NULL, 'Birmingham', 'NY', 12204, '(342)243-3520', 0),
(15, 'jay_z', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Jay', 'Z', 2, 'jay_z@gmail.com', 'Hova Road', NULL, 'Brooklyn', 'NY', 12203, '(342)243-3900', 1),
(16, 'morgan_freeman', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Morgan', 'Freeman', 2, 'morgan_freeman@gmail.com', 'Free Road', NULL, 'New York', 'NY', 43244, '(234)234-4554', 0),
(17, 'samuel_jackson', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Samuel', 'Jackson', 2, 'samuel_jackson@gmail.com', 'Jackson Road', NULL, 'Bronx', 'NY', 43242, '(234)234-4502', 0),
(18, 'matthew_perry', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Matthew ', 'Perry', 2, 'matthew_perry@gmail.com', 'Friends Road', NULL, 'Manhattan', 'NY', 43242, '(234)234-4524', 0),
(19, 'kit_harrington', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Kit', 'Harrington', 2, 'kit_harrington@gmail.com', 'Snow Road', NULL, 'North of the Wall', 'NY', 43223, '(234)234-4203', 0),
(20, 'ramzy_bolton', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Ramzy', 'Bolton', 2, 'ramzy_bolton@gmail.com', 'Hanging Man Road', NULL, 'The North', 'NY', 43209, '(234)234-4200', 0),
(21, 'ned_stark', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Ned', 'Stark', 2, 'ned_stark@gmail.com', 'Direwolf Lane', NULL, 'The North', 'NY', 43209, '(234)234-4210', 0),
(22, 'cersei_lannister', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Cersei', 'Lannister', 2, 'cersei_lannister@gmail.com', 'Lion Lane', NULL, 'Casterly Rock', 'NY', 43340, '(234)234-2344', 0),
(23, 'tyrion_lannister', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Tyrion', 'Lannister', 2, 'tyrion_lannister@gmail.com', 'Shae Way', NULL, 'Casterly Rock', 'NY', 43340, '(234)234-0000', 0),
(32, 'roose_bolton', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Roose', 'Bolton', 1, 'roose_bolton@gmail.com', '542 The North', NULL, 'Westeros', 'AL', 11355, '555-445-3453', 0),
(33, 'kobe_bryant', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Kobe', 'Bryant', 1, 'kobe_bryant@gmail.com', 'Ball Lane', NULL, 'Los Angeles', 'AL', 12345, '555-445-3453', 0),
(34, 'shaq_oneal', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Shaq', 'O''Neal', 1, 'shaq@gmail.com', '432 Shaq Way', NULL, 'Los Angeles', 'AL', 12345, '555-445-3453', 0);

-- --------------------------------------------------------

--
-- Table structure for table `USER_UNAVAILABILITY`
--

CREATE TABLE IF NOT EXISTS `USER_UNAVAILABILITY` (
  `unavailability_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`unavailability_id`,`user_id`),
  KEY `availability_id` (`unavailability_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CONTACT`
--
ALTER TABLE `CONTACT`
  ADD CONSTRAINT `contact_to_facility_id` FOREIGN KEY (`facility_id`) REFERENCES `FACILITY` (`facility_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_to_user_id` FOREIGN KEY (`contacter_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FACILITY`
--
ALTER TABLE `FACILITY`
  ADD CONSTRAINT `facility_to_facility_type` FOREIGN KEY (`facility_type_id`) REFERENCES `FACILITY_TYPE` (`facility_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD CONSTRAINT `to_id_to_user` FOREIGN KEY (`to_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `REQUEST`
--
ALTER TABLE `REQUEST`
  ADD CONSTRAINT `from_id_to_user` FOREIGN KEY (`from_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_to_id_to_user` FOREIGN KEY (`to_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SHOW`
--
ALTER TABLE `SHOW`
  ADD CONSTRAINT `show_to_facility` FOREIGN KEY (`facility_id`) REFERENCES `FACILITY` (`facility_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SHOW_REOCCURING`
--
ALTER TABLE `SHOW_REOCCURING`
  ADD CONSTRAINT `recoccuring_to_show_id` FOREIGN KEY (`show_id`) REFERENCES `SHOW` (`show_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SHOW_ROLE_USER`
--
ALTER TABLE `SHOW_ROLE_USER`
  ADD CONSTRAINT `show_role_user_to_role` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_role_user_to_show` FOREIGN KEY (`show_id`) REFERENCES `SHOW` (`show_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_role_user_to_user` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SHOW_USER_LOGS`
--
ALTER TABLE `SHOW_USER_LOGS`
  ADD CONSTRAINT `logs_to_show` FOREIGN KEY (`show_id`) REFERENCES `SHOW` (`show_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_to_user` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `user_role_id_to_role_id` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USER_UNAVAILABILITY`
--
ALTER TABLE `USER_UNAVAILABILITY`
  ADD CONSTRAINT `unavail_id_to_availability` FOREIGN KEY (`unavailability_id`) REFERENCES `AVAILABILITY` (`availability_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_to_availability` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
