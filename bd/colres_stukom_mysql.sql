CREATE DATABASE  IF NOT EXISTS `colores` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `colores`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: colores
-- ------------------------------------------------------
-- Server version	8.4.5

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colores` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `color_es` varchar(25) DEFAULT NULL,
  `color_en` varchar(25) DEFAULT NULL,
  `id_usuario` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (4,'Dumbo','amarillo','yellow',1),(5,'Peter Pan','blanco','white',1),(6,'Caputxeta vermella','rojo','red',1),(14,'Pinocho','azul','blue',2),(15,'Alba','amarillo','yellow',3),(16,'aaa','rojo','red',2),(19,'Chita','rojo','red',3);
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passreset`
--

DROP TABLE IF EXISTS `passreset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passreset` (
  `id_passreset` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `caducidad` datetime DEFAULT NULL,
  PRIMARY KEY (`id_passreset`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passreset`
--

LOCK TABLES `passreset` WRITE;
/*!40000 ALTER TABLE `passreset` DISABLE KEYS */;
INSERT INTO `passreset` VALUES (6,3,'abcd','c3a47cd34f03b905c7a5b74fb69f940cd276a379f2cbfb89abfbb37199750c132724c4b55867a493dd69afa8fd68b37ee67194f4b79483d198339af3351e6a61','2025-05-22 20:02:55');
/*!40000 ALTER TABLE `passreset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporal`
--

DROP TABLE IF EXISTS `temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporal` (
  `id_temporal` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(255) DEFAULT NULL,
  `idioma` varchar(3) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `token_registro` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_temporal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporal`
--

LOCK TABLES `temporal` WRITE;
/*!40000 ALTER TABLE `temporal` DISABLE KEYS */;
INSERT INTO `temporal` VALUES (1,'Batman','$2y$10$nft/YiyLrNXX9K0Eg45mm.MftdNE5Y88PM2DHLVskWsCmhBREvuTO','CAT','ferran.cursos.web@gmail.com','a1eb6f1661a860fe086fd110fd0d70edabf8dfffbf2af291de53b43fa3b5254674a589bb8bfebaecfda2819f4bea00e03911ace5bb6340efd668da464c719695');
/*!40000 ALTER TABLE `temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(255) NOT NULL,
  `idioma` varchar(3) DEFAULT 'ESP',
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  UNIQUE KEY `password_usuario` (`password_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Batman','$2y$10$YdQ.x5riHRqZ4iX4OFCMeun.nfSqeKOEf1vyPzjNfxfYdqW5aZOAi','ENG','batman@joker.com'),(5,'Spiderman','$2y$10$kDtypXhDKYp5o6j3j06sX.a0n5w9ICZ6Iyzizmi.tlonGBfaymppi','CAT','ferran.cursos.web@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'colores'
--

--
-- Dumping routines for database 'colores'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizar_contrasena` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_contrasena`(IN p_id_usuario INT, IN p_nueva_pass VARCHAR(255))
BEGIN
    -- Actualizar usuario
    UPDATE usuarios
    SET password_usuario = p_nueva_pass
    WHERE id_usuario = p_id_usuario;

    -- Eliminar registro de reset
    DELETE FROM passreset
    WHERE id_usuario = p_id_usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-23 18:25:02
