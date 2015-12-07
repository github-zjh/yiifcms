<link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/user.css';?>" />
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
				$form=$this->beginWidget('CActiveForm',array(
                    'id'=>'edit_form'
                    )); 
			?>
				<table class="base_table">
					<tr>
                        <th><?php echo $form->label($model, 'initEmail');?></th>
                        <td>
                            <?php echo $model->initEmail?$model->initEmail:'暂无';?>                            
                        </td>                        
                    </tr>
					<tr>
                        <th><?php echo $form->label($model, 'newEmail');?></th>
                        <td>
                            <?php echo $form->textField($model, 'newEmail');?>                           
                        </td>
                    </tr>	
					<?php if($need_active):?>
					<tr>
						<th><?php echo $form->label($model, 'verifyCode');?></th>
						<td>
                            <?php echo $form->textField($model, 'verifyCode', array('class' => 'send_txt'));?>							
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
					var email = $("#SetEmailForm_newEmail").val();
					$.post("<?php echo $this->createUrl('user/settingEmail');?>",
							{"ajax":"sendEmailVerifyCode","SetEmailForm[newEmail]":email},
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
