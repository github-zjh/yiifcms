<?php

/**
 * This is the model class for table "{{ad_position}}".
 *
 * The followings are the available columns in table '{{ad_position}}':
 * @property string $id
 * @property string $title
 * @property string $status
 */
class AdPosition extends CActiveRecord
{
    const STATUS_SHOW = 'Y';  //显示
    const STATUS_HIDE = 'N';  //隐藏
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ad_position}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title', 'required'),
			array('title', 'length', 'max'=>100),
            array('status', 'in', 'range' => array(self::STATUS_SHOW, self::STATUS_HIDE)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title', 'safe', 'on'=>'search'),
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
			'id'     => Yii::t('model', 'AdPositionId'),
			'title'  => Yii::t('model', 'AdPositionTitle'),
            'status' => Yii::t('model', 'AdPositionStatus')
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

		$criteria->compare('title',$this->title,true);
        
        $criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('AdPosition', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return AdPosition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}