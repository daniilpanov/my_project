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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'меню 1',0,NULL),(2,'меню 2',0,NULL),(3,'меню 3',0,NULL),(4,'меню 4',0,NULL),(5,'меню 5',0,NULL),(6,'меню 6',0,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `name` varchar(255) DEFAULT NULL,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `image_width` int(4) DEFAULT '250',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'1','<center><u>Главная новость!!!</u></center>','first',1504795508,NULL,NULL,'12',NULL,NULL),(2,'2','На разработку God of War ушло пять лет, в течение которых создатели смогли буквально переродить популярную серию. Воинственный и жестокий Кратос стал мягче и человечнее, Древняя Греция сменилась суровой и холодной Скандинавией, а с технической точки зрения игру и вовсе называют новым эталоном в индустрии. Пресса уже оценила старания Santa Monica Studio, так что её коллектив может расслабленно выдохнуть и заняться своими делами. Вместо этого Кори Барлог, который явно очень сильно переживает за судьбу своего детища, решил ещё раз обратиться к фанатам.\r\n\r\nГеймдизайнер выпустил ролик со своей личной реакцией на первые оценки своего детища. Безоговорочное признание критиков настолько растрогало Барлога, что он не смог удержать слёз. Это видео художник планировал оставить для себя, но на публикацию его подтолкнул сын, который порой уходит в себя. Отец хотел показать ребёнку, что грустить и давать волю эмоциям — нормально, даже если ты делаешь это перед всем миром.\r\n\r\nНовая God of War добралась до полок лишь сегодня, 20 апреля. Готовьтесь выделить неделю-другую на погружение в игру — приключение Кратоса обещает быть невероятно интересным и долгим. А для тех, кто всё ещё сомневается в том, что смена антуража пошла на пользу брутальным экшену, редакция 4PDA приготовила подробный путеводитель по метаморфозам игры.','Оценки критиков довели создателя God of War до слёз',1504795508,NULL,NULL,'Кори Барлог, автор фэнтезийного экшена God of War, показал невероятно трогательное видео в честь выхода своего творения. После восхищённых отзывов критиков в успехе нового приключения Кратоса мало кто сомневается, но 95 баллам на Metacritic предшествовал долгий и тяжёлый путь. И теперь, в момент заслуженного триумфа, команда Santa Monica Studio может вздохнуть с облегчением — и поделиться своей реакцией на успех.','img/cr9XSZ18pXGP4z2qz1VQ1z1EDRpz0WV6ulqcD8Y0.jpg',300);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `content` text,
  `title` varchar(255) DEFAULT NULL,
  `created` int(255) NOT NULL,
  `updated` int(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `icon_size` varchar(255) DEFAULT NULL,
  `menu_number` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_menu_name_uindex` (`menu_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Главная','Контент главной страницы','Главная',1504795508,NULL,'',NULL,NULL,NULL,1),(2,'Пример','Пример страницы 1','Пример',1504795508,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','da9d630b967d7838f404957cb79b7c27');
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

-- Dump completed on 2018-04-21 12:05:07
