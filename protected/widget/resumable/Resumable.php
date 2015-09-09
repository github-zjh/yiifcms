<?php
/**
 * Resumable Widget
 *
 * @author        Sim Zhao<326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved. 
 * @example 	    $this->widget('application.widget.resumable.Resumable',
 				      'id'=>'Post_file',
	  				  'options'=>array(
					  		'upload_url'=>$this->createUrl('post/upload'),
                            'chunk_size'=>1*1024*1024,
                            'upload_file_name' => 'filelist[]',
							)
						)
 	  		     	);
 *
 */

class Resumable extends CInputWidget{
	public $language = 'zh_CN';
	public $id;
	public $options;
    public $assets = '';

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
        //上传url
        $upload_url = $this->options['upload_url'];
        //片段大小(字节)
        $chunk_size = isset($this->options['chunk_size']) ? $this->options['chunk_size'] : 1*1024*1024;
        //一次最多上传文件数
        $max_num    = isset($this->options['max_num']) ? $this->options['max_num'] : 1; 
        //上传文件name
        $upload_file_name = isset($this->options['upload_file_name']) ? $this->options['upload_file_name'] : 'filelist[]'; 
        
        echo <<< EOT
        <script type="text/javascript">
            var resumable_upload_url = '{$upload_url}';
            var resumable_chunk_size = {$chunk_size};
            var simultaneousUploads  = {$max_num};
            var upload_file_name     = '{$upload_file_name}';
        </script>
        <div>
			<div class="resumable-error">
                抱歉，您的浏览器不支持此断点续传控件。必须依赖的库为:<a href="http://www.w3.org/TR/FileAPI/">the HTML5 File API</a> along with <a href="http://www.w3.org/TR/FileAPI/#normalization-of-params">file slicing</a>.
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
                    <a href="javascript:;" id="resume-start" class="progress-resume-link"><img src="{$this->assets}/resume.png" title="Resume upload" /></a>
                    <a href="javascript:;" id="resume-pause" class="progress-pause-link"><img src="{$this->assets}/pause.png" title="Pause upload" /></a>
                  </td>
                </tr>
              </table>
            </div>
            <!-- 进度条 -->
            <ul class="resumable-list"></ul>            
        </div>
EOT;
    }
    /**
	 * 运行
	 */
	public function run() {
		parent::run();		
		$this->assets = $assets = $this->getAssetsPath();
        $this->displayHtml();
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerCssFile( $assets.'/default.css' );		
		$clientScript->registerScriptFile( $assets.'/resumable.js', CClientScript::POS_END );
        $clientScript->registerScriptFile( $assets.'/upload.js', CClientScript::POS_END );		
	}
}
