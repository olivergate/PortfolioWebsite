# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.41)
# Database: portfolio_db
# Generation Time: 2018-10-02 15:53:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table portfolio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delete` tinyint(1) unsigned DEFAULT '1',
  `project_name` varchar(255) DEFAULT NULL,
  `image_file_name` varchar(255) DEFAULT NULL,
  `hover_text` varchar(10000) DEFAULT NULL,
  `project_url` varchar(555) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;

INSERT INTO `portfolio` (`id`, `delete`, `project_name`, `image_file_name`, `hover_text`, `project_url`)
VALUES
	(1,1,'CSS Logo Mimic','img/mayden.jpg','Have a look','https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/'),
	(2,1,'Coming soon','img/mayden.jpg','Coming soon',NULL),
	(3,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(4,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(5,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(6,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(7,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(8,1,'Coming Soon','img/mayden.jpg','Coming Soon',NULL),
	(9,0,'Coming Soon','img/mayden.jpg','Coming Soon',NULL);

/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table text_input
# ------------------------------------------------------------

DROP TABLE IF EXISTS `text_input`;

CREATE TABLE `text_input` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `location_description` varchar(255) DEFAULT NULL,
  `visibility` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `content` varchar(10000) DEFAULT NULL,
  `url_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `text_input` WRITE;
/*!40000 ALTER TABLE `text_input` DISABLE KEYS */;

INSERT INTO `text_input` (`id`, `location_description`, `visibility`, `content`, `url_name`)
VALUES
	(1,'hero_statement',1,'Transparency in design ',NULL),
	(2,'about_me1',1,'Having done a BA in Philosophy, Oliver has diverse lateral thinking and logical skills and is adept at concept appraisal and management which aid him as a programmer and part of a team. He aspires to study the philosophy of programming, aiming at an ethical response to the developing challenges within technology. ',NULL);

/*!40000 ALTER TABLE `text_input` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
