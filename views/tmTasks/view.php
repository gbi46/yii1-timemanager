<?php
/* @var $this TimemanageryearController */
/* @var $model Timemanageryear */

$this->breadcrumbs=array(
	'Timemanager Tasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Timemanager Tasks', 'url'=>array('index')),
	array('label'=>'Create Timemanager Tasks', 'url'=>array('create')),
	array('label'=>'Update Timemanager Tasks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Timemanager Tasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Timemanager Tasks', 'url'=>array('admin')),
);
?>

<h1>View Timemanager Tasks #<?php echo $model->id; ?></h1>

<?= CHtml::link(CHtml::encode('Редагувати'), ['update', 'id' => $model->id])?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project',
		'curday',
		'task',
		'resume',
		'earn',
	),
)); ?>
