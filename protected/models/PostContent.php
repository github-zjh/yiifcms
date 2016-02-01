<?php

/**
 * This is the model class for table "{{post_content}}".
 *
 * The followings are the available columns in table '{{post_content}}':
 * @property string $post_id
 * @property string $introduce
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class PostContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post_content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'safe'),
			array('post_id', 'length', 'max'=>10),
			array('introduce, seo_description', 'length', 'max'=>200),
			array('seo_title, seo_keywords', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, introduce, content, seo_title, seo_keywords, seo_description', 'safe', 'on'=>'search'),
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
			'post_id'           => Yii::t('model','PostId'),
			'introduce'         => Yii::t('model','PostIntroduce'),			
			'seo_title'         => Yii::t('model','PostSeoTitle'),
			'seo_description'   => Yii::t('model','PostSeoDescription'),
			'seo_keywords'      => Yii::t('model','PostSeoKeywords'),
			'content'           => Yii::t('model','PostContent'),
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

		$criteria->compare('post_id',$this->post_id,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		return new CActiveDataProvider('PostContent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return PostContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}