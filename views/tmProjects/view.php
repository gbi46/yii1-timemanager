<?php
/* @var $this TimemanagerprojectsController */
/* @var $model Timemanagerprojects */

$this->breadcrumbs=array(
	'Timemanager Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Timemanager Projects', 'url'=>array('index')),
	array('label'=>'Create Timemanager Projects', 'url'=>array('create')),
	array('label'=>'Update Timemanager Projects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Timemanager Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Timemanager Projects', 'url'=>array('admin')),
);
?>

<h1>View Timemanager Projects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'note',
		array(
		'label'=>'Задачі',
		'type'=>'raw',
		'value'=>CHtml::link(CHtml::encode($model->name), array('tmTasks/index')),
		),
	),
)); ?>
