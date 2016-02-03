<?php
/**
 * 生成网站地图组件
 * @author zhao jinhan <326196998@qq.com>
 * @version 1.0
 *
 */
class Sitemap extends CController{
	
    protected $webSiteTitle = '';
    protected $changefreq = '';
    protected $content = '';
    protected $priority = '';
    protected $postItems = array();
    protected $imageItems = array();
    protected $softItems = array();
    protected $downloadItems = array();
    protected $tagItems = array();
    protected $categoryItems = array();
    protected $items = array();
    
    /**
     * 添加基本信息
     * @param string $title
     * @param string $link
     * @param string $description
     */
    public function __construct() {        
       	$this->webSiteTitle = Yii::app()->request->hostinfo;       	
       	$this->changefreq = 'weekly'; //always hourly daily weekly monthly yearly never
       	$this->priority = 0.5;
   	}
   	  

    /**
     * 栏目分类
     */
    private function categorySitemap(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params = array(':status'=>'Y');
        $criteria->order = 'id ASC';
        $result = Catalog::model()->findAll($criteria);

        foreach($result as $k=>$v){
        	switch($v->type){
        		case 1:
        			$type = 'post';
        			break;
        		case 2:
        			$type = 'image';
        			break;
        		case 3:
        			$type = 'soft';
        	}
            $this->categoryItems[] = array(            	
                'url'=>$this->createUrl($type.'/index',array('catalog_id'=>$v->id)),
                'date'=>date(DATE_W3C, $v->update_time)
            );
        }
    }

    /**
     * 文章
     */
    private function postSitemap(){
        $criteria = new CDbCriteria();
        $criteria->condition = "status = 'Y'";
        $criteria->select = 'id, update_time';
        $criteria->order = 'id DESC';
        $model = Post::model()->findAll($criteria);        
        foreach($model as $v){
            $this->postItems[] = array(
                'url'=>$this->createUrl('post/view', array('id'=>$v->id)),
                'date'=>date(DATE_W3C, $v->update_time)
            );
		}
    }

	/**
	  *	
	  * tag
      *
	  */
	private function tagSitemap(){
        $criteria = new CDbCriteria();
		$criteria->condition = "status = 'Y'";
        $criteria->select = 'tag_id, count(tag_id) as count_tag';
		$criteria->group = 'tag_id';
        $criteria->order = 'count_tag DESC';
		$model = TagData::model()->findAll($criteria);
		foreach($model as $v){
			$tag_id = $v->tag_id;
			$tag = Tag::model()->findByPk($tag_id);
            if(!$tag) {
                continue;
            }
			$this->tagItems[] = array(
					'url'=>$this->createUrl('tag/index', array('tag_name'=>$tag->tag_name)),
					'date'=>date(DATE_W3C, time())
				);
		}
		$this->tagItems[] = array('url'=>$this->createUrl('tag/all'), 'date'=>date(DATE_W3C, time()));
	}
    
    /**
     * 图集
     */
    private function imageSitemap(){
    	$criteria = new CDbCriteria();
    	$criteria->condition = "status = 'Y'";
    	$criteria->select = 'id, update_time';
    	$criteria->order = 'id DESC';
    	$model = Album::model()->findAll($criteria);
    	foreach($model as $v){
    		$this->imageItems[] = array(
    				'url'=>$this->createUrl('album/view', array('id'=>$v->id)),
    				'date'=>date(DATE_W3C, $v->update_time)
    		);
    	}   

	}
    
    /**
     * 
     * 下载
     */  
    private function downloadSitemap(){
    	$criteria = new CDbCriteria();
    	$criteria->condition = "status = 'Y'";
    	$criteria->select = 'id, update_time';
    	$criteria->order = 'id DESC';
    	$model = Soft::model()->findAll($criteria);
    	foreach($model as $v){
    		$this->downloadItems[] = array(
    				'url'=>$this->createUrl('soft/view', array('id'=>$v->id)),
    				'date'=>date(DATE_W3C, $v->update_time)
    		);
    		
    	}
    
    }


    /**
     * 构建xml元素
     */
    public function buildSitemap() {
        $formatXml = function($array) {
            $item = '';
            foreach($array as $v) {
                $url = htmlspecialchars($this->webSiteTitle.$v['url']);
                $item .= "<url>\r\n"
                    . "<loc>{$url}</loc>\r\n"
                    . "<lastmod>{$v['date']}</lastmod>\r\n"
                    . "<changefreq>{$this->changefreq}</changefreq>\r\n"
                    . "<priority>{$this->priority}</priority>\r\n"
                    . "</url>\r\n";                        
            }
          return $item;
        };
        $allitem = $formatXml($this->postItems)
              . $formatXml($this->downloadItems)
              . $formatXml($this->categoryItems)
              . $formatXml($this->imageItems)
              . $formatXml($this->tagItems);
             
        $this->content = <<<SITEMAP
<?xml version='1.0' encoding='UTF-8'?>\r\n
<?xml-stylesheet type="text/xsl" href="{$this->webSiteTitle}{$this->createUrl('site/sitemapxsl')}"?>
<!-- generator="GoWhich/1.0" -->
<!-- sitemap-generator-url="{$this->webSiteTitle}" sitemap-generator-version="1.0.0" -->
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"\r\n
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"\r\n
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\r\n
            {$allitem}
</urlset>\r\n
SITEMAP;
            return;
   	}

  /**
   * 输出sitemap内容
   */
  function show() {
        $this->postSitemap();
        $this->downloadSitemap();
        $this->tagSitemap();
        $this->categorySitemap();
        $this->imageSitemap();        
    	if (empty($this->content)) {
    		$this->buildSitemap();           
    	}
       	return $this->content;
  }


  /**
   * 将rss保存为文件
   * @param String $fname
   * @return boolean
   */
   	function saveToFile($fname) {
       	$handle = fopen($fname, 'wb');
       	if ($handle === false){
       		return false;
       	}
       	fwrite($handle, $this->content);
       	fclose($handle);
   	}

   	/**
   	 * 获取文件的内容
   	 * @param String $fname
   	 * @return boolean
   	 */
   	function getFile($fname) {
       	$handle = fopen($fname, 'r');
       	if ($handle === false){
       		return false;
       	}
    	while(!feof($handle)){
            echo fgets($handle);
    	}
       	fclose($handle);
   	}
}
?>
