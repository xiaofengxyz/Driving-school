<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	Yii::t('common','Error'),
);
?>

<h2><?php echo Yii::t('common','Error').' : '.$code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>