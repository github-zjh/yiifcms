<?php

/**
 * This is the model class for table "{{spider_post_list}}".
 *
 * The followings are the available columns in table '{{spider_post_list}}':
 * @property string $id
 * @property string $site_id
 * @property string $url
 * @property string $title
 * @property integer $status
 */
class SpiderPostList extends CActiveRecord
{    
    const STATUS_NONE_C = 0;  //标题已采集
    const STATUS_C      = 1;  //内容已采集
    const STATUS_SUCCESS= 2;  //数据已导入
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spider_post_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('site_id', 'length', 'max'=>10),
			array('url, title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, site_id, url, title, status', 'safe', 'on'=>'search'),
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
            'spiderset' => array(self::BELONGS_TO, 'SpiderSetting', 'site_id'),
            'content' => array(self::HAS_ONE, 'SpiderPostContent', 'list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'      => Yii::t('model','SpiderPostListId'),
			'site_id' => Yii::t('model','SpiderPostListSite'),
			'url'     => Yii::t('model','SpiderPostListUrl'),
			'title'   => Yii::t('model','SpiderPostListTitle'),
			'status'  => Yii::t('model','SpiderPostListStatus'),
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

		$criteria->compare('site_id',$this->site_id,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('status',$this->status);

		return new CActiveDataProvider('SpiderPostList', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return SpiderPostList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}