<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property string $id
 * @property string $topic_id
 * @property string $user_id
 * @property string $content
 * @property string $status
 * @property string $type
 * @property string $client_ip
 * @property string $create_time
 */
class Comment extends CActiveRecord
{
	public $verifyCode;
	public $title;  // 相关内容title
	public $url;    // 相关内容url
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, user_id, topic_id, type', 'required'),
			array('topic_id, user_id, create_time', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			array('type', 'length', 'max'=>7),				
			array('client_ip', 'length', 'max'=>15),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, topic_id, user_id, content, status, type, client_ip, create_time', 'safe', 'on'=>'search'),
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
	        'post'=>array(self::BELONGS_TO, 'Post', 'topic_id',  'select'=>'id,title'),
			'image'=>array(self::BELONGS_TO, 'Image', 'topic_id',  'select'=>'id,title'),
			'soft'=>array(self::BELONGS_TO, 'Soft', 'topic_id',  'select'=>'id,title'),
			'video'=>array(self::BELONGS_TO, 'Video', 'topic_id',  'select'=>'id,title'),
			'goods'=>array(self::BELONGS_TO, 'Goods', 'topic_id',  'select'=>'id,goods_name, goods_name as title'),
	    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model','CommentId'),
			'topic_id' => Yii::t('model','CommentTopic_id'),
			'title' => Yii::t('model','CommentTitle'),
			'url' => Yii::t('model','CommentUrl'),
			'user_id' => Yii::t('model','CommentUser_id'),
			'content' => Yii::t('model','CommentContent'),
			'status' => Yii::t('model','CommentStatus'),
			'type' => Yii::t('model','CommentType'),
 			'client_ip' => Yii::t('model','CommentClient_ip'),
			'create_time' => Yii::t('model','CommentCreate_time'),
			'verifyCode' => Yii::t('model','verifyCode')			
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

		$criteria->compare('topic_id',$this->topic_id,true);

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('client_ip',$this->client_ip,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Comment', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}