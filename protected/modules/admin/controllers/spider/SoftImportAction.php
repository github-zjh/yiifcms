<?php
/**
 *  软件采集导入
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SoftImportAction extends CAction
{	
	public function run(){        
        $model = new Soft();        
        //回跳地址
        $return_url = $this->controller->createUrl('spider/soft');        
        $ids = Yii::app()->request->getParam('ids');        
        //参数判断
        empty( $ids ) && $this->controller->message( 'error', Yii::t('admin','No Select'), $return_url );
        if(!is_array($ids)) {
            $ids = array($ids);
        }        
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);
        if(Yii::app()->request->isPostRequest) {
            $catalog_id = $_POST['Soft']['catalog_id'];
            $this->_startImport($ids, $catalog_id);            
        }
        //软件栏目
		$this->controller->_catalog = Catalog::getTopCatalog(true,$this->controller->_type_ids['soft']);
        $this->controller->render( 'softimport', array ( 'model' => $model) );
	}
    
    /**
     * 开始导入
     * 
     * @param array $ids
     */
    private function _startImport($ids = array(), $catalog_id = 0)
    {    
        $catalog = Catalog::model()->findByPk($catalog_id);
        if(!$catalog) {
            $this->controller->message('error', Yii::t('admin','Please Select Category'));
        }
        set_time_limit(3600);
        echo "<style>"
                . "body{ "
                . "font-family:Monaco, DejaVu Sans Mono, Bitstream Vera Sans Mono, Consolas, Courier New, monospace; "
                . "font-size:14px; "
                . "line-height:1.8em; "
                . "background-color:#000000; "
                . "padding:20px;"
                . "color:#FFFFFF;}"
                . "</style>";
        $spiderList = new SpiderSoftList();        
        foreach($ids as $id) {
            $spider = $spiderList->with(array('spiderset', 'content'))->findByPk($id);
            if($spider && $spider->status == SpiderSoftList::STATUS_C && $spider->content) {
                $post = new Soft();
                $postContent = new SoftContent();               
                $post->attributes = array(
                    'title'   => $spider->title,                    
                    'cover_image' => $spider->content->soft_img,
                    'soft_icon' => $spider->content->soft_icon,
                    'user_id' => 1,
                    'catalog_id' => $catalog_id,                    
                    'softlink'   => $spider->url,
                );
                $postContent->attributes = array(
                    'content' => $spider->content->content,
                );
                $spider->status = SpiderPostList::STATUS_SUCCESS;
                if($post->save() && $spider->save()) {
                    $postContent->soft_id = $post->id;
                    $postContent->save();
                    echo "<br/>--------导入<span style='color:grey'>\"{$spider->title}\"</span>完成.--------<br/>";                    
                } else {
                    $this->_stopError('导入<span style="color:grey">'.$spider->title.'</span>失败:'.  var_export($post->getErrors(), true). var_export($spider->getErrors(), true));
                }                
            } else {
                $this->_stopError('导入原数据ID['.$id.']失败!');
            }
            ob_flush();
            flush();
        }
        exit ("<br/>--------<span style='color:green'>全部导入完成</span>--------<br/>");
    }
    
    /**
     * 中断提示
     * 
     * @param string $error
     */
    private function _stopError($error = '', $finish = false)
    {
        echo "<br/><span style='color:red'>[Error]</span>{$error}";
        if(!$finish) {
            echo "<br/>--------部分导入完成--------";
        }
        exit;
    }    
}