-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: edocument
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `_menu`
--

DROP TABLE IF EXISTS `_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `mparent` int(3) NOT NULL DEFAULT '0',
  `mname` varchar(30) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `url` varchar(100) DEFAULT '/',
  `icon` varchar(100) DEFAULT 'fa fa-circle',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_menu`
--

LOCK TABLES `_menu` WRITE;
/*!40000 ALTER TABLE `_menu` DISABLE KEYS */;
INSERT INTO `_menu` VALUES (2,1,'Admin','1','/','fa fa-circle'),(3,2,'Departemen','1','?url=admin/departemen','fa fa-circle'),(4,2,'Kategori Dokumen','1','?url=admin/kategoridokumen','fa fa-circle'),(5,1,'Kepegawaian','1','/','fa fa-circle'),(6,1,'Tata Usaha','1','/','fa fa-circle'),(7,6,'Surat Masuk','1','?url=tu/suratmasuk','fa fa-circle'),(8,6,'Surat Keluar','1','?url=tu/suratkeluar','fa fa-circle'),(9,7,'Lap Surat Masuk','1','/','fa fa-circle'),(11,2,'User','1','?url=admin/user','fa fa-circle'),(12,2,'Menu','0','?url=admin/menu','fa fa-circle');
/*!40000 ALTER TABLE `_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_menugroup`
--

DROP TABLE IF EXISTS `_menugroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_menugroup` (
  `idgroup` int(3) NOT NULL,
  `idmenu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_menugroup`
--

LOCK TABLES `_menugroup` WRITE;
/*!40000 ALTER TABLE `_menugroup` DISABLE KEYS */;
INSERT INTO `_menugroup` VALUES (1,2),(1,4),(1,5),(1,6),(1,7),(1,3),(1,11),(1,8),(1,12);
/*!40000 ALTER TABLE `_menugroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_spool`
--

DROP TABLE IF EXISTS `_spool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_spool` (
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `etime` datetime DEFAULT NULL,
  `procname` varchar(10) NOT NULL,
  `status` enum('0','1','2','3') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_spool`
--

LOCK TABLES `_spool` WRITE;
/*!40000 ALTER TABLE `_spool` DISABLE KEYS */;
INSERT INTO `_spool` VALUES ('2017-04-02 16:40:32',NULL,'email','0'),('2017-04-02 16:40:54',NULL,'email','0'),('2017-04-02 16:40:55',NULL,'email','0'),('2017-04-02 16:40:56',NULL,'email','0'),('2017-04-02 16:40:56',NULL,'email','0'),('2017-04-02 16:47:15',NULL,'email','0'),('2017-04-02 16:47:29',NULL,'email','0');
/*!40000 ALTER TABLE `_spool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departemen` (
  `iddepartemen` int(11) NOT NULL AUTO_INCREMENT,
  `idparent` int(11) DEFAULT '0',
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`iddepartemen`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departemen`
--

LOCK TABLES `departemen` WRITE;
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` VALUES (1,NULL,'IT'),(2,NULL,'Rektor'),(3,NULL,'Tata Usaha'),(4,NULL,'Keuangan'),(5,1,'Rektor'),(6,1,'Keuangan'),(8,0,'Kesenian');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokumen`
--

DROP TABLE IF EXISTS `dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokumen` (
  `iddoc` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `kategori` int(11) NOT NULL DEFAULT '0',
  `nodoc` varchar(20) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `tglkirim` date DEFAULT NULL,
  `jamkirim` time DEFAULT NULL,
  `tglterima` date DEFAULT NULL,
  `jamterima` time DEFAULT NULL,
  `data1` varchar(100) DEFAULT NULL,
  `data2` varchar(100) DEFAULT NULL,
  `data3` varchar(100) DEFAULT NULL,
  `data4` varchar(100) DEFAULT NULL,
  `data5` varchar(100) DEFAULT NULL,
  `data6` varchar(100) DEFAULT NULL,
  `data7` varchar(100) DEFAULT NULL,
  `data8` varchar(100) DEFAULT NULL,
  `data9` varchar(100) DEFAULT NULL,
  `data10` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumen`
--

LOCK TABLES `dokumen` WRITE;
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` VALUES (1,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(3,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(4,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(5,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(6,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(7,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(8,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(9,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(10,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk','test','','','0',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(11,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(12,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(13,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(14,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(15,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(16,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(17,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(18,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(19,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(20,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(21,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(22,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(23,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(24,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(25,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(26,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(27,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(28,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(29,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(30,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(31,'2017-04-12','00:12:18',2,'2017/04/10/DOC/IN','Test Surat Masuk',NULL,NULL,NULL,'x',NULL,NULL,NULL,NULL,'','','','','','','','','',''),(32,'2017-07-09','07:07:28',2,'IB/212/2017/VII','Pendadaran Tahunan','Pengumuman','Rektor','Civitas Akademika','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `idjabatan` int(11) NOT NULL AUTO_INCREMENT,
  `iddepartemen` int(11) NOT NULL,
  `namajabatan` varchar(50) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idjabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,1,'IT Head','Kepala Departemen IT'),(2,2,'Ketua Rektor','Ketua Rektor Kampus'),(3,2,'Wakil Rektor 1','Wakil Rektor 1 Kampus'),(4,2,'Wakil Rektor 2','Wakil Rektor 2 Kampus'),(5,2,'Wakil Rektor 3','Wakil Rektor 3 Kampus'),(6,2,'Wakil Rektor 4','Wakil Rektor 4 Kampus');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategoridokumen`
--

DROP TABLE IF EXISTS `kategoridokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategoridokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoridokumen`
--

LOCK TABLES `kategoridokumen` WRITE;
/*!40000 ALTER TABLE `kategoridokumen` DISABLE KEYS */;
INSERT INTO `kategoridokumen` VALUES (1,'Undangan','Dokumen yang berisi undangan kepada pihak tertentu'),(2,'Surat Perintah','Dokumen yang berisi instruksi untuk melakukan sesuatu'),(3,'Surat Pengangkatan','Dokumen yang berisi pernyataan tentang pengangkatan');
/*!40000 ALTER TABLE `kategoridokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `body` text,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sent_time` datetime DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
INSERT INTO `mail` VALUES (1,'mail.test@gmail.com','internal.test@gmail.com','test','ini test lagi','2017-04-02 16:06:31',NULL,'0');
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `starttime` datetime DEFAULT NULL,
  `laststop` datetime DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'init','2017-04-10 09:22:16',NULL,'3','Initial service'),(2,'pool','2017-04-10 00:47:42','2017-04-10 09:22:28','0','Pool service');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_departemen`
--

DROP TABLE IF EXISTS `user_departemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_departemen` (
  `userid` varchar(30) NOT NULL,
  `iddepartemen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_departemen`
--

LOCK TABLES `user_departemen` WRITE;
/*!40000 ALTER TABLE `user_departemen` DISABLE KEYS */;
INSERT INTO `user_departemen` VALUES ('bram',1);
/*!40000 ALTER TABLE `user_departemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_jabatan`
--

DROP TABLE IF EXISTS `user_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_jabatan` (
  `userid` varchar(30) NOT NULL,
  `idjabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_jabatan`
--

LOCK TABLES `user_jabatan` WRITE;
/*!40000 ALTER TABLE `user_jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `wewenang` char(1) NOT NULL DEFAULT '',
  `status` char(1) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','202cb962ac59075b964b07152d234b70','Azzah','azzah@gmail.com','0','A','2017-05-18 14:26:21',NULL,'2017-05-18 14:25:18');
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

-- Dump completed on 2017-07-09 11:40:51
