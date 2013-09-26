<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentscore-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('yii','Fields with') ?> <span class="required">*</span><?php echo Yii::t('yii','are required.') ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_id'); ?>
		<?php echo $form->textField($model,'personal_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'personal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scoret'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course'); ?>
		<?php echo $form->textField($model,'course'); ?>
		<?php echo $form->error($model,'course'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times'); ?>
		<?php echo $form->textField($model,'times'); ?>
		<?php echo $form->error($model,'times'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_qualified'); ?>
        <?php echo $form->dropDownList($model,'is_qualified',array(0 => Yii::t('common','no'), 1 => Yii::t('common','yes')));?>
		<?php echo $form->error($model,'is_qualified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qualified_date'); ?>
		<?php echo $form->textField($model,'qualified_date'); ?>
		<?php echo $form->error($model,'qualified_date'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->