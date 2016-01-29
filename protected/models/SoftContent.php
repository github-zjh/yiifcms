<?php

/**
 * This is the model class for table "{{soft_content}}".
 *
 * The followings are the available columns in table '{{soft_content}}':
 * @property integer $soft_id
 * @property string $soft_file
 * @property string $introduce
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class SoftContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{soft_content}}';
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
			array('soft_id', 'numerical', 'integerOnly'=>true),
			array('soft_file, seo_title, seo_keywords', 'length', 'max'=>100),
			array('introduce, seo_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('soft_id, soft_file, introduce, content, seo_title, seo_keywords, seo_description', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'soft_id'         => Yii::t('model','SoftId'),
			'soft_file'       => Yii::t('model','SoftFile'),	
			'content'         => Yii::t('model','SoftContent'),
			'introduce'       => Yii::t('model','SoftIntroduce'),
			'seo_title'       => Yii::t('model','SoftSeoTitle'),
			'seo_description' => Yii::t('model','SoftSeoDescription'),
			'seo_keywords'    => Yii::t('model','SoftSeoKeywords'),
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

		$criteria->compare('soft_id',$this->soft_id);

		$criteria->compare('soft_file',$this->soft_file,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		return new CActiveDataProvider('SoftContent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return SoftContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}