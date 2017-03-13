/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : person

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-03-13 15:15:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pay_type` int(11) NOT NULL COMMENT '0 在线支付 1 快递到付',
  `is_send` tinyint(4) NOT NULL COMMENT '0 已发送  1 未发送 ',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '老李', '1', '1');
INSERT INTO `user` VALUES ('2', '老王', '0', '0');
INSERT INTO `user` VALUES ('3', '老张', '1', '1');
INSERT INTO `user` VALUES ('4', '老陈', '1', '0');
INSERT INTO `user` VALUES ('5', '老宋', '1', '1');
INSERT INTO `user` VALUES ('6', '老海', '0', '0');
INSERT INTO `user` VALUES ('7', '老花', '1', '1');
INSERT INTO `user` VALUES ('8', '老钱', '0', '0');
INSERT INTO `user` VALUES ('9', '老香', '1', '1');
INSERT INTO `user` VALUES ('10', '老满', '0', '0');
INSERT INTO `user` VALUES ('11', 'dabai', '0', '1');
INSERT INTO `user` VALUES ('12', 'dabai', '0', '1');
INSERT INTO `user` VALUES ('13', 'dabai', '0', '1');
