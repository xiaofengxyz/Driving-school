<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */
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
		<?php echo $form->label($model,'personal_id'); ?>
		<?php echo $form->textField($model,'personal_id',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course'); ?>
		<?php echo $form->textField($model,'course'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times'); ?>
		<?php echo $form->textField($model,'times'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_qualified'); ?>
		<?php echo $form->textField($model,'is_qualified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualified_date'); ?>
		<?php echo $form->textField($model,'qualified_date'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->