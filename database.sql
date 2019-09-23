-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: calltronixinterview
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `interviewreport`
--

DROP TABLE IF EXISTS `interviewreport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interviewreport` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clientName` varchar(45) DEFAULT NULL,
  `mobileNo` varchar(12) DEFAULT NULL,
  `contactType` varchar(45) DEFAULT NULL,
  `callType` varchar(45) DEFAULT NULL,
  `sourceName` varchar(45) DEFAULT NULL,
  `storeName` varchar(45) DEFAULT NULL,
  `questionType` varchar(45) DEFAULT NULL,
  `questionSubType` varchar(45) DEFAULT NULL,
  `dispositionName` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `ticketID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interviewreport`
--

LOCK TABLES `interviewreport` WRITE;
/*!40000 ALTER TABLE `interviewreport` DISABLE KEYS */;
INSERT INTO `interviewreport` VALUES (1,'Harlan Maldonado','16466550032','Contact','Others','Email','KSRT_Sarit Center','General Inquiry','Career Inquiry','Compliment','2019-09-13 17:48:56',1104),(2,'Troy Stafford','19723200285','Contact','Inquiry','Email','KRIV_2 Rivers','General Inquiry','Supplier Inquiry','Supplier Inquiry','2019-09-13 17:44:13',1103),(3,'Rooney Kemp','18356441216','Contact','Inquiry','Outbound','KSRT_Sarit Center','Items left on the counter','Items left on the counter ','Items Left on The Counter ','2019-09-13 17:28:14',1102),(4,'Matthew Whitaker','19901603609','Non contact','Others','Inbound','KRIV_2 Rivers','General Inquiry','Career Inquiry','Disconnected ','2019-09-13 17:23:12',1101),(5,'Seth Arnold','18115156982','Contact','Inquiry','Outbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Product Availability (Not under promotion)','2019-09-13 17:15:36',1100),(6,'Xavier Wyatt','12974287996','Contact','Inquiry','Inbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Product Availability (Not under promotion)','2019-09-13 17:11:05',1099),(7,'Dieter Copeland','18279582516','Non contact','Others','Inbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Disconnected ','2019-09-13 17:09:27',1098),(8,'Arden Strong','18493220454','Contact','Inquiry','Outbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Price Inquiry (Not under promotion)','2019-09-13 17:03:54',1097),(9,'Nasim Gardner','12697788534','Contact','Inquiry','Inbound','KHUB_Kenya','Product','Product Availabilty (Under Promotions)','Product availability (Under promotion)','2019-09-13 16:43:17',1096),(10,'Henry Solis','14237739683','Contact','Inquiry','Outbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Product Availability (Not under promotion)','2019-09-13 16:41:33',1095),(11,'Theodore Le','18218715660','Contact','Inquiry','Outbound','KHUB_Kenya','Product','Product Availabilty (Under Promotions)','Product availability (Under promotion)','2019-09-13 16:36:48',1094),(12,'Owen Gibbs','14779309205','Contact','Inquiry','Outbound','KHUB_Kenya','Product','Product Specification','Product availability (Under promotion)','2019-09-13 16:32:24',1093),(13,'Kareem Turner','14865722945','Contact','Inquiry','Outbound','KHUB_Kenya','Product','Product Availabilty (Under Promotions)','Product availability (Under promotion)','2019-09-13 16:29:14',1092),(14,'Matthew Vega','11065170155','Contact','Inquiry','Inbound','KGLR_Galleria Shopping Mall','Product','Product Availabilty (Not Under Promotion)','Product Availability (Not under promotion)','2019-09-13 16:25:47',1091),(15,'Keith Copeland','11051995370','Contact','Inquiry','Outbound','KHUB_Kenya','Product','Product Availabilty (Under Promotions)','Product availability (Under promotion)','2019-09-13 16:23:05',1090);
/*!40000 ALTER TABLE `interviewreport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(45) DEFAULT NULL,
  `rolecode` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rights`
--

LOCK TABLES `rights` WRITE;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
INSERT INTO `rights` VALUES (1,'stores','1'),(2,'manager','2');
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `departmentid` varchar(45) DEFAULT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  `mobile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','ocWkbzNnTwn+QWFAwOBW9g==','Stores manager','stores','2','\0',NULL),(3,'paul','ocWkbzNnTwn+QWFAwOBW9g==','Department head','manager','2','\0',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-24  1:03:44
