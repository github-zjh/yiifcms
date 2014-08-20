<?php
/**
 * YiifCMS Ueditor Widget
 *
 * @author        Sim <326196998@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.yiifcms.com
 * @package       YiiCMS.Widget
 * @license       http://www.yiifcms.com/license
 * @version       v1.0.0
 * @example 	  $this->widget('application.widget.ueditor.Ueditor',
 *				      array('htmlOptions'=>
 *	  				      array(
 *	  						'id'=>'Post_content',//页面中输入框（或其他初始化容器）的ID
 *	  						'name'=>'editor',//指定ueditor实例的名称,个页面有多个ueditor实例时使用
 *						    'config'=> array(
 *								'initialFrameHeight'=>'400',
 *								'initialFrameWidth'=>'80%',			
 *							),
 *	  				   )
 *				   )
 *	  		     );
 */

class Ueditor extends CInputWidget{
	public $language = 'zh-cn';

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
	public function makeOptions() {		
		
		$id = $this->htmlOptions['id'];
		$name = $this->htmlOptions['name'];
		$config = $this->htmlOptions['config'];
		$systemDefault = $this->combineParams( $config );
		$script = "
			var {$name} = UE.getEditor('".$id."', 
				{
				    'serverUrl': '".Yii::app()->createUrl('/admin/ueditor')."',    				
    				$systemDefault
					
				}
			);";
		return $script;
	}


	/**
	 * 组合参数
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

			$dot = ",\n";
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
		$script .=  $dot ."'$key':{";
		$subDot = '';
		foreach ( $item as $keys=>$value ) {			
			$arrkeys = array_keys($value);
			foreach($arrkeys as $row){
				$script .= $subDot. "'$row':'{$value[$row]}'";
			}
			$subDot = ",";
		}
		$script .="}";
		return $script;
	}

	/**
	 * 数组
	 */
	protected function _arr( $key, $item ) {
		$script .=  $dot ."'$key':[";
		$subDot = '';
		foreach ( $item as $value ) {
			$script .= $subDot. "'$value' ";
			$subDot = ",";
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
		$clientScript->registerScriptFile( $assets.'/ueditor.config.js', CClientScript::POS_END );		
		$clientScript->registerScriptFile( $assets.'/ueditor.all.js', CClientScript::POS_END );
		$clientScript->registerScriptFile( $assets.'/lang/'.$this->language.'/'.$this->language.'.js', CClientScript::POS_END );
		$clientScript->registerScript( 'content', $this->makeOptions(), CClientScript::POS_END );
	}
}
?>
