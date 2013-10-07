<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::t('common','Students'),
	Yii::t('common','List Students'),
);

$this->menu= $this->getIndexMenu();

?>

<h1><?php echo Yii::t('common','List Students'); ?></h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>