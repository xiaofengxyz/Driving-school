/*
 Navicat MySQL Data Transfer

 Source Server         : mojo
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : driverschool

 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 09/28/2013 19:49:57 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_studentscore`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_studentscore`;
CREATE TABLE `tbl_studentscore` (
  `record_id` int(11) NOT NULL,
  `personal_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `score` tinyint(3) unsigned DEFAULT '0',
  `course` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `times` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_qualified` tinyint(1) unsigned DEFAULT '0',
  `qualified_date` date NOT NULL,
  PRIMARY KEY (`record_id`,`course`,`times`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `tbl_studentscore`
-- ----------------------------
BEGIN;
INSERT INTO `tbl_studentscore` VALUES ('20', '333333333333333333', '20', '1', '1', '0', '0000-00-00'), ('20', '333333333333333333', '10', '1', '2', '0', '0000-00-00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
