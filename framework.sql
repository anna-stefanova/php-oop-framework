-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: framework
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.21.10.2

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb3 */;
CREATE TABLE `cart` (
  `id_cart` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_good` int DEFAULT NULL,
  `count` int DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_category` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent_id` varchar(128) DEFAULT NULL,
  `tag` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Категория 1',NULL,'category_one'),(2,'Категория 2',NULL,'category_two'),(3,'Категория 3',NULL,'category_three'),(4,'Категория 4',NULL,'category_four'),(5,'Категория 5',NULL,'category_five'),(6,'Категория 6',NULL,'category_six'),(7,'Категория 7',NULL,'category_seven'),(8,'Категория 8',NULL,'category_eight');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods` (
  `id_good` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `id_category` smallint unsigned DEFAULT NULL,
  UNIQUE KEY `good_id` (`id_good`),
  UNIQUE KEY `good_id_2` (`id_good`),
  UNIQUE KEY `good_id_3` (`id_good`),
  UNIQUE KEY `good_id_4` (`id_good`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'Товар 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc turpis nibh, sodales eget vehicula a, finibus eu eros. Aenean congue purus justo, ac dictum ligula consectetur non. Donec eu enim quis velit scelerisque facilisis. Maecenas.','3836',4),(2,'Товар 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc turpis nibh, sodales eget vehicula a, finibus eu eros. Aenean congue purus justo, ac dictum ligula consectetur non. Donec eu enim quis velit scelerisque facilisis. Maecenas.','2680',5),(3,'Товар 3','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1795',2),(4,'Товар 4','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','835',3),(5,'Товар 5','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3593',4),(6,'Товар 6','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','656',7),(7,'Товар 7','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2202',8),(8,'Товар 8','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4042',2),(9,'Товар 9','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3704',2),(10,'Товар 10','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1393',3),(11,'Товар 11','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','653',8),(12,'Товар 12','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3890',7),(13,'Товар 13','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2687',3),(14,'Товар 14','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1665',7),(15,'Товар 15','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','163',5),(16,'Товар 16','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','623',8),(17,'Товар 17','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2528',3),(18,'Товар 18','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','868',5),(19,'Товар 19','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1556',7),(20,'Товар 20','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','177',6),(21,'Товар 21','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1017',8),(22,'Товар 22','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4456',5),(23,'Товар 23','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4426',7),(24,'Товар 24','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3762',3),(25,'Товар 25','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','532',3),(26,'Товар 26','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1078',4),(27,'Товар 27','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3693',2),(28,'Товар 28','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','430',8),(29,'Товар 29','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','772',8),(30,'Товар 30','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2469',6),(31,'Товар 31','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','131',8),(32,'Товар 32','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2949',3),(33,'Товар 33','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4448',6),(34,'Товар 34','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3495',5),(35,'Товар 35','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4032',7),(36,'Товар 36','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4672',4),(37,'Товар 37','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1364',8),(38,'Товар 38','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2508',1),(39,'Товар 39','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3445',4),(40,'Товар 40','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4702',1),(41,'Товар 41','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3274',1),(42,'Товар 42','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2162',7),(43,'Товар 43','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','889',2),(44,'Товар 44','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2762',4),(45,'Товар 45','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1243',6),(46,'Товар 46','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2729',3),(47,'Товар 47','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4915',2),(48,'Товар 48','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1585',1),(49,'Товар 49','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2881',7),(50,'Товар 50','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4651',8),(51,'Товар 51','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4709',4),(52,'Товар 52','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4594',2),(53,'Товар 53','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3842',4),(54,'Товар 54','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','427',1),(55,'Товар 55','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','312',6),(56,'Товар 56','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','179',2),(57,'Товар 57','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4762',7),(58,'Товар 58','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3569',6),(59,'Товар 59','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3459',1),(60,'Товар 60','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1588',8),(61,'Товар 61','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2365',5),(62,'Товар 62','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2058',3),(63,'Товар 63','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3098',7),(64,'Товар 64','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4317',7),(65,'Товар 65','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2386',8),(66,'Товар 66','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3783',3),(67,'Товар 67','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1855',7),(68,'Товар 68','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2729',1),(69,'Товар 69','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3077',7),(70,'Товар 70','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2198',6),(71,'Товар 71','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1658',3),(72,'Товар 72','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1597',3),(73,'Товар 73','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2912',5),(74,'Товар 74','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4768',8),(75,'Товар 75','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','304',1),(76,'Товар 76','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1816',3),(77,'Товар 77','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3170',5),(78,'Товар 78','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','500',1),(79,'Товар 79','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2694',3),(80,'Товар 80','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2068',3),(81,'Товар 81','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2159',5),(82,'Товар 82','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4490',1),(83,'Товар 83','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1172',6),(84,'Товар 84','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2090',1),(85,'Товар 85','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1937',3),(86,'Товар 86','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3312',3),(87,'Товар 87','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','850',8),(88,'Товар 88','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4018',5),(89,'Товар 89','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2735',1),(90,'Товар 90','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1523',4),(91,'Товар 91','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4210',2),(92,'Товар 92','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1677',4),(93,'Товар 93','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','558',4),(94,'Товар 94','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2560',2),(95,'Товар 95','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','1226',7),(96,'Товар 96','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3250',2),(97,'Товар 97','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2670',5),(98,'Товар 98','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','3499',2),(99,'Товар 99','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','4487',4),(100,'Товар 100','Это описание товара. Текст достаточно короткий, но для глаз приятен:)','2038',3),(101,'Товар 101','Корзина\r\n        {{ content.message }}','345',5);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status` (
  `id_order_status` int unsigned NOT NULL AUTO_INCREMENT,
  `order_status_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_order_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'Выполнен'),(2,'Ожидается оплата'),(3,'Обработка'),(4,'Отменен'),(5,'Возвращён'),(6,'На удержании');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id_order` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `id_order_status` int DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'2022-06-16 12:08:12',6,15711),(2,2,'2022-06-16 12:14:00',6,10941),(3,2,'2022-06-16 12:14:46',6,16967),(4,1,'2022-06-16 12:44:10',6,8084),(5,3,'2022-06-16 13:43:02',6,8781),(6,3,'2022-06-16 14:03:46',6,6514);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_details` (
  `id_order` int DEFAULT NULL,
  `id_good` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
INSERT INTO `orders_details` VALUES (1,1,3836,1),(1,6,656,1),(1,10,1393,2),(1,11,653,1),(1,12,3890,2),(2,4,835,1),(2,3,1795,2),(2,2,2680,1),(2,1,3836,1),(2,52,4594,2),(2,58,3569,1),(2,91,4210,1),(3,52,4594,2),(3,58,3569,1),(3,91,4210,1),(1,10,1393,1),(1,11,653,1),(1,1,3836,1),(1,7,2202,1),(4,10,1393,1),(4,11,653,1),(4,1,3836,1),(4,7,2202,1),(5,22,4456,1),(5,15,163,3),(5,1,3836,1),(5,17,2528,1),(5,11,653,2),(5,2,2680,1),(6,17,2528,1),(6,11,653,2),(6,2,2680,1);
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id_role` int unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Администратор'),(2,'Клиент');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `id_user_role` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1),(2,2,2),(3,4,2),(4,5,2),(5,6,2),(6,3,2);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `name` varchar(128) DEFAULT NULL,
  `surname` varchar(128) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','admin','admin','123',1),('Anna','Stef','anna@anna.ru','111',2),('Ivan','Petrov','ivan@petrov.ru','222',3),('Peter','Ivanov','peter@ivanov.ru','333',4),('Yuri','Gagarin','yuri@gagarin.ru','444',5),('Alex','Alex','alex@alex.ru','555',6);
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

-- Dump completed on 2022-06-16 20:59:17
