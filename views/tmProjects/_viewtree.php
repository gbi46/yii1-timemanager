<?php
/* @var $this TimemanagerprojectsController */
/* @var $data Timemanagerprojects */
$branchLength = explode('-', $data->branch);
$branchLength = count($branchLength);
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div 
	class="<?= $data->branch ?> tm-projects" 
	data-br-pos="<?= $data->br_position ?>" 
	data-max-br-pos="<?= $data->max_br_position ?>" 
	style="margin-left:<?php echo $branchLength*6;?>px;"
>
	<?php 
		echo CHtml::link(CHtml::encode($data->name), array('tmTasks/index', 'project'=>$data->id))
		. CHtml::openTag('span', ['id' => 'arr_toup_' . $data->branch])
		. CHtml::image(Yii::app()->baseUrl . '/images/icons/arrowup.png', '', ['width' => '16px'])
		. CHtml::closeTag('span')
		. CHtml::openTag('span', ['id' => 'arr_down_' . $data->branch])
		. CHtml::image(Yii::app()->baseUrl . '/images/icons/arrowdown.png', '', [
				'width' => '16px',
				'padding-top' => '5px'
			])
		. CHtml::closeTag('span')
		. CHtml::openTag('span', ['class' => 'crud-buttons'])
		. CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/icons/eye.png', '', ['width' => '16px']), ['tmProjects/view', 'id' => $data->id])
		. CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/icons/edit.png', '', ['width' => '16px']), ['tmProjects/update', 'id' => $data->id])
		. CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/icons/trash.png', '', ['width' => '16px']), ['tmProjects/delete', 'id' => $data->id])
		. CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/icons/plus.png', '', ['width' => '16px']), ['tmProjects/create', 'id' => $data->id])
		. CHtml::closeTag('span');
	?>
</div>