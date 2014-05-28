	<div class="user user_edit">
		<ul class="tab_menu clear">		
			<li><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></li>
			<li><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></li>
			<li class="active"><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Base Profile');?></a></li>
			<h2><?php echo Yii::t('common','User Setting');?></h2>
		</ul>
		<h3><?php echo Yii::t('common','Base Profile');?></h3>
		<?php 
			$form=$this->beginWidget('CActiveForm',
			array('id'=>'edit_form','htmlOptions'=>array('name'=>'edit_form','enctype'=>'multipart/form-data'))); 
		?>
			<table class="base_table">
				<tr><th><?php echo $form->label($model,'username');?>：</th><td><?php echo Yii::app()->user->name;?></td></tr>
				<tr><th><?php echo $form->label($model,'email');?>：</th><td><?php echo Yii::app()->user->email;?></td></tr>
				<tr><th><?php echo $form->label($model,'nickname');?>：</th><td><?php echo $form->textField($model,'nickname');?></td></tr>
				<tr><th><?php echo $form->label($model,'sign');?>：</th><td><?php echo $form->textArea($model,'sign');?></td></tr>
				<tr><th><?php echo $form->label($model,'web');?>：</th><td><?php echo $form->textField($model,'web');?></td></tr>
				<tr><th><?php echo $form->label($model,'qq');?>：</th><td><?php echo $form->textField($model,'qq');?></td></tr>
				<tr><th><?php echo $form->label($model,'mobile');?>：</th><td><?php echo $form->textField($model,'mobile');?></td></tr>				
			</table>
			<dl class="upload_avatar">
				<dt><img id="avatar_src" width="100" height="100" alt="我的头像" src="<?php echo $model->avatar?$model->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>"></dt>
				<dd class="upload_desc clear">
					<p>上传头像</p>
					<p>仅支持JPG,PNG,GIF,BMP格式的图片</p>
					<div class="upload_btn">
						<a href="javascript:;" class="btn_text"><?php echo Yii::t('common','Upload Image');?></a>
						<input type="file" id="uploadAvatar" />
						<?php echo $form->hiddenField($model,'avatar');?>
						<div id="fileQueue" style="clear:both"></div>
						<script type="text/javascript">
						$(function(){							
							//上传
							 $('#uploadAvatar').uploadify({		 	
								    'overrideEvents':['onDialogClose','onSelectError','onUploadSuccess','onUploadError','onFallback'],  //覆盖原来的触发函数  	
							        'buttonText': '<?php echo Yii::t('common','Upload Image');?>',
							        'fileObjName': 'imgFile',
							        'method': 'post',
							        'multi': false,	        	        
									'queueID': 'fileQueue',	
							        'fileSizeLimit' : '2MB',
							        'fileTypeExts': '*.jpg;*.png;*.gif;*.bmp;',
							        'formData': {
							            'sessionId'   : '<?php echo Yii::app()->session->sessionID; ?>',
										'timestamp'   : '<?php echo time();?>',
										'token'       : '<?php echo md5('unique_salt'.time()); ?>'
							        },
							        'swf': '<?php echo $this->_baseUrl;?>/static/public/js/uploadify/uploadify.swf',
							        'uploader': '<?php echo $this->createUrl('uploadify/index',array('dir'=>'avatar','thumb'=>true));?>',	                
							       	'onSelectError':function(file, errorCode, errorMsg){
								       	var msg = '';
								     	switch(errorCode){		     		
								     		case -110:
								     			msg += "上传文件大小超过限制的"+$("#uploadFile").uploadify('settings','fileSizeLimit');
								     			break;
								     		case -130:
								     			msg += "只允许上传："+$("#uploadFile").uploadify('settings','fileTypeExts')+" 格式的文件";
								     		default:
								     			msg += "上传错误："+errorCode+" "+errorMsg;
								     			break;
								     	}
								     	$(".upload_avatar_status").show();
								     	$("#upload_msg").text(msg);
								     },			        
							        'onUploadSuccess': function(file, data, response) { 								        
							            var json = $.parseJSON(data);    
							            if (json.state == 'success') {		            
							               $("#User_avatar").val(json.thumb);
							               $("#avatar_src").attr('src',json.thumb);
							            } else {
							            	$(".upload_avatar_status").show();
									     	$("#upload_msg").text(json.message);
							            }
							        },
							        'onFallback' : function() {
							            alert('您未安装FLASH控件，无法上传！请先安装FLASH控件后再试。');
							        }
							    });
							 	
						});
						</script>
																		
					</div>				
					<span class="upload_avatar_status"><i class="ajax_loading"></i><span id="upload_msg">文件上传中...</span></span>						
				</dd>
			</dl>
			<div class="clear"></div>
			<input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" />
			
		<?php $this->endWidget();?>
	</div>
	<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/public/js/uploadify/jquery.uploadify.min.js"></script>