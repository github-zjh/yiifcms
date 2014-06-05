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
			array('user_id, view_count, favorite_count, attention_count, last_update_time, reply_count, sort_desc, create_time', 'length', 'max'=>10),
			array('html_path, html_file, copy_from', 'length', 'max'=>100),
			array('title, title_second, title_style, seo_title, seo_keywords, copy_url, redirect_url, tags, attach_file, attach_thumb', 'length', 'max'=>255),
			array('commend, attach_status, top_line, reply_allow, status_is', 'length', 'max'=>1),
			array('content, intro, image_list, seo_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, title_second, title_style, html_path, html_file, catalog_id, special_id, intro, image_list, seo_title, seo_description, seo_keywords, content, copy_from, copy_url, redirect_url, tags, view_count, commend, attach_status, attach_file, attach_thumb, favorite_count, attention_count, top_line, last_update_time, reply_count, reply_allow, sort_desc, status_is, create_time', 'safe', 'on'=>'search'),
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
			'intro' => '摘要',
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
			'attention_count' => '关注次数',
			'top_line' => '头条',
			'last_update_time' => '最后更新时间',
			'reply_count' => '回复次数',
			'reply_allow' => '允许评论',
			'sort_desc' => '排序',			
			'status_is' => '新闻状态',
			'create_time' => '录入时间',
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
	 * 入库前自动处理
	 */
	public function beforeSave ()
    {
       	parent::beforeSave();
        $this->tags && $this->tags = str_replace(array ('，' , ', ' , ' ,',' ' ), ',', $this->tags);        
        return true;
    }
	
}
