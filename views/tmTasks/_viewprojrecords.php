<?php
/* @var $this TimemanageryearController */
/* @var $data Timemanageryear */
?>

<?php $df = new CDateFormatter('uk_UA'); ?>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project')); ?>:</b>
	<?php echo CHtml::encode($data->project); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('task')); ?>:</b>
	<?php echo strip_tags($data->task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resume')); ?>:</b>
	<?php echo strip_tags($data->resume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('starttime')); ?>:</b>
	<?php echo CHtml::encode($df->formatDateTime($data->starttime,
							'long', 'medium')); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('endtime')); ?>:</b>
	<?php echo CHtml::encode($df->formatDateTime($data->endtime,
							'long', 'medium')); ?>
	<br />
</div>