	<div class="user clear">
		<div class="user_left">
			<!-- 用户菜单导航开始 -->
			<?php $this->renderPartial('user_left');?>
			<!-- 用户菜单导航结束 -->
		</div>
		
		<div class="user_right">
			<div class="base_box clear">
				<img class="fl" width="100" height="100" alt="<?php echo Yii::t('common','My Avatar');?>" src="<?php echo $profile->avatar?$profile->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>" />
				<ul class="base_info">
					<li><label><?php echo Yii::t('model','username');?>：</label><span><?php echo $profile->username;?></span></li>
					<li><label><?php echo Yii::t('model','email');?>：</label><span><?php echo $profile->email;?></span></li>
					<li><label><?php echo Yii::t('model','nickname');?>：</label><span><?php echo $profile->nickname?$profile->nickname:'您没有填写昵称哦~';?></span></li>
					<li><label><?php echo Yii::t('model','sign');?>：</label><span><?php echo $profile->sign?$profile->sign:'您没有填写个性签名哦~';?></span></li>
					<li><label><?php echo Yii::t('model','web');?>：</label><span><?php echo $profile->web?'<a href="'.$profile->web.'" target="_blank">'.$profile->web.'</a>':'您没有填写个人网址哦~';?></span></li>
					<li><label><?php echo Yii::t('model','qq');?>：</label><span><?php echo $profile->qq?$profile->qq:'您没有填写QQ号哦~';?></span></li>
					<li><label><?php echo Yii::t('model','mobile');?>：</label><span><?php echo $profile->mobile?$profile->mobile:'您没有填写手机号码哦~';?></span></li>
					<li><label><?php echo Yii::t('model','logins');?>：</label><span><?php echo $profile->logins;?></span></li>
					<li><label><?php echo Yii::t('model','last_login_ip');?>：</label><span><?php echo $profile->last_login_ip?$profile->last_login_ip:'您这是首次登录哦~';?></span></li>
					<li><label><?php echo Yii::t('model','usergroup');?>：</label><span><?php echo Yii::app()->user->groupname;?></span></li>
					<li><label><?php echo Yii::t('common','User Space');?>：</label><span><a href="<?php echo $this->createUrl('user/space', array('id'=>$profile->uid));?>" title="<?php echo $user['username'].' - '.Yii::t('common','User Space');?>"><?php echo $this->_request->hostinfo.$this->createUrl('user/space', array('id'=>$profile->uid));?></a></span></li>
				</ul>				
				<a href="<?php echo $this->createUrl('setting');?>" class="edit_btn">
					<i class="fa fa_edit"></i><?php echo Yii::t('common','Edit');?>
				</a>
			</div>		
		</div>
		
	</div>
