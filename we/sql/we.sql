/*
Navicat MySQL Data Transfer

Source Server         : summer
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : we

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-21 11:22:48
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
  `number_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_title` varchar(255) DEFAULT NULL,
  `message_content` varchar(255) DEFAULT NULL,
  `message_this` varchar(255) DEFAULT NULL,
  `number_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for numbers
-- ----------------------------
DROP TABLE IF EXISTS `numbers`;
CREATE TABLE `numbers` (
  `number_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_name` varchar(255) DEFAULT NULL,
  `we_appid` varchar(255) DEFAULT NULL,
  `we_url` varchar(255) DEFAULT NULL,
  `we_token` varchar(255) DEFAULT NULL,
  `we_num` varchar(255) DEFAULT NULL,
  `we_type` varchar(255) DEFAULT NULL,
  `we_appsecret` varchar(255) DEFAULT NULL,
  `we_yuan` varchar(255) DEFAULT NULL,
  `we_st` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`number_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for we_user
-- ----------------------------
DROP TABLE IF EXISTS `we_user`;
CREATE TABLE `we_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) DEFAULT NULL,
  `number_id` int(11) DEFAULT NULL,
  `tell` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
