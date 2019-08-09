<script type="text/javascript">
	function startTime(){
		var k;
		var tm=new Date();
		var h = tm.getHours();
		var m = tm.getMinutes();
		var s = tm.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML = "<h2>" + h  + ":" + m + ":" + s + "</h2>";
		setTimeout('startTime()', 500);
		function checkTime(k){
			if(k<10) {
				k = "0" + k;
			}
			return k;
		}
	}
</script>
<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
	<div class="span-18">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-6 last">
		<div id="sidebar">
			<?php echo CHtml::link(CHtml::encode('Створити проект'), ['timemanagerprojects/create'], ['target'=>'_blank']); ?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>