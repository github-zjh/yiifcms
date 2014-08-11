<?php

/**
 * This is the model class for table "{{oauth}}".
 *
 * The followings are the available columns in table '{{oauth}}':
 * @property string $id
 * @property string $apiname
 * @property string $apiconfig
 * @property string $status
 */
class OAuth extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{oauth}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'length', 'max'=>30),
			array('apiname', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			array('apiconfig', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, apiname, apiconfig, status', 'safe', 'on'=>'search'),
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
			'apiname' => 'Apiname',
			'apiconfig' => 'Apiconfig',
			'status' => 'Status',
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

		$criteria->compare('apiname',$this->apiname,true);

		$criteria->compare('apiconfig',$this->apiconfig,true);

		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('OAuth', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return OAuth the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}