<?php

/**
 * This is the model class for table "{{reply}}".
 *
 * The followings are the available columns in table '{{reply}}':
 * @property string $id
 * @property string $user_id
 * @property string $cid
 * @property string $reply_id
 * @property string $content
 * @property string $status
 * @property string $create_time
 */
class Reply extends CActiveRecord
{
	public $title;  // 相关内容title
	public $url;    // 相关内容url
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{reply}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, cid, reply_id, create_time', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, cid, reply_id, content, status, create_time', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model', 'ReplyId'),
			'user_id' => Yii::t('model', 'ReplyUserid'),
			'cid' => Yii::t('model', 'ReplyCid'),
			'reply_id' => Yii::t('model', 'ReplyRid'),
			'content' => Yii::t('model', 'ReplyContent'),
			'status' => Yii::t('model', 'ReplyStatus'),
			'create_time' => Yii::t('model', 'ReplyCreateTime'),
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

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('cid',$this->cid,true);

		$criteria->compare('reply_id',$this->reply_id,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Reply', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Reply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}