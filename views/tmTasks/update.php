<?php
/* @var $this TimemanageryearController */
/* @var $model Timemanageryear */

$this->breadcrumbs=array(
	'Timemanager Tasks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('timemanager', 'List').' '.$model->id, 'url'=>array('index')),
	array('label'=>'Create Timemanager Tasks', 'url'=>array('create')),
	array('label'=>'View Timemanager Tasks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Timemanager Tasks', 'url'=>array('admin')),
);
?>

<h1>Update Timemanager Tasks <?php echo $model->id; ?></h1>

<div id="timer"></div>

<script>
  $('#timer').html('00:35:00');
  function startTimer() {
  
    var arr = $('#timer').html().split(":");
    var h = arr[0];
    var m = arr[1];
    var s = arr[2];
    if (s == 0) {
      if (m == 0) {
        if (h == 0) {
          alert("Время вышло");
          return;
        }
        h--;
        m = 60;
        if (h < 10) h = "0" + h;
      }
      m--;
      if (m < 10) m = "0" + m;
      s = 59;
    }
    else s--;
    if (s < 10) s = "0" + s;
    $('#timer').html(h+":"+m+":"+s);
    setTimeout(startTimer, 1000);
  }
  
  //startTimer();
</script>

<?php $this->renderPartial('_form', array('model'=>$model,
										  'parentScript'=>$parentScript)); ?>