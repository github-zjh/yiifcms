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
			<h3><?php echo Yii::t('common','Setting Email');?></h3>
			<?php 
				$form=$this->beginWidget('CActiveForm',
				array('id'=>'edit_form','htmlOptions'=>array('name'=>'edit_form', 'enctype'=>'multipart/form-data'))); 
			?>
				<table class="base_table">
					<tr><th><label><?php echo Yii::t('common','Init Email');?>：</label></th><td><?php echo $model->email?$model->email:'暂无';?>
					<input type="hidden" name="initEmail" value="<?php echo $model->email;?>"/></td></tr>
					<tr><th><label><?php echo Yii::t('common','New Email');?>：</label></th><td><input type="text" name="newEmail" value="<?php echo $post['newEmail'];?>"/></td></tr>	
					<?php if($need_active):?>
					<tr>
						<th><label><?php echo Yii::t('common','Email Captcha');?>：</label></th>
						<td>
							<input type="text" class="send_txt" name="captchaEmail" value="<?php echo $post['captchaEmail'];?>"/>
							<input type="button" id="send_e_btn" class="send_btn" name="sendEmailCaptcha" value="<?php echo Yii::t('common','Click Send Email');?>"/>
						</td>
					</tr>
					<tr><td></td><td id="send_msg"></td></tr>
					<?php endif;?>							
					<tr>
						<td></td>
						<td>						
							<?php if (CHtml::errorSummary($model)):?>
							<div class="error_message"> <?php echo CHtml::errorSummary($model); ?> </div>
							<?php endif;?>
						</td>
					</tr>				
				</table>
				<div class="clear"></div>
				<input type="submit" class="submit" value="<?php echo Yii::t('common','Submit');?>" />
			<?php $this->endWidget();?>
		</div>
		<script type="text/javascript">
			$(function(){
				$("#send_e_btn").click(function(){				
					$("#send_msg").text("<?php echo Yii::t('common','Sending..');?>");
					var initemail = $("input[name='initEmail']").val();
					var email = $("input[name='newEmail']").val();
					$.post("<?php echo $this->createUrl('user/settingEmail');?>",
							{"ajax":"edit_form","initemail":initemail,"email":email},
					function(data){
						if(data.status == 'error'){
							$("input[name='"+data.field+"']").focus();
						}else{
							$("input[name='captchaEmail']").focus();
						}
						$("#send_msg").text(data.message);
					},'json');				
				});
			});
		</script>
	</div>
</div>
