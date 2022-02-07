# ************************************************************
# Sequel Ace SQL dump
# Version 20025
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.6.5-MariaDB-1:10.6.5+maria~focal)
# Database: jordan-collection
# Generation Time: 2022-02-07 14:09:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table records
# ------------------------------------------------------------

DROP TABLE IF EXISTS `records`;

CREATE TABLE `records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `albumName` varchar(255) NOT NULL DEFAULT '',
  `artistName` varchar(255) NOT NULL DEFAULT '',
  `genre` enum('alternative','blues','classical','comedy','country','disco','electronic','folk','funk','hip-hop','house','indie','jazz','metal','new wave','nu-soul','pop','psychedelic','punk','rock','r&b','reggae','soul','spoken word','techno') NOT NULL,
  `purchaseDate` date DEFAULT NULL,
  `albumImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;

INSERT INTO `records` (`id`, `albumName`, `artistName`, `genre`, `purchaseDate`, `albumImage`)
VALUES
	(1,'Doolittle','Pixies','alternative','2017-12-25','https://upload.wikimedia.org/wikipedia/en/6/6b/Pixies-Doolittle.jpg'),
	(2,'Vaudeville Villain','Viktor Vaughn','hip-hop','2019-10-25','https://upload.wikimedia.org/wikipedia/en/4/48/Vaudevillevillain.jpg'),
	(3,'A Love Supreme','John Coltrane','jazz','2019-01-17','https://upload.wikimedia.org/wikipedia/en/9/9a/John_Coltrane_-_A_Love_Supreme.jpg'),
	(4,'Ptah, the El Daoud','Alice Coltrane','jazz','2020-05-10','https://upload.wikimedia.org/wikipedia/en/1/19/Ptah%2C_the_El_Daoud_%28Alice_Coltrane%29.jpg'),
	(5,'Winter in America','Gil Scott-Heron and Brian Jackson','soul',NULL,'https://upload.wikimedia.org/wikipedia/en/f/fa/Winter_In_America.jpg'),
	(6,'Hard Groove','The RH Factor','nu-soul',NULL,'https://m.media-amazon.com/images/I/71Pf5ye4kpL._AC_SL1200_.jpg'),
	(7,'The Soul Album','Otis Reading','soul',NULL,'https://upload.wikimedia.org/wikipedia/en/2/23/Otis_Redding_-_The_Soul_Album_cover.JPG'),
	(8,'Hail To The Thief','Radiohead','alternative','2013-05-10','https://upload.wikimedia.org/wikipedia/en/6/61/Radioheadhailtothethief.png'),
	(9,'Loaded','The Velvet Underground','rock',NULL,'https://upload.wikimedia.org/wikipedia/en/7/71/Loadedalbum.jpg'),
	(10,'Rounds','Four Tet','electronic',NULL,'https://upload.wikimedia.org/wikipedia/en/6/6d/Four_Tet_-_Rounds.jpg');

/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
