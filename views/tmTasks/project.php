<?php
/* @var $this TimemanageryearController */
/* @var $model Timemanageryear */ 

echo '<div class="tm-create">'.CHtml::link(CHtml::encode('Створити запис'), array('create')).'</div>';

if(isset($_GET['d'])){
	$day = $_GET['d'];
	if(preg_match('/^[0-9]{4}\-[0-9]{1}\-/', $day)){
		
		$exDay = explode('-', $day);
		$day = $exDay[0].'-0'.$exDay[1].'-'.$exDay[2];
	}
	if(isset($_GET['p'])){
		$project = $_GET['p'];
	}
	
	$tm = TmTasks::model()->findAll(array(
		'condition' => 'curday=:cy and project=:pr', 
		'params'=>array(':cy'=>$day, ':pr'=>$project),
		'order' => 'starttime desc'));
	if($tm){
		$arDiff = [];
		foreach($tm as $tms){
		$s = $tms->starttime;
		$e = $tms->endtime;
		$r = $e - $s;
		$hour = '';
		$min = '';
		$diff = $e-$s;
		
			if($diff > 3599){
				$ostHour = $diff%3600;
				$divHour = $diff-$ostHour;
				$hour = intval($divHour / 3600).'г:';
				$forArHour = intval($divHour / 3600);
				$arHour[] = $forArHour;
				
				$ostMin = $diff-$divHour;
				$minOst=$ostMin%60;
				$clearMin = ($ostMin-$minOst)/60;
				$min = $clearMin.'х:';
				
				$arMin[] = $clearMin;
				
				$sec = $minOst.'c';
				$arSec[] = $minOst;
			}
			elseif($diff>59 && $diff<3600){
				$secOst = $diff%60;
				$sec = $secOst.'с';
				$minClear = ($diff-(int)$sec)/60;
				$min = $minClear.'x:';
				
				$arMin[] = $minClear;
				$arSec[] = $secOst;
			}
		    else{
				$sec = $diff.'с';
				$arSec[] = $sec;
			}
		
		
		//echo '<br /><h2>'.$hour.$min.$sec.'</h2>&nbsp;&nbsp;&nbsp;-----'.date('H:i:s', $e).'-'.date('H:i:s', $s).'<br />';
		echo '<p class="period">Період: &nbsp;&nbsp;&nbsp;</p>
			  <p class="period-value">'.date('H:i:s', $s).'-'
			  .date('H:i:s', $e)
			  .'</p>';
			
		/*$tmOne = Timemanageryear::model()->find(
			
		);*/
		
		echo '<p class="period">Час:</p><p class="period-value">'
			  .$hour.$min.$sec
			.'</p>';
		echo '<p class="period">Завдання:</p><div class="period-value">'.$tms->task.'</div>';
		echo '<p class="period">Висновок:</p><div class="period-value">'.$tms->resume.'</div>'; 
		echo CHtml::link(CHtml::encode('Edit'), ['update', 'id' => $tms->id]); 
		$arDiff[] = $diff;
	}
	
	$diffSum = array_sum($arDiff);
	
	if($diffSum > 3599){
				$ostHour = $diffSum%3600;
				$divHour = $diffSum-$ostHour;
				$hour = intval($divHour / 3600).'г:';
				$forArHour = intval($divHour / 3600);
				$arHour[] = $forArHour;
				
				$ostMin = $diffSum-$divHour;
				$minOst=$ostMin%60;
				$clearMin = ($ostMin-$minOst)/60;
				$min = $clearMin.'х:';
				
				$arMin[] = $clearMin;
				
				$sec = $minOst.'c';
				$arSec[] = $minOst;
			}
			elseif($diffSum>59 && $diffSum<3600){
				$secOst = $diffSum%60;
				$sec = $secOst.'с';
				$minClear = ($diffSum-(int)$sec)/60;
				$min = $minClear.'x:';
				
				$arMin[] = $minClear;
				$arSec[] = $secOst;
			}
		    else{
				$sec = $diffSum.'с';
				$arSec[] = $sec;
			}
	echo '<div class="tm-all-time"><span style="font-size: 22px;">
	Всього за день: </span><span style="font-size: 19px;">'
		.$hour.'</span><span style="font-size: 19px;">'
		.$min.'</span><span style="font-size: 19px;">'
		.$sec.'</span></div>';
	}
	
		else
		echo '<h2 style="text-align: center; padding-top: 15px;">Записів немає</h2>';
		
		
	}
?>

<script>
	$('.tm-create').after($('.tm-all-time'));
</script>

