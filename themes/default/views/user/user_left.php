<div class="left_menu">
	<dl>
		<dt><?php echo Yii::t('common','My Account');?></dt>
		<dd><a href="<?php echo $this->createUrl('user/index');?>"><?php echo Yii::t('common','User Introduce');?></a></dd>
		<dd class="ico_base"><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Setting Profile');?></a></dd>
		<dd class="ico_pwd"><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></dd>
		<dd class="ico_email"><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></dd>
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','Collect & Attention');?></dt>
		<dd class="ico_collect"><a href="<?php echo $this->createUrl('user/mycollect');?>"><?php echo Yii::t('common','Collect Manage');?></a></dd>	
		<dd class="ico_attention"><a href="<?php echo $this->createUrl('user/myattention');?>"><?php echo Yii::t('common','Attention Manage');?></a></dd>			
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','Comments & Replies');?></dt>
		<dd class="ico_comment"><a href="<?php echo $this->createUrl('user/mycomments');?>"><?php echo Yii::t('common','My Comments');?></a></dd>	
		<dd class="ico_comment"><a href="<?php echo $this->createUrl('user/myreplys');?>"><?php echo Yii::t('common','My Replys');?></a></dd>			
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','My Friends');?></dt>
		<dd class="ico_friend"><a href="<?php echo $this->createUrl('user/myfriends');?>"><?php echo Yii::t('common','Friends Manage');?></a></dd>		
	</dl>
</div>