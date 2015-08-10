<?php
/**
 * Resumable Widget
 *
 * @author        Sim <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved. 
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

class Resumable extends CInputWidget{
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
     *  输出插件html
     */
    protected function displayHtml() 
    {
        $upload_url = $this->options['upload_url'];        
        echo <<< EOT
        <script type="text/javascript">
            var resumable_upload_url = '{$upload_url}';
       </script>
        <div>
				 <div class="resumable-error">
        Your browser, unfortunately, is not supported by Resumable.js. The library requires support for <a href="http://www.w3.org/TR/FileAPI/">the HTML5 File API</a> along with <a href="http://www.w3.org/TR/FileAPI/#normalization-of-params">file slicing</a>.
      </div>

      <div class="resumable-drop" ondragenter="jQuery(this).addClass('resumable-dragover');" ondragend="jQuery(this).removeClass('resumable-dragover');" ondrop="jQuery(this).removeClass('resumable-dragover');">
        拖拽文件到此处或者 <a href="javascript:;" class="resumable-browse"><u>选择文件</u></a>
      </div>
      
      <div class="resumable-progress">
        <table>
          <tr>
            <td width="100%"><div class="progress-container"><div class="progress-bar"></div></div></td>
            <td class="progress-text" nowrap="nowrap"></td>
            <td class="progress-pause" nowrap="nowrap">
              <a href="#" onclick="r.upload(); return(false);" class="progress-resume-link"><img src="images/resume.png" title="Resume upload" /></a>
              <a href="#" onclick="r.pause(); return(false);" class="progress-pause-link"><img src="images/pause.png" title="Pause upload" /></a>
            </td>
          </tr>
        </table>
      </div>
      
      <ul class="resumable-list"></ul> 
EOT;
    }
    /**
	 * 运行
	 */
	public function run() {
		parent::run();		
		$assets = $this->getAssetsPath();
        $this->displayHtml();
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerCssFile( $assets.'/default.css' );		
		$clientScript->registerScriptFile( $assets.'/resumable.js', CClientScript::POS_END );
        $clientScript->registerScriptFile( $assets.'/upload.js', CClientScript::POS_END );		
	}
}
