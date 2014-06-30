<?php

/**
 * This is the model class for table "{{tag_data}}".
 *
 * The followings are the available columns in table '{{tag_data}}':
 * @property string $tag_id
 * @property string $content_id
 * @property integer $type
 * @property string $status
 */
class TagData extends CActiveRecord
{	
	public $data;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tag_data}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('tag_id, content_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tag_id, content_id, type, status', 'safe', 'on'=>'search'),
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
			'tag_id' => 'Tag',
			'content_id' => 'Content',
			'type' => 'Type',
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

		$criteria->compare('tag_id',$this->tag_id,true);

		$criteria->compare('content_id',$this->content_id,true);

		$criteria->compare('type',$this->type);
		
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('TagData', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return TagData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}