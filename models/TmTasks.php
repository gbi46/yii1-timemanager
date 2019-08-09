<?php

/**
 * This is the model class for table "{{timemanageryear}}".
 *
 * The followings are the available columns in table '{{timemanageryear}}':
 * @property integer $id
 * @property string $project
 * @property integer $year
 * @property string $resume
 * @property string $earn
 */
class TmTasks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tm_tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('starttime, endtime', 'numerical', 'integerOnly'=>true),
			array('project, earn', 'length', 'max'=>200),
			array('resume, task', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, task, project, curday, resume, earn, starttime, endtime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'task' => Yii::t('timemanager', 'Task'),
			'project' => 'Project',
			'curday' => 'Day of record',
			'resume' => 'Resume',
			'earn' => 'Earn',
			'starttime' => 'Start time',
			'endtime' => 'End time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('task',$this->task);
		$criteria->compare('project',$this->project,true);
		$criteria->compare('curday',$this->curday);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('earn',$this->earn,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>[
				'pageSize'=>15,
			]
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timemanageryear the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function beforeSave(){
		if($this->isNewRecord){
			$this->starttime = time();
			$this->curday    = date('Y-m-d');	
		}
		
		else
		$this->endtime = time();
		return parent::beforeSave();
	}
	
}
