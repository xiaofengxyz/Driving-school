<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('yii','Fields with') ?> <span class="required">*</span><?php echo Yii::t('yii','are required.') ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
        <?php echo $form->dropDownList($model,'sex',array(0 => Yii::t('common','male'), 1 => Yii::t('common','female')));?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apply_car_type'); ?>
		<?php echo $form->textField($model,'apply_car_type',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'apply_car_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_id'); ?>
		<?php echo $form->textField($model,'personal_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'personal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stdudent_id'); ?>
		<?php echo $form->textField($model,'stdudent_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'stdudent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_residence'); ?>
        <?php echo $form->dropDownList($model,'is_residence',array(0 => Yii::t('common','no'), 1 => Yii::t('common','yes')));?>
		<?php echo $form->error($model,'is_residence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enroll_date'); ?>
		<?php echo $form->textField($model,'enroll_date'); echo Yii::t('common','date_form'); ?>
		<?php echo $form->error($model,'enroll_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'record_date'); ?>
		<?php echo $form->textField($model,'record_date'); echo Yii::t('common','date_form'); ?>
		<?php echo $form->error($model,'record_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_pickup'); ?>
        <?php echo $form->dropDownList($model,'is_pickup',array(0 => Yii::t('common','no'), 1 => Yii::t('common','yes')));?>
		<?php echo $form->error($model,'is_pickup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pickup_date'); ?>
		<?php echo $form->textField($model,'pickup_date'); echo Yii::t('common','date_form'); ?>
		<?php echo $form->error($model,'pickup_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_submit'); ?>
        <?php echo $form->dropDownList($model,'is_submit',array(0 => Yii::t('common','no'), 1 => Yii::t('common','yes')));?>
		<?php echo $form->error($model,'is_submit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'submit_date'); ?>
		<?php echo $form->textField($model,'submit_date'); echo Yii::t('common','date_form'); ?>
		<?php echo $form->error($model,'submit_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_add_car'); ?>
        <?php echo $form->dropDownList($model,'is_add_car',array(0 => Yii::t('common','no'), 1 => Yii::t('common','yes')));?>
		<?php echo $form->error($model,'is_add_car'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origin_car_type'); ?>
		<?php echo $form->textField($model,'origin_car_type',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'origin_car_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->