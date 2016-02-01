<?php

/**
 * This is the model class for table "{{video}}".
 *
 * The followings are the available columns in table '{{video}}':
 * @property integer $id
 * @property string $title
 * @property integer $catalog_id
 * @property string $cover_image
 * @property string $language
 * @property string $video_type
 * @property string $video_score
 * @property string $video_size
 * @property string $download
 * @property string $update_time
 * @property string $create_time
 * @property integer $view_count
 * @property integer $down_count
 * @property string $voted
 * @property string $status
 * @property string $tags
 */
class Video extends CActiveRecord
{
    const STATUS_SHOW = 'Y'; //显示
    const STATUS_HIDE = 'N'; //隐藏
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{video}}';
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
			array('catalog_id, view_count, down_count', 'numerical', 'integerOnly'=>true),
			array('title, cover_image, download, voted, tags', 'length', 'max'=>100),			
			array('language, video_type, video_size, update_time, create_time', 'length', 'max'=>10),
			array('video_score', 'length', 'max'=>3),
			array('status', 'length', 'max'=>1),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, catalog_id, cover_image, language, video_type, video_score, video_size, download, update_time, create_time, view_count, down_count, voted, status, tags', 'safe', 'on'=>'search'),
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
	        'catalog' => array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name'),
            'content' => array(self::HAS_ONE, 'VideoContent', 'video_id'),
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
        $type = ModelType::model()->findByAttributes(array('type_key' => 'video'));
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
			'id'              => Yii::t('model','VideoId'),
			'title'           => Yii::t('model','VideoTitle'),
			'catalog_id'      => Yii::t('model','VideoCatalog'),
			'cover_image'     => Yii::t('model','VideoCoverImage'),			
			'language'        => Yii::t('model','VideoLanguage'),
			'video_type'      => Yii::t('model','VideoType'),
			'video_score'     => Yii::t('model','VideoScore'),
			'video_size'      => Yii::t('model','VideoSize'),
			'download'        => Yii::t('model','VideoDownload'),				
			'update_time'     => Yii::t('model','VideoUpdateTime'),
			'create_time'     => Yii::t('model','VideoCreateTime'),
			'view_count'      => Yii::t('model','VideoViewCount'),
			'down_count'      => Yii::t('model','VideoDownCount'),
			'voted'           => Yii::t('model','VideoVoted'),
			'status'          => Yii::t('model','VideoStatus'),
            'tags'            => Yii::t('model','VideoTags'),			
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

		$criteria->compare('language',$this->language,true);

		$criteria->compare('video_type',$this->video_type,true);

		$criteria->compare('video_score',$this->video_score,true);

		$criteria->compare('video_size',$this->video_size,true);

		$criteria->compare('download',$this->download,true);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('view_count',$this->view_count);

		$criteria->compare('down_count',$this->down_count);

		$criteria->compare('voted',$this->voted,true);

		$criteria->compare('status',$this->status,true);
        
        $criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider('Video', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
	 * 获取一定条件下的文章
	 * @param array $params = ('condition'=> '额外条件', 'order'=>'排序', 'with'=>'关联表', 'limit'=>'条数', 'page'=>'是否分页')
	 * @param $pages 分页widget
	 * @return array
	 */
	public static function getList($params = array(), &$pages = null){
		
		$pages = array();
        
        $params['condition'] = isset($params['condition'])?$params['condition']:'';
        $params['order']     = isset($params['order'])?$params['order']:'';
        $params['with']      = isset($params['with'])?$params['with']:'';
        $params['limit']     = isset($params['limit'])?$params['limit']:'';
        $params['page']      = isset($params['page'])?$params['page']:'';
		
		//组合条件
		$criteria = new CDbCriteria();
		$criteria->condition = 't.status=:status';
		$params['condition'] && $criteria->condition .= $params['condition'];		
		$criteria->order = $params['order']?$params['order']:'t.id DESC';
		$criteria->with = array ( 'catalog' );
		$criteria->select = "t.title, t.id, t.update_time, t.tags, t.view_count, t.cover_image, t.video_score";		
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
		
		$data = self::model()->findAll($criteria);					
		return $data ? $data : array();
	}
}