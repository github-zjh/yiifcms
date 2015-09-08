<?php
/**
 * 
 * @author zhao jinhan <326196998@qq.com>
 * @link 
 *
 */
class Post extends CActiveRecord
{
	
	/**
	 * @return string 相关的数据库表的名称
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array 对模型的属性验证规则.
	 */
	public function rules()
	{
		return array(
			array('title, catalog_id', 'required'),
			array('catalog_id, special_id', 'numerical', 'integerOnly'=>true),
			array('user_id, view_count, favorite_count, update_time, reply_count, sort_desc, create_time', 'length', 'max'=>10),
			array('html_path, html_file, copy_from', 'length', 'max'=>100),
			array('title, title_second, title_style, seo_title, seo_keywords, copy_url, redirect_url, tags, attach_file, attach_thumb', 'length', 'max'=>255),
			array('commend, top_line, reply_allow, status', 'length', 'max'=>1),
			array('content, introduce, image_list, seo_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, title_second, title_style, html_path, html_file, catalog_id, special_id, introduce, image_list, seo_title, seo_description, seo_keywords, content, copy_from, copy_url, redirect_url, tags, view_count, commend, attach_file, attach_thumb, favorite_count, top_line, update_time, reply_count, reply_allow, sort_desc, status, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array 关联规则.
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
	 * @return array 自定义属性标签 (name=>label)
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
			'attach_file' => '封面大图',
			'attach_thumb' => '封面缩略图',
			'favorite_count' => '收藏次数',
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
	 * 返回指定的AR类的静态模型.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		$data = array();
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
		$criteria->select = "t.title, t.id,t.title_style, t.attach_thumb, t.image_list,";
		$criteria->select .= " t.copy_from, t.copy_url, t.update_time,t.introduce, t.tags, t.view_count";
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
