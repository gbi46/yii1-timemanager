<?php

class TmTasksController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '/layouts/column2';
	public $parentScript = '';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','project'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'allprojrecords'),
				'users'=>array('admin3'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionProject()
	{
		/*if(isset($_GET['year'])){
			$year = $_GET['year'];
			$thisYear = Timemanageryear::model()->find('year=:ty', array(':ty'=>$year));
		}*/

		$this->render('project'
		//,array('model'=>$thisYear,)
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TmTasks;
		$this->parentScript = 'create';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TmTasks']))
		{
			$model->attributes=$_POST['TmTasks'];
		
			if($model->save())
				
				$this->redirect(array('update', 
				'id'=>$model->id,
				));
		}
			
		$this->render('create',array(
			'model'=>$model,
			'parentScript'=>$this->parentScript
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout = '/layouts/update-layout';
		$model=$this->loadModel($id);
		$this->parentScript = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TmTasks']))
		{
			$model->attributes=$_POST['TmTasks'];
			if($model->save())
				$this->redirect(array('project','d'=>date('Y-m-d'), 'p'=>$model->project));
		}

		$this->render('update',array(
			'model'=>$model,
			'parentScript'=>$this->parentScript,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{		
		$dataProvider=new CActiveDataProvider('TmTasks');
		$this->render('index', ['dataProvider' => $dataProvider]);
	}

	public function actionAllprojrecords()
	{
		if(isset($_GET['project'])){
			$dataProvider=new CActiveDataProvider('TmTasks',[
				'criteria'=>[
					'condition'=>'project=:comeproj',
					'params'=>[':comeproj'=>$_GET['project']]
				]
			]);
			$this->render('allprojrecords', [
				'dataProvider'=>$dataProvider
			]);
		}
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/tmtasks-admin.css');
		$model=new TmTasks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TmTasks']))
			$model->attributes=$_GET['Timemanageryear'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Timemanageryear the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TmTasks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Timemanageryear $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tmtasks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
