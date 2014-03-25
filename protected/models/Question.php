<?php

/**
 * This is the model class for table "{{Question}}".
 *
 * The followings are the available columns in table '{{Question}}':
 * @property string $id
 * @property string $user_id
 * @property integer $scope
 * @property string $username
 * @property string $realname
 * @property string $email
 * @property string $telephone
 * @property string $question
 * @property string $contact_other
 * @property string $answer_status
 * @property string $answer_content
 * @property string $status_is
 * @property string $create_time
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{Question}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question', 'required'),
			array('scope', 'numerical', 'integerOnly'=>true),
			array('user_id, create_time', 'length', 'max'=>10),
			array('username, contact_other', 'length', 'max'=>100),
			array('realname', 'length', 'max'=>50),
			array('email', 'length', 'max'=>60),
			array('telephone', 'length', 'max'=>20),
			array('answer_status, status_is', 'length', 'max'=>1),
			array('answer_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, scope, username, realname, email, telephone, question, contact_other, answer_status, answer_content, status_is, create_time', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'user_id' => 'User',
			'scope' => 'Scope',
			'username' => 'Username',
			'realname' => 'Realname',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'question' => 'Question',
			'contact_other' => 'Contact Other',
			'answer_status' => 'Answer Status',
			'answer_content' => 'Answer Content',
			'status_is' => 'Status Is',
			'create_time' => 'Create Time',
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

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('scope',$this->scope);

		$criteria->compare('username',$this->username,true);

		$criteria->compare('realname',$this->realname,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('telephone',$this->telephone,true);

		$criteria->compare('question',$this->question,true);

		$criteria->compare('contact_other',$this->contact_other,true);

		$criteria->compare('answer_status',$this->answer_status,true);

		$criteria->compare('answer_content',$this->answer_content,true);

		$criteria->compare('status_is',$this->status_is,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Question', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}