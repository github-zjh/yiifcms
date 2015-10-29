<?php
/**
 *  获取最新cms版本信息
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class VersionAction extends CAction
{	
	public function run(){
		$this->controller->layout = false;		
		$cms = unserialize(base64_decode(trim(Yii::app()->request->getParam('cms'))));
				
		//最新发布版本
		$newCMS = array('version'=>$this->controller->_cmsVersion, 'release'=>$this->controller->_cmsRelease);
		if($cms != $newCMS) {
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '<span style="color:#F00; font-weight:bold">发现新版本，涉及重要更新，务必升级：{$newCMS['version']} {$newCMS['release']} <a href="http://www.yiifcms.com/soft/index/cat_11/" target="_blank">下载</a></span>';
EOT;			
		} else {
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '{$newCMS['version']} {$newCMS['release']}';
EOT;
		}
		echo $html;      
	}
}