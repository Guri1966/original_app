-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'動詞','2025-09-09 09:59:17','2025-09-09 09:59:17'),(2,'名詞','2025-09-09 09:59:32','2025-09-09 09:59:32'),(3,'形容詞','2025-09-09 09:59:43','2025-09-09 09:59:43'),(4,'副詞','2025-09-09 09:59:51','2025-09-09 09:59:51');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dicts`
--

DROP TABLE IF EXISTS `dicts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dicts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `enword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mean` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synonym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paraphase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dicts`
--

LOCK TABLES `dicts` WRITE;
/*!40000 ALTER TABLE `dicts` DISABLE KEYS */;
/*!40000 ALTER TABLE `dicts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_08_05_233141_create_dicts_table',2),(6,'2025_08_07_115630_create_words_table',3),(7,'2025_08_07_225511_add_english_column_to_words_table',4),(9,'2025_08_18_204608_add_column_hold_flag_to_words_table',5),(10,'2025_08_19_194153_alter_words_table_add_default_to_hold_flag',5),(11,'2025_08_22_073401_add_image_to_words_table',6),(12,'2025_08_27_092330_add_stats_to_words_table--table=words',7),(13,'2025_08_31_131342_add_culumn',8),(14,'2025_09_03_085246_create_categories_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Masahiro','guri09566@gmail.com',NULL,'$2y$12$DI7bewra1CzSHJ04gK2smuZEux/IZs5PDpuTg0wII9B1tknqfDzia',NULL,'2025-08-07 01:19:47','2025-08-07 01:19:47'),(2,'test','test@gmail.com',NULL,'$2y$12$MzrO1nbvR6Ksm4ysx3uTkOEtJrMeybdSMVbQcxSAAuBhTGd.Vgzn2',NULL,'2025-09-14 11:44:19','2025-09-14 11:44:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onsetu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `yomikata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iikae` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hold_flag` tinyint(1) NOT NULL DEFAULT '0',
  `correct_count` int unsigned NOT NULL DEFAULT '0',
  `answer_count` int unsigned NOT NULL DEFAULT '0',
  `catetory_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `words_user_id_foreign` (`user_id`),
  KEY `words_category_id_foreign` (`category_id`),
  CONSTRAINT `words_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `words_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `words`
--

LOCK TABLES `words` WRITE;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` VALUES (10,'expire','',1,'ɪkspάɪɚ','〈期間などが〉満了する','exhale 息を吐く','run out','images/wvBheuEbJUHDNqMo8GYle9n0zk1k9QWTqy47VxZK.jpg','2025-08-14 19:31:27','2025-09-14 08:07:05',0,3,4,NULL,NULL),(11,'trigger','',1,'trígɚ','〈事件などの〉きっかけとなる，',NULL,NULL,'images/YpyBoPvLzPqNuFOeUlc7pEdeuPvUmKRkwWq2lZwr.jpg','2025-08-15 07:41:36','2025-08-28 19:26:00',0,4,5,NULL,NULL),(12,'conspicuous','',1,'kənspíkjuəs','はっきり見える，人目につく，目立った.',NULL,NULL,'images/UBnzr9vFTmKVUrmBunQhzN7zzPXAPXE7adZPTNyi.jpg','2025-08-15 07:41:52','2025-08-28 16:29:26',0,5,7,NULL,NULL),(13,'talent','',1,'tˈælənt','(特殊の)才能，手腕','ability',NULL,'images/HHCK7obEG4RefvKiM2HCHR5gS7RTzkYjcWXS9Nf1.jpg','2025-08-15 07:43:13','2025-08-30 09:09:08',0,2,2,NULL,NULL),(15,'dissent','dis・sent',1,'dɪsént','異議を唱える，反対する',NULL,NULL,'images/8srUAUX6zHKfx0cKachZUcSoJBrTaj36MKeiyAGg.jpg','2025-08-17 17:20:35','2025-08-31 13:52:07',1,4,13,NULL,NULL),(16,'exceptional','',1,'eksépʃ(ə)nəl','素晴らしい; 例外的な','','','images/S8iW0RRucDvsqqbvBqUHtwysVISnrS0FfhL6Qrij.jpg','2025-08-17 17:50:46','2025-09-14 12:35:24',0,10,11,NULL,NULL),(25,'evoke','',1,'ɪvóʊk','(感情など)を呼び起こす、引き起こす',NULL,NULL,'images/OPgp2wgLJyV1PsgoQvEPy4bnt6wVFcmnW23byAcc.jpg','2025-08-19 20:38:47','2025-09-02 09:00:18',0,6,6,NULL,NULL),(26,'recap','',1,'ri:cap','(～を）おさらいする',NULL,NULL,'images/ds2Ru9C9g5q9KmfwK6eaXxyuNdemRHrkukQgywPR.jpg','2025-08-19 21:19:49','2025-08-28 16:17:57',0,6,6,NULL,NULL),(27,'eminent','',1,'émənənt','著名な、有名な',NULL,NULL,'images/frQQViBnJ57esImBn3CdC94QARHxmFouooHqzqvW.jpg','2025-08-20 20:24:16','2025-09-02 09:00:42',0,5,5,NULL,NULL),(28,'calamity','',1,'kəlˈæməṭi','悲惨なこと、災難',NULL,NULL,'images/yg4c32H970gYg1O1t8AFFuOpMAKMoHBtiizkkYwO.jpg','2025-08-21 20:55:27','2025-09-02 09:00:47',0,5,5,NULL,NULL),(34,'perpetual','',1,'pɚpétʃuəl','永続する、永久の、絶え間ない',NULL,NULL,'words/bW9rYpIxm4ryoAGfmtWuJCunO7FaD7lC8yLgUUqX.webp','2025-08-22 20:49:03','2025-08-28 16:48:40',0,5,12,NULL,NULL),(37,'fetch','',1,'fétʃ','取ってくる、呼んでくる','','','images/m3e5LuWfD4ML6uDaAnCcds8I2D6xvrmLLEmVtTIS.jpg','2025-08-28 07:32:13','2025-09-14 12:35:31',1,3,3,NULL,NULL),(40,'validate','val・i・date',1,'vˈælədèɪt','(…を)(法律的に)有効にする、確認する',NULL,NULL,'images/XUp5KQ5gD16d5zKSC3FbRCizzzDU7Ojt8CxZAiet.png','2025-08-28 08:38:45','2025-08-31 13:51:27',1,2,2,NULL,NULL),(42,'align','a・lign',1,'əlάɪn','(…を)一直線にする',NULL,NULL,'images/zugHGeBpAFP65pp5oTTPiO6ao210HI90MzDejHfu.jpg','2025-09-06 08:20:38','2025-09-06 08:20:38',0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `words` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-14  8:12:59
