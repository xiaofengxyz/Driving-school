<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <?php echo Yii::t('yii','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('yii','are required.') ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_name'); ?>
		<?php echo $form->textField($model,'admin_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'admin_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
        <?php echo $form->dropDownList($model,'sex',array(0 => Yii::t('common','male'), 1 => Yii::t('common','female')));?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_name'); ?>
		<?php echo $form->textField($model,'personal_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'personal_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authority'); ?>
        <?php echo $form->dropDownList($model,'authority', array(0 => Yii::t('common','superadmin'), 1 => Yii::t('common','writeDeleteadmin'), 2 => Yii::t('common','writeadmin'), 3 => Yii::t('common','readonlyadmin'))); ?>
		<?php echo $form->error($model,'authority'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->