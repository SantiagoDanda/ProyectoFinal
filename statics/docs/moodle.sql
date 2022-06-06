-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: moodle
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasehasusuario` (
  `id_clasehasusuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_clase` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_clasehasusuario`),
  KEY `id_clase` (`id_clase`),
  CONSTRAINT `clasehasusuario_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasehasusuario`
--

LOCK TABLES `clasehasusuario` WRITE;
/*!40000 ALTER TABLE `clasehasusuario` DISABLE KEYS */;
INSERT INTO `clasehasusuario` VALUES (1,1,321146650),(2,2,321146650),(3,1,321146651),(4,2,321146651),(5,1,345000000),(6,2,345000000),(7,1,311111666),(8,2,311111666),(9,1,999999997),(10,2,999999997),(11,1,222222222),(12,2,222222222);
/*!40000 ALTER TABLE `clasehasusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventohasusuario`
--

DROP TABLE IF EXISTS `eventohasusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `numcuenta` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` tinyint(4) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL,
  `etiqueta` char(25) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `numcuenta` (`numcuenta`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`numcuenta`) REFERENCES `usuarios` (`numcuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareahasusuario`
--

DROP TABLE IF EXISTS `tareahasusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareahasusuario`
--

LOCK TABLES `tareahasusuario` WRITE;
/*!40000 ALTER TABLE `tareahasusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareahasusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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

-- Dump completed on 2022-06-06 12:32:30
