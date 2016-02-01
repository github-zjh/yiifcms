<?php
/**
 *  文章采集编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class PostUpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadPostModel();
        if ( isset( $_POST['SpiderPostList'] ) ) {
            $model->attributes = $_POST['SpiderPostList'];
            $model->content->content = $_POST['SpiderPostContent']['content'];            
            if ( $model->save() && $model->content->save()) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('post'));
            }
        }
        $this->controller->render( 'postupdate', array ( 'model' => $model ) );
	}
}