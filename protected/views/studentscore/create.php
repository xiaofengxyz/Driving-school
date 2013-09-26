<?php
/* @var $this StudentscoreController */
/* @var $model Studentscore */

$this->breadcrumbs=array(
	'Studentscores'=>array('index'),
	'Create',
);

$this->menu=array_merge($this->getStudentsMenu(),array(
),$this->getAdminsMenu());
?>

<h1>Create Studentscore</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>