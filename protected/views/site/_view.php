<?php
/* @var $this SiteController */
/* @var $model Site */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('site_desc')); ?>:</b>
	<?php echo CHtml::encode($data->site_desc); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_qq')); ?>:</b>
	<?php echo CHtml::encode($data->contact_qq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_eroll_address')); ?>:</b>
	<?php echo CHtml::encode($data->contact_eroll_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_school_address')); ?>:</b>
	<?php echo CHtml::encode($data->contact_school_address); ?>
	<br />
	<br />


</div>