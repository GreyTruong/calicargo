/*
Navicat MySQL Data Transfer

Source Server         : CaliCargo
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : calicargo

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-09-04 00:24:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`title`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`password`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`role`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`secret_key`  varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`date_added`  int(10) NULL DEFAULT NULL ,
`last_modified`  int(10) NULL DEFAULT NULL ,
`disabled`  tinyint(1) NULL DEFAULT 0 ,
`deleted`  tinyint(1) NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO `admins` VALUES ('1', 'admin', '$P$D9/lfnBTmqeavpSjJZNc34UXTWfSHy1', 'superadmin', 'hOdTIRysZ', '1348562313', '0', '0', '0');
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`title`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`slug`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`disabled`  tinyint(1) NULL DEFAULT 0 ,
`deleted`  tinyint(1) NULL DEFAULT 0 ,
`date_added`  int(10) NULL DEFAULT NULL ,
`last_modified`  int(10) NULL DEFAULT 0 ,
`img`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`thumbnail`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`type`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'event' ,
`description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`featured`  tinyint(1) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
INDEX `title` (`title`) USING BTREE ,
INDEX `type` (`type`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=19

;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('18', 'Gaming', 'gaming', '0', '0', '1352686519', '1352686633', 'dm7cDHA4B.jpg', 'a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}', 'faq', '', '0');
COMMIT;

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
`id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`admin_id`  int(11) NULL DEFAULT NULL ,
`access_controller`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`access_method`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`admin_ip`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`date_added`  int(100) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=217

;

-- ----------------------------
-- Records of logs
-- ----------------------------
BEGIN;
INSERT INTO `logs` VALUES ('199', '1', 'admin', 'logout', 'a:1:{s:13:\"Hành động\";s:6:\"Thoát\";}', '127.0.0.1', '1352685737'), ('200', '1', 'admin', 'login', 'a:1:{s:13:\"Hành động\";s:13:\"Đăng nhập\";}', '127.0.0.1', '1352685740'), ('201', '1', 'category', 'add', 'a:2:{s:13:\"Hành động\";s:5:\"Thêm\";s:11:\"Dữ liệu\";a:4:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"disabled\";s:1:\"0\";}}', '127.0.0.1', '1352686519'), ('202', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:1:\"0\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"1\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686527'), ('203', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:10:\"1352686527\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"1\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686530'), ('204', '1', 'category', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:12:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:6:\"Gaming\";s:4:\"slug\";s:6:\"gaming\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:10:\"date_added\";s:10:\"1352686519\";s:13:\"last_modified\";s:10:\"1352686530\";s:3:\"img\";s:13:\"dm7cDHA4B.jpg\";s:9:\"thumbnail\";s:379:\"a:3:{s:9:\"thumbnail\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:21:\"260x140-dm7cDHA4B.jpg\";s:5:\"width\";i:260;s:6:\"height\";i:140;}s:5:\"small\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:19:\"50x50-dm7cDHA4B.jpg\";s:5:\"width\";i:50;s:6:\"height\";i:50;}s:4:\"full\";a:4:{s:6:\"folder\";s:8:\"2012/11/\";s:8:\"filename\";s:13:\"dm7cDHA4B.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;}}\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";}s:17:\"Dữ liệu mới\";a:6:{s:5:\"title\";s:6:\"Gaming\";s:4:\"type\";s:3:\"faq\";s:11:\"description\";s:0:\"\";s:8:\"featured\";s:1:\"0\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686633'), ('205', '1', 'faq', 'add', 'a:2:{s:13:\"Hành động\";s:5:\"Thêm\";s:11:\"Dữ liệu\";a:4:{s:5:\"title\";s:11:\"Just a demo\";s:8:\"category\";s:2:\"18\";s:11:\"description\";s:9:\"demo only\";s:8:\"disabled\";s:1:\"0\";}}', '127.0.0.1', '1352686854'), ('206', '1', 'faq', 'edit', 'a:3:{s:13:\"Hành động\";s:5:\"Sửa\";s:15:\"Dữ liệu cũ\";a:10:{s:2:\"id\";s:3:\"148\";s:11:\"category_id\";s:2:\"18\";s:5:\"title\";s:11:\"Just a demo\";s:4:\"slug\";s:11:\"just-a-demo\";s:11:\"description\";s:9:\"demo only\";s:10:\"date_added\";s:10:\"1352686854\";s:13:\"last_modified\";N;s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";s:13:\"category_name\";s:6:\"Gaming\";}s:17:\"Dữ liệu mới\";a:5:{s:5:\"title\";s:11:\"Just a demo\";s:8:\"category\";s:2:\"18\";s:11:\"description\";s:9:\"demo only\";s:8:\"disabled\";s:1:\"0\";s:7:\"deleted\";s:1:\"0\";}}', '127.0.0.1', '1352686856'), ('207', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409027831'), ('208', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409036459'), ('209', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409037222'), ('210', '1', 'admin', 'logout', 'a:1:{s:6:\"Action\";s:6:\"Thoát\";}', '::1', '1409038331'), ('211', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409038350'), ('212', '1', 'admin', 'logout', 'a:1:{s:6:\"Action\";s:6:\"Thoát\";}', '::1', '1409038353'), ('213', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '::1', '1409038375'), ('214', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '127.0.0.1', '1409264070'), ('215', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '127.0.0.1', '1409291491'), ('216', '1', 'admin', 'login', 'a:1:{s:6:\"Action\";s:5:\"Login\";}', '127.0.0.1', '1409424822');
COMMIT;

-- ----------------------------
-- Table structure for outcome
-- ----------------------------
DROP TABLE IF EXISTS `outcome`;
CREATE TABLE `outcome` (
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
-- Records of outcome
-- ----------------------------
BEGIN;
INSERT INTO `outcome` VALUES ('6', 'Buy Amazon 2', '80', 'Buy Stuff on Amazon', '1409757778');
COMMIT;

-- ----------------------------
-- Table structure for ship_item
-- ----------------------------
DROP TABLE IF EXISTS `ship_item`;
CREATE TABLE `ship_item` (
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
FOREIGN KEY (`ship_order_id`) REFERENCES `ship_order` (`ship_order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `ship_order_id` (`ship_order_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=12

;

-- ----------------------------
-- Records of ship_item
-- ----------------------------
BEGIN;
INSERT INTO `ship_item` VALUES ('7', '24', 'Kat', 'nothig new', '8', '11', '10', '80', '36.2873896', '1409748120'), ('8', '24', 'Milk', 'sample desc', '7', '900', '33', '88', '39.91612856', '1409748121'), ('9', '25', 'kjgaskd', 'desc', '4', '34', '56', '80', '36.28736', '1409748216'), ('10', '25', 'noname', 'AB', '1', '47', '20', '0', '0', '1409748216'), ('11', '26', 'jaskgsad', 'jdaksdgsahg', '5', '99', '77', '78', '35.38020486', '1409763831');
COMMIT;

-- ----------------------------
-- Table structure for ship_order
-- ----------------------------
DROP TABLE IF EXISTS `ship_order`;
CREATE TABLE `ship_order` (
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
-- Records of ship_order
-- ----------------------------
BEGIN;
INSERT INTO `ship_order` VALUES ('24', 'order_amazon', 'D2D', 'Kate', '', 'Le', 'HCMC', 'HCMC', 'HCMC', '70000', 'CT', '287932337612', 'a@mail.com', 'Ha', '', 'Nguyen', 'HN', 'HHK', 'BBM', '88776', 'JK', '287932337612', 'a@nnn.vn', '70', '911', '41.71', '3', '500', '500', '226.796185', '47', '70', '7050', '7591.71', 'ABCD', '1409748120'), ('25', 'order_amazon', 'D2D', 'ksdgadg', '', 'aksdgaskdg', 'aksdsak', 'kasgdsak', 'aksgdksgh', '23542835', 'asdgaskh', '2762374523957', 'ahsdg@sdfsd.asdsad', 'kdgsahg', 'kssgdsag', 'kasgdkhsg', 'gaskdga', 'akgdsh', 'hagsdahsg', '23764283754', 'kagdksg', '23854325428563', 'a@mail.com', '100', '81', '73.72', '3', '900', '20', '9.0718474', '40', '6', '752', '825.72', 'nothing', '1409748215'), ('26', 'ship_ups', 'A2A', 'lahajgsagdasgdal', 'asdg', 'kgdasjlg', 'jgjsagd', 'lagdlsajgd', 'lajdasjlgd', '2794293754', 'jagdasgdal', '237727354993', 'a@mail.com', 'ksgaksdg', 'kgdksagd', 'lgaasg', 'agdksag', 'akgdksag', 'kaaskg', '78900', 'jdasgdsg', '237727354993', 'a@mail.comshdfgkha', '1', '99', '77', '0', '0', '0', '0', '0', '0', '0', '77', '', '1409763830');
COMMIT;

-- ----------------------------
-- Table structure for ship_transaction
-- ----------------------------
DROP TABLE IF EXISTS `ship_transaction`;
CREATE TABLE `ship_transaction` (
`ship_transaction_id`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'shipping transaction id' ,
`min_order_id`  bigint(20) NOT NULL COMMENT 'min shipping order id' ,
`max_order_id`  bigint(20) NOT NULL COMMENT 'max shipping order id' ,
`report_type`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`report_lang`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'EN or VI' ,
`date_added`  int(10) NULL DEFAULT NULL ,
PRIMARY KEY (`ship_transaction_id`),
FOREIGN KEY (`min_order_id`) REFERENCES `ship_order` (`ship_order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`max_order_id`) REFERENCES `ship_order` (`ship_order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `min_order_id` (`min_order_id`) USING BTREE ,
INDEX `max_order_id` (`max_order_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=17

;

-- ----------------------------
-- Records of ship_transaction
-- ----------------------------
BEGIN;
INSERT INTO `ship_transaction` VALUES ('4', '24', '24', 'A2A ', 'VI', '1409754155'), ('5', '24', '25', 'D2D ', 'VI', '1409754449'), ('6', '24', '25', 'D2D', 'VI', '1409755307'), ('7', '24', '25', 'D2D', 'VI', '1409755370'), ('8', '24', '25', 'D2D', 'VI', '1409755395'), ('9', '24', '25', 'D2D', 'VI', '1409755440'), ('10', '24', '25', 'D2D', 'VI', '1409755501'), ('11', '24', '25', 'D2D', 'VI', '1409755563'), ('14', '24', '25', 'D2D', 'VI', '1409763448'), ('15', '24', '25', 'D2D', 'VI', '1409763527'), ('16', '25', '25', 'D2D', 'VI', '1409763568');
COMMIT;

-- ----------------------------
-- Auto increment value for admins
-- ----------------------------
ALTER TABLE `admins` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for categories
-- ----------------------------
ALTER TABLE `categories` AUTO_INCREMENT=19;

-- ----------------------------
-- Auto increment value for logs
-- ----------------------------
ALTER TABLE `logs` AUTO_INCREMENT=217;

-- ----------------------------
-- Auto increment value for outcome
-- ----------------------------
ALTER TABLE `outcome` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for ship_item
-- ----------------------------
ALTER TABLE `ship_item` AUTO_INCREMENT=12;

-- ----------------------------
-- Auto increment value for ship_order
-- ----------------------------
ALTER TABLE `ship_order` AUTO_INCREMENT=27;

-- ----------------------------
-- Auto increment value for ship_transaction
-- ----------------------------
ALTER TABLE `ship_transaction` AUTO_INCREMENT=17;
