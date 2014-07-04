<?php

/**
 * This is the model class for table "{{Special}}".
 *
 * The followings are the available columns in table '{{Special}}':
 * @property string $id
 * @property string $title
 * @property string $title_alias
 * @property string $intro
 * @property string $content
 * @property string $attach_thumb
 * @property string $attach_file
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $template
 * @property string $status_is
 * @property string $sort_order
 * @property string $view_count
 * @property string $create_time
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
			array('title, title_alias, attach_thumb, attach_file, seo_title, seo_keywords, seo_description', 'length', 'max'=>255),
			array('template', 'length', 'max'=>50),
			array('status_is', 'length', 'max'=>1),
			array('sort_order, view_count, create_time', 'length', 'max'=>10),
			array('intro, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, title_alias, intro, content, attach_thumb, attach_file, seo_title, seo_keywords, seo_description, template, status_is, sort_order, view_count, create_time', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'title' => 'Title',
			'title_alias' => 'Title Alias',
			'intro' => 'Intro',
			'content' => 'Content',
			'attach_thumb' => 'Attach Thumb',
			'attach_file' => 'Attach File',
			'seo_title' => 'Seo Title',
			'seo_keywords' => 'Seo Keywords',
			'seo_description' => 'Seo Description',
			'template' => 'Template',
			'status_is' => 'Status Is',
			'sort_order' => 'Sort Order',
			'view_count' => 'View Count',
			'create_time' => 'Create Time',
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('title_alias',$this->title_alias,true);

		$criteria->compare('intro',$this->intro,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('template',$this->template,true);

		$criteria->compare('status_is',$this->status_is,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('view_count',$this->view_count,true);

		$criteria->compare('create_time',$this->create_time,true);

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