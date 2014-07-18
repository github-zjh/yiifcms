<?php

/**
 * This is the model class for table "{{oauth_weixin}}".
 *
 * The followings are the available columns in table '{{oauth_weixin}}':
 * @property string $id
 * @property string $uid
 * @property string $weixin_uid
 * @property string $weixin_token
 * @property string $weixin_info
 */
class OAuthWeixin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{oauth_weixin}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, weixin_uid', 'length', 'max'=>10),
			array('weixin_token', 'length', 'max'=>100),
			array('weixin_info', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, weixin_uid, weixin_token, weixin_info', 'safe', 'on'=>'search'),
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
			'weixin_uid' => 'Weixin Uid',
			'weixin_token' => 'Weixin Token',
			'weixin_info' => 'Weixin Info',
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

		$criteria->compare('weixin_uid',$this->weixin_uid,true);

		$criteria->compare('weixin_token',$this->weixin_token,true);

		$criteria->compare('weixin_info',$this->weixin_info,true);

		return new CActiveDataProvider('OAuthWeixin', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OAuthWeixin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}