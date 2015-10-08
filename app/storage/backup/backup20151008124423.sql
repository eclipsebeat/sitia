-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: arsip
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

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
-- Table structure for table `arsip`
--

DROP TABLE IF EXISTS `arsip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arsip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_arsip_id` int(10) unsigned DEFAULT NULL,
  `gudang_id` int(10) unsigned DEFAULT NULL,
  `rak_id` int(10) unsigned DEFAULT NULL,
  `box_id` int(10) unsigned DEFAULT NULL,
  `seksi_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `arsip_jenis_arsip_id_foreign` (`jenis_arsip_id`),
  KEY `arsip_gudang_id_foreign` (`gudang_id`),
  KEY `arsip_rak_id_foreign` (`rak_id`),
  KEY `arsip_box_id_foreign` (`box_id`),
  KEY `arsip_seksi_id_foreign` (`seksi_id`),
  KEY `arsip_user_id_foreign` (`user_id`),
  CONSTRAINT `arsip_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`) ON DELETE SET NULL,
  CONSTRAINT `arsip_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudang` (`id`) ON DELETE SET NULL,
  CONSTRAINT `arsip_jenis_arsip_id_foreign` FOREIGN KEY (`jenis_arsip_id`) REFERENCES `jenis_arsip` (`id`) ON DELETE SET NULL,
  CONSTRAINT `arsip_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE SET NULL,
  CONSTRAINT `arsip_seksi_id_foreign` FOREIGN KEY (`seksi_id`) REFERENCES `seksi` (`id`) ON DELETE SET NULL,
  CONSTRAINT `arsip_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip`
--

LOCK TABLES `arsip` WRITE;
/*!40000 ALTER TABLE `arsip` DISABLE KEYS */;
INSERT INTO `arsip` VALUES (1,'quis','batas_akhir_tahun.pdf',7,3,10,2,3,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(2,'natus','batas_akhir_tahun.pdf',9,6,2,5,3,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(3,'quod','batas_akhir_tahun.pdf',2,1,2,10,1,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(4,'a','batas_akhir_tahun.pdf',5,1,10,7,1,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(5,'qui','batas_akhir_tahun.pdf',10,10,7,5,3,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(6,'ex','batas_akhir_tahun.pdf',6,5,10,8,1,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(7,'qui','batas_akhir_tahun.pdf',4,3,1,10,2,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(8,'vitae','batas_akhir_tahun.pdf',9,8,8,6,3,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(9,'ut','batas_akhir_tahun.pdf',7,2,9,2,2,2,'2015-10-08 02:49:07','2015-10-08 02:49:07'),(10,'sed','batas_akhir_tahun.pdf',10,6,1,9,2,2,'2015-10-08 02:49:07','2015-10-08 02:49:07');
/*!40000 ALTER TABLE `arsip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_roles`
--

LOCK TABLES `assigned_roles` WRITE;
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
INSERT INTO `assigned_roles` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box`
--

DROP TABLE IF EXISTS `box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `box` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rak_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `box_rak_id_foreign` (`rak_id`),
  CONSTRAINT `box_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box`
--

LOCK TABLES `box` WRITE;
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` VALUES (1,'similique',2,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(2,'quibusdam',2,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(3,'officia',4,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(4,'rerum',6,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(5,'eligendi',7,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(6,'autem',6,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(7,'et',2,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(8,'debitis',7,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(9,'velit',1,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(10,'labore',5,'2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departemen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departemen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departemen`
--

LOCK TABLES `departemen` WRITE;
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` VALUES (1,'Kementerian Keuangan','logo.png','2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gudang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang`
--

LOCK TABLES `gudang` WRITE;
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` VALUES (1,'nisi','2015-10-08 02:49:05','2015-10-08 02:49:05'),(2,'inventore','2015-10-08 02:49:05','2015-10-08 02:49:05'),(3,'blanditiis','2015-10-08 02:49:05','2015-10-08 02:49:05'),(4,'recusandae','2015-10-08 02:49:06','2015-10-08 02:49:06'),(5,'commodi','2015-10-08 02:49:06','2015-10-08 02:49:06'),(6,'dolore','2015-10-08 02:49:06','2015-10-08 02:49:06'),(7,'eaque','2015-10-08 02:49:06','2015-10-08 02:49:06'),(8,'dolor','2015-10-08 02:49:06','2015-10-08 02:49:06'),(9,'dolore','2015-10-08 02:49:06','2015-10-08 02:49:06'),(10,'quis','2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_arsip`
--

DROP TABLE IF EXISTS `jenis_arsip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_arsip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `retensi` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_arsip`
--

LOCK TABLES `jenis_arsip` WRITE;
/*!40000 ALTER TABLE `jenis_arsip` DISABLE KEYS */;
INSERT INTO `jenis_arsip` VALUES (1,'numquam','quisquam',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(2,'in','et',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(3,'quisquam','temporibus',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(4,'libero','magnam',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(5,'id','ex',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(6,'rerum','ut',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(7,'voluptates','sed',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(8,'voluptas','molestiae',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(9,'necessitatibus','maxime',5,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(10,'ut','error',5,'2015-10-08 02:49:05','2015-10-08 02:49:05');
/*!40000 ALTER TABLE `jenis_arsip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kantor`
--

DROP TABLE IF EXISTS `kantor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kantor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departemen_id` int(10) unsigned DEFAULT NULL,
  `kanwil_id` int(10) unsigned DEFAULT NULL,
  `kantor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telpon` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `kantor_departemen_id_foreign` (`departemen_id`),
  KEY `kantor_kanwil_id_foreign` (`kanwil_id`),
  CONSTRAINT `kantor_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`) ON DELETE SET NULL,
  CONSTRAINT `kantor_kanwil_id_foreign` FOREIGN KEY (`kanwil_id`) REFERENCES `kanwil` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kantor`
--

LOCK TABLES `kantor` WRITE;
/*!40000 ALTER TABLE `kantor` DISABLE KEYS */;
INSERT INTO `kantor` VALUES (1,1,1,'KPP Payakumbuh','JL. Sudirman, No. 184-A','(0752) 92281','(0752) 92281','payakumbuh@pajak.go.id','2015-10-08 02:49:07','2015-10-08 02:49:07');
/*!40000 ALTER TABLE `kantor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kanwil`
--

DROP TABLE IF EXISTS `kanwil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kanwil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departemen_id` int(10) unsigned DEFAULT NULL,
  `kanwil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `kanwil_departemen_id_foreign` (`departemen_id`),
  CONSTRAINT `kanwil_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kanwil`
--

LOCK TABLES `kanwil` WRITE;
/*!40000 ALTER TABLE `kanwil` DISABLE KEYS */;
INSERT INTO `kanwil` VALUES (1,1,'Kanwil DJP Provinsi Sumatera Barat','2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `kanwil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_05_08_074131_create_jenis_arsip_table',1),('2015_05_08_074231_create_gudang_table',1),('2015_05_08_074357_create_seksi_table',1),('2015_05_08_075357_create_rak_table',1),('2015_05_08_085318_create_users_table',1),('2015_05_08_090902_create_box_table',1),('2015_05_10_052604_create_departemen_table',1),('2015_05_10_125912_create_arsip_table',1),('2015_05_10_143552_create_kanwil_table',1),('2015_05_10_143724_create_kantor_table',1),('2015_05_26_144550_entrust_setup_tables',1),('2015_08_02_212914_create_pinjam_table',1),('2015_09_13_202809_create_table_notifikasi',1),('2015_10_07_180815_create_utility_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifikasi_user_id_foreign` (`user_id`),
  CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pinjam`
--

DROP TABLE IF EXISTS `pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arsip_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `time_pinjam` datetime NOT NULL,
  `time_kembali` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pinjam_arsip_id_foreign` (`arsip_id`),
  KEY `pinjam_user_id_foreign` (`user_id`),
  CONSTRAINT `pinjam_arsip_id_foreign` FOREIGN KEY (`arsip_id`) REFERENCES `arsip` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pinjam_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pinjam`
--

LOCK TABLES `pinjam` WRITE;
/*!40000 ALTER TABLE `pinjam` DISABLE KEYS */;
INSERT INTO `pinjam` VALUES (1,9,1,1,'2015-08-25 07:21:13','2014-12-25 08:35:42','2015-10-08 02:49:07','2015-10-08 02:49:07'),(2,6,2,1,'2014-11-16 20:50:46','2015-08-18 23:30:50','2015-10-08 02:49:07','2015-10-08 02:49:07'),(3,5,1,1,'2015-09-15 13:44:31','2015-05-09 08:02:31','2015-10-08 02:49:07','2015-10-08 02:49:07'),(4,3,2,2,'2015-05-04 09:18:10','2015-04-12 01:08:25','2015-10-08 02:49:08','2015-10-08 02:49:08'),(5,5,2,1,'2015-06-26 21:58:37','2014-12-03 13:53:42','2015-10-08 02:49:08','2015-10-08 02:49:08'),(6,1,2,2,'2015-05-02 14:41:02','2015-03-23 20:47:01','2015-10-08 02:49:08','2015-10-08 02:49:08'),(7,8,2,1,'2015-02-02 20:50:55','2015-04-10 18:52:16','2015-10-08 02:49:08','2015-10-08 02:49:08'),(8,4,1,1,'2014-12-30 20:13:01','2015-04-12 12:30:14','2015-10-08 02:49:08','2015-10-08 02:49:08'),(9,1,1,2,'2014-11-29 14:30:39','2015-06-26 07:45:01','2015-10-08 02:49:08','2015-10-08 02:49:08'),(10,7,2,1,'2015-01-10 09:30:57','2014-12-14 17:38:12','2015-10-08 02:49:08','2015-10-08 02:49:08');
/*!40000 ALTER TABLE `pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rak` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seksi_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rak_seksi_id_foreign` (`seksi_id`),
  CONSTRAINT `rak_seksi_id_foreign` FOREIGN KEY (`seksi_id`) REFERENCES `seksi` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak`
--

LOCK TABLES `rak` WRITE;
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` VALUES (1,'enim',5,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(2,'sint',1,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(3,'culpa',5,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(4,'maiores',4,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(5,'libero',4,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(6,'veniam',4,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(7,'at',5,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(8,'et',1,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(9,'saepe',2,'2015-10-08 02:49:06','2015-10-08 02:49:06'),(10,'et',4,'2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2015-10-08 02:49:07','2015-10-08 02:49:07'),(2,'Staff','2015-10-08 02:49:07','2015-10-08 02:49:07');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seksi`
--

DROP TABLE IF EXISTS `seksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seksi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seksi`
--

LOCK TABLES `seksi` WRITE;
/*!40000 ALTER TABLE `seksi` DISABLE KEYS */;
INSERT INTO `seksi` VALUES (1,'accusamus','2015-10-08 02:49:06','2015-10-08 02:49:06'),(2,'perspiciatis','2015-10-08 02:49:06','2015-10-08 02:49:06'),(3,'non','2015-10-08 02:49:06','2015-10-08 02:49:06'),(4,'sed','2015-10-08 02:49:06','2015-10-08 02:49:06'),(5,'quaerat','2015-10-08 02:49:06','2015-10-08 02:49:06');
/*!40000 ALTER TABLE `seksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `nmdepan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nmbelakang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'000000000000000','admin','admin','admin','$2y$10$kiAiTCJuUkGT8nmoK0fOpuvPn4ZpTZpaJclKMY6IcpqvUjsJRi1oy',1,NULL,'2015-10-08 02:49:05','2015-10-08 02:49:05'),(2,'111111111111111111','staff','staff','staff','$2y$10$PuUPvKEpVbJO5tLq8/Q1J.qvI3xmM1/BwueI2qyhFt7Er.yVjqJRG',1,NULL,'2015-10-08 02:49:05','2015-10-08 02:49:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utility`
--

DROP TABLE IF EXISTS `utility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utility` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `backup` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `utility_user_id_foreign` (`user_id`),
  CONSTRAINT `utility_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility`
--

LOCK TABLES `utility` WRITE;
/*!40000 ALTER TABLE `utility` DISABLE KEYS */;
/*!40000 ALTER TABLE `utility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'arsip'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-08 12:44:25
