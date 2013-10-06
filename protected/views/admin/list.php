<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('common','Admins')=>array('list'),
	Yii::t('common','List Admins'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
),$this->getSiteMenu());
?>

<h1><?php echo Yii::t('common','List Admins')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
