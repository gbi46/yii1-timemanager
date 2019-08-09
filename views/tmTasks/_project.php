<?php
/* @var $this TimemanagerprojectsController */
/* @var $data Timemanagerprojects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('curday')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->curday), array('project', 'year'=>$data->year)); ?>
	<br />

	


</div>