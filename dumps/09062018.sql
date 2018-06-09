-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: for_my_project
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `constants`
--

DROP TABLE IF EXISTS `constants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constants` (
  `name` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `translate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constants`
--

LOCK TABLES `constants` WRITE;
/*!40000 ALTER TABLE `constants` DISABLE KEYS */;
INSERT INTO `constants` VALUES ('news_per_page','5','количество новостей на страничке'),('reviews_per_page','5','количество отзывов на страничке'),('domainname','localhost/my_project','имя домена'),('admin_email','daniil_panov2005@mail.ru','e-mail администратора');
/*!40000 ALTER TABLE `constants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` int(255) DEFAULT NULL,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Мы предлагаем',3,1525026930,1527413693,'icon_home','icon-4x'),(2,'We offer',5,1525026930,NULL,NULL,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `image` varchar(255) DEFAULT NULL,
  `image_width` int(4) DEFAULT NULL,
  `type_of_measure_unit` varchar(2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (6,'wertttt','444r5t5t5ty58ty58yt58ty5yt58yty85t5t5t5t','img/Lighthouse.jpg',80,'%','123',1527776117,1527784089,'','rrrrrrrrrrrrrururururutututuutuutututut'),(1,'Главная новость!','Главная новость!','img/Chrysanthemum.jpg',200,NULL,'Главная новость!',1527672877,1527697447,'Главная, новость','Главная новость!');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `position` int(255) DEFAULT NULL,
  `parent_id` int(3) DEFAULT NULL,
  `keywords` text,
  `title` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `icon_size` varchar(255) DEFAULT NULL,
  `menu_number` int(4) NOT NULL,
  `general_visible` enum('0','1') NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `content` longtext,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `visible_at_top_menu` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'The main page of site ’MY_PROJECT’',16,0,'Main','Main page','icon-glass','icon-1x',2,'1','Main','Hello!!!',1527412988,1527537272,'1'),(3,'Главная страница сайта ’MY_PROJECT’',13,0,'Главная','Главная страница','icon-glass','icon-1x',1,'1','Главная','Привет!!!!',1527412613,1528396218,'1'),(27,'Это &mdash; пример страницы №1',17,3,'Пример, страница','Пример страницы №1','icon-tasks','icon-large',1,'1','Пример страницы №1','Это &mdash; пример страницы №1',1527879985,NULL,'1'),(28,'This is example page',18,2,'Example, page','Example page','icon-tasks','icon-large',2,'1','Example page №1','This is example page',1527880076,NULL,'1'),(29,'',19,28,'','','icon-beaker','icon-large',2,'1','test','',1527880172,NULL,'1');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `page_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` text,
  `author` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','da9d630b967d7838f404957cb79b7c27'),(2,'daniil','309496b55e81604ec2002c208f2b56cc'),(7,'test','da9d630b967d7838f404957cb79b7c27');
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

-- Dump completed on 2018-06-09 12:10:11
