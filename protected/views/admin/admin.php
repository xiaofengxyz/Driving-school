<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	Yii::t('common','Admins')=>array('index'),
	Yii::t('common','Manage Admins'),
);

$this->menu=array_merge($this->getStudentsMenu(),array(   
	array('label'=>Yii::t('common','List Admins'), 'url'=>array('list')),
	array('label'=>Yii::t('common','Create Admin'), 'url'=>array('create')),    
),$this->getSiteMenu());

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','Manage Admins')?></h1>

<p>
<?php echo Yii::t('yii','use comparison operatorsearch values'); ?>
</p>

<?php echo CHtml::link(Yii::t('common','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'admin_id',
		'admin_name',
		'password',
		'sex',
		'personal_name',
		'phone',
		/*
		'authority',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
