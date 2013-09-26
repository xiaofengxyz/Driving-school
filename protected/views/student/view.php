<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->username,
);

$this->menu=$this->getViewMenu($model->record_id);
?>

<h1>View Student <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'record_id',
		'username',
		'sex',
		'apply_car_type',
		'personal_id',
		'stdudent_id',
		'phone',
		'is_residence',
		'address',
		'enroll_date',
		'record_date',
		'is_pickup',
		'pickup_date',
		'is_submit',
		'submit_date',
		'is_add_car',
		'origin_car_type',
	),
)); ?>


