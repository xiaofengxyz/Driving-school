<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	Yii::t('common','Studentscore')=>array('index'),
	Yii::t('common','Create Studentscore'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(
),$this->getAdminsMenu());
?>

<h1><?php echo Yii::t('common','Create Studentscore'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>