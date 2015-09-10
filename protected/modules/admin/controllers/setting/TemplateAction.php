<?php
/**
 * 模板设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class TemplateAction extends CAction
{	
	public function run(){		
        if(isset($_POST['Setting']) && $_POST['Setting']) {
            $this->controller->updateData($_POST['Setting'], 'template');            
        } else {
            //主题列表		
            $themes_path = dirname(Yii::app()->theme->basePath);		
            if(is_dir($themes_path) && $handle = opendir($themes_path)){
                while(false !== ($file = readdir ( $handle ))){
                    if($file != "." && $file != ".."&&!strpos($file,".")){
                        //只读取文件夹目录
                        $themes[] = $file;
                    }
                }
            }
            $this->controller->render('template', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'template')), 'themes'=>$themes));
        }		
	}
}