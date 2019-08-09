<?php
/* @var $this TimemanageryearController */
/* @var $model Timemanageryear */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo $model->id; ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmtasks-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля з <span class="required">*</span> обов'язкові для заповнення.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project'); ?>
		<?php 
			if(!empty($_GET)){
				if(isset($_GET['project'])){
					$project = $_GET['project'];
				}
				else{
					$project = '';
				}
			}
			else {
				$project = '';
			}
		?>
		<?php echo $form->dropDownList($model, 'project', TmProjects::all(), ['options' => [$project => ['selected' => true]]]); ?>
		<?php echo $form->error($model,'project'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textArea($model, 'task',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'task'); ?>
	</div>
	
	<?php if($parentScript == 'update'){
		
	echo '<div class="row">';
	echo $form->labelEx($model,'resume'); 
    echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50));
    echo $form->error($model,'resume');
	echo '</div>';
    } ?>
    
	<div class="row">
		<?php //echo $form->labelEx($model,'earn'); ?>
		<?php //echo $form->textField($model,'earn',array('size'=>60,'maxlength'=>200)); ?>
		<?php //echo $form->error($model,'earn'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
