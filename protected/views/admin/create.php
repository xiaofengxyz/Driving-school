<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
));

?>

<h1>Create Admin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>