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
				<dt><img id="avatar_src" alt="我的头像" src="<?php echo $model->avatar?$model->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>"></dt>
				<dd class="upload_desc clear">
					<p>上传头像</p>
					<p>仅支持JPG,PNG,GIF,BMP格式的图片</p>
					<div class="upload_btn">
						<a href="javascript:;" class="btn_text"><?php echo Yii::t('common','Upload Image');?></a>
						<?php echo $form->fileField($model,'avatar', array('class'=>"btn_file"));?>
						<script type="text/javascript">
							$(function(){
								$("#User_avatar").change(function(){
									var avatar = $(this).val();
									if(avatar){
										$.post("<?php echo $this->createUrl('user/setting');?>",{'ajax':'upload_avatar','User_avatar':avatar},function(data){
											$(".upload_avatar_status").show();
											if(data.state == 'error'){												
												$("#upload_msg").text(data.message).css("color","#F00");
											}
										},'json');
									}
								});
							});
						</script>
						<!-- <input type="file" class="btn_file" name="avatar" value="" /> -->												
					</div>				
					<span class="upload_avatar_status"><i class="ajax_loading"></i><span id="upload_msg">文件上传中...</span></span>						
				</dd>
			</dl>
			<div class="clear"></div>
			<input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" />
			
		<?php $this->endWidget();?>
	</div>