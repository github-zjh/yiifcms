<?php

/**
 * This is the model class for table "{{Catalog}}".
 *
 * The followings are the available columns in table '{{Catalog}}':
 * @property string $id
 * @property string $parent_id
 * @property string $catalog_name
 * @property string $layer
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $sort_order
 * @property string $status
 * @property string $type
 * @property string $create_time
 * @property string $update_time
 */
class Catalog extends CActiveRecord
{
	public $level;
	public $str_repeat;
	public $type_key;
    
    const STATUS_SHOW = 'Y';  //显示
    const STATUS_HIDE = 'N';  //隐藏 
	
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
			array('parent_id, sort_order, create_time, update_time', 'length', 'max'=>10),
			array('catalog_name, seo_title, seo_keywords, seo_description', 'length', 'max'=>100),
			array('status', 'length', 'max'=>1),            
			array('seo_title, seo_keywords, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, type, catalog_name, layer, seo_title, seo_keywords, seo_description, sort_order,status, type, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id'              => Yii::t('model','CatalogId'),
			'parent_id'       => Yii::t('model','CatalogParentId'),
			'catalog_name'    => Yii::t('model','CatalogName'),
            'layer'           => Yii::t('model','CatalogLayer'),
			'seo_title'       => Yii::t('model','CatalogSeoTitle'),
			'seo_keywords'    => Yii::t('model','CatalogSeoKeywords'),
			'seo_description' => Yii::t('model','CatalogSeoDescription'),		
			'sort_order'      => Yii::t('model','CatalogSortOrder'),			
			'status'          => Yii::t('model','CatalogStatus'),		
			'type'            => Yii::t('model','CatalogType'),			
			'create_time'     => Yii::t('model','CatalogCreateTime'),
			'update_time'     => Yii::t('model','CatalogUpdateTime'),
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
        
        $criteria->compare('layer',$this->layer,true);
		
		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('seo_description',$this->seo_description,true);
		
		$criteria->compare('sort_order',$this->sort_order,true);
		
		$criteria->compare('status',$this->status,true);

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
            //判断父级分类是否在子分类下
            $data = self::model()->findByPk($this->parent_id);            
            if($data && $data->parent_id == $this->id) {
                $this->addError('parent_id', Yii::t('admin','First Parent Category Can Not Under His Child'));
				return false;
            }
		}
        if($this->parent_id == 0 ) {
            $this->layer = 1;
        } else {
            $data = self::model()->findByPk($this->parent_id);
            $this->layer = $data->layer + 1;
        }
		return true;
	}
    
    /**
     * 获取所有顶级栏目
     * 
     * @param boolean $show 是否只取显示的数据
     * @param mixed $type  栏目类型
     * @return array 
     */
    public static function getTopCatalog($show = false, $type = false) 
    {
        $condition = array('parent_id' => 0);
        if($show) {
            $condition['status'] = self::STATUS_SHOW;
        }
        if($type) {
            $condition['type'] = $type;
        }
        $res = self::model()->findAllByAttributes($condition);
        return $res ? $res : array();
    }
	/**
	 * 获取某个分类下的子分类
     * 
	 * @param number $parent_id
     * @param mixed  $show 是否只获取显示的数据
     * @param mixed $type 模型id
	 */
	public static function getChildren($parent_id = 0, $show = false, $type = false){
        $condition = array(
            'parent_id' => $parent_id
        );
        $show && $condition['status'] = self::STATUS_SHOW;
        $type && $condition['type'] = $type;
        $data = self::model()->findAllByAttributes($condition);		
		return $data ? $data : array();		
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
     * 获取所有父级分类名称
     * 
     * @param int $id
     * @param array $catalogs
     * @return array
     */
    public static function getParantsCatalog($id = 0, &$catalogs = array())
    {
        $cur = self::model()->findByPk($id);
        if($cur) {
            if($cur->parent_id > 0) {
                $parent = self::model()->findByPk($cur->parent_id);
                $catalogs[]=$parent->catalog_name;
                self::getParantsCatalog($parent->id, $catalogs);
            }
        }
        return array_reverse($catalogs);
    }
}