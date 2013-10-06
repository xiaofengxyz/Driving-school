/*
 Navicat MySQL Data Transfer

 Source Server         : mojo
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : driverschool

 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 09/28/2013 19:42:23 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_student`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) unsigned DEFAULT '0',
  `apply_car_type` tinyint(3) unsigned DEFAULT '3',
  `personal_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `stdudent_id` varchar(128) COLLATE utf8_unicode_ci,
  `phone` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_residence` tinyint(1) unsigned DEFAULT '1',
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `enroll_date` date NOT NULL DEFAULT '0000-00-00',
  `record_date` date NOT NULL DEFAULT '0000-00-00',
  `is_pickup` tinyint(1) unsigned DEFAULT '0',
  `pickup_date` date NOT NULL DEFAULT '0000-00-00',
  `is_submit` tinyint(1) unsigned DEFAULT '0',
  `submit_date` date NOT NULL DEFAULT '0000-00-00',
  `is_add_car` tinyint(1) unsigned DEFAULT '0',
  `origin_car_type` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `tbl_student`
-- ----------------------------
-- BEGIN;
-- INSERT INTO `tbl_student` VALUES ('20', 'test3', '0', '', '333333333333333333', 'c132111111', '15210757849', '1', '', '0000-00-00', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0', '');
-- COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
