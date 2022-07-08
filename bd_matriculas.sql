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
  `name` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
INSERT INTO `anuncio` VALUES (1,'Día del Campesino','Traer Vestimenta para el día del campesinos','1656478800',0),(2,'Próximo Feriado','Comprobar mensaje','1656478800',1),(10,'Presentación Sem15','Sem15','1657342800',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,'1654552800','2022-2023',1,4,1,0,0),(2,'1654639200','2022-2023',1,4,1,0,1),(3,'1654466400','2022-2023',1,4,1,0,0),(4,'1654664400','2022-2023',1,4,1,0,1),(5,'1654578000','2022-2023',1,4,1,0,1),(6,'1655528400','2022-2023',1,1,2,0,1),(7,'1655442000','2022-2023',1,1,2,0,1),(8,'1655355600','2022-2023',1,1,2,0,1),(9,'1655701200','2022-2023',1,1,2,0,0),(10,'1655701200','2022-2023',1,1,3,0,0),(11,'1655614800','2022-2023',1,1,2,0,1),(12,'1655614800','2022-2023',1,1,3,0,1),(13,'1656219600','2022-2023',1,1,2,0,0),(14,'1656219600','2022-2023',1,1,3,0,0),(15,'1656392400','2022-2023',1,1,2,0,0),(16,'1656392400','2022-2023',1,1,3,0,0),(17,'1656565200','2022-2023',1,1,2,0,0),(18,'1656565200','2022-2023',1,1,3,0,0),(19,'1657170000','2022-2023',1,1,2,0,1),(20,'1657170000','2022-2023',1,1,3,0,1),(21,'1657256400','2022-2023',1,1,2,0,0),(22,'1657256400','2022-2023',1,1,3,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` VALUES (2,1,4,1,4,2,'AD','','Nota','2022-2023'),(3,1,5,1,4,2,'A','','Referente a 17','2022-2023'),(4,1,4,1,4,3,'A','','Sobre 19','2022-2023'),(5,2,4,1,1,2,'C','','Desde 19 - 20','2022-2023'),(6,2,5,1,1,2,'B','','Desde 10-15','2022-2023'),(7,2,4,1,1,3,'A','','','2022-2023'),(8,2,7,1,1,2,'AD','','Sobre 20','2022-2023'),(9,3,7,1,1,2,'AD','','Sobre 20','2022-2023');
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
INSERT INTO `ci_sessions` VALUES ('06k6sp0d8l0l5oqglld11e1a2pt3h91o','::1',1657249908,'__ci_last_regenerate|i:1657249908;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('0mkkcrhvnr5um33kmgbasqr95r3e2gro','::1',1657262842,'__ci_last_regenerate|i:1657262573;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('1fus4bk8rhaue041nj3njmsk5u7gvb43','::1',1657257336,'__ci_last_regenerate|i:1657257336;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('32enr2dnnm62rpsr4i58s37r986is3ie','::1',1657249901,'__ci_last_regenerate|i:1657249901;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('4t2tg0a375hj96olpau07bhtl9s6iq60','::1',1657260604,'__ci_last_regenerate|i:1657260604;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('5kktgv29a7v9k25h7nm2estg8d0dmkne','::1',1657248994,'__ci_last_regenerate|i:1657248994;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('7e6n2hp1ec5l68co3bgt7hk4mfgp3don','::1',1657258939,'__ci_last_regenerate|i:1657258939;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('boo4guu97fh6g4dnjiarmbnmf019666c','::1',1657250296,'__ci_last_regenerate|i:1657250296;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('c1c8593pge1kg34gd3ojoh8grs2r5fd8','::1',1657250609,'__ci_last_regenerate|i:1657250609;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('c6p4opjtpa1fgmkt5g8gai7481ne79ph','::1',1657261964,'__ci_last_regenerate|i:1657261964;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('dsgj4t73lvavhkfjo6tm1llp3i9eid9i','::1',1657261777,'__ci_last_regenerate|i:1657261777;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('edvm1r9dlnb9sukiiuh0i5lj73h8paci','::1',1657262573,'__ci_last_regenerate|i:1657262573;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('esdgcekc9c0phqoej9segaqi3tajd5ll','::1',1657261087,'__ci_last_regenerate|i:1657261087;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('f4rn1420df1pgb31p2jo6rn85kmt7p95','::1',1657253612,'__ci_last_regenerate|i:1657253612;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('fv52pngcop3u4p5h1pihr2pej2hoag6b','::1',1657259168,'__ci_last_regenerate|i:1657258939;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('h0t11eb0l3ve4fdatcba1t9v3gqob23t','::1',1657257483,'__ci_last_regenerate|i:1657257336;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('h74kmuk1fovuc4g0qt34pvfv0svae140','::1',1657249441,'__ci_last_regenerate|i:1657249441;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('hah71ejpttv9qmd7dkp62l808pfop1d1','::1',1657254119,'__ci_last_regenerate|i:1657254119;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('hnb6h0g3sb5013usa8ulaqftk50t5c4l','::1',1657261443,'__ci_last_regenerate|i:1657261443;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('hssnfuq235rldt9re9nln4hhfnqpqcbu','::1',1657260763,'__ci_last_regenerate|i:1657260763;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('ivsu7d8ccjevqivrkol4pesqov3fambt','::1',1657257161,'__ci_last_regenerate|i:1657257161;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('js40r4lij6ss027d7qfu63a1c13jk4c1','::1',1657256571,'__ci_last_regenerate|i:1657256570;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('jvm485gtqcgf5grnco93rq90nf0q6p2f','::1',1657260238,'__ci_last_regenerate|i:1657260238;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('k70etd2tqejouc0f936est0l0u7mve2j','::1',1657262808,'__ci_last_regenerate|i:1657262808;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('kr9kfb1410aqf730hik5k01kj9dpdi66','::1',1657253541,'__ci_last_regenerate|i:1657253541;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('kubg4g61rj0cpafl7u9nsj1iqiqllkq3','::1',1657251760,'__ci_last_regenerate|i:1657251760;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('lnoec59q34serqol85sehbgci8jk0sni','::1',1657261397,'__ci_last_regenerate|i:1657261397;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('lpdt06sgealfq5gbs537gskm88m1iimi','::1',1657260972,'__ci_last_regenerate|i:1657260972;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('neev2720evnmpj7skmeofgl3ql8jdbhl','::1',1657254740,'__ci_last_regenerate|i:1657254740;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:32:\"Datos Actualizados Correctamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('o392hdanp8s42qsr3mqip7rb2j3ig7d1','::1',1657251014,'__ci_last_regenerate|i:1657251014;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('p1cs3kevk0gef3416igadnuk1vnccoav','::1',1657251525,'__ci_last_regenerate|i:1657251525;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('p4e795a4553li1jukultdkp2ckpmi85t','::1',1657254393,'__ci_last_regenerate|i:1657254393;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:32:\"Datos Actualizados Correctamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('pjaujntl591n67bklh0mfacd2vt2b99s','::1',1657260456,'__ci_last_regenerate|i:1657260456;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('pndi8vs0pmlil7jv6243tl1c5icnq4vm','::1',1657262477,'__ci_last_regenerate|i:1657262477;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('psqn9u261kfgc8imri22bpdpb35i9fou','::1',1657247605,'__ci_last_regenerate|i:1657247605;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:34:\"Datos Añadidos Satisfactoriamente\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('qb8kkfqch6lg08npfh8bijl7ut592jl6','::1',1657248826,'__ci_last_regenerate|i:1657248826;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('qg7vinmtb6bv6gui0irchvof9bkt0bns','::1',1657262254,'__ci_last_regenerate|i:1657262254;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('qo5qt20o889gumt1dsqpmi6it1a7f4j0','::1',1657251315,'__ci_last_regenerate|i:1657251315;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";'),('qqbcrs11uqdd6hl2150v0ghsab82p4rc','::1',1657247496,'__ci_last_regenerate|i:1657247496;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('rlkh0u95hu12f2icssnlduhv8lhpkccu','::1',1657256125,'__ci_last_regenerate|i:1657256125;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('sgopco2fqsld61j9ehjct8g95nb43401','::1',1657262960,'__ci_last_regenerate|i:1657262960;'),('t1kstscbso0rh4mjpd03jdms05a4s3hh','::1',1657249405,'__ci_last_regenerate|i:1657249405;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ui044sp9se5qekgc5b4qsgcebc13emlu','::1',1657248552,'__ci_last_regenerate|i:1657248552;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('v0gnf0j5icuv92ufk3cisedak22m9na2','::1',1657255457,'__ci_last_regenerate|i:1657255450;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('v1o2g3vjo2ea0g6qv81unraecmn1s8iq','::1',1657250593,'__ci_last_regenerate|i:1657250593;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";flash_message|s:15:\"Mensaje Enviado\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('vac2pd1epur8m51tc2ff69erb5u857ca','::1',1657256944,'__ci_last_regenerate|i:1657256944;estudiante_login|s:1:\"1\";estudiante_id|s:1:\"3\";login_user_id|s:1:\"3\";name|s:19:\"Gisella Figueroa J.\";login_type|s:10:\"estudiante\";'),('vo6iblo3r582g0qe69hvdgod4vo5ffll','::1',1657255186,'__ci_last_regenerate|i:1657255186;profesor_login|s:1:\"1\";profesor_id|s:1:\"2\";login_user_id|s:1:\"2\";name|s:17:\"Omar Rodríguezss\";login_type|s:8:\"profesor\";flash_message|s:23:\"Contraseña Actualizada\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_rutina`
--

LOCK TABLES `clase_rutina` WRITE;
/*!40000 ALTER TABLE `clase_rutina` DISABLE KEYS */;
INSERT INTO `clase_rutina` VALUES (5,1,1,4,'9:00 AM','10:00 AM','lunes','2022-2023'),(8,1,1,7,'8:00 AM','9:00 AM','jueves','2022-2023'),(9,1,1,7,'11:45 AM','2:00 PM','jueves','2022-2023');
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
  `tema_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`documento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,'Material-cambiado2','																											Prueba de Material-cambiado2																							','Borrador.docx','doc','1',0,'1657156920',4),(3,'Prueba','									Prueba3								','S14- Material.pdf','pdf','1',0,'1657243320',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (2,'','Yarely Mendo','06/05/1990','femenino','Católico','++','Mz C Lt 48 SMP','996234567','yarely@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',4,''),(3,'','Gisella Figueroa J.','02/05/1991','femenino','Católico','++','Mz C Lt 48 SMP','996234567','Gisella@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',10,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,2,'Pago Pension','Pago Pensión de Julio',250,'250','0',1655528400,'','','','pagado','2022-2023'),(3,3,'Pago Mensual Junio','Mensualidad',280,'280','0',1656824400,'','','','pagado','2022-2023'),(4,3,'Pagos Mensual Julio','Mensualidad',280,'200','80',1656824400,'','','','nopagado','2022-2023');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscribirse`
--

LOCK TABLES `inscribirse` WRITE;
/*!40000 ALTER TABLE `inscribirse` DISABLE KEYS */;
INSERT INTO `inscribirse` VALUES (2,'3c59bce',2,1,1,2,'1655520508','2022-2023'),(3,'90fa57a',3,1,1,2,'1655600587','2022-2023'),(4,'f961e22',2,3,0,0,'1656633480','2023-2024'),(5,'d88b1ed',3,3,0,0,'1656633480','2023-2024'),(6,'fdea108',2,1,0,0,'1656725405','2024-2025'),(7,'7406f65',3,1,0,0,'1656725405','2024-2025');
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
) ENGINE=MyISAM AUTO_INCREMENT=748 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (732,'login','','','',''),(393,'login','','','',''),(394,'forgot_your_password','','','',''),(395,'admin_dashboard','','','',''),(396,'running_session','','','',''),(397,'sms_settings','','','',''),(398,'system_settings','','','',''),(399,'dashboard','','','',''),(400,'student','','','',''),(401,'student_promotion','','','',''),(402,'parents','','','',''),(403,'teacher','','','',''),(404,'class','','','',''),(405,'manage_classes','','','',''),(406,'manage_sections','','','',''),(407,'teacher_suggestion','','','',''),(408,'subject','','','',''),(409,'class_routine','','','',''),(410,'daily_attendance','','','',''),(411,'daily_atendance','','','',''),(412,'attendance_report','','','',''),(413,'exam','','','',''),(414,'exam_list','','','',''),(415,'exam_grades','','','',''),(416,'manage_marks','','','',''),(417,'send_marks_by_sms','','','',''),(418,'tabulation_sheet','','','',''),(419,'library','','','',''),(420,'accounting','','','',''),(421,'create_student_payment','','','',''),(422,'student_payments','','','',''),(423,'expense','','','',''),(424,'expense_category','','','',''),(425,'noticeboard','','','',''),(426,'message','','','',''),(427,'settings','','','',''),(428,'general_settings','','','',''),(429,'language_settings','','','',''),(430,'my_profile','','','',''),(431,'delete','','','',''),(432,'cancel','','','',''),(433,'system_name','','','',''),(434,'system_title','','','',''),(435,'address','','','',''),(436,'phone','','','',''),(437,'paypal_email','','','',''),(438,'currency','','','',''),(439,'system_email','','','',''),(440,'select_running_session','','','',''),(441,'language','','','',''),(442,'save','','','',''),(443,'theme_settings','','','',''),(444,'update','','','',''),(445,'upload_logo','','','',''),(446,'photo','','','',''),(447,'upload','','','',''),(448,'earning_graph','','','',''),(449,'setting','','','',''),(450,'edit_profile','','','',''),(451,'profesor','','','',''),(452,'estudiante','','','',''),(453,'padres','','','',''),(454,'manage_profile','','','',''),(455,'name','','','',''),(456,'email','','','',''),(457,'update_profile','','','',''),(458,'change_password','','','',''),(459,'current_password','','','',''),(460,'value_required','','','',''),(461,'new_password','','','',''),(462,'confirm_new_password','','','',''),(463,'asistencia','','','',''),(464,'reset_password','','','',''),(465,'return_to_login_page','','','',''),(466,'data_updated','','','',''),(467,'theme_selected','','','',''),(468,'add_student','','','',''),(469,'Registar Estudiante','','','',''),(470,'INFORMACIÓN DE USUARIO','','','',''),(471,'CLASE','','','',''),(472,'add_estudiante','','','',''),(473,'transport','','','',''),(474,'dormitory','','','',''),(475,'student_information','','','',''),(476,'select_a_service','','','',''),(477,'not_selected','','','',''),(478,'disabled','','','',''),(479,'clickatell_username','','','',''),(480,'clickatell_password','','','',''),(481,'clickatell_api_id','','','',''),(482,'twilio_account','','','',''),(483,'authentication_token','','','',''),(484,'registered_phone_number','','','',''),(485,'manage_attendance_of_class','','','',''),(486,'select_class','','','',''),(487,'all_parents','','','',''),(488,'add_new_parent','','','',''),(489,'profession','','','',''),(490,'options','','','',''),(491,'add_teacher','','','',''),(492,'birthday','','','',''),(493,'gender','','','',''),(494,'select','','','',''),(495,'male','','','',''),(496,'female','','','',''),(497,'password','','','',''),(498,'manage_teacher','','','',''),(499,'add_new_teacher','','','',''),(500,'clase','','','',''),(501,'clase','','','',''),(502,'clase','','','',''),(503,'clase','','','',''),(504,'clase','','','',''),(505,'clase','','','',''),(506,'clase','','','',''),(507,'clase','','','',''),(508,'clase','','','',''),(509,'clase','','','',''),(510,'clase','','','',''),(511,'clase','','','',''),(512,'clase','','','',''),(513,'clase','','','',''),(514,'clase','','','',''),(515,'clase','','','',''),(516,'clase','','','',''),(517,'clase','','','',''),(518,'clase','','','',''),(519,'clase','','','',''),(520,'clase','','','',''),(521,'clase','','','',''),(522,'clase','','','',''),(523,'clase','','','',''),(524,'clase','','','',''),(525,'clase','','','',''),(526,'clase','','','',''),(527,'clase','','','',''),(528,'clase','','','',''),(529,'clase','','','',''),(530,'clase','','','',''),(531,'clase','','','',''),(532,'clase','','','',''),(533,'clase','','','',''),(534,'clase','','','',''),(535,'clase','','','',''),(536,'clase','','','',''),(537,'clase','','','',''),(538,'clase','','','',''),(539,'clase','','','',''),(540,'clase','','','',''),(541,'clase','','','',''),(542,'clase','','','',''),(543,'clase','','','',''),(544,'clase','','','',''),(545,'clase','','','',''),(546,'clase','','','',''),(547,'clase','','','',''),(548,'clase','','','',''),(549,'clase','','','',''),(550,'clase','','','',''),(551,'clase','','','',''),(552,'clase','','','',''),(553,'clase','','','',''),(554,'clase','','','',''),(555,'clase','','','',''),(556,'clase','','','',''),(557,'clase','','','',''),(558,'clase','','','',''),(559,'clase','','','',''),(560,'clase','','','',''),(561,'clase','','','',''),(562,'clase','','','',''),(563,'clase','','','',''),(564,'clase','','','',''),(565,'clase','','','',''),(566,'clase','','','',''),(567,'clase','','','',''),(568,'clase','','','',''),(569,'clase','','','',''),(570,'clase','','','',''),(571,'clase','','','',''),(572,'clase','','','',''),(573,'clase','','','',''),(574,'clase','','','',''),(575,'clase','','','',''),(576,'clase','','','',''),(577,'clase','','','',''),(578,'clase','','','',''),(579,'clase','','','',''),(580,'clase','','','',''),(581,'clase','','','',''),(582,'clase','','','',''),(583,'clase','','','',''),(584,'clase','','','',''),(585,'clase','','','',''),(586,'clase','','','',''),(587,'clase','','','',''),(588,'clase','','','',''),(589,'clase','','','',''),(590,'clase','','','',''),(591,'clase','','','',''),(592,'clase','','','',''),(593,'clase','','','',''),(594,'clase','','','',''),(595,'clase','','','',''),(596,'clase','','','',''),(597,'clase','','','',''),(598,'clase','','','',''),(599,'clase','','','',''),(600,'clase','','','',''),(601,'clase','','','',''),(602,'clase','','','',''),(603,'clase','','','',''),(604,'clase','','','',''),(605,'clase','','','',''),(606,'clase','','','',''),(607,'clase','','','',''),(608,'clase','','','',''),(609,'clase','','','',''),(610,'clase','','','',''),(611,'clase','','','',''),(612,'clase','','','',''),(613,'clase','','','',''),(614,'clase','','','',''),(615,'clase','','','',''),(616,'clase','','','',''),(617,'clase','','','',''),(618,'clase','','','',''),(619,'clase','','','',''),(620,'clase','','','',''),(621,'clase','','','',''),(622,'clase','','','',''),(623,'clase','','','',''),(624,'clase','','','',''),(625,'clase','','','',''),(626,'clase','','','',''),(627,'clase','','','',''),(628,'clase','','','',''),(629,'clase','','','',''),(630,'clase','','','',''),(631,'clase','','','',''),(632,'clase','','','',''),(633,'clase','','','',''),(634,'clase','','','',''),(635,'clase','','','',''),(636,'clase','','','',''),(637,'clase','','','',''),(638,'clase','','','',''),(639,'clase','','','',''),(640,'clase','','','',''),(641,'clase','','','',''),(642,'clase','','','',''),(643,'clase','','','',''),(644,'clase','','','',''),(645,'clase','','','',''),(646,'clase','','','',''),(647,'clase','','','',''),(648,'clase','','','',''),(649,'clase','','','',''),(650,'clase','','','',''),(651,'clase','','','',''),(652,'clase','','','',''),(653,'clase','','','',''),(654,'clase','','','',''),(655,'clase','','','',''),(656,'clase','','','',''),(657,'clase','','','',''),(658,'clase','','','',''),(659,'clase','','','',''),(660,'clase','','','',''),(661,'clase','','','',''),(662,'clase','','','',''),(663,'clase','','','',''),(664,'clase','','','',''),(665,'clase','','','',''),(666,'clase','','','',''),(667,'clase','','','',''),(668,'clase','','','',''),(669,'clase','','','',''),(670,'clase','','','',''),(671,'clase','','','',''),(672,'clase','','','',''),(673,'clase','','','',''),(674,'clase','','','',''),(675,'clase','','','',''),(676,'clase','','','',''),(677,'clase','','','',''),(678,'clase','','','',''),(679,'clase','','','',''),(680,'clase','','','',''),(681,'clase','','','',''),(682,'clase','','','',''),(683,'clase','','','',''),(684,'clase','','','',''),(685,'clase','','','',''),(686,'clase','','','',''),(687,'clase','','','',''),(688,'clase','','','',''),(689,'clase','','','',''),(690,'clase','','','',''),(691,'clase','','','',''),(692,'clase','','','',''),(693,'clase','','','',''),(694,'clase','','','',''),(695,'clase','','','',''),(696,'clase','','','',''),(697,'clase','','','',''),(698,'clase','','','',''),(699,'clase','','','',''),(700,'clase','','','',''),(701,'clase','','','',''),(702,'clase','','','',''),(703,'clase','','','',''),(704,'clase','','','',''),(705,'clase','','','',''),(706,'clase','','','',''),(707,'clase','','','',''),(708,'clase','','','',''),(709,'clase','','','',''),(710,'clase','','','',''),(711,'clase','','','',''),(712,'clase','','','',''),(713,'clase','','','',''),(714,'clase','','','',''),(715,'clase','','','',''),(716,'Datos Actualizados','','','',''),(717,'clase','','','',''),(718,'seccion','','','',''),(719,'clase','','','',''),(720,'clase','','','',''),(721,'clase','','','',''),(722,'clase','','','',''),(723,'clase','','','',''),(724,'clase','','','',''),(725,'clase','','','',''),(726,'clase','','','',''),(727,'Datos Añadidos Satisfactoriamente','','','',''),(728,'add_class_routine','','','',''),(729,'expenses','','','',''),(730,'cash','','','',''),(731,'account_updated','','','',''),(733,'section','','','',''),(734,'session_changed','','','',''),(735,'date','','','',''),(736,'select_date','','','',''),(737,'title','','','',''),(738,'description','','','',''),(739,'select_class_first','','','',''),(740,'file_type','','','',''),(741,'select_file_type','','','',''),(742,'image','','','',''),(743,'doc','','','',''),(744,'pdf','','','',''),(745,'excel','','','',''),(746,'other','','','',''),(747,'upload_teacher_suggestion','','','','');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
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
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `leer_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 sin leer\r\n1 leído',
  PRIMARY KEY (`mensaje_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
INSERT INTO `mensaje` VALUES (1,'4dbe62a63f67a65','Mensaje de Prueba','admin-1','1655997935',1),(2,'4dbe62a63f67a65','mensaje de respuesta de Gisella a Admin','estudiante-3','1656905448',1),(3,'4dbe62a63f67a65','el siguiente mensaje es de prueba de estudiante gise a admin','estudiante-3','1656906033',1),(4,'4dbe62a63f67a65','El mensaje de Prueba para Gise desde Admin','admin-1','1656906082',1),(5,'4dbe62a63f67a65','Segundo mensaje de prueba desde Admin hacia estudiante gise','admin-1','1656906143',1),(6,'4dbe62a63f67a65','Tercer mensaje de prueba para ver activo en el header','admin-1','1656906311',1),(7,'4dbe62a63f67a65','respuesta para admin, para visualizar en el header','estudiante-3','1656907596',1),(8,'4dbe62a63f67a65','Mensaje para ver satisfacción sin errores del mensake','admin-1','1656908257',1),(9,'4dbe62a63f67a65','prueba','estudiante-3','1656908520',1),(10,'4dbe62a63f67a65','prueba','admin-1','1656908577',1),(11,'d11afc5726ba361','Prueba de mensaje al profesor','admin-1','1657247594',1),(12,'d11afc5726ba361','Prueba de mensaje al profesor','admin-1','1657247596',1),(13,'d11afc5726ba361','Mensaje de respuesta al profesor','profesor-2','1657247654',1),(14,'d11afc5726ba361','mensaje de prueba al admin desde el profe','profesor-2','1657247702',1),(15,'8c4819cf766997e','Mensaje desde profesor hacia alumna','profesor-2','1657248697',1),(16,'8c4819cf766997e','Prueba de mensaje de Alumno hacia profesor','estudiante-3','1657249056',1),(17,'d11afc5726ba361','Mensaje desde Profesor hacia admin','profesor-2','1657249429',1),(18,'d11afc5726ba361','Mensaje desde profesor hacia admin','profesor-2','1657249944',1),(19,'d11afc5726ba361','Mensaje desde profesor hacia admin 3','profesor-2','1657250012',1),(20,'d11afc5726ba361','Prueba desde Profesor hacia admin 4','profesor-2','1657250628',1),(21,'4dbe62a63f67a65','Mensaje desde Admin hacia Gisela alumna','admin-1','1657250770',1),(22,'d11afc5726ba361','Mensaje desde Admin hacia Profesor omar','admin-1','1657250792',1),(23,'d11afc5726ba361','Mensaje desde profesor omar hacia admin','profesor-2','1657250841',1),(24,'8c4819cf766997e','Mensaje desde profesor omar hacia Alumna Gisella','profesor-2','1657250862',1),(25,'8c4819cf766997e','Mensaje desde alumna Gisela para profesor omar','estudiante-3','1657250930',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje_thread`
--

LOCK TABLES `mensaje_thread` WRITE;
/*!40000 ALTER TABLE `mensaje_thread` DISABLE KEYS */;
INSERT INTO `mensaje_thread` VALUES (1,'4dbe62a63f67a65','admin-1','estudiante-3',''),(2,'d11afc5726ba361','admin-1','profesor-2',''),(3,'8c4819cf766997e','profesor-2','estudiante-3','');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES (4,'Diego','diego@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','996230445','Mz C Lt 48 SMP','Ing',''),(6,'Piero','piero@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','11111','mz2','Electr',''),(7,'Rodrigo','rodrigo@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','111','mz4','Albañil',''),(8,'Roberth','as@gmail.com','1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9','2323434','mz2','Electr',''),(10,'Matos Piero','matos@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','996234567','Mz C Lt 48 SMP','Ing','');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','150','1659762000','2022-2023'),(2,0,'Pago Mensual','ingreso',1,1,'1','Pago Junio','50','1654837200','2022-2023'),(3,1,'Sueldo del Profesor Omar','gasto',0,0,'1','Pago Sueldo Omar','1500','1655169720','2022-2023'),(4,0,'Pago Pensión','ingreso',2,2,'1','Pago Pensión Julio','200','1655528400','2022-2023'),(5,0,'Pago Pensión','ingreso',2,2,'1','Pago Pensión Julio','50','1654491600','2022-2023'),(6,0,'Pago Mensual Junio','ingreso',3,3,'1','Mensualidad','280','1656824400','2022-2023'),(7,0,'Pagos Mensual Julio','ingreso',4,3,'3','Mensualidad','200','1656824400','2022-2023');
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_estudio`
--

DROP TABLE IF EXISTS `plan_estudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_estudio` (
  `plan_estudio_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_estudio_cod` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `usuario_tipo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `file_name` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `tema_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`plan_estudio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_estudio`
--

LOCK TABLES `plan_estudio` WRITE;
/*!40000 ALTER TABLE `plan_estudio` DISABLE KEYS */;
INSERT INTO `plan_estudio` VALUES (2,'4309134','Plan de Estudio 3 Años','syllabus 3 años - Comp',1,'admin',1,'2022-2023','1656347144','tcon479.pdf',4),(6,'0eb1b10','prueba','prueba',1,'admin',1,'2022-2023','1656348828','marco.pdf',4);
/*!40000 ALTER TABLE `plan_estudio` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (2,'Omar Rodríguezss','03/04/1981','masculino','','','Corbeta','999999999','omar@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(3,'Daniela Tellos','02/06/1980','femenino','','','Corbeta 111','996234567','daniela@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(6,'Mirtha','02/01/2000','femenino','','','mz 2','996234567','mirthat@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',''),(8,'Abrahan Carrillo','05/27/1980','masculino','','','Mz C Lt 48 SMP','996234567','abrahan@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','');
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
INSERT INTO `seccion` VALUES (1,'A','A',1,8),(2,'A','',2,0),(3,'A','',3,0),(5,'RM','RM',3,2),(7,'A','',4,0),(8,'A','',5,0),(9,'A','',6,0),(10,'A','',7,0),(11,'B','B',1,6);
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
INSERT INTO `settings` VALUES (1,'system_name','Colegio Privado Santa María de Fátima'),(2,'system_title','IEP - SMF'),(3,'address','Corbeta Unión 1070 - SMP'),(4,'phone','(01) 5315975'),(5,'paypal_email','iepsmf@gmail.com'),(6,'currency','S/ '),(7,'system_email','admi@admin.com'),(11,'language','spanish'),(12,'borders_style','false'),(13,'clickatell_user',''),(14,'clickatell_password',''),(15,'clickatell_api_id',''),(16,'skin_colour','light'),(17,'twilio_account_sid',''),(18,'twilio_auth_token',''),(19,'twilio_sender_phone_number',''),(20,'active_sms_service','disabled'),(21,'running_year','2022-2023'),(22,'footer_text','@ 2022 Santa María de Fátima'),(23,'purchase_code',''),(24,'header_colour','header-dark'),(25,'sidebar_colour','sidebar-dark'),(26,'sidebar_size','sidebar-left-sm');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (4,'Computación',1,6,'2022-2023'),(5,'Personal Social',1,3,'2022-2023'),(7,'Razon. Matemático',1,8,'2022-2023'),(8,'Computación',3,6,'2022-2023');
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

-- Dump completed on 2022-07-08  1:52:05
