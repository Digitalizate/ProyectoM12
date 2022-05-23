-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: restaurante
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-1:10.3.34+maria~stretch-log

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
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` (`id`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES (11,'jnkhjkjhk','ana@gmail.com','hjkjhkjhsadfsdfsdrf','2022-05-03 15:42:56'),(12,'klik','anaguirao@gmail.com','hjkhjkhjkkhjkhj','2022-05-03 16:47:29'),(13,'dfdsf','ana@gmail.com','afsdfdsfdsfdsfdsfs','2022-05-19 12:25:09'),(14,'yiyuiyui','fdgfg@gfdgfdg.cxvom','yfyutyutyuty','2022-05-19 16:18:54'),(15,'ioyioy','uyuiyu@dfgdfg.com','dfgretgregregre','2022-05-19 16:39:44'),(16,'fgrdegre','rerere@rgfrg.com','fdgdfgdfgdfgdfgdg','2022-05-19 16:40:12');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `personas` int(11) DEFAULT NULL,
  `ninos` int(11) DEFAULT NULL,
  `hora` time(5) DEFAULT NULL,
  `fecha` varchar(11) DEFAULT NULL,
  `comentario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `id_usuario`, `personas`, `ninos`, `hora`, `fecha`, `comentario`) VALUES (1,44,2,0,'12:33:00.00000','0000-00-00',NULL),(2,44,2,0,'12:33:00.00000','23/04/2022',NULL);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `password`) VALUES (6,'dsdsds','dsfdsfdsfd','sdfsdfsdf@gmail.com',343242344,'$2y$10$2TrI3ksty9AduTlEEA5GeOHtE4xQWJdx.pX8dD4EVwCxcf3jqBe52'),(7,'ana','lopez','analopez@gmail.com',342343242,'$2y$10$3KN6vvDOypsjreFujpffEuOVP6qMNxNUQgcHYfX.nHQ5x68NJZ6rS'),(8,'aaaaaa','aaaaaa','anaana@gmail.com',343432424,'$2y$10$AL37OCD7C6di/QOXUtVA7ewMRbDKo1CCBWW0MqGlQcYtoZUA2Q.ti'),(9,'usuario','usuario','usuario@gmail.com',433543543,'$2y$10$xy8JTam9sdTU7zw1FRHplup515A7mbZlsCpT3hkBYyVGmHVXcoSBu'),(10,'prueba2','prueba2','prueba2@gmail.com',454354335,'$2y$10$N3Ywok3eRQfPaX8i5Irt/u.3D4m.7nszcWnQSsgIWjo6pIcFNPNsK'),(11,'Sandra','Ortiz','sandra.orti.15@gmail.com',234234234,'$2y$10$4.8aSb.5DeyVDXKQ4Hhv6OHZTSsZQ17EY1pKKLR8.lt3bkuMKbzEG'),(12,'Lara','Knight','Laraknight09@gmail.com',654678675,'$2y$10$hYYRw2jNRL5DVDayC51I1uCPqA4524J75RRllCjM110WtzOZ33VYS'),(13,'ana','guirao','ana@gmail.com',342343242,'$2y$10$ww5PbVEymddQYGCaduWHiOuCUjBkYpSg15h8VpbQ90QtbNOQs2BM.'),(14,'fsf','efefe','fef@dsf.c',0,'$2y$10$8LToHO0I2HhPWYGVQk0XuOezT.i0p/YD3UtWy4XnBOrZUQ6O7/XBq');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'restaurante'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-23 21:03:53
