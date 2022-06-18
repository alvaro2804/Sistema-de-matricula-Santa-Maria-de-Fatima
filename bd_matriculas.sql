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
  `level` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997','1',''),(2,'Carlos Soplin','carlos.soplin@gmail.com','cedcae5e358ddbfdc96e674f921b51781adaf38b','1',''),(3,'carlos','carlos.soplinj@gmail.com','admin2','1',''),(5,'Marcos Dávila','marcos@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','',''),(6,'Maria Matos','maria@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','1','');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,'1654552800','2022-2023',1,4,1,0,0),(2,'1654639200','2022-2023',1,4,1,0,1),(3,'1654466400','2022-2023',1,4,1,0,0),(4,'1654664400','2022-2023',1,4,1,0,1),(5,'1654578000','2022-2023',1,4,1,0,1),(6,'1655528400','2022-2023',1,1,2,0,1),(7,'1655442000','2022-2023',1,1,2,0,1),(8,'1655355600','2022-2023',1,1,2,0,1);
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
-- Table structure for table `biblioteca`
--

DROP TABLE IF EXISTS `biblioteca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblioteca` (
  `libro_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `autor` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `status` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  PRIMARY KEY (`libro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblioteca`
--

LOCK TABLES `biblioteca` WRITE;
/*!40000 ALTER TABLE `biblioteca` DISABLE KEYS */;
INSERT INTO `biblioteca` VALUES (2,'Libros de 3 Años','Libro Didáctico para 3 años','Editorial Navarrete',1,'disponible',300.00);
/*!40000 ALTER TABLE `biblioteca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion` (
  `calificacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `calificacion_obtenida` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `calificacion_total` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`calificacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` VALUES (2,1,4,1,4,2,'AD','','Nota','2022-2023'),(3,1,5,1,4,2,'A','','Referente a 17','2022-2023'),(4,1,4,1,4,3,'A','','Sobre 19','2022-2023'),(5,2,4,1,1,2,'AD','','Desde 19 - 20','2022-2023'),(6,2,5,1,1,2,'B','','Desde 10-15','2022-2023'),(7,2,4,1,1,3,'A','','','2022-2023');
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
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
INSERT INTO `ci_sessions` VALUES ('0aai7q1gkqcj4e9pi2eqjgvhkcgpbii6','::1',1655582367,'__ci_last_regenerate|i:1655582367;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:25:\"Calificación Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('0ktr4h8f26ekttbkc8idoaqetd351qcj','::1',1655572378,'__ci_last_regenerate|i:1655572378;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('0r2re47l1jtpdvk856jv401rarnj7920','::1',1655573891,'__ci_last_regenerate|i:1655573891;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('1c5du8c0hsvssho4vsjc0tqmj38710q7','::1',1655575379,'__ci_last_regenerate|i:1655575379;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('1j2rbl8ub2a412j0dsgjvjsb4rvbsssv','::1',1655530465,'__ci_last_regenerate|i:1655530465;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:34:\"Datos Añadidos Satisfactoriamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('244u5qk8inrfo4qfa65viifqalr01vdf','::1',1655575683,'__ci_last_regenerate|i:1655575683;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('2lb6rr2t7969c171768bofhanrc36rot','::1',1655572888,'__ci_last_regenerate|i:1655572888;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('38ro08ubf6brob4hfiiuom6506lojbnk','::1',1655579305,'__ci_last_regenerate|i:1655579305;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('391pgp4m4ivsolusukjil4ucia9pdk3m','::1',1655535333,'__ci_last_regenerate|i:1655535333;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('3b5ojae19vai95f0abs616387t75kfuf','::1',1655529470,'__ci_last_regenerate|i:1655529470;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('3dq01qe37dh2cdr6mr9fnarottpjf4ne','::1',1655528840,'__ci_last_regenerate|i:1655528840;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('3eamtksu0akges33g6obvn77o5ue24ug','::1',1655578964,'__ci_last_regenerate|i:1655578964;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('446gl41ttnvlqjg6q7lt0jos47asvfqr','::1',1655534963,'__ci_last_regenerate|i:1655534963;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('68f9ida3r9k0dl8n8cof9ho4gsj12tb6','::1',1655574427,'__ci_last_regenerate|i:1655574427;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('6d0qij9gpnvardf98r9iaethi1o6spdq','::1',1655580765,'__ci_last_regenerate|i:1655580765;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('75dueu16sv5acrveagl2jb059n3ph6d0','::1',1655573192,'__ci_last_regenerate|i:1655573192;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('7c17khaji7im2udntd5kmv6c3b4r42b9','::1',1655531090,'__ci_last_regenerate|i:1655531090;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('a3fdcid6muste05lka1iav2h4lh1a17r','::1',1655535884,'__ci_last_regenerate|i:1655535742;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ddi9km7bc0j100rqmolv2e2d91aumhf0','::1',1655580767,'__ci_last_regenerate|i:1655580765;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('e2iq0u4nbm5dhfql3t7vp8euofvfbsv4','::1',1655532971,'__ci_last_regenerate|i:1655532971;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ei8tmn68ft3i42ftk0sut380duatrres','::1',1655526873,'__ci_last_regenerate|i:1655526873;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('gh46ll6qen6gregp2068hht5k8qp3bg8','::1',1655528413,'__ci_last_regenerate|i:1655528413;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('h7e2vlph6trmfj31cq0j13297njp42g2','::1',1655528061,'__ci_last_regenerate|i:1655528061;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:23:\"Contraseña Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('hfui15nkrqgukqlajrf6jt9lhunrikhm','::1',1655576821,'__ci_last_regenerate|i:1655576821;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ho3m7qcqdhv1dt1vpmpbptpic1jb4s4a','::1',1655534646,'__ci_last_regenerate|i:1655534646;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('hs91lng0dpb1858c02ohq75513hiev84','::1',1655573588,'__ci_last_regenerate|i:1655573588;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ibjs206jp969qjdoulstc47agkqm7fm4','::1',1655532180,'__ci_last_regenerate|i:1655532180;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('iot1gd7vrist7q5uv6teihr62048u43q','::1',1655578015,'__ci_last_regenerate|i:1655578015;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Pago Exitoso\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('jrtvqfv97gsr5pdnr9dfq612dkbueu7l','::1',1655527547,'__ci_last_regenerate|i:1655527547;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('k9mbg4pmock3t1rrp2469i4lsf50vunk','::1',1655531396,'__ci_last_regenerate|i:1655531396;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('kfp7h9r1d0vt674rhlk4hfdb8s6tqioo','::1',1655534246,'__ci_last_regenerate|i:1655534246;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('m76jol7ddpm94nhki2suankt7de6jhnu','::1',1655529165,'__ci_last_regenerate|i:1655529165;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('nap1j116tlq24n931uj7h688c846lq3d','::1',1655533486,'__ci_last_regenerate|i:1655533486;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('nqrdpd6aa3n91411kpfdaf8qod6rh2ck','::1',1655533795,'__ci_last_regenerate|i:1655533795;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('o9a35ganc34rae4qdqurebv5abulfi1m','::1',1655527238,'__ci_last_regenerate|i:1655527238;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ofh97v1h0putfqs81ni739kkohptmvbh','::1',1655531827,'__ci_last_regenerate|i:1655531827;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('oqvib5rfsds6gm8etep068m7n6u0tqrj','::1',1655532525,'__ci_last_regenerate|i:1655532525;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('p95vo9lhi3qobq01i0smuhft00j1362b','::1',1655525837,'__ci_last_regenerate|i:1655525837;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('q3661g1am66ssgcfr69jrcbiqvm9ain6','::1',1655577272,'__ci_last_regenerate|i:1655577272;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:34:\"Datos Añadidos Satisfactoriamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('q4vdaa38cjk9il52iq9tq1c83m275rgs','::1',1655577596,'__ci_last_regenerate|i:1655577596;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:34:\"Datos Añadidos Satisfactoriamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('q73g4m4tqp74g176tvhaor68gq1lp644','::1',1655576427,'__ci_last_regenerate|i:1655576427;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('qcqaupiejq079k38p8447ut05aqumish','::1',1655530768,'__ci_last_regenerate|i:1655530768;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('qfre01vtmpn815c82qq7m27hlbok48na','::1',1655580455,'__ci_last_regenerate|i:1655580455;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('rlp3o57ncco05gqhkd32pe75nt351fnb','::1',1655581573,'__ci_last_regenerate|i:1655581573;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:25:\"Calificación Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('rsng5ehu7q6em3q9sokj3if3e4pttkps','::1',1655571638,'__ci_last_regenerate|i:1655571638;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('sllp7qtel2sst1h3epoeuui47p5tgub9','::1',1655529826,'__ci_last_regenerate|i:1655529826;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:16:\"Datos Eliminados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('t41h8k8cin6sk8vo0kmespcgbpb2lobp','::1',1655579994,'__ci_last_regenerate|i:1655579994;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('t4r3le0h954p2uu9se5j750j2qii2p26','::1',1655535742,'__ci_last_regenerate|i:1655535742;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('u87ivc9ajqh2ffgmqhcksqveccuen98a','::1',1655582775,'__ci_last_regenerate|i:1655582772;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:25:\"Calificación Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('u8u0jsoj7eqfsd7l3ub0jibau9pk216v','::1',1655574977,'__ci_last_regenerate|i:1655574977;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:19:\"Asistencia Guardada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('uahk1na30dd6nobp0r890priehdkgpu4','::1',1655582772,'__ci_last_regenerate|i:1655582772;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:25:\"Calificación Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('uqavldnkhph0s1nv8bp689ulppir6qig','::1',1655578474,'__ci_last_regenerate|i:1655578474;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:12:\"Pago Exitoso\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('v54nnplbllgul2frafdqcutc7koo8bjl','::1',1655579611,'__ci_last_regenerate|i:1655579611;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('vd3prtmejpnefbt8k1opds4jvcsbudbn','::1',1655571210,'__ci_last_regenerate|i:1655571210;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";flash_message|s:18:\"Datos Actualizados\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_rutina`
--

LOCK TABLES `clase_rutina` WRITE;
/*!40000 ALTER TABLE `clase_rutina` DISABLE KEYS */;
INSERT INTO `clase_rutina` VALUES (5,1,1,4,'9:00 AM','10:00 AM','lunes','2022-2023');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (2,'','Yarely Mendo','06/05/1990','femenino','Católico','++','Mz C Lt 48 SMP','996234567','yarely@gmail.com','5f6955d227a320c7f1f6c7da2a6d96a851a8118f',4,'');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examen` (
  `examen_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `date` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`examen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (2,'Examen Mensual I','06/15/2022','2022-2023','Ex. Mensual I'),(3,'Examen Bimestral I','06/16/2022','2022-2023','Ex. Bimestral I');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,2,'Pago Pension','Pago Pensión de Julio',250,'250','0',1655528400,'','','','pagado','2022-2023');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos_categoria`
--

LOCK TABLES `gastos_categoria` WRITE;
/*!40000 ALTER TABLE `gastos_categoria` DISABLE KEYS */;
INSERT INTO `gastos_categoria` VALUES (1,'Sueldo Profesor'),(2,'Sueldo de Personal Limpieza');
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
  `grado_punto` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `calificacion_desde` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `calificacion_hasta` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `comentario` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'3 Años','AD','C','AD','Calificaciones Inicial de 3 años');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscribirse`
--

LOCK TABLES `inscribirse` WRITE;
/*!40000 ALTER TABLE `inscribirse` DISABLE KEYS */;
INSERT INTO `inscribirse` VALUES (2,'3c59bce',2,1,1,2,'1655520508','2022-2023');
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
) ENGINE=MyISAM AUTO_INCREMENT=732 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (393,'login','','','',''),(394,'forgot_your_password','','','',''),(395,'admin_dashboard','','','',''),(396,'running_session','','','',''),(397,'sms_settings','','','',''),(398,'system_settings','','','',''),(399,'dashboard','','','',''),(400,'student','','','',''),(401,'student_promotion','','','',''),(402,'parents','','','',''),(403,'teacher','','','',''),(404,'class','','','',''),(405,'manage_classes','','','',''),(406,'manage_sections','','','',''),(407,'teacher_suggestion','','','',''),(408,'subject','','','',''),(409,'class_routine','','','',''),(410,'daily_attendance','','','',''),(411,'daily_atendance','','','',''),(412,'attendance_report','','','',''),(413,'exam','','','',''),(414,'exam_list','','','',''),(415,'exam_grades','','','',''),(416,'manage_marks','','','',''),(417,'send_marks_by_sms','','','',''),(418,'tabulation_sheet','','','',''),(419,'library','','','',''),(420,'accounting','','','',''),(421,'create_student_payment','','','',''),(422,'student_payments','','','',''),(423,'expense','','','',''),(424,'expense_category','','','',''),(425,'noticeboard','','','',''),(426,'message','','','',''),(427,'settings','','','',''),(428,'general_settings','','','',''),(429,'language_settings','','','',''),(430,'my_profile','','','',''),(431,'delete','','','',''),(432,'cancel','','','',''),(433,'system_name','','','',''),(434,'system_title','','','',''),(435,'address','','','',''),(436,'phone','','','',''),(437,'paypal_email','','','',''),(438,'currency','','','',''),(439,'system_email','','','',''),(440,'select_running_session','','','',''),(441,'language','','','',''),(442,'save','','','',''),(443,'theme_settings','','','',''),(444,'update','','','',''),(445,'upload_logo','','','',''),(446,'photo','','','',''),(447,'upload','','','',''),(448,'earning_graph','','','',''),(449,'setting','','','',''),(450,'edit_profile','','','',''),(451,'profesor','','','',''),(452,'estudiante','','','',''),(453,'padres','','','',''),(454,'manage_profile','','','',''),(455,'name','','','',''),(456,'email','','','',''),(457,'update_profile','','','',''),(458,'change_password','','','',''),(459,'current_password','','','',''),(460,'value_required','','','',''),(461,'new_password','','','',''),(462,'confirm_new_password','','','',''),(463,'asistencia','','','',''),(464,'reset_password','','','',''),(465,'return_to_login_page','','','',''),(466,'data_updated','','','',''),(467,'theme_selected','','','',''),(468,'add_student','','','',''),(469,'Registar Estudiante','','','',''),(470,'INFORMACIÓN DE USUARIO','','','',''),(471,'CLASE','','','',''),(472,'add_estudiante','','','',''),(473,'transport','','','',''),(474,'dormitory','','','',''),(475,'student_information','','','',''),(476,'select_a_service','','','',''),(477,'not_selected','','','',''),(478,'disabled','','','',''),(479,'clickatell_username','','','',''),(480,'clickatell_password','','','',''),(481,'clickatell_api_id','','','',''),(482,'twilio_account','','','',''),(483,'authentication_token','','','',''),(484,'registered_phone_number','','','',''),(485,'manage_attendance_of_class','','','',''),(486,'select_class','','','',''),(487,'all_parents','','','',''),(488,'add_new_parent','','','',''),(489,'profession','','','',''),(490,'options','','','',''),(491,'add_teacher','','','',''),(492,'birthday','','','',''),(493,'gender','','','',''),(494,'select','','','',''),(495,'male','','','',''),(496,'female','','','',''),(497,'password','','','',''),(498,'manage_teacher','','','',''),(499,'add_new_teacher','','','',''),(500,'clase','','','',''),(501,'clase','','','',''),(502,'clase','','','',''),(503,'clase','','','',''),(504,'clase','','','',''),(505,'clase','','','',''),(506,'clase','','','',''),(507,'clase','','','',''),(508,'clase','','','',''),(509,'clase','','','',''),(510,'clase','','','',''),(511,'clase','','','',''),(512,'clase','','','',''),(513,'clase','','','',''),(514,'clase','','','',''),(515,'clase','','','',''),(516,'clase','','','',''),(517,'clase','','','',''),(518,'clase','','','',''),(519,'clase','','','',''),(520,'clase','','','',''),(521,'clase','','','',''),(522,'clase','','','',''),(523,'clase','','','',''),(524,'clase','','','',''),(525,'clase','','','',''),(526,'clase','','','',''),(527,'clase','','','',''),(528,'clase','','','',''),(529,'clase','','','',''),(530,'clase','','','',''),(531,'clase','','','',''),(532,'clase','','','',''),(533,'clase','','','',''),(534,'clase','','','',''),(535,'clase','','','',''),(536,'clase','','','',''),(537,'clase','','','',''),(538,'clase','','','',''),(539,'clase','','','',''),(540,'clase','','','',''),(541,'clase','','','',''),(542,'clase','','','',''),(543,'clase','','','',''),(544,'clase','','','',''),(545,'clase','','','',''),(546,'clase','','','',''),(547,'clase','','','',''),(548,'clase','','','',''),(549,'clase','','','',''),(550,'clase','','','',''),(551,'clase','','','',''),(552,'clase','','','',''),(553,'clase','','','',''),(554,'clase','','','',''),(555,'clase','','','',''),(556,'clase','','','',''),(557,'clase','','','',''),(558,'clase','','','',''),(559,'clase','','','',''),(560,'clase','','','',''),(561,'clase','','','',''),(562,'clase','','','',''),(563,'clase','','','',''),(564,'clase','','','',''),(565,'clase','','','',''),(566,'clase','','','',''),(567,'clase','','','',''),(568,'clase','','','',''),(569,'clase','','','',''),(570,'clase','','','',''),(571,'clase','','','',''),(572,'clase','','','',''),(573,'clase','','','',''),(574,'clase','','','',''),(575,'clase','','','',''),(576,'clase','','','',''),(577,'clase','','','',''),(578,'clase','','','',''),(579,'clase','','','',''),(580,'clase','','','',''),(581,'clase','','','',''),(582,'clase','','','',''),(583,'clase','','','',''),(584,'clase','','','',''),(585,'clase','','','',''),(586,'clase','','','',''),(587,'clase','','','',''),(588,'clase','','','',''),(589,'clase','','','',''),(590,'clase','','','',''),(591,'clase','','','',''),(592,'clase','','','',''),(593,'clase','','','',''),(594,'clase','','','',''),(595,'clase','','','',''),(596,'clase','','','',''),(597,'clase','','','',''),(598,'clase','','','',''),(599,'clase','','','',''),(600,'clase','','','',''),(601,'clase','','','',''),(602,'clase','','','',''),(603,'clase','','','',''),(604,'clase','','','',''),(605,'clase','','','',''),(606,'clase','','','',''),(607,'clase','','','',''),(608,'clase','','','',''),(609,'clase','','','',''),(610,'clase','','','',''),(611,'clase','','','',''),(612,'clase','','','',''),(613,'clase','','','',''),(614,'clase','','','',''),(615,'clase','','','',''),(616,'clase','','','',''),(617,'clase','','','',''),(618,'clase','','','',''),(619,'clase','','','',''),(620,'clase','','','',''),(621,'clase','','','',''),(622,'clase','','','',''),(623,'clase','','','',''),(624,'clase','','','',''),(625,'clase','','','',''),(626,'clase','','','',''),(627,'clase','','','',''),(628,'clase','','','',''),(629,'clase','','','',''),(630,'clase','','','',''),(631,'clase','','','',''),(632,'clase','','','',''),(633,'clase','','','',''),(634,'clase','','','',''),(635,'clase','','','',''),(636,'clase','','','',''),(637,'clase','','','',''),(638,'clase','','','',''),(639,'clase','','','',''),(640,'clase','','','',''),(641,'clase','','','',''),(642,'clase','','','',''),(643,'clase','','','',''),(644,'clase','','','',''),(645,'clase','','','',''),(646,'clase','','','',''),(647,'clase','','','',''),(648,'clase','','','',''),(649,'clase','','','',''),(650,'clase','','','',''),(651,'clase','','','',''),(652,'clase','','','',''),(653,'clase','','','',''),(654,'clase','','','',''),(655,'clase','','','',''),(656,'clase','','','',''),(657,'clase','','','',''),(658,'clase','','','',''),(659,'clase','','','',''),(660,'clase','','','',''),(661,'clase','','','',''),(662,'clase','','','',''),(663,'clase','','','',''),(664,'clase','','','',''),(665,'clase','','','',''),(666,'clase','','','',''),(667,'clase','','','',''),(668,'clase','','','',''),(669,'clase','','','',''),(670,'clase','','','',''),(671,'clase','','','',''),(672,'clase','','','',''),(673,'clase','','','',''),(674,'clase','','','',''),(675,'clase','','','',''),(676,'clase','','','',''),(677,'clase','','','',''),(678,'clase','','','',''),(679,'clase','','','',''),(680,'clase','','','',''),(681,'clase','','','',''),(682,'clase','','','',''),(683,'clase','','','',''),(684,'clase','','','',''),(685,'clase','','','',''),(686,'clase','','','',''),(687,'clase','','','',''),(688,'clase','','','',''),(689,'clase','','','',''),(690,'clase','','','',''),(691,'clase','','','',''),(692,'clase','','','',''),(693,'clase','','','',''),(694,'clase','','','',''),(695,'clase','','','',''),(696,'clase','','','',''),(697,'clase','','','',''),(698,'clase','','','',''),(699,'clase','','','',''),(700,'clase','','','',''),(701,'clase','','','',''),(702,'clase','','','',''),(703,'clase','','','',''),(704,'clase','','','',''),(705,'clase','','','',''),(706,'clase','','','',''),(707,'clase','','','',''),(708,'clase','','','',''),(709,'clase','','','',''),(710,'clase','','','',''),(711,'clase','','','',''),(712,'clase','','','',''),(713,'clase','','','',''),(714,'clase','','','',''),(715,'clase','','','',''),(716,'Datos Actualizados','','','',''),(717,'clase','','','',''),(718,'seccion','','','',''),(719,'clase','','','',''),(720,'clase','','','',''),(721,'clase','','','',''),(722,'clase','','','',''),(723,'clase','','','',''),(724,'clase','','','',''),(725,'clase','','','',''),(726,'clase','','','',''),(727,'Datos Añadidos Satisfactoriamente','','','',''),(728,'add_class_routine','','','',''),(729,'expenses','','','',''),(730,'cash','','','',''),(731,'account_updated','','','','');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','150','1659762000','2022-2023'),(2,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','50','1654837200','2022-2023'),(3,1,'Sueldo del Profesor','gasto',0,0,'1','Pago Sueldo Omar','1500','1655169720','2022-2023'),(4,0,'Pago Pensión','ingreso',2,2,'1','Pago Pensión Julio','200','1655528400','2022-2023'),(5,0,'Pago Pensión','ingreso',2,2,'1','Pago Pensión Julio','50','1654491600','2022-2023');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'A','',1,0),(2,'A','',2,0),(3,'A','',3,0),(5,'RM','RM',3,2),(7,'A','',4,0),(8,'A','',5,0),(9,'A','',6,0),(10,'A','',7,0),(11,'B','B',1,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (4,'Computación',1,6,'2022-2023'),(5,'Personal Social',1,3,'2022-2023');
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

-- Dump completed on 2022-06-18 15:09:19
