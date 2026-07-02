-- MySQL dump 10.13  Distrib 8.0.37, for Win64 (x86_64)
--
-- Host: localhost    Database: mytalentindia
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@1.com','$2y$12$A1RkySHQAvfdbzW/E9ckEuur.tMGwPxaK4adtz9lEaTtrMuOwgygy','2026-05-27 01:29:38','2026-05-27 01:29:38');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contests`
--

DROP TABLE IF EXISTS `contests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `theme` text COLLATE utf8mb4_unicode_ci,
  `rules` text COLLATE utf8mb4_unicode_ci,
  `prizes` text COLLATE utf8mb4_unicode_ci,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_fee` decimal(8,2) NOT NULL DEFAULT '0.00',
  `registration_start` date NOT NULL,
  `registration_end` date NOT NULL,
  `submission_deadline` date NOT NULL,
  `result_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contests_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contests`
--

LOCK TABLES `contests` WRITE;
/*!40000 ALTER TABLE `contests` DISABLE KEYS */;
/*!40000 ALTER TABLE `contests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `contest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `blueprint_downloaded` tinyint(1) NOT NULL DEFAULT '0',
  `blueprint_downloaded_at` timestamp NULL DEFAULT NULL,
  `artwork_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artwork_uploaded_at` timestamp NULL DEFAULT NULL,
  `submission_status` enum('pending','under_review','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_remark` text COLLATE utf8mb4_unicode_ci,
  `numerical_score` int DEFAULT NULL,
  `rank` int DEFAULT NULL,
  `reviewed_by` bigint unsigned DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `certificate_generated` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrollments_user_id_contest_name_unique` (`user_id`,`contest_name`),
  KEY `enrollments_reviewed_by_foreign` (`reviewed_by`),
  CONSTRAINT `enrollments_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES (1,1,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-05-29 01:11:16','artworks/user_id_1/2dOBmx1y79d3Mip1F1KXUiJGWEzuAsvZa7pENxdy.png','2026-05-29 02:14:18','approved','evaluation complated',100,1,NULL,'2026-06-03 01:03:18',0,1,'2026-05-28 07:50:49','2026-06-03 01:03:18'),(2,3,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-06-02 06:45:31','artworks/user_id_3/bRe3tDkHreHjrxBnt8qNAGuoAxTtRox5HlsWDhMS.png','2026-06-02 06:45:42','under_review','bcgfdagasf',74,2,NULL,'2026-06-03 02:06:04',0,1,'2026-06-02 06:45:25','2026-06-03 02:06:04'),(3,4,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-06-02 06:46:57',NULL,NULL,'pending',NULL,56,3,NULL,'2026-06-03 00:53:52',0,1,'2026-06-02 06:46:52','2026-06-03 02:06:04'),(4,5,'All India Painting Competition 2026','Future India','Painting',1,49.00,0,NULL,NULL,NULL,'pending',NULL,30,4,NULL,'2026-06-03 02:04:40',0,1,'2026-06-02 06:48:03','2026-06-03 02:06:04'),(5,6,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-06-05 06:00:42','artworks/user_id_6/4b13qYkvP56x5dT6DvKzwn4vwSfvl00VU9o0HKqV.png','2026-06-05 06:00:58','pending',NULL,NULL,NULL,NULL,NULL,0,1,'2026-06-05 05:55:31','2026-06-05 06:00:58'),(6,7,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-06-05 06:06:23',NULL,NULL,'pending',NULL,NULL,NULL,NULL,NULL,0,1,'2026-06-05 06:06:19','2026-06-05 06:06:23'),(7,8,'All India Painting Competition 2026','Future India','Painting',1,49.00,1,'2026-06-11 06:14:36','artworks/user_id_8/VaXyjZOEwwJ27T5Ruz2YZ06b4q7U9IEcr1Ep3vDH.jpg','2026-06-11 06:14:50','under_review',NULL,NULL,NULL,NULL,'2026-06-11 06:15:34',0,1,'2026-06-11 06:14:31','2026-06-11 06:15:34');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_05_26_123751_create_users_table',1),(2,'2026_05_26_125606_create_sessions_table',1),(3,'2026_05_27_064109_create_admin_table',1),(4,'2026_05_27_065902_create_admins_table',2),(5,'2026_05_27_101444_create_sessions_table',3),(6,'2026_05_28_124905_create_enrollments_table',4),(7,'2026_06_01_111204_add_review_fields_to_enrollments_table',5),(8,'2026_06_11_073813_create_contests_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2cRVIlbnS3hb9ECJSkK7zBnpo9VJeYBIKu4QNpLP',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0','eyJfdG9rZW4iOiJxa3RaYzNjMnNvdjNHMkN0dENoNldhM1l5UXFNMlZHQUxHRFZob0FtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL215dGFsZW50aW5kaWEudGVzdFwvYWRtaW5cL3BhcnRpY2lwYW50c1wvMSIsInJvdXRlIjoiYWRtaW4ucGFydGljaXBhbnRzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJhZG1pbl9sb2dnZWRfaW4iOnRydWUsImFkbWluX25hbWUiOiJBZG1pbiJ9',1781163173),('uK3IGza0V58FuJX3ji9cgH8yQZ8xEvCy8yiDEY5f',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0','eyJfdG9rZW4iOiJWdGdYY0xpakcyeFF5NkNoOHAwZmxTNlZ5R2ozYzRuSmVsbGQ1UVJQIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbXl0YWxlbnRpbmRpYS50ZXN0Iiwicm91dGUiOm51bGx9fQ==',1781178825);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ravindra','Singh','ravindra@ex.com','$2y$12$yyBkuM8.oWWq/Vrm4.9VwOtNHkicTYVWuhgwZ6aNK3rR2R.1UIoGy','2002-02-22','10','2026-05-27 04:11:17','2026-05-27 04:11:17'),(2,'Ravindra','Singh','ravindrasinghofficial.8@gmail.com','$2y$12$v8zQRD5riygu7/aY0fCOLulzcfftHRqdmjb0lYOMioxlai7Trq.F6','2002-02-11','12','2026-05-27 04:27:21','2026-05-27 04:27:21'),(3,'Deepak','Gupta','deepak123@ex.com','$2y$12$VTMtRcPsiS8Ccp3L4OzgNeSjuTxUu5lhYO6/wdkNrar98DCCCu0Fe','2000-11-11','graduation','2026-06-02 06:45:20','2026-06-02 06:45:20'),(4,'Rachit','Verma','Rachit@ex.com','$2y$12$9E0UDH33/W2KXdx1pVXqwO2rb34jd4H7u30B2BIuVluHbZPgPQQPq','2001-02-11','12','2026-06-02 06:46:38','2026-06-02 06:46:38'),(5,'nilesh','pal','nilesh@ex.com','$2y$12$UDi8.aoNS/uvd4p901rRxOxlokONAq9GTuy.vVNOxTwE/ocpw/0aG','2000-02-22','12','2026-06-02 06:47:52','2026-06-02 06:47:52'),(6,'rahul','gupta','rahul@gmail.com','$2y$12$xNsmKHmSiuN8gtv3UZPnuOxve6pQXy0azeCf.niCJ4WRyq6Eta8ey','2004-02-22','m.com','2026-06-05 05:40:18','2026-06-05 05:40:18'),(7,'Ramesh','Rajan','ramesh@gmail.com','$2y$12$XCfqbCC4RY9dIvcVWCplVODguAHdDE3BHPlnrRvzOBDu9Ce7vk5nm','2005-03-31','12th','2026-06-05 06:03:45','2026-06-05 06:03:45'),(8,'Pankaj','Kumar','pankajkumar@gmail.com','$2y$12$XSvv4PN7aKdYD72MU2w90ORGWJAZT5Eb3TNk7yu.WIuJ6xCaAo6L.','2002-02-02','graduation','2026-06-11 06:14:19','2026-06-11 06:14:19');
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

-- Dump completed on 2026-06-11 18:17:28
