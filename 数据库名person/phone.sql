/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : person

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-03-13 15:15:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for phone
-- ----------------------------
DROP TABLE IF EXISTS `phone`;
CREATE TABLE `phone` (
  `phone_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`phone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of phone
-- ----------------------------
INSERT INTO `phone` VALUES ('1', '1', '123456');
INSERT INTO `phone` VALUES ('2', '2', '110119');
INSERT INTO `phone` VALUES ('3', '3', '800820');
INSERT INTO `phone` VALUES ('4', '4', '555666');
INSERT INTO `phone` VALUES ('5', '5', '777888');
INSERT INTO `phone` VALUES ('6', '6', '800888');
INSERT INTO `phone` VALUES ('7', '7', '555777');
INSERT INTO `phone` VALUES ('8', '8', '666777');
INSERT INTO `phone` VALUES ('9', '9', '12789');
INSERT INTO `phone` VALUES ('10', '10', '25456');
