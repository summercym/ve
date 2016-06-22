/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : we

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-21 08:31:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) DEFAULT NULL,
  `m_pid` int(11) DEFAULT NULL,
  `number_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_title` varchar(255) DEFAULT NULL,
  `message_content` varchar(255) DEFAULT NULL,
  `message_this` varchar(255) DEFAULT NULL,
  `number_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('13', '123121', '请问', '123', '11');
INSERT INTO `message` VALUES ('18', '你好', '123', '你好', '1');

-- ----------------------------
-- Table structure for numbers
-- ----------------------------
DROP TABLE IF EXISTS `numbers`;
CREATE TABLE `numbers` (
  `number_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `we_appid` varchar(255) DEFAULT NULL,
  `we_url` varchar(255) DEFAULT NULL,
  `we_token` varchar(255) DEFAULT NULL,
  `we_num` int(11) DEFAULT NULL,
  `we_type` varchar(255) DEFAULT NULL,
  `we_appsecret` varchar(255) DEFAULT NULL,
  `we_yuan` varchar(255) DEFAULT NULL,
  `we_verify` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`number_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of numbers
-- ----------------------------
INSERT INTO `numbers` VALUES ('3', 'Viola ', null, 'wxd8e21b4cd75b06d4', 'http://localhost/seven/we/web/index.php?r=num/tokenurl&ss=CCqoCaynoe', '4d6b3e38b952600251ee92fe603170ff', '2147483647', '微信公众平台', '2fc84e6084d9b85afd27fcd1d511c224', '18210462067', 'CCqoCaynoe');

-- ----------------------------
-- Table structure for we_user
-- ----------------------------
DROP TABLE IF EXISTS `we_user`;
CREATE TABLE `we_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) DEFAULT NULL,
  `tell` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_user
-- ----------------------------
INSERT INTO `we_user` VALUES ('1', 'admin', '5e5e0e1df2e0fbdf5fe4ff2741c3f78c', '18310257791', '2691246603@qq.com');
INSERT INTO `we_user` VALUES ('2', 'fyx', '6e05fdc4e5846e6d3f710f61f3831d2d', '13691163780', '947394312@qq.com');
INSERT INTO `we_user` VALUES ('3', 'admina', 'e10adc3949ba59abbe56e057f20f883e', '12345678920', '12288@qq.com');
INSERT INTO `we_user` VALUES ('4', '欧巴', '202cb962ac59075b964b07152d234b70', '12312312312', '18823734@qq.xom');
INSERT INTO `we_user` VALUES ('5', '刘一丹', 'e10adc3949ba59abbe56e057f20f883e', '12345678930', '122@qq.com');
INSERT INTO `we_user` VALUES ('6', 'fyx', '6e05fdc4e5846e6d3f710f61f3831d2d', '13691163780', '9473943122qq.com');
