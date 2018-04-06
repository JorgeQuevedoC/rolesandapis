-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: productionDB
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_22_154240_create_privileges_table',1),(4,'2018_03_22_154740_add_privileges_users_table',1),(5,'2018_03_22_224732_add_role_header_to_privileges',1),(6,'2018_03_22_230637_create_sections_table',1),(7,'2018_03_22_235617_add_timestamps_to_privileges',1),(8,'2018_03_23_162743_create_policies_table',1),(9,'2018_03_29_193935_add_tokens_to_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('lulu@caribbeanskytours.com','$2y$10$UjuEL0rlehwC39EpGdOQguj7GLIaoCo1hzlUZ3fuCH2VtlPHapQOm','2018-04-04 03:51:50');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `policies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `role1` tinyint(1) NOT NULL DEFAULT '0',
  `role2` tinyint(1) NOT NULL DEFAULT '0',
  `role3` tinyint(1) NOT NULL DEFAULT '0',
  `role4` tinyint(1) NOT NULL DEFAULT '0',
  `role5` tinyint(1) NOT NULL DEFAULT '0',
  `role6` tinyint(1) NOT NULL DEFAULT '0',
  `role7` tinyint(1) NOT NULL DEFAULT '0',
  `role8` tinyint(1) NOT NULL DEFAULT '0',
  `role9` tinyint(1) NOT NULL DEFAULT '0',
  `role10` tinyint(1) NOT NULL DEFAULT '0',
  `role11` tinyint(1) NOT NULL DEFAULT '0',
  `role12` tinyint(1) NOT NULL DEFAULT '0',
  `role13` tinyint(1) NOT NULL DEFAULT '0',
  `role14` tinyint(1) NOT NULL DEFAULT '0',
  `role15` tinyint(1) NOT NULL DEFAULT '0',
  `role16` tinyint(1) NOT NULL DEFAULT '0',
  `role17` tinyint(1) NOT NULL DEFAULT '0',
  `role18` tinyint(1) NOT NULL DEFAULT '0',
  `role19` tinyint(1) NOT NULL DEFAULT '0',
  `role20` tinyint(1) NOT NULL DEFAULT '0',
  `role21` tinyint(1) NOT NULL DEFAULT '0',
  `role22` tinyint(1) NOT NULL DEFAULT '0',
  `role23` tinyint(1) NOT NULL DEFAULT '0',
  `role24` tinyint(1) NOT NULL DEFAULT '0',
  `role25` tinyint(1) NOT NULL DEFAULT '0',
  `role26` tinyint(1) NOT NULL DEFAULT '0',
  `role27` tinyint(1) NOT NULL DEFAULT '0',
  `role28` tinyint(1) NOT NULL DEFAULT '0',
  `role29` tinyint(1) NOT NULL DEFAULT '0',
  `role30` tinyint(1) NOT NULL DEFAULT '0',
  `role31` tinyint(1) NOT NULL DEFAULT '0',
  `role32` tinyint(1) NOT NULL DEFAULT '0',
  `role33` tinyint(1) NOT NULL DEFAULT '0',
  `role34` tinyint(1) NOT NULL DEFAULT '0',
  `role35` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `policies_section_id_foreign` (`section_id`),
  CONSTRAINT `policies_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policies`
--

LOCK TABLES `policies` WRITE;
/*!40000 ALTER TABLE `policies` DISABLE KEYS */;
INSERT INTO `policies` VALUES (1,NULL,NULL,'indexUser',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(2,NULL,NULL,'createUser',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(3,NULL,NULL,'updateUser',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,NULL,NULL,'readUser',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(5,NULL,NULL,'deleteUser',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(6,NULL,NULL,'fullAccess',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `policies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `privilege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,'director','role1',NULL,NULL),(2,'general manager','role2',NULL,NULL),(3,'fc senior','role3',NULL,'2018-04-04 02:01:08'),(4,'fc junior','role4',NULL,NULL),(5,'quotation senior','role5',NULL,NULL),(6,'quotation junior','role6',NULL,NULL),(7,'fuel senior','role7',NULL,NULL),(8,'fuel junior','role8',NULL,NULL),(9,'membership senior','role9',NULL,NULL),(10,'membership junior','role10',NULL,NULL),(11,'accounting senior','role11',NULL,NULL),(12,'accounting junior','role12',NULL,NULL),(13,'customer service senior','role13',NULL,NULL),(14,'customer service junior','role14',NULL,NULL),(15,'it senior','role15',NULL,NULL),(16,'it junior','role16',NULL,NULL),(17,'hr senior','role17',NULL,NULL),(18,'hr junior','role18',NULL,NULL),(19,'trainee','role19',NULL,NULL),(20,'fltplan customer','role20',NULL,NULL),(21,'cst customer pro','role21',NULL,NULL),(22,'cst customer','role22',NULL,NULL),(23,'empty','role23',NULL,NULL),(24,'empty','role24',NULL,NULL),(25,'empty','role25',NULL,NULL),(26,'empty','role26',NULL,NULL),(27,'empty','role27',NULL,NULL),(28,'empty','role28',NULL,NULL),(29,'empty','role29',NULL,NULL),(30,'empty','role30',NULL,NULL),(31,'empty','role31',NULL,NULL),(32,'empty','role32',NULL,NULL),(33,'empty','role33',NULL,NULL),(34,'empty','role34',NULL,NULL),(35,'empty','role35',NULL,NULL);
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,NULL,NULL,'accounts'),(2,NULL,NULL,'roles');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privilege_id` int(10) unsigned NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`),
  KEY `users_privilege_id_foreign` (`privilege_id`),
  CONSTRAINT `users_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jorge','jorgequevedoc@gmail.com','$2y$10$7qm3iC5Eaq2QiXZzFgZB8.bu2IQPgliTKJUzPiCatKLpjVc8TTjSy','53drH9BXlq','2018-04-04 01:27:38','2018-04-04 01:27:38',1,'IyCDxszeqwSU7qadtJKxZtzSZPGrzDSw0ZdXy5Y730prys8HAS'),(3,'Lulu','lulu@caribbeanskytours.com','$2y$10$6Ap5IdRBzdnzUh5onvHhe.eLIbxCUnOTxRQbHspgsoewXfrzrvwEC',NULL,'2018-04-04 01:50:21','2018-04-04 01:50:21',9,'DcgE7KlRiuAHE6uYihWB9IVfZu2J491ljvoTrm18deqZDN8gHL');
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

-- Dump completed on 2018-04-03 18:06:23
