<?php
/* @var $this StudentscoreController */
/* @var $data Studentscore */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->record_id), array('view', 'id'=>$data->record_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_id')); ?>:</b>
	<?php echo CHtml::encode($data->personal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('times')); ?>:</b>
	<?php echo CHtml::encode($data->times); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_qualified')); ?>:</b>
	<?php echo CHtml::encode($data->is_qualified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualified_date')); ?>:</b>
	<?php echo CHtml::encode($data->qualified_date); ?>
	<br />

</div>