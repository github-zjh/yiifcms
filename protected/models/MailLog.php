<?php

/**
 * This is the model class for table "{{mail_log}}".
 *
 * The followings are the available columns in table '{{mail_log}}':
 * @property string $id
 * @property string $accept
 * @property string $subject
 * @property string $message
 * @property string $sendtime
 * @property string $status
 * @property string $level
 * @property integer $times
 * @property string $error
 */
class MailLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mail_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('times', 'numerical', 'integerOnly'=>true),
			array('accept', 'length', 'max'=>50),
			array('subject, error', 'length', 'max'=>100),
			array('sendtime', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('level', 'length', 'max'=>1),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, accept, subject, message, sendtime, status, level, times, error', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','MailId'),
			'accept' => Yii::t('model','MailAccept'),
			'subject' => Yii::t('model','MailSubject'),
			'message' => Yii::t('model','MailMessage'),
			'sendtime' => Yii::t('model','MailSendtime'),
			'status' => Yii::t('model','MailStatus'),
			'level' => Yii::t('model','MailLevel'),
			'times' => Yii::t('model','MailTimes'),
			'error' => Yii::t('model','MailError'),
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('accept',$this->accept,true);

		$criteria->compare('subject',$this->subject,true);

		$criteria->compare('message',$this->message,true);

		$criteria->compare('sendtime',$this->sendtime,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('level',$this->level,true);

		$criteria->compare('times',$this->times);

		$criteria->compare('error',$this->error,true);

		return new CActiveDataProvider('MailLog', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return MailLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}