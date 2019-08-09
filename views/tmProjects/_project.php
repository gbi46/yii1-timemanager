<?php
/* @var $this TimemanagerprojectsController */
/* @var $data Timemanagerprojects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('t')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 't'=>$data->t)); ?>
	<br />

	


</div>