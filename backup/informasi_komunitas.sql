-- MySQL dump 10.13  Distrib 8.0.36, for macos14 (x86_64)
--
-- Host: localhost    Database: informasi_komunitas
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_event_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` timestamp NOT NULL,
  `waktu_selesai` timestamp NOT NULL,
  `tipe` enum('online','offline') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kapasitas` int NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `event_id_unique` (`id`),
  KEY `event_user_id_foreign` (`user_id`),
  KEY `event_kategori_event_id_foreign` (`kategori_event_id`),
  CONSTRAINT `event_kategori_event_id_foreign` FOREIGN KEY (`kategori_event_id`) REFERENCES `kategori_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `event_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES ('11e6c313-43c4-436f-91fb-3733284aff72','EVT0524001','70d8ae33-4a48-486b-9197-7630af5aaf88','862524a8-2cca-4bce-842b-8b0558a04945','Event Meet UMKM Bogor','event-1716114031.jpg','Event meet & greet bersama UMKM Seluruh Bogor','2024-05-18 17:00:00','2024-05-19 17:00:00','offline','Balaikota Bogor',200,1,'2024-05-19 10:20:31',NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_forum_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `forum_id_unique` (`id`),
  KEY `forum_user_id_foreign` (`user_id`),
  KEY `forum_kategori_forum_id_foreign` (`kategori_forum_id`),
  CONSTRAINT `forum_kategori_forum_id_foreign` FOREIGN KEY (`kategori_forum_id`) REFERENCES `kategori_forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` VALUES ('350f8225-4bdd-4311-8799-9cc636210335','FRM0524001','70d8ae33-4a48-486b-9197-7630af5aaf88','c4ca0184-664d-4844-83f4-12b74a1c3f04','Komunitas UMKM Pasar Bogor','Forum untuk komunitas UMKM sekitar Pasar Bogor dan sekitarnya','forum-1716113896.jpg',1,1,'2024-05-19 10:18:16',NULL),('af3d6226-4637-4c53-a087-eec3d39ed9b2','FRM0524002','70d8ae33-4a48-486b-9197-7630af5aaf88','ec8067ce-5d76-41be-bb9c-68560da9320c','Komunitas Ojek Online Bogor','Forum untuk komunitas Ojek Online (Gojek, Grab, Indrive, Maxim, dll) sekitar Bogor dan sekitarnya','forum-1716113980.jpg',1,1,'2024-05-19 10:19:40',NULL),('b5700bd3-d6cd-4b49-9350-e3c410bc663b','FRM0524003','45881d5d-90d7-4c15-b34c-8488653f7ebf','47d81b85-8f30-45ac-b969-7d852a0deb64','Forum Pedagang Ikan','Forum untuk komunitas pedagang ikan',NULL,0,0,'2024-05-20 07:41:38',NULL);
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_diskusi`
--

DROP TABLE IF EXISTS `forum_diskusi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forum_diskusi` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `forum_diskusi_id_unique` (`id`),
  KEY `forum_diskusi_user_id_foreign` (`user_id`),
  KEY `forum_diskusi_forum_id_foreign` (`forum_id`),
  CONSTRAINT `forum_diskusi_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_diskusi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_diskusi`
--

LOCK TABLES `forum_diskusi` WRITE;
/*!40000 ALTER TABLE `forum_diskusi` DISABLE KEYS */;
INSERT INTO `forum_diskusi` VALUES ('5a523373-859c-4683-9a81-2a15c9c40284','70d8ae33-4a48-486b-9197-7630af5aaf88','350f8225-4bdd-4311-8799-9cc636210335','f1f0c0e0-e56e-4702-8a84-707ccde3230e','bung towel','2024-05-20 12:28:27','2024-05-20 12:29:16'),('9598918c-c88e-4837-bc1d-4ac23e1c4efc','45881d5d-90d7-4c15-b34c-8488653f7ebf','350f8225-4bdd-4311-8799-9cc636210335','f1f0c0e0-e56e-4702-8a84-707ccde3230e','yey','2024-05-20 12:27:58',NULL),('aa121fa8-6e40-4255-b08d-8c34fb9778f4','45881d5d-90d7-4c15-b34c-8488653f7ebf','350f8225-4bdd-4311-8799-9cc636210335','f1f0c0e0-e56e-4702-8a84-707ccde3230e','modal 2,6jt','2024-05-20 12:27:21','2024-05-20 12:29:16'),('f1f0c0e0-e56e-4702-8a84-707ccde3230e','45881d5d-90d7-4c15-b34c-8488653f7ebf','350f8225-4bdd-4311-8799-9cc636210335',NULL,'Halo gaes','2024-05-20 12:27:15',NULL);
/*!40000 ALTER TABLE `forum_diskusi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_event`
--

DROP TABLE IF EXISTS `kategori_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_event` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `kategori_event_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_event`
--

LOCK TABLES `kategori_event` WRITE;
/*!40000 ALTER TABLE `kategori_event` DISABLE KEYS */;
INSERT INTO `kategori_event` VALUES ('06848c55-259e-4abf-a109-f2125f475a06','Diskusi','2024-05-19 10:17:41',NULL),('862524a8-2cca-4bce-842b-8b0558a04945','Meet','2024-05-19 10:17:35',NULL);
/*!40000 ALTER TABLE `kategori_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_forum`
--

DROP TABLE IF EXISTS `kategori_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_forum` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `kategori_forum_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_forum`
--

LOCK TABLES `kategori_forum` WRITE;
/*!40000 ALTER TABLE `kategori_forum` DISABLE KEYS */;
INSERT INTO `kategori_forum` VALUES ('47d81b85-8f30-45ac-b969-7d852a0deb64','Supplier','2024-05-19 10:17:29',NULL),('c4ca0184-664d-4844-83f4-12b74a1c3f04','UMKM','2024-05-19 10:17:21',NULL),('ec8067ce-5d76-41be-bb9c-68560da9320c','Transportasi','2024-05-19 10:17:25',NULL);
/*!40000 ALTER TABLE `kategori_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_05_13_084052_create_users_table',1),(2,'2024_05_13_085727_create_kategori_forum_table',1),(3,'2024_05_13_090451_create_kategori_event_table',1),(4,'2024_05_13_090513_create_event_table',1),(5,'2024_05_13_090529_create_user_join_event_table',1),(6,'2024_05_13_090538_create_forum_table',1),(7,'2024_05_13_090551_create_forum_diskusi_table',1),(8,'2024_05_13_090558_create_user_join_forum_table',1),(9,'2024_05_15_034509_add_timestamp_column_into_users_table',2),(10,'2024_05_15_034603_add_image_column_into_users_table',3),(11,'2024_05_19_094825_add_column_into_users_table',4),(12,'2024_05_19_094845_add_column_into_forum_table',4),(13,'2024_05_19_094853_add_column_into_event_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_join_event`
--

DROP TABLE IF EXISTS `user_join_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_join_event` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `user_join_event_id_unique` (`id`),
  KEY `user_join_event_user_id_foreign` (`user_id`),
  KEY `user_join_event_event_id_foreign` (`event_id`),
  CONSTRAINT `user_join_event_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_join_event_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_join_event`
--

LOCK TABLES `user_join_event` WRITE;
/*!40000 ALTER TABLE `user_join_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_join_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_join_forum`
--

DROP TABLE IF EXISTS `user_join_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_join_forum` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `user_join_forum_id_unique` (`id`),
  KEY `user_join_forum_user_id_foreign` (`user_id`),
  KEY `user_join_forum_forum_id_foreign` (`forum_id`),
  CONSTRAINT `user_join_forum_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_join_forum_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_join_forum`
--

LOCK TABLES `user_join_forum` WRITE;
/*!40000 ALTER TABLE `user_join_forum` DISABLE KEYS */;
INSERT INTO `user_join_forum` VALUES ('7f87a9d7-cf6b-4eab-be22-5bbca06cd274','45881d5d-90d7-4c15-b34c-8488653f7ebf','350f8225-4bdd-4311-8799-9cc636210335',1,'2024-05-19 10:53:06',NULL),('be7f81ef-3fc8-4eac-82a2-9d77bd5e960e','70d8ae33-4a48-486b-9197-7630af5aaf88','350f8225-4bdd-4311-8799-9cc636210335',1,'2024-05-19 10:52:53',NULL);
/*!40000 ALTER TABLE `user_join_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pengguna') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengguna',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tgl_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_diubah` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('42ac14dc-2ad2-4340-98bb-e201571f7953','USR0524004','Muhamad Ferdinal','tes-ferdinal@gmail.com','Jl Veteran 3 Kp. Tapos RT 04/01 Desa Citapen, Kecamatan Ciawi\r\nRumah Cat Ijo (atas toko Al-Izzah Collection)','081122334455','$2y$10$IZJn6AuOL.k1Rw4HXVPM7OVRSw9FT6CjdZhzYOXWizHbgxvBE/xmy','pengguna',NULL,'2024-05-20 07:58:28',NULL),('45881d5d-90d7-4c15-b34c-8488653f7ebf','USR0524003','Muhamad Ferdinal','ferdinal@gmail.com','Bogor','081122334455','$2y$10$16guPtMG3e8vtCMllYs8DuOEk/1wuW832mPSgfwVc1XuFxqvEQo5C','pengguna',NULL,'2024-05-19 10:15:32',NULL),('70d8ae33-4a48-486b-9197-7630af5aaf88','ADM0524001','Admin TDA','admin@example.com','Bogor, Indonesia','081122334455','$2y$10$d1ojSVcamE1AZLDMS5jpvOREkJFW9Z3oCD6yO/lXZAtLo/hOcehNm','admin',NULL,'2024-05-19 10:10:47',NULL),('7f14774a-0294-488c-970b-afcae1204790','ADM0524002','Super Admin','super-admin@example.com','Tes','081122334455','$2y$10$1kr3XY2OyYlrU227qzGRueiuo3kvWViwJNLI5uMSDeFFg7FjySP2S','admin',NULL,'2024-05-19 10:14:43',NULL);
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

-- Dump completed on 2024-06-03  1:50:50
