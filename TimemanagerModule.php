<?php

class TimemanagerModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'timemanager.models.*',
			'timemanager.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action))
		{
			//Yii::app()->theme = 'neutraldesk';
			if (Yii::app()->user->role != '2')
			{
				Yii::app()->request->redirect(Yii::app()->homeUrl);
			}
			
			return true;
		}
		else
			return false;
	}
}
