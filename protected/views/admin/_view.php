<?php
/* @var $this AdminController */
/* @var $data Admin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->admin_id), array('view', 'id'=>$data->admin_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_name')); ?>:</b>
	<?php echo CHtml::encode($data->admin_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php 
    $sex = array(0 =>Yii::t('common','male'), 1 => Yii::t('common','female'));
    echo CHtml::encode($sex[$data->sex]); 
    ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_name')); ?>:</b>
	<?php echo CHtml::encode($data->personal_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('authority')); ?>:</b>
	<?php 
    $authortity = array(0 => Yii::t('common','superadmin'), 1 => Yii::t('common','writeDeleteadmin'), 2 => Yii::t('common','writeadmin'), 3 => Yii::t('common','readonlyadmin'));
    echo CHtml::encode($authortity[$data->authority]); 
    ?>
	<br />


</div>