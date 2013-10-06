<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('common','site_desc')=>array('view'),
    Yii::t('common','View Site Desc'),
);

$this->menu=array_merge($this->getStudentsMenu(),$this->getAdminsMenu(),array(
    array('label'=>Yii::t('common','Update Site Desc'), 'url'=>array('update')),
));
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'site_desc',
        'contact_phone',
        'contact_telephone',
        'contact_qq',
        'contact_eroll_address',
        'contact_school_address',
	),
)); ?>