 
/*author : xiaofeng
 *date : 2013.9.7
 *content : student table sql
*/


/*
 *admin_id : 档案号 value : number
 *admin_name : 管理员姓名 value : string
 *sex : 管理员性别 value : number 0/1
 *personal_id : 身份证号 value : string
 *phone : 手机号 value : string
 *authority : 管理权限 value : number （0：普通管理员 初始值——只读学员 1:管理员 对学员可写可读 2：超级管理员 对管理员和学员可读可写）
 *
*/

CREATE TABLE tbl_admin (
    `admin_id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `admin_name` VARCHAR(128) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `sex` tinyint(1) unsigned DEFAULT '0',
    `personal_name` VARCHAR(128) NOT NULL,
    `phone` VARCHAR(128) NOT NULL,
    `authority` tinyint(3) unsigned DEFAULT '3'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO tbl_admin (admin_name, password, sex, personal_name, phone, authority) VALUES ('superadmin', '000000', 0, '毕兴华', '15210757841', 0);
-- INSERT INTO tbl_admin (admin_name, password, sex, personal_name, phone, authority) VALUES ('admin', '000000', 0, '普通管理员', '15210757842', 1);
-- INSERT INTO tbl_admin (admin_name, password, sex, personal_name, phone, authority) VALUES ('ordinary', '000000', 0, '只读管理员', '15210757843', 2);
-- INSERT INTO tbl_admin (admin_name, password, sex, personal_name, phone, authority) VALUES ('readonly', '000000', 0, '只读管理员', '15210757843', 3);

