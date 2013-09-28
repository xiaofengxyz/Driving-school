/*
 Navicat MySQL Data Transfer

 Source Server         : mojo
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : driverschool

 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 09/28/2013 19:49:43 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `sex` int(1) unsigned DEFAULT '0',
  `personal_name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `authority` int(3) unsigned DEFAULT '3',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tbl_admin`
-- ----------------------------
BEGIN;
INSERT INTO `tbl_admin` VALUES ('1', 'admin', '000000', '0', '毕兴华', '1334634788', '0'), ('2', 'bibaofeng', '000000', '0', '3333333', '333333', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
