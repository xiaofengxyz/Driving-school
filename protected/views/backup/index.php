<?php
/* @var $this BackupController */

$this->breadcrumbs=array(
	'Backup',
);
?>
<!--<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>-->

<p>
<?php 
     // $model = Student::model()->findAll();
        // 建立Excel对象
        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/ShangHai');

        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        /** Include PHPExcel */
//        require_once (dirname(__FILE__).'/../extensions/Classes/PHPExcel.php');
        ob_end_clean();  
        ob_start();  
//        require_once(dirname(dirname(__FILE__)).'/extensions/phpexcel/PHPExcel.php');
        Yii::$enableIncludePath = false;  
        Yii::import('application.extensions.phpexcel.PHPExcel', true); 
//        Yii::$enableIncludePath = true;
        // Create new PHPExcel object
        echo date('H:i:s') , " Create new PHPExcel object" , EOL;
        $objPHPExcel = new PHPExcel();

        // Set document properties
        echo date('H:i:s') , " Set document properties" , EOL;
        $objPHPExcel->getProperties()->setCreator("anda_xiaofeng")
                                     ->setLastModifiedBy("anda_xiaofeng")
                                     ->setTitle("StudentInfo")
                                     ->setSubject("StudentInfo")
                                     ->setDescription("StudentInfo")
                                     ->setKeywords("StudentInfo")
                                     ->setCategory("StudentInfo");
        // Add some header
        echo date('H:i:s') , " Add Header" , EOL;
        // Miscellaneous glyphs, UTF-8
        $studentInfoHeader = $this->getInfo();
//        for ($i = 0; $i < count($studentInfoHeader);$i++) {
//            $objPHPExcel->setActiveSheetIndex(0)
//                        ->setCellValueExplicitByColumnAndRow($i, 1, $studentInfoHeader[$i]);
//        }
        $i = 0;
        foreach ($studentInfoHeader as $key => $value) {
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValueExplicitByColumnAndRow($i, 1, Yii::t('common',$key));  
            $i++;
        }
        echo date('H:i:s') , " Reading records,wait...." , EOL;

        // 读取学生信息
//        $model = array(); 
        $connection = Yii::app()->db;
        // 获取记录中的数量
        $sql_student = 'SELECT COUNT(*) FROM tbl_student';
        $command_student = $connection->createCommand($sql_student);
        $count=$command_student->queryScalar();
        $dataReader_student=null;
        $dataReader_studentscore=null;
        $car_type = array(0 => '', 1=> 'A1', 2 => 'B1', 3 => 'C1');

        
        // 获取student的记录
        for ($index = 0; $index < $count;) {
            $index += $this->queryCount;
            $sql_student = 'SELECT * FROM tbl_student WHERE record_id <= '.$index;
            $command_student = $connection->createCommand($sql_student);
            $dataReader_student=$command_student->query();

            $k = 2;//从第二行开始是学生信息
            foreach($dataReader_student as $row) { 
                $student_data = $this->getInfo();
//                $student_data->record_id = $row['record_id'];
//                $student_data->username = $row['username'];
//                $student_data->sex = $row['sex'];
//                $student_data->apply_car_type = $row['apply_car_type'];
//                $student_data->personal_id = $row['personal_id'];
//                $student_data->stdudent_id = $row['stdudent_id'];
//                $student_data->phone = $row['phone'];
//                $student_data->is_residence = $row['is_residence'];
//                $student_data->address = $row['address'];
//                $student_data->enroll_date = $row['enroll_date'];
//                $student_data->record_date = $row['record_date'];
//                $student_data->is_pickup = $row['is_pickup'];
//                $student_data->pickup_date = $row['pickup_date'];
//                $student_data->is_submit = $row['is_submit'];
//                $student_data->submit_date = $row['submit_date'];
//                $student_data->is_add_car = $row['is_add_car'];
//                $student_data->origin_car_type = $row['origin_car_type'];
                $student_data['record_id'] = $row['record_id'];
                $student_data['username'] = $row['username'];
                $student_data['sex'] = $row['sex'] == 0 ? Yii::t('common','male') : Yii::t('common','female');
                $student_data['apply_car_type'] = $car_type[$row['apply_car_type']];
                $student_data['personal_id'] = $row['personal_id'];
                $student_data['stdudent_id'] = $row['stdudent_id'];
                $student_data['phone'] = $row['phone'];
                $student_data['is_residence'] = $row['is_residence'] == 0 ? Yii::t('common','no') : Yii::t('common','yes');
                $student_data['address'] = $row['address'];
                $student_data['enroll_date'] = $row['enroll_date'];
                $student_data['record_date'] = $row['record_date'];
                $student_data['is_pickup'] = $row['is_pickup'] == 0 ? Yii::t('common','no') : Yii::t('common','yes');
                $student_data['pickup_date'] = $row['pickup_date'];
                $student_data['is_submit'] = $row['is_submit'] == 0 ? Yii::t('common','no') : Yii::t('common','yes');
                $student_data['submit_date'] = $row['submit_date'];
                $student_data['is_add_car'] = $row['is_add_car'] == 0 ? Yii::t('common','no') : Yii::t('common','yes');
                $student_data['origin_car_type'] = $car_type[$row['origin_car_type']];

                // 获取成绩
                $sql_studentscore = 'SELECT * FROM tbl_studentscore WHERE record_id = '.$student_data['record_id'];
                $command_studentscore = $connection->createCommand($sql_studentscore);
                $dataReader_studentscore=$command_studentscore->query();
                foreach($dataReader_studentscore as $value) {
//                    echo $value['course'];
//                    foreach ($value as $key => $val) {
//                        echo $key.':'.$val;
//                    }
                    $student_data['score_'.$value['course'].$value['times']] = $value['score'];
                    if ($student_data['is_qualified_'.$value['course']] == '' || $student_data['is_qualified_'.$value['course']] == Yii::t('common','no')) {
                        $student_data['is_qualified_'.$value['course']] = $value['is_qualified'] == 0 ? Yii::t('common','no') : Yii::t('common','yes');
                    }
                    
                    $student_data['qualified_date_'.$value['course']] = $value['qualified_date'];
                }
                // 写入Excel
                // Add some data
                echo date('H:i:s') , " Add some data" , EOL;
                 // Miscellaneous glyphs, UTF-8
                $j = 0;
                foreach ($student_data as $value) {
                     $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValueExplicitByColumnAndRow($j, $k, $value);
                     $j++;
                }
                 $k++;
            }
                             // Rename worksheet
            echo date('H:i:s') , " Rename worksheet" , EOL;
            $objPHPExcel->getActiveSheet()->setTitle('studentscore');

        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
         $objPHPExcel->setActiveSheetIndex(0);


         // Save Excel 2007 file
         echo date('H:i:s') , " Write to Excel2007 format" , EOL;
         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//         $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
         $objWriter->save('backup/StudentInfo_'.date("Y-m-d").'.xlsx');
         echo date('H:i:s') , " File written to ".'StudentInfo_'.date("Y-m-d").'.xlsx' , EOL;
         // Save Excel5 file
//         echo date('H:i:s') , " Write to Excel5 format" , EOL;
//         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//         $objWriter->save(str_replace('.php', '.xls', __FILE__));
//         echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;


         // Echo memory peak usage
         echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

         // Echo done
         echo date('H:i:s') , " Done writing files" , EOL;
         $url = Yii::app()->baseUrl.'/backup/StudentInfo_'.date("Y-m-d").'.xlsx';
         echo 'Files have been created in ' , $url , EOL;
         
//         echo '<a href=$url>'.CHtml::link(CHtml::encode('下载>>')).'</a>', EOL;
         echo '<a href='.$url.'>下载>></a>', EOL; 
//         Yii::app()->clientScript->registerScript('search', "
//            $('a').click(function(){
//                window.location.assign($url);
//                return false;
//            });
//        ");
?>
</p>