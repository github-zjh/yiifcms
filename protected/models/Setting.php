<?php

/**
 * This is the model class for table "{{Setting}}".
 *
 * The followings are the available columns in table '{{Setting}}':
 * @property string $scope
 * @property string $variable
 * @property string $value
 * @property string $description
 */
class Setting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{Setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('variable', 'required'),
			array('scope', 'length', 'max'=>20),
			array('variable', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('scope, variable, value, description', 'safe', 'on'=>'search'),
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
			'scope' => 'Scope',
			'variable' => 'Variable',
			'value' => 'Value',
			'description' => 'Description',
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

		$criteria->compare('scope',$this->scope,true);

		$criteria->compare('variable',$this->variable,true);

		$criteria->compare('value',$this->value,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('Setting', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Setting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}