<?php

/**
 * This is the model class for table "{{model_type}}".
 *
 * The followings are the available columns in table '{{model_type}}':
 * @property integer $id
 * @property string $type_key
 * @property string $type_name
 * @property string $model
 * @property string $status
 */
class ModelType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{model_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_key, type_name, model', 'required'),
			array('type_key', 'length', 'max'=>20),
			array('type_key, type_name','unique'),
			array('type_name, model', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_key, type_name, model, status', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','MTid'),
			'type_key' => Yii::t('model','MTtype_key'),
			'type_name' => Yii::t('model','MTtype_name'),
			'model' => Yii::t('model','MTmodel'),
			'status' => Yii::t('model','Status'),
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

		$criteria->compare('type_key',$this->type_key,true);

		$criteria->compare('type_name',$this->type_name,true);

		$criteria->compare('model',$this->model,true);

		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('ModelType', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ModelType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}