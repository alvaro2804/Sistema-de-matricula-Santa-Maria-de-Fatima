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
INSERT INTO `admin` VALUES (1,'Admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997','1',''),(2,'Carlos Soplin','carlos.soplin@gmail.com','b15e526688d8d2b63b00c82adbacffd9828cf6fc','1',''),(3,'carlos','carlos.soplinj@gmail.com','admin2','1','');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
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
  `sesion` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
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
-- Table structure for table `asunto`
--

DROP TABLE IF EXISTS `asunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asunto` (
  `asunto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `clase_id` int(11) NOT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`asunto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asunto`
--

LOCK TABLES `asunto` WRITE;
/*!40000 ALTER TABLE `asunto` DISABLE KEYS */;
/*!40000 ALTER TABLE `asunto` ENABLE KEYS */;
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
INSERT INTO `ci_sessions` VALUES ('0iv09pg6altn9b25rcsqa021qght3csh','::1',1652643130,'__ci_last_regenerate|i:1652643130;'),('1eijg7khmcc2r03el92ujua36ln3ileh','::1',1652742141,'__ci_last_regenerate|i:1652742141;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('1lumgjnnksde2cnf9284ff66722gu6hn','::1',1652647187,'__ci_last_regenerate|i:1652647187;'),('1t6i6q7kqcvhb13o4no5d3r8gugggd53','::1',1652601809,'__ci_last_regenerate|i:1652601809;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('1th0pv1nodfpdk4p8pd36nl30tvj3ual','::1',1652595140,'__ci_last_regenerate|i:1652595140;'),('2c83llgrlo1r4744lt4k5kq72e7vm4ji','::1',1652590230,'__ci_last_regenerate|i:1652590003;'),('2jh3pnbtct43iqtnogp998sf66a95r9o','::1',1652585636,'__ci_last_regenerate|i:1652585636;'),('2q3duhndt35p1tsr5p6vr1pvpd7iu8mg','::1',1652741145,'__ci_last_regenerate|i:1652741145;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('3227r3t6mto0vf8i8i7001jim1pepp69','::1',1652598177,'__ci_last_regenerate|i:1652598177;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('37ocjlkv2foe2528tp7s8o6miu1h8ibj','::1',1652605566,'__ci_last_regenerate|i:1652605399;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('39chjeonembt2shvf9p9106s0o4mfiim','::1',1652589397,'__ci_last_regenerate|i:1652589397;'),('3d104eoaa2ujth5p2f3u389c3j7ijerr','::1',1652740191,'__ci_last_regenerate|i:1652740191;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:14:\"Theme Selected\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('3kjm400d5dor4cia8ojjj814gghfb7q7','::1',1652599142,'__ci_last_regenerate|i:1652599005;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('4530gei9clj3071c20t6d2u0btrfq5na','::1',1652639214,'__ci_last_regenerate|i:1652639214;'),('4e0ko1v9vqb18ig1duko8fndsmc658ve','::1',1652639927,'__ci_last_regenerate|i:1652639927;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('57573sg1pgh0l01n4g8h51fp4v0rp3g2','::1',1652604615,'__ci_last_regenerate|i:1652604615;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('5il9of6svokccg3v8kp21l60srb5q7fc','::1',1652600282,'__ci_last_regenerate|i:1652600282;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('73vnf6bdn2cmbp71ngde7qjrb8871ev1','::1',1652586781,'__ci_last_regenerate|i:1652586781;'),('7oiktk9e7gk9ts1hc1cjtan6sg5rg9ql','::1',1652605091,'__ci_last_regenerate|i:1652605091;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('7pcoua4djb0hhklk7v6865ide4q55ad9','::1',1652645076,'__ci_last_regenerate|i:1652645076;'),('7qqm143svlu7rmmek59pecjmq2714qc7','::1',1652738966,'__ci_last_regenerate|i:1652738966;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('837qoprgh4rocnm91gn2o994pfccmsrq','::1',1652597859,'__ci_last_regenerate|i:1652597859;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('85qcq4gdm1e535i6956p5g191ps6olp1','::1',1652745223,'__ci_last_regenerate|i:1652745223;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:14:\"Theme Selected\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('890abhga1rq8tg9dmfef3ufgl1vo6fsl','::1',1652600487,'__ci_last_regenerate|i:1652600282;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('8c8pug56p7qralod3hs5olvnnehq6q8o','::1',1652647585,'__ci_last_regenerate|i:1652647585;'),('8tuh2vvbk4vo0cgvq2f942m3958mvmkt','::1',1652599005,'__ci_last_regenerate|i:1652599005;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('8ve4ko4ahaibfcq2ml4s4ermqqi5e4tt','::1',1652642097,'__ci_last_regenerate|i:1652642097;'),('ata1qk8cnhh16v6pe9u38dauq60ucre8','::1',1652590003,'__ci_last_regenerate|i:1652590003;'),('atnlvagdgdcjh0o4brkbombp1ae35jnd','::1',1652644563,'__ci_last_regenerate|i:1652644563;'),('bf016814776rl0tpp75mq31hij35a6n7','::1',1652738489,'__ci_last_regenerate|i:1652738489;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('bmkoumvu2i50tpieltstlbjhkfv5p6gc','::1',1652603580,'__ci_last_regenerate|i:1652603580;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('botctj6n98mvrk63ttcjcfofedsgo83c','::1',1652645708,'__ci_last_regenerate|i:1652645708;'),('c5q2k48scg7d91dgdi0frv3bpohfih92','::1',1652582442,'__ci_last_regenerate|i:1652582442;'),('cgrjqv5fpn0svcv3662g53gbqn1rjch1','::1',1652644211,'__ci_last_regenerate|i:1652644211;'),('ds41biekh01poee1bs71hbrfnnn5elin','::1',1652642811,'__ci_last_regenerate|i:1652642811;'),('elgdhbufuns9eqh3odvdkfakloa76sur','::1',1652605399,'__ci_last_regenerate|i:1652605399;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('f0fqs52ld6fltq4dni08gj3dqv2pnmha','::1',1652586226,'__ci_last_regenerate|i:1652586226;'),('f75kuaahos95uhb03qj6rpjlf6cu6f03','::1',1652604043,'__ci_last_regenerate|i:1652604043;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('fbk7ueroeb5qhpah0fr2drebmkbc29fk','::1',1652584560,'__ci_last_regenerate|i:1652584560;'),('glhhsl0t89o9pior6k1th2v5ehqv2845','::1',1652597474,'__ci_last_regenerate|i:1652597474;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('hjt4elmo58i8rmtmueam6es2vgetbpt0','::1',1652595672,'__ci_last_regenerate|i:1652595672;'),('hkjseqo0bt6nq3c3gicoqu5kqp621uc1','::1',1652592989,'__ci_last_regenerate|i:1652592989;'),('joso5i20qebsa68aa3m3tc52cn0fucj0','::1',1652582442,'__ci_last_regenerate|i:1652582442;'),('k2dqnb2bsbktoaeol9em3dcrllch84jk','::1',1652596440,'__ci_last_regenerate|i:1652596440;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('kc4vi8drkbdh546moal7d5obdl24rqaa','::1',1652583021,'__ci_last_regenerate|i:1652583021;'),('kd6t1kabuna03qusqftvjjmv1geloirj','::1',1652744781,'__ci_last_regenerate|i:1652744781;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('kpcgm639ssp048dq05ta5ifr9806r9ue','::1',1652741703,'__ci_last_regenerate|i:1652741703;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('ku9tgb3gst8nrnfde6ob1254oa8fg7og','::1',1652588158,'__ci_last_regenerate|i:1652588158;'),('kug6rq4bfvgvnab4aa6p8gsavi7uko5i','::1',1652587504,'__ci_last_regenerate|i:1652587504;'),('lqe8gt71i82j6ds9uoduir0tb16run6g','::1',1652745223,'__ci_last_regenerate|i:1652745223;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:14:\"Theme Selected\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('ls4sl78lam2ndl1vv2rpnhnon79haqgb','::1',1652642398,'__ci_last_regenerate|i:1652642398;'),('lughbmkbbu856st70346ft70c3jceac3','::1',1652584221,'__ci_last_regenerate|i:1652584220;'),('nc6m5nugc0a24l80ldib254so6rkhp54','::1',1652739741,'__ci_last_regenerate|i:1652739741;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";flash_message|s:14:\"Theme Selected\";__ci_vars|a:1:{s:13:\"flash_message\";s:3:\"old\";}'),('nguu9mm88ld6b7e8ccrtjr5i445n0odh','::1',1652599953,'__ci_last_regenerate|i:1652599953;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('nq1trmfm3p61tj6l8naqqlv6sskcedl5','::1',1652580252,'__ci_last_regenerate|i:1652580252;'),('o8e2tc7o8sunnj6af535haqs9ms0mpvc','::1',1652587808,'__ci_last_regenerate|i:1652587808;'),('pnbr08norm8ucbm9l2ufnbdgsidlq5s5','::1',1652596088,'__ci_last_regenerate|i:1652596088;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('pq2n86adp3mb3aiihdjl69upgtb9pmvc','::1',1652579753,'__ci_last_regenerate|i:1652579753;'),('ptfr32geb5b3s4o8d59kcslrri3nf750','::1',1652578966,'__ci_last_regenerate|i:1652578966;'),('pu1k41p4n6dmjt9turoh6sjc6os7o31p','::1',1652596949,'__ci_last_regenerate|i:1652596949;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";nombre|N;login_type|s:5:\"admin\";'),('qkb1kq784um1tb11nu46nmf8r11dbs4u','::1',1652643639,'__ci_last_regenerate|i:1652643639;'),('rf5qjjnb6km1v2l1n6g6tagtcmssb45n','::1',1652640240,'__ci_last_regenerate|i:1652640240;'),('rp6e7drqveuj8dgostctddrm2mj68dgj','::1',1652740692,'__ci_last_regenerate|i:1652740692;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('s9nai1jn8gts63kutjdh2n57jdsofp0r','::1',1652647585,'__ci_last_regenerate|i:1652647585;'),('v69d8mempncqs9m9a0rji1khoedihkic','::1',1652656596,'__ci_last_regenerate|i:1652656588;'),('vo28ks9o4h40kig28bq5cmill4ljmsr8','::1',1652739432,'__ci_last_regenerate|i:1652739432;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";'),('vtba3co4nqa6p13ucptdmi9ic3f1ql1e','::1',1652602992,'__ci_last_regenerate|i:1652602992;admin_login|s:1:\"1\";admin_id|s:1:\"1\";login_user_id|s:1:\"1\";name|s:5:\"Admin\";login_type|s:5:\"admin\";');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
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
  `asunto_id` int(11) NOT NULL,
  `time_inicio` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `time_final` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`clase_rutina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_rutina`
--

LOCK TABLES `clase_rutina` WRITE;
/*!40000 ALTER TABLE `clase_rutina` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
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
  `vencer` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `creacion_timestamp` int(11) NOT NULL,
  `pago_timestamp` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `pago_metodo` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `pago_detalle` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `status` longtext COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Pagado o no Pagado',
  `year` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`factura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscribirse`
--

LOCK TABLES `inscribirse` WRITE;
/*!40000 ALTER TABLE `inscribirse` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=468 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (393,'login','','','',''),(394,'forgot_your_password','','','',''),(395,'admin_dashboard','','','',''),(396,'running_session','','','',''),(397,'sms_settings','','','',''),(398,'system_settings','','','',''),(399,'dashboard','','','',''),(400,'student','','','',''),(401,'student_promotion','','','',''),(402,'parents','','','',''),(403,'teacher','','','',''),(404,'class','','','',''),(405,'manage_classes','','','',''),(406,'manage_sections','','','',''),(407,'teacher_suggestion','','','',''),(408,'subject','','','',''),(409,'class_routine','','','',''),(410,'daily_attendance','','','',''),(411,'daily_atendance','','','',''),(412,'attendance_report','','','',''),(413,'exam','','','',''),(414,'exam_list','','','',''),(415,'exam_grades','','','',''),(416,'manage_marks','','','',''),(417,'send_marks_by_sms','','','',''),(418,'tabulation_sheet','','','',''),(419,'library','','','',''),(420,'accounting','','','',''),(421,'create_student_payment','','','',''),(422,'student_payments','','','',''),(423,'expense','','','',''),(424,'expense_category','','','',''),(425,'noticeboard','','','',''),(426,'message','','','',''),(427,'settings','','','',''),(428,'general_settings','','','',''),(429,'language_settings','','','',''),(430,'my_profile','','','',''),(431,'delete','','','',''),(432,'cancel','','','',''),(433,'system_name','','','',''),(434,'system_title','','','',''),(435,'address','','','',''),(436,'phone','','','',''),(437,'paypal_email','','','',''),(438,'currency','','','',''),(439,'system_email','','','',''),(440,'select_running_session','','','',''),(441,'language','','','',''),(442,'save','','','',''),(443,'theme_settings','','','',''),(444,'update','','','',''),(445,'upload_logo','','','',''),(446,'photo','','','',''),(447,'upload','','','',''),(448,'earning_graph','','','',''),(449,'setting','','','',''),(450,'edit_profile','','','',''),(451,'profesor','','','',''),(452,'estudiante','','','',''),(453,'padres','','','',''),(454,'manage_profile','','','',''),(455,'name','','','',''),(456,'email','','','',''),(457,'update_profile','','','',''),(458,'change_password','','','',''),(459,'current_password','','','',''),(460,'value_required','','','',''),(461,'new_password','','','',''),(462,'confirm_new_password','','','',''),(463,'asistencia','','','',''),(464,'reset_password','','','',''),(465,'return_to_login_page','','','',''),(466,'data_updated','','','',''),(467,'theme_selected','','','','');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
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
INSERT INTO `settings` VALUES (1,'system_name','Colegio Privado Santa María de Fátima'),(2,'system_title','IEP - SMF'),(3,'address','Corbeta Unión 1070 - SMP'),(4,'phone','(01) 5315975'),(5,'paypal_email','iepsmf@gmail.com'),(6,'currency','S/ '),(7,'system_email','admi@admin.com'),(11,'language','spanish'),(12,'borders_style','true'),(13,'clickatell_user',''),(14,'clickatell_password',''),(15,'clickatell_api_id',''),(16,'skin_colour','dark'),(17,'twilio_account_sid',''),(18,'twilio_auth_token',''),(19,'twilio_sender_phone_number',''),(20,'active_sms_service','disabled'),(21,'running_year','2022-2023'),(22,'footer_text','@ 2022 Santa María de Fátima - <strong>@Carlos Soplin</strong>'),(23,'purchase_code',''),(24,'header_colour','header-light'),(25,'sidebar_colour','sidebar-light'),(26,'sidebar_size','sidebar-left-sm');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-16 21:05:55
