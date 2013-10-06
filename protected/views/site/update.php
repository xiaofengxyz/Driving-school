<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs=array(
	Yii::t('common','site_desc')=>array('view'),
	Yii::t('common','Update Site Desc'),
);

$this->menu=array_merge($this->getStudentsMenu(),$this->getAdminsMenu(),array(
    array('label'=>Yii::t('common','View Site Desc'), 'url'=>array('view')),
));

?>

<h1><?php echo Yii::t('common','Update Site Desc')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>