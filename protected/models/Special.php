<?php

/**
 * This is the model class for table "{{special}}".
 *
 * The followings are the available columns in table '{{special}}':
 * @property string $id
 * @property string $title
 * @property string $introduce
 * @property string $img_cover
 * @property string $img_banner
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $status
 * @property string $sort_order
 * @property string $create_time
 * @property string $update_time
 */
class Special extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{special}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title, img_cover, img_banner', 'required'),
			array('title, img_cover, img_banner, seo_title, seo_keywords', 'length', 'max'=>100),
			array('introduce, seo_description', 'length', 'max'=>200),
			array('status', 'length', 'max'=>1),
			array('sort_order, create_time, update_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, introduce, img_cover, img_banner, seo_title, seo_keywords, seo_description, status, sort_order, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id'              => Yii::t('model','SpecialId'),
			'title'           => Yii::t('model','SpecialTitle'),
			'introduce'       => Yii::t('model','SpecialIntroduce'),
			'img_cover'       => Yii::t('model','SpecialImgCover'),
			'img_banner'      => Yii::t('model','SpecialImgBanner'),
			'seo_title'       => Yii::t('model','SpecialSeoTitle'),
			'seo_keywords'    => Yii::t('model','SpecialSeoKeywords'),
			'seo_description' => Yii::t('model','SpecialSeoDescription'),
			'status'          => Yii::t('model','SpecialStatus'),
			'sort_order'      => Yii::t('model','SpecialSortOrder'),
			'create_time'     => Yii::t('model','SpecialTimeCreate'),
			'update_time'     => Yii::t('model','SpecialTimeUpdate'),
		);
	}
    
    /**
	 * 新增和更新前处理逻辑
	 */
	public function beforeSave(){
		if($this->isNewRecord){
            $this->create_time  = time();
            $this->update_time  = $this->create_time;			
        } else {
            $this->update_time  = time();
        }
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

		$criteria->compare('id',$this->id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('img_cover',$this->img_cover,true);

		$criteria->compare('img_banner',$this->img_banner,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider('Special', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Special the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}