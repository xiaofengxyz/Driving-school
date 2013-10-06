<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::t('common','Students')=>array('index'),
	Yii::t('common','Create Student'),
);

$this->menu=$this->getCreateMenu();
?>

<h1><?php echo Yii::t('common','Create Student'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>