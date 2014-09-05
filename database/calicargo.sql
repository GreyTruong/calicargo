/*
Navicat MySQL Data Transfer

Source Server         : Titan
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : calicargo

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-09-05 10:27:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `secret_key` varchar(9) DEFAULT NULL,
  `date_added` int(10) DEFAULT NULL,
  `last_modified` int(10) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', '$P$D9/lfnBTmqeavpSjJZNc34UXTWfSHy1', 'superadmin', 'hOdTIRysZ', '1348562313', '0', '0', '0');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(100) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `date_added` int(10) DEFAULT NULL,
  `last_modified` int(10) DEFAULT '0',
  `position` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `link_admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', '0', '1406979300', '1407687502', '1', null, null);
INSERT INTO `categories` VALUES ('2', '1', '0', '1406979327', '1407687502', '1', null, null);
INSERT INTO `categories` VALUES ('3', '1', '0', '1406979337', '1407687502', '2', null, null);
INSERT INTO `categories` VALUES ('4', '0', '0', '1406979351', '1407687502', '2', null, null);
INSERT INTO `categories` VALUES ('5', '4', '0', '1406979391', '1407687502', '1', null, null);
INSERT INTO `categories` VALUES ('6', '4', '1', '1406979421', '1408376901', '0', null, null);
INSERT INTO `categories` VALUES ('7', '0', '1', '1406979517', '1408377197', '0', null, null);
INSERT INTO `categories` VALUES ('8', '7', '0', '1406979534', '1407687503', '1', null, null);
INSERT INTO `categories` VALUES ('9', '7', '0', '1406979549', '1407687503', '2', null, null);
INSERT INTO `categories` VALUES ('10', '7', '0', '1406979624', '1407687503', '3', null, null);
INSERT INTO `categories` VALUES ('11', '7', '0', '1406979650', '1407687503', '4', null, null);
INSERT INTO `categories` VALUES ('12', '0', '0', '1406979669', '1407687503', '3', null, null);
INSERT INTO `categories` VALUES ('13', '0', '0', '1406979683', '1407687503', '4', null, null);
INSERT INTO `categories` VALUES ('14', '0', '0', '1406979694', '1407687503', '5', null, null);
INSERT INTO `categories` VALUES ('15', '0', '1', '1407687843', '1407687962', '0', null, null);
INSERT INTO `categories` VALUES ('16', '4', '0', '1408376917', '0', '2', null, null);

-- ----------------------------
-- Table structure for category_metas
-- ----------------------------
DROP TABLE IF EXISTS `category_metas`;
CREATE TABLE `category_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_metas
-- ----------------------------
INSERT INTO `category_metas` VALUES ('1', '1', 'Túi Xách', 'tui-xach', '1', '0');
INSERT INTO `category_metas` VALUES ('2', '2', 'Túi xách nữ', 'tui-xach-nu', '1', '0');
INSERT INTO `category_metas` VALUES ('3', '3', 'Túi xách nam', 'tui-xach-nam', '1', '0');
INSERT INTO `category_metas` VALUES ('4', '4', 'Ví - Bóp da', 'vi-bop-da', '1', '0');
INSERT INTO `category_metas` VALUES ('5', '5', 'Ví nữ', 'vi-nu', '1', '0');
INSERT INTO `category_metas` VALUES ('6', '6', 'Ví - Bóp nam', 'vi-bop-nam', '1', '0');
INSERT INTO `category_metas` VALUES ('7', '7', 'Bao da', 'bao-da', '1', '0');
INSERT INTO `category_metas` VALUES ('8', '8', 'Bao da điện thoại', 'bao-da-dien-thoai', '1', '0');
INSERT INTO `category_metas` VALUES ('9', '9', 'Bao da Ipad', 'bao-da-ipad', '1', '0');
INSERT INTO `category_metas` VALUES ('10', '10', 'Bao da - Ví namecard', 'bao-da-vi-namecard', '1', '0');
INSERT INTO `category_metas` VALUES ('11', '11', 'Bao da - Ví passport', 'bao-da-vi-passport', '1', '0');
INSERT INTO `category_metas` VALUES ('12', '12', 'Phụ Kiện', 'phu-kien', '1', '0');
INSERT INTO `category_metas` VALUES ('13', '13', 'Mẫu Da', 'mau-da', '1', '0');
INSERT INTO `category_metas` VALUES ('14', '14', 'Thời Trang', 'thoi-trang', '1', '0');
INSERT INTO `category_metas` VALUES ('15', '15', 'Hình khắc', 'hinh-khac', '1', '0');
INSERT INTO `category_metas` VALUES ('16', '16', 'Ví nam', 'vi-nam', '1', '0');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secret_key` varchar(9) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `disabled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(20,0) DEFAULT NULL,
  `number` int(20) DEFAULT NULL,
  `date_added` int(20) DEFAULT NULL,
  `last_updated` int(20) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '111', ',2,3,', 'media/2014/09/41GNOj833.jpg', '111', '111', '1409805105', '1409821115', '0', '0');
INSERT INTO `items` VALUES ('2', '1112', ',2,3,5,', 'media/2014/09/kyEmWyFV3.jpg', '1112', '1112', '1409805810', '1409821041', '0', '0');

-- ----------------------------
-- Table structure for item_metas
-- ----------------------------
DROP TABLE IF EXISTS `item_metas`;
CREATE TABLE `item_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_metas
-- ----------------------------
INSERT INTO `item_metas` VALUES ('1', '2', 'AAAABB', 'AAAABB', '1', '0');
INSERT INTO `item_metas` VALUES ('2', '2', 'BBBVV', 'BBBBVV', '2', '0');
INSERT INTO `item_metas` VALUES ('3', null, 'RRRR', 'FFFF', '1', '0');
INSERT INTO `item_metas` VALUES ('4', null, 'TTT', 'VVVV', '2', '0');
INSERT INTO `item_metas` VALUES ('5', null, 'GGGF', 'FFFFGH', '1', '0');
INSERT INTO `item_metas` VALUES ('6', null, 'DDV', 'FFFV', '2', '0');
INSERT INTO `item_metas` VALUES ('7', null, 'GGGF', 'FFFFGH', '1', '0');
INSERT INTO `item_metas` VALUES ('8', null, 'DDV', 'FFFV', '2', '0');
INSERT INTO `item_metas` VALUES ('9', '1', 'FVG', 'DF', '1', '0');
INSERT INTO `item_metas` VALUES ('10', '1', 'TY', 'RE', '2', '0');

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `default` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `disabled` tinyint(1) DEFAULT '0',
  `date_added` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'English', '0', '0', '0', null, null);
INSERT INTO `languages` VALUES ('2', 'Tiếng Việt', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `access_controller` varchar(100) DEFAULT NULL,
  `access_method` varchar(100) DEFAULT NULL,
  `description` text,
  `admin_ip` varchar(50) DEFAULT NULL,
  `date_added` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('199', '1', 'admin', 'logout', 'a:1:{s:13:\"Hành động\";s:6:\"Thoát\";}', '127.0.0.1', '1352685737');
INSERT INTO `logs` VALUES ('200', '1', 'admin', 'login', 'a:1:{s:13:\"Hành động\";s:13:\"Đăng nhập\";}', '127.0.0.1', '1352685740');
INSERT INTO `logs` VALUES ('201', '1', 'category', 'add', 'a:2:{s:13:\"Hành động\";s:5:\"Thêm\";s:11:\"Dữ liệu\";a:4:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"disabled\";s:1:\"0\";}}', '127.0.0.1', '1352686519');
INSERT INTO `logs` VALUES ('202', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:1:\"0\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"1\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686527');
INSERT INTO `logs` VALUES ('203', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:10:\"1352686527\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"1\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686530');
INSERT INTO `logs` VALUES ('204', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:10:\"1352686530\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686633');
INSERT INTO `logs` VALUES ('205', '1', 'faq', 'add', 'a:2:{s:13:\"Hành động\";s:5:\"Thêm\";s:11:\"Dữ liệu\";a:4:{s:5:\"title\";s:11:\"Just a demo\";s:8:\"category\";s:2:\"18\";s:11:\"description\";s:9:\"demo only\";s:8:\"disabled\";s:1:\"0\";}}', '127.0.0.1', '1352686854');
INSERT INTO `logs` VALUES ('206', '1', 'faq', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:10:{s:2:\"id\";s:3:\"148\";s:11:\"category_id\";s:2:\"18\";s:5:\"title\";s:11:\"Just a demo\";s:4:\"slug\";s:11:\"just-a-demo\";s:11:\"description\";s:9:\"demo only\";s:10:\"date_added\";s:10:\"1352686854\";s:13:\"last_modified\";N;s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:13:\"category_name\";s:6:\"Gaming\";}s:17:\"Dữ liệu mới\";a:5:{s:5:\"title\";s:11:\"Just a demo\";s:8:\"category\";s:2:\"18\";s:11:\"description\";s:9:\"demo only\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686856');
INSERT INTO `logs` VALUES ('207', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409027831');
INSERT INTO `logs` VALUES ('208', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409036459');
INSERT INTO `logs` VALUES ('209', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409037222');
INSERT INTO `logs` VALUES ('210', '1', 'admin', 'logout', 'a:1:{s:6:\"Action\";s:6:\"Thoát\";}', '::1', '1409038331');
INSERT INTO `logs` VALUES ('211', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409038350');
INSERT INTO `logs` VALUES ('212', '1', 'admin', 'logout', 'a:1:{s:6:\"Action\";s:6:\"Thoát\";}', '::1', '1409038353');
INSERT INTO `logs` VALUES ('213', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409038375');
INSERT INTO `logs` VALUES ('214', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409214171');
INSERT INTO `logs` VALUES ('215', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409709631');
INSERT INTO `logs` VALUES ('216', '1', 'item', 'add', 'a:2:{s:6:\"Action\";s:3:\"Add\";s:4:\"Data\";a:7:{i:1;a:2:{s:5:\"title\";s:0:\"\";s:4:\"slug\";s:0:\"\";}i:2;a:2:{s:5:\"title\";s:0:\"\";s:4:\"slug\";s:0:\"\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:2:\"on\";}}', '::1', '1409805105');
INSERT INTO `logs` VALUES ('217', '1', 'item', 'add', 'a:2:{s:6:\"Action\";s:3:\"Add\";s:4:\"Data\";a:7:{i:1;a:2:{s:5:\"title\";s:4:\"AAAA\";s:4:\"slug\";s:4:\"AAAA\";}i:2;a:2:{s:5:\"title\";s:3:\"BBB\";s:4:\"slug\";s:4:\"BBBB\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:2:\"on\";}}', '::1', '1409805810');
INSERT INTO `logs` VALUES ('218', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"2\";s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"1\";s:3:\"img\";s:27:\"media/2014/09/kyEmWyFV3.jpg\";}s:8:\"New Data\";a:7:{i:1;a:2:{s:5:\"title\";s:4:\"AAAA\";s:4:\"slug\";s:4:\"AAAA\";}i:2;a:2:{s:5:\"title\";s:3:\"BBB\";s:4:\"slug\";s:4:\"BBBB\";}s:4:\"code\";s:4:\"1112\";s:10:\"categories\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";}s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:2:\"on\";}}', '::1', '1409818775');
INSERT INTO `logs` VALUES ('219', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"2\";s:4:\"code\";s:4:\"1112\";s:11:\"category_id\";s:7:\",2,3,5,\";s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:1:\"1\";s:3:\"img\";s:27:\"media/2014/09/kyEmWyFV3.jpg\";}s:8:\"New Data\";a:7:{i:1;a:2:{s:5:\"title\";s:4:\"AAAA\";s:4:\"slug\";s:4:\"AAAA\";}i:2;a:2:{s:5:\"title\";s:3:\"BBB\";s:4:\"slug\";s:4:\"BBBB\";}s:4:\"code\";s:4:\"1112\";s:10:\"categories\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";}s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:2:\"on\";}}', '::1', '1409820119');
INSERT INTO `logs` VALUES ('220', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"2\";s:4:\"code\";s:4:\"1112\";s:11:\"category_id\";s:7:\",2,3,5,\";s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:1:\"1\";s:3:\"img\";s:27:\"media/2014/09/kyEmWyFV3.jpg\";}s:8:\"New Data\";a:7:{i:1;a:2:{s:5:\"title\";s:6:\"AAAABB\";s:4:\"slug\";s:6:\"AAAABB\";}i:2;a:2:{s:5:\"title\";s:5:\"BBBVV\";s:4:\"slug\";s:6:\"BBBBVV\";}s:4:\"code\";s:4:\"1112\";s:10:\"categories\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";}s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:2:\"on\";}}', '::1', '1409820130');
INSERT INTO `logs` VALUES ('221', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";N;s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/41GNOj833.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:4:\"RRRR\";s:4:\"slug\";s:4:\"FFFF\";}i:2;a:2:{s:5:\"title\";s:3:\"TTT\";s:4:\"slug\";s:4:\"VVVV\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";}}', '::1', '1409820730');
INSERT INTO `logs` VALUES ('222', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";N;s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/41GNOj833.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:4:\"GGGF\";s:4:\"slug\";s:6:\"FFFFGH\";}i:2;a:2:{s:5:\"title\";s:3:\"DDV\";s:4:\"slug\";s:4:\"FFFV\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";}}', '::1', '1409821025');
INSERT INTO `logs` VALUES ('223', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";N;s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/41GNOj833.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:4:\"GGGF\";s:4:\"slug\";s:6:\"FFFFGH\";}i:2;a:2:{s:5:\"title\";s:3:\"DDV\";s:4:\"slug\";s:4:\"FFFV\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";}}', '::1', '1409821035');
INSERT INTO `logs` VALUES ('224', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"2\";s:4:\"code\";s:4:\"1112\";s:11:\"category_id\";s:7:\",2,3,5,\";s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/kyEmWyFV3.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:6:\"AAAABB\";s:4:\"slug\";s:6:\"AAAABB\";}i:2;a:2:{s:5:\"title\";s:5:\"BBBVV\";s:4:\"slug\";s:6:\"BBBBVV\";}s:4:\"code\";s:4:\"1112\";s:10:\"categories\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";}s:5:\"price\";s:4:\"1112\";s:6:\"number\";s:4:\"1112\";}}', '::1', '1409821042');
INSERT INTO `logs` VALUES ('225', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"1\";s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/41GNOj833.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:0:\"\";s:4:\"slug\";s:0:\"\";}i:2;a:2:{s:5:\"title\";s:0:\"\";s:4:\"slug\";s:0:\"\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";}}', '::1', '1409821101');
INSERT INTO `logs` VALUES ('226', '1', 'item', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"1\";s:4:\"code\";s:3:\"111\";s:11:\"category_id\";s:5:\",2,3,\";s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";s:8:\"disabled\";s:1:\"0\";s:3:\"img\";s:27:\"media/2014/09/41GNOj833.jpg\";}s:8:\"New Data\";a:6:{i:1;a:2:{s:5:\"title\";s:3:\"FVG\";s:4:\"slug\";s:2:\"DF\";}i:2;a:2:{s:5:\"title\";s:2:\"TY\";s:4:\"slug\";s:2:\"RE\";}s:4:\"code\";s:3:\"111\";s:10:\"categories\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}s:5:\"price\";s:3:\"111\";s:6:\"number\";s:3:\"111\";}}', '::1', '1409821115');
INSERT INTO `logs` VALUES ('227', '1', 'stockin', 'add', 'a:2:{s:6:\"Action\";s:3:\"Add\";s:4:\"Data\";a:3:{s:4:\"item\";s:1:\"1\";s:5:\"price\";s:2:\"11\";s:6:\"number\";s:2:\"11\";}}', '::1', '1409822264');
INSERT INTO `logs` VALUES ('228', '1', 'stockin', 'edit', 'a:3:{s:6:\"Action\";s:5:\"Sửa\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"1\";s:7:\"item_id\";s:1:\"1\";s:10:\"item_price\";s:2:\"11\";s:6:\"number\";s:2:\"11\";s:11:\"total_price\";s:3:\"121\";s:10:\"date_added\";s:10:\"1409822264\";s:7:\"deleted\";s:1:\"0\";}s:8:\"New Data\";a:3:{s:4:\"item\";s:1:\"1\";s:5:\"price\";s:2:\"11\";s:6:\"number\";s:2:\"11\";}}', '::1', '1409822568');
INSERT INTO `logs` VALUES ('229', '1', 'stockin', 'edit', 'a:3:{s:6:\"Action\";s:5:\"Sửa\";s:8:\"Old Data\";a:7:{s:2:\"id\";s:1:\"1\";s:7:\"item_id\";s:1:\"1\";s:10:\"item_price\";s:2:\"11\";s:6:\"number\";s:2:\"11\";s:11:\"total_price\";s:3:\"121\";s:10:\"date_added\";s:10:\"1409822264\";s:7:\"deleted\";s:1:\"0\";}s:8:\"New Data\";a:3:{s:4:\"item\";s:2:\"10\";s:5:\"price\";s:3:\"110\";s:6:\"number\";s:3:\"110\";}}', '::1', '1409822573');
INSERT INTO `logs` VALUES ('230', '1', 'customer', 'edit', 'a:3:{s:6:\"Action\";s:4:\"Edit\";s:8:\"Old Data\";a:11:{s:2:\"id\";s:2:\"45\";s:5:\"email\";s:23:\"trieubichhong@gmail.com\";s:8:\"password\";s:34:\"$P$Dl3kXj.swvKqeB8anJPvnMtGcNHAh81\";s:10:\"secret_key\";s:9:\"hmHXv1Q0t\";s:4:\"name\";s:20:\"Triệu Bích Hồng\";s:5:\"phone\";s:10:\"0982150979\";s:7:\"address\";s:46:\"Văn phòng Tỉnh ủy Bắc Ninh, Bắc Ninh\";s:10:\"date_added\";s:10:\"1408677193\";s:12:\"date_updated\";N;s:7:\"deleted\";s:1:\"0\";s:8:\"disabled\";s:1:\"0\";}s:8:\"New Data\";a:6:{s:5:\"email\";s:23:\"trieubichhong@gmail.com\";s:8:\"password\";s:0:\"\";s:11:\"re_password\";s:0:\"\";s:4:\"name\";s:20:\"Triệu Bích Hồng\";s:5:\"phone\";s:10:\"0982150979\";s:7:\"address\";s:46:\"Văn phòng Tỉnh ủy Bắc Ninh, Bắc Ninh\";}}', '::1', '1409825842');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grand_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` bigint(1) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1000', 'order', '1', '0');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` float(20,0) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `total` float(20,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('1', '1', '1', '10', '1', '10');
INSERT INTO `order_details` VALUES ('2', '1', '2', '10', '1', '10');

-- ----------------------------
-- Table structure for outcome
-- ----------------------------
DROP TABLE IF EXISTS `outcomes`;
CREATE TABLE `outcomes` (
`outcome_id`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'outcome id, auto increment, primary key' ,
`outcome_type`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '4 types of outcome: ups (ups fee payment) | item (buy items from amazon) | airport_trans (transportation fee from calicargo to airport) | customer_trans (transportation from airport to customer for door to door shipping type), compulsory' ,
`value`  double NULL DEFAULT 0 COMMENT 'outcome value, defaut 0' ,
`description`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'outcome description, optional' ,
`date_added`  int(10) NULL DEFAULT NULL ,
PRIMARY KEY (`outcome_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Table structure for ship_items
-- ----------------------------
DROP TABLE IF EXISTS `ship_items`;
CREATE TABLE `ship_items` (
`ship_item_id`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'item id, auto increment, primary key' ,
`ship_order_id`  bigint(20) NOT NULL COMMENT 'shipping order id, foreign key to \'ship_order_id\' column from \'ship_order\' table' ,
`name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'item name, optional' ,
`description`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`qty`  int(11) NULL DEFAULT 1 COMMENT 'quantity, default 0' ,
`value`  double NULL DEFAULT 0 COMMENT 'value, default 0' ,
`airport_fee`  double NULL DEFAULT 0 COMMENT 'airport fee, default 0' ,
`wt_lbs`  double NULL DEFAULT NULL COMMENT 'weight (in pound), optional' ,
`wt_kg`  double NOT NULL COMMENT 'weight (in kg), compulsory' ,
`date_added`  int(10) NULL DEFAULT NULL ,
PRIMARY KEY (`ship_item_id`),
FOREIGN KEY (`ship_order_id`) REFERENCES `ship_orders` (`ship_order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `ship_order_id` (`ship_order_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=12

;

-- ----------------------------
-- Table structure for ship_orders
-- ----------------------------
DROP TABLE IF EXISTS `ship_orders`;
CREATE TABLE `ship_orders` (
`ship_order_id`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'shipping order id, auto increment, primary key' ,
`order_type`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'order type 3 types: ship_amazon (shipping from amazon) | ship_ups (shipping with ups) | order_amazon (order from amazon), compulsory' ,
`ship_type`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'shipping type - 2 types: D2D (door to door) | A2A (airport to airport), compulsory' ,
`sender_first_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s firstname, compulsory' ,
`sender_middle_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'sender\'s middlename, optional' ,
`sender_last_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s lastname, compulsory' ,
`sender_address`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s address, compulsory' ,
`sender_city`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s city, compulsory' ,
`sender_state`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s state, compulsory' ,
`sender_zipcode`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s zipcode, compulsory' ,
`sender_country`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s country, compulsory' ,
`sender_tel`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s telephone number, compulsory' ,
`sender_email`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sender\'s email, compulsory' ,
`receiver_first_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s firstname, compulsory' ,
`receiver_middle_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'receiver\'s middlename, optional' ,
`receiver_last_name`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s lastname, compulsory' ,
`receiver_address`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s address, compulsory' ,
`receiver_city`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s city, compulsory' ,
`receiver_state`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s state, compulsory' ,
`receiver_zipcode`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s zipcode, compulsory' ,
`receiver_country`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s country, compulsory' ,
`receiver_tel`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'receiver\'s telephone number, compulsory' ,
`receiver_email`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'receiver\'s telephone number, optional' ,
`box_qty`  int(11) NULL DEFAULT 1 COMMENT 'box (package) quantity, default 1' ,
`total_value`  double NULL DEFAULT 0 COMMENT 'total item\'s value: sum(item value * qty), default 0' ,
`total_airport_fee`  double NULL DEFAULT 0 COMMENT 'total item\'s airport fee: sum(item airport fee * qty), default 0' ,
`order_discount`  int(11) NULL DEFAULT 0 COMMENT 'airport fee discount (in percentage), default 0' ,
`order_fee`  double NULL DEFAULT 0 COMMENT 'extra fee for \'order from amazon\' shipping type, default 0' ,
`total_wt_lbs`  double NULL DEFAULT 0 COMMENT 'total weight (in pound), default 0' ,
`total_wt_kg`  double NULL DEFAULT 0 COMMENT 'total weight (in kilogram), default 0' ,
`ship_fee_per_lbs`  double NULL DEFAULT 0 COMMENT 'shipping fee per pound, default 0' ,
`ship_discount`  int(11) NULL DEFAULT 0 COMMENT 'shipping fee discount (in percentage), default 0' ,
`total_ship_fee`  double NULL DEFAULT 0 COMMENT 'total shipping fee, default 0' ,
`total`  double NULL DEFAULT 0 COMMENT 'total order fee, default 0' ,
`delivery_instruction`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'delivery instruction, optional' ,
`date_added`  int(10) NULL DEFAULT NULL ,
PRIMARY KEY (`ship_order_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=27

;

-- ----------------------------
-- Table structure for ship_transactions
-- ----------------------------
DROP TABLE IF EXISTS `ship_transactions`;
CREATE TABLE `ship_transactions` (
`ship_transaction_id`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'shipping transaction id' ,
`min_order_id`  bigint(20) NOT NULL COMMENT 'min shipping order id' ,
`max_order_id`  bigint(20) NOT NULL COMMENT 'max shipping order id' ,
`report_type`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`report_lang`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'EN or VI' ,
`date_added`  int(10) NULL DEFAULT NULL ,
PRIMARY KEY (`ship_transaction_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=17

;

-- ----------------------------
-- Table structure for stock_ins
-- ----------------------------
DROP TABLE IF EXISTS `stock_ins`;
CREATE TABLE `stock_ins` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_price` float(20,0) NOT NULL,
  `number` int(11) NOT NULL,
  `total_price` float(20,0) NOT NULL,
  `date_added` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of stock_ins
-- ----------------------------
INSERT INTO `stock_ins` VALUES ('1', '10', '110', '110', '12100', '1409822264', '0');
