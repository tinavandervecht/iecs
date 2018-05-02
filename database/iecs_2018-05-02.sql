# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.10.10 (MySQL 5.7.17-0ubuntu0.16.04.2)
# Database: iecs
# Generation Time: 2018-05-02 21:18:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_activity`;

CREATE TABLE `tbl_activity` (
  `activity_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `company_id` smallint(6) NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_date` datetime NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_activity` WRITE;
/*!40000 ALTER TABLE `tbl_activity` DISABLE KEYS */;

INSERT INTO `tbl_activity` (`activity_id`, `company_id`, `activity_desc`, `activity_date`)
VALUES
	(1,6,'Edited form for: Activity Check','2017-02-01 10:24:15'),
	(2,6,'Finished form for: Activity Check 2','2017-02-01 10:27:05'),
	(3,6,'Deleted form for: ','2017-02-01 15:29:23'),
	(4,6,'Deleted one of their forms','2017-02-01 15:34:21'),
	(5,6,'Updated their company profile.','2017-02-01 12:38:55'),
	(6,6,'Updated their company profile.','2017-02-01 12:39:39'),
	(7,6,'Updated their company profile.','2017-02-01 12:48:53'),
	(8,6,'Updated their company profile.','2017-02-01 12:49:00'),
	(9,6,'Updated their company profile.','2017-02-07 12:42:51'),
	(10,6,'Updated their company profile.','2017-02-07 12:42:57'),
	(11,6,'Deleted one of their forms','2017-02-07 13:22:40'),
	(12,6,'Deleted one of their forms','2017-02-07 13:46:16'),
	(13,6,'Deleted one of their forms','2017-02-07 13:46:18'),
	(14,6,'Deleted one of their forms','2017-02-07 13:46:34'),
	(15,6,'Deleted one of their forms','2017-02-07 13:46:54'),
	(16,6,'Edited form for: Testing 8','2017-02-14 12:31:45'),
	(17,6,'Finished form for: Testing 9','2017-02-14 12:32:38'),
	(18,6,'Edited form for: Testing 9','2017-02-14 12:38:07'),
	(19,6,'Deleted one of their forms','2017-03-24 10:54:34'),
	(20,6,'Deleted one of their forms','2017-03-24 10:54:39'),
	(21,6,'Edited form for: Testing 9','2017-04-04 11:25:37'),
	(22,6,'Sent an Analysis to IECS for review.','2017-04-04 11:58:34'),
	(23,6,'Edited form for: Testing 9','2017-04-04 13:11:29'),
	(24,6,'Edited form for: Testing 9','2017-04-04 13:12:24'),
	(25,6,'Edited form for: Testing 9','2017-04-04 13:13:16'),
	(26,6,'Edited form for: Testing 9','2017-04-04 13:21:33'),
	(27,6,'Edited form for: Testing 9','2017-04-04 13:24:21'),
	(28,6,'Edited form for: Testing 9','2017-04-04 13:27:45'),
	(29,6,'Edited form for: Testing 9','2017-04-04 13:50:21'),
	(30,6,'Edited form for: Testing 9','2017-04-05 11:50:21'),
	(31,1,'Updated their company profile.','2018-04-04 18:13:35'),
	(32,1,'Updated their company profile.','2018-04-04 18:13:38'),
	(33,1,'Updated their company profile.','2018-04-05 10:14:18'),
	(34,1,'Finished form for: test','2018-04-06 10:54:28'),
	(35,1,'Updated their company profile.','2018-04-06 10:55:45'),
	(36,1,'Updated their company profile.','2018-04-06 10:56:26'),
	(37,1,'Updated their company profile.','2018-04-06 10:57:37'),
	(38,1,'Updated their company profile.','2018-04-06 10:57:52'),
	(39,1,'Updated their company profile.','2018-04-06 10:57:55'),
	(40,1,'Updated their company profile.','2018-04-06 10:58:14'),
	(41,1,'Updated their company profile.','2018-04-06 10:58:17'),
	(42,1,'Updated their company profile.','2018-04-06 10:58:18'),
	(43,1,'Updated their company profile.','2018-04-06 10:58:30'),
	(44,1,'Updated their company profile.','2018-04-06 11:00:39'),
	(45,1,'Updated their company profile.','2018-04-06 11:00:51'),
	(46,1,'Updated their company profile.','2018-04-06 11:00:53'),
	(47,1,'Updated their company profile.','2018-04-06 11:01:08'),
	(48,1,'Updated their company profile.','2018-04-06 11:01:10'),
	(49,1,'Updated their company profile.','2018-04-06 11:01:12'),
	(50,1,'Updated their company profile.','2018-04-06 11:02:18'),
	(51,1,'Updated their company profile.','2018-04-06 11:02:20'),
	(52,1,'Updated their company profile.','2018-04-06 11:02:45'),
	(53,1,'Updated their company profile.','2018-04-06 11:02:46'),
	(54,1,'Updated their company profile.','2018-04-06 11:03:12'),
	(55,1,'Updated their company profile.','2018-04-06 11:03:14'),
	(56,1,'Updated their company profile.','2018-04-06 11:03:16'),
	(57,1,'Updated their company profile.','2018-04-06 11:03:56'),
	(58,1,'Updated their company profile.','2018-04-06 11:04:03'),
	(59,1,'Updated their company profile.','2018-04-06 11:04:26'),
	(60,1,'Updated their company profile.','2018-04-06 11:05:17'),
	(61,1,'Updated their company profile.','2018-04-06 11:05:20'),
	(62,1,'Updated their company profile.','2018-04-06 11:05:37'),
	(63,1,'Updated their company profile.','2018-04-06 11:05:38'),
	(64,1,'Updated their company profile.','2018-04-06 11:05:40'),
	(65,1,'Updated their company profile.','2018-04-06 11:05:46'),
	(66,1,'Updated their company profile.','2018-04-06 11:05:48'),
	(67,1,'Updated their company profile.','2018-04-06 11:06:00'),
	(68,1,'Updated their company profile.','2018-04-06 11:06:58'),
	(69,1,'Updated their company profile.','2018-04-06 11:08:56'),
	(70,1,'Updated their company profile.','2018-04-06 11:08:57'),
	(71,1,'Updated their company profile.','2018-04-06 11:09:25'),
	(72,1,'Updated their company profile.','2018-04-06 11:17:06'),
	(73,1,'Finished form for: asdf','2018-04-06 11:31:10'),
	(74,1,'Edited form for: asdf','2018-04-06 14:28:30'),
	(75,1,'Edited form for: asdf','2018-04-06 14:28:54'),
	(76,1,'Finished form for: New Offset Project','2018-04-22 15:36:53'),
	(77,1,'Finished form for: Mannings Test','2018-04-29 16:07:46'),
	(78,1,'Edited form for: Mannings Test','2018-04-29 16:35:18'),
	(79,1,'Edited form for: Mannings Test','2018-04-29 16:35:36'),
	(80,1,'Edited form for: New Offset Project','2018-05-02 09:02:24');

/*!40000 ALTER TABLE `tbl_activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(15) NOT NULL,
  `admin_pw` varchar(255) NOT NULL DEFAULT '',
  `admin_name` varchar(30) NOT NULL,
  `admin_lastLogin` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_pw`, `admin_name`, `admin_lastLogin`)
VALUES
	(1,'admin1','$2y$10$EDMArfpM8ijjJPm/F3j8Yepd6yEhEjdIqS46wpaoIC0c/WMW0wfdy','Admin',1525285329);

/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_company`;

CREATE TABLE `tbl_company` (
  `company_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) NOT NULL,
  `company_email` varchar(40) NOT NULL DEFAULT 'Your Email Here',
  `company_phone` varchar(12) NOT NULL DEFAULT '000-000-0000',
  `company_pw` varchar(255) NOT NULL DEFAULT '',
  `company_date` datetime NOT NULL,
  `company_contactName` varchar(30) NOT NULL,
  `company_lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_status` smallint(1) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_company` WRITE;
/*!40000 ALTER TABLE `tbl_company` DISABLE KEYS */;

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_phone`, `company_pw`, `company_date`, `company_contactName`, `company_lastLogin`, `company_status`)
VALUES
	(1,'Testasdfsa Company','test@email.com','asdfs','$2y$10$U..bdhY5Wf6fScHjmqUyXe53odr3VTd7.JemrPtf/q.ntmWyv/l/W','2016-10-11 10:53:13','Test Person','2018-04-15 19:49:55',1),
	(2,'Fanshawe College','fanshawe@fanshawe.com','000-000-0000','$2y$10$U..bdhY5Wf6fScHjmqUyXe53odr3VTd7.JemrPtf/q.ntmWyv/l/W','2016-10-11 10:55:18','Adam Luxton','2018-04-15 19:49:53',1),
	(3,'Company ','company2@email.com','000-000-0000','$2y$10$pndt2ZlTQrjzlFWy85c4x.aGM.wR8hX./0WW51f.Dbpe./7gI8ely','2016-10-11 13:08:31','name name','2018-04-15 19:50:18',1),
	(4,'odadas','dasdadad','000-000-0000','$2y$10$pndt2ZlTQrjzlFWy85c4x.aGM.wR8hX./0WW51f.Dbpe./7gI8ely','2016-11-01 13:16:17','dsdasdada','2018-04-15 19:50:19',1),
	(5,'dasdasdasdsa','asdasdasdadad','000-000-0000','$2y$10$lGqdqdsCExq1u1hc27N8zezuyDlcgxwMPSIVqAgjzhB0mHxegtntO','2016-11-02 20:02:08','asddasdasd','2018-04-15 19:50:33',1),
	(7,'Adam\'s Company','a_luxton@fanshaweonline.ca','000-000-0000','$2y$10$pndt2ZlTQrjzlFWy85c4x.aGM.wR8hX./0WW51f.Dbpe./7gI8ely','2016-11-17 19:27:29','Adam Luxton','2018-04-15 19:50:20',1),
	(15,'Hastest','hash@test.ca','000-000-0000','$2y$10$6ewqypg/4HknSk.9D03XA.zJY/LkgJL9qmdyK4H4mTKA.N.jSMJhu','2018-04-15 15:29:44','Hash Test','2018-04-15 19:29:44',1);

/*!40000 ALTER TABLE `tbl_company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_estimates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_estimates`;

CREATE TABLE `tbl_estimates` (
  `estimate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` smallint(5) unsigned NOT NULL,
  `estimate_name` varchar(50) NOT NULL,
  `estimate_date` datetime NOT NULL,
  `estimate_projectedDate` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_address` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_engineer` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_status` smallint(1) NOT NULL,
  `estimate_location` varchar(50) NOT NULL,
  `estimate_expectedFlow` decimal(5,2) NOT NULL,
  `estimate_expectedVelocity` decimal(5,2) NOT NULL,
  `estimate_offset` decimal(5,2) NOT NULL,
  `estimate_bedSlope` decimal(5,2) NOT NULL,
  `estimate_sideSlope` decimal(5,2) NOT NULL,
  `estimate_friction` decimal(5,0) NOT NULL DEFAULT '30',
  `estimate_flowType` smallint(2) NOT NULL COMMENT 'needs review, option form?',
  `estimate_blockType` tinyint(1) NOT NULL,
  `estimate_blockUse` tinyint(1) NOT NULL,
  `estimate_bedWidth` decimal(5,2) NOT NULL,
  `estimate_alignment` smallint(1) NOT NULL,
  `estimate_crestRadius` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_channelLength` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_channelDepth` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_topWidth` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_outLetSource` smallint(2) NOT NULL,
  `estimate_modifiedDate` datetime NOT NULL,
  `estimate_comments` text NOT NULL,
  `estimate_sent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`estimate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_estimates` WRITE;
/*!40000 ALTER TABLE `tbl_estimates` DISABLE KEYS */;

INSERT INTO `tbl_estimates` (`estimate_id`, `company_id`, `estimate_name`, `estimate_date`, `estimate_projectedDate`, `estimate_address`, `estimate_engineer`, `estimate_status`, `estimate_location`, `estimate_expectedFlow`, `estimate_expectedVelocity`, `estimate_offset`, `estimate_bedSlope`, `estimate_sideSlope`, `estimate_friction`, `estimate_flowType`, `estimate_blockType`, `estimate_blockUse`, `estimate_bedWidth`, `estimate_alignment`, `estimate_crestRadius`, `estimate_channelLength`, `estimate_channelDepth`, `estimate_topWidth`, `estimate_outLetSource`, `estimate_modifiedDate`, `estimate_comments`, `estimate_sent`)
VALUES
	(1,1,'','2016-10-31 11:37:38','','Not Specified','Not Specified',1,'Fansawe College, London, Ontario, Canada',2.00,6.00,0.00,0.00,1.00,30,3,0,0,1.00,0,22,80,1,2,4,'2016-11-17 16:17:27','',0),
	(2,2,'','2016-10-11 11:02:47','','Not Specified','Not Specified',1,'Adam\'s House, Oakville, Ontario, Canada',41.00,57.00,0.00,27.00,13.00,30,2,0,0,127.00,0,98,21,87,87,6,'2016-11-17 16:17:27','',0),
	(3,1,'','2016-10-17 13:35:27','','Not Specified','Not Specified',1,'Location',20.00,282.00,0.00,21.00,291.00,30,1,0,0,291.00,1,291,291,291,291,1,'2016-11-17 16:17:27','',0),
	(4,6,'John Doe\'s Estimate #1','2016-11-17 15:58:11','','Not Specified','Not Specified',1,'John Doe\'s House',11.00,11.00,0.00,22.00,33.00,30,1,0,0,22.00,1,22,22,22,22,1,'2016-11-17 16:17:27','',0),
	(5,6,'John Doe\'s Estimate #2','2016-11-17 15:58:11','','Not Specified','Not Specified',1,'John Doe\'s Cottage',11.00,11.00,0.00,11.00,11.00,30,1,0,0,11.00,1,11,11,11,11,1,'2016-11-17 16:17:27','',0),
	(6,6,'John Doe\'s Estimate #3','2016-11-17 15:59:54','','Not Specified','Not Specified',1,'John Doe\'s Apartment',11.00,11.00,0.00,11.00,11.00,30,1,0,0,11.00,1,11,11,11,11,1,'2016-11-17 16:17:27','',0),
	(7,6,'John Doe\'s Estimate #4','2016-11-17 15:59:54','','Not Specified','Not Specified',1,'John Doe\'s Park',11.00,11.00,0.00,11.00,11.00,30,1,0,0,11.00,1,11,11,11,11,1,'2016-11-17 16:17:27','',0),
	(8,6,'Adam\'s Project','2016-11-24 14:43:40','Soon','2241 Carpenters','Adam Luxton',1,'Oakville, Ontario',11.11,11.11,0.00,11.11,11.11,30,1,0,0,11.11,1,11,11,11,11,1,'2016-11-24 14:43:40','Here are some comments',0),
	(9,6,'Project 2','2016-11-25 11:10:42','Soon','1111 Somewhere','Adam',1,'Somewhere',99.66,11.22,0.00,0.12,0.12,30,1,0,0,11.11,1,11,11,11,11,1,'2016-11-25 11:10:42','Text',0),
	(10,6,'Adam\'s Project 2','2016-11-25 06:30:42','Soon','2241 Carpenters','Adam Luxton',1,'Oakville, Ontario',11.11,11.11,0.00,11.11,0.12,30,1,0,0,11.11,1,11,11,11,11,1,'2016-11-25 13:30:42','Comments',0),
	(11,6,'Project 2','2016-12-01 05:36:12','','1111 Somewhere','Bob',1,'Somewhere',99.66,11.22,0.00,0.12,0.12,30,1,0,0,11.11,1,11,11,11,11,1,'2016-12-01 12:36:12','comments',0),
	(12,6,'Project 3','2016-12-06 05:32:53','','1111 Somewhere','Bob',1,'Somewhere',99.66,11.22,0.00,0.12,0.12,30,1,0,0,11.11,1,11,11,11,11,1,'2016-12-06 12:32:53','Comment new',0),
	(13,6,'New one','2016-12-06 05:33:58','','Not Specified','Not Specified',1,'John Doe\'s House',11.00,11.00,0.00,22.00,33.00,30,1,0,0,22.00,1,22,22,22,22,1,'2016-12-06 12:33:58','',0),
	(14,6,'Testing','2017-01-31 03:11:05','','','Testing',1,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:11:05','11111',0),
	(15,6,'Testing','2017-01-31 03:14:01','','','Testing',1,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:14:01','11111',0),
	(16,6,'Testing 2','2017-01-31 03:22:15','','','Testing',1,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:22:15','11111',0),
	(17,6,'Testing 3','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:30:52','11111',0),
	(18,6,'Testing 4','2017-01-31 03:30:52','','','Testing',1,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:34:25','11111',0),
	(19,6,'Testing 5','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:35:25','11111',0),
	(20,6,'Testing 6','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:37:49','11111',0),
	(21,6,'Testing 8','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-02-14 12:31:45','11111',0),
	(22,6,'Testing 8','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:39:13','11111',0),
	(23,6,'Testing 9','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:50:50','11111',0),
	(24,6,'Testing 11','2017-01-31 03:30:52','','','Testing',0,'',1.11,1.11,0.00,0.44,0.44,30,1,0,0,1.11,1,1,1,1,0,1,'2017-01-31 03:56:32','11111',0),
	(25,6,'Adam Testing','2017-01-31 16:43:10','','','Adam',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-01-31 16:43:10','1',0),
	(26,6,'Adam Testing','2017-01-31 16:43:45','','','1',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-01-31 16:43:45','1',0),
	(27,6,'Adamin tes','2017-01-31 16:44:18','','','11',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-01-31 16:44:18','1',0),
	(28,6,'a','2017-01-31 16:44:48','','','',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-01-31 16:44:48','1',0),
	(29,6,'Activity Check','2017-01-31 16:45:28','','','',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-02-01 10:24:15','1',0),
	(30,6,'Activity Check 2','2017-02-01 10:26:17','','','Adam Luxton',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-02-01 10:26:17','Comments',0),
	(31,6,'Activity Check 2','2017-02-01 10:27:05','','','Adam Luxton',0,'',1.00,1.00,0.00,1.00,1.00,30,1,0,0,1.00,1,1,1,1,1,1,'2017-02-01 10:27:05','Comments',0),
	(32,6,'Testing 9','2017-02-14 12:32:38','2017-02-08','2241 Carpenters Circle','Adam',1,'Oakville',1.00,1.00,0.00,0.01,0.01,30,5,0,0,1.00,0,1,1,1,1,0,'2017-04-05 11:50:21','Comment',0),
	(33,1,'test','2018-04-06 10:54:28','','','',1,'',12.00,123.00,0.00,0.00,0.00,30,0,0,0,12.00,0,0,0,0,0,0,'2018-04-06 10:54:28','                            ',0),
	(34,1,'asdf','2021-09-02 00:00:00','2021-09-02','','',1,'',123.00,32.00,0.00,0.00,0.00,30,0,0,0,321.00,0,0,0,0,0,0,'2018-04-06 14:28:54','                                                                                    ',0),
	(35,1,'New Offset Project','2018-05-31 00:00:00','2018-05-31','','',1,'',930.00,5.00,0.00,0.01,0.40,30,0,0,0,40.00,0,0,0,0,0,0,'2018-05-02 09:02:24','                                                        ',0),
	(36,1,'Mannings Test','2018-04-26 00:00:00','2018-04-26','','',1,'',20.00,3.60,0.00,0.04,2.00,30,0,0,0,15.00,0,0,0,0,0,0,'2018-04-29 16:35:36','                                                                                    ',0);

/*!40000 ALTER TABLE `tbl_estimates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_products`;

CREATE TABLE `tbl_products` (
  `products_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(40) NOT NULL,
  `product_number` tinyint(4) NOT NULL,
  `product_b` decimal(8,1) NOT NULL,
  `product_bT` decimal(8,1) NOT NULL,
  `product_hB` decimal(8,1) NOT NULL,
  `product_W` decimal(8,2) NOT NULL,
  `product_Ws` decimal(8,2) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;

INSERT INTO `tbl_products` (`products_id`, `product_name`, `product_number`, `product_b`, `product_bT`, `product_hB`, `product_W`, `product_Ws`)
VALUES
	(1,'CCG2a',25,393.7,190.5,79.8,71.22,41.50),
	(2,'CC35',35,393.7,292.1,114.3,292.70,159.90),
	(3,'CC45',45,393.7,292.1,135.7,371.80,209.60),
	(4,'CC70',70,393.7,292.1,215.9,577.50,326.70),
	(5,'CC90',90,802.6,27.6,701.0,2933.09,1735.58),
	(8,'CCG2b',25,393.7,221.0,79.8,71.22,41.50);

/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
