<?php

/**
 * This is the model class for table "{{album}}".
 *
 * The followings are the available columns in table '{{album}}':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $title_second
 * @property string $title_style
 * @property integer $catalog_id
 * @property integer $special_id
 * @property string $copy_from
 * @property string $copy_url
 * @property string $redirect_url
 * @property string $tags
 * @property string $view_count
 * @property string $commend
 * @property string $attach_file
 * @property string $attach_thumb
 * @property string $favorite_count
 * @property string $top_line
 * @property string $reply_count
 * @property string $reply_allow
 * @property string $sort_order
 * @property string $status
 * @property string $create_time
 * @property string $update_time
 */
class Album extends CActiveRecord
{
	const STATUS_SHOW = 'Y'; //显示
	const STATUS_HIDE = 'N'; //隐藏

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{album}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('catalog_id, special_id', 'numerical', 'integerOnly'=>true),
			array('user_id, view_count, favorite_count, reply_count, sort_order, create_time, update_time', 'length', 'max'=>10),
			array('title, title_second, title_style, copy_url, redirect_url, tags, attach_file, attach_thumb', 'length', 'max'=>255),
			array('copy_from', 'length', 'max'=>100),
			array('commend, top_line, reply_allow, status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, title, title_second, title_style, catalog_id, special_id, copy_from, copy_url, redirect_url, tags, view_count, commend, attach_file, attach_thumb, favorite_count, top_line, reply_count, reply_allow, sort_order, status, create_time, update_time', 'safe', 'on'=>'search'),
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
            'catalog' => array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name,type'),
            'content' => array(self::HAS_ONE, 'AlbumContent', 'album_id'),
		);
	}
    
    /**
     * 保存前校验或者整理数据
     * 
     * @return boolean
     */
    public function beforeSave()
    {
        if($this->catalog_id <= 0) {
            $this->addError('catalog_id', Yii::t('admin', 'Catalog Is Required'));
            return false;
        }
        if($this->tags) {            		
    		$unique_tags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $this->tags)));    		
    		$explodeTags = array_slice($unique_tags, 0, 5);  
    		$this->tags = implode(',',$explodeTags);
        }
        if($this->isNewRecord) {            
    		$this->create_time = time();
    		$this->update_time = $this->create_time;
        } else {
            $this->update_time = time();
        }
        return true;
    }
    
    /**
     * 保存之后处理
     * 
     * @return boolean
     */
    public function afterSave()
    {
        $explodeTags = explode(',', $this->tags);
        $type = ModelType::model()->findByAttributes(array('type_key' => 'album'));
        $type_id = $type ? $type->id : 1;
        //更新标签数据
        Tag::model()->updateTagData($explodeTags, array('content_id'=>$this->id, 'status'=>$this->status, 'type_id'=> $type_id));
        return true;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(			
            'id'                => Yii::t('model','ImageId'),
			'user_id'           => Yii::t('model','ImageUserId'),		
			'title'             => Yii::t('model','ImageTitle'),
			'title_second'      => Yii::t('model','ImageTitleSecond'),			
			'title_style'       => Yii::t('model','ImageTitleStyle'),	
			'catalog_id'        => Yii::t('model','ImageCatalogId'),
			'special_id'        => Yii::t('model','ImageSpecialId'),			
			'copy_from'         => Yii::t('model','ImageCopyFrom'),
			'copy_url'          => Yii::t('model','ImageCopyUrl'),
			'redirect_url'      => Yii::t('model','ImageRedirectUrl'),
			'tags'              => Yii::t('model','ImageTags'),
			'view_count'        => Yii::t('model','ImageViewCount'),
			'commend'           => Yii::t('model','ImageCommend'),			
			'attach_file'       => Yii::t('model','ImageAttachFile'),
			'attach_thumb'      => Yii::t('model','ImageAttachThumb'),
			'favorite_count'    => Yii::t('model','ImageFavoriteCount'),
			'top_line'          => Yii::t('model','ImageTopLine'),			
			'reply_count'       => Yii::t('model','ImageReplyCount'),
			'reply_allow'       => Yii::t('model','ImageReplyAllow'),
			'sort_order'        => Yii::t('model','ImageSortOrder'),			
			'status'            => Yii::t('model','ImageStatus'),
			'create_time'       => Yii::t('model','ImageCreateTime'),
            'update_time'       => Yii::t('model','ImageUpdateTime'),
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

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('title_second',$this->title_second,true);

		$criteria->compare('title_style',$this->title_style,true);

		$criteria->compare('catalog_id',$this->catalog_id);

		$criteria->compare('special_id',$this->special_id);

		$criteria->compare('copy_from',$this->copy_from,true);

		$criteria->compare('copy_url',$this->copy_url,true);

		$criteria->compare('redirect_url',$this->redirect_url,true);

		$criteria->compare('tags',$this->tags,true);

		$criteria->compare('view_count',$this->view_count,true);

		$criteria->compare('commend',$this->commend,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('favorite_count',$this->favorite_count,true);

		$criteria->compare('top_line',$this->top_line,true);

		$criteria->compare('reply_count',$this->reply_count,true);

		$criteria->compare('reply_allow',$this->reply_allow,true);

		$criteria->compare('sort_order',$this->sort_order,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider('Album', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Album the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
	 * 获取一定条件下的图集
	 * @param array $params = ('condition'=> '额外条件', 'order'=>'排序', 'with'=>'关联表', 'limit'=>'条数', 'page'=>'是否分页')
	 * @param $pages 分页widget
	 * @return array
	 */
	public static function getList($params = array(), &$pages = null){
		$data = array();
		$pages = array();
        
        $params['condition'] = isset($params['condition'])?$params['condition']:'';
        $params['order']     = isset($params['order'])?$params['order']:'';
        $params['with']      = isset($params['with'])?$params['with']:'';
        $params['limit']     = isset($params['limit'])?$params['limit']:'';
        $params['page']      = isset($params['page'])?$params['page']:'';
        
		//组合条件
		$criteria = new CDbCriteria();
		$criteria->condition = 't.status=:status AND t.attach_thumb != ""';
		$params['condition'] && $criteria->condition .= $params['condition'];
		$criteria->order = $params['order']?$params['order']:'t.id DESC';
		$criteria->with = array ( 'catalog' );
		$criteria->select = "t.title, t.id, t.tags, t.attach_thumb, ";
		$criteria->select .= " t.copy_from, t.copy_url, t.update_time, t.view_count";
		$criteria->params = array(':status'=> 'Y');
		if($params['with'] == 'content') {
            $criteria->with = array('catalog', 'content');            
        }
	
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
	
		$res = self::model()->findAll($criteria);
        if($res) {
            $data = $res;
        }
		return $data;
	}
}