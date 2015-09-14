-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for arsip
DROP DATABASE IF EXISTS `arsip`;
CREATE DATABASE IF NOT EXISTS `arsip` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `arsip`;


-- Dumping structure for table arsip.arsip
DROP TABLE IF EXISTS `arsip`;
CREATE TABLE IF NOT EXISTS `arsip` (
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

-- Dumping data for table arsip.arsip: ~10 rows (approximately)
/*!40000 ALTER TABLE `arsip` DISABLE KEYS */;
INSERT INTO `arsip` (`id`, `arsip`, `files`, `jenis_arsip_id`, `gudang_id`, `rak_id`, `box_id`, `seksi_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'nobis', 'batas_akhir_tahun.pdf', 2, 1, 8, 7, 2, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(2, 'culpa', 'batas_akhir_tahun.pdf', 9, 5, 8, 2, 1, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(3, 'sit', 'batas_akhir_tahun.pdf', 10, 4, 3, 4, 5, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(4, 'et', 'batas_akhir_tahun.pdf', 9, 2, 2, 9, 5, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(5, 'id', 'batas_akhir_tahun.pdf', 7, 7, 1, 3, 8, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(6, 'ut', 'batas_akhir_tahun.pdf', 3, 4, 10, 1, 3, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(7, 'dolorem', 'batas_akhir_tahun.pdf', 3, 2, 10, 5, 10, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(8, 'possimus', 'batas_akhir_tahun.pdf', 2, 5, 9, 6, 4, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(9, 'voluptas', 'batas_akhir_tahun.pdf', 5, 5, 5, 6, 10, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(10, 'qui', 'batas_akhir_tahun.pdf', 10, 8, 2, 6, 1, 2, '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `arsip` ENABLE KEYS */;


-- Dumping structure for table arsip.assigned_roles
DROP TABLE IF EXISTS `assigned_roles`;
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.assigned_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
	(1, 1, 1),
	(2, 2, 2);
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;


-- Dumping structure for table arsip.box
DROP TABLE IF EXISTS `box`;
CREATE TABLE IF NOT EXISTS `box` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `box` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rak_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `box_rak_id_foreign` (`rak_id`),
  CONSTRAINT `box_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.box: ~10 rows (approximately)
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` (`id`, `box`, `rak_id`, `created_at`, `updated_at`) VALUES
	(1, 'maiores', 9, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(2, 'et', 9, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(3, 'qui', 10, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(4, 'ducimus', 7, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(5, 'et', 1, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(6, 'blanditiis', 8, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(7, 'in', 8, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(8, 'tenetur', 2, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(9, 'officia', 4, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(10, 'temporibus', 7, '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `box` ENABLE KEYS */;


-- Dumping structure for table arsip.departemen
DROP TABLE IF EXISTS `departemen`;
CREATE TABLE IF NOT EXISTS `departemen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departemen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.departemen: ~0 rows (approximately)
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` (`id`, `departemen`, `logo`, `created_at`, `updated_at`) VALUES
	(1, 'Kementerian Keuangan', 'logo.png', '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;


-- Dumping structure for table arsip.gudang
DROP TABLE IF EXISTS `gudang`;
CREATE TABLE IF NOT EXISTS `gudang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gudang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.gudang: ~10 rows (approximately)
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` (`id`, `gudang`, `created_at`, `updated_at`) VALUES
	(1, 'aperiam', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(2, 'ea', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(3, 'ut', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(4, 'voluptas', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(5, 'praesentium', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(6, 'consequatur', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(7, 'repudiandae', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(8, 'cumque', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(9, 'quidem', '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(10, 'explicabo', '2015-08-06 23:04:32', '2015-08-06 23:04:32');
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;


-- Dumping structure for table arsip.jenis_arsip
DROP TABLE IF EXISTS `jenis_arsip`;
CREATE TABLE IF NOT EXISTS `jenis_arsip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'sm',
  `retensi` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.jenis_arsip: ~11 rows (approximately)
/*!40000 ALTER TABLE `jenis_arsip` DISABLE KEYS */;
INSERT INTO `jenis_arsip` (`id`, `jenis`, `alias`, `retensi`, `created_at`, `updated_at`) VALUES
	(1, 'distinctio', 'dis', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(2, 'et', 'et', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(3, 'rerum', 'rer', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(4, 'et', 'et', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(5, 'ducimus', 'duc', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(6, 'et', 'et', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(7, 'neque', 'neq', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(8, 'quidem', 'qui', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(9, 'ex', 'ex', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(10, 'porro', 'po', 5, '2015-08-06 23:04:31', '2015-08-06 23:04:31'),
	(11, 'pororo', 'por', 4, '2015-08-08 21:50:51', '2015-08-08 21:52:55');
/*!40000 ALTER TABLE `jenis_arsip` ENABLE KEYS */;


-- Dumping structure for table arsip.kantor
DROP TABLE IF EXISTS `kantor`;
CREATE TABLE IF NOT EXISTS `kantor` (
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

-- Dumping data for table arsip.kantor: ~0 rows (approximately)
/*!40000 ALTER TABLE `kantor` DISABLE KEYS */;
INSERT INTO `kantor` (`id`, `departemen_id`, `kanwil_id`, `kantor`, `alamat`, `telpon`, `fax`, `email`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'KPP Payakumbuh', 'JL. Sudirman, No. 184-A', '(0752) 92281', '(0752) 92281', 'payakumbuh@pajak.go.id', '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `kantor` ENABLE KEYS */;


-- Dumping structure for table arsip.kanwil
DROP TABLE IF EXISTS `kanwil`;
CREATE TABLE IF NOT EXISTS `kanwil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departemen_id` int(10) unsigned DEFAULT NULL,
  `kanwil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `kanwil_departemen_id_foreign` (`departemen_id`),
  CONSTRAINT `kanwil_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.kanwil: ~0 rows (approximately)
/*!40000 ALTER TABLE `kanwil` DISABLE KEYS */;
INSERT INTO `kanwil` (`id`, `departemen_id`, `kanwil`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Kanwil DJP Provinsi Sumatera Barat', '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `kanwil` ENABLE KEYS */;


-- Dumping structure for table arsip.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.migrations: ~16 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2015_05_08_074131_create_jenis_arsip_table', 1),
	('2015_05_08_074231_create_gudang_table', 1),
	('2015_05_08_074357_create_rak_table', 1),
	('2015_05_08_074357_create_seksi_table', 1),
	('2015_05_08_085318_create_users_table', 1),
	('2015_05_08_090902_create_box_table', 1),
	('2015_05_10_052604_create_departemen_table', 1),
	('2015_05_10_125912_create_arsip_table', 1),
	('2015_05_10_143552_create_kanwil_table', 1),
	('2015_05_10_143724_create_kantor_table', 1),
	('2015_05_26_144550_entrust_setup_tables', 1),
	('2015_07_25_034943_add_gudang_id_to_seksi_table', 1),
	('2015_07_25_035133_add_seksi_id_to_rak_table', 1),
	('2015_07_25_035248_add_rak_id_to_box_table', 1),
	('2015_08_02_201320_add_retensi_to_jenisarsip_table', 1),
	('2015_08_02_212914_create_pinjam_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table arsip.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table arsip.permission_role
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table arsip.pinjam
DROP TABLE IF EXISTS `pinjam`;
CREATE TABLE IF NOT EXISTS `pinjam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arsip_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `time_pinjam` datetime NOT NULL,
  `time_kembali` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pinjam_arsip_id_foreign` (`arsip_id`),
  KEY `pinjam_user_id_foreign` (`user_id`),
  CONSTRAINT `pinjam_arsip_id_foreign` FOREIGN KEY (`arsip_id`) REFERENCES `arsip` (`id`),
  CONSTRAINT `pinjam_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.pinjam: ~4 rows (approximately)
/*!40000 ALTER TABLE `pinjam` DISABLE KEYS */;
INSERT INTO `pinjam` (`id`, `arsip_id`, `user_id`, `status`, `time_pinjam`, `time_kembali`, `created_at`, `updated_at`) VALUES
	(1, 6, 1, 1, '2015-08-08 16:06:08', '2015-08-08 19:07:56', '2015-08-08 16:06:08', '2015-08-08 19:07:56'),
	(2, 2, 2, 2, '2015-08-08 16:18:16', '0000-00-00 00:00:00', '2015-08-08 16:18:16', '2015-08-08 16:18:16'),
	(3, 1, 1, 1, '2015-08-08 16:19:32', '2015-08-08 19:08:21', '2015-08-08 16:19:32', '2015-08-08 19:08:21'),
	(4, 3, 2, 2, '2015-08-08 16:24:19', '0000-00-00 00:00:00', '2015-08-08 16:24:19', '2015-08-08 16:24:19'),
	(5, 5, 2, 1, '2015-08-08 19:11:45', '2015-08-08 19:12:04', '2015-08-08 19:11:45', '2015-08-08 19:12:04');
/*!40000 ALTER TABLE `pinjam` ENABLE KEYS */;


-- Dumping structure for table arsip.rak
DROP TABLE IF EXISTS `rak`;
CREATE TABLE IF NOT EXISTS `rak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rak` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seksi_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rak_seksi_id_foreign` (`seksi_id`),
  CONSTRAINT `rak_seksi_id_foreign` FOREIGN KEY (`seksi_id`) REFERENCES `seksi` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.rak: ~10 rows (approximately)
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` (`id`, `rak`, `seksi_id`, `created_at`, `updated_at`) VALUES
	(1, 'voluptas', 4, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(2, 'explicabo', 2, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(3, 'sapiente', 7, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(4, 'veritatis', 9, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(5, 'odio', 8, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(6, 'suscipit', 3, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(7, 'quasi', 3, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(8, 'autem', 5, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(9, 'veritatis', 1, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(10, 'voluptatibus', 9, '2015-08-06 23:04:32', '2015-08-06 23:04:32');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;


-- Dumping structure for table arsip.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2015-08-06 23:04:33', '2015-08-06 23:04:33'),
	(2, 'Staff', '2015-08-06 23:04:33', '2015-08-06 23:04:33');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table arsip.seksi
DROP TABLE IF EXISTS `seksi`;
CREATE TABLE IF NOT EXISTS `seksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seksi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gudang_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `seksi_gudang_id_foreign` (`gudang_id`),
  CONSTRAINT `seksi_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudang` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.seksi: ~10 rows (approximately)
/*!40000 ALTER TABLE `seksi` DISABLE KEYS */;
INSERT INTO `seksi` (`id`, `seksi`, `gudang_id`, `created_at`, `updated_at`) VALUES
	(1, 'quod', 8, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(2, 'aspernatur', 5, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(3, 'sit', 7, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(4, 'iste', 5, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(5, 'architecto', 7, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(6, 'nihil', 8, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(7, 'autem', 5, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(8, 'perferendis', 9, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(9, 'qui', 5, '2015-08-06 23:04:32', '2015-08-06 23:04:32'),
	(10, 'magni', 10, '2015-08-06 23:04:32', '2015-08-06 23:04:32');
/*!40000 ALTER TABLE `seksi` ENABLE KEYS */;


-- Dumping structure for table arsip.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `nmdepan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nmbelakang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table arsip.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nip`, `username`, `nmdepan`, `nmbelakang`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '000000000000000', 'admin', 'admin', 'admin', '$2y$10$wiIvb5.QhFFn8SFgvdBHY.VnQteqvYlA12VERFIexJySTlT5dzTe.', 'dUWWA1q1dUBawsOoUgJfzRQgMpyCWUBc119XWFkgCSMOwDgfL0aZMyn05cDF', '2015-08-06 23:04:31', '2015-08-08 21:58:37'),
	(2, '111111111111111111', 'staff', 'staff', 'staff', '$2y$10$XOOz4RxEazfZk8WELZQKGOfa1Xuq48KslhOnHOAQ6tJ7miVZRx1.i', NULL, '2015-08-06 23:04:31', '2015-08-06 23:04:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
