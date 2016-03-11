-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2016 at 10:43 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`id`, `street_1`, `street_2`, `city`, `state`, `zipcode`, `owner`, `owner_type`) VALUES
(4, '17 Warriors Street', '', 'Golden State', 'AL', '7777', 43, '1'),
(5, 'The North', '', 'Westeros', 'AL', '345674', 45, '3'),
(6, 'Jamaica', '', 'New York', 'NY', '11432', 1, '1'),
(7, 'Chicago Place', '', 'Chicago', 'IL', '23213', 2, '1'),
(8, 'Charlie Town', '', 'Charleston', 'NY', '89779', 3, '1'),
(14, 'Tevye Road', '', 'New York', 'AL', '12345', 51, '3'),
(16, 'T Road', '', 'Pain', 'AL', '1111', 53, '3'),
(17, 'Harry Potter', '', 'Harry', 'AL', '111', 1, '2'),
(18, 'Vadim', '', 'Reyblat', 'AL', '2123', 55, '3'),
(21, 'Root', '', 'Beer', 'AL', '12321', 64, '3'),
(22, 'Blah', '', 'Blah', 'AL', '11355', 65, '3'),
(23, 't', '', 'sdsad', 'AL', '2334', 66, '3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`id`, `first_name`, `last_name`, `cell_number`, `details`, `user_id`, `home_number`, `work_number`) VALUES
(1, 'Raihan', 'Ahmed', '9177753732', 'This is Raihan''s contact information.', 1, '', ''),
(2, 'Tameem', 'Imamdad', '(555) 555-5555', 'Tameem''s details.', 2, '', ''),
(9, 'Stef', 'Curry', '77777', '', 43, '', ''),
(10, 'Ned', 'Stark', '232343432', '', 45, '', ''),
(11, 'Charlie', 'He', '98080989080', '', 3, '1', '2'),
(17, 'Tevye', 'Fiddler', '8897897987', '', 51, '', ''),
(19, 'T', 'Pain', '123323', '', 53, '', ''),
(20, 'Harry', 'Potter', '23232', '', 54, '', ''),
(21, 'Vadim', 'Reyblat', '243243234', '', 55, '', ''),
(24, 'Root', 'Name', '344235', '', 64, '', ''),
(25, 'Connie', 'Chen', '5555555555', '', 65, '', ''),
(26, 't', 't', '342343', '', 66, '', '');

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
-- Table structure for table `EVENT_SCRIPT`
--

CREATE TABLE IF NOT EXISTS `EVENT_SCRIPT` (
  `event_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `SCRIPTS`
--

INSERT INTO `SCRIPTS` (`id`, `name`, `synopsis`, `creator`) VALUES
(1, 'Test', 'Test Script', 3),
(2, 'Test2', 'Testing 2', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `password`, `role_id`, `active`, `email`) VALUES
(1, '0c5a7d1c8dd69398dd851382e169e366656b7bba4efafeafb0b7253b953b0dfcb08052f8ffed52f49238bb3cf52c8c25', 1, 1, 'raymanahmed@gmail.com'),
(2, '5ecaf34c43cd885cdc8e67022427a78d9aa2b4881e9c69f814469bac18166ace601aae163ab647fc883846d1c2e42378', 1, 1, 'tameem_imamdad@gmail.com'),
(3, '0984196b975cfb4660f50c9be5911d3fa5a595220987a1c6820f1e1253a1eae5ab94db02af53d0d1916448c0f4eadd54', 1, 1, 'charlie'),
(43, '657be7e9fd7fcdde684be28753cd8374d5d4def84a02b252f7455295c81c5ee0d9a4ce343fd335e480a4ede3e407d6f9', 1, 1, 'stef_curry@gmail.com'),
(45, '1f90b2a917636e643d04db9c42522946649b642fa9c2a4e9be6986bef4fdb7d607124c77436f36a25fe6e580e4acceb3', 3, 1, 'ned_stark@gmail.com'),
(51, '5184858afbdb91ada3b665c36bb542244023ab5b7c10a6bbe0ee85a5b3e2268e02b6f4a6439d22af822d3d53724cfef3', 3, 1, 'tevye@gmail.com'),
(53, '5efc9e5d6499f16cf7aff5992102717481240fc454a8769484b28defb73b0add084f228bd569925bae8b9c021a2d5d00', 3, 1, 't_pain@gmail.com'),
(54, '95b75e21c0ee46cbf98373155e1175b8970a48b53471539786e1f7b4e6d063ec69dee431af88f15239204fc2600ce6f8', 3, 1, 'harry_potter@gmail.com'),
(55, '1e3d5126a075566b4e4438c37b6ed616d717ed30a709c61c06d2d19d23bbdf5e1f3ecfdaf87de91f2563ce8ae52d85f8', 3, 1, 'vadim_reyblat@gmail.com'),
(64, 'a3c1eb9d74e7f9fea5c1ce1918b676c05ba18282ccaca5067ba0abed83be91031e253b3ee080ef61c03fbaf0c46180fe', 3, 0, 'root@gmail.com'),
(65, 'e3b121fe22d9fe6f291f0ec8328b97d525468c6899fcf32c094f848d4585951f2ef68e7113e481f8d78d5d9f8c148b7c', 3, 1, 'connie@gmail.com'),
(66, '28104fa3d25adb37d4edea476f3338ee0760cc0b8e07d952fdc277f1337a101ac38ea034963baa492c5e88bafd92c243', 3, 1, 't@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `VENUE`
--

INSERT INTO `VENUE` (`id`, `name`, `comments`) VALUES
(1, 'Test', 'This is a nice place');

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
(1, 20);

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
