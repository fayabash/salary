# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: localhost (MySQL 5.5.25)
# Base de données: troisfoi_salary
# Temps de génération: 2013-02-20 17:01:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `avs_number` varchar(45) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employees_genders1` (`gender_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `gender_id`, `name`, `lastname`, `avs_number`, `address`)
VALUES
	(1,2,'Antoine','Wallef','110.110','Montagibert 6\r\n1005 Lausanne');

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table genders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genders`;

CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;

INSERT INTO `genders` (`id`, `name`, `parent_id`, `lft`, `rght`)
VALUES
	(1,'Human',NULL,1,6),
	(2,'Male',1,2,3),
	(3,'Female',1,4,5);

/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`)
VALUES
	(1,'admin');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table holders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `holders`;

CREATE TABLE `holders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `holders` WRITE;
/*!40000 ALTER TABLE `holders` DISABLE KEYS */;

INSERT INTO `holders` (`id`, `name`)
VALUES
	(1,'employee'),
	(2,'company');

/*!40000 ALTER TABLE `holders` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table salaries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salaries`;

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `net_fee` varchar(45) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company_cost` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_salaries_employees1` (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Affichage de la table taxe_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `taxe_types`;

CREATE TABLE `taxe_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `taxe_types` WRITE;
/*!40000 ALTER TABLE `taxe_types` DISABLE KEYS */;

INSERT INTO `taxe_types` (`id`, `name`)
VALUES
	(1,'AVS/AI/APG'),
	(2,'AC - assurance-chômage'),
	(3,'Cotisation PC-familles et rente-pont (LPCfam)'),
	(4,'Frais admin'),
	(5,'AF - allocations familiales');

/*!40000 ALTER TABLE `taxe_types` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table taxes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `taxes`;

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` varchar(45) NOT NULL,
  `holder_id` int(11) NOT NULL,
  `taxe_type_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Taxes_holders` (`holder_id`),
  KEY `fk_Taxes_taxe_types1` (`taxe_type_id`),
  KEY `fk_Taxes_genders1` (`gender_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;

INSERT INTO `taxes` (`id`, `name`, `rate`, `holder_id`, `taxe_type_id`, `gender_id`)
VALUES
	(1,'AVS','4.2',2,1,1),
	(2,'AI','0.7',2,1,1),
	(3,'APG','0.25',2,1,1),
	(4,'AC','1.1',2,2,1),
	(5,'AF','1.95',2,5,1),
	(6,'PC','0.06',2,3,1),
	(7,'Frais Admin fPV','0.17',2,4,1),
	(8,'AVS','4.2',1,1,1),
	(9,'AI','0.7',1,1,1),
	(10,'APG','0.25',1,1,1),
	(11,'AC','1.1',1,2,1),
	(12,'PC','0.06',1,3,1);

/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups1` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `group_id`)
VALUES
	(1,'antoine@3xw.ch','6e6a809788782649d7235b06ebe7f3c9f7f9ec27',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
