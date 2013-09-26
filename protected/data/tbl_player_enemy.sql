/*
 Navicat MySQL Data Transfer

 Source Server         : 192.168.1.50
 Source Server Version : 50161
 Source Host           : 192.168.1.50
 Source Database       : mojo_sg_sd1_130820

 Target Server Version : 50161
 File Encoding         : utf-8

 Date: 09/18/2013 12:24:02 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tbl_player_enemy`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_player_enemy`;
CREATE TABLE `tbl_player_enemy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` bigint(20) DEFAULT '0',
  `enemy_id` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `i_player_enemy_player_id` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
