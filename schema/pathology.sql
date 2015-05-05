/*
Navicat MySQL Data Transfer

Source Server         : bla
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : pathology

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-05 22:12:34
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('38', '22', '2015-05-06 06:25:19', null);
INSERT INTO `reports` VALUES ('39', '22', '2015-05-06 06:26:37', null);
INSERT INTO `reports` VALUES ('40', '22', '2015-05-06 06:27:30', null);
INSERT INTO `reports` VALUES ('41', '23', '2015-05-06 06:28:30', null);
INSERT INTO `reports` VALUES ('42', '25', '2015-05-06 06:30:04', null);
INSERT INTO `reports` VALUES ('43', '27', '2015-05-06 06:30:58', null);
INSERT INTO `reports` VALUES ('45', '28', '2015-05-06 06:32:40', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report_details
-- ----------------------------
INSERT INTO `report_details` VALUES ('46', 'Blood Count', '200', '38');
INSERT INTO `report_details` VALUES ('47', 'Liver Function ', '1000', '38');
INSERT INTO `report_details` VALUES ('48', 'Vitamin D test', '23.23', '38');
INSERT INTO `report_details` VALUES ('49', 'Folate Test', '43.34', '38');
INSERT INTO `report_details` VALUES ('50', 'Vitamin B12 test', '223.23', '38');
INSERT INTO `report_details` VALUES ('51', 'Glucose Test', '43.55', '38');
INSERT INTO `report_details` VALUES ('52', 'sample test 1', '123', '39');
INSERT INTO `report_details` VALUES ('53', 'sample test 2', '87', '39');
INSERT INTO `report_details` VALUES ('54', 'sample test 3', '876', '39');
INSERT INTO `report_details` VALUES ('55', 'sample test 4', '435', '39');
INSERT INTO `report_details` VALUES ('56', 'sample test 5', '22', '39');
INSERT INTO `report_details` VALUES ('57', 'sample test 6', '432', '39');
INSERT INTO `report_details` VALUES ('58', 'sample test 7', '54', '39');
INSERT INTO `report_details` VALUES ('59', 'Blood Count', '33', '40');
INSERT INTO `report_details` VALUES ('60', 'vitamin test', '434', '40');
INSERT INTO `report_details` VALUES ('61', 'live test', '324', '40');
INSERT INTO `report_details` VALUES ('62', 'calcium test', '342', '40');
INSERT INTO `report_details` VALUES ('63', 'iron test', '653', '40');
INSERT INTO `report_details` VALUES ('64', 'test 1', '12', '41');
INSERT INTO `report_details` VALUES ('65', 'test 2', '44', '41');
INSERT INTO `report_details` VALUES ('66', 'test 3', '434', '41');
INSERT INTO `report_details` VALUES ('67', 'test 4', '87', '41');
INSERT INTO `report_details` VALUES ('68', 'test 5', '342', '41');
INSERT INTO `report_details` VALUES ('69', 'test 6', '534', '41');
INSERT INTO `report_details` VALUES ('70', 'test 7', '4353', '41');
INSERT INTO `report_details` VALUES ('71', 'test 8', '43', '41');
INSERT INTO `report_details` VALUES ('72', 'mmmm test', '32', '42');
INSERT INTO `report_details` VALUES ('73', 'test 1', '123', '42');
INSERT INTO `report_details` VALUES ('74', 'sample test', '4535', '42');
INSERT INTO `report_details` VALUES ('75', 'another sample test', '43', '42');
INSERT INTO `report_details` VALUES ('76', 'iron test', '44', '42');
INSERT INTO `report_details` VALUES ('77', 'bllod test', '123', '43');
INSERT INTO `report_details` VALUES ('78', 'urine test', '33', '43');
INSERT INTO `report_details` VALUES ('79', 'liver function test', '44', '43');
INSERT INTO `report_details` VALUES ('80', 'vitamn b12 ttest', '44', '43');
INSERT INTO `report_details` VALUES ('81', 'iron blood test', '342', '43');
INSERT INTO `report_details` VALUES ('86', 'blood test', '1123', '45');
INSERT INTO `report_details` VALUES ('87', 'liver function', '213', '45');
INSERT INTO `report_details` VALUES ('88', 'garbial test', '112', '45');
INSERT INTO `report_details` VALUES ('89', 'vitamin D test', '545', '45');
INSERT INTO `report_details` VALUES ('90', 'naphian test', '444', '45');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'bob', '9a618248b64db62d15b300a07b00580b', null, null, '1');
INSERT INTO `users` VALUES ('2', 'a', '0cc175b9c0f1b6a831c399e269772661', null, null, '1');
INSERT INTO `users` VALUES ('21', 'mack', '6a07c26809d867d207381667c1e42055', 'mack@asd.as', '1323', '1');
INSERT INTO `users` VALUES ('22', 'mudasser ajaz', 'rDMWNwTy', 'mudasserajaz@gmail.com', '03347907227', '2');
INSERT INTO `users` VALUES ('23', 'waqas ajaz', 'D1EubV1l', 'waqasajazch@gmail.com', '3443534523', '2');
INSERT INTO `users` VALUES ('24', 'Jhon Nick', '8CucKU1E', 'jhon@sample.com', '0333333333', '2');
INSERT INTO `users` VALUES ('25', 'maria shaw', 'Ha5OeeDf', 'maria@sample.com', '43234234234', '2');
INSERT INTO `users` VALUES ('20', 'adsasd', '8ad3fac6c6b3528499d347d924443abb', 'asd@ads.sad', '21312', '1');
INSERT INTO `users` VALUES ('26', 'zack mika', 'Yed8Hl4G', 'zack@sample.com', '534534534', '2');
INSERT INTO `users` VALUES ('27', 'Ali Ajaz', 't3hbMr3v', 'ali@sample.com', '0888888888', '2');
INSERT INTO `users` VALUES ('28', 'Rahul Dravid', 'B88XncJp', 'rahul@sample.com', '3242343432', '2');
INSERT INTO `users` VALUES ('29', 'jhon', '4c25b32a72699ed712dfa80df77fc582', 'jhon@sample.com', '12313', '1');
INSERT INTO `users` VALUES ('31', 'miky', '89e4a0e660439e4e6bb959c79f6cabee', 'miky@hjgh.com', '65', '1');
