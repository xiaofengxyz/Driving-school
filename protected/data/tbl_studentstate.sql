 
/*author : xiaofeng
 *date : 2013.9.7
 *content : student_score table sql
*/


/*
 *record_id : 档案号 value : number
 *one_courses_first : 科目一第一次 value  : number
 *one_courses_second :  科目一第二次 value  : number
 *one_courses_third :  科目一第三次 value  : number
 *one_courses_forth :  科目一第四次 value  : number
 *one_courses_fifith :  科目一第五次 value  : number
 *is_one_qualified : 科目一是否合格 value  : 0/1
 *one_qualified_date : 科目一合格日期 value : date
 *
 *two_courses_first : 科目二第一次 value  : number
 *two_courses_second :  科目二第二次 value  : number
 *two_courses_third :  科目二第三次 value  : number
 *two_courses_forth :  科目二第四次 value  : number
 *two_courses_fifith :  科目二第五次 value  : number
 *is_two_qualified : 科目二是否合格 value  : 0/1
 *two_qualified_date : 科目二合格日期 value : date
 *
 *three_courses_first : 科目三第一次 value  : number
 *three_courses_second :  科目三第二次 value  : number
 *three_courses_third :  科目三第三次 value  : number
 *three_courses_forth :  科目三第四次 value  : number
 *three_courses_fifith :  科目三第五次 value  : number
 *is_three_qualified : 科目三是否合格 value  : 0/1
 *three_qualified_date : 科目三合格日期 value : date
 *
 *four_courses_first : 科目三安全文明第一次 value  : number
 *four_courses_second :  科目三安全文明第二次 value  : number
 *four_courses_third :  科目三安全文明第三次 value  : number
 *four_courses_forth :  科目三安全文明第四次 value  : number
 *four_courses_fifith :  科目三安全文明第五次 value  : number
 *is_four_qualified : 科目三安全文明是否合格 value  : 0/1
 *four_qualified_date : 科目三安全文明合格日期 value : date
 *
*/

CREATE TABLE tbl_studentscore (
    record_id INTEGER NOT NULL PRIMARY KEY,
    personal_id VARCHAR(128) NOT NULL,
    one_courses_first tinyint(3) unsigned DEFAULT '0',
    one_courses_second tinyint(3) unsigned DEFAULT '0',
    one_courses_third tinyint(3) unsigned DEFAULT '0',
    one_courses_fourth tinyint(3) unsigned DEFAULT '0',
    one_courses_fifith tinyint(3) unsigned DEFAULT '0',
    is_one_qualified tinyint(1) unsigned DEFAULT '0',
    one_qualified_date DATE NOT NULL,

    two_courses_first tinyint(3) unsigned DEFAULT '0',
    two_courses_second tinyint(3) unsigned DEFAULT '0',
    two_courses_third tinyint(3) unsigned DEFAULT '0',
    two_courses_fourth tinyint(3) unsigned DEFAULT '0',
    two_courses_fifith tinyint(3) unsigned DEFAULT '0',
    is_two_qualified tinyint(1) unsigned DEFAULT '0',
    two_qualified_date DATE NOT NULL,

    three_courses_first tinyint(3) unsigned DEFAULT '0',
    three_courses_second tinyint(3) unsigned DEFAULT '0',
    three_courses_third tinyint(3) unsigned DEFAULT '0',
    three_courses_fourth tinyint(3) unsigned DEFAULT '0',
    three_courses_fifith tinyint(3) unsigned DEFAULT '0',
    is_three_qualified tinyint(1) unsigned DEFAULT '0',
    three_qualified_date DATE NOT NULL,

    four_courses_first tinyint(3) unsigned DEFAULT '0',
    four_courses_second tinyint(3) unsigned DEFAULT '0',
    four_courses_third tinyint(3) unsigned DEFAULT '0',
    four_courses_fourth tinyint(3) unsigned DEFAULT '0',
    four_courses_fifith tinyint(3) unsigned DEFAULT '0',
    is_four_qualified tinyint(1) unsigned DEFAULT '0',
    four_qualified_date DATE NOT NULL
);
 

-- INSERT INTO tbl_studentscore (personal_id, one_courses_first, one_courses_second, one_courses_third, one_courses_fourth, one_courses_fifith, is_one_qualified, one_qualified_date, two_courses_first, two_courses_second, two_courses_third, two_courses_fourth, two_courses_fifith, is_two_qualified, two_qualified_date, three_courses_first, three_courses_second, three_courses_third, three_courses_fourth, three_courses_fifith, is_three_qualified, three_qualified_date, three_courses_first, four_courses_second, four_courses_third, four_courses_fourth, four_courses_fifith, is_four_qualified, four_qualified_date,) VALUES ('test1', '371202198611101111', -1, -1, -1, -1, -1,0,'',-1, -1, -1, -1, -1,0,'',-1, -1, -1, -1, -1,0,'',-1, -1, -1, -1, -1,0,'');
-- INSERT INTO tbl_studentscore (personal_id, one_courses_first, one_courses_second, one_courses_third, one_courses_fourth, one_courses_fifith, is_one_qualified, one_qualified_date, two_courses_first, two_courses_second, two_courses_third, two_courses_fourth, two_courses_fifith, is_two_qualified, two_qualified_date, three_courses_first, three_courses_second, three_courses_third, three_courses_fourth, three_courses_fifith, is_three_qualified, three_qualified_date, three_courses_first, four_courses_second, four_courses_third, four_courses_fourth, four_courses_fifith, is_four_qualified, four_qualified_date,) VALUES ('test2', '371202198611101112', 20, -1, -1, -1, -1,0,'',80, -1, -1, -1, -1,0,'',-1, -1, -1, -1, -1,0,'',-1, -1, -1, -1, -1,0,'');


