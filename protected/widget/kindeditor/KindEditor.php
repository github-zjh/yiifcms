<?php
/**
 * BageCMS KindEditor Widget
 *
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.Widget
 * @license       http://www.bagecms.com/license
 * @version       v1.0.0
 */

class KindEditor extends CInputWidget{
	public $language = 'zh_CN';
	public $target;

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
		$script = 'KindEditor.ready(function(K) {';

		foreach ( $this->target as $key=>$row ) {
			$systemDefault = $this->_defaultParams( $row );

			$combineParams= $this->combineParams( $row );

			$editObj =  strtolower( str_replace( '#', '__', $key ) );

			$script .= '
	 '.$editObj.' = K.create("'.$key.'", {
	     '.$systemDefault . $combineParams .'
	});
	'.$editObj.'.sync();
';
		}
		$script .=  '});';
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

			$dot = ',';
		}
		return $script;

	}

	/**
	 * 检测类型
	 */
	protected function _checkType( $var ) {

		if ( gettype( $var ) == 'array' )
			return 'obj';
		else
			return 'arr';
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
			$subDot = ',';
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
			$subDot = ',';
		}
		$script .="]";
		return $script;
	}

	/**
	 * 设置默认参数，如果没有设置则使用默认值
	 *
	 * @param [type]  $items [description]
	 * @return [type]        [description]
	 */
	protected function _defaultParams( $items ) {
		$defaultArr = array( 'width'=>'80%', 'height'=>'400px' );
		foreach ( $defaultArr as $key=>$row ) {

			if ( is_array( $items ) ) {
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
	 * 运行
	 */
	public function run() {
		parent::run();		
		$assets = $this->getAssetsPath();		
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerCssFile( $assets.'/themes/default/default.css' );
		$clientScript->registerScriptFile( $assets.'/kindeditor-min.js', CClientScript::POS_END );
		$clientScript->registerScriptFile( $assets.'/lang/'.$this->language.'.js', CClientScript::POS_END );
		$clientScript->registerScript( 'content', $this->makeOptions(), CClientScript::POS_END );
	}
}
?>
