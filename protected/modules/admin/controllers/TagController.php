<?php
/**
 * 标签管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class TagController extends Backend
{	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
	}
   
    /**
     * 标签管理
     *
     */
    public function actionIndex() {
        $model = new Tag();
        $criteria = new CDbCriteria();
        $condition = '1';
        $tagName = $this->_request->getParam( 'tagName' );
        $tagName && $condition .= ' AND tag_name LIKE \'%' . $tagName . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition( $_GET, array ( 'tagName') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }
    
    /**
     * 
     * 重新统计标签，删除不匹配的标签
     * 
     */
    public function actionReset(){
    	$tags = Tag::model()->findAll();
    	foreach((array) $tags as $tag){    		
    		$post = Post::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));   
    		$image = Image::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));
    		if(!$post && !$image){
    			$tag->delete();
    		}else{
    			$tag->data_count = count($post) + count($image);
    			$tag->save();
    		}
    	}
    	$this->message('success',Yii::t('admin','Reset Tags Success'),$this->createUrl('index'));
    }

}
