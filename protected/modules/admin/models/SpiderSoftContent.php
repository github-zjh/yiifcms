<?php

/**
 * This is the model class for table "{{spider_soft_content}}".
 *
 * The followings are the available columns in table '{{spider_soft_content}}':
 * @property string $list_id
 * @property string $soft_img
 * @property string $soft_icon
 * @property string $content
 */
class SpiderSoftContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spider_soft_content}}';
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
			array('soft_img, soft_icon', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('list_id, soft_img, soft_icon, content', 'safe', 'on'=>'search'),
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
            'list_id'   => Yii::t('model', 'SpiderSoftContentListId'),			
			'soft_img'  => Yii::t('model', 'SpiderSoftContentSoftImg'),
			'soft_icon' => Yii::t('model', 'SpiderSoftContentSoftIcon'),			
			'content'   => Yii::t('model', 'SpiderSoftContentContent'),           
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

		$criteria->compare('soft_img',$this->soft_img,true);

		$criteria->compare('soft_icon',$this->soft_icon,true);

		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider('SpiderSoftContent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return SpiderSoftContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}