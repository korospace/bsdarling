-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_bsdarling
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artikel` (
  `id` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `id_kategori` varchar(200) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `published_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `artikel_id_kategori_foreign` (`id_kategori`),
  CONSTRAINT `artikel_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel`
--

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dompet`
--

DROP TABLE IF EXISTS `dompet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dompet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(200) DEFAULT NULL,
  `uang` decimal(11,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  CONSTRAINT `dompet_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dompet`
--

LOCK TABLES `dompet` WRITE;
/*!40000 ALTER TABLE `dompet` DISABLE KEYS */;
INSERT INTO `dompet` VALUES (1,NULL,0.00),(421,'0202001',13000.00);
/*!40000 ALTER TABLE `dompet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jual_sampah`
--

DROP TABLE IF EXISTS `jual_sampah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jual_sampah` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(200) NOT NULL,
  `id_sampah` varchar(200) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL DEFAULT 0,
  `jumlah_kg` decimal(65,2) NOT NULL,
  `harga_nasabah` decimal(11,2) NOT NULL,
  `jumlah_rp` decimal(11,2) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `jual_sampah_id_transaksi_foreign` (`id_transaksi`),
  KEY `jual_sampah_id_sampah_foreign` (`id_sampah`),
  CONSTRAINT `jual_sampah_id_sampah_foreign` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jual_sampah_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jual_sampah`
--

LOCK TABLES `jual_sampah` WRITE;
/*!40000 ALTER TABLE `jual_sampah` DISABLE KEYS */;
/*!40000 ALTER TABLE `jual_sampah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_artikel`
--

DROP TABLE IF EXISTS `kategori_artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_artikel` (
  `id` varchar(6) NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `kategori_utama` tinyint(1) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_artikel`
--

LOCK TABLES `kategori_artikel` WRITE;
/*!40000 ALTER TABLE `kategori_artikel` DISABLE KEYS */;
INSERT INTO `kategori_artikel` VALUES ('KA01','633e678d3682e.jpeg','sosialisasi','deskripsi tentang kegiatan sosialisasi',1,1659345174),('KA02','633e6a1817cb8.jpeg','penimbangan','deskripsi tentang kegiatan penimbangan',1,1659345189),('KA05','633e66fa82677.jpeg','Pelatihan','Pelatihan pembuatan Tepache dan Ecoenzym',1,1661410608);
/*!40000 ALTER TABLE `kategori_artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_sampah`
--

DROP TABLE IF EXISTS `kategori_sampah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_sampah` (
  `id` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_sampah`
--

LOCK TABLES `kategori_sampah` WRITE;
/*!40000 ALTER TABLE `kategori_sampah` DISABLE KEYS */;
INSERT INTO `kategori_sampah` VALUES ('KS01','kertas',1656644130),('KS02','plastik',1656644134),('KS03','logam',1656644137),('KS04','lain-lain',1656644141),('KS05','kaca',1667099986);
/*!40000 ALTER TABLE `kategori_sampah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'2021-11-16-023013','App\\Database\\Migrations\\Users','default','App',1656643580,1),(28,'2021-11-16-023841','App\\Database\\Migrations\\KategoriArtikel','default','App',1656643580,1),(29,'2021-11-16-024046','App\\Database\\Migrations\\Artikel','default','App',1656643580,1),(30,'2021-11-16-031046','App\\Database\\Migrations\\KategoriSampah','default','App',1656643580,1),(31,'2021-11-16-031125','App\\Database\\Migrations\\Sampah','default','App',1656643580,1),(32,'2021-11-16-031158','App\\Database\\Migrations\\Transaksi','default','App',1656643580,1),(33,'2021-11-16-031238','App\\Database\\Migrations\\SetorSampah','default','App',1656643580,1),(34,'2021-11-16-031308','App\\Database\\Migrations\\TarikSaldo','default','App',1656643580,1),(35,'2021-11-16-031428','App\\Database\\Migrations\\JualSampah','default','App',1656643580,1),(36,'2021-11-16-040233','App\\Database\\Migrations\\Wilayah','default','App',1656643580,1),(37,'2021-11-23-225132','App\\Database\\Migrations\\Dompet','default','App',1656643580,1),(38,'2022-04-08-054206','App\\Database\\Migrations\\Penghargaan','default','App',1656643580,1),(39,'2022-04-08-115035','App\\Database\\Migrations\\Mitra','default','App',1656643580,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES (3,'63cc7494b5f1f.jpeg','UNIVERSITAS Darling JAKARTA','Bank Sampah Teratai (BST) bekerjasama/bermitra dengan Universitas Darling sejak berdirinya BST pada tahun 2014 hingga sekarang. Kerjasama ini dilakukan dengan menerjunkan dosen dan mahasiswa Universitas Darling dalam kegiatan Pengabdian Kepada Masyarakat dan Kuliah Kerja Nyata.'),(5,'648afdf651a9f.webp','Bank Sampah Teratai','-');
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penghargaan`
--

DROP TABLE IF EXISTS `penghargaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penghargaan`
--

LOCK TABLES `penghargaan` WRITE;
/*!40000 ALTER TABLE `penghargaan` DISABLE KEYS */;
INSERT INTO `penghargaan` VALUES (2,'63cc70594f18a.jpeg','JUARA KEDUA BANK SAMPAH UTAMA  KOTA TANGERANG TAHUN 2019','Kejuaraan mengikuti lomba bank sampah tingkat kota Tangerang pada tahun 2019'),(3,'63cc715979730.jpeg','JUARA KETIGA LOMBA PENGELOLAAAN BANK SAMPAH TINGKAT KECAMATAN PINANG TAHUN 2022','Kejuaraan mengikuti lomba Pengelolaan Bank Sampah dalam rangka HUT Kota Tangerang ke 29 tingkat Kecamatan Pinang pada bulan Februari 2022');
/*!40000 ALTER TABLE `penghargaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sampah`
--

DROP TABLE IF EXISTS `sampah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sampah` (
  `id` varchar(6) NOT NULL,
  `id_kategori` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `jumlah` decimal(65,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenis` (`jenis`),
  KEY `sampah_id_kategori_foreign` (`id_kategori`),
  CONSTRAINT `sampah_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sampah`
--

LOCK TABLES `sampah` WRITE;
/*!40000 ALTER TABLE `sampah` DISABLE KEYS */;
INSERT INTO `sampah` VALUES ('S001','KS02','botol plastik bersih / bodong',0,0,0.00),('S002','KS02','botol plastik kotor',0,0,0.00),('S003','KS02','gelas aqua bersih',0,0,0.00),('S004','KS02','gelas aqua kotor',0,0,0.00),('S005','KS02','emberan/gabruk',0,0,0.00),('S006','KS02','kantong kresek / asoy',0,0,0.00),('S007','KS02','plastik bening pe bersih',0,0,0.00),('S008','KS02','tutup botol plastik',0,0,0.00),('S009','KS02','tutup galon',0,0,0.00),('S010','KS02','galon aqua/ades - per botol',0,0,0.00),('S011','KS02','paralon',0,0,0.00),('S012','KS02','galon bukan aqua/ades',0,0,0.00),('S013','KS02','ale-ale / teh gelas',0,0,0.00),('S014','KS02','compact disc (cd)',0,0,0.00),('S015','KS01','kardus',0,0,0.00),('S016','KS01','koran',0,0,0.00),('S017','KS01','majalah/buku pelajaran/buku tulis',0,0,0.00),('S018','KS01','kertas hvs / swl',0,0,0.00),('S019','KS01','kertas semen',0,0,0.00),('S020','KS01','boncos / potongan kardus',0,0,0.00),('S021','KS03','besi a (padat): baut',0,0,0.00),('S022','KS03','besi b (bolong) / kabin',0,0,0.00),('S023','KS03','kaleng',0,0,0.00),('S024','KS03','aluminium/klg softdrink/rongsok',0,0,0.00),('S025','KS03','seng',0,0,0.00),('S026','KS03','besi springbed',0,0,0.00),('S027','KS03','siku (stainless stell/jemuran/rak piring)',0,0,0.00),('S028','KS05','botol kecap - per botol',0,0,0.00),('S029','KS05','botol beling',0,0,0.00),('S031','KS04','tetrapak',0,0,0.00),('S032','KS04','minyak jelantah',0,0,0.00),('S033','KS04','jerigen putih (naso)',0,0,0.00),('S034','KS03','panci (aluminium)',0,0,0.00),('S035','KS04','majic jar',0,0,0.00),('S036','KS04','kompor gas',0,0,0.00),('S037','KS04','toples nastar (kristal)',0,0,0.00),('S038','KS03','kipas angin, pompa sepeda(besi  b)',0,0,0.00),('S039','KS04','tv -  satuan',0,0,0.00),('S040','KS04','monitor  - satuan',0,0,0.00),('S041','KS04','printer',0,0,0.00),('S042','KS04','laptop',0,0,0.00),('S043','KS04','mesin cuci',0,0,0.00),('S044','KS04','aki (buang air)',0,0,0.00),('S045','KS02','plastik terpal',0,0,0.00),('S046','KS02','karpet talang',0,0,0.00),('S048','KS04','stabilizer',0,0,0.00),('S049','KS04','mijel',0,0,0.00),('S050','KS02','plastik bening pe campur',0,0,0.00),('S051','KS02','plastik bening pe warna',0,0,0.00),('S052','KS04','dispenser',0,0,0.00),('S053','KS03','tembaga',0,0,0.00),('S054','KS03','kuningan',0,0,0.00),('S055','KS04','kulkas',0,0,0.00),('S056','KS04','mesin jahit',0,0,0.00),('S057','KS02','karung plastik (eks beras, tepung dll)',0,0,0.00),('S058','KS01','duplex',0,0,0.00),('S059','KS02','ekobrik',0,0,0.00),('S060','KS01','kones (karton bekas gulungan kain/benang)',0,0,0.00),('S061','KS02','tali plastik',0,0,0.00),('S062','KS05','botol bir (satuan)',0,0,0.00),('S063','KS03','dinamo tembaga',0,0,0.00),('S064','KS03','dinamo non tembaga = besi a',0,0,0.00),('S065','KS03','trafo (besi a)',0,0,0.00),('S067','KS02','injek - kotak es krim (putih)',0,0,0.00),('S068','KS03','tabung pompa air',0,0,0.00),('S069','KS04','tv flat -layar datar',0,0,0.00);
/*!40000 ALTER TABLE `sampah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor_sampah`
--

DROP TABLE IF EXISTS `setor_sampah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor_sampah` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(200) NOT NULL,
  `id_sampah` varchar(200) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL DEFAULT 0,
  `jumlah_kg` decimal(65,2) NOT NULL,
  `jumlah_rp` decimal(11,2) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `setor_sampah_id_transaksi_foreign` (`id_transaksi`),
  KEY `setor_sampah_id_sampah_foreign` (`id_sampah`),
  CONSTRAINT `setor_sampah_id_sampah_foreign` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `setor_sampah_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5643 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor_sampah`
--

LOCK TABLES `setor_sampah` WRITE;
/*!40000 ALTER TABLE `setor_sampah` DISABLE KEYS */;
/*!40000 ALTER TABLE `setor_sampah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarik_saldo`
--

DROP TABLE IF EXISTS `tarik_saldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarik_saldo` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(200) NOT NULL,
  `jumlah_tarik` decimal(65,4) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`no`),
  KEY `tarik_saldo_id_transaksi_foreign` (`id_transaksi`),
  CONSTRAINT `tarik_saldo_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarik_saldo`
--

LOCK TABLES `tarik_saldo` WRITE;
/*!40000 ALTER TABLE `tarik_saldo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarik_saldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(12) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `date` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_id_user_foreign` (`id_user`),
  KEY `no` (`no`),
  CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=665 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` varchar(18) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `notelp` varchar(14) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(10) NOT NULL DEFAULT '00-00-0000',
  `kelamin` enum('laki-laki','perempuan') NOT NULL,
  `token` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_active` bigint(19) NOT NULL DEFAULT 0,
  `otp` varchar(6) DEFAULT NULL,
  `is_verify` tinyint(1) NOT NULL DEFAULT 0,
  `privilege` varchar(10) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `notelp` (`notelp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('0202001',NULL,'0202001','JKF717j8yWdhNIRxEvkIbg==','bagas',NULL,NULL,NULL,'','laki-laki',NULL,1,1689433047,'810524',1,'nasabah',1689433047),('A001','superadmin1@gmail.com','superadmin1','$2y$10$pXX0xsLpVYORnLyXmt7rSu4/xFyibBq91DAAPiJNjh4Ww9rbLCxxi','super admin 1',NULL,'1234567890123456',NULL,'30-06-2022','laki-laki','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IkEwMDEiLCJ1bmlxdWVpZCI6IjY0YjJhYzBlMDhhYzIiLCJwYXNzd29yZCI6IiQyeSQxMCRwWFgweHNMcFZZT1JuTHlYbXQ3clN1NFwveEZ5aWJCcTkxREFBUGlKTmpoNFd3OXJiTEN4eGkiLCJwcml2aWxlZ2UiOiJzdXBlcmFkbWluIiwiZXhwaXJlZCI6MTY4OTUxNzQ1NH0.CO3D0eYmt1lwks7kGIfhmR_g_MYV29ltbbar8AFYdmY',1,1689431054,NULL,1,'superadmin',1656643582),('A002',NULL,'mypresiden424','$2y$10$Ag/6cwTCJE1MF/cx5l7SFuOv5CmWKfSR9WVAmbUjuiJ11VTmcbw1O','superadmin2','212121',NULL,'tes','31-08-2022','laki-laki','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IkEwMDIiLCJ1bmlxdWVpZCI6IjYzZDY2NWE4NGNlMjgiLCJwYXNzd29yZCI6IiQyeSQxMCRBZ1wvNmN3VENKRTFNRlwvY3g1bDdTRnVPdjVDbVdLZlNSOVdWQW1iVWp1aUoxMVZUbWNidzFPIiwicHJpdmlsZWdlIjoic3VwZXJhZG1pbiIsImV4cGlyZWQiOjE2NzUwODE1MTJ9.Ig4PY6ZMuFfAXba95NLkRnh598T2_bmiQd_B_EzB5gY',1,1674995112,NULL,1,'superadmin',1661928108);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wilayah`
--

DROP TABLE IF EXISTS `wilayah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(200) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wilayah_id_user_foreign` (`id_user`),
  CONSTRAINT `wilayah_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=421 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayah`
--

LOCK TABLES `wilayah` WRITE;
/*!40000 ALTER TABLE `wilayah` DISABLE KEYS */;
INSERT INTO `wilayah` VALUES (420,'0202001','15414','sarua (serua)','ciputat','tangerang selatan','banten');
/*!40000 ALTER TABLE `wilayah` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-15 23:01:12
