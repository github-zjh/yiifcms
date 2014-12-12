<div class="user clear">
	<?php
		//引用公共提示信息
	   $this->renderPartial('/layouts/alert');
	?>
	<div class="user_left">
		<!-- 用户菜单导航开始 -->
		<?php $this->renderPartial('user_left');?>
		<!-- 用户菜单导航结束 -->
	</div>
	
	<div class="user_right">	
		<div class="user_edit">			
			<h3><?php echo Yii::t('common','Setting Profile');?></h3>
			<?php 
				$form=$this->beginWidget('CActiveForm',
				array('id'=>'edit_form','htmlOptions'=>array('name'=>'edit_form','enctype'=>'multipart/form-data'))); 
			?>
				<table class="base_table">
					<tr><th><?php echo $form->label($model,'username');?>：</th><td><?php echo $model->username;?></td></tr>
					<tr><th><?php echo $form->label($model,'email');?>：</th><td><?php if($model->email):?><?php echo $model->email;?><?php else:?>
					<a href="<?php echo $this->createUrl('user/settingEmail');?>">重设邮箱</a><?php endif;?></td></tr>
					<tr><th><?php echo $form->label($model,'nickname');?>：</th><td><?php echo $form->textField($model,'nickname');?></td></tr>
					<tr><th><?php echo $form->label($model,'sign');?>：</th><td><?php echo $form->textArea($model,'sign');?></td></tr>
					<tr><th><?php echo $form->label($model,'web');?>：</th><td><?php echo $form->textField($model,'web');?></td></tr>
					<tr><th><?php echo $form->label($model,'qq');?>：</th><td><?php echo $form->textField($model,'qq');?></td></tr>
					<tr><th><?php echo $form->label($model,'mobile');?>：</th><td><?php echo $form->textField($model,'mobile');?></td></tr>				
					<tr>
						<td></td>
						<td>
							<?php if (CHtml::errorSummary($model)):?>
							<div class="error_message"> <?php echo CHtml::errorSummary($model); ?> </div>
							<?php endif?>
						</td>
					</tr>
				</table>			
				<dl class="upload_avatar">
					<div class="upload_cut_box"><img width="300" heigth="300" src="<?php echo $this->_stylePath.'/images/avatar_cut_box.jpg';?>" id="cropbox" /></div>
					<dt class="upload_desc">					
						<img id="avatar_src" width="100" height="100" alt="<?php echo Yii::t('common','My Avatar');?>" src="<?php echo $model->avatar?$model->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>">
					</dt>
					<dd class="upload_desc clear">
						<p><?php echo Yii::t('common','Upload Avatar');?></p>
						<p><?php echo Yii::t('common','Avatar Size Should Be Less 1M')?></p>							
					</dd>
					<dd class="submit_cut">
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
								        'fileSizeLimit' : '1MB',
								        'queueSizeLimit' : 1,
								        'uploadLimit':1,
								        'fileTypeExts': '*.jpg;*.png;*.gif;*.bmp;',
								        'formData': {
								            'sessionId'   : '<?php echo Yii::app()->session->sessionID; ?>',
											'timestamp'   : '<?php echo time();?>',
											'token'       : '<?php echo md5('unique_salt'.time()); ?>'
								        },
								        'swf': '<?php echo $this->_static_public?>/js/uploadify/uploadify.swf',
								        'uploader': '<?php echo $this->createUrl('uploadify/avatar');?>',	                
								       	'onSelectError':function(file, errorCode, errorMsg){
									       	var msg = '';
									     	switch(errorCode){		     		
									     		case -110:
									     			msg = "<?php echo Yii::t('common','Upload More Than');?>"+$("#uploadAvatar").uploadify('settings','fileSizeLimit');
									     			break;
									     		case -130:
									     			msg = "<?php echo Yii::t('common','Upload Only');?>"+$("#uploadFile").uploadify('settings','fileTypeExts')+<?php echo Yii::t('common','Format File');?>;
									     			break;
									     		case -100:
									     			msg = "<?php echo Yii::t('common','Only One');?>";
									     			break;
										     	default:
									     			msg += "<?php echo Yii::t('common','Upload Error');?>"+errorCode;
									     			break;
									     	}
									     	$.Zebra_Dialog(msg);	
									     },		
									     'onUploadStart' : function(file) {
									    	 $(".upload_avatar_status").removeClass('upload_avatar_status_success').show();	
									    	 $("#upload_msg").text("<?php echo Yii::t('common','File Uploading');?>");
									     }, 								        
								        'onUploadSuccess': function(file, data, response) {								       								        
								            var json = $.parseJSON(data);  
								            if (json.state == 'success') {		   
								               $(".upload_avatar_status").show().html("<?php echo Yii::t('common','Upload Success');?>").css('color',"#F00");         
								               $("#tmpFile").val(json.file);
								               $("#cropbox").attr('src',json.file);
	
								               //加载上传的图片
								               $('#cropbox').Jcrop({
												      aspectRatio: 1,
												      onSelect: updateCoords,
												      minSize:   [ 200, 200],
												      maxSize:   [ 200, 200]						     
												});
								               $(".upload_avatar_status").addClass('upload_avatar_status_success')								               	               
								            } else {							            	
										     	$("#upload_msg").text(json.message);
								            }
								        },
								        'onFallback' : function() {
								        	$.Zebra_Dialog("<?php echo Yii::t('common','You Should Install Flash')?>");								          
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
												$(".upload_avatar_status").show().html(<?php echo Yii::t('common','Cut Success');?>).css('color',"#F00");										    	
											}else{
												$("#upload_msg").text(data.message);
											}
										},'json');
	
							    	 }else{						    		 
								    	 $.Zebra_Dialog("<?php echo Yii::t('common','Please Select Cut Area')?>");	
							    	 }		
								    }else{							    	
								    	$.Zebra_Dialog('<?php echo Yii::t('common','Please Upload Image')?>');							    	
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
						<span class="upload_avatar_status"><i class="ajax_loading"></i><span id="upload_msg"><?php echo Yii::t('common','File Uploading');?></span></span>	
						<a class="btn_text btn_cut" id="submit_cut" href="javascript:;">
							<input type="hidden" id="x" name="x" />
							<input type="hidden" id="y" name="y" />
							<input type="hidden" id="w" name="w" />
							<input type="hidden" id="h" name="h" />
							<?php echo Yii::t('common','Submit Cut');?>			
						</a>	
					</dd>
				</dl>
				<div class="clear"></div>			
				
				<input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" />
				
			<?php $this->endWidget();?>
		</div>
		
		<script type="text/javascript" src="<?php echo $this->_static_public?>/js/uploadify/jquery.uploadify.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery.Jcrop.min.js"></script>	
		<script type="text/javascript" src="<?php echo $this->_static_public?>/js/zebra_dialog/zebra_dialog.js"></script>
		<link rel="stylesheet" href="<?php echo $this->_static_public?>/js/zebra_dialog/css/zebra_dialog.css" type="text/css">
		
	</div>
</div>
	
