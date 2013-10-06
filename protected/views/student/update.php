<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::t('common','Students')=>array('index'),
	$model->record_id=>array('view','id'=>$model->record_id),
	Yii::t('common','Update Student'),
);

$this->menu=$this->getUpdateMenu($model->record_id);
?>

<h1><?php echo Yii::t('common','Update Student').' : '.$model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>