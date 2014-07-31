<?php

/**
 * This is the model class for table "{{recommend}}".
 *
 * The followings are the available columns in table '{{recommend}}':
 * @property string $id
 * @property string $content_id
 * @property string $sort_order
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
			array('id', 'required'),
			array('id, content_id, sort_order', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content_id, sort_order', 'safe', 'on'=>'search'),
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
			'Post'=>array(self::HAS_ONE, 'Post', '','on' => 't.content_id=post.id','together'=>true),
			'Image'=>array(self::HAS_ONE, 'Post', '','on' => 't.content_id=image.id','together'=>true),
			'Soft'=>array(self::HAS_ONE, 'Soft', '','on' => 't.content_id=soft.id','together'=>true),
			'Video'=>array(self::HAS_ONE, 'Video', '','on' => 't.content_id=video.id','together'=>true),
			'Goods'=>array(self::HAS_ONE, 'Goods', '','on' => 't.content_id=goods.id','together'=>true),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'content_id' => 'Content',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('sort_order',$this->sort_order,true);

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