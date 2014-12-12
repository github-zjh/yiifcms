<?php

/**
 * This is the model class for table "{{image}}".
 *
 * The followings are the available columns in table '{{image}}':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $title_second
 * @property string $title_style
 * @property string $html_path
 * @property string $html_file
 * @property integer $catalog_id
 * @property integer $special_id
 * @property string $introduce
 * @property string $image_list
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $content
 * @property string $copy_from
 * @property string $copy_url
 * @property string $redirect_url
 * @property string $tags
 * @property string $view_count
 * @property string $commend
 * @property string $attach_status
 * @property string $attach_file
 * @property string $attach_thumb
 * @property string $favorite_count
 * @property string $top_line
 * @property string $update_time
 * @property string $reply_count
 * @property string $reply_allow
 * @property string $sort_desc
 * @property string $status
 * @property string $create_time
 */
class Image extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, catalog_id, content', 'required'),
			array('catalog_id, special_id', 'numerical', 'integerOnly'=>true),
			array('user_id, view_count, favorite_count, update_time, reply_count, sort_desc, create_time', 'length', 'max'=>10),
			array('title, title_second, title_style, seo_title, seo_keywords, copy_url, redirect_url, tags, attach_file, attach_thumb', 'length', 'max'=>255),
			array('html_path, html_file, copy_from', 'length', 'max'=>100),
			array('commend, attach_status, top_line, reply_allow, status', 'length', 'max'=>1),
			array('introduce, image_list, seo_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, title, title_second, title_style, html_path, html_file, catalog_id, special_id, introduce, image_list, seo_title, seo_description, seo_keywords, content, copy_from, copy_url, redirect_url, tags, view_count, commend, attach_status, attach_file, attach_thumb, favorite_count, top_line, update_time, reply_count, reply_allow, sort_desc, status, create_time', 'safe', 'on'=>'search'),
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
	        'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name,type'),
	    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户',		
			'title' => '标题',
			'title_second' => '副标题',			
			'title_style' => '标题样式',			
			'html_path' => 'html路径',
			'html_file' => 'html文件名',			
			'catalog_id' => '分类',
			'special_id' => '专题编号',
			'introduce' => '摘要',
			'image_list' => '组图',
			'seo_title' => 'SEO标题',
			'seo_description' => 'SEO描述',
			'seo_keywords' => 'SEO关键字',
			'content' => '内容',
			'copy_from' => '来源',
			'copy_url' => '来源url',
			'redirect_url' => '跳转URL',
			'tags' => 'tags',
			'view_count' => '查看次数',
			'commend' => '推荐',
			'attach_status' => '是否上传附件',
			'attach_file' => '附件名称',
			'attach_thumb' => '附件缩略图',
			'favorite_count' => '收藏数量',
			'top_line' => '头条',
			'update_time' => '最后更新时间',
			'reply_count' => '回复次数',
			'reply_allow' => '允许评论',
			'sort_desc' => '排序',			
			'status' => '显示状态',
			'create_time' => '添加时间',
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

		$criteria->compare('html_path',$this->html_path,true);

		$criteria->compare('html_file',$this->html_file,true);

		$criteria->compare('catalog_id',$this->catalog_id);

		$criteria->compare('special_id',$this->special_id);

		$criteria->compare('introduce',$this->introduce,true);

		$criteria->compare('image_list',$this->image_list,true);

		$criteria->compare('seo_title',$this->seo_title,true);

		$criteria->compare('seo_description',$this->seo_description,true);

		$criteria->compare('seo_keywords',$this->seo_keywords,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('copy_from',$this->copy_from,true);

		$criteria->compare('copy_url',$this->copy_url,true);

		$criteria->compare('redirect_url',$this->redirect_url,true);

		$criteria->compare('tags',$this->tags,true);

		$criteria->compare('view_count',$this->view_count,true);

		$criteria->compare('commend',$this->commend,true);

		$criteria->compare('attach_status',$this->attach_status,true);

		$criteria->compare('attach_file',$this->attach_file,true);

		$criteria->compare('attach_thumb',$this->attach_thumb,true);

		$criteria->compare('favorite_count',$this->favorite_count,true);

		$criteria->compare('top_line',$this->top_line,true);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('reply_count',$this->reply_count,true);

		$criteria->compare('reply_allow',$this->reply_allow,true);

		$criteria->compare('sort_desc',$this->sort_desc,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider('Image', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Image the static model class
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
	
		//组合条件
		$criteria = new CDbCriteria();
		$criteria->condition = 't.status=:status AND t.attach_thumb != ""';
		$params['condition'] && $criteria->condition .= $params['condition'];
		$criteria->order = $params['order']?$params['order']:'t.id DESC';
		$criteria->with = array ( 'catalog' );
		$criteria->select = "t.title, t.id, t.tags, t.attach_thumb, t.image_list,";
		$criteria->select .= " t.copy_from, t.copy_url, t.update_time,t.introduce, t.view_count";
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
