<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	'Studentscores'=>array('index'),
	'Manage',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
	array('label'=>Yii::t('common','List Studentscore'), 'url'=>array('index')),
	array('label'=>Yii::t('common','Create Studentscore'), 'url'=>array('create')),
),$this->getAdminsMenu());


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#studentscore-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Studentscores</h1>

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
	'id'=>'studentscore-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'record_id',
		'personal_id',
		'score',
		'course',
		'times',
		'is_qualified',
		'qualified_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
