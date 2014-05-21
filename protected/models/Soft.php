<?php

/**
 * This is the model class for table "{{soft}}".
 *
 * The followings are the available columns in table '{{soft}}':
 * @property integer $id
 * @property string $title
 * @property integer $catalog_id
 * @property string $cover_image
 * @property string $fileid
 * @property string $filetype
 * @property string $language
 * @property string $softtype
 * @property string $os
 * @property string $softrank
 * @property string $softsize
 * @property string $softlink
 * @property string $introduce
 * @property integer $pay
 * @property string $update_time
 * @property string $create_time
 * @property integer $down_count
 * @property string $status
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 */
class Soft extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{soft}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catalog_id, pay, down_count', 'numerical', 'integerOnly'=>true),
			array('title, cover_image, os, softlink', 'length', 'max'=>100),
			array('fileid, filetype, language, softtype, softsize, update_time, create_time', 'length', 'max'=>10),
			array('softrank, status', 'length', 'max'=>1),
			array('seo_title, seo_keywords', 'length', 'max'=>255),
			array('introduce, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, catalog_id, cover_image, fileid, filetype, language, softtype, os, softrank, softsize, softlink, introduce, pay, update_time, create_time, down_count, status, seo_title, seo_description, seo_keywords', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'title' => 'Title',
			'catalog_id' => 'Catalog',
			'cover_image' => 'Cover Image',
			'fileid' => 'Fileid',
			'filetype' => 'Filetype',
			'language' => 'Language',
			'softtype' => 'Softtype',
			'os' => 'Os',
			'softrank' => 'Softrank',
			'softsize' => 'Softsize',
			'softlink' => 'Softlink',
			'introduce' => 'Introduce',
			'pay' => 'Pay',
			'update_time' => 'Update Time',
			'create_time' => 'Create Time',
			'down_count' => 'Down Count',
			'status' => 'Status',
			'seo_title' => 'Seo Title',
			'seo_description' => 'Seo Description',
			'seo_keywords' => 'Seo Keywords',
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

		$criteria->compare('fileid',$this->fileid,true);

		$criteria->compare('filetype',$this->filetype,true);

		$criteria->compare('language',$this->language,true);

		$criteria->compare('softtype',$this->softtype,true);

		$criteria->compare('os',$this->os,true);

		$criteria->compare('softrank',$this->softrank,true);

		$criteria->compare('softsize',$this->softsize,true);

		$criteria->compare('softlink',$this->softlink,true);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('pay',$this->pay);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('down_count',$this->down_count);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		return new CActiveDataProvider('Soft', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Soft the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}