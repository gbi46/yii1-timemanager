<?php

class MainController extends Controller 
{
	public $layout = '//layouts/column2';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}