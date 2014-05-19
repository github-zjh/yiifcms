<?php

/**
 * This is the model class for table "{{soft}}".
 *
 * The followings are the available columns in table '{{soft}}':
 * @property integer $id
 * @property string $filetype
 * @property string $language
 * @property string $softtype
 * @property string $os
 * @property integer $softrank
 * @property string $softsize
 * @property string $softlink
 * @property string $introduce
 * @property integer $pay
 */
class Soft extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{soft}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('softrank, pay', 'numerical', 'integerOnly'=>true),
			array('filetype, language, softtype, softsize', 'length', 'max'=>10),
			array('os', 'length', 'max'=>30),
			array('softlink', 'length', 'max'=>100),
			array('introduce', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, filetype, language, softtype, os, softrank, softsize, softlink, introduce, pay', 'safe', 'on'=>'search'),
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
			'filetype' => 'Filetype',
			'language' => 'Language',
			'softtype' => 'Softtype',
			'os' => 'Os',
			'softrank' => 'Softrank',
			'softsize' => 'Softsize',
			'softlink' => 'Softlink',
			'introduce' => 'Introduce',
			'pay' => 'Pay',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('filetype',$this->filetype,true);

		$criteria->compare('language',$this->language,true);

		$criteria->compare('softtype',$this->softtype,true);

		$criteria->compare('os',$this->os,true);

		$criteria->compare('softrank',$this->softrank);

		$criteria->compare('softsize',$this->softsize,true);

		$criteria->compare('softlink',$this->softlink,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('pay',$this->pay);

		return new CActiveDataProvider('Soft', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Soft the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}