<?php

/**
 * This is the model class for table "{{recommend}}".
 *
 * The followings are the available columns in table '{{recommend}}':
 * @property string $id
 * @property string $position_id
 * @property string $content_id
 * @property integer $type
 * @property string $title
 * @property string $sort_order
 * @property string $create_time
 */
class Recommend extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{recommend}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position_id, content_id, type', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('id, position_id, content_id, sort_order, create_time', 'length', 'max'=>10),
            array('title', 'length', 'max' => 100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, position_id, content_id, type, title, sort_order, create_time', 'safe', 'on'=>'search'),
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
			'id'         => Yii::t('model','RecommendId'),
            'position_id'=> Yii::t('model','RecommendPositionId'),
			'content_id' => Yii::t('model','RecommendContent'),
            'type'       => Yii::t('model','RecommendType'),
            'title'      => Yii::t('model','RecommendTitle'),
			'sort_order' => Yii::t('model','RecommendSortOrder'),
            'create_time'=> Yii::t('model','RecommendCreateTime'),           
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

		$criteria->compare('content_id',$this->content_id,true);

		$criteria->compare('type',$this->type);
        
        $criteria->compare('title',$this->title);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('create_time',$this->create_time,true);
		
		return new CActiveDataProvider('Recommend', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Recommend the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}