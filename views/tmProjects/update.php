<?php
/* @var $this TimemanagerprojectsController */
/* @var $model Timemanagerprojects */

$this->breadcrumbs=array(
	'Timemanager Projects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Timemanager Projects', 'url'=>array('index')),
	array('label'=>'Create Timemanager Projects', 'url'=>array('create')),
	array('label'=>'View Timemanager Projects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Timemanager Projects', 'url'=>array('admin')),
);
?>

<h1>Update Timemanager Projects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>