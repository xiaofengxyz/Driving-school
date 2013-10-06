
SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `tbl_site`;
CREATE TABLE `tbl_site` (
  `id` INTEGER NOT NULL PRIMARY KEY,
  `site_desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `contact_qq` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_eroll_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_school_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


SET FOREIGN_KEY_CHECKS = 1;
