/*
 Navicat MySQL Data Transfer

 Source Server         : mojo
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : driverschool

 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 10/06/2013 17:11:01 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_site`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_site`;
CREATE TABLE `tbl_site` (
  `id` int(11) NOT NULL,
  `site_desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `contact_qq` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_eroll_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_school_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `tbl_site`
-- ----------------------------
BEGIN;
INSERT INTO `tbl_site` VALUES ('1', '安达驾校是莱芜市中顶尖的驾校，驾考通过率达95%以上。aaaaaaaaaaaaaaaaaaaaaaaa', '123456789', '1860634333  13346346788', '8616666 8616777 8616999 8616677', '南冶车管所北26米安达驾校报名处 ', '莱芜市开发区方兴苑东660米路南');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
