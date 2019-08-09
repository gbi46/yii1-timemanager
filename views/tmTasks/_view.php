<?php
/* @var $this TimemanageryearController */
/* @var $data Timemanageryear */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project')); ?>:</b>
	<?php echo CHtml::encode($data->project); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resume')); ?>:</b>
	<?php echo CHtml::encode($data->resume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earn')); ?>:</b>
	<?php echo CHtml::encode($data->earn); ?>
	<br />


</div>