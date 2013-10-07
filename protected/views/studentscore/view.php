<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	Yii::t('common','Studentscore')=>array('index'),
	$model[0]->record_id,
);

$this->menu=array_merge($this->getStudentsMenu($model[0]->record_id),$this->getViewMenu($model[0]->record_id),$this->getAdminsMenu());
?>

<h1><?php echo Yii::t('common','View Studentscore').' : #'.$model[0]->record_id; ?></h1>

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
