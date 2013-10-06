<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	Yii::t('common', 'contact'),
);
$this->menu= $this->getMenu();
?>

<h1><?php echo Yii::t('common', 'contact') ?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
<?php echo Yii::t('common', 'If you have questions, contact us.') ?>
</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'contact_phone',
        'contact_telephone',
        'contact_qq',
        'contact_eroll_address',
        'contact_school_address',
	),
)); ?>

<?php endif; ?>