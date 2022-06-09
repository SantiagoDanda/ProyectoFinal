-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: moodle
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `clasehasusuario`
--

DROP TABLE IF EXISTS `clasehasusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasehasusuario` (
  `id_clasehasusuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_clasehasusuario`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `clasehasusuario_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasehasusuario`
--

LOCK TABLES `clasehasusuario` WRITE;
/*!40000 ALTER TABLE `clasehasusuario` DISABLE KEYS */;
INSERT INTO `clasehasusuario` VALUES (1,1,321146650),(2,2,321146650),(3,1,321146651),(4,2,321146651),(5,1,345000000),(6,2,345000000),(7,1,311111666),(8,2,311111666),(9,1,999999997),(10,2,999999997),(11,1,222222222),(12,2,222222222),(13,1,200000000),(14,2,200000000),(15,4,200000000),(16,2,321432343),(17,1,321432343),(18,5,321432343),(19,3,321432343);
/*!40000 ALTER TABLE `clasehasusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL AUTO_INCREMENT,
  `numerodecuentaM` int(11) DEFAULT NULL,
  `id_tarea` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_clase`),
  KEY `numerodecuentaM` (`numerodecuentaM`),
  KEY `id_tarea` (`id_tarea`),
  CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`numerodecuentaM`) REFERENCES `usuarios` (`numcuenta`),
  CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id_tarea`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (1,400000000,NULL,'Curso de pc'),(2,400000000,NULL,'Dandagod'),(3,400000000,NULL,'Matematicas'),(4,400000000,NULL,'Isac'),(5,400000000,NULL,'4');
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) DEFAULT NULL,
  `numcuenta` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `texto` tinytext DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_publicacion` (`id_publicacion`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,3,321432343,'2022-06-09 04:47:12','sssss'),(2,3,321432343,'2022-06-09 04:54:54','ffffff'),(3,3,321432343,'2022-06-09 04:55:12','fffffff'),(4,3,321432343,'2022-06-09 04:55:12','fffffff'),(5,3,321432343,'2022-06-09 04:59:03','gggg'),(6,3,321432343,'2022-06-09 05:01:28','hhhhhh'),(7,3,321432343,'2022-06-09 05:03:50','tttttt'),(8,3,321432343,'2022-06-09 05:05:15','jjjjjjj'),(9,3,321432343,'2022-06-09 05:07:21','hhhhh'),(10,3,321432343,'2022-06-09 05:08:52','hhhhh'),(11,3,321432343,'2022-06-09 05:10:32','rrrrrrrr'),(12,3,321432343,'2022-06-09 05:12:18','rrrrrr'),(13,3,321432343,'2022-06-09 05:14:03','rwqreqerq'),(14,3,321432343,'2022-06-09 05:14:50','ttttt'),(15,3,321432343,'2022-06-09 05:15:06','yyyyy'),(16,3,321432343,'2022-06-09 05:16:14','qqqqqqq'),(17,3,321432343,'2022-06-09 05:16:57','fffffff'),(18,4,321432343,'2022-06-09 05:18:09','kkkkkk'),(19,3,321432343,'2022-06-09 17:45:58','gsdfs'),(20,3,321432343,'2022-06-09 17:46:01','gsdfs'),(21,3,321432343,'2022-06-09 17:46:23','fasdfa'),(22,4,321432343,'2022-06-09 17:46:33','hola'),(23,4,321432343,'2022-06-09 17:46:41',''),(24,7,321432343,'2022-06-09 17:47:15','que chido'),(25,2,321432343,'2022-06-09 17:47:47','que chido'),(26,2,321432343,'2022-06-09 17:47:55','hola'),(36,3,321432343,'2022-06-09 18:40:21','comentario'),(38,1,321432343,'2022-06-09 18:40:52','hola'),(39,2,321432343,'2022-06-09 18:41:02','hola');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventohasusuario`
--

DROP TABLE IF EXISTS `eventohasusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventohasusuario` (
  `id_eventohasusuario` int(11) NOT NULL AUTO_INCREMENT,
  `numcuenta` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_eventohasusuario`),
  KEY `numcuenta` (`numcuenta`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `eventohasusuario_ibfk_1` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`),
  CONSTRAINT `eventohasusuario_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventohasusuario`
--

LOCK TABLES `eventohasusuario` WRITE;
/*!40000 ALTER TABLE `eventohasusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventohasusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `tarea` tinyint(1) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kahhut`
--

DROP TABLE IF EXISTS `kahhut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kahhut` (
  `json` text DEFAULT NULL,
  `numcuenta` int(11) DEFAULT NULL,
  `idcuestionario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idcuestionario`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `kahhut_ibfk_1` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kahhut`
--

LOCK TABLES `kahhut` WRITE;
/*!40000 ALTER TABLE `kahhut` DISABLE KEYS */;
/*!40000 ALTER TABLE `kahhut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_emisor` int(11) DEFAULT NULL,
  `id_receptor` int(11) DEFAULT NULL,
  `mensaje` tinytext DEFAULT NULL,
  `asunto` tinytext DEFAULT NULL,
  `ubicacion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `id_emisor` (`id_emisor`),
  KEY `id_receptor` (`id_receptor`),
  CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuarios` (`numcuenta`),
  CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_receptor`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `numcuenta` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL,
  `etiqueta` char(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` VALUES (1,321432343,'2022-06-08 21:17:10',NULL,NULL,NULL,'jjjjjjjjjjjj','jjjjjjjjjj'),(2,321432343,'2022-06-08 21:20:03',NULL,NULL,NULL,'ppppppp','ppppp'),(3,321432343,'2022-06-08 21:29:02',NULL,NULL,NULL,'ppppppp','ppppp'),(4,321432343,'2022-06-08 21:36:49',NULL,NULL,'mmmmm.jpeg','rrrrrr','porfa di que si'),(5,321432343,'2022-06-09 03:14:26',NULL,NULL,'','esto solo es una prueba','comentario de prueba'),(6,321432343,'2022-06-09 03:17:09',NULL,NULL,'otraPrueba.png','prueba','otra prueba'),(7,321432343,'2022-06-09 03:19:53',NULL,NULL,'oooo.png','nada','otraotraprueba'),(8,321432343,'2022-06-09 03:31:10',NULL,NULL,'ccccccc.png','cccccccccc','cccccccccc'),(9,321432343,'2022-06-09 03:32:38',NULL,NULL,'ttttttttt.png','ttttttttttt','tttttt'),(10,321432343,'2022-06-09 17:54:11',NULL,NULL,'afsdasf.png','reqwrq','fasdf');
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacionesclase`
--

DROP TABLE IF EXISTS `publicacionesclase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacionesclase` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) DEFAULT NULL,
  `numcuenta` int(11) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `id_clase` (`id_clase`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `publicacionesclase_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  CONSTRAINT `publicacionesclase_ibfk_2` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacionesclase`
--

LOCK TABLES `publicacionesclase` WRITE;
/*!40000 ALTER TABLE `publicacionesclase` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacionesclase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareahasusuario`
--

DROP TABLE IF EXISTS `tareahasusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareahasusuario` (
  `id_tareahasusuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` int(11) DEFAULT NULL,
  `numcuenta` int(11) DEFAULT NULL,
  `calificacion` tinyint(4) DEFAULT NULL,
  `subido` tinyint(1) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `fechasubida` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tareahasusuario`),
  KEY `id_tarea` (`id_tarea`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `tareahasusuario_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id_tarea`),
  CONSTRAINT `tareahasusuario_ibfk_2` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareahasusuario`
--

LOCK TABLES `tareahasusuario` WRITE;
/*!40000 ALTER TABLE `tareahasusuario` DISABLE KEYS */;
INSERT INTO `tareahasusuario` VALUES (1,2,321432343,10,1,'tarea.pdf','0000-00-00 00:00:00'),(2,3,321432343,10,1,'tarea2.pdf','0000-00-00 00:00:00'),(3,3,321432343,10,1,'tarea2.pdf','0000-00-00 00:00:00'),(4,3,321432343,9,1,'tarea2.pdf','0000-00-00 00:00:00'),(5,3,321432343,9,1,'tarea2.pdf','0000-00-00 00:00:00'),(6,3,321432343,9,1,'tarea2.pdf','2022-11-20 00:00:01'),(8,4,321432343,8,1,'tarea.pdf','2022-03-20 00:00:00'),(9,5,321432343,8,1,'tarea.pdf','2022-03-20 00:00:00');
/*!40000 ALTER TABLE `tareahasusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `numerodecuentaM` int(11) DEFAULT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `fechasubida` datetime DEFAULT NULL,
  `fechaentrega` datetime DEFAULT NULL,
  `puntos` tinyint(4) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tarea`),
  KEY `id_clase` (`id_clase`),
  KEY `numerodecuentaM` (`numerodecuentaM`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`numerodecuentaM`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (2,321432343,NULL,'2022-06-06 20:58:38','2022-11-11 00:00:00',10,'','Esta es la tarea más tryhard de sus vidas','tryhard'),(3,321432343,NULL,'2022-06-07 20:57:24','2022-01-10 00:00:00',20,'Actividad prueba','Tarea de prueba 2.0','actividadp'),(4,321432343,NULL,'2022-06-07 22:04:22','2022-12-01 00:00:00',20,'Actividad prueba','Tarea de prueba','archivoPrueba'),(5,321432343,NULL,'2022-06-08 20:05:00','0023-03-12 00:00:00',6,'actividad','Efasdfasfdasrea más tryhard de sus vidas','archivo');
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `numcuenta` int(11) NOT NULL,
  `usuario` char(12) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `info` tinytext DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `tipo` varchar(9) DEFAULT NULL,
  `nombre` char(60) DEFAULT NULL,
  PRIMARY KEY (`numcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (200000000,'profe','correro@gmail.com','123456',NULL,NULL,NULL,NULL,'alumno','profe'),(321432343,'El_Faragod','correro@gmail.com','123456',NULL,'fdfsdf.png',NULL,NULL,'alumno','Faraón love shady'),(345678909,'Prueba','dasdfas@gmail.com','1234567',NULL,NULL,NULL,NULL,'alumno','Prueba'),(400000000,'profe2.0','jasdfas@gmail.com','123456',NULL,NULL,NULL,NULL,'profe','profe2.0');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-09 13:26:33
