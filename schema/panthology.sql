/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : panthology

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-05-05 19:59:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for report_details
-- ----------------------------
DROP TABLE IF EXISTS `report_details`;
CREATE TABLE `report_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) DEFAULT NULL,
  `test_value` float DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report_details
-- ----------------------------
INSERT INTO `report_details` VALUES ('28', 'asd', '33', '30');
INSERT INTO `report_details` VALUES ('29', 'ggg', '44', '30');
INSERT INTO `report_details` VALUES ('30', 'zcx', '55', '30');
INSERT INTO `report_details` VALUES ('31', 'asdad', '34', '31');
INSERT INTO `report_details` VALUES ('32', 'jjjg', '234', '31');
INSERT INTO `report_details` VALUES ('33', 'hemo', '12', '32');
INSERT INTO `report_details` VALUES ('34', 'urine', '123', '32');
INSERT INTO `report_details` VALUES ('35', 'adsa', '21', '33');
INSERT INTO `report_details` VALUES ('36', 'asdad', '44', '33');
INSERT INTO `report_details` VALUES ('37', 'fgsfg', '543', '33');
INSERT INTO `report_details` VALUES ('38', 'SDF', '32.3', '33');
INSERT INTO `report_details` VALUES ('39', 'ads', '12.12', '34');
INSERT INTO `report_details` VALUES ('40', 'asd', '12', '35');
INSERT INTO `report_details` VALUES ('41', 'ads', '123', '36');
INSERT INTO `report_details` VALUES ('42', 'asd', '32', '36');
INSERT INTO `report_details` VALUES ('43', 'tesd1', '21', '37');
INSERT INTO `report_details` VALUES ('44', 'test12', '21', '37');
INSERT INTO `report_details` VALUES ('45', 'test3', '22', '37');

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('30', '13', '2015-05-04 06:55:12', null);
INSERT INTO `reports` VALUES ('31', '13', '2015-05-04 09:22:05', null);
INSERT INTO `reports` VALUES ('32', '13', '2015-05-05 01:18:07', null);
INSERT INTO `reports` VALUES ('33', '16', '2015-05-05 01:56:21', null);
INSERT INTO `reports` VALUES ('34', '17', '2015-05-05 01:59:06', null);
INSERT INTO `reports` VALUES ('35', '17', '2015-05-05 01:59:37', null);
INSERT INTO `reports` VALUES ('36', '17', '2015-05-05 02:01:04', null);
INSERT INTO `reports` VALUES ('37', '12', '2015-05-05 04:47:53', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `type` enum('1','2') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'bob', '9a618248b64db62d15b300a07b00580b', null, null, '1');
INSERT INTO `users` VALUES ('2', 'a', '0cc175b9c0f1b6a831c399e269772661', null, null, '1');
INSERT INTO `users` VALUES ('21', 'mack', '6a07c26809d867d207381667c1e42055', 'mack@asd.as', '1323', '1');
INSERT INTO `users` VALUES ('16', 'simran', 'Ofn7JeBh', 'simsa@asd.as', '312123', '2');
INSERT INTO `users` VALUES ('18', 'ads', 'Zx3wetpp', 'sad@aa.sa', '13123', '2');
INSERT INTO `users` VALUES ('15', 'farhat ajaz', 'eQVW1V8M', 'farhat@gmail.com', '34214123', '2');
INSERT INTO `users` VALUES ('12', 'mudasser a', 'PesZ7Gey', 'mudasserajaz@gmail.com', '2131323', '2');
INSERT INTO `users` VALUES ('13', 'waqas ajaz', 'I8igtPcy', 'waqasajazch@gmail.com', '231232', '2');
INSERT INTO `users` VALUES ('17', 'waqas', 'eYZP2SLs', 'asdas@sad.as', '3223', '2');
INSERT INTO `users` VALUES ('20', 'adsasd', '8ad3fac6c6b3528499d347d924443abb', 'asd@ads.sad', '21312', '1');
