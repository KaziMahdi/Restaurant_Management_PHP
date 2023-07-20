-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema test
--

CREATE DATABASE IF NOT EXISTS test;
USE test;

--
-- Temporary table structure for view `admin_report_view`
--
DROP TABLE IF EXISTS `admin_report_view`;
DROP VIEW IF EXISTS `admin_report_view`;

--
-- Temporary table structure for view `show_menus_report`
--
DROP TABLE IF EXISTS `show_menus_report`;
DROP VIEW IF EXISTS `show_menus_report`;

--
-- Temporary table structure for view `user_mobile_view`
--
DROP TABLE IF EXISTS `user_mobile_view`;
DROP VIEW IF EXISTS `user_mobile_view`;

--
-- Temporary table structure for view `user_report`
--
DROP TABLE IF EXISTS `user_report`;
DROP VIEW IF EXISTS `user_report`;

--
-- Definition of table `abc`
--

DROP TABLE IF EXISTS `abc`;
CREATE TABLE `abc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc`
--

/*!40000 ALTER TABLE `abc` DISABLE KEYS */;
INSERT INTO `abc` (`id`,`name`,`type`) VALUES 
 (1,'Jahid',1);
/*!40000 ALTER TABLE `abc` ENABLE KEYS */;


--
-- Definition of table `ac_trans`
--

DROP TABLE IF EXISTS `ac_trans`;
CREATE TABLE `ac_trans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned NOT NULL,
  `amount` float NOT NULL,
  `memo` varchar(45) NOT NULL,
  `trans_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_trans`
--

/*!40000 ALTER TABLE `ac_trans` DISABLE KEYS */;
INSERT INTO `ac_trans` (`id`,`account_id`,`amount`,`memo`,`trans_datetime`) VALUES 
 (1,1,100000,'deposit','0000-00-00 00:00:00'),
 (2,2,50000,'deposit','0000-00-00 00:00:00'),
 (3,1,-50000,'withdraw','0000-00-00 00:00:00'),
 (4,1,-10000,'withdraw','2020-07-10 00:00:00'),
 (5,1,500000,'Loan','2020-07-10 00:00:00');
/*!40000 ALTER TABLE `ac_trans` ENABLE KEYS */;


--
-- Definition of table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE `admission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `course_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

/*!40000 ALTER TABLE `admission` DISABLE KEYS */;
INSERT INTO `admission` (`id`,`student_id`,`course_id`,`created_at`) VALUES 
 (1,1,1,'2020-10-04 18:52:38'),
 (2,2,1,'2020-10-04 18:52:38'),
 (3,1,2,'2020-10-04 18:52:39');
/*!40000 ALTER TABLE `admission` ENABLE KEYS */;


--
-- Definition of table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`,`name`) VALUES 
 (1,'Dhaka'),
 (2,'Khulna'),
 (3,'Barishal'),
 (4,'Rajshaihi');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


--
-- Definition of table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `author` varchar(45) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `photo` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`,`title`,`subject_id`,`author`,`isbn`,`photo`) VALUES 
 (2,'Introducing Mathematics',1,'ABC','234234','introducing-mathematics.jpg'),
 (3,'Windows Application Development using C#.NET',2,'ABC3333434','234234','windows-application-development-using-c-net.PNG'),
 (4,'Windows Application Development using  Python',1,'ABC','234234','windows-application-development-using-python.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


--
-- Definition of table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_number` varchar(45) NOT NULL,
  `offence` varchar(45) NOT NULL,
  `victim` varchar(45) NOT NULL,
  `accuser` varchar(45) NOT NULL,
  `case_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` (`id`,`case_number`,`offence`,`victim`,`accuser`,`case_at`) VALUES 
 (2,'343433222','Stole','Kamalsfsadfsaf','Jahid','2021-01-01 00:00:00');
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;


--
-- Definition of table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`,`name`) VALUES 
 (1,'Sari'),
 (2,'Fish');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


--
-- Definition of table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE `children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `age` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` (`id`,`name`,`age`) VALUES 
 (3,'Munna',3),
 (6,'Raju',44),
 (7,'Banana33',3);
/*!40000 ALTER TABLE `children` ENABLE KEYS */;


--
-- Definition of table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`,`name`,`state_id`) VALUES 
 (1,'Dhaka',1),
 (2,'Khulna',1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


--
-- Definition of table `city2`
--

DROP TABLE IF EXISTS `city2`;
CREATE TABLE `city2` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `name` varchar(45) NOT NULL,
  `state_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city2`
--

/*!40000 ALTER TABLE `city2` DISABLE KEYS */;
INSERT INTO `city2` (`id`,`name`,`state_id`) VALUES 
 (1,'Dhaka',1),
 (2,'Khulna',1);
/*!40000 ALTER TABLE `city2` ENABLE KEYS */;


--
-- Definition of table `core_categories`
--

DROP TABLE IF EXISTS `core_categories`;
CREATE TABLE `core_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_categories`
--

/*!40000 ALTER TABLE `core_categories` DISABLE KEYS */;
INSERT INTO `core_categories` (`id`,`name`,`section_id`,`created_at`,`updated_at`) VALUES 
 (2,'Vegetables',3,'2022-01-11 12:46:24',NULL),
 (3,'Fish',3,'2022-01-11 12:46:24',NULL),
 (4,'Drugs',3,'2022-01-11 12:46:24',NULL),
 (5,'Cameras',1,'2022-01-11 12:46:24',NULL),
 (6,'Computers, Tablets & Laptops',1,'2022-01-11 12:46:24',NULL),
 (7,'Mobile Phone',1,'2022-01-11 12:46:24',NULL),
 (8,'Sound & Vision',1,'2022-01-11 12:46:24',NULL),
 (9,'Women\'s',2,'2022-01-11 12:46:24',NULL),
 (10,'Men\'s',2,'2022-01-11 12:46:24',NULL),
 (11,'Kids',2,'2022-01-11 12:46:24',NULL),
 (12,'Cosmatics',4,'2022-01-11 12:46:24',NULL);
/*!40000 ALTER TABLE `core_categories` ENABLE KEYS */;


--
-- Definition of table `core_customers`
--

DROP TABLE IF EXISTS `core_customers`;
CREATE TABLE `core_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_customers`
--

/*!40000 ALTER TABLE `core_customers` DISABLE KEYS */;
INSERT INTO `core_customers` (`id`,`name`,`mobile`,`email`,`created_at`,`updated_at`) VALUES 
 (1,'Jahidul Islam','45345435435','jahid@yahoo.com','2021-12-14 12:43:13','2021-12-14 12:43:13'),
 (2,'Rejaul Karim','4353445546','Reza@yahoo.com','2021-12-14 12:43:13','2021-12-14 12:43:13'),
 (3,'Niyamot','3434343','niyamot@yahoo.com','2021-12-14 06:44:25','2021-12-14 06:44:25');
/*!40000 ALTER TABLE `core_customers` ENABLE KEYS */;


--
-- Definition of table `core_departments`
--

DROP TABLE IF EXISTS `core_departments`;
CREATE TABLE `core_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_departments`
--

/*!40000 ALTER TABLE `core_departments` DISABLE KEYS */;
INSERT INTO `core_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','Accounts'),
 (2,'20','IT'),
 (3,'30','HR'),
 (4,'40','Sales and Marketing');
/*!40000 ALTER TABLE `core_departments` ENABLE KEYS */;


--
-- Definition of table `core_district`
--

DROP TABLE IF EXISTS `core_district`;
CREATE TABLE `core_district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `division_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_district`
--

/*!40000 ALTER TABLE `core_district` DISABLE KEYS */;
INSERT INTO `core_district` (`id`,`name`,`division_id`) VALUES 
 (1,'Narayangang',1),
 (2,'Nonakhali',3),
 (3,'Feni',3),
 (4,'Tingile',1),
 (5,'Gajipur',1),
 (6,'Potuakhali',2),
 (7,'Dhaka',1);
/*!40000 ALTER TABLE `core_district` ENABLE KEYS */;


--
-- Definition of table `core_division`
--

DROP TABLE IF EXISTS `core_division`;
CREATE TABLE `core_division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_division`
--

/*!40000 ALTER TABLE `core_division` DISABLE KEYS */;
INSERT INTO `core_division` (`id`,`name`) VALUES 
 (1,'Dhaka'),
 (2,'Borishal'),
 (3,'Chottrogram');
/*!40000 ALTER TABLE `core_division` ENABLE KEYS */;


--
-- Definition of table `core_heros`
--

DROP TABLE IF EXISTS `core_heros`;
CREATE TABLE `core_heros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_heros`
--

/*!40000 ALTER TABLE `core_heros` DISABLE KEYS */;
INSERT INTO `core_heros` (`id`,`name`) VALUES 
 (1,'Asia Rahmaneee'),
 (45,'Jahidul Islamee'),
 (49,'Asia Rahman');
/*!40000 ALTER TABLE `core_heros` ENABLE KEYS */;


--
-- Definition of table `core_manufacturers`
--

DROP TABLE IF EXISTS `core_manufacturers`;
CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_manufacturers`
--

/*!40000 ALTER TABLE `core_manufacturers` DISABLE KEYS */;
INSERT INTO `core_manufacturers` (`id`,`name`) VALUES 
 (1,'APCL'),
 (2,'ISL'),
 (3,'IDB');
/*!40000 ALTER TABLE `core_manufacturers` ENABLE KEYS */;


--
-- Definition of trigger `ad_manufacturer`
--

DROP TRIGGER /*!50030 IF EXISTS */ `ad_manufacturer`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `ad_manufacturer` AFTER DELETE ON `core_manufacturers` FOR EACH ROW begin
  delete from menus where mfg_id=old.id;
end $$

DELIMITER ;

--
-- Definition of table `core_order_details`
--

DROP TABLE IF EXISTS `core_order_details`;
CREATE TABLE `core_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_order_details`
--

/*!40000 ALTER TABLE `core_order_details` DISABLE KEYS */;
INSERT INTO `core_order_details` (`id`,`order_id`,`menu_id`,`qty`,`price`,`vat`,`discount`,`created_at`,`updated_at`) VALUES 
 (1,1,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (2,1,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (3,2,18,4,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (4,2,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (5,3,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (6,3,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (7,4,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (8,4,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (9,5,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (10,14,18,1,30,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (11,14,17,1,15,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (12,15,18,1,40,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (13,15,17,2,16,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (14,16,28,1,5000,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (15,16,29,1,342,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (16,17,29,1,342,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (17,17,28,1,5000,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,17,20,1,110,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (19,18,28,10,5000,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (20,19,30,1,7999,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (21,19,31,1,4444,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (22,19,20,1,110,0,0,'2022-01-08 09:05:55','2022-01-08 09:05:55'),
 (23,20,29,1,342,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (24,20,20,1,110,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (25,20,30,1,7999,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (26,20,32,1,5555,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (27,21,29,1,342,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (28,21,28,1,5000,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (29,21,31,1,4444,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (30,21,32,2,5555,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (31,21,30,1,7999,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (32,21,20,1,110,0,0,'2022-01-08 09:07:28','2022-01-08 09:07:28');
/*!40000 ALTER TABLE `core_order_details` ENABLE KEYS */;


--
-- Definition of table `core_orders`
--

DROP TABLE IF EXISTS `core_orders`;
CREATE TABLE `core_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_orders`
--

/*!40000 ALTER TABLE `core_orders` DISABLE KEYS */;
INSERT INTO `core_orders` (`id`,`customer_id`,`order_date`,`delivery_date`,`shipping_address`,`order_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`,`created_at`,`updated_at`) VALUES 
 (1,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (2,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (3,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (4,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (5,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (6,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:01:16','2021-12-14 07:01:16'),
 (7,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:02:07','2021-12-14 07:02:07'),
 (8,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:03:51','2021-12-14 07:03:51'),
 (9,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:05:32','2021-12-14 07:05:32'),
 (10,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:06:21','2021-12-14 07:06:21'),
 (11,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:07:13','2021-12-14 07:07:13'),
 (12,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:10:25','2021-12-14 07:10:25'),
 (13,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:13:06','2021-12-14 07:13:06'),
 (14,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (15,3,'2021-12-15 00:00:00','2021-12-15 00:00:00','Rampura',0,0,'Testing',1,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (16,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (17,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (19,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (20,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (21,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27');
/*!40000 ALTER TABLE `core_orders` ENABLE KEYS */;


--
-- Definition of table `core_persons`
--

DROP TABLE IF EXISTS `core_persons`;
CREATE TABLE `core_persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_persons`
--

/*!40000 ALTER TABLE `core_persons` DISABLE KEYS */;
INSERT INTO `core_persons` (`id`,`name`,`position_id`,`sex`,`dob`,`doj`,`mobile`,`address`,`inactive`) VALUES 
 (1,'Jahidul Islam',1,0,'2000-01-01','2021-01-01','677657657567','Rampura',0);
/*!40000 ALTER TABLE `core_persons` ENABLE KEYS */;


--
-- Definition of table `core_positions`
--

DROP TABLE IF EXISTS `core_positions`;
CREATE TABLE `core_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_positions`
--

/*!40000 ALTER TABLE `core_positions` DISABLE KEYS */;
INSERT INTO `core_positions` (`id`,`name`,`grade`,`department_id`) VALUES 
 (1,'Programmer',6,2),
 (2,'System Analyst',3,1);
/*!40000 ALTER TABLE `core_positions` ENABLE KEYS */;


--
-- Definition of table `core_menu_group_details`
--

DROP TABLE IF EXISTS `core_menu_group_details`;
CREATE TABLE `core_menu_group_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_menu_group_details`
--

/*!40000 ALTER TABLE `core_menu_group_details` DISABLE KEYS */;
INSERT INTO `core_menu_group_details` (`id`,`group_id`,`menu_id`,`created_at`,`updated_at`) VALUES 
 (1,1,20,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (2,1,28,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (3,1,29,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (4,1,30,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (5,2,31,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (6,2,31,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (7,2,20,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (8,2,28,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (9,3,29,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (10,3,30,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (11,3,31,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (12,3,20,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (13,4,28,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (14,4,29,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (15,4,30,'2022-01-08 00:00:00','2022-01-08 00:00:00'),
 (16,4,31,'2022-01-08 00:00:00','2022-01-08 00:00:00');
/*!40000 ALTER TABLE `core_menu_group_details` ENABLE KEYS */;


--
-- Definition of table `core_menu_group_sections`
--

DROP TABLE IF EXISTS `core_menu_group_sections`;
CREATE TABLE `core_menu_group_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_menu_group_sections`
--

/*!40000 ALTER TABLE `core_menu_group_sections` DISABLE KEYS */;
INSERT INTO `core_menu_group_sections` (`id`,`name`) VALUES 
 (1,'Feature menus');
/*!40000 ALTER TABLE `core_menu_group_sections` ENABLE KEYS */;


--
-- Definition of table `core_menu_groups`
--

DROP TABLE IF EXISTS `core_menu_groups`;
CREATE TABLE `core_menu_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `group_section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_menu_groups`
--

/*!40000 ALTER TABLE `core_menu_groups` DISABLE KEYS */;
INSERT INTO `core_menu_groups` (`id`,`name`,`created_at`,`updated_at`,`group_section_id`) VALUES 
 (1,'Featured Item group - 1','2022-01-08 00:00:00','2022-01-08 00:00:00',1),
 (2,'Featured Item group - 2','2022-01-08 00:00:00','2022-01-08 00:00:00',1),
 (3,'Featured Item group - 3','2022-01-08 00:00:00','2022-01-08 00:00:00',1),
 (4,'Featured Item group - 4','2022-01-08 00:00:00','2022-01-08 00:00:00',1);
/*!40000 ALTER TABLE `core_menu_groups` ENABLE KEYS */;


--
-- Definition of table `core_menus`
--

DROP TABLE IF EXISTS `core_menus`;
CREATE TABLE `core_menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) unsigned DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) unsigned NOT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_barcode` (`barcode`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_menus`
--

/*!40000 ALTER TABLE `core_menus` DISABLE KEYS */;
INSERT INTO `core_menus` (`id`,`name`,`offer_price`,`manufacturer_id`,`regular_price`,`description`,`photo`,`category_id`,`section_id`,`is_featured`,`star`,`is_brand`,`offer_discount`,`uom_id`,`weight`,`barcode`,`created_at`,`updated_at`) VALUES 
 (36,'Brown Borka',2500,1,3000,'Brown Borka Cotton','36.jpg',1,1,1,5,1,0,1,0,'4456342342','2022-01-11 04:57:43','2022-01-11 04:57:43'),
 (40,'Red Apple',222,1,222,'Red Apple','red-apple.jpg',2,3,NULL,NULL,NULL,NULL,2,2,'34242323','2022-01-12 06:45:35','2022-01-12 06:45:35'),
 (42,'Yellow Kurti',90000,3,70000,'Yellow Kurti','yellow-kurti.jpg',6,1,1,4,1,23,3,0,'4325364','2022-01-13 03:51:21','2022-01-13 03:51:21'),
 (43,'Camera',40000,3,30000,'Black','43.jpg',5,1,NULL,NULL,NULL,NULL,3,NULL,'45645','2022-01-13 03:59:03','2022-01-13 03:59:03'),
 (45,'Black Borkha Cotton',333,1,444,'Mum','black-borkha-cotton.jpg',1,1,1,2,1,2,1,0,'45454544','2022-01-13 06:34:32','2022-01-13 06:34:32'),
 (50,'Red Borka',344,1,333,'','red-borka.jpeg',9,2,1,4,1,0,2,0,'2342342','2022-01-29 18:46:37','2022-01-29 18:46:37');
/*!40000 ALTER TABLE `core_menus` ENABLE KEYS */;


--
-- Definition of table `core_purchase_details`
--

DROP TABLE IF EXISTS `core_purchase_details`;
CREATE TABLE `core_purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(10) unsigned NOT NULL,
  `variety_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchase_details`
--

/*!40000 ALTER TABLE `core_purchase_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_purchase_details` ENABLE KEYS */;


--
-- Definition of table `core_purchases`
--

DROP TABLE IF EXISTS `core_purchases`;
CREATE TABLE `core_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `vat` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchases`
--

/*!40000 ALTER TABLE `core_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_purchases` ENABLE KEYS */;


--
-- Definition of table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_roles`
--

/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` (`id`,`name`,`updated_at`,`created_at`) VALUES 
 (1,'Admin','2021-12-30 15:10:10','2021-12-30 15:10:19');
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;


--
-- Definition of table `core_sections`
--

DROP TABLE IF EXISTS `core_sections`;
CREATE TABLE `core_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_sections`
--

/*!40000 ALTER TABLE `core_sections` DISABLE KEYS */;
INSERT INTO `core_sections` (`id`,`name`) VALUES 
 (1,'Electronices'),
 (2,'Clothings'),
 (3,'Food and Beverages'),
 (4,'Health & Beauty'),
 (5,'Sports & Leisure'),
 (6,'Books & Entertainments');
/*!40000 ALTER TABLE `core_sections` ENABLE KEYS */;


--
-- Definition of table `core_status`
--

DROP TABLE IF EXISTS `core_status`;
CREATE TABLE `core_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_status`
--

/*!40000 ALTER TABLE `core_status` DISABLE KEYS */;
INSERT INTO `core_status` (`id`,`name`) VALUES 
 (1,'Processing'),
 (2,'Shifted'),
 (3,'Delivered'),
 (4,'Invoiced');
/*!40000 ALTER TABLE `core_status` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_details`
--

DROP TABLE IF EXISTS `core_stock_adjustment_details`;
CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(10) unsigned NOT NULL,
  `variety_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_details`
--

/*!40000 ALTER TABLE `core_stock_adjustment_details` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_details` (`id`,`adjustment_id`,`menu_id`,`qty`,`price`) VALUES 
 (1,2,20,5,400),
 (2,3,20,50,400),
 (3,4,28,70,6650),
 (4,4,20,30,300);
/*!40000 ALTER TABLE `core_stock_adjustment_details` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_types`
--

DROP TABLE IF EXISTS `core_stock_adjustment_types`;
CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_types`
--

/*!40000 ALTER TABLE `core_stock_adjustment_types` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_types` (`id`,`name`,`factor`) VALUES 
 (1,'Is Outdated',-1),
 (2,'Is Damaged',-1),
 (3,'Material Missing',-1),
 (4,'menu Is Obsolete',-1),
 (5,'Existing Inventory',1),
 (6,'Fixed/Found Inventory',1);
/*!40000 ALTER TABLE `core_stock_adjustment_types` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustments`
--

DROP TABLE IF EXISTS `core_stock_adjustments`;
CREATE TABLE `core_stock_adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) unsigned NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) unsigned NOT NULL,
  `werehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustments`
--

/*!40000 ALTER TABLE `core_stock_adjustments` DISABLE KEYS */;
INSERT INTO `core_stock_adjustments` (`id`,`adjustment_at`,`user_id`,`remark`,`adjustment_type_id`,`werehouse_id`) VALUES 
 (1,'2021-12-28 00:00:00',1,'ddd',2,1),
 (2,'2021-12-28 00:00:00',1,'ddd',2,1),
 (3,'2021-12-28 00:00:00',1,'ddddfd',6,1),
 (4,'2021-12-28 00:00:00',1,'NA',6,2);
/*!40000 ALTER TABLE `core_stock_adjustments` ENABLE KEYS */;


--
-- Definition of table `core_stocks`
--

DROP TABLE IF EXISTS `core_stocks`;
CREATE TABLE `core_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `variety_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stocks`
--

/*!40000 ALTER TABLE `core_stocks` DISABLE KEYS */;
INSERT INTO `core_stocks` (`id`,`menu_id`,`qty`,`transaction_type_id`,`remark`,`created_at`,`warehouse_id`) VALUES 
 (1,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (2,17,-1,1,'Order','0000-00-00 00:00:00',0),
 (3,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (4,28,-4,1,'Order','2021-12-28 18:02:36',0),
 (5,17,-2,1,'Order','2021-12-13 11:24:00',0),
 (6,17,-2,1,'Order','2021-12-13 11:38:13',0),
 (7,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (8,17,-1,1,'Order','2021-12-13 11:39:01',0),
 (9,28,-1,1,'Order','2021-12-28 18:02:36',0),
 (10,17,-1,1,'Order','2021-12-13 11:41:14',0),
 (11,28,17,1,'Adjustment','2021-12-28 18:03:12',0),
 (12,17,-2,1,'Order','2021-12-15 13:48:59',0),
 (13,20,-5,1,'Adjustment','2021-12-28 12:49:11',0),
 (14,20,50,1,'Adjustment','2021-12-28 12:54:21',0),
 (15,28,70,1,'Adjustment','2021-12-28 13:13:51',0),
 (16,20,30,1,'Adjustment','2021-12-28 13:13:51',0),
 (17,28,-1,1,'Order','2022-01-06 07:39:11',0),
 (18,29,-1,1,'Order','2022-01-06 07:39:11',0),
 (19,29,-1,1,'Order','2022-01-06 07:43:37',0),
 (20,28,-1,1,'Order','2022-01-06 07:43:37',0),
 (21,20,-1,1,'Order','2022-01-06 07:43:37',0),
 (22,28,-10,1,'Order','2022-01-06 10:14:42',0),
 (23,30,-1,1,'Order','2022-01-08 04:05:54',0),
 (24,31,-1,1,'Order','2022-01-08 04:05:54',0),
 (25,20,-1,1,'Order','2022-01-08 04:05:54',0),
 (26,29,-1,1,'Order','2022-01-08 04:06:58',0),
 (27,20,-1,1,'Order','2022-01-08 04:06:58',0),
 (28,30,-1,1,'Order','2022-01-08 04:06:58',0),
 (29,32,-1,1,'Order','2022-01-08 04:06:58',0),
 (30,29,-1,1,'Order','2022-01-08 04:07:27',0),
 (31,28,-1,1,'Order','2022-01-08 04:07:27',0),
 (32,31,-1,1,'Order','2022-01-08 04:07:27',0),
 (33,32,-2,1,'Order','2022-01-08 04:07:27',0),
 (34,30,-1,1,'Order','2022-01-08 04:07:27',0),
 (35,20,-1,1,'Order','2022-01-08 04:07:27',0);
/*!40000 ALTER TABLE `core_stocks` ENABLE KEYS */;


--
-- Definition of table `core_suppliers`
--

DROP TABLE IF EXISTS `core_suppliers`;
CREATE TABLE `core_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_suppliers`
--

/*!40000 ALTER TABLE `core_suppliers` DISABLE KEYS */;
INSERT INTO `core_suppliers` (`id`,`name`,`mobile`,`email`) VALUES 
 (1,'Md. Shahin','342234234','shahin@yahoo.com'),
 (2,'Tauhid Imdad','34325435423','tauhid@gmail.com');
/*!40000 ALTER TABLE `core_suppliers` ENABLE KEYS */;


--
-- Definition of table `core_transaction_types`
--

DROP TABLE IF EXISTS `core_transaction_types`;
CREATE TABLE `core_transaction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_transaction_types`
--

/*!40000 ALTER TABLE `core_transaction_types` DISABLE KEYS */;
INSERT INTO `core_transaction_types` (`id`,`name`) VALUES 
 (1,'Sales Order'),
 (2,'Sales Return'),
 (3,'Purchase Order'),
 (4,'Purchase Return'),
 (5,'Positive Stock Adjustment'),
 (6,'Negative Stock Adjustment');
/*!40000 ALTER TABLE `core_transaction_types` ENABLE KEYS */;


--
-- Definition of table `core_uom`
--

DROP TABLE IF EXISTS `core_uom`;
CREATE TABLE `core_uom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uom`
--

/*!40000 ALTER TABLE `core_uom` DISABLE KEYS */;
INSERT INTO `core_uom` (`id`,`name`) VALUES 
 (1,'Piece'),
 (2,'Kg'),
 (3,'Pack'),
 (4,'Litter');
/*!40000 ALTER TABLE `core_uom` ENABLE KEYS */;


--
-- Definition of table `core_users`
--

DROP TABLE IF EXISTS `core_users`;
CREATE TABLE `core_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) unsigned DEFAULT 1,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_users`
--

/*!40000 ALTER TABLE `core_users` DISABLE KEYS */;
INSERT INTO `core_users` (`id`,`username`,`role_id`,`password`,`email`,`full_name`,`created_at`,`photo`,`verify_code`,`inactive`,`mobile`,`updated_at`) VALUES 
 (91,'Rana',1,'33333','rana@yahoo.com',NULL,'2022-01-01 09:18:30','91.jpg',NULL,0,'34332332','2021-12-30 11:06:36'),
 (127,'Towhid',1,'111111','towhid1@outlook.com','Mohammad Towhidul Islam','2022-01-01 09:18:14','127.png','45354353',0,'34324324','2021-12-30 11:06:22'),
 (128,'Sawpna',1,'333','swapna@yahoo.com','Sawpna Akter','2021-12-30 15:07:22','128.jpg','45354353333',0,'34343434','2021-12-30 06:48:06'),
 (129,'Kamrul',1,'111111','kamrul@yahoo.com','Kamrul','2022-01-01 09:18:16','129.png','45354353333',0,'323333333333','2021-12-30 11:05:17'),
 (130,'Neyamot',1,'111111','neyamot@gmail.com','Neyamot Ullah','2021-12-30 15:24:19','130.jpg','3432432432',0,'534534543',NULL),
 (131,'Forhad',1,'33333','forhad@yahoo.com','Forhad Hassan','2021-12-30 15:24:19','131.jpg','4535435333333',0,'32333333',NULL),
 (132,'Mujahid',1,'343434','robiul@yahoo.com','Mujahid Islam','2021-12-30 15:07:22','132.jpg','4535435333333',0,'2343243242','2021-12-30 05:45:24'),
 (133,'shibli',1,'1111133','shibli@yahoo.com','Shibli','2021-12-30 15:07:22','133.jpg','45354353333',0,'234234343','2021-12-30 07:21:24');
/*!40000 ALTER TABLE `core_users` ENABLE KEYS */;


--
-- Definition of table `core_warehouses`
--

DROP TABLE IF EXISTS `core_warehouses`;
CREATE TABLE `core_warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_warehouses`
--

/*!40000 ALTER TABLE `core_warehouses` DISABLE KEYS */;
INSERT INTO `core_warehouses` (`id`,`name`,`city`,`contact`) VALUES 
 (1,'Main Warehouse','Dhaka','4543534534'),
 (2,'Rangpur','Rangpur','');
/*!40000 ALTER TABLE `core_warehouses` ENABLE KEYS */;


--
-- Definition of table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`,`name`) VALUES 
 (1,'Bangladesh'),
 (2,'Pakistan'),
 (3,'India');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


--
-- Definition of table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `price` float DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`,`title`,`price`,`user_id`) VALUES 
 (1,'Web development with PHP',15000,1),
 (2,'Android Application Development',12000,1),
 (3,'ASP.NET Application Development',20000,2),
 (4,'Windows Application Development using C#.NET',30000,91);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


--
-- Definition of table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`,`name`,`mobile`) VALUES 
 (1,'Ashraf','7324978234'),
 (2,'Jahid','3434335556');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;


--
-- Definition of table `ext_menus`
--

DROP TABLE IF EXISTS `ext_menus`;
CREATE TABLE `ext_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ext_menus`
--

/*!40000 ALTER TABLE `ext_menus` DISABLE KEYS */;
INSERT INTO `ext_menus` (`id`,`name`,`price`,`category_id`,`photo`) VALUES 
 (11,'Apple','120.00',2,'apple.jpg'),
 (12,'Orange','150.00',2,'orange.jpg'),
 (13,'Pear','90.00',1,'pear.jpg'),
 (14,'Guava','50.00',1,'guava.jpg'),
 (15,'Banana','80.00',1,'banana.jpg'),
 (16,'Grapes White','140.00',3,'grapes_white.jpg');
/*!40000 ALTER TABLE `ext_menus` ENABLE KEYS */;


--
-- Definition of table `hr_departments`
--

DROP TABLE IF EXISTS `hr_departments`;
CREATE TABLE `hr_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_departments`
--

/*!40000 ALTER TABLE `hr_departments` DISABLE KEYS */;
INSERT INTO `hr_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','HR'),
 (2,'11','IT');
/*!40000 ALTER TABLE `hr_departments` ENABLE KEYS */;


--
-- Definition of table `hr_employees`
--

DROP TABLE IF EXISTS `hr_employees`;
CREATE TABLE `hr_employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `hr_department_id` int(10) unsigned NOT NULL,
  `hr_position_id` int(10) unsigned NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `basic` int(10) unsigned NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employees`
--

/*!40000 ALTER TABLE `hr_employees` DISABLE KEYS */;
INSERT INTO `hr_employees` (`id`,`name`,`hr_department_id`,`hr_position_id`,`dob`,`doj`,`basic`,`mobile`,`email`,`address`) VALUES 
 (1,'Jahidul Islam',1,3,'1997-01-01','2020-01-01',20000,'43435345435','jahid@yahoo.com','Rampura');
/*!40000 ALTER TABLE `hr_employees` ENABLE KEYS */;


--
-- Definition of table `hr_positions`
--

DROP TABLE IF EXISTS `hr_positions`;
CREATE TABLE `hr_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_positions`
--

/*!40000 ALTER TABLE `hr_positions` DISABLE KEYS */;
INSERT INTO `hr_positions` (`id`,`name`,`rank`) VALUES 
 (1,'Programmer',4),
 (2,'Jr. Programmer',5),
 (3,'Hr Admin',3),
 (4,'Pion',10),
 (5,'Driver',10),
 (6,'Manager',5),
 (7,'Support Engineer',5),
 (8,'Support Engineer',5),
 (9,'Trainer ',3);
/*!40000 ALTER TABLE `hr_positions` ENABLE KEYS */;


--
-- Definition of table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `discount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`,`order_id`,`menu_id`,`price`,`qty`,`discount`) VALUES 
 (1,1,1,30,3,0),
 (2,1,2,40,1,0),
 (3,1,3,31,4,0),
 (10,9,1,44,8,4),
 (11,9,4,4555,4,7),
 (12,9,10,4555,4,7),
 (13,9,8,3444,3,3),
 (14,10,1,434,1,1),
 (15,10,12,400,1,0),
 (16,11,11,5000,1,0),
 (17,11,2,20000,1,0),
 (18,17,1,44,0,0),
 (19,22,16,120,2,2),
 (20,22,17,15,1,1),
 (21,23,16,120,2,2),
 (22,23,17,15,1,1),
 (23,23,14,1200,5,10);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `discount` float NOT NULL,
  `vat` float NOT NULL,
  `due_date` datetime NOT NULL,
  `customer_note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`,`customer_id`,`order_date`,`shipping_address`,`discount`,`vat`,`due_date`,`customer_note`) VALUES 
 (1,1,'2021-07-01 00:00:00','Rampura',0,0,'2021-07-04 00:00:00',''),
 (9,1,'2021-07-19 00:00:00','na',0,0,'2021-07-19 00:00:00',''),
 (10,1,'2021-08-19 00:00:00','na',0,0,'2021-08-19 00:00:00',''),
 (11,1,'2021-08-19 00:00:00','na',0,0,'2021-08-19 00:00:00',''),
 (17,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (18,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (19,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (20,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (21,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (22,1,'2021-11-16 00:00:00','',0,0,'2021-11-16 00:00:00','Na'),
 (23,1,'2021-11-16 00:00:00','Testing',0,0,'2021-11-16 00:00:00','Na');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(20) DEFAULT NULL,
  `method` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`,`student_id`,`amount`,`discount`,`created_at`,`remark`,`method`) VALUES 
 (1,1,10000,5000,'2020-10-04 18:52:39','Txs344333','BKash'),
 (2,2,15000,0,'2020-10-04 18:52:39','Txs334533','Cash');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


--
-- Definition of table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `area_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` (`id`,`name`,`mobile`,`area_id`) VALUES 
 (1,'Rana','3434345345345',4),
 (2,'Kamrul','343434',4),
 (3,'Neyamot','343434',3),
 (4,'Monir','343434',2);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;


--
-- Definition of table `menu_category`
--

DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE `menu_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_category`
--

/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;
INSERT INTO `menu_category` (`id`,`name`,`section_id`) VALUES 
 (1,'Sari',2),
 (2,'Shirt',2),
 (3,'T-Shirt',2),
 (4,'Rice',1);
/*!40000 ALTER TABLE `menu_category` ENABLE KEYS */;


--
-- Definition of table `menu_section`
--

DROP TABLE IF EXISTS `menu_section`;
CREATE TABLE `menu_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_section`
--

/*!40000 ALTER TABLE `menu_section` DISABLE KEYS */;
INSERT INTO `menu_section` (`id`,`name`) VALUES 
 (1,'Grocery'),
 (2,'Clothing'),
 (3,'Fish');
/*!40000 ALTER TABLE `menu_section` ENABLE KEYS */;


--
-- Definition of table `menus_tmp`
--

DROP TABLE IF EXISTS `menus_tmp`;
CREATE TABLE `menus_tmp` (
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus_tmp`
--

/*!40000 ALTER TABLE `menus_tmp` DISABLE KEYS */;
INSERT INTO `menus_tmp` (`name`,`price`) VALUES 
 ('Apple','120.00'),
 ('Orange','150.00'),
 ('Pear','90.00'),
 ('Guava','50.00'),
 ('Banana','80.00'),
 ('Grapes White','140.00');
/*!40000 ALTER TABLE `menus_tmp` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice`
--

DROP TABLE IF EXISTS `purchase_invoice`;
CREATE TABLE `purchase_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `remark` text NOT NULL,
  `ref` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_invoice`
--

/*!40000 ALTER TABLE `purchase_invoice` DISABLE KEYS */;
INSERT INTO `purchase_invoice` (`id`,`vendor_id`,`purchase_date`,`shipping_address`,`remark`,`ref`) VALUES 
 (1,1,'2021-08-16 17:25:27','sdfds','dsf','34343');
/*!40000 ALTER TABLE `purchase_invoice` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice1`
--

DROP TABLE IF EXISTS `purchase_invoice1`;
CREATE TABLE `purchase_invoice1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) unsigned NOT NULL,
  `ref` varchar(45) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='vendor_id,ref,purchase_date,shipping_address,remark';

--
-- Dumping data for table `purchase_invoice1`
--

/*!40000 ALTER TABLE `purchase_invoice1` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoice1` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice_details`
--

DROP TABLE IF EXISTS `purchase_invoice_details`;
CREATE TABLE `purchase_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_invoice_details`
--

/*!40000 ALTER TABLE `purchase_invoice_details` DISABLE KEYS */;
INSERT INTO `purchase_invoice_details` (`id`,`invoice_id`,`item_id`,`qty`,`price`,`discount`) VALUES 
 (1,1,2,1,333,0),
 (2,1,1,1,6566,0);
/*!40000 ALTER TABLE `purchase_invoice_details` ENABLE KEYS */;


--
-- Definition of table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` (`id`,`name`,`country_id`) VALUES 
 (1,'Bangladesh',1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;


--
-- Definition of table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `qty` varchar(45) NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`,`menu_id`,`qty`,`transaction_type_id`) VALUES 
 (1,14,'100',1),
 (2,16,'60',1),
 (3,14,'-2',3),
 (4,14,'-10',2),
 (5,14,'-5',3),
 (6,14,'20',1);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;


--
-- Definition of table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`,`name`,`mobile`,`email`,`created_at`,`course`) VALUES 
 (5,'Silvia','3434343','silvia@yahoo.com','2021-10-28 18:28:46','Java'),
 (7,'Jahidul',NULL,NULL,'2021-10-28 18:30:43','MBA');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


--
-- Definition of table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`,`name`) VALUES 
 (1,'English'),
 (2,'Bengali');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;


--
-- Definition of table `system_log`
--

DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_log`
--

/*!40000 ALTER TABLE `system_log` DISABLE KEYS */;
INSERT INTO `system_log` (`id`,`name`,`description`,`created_at`) VALUES 
 (4,'UPDATE','Update user id: 56','2021-08-25 08:42:57'),
 (7,'LOGIN','Successfully logged in user: Rana','2021-11-07 13:08:32'),
 (8,'LOGIN','Fail to Login: Invalid username or password','2021-11-07 13:08:51'),
 (9,'LOGIN','Successfull login user:91 | Rana','2021-11-10 12:38:23'),
 (10,'LOGIN','Successfully logined in user : 91-Rana','2021-11-10 12:39:20'),
 (11,'LOGOUT',' 91-Rana user logged out','2021-11-10 12:51:06'),
 (18,'LOGIN','Fail to Login: Invalid username or password','2021-11-15 10:24:59'),
 (19,'LOGIN','Successfully logged in user: Rana','2021-11-15 10:25:02'),
 (20,'LOGIN','Successfully logged in user: Rana','2021-11-16 09:46:22'),
 (21,'LOGIN','Successfully logged in user: Rana','2021-11-30 11:15:27');
/*!40000 ALTER TABLE `system_log` ENABLE KEYS */;


--
-- Definition of table `thana`
--

DROP TABLE IF EXISTS `thana`;
CREATE TABLE `thana` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

/*!40000 ALTER TABLE `thana` DISABLE KEYS */;
INSERT INTO `thana` (`id`,`name`,`district_id`) VALUES 
 (1,'Mirpur',7),
 (2,'Mohammadpur',7),
 (3,'Chatkhil',2);
/*!40000 ALTER TABLE `thana` ENABLE KEYS */;


--
-- Definition of table `transaction_type`
--

DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE `transaction_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_type`
--

/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
INSERT INTO `transaction_type` (`id`,`name`) VALUES 
 (1,'Purchase Order'),
 (2,'Purchase Return'),
 (3,'Sales Order'),
 (4,'Sales Return');
/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;


--
-- Definition of table `users2`
--

DROP TABLE IF EXISTS `users2`;
CREATE TABLE `users2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users2`
--

/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;


--
-- Definition of procedure `show_roles_users`
--

DROP PROCEDURE IF EXISTS `show_roles_users`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `show_roles_users`()
begin
select * from roles;
select * from users;
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `users`
--

DROP PROCEDURE IF EXISTS `users`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `users`()
select * from users $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of view `admin_report_view`
--

DROP TABLE IF EXISTS `admin_report_view`;
DROP VIEW IF EXISTS `admin_report_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_report_view` AS select `u`.`id` AS `id`,`u`.`email` AS `email`,`u`.`username` AS `username`,`u`.`photo` AS `photo`,`u`.`mobile` AS `mobile`,`r`.`name` AS `role` from (`users` `u` join `roles` `r`) where `r`.`id` = `u`.`role_id` and `r`.`id` = 1;

--
-- Definition of view `show_menus_report`
--

DROP TABLE IF EXISTS `show_menus_report`;
DROP VIEW IF EXISTS `show_menus_report`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_menus_report` AS select `p`.`id` AS `id`,`p`.`name` AS `name`,`p`.`price` AS `price`,`m`.`name` AS `manufacturer` from (`menus` `p` join `manufacturer` `m`) where `m`.`id` = `p`.`mfg_id`;

--
-- Definition of view `user_mobile_view`
--

DROP TABLE IF EXISTS `user_mobile_view`;
DROP VIEW IF EXISTS `user_mobile_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_mobile_view` AS select `test`.`users`.`id` AS `id`,`test`.`users`.`username` AS `username`,`test`.`users`.`mobile` AS `mobile` from `users`;

--
-- Definition of view `user_report`
--

DROP TABLE IF EXISTS `user_report`;
DROP VIEW IF EXISTS `user_report`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_report` AS select `u`.`id` AS `id`,`u`.`username` AS `username`,`r`.`name` AS `role` from (`users` `u` join `roles` `r`) where `r`.`id` = `u`.`role_id`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
