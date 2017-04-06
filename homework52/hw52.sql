-- MySQL dump 10.13  Distrib 5.5.53, for Win64 (AMD64)
--
-- Host: localhost    Database: hw3
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `description` text,
  `photo` varchar(500) DEFAULT '',
  `cookie` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'johnny','$2y$10$nMQ4DNgo8xHf2edOg8z/QOwmRfniI225Pzl5ygHx4v0R1kiuBQEJi','Женя Котвицкий','1976-07-10',' фото с рыбой. Новая строка ','3-3-fish.jpg','$2y$10$ajxUb65fl4mAHkEDqxfeJew0aB1fKXVD6sjS573XGEv5Z3JCRyh.y'),(25,'semen1234','$2y$10$fedOE7oW2D3uYdTZ6vgEU.oGxlwp2/JqF/.K7r4iWNKauaK4LIe1C','Семен','1995-02-02','Это мое описание','25-25-den-rozhdenija-znakomoj-3.jpg',NULL),(33,'tanya999','$2y$10$TSS8kvs/u.VNVQRhfZODz.AbJAci6f8pv21IvTPWQbkR9JMUeWCQa','Татьяна','0000-00-00','Фото кошки \'update ` \'update \"set','33-28-cat.jpg','$2y$10$xcyNhkOrIYm7JlFb.T7RxuOxZox1xmXbVIM6/ZbATrpPMSV0qm9q6'),(34,'johnny-123','$2y$10$dmqmZNQe0LUjN/yDT70B0egot2DIHn2LzSPEoEtywH2uXfBD.XfZS','Новый','0000-00-00',' Еще один  ','',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-06 13:19:11
