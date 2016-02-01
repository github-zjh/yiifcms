<?php

/**
 * This is the model class for table "{{album_content}}".
 *
 * The followings are the available columns in table '{{album_content}}':
 * @property string $album_id
 * @property string $album_list
 * @property string $introduce
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class AlbumContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{album_content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_list, introduce, content, seo_description', 'safe'),
			array('album_id', 'length', 'max'=>10),
			array('seo_title, seo_keywords', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('album_id, album_list, introduce, content, seo_title, seo_keywords, seo_description', 'safe', 'on'=>'search'),
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
			'album_id'          => Yii::t('model','AlbumId'),			
            'introduce'         => Yii::t('model','ImageIntroduce'),
			'album_list'        => Yii::t('model','ImageList'),
			'seo_title'         => Yii::t('model','ImageSeoTitle'),
            'seo_keywords'      => Yii::t('model','ImageSeoKeywords'),
			'seo_description'   => Yii::t('model','ImageSeoDescription'),			
			'content'           => Yii::t('model','ImageContent'),
		);
	}
    
    /**
     * 截取简要
     * 
     * @return boolean
     */
    public function beforeSave()
    {
        if(!$this->introduce) {
            $this->introduce = Helper::truncate_utf8_string(preg_replace('/\s+/',' ', $this->content), 180);
        }
        $this->introduce = trim($this->introduce);
        return true;
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

		$criteria->compare('album_id',$this->album_id,true);

		$criteria->compare('album_list',$this->album_list,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		return new CActiveDataProvider('AlbumContent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return AlbumContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}