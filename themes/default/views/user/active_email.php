	<div class="user user_edit">
		<ul class="tab_menu clear">		
			<li class="active"><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></li>
			<li><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></li>
			<li><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Base Profile');?></a></li>
			<h2><?php echo Yii::t('common','User Setting');?></h2>
		</ul>
		<h3><?php echo Yii::t('common','Account Active');?></h3>
		<div class="base_table base_active clear">
			<p class="active_msg"><?php echo Yii::t('common','Active Account Msg');?></p>			
			<p class="active_btn">
				<input type="button" id="send_e_btn" class="send_btn" name="sendEmailCaptcha" value="<?php echo Yii::t('common','Click Send Email');?>"/>
				<span id="send_msg"></span>
			</p>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$("#send_e_btn").click(function(){		
				$(this).attr("disabled",true);		
				$("#send_msg").text("<?php echo Yii::t('common','Sending..');?>");
				var initemail = $("input[name='initEmail']").val();
				var email = $("input[name='newEmail']").val();
				$.post("<?php echo $this->createUrl('user/activeEmail');?>",{"ajax":"ajax_active_form"},
					function(data){					
						$("#send_msg").text(data.message);
						$("#send_e_btn").attr("disabled",false);	
					}
				,'json');				
			});
		});
	</script>