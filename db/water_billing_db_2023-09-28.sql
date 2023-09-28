# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: water_billing_db
# Generation Time: 2023-09-28 08:15:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_announcements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_announcements`;

CREATE TABLE `tbl_announcements` (
  `announcement_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(75) NOT NULL DEFAULT '',
  `announcement_content` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_announcements` WRITE;
/*!40000 ALTER TABLE `tbl_announcements` DISABLE KEYS */;

INSERT INTO `tbl_announcements` (`announcement_id`, `announcement_title`, `announcement_content`, `date_added`)
VALUES
	(1,'PANAGTAG BUGAS 2 KILO','BAWAL PULAHAN!!!!!!!!!','2023-09-28 15:20:54'),
	(4,'qwe','qweqweqweqweqw qweqweqweqweqw','2023-09-28 16:11:09');

/*!40000 ALTER TABLE `tbl_announcements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_bills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_bills`;

CREATE TABLE `tbl_bills` (
  `bill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `previous_bill` decimal(9,2) NOT NULL,
  `present_bill` decimal(9,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_feedbacks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_feedbacks`;

CREATE TABLE `tbl_feedbacks` (
  `feedback_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feedback_content` varchar(150) NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` varchar(10) NOT NULL DEFAULT '',
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL DEFAULT '',
  `contact_number` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_category` varchar(1) NOT NULL DEFAULT '' COMMENT 'A = ADMIN, C = USER or CUSTOMER, M = METER READER',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;

INSERT INTO `tbl_users` (`user_id`, `account_number`, `user_fname`, `user_mname`, `user_lname`, `address`, `contact_number`, `username`, `password`, `user_category`, `date_added`)
VALUES
	(1,'000001','Juan','Mahusay','Dela Cruz','Purok Banago Barangay Bacolod','09123456789','admin','0cc175b9c0f1b6a831c399e269772661','A','2023-09-28 15:27:35'),
	(27,'000027','Pedo','Penduko','Aquino','','','pedro','0cc175b9c0f1b6a831c399e269772661','C','2023-09-28 14:21:09'),
	(28,'000028','Jun','Mahusay','Aquino','','','jun','0cc175b9c0f1b6a831c399e269772661','M','2023-09-28 14:23:11');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
