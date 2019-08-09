<?php
/* @var $this TimemanagerprojectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Проекти',
);

$this->menu=array(
	array('label'=>'Create Timemanager Projects', 'url'=>array('create')),
	array('label'=>'Manage Timemanager Projects', 'url'=>array('admin')),
);
?>
<div class="tm-title"><h1>Проекти</h1></div>


<div class="tm-create">
	<?php echo CHtml::link('Створити новий проект', array('create')) ?>
</div>

<?php 
	$dataCounter = 1;
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'		=>  $projects,
		'itemView'			=> '_viewtree',
		'summaryText' 		=> ''
	));
	
	echo password_hash('ltpujeemo9', PASSWORD_BCRYPT ) . '<br />';
	echo 'X6RQb0i0HkcviaeBj8EuPw';