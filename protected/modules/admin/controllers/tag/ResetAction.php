<?php
/**
 *  重新统计标签数据
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class ResetAction extends CAction
{	
	public function run(){
        $tags = Tag::model()->findAll();
        if($tags) {
            foreach( $tags as $tag){    		
                $post  = Post::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));   
                $image = Album::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));
                $soft  = Soft::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));
                $video = Video::model()->findAll("FIND_IN_SET(:tag, tags)", array(':tag'=>$tag->tag_name));
                if(!$post && !$image && !$soft && !$video){
                    $tag->delete();
                } else {
                    $tag->data_count = count($post) + count($image) + count($soft);
                    $tag->save();
                }
            }
        }
        $tagdatas = TagData::model()->findAll();
        if($tagdatas) {
            foreach($tagdatas as $value) {
                $modelType = ModelType::model()->findByPk($value->type);
                $model = $modelType->model;                
                $data = $model::model()->findByPk($value->content_id);
                if(!$data) {
                    $value->delete();
                }
            }            
        }
    	$this->controller->message('success',Yii::t('admin','Reset Tags Success'),$this->controller->createUrl('index'));
	}
}