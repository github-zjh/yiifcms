<?php

/**
 * This is the model class for table "{{oauth_renren}}".
 *
 * The followings are the available columns in table '{{oauth_renren}}':
 * @property string $id
 * @property string $uid
 * @property string $renren_uid
 * @property string $renren_token
 * @property string $renren_info
 */
class OAuthRenren extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{oauth_renren}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, renren_uid', 'length', 'max'=>10),
			array('renren_token', 'length', 'max'=>100),
			array('renren_info', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, renren_uid, renren_token, renren_info', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'renren_uid' => 'Renren Uid',
			'renren_token' => 'Renren Token',
			'renren_info' => 'Renren Info',
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

		$criteria->compare('uid',$this->uid,true);

		$criteria->compare('renren_uid',$this->renren_uid,true);

		$criteria->compare('renren_token',$this->renren_token,true);

		$criteria->compare('renren_info',$this->renren_info,true);

		return new CActiveDataProvider('OAuthRenren', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OAuthRenren the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}