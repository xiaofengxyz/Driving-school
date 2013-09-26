<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'record_id'); ?>
		<?php echo $form->textField($model,'record_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apply_car_type'); ?>
		<?php echo $form->textField($model,'apply_car_type',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personal_id'); ?>
		<?php echo $form->textField($model,'personal_id',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stdudent_id'); ?>
		<?php echo $form->textField($model,'stdudent_id',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_residence'); ?>
		<?php echo $form->textField($model,'is_residence'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enroll_date'); ?>
		<?php echo $form->textField($model,'enroll_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'record_date'); ?>
		<?php echo $form->textField($model,'record_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_pickup'); ?>
		<?php echo $form->textField($model,'is_pickup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickup_date'); ?>
		<?php echo $form->textField($model,'pickup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_submit'); ?>
		<?php echo $form->textField($model,'is_submit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'submit_date'); ?>
		<?php echo $form->textField($model,'submit_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_add_car'); ?>
		<?php echo $form->textField($model,'is_add_car'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origin_car_type'); ?>
		<?php echo $form->textField($model,'origin_car_type',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->