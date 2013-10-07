<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	Yii::t('common','Studentscore')=>array('index'),
	$model[0]->record_id=>array('view','id'=>$model[0]->record_id),
	Yii::t('common','Update Studentscore'),
);

$this->menu=array_merge($this->getStudentsMenu($model[0]->record_id),$this->getUpdateMenu($model[0]->record_id),$this->getAdminsMenu());

?>

<h1><?php echo Yii::t('common','Update Studentscore').' : #'.$model[0]->record_id; ?></h1>

<?php 
foreach ($model as $value) {
    echo $this->renderPartial('_form', array('model'=>$value)); 
}
?>