<?php
/* @var $this StudentscoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Studentscores',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
    array('label'=>Yii::t('common','Create Studentscore'), 'url'=>array('create')),
    array('label'=>Yii::t('common','Manage Studentscore'), 'url'=>array('admin')),
),$this->getAdminsMenu());
?>

<h1>Studentscores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
