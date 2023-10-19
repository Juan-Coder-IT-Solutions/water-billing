# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: water_billing_db
# Generation Time: 2023-10-19 02:44:25 +0000
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
	(6,'VBCBCVB DFG','CVBCVBCVFGD DFGDFG DFG','2023-09-29 09:47:29'),
	(8,'LJKLJKL','HJKHJK FGHRTYERGDFG','2023-09-29 09:47:44');

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
  `previous_reading` int(11) NOT NULL,
  `curren_reading` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '' COMMENT 'U = UNPAID, P = PAID',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_bills` WRITE;
/*!40000 ALTER TABLE `tbl_bills` DISABLE KEYS */;

INSERT INTO `tbl_bills` (`bill_id`, `user_id`, `previous_bill`, `present_bill`, `previous_reading`, `curren_reading`, `status`, `date_added`)
VALUES
	(1,27,1001.00,20001.00,0,0,'U','2023-09-29 11:26:19'),
	(3,27,12.00,13.00,0,0,'U','2023-10-11 11:56:09'),
	(4,29,1.00,2.00,0,0,'P','2023-10-11 13:30:27');

/*!40000 ALTER TABLE `tbl_bills` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `tbl_feedbacks` WRITE;
/*!40000 ALTER TABLE `tbl_feedbacks` DISABLE KEYS */;

INSERT INTO `tbl_feedbacks` (`feedback_id`, `user_id`, `feedback_content`, `date_added`)
VALUES
	(1,1,'qwe wqeqw123','2023-09-29 09:59:12'),
	(2,28,'1 STAR KY DAW KAPE ANG TUBIG','2023-09-29 10:03:18'),
	(4,28,'LAW AY KLASE SERBISYO!','2023-09-29 10:13:35'),
	(5,27,'WATER IS VERY DIRTY EWEYYY','2023-10-02 14:39:06');

/*!40000 ALTER TABLE `tbl_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_system_charges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_system_charges`;

CREATE TABLE `tbl_system_charges` (
  `system_charge_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_type` varchar(11) NOT NULL DEFAULT '' COMMENT 'R = RESIDENTIAL, C= COMMECRCIAL',
  `system_charge_name` varchar(75) NOT NULL DEFAULT '',
  `amount` decimal(12,5) NOT NULL,
  `kwh` decimal(12,5) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`system_charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_system_charges` WRITE;
/*!40000 ALTER TABLE `tbl_system_charges` DISABLE KEYS */;

INSERT INTO `tbl_system_charges` (`system_charge_id`, `customer_type`, `system_charge_name`, `amount`, `kwh`, `date_added`)
VALUES
	(1,'R','General Services',10.00000,1.00000,'2023-10-19 10:28:50'),
	(3,'C','wews',2.00000,3.00000,'2023-10-19 10:37:33');

/*!40000 ALTER TABLE `tbl_system_charges` ENABLE KEYS */;
UNLOCK TABLES;


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
  `customer_type` varchar(1) NOT NULL DEFAULT '' COMMENT 'R = RESIDENTIAL, C= COMMECRCIAL',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;

INSERT INTO `tbl_users` (`user_id`, `account_number`, `user_fname`, `user_mname`, `user_lname`, `address`, `contact_number`, `username`, `password`, `user_category`, `customer_type`, `date_added`)
VALUES
	(1,'000001','Juan','Mahusay','Dela Cruz','Purok Banago Barangay Bacolod','09123456789','admin','0cc175b9c0f1b6a831c399e269772661','A','','2023-09-28 15:27:35'),
	(27,'000027','Pedo','Penduko','Aquino','test address','123456789','pedro','0cc175b9c0f1b6a831c399e269772661','C','R','2023-09-28 14:21:09'),
	(28,'000028','Jun','Mangilog','Magsaysay','','','jun','0cc175b9c0f1b6a831c399e269772661','M','','2023-09-28 14:23:11'),
	(29,'000029','Rino','Questo','Cartoons','EAST HOMES 69','09123654789','rino','827ccb0eea8a706c4c34a16891f84e7b','C','C','2023-10-11 11:45:30'),
	(30,'000030','Q','Q','Q','Q','Q','Q','f09564c9ca56850d4cd6b3319e541aee','C','R','2023-10-19 09:41:58');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
