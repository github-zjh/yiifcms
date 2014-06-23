<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property string $id
 * @property string $title
 * @property string $title_second
 * @property string $title_alias
 * @property string $html_path
 * @property string $html_file
 * @property string $intro
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $template
 * @property string $attach_file
 * @property string $attach_thumb
 * @property integer $sort_order
 * @property string $view_count
 * @property string $status
 * @property string $create_time
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, title_alias, content', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('title, title_second, html_path, html_file', 'length', 'max'=>100),
			array('title_alias', 'length', 'max'=>40),
			array('seo_title, seo_keywords', 'length', 'max'=>255),
			array('template', 'length', 'max'=>30),
			array('attach_file, attach_thumb', 'length', 'max'=>60),
			array('view_count, create_time', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			array('intro, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, title_second, title_alias, html_path, html_file, intro, content, seo_title, seo_keywords, seo_description, template, attach_file, attach_thumb, sort_order, view_count, status, create_time', 'safe', 'on'=>'search'),
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
			'title_second' => 'Title Second',
			'title_alias' => 'Title Alias',
			'html_path' => 'Html Path',
			'html_file' => 'Html File',
			'intro' => 'Intro',
			'content' => 'Content',
			'seo_title' => 'Seo Title',
			'seo_keywords' => 'Seo Keywords',
			'seo_description' => 'Seo Description',
			'template' => 'Template',
			'attach_file' => 'Attach File',
			'attach_thumb' => 'Attach Thumb',
			'sort_order' => 'Sort Order',
			'view_count' => 'View Count',
			'status' => 'Status',
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

		$criteria->compare('title_second',$this->title_second,true);

		$criteria->compare('title_alias',$this->title_alias,true);

		$criteria->compare('html_path',$this->html_path,true);

		$criteria->compare('html_file',$this->html_file,true);

		$criteria->compare('intro',$this->intro,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('template',$this->template,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('sort_order',$this->sort_order);

		$criteria->compare('view_count',$this->view_count,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Page', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}