<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	Yii::t('common','Admins')=>array('index'),
	Yii::t('common','Create Admin'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
),$this->getSiteMenu());

?>

<h1><?php echo Yii::t('common','Create Admin')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>