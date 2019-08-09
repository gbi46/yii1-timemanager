<?php
/* @var $this TimemanageryearController */
/* @var $model Timemanageryear */

$this->breadcrumbs=array(
	Yii::t('timemanager', 'Timemanager Tasks')=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Timemanager Tasks', 'url'=>array('index')),
	array('label'=>'Manage Timemanager Tasks', 'url'=>array('admin')),
);
?>

<h1>Створення запису задачі</h1>

<?php 
echo $model->id;
$this->renderPartial('_form', array('model'=>$model,
                                    'parentScript'=>$parentScript)); ?>