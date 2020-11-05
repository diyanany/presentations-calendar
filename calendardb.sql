-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: calendardb
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `StudentID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_StudentIDPresentation` (`StudentID`),
  CONSTRAINT `FK_StudentIDPresentation` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES (3,'ReactJS','2019-12-05','11:00:00',5),(7,'HTML: Part 1 Semantic Elements','2019-12-04','11:15:00',4),(8,'Work with sessions and cookies','2019-12-04','11:30:00',8),(9,'CSS: layouts, box model','2020-01-15','09:30:00',7),(10,'Test with Selenium web driver','2020-01-15','09:45:00',6),(12,'Shadow DOM 101','2020-01-15','10:45:00',9),(13,'Shadow DOM 201, CSS and Styling. Advanced Concepts & DOM APIs','2020-01-16','10:30:00',10),(15,'CSS: layouts, flexbox','2020-01-16','10:45:00',12),(16,'HTML Imports','2020-01-16','11:00:00',13),(17,'Google - Web Performance Best Practices','2020-02-11','11:30:00',16),(29,'Spring (java)','2020-02-11','09:00:00',16),(30,'URL rewriting','2020-02-11','10:15:00',16),(33,'Multi-touch Web Development','2020-02-11','09:15:00',15),(34,'MySQL: Part 1','2020-01-21','10:30:00',15);
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) NOT NULL,
  `Identity` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(21) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Identity` (`Identity`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (4,'Antonia Todorova',81548,'attodorova@fmi.uni-sofia.bg','1234'),(5,'Diyana Yordanova',81547,'dijanaj@fmi.uni-sofia.bg','pass123'),(6,'Georgi Bonev',81528,'gbonev@fmi.uni-sofia.bg','gbonev97'),(7,'Sofia Mihaleva',81486,'smihaleva@fmi.uni-sofia.bg','sofisofi'),(8,'Pavlina Koleva',81527,'pkoleva@fmi.uni-sofia.bg','p_koleva7'),(9,'Aleksandur',81557,'aleksandur@fmi.uni-sofia.bg','098712'),(10,'Martin',81587,'martin@fmi.uni-sofia.bg','pass6'),(12,'Test User',81007,'test@fmi.uni-sofia.bg','test'),(13,'Test User 2',81004,'test2@fmi.uni-sofia.bg','test2'),(14,'Test User',88888,'test.user@gmail.com','testuser'),(15,'Pesho ',81811,'pesho.pesho@gmail.com','81811pesho'),(16,'Jonh Smith',90186,'j.smith@gmail.com','123456');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-13  7:32:24
