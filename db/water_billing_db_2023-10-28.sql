# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Database: water_billing_db
# Generation Time: 2023-10-28 00:45:29 +0000
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
  `user_id` int(11) NOT NULL,
  `announcement_title` varchar(75) NOT NULL DEFAULT '',
  `announcement_content` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_announcements` WRITE;
/*!40000 ALTER TABLE `tbl_announcements` DISABLE KEYS */;

INSERT INTO `tbl_announcements` (`announcement_id`, `user_id`, `announcement_title`, `announcement_content`, `date_added`)
VALUES
	(1,1,'PANAGTAG BUGAS 2 KILO','BAWAL PULAHAN!!!!!!!!!','2023-09-28 15:20:54'),
	(6,27,'VBCBCVB DFG','CVBCVBCVFGD DFGDFG DFG','2023-09-29 09:47:29'),
	(8,1,'LJKLJKL','HJKHJK FGHRTYERGDFG','2023-09-29 09:47:44'),
	(9,1,'qwe qweqe q qwe','qweqwewqe qwewe qweqweqweq qweweqweqweqwe','2023-10-19 16:20:25');

/*!40000 ALTER TABLE `tbl_announcements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_bills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_bills`;

CREATE TABLE `tbl_bills` (
  `bill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `previous_reading` int(11) NOT NULL,
  `current_reading` int(11) NOT NULL,
  `cubic_meter_rate` decimal(9,5) NOT NULL,
  `maximum_cubic` int(11) NOT NULL,
  `minimum_rate` decimal(9,5) NOT NULL,
  `penalty_amount` decimal(9,5) NOT NULL,
  `billing_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '' COMMENT 'S = SAVED, P = PAID',
  `encoded_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_bills` WRITE;
/*!40000 ALTER TABLE `tbl_bills` DISABLE KEYS */;

INSERT INTO `tbl_bills` (`bill_id`, `user_id`, `previous_reading`, `current_reading`, `cubic_meter_rate`, `maximum_cubic`, `minimum_rate`, `penalty_amount`, `billing_date`, `due_date`, `status`, `encoded_by`, `date_added`)
VALUES
	(12,31,0,10,25.00000,10,200.00000,5.00000,'2023-10-24','2023-11-03','S',1,'2023-10-24 15:31:53'),
	(13,29,0,20,10.00000,5,150.00000,3.00000,'2023-10-24','2023-11-30','S',1,'2023-10-24 15:37:51'),
	(15,29,20,5,10.00000,5,150.00000,3.00000,'2023-11-01','2023-12-31','S',1,'2023-10-27 15:42:05'),
	(16,29,5,10,10.00000,5,150.00000,3.00000,'2023-08-27','2023-09-30','S',1,'2023-10-27 15:47:15');

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
	(2,28,'1 STAR KY DAW KAPE ANG TUBIG','2023-09-29 10:03:18'),
	(4,28,'LAW AY KLASE SERBISYO!','2023-09-29 10:13:35'),
	(5,27,'WATER IS VERY DIRTY EWEYYY','2023-10-02 14:39:06');

/*!40000 ALTER TABLE `tbl_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_payments`;

CREATE TABLE `tbl_payments` (
  `payment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `payment_amount` decimal(9,5) NOT NULL,
  `payment_date` date NOT NULL,
  `encoded_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;

INSERT INTO `tbl_payments` (`payment_id`, `bill_id`, `payment_amount`, `payment_date`, `encoded_by`, `date_added`)
VALUES
	(2,0,2.00000,'0000-00-00',1,'2023-10-19 16:12:49'),
	(3,0,2.00000,'0000-00-00',1,'2023-10-19 16:13:09'),
	(4,0,0.00000,'0000-00-00',1,'2023-10-19 16:13:11'),
	(9,7,2.00000,'0000-00-00',1,'2023-10-19 16:40:03'),
	(11,7,20.00000,'0000-00-00',1,'2023-10-19 16:43:18'),
	(13,12,100.00000,'2023-10-28',1,'2023-10-28 08:13:19'),
	(16,16,50.00000,'2023-09-29',1,'2023-10-28 08:39:40');

/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_system_charges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_system_charges`;

CREATE TABLE `tbl_system_charges` (
  `system_charge_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `due_day_of_the_month` int(2) NOT NULL,
  `customer_type` varchar(11) NOT NULL DEFAULT '' COMMENT 'R = RESIDENTIAL, C= COMMECRCIAL',
  `cubic_meter_rate` decimal(9,5) NOT NULL,
  `maximum_cubic` int(11) NOT NULL,
  `minimum_rate` decimal(9,5) NOT NULL,
  `late_penalty_amount` decimal(9,5) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`system_charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_system_charges` WRITE;
/*!40000 ALTER TABLE `tbl_system_charges` DISABLE KEYS */;

INSERT INTO `tbl_system_charges` (`system_charge_id`, `due_day_of_the_month`, `customer_type`, `cubic_meter_rate`, `maximum_cubic`, `minimum_rate`, `late_penalty_amount`, `date_added`)
VALUES
	(6,3,'R',25.00000,10,200.00000,5.00000,'2023-10-19 12:30:04'),
	(7,31,'C',10.00000,5,150.00000,3.00000,'2023-10-19 12:37:32');

/*!40000 ALTER TABLE `tbl_system_charges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` varchar(10) NOT NULL DEFAULT '',
  `meter_number` varchar(50) NOT NULL DEFAULT '',
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

INSERT INTO `tbl_users` (`user_id`, `account_number`, `meter_number`, `user_fname`, `user_mname`, `user_lname`, `address`, `contact_number`, `username`, `password`, `user_category`, `customer_type`, `date_added`)
VALUES
	(1,'000001','','Juan','Mahusay','Dela Cruz','Purok Banago Barangay Bacolod','09123456789','admin','0cc175b9c0f1b6a831c399e269772661','A','','2023-09-28 15:27:35'),
	(27,'000027','','Pedo','Penduko','Aquino','test address','123456789','pedro','0cc175b9c0f1b6a831c399e269772661','A','R','2023-09-28 14:21:09'),
	(28,'000028','','Jun','Mangilog','Magsaysay','','','jun','0cc175b9c0f1b6a831c399e269772661','M','','2023-09-28 14:23:11'),
	(29,'000029','wewewe','Rino','Questo','Cartoons','EAST HOMES 69','09123654789','rino','827ccb0eea8a706c4c34a16891f84e7b','C','C','2023-10-11 11:45:30'),
	(30,'000030','2323wew','Q','Q','Q','Q','Q','Q','f09564c9ca56850d4cd6b3319e541aee','C','R','2023-10-19 09:41:58'),
	(31,'000031','12345','t','t','t','t','t','t','e358efa489f58062f10dd7316b65649e','C','R','2023-10-19 11:29:31');

/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
