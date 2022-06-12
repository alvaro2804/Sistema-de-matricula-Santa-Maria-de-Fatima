-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bd_matriculas
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997','1',''),(2,'Carlos Soplin','carlos.soplin@gmail.com','cedcae5e358ddbfdc96e674f921b51781adaf38b','1',''),(3,'carlos','carlos.soplinj@gmail.com','admin2','1','');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncio` (
  `anuncio_id` int(11) NOT NULL AUTO_INCREMENT,
  `anuncio_titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `anuncio` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `crear_timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`anuncio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `asistencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `clase_rutina_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0(indefinido)\r\n1(presente)\r\n2(ausente)',
  PRIMARY KEY (`asistencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,'1654552800','2022-2023',1,4,1,0,0),(2,'1654639200','2022-2023',1,4,1,0,1),(3,'1654466400','2022-2023',1,4,1,0,0),(4,'1654664400','2022-2023',1,4,1,0,1),(5,'1654578000','2022-2023',1,4,1,0,1);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia_backup`
--

DROP TABLE IF EXISTS `asistencia_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia_backup` (
  `asistencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL COMMENT '0(indefinido)\r\n1(Presente)\r\n2(Ausente)',
  `estudiante_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `session` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`asistencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia_backup`
--

LOCK TABLES `asistencia_backup` WRITE;
/*!40000 ALTER TABLE `asistencia_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('2ehgjmggqfjk6652155jpsjhm6m8rksv','::1',1654911934,'__ci_last_regenerate|i:1654911730;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('3kairoa8p38boedbshthgn4jmaq0snh3','::1',1654987240,'__ci_last_regenerate|i:1654987240;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('3kempqus5v31jr01ojefea38r4q45aki','::1',1654914497,'__ci_last_regenerate|i:1654914497;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Pago Exitoso\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('48nsnp0go3pj0ouqclbgtgced5amcl0a','::1',1654906635,'__ci_last_regenerate|i:1654906569;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('75ib5rdleeoqe52epbbm6llfsm3a2o8o','::1',1654987872,'__ci_last_regenerate|i:1654987872;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('7d6rvg0ck88k0l48tdp0duicgmh5apaf','::1',1654978327,'__ci_last_regenerate|i:1654978065;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('7sikf34n01gamdbc2sv24madvoftck8k','::1',1654983986,'__ci_last_regenerate|i:1654983986;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('ahibbb7optok7fkhv8fensajsqll4klh','::1',1654915165,'__ci_last_regenerate|i:1654915165;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Pago Exitoso\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('g7gt9nlgtmpajp7mavipa3olvpcob03f','::1',1654985218,'__ci_last_regenerate|i:1654985218;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('ge18elur1me5umsdq1lcipd9piausan9','::1',1654984268,'__ci_last_regenerate|i:1654983986;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('h19vf1jbqq2pbhn2c1k46d1jpr1n75n3','::1',1654987563,'__ci_last_regenerate|i:1654987563;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('jrlj9q5bh3b2bu0arja6m9dn0mqktljm','::1',1654986876,'__ci_last_regenerate|i:1654986876;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('k2vjhr4t9fcqt531h8dmtuq2gtje5ndo','::1',1654911157,'__ci_last_regenerate|i:1654911157;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('qupo20iog0fb4qqbk8dpv7lm43tl3bnd','::1',1654983659,'__ci_last_regenerate|i:1654983659;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('s1erg0749die75nerm1mahi2rvsdne20','::1',1654914859,'__ci_last_regenerate|i:1654914859;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Pago Exitoso\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('s4ueqdh2seal4n2c5ssbub603pg0tqd1','::1',1654913564,'__ci_last_regenerate|i:1654913564;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('sn97vkr343jv1ts4fou5r2ng5jf3mn9q','::1',1654911730,'__ci_last_regenerate|i:1654911730;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('tkt6f149a4hn5uu9702i6ecmp4q7dkfp','::1',1654988070,'__ci_last_regenerate|i:1654987872;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('va7jmrre033ol9ldp434s4cg5oa6jao8','::1',1654915247,'__ci_last_regenerate|i:1654915165;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Data Updated\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `clase_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_numerico` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`clase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
INSERT INTO `clase` VALUES (1,'Inicial 3 Años','1',2),(3,'Inicial 4 Años','2',2),(6,'Inicial 5 Años','3',2);
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_rutina`
--

DROP TABLE IF EXISTS `clase_rutina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_rutina` (
  `clase_rutina_id` int(11) NOT NULL AUTO_INCREMENT,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `time_inicio` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `time_final` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`clase_rutina_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_rutina`
--

LOCK TABLES `clase_rutina` WRITE;
/*!40000 ALTER TABLE `clase_rutina` DISABLE KEYS */;
INSERT INTO `clase_rutina` VALUES (5,1,1,4,'9:00 AM','10:00 AM','martes','2022-2023');
/*!40000 ALTER TABLE `clase_rutina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `documento_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `titulo_nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `file_tipo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `asunto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`documento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuela`
--

DROP TABLE IF EXISTS `escuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escuela` (
  `escuela_syllabus_id` int(11) NOT NULL AUTO_INCREMENT,
  `escuela_syllabus_code` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `uploader_tipo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `file_nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `asunto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`escuela_syllabus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuela`
--

LOCK TABLES `escuela` WRITE;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
/*!40000 ALTER TABLE `escuela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `estudiante_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_code` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `cumpleanos` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `religion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `grupo_sanguineo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `email` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `password` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `padres_id` int(11) NOT NULL,
  `autenticacion_key` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`estudiante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'','Rodri','02/06/1980','','Católico','++','Mz C Lt 48 SMP','996234567','rodri@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',4,'');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `date` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `monto_pagado` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `deuda` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `creacion_timestamp` int(11) NOT NULL,
  `pago_timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `pago_metodo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `pago_detalle` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `status` longtext COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Pagado o no Pagado',
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`factura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,1,'Pago Mensual','Pago Junio',200,'200','0',1659762000,'','','','pagado','2022-2023');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos_categoria`
--

DROP TABLE IF EXISTS `gastos_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos_categoria` (
  `gastos_categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`gastos_categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos_categoria`
--

LOCK TABLES `gastos_categoria` WRITE;
/*!40000 ALTER TABLE `gastos_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `grado_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `grado_point` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscribirse`
--

DROP TABLE IF EXISTS `inscribirse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscribirse` (
  `inscribirse_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscribirse_code` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `date_added` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`inscribirse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscribirse`
--

LOCK TABLES `inscribirse` WRITE;
/*!40000 ALTER TABLE `inscribirse` DISABLE KEYS */;
INSERT INTO `inscribirse` VALUES (1,'b0999d7',1,1,4,1,'1654179684','2022-2023');
/*!40000 ALTER TABLE `inscribirse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portuguese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `french` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=731 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (393,'login','','','',''),(394,'forgot_your_password','','','',''),(395,'admin_dashboard','','','',''),(396,'running_session','','','',''),(397,'sms_settings','','','',''),(398,'system_settings','','','',''),(399,'dashboard','','','',''),(400,'student','','','',''),(401,'student_promotion','','','',''),(402,'parents','','','',''),(403,'teacher','','','',''),(404,'class','','','',''),(405,'manage_classes','','','',''),(406,'manage_sections','','','',''),(407,'teacher_suggestion','','','',''),(408,'subject','','','',''),(409,'class_routine','','','',''),(410,'daily_attendance','','','',''),(411,'daily_atendance','','','',''),(412,'attendance_report','','','',''),(413,'exam','','','',''),(414,'exam_list','','','',''),(415,'exam_grades','','','',''),(416,'manage_marks','','','',''),(417,'send_marks_by_sms','','','',''),(418,'tabulation_sheet','','','',''),(419,'library','','','',''),(420,'accounting','','','',''),(421,'create_student_payment','','','',''),(422,'student_payments','','','',''),(423,'expense','','','',''),(424,'expense_category','','','',''),(425,'noticeboard','','','',''),(426,'message','','','',''),(427,'settings','','','',''),(428,'general_settings','','','',''),(429,'language_settings','','','',''),(430,'my_profile','','','',''),(431,'delete','','','',''),(432,'cancel','','','',''),(433,'system_name','','','',''),(434,'system_title','','','',''),(435,'address','','','',''),(436,'phone','','','',''),(437,'paypal_email','','','',''),(438,'currency','','','',''),(439,'system_email','','','',''),(440,'select_running_session','','','',''),(441,'language','','','',''),(442,'save','','','',''),(443,'theme_settings','','','',''),(444,'update','','','',''),(445,'upload_logo','','','',''),(446,'photo','','','',''),(447,'upload','','','',''),(448,'earning_graph','','','',''),(449,'setting','','','',''),(450,'edit_profile','','','',''),(451,'profesor','','','',''),(452,'estudiante','','','',''),(453,'padres','','','',''),(454,'manage_profile','','','',''),(455,'name','','','',''),(456,'email','','','',''),(457,'update_profile','','','',''),(458,'change_password','','','',''),(459,'current_password','','','',''),(460,'value_required','','','',''),(461,'new_password','','','',''),(462,'confirm_new_password','','','',''),(463,'asistencia','','','',''),(464,'reset_password','','','',''),(465,'return_to_login_page','','','',''),(466,'data_updated','','','',''),(467,'theme_selected','','','',''),(468,'add_student','','','',''),(469,'Registar Estudiante','','','',''),(470,'INFORMACIÓN DE USUARIO','','','',''),(471,'CLASE','','','',''),(472,'add_estudiante','','','',''),(473,'transport','','','',''),(474,'dormitory','','','',''),(475,'student_information','','','',''),(476,'select_a_service','','','',''),(477,'not_selected','','','',''),(478,'disabled','','','',''),(479,'clickatell_username','','','',''),(480,'clickatell_password','','','',''),(481,'clickatell_api_id','','','',''),(482,'twilio_account','','','',''),(483,'authentication_token','','','',''),(484,'registered_phone_number','','','',''),(485,'manage_attendance_of_class','','','',''),(486,'select_class','','','',''),(487,'all_parents','','','',''),(488,'add_new_parent','','','',''),(489,'profession','','','',''),(490,'options','','','',''),(491,'add_teacher','','','',''),(492,'birthday','','','',''),(493,'gender','','','',''),(494,'select','','','',''),(495,'male','','','',''),(496,'female','','','',''),(497,'password','','','',''),(498,'manage_teacher','','','',''),(499,'add_new_teacher','','','',''),(500,'clase','','','',''),(501,'clase','','','',''),(502,'clase','','','',''),(503,'clase','','','',''),(504,'clase','','','',''),(505,'clase','','','',''),(506,'clase','','','',''),(507,'clase','','','',''),(508,'clase','','','',''),(509,'clase','','','',''),(510,'clase','','','',''),(511,'clase','','','',''),(512,'clase','','','',''),(513,'clase','','','',''),(514,'clase','','','',''),(515,'clase','','','',''),(516,'clase','','','',''),(517,'clase','','','',''),(518,'clase','','','',''),(519,'clase','','','',''),(520,'clase','','','',''),(521,'clase','','','',''),(522,'clase','','','',''),(523,'clase','','','',''),(524,'clase','','','',''),(525,'clase','','','',''),(526,'clase','','','',''),(527,'clase','','','',''),(528,'clase','','','',''),(529,'clase','','','',''),(530,'clase','','','',''),(531,'clase','','','',''),(532,'clase','','','',''),(533,'clase','','','',''),(534,'clase','','','',''),(535,'clase','','','',''),(536,'clase','','','',''),(537,'clase','','','',''),(538,'clase','','','',''),(539,'clase','','','',''),(540,'clase','','','',''),(541,'clase','','','',''),(542,'clase','','','',''),(543,'clase','','','',''),(544,'clase','','','',''),(545,'clase','','','',''),(546,'clase','','','',''),(547,'clase','','','',''),(548,'clase','','','',''),(549,'clase','','','',''),(550,'clase','','','',''),(551,'clase','','','',''),(552,'clase','','','',''),(553,'clase','','','',''),(554,'clase','','','',''),(555,'clase','','','',''),(556,'clase','','','',''),(557,'clase','','','',''),(558,'clase','','','',''),(559,'clase','','','',''),(560,'clase','','','',''),(561,'clase','','','',''),(562,'clase','','','',''),(563,'clase','','','',''),(564,'clase','','','',''),(565,'clase','','','',''),(566,'clase','','','',''),(567,'clase','','','',''),(568,'clase','','','',''),(569,'clase','','','',''),(570,'clase','','','',''),(571,'clase','','','',''),(572,'clase','','','',''),(573,'clase','','','',''),(574,'clase','','','',''),(575,'clase','','','',''),(576,'clase','','','',''),(577,'clase','','','',''),(578,'clase','','','',''),(579,'clase','','','',''),(580,'clase','','','',''),(581,'clase','','','',''),(582,'clase','','','',''),(583,'clase','','','',''),(584,'clase','','','',''),(585,'clase','','','',''),(586,'clase','','','',''),(587,'clase','','','',''),(588,'clase','','','',''),(589,'clase','','','',''),(590,'clase','','','',''),(591,'clase','','','',''),(592,'clase','','','',''),(593,'clase','','','',''),(594,'clase','','','',''),(595,'clase','','','',''),(596,'clase','','','',''),(597,'clase','','','',''),(598,'clase','','','',''),(599,'clase','','','',''),(600,'clase','','','',''),(601,'clase','','','',''),(602,'clase','','','',''),(603,'clase','','','',''),(604,'clase','','','',''),(605,'clase','','','',''),(606,'clase','','','',''),(607,'clase','','','',''),(608,'clase','','','',''),(609,'clase','','','',''),(610,'clase','','','',''),(611,'clase','','','',''),(612,'clase','','','',''),(613,'clase','','','',''),(614,'clase','','','',''),(615,'clase','','','',''),(616,'clase','','','',''),(617,'clase','','','',''),(618,'clase','','','',''),(619,'clase','','','',''),(620,'clase','','','',''),(621,'clase','','','',''),(622,'clase','','','',''),(623,'clase','','','',''),(624,'clase','','','',''),(625,'clase','','','',''),(626,'clase','','','',''),(627,'clase','','','',''),(628,'clase','','','',''),(629,'clase','','','',''),(630,'clase','','','',''),(631,'clase','','','',''),(632,'clase','','','',''),(633,'clase','','','',''),(634,'clase','','','',''),(635,'clase','','','',''),(636,'clase','','','',''),(637,'clase','','','',''),(638,'clase','','','',''),(639,'clase','','','',''),(640,'clase','','','',''),(641,'clase','','','',''),(642,'clase','','','',''),(643,'clase','','','',''),(644,'clase','','','',''),(645,'clase','','','',''),(646,'clase','','','',''),(647,'clase','','','',''),(648,'clase','','','',''),(649,'clase','','','',''),(650,'clase','','','',''),(651,'clase','','','',''),(652,'clase','','','',''),(653,'clase','','','',''),(654,'clase','','','',''),(655,'clase','','','',''),(656,'clase','','','',''),(657,'clase','','','',''),(658,'clase','','','',''),(659,'clase','','','',''),(660,'clase','','','',''),(661,'clase','','','',''),(662,'clase','','','',''),(663,'clase','','','',''),(664,'clase','','','',''),(665,'clase','','','',''),(666,'clase','','','',''),(667,'clase','','','',''),(668,'clase','','','',''),(669,'clase','','','',''),(670,'clase','','','',''),(671,'clase','','','',''),(672,'clase','','','',''),(673,'clase','','','',''),(674,'clase','','','',''),(675,'clase','','','',''),(676,'clase','','','',''),(677,'clase','','','',''),(678,'clase','','','',''),(679,'clase','','','',''),(680,'clase','','','',''),(681,'clase','','','',''),(682,'clase','','','',''),(683,'clase','','','',''),(684,'clase','','','',''),(685,'clase','','','',''),(686,'clase','','','',''),(687,'clase','','','',''),(688,'clase','','','',''),(689,'clase','','','',''),(690,'clase','','','',''),(691,'clase','','','',''),(692,'clase','','','',''),(693,'clase','','','',''),(694,'clase','','','',''),(695,'clase','','','',''),(696,'clase','','','',''),(697,'clase','','','',''),(698,'clase','','','',''),(699,'clase','','','',''),(700,'clase','','','',''),(701,'clase','','','',''),(702,'clase','','','',''),(703,'clase','','','',''),(704,'clase','','','',''),(705,'clase','','','',''),(706,'clase','','','',''),(707,'clase','','','',''),(708,'clase','','','',''),(709,'clase','','','',''),(710,'clase','','','',''),(711,'clase','','','',''),(712,'clase','','','',''),(713,'clase','','','',''),(714,'clase','','','',''),(715,'clase','','','',''),(716,'Datos Actualizados','','','',''),(717,'clase','','','',''),(718,'seccion','','','',''),(719,'clase','','','',''),(720,'clase','','','',''),(721,'clase','','','',''),(722,'clase','','','',''),(723,'clase','','','',''),(724,'clase','','','',''),(725,'clase','','','',''),(726,'clase','','','',''),(727,'Datos Añadidos Satisfactoriamente','','','',''),(728,'add_class_routine','','','',''),(729,'expenses','','','',''),(730,'cash','','','','');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `libro_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `autor` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `status` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `precio` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`libro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `mensaje_id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje_thread_code` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `remitente` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `leer_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 sin leer\r\n1 leído',
  PRIMARY KEY (`mensaje_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje_thread`
--

DROP TABLE IF EXISTS `mensaje_thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje_thread` (
  `mensaje_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje_thread_code` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `remitente` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `receptor` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `ultimo_mensaje_timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`mensaje_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje_thread`
--

LOCK TABLES `mensaje_thread` WRITE;
/*!40000 ALTER TABLE `mensaje_thread` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje_thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `asunto_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `nota_obtenida` int(11) NOT NULL DEFAULT 0,
  `nota_total` int(11) NOT NULL DEFAULT 100,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `padres_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `email` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `password` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `profesion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `autenticacion_key` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`padres_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES (4,'Diego','diego@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','996230445','Mz C Lt 48 SMP','Ing',''),(6,'Piero','piero@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','11111','mz2','Electr',''),(7,'Rodrigo','rodrigo@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','111','mz4','Albañil',''),(8,'Roberth','as@gmail.com','1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9','2323434','mz2','Electr','');
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `pago_id` int(11) NOT NULL AUTO_INCREMENT,
  `gastos_categoria_id` int(11) NOT NULL,
  `titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `pago_tipo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `factura_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `metodo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `monto` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','150','1659762000','2022-2023'),(2,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','50','1654837200','2022-2023');
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `profesor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `cumpleanos` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `religion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `grupo_sanguineo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `email` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `password` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `autenticacion_key` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`profesor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (2,'Omar Rodríguezss','02/12/1980','femenino','','','Mz C Lt 48 SMP','996234567','omar@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(3,'Daniela Tellos','02/06/1980','femenino','','','Corbeta 111','996234567','daniela@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(6,'Mirtha','02/01/2000','femenino','','','mz 2','996234567','mirthat@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `seccion_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `nick_nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`seccion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'A','',1,0),(2,'A','',2,0),(3,'A','',3,0),(4,'Personal Social','Ps',1,2),(5,'RM','RM',3,2),(6,'RV','RV',1,2),(7,'A','',4,0),(8,'A','',5,0),(9,'A','',6,0);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `description` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'system_name','Colegio Privado Santa María de Fátima'),(2,'system_title','IEP - SMF'),(3,'address','Corbeta Unión 1070 - SMP'),(4,'phone','(01) 5315975'),(5,'paypal_email','iepsmf@gmail.com'),(6,'currency','S/ '),(7,'system_email','admi@admin.com'),(11,'language','spanish'),(12,'borders_style','false'),(13,'clickatell_user',''),(14,'clickatell_password',''),(15,'clickatell_api_id',''),(16,'skin_colour','light'),(17,'twilio_account_sid',''),(18,'twilio_auth_token',''),(19,'twilio_sender_phone_number',''),(20,'active_sms_service','disabled'),(21,'running_year','2022-2023'),(22,'footer_text','@ 2022 Santa María de Fátima'),(23,'purchase_code',''),(24,'header_colour','header-dark'),(25,'sidebar_colour','sidebar-dark'),(26,'sidebar_size','sidebar-left-md');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (4,'Horario 3 Años',1,3,'2022-2023');
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-11 18:23:29
