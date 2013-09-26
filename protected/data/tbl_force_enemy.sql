/*
 Navicat MySQL Data Transfer

 Source Server         : 192.168.1.50
 Source Server Version : 50161
 Source Host           : 192.168.1.50
 Source Database       : mojo_sg_sd1_130820

 Target Server Version : 50161
 File Encoding         : utf-8

 Date: 09/18/2013 11:39:06 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_force_enemy`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_force_enemy`;
CREATE TABLE `tbl_force_enemy` (
  `fid` int(10) unsigned NOT NULL,
  `efid` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`,`efid`),
  KEY `updated` (`updated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
