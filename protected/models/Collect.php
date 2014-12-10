<?php

/**
 * This is the model class for table "{{collect}}".
 *
 * The followings are the available columns in table '{{collect}}':
 * @property string $id
 * @property string $cid
 * @property string $user_id
 * @property string $title
 * @property string $url
 * @property integer $type
 * @property string $create_time
 */
class Collect extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{collect}}';
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
			array('user_id, cid, create_time', 'length', 'max'=>10),
			array('title', 'length', 'max'=>100),
			array('url', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, user_id, title, url, type, create_time', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model', 'CollectID'),
			'cid' => Yii::t('model', 'CollectCid'),
			'user_id' => Yii::t('model', 'CollectUserid'),
			'title' => Yii::t('model', 'CollectTitle'),
			'url' => Yii::t('model', 'CollectUrl'),
			'type' => Yii::t('model', 'CollectType'),
			'create_time' => Yii::t('model', 'CollectAddTime'),
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

		$criteria->compare('cid',$this->cid,true);
		
		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('type',$this->type);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Collect', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Collect the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}