<?php

/**
 * This is the model class for table "{{Catalog}}".
 *
 * The followings are the available columns in table '{{Catalog}}':
 * @property string $id
 * @property string $parent_id
 * @property string $catalog_name
 * @property string $catalog_name_second
 * @property string $catalog_name_alias
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $attach_file
 * @property string $attach_thumb
 * @property string $sort_order
 * @property string $data_count
 * @property integer $page_size
 * @property string $status_is
 * @property string $redirect_url
 * @property string $display_type
 * @property string $template_list
 * @property string $template_show
 * @property string $create_time
 * @property string $update_time
 */
class Catalog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{Catalog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catalog_name', 'required'),
			array('page_size', 'numerical', 'integerOnly'=>true),
			array('parent_id, sort_order, data_count, create_time, update_time', 'length', 'max'=>10),
			array('catalog_name, catalog_name_second, catalog_name_alias, seo_title, attach_file, attach_thumb, template_list, template_show', 'length', 'max'=>100),
			array('seo_keywords, redirect_url', 'length', 'max'=>255),
			array('status_is', 'length', 'max'=>1),
			array('display_type', 'length', 'max'=>4),
			array('content, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, catalog_name, catalog_name_second, catalog_name_alias, content, seo_title, seo_keywords, seo_description, attach_file, attach_thumb, sort_order, data_count, page_size, status_is, redirect_url, display_type, template_list, template_show, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','catalog_id'),
			'parent_id' => Yii::t('model','parent_id'),
			'catalog_name' => Yii::t('model','catalog_name'),
			'catalog_name_second' => Yii::t('model','catalog_name_second'),
			'catalog_name_alias' => Yii::t('model','catalog_name_alias'),
			'content' => Yii::t('model','content'),
			'seo_title' => Yii::t('model','seo_title'),
			'seo_keywords' => Yii::t('model','seo_keywords'),
			'seo_description' => Yii::t('model','seo_description'),
			'attach_file' => Yii::t('model','attach_file'),
			'attach_thumb' => Yii::t('model','attach_thumb'),
			'sort_order' => Yii::t('model','sort_order'),
			'data_count' => Yii::t('model','data_count'),
			'page_size' => Yii::t('model','page_size'),
			'status_is' => Yii::t('model','status_is'),
			'redirect_url' => Yii::t('model','redirect_url'),
			'display_type' => Yii::t('model','display_type'),
			'template_list' => Yii::t('model','template_list'),
			'template_show' => Yii::t('model','template_show'),			
			'create_time' => Yii::t('model','create_time'),
			'update_time' => Yii::t('model','update_time'),
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

		$criteria->compare('parent_id',$this->parent_id,true);

		$criteria->compare('catalog_name',$this->catalog_name,true);

		$criteria->compare('catalog_name_second',$this->catalog_name_second,true);

		$criteria->compare('catalog_name_alias',$this->catalog_name_alias,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('data_count',$this->data_count,true);

		$criteria->compare('page_size',$this->page_size);

		$criteria->compare('status_is',$this->status_is,true);

		$criteria->compare('redirect_url',$this->redirect_url,true);

		$criteria->compare('display_type',$this->display_type,true);

		$criteria->compare('template_list',$this->template_list,true);

		$criteria->compare('template_show',$this->template_show,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider('Catalog', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Catalog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * 所有栏目分类
	 * @param number $parentid
	 * @param unknown $array
	 * @param number $level
	 * @param number $add
	 * @param string $repeat
	 * @return Ambigous <multitype:, multitype:multitype:number unknown string  >
	 */
	static public function get($parentid = 0, $array = array(), $level = 0, $add = 2, $repeat = '&nbsp;&nbsp;') {
	
		$str_repeat = '';
		if ($level) {
			for($j = 0; $j < $level; $j ++) {
				$str_repeat .= $repeat;
			}
		}
		$newarray = array ();
		$temparray = array ();
		foreach ( ( array ) $array as $v ) {
			if ($v ['parent_id'] == $parentid) {
				$newarray [] = array ('id' => $v ['id'], 'catalog_name' => $v ['catalog_name'], 'catalog_name_alias' => $v ['catalog_name_alias'], 'parent_id' => $v ['parent_id'], 'level' => $level, 'sort_order' => $v ['sort_order'], 'seo_keywords' => $v ['seo_keywords'], 'seo_description' => $v ['seo_description'], 'attach_file' => $v ['attach_file'], 'attach_thumb' => $v ['attach_thumb'], 'status_is' => $v ['status_is'], 'data_count' => $v ['data_count'] , 'display_type' => $v ['display_type'],'template_list' => $v ['template_list'],'template_show' => $v ['template_show'],'create_time' => $v ['create_time'], 'str_repeat' => $str_repeat, 'page_size'=>$v['page_size'] );
	
				$temparray = self::get ( $v ['id'], $array, ($level + $add) );
				if ($temparray) {
					$newarray = array_merge ( $newarray, $temparray );
				}
			}
		}
		return $newarray;
	}	
	
	
}