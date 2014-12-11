<?php 
/**
 * 简单弹窗效果,  控制器需输出$dialog_message 和 $return_url
 * @author zhao jinhan <qq:326196998>
 * 
 */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'ajax_dialog',//弹窗ID
		// additional javascript options for the dialog plugin
		'options'=>array(//传递给JUI插件的参数
				'title'=>'温馨提示',
				'autoOpen'=>true, //是否自动打开				
				'buttons'=>array(
					'关闭'=>'js:function(){ 
						$(this).dialog("close");
						window.location.href="'.$return_url.'"; //关闭后跳转
					}',//关闭按钮
				),

		),
));

echo $dialog_message;

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>