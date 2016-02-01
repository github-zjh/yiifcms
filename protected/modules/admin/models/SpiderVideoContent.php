<?php

/**
 * This is the model class for table "{{spider_video_content}}".
 *
 * The followings are the available columns in table '{{spider_video_content}}':
 * @property string $list_id
 * @property string $cover_img
 * @property string $content
 */
class SpiderVideoContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spider_video_content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('list_id', 'required'),
            array('content', 'safe'),
			array('list_id', 'length', 'max'=>10),
			array('cover_img', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('list_id, cover_img, content', 'safe', 'on'=>'search'),
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
			'list_id'   => Yii::t('model', 'SpiderVideoContentListId'),			
			'cover_img' => Yii::t('model', 'SpiderVideoContentCoverImg'),			
			'content'   => Yii::t('model', 'SpiderVideoContentContent'),
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

		$criteria->compare('list_id',$this->list_id,true);

		$criteria->compare('cover_img',$this->cover_img,true);

		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider('SpiderVideoContent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return SpiderVideoContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}