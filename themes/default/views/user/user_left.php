<div class="left_menu">
	<dl>
		<dt><?php echo Yii::t('common','My Account');?></dt>
		<dd><a href="<?php echo $this->createUrl('user/index');?>"><?php echo Yii::t('common','User Introduce');?></a></dd>
		<dd class="ico_base"><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Base Profile');?></a></dd>
		<dd class="ico_pwd"><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></dd>
		<dd class="ico_email"><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></dd>
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','My Collect');?></dt>
		<dd><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Collect Posts');?></a></dd>
		<dd><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Collect Goods');?></a></dd>
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','My Comment');?></dt>
		<dd><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Comments Manage');?></a></dd>		
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','My Friends');?></dt>
		<dd><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Friends Manage');?></a></dd>		
	</dl>
</div>