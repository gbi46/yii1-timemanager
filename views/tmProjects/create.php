<?php
/* @var $this TimemanagerprojectsController */
/* @var $model Timemanagerprojects */

$this->breadcrumbs=array(
	'Timemanager Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Timemanager Projects', 'url'=>array('index')),
	array('label'=>'Manage Timemanager Projects', 'url'=>array('admin')),
);
?>

<h1>Create Timemanager Projects</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>