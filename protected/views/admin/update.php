<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	Yii::t('common','Admins')=>array('index'),
	$model->admin_id=>array('view','id'=>$model->admin_id),
	Yii::t('common','Update Admin'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
    array('label'=>Yii::t('common','View Admin'), 'url'=>array('view', 'id'=>$model->admin_id)),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
),$this->getSiteMenu());

?>

<h1><?php echo Yii::t('common','Update Admin').' : '.$model->admin_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>