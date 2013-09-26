<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->record_id), array('view', 'id'=>$data->record_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php 
    $sex = array(0 =>Yii::t('common','male'), 1 => Yii::t('common','female'));
    echo CHtml::encode($sex[$data->sex]); 
    ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply_car_type')); ?>:</b>
	<?php echo CHtml::encode($data->apply_car_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_id')); ?>:</b>
	<?php echo CHtml::encode($data->personal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stdudent_id')); ?>:</b>
	<?php echo CHtml::encode($data->stdudent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_residence')); ?>:</b>
	<?php echo CHtml::encode($data->is_residence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enroll_date')); ?>:</b>
	<?php echo CHtml::encode($data->enroll_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_date')); ?>:</b>
	<?php echo CHtml::encode($data->record_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_pickup')); ?>:</b>
	<?php echo CHtml::encode($data->is_pickup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pickup_date')); ?>:</b>
	<?php echo CHtml::encode($data->pickup_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_submit')); ?>:</b>
	<?php echo CHtml::encode($data->is_submit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submit_date')); ?>:</b>
	<?php echo CHtml::encode($data->submit_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_add_car')); ?>:</b>
	<?php echo CHtml::encode($data->is_add_car); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origin_car_type')); ?>:</b>
	<?php echo CHtml::encode($data->origin_car_type); ?>
	<br />

	*/ ?>

</div>