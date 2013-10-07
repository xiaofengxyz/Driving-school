<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	Yii::t('common','Studentscore')=>array('index'),
	Yii::t('common','Manage Studentscores'),
);

$this->menu=array_merge($this->getStudentsMenu($model->record_id),$this->getManageMenu($model->record_id),$this->getAdminsMenu());


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

<h1><?php echo Yii::t('common','Manage Studentscores'); ?></h1>

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
            'buttons' => array(
                 'delete' => array(
                 'visible' => 'Admin::model()->isWDAdmin()',  
                 'url'=>'Yii::app()->controller->createUrl("studentscore/delete", array("id"=>$data->record_id,"course" => $data->course, "times" => $data->times))',
                ),
                 'update' => array(
                 'visible' => 'Admin::model()->isWAdmin()',
                     'url'=>'Yii::app()->controller->createUrl("studentscore/update", array("id"=>$data->record_id))',
                ),
                'view' => array(
                 'visible' => 'true',
                 'url'=>'Yii::app()->controller->createUrl("studentscore/view", array("id"=>$data->record_id))',
                ),
            ),
            'template'=>'{view}{delete}{update}',
		),
	),
)); ?>
