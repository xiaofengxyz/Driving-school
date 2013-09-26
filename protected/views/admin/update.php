<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->admin_id=>array('view','id'=>$model->admin_id),
	'Update',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),
    array('label'=>Yii::t('common','View Admin'), 'url'=>array('view', 'id'=>$model->admin_id)),
	array('label'=>Yii::t('common','Manage Admins'), 'url'=>array('admin')),
));

?>

<h1>Update Admin : <?php echo $model->admin_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>