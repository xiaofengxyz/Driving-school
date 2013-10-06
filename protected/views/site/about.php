<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	Yii::t('common', 'about'),
);
$this->menu= $this->getMenu();
?>
<h1><?php echo Yii::t('common', 'about') ?></h1>

<p> <?php echo $model->site_desc; ?></p>


