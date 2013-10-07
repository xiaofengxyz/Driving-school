<?php
/* @var $this SiteController */
/* @var $model Site */
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
		<?php echo $form->labelEx($model,'site_desc'); ?>
		<?php echo $form->textField($model,'site_desc',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'site_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->passwordField($model,'contact_phone',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_telephone'); ?>
		<?php echo $form->textField($model,'contact_telephone',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_qq'); ?>
		<?php echo $form->textField($model,'contact_qq',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_qq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_eroll_address'); ?>
		<?php echo $form->textField($model,'contact_eroll_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'contact_eroll_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_school_address'); ?>
		<?php echo $form->textField($model,'contact_school_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_school_address'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->