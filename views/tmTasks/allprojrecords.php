<?php
/* @var $this PostController */

$this->breadcrumbs=array(
	'Записи');
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewprojrecords',
	));
?>

