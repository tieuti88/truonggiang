# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.22-MariaDB)
# Database: ark_admin_db
# Generation Time: 2017-11-04 14:21:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table catagory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catagory`;

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(110) DEFAULT NULL,
  `seo_title` varchar(110) DEFAULT NULL,
  `author` varchar(110) DEFAULT NULL,
  `content` text,
  `hagtag` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `catagory` WRITE;
/*!40000 ALTER TABLE `catagory` DISABLE KEYS */;

INSERT INTO `catagory` (`id`, `title`, `seo_title`, `author`, `content`, `hagtag`)
VALUES
	(8,'Name card','name-card','admin','<div class=\"col-sm-4\" style=\"height: 742px\">\n                  <a href=\"#\" rel=\"Khuyen mai 1\">\n                    <img src=\"/assets/img/banner-1.png\" alt=\"khuyen mai thang 8/2017\"/>\n                  </a>\n                </div>\n                <div class=\"col-sm-4\"><a href=\"#\" rel=\"Khuyen mai 1\">\n                    <img src=\"/assets/img/banner-1.png\" alt=\"khuyen mai thang 8/2017\"/>\n                  </a></div>\n                <div class=\"col-sm-4\" style=\"display: grid;\">\n                    <a href=\"#\" rel=\"Khuyen mai 1\">\n                      <img src=\"/assets/img/banner-2.png\" alt=\"khuyen mai thang 8/2017\"/>\n                    </a>\n                    <a href=\"#\" rel=\"Khuyen mai 1\">\n                      <img src=\"/assets/img/banner-2.png\" alt=\"khuyen mai thang 8/2017\"/>\n                    </a>\n                    <a href=\"#\" rel=\"Khuyen mai 1\">\n                      <img src=\"/assets/img/banner-2.png\" alt=\"khuyen mai thang 8/2017\"/>\n                    </a>\n                </div>','#cardvisit'),
	(10,'Lịch 2018','lch-2018','admin','              <div class=\"col-sm-4\" style=\"height: 609px\">\n                <a href=\"/category/flexible-packets.html\" rel=\"Khuyen mai 1\">\n                  <img src=\"/assets/img/banner-3.png\" alt=\"khuyen mai thang 8/2017\"/>\n                </a>\n              </div>\n              <div class=\"col-sm-4\" style=\"\">\n                  <a href=\"/category/cartons.html\" rel=\"Khuyen mai 4\">\n                    <img src=\"/assets/img/banner-4.png\" alt=\"khuyen mai thang 8/2017\"/>\n                  </a>\n                  <a href=\"/category/nhan-decal.html\" rel=\"Khuyen mai 1\">\n                    <img src=\"/assets/img/banner-4.png\" alt=\"khuyen mai thang 8/2017\"/>\n                  </a>\n                  <a href=\"/category/nhan-decal.html\" rel=\"Khuyen mai 1\">\n                    <img src=\"/assets/img/banner-4.png\" alt=\"khuyen mai thang 8/2017\"/>\n                  </a>\n              </div>\n              <div class=\"col-sm-4\"><a href=\"#\" rel=\"Khuyen mai 1\">\n                  <img src=\"/assets/img/banner-3.png\" alt=\"khuyen mai thang 8/2017\"/>\n                </a>\n                </div>\n','#lich2018');

/*!40000 ALTER TABLE `catagory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	('6fd35d95a5d3a1033192d6865cf4c7a6','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3',1509804969,''),
	('ccb59f3fe4f30e1a2c35e0dfa9174ac0','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3',1509121598,''),
	('5b3b911b977da56554ee01f8d22299d9','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3',1509093415,'a:14:{s:3:\"cid\";s:2:\"29\";s:13:\"customer_name\";s:4:\"demo\";s:4:\"name\";s:21:\"HOANG PHUONG TRUNG TA\";s:5:\"email\";s:22:\"abhishek@devzone.co.in\";s:7:\"address\";s:72:\"1992 Food & Drink, Nam Kỳ Khởi Nghĩa, Mỹ Tho, Tien Giang, Vietnam\";s:12:\"phone_number\";s:10:\"0919995469\";s:17:\"is_customer_login\";b:1;s:2:\"id\";s:1:\"1\";s:8:\"username\";s:4:\"demo\";s:14:\"is_admin_login\";b:1;s:9:\"user_type\";s:2:\"SA\";s:13:\"cart_contents\";a:7:{s:32:\"c4ca4238a0b923820dcc509a6f75849b\";a:8:{s:5:\"rowid\";s:32:\"c4ca4238a0b923820dcc509a6f75849b\";s:2:\"id\";s:1:\"1\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:5:\"95000\";s:4:\"name\";s:11:\"carton-vivs\";s:5:\"image\";s:11:\"footer7.png\";s:4:\"desc\";s:11:\"carton vivs\";s:8:\"subtotal\";i:95000;}s:32:\"a87ff679a2f3e71d9181a67b7542122c\";a:8:{s:5:\"rowid\";s:32:\"a87ff679a2f3e71d9181a67b7542122c\";s:2:\"id\";s:1:\"4\";s:3:\"qty\";s:1:\"2\";s:5:\"price\";s:5:\"35000\";s:4:\"name\";s:10:\"lich-loc-2\";s:5:\"image\";s:26:\"1503460654976_97552056.jpg\";s:4:\"desc\";s:12:\"lich lốc 2\";s:8:\"subtotal\";i:70000;}s:32:\"e4da3b7fbbce2345d7772b0674a318d5\";a:8:{s:5:\"rowid\";s:32:\"e4da3b7fbbce2345d7772b0674a318d5\";s:2:\"id\";s:1:\"5\";s:3:\"qty\";s:1:\"9\";s:5:\"price\";s:5:\"45000\";s:4:\"name\";s:10:\"fdsafdsafa\";s:5:\"image\";s:26:\"1503460654976_97552057.jpg\";s:4:\"desc\";s:10:\"fdsafdsafa\";s:8:\"subtotal\";i:405000;}s:32:\"8f14e45fceea167a5a36dedd4bea2543\";a:8:{s:5:\"rowid\";s:32:\"8f14e45fceea167a5a36dedd4bea2543\";s:2:\"id\";s:1:\"7\";s:3:\"qty\";s:1:\"6\";s:5:\"price\";s:5:\"70000\";s:4:\"name\";s:10:\"lich-block\";s:5:\"image\";s:15:\"dilinh-2107.png\";s:4:\"desc\";s:10:\"lich block\";s:8:\"subtotal\";i:420000;}s:32:\"1679091c5a880faf6fb5e6087eb1b2dc\";a:8:{s:5:\"rowid\";s:32:\"1679091c5a880faf6fb5e6087eb1b2dc\";s:2:\"id\";s:1:\"6\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:5:\"50000\";s:4:\"name\";s:9:\"lch-d-ban\";s:5:\"image\";s:11:\"footer4.png\";s:4:\"desc\";s:17:\"Lịch để bàn\";s:8:\"subtotal\";i:50000;}s:11:\"total_items\";i:19;s:10:\"cart_total\";i:1040000;}s:7:\"cart_id\";s:11:\"RD2017JPE82\";s:3:\"oid\";i:82;}');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `client_name` varchar(110) DEFAULT NULL,
  `title` varchar(110) DEFAULT NULL,
  `comment` text,
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdelete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;

INSERT INTO `comment` (`id`, `project_id`, `client_name`, `title`, `comment`, `date_create`, `isdelete`)
VALUES
	(12,4,'abhishek@devzone.co.in',NULL,'Du an nay cung dep day','2017-06-17 10:33:15',0),
	(13,4,'abhishek@devzone.co.in',NULL,'giang dem count','2017-06-17 10:42:15',0),
	(14,4,'abhishek@devzone.co.in',NULL,'test','2017-06-17 10:46:17',0),
	(15,4,'abhishek@devzone.co.in',NULL,'trung test','2017-06-17 10:46:32',0),
	(16,5,'abhishek@devzone.co.in',NULL,'Uno binh luab ve trang web nay','2017-06-17 11:06:36',0);

/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `content` text,
  `createdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdelete` int(11) DEFAULT '0',
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id`, `name`, `email`, `content`, `createdate`, `isdelete`, `phone`)
VALUES
	(2,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(3,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(4,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(5,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(6,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(7,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(8,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(9,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(10,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(11,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(12,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(13,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(14,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(15,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(16,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(17,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(18,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(19,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(20,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(21,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(22,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(23,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(24,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(25,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(26,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(27,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(28,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(29,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(30,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(31,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(32,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(33,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(34,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(35,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(36,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(37,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(38,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(39,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(40,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(41,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(42,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(43,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(44,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(45,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(46,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(47,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(48,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(49,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(50,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(51,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(52,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(53,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(54,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(55,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(56,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(57,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(58,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(59,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(60,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(61,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(62,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(63,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(64,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(65,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(66,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(67,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(68,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(69,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(70,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(71,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(72,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(73,'giang ho','tieu@gmai.com','khong tin ',NULL,0,NULL),
	(74,'trung','tieuti88@gmail.com','fiudhfdioafd','2017-05-12 23:49:10',NULL,'0997 6666 78'),
	(75,'trung','tieuti88@gmail.com','fiudhfdioafd','2017-05-12 23:49:34',NULL,'0997 6666 78'),
	(76,'trung','tieuti88@gmail.com','fiudhfdioafd','2017-05-12 23:50:55',NULL,'0997 6666 78'),
	(77,'trung','tieuti88@yahoo.com','asd',NULL,0,'0919995650'),
	(78,'trung2','tieutii8@yaho.co','asdf\n','2017-05-18 23:39:39',0,'091234567');

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thumb` varchar(110) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `name` varchar(110) DEFAULT NULL,
  `address` varchar(110) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `company_name` varchar(110) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `datecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(110) DEFAULT NULL,
  `link` varchar(110) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `register_by` varchar(110) DEFAULT '',
  `username` varchar(110) DEFAULT NULL,
  `password` varchar(110) DEFAULT NULL,
  `province` varchar(10) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `thumb`, `email`, `name`, `address`, `age`, `company_name`, `phone_number`, `is_delete`, `datecreate`, `title`, `link`, `author`, `register_by`, `username`, `password`, `province`, `district`)
VALUES
	(29,NULL,'demo@gm.com','HOANG PHUONG TRUNG TA','1992 Food & Drink, Nam Kỳ Khởi Nghĩa, Mỹ Tho, Tien Giang, Vietnam',NULL,NULL,'0919995469',0,'2017-10-19 13:27:03',NULL,NULL,NULL,'','demo','123','hcm','q07'),
	(30,NULL,'trung@123.com','HOANG PHUONG TRUNG TA','Nguyen Hue, Ho Chi Minh City, Ho Chi Minh, Vietnam',NULL,NULL,'919995469',0,'2017-10-19 18:02:32',NULL,NULL,NULL,'','tieuti88','123','hcm','q02'),
	(31,NULL,'asd@yahoo.com','HOANG PHUONG TRUNG TA','Mỹ Tho, Tien Giang, Vietnam',NULL,NULL,'919995469',0,'2017-10-19 18:17:46',NULL,NULL,NULL,'','messi','123','hcm','q03');

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(110) DEFAULT NULL,
  `group_value` varchar(110) DEFAULT NULL,
  `desc` text,
  `status` varchar(50) DEFAULT 'denied',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `group_name`, `group_value`, `desc`, `status`, `date_created`, `is_delete`)
VALUES
	(1,'Điều Hành','sub_admin','Phòng điều hành hoạt động ứng dụng công nghệ.','active','2017-08-10 17:33:01',0),
	(2,'Phòng Kinh Doanh','pkd','Tiếp nhận đơn hàng và chăm sóc khách hàng.','active','2017-08-10 18:15:51',0),
	(3,'Phòng Thiết Kế','ptksp','Phòng thiết kế và kiểm duyệt sản phẩm','active','2017-08-10 18:26:45',0),
	(4,'Phòng thành phẩm','ptcsx','phòng kiểm tra và điều phối in, thành phẩm','active','2017-08-10 18:53:05',0),
	(6,'Phòng sản xuất & kho','psxdh','phogn dieu hanh san xuat va kho hang','active','2017-08-14 17:58:13',0);

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table material
# ------------------------------------------------------------

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table op_chatlieu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `op_chatlieu`;

CREATE TABLE `op_chatlieu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ten` int(11) DEFAULT NULL,
  `ma_chatlieu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_chatlieu` (`ma_chatlieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table op_kichthuoc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `op_kichthuoc`;

CREATE TABLE `op_kichthuoc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table op_loaiin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `op_loaiin`;

CREATE TABLE `op_loaiin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(110) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catagory_id` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(110) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT '0',
  `thumb` varchar(200) DEFAULT NULL,
  `description` text,
  `customer_name` varchar(110) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `datecreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdelete` int(11) DEFAULT '0',
  `seen` int(11) DEFAULT '0',
  `unit` varchar(110) DEFAULT NULL,
  `total_money` double DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`id`, `catagory_id`, `title`, `qty`, `price`, `thumb`, `description`, `customer_name`, `customer_id`, `author`, `datecreate`, `isdelete`, `seen`, `unit`, `total_money`, `order_id`)
VALUES
	(79,'0','2017-10-20 08:42:42',50,0,'1503460654976_97552057.jpg','carton vivs-47<br/>lich lốc 2-1<br/>lich block-1<br/>fdsafdsafa-1<br/>',NULL,29,NULL,'2017-10-20 13:42:14',0,0,NULL,5076500,'RD2017TSZ79'),
	(80,'0','2017-10-20 08:45:35',24,0,'dilinh-2107.png','carton vivs-9<br/>lich lốc 2-1<br/>fdsafdsafa-12<br/>Lịch để bàn-1<br/>lich block-1<br/>',NULL,29,NULL,'2017-10-20 13:45:17',0,0,NULL,1705000,'RD2017ICO80'),
	(81,'0','2017-10-27 08:35:58',80,0,'footer7.png','carton vivs-80<br/>',NULL,29,NULL,'2017-10-27 13:35:01',0,0,NULL,8360000,'RD2017CQU81'),
	(82,'0','2017-10-27 09:17:04',19,0,'footer4.png','carton vivs-1<br/>lich lốc 2-2<br/>fdsafdsafa-9<br/>lich block-6<br/>Lịch để bàn-1<br/>',NULL,29,NULL,'2017-10-27 14:16:57',0,0,NULL,1144000,'RD2017JPE82');

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_pro` varchar(110) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `tax` int(11) DEFAULT '10',
  `total` float DEFAULT '0',
  `note` text,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_create` varchar(110) NOT NULL DEFAULT '',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;

INSERT INTO `order_detail` (`order_id`, `id`, `name_pro`, `qty`, `price`, `tax`, `total`, `note`, `date_create`, `user_create`, `is_delete`)
VALUES
	(79,83,'carton-vivs',47,95000,10,0,NULL,'2017-10-20 13:42:42','customer',0),
	(79,84,'lich-loc-2',1,35000,10,0,NULL,'2017-10-20 13:42:42','customer',0),
	(79,85,'lich-block',1,70000,10,0,NULL,'2017-10-20 13:42:42','customer',0),
	(79,86,'fdsafdsafa',1,45000,10,0,NULL,'2017-10-20 13:42:42','customer',0),
	(80,87,'carton-vivs',9,95000,10,0,NULL,'2017-10-20 13:45:35','customer',0),
	(80,88,'lich-loc-2',1,35000,10,0,NULL,'2017-10-20 13:45:35','customer',0),
	(80,89,'fdsafdsafa',12,45000,10,0,NULL,'2017-10-20 13:45:35','customer',0),
	(80,90,'lch-d-ban',1,50000,10,0,NULL,'2017-10-20 13:45:35','customer',0),
	(80,91,'lich-block',1,70000,10,0,NULL,'2017-10-20 13:45:35','customer',0),
	(81,92,'carton-vivs',80,95000,10,0,NULL,'2017-10-27 13:35:58','customer',0);

/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders_groups`;

CREATE TABLE `orders_groups` (
  `order_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `group_value` varchar(110) NOT NULL DEFAULT '',
  `status` varchar(110) NOT NULL DEFAULT 'unsigned',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_follow` varchar(110) NOT NULL DEFAULT '',
  `user_follow_id` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders_groups` WRITE;
/*!40000 ALTER TABLE `orders_groups` DISABLE KEYS */;

INSERT INTO `orders_groups` (`order_id`, `group_id`, `group_value`, `status`, `date_create`, `user_follow`, `user_follow_id`, `is_delete`, `note`)
VALUES
	(1,2,'pkd','unsigned','2017-08-21 13:54:12','admin',1,0,NULL),
	(3,6,'psxdh','processing','2017-08-21 14:24:10','admin',1,0,NULL),
	(2,6,'psxdh','processing','2017-08-21 15:52:48','admin',1,0,NULL),
	(1,3,'ptksp','market','2017-08-21 15:54:45','admin',1,0,NULL),
	(4,6,'psxdh','packing','2017-08-22 09:46:11','admin',1,0,NULL),
	(1,3,'ptksp','packing','2017-08-22 16:52:45','hoanggiang@yahoo.com',16,0,NULL),
	(5,2,'pkd','market','2017-08-22 16:53:17','p_trung_99@yahoo.com',9,0,NULL),
	(6,2,'pkd','market','2017-08-22 16:53:24','p_trung_99@yahoo.com',9,0,NULL),
	(7,2,'pkd','market','2017-08-22 16:53:30','p_trung_99@yahoo.com',9,0,NULL),
	(8,2,'pkd','market','2017-08-22 17:05:53','p_trung_99@yahoo.com',9,0,NULL),
	(9,2,'pkd','market','2017-08-22 17:05:57','p_trung_99@yahoo.com',9,0,NULL),
	(27,2,'pkd','order_cancel','2017-08-23 09:14:05','p_trung_99@yahoo.com',9,0,NULL),
	(26,2,'pkd','order_cancel','2017-08-23 09:20:31','p_trung_99@yahoo.com',9,0,'Khách hàng order sai\n'),
	(25,2,'pkd','order_cancel','2017-08-23 09:28:23','p_trung_99@yahoo.com',9,0,'sai thông tin'),
	(2,0,'admin','order_cancel','2017-08-23 09:34:41','tieuti8@gmail.com',1,0,'fdsafedafd'),
	(9,0,'admin','order_cancel','2017-08-23 09:36:19','tieuti8@gmail.com',1,0,'fageagragraegreagr'),
	(1,0,'admin','order_cancel','2017-08-23 11:23:43','tieuti8@gmail.com',1,0,'huy don hang gap'),
	(24,2,'pkd','market','2017-08-23 12:07:38','p_trung_99@yahoo.com',9,0,NULL),
	(23,2,'pkd','market','2017-08-23 12:08:00','p_trung_99@yahoo.com',9,0,NULL),
	(22,2,'pkd','market','2017-08-23 12:09:00','p_trung_99@yahoo.com',9,0,''),
	(21,2,'pkd','market','2017-08-23 12:09:10','p_trung_99@yahoo.com',9,0,''),
	(20,2,'pkd','market','2017-08-23 12:09:46','p_trung_99@yahoo.com',9,0,''),
	(19,2,'pkd','market','2017-08-23 12:10:01','p_trung_99@yahoo.com',9,0,''),
	(18,2,'pkd','market','2017-08-23 12:10:03','p_trung_99@yahoo.com',9,0,''),
	(10,2,'pkd','market','2017-08-23 12:10:09','p_trung_99@yahoo.com',9,0,''),
	(24,2,'pkd','order_cancel','2017-08-23 13:44:53','p_trung_99@yahoo.com',9,0,'khong in nua'),
	(30,0,'admin','market','2017-10-17 15:51:30','tieuti8@gmail.com',1,0,''),
	(29,0,'admin','market','2017-10-17 15:51:34','tieuti8@gmail.com',1,0,''),
	(35,0,'admin','market','2017-10-17 17:06:49','tieuti8@gmail.com',1,0,'');

/*!40000 ALTER TABLE `orders_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `role` varchar(110) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;

INSERT INTO `permission` (`id`, `controller`, `action`, `role`, `is_delete`, `date_create`)
VALUES
	(1,'staff','index','[\"admin\",\"sub_admin\"]',0,'2017-08-11 15:34:13'),
	(2,'groups','index','[\"admin\",\"sub_admin\"]',0,'2017-08-11 16:03:44'),
	(3,'groups','add_permission','[\"admin\"]',0,'2017-08-11 16:03:44'),
	(4,'groups','permission','[\"admin\"]',0,'2017-08-11 16:03:44'),
	(18,'staff','delete','[\"admin\"]',0,'2017-08-15 14:50:17'),
	(20,'staff','register','[\"admin\"]',0,'2017-08-15 14:50:06'),
	(22,'groups','update_permission','[\"admin\"]',0,'2017-08-15 16:10:37'),
	(24,'order','index','[\"admin\",\"pkd\",\"ptcsx\",\"ptksp\",\"psxdh\"]',0,'2017-08-16 12:20:21'),
	(25,'staff','info','[\"admin\"]',0,'2017-08-17 00:29:54'),
	(26,'order','order_assign','[\"admin\",\"pkd\"]',0,'2017-08-21 16:20:47'),
	(27,'groups','status','[\"admin\"]',0,'2017-08-21 16:55:39'),
	(28,'groups','view','[\"admin\"]',0,'2017-08-21 16:58:48'),
	(29,'order','order_gotoprint','[\"admin\",\"ptksp\"]',0,'2017-08-21 17:00:21'),
	(30,'order','order_market','[\"admin\"]',0,'2017-08-21 17:00:39'),
	(31,'order','order_delivery','[\"admin\",\"psxdh\"]',0,'2017-08-21 17:00:58'),
	(32,'order','order_packing','[\"admin\",\"ptcsx\"]',0,'2017-08-21 17:10:52'),
	(33,'order','order_cancel','[\"admin\",\"pkd\"]',0,'2017-08-23 00:14:59'),
	(34,'order','send_email','[\"admin\",\"pkd\"]',0,'2017-08-23 13:36:04');

/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(110) DEFAULT NULL,
  `catagory_id` int(11) DEFAULT NULL,
  `author` varchar(110) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `tech` varchar(110) DEFAULT NULL,
  `thumb` varchar(110) DEFAULT NULL,
  `isdelete` int(2) DEFAULT '0',
  `rate` float DEFAULT '0',
  `datecreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `desciption` text,
  `content` text,
  `design_by` varchar(50) DEFAULT NULL,
  `seo_title` varchar(110) DEFAULT NULL,
  `gallery` text,
  `price` double DEFAULT '0',
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `catagory_id`, `author`, `size`, `tech`, `thumb`, `isdelete`, `rate`, `datecreate`, `desciption`, `content`, `design_by`, `seo_title`, `gallery`, `price`, `qty`)
VALUES
	(1,'carton vivs',10,'admin','250x100mm','art 250gsm','footer7.png',0,3.2,NULL,'fdsafdsa','<p>fdsafdsa</p>\n','','carton-vivs','Screen_Shot_2017-09-13_at_10.32_.18_PM_.png',95000,15),
	(2,'lich block',0,'admin',NULL,NULL,'1503460654976_97552055.jpg',1,0,'2017-10-10 12:09:14','fdsafdsa','<p>fdsafdsa</p>\n','ffdsafdsaf',NULL,NULL,NULL,NULL),
	(3,'fewqfeqf',0,'admin',NULL,NULL,'footer.png',1,0,'2017-10-10 12:13:07','fewfewq','<p>feqwfewq</p>\n','fewqfewqf',NULL,NULL,NULL,NULL),
	(4,'lich lốc 2',10,'admin',NULL,NULL,'1503460654976_97552056.jpg',0,0,'2017-10-10 12:15:38','rewqr','<p>rewqre</p>\n','uno','lich-loc-2',NULL,35000,15),
	(5,'fdsafdsafa',10,'admin',NULL,NULL,'1503460654976_97552057.jpg',0,0,'2017-10-10 12:16:33','fdsafdsaf','<p>fdsafdsafdsa</p>\n','fdsafdsa','fdsafdsafa',NULL,45000,15),
	(6,'Lịch để bàn',10,'admin',NULL,NULL,'footer4.png',0,0,'2017-10-10 13:18:27','A AM MO','<p>&quot;Hiện mực nước lũ ở khu vực đang dần r&uacute;t nhưng mưa lại bắt đầu xuất hiện trở lại. Nguy cơ vỡ đập thủy điện từ tr&ecirc;n thượng nguồn l&agrave; rất lớn. Ch&uacute;ng t&ocirc;i cố gắng sơ t&aacute;n người d&acirc;n ra khỏi khu vực nguy hiểm. Thiệt hại về nh&agrave; cửa, hoa m&agrave;u ở x&atilde; vẫn chưa thể thống k&ecirc;&quot;, &ocirc;ng Xu&acirc;n n&oacute;i.</p>\n\n<table align=\"center\">\n	<tbody>\n		<tr>\n			<td><img alt=\"Rong cap treo cuu 31 nguoi bi lu co lap o Yen Bai hinh anh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/kbd_kcpd/2017_10_11/map_yenbai_lu.jpg\" style=\"height:544px; width:1043px\" /></td>\n		</tr>\n		<tr>\n			<td>X&atilde; Thạch Lương (&ocirc; đỏ) nơi xảy ra lũ c&aacute;ch TP Y&ecirc;n B&aacute;i 80km. Ảnh:&nbsp;<em>Google Maps.</em></td>\n		</tr>\n	</tbody>\n</table>\n','Uno','lch-d-ban','Hai_Decors_card_2017_op1.png,Screen_Shot_2017-08-07_at_5.12_.45_PM_.png',50000,15),
	(7,'lich block',10,'admin',NULL,NULL,'dilinh-2107.png',0,0,'2017-10-10 13:39:06','cdsafdsafdsaf','<p><br />\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Th&ocirc;ng số sản phẩm<br />\nModel iPhone 7<br />\nT&iacute;nh năng camera &nbsp;Geo-tagging, simultaneous 4K video, 8MP image recording, touch focus, face/smile detection, HDR (photo/panorama)<br />\nHệ điều h&agrave;nh &nbsp;iOS 10<br />\nKết nối 4G LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 27(800), 28(700), 29(700), 30(2300), 38(2600), 39(1900), 40(2300), 41(2500) 3G HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100, CDMA2000 1xEV-DO &amp; TD-SCDMA 2G GSM 850 / 900 / 1800 / 1900, CDMA 800 / 1900 / 2100 Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot Bluetooth v4.2, A2DP, LE<br />\nTốc độ CPU &nbsp;Quad-core<br />\nK&iacute;ch thước &nbsp;138.3 x 67.1 x 7.1mm<br />\nLoại m&agrave;n h&igrave;nh LED-backlit IPS LCD<br />\nĐộ ph&acirc;n giải m&agrave;n h&igrave;nh 750 x 1334 pixels<br />\nRAM 2GB<br />\nQuay phim 2160p@30fps, 1080p@30/60/120fps, 720p@240fps<br />\n&nbsp;Xem th&ecirc;m<br />\nTh&ocirc;ng tin sản phẩm<br />\nApple iPhone 7 32GB (H&agrave;ng ch&iacute;nh h&atilde;ng VN/A)</p>\n\n<p>iPhone 7 cuối c&ugrave;ng đ&atilde; ch&iacute;nh thức lộ diện với thế giới c&ocirc;ng nghệ trong sự kiện do Apple tổ chức v&agrave;o ng&agrave;y 7/9 vừa qua. C&oacute; thể nhiều người sẽ kh&aacute; thất vọng về chiếc iPhone thế hệ thứ 10 khi mong đợi qu&aacute; nhiều v&agrave;o một sự cải biến to&agrave;n diện cả về h&igrave;nh thức lẫn &ldquo;nội dung&rdquo; đến từ Apple, v&agrave; nhận ra rằng, iPhone 7 cũng tương tự như những th&ocirc;ng tin đ&atilde; được đồn đo&aacute;n trước đ&oacute;. Nhưng, để nh&igrave;n nhận lại một c&aacute;ch kh&aacute;ch quan th&igrave; nh&agrave; T&aacute;o vẫn l&agrave;m rất tốt những cải tiến cần thiết đối với một thế hệ iPhone mới. Apple cũng đ&atilde; trang bị cho iPhone 7 những điểm mới, v&agrave; vẫn như thường lệ, tạo n&ecirc;n sự kh&aacute;c biệt giữa sản phẩm của Apple với h&agrave;ng loạt những smartphone kh&aacute;c đang tr&agrave;n ngập tr&ecirc;n thị trường.</p>\n\n<p>Vậy điều g&igrave; đ&atilde; tạo n&ecirc;n sự kh&aacute;c biệt cho iPhone 7, h&atilde;y c&ugrave;ng Adayroi.com t&igrave;m hiểu chi tiết!</p>\n\n<p><br />\nDải ăng-ten &ldquo;xấu x&iacute;&rdquo; v&agrave; m&agrave;u sắc mới</p>\n\n<p>Dải ăng-ten được cho l&agrave; th&ocirc; kệch v&agrave; xấu x&iacute; tr&ecirc;n thế hệ iPhone 6/6s nay đ&atilde; được đưa l&ecirc;n 2 cạnh tr&ecirc;n v&agrave; dưới, mềm mại, thon thả hơn v&agrave; khiến cho phần mặt lưng iPhone 7 cứng c&aacute;p, liền mạch đ&aacute;ng kể. Một điểm cộng đ&aacute;ng ghi nhận cho Apple!</p>\n\n<p><br />\nSo Huu Mau Moi Trong Bo Suu Tap<br />\niPhone 7 mới sẽ c&oacute; 5 m&agrave;u sắc: V&agrave;ng, V&agrave;ng Hồng, Bạc, Đen v&agrave; Đen Jet Black</p>\n\n<p>iPhone 7 cũng được giới thiệu với m&agrave;u sắc mới: Jet Black, n&acirc;ng tổng số phi&ecirc;n bản m&agrave;u sắc người d&ugrave;ng c&oacute; thể lựa chọn l&ecirc;n tới 5 m&agrave;u. M&agrave;u đen mới Jet Black được đ&aacute;nh gi&aacute; kh&aacute; cao với lớp vỏ kim loại v&agrave; c&aacute;c chi tiết c&oacute; m&agrave;u đen đồng bộ, bề mặt được xử l&yacute; b&oacute;ng bẩy tạo cảm gi&aacute;c sang trọng v&agrave; cực kỳ nổi bật.</p>\n\n<p>&nbsp;</p>\n\n<p>Khả năng chống nước</p>\n\n<p>iPhone 7 l&agrave; chiếc điện thoại đầu tr&ecirc;n trong d&ograve;ng sản phẩm iPhone được quảng c&aacute;o khả năng chống nước. V&agrave; IP67 c&oacute; lẽ l&agrave; ti&ecirc;u chuẩn đủ để người d&ugrave;ng iPhone 7 c&oacute; đủ tự tin sử dụng ở nhiều điều kiện thời tiết thay v&igrave; lu&ocirc;n phải n&acirc;ng niu chiếc điện thoại y&ecirc;u qu&yacute;.</p>\n\n<p><br />\nChong Nuoc Chong Bui IP67<br />\nThiết kế mới đạt ti&ecirc;u chuẩn chống nước &ndash; chống bụi IP67</p>\n\n<p><br />\nNếu so s&aacute;nh với chiếc Galaxy S7 đến từ &ldquo;k&igrave;nh địch&rdquo; Samsung với thiết kế đạt chuẩn IP68 th&igrave; iPhone 7 c&oacute; hơi l&eacute;p v&eacute;, tuy nhi&ecirc;n ở điều kiện sử dụng b&igrave;nh thường th&igrave; IP67 đ&atilde; l&agrave; qu&aacute; đủ. Tất nhi&ecirc;n, nh&agrave; sản xuất cũng kh&ocirc;ng khuyến c&aacute;o sử dụng chiếc iPhone mới khi đi bơi, hay thử ng&acirc;m trong nước để tr&aacute;nh xảy ra c&aacute;c sự cố đ&aacute;ng tiếc.</p>\n\n<p><br />\nBỏ cổng tai nghe 3.5mm</p>\n\n<p>Apple, cụ thể hơn l&agrave; những chiếc iPhone của Apple, đ&atilde; từng c&oacute; tiền lệ về việc tạo n&ecirc;n những xu hướng mới cho c&aacute;c nh&agrave; sản xuất smartphone kh&aacute;c. iPhone thế hệ đầu ti&ecirc;n dẫn đầu xu hướng l&agrave;m điện thoại c&oacute; m&agrave;n h&igrave;nh cảm ứng, cũng l&agrave; một trong số &iacute;t điện thoại c&ugrave;ng thời trang bị cổng tai nghe 3.5mm. V&agrave; giờ đ&acirc;y, iPhone 7 cũng l&agrave; chiếc điện thoại được quyết định sẽ loại bỏ cổng 3.5mm. iPhone 7 kh&ocirc;ng phải l&agrave; smartphone đầu ti&ecirc;n kh&ocirc;ng sử dụng cổng 3.5mm, nhưng chắc chắn Apple c&ugrave;ng với iPhone 7 vẫn g&acirc;y được sự ch&uacute; &yacute; cũng như sức ảnh hưởng lớn nhất. Ch&uacute;ng ta sẽ c&oacute; tai nghe EarPods mới sử dụng cổng Lightning đi k&egrave;m, v&agrave; một đầu chuyển Lightning sang 3.5mm để sử dụng với c&aacute;c loại tai nghe cũ. V&agrave; nếu muốn thực sự trải nghiệm c&ocirc;ng nghệ mới, bạn c&oacute; thể sắm cho m&igrave;nh một bộ tai nghe AirPods.</p>\n\n<p>&nbsp;</p>\n\n<p><br />\n&Acirc;m thanh Stereo</p>\n\n<p><br />\nHe Thong Am Thanh Stereo<br />\nHệ thống &acirc;m thanh stereo sống động</p>\n\n<p><br />\nC&oacute; lẽ việc bỏ cổng tai nghe 3.5mm đ&atilde; phần n&agrave;o gi&uacute;p nh&agrave; sản xuất c&oacute; thể đưa v&agrave;o nhiều hơn những th&agrave;nh phần linh kiện mới. Một trong số minh chứng cho điều đ&oacute; l&agrave; iPhone 7 giờ đ&acirc;y được trang bị hệ thống loa Stereo ho&agrave;n chỉnh, một loa ở đ&aacute;y m&aacute;y như cũ, v&agrave; một loa mới ở đỉnh m&aacute;y. Điều n&agrave;y cũng hứa hẹn chiếc iPhone mới sẽ mang lại trải nghiệm &acirc;m thanh hứng th&uacute; v&agrave; s&ocirc;i động hơn nhiều so với trước đ&acirc;y.</p>\n\n<p>&nbsp;</p>\n\n<p>N&uacute;t Home cảm ứng</p>\n\n<p>iPhone 7 đ&atilde; bỏ hẳn n&uacute;t Home vật l&yacute; để trang bị cảm ứng lực Force Touch. Taptic Engine được t&iacute;ch hợp liền với n&uacute;t Home để phản hồi lại lực nhấn của người d&ugrave;ng tương tự như Apple đ&atilde; l&agrave;m với Apple Watch hay Macbook trước đ&acirc;y.</p>\n\n<p><br />\nNut Home Moi<br />\nN&uacute;t Home mới tr&ecirc;n iPhone 7 &ndash; t&iacute;ch hợp Taptic Engine</p>\n\n<p>&nbsp;</p>\n\n<p>Việc thay đổi n&uacute;t Home kh&ocirc;ng chỉ gi&uacute;p cải thiện việc sắp xếp c&aacute;c th&agrave;nh phần linh kiện b&ecirc;n trong, m&agrave; c&ograve;n mở ra hướng đi mới trong việc truy cập ứng dụng, thực hiện nhiều t&aacute;c vụ hơn với c&aacute;c mức phản hồi lực kh&aacute;c nhau.</p>\n\n<p>&nbsp;</p>\n\n<p>Kh&ocirc;ng c&ograve;n dung lượng bộ nhớ 16GB</p>\n\n<p>Kết quả Google lu&ocirc;n cho về h&agrave;ng loạt những c&acirc;u hỏi v&agrave; chia sẻ về việc tiết kiệm bộ nhớ iPhone, hay l&agrave;m thế n&agrave;o để &ldquo;sống s&oacute;t&rdquo; với bộ nhớ 16GB. Quả thực trong cuộc sống c&ocirc;ng nghệ hiện nay, 16GB bộ nhớ tr&ecirc;n iPhone 6s trở về trước đ&atilde; bắt đầu l&agrave;m cho người d&ugrave;ng cảm thấy &ldquo;thiếu thốn&rdquo;. Với iPhone 7, ch&uacute;ng ta sẽ c&oacute; 3 phi&ecirc;n bản bộ nhớ mới: 32GB, 128GB v&agrave; 256GB. Vậy l&agrave; sẽ kh&ocirc;ng c&ograve;n phi&ecirc;n bản 16GB v&agrave; 64GB như trước đ&acirc;y. B&ugrave; lại, người d&ugrave;ng cơ bản sẽ thoải m&aacute;i hơn với 32GB bộ nhớ trong thay v&igrave; li&ecirc;n tục phải sao lưu ảnh, video v&agrave; nhăn tr&aacute;n t&iacute;nh to&aacute;n mỗi khi muốn c&agrave;i đặt ứng dụng mới.</p>\n\n<p>&nbsp;</p>\n\n<p>Camera n&acirc;ng cấp</p>\n\n<p>Camera tr&ecirc;n iPhone 7 vẫn sử dụng cụm ống k&iacute;nh đơn độ ph&acirc;n giải 12MP, kh&aacute;c biệt về vẻ ngo&agrave;i kh&ocirc;ng qu&aacute; nhiều so với iPhone 6 hay 6s, kh&aacute;c với chiếc iPhone 7 Plus với cụm camera đ&ocirc;i nổi bật.</p>\n\n<p><br />\nNang Cap Camera<br />\nHệ thống camera n&acirc;ng cấp với 6 th&agrave;nh phần thấu k&iacute;nh</p>\n\n<p>Thay v&agrave;o đ&oacute;, camera mới của iPhone 7 được n&acirc;ng cấp về &ldquo;nội thất&rdquo; kh&aacute; nhiều: Ống k&iacute;nh 6 th&agrave;nh phần, chống rung quang học, khẩu độ f/1.8, cảm biến nhanh hơn 60% v&agrave; tiết kiệm pin hơn 30%. Ngo&agrave;i ra, bộ xử l&yacute; h&igrave;nh ảnh cũng tốt hơn c&ugrave;ng đ&egrave;n LED flash t&iacute;ch hợp l&ecirc;n tới 4 đ&egrave;n, cho khả năng c&acirc;n bằng trắng tốt hơn khi cần.</p>\n\n<p>&nbsp;</p>\n\n<p>Bộ sưu tập ảnh chụp của iPhone 7 v&agrave; 7 Plus với camera n&acirc;ng cấp</p>\n\n<p>Khả năng chụp ảnh selfie với iPhone 7 cũng sẽ được cải thiện đ&aacute;ng kể với n&acirc;ng cấp camera trước l&ecirc;n tới 7MP v&agrave; t&iacute;nh năng chống rung t&iacute;ch hợp. iPhone lu&ocirc;n nổi tiếng với camera &ldquo;chỉ cần đưa m&aacute;y l&ecirc;n v&agrave; chụp&rdquo;, tất nhi&ecirc;n ch&uacute;ng ta cũng ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m về camera iPhone 7 như vậy.</p>\n\n<p><br />\nAnh Chup Tu iPhone 7 v&agrave; 7 Plus<br />\nThoải m&aacute;i chụp ảnh với camera trước n&acirc;ng cấp l&ecirc;n 7MP</p>\n\n<p>&nbsp;</p>\n\n<p>Vi xử l&yacute; A10 Fusion</p>\n\n<p>Phần cứng b&ecirc;n trong l&agrave; yếu tố kh&aacute; nhiều người d&ugrave;ng &iacute;t quan t&acirc;m tới. Tuy nhi&ecirc;n, Apple lu&ocirc;n kh&ocirc;ng ngừng cải tiến sức mạnh b&ecirc;n trong sản phẩm của họ để mang lại trải nghiệm tốt nhất tới từng kh&aacute;ch h&agrave;ng.</p>\n\n<p><br />\nVi Xu Ly A10<br />\nVi xử l&yacute; Apple A10 n&acirc;ng cấp nhiều về sức mạnh xử l&yacute; v&agrave; hiệu năng đồ họa</p>\n\n<p>&nbsp;</p>\n\n<p>Vi xử l&yacute; tr&ecirc;n c&aacute;c thế hệ iPhone tiếp theo lu&ocirc;n c&oacute; hiệu năng tốt so với đời trước l&agrave; điều g&atilde; khổng lồ c&ocirc;ng nghệ lu&ocirc;n l&agrave;m được. Với iPhone 7 v&agrave; con chip A10 Fusion, với 4 nh&acirc;n xử l&yacute; được c&ocirc;ng bố l&agrave; cho hiệu năng cao hơn 40% so với Apple A9. Chip đồ họa 6 l&otilde;i mới cũng mạnh hơn tới 50% trong khi chỉ sử dụng năng lượng bằng 2/3 thế hệ trước. Vậy l&agrave;, ch&uacute;ng ta sẽ c&oacute; một chiếc iPhone mạnh mẽ hơn nhưng lại tiết kiệm pin hơn. Cụ thể, iPhone 7 sẽ c&oacute; thời lượng pin cao hơn iPhone 6s 2 giờ đồng hồ.</p>\n\n<p>&nbsp;</p>\n\n<p>iOS 10</p>\n\n<p>Sẽ xuất xưởng c&ugrave;ng hệ điều h&agrave;nh iOS 10, iPhone 7 hứa hẹn sẽ mang đến trải nghiệm đầy đủ nhất cho về những t&iacute;nh năng mới hấp dẫn, về tin nhắn, Siri v&agrave; c&aacute;c ứng dụng kh&aacute;c m&agrave; người d&ugrave;ng mới được thử nghiệm tr&ecirc;n c&aacute;c bản beta trước đ&acirc;y.</p>\n\n<p><br />\nHe Dieu Hanh iOS 10<br />\nGiao diện iOS 10 đẹp mắt, hấp dẫn<br />\n&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Super Mario Run dự kiến sẽ xuất hiện tr&ecirc;n iOS v&agrave;o cuối năm 2016</p>\n\n<p>Một tin kh&aacute; th&uacute; vị c&ugrave;ng với việc ra mắt iPhone 7 l&agrave; c&ugrave;ng với iOS 10, Apple sẽ đưa tựa game Mario huyền thoại l&ecirc;n nền tảng iOS. Trong sự kiện ra mắt, Shigeru Miyamoto &ndash; &ldquo;cha đẻ&rdquo; của anh ch&agrave;ng thợ sửa ống nước Mario đ&atilde; giới thiệu về tr&ograve; chơi c&oacute; t&ecirc;n &ldquo;Super Mario Run&rdquo;. Đ&acirc;y l&agrave; tr&ograve; chơi đầu ti&ecirc;n về Mario xuất hiện tr&ecirc;n smartphone, với c&aacute;ch chơi ho&agrave;n to&agrave;n mới, v&agrave; hệ thống xếp hạng người chơi hấp dẫn. Hi vọng đ&acirc;y sẽ l&agrave; một m&oacute;n qu&agrave; hấp dẫn d&agrave;nh cho c&aacute;c fan h&acirc;m mộ Apple, đặc biệt l&agrave; những fan h&acirc;m mộ trung th&agrave;nh với tựa game Super Mario.</p>\n\n<p><br />\nSuper Mario Run<br />\nTựa game Mario hấp dẫn mới sắp xuất hiện tr&ecirc;n nền tảng của iOS</p>\n','fdsa','lich-block','Screen_Shot_2017-09-13_at_10.32_.18_PM_1.png,Screen_Shot_2017-09-13_at_10.34_.51_PM_.png',70000,19);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(110) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `logo_customer` varchar(200) DEFAULT NULL,
  `desciption` text,
  `customer_name` varchar(110) DEFAULT NULL,
  `content` text,
  `author` varchar(100) DEFAULT NULL,
  `datecreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdelete` int(11) DEFAULT '0',
  `design_by` varchar(50) DEFAULT NULL,
  `seen` int(11) DEFAULT '0',
  `like` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;

INSERT INTO `project` (`id`, `category_id`, `title`, `thumb`, `logo_customer`, `desciption`, `customer_name`, `content`, `author`, `datecreate`, `isdelete`, `design_by`, `seen`, `like`)
VALUES
	(1,'[\"0\",\"5\",\"8\"]','Bộ Khuyến Mãi 5% Ductch Lady','biz_0428_eyecatch.jpg',NULL,NULL,NULL,'<h2>Đi c&ugrave;ng với Thương Hiệu</h2>\r\n\r\n<p>&ldquo;Để tảo ra sản phẩm đẹp đầu ti&ecirc;n ch&uacute;ng ta phải l&agrave; người hiểu về n&oacute;, để tạo ra sản phẩm ấn tượng ch&uacute;ng ta phải đi c&ugrave;ng với n&oacute;. Stancolor sẽ ph&aacute;t triển thượng hiệu của qu&yacute; kh&aacute;ch h&agrave;ng th&ocirc;ng qua bao b&igrave; bằng c&aacute;ch đi c&ugrave;ng với thương hiệu của sản phẩm&rdquo;<img alt=\"Đi cùng với Thương Hiệu\" src=\"http://giaoduc.wp/assets/images/55737b50056225.58c66a1a0fb9d.jpg\" /><img alt=\"Đi cùng với Thương Hiệu\" src=\"http://giaoduc.wp/assets/images/df763550056225.58c66a1a151a5.jpg\" /><img alt=\"Đi cùng với Thương Hiệu\" src=\"http://giaoduc.wp/assets/images/2642db50056225.58c66a1a129a1.jpg\" /></p>\r\n\r\n<p>&ldquo;Để tảo ra sản phẩm đẹp đầu ti&ecirc;n ch&uacute;ng ta phải l&agrave; người hiểu về n&oacute;, để tạo ra sản phẩm ấn tượng ch&uacute;ng ta phải đi c&ugrave;ng với n&oacute;. Stancolor sẽ ph&aacute;t triển thượng hiệu của qu&yacute; kh&aacute;ch h&agrave;ng th&ocirc;ng qua bao b&igrave; bằng c&aacute;ch đi c&ugrave;ng với thương hiệu của sản phẩm&rdquo;</p>\r\n\r\n<p><img alt=\"Đi cùng với Thương Hiệu\" src=\"http://giaoduc.wp/assets/images/2ef1fe50056225.58c66a1a11035.jpg\" /><img alt=\"Đi cùng với Thương Hiệu\" src=\"http://giaoduc.wp/assets/images/c2d24650056225.58c66a1a116b1.jpg\" /></p>\r\n','admin','2017-05-15 23:44:00',1,NULL,0,0),
	(2,'[\"0\",\"4\"]','Try our gorgeous ‘Playfair Display’ font to write your sweet message to someone special.','12718361_1147602678585994_1530389816836681240_n1.jpg',NULL,NULL,NULL,'<p>Banners are one of the most common methods of advertising. We see roadside billboards everywhere and marketers use these banners simply for awareness. Do you click on a billboard? Of course not, it&#39;s not possible.</p>\r\n\r\n<p>But in the digital marketing industry, click through rate is very important to measure a banner&#39;s success. A successful banner ad must generate potential leads and should leave an emotional impact on your viewers.</p>\r\n\r\n<p>The days are gone when you could use the old ways to design your banner ads. Google highly recommends that you to&nbsp;<a href=\"https://support.google.com/adwords/answer/6249073\" target=\"_Blank\">switch to HTML5 ads</a>.</p>\r\n\r\n<p>Moving towards better ways to display your banner to a targeted audience, HTML5 banners are taking the place of those old, static banners that have continued to rule the display world since the early days of the Internet. If you are still using static banners for any display campaign, you might be on the losing side and you might be wasting money on ineffective static marketing.</p>\r\n\r\n<h2>HTML 5 Banners Offer an Edge Over Competitors</h2>\r\n\r\n<p>Transforming the digital media world, HTML5 Banners are quite effective and hold a huge edge over those conventional banners that have become obsolete.</p>\r\n\r\n<p>HTML5 banners have several benefits over conventional banners and are the perfect way to develop a proper display campaign. If you&#39;re looking to implement HTML5 banners in your Web marketing campaign, you can outsource design to freelance banner designers who can provide you some of the best options in the field of HTML5 banner design.</p>\r\n\r\n<h2>Ways to Attract Users with HTML5 Banners</h2>\r\n\r\n<p>HTML5 banners are compatible with most browsers and are also mobile friendly, so they offer all the technology needed to flourish in today&#39;s market. A better design makes you stand out, attracts users, and improves your click through rate.</p>\r\n\r\n<p>Here are some ways to attract users with HTML5 Banners:</p>\r\n\r\n<h2>Create Design for Your Audience</h2>\r\n\r\n<p>For a successful marketing campaign, understanding your target audience is key. If you design your banner ads based on your audience&#39;s needs, they will be more likely to connect with your ads. For example, if you&#39;re trying to attract real estate people, you should create ads towards their specific needs. And make sure to tie your banner ad to a relevant landing page to improve the user experience.</p>\r\n','admin','2017-05-17 22:23:53',1,NULL,0,0),
	(3,'[\"0\",\"1\",\"4\",\"5\",\"7\"]','SHRINK SLEEVES','making_your_house_baby_safe1.jpg',NULL,'Avery Dennison businesses around the world share one vision: to make brands more inspiring and the world more intelligent. Our adhesive technologies, display graphics and packaging materials make','Baby','<div style=\"background:#eee; border:1px solid #ccc; padding:5px 10px\">Đeo k&iacute;nh trung h&ograve;a tia s&aacute;ng xanh th&igrave; c&oacute; t&aacute;c dụng tốt cho mắt nếu tiếp x&uacute;c nhiều với m&aacute;y t&iacute;nh, điện thoại. Điểm n&agrave;y th&igrave; ai cũng biết n&ecirc;n m&igrave;nh sẽ kh&ocirc;ng nhắc nữa. Chỉ n&oacute;i về trải nghiệm c&aacute; nh&acirc;n của m&igrave;nh th&ocirc;i. Nếu bạn đ&atilde; đọc b&agrave;i viết n&agrave;y th&igrave; coi như ch&uacute;ng ta đ&atilde; tạm đồng &yacute; với nhau về t&aacute;c dụng cũng như t&aacute;c hại của tia s&aacute;ng xanh, minh sẽ kh&ocirc;ng n&oacute;i nhiều nữa m&agrave; chỉ điểm sơ qua một số điểm để c&aacute;c bạn c&oacute; thể nắm bắt dễ d&agrave;ng hơn.</div>\n\n<ul>\n	<li>\n	<div style=\"background:#eee; border:1px solid #ccc; padding:5px 10px\">Tia s&aacute;ng xanh gi&uacute;p ch&uacute;ng ta tỉnh t&aacute;o đầu &oacute;c, tỉnh ngủ</div>\n	</li>\n	<li>G&acirc;y hại cho mắt nếu tiếp x&uacute;c trong thời gian d&agrave;i</li>\n	<li>G&acirc;y căng thẳng, l&agrave;m mắt kh&ocirc;ng tiết được nước mắt</li>\n</ul>\n\n<p><img alt=\"tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_5.jpg\" src=\"https://photo2.tinhte.vn/data/attachment-files/2017/05/4051677_tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_5.jpg\" style=\"width:100%\" /><br />\n​</p>\n\n<p>C&aacute; nh&acirc;n m&igrave;nh đ&atilde; đeo tr&ograve;ng k&iacute;nh cận chống tia s&aacute;ng xanh được khoảng 1 năm nay, b&acirc;y giờ nh&acirc;n tiện l&agrave;m th&ecirc;m một c&aacute;i k&iacute;nh nữa n&ecirc;n chia sẻ cho c&aacute;c bạn lu&ocirc;n. Thương hiệu m&igrave;nh chọn l&agrave; Hoya, c&ocirc;ng ty Nhật Bản n&agrave;y m&igrave;nh biết v&igrave; họ c&oacute; l&agrave;m nhiều bộ lọc cho ống k&iacute;nh m&aacute;y ảnh, n&ecirc;n cũng phần n&agrave;o tin tưởng. Gi&aacute; một cặp k&iacute;nh m&igrave;nh mua khoảng 600 ng&agrave;n, t&ugrave;y chỗ v&agrave; t&ugrave;y độ cận m&agrave; c&oacute; thể sẽ kh&aacute;c nhau. M&igrave;nh muốn mua Zeiss nhưng m&agrave; gi&aacute; cao qu&aacute; kh&ocirc;ng với được n&ecirc;n th&ocirc;i, bạn n&agrave;o c&oacute; nhiều tiền th&igrave; cứ mua Zeiss v&igrave; bản chất của n&oacute; sẽ rất xịn v&agrave; trong.</p>\n\n<p><br />\n<img alt=\"tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_1.jpg\" src=\"https://photo2.tinhte.vn/data/attachment-files/2017/05/4051673_tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_1.jpg\" style=\"width:100%\" /><br />\n​</p>\n\n<p>Với tr&ograve;ng của Hoya th&igrave; bạn n&agrave;o bị cận hay loạn đều c&oacute; thể d&ugrave;ng được. Một mắt của m&igrave;nh vừa cận vừa loạn nhưng họ vẫn l&agrave;m được tr&ograve;ng.<br />\n<br />\nVề phần k&iacute;nh, do được tr&aacute;ng một lớp phủ m&agrave;u v&agrave;ng n&ecirc;n khi bạn nh&igrave;n qua k&iacute;nh th&igrave; h&igrave;nh ảnh sẽ trở n&ecirc;n v&agrave;ng hơn so với khi kh&ocirc;ng đeo. L&uacute;c đầu m&igrave;nh chưa quen th&igrave; đeo hơi kh&oacute; chịu nhưng sau khoảng v&agrave;i ng&agrave;y th&igrave; cảm thấy dễ chấp nhận hơn, b&acirc;y giờ th&igrave; quen rồi.</p>\n\n<p><br />\n<em><img alt=\"tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_3.jpg\" src=\"https://photo2.tinhte.vn/data/attachment-files/2017/05/4051675_tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_3.jpg\" style=\"width:100%\" />Bạn c&oacute; thấy h&igrave;nh qua k&iacute;nh v&agrave; h&igrave;nh b&ecirc;n ngo&agrave;i hay kh&ocirc;ng?</em><br />\n​</p>\n\n<p>Cũng v&igrave; đặc t&iacute;nh n&agrave;y m&agrave; khi c&aacute;c bạn cần l&agrave;m h&igrave;nh ảnh hay những thứ li&ecirc;n quan đến độ ch&iacute;nh x&aacute;c của m&agrave;u sắc, ch&uacute;ng ta cần th&aacute;o k&iacute;nh ra. Thực chất th&igrave; rất hiếm khi m&igrave;nh cần l&agrave;m điều n&agrave;y n&ecirc;n cũng kh&ocirc;ng quan trọng lắm, nếu &ldquo;m&agrave;u sắc&rdquo; của bạn chỉ l&agrave; &aacute;p hiệu ứng bằng VSCO th&igrave; n&oacute; cũng kh&ocirc;ng ảnh hưởng mấy.</p>\n\n<p><em><img alt=\"tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_2.jpg\" src=\"https://photo2.tinhte.vn/data/attachment-files/2017/05/4051674_tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_2.jpg\" />K&iacute;nh tr&ecirc;n c&oacute; lọc tia s&aacute;ng xanh, k&iacute;nh dưới kh&ocirc;ng c&oacute;. C&aacute;c bạn c&oacute; thấy sự kh&aacute;c biệt ở lớp coating kh&ocirc;ng<br />\n<img alt=\"tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_4.jpg\" src=\"https://photo2.tinhte.vn/data/attachment-files/2017/05/4051676_tinhte_tren_tay_trong_kinh_chong_tia_sang_xanh_blue_filter_hoya_4.jpg\" />Tấm n&agrave;y th&igrave; k&iacute;nh c&oacute; lọc xanh ở dưới, kh&ocirc;ng lọc ở tr&ecirc;n</em>​</p>\n','admin','2017-05-22 14:00:29',1,NULL,0,0),
	(4,'[\"2\",\"7\"]','truong giang printing','phoi-canh-dem-the-queen-pearl.jpg','pho-tay-sam-uat1.jpg','duwj an truong giang printing','Truong giang','<p>With over 30 years of experience in driving innovations for diaper closures and personal care packaging adhesives, our exceptionally broad portfolio of nonwoven tape solutions covers the broad range of diaper tiers. &nbsp;Our worldwide manufacturing capabilities provide reliability and efficiencies for both emerging and mature <big><strong>markets around the globe.</strong></big></p>\n\n<p><img alt=\"\" src=\"http://stancolor.local/uploads/images/images/hoithao-0.JPG\" style=\"width:100%\" /></p>\n\n<p>Our advanced solutions for personal care &nbsp;closure adhesives include a variety of diaper closure systems for&nbsp;<a href=\"http://tapes.averydennison.com/en/home/solutions/personal-care/baby-diaper.html\" onclick=\"javascript:ga(\'send\', \'event\', \'Referral link\', \'click\',\'http://tapes.averydennison.com/en/home/solutions/personal-care/baby-diaper.html\');\">baby diapers</a>,&nbsp;<a href=\"http://tapes.averydennison.com/en/home/solutions/personal-care/adult-diaper.html\" onclick=\"javascript:ga(\'send\', \'event\', \'Referral link\', \'click\',\'http://tapes.averydennison.com/en/home/solutions/personal-care/adult-diaper.html\');\">adult incontinence products</a>, feminine hygiene and personal care packaging.</p>\n','admin','2017-06-13 21:43:47',0,'Truong Giang Print',150,18),
	(5,'[\"2\",\"7\"]','VIDEO cua nam','play-btn.png','logo_stanpak_(1).png','Ngày 16/6, tại hội nghị phản biện dự thảo Nghị quyết của HĐND TP Hà Nội về tăng cường quản lý phương tiện giao thông vào năm 2030, trong đó có việc cấm xe máy tại các quận, nhiều chuyên gia cho rằng Hà Nội khó thực hiện lộ trình trên.','GIA AN','<p>Ng&agrave;y 16/6, tại hội nghị phản biện dự thảo Nghị quyết của HĐND TP H&agrave; Nội về tăng cường quản l&yacute; phương tiện giao th&ocirc;ng v&agrave;o năm 2030, trong đ&oacute; c&oacute; việc cấm xe m&aacute;y tại c&aacute;c quận, nhiều chuy&ecirc;n gia cho rằng H&agrave; Nội kh&oacute; thực hiện lộ tr&igrave;nh tr&ecirc;n.</p>\n\n<p>&ldquo;Căn cứ ph&aacute;p l&yacute; n&agrave;o để H&agrave; Nội dừng lưu h&agrave;nh xe m&aacute;y cũ n&aacute;t v&agrave; đưa ra lộ tr&igrave;nh đến năm 2030 cấm xe m&aacute;y hoạt động tại khu vực c&aacute;c quận nội th&agrave;nh. Nếu cấm xe m&aacute;y nội th&agrave;nh th&igrave; người d&acirc;n đi xe m&aacute;y từ nội th&agrave;nh ra ngoại th&agrave;nh thế n&agrave;o?&rdquo;, Chủ tịch Hội luật gia TP H&agrave; Nội Nguyễn Hồng Tuyến n&ecirc;u vấn đề.</p>\n\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td><img alt=\"chuyen-gia-phan-bien-de-an-cam-xe-may-cua-ha-noi\" src=\"http://img.f29.vnecdn.net/2017/06/17/tac-duong-1251-1497661943.jpg\" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>H&agrave; Nội hiện c&oacute; 5.2 triệu&nbsp;xe m&aacute;y trong nội đ&ocirc; từ năm 2030. Ảnh minh hoạ:&nbsp;<em>B&aacute; Đ&ocirc;.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Nhận định việc cấm xe m&aacute;y nội đ&ocirc; l&agrave; cần thiết, tuy nhi&ecirc;n chuy&ecirc;n gia giao th&ocirc;ng Trần Thị Kim Đăng (Đại học Giao th&ocirc;ng Vận tải H&agrave; Nội) n&oacute;i &quot;sẽ kh&oacute; l&agrave;m&quot;. Theo b&agrave;, về l&yacute; thuyết cấm xe m&aacute;y phải c&oacute; giao th&ocirc;ng c&ocirc;ng cộng thay thế chứ kh&ocirc;ng thể n&oacute;i cấm th&igrave; người d&acirc;n phải chạy bộ, đi bộ.</p>\n\n<p>Chuy&ecirc;n gia đến từ ĐH Giao th&ocirc;ng ph&acirc;n t&iacute;ch, hiện c&aacute;c điểm n&uacute;t giao th&ocirc;ng c&ocirc;ng cộng, nh&agrave; chờ xe bus ph&acirc;n bố rất xa nơi người d&acirc;n ở, trong khi th&oacute;i quen đi bộ của người H&agrave; Nội (người gi&agrave; dưới 1 km, người trẻ khoảng 200 m) kh&aacute;c với người phương T&acirc;y (khoảng 2 km).</p>\n\n<p>Cũng đến từ ĐH Giao th&ocirc;ng, GS. TS Nguyễn Viết Trung cho rằng, chỉ ti&ecirc;u đến năm 2030 cấm xe m&aacute;y l&agrave; kh&ocirc;ng thể đạt được v&igrave; chỉ c&ograve;n 13 năm nữa, lộ tr&igrave;nh n&agrave;y cần phải d&agrave;i th&ecirc;m c&oacute; thể đến năm 2040 v&agrave; cũng chỉ l&agrave; hạn chế ở mức n&agrave;o đ&oacute;. &Ocirc;ng đưa ra đề xuất th&agrave;nh phố tổ chức dịch vụ xe đạp c&ocirc;ng cộng cho người c&oacute; nh&agrave; ở c&aacute;ch xa bến xe bu&yacute;t.</p>\n\n<p>GS.TS &Ocirc;ng B&ugrave;i Xu&acirc;n Cậy (nguy&ecirc;n trưởng bộ m&ocirc;n C&ocirc;ng tr&igrave;nh, ĐH Giao th&ocirc;ng) th&ocirc;ng tin, đa số c&aacute;c nước tr&ecirc;n thế giới cho ph&eacute;p người d&acirc;n sử dụng xe m&aacute;y, chỉ c&oacute; một số&nbsp;quốc gia, th&agrave;nh phố cấm. &Ocirc;ng Cậy dẫn chứng, Đ&agrave;i Loan (Trung Quốc), Th&aacute;i Lan... thu nhập b&igrave;nh qu&acirc;n đầu người cao hơn Việt Nam nhưng hiện họ vẫn sử dụng xe m&aacute;y.</p>\n\n<p>&ldquo;Liệu đến năm 2030, thu nhập đầu người của ch&uacute;ng ta đạt được như c&aacute;c nước hay kh&ocirc;ng?&quot;, &ocirc;ng Cậy n&oacute;i v&agrave; cho rằng, th&agrave;nh phố n&ecirc;n đưa chỉ ti&ecirc;u phấn đấu đến năm 2030 giảm được khoảng 50% số lượng xe m&aacute;y lưu th&ocirc;ng tr&ecirc;n đường ở c&aacute;c quận nội th&agrave;nh l&agrave; hợp l&yacute;.</p>\n\n<p>Nguy&ecirc;n Gi&aacute;m đốc Sở Quy hoạch kiến tr&uacute;c H&agrave; Nội Ng&ocirc; Anh Tuấn ph&acirc;n t&iacute;ch, dự thảo dường như đặt nặng việc &ldquo;cấm đo&aacute;n&rdquo; hơn l&agrave; đưa ra giải ph&aacute;p.&nbsp;&ldquo;Phải đưa v&agrave;o nghị quyết giải ph&aacute;p tập trung ph&aacute;t triển giao th&ocirc;ng c&ocirc;ng cộng rồi h&atilde;y đề cập đến hạn chế xe c&aacute; nh&acirc;n, tiến tới cấm xe m&aacute;y&rdquo; &ocirc;ng Tuấn n&ecirc;u quan điểm.</p>\n\n<p>Đối với lộ tr&igrave;nh dừng hoạt động xe m&aacute;y tại nội th&agrave;nh v&agrave;o năm 2030, &ocirc;ng Tuấn nhận định đ&acirc;y l&agrave; việc qu&aacute; &ldquo;n&oacute;ng vội&rdquo;. Theo &ocirc;ng, việc dừng hoạt động xe m&aacute;y tại nội th&agrave;nh kh&ocirc;ng thể gắn với một năm cụ thể m&agrave; phải gắn với sự ph&aacute;t triển của giao th&ocirc;ng c&ocirc;ng cộng đến mức n&agrave;o, gắn với kết quả đạt được về hạ tầng giao th&ocirc;ng.</p>\n\n<p>&ldquo;Gắn với thời hạn 2030 l&agrave; kh&ocirc;ng c&oacute; căn cứ&rdquo;, &ocirc;ng Tuấn n&oacute;i v&agrave; đề nghị nội dung cấm xe m&aacute;y tại nội đ&ocirc; n&ecirc;n x&acirc;y dựng một đề &aacute;n ri&ecirc;ng để &quot;nghi&ecirc;n cứu thật kỹ c&agrave;ng&quot;, trong đ&oacute; c&oacute; phải trả lời được c&acirc;u hỏi &ldquo;cấm xe m&aacute;y th&igrave; người d&acirc;n đi phương tiện g&igrave;?&rdquo;.</p>\n\n<p><strong>L&atilde;nh đạo H&agrave; Nội: Cấm xe m&aacute;y v&igrave; lợi &iacute;ch chung</strong></p>\n\n<p>Giải đ&aacute;p băn khoăn về căn cứ cấm xe m&aacute;y tại khu vực nội th&agrave;nh v&agrave;o năm 2030, Gi&aacute;m đốc Sở Giao th&ocirc;ng vận tải H&agrave; Nội Vũ Văn Viện cho hay, thẩm quyền tổ chức giao th&ocirc;ng l&agrave; của l&atilde;nh đạo ch&iacute;nh quyền địa phương.</p>\n\n<p>&ldquo;Vừa qua H&agrave; Nội đ&atilde; cấm xe ở một số khu vực như tuyến phố đi bộ. Cho đi ở tuyến phố n&agrave;o, khu vực n&agrave;o, đi v&agrave;o thời điểm n&agrave;o, dừng đỗ ở khu vực n&agrave;o&hellip; l&agrave; thẩm quyền của Chủ tịch UBND TP H&agrave; Nội&rdquo;, &ocirc;ng Viện n&oacute;i.</p>\n\n<p>Ph&oacute; Chủ tịch UBND TP H&agrave; Nội Nguyễn Thế H&ugrave;ng khẳng định, mục ti&ecirc;u xuy&ecirc;n suốt của dự thảo nghị quyết l&agrave; nhằm &ldquo;ph&aacute;t triển kinh tế x&atilde; hội, n&acirc;ng cao chất lượng cuộc sống người d&acirc;n. Đ&acirc;y l&agrave; chăm lo cuộc sống bền vững của người d&acirc;n Thủ đ&ocirc; chứ kh&ocirc;ng chỉ l&agrave; quản l&yacute; một v&agrave;i c&aacute;i xe m&aacute;y&hellip; Ch&uacute;ng ta l&agrave;m c&aacute;i n&agrave;y l&agrave; cho đại bộ phận nh&acirc;n d&acirc;n chứ kh&ocirc;ng phải một số người&rdquo;.</p>\n\n<p>&Ocirc;ng H&ugrave;ng cũng cho rằng, về mặt ph&aacute;p l&yacute; v&agrave; điều kiện để thực hiện mục ti&ecirc;u dự thảo đề ra vẫn c&ograve;n nhiều vấn đề. H&agrave; Nội đang v&agrave; sắp triển khai nhiều giải ph&aacute;p đồng bộ, trong đ&oacute; c&oacute; tăng cường năng lực giao th&ocirc;ng c&ocirc;ng cộng, tổ chức giao th&ocirc;ng hợp l&yacute;, &aacute;p dụng c&ocirc;ng nghệ quản l&yacute; hiện đại, tuy&ecirc;n truyền cho người d&acirc;n&hellip;</p>\n\n<p>Với lộ tr&igrave;nh 2030, &ocirc;ng H&ugrave;ng cho hay H&agrave; Nội phải đưa lộ tr&igrave;nh d&agrave;i để c&oacute; căn cứ, c&oacute; mục ti&ecirc;u cụ thể &ldquo;đong đếm được&rdquo; để thực hiện.</p>\n','admin','2017-06-17 11:03:46',0,'Uno',56,9);

/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_admin_users`;

CREATE TABLE `tbl_admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` enum('SA','A') DEFAULT 'SA' COMMENT 'SA: Super Admin,A: Admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_admin_users` WRITE;
/*!40000 ALTER TABLE `tbl_admin_users` DISABLE KEYS */;

INSERT INTO `tbl_admin_users` (`id`, `username`, `email`, `password`, `block`, `user_type`)
VALUES
	(1,'demo','abhishek@devzone.co.in','7e466fc01a0c7932e96a4a925b11b06a',0,'SA');

/*!40000 ALTER TABLE `tbl_admin_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `signup_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `phone_mobile` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `address_street` varchar(250) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_country` varchar(100) DEFAULT NULL,
  `address_postalcode` varchar(20) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT '',
  `deleted` enum('Y','N') DEFAULT 'N',
  `user_status` enum('A','B') DEFAULT 'A' COMMENT 'A: Active; B: Blocked',
  `photo` text,
  `register_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `signup_date`, `phone_mobile`, `status`, `address_street`, `address_city`, `address_state`, `address_country`, `address_postalcode`, `role`, `deleted`, `user_status`, `photo`, `register_by`)
VALUES
	(1,'admin','202cb962ac59075b964b07152d234b70','trung','ta','tieuti8@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin','Y','A',NULL,NULL),
	(12,NULL,'202cb962ac59075b964b07152d234b70','Nguyen','Thanh','thanh@kit.com','2017-08-09 13:44:31','0999829992',NULL,'3255 North Cedar Avenue',NULL,NULL,NULL,NULL,'psxdh','N','A',NULL,NULL),
	(11,NULL,'202cb962ac59075b964b07152d234b70','KIT','GIang','giang.kit@yahoo.com.vn','2017-08-09 11:43:53','0919995469',NULL,'21270 Hawthorne Boulevard',NULL,NULL,NULL,NULL,'ptcsx','N','A',NULL,NULL),
	(10,NULL,'202cb962ac59075b964b07152d234b70','trung2','ta','wer@yahoo.com','2017-08-08 17:37:04','09199954691',NULL,'21270 Hawthorne Boulevard',NULL,NULL,NULL,NULL,'sub_admin','N','A',NULL,NULL),
	(9,NULL,'202cb962ac59075b964b07152d234b70','trung','ta','p_trung_99@yahoo.com','2017-08-08 17:07:21','0919995469',NULL,'21270 Hawthorne Boulevard',NULL,NULL,NULL,NULL,'pkd','N','A',NULL,NULL),
	(14,NULL,'202cb962ac59075b964b07152d234b70','Phuong Trung','Ta Hoang','tieuti88@gmail.com','2017-08-09 15:05:50','',NULL,NULL,NULL,NULL,NULL,NULL,'','N','A','https://lh4.googleusercontent.com/-O0LfgSWSdcg/AAAAAAAAAAI/AAAAAAAAAN4/LfuFC6UL-NI/photo.jpg?sz=200','Google'),
	(15,NULL,'202cb962ac59075b964b07152d234b70','trung','ta','p_trung_88@yahoo.com','2017-08-11 09:40:08','0919995469',NULL,'21270 Hawthorne Boulevard',NULL,NULL,NULL,NULL,'pkd','Y','A',NULL,NULL),
	(16,NULL,'202cb962ac59075b964b07152d234b70','Giang','Hoàng','hoanggiang@yahoo.com','2017-08-21 17:26:49','0919995469',NULL,'3255 North Cedar Avenue',NULL,NULL,NULL,NULL,'ptksp','N','A',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
