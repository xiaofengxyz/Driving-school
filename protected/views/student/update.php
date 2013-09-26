<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->record_id=>array('view','id'=>$model->record_id),
	'Update',
);

$this->menu=$this->getUpdateMenu($model->record_id);
?>

<h1>Update Student <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>