<?php

/**
 * This is the model class for table "{{Catalog}}".
 *
 * The followings are the available columns in table '{{Catalog}}':
 * @property string $id
 * @property string $parent_id
 * @property string $catalog_name 
 * @property string $content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $attach_file
 * @property string $attach_thumb
 * @property string $sort_order
 * @property string $data_count
 * @property string $status
 * @property string $redirect_url
 * @property string $type
 * @property string $create_time
 * @property string $update_time
 */
class Catalog extends CActiveRecord
{
	public $level;
	public $str_repeat;
	public $type_key;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{catalog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catalog_name, type', 'required'),			
			array('parent_id, sort_order, data_count, create_time, update_time', 'length', 'max'=>10),
			array('catalog_name, seo_title, attach_file, attach_thumb', 'length', 'max'=>100),
			array('seo_keywords, redirect_url', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),			
			array('content, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, type, catalog_name, content, seo_title, seo_keywords, seo_description, attach_file, attach_thumb, sort_order, data_count, status, redirect_url, type, create_time, update_time', 'safe', 'on'=>'search'),
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
			'content' => Yii::t('model','content'),
			'seo_title' => Yii::t('model','seo_title'),
			'seo_keywords' => Yii::t('model','seo_keywords'),
			'seo_description' => Yii::t('model','seo_description'),
			'attach_file' => Yii::t('model','attach_file'),
			'attach_thumb' => Yii::t('model','attach_thumb'),
			'sort_order' => Yii::t('model','sort_order'),
			'data_count' => Yii::t('model','data_count'),		
			'status' => Yii::t('model','status_is'),
			'redirect_url' => Yii::t('model','redirect_url'),
			'type' => Yii::t('model','catalog_type'),			
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

		$criteria->compare('content',$this->content,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('data_count',$this->data_count,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('redirect_url',$this->redirect_url,true);

		$criteria->compare('type',$this->type,true);

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
	 * 父级分类不能和本分类相同
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave(){
		if(!$this->isNewRecord){
			if($this->id == $this->parent_id){
				$this->addError('parent_id', Yii::t('admin','Parent ID can not eque itself ID'));
				return false;
			}
		}
		return true;
	}
	/**
	 * 获取某个栏目下的子孙分类
	 * @param number $id
	 */
	public static function getChildren($id = 0){		
		$data = array();
		$data['catalog'] = $catalog = self::model()->findByPk($id);
		$allcatalog = self::getCatalog($id);
		$catalog_ids = self::get($catalog?$id:0, $allcatalog);
		$children_ids = Helper::array_key_values($catalog_ids, 'id');
		$id?$all_ids = array_merge($children_ids, (array)$id):$all_ids = $children_ids;
		$data['db_in_ids'] = implode(',',$all_ids);
		return $data;		
	}
	
	/**
	 * 获取某个内容模型下的所有显示的栏目
	 * @param number $type
	 * @return array
	 */
	public static function getCatalog($type = 0){
		$data = array();
		if($type){
			$data = self::model()->findAll('status=:status AND type = :type',array(':status'=>'Y',':type'=>$type));
		}else{
			$data = self::model()->findAll('status=:status',array(':status'=>'Y'));
		}
		return $data;
	}
	
	/**
	 * 所有栏目分类
	 * @param number $parentid
	 * @param number $level
	 * @param array $array
	 * @param number $add
	 * @param string $repeat
	 * @return Ambigous <multitype:, multitype:multitype:number unknown string  >
	 */
	public static  function get($parentid = 0, $array = array(), $level = 0, $add = 2, $repeat = '&nbsp;&nbsp;') {
	
		$modelType = new ModelType();
		$str_repeat = '';
		if ($level) {
			for($j = 0; $j < $level; $j ++) {
				$str_repeat .= $repeat;
			}
		}
		$newarray = array ();
		$temparray = array ();
		
		foreach ( ( array ) $array as $v ) {
			if ($v['parent_id'] == $parentid) {
				$v['level'] = $level;
				$v['str_repeat'] = $str_repeat;
				
				//模型标示
				$typeinfo = $modelType->findByPk($v['type']);
				$v['type_key'] = $typeinfo->type_key;
				
				$newarray[] = $v;
				
				$temparray = self::get ( $v ['id'], $array, ($level + $add) );
				if ($temparray) {
					$newarray = array_merge ( $newarray, $temparray );
				}
			}
		}
		return $newarray;
	}	
	
	
}