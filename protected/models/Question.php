<?php

/**
 * This is the model class for table "{{question}}".
 *
 * The followings are the available columns in table '{{question}}':
 * @property string $id
 * @property string $user_id
 * @property string $realname
 * @property string $email
 * @property string $telephone
 * @property string $qq
 * @property string $question
 * @property string $client_ip
 * @property string $create_time
 */
class Question extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{question}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('realname, email, question', 'required'),
			array('verifyCode','required','on'=>'create'),
			array('user_id, create_time', 'length', 'max'=>10),
			array('realname', 'length', 'max'=>50),			
			array('email','email'),		
			array('telephone','checkPhone'),
			array('qq', 'checkQQ'),
			array('client_ip', 'length', 'max'=>15),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, realname, email, telephone, qq, question, client_ip, create_time', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * 
	 * 校验手机号码
	 */
	public function checkPhone(){
		if($this->telephone && !preg_match('/^1[3|5|8]\d{9}$/', $this->telephone)){
			$this->addError('telephone',Yii::t('common','Mobile Number Is Wrong'));
			return false;
		}
		return true;
	}
	
	/**
	 *
	 * 校验qq号码
	 */
	public function checkQQ(){
		if($this->qq && !preg_match('/^\d{6,12}$/', $this->qq)){
			$this->addError('qq',Yii::t('common','QQ Number Is Wrong'));
			return false;
		}
		return true;
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
			'id' => Yii::t('model','QuestionId'),
			'user_id' => Yii::t('model','QuestionUser_id'),
			'realname' => Yii::t('model','QuestionRealname'),
			'email' => Yii::t('model','QuestionEmail'),
			'telephone' => Yii::t('model','QuestionTelephone'),
			'qq' => Yii::t('model','QuestionQq'),
			'question' => Yii::t('model','QuestionQuestion'),
			'client_ip' => Yii::t('model','QuestionClient_ip'),
			'create_time' => Yii::t('model','QuestionCreate_time'),
			'verifyCode' => Yii::t('model','verifyCode'),
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

		$criteria->compare('realname',$this->realname,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('telephone',$this->telephone,true);

		$criteria->compare('qq',$this->qq,true);

		$criteria->compare('question',$this->question,true);

		$criteria->compare('client_ip',$this->client_ip,true);

		$criteria->compare('create_time',$this->create_time,true);
		
		$criteria->compare('verifyCode',$this->verifyCode,true);

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