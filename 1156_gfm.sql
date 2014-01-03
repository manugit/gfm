-- MySQL dump 10.13  Distrib 5.5.34, for Win32 (x86)
--
-- Host: localhost    Database: 1156_gfm
-- ------------------------------------------------------
-- Server version	5.5.34

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
-- Table structure for table `all_member_relationship_1_hops`
--

DROP TABLE IF EXISTS `all_member_relationship_1_hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `all_member_relationship_1_hops` (
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `hops` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `all_member_relationship_1_hops`
--

LOCK TABLES `all_member_relationship_1_hops` WRITE;
/*!40000 ALTER TABLE `all_member_relationship_1_hops` DISABLE KEYS */;
/*!40000 ALTER TABLE `all_member_relationship_1_hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `all_member_relationship_3_hops`
--

DROP TABLE IF EXISTS `all_member_relationship_3_hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `all_member_relationship_3_hops` (
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `hops` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `all_member_relationship_3_hops`
--

LOCK TABLES `all_member_relationship_3_hops` WRITE;
/*!40000 ALTER TABLE `all_member_relationship_3_hops` DISABLE KEYS */;
/*!40000 ALTER TABLE `all_member_relationship_3_hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumption`
--

DROP TABLE IF EXISTS `consumption`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `potposition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`potposition_id`),
  KEY `potposition_id` (`potposition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumption`
--

LOCK TABLES `consumption` WRITE;
/*!40000 ALTER TABLE `consumption` DISABLE KEYS */;
INSERT INTO `consumption` VALUES (1,1,1,1),(2,0.6,3,1),(3,75,1,2),(4,75,2,2),(5,75,3,2),(6,75,4,2),(7,1,7,4),(10,1,7,5),(11,0,9,4),(12,0,9,5),(13,0.5,7,6),(14,0.5,9,6),(15,0.5,7,7),(16,0.5,9,7),(17,0.5,7,8),(18,0.5,9,8),(19,0.5,7,9),(20,0.5,10,9),(21,0.5,7,10),(22,0.5,10,10),(23,0.5,7,11),(24,0.5,10,11),(25,0.5,7,12),(26,0.5,10,12),(27,0.5,7,13),(28,0.5,10,13);
/*!40000 ALTER TABLE `consumption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_relationship_0_hops`
--

DROP TABLE IF EXISTS `member_relationship_0_hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_relationship_0_hops` (
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `hops` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_relationship_0_hops`
--

LOCK TABLES `member_relationship_0_hops` WRITE;
/*!40000 ALTER TABLE `member_relationship_0_hops` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_relationship_0_hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_relationship_2_hops`
--

DROP TABLE IF EXISTS `member_relationship_2_hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_relationship_2_hops` (
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `hops` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_relationship_2_hops`
--

LOCK TABLES `member_relationship_2_hops` WRITE;
/*!40000 ALTER TABLE `member_relationship_2_hops` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_relationship_2_hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_relationship_3_hops`
--

DROP TABLE IF EXISTS `member_relationship_3_hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_relationship_3_hops` (
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `hops` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_relationship_3_hops`
--

LOCK TABLES `member_relationship_3_hops` WRITE;
/*!40000 ALTER TABLE `member_relationship_3_hops` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_relationship_3_hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obligation`
--

DROP TABLE IF EXISTS `obligation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obligation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `pot_id` int(11) NOT NULL,
  `debitor` int(11) NOT NULL,
  `creditor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pot_id` (`pot_id`),
  KEY `debitor` (`debitor`),
  KEY `creditor` (`creditor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obligation`
--

LOCK TABLES `obligation` WRITE;
/*!40000 ALTER TABLE `obligation` DISABLE KEYS */;
/*!40000 ALTER TABLE `obligation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pot`
--

DROP TABLE IF EXISTS `pot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `description` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `url_hash` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pot`
--

LOCK TABLES `pot` WRITE;
/*!40000 ALTER TABLE `pot` DISABLE KEYS */;
INSERT INTO `pot` VALUES (1,'WG (Nils, Felix)','Die Wohngemeinschaft von Nils und Felix','2013-01-01','2013-09-20',''),(2,'Group 9','IT PM Gruppe 9','2013-03-02',NULL,''),(3,'Testpot','Test','2013-01-01','2014-12-31',''),(4,'Test','alsdfjalsdkfj','2013-11-05','2013-11-30','f42gwqgj2sginlk'),(5,'Test123','abcde','2013-12-02','2014-03-20','f1up2dnw7e9zxek'),(6,'abc','123','2013-12-02','2014-02-21','9snsn72pjhh4u9n'),(7,'xdabc5567','test','2014-01-01','2014-01-31','b6ls7r97jjba1u7'),(8,'asdfasdfasdf','asdfasdfasdf','2014-01-02','2014-01-24','a6ll3gra8fdl9tq');
/*!40000 ALTER TABLE `pot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potposition`
--

DROP TABLE IF EXISTS `potposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `potposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `payer_id` int(11) NOT NULL,
  `pot_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payer_id` (`payer_id`),
  KEY `pot_id` (`pot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potposition`
--

LOCK TABLES `potposition` WRITE;
/*!40000 ALTER TABLE `potposition` DISABLE KEYS */;
INSERT INTO `potposition` VALUES (1,'Milch',1.6,'0000-00-00',1,1,0),(2,'Apèro (Snacks)',300,'0000-00-00',2,2,0),(3,'test',100,'0000-00-00',2,1,0),(4,'asdf',20,'2013-11-12',7,4,2),(5,'asdfjlaksd',50,'2013-12-21',7,4,0),(6,'asdf',30,'2013-12-21',9,4,3),(7,'ASDFSDDFQ',50,'2013-11-15',7,4,1),(8,'asdfasdf',50,'2013-11-13',9,4,4),(9,'asdfasdfasdfasd',60,'2013-12-19',10,5,1),(10,'ssss',50,'2013-12-18',7,5,2),(11,'test',40,'2013-12-27',7,6,1),(12,'ssdfa',30,'2014-01-02',7,7,1),(13,'abc',100,'2014-01-03',10,7,2);
/*!40000 ALTER TABLE `potposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'manu','mÃ¼ller','hans1','manuel19b@gmail.com','1986-08-19'),(9,'test','test','test','xyz@live.com','1990-09-09'),(10,'beni','kern','benjamin','kernben2@students.zhaw.ch','1989-08-31');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user2pot`
--

DROP TABLE IF EXISTS `user2pot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user2pot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pot_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`pot_id`),
  KEY `pot_id` (`pot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user2pot`
--

LOCK TABLES `user2pot` WRITE;
/*!40000 ALTER TABLE `user2pot` DISABLE KEYS */;
INSERT INTO `user2pot` VALUES (14,7,5),(16,7,6),(18,7,7),(20,7,8),(15,10,5),(17,10,6),(19,10,7);
/*!40000 ALTER TABLE `user2pot` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-03 13:51:03
