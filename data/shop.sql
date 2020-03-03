-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `cartItems`
--

DROP TABLE IF EXISTS `cartItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartItems` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_added` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`,`id_product`),
  KEY `fk_id_product_idx` (`id_product`),
  CONSTRAINT `fk_id_cart` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartItems`
--

LOCK TABLES `cartItems` WRITE;
/*!40000 ALTER TABLE `cartItems` DISABLE KEYS */;
INSERT INTO `cartItems` VALUES (1,1,47,'2020-02-05 18:17:16'),(1,2,2,'2020-02-05 18:17:16'),(1,3,1,'2020-02-05 18:17:16'),(1,4,2,'2020-02-05 18:17:16');
/*!40000 ALTER TABLE `cartItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `cart_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`),
  KEY `id_user_idx` (`id_user`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,'2020-02-05 18:15:34'),(2,2,'2020-02-05 18:15:34');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `info` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'1','jpg','','2020-02-21 22:09:12',0),(2,'2','jpg','','2020-02-21 22:11:00',0),(3,'777','jpg','','2020-02-21 22:11:07',0),(4,'russkiĭ_yazyk','jpg','','2020-02-21 22:14:18',0),(5,'office','jpg','','2020-02-21 22:14:41',0),(6,'1','jpg','','2020-02-24 20:27:23',0),(7,'2','jpg','','2020-02-24 20:29:32',0),(8,'2','jpg','','2020-02-24 20:30:54',0),(9,'office','jpg','','2020-02-24 20:34:47',0),(10,'office','jpg','','2020-02-24 20:35:06',0);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `counter` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Keyboard',1600,'keyboard.jpg','2020-02-01 11:24:14',0,'Это клавиатура'),(2,'Gamepad',3000,'gamepad.jpg','2020-02-01 11:24:14',0,'Это геймпад.'),(3,'Notebook',45600,'notebook.jpg','2020-02-01 11:24:14',0,'Это ноутбук.'),(4,'Mouse',1000,'mouse.jpg','2020-02-01 11:24:14',0,'Это мышка'),(5,'Товар 1',10,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 1'),(6,'Товар 2',20,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 2'),(7,'Товар 3',30,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 3'),(8,'Товар 4',40,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 4'),(9,'Товар 5',50,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 5'),(10,'Товар 6',60,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 6'),(11,'Товар 7',70,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 7'),(12,'Товар 8',80,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 8'),(13,'Товар 9',90,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 9'),(14,'Товар 10',100,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 10'),(15,'Товар 11',110,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 11'),(16,'Товар 12',120,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 12'),(17,'Товар 13',130,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 13'),(18,'Товар 14',140,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 14'),(19,'Товар 15',150,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 15'),(20,'Товар 16',160,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 16'),(21,'Товар 17',170,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 17'),(22,'Товар 18',180,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 18'),(23,'Товар 19',190,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 19'),(24,'Товар 20',200,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 20'),(25,'Товар 21',210,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 21'),(26,'Товар 22',220,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 22'),(27,'Товар 23',230,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 23'),(28,'Товар 24',240,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 24'),(29,'Товар 25',250,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 25'),(30,'Товар 26',260,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 26'),(31,'Товар 27',270,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 27'),(32,'Товар 28',280,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 28'),(33,'Товар 29',290,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 29'),(34,'Товар 30',300,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 30'),(35,'Товар 31',310,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 31'),(36,'Товар 32',320,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 32'),(37,'Товар 33',330,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 33'),(38,'Товар 34',340,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 34'),(39,'Товар 35',350,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 35'),(40,'Товар 36',360,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 36'),(41,'Товар 37',370,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 37'),(42,'Товар 38',380,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 38'),(43,'Товар 39',390,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 39'),(44,'Товар 40',400,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 40'),(45,'Товар 41',410,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 41'),(46,'Товар 42',420,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 42'),(47,'Товар 43',430,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 43'),(48,'Товар 44',440,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 44'),(49,'Товар 45',450,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 45'),(50,'Товар 46',460,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 46'),(51,'Товар 47',470,'notebook.jpg','2020-02-25 21:59:00',0,'Описание Товара 47'),(52,'Товар 48',480,'mouse.jpg','2020-02-25 21:59:00',0,'Описание Товара 48'),(53,'Товар 49',490,'keyboard.jpg','2020-02-25 21:59:00',0,'Описание Товара 49'),(54,'Товар 50',500,'gamepad.jpg','2020-02-25 21:59:00',0,'Описание Товара 50');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `review` text,
  PRIMARY KEY (`id_review`),
  KEY `id_products_idx` (`id_product`),
  CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surename` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sergii','790e717cf8e38ca9163739969b6186b0','Sergii','Shaiko','foodprofi@gmail.com',NULL),(2,'Olena','790e717cf8e38ca9163739969b6186b0','Olena','Shaiko','alina270481@gmail.com',NULL),(3,'shaiko','827ccb0eea8a706c4c34a16891f84e7b','SERGII SHAIKO',NULL,'foodprofi@gmail.com','2020-02-28 21:24:17'),(4,'sergey','827ccb0eea8a706c4c34a16891f84e7b','Сергей',NULL,'sergey.shaiko@cedrusindustries.info','2020-02-28 21:27:53'),(5,'sergey','827ccb0eea8a706c4c34a16891f84e7b','Сергей',NULL,'sergey.shaiko@cedrusindustries.info','2020-02-28 21:28:31'),(6,'aliona','827ccb0eea8a706c4c34a16891f84e7b','Aliona',NULL,'aliona270481@gmail.com','2020-02-28 21:33:07'),(7,'test','827ccb0eea8a706c4c34a16891f84e7b','Test',NULL,'sergii.shaiko@gmail.com','2020-02-29 17:28:06');
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

-- Dump completed on 2020-03-01 19:46:57
