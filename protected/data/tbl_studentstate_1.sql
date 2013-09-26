

CREATE TABLE tbl_studentscore (
    record_id INTEGER NOT NULL,
    personal_id VARCHAR(128) NOT NULL,

    score tinyint(3) unsigned DEFAULT '0',
    course tinyint(1) unsigned DEFAULT '0',
    times tinyint(1) unsigned DEFAULT '0',
    is_qualified tinyint(1) unsigned DEFAULT '0',
    qualified_date DATE NOT NULL DEFAULT '0000-00-00',
    PRIMARY KEY (`record_id`,`course`,`times`)
);
 

