<?php
/**
 * YiifCMS KindEditor Widget
 *
 * @author        Sim <326196998@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.yiifcms.com
 * @package       YiiCMS.Widget
 * @license       http://www.yiifcms.com/license
 * @version       v1.0.0
 * @example 	  $this->widget('application.widget.kindeditor.KindEditor',
 				      'id'=>'Post_content',
	  				  'options'=>array(
					  		'uploadJson'=>$this->createUrl('/admin/uploadify/basicexecute', array('from'=>'editor')),
							'fileManagerJson'=>$this->createUrl('/admin/kindeditor/'),		
							'allowFileManager'=>true,
				  			'extraFileUploadParams'=>array('sessionId'=>Yii::app()->session->sessionID)
							)
						)
 	  		     	);
 *
 */

class KindEditor extends CInputWidget{
	public $language = 'zh_CN';
	public $id;
	public $options;

	/**
	 * 获取资源文件路径
	 *
	 * @return [type] [description]
	 */
	public function getAssetsPath() {
		$baseDir = dirname( __FILE__ );
		return Yii::app()->getAssetManager()->publish( $baseDir.DIRECTORY_SEPARATOR.'assets' );
	}

	/**
	 * 生成编辑器
	 *
	 * @return [type] [description]
	 */
	public function makeOptions($assets='') {		
		$script = 'KindEditor.ready(function(K) {';
		$id = $this->id;
		$Params = $this->_defaultParams($this->options);
		$Params .= $this->combineParams( $this->options );
						
		$editObj =  '__'.strtolower($id);
		$script .= ''.$editObj.' = K.create("#'.$id.'", {
	     '.$Params.' ,afterBlur:function(){
            this.sync();
        },
	     "emoticonsPath":"'.Yii::app()->baseUrl.'/public/emoticons/images/",
          "cssPath":"'.$assets.'/plugins/code/prettify.css?'.time().'",         
	            
	});
	'.$editObj.'.sync();	
';		
		$script .=  '});';
		return $script;
	}


	/**
	 * 设置默认参数，如果没有设置则使用默认值
	 *
	 * @return [type]        [description]
	 */
	protected function _defaultParams($items) {
		$defaultArr = array( 
				'width'=>'80%', 
				'height'=>'400px',
				'uploadJson'=>Yii::app()->createUrl('/admin/uploadify/basicexecute', array('from'=>'editor')),
				'fileManagerJson'=>Yii::app()->createUrl('/admin/kindeditor/'),		
				'allowFileManager'=>true,
				'extraFileUploadParams'=>array('sessionId'=>Yii::app()->session->sessionID)
		 );		
		foreach ( $defaultArr as $key=>$row ) {
			!isset($dot) && $dot = '';
			if ( is_array( $items ) && !empty($items)) {
				$itemKeys = array_keys( $items );
				if ( !in_array( $key, $itemKeys ) ) {
					if ( count( $itemKeys )>0 )
						$string .= $key.":'{$row}',";
					else
						$string .= $dot.$key.":'{$row}'";
				}
			}else {
				$string .= $dot.$key.":'{$row}'";
			}		
			$dot = ',';
		}
		return $string ;		
	}

	/**
	 * 组合其他参数
	 *
	 * @param [type]  $items [description]
	 * @return [type]        [description]
	 */
	protected function combineParams( $items ) {

		$script = '';
		foreach ( (array)$items as $key => $item ) {
			if ( is_array( $item ) ) {
				if ( self::_checkType( $item ) == 'arr' ) {
					$script .= $dot .self::_arr( $key, $item );
				}else {
					$script .= $dot .self::_obj($key, $item);
				}
			} else {
				$script .=  $dot ."'$key':'$item' ";
			}

			$dot = ',';
		}
		return $script;

	}

	/**
	 * 检测类型
	 */
	protected function _checkType( $var ) {

		if ( gettype( $var ) == 'array' )
			return 'arr';
		else
			return 'obj';
	}

	/**
	 * 对象
	 */
	protected function _obj( $key, $item) {
		$script .=  "'$key':{";
		$subDot = '';
		foreach ( $item as $keys=>$value ) {			
			$arrkeys = array_keys($value);
			foreach($arrkeys as $row){
				$script .= $subDot. "'$row':'{$value[$row]}'";
			}
			$subDot = ',';
		}
		$script .="}";
		return $script;
	}

	/**
	 * 数组
	 */
	protected function _arr( $key, $item ) {
		$script .=  "'$key':[";
		$subDot = '';
		foreach ( $item as $value ) {
			$script .= $subDot. "'$value' ";
			$subDot = ',';
		}
		$script .="]";
		return $script;
	}


	/**
	 * 运行
	 */
	public function run() {
		parent::run();		
		$assets = $this->getAssetsPath();			
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerCssFile( $assets.'/themes/default/default.css' );		
		$clientScript->registerScriptFile( $assets.'/kindeditor-min.js', CClientScript::POS_END );			
		$clientScript->registerScriptFile( $assets.'/lang/'.$this->language.'.js', CClientScript::POS_END );
		$clientScript->registerScript( 'content', $this->makeOptions($assets), CClientScript::POS_END );
	}
}
?>
