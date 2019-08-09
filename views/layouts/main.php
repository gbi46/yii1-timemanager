<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/build/global.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php
		$this->pageTitle = 'Таймменеджер';
		echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<script src="/js/build/production.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jscripts/tiny_mce/tiny_mce.js"></script>

	<script type="text/javascript">
		tinyMCE.init({
			// General options
			mode : "textareas",
			max_width: 150,
			theme : "advanced",
			skin : "o2k7",
			inline: false,
			plugins : "autolink,lists,style,layer,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,forecolor,backcolor,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|blockquote,|,undo,redo,|link,unlink,anchor,image,media,emotions,code",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			// Example content CSS (should be your site CSS)
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",
			// Style formats
			style_formats : [
				{title : 'Bold text', inline : 'b'},
				{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
				{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
				{title : 'Table styles'},
				{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],
		});

	<!-- /TinyMCE -->

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
</head>

<body onLoad="startTime()">

<div class="container" id="page">

	<div id="header">
		<div id="logo-admin">

			<?php

			Yii::app()->name = 'Таймменеджер';
			echo CHtml::encode(Yii::app()->name); ?>

			<p style="text-align: right;"><?php echo date('d-m-Y');?> </p>
			<p style="text-align: right; color: red;" id="txt"></p>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items' => array(
				array('label'=> 'На початок', 'url'=>'/'),
				array('label'=> 'Таймменеджер', 'url'=>'/timemanager/tmProjects/'),
				array('label'=> 'Плани', 'url'=>'/thread/post/603'),
				array('label'=> 'Витрати часу', 'url'=>'/thread/index/179'),
				array('label'=> 'Користувачі', 'url'=>'/admin/user'),
				array('label'=> 'Налаштування', 'url'=>'/admin/setting'),
				array('label'=> 'Розділи', 'url'=>'/admin/forum/'),
				array('label'=> 'Теми', 'url'=>'/admin/thread/'),
				array('label'=> 'Інформація', 'url'=>'/forum/view?id=3'),
				array('label'=> 'Записи', 'url'=>'/admin/post/'),
				array('label'=> 'Коментарі', 'url'=>'/admin/comment/'),
				array('label'=> 'Роки', 'url'=>'index.php/forum/view?id=59'),
				array('label'=>'Вхід', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Вихід ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		))?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php

	echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>