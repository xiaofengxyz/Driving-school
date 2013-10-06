<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	Yii::t('common','Admins')=>array('index'),
	$model->admin_name,
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
	array('label'=>Yii::t('common','Update Admin'), 'url'=>array('update', 'id'=>$model->admin_id)),
	array('label'=>Yii::t('common','Delete Admin'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->admin_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
),$this->getSiteMenu());

?>

<h1><?php echo Yii::t('common','View Admin').' : '.$model->admin_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'admin_id',
		'admin_name',
		'password',
		'sex',
		'personal_name',
		'phone',
		'authority',
	),
)); ?>
