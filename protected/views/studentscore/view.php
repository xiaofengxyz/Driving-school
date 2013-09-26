<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	'Studentscores'=>array('index'),
	$model[0]->record_id,
);

$this->menu=array_merge($this->getStudentsMenu(),array(
    array('label'=>Yii::t('common','View Studentscore'), 'url'=>$this->createUrl('student/view',array('id'=>$model[0]->record_id))),
	array('label'=>Yii::t('common','Update Studentscore'), 'url'=>array('update', 'id'=>$model[0]->record_id)),
),$this->getAdminsMenu());
?>

<h1>View Studentscore #<?php echo $model[0]->record_id; ?></h1>

<?php 
foreach ($model as $value) {
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$value,
	'attributes'=>array(
//		'record_id',
//		'personal_id',
		'course',
		'times',
        'score',
		'is_qualified',
		'qualified_date',
	),
));
}
 
?>