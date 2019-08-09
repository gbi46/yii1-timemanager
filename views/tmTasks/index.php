
<?php
/* @var $this TimemanageryearController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('timemanager', 'Project_page'),
);

$this->menu=array(
	array('label'=>'Create Timemanager Tasks', 'url'=>array('create')),
	array('label'=>'Manage Timemanager Tasks', 'url'=>array('admin')),
);
?>
<?php 
$project = '';
if(!empty($_GET)){
	if(isset($_GET['project'])){
		$project = $_GET['project'];
	}
	else{
		$project = 'no project was selected';
	}
}
?>
<h1><?=Yii::t('timemanager', 'Project').' '.$project ?></h1>

<?php echo CHtml::link('Створити', array('create', 'project' => $project)); ?>

<?php echo '<p>'.CHtml::link(Yii::t('timemanager', 'All project records'), [
		'allprojrecords', 'project'=>$project
		]).'</p>'; ?>

<?php if(!empty($_GET)){
	if(isset($_GET['project'])){
		$this->widget('application.extensions.eventcalendar.EventcalendarWidget', array());
	}
	else{
		echo 'project does not exists';
	}
}
else{
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'template'=>'{sorter}<br />{pager}{items}{pager}',
		'itemView'=>'_view',
	));
}