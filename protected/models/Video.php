<?php

/**
 * This is the model class for table "{{video}}".
 *
 * The followings are the available columns in table '{{video}}':
 * @property integer $id
 * @property string $title
 * @property integer $catalog_id
 * @property string $cover_image
 * @property string $video_file
 * @property string $language
 * @property string $video_type
 * @property string $video_score
 * @property string $video_size
 * @property string $download
 * @property string $introduce
 * @property string $update_time
 * @property string $create_time
 * @property integer $view_count
 * @property integer $down_count
 * @property string $voted
 * @property string $status
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{video}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catalog_id, view_count, down_count', 'numerical', 'integerOnly'=>true),
			array('title, cover_image, video_file, download, voted, seo_title, seo_keywords', 'length', 'max'=>100),
			array('introduce, seo_description', 'length', 'max'=>200),
			array('language, video_type, video_size, update_time, create_time', 'length', 'max'=>10),
			array('video_score', 'length', 'max'=>3),
			array('status', 'length', 'max'=>1),
			array('introduce, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, catalog_id, cover_image, video_file, language, video_type, video_score, video_size, download, introduce, update_time, create_time, view_count, down_count, voted, status, seo_title, seo_description, seo_keywords', 'safe', 'on'=>'search'),
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
	        'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name'),
	    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'              => Yii::t('model','VideoId'),
			'title'           => Yii::t('model','VideoTitle'),
			'catalog_id'      => Yii::t('model','VideoCatalog'),
			'cover_image'     => Yii::t('model','VideoCoverImage'),
			'video_file'      => Yii::t('model','VideoFile'),
			'language'        => Yii::t('model','VideoLanguage'),
			'video_type'      => Yii::t('model','VideoType'),
			'video_score'     => Yii::t('model','VideoScore'),
			'video_size'      => Yii::t('model','VideoSize'),
			'download'        => Yii::t('model','VideoDownload'),
			'introduce'       => Yii::t('model','VideoIntroduce'),			
			'update_time'     => Yii::t('model','VideoUpdateTime'),
			'create_time'     => Yii::t('model','VideoCreateTime'),
			'view_count'      => Yii::t('model','VideoViewCount'),
			'down_count'      => Yii::t('model','VideoDownCount'),
			'voted'           => Yii::t('model','VideoVoted'),
			'status'          => Yii::t('model','VideoStatus'),
			'seo_title'       => Yii::t('model','VideoSeoTitle'),
			'seo_description' => Yii::t('model','VideoSeoDescription'),
			'seo_keywords'    => Yii::t('model','VideoSeoKeywords'),
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('catalog_id',$this->catalog_id);

		$criteria->compare('cover_image',$this->cover_image,true);

		$criteria->compare('video_file',$this->video_file,true);

		$criteria->compare('language',$this->language,true);

		$criteria->compare('video_type',$this->video_type,true);

		$criteria->compare('video_score',$this->video_score,true);

		$criteria->compare('video_size',$this->video_size,true);

		$criteria->compare('download',$this->download,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('view_count',$this->view_count);

		$criteria->compare('down_count',$this->down_count);

		$criteria->compare('voted',$this->voted,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		return new CActiveDataProvider('Video', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}