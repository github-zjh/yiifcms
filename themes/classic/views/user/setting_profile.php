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
				<div class="upload_cut_box"><img width="300" heigth="300" src="<?php echo $this->_stylePath.'/images/avatar_cut_box.jpg';?>" id="cropbox" /></div>
				<dt class="upload_desc">					
					<img id="avatar_src" width="100" height="100" alt="我的头像" src="<?php echo $model->avatar?$model->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>">
				</dt>
				<dd class="upload_desc clear">
					<p>上传头像</p>
					<p>仅支持JPG,PNG,GIF,BMP格式的图片,<br/>大小不小于100*100。</p>
					<div class="upload_btn">
						<a href="javascript:;" class="btn_text"><?php echo Yii::t('common','Upload Image');?></a>
						<input type="file" id="uploadAvatar" />
						<?php echo $form->hiddenField($model,'avatar');?>
						<input type="hidden" id="tmpFile" />
						<div id="fileQueue" style="clear:both"></div>
						<script type="text/javascript">
						$(function(){							
							//上传
							 $('#uploadAvatar').uploadify({		 	
								    'overrideEvents':['onDialogClose','onSelectError','onUploadSuccess','onUploadError','onFallback'],  //覆盖原来的触发函数  	
							        'buttonText': '<?php echo Yii::t('common','Upload Image');?>',
							        'fileObjName': 'avatar',
							        'method': 'post',
							        'multi': false,	        	        
									'queueID': 'fileQueue',	
							        'fileSizeLimit' : '2MB',
							        'queueSizeLimit' : 1,
							        'uploadLimit':1,
							        'fileTypeExts': '*.jpg;*.png;*.gif;*.bmp;',
							        'formData': {
							            'sessionId'   : '<?php echo Yii::app()->session->sessionID; ?>',
										'timestamp'   : '<?php echo time();?>',
										'token'       : '<?php echo md5('unique_salt'.time()); ?>'
							        },
							        'swf': '<?php echo $this->_baseUrl;?>/static/public/js/uploadify/uploadify.swf',
							        'uploader': '<?php echo $this->createUrl('uploadify/avatar');?>',	                
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
								     'onUploadStart' : function(file) {
								    	 $(".upload_avatar_status").show();	
								    	 $("#upload_msg").text('文件上传中...');
								     }, 								        
							        'onUploadSuccess': function(file, data, response) {								       								        
							            var json = $.parseJSON(data);  
							            if (json.state == 'success') {		   
							               $(".upload_avatar_status").show().html('上传成功').css('color',"#F00");         
							               $("#tmpFile").val(json.file);
							               $("#cropbox").attr('src',json.file);

							               //加载上传的图片
							               $('#cropbox').Jcrop({
											      aspectRatio: 1,
											      onSelect: updateCoords,
											      minSize:   [ 100, 100],
											      maxSize:   [ 100, 100]						     
											});
												               
							            } else {							            	
									     	$("#upload_msg").text(json.message);
							            }
							        },
							        'onFallback' : function() {
							            alert('您未安装FLASH控件，无法上传！请先安装FLASH控件后再试。');
							        }
							    });
							 	
						});

						//裁剪图片
						$(function(){						   
						    $("#submit_cut").click(function(){
							    var file = $("#tmpFile").val();
							    if(file){
							    var x = parseInt($('#x').val());
							    var y = parseInt($('#y').val());
							    var w = parseInt($('#w').val());
							    var h = parseInt($('#h').val());
						    	 if (w>0) {
									$.post("<?php echo $this->createUrl('uploadify/submitCut');?>",{'file':file,'x':x,'y':y,'w':w,'h':h},
									 function(data){
										if(data.state == 'success'){
											$("#User_avatar").val(data.avatar);											
											$("#avatar_src").attr('src',data.avatar+'?r='+Math.random()); //防止浏览器缓存
											$(".upload_avatar_status").show().html('剪切成功').css('color',"#F00");										    	
										}else{
											$("#upload_msg").text(data.message);
										}
									},'json');

						    	 }else{
						    	  	alert('请选择剪切区域再提交');
						    	 }		
							    }else{
							    	alert('请上传一个图片');
								 }			    	
						    	  
							});
						  });

						  function updateCoords(c)
						  {
						    $('#x').val(c.x);
						    $('#y').val(c.y);
						    $('#w').val(c.w);
						    $('#h').val(c.h);
						  };
						  
						</script>
																		
					</div>				
					<span class="upload_avatar_status"><i class="ajax_loading"></i><span id="upload_msg">文件上传中...</span></span>		
				</dd>
				<dd class="submit_cut">
					<a class="btn_text" id="submit_cut" href="javascript:;">
						<input type="hidden" id="x" name="x" />
						<input type="hidden" id="y" name="y" />
						<input type="hidden" id="w" name="w" />
						<input type="hidden" id="h" name="h" />
						确认剪切				
					</a>	
				</dd>
			</dl>
			<div class="clear"></div>
			<input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" />
			
		<?php $this->endWidget();?>
	</div>
	<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/public/js/uploadify/jquery.uploadify.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/public/js/jquery/jquery.Jcrop.min.js"></script>	
