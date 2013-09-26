<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admins'=>array('list'),
	'List',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
));
?>

<h1>Admins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
