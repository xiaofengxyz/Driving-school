

CREATE TABLE tbl_student (
    record_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    sex tinyint(1) unsigned DEFAULT '0',
    apply_car_type VARCHAR(128) NOT NULL,
    personal_id VARCHAR(128) NOT NULL,
    stdudent_id VARCHAR(128) NOT NULL,
    phone VARCHAR(128) NOT NULL,
    is_residence tinyint(1) unsigned DEFAULT '1',
    address VARCHAR(128) NOT NULL,
    enroll_date DATE NOT NULL DEFAULT '0000-00-00',
    record_date DATE NOT NULL DEFAULT '0000-00-00',
    is_pickup tinyint(1) unsigned DEFAULT '0',
    pickup_date DATE NOT NULL DEFAULT '0000-00-00',
    is_submit tinyint(1) unsigned DEFAULT '0',
    submit_date DATE NOT NULL DEFAULT '0000-00-00',
    is_add_car tinyint(1) unsigned DEFAULT '0',
    origin_car_type VARCHAR(128) NOT NULL
);
