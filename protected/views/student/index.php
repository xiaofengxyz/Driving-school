<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::t('common','Students')=>array('index'),
	Yii::t('common','List Students'),
);

$this->menu=$this->getManageMenu();

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','List Students'); ?></h1>

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
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'record_id',
		'username',
//		'sex',
//		'apply_car_type',
		'personal_id',
		'stdudent_id',
		'phone',
		/*'is_residence',
		'address',
		'enroll_date',
		'record_date',
		'is_pickup',
		'pickup_date',
		'is_submit',
		'submit_date',
		'is_add_car',
		'origin_car_type',
		*/
		array(
			'class'=>'CButtonColumn',
            'buttons' => array(
                 'delete' => array(
                 'visible' => 'Admin::model()->isWDAdmin()',                   
                ),
                 'update' => array(
                 'visible' => 'Admin::model()->isWAdmin()',                   
                ),
            ),
            'template'=>'{view}{delete}{update}',
		),
	),
)); ?>