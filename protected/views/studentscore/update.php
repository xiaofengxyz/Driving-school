<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	Yii::t('common','Studentscore')=>array('index'),
	$model[0]->record_id=>array('view','id'=>$model[0]->record_id),
	Yii::t('common','Update Studentscore'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(
    array('label'=>Yii::t('common','View Student'), 'url'=>$this->createUrl('student/view',array('id'=>$model[0]->record_id))),
	array('label'=>Yii::t('common','View Studentscore'), 'url'=>array('view', 'id'=>$model[0]->record_id)),
),$this->getAdminsMenu());

?>

<h1><?php echo Yii::t('common','Update Studentscore').' : #'.$model[0]->record_id; ?></h1>

<?php 
foreach ($model as $value) {
    echo $this->renderPartial('_form', array('model'=>$value)); 
}
?>