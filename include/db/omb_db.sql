CREATE DATABASE  IF NOT EXISTS `omb_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `omb_db`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: localhost    Database: omb_db
-- ------------------------------------------------------
-- Server version   5.5.42
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
 
--
-- Table structure for table `address`
--
 
DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
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
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `address`
--
 
LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (6,'Jamaica','','New York','NY','11432',1,'1'),(7,'Chicago Place','','Chicago','IL','23213',2,'1'),(8,'Charlie Town','','Charleston','NY','89779',3,'1'),(24,'575 Wakefield Lane','','New York','NY','11432',68,'1'),(25,'500 What Up','','New York','NY','11432',69,'1'),(26,'500 Way','','New York','NY','11073',70,'1'),(27,'47th Street Broadway','','New York','NY','17777',1,'2'),(28,'500 Titanic Way','','Los Angeles','CA','123455',71,'1'),(29,'404 Not Found','','New York','NY','10775',72,'1'),(30,'New York Lane','','New York','NY','145664',2,'2'),(31,'500 Actor Way','','New York','NY','110777',73,'1'),(32,'500 Bollywood','','Los Angeles','CA','11034',75,'1'),(34,'270 Park Ave','','New York','NY','23123',79,'1'),(35,'270 Park Ave','','New York','NY','89089',80,'1');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `contact`
--
 
DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
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
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `contact`
--
 
LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Raihan','Admin','9177753732','This is Raihan\'s contact information.',1,'',''),(2,'Tameem','Imamdad','(555) 555-5555','Tameem\'s details.',2,'',''),(11,'Charlie','He','98080989080','',3,'1','2'),(27,'Raihan','Actor','7777777','',68,'',''),(28,'Raihan','Staff','54345435354','',69,'',''),(29,'Raihan','Ahmed','4314343243','',70,'',''),(30,'George','Lucas','555-555-5555','This is the Point of Contact for Broadway.',0,'555-555-5553','555-555-5554'),(31,'Leo','Dicaprio','453345435','',71,'',''),(32,'Charlie','Staff','4554354','',72,'',''),(33,'Dr. Philip','Nolan','545-345-5532','This is a detail for the NYH contact.',0,'43234324234',''),(34,'Charlie','Actor','','',73,'',''),(35,'Tameem','Actor','3422343','',75,'89789789','798789787'),(39,'George','Sankey','324234234','',79,'78989897897','78989797'),(40,'Marshall','Cho','8908008','',80,'89098908890980','890980890980');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `event`
--
 
DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `event`
--
 
LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (2,1,'Aladdin','Cancelled','2016-03-17 17:00:00','2016-03-17 18:00:00','1',1,'These are comments about the show Aladdin!','2016-03-14 04:00:00'),(3,1,'Wicked','Cancelled','2016-03-18 11:00:00','2016-03-18 13:00:00','1',2,'This is show comments about Wicked.','2016-03-15 14:58:44'),(4,2,'Fiddler on the Roof','Deferred','2016-03-14 14:00:00','2016-03-14 18:00:00','1',2,'These are the comments for Fiddler on the Roof. ','2016-03-18 07:37:15'),(6,68,'','Scheduled','2016-04-07 11:30:00','2016-04-07 12:00:00','1',1,'','2016-04-14 04:53:33');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `event_role_user`
--
 
DROP TABLE IF EXISTS `event_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `event_role_user`
--
 
LOCK TABLES `event_role_user` WRITE;
/*!40000 ALTER TABLE `event_role_user` DISABLE KEYS */;
INSERT INTO `event_role_user` VALUES (1,68,2,4,'1'),(2,70,2,4,'0'),(3,71,2,4,'0'),(4,69,2,3,'0'),(5,72,2,3,'0'),(6,2,2,2,'0'),(7,3,2,2,'0'),(8,68,3,4,'0'),(9,70,3,4,'0'),(10,71,3,4,'0'),(11,69,3,3,'0'),(14,3,3,2,'0'),(59,1,2,3,'0'),(78,71,4,3,'0'),(84,72,3,2,'0'),(89,72,4,3,'0'),(97,1,3,4,'0'),(98,3,4,4,'0'),(102,2,5,4,'0'),(103,2,3,4,'0'),(104,2,4,4,'0');
/*!40000 ALTER TABLE `event_role_user` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `event_script`
--
 
DROP TABLE IF EXISTS `event_script`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_script` (
  `event_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `event_script`
--
 
LOCK TABLES `event_script` WRITE;
/*!40000 ALTER TABLE `event_script` DISABLE KEYS */;
INSERT INTO `event_script` VALUES (2,1),(2,2),(3,3),(4,4),(4,3),(4,1),(5,2),(5,4),(4,2);
/*!40000 ALTER TABLE `event_script` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `notification`
--
 
DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `notif_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `notification`
--
 
LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (3,2,'A show has been assigned to you','2016-03-27','Accepted'),(4,2,'Show \"Aladin\" has been modified','2016-03-29','Rejected'),(5,2,'test message','2016-03-09',''),(6,2,'test notification for user 2','2016-03-11','');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `role`
--
 
DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `role`
--
 
LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator'),(2,'Team Leader'),(3,'Staff'),(4,'Actor');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `scripts`
--
 
DROP TABLE IF EXISTS `scripts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `synopsis` longtext NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `scripts`
--
 
LOCK TABLES `scripts` WRITE;
/*!40000 ALTER TABLE `scripts` DISABLE KEYS */;
INSERT INTO `scripts` VALUES (1,'Aladdin Part 1','...',3),(2,'Aladdin Part 2','...',3),(3,'Wicked Script','This is the script for Wicked. Comments?',1),(4,'Fiddler on the Roof Script','...',1);
/*!40000 ALTER TABLE `scripts` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `user`
--
 
DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_2` (`role_id`),
  CONSTRAINT `user_role_id_to_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `user`
--
 
LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'e193d4669eab0ae21d1acf37a98f95a605a8e86c210e9db02445bac62351dbdbd856ee8aca7b5953cde8f43c996a03b0',1,1,'ray_admin@gmail.com'),(2,'5ecaf34c43cd885cdc8e67022427a78d9aa2b4881e9c69f814469bac18166ace601aae163ab647fc883846d1c2e42378',1,1,'tameem_imamdad@gmail.com'),(3,'0984196b975cfb4660f50c9be5911d3fa5a595220987a1c6820f1e1253a1eae5ab94db02af53d0d1916448c0f4eadd54',1,1,'charlie'),(68,'e193d4669eab0ae21d1acf37a98f95a605a8e86c210e9db02445bac62351dbdbd856ee8aca7b5953cde8f43c996a03b0',4,1,'ray_actor@gmail.com'),(69,'5d26029e024ed9bf222a815b12990253cd2ba169585e954bee4b6934b2c4a311e60b8d3ea2e82918add72c6b9793bd31',3,1,'ray_staff@gmail.com'),(70,'403ed71753c01bbb9ae225f63cb34a9951694738a2f79b4ccfc1bae6507b6e22feb6542f60f677d23ad30516256aba1f',4,1,'raihanahmed@gmail.com'),(71,'a61fe22e1dc11a07ed766100d4726105caecb2cb463fd62979f110a2a4fb0b3f894db2f076eaa8570703e08deda455a4',4,1,'leonardo_dicaprio@gmail.com'),(72,'093a5acd32bbd2cd5baa9b3a8c97bda16ea00da14e16568385bbcb09f28a475b158418c0632bc382d098c8a192596144',3,1,'charlie_staff@gmail.com'),(73,'f3be856efc23dd7872042a8e6d204b4952ddb89937b70814eb4077aa15760c0d83480427ace7d7ec1c1d75160592a541',4,0,'charlie_actor@gmail.com'),(75,'8df1bd58222f1fb0bd85593252a95e7c9d526bfc04bf431e7195ccc48a033593edf4ebe4096b63e77e7e96d23e6800d1',4,0,'tameem_actor@gmail.com'),(79,'7d5189792a14862355bc379d93603dac48ce206833644d733589d528f51a57378632bf58762a0a03e6d6679ee1535ac5',4,0,'george_sankey@gmail.com'),(80,'bc3ba3566a2fd26ec65a88a672b934ac23645eeeff9019d360ba08aa57a03f265533b1783e0910a7d4622beda9821c80',4,0,'marshallcho@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `user_script`
--
 
DROP TABLE IF EXISTS `user_script`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_script` (
  `user_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `user_script`
--
 
LOCK TABLES `user_script` WRITE;
/*!40000 ALTER TABLE `user_script` DISABLE KEYS */;
INSERT INTO `user_script` VALUES (3,1),(3,2),(1,1),(2,1),(1,4);
/*!40000 ALTER TABLE `user_script` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `user_status`
--
 
DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `user_status`
--
 
LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (-1,'Rejected'),(0,'Pending'),(1,'Accepted');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `venue`
--
 
DROP TABLE IF EXISTS `venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `venue`
--
 
LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` VALUES (1,'Broadway Theatre','These are comments about the Broadway Theatre venue.'),(2,'New York Hospital','This is a comment about the New York Hospital.');
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Table structure for table `venue_contact`
--
 
DROP TABLE IF EXISTS `venue_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venue_contact` (
  `venue_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
 
--
-- Dumping data for table `venue_contact`
--
 
LOCK TABLES `venue_contact` WRITE;
/*!40000 ALTER TABLE `venue_contact` DISABLE KEYS */;
INSERT INTO `venue_contact` VALUES (1,30),(2,33);
/*!40000 ALTER TABLE `venue_contact` ENABLE KEYS */;
UNLOCK TABLES;
 
--
-- Dumping events for database 'omb_db'
--
 
--
-- Dumping routines for database 'omb_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
 