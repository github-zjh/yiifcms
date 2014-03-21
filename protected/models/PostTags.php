<?php

/**
 * This is the model class for table "{{post_tags}}".
 *
 * The followings are the available columns in table '{{post_tags}}':
 * @property integer $id
 * @property string $tag_name
 * @property string $data_count
 * @property string $create_time
 */
class PostTags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post_tags}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_name', 'required'),
			array('tag_name', 'length', 'max'=>30),
			array('data_count, create_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag_name, data_count, create_time', 'safe', 'on'=>'search'),
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
			'tag_name' => 'Tag Name',
			'data_count' => 'Data Count',
			'create_time' => 'Create Time',
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

		$criteria->compare('tag_name',$this->tag_name,true);

		$criteria->compare('data_count',$this->data_count,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('PostTags', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return PostTags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}