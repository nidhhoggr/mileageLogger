-- MySQL dump 10.13  Distrib 5.1.69, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: mileageLogger
-- ------------------------------------------------------
-- Server version	5.1.69-0ubuntu0.11.10.1

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
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client`
--

LOCK TABLES `Client` WRITE;
/*!40000 ALTER TABLE `Client` DISABLE KEYS */;
INSERT INTO `Client` VALUES (1,'Skysoft'),(2,'Nsync');
/*!40000 ALTER TABLE `Client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Location`
--

DROP TABLE IF EXISTS `Location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `suiteAptNo` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7E8EB9D19EB6921` (`client_id`),
  CONSTRAINT `FK_A7E8EB9D19EB6921` FOREIGN KEY (`client_id`) REFERENCES `Client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Location`
--

LOCK TABLES `Location` WRITE;
/*!40000 ALTER TABLE `Location` DISABLE KEYS */;
INSERT INTO `Location` VALUES (3,NULL,'UCF Library','12701 Pegasus Drive','Orlando','FL','32816-2666',NULL),(4,NULL,'home office','2830 Brantley Hills Ct','Longwood','FL','32779',NULL),(5,NULL,'Seminole State(Lake Mary) Library','100 Weldon Blvd','Sanford','FL','32773',NULL),(6,2,'Nsync Data Office','7191 N. Atlantic Ave.','Cape Canaveral','Fl','32920',NULL),(7,NULL,'Unlisted','N/A','N/A','N/A','N/A','N/A');
/*!40000 ALTER TABLE `Location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Todo`
--

DROP TABLE IF EXISTS `Todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `completedAt` datetime DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Todo`
--

LOCK TABLES `Todo` WRITE;
/*!40000 ALTER TABLE `Todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Trip`
--

DROP TABLE IF EXISTS `Trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `tripDate` datetime DEFAULT NULL,
  `travelTime` int(11) DEFAULT NULL,
  `purpose` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_D6645A0519EB6921` (`client_id`),
  CONSTRAINT `FK_D6645A0519EB6921` FOREIGN KEY (`client_id`) REFERENCES `Client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Trip`
--

LOCK TABLES `Trip` WRITE;
/*!40000 ALTER TABLE `Trip` DISABLE KEYS */;
INSERT INTO `Trip` VALUES (10,NULL,20,'2013-08-12 00:37:23','2013-08-12 00:37:00',43,NULL),(11,NULL,70,'2013-08-12 00:37:34','2013-08-12 00:37:00',72,NULL),(12,NULL,11,'2013-08-12 00:37:56','2013-08-12 00:37:00',24,NULL),(13,NULL,60,'2013-08-12 00:38:26','2013-08-12 00:50:00',50,'traveled to ihop for taxes with mark');
/*!40000 ALTER TABLE `Trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'testuser','testuser','test@example.com','test@example.com',1,'3iaw7ncs2tq8g8ws88cgc0kks4wssco','qArX4CLa67K8A3mkl6gYiLBSlwLVe2yI37+rQAKbNG6jC25VxGzc95wfgHLN1aAIvPu6UoE74ZHtu7knaZFLLA==','2013-08-10 21:00:20',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),(2,'adminuser','adminuser','zmijevik@hotmail.com','zmijevik@hotmail.com',1,'la576g8qp0ggkkcowsw0o0owwckw8ww','zFWjehW/HC8B3UexGCFi/Iz4FKMuBajztuRFy5RJ4ftzaEUkbhjYhNYPtog3ANgICwwEde0c4SZfiUijoyWkZw==',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',0,NULL);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_trips`
--

DROP TABLE IF EXISTS `location_trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_trips` (
  `trip_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`trip_id`,`location_id`),
  KEY `IDX_DC2F35FFA5BC2E0E` (`trip_id`),
  KEY `IDX_DC2F35FF64D218E` (`location_id`),
  CONSTRAINT `FK_DC2F35FF64D218E` FOREIGN KEY (`location_id`) REFERENCES `Location` (`id`),
  CONSTRAINT `FK_DC2F35FFA5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `Trip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_trips`
--

LOCK TABLES `location_trips` WRITE;
/*!40000 ALTER TABLE `location_trips` DISABLE KEYS */;
INSERT INTO `location_trips` VALUES (10,3),(10,4),(11,4),(11,6),(12,4),(12,5),(13,4),(13,7);
/*!40000 ALTER TABLE `location_trips` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-13  4:06:56
