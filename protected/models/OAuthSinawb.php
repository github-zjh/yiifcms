<?php

/**
 * This is the model class for table "{{oauth_sinawb}}".
 *
 * The followings are the available columns in table '{{oauth_sinawb}}':
 * @property string $openid
 * @property string $access_token
 * @property string $uid
 */
class OAuthSinawb extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{oauth_sinawb}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('openid, access_token', 'length', 'max'=>100),
			array('uid', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('openid, access_token, uid', 'safe', 'on'=>'search'),
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
			'openid' => 'Openid',
			'access_token' => 'Access Token',
			'uid' => 'Uid',
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

		$criteria->compare('openid',$this->openid,true);

		$criteria->compare('access_token',$this->access_token,true);

		$criteria->compare('uid',$this->uid,true);

		return new CActiveDataProvider('OAuthSinawb', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OAuthSinawb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}