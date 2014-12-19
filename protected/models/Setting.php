<?php

/**
 * This is the model class for table "{{setting}}".
 *
 * The followings are the available columns in table '{{setting}}':
 * @property string $scope
 * @property string $variable
 * @property string $value
 */
class Setting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{setting}}';
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
			array('scope', 'length', 'max'=>30),
			array('variable', 'length', 'max'=>50),
			array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('scope, variable, value', 'safe', 'on'=>'search'),
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
	
	/**
	 * 取配置数据
	 *
	 */
	public static function loadData ($conditions='scope=:scope', $params=array('scope'=>'base'))
	{
		if($conditions){
			$model = self::model()->findAll($conditions,$params);
		}else{
			$model = self::model()->findAll();
		}
		foreach ($model as $key => $row) {
			$setting[$row['variable']] = $row['value'];
		}
		return $setting;
	
	}
}