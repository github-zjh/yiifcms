<?php

/**
 * This is the model class for table "{{soft}}".
 *
 * The followings are the available columns in table '{{soft}}':
 * @property integer $id
 * @property string $title
 * @property integer $catalog_id
 * @property string $soft_icon
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
 * @property integer $view_count
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
			array('catalog_id, view_count, down_count', 'numerical', 'integerOnly'=>true),
			array('pay', 'numerical'),
			array('title, cover_image, soft_icon, os, softlink', 'length', 'max'=>100),
			array('fileid, seo_title, seo_keywords', 'length', 'max'=>255),
			array('filetype, language, softtype, softsize, update_time, create_time', 'length', 'max'=>10),
			array('softrank, status', 'length', 'max'=>1),
			array('introduce, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, catalog_id, cover_image, fileid, filetype, language, softtype, soft_icon, os, softrank, softsize, softlink, introduce, pay, update_time, create_time, view_count, down_count, status, seo_title, seo_description, seo_keywords', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model','SoftId'),
			'title' => Yii::t('model','SoftTitle'),
			'catalog_id' => Yii::t('model','SoftCatalogId'),
			'soft_icon' => Yii::t('model','SoftIcon'),
			'cover_image' => Yii::t('model','SoftCoverImage'),
			'fileid' => Yii::t('model','SoftFiledId'),
			'filetype' => Yii::t('model','SoftFileType'),
			'language' => Yii::t('model','SoftLanguage'),
			'softtype' => Yii::t('model','SoftType'),
			'os' => Yii::t('model','SoftOS'),
			'softrank' => Yii::t('model','SoftRank'),
			'softsize' => Yii::t('model','SoftSize'),
			'softlink' => Yii::t('model','SoftLink'),
			'introduce' => Yii::t('model','SoftIntroduce'),
			'pay' => Yii::t('model','SoftPay'),
			'update_time' => Yii::t('model','SoftUpdateTime'),
			'create_time' => Yii::t('model','SoftCreateTime'),
			'view_count' => Yii::t('model','ViewCount'),
			'down_count' => Yii::t('model','DownCount'),
			'status' => Yii::t('model','SoftStatus'),
			'seo_title' => Yii::t('model','SoftSeoTitle'),
			'seo_description' => Yii::t('model','SoftSeoDescription'),
			'seo_keywords' => Yii::t('model','SoftSeoKeywords'),
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
		
		$criteria->compare('soft_icon',$this->soft_icon,true);

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
		
		$criteria->compare('view_count',$this->view_count);

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
	
	/**
	 * 获取一定条件下的软件
	 * @param array $params = ('condition'=> '额外条件', 'order'=>'排序', 'with'=>'关联表', 'limit'=>'条数', 'page'=>'是否分页')
	 * @param $pages 分页widget
	 * @return array
	 */
	public static function getList($params = array(), &$pages = null){
		$data = array();
		$pages = array();
	
		//组合条件
		$criteria = new CDbCriteria();
		$criteria->condition = 't.status=:status ';
		$params['condition'] && $criteria->condition .= $params['condition'];
		$criteria->order = $params['order']?$params['order']:'t.id DESC';
		$criteria->with = array ( 'catalog' );
		$criteria->select = "t.title, t.id, t.soft_icon, t.cover_image,";
		$criteria->select .= "  t.update_time,t.introduce, t.view_count, t.down_count";
		$criteria->params = array(':status'=> 'Y');
		$params['with'] && $criteria->with = (array)$params['with'];
	
		$limit = $params['limit']>0?intval($params['limit']):15;
		//是否分页
		if($params['page']){
			//分页
			$count = self::model()->count( $criteria );
			$pages = new CPagination( $count );
			$pages->pageSize = $limit;
			$criteria->limit = $pages->pageSize;
			$criteria->offset = $pages->currentPage * $pages->pageSize;
		}else{
			$criteria->limit = $limit;
		}
	
		$data = self::model()->findAll($criteria);
		return $data;
	}
}