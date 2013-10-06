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


SET FOREIGN_KEY_CHECKS = 1;