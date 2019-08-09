<?php
/* @var $this TimemanagerprojectsController */
/* @var $data Timemanagerprojects */
?>

<div class="tm-projects">
	<?php echo CHtml::link(CHtml::encode($data->name), array('tmTasks/index', 'project'=>$data->name)); ?>
</div>