<div class="user clear">
	<div class="space_header">
		<h1><a href="<?php echo $this->createUrl('user/space', array('id'=>$user['uid']));?>" title="<?php echo $user['username'].' - '.Yii::t('common','User Space');?>"><?php echo $user['username'].' - '.Yii::t('common','User Space');?></a></h1>
		<div class="url"><a href="<?php echo $this->createUrl('user/space', array('id'=>$user['uid']));?>" title="<?php echo $user['username'].' - '.Yii::t('common','User Space');?>"><?php echo $this->_request->hostinfo.$this->createUrl('user/space', array('id'=>$user['uid']));?></a></div>
		<div class="sign"><?php echo $user['sign'];?></div>
	</div>
	<div class="space_left">
		<h2><?php echo Yii::t('common', 'Personal Profile');?></h2>
		<div class="profile_list">
			<dl class="cc clear">
				<dt>UID</dt>
				<dd><?php echo $user['uid'];?></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','usergroup');?></dt>
				<dd><?php echo $user['group_name'];?></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','web');?></dt>
				<dd><a href="<?php echo $user['web'];?>" target="_blank"><?php echo $user['web'];?></a></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','register_ip');?></dt>
				<dd><?php echo $user['register_ip'];?></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','last_login_ip');?></dt>
				<dd><?php echo $user['last_login_ip'];?></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','addtime');?></dt>
				<dd><?php echo date('Y-m-d H:i:s',$user['addtime']);?></dd>
			</dl>
		</div>
		<h2><?php echo Yii::t('common', 'Contact Links');?></h2>
		<div class="profile_list">
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','email');?></dt>
				<dd><?php echo $user['email'];?></dd>
			</dl>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','qq');?></dt>
				<dd><?php echo $user['qq'];?></dd>
			</dl>
			<?php if($myself):?>
			<dl class="cc clear">
				<dt><?php echo Yii::t('model','mobile');?></dt>
				<dd><?php echo $user['mobile'];?></dd>
			</dl>
			<?php endif;?>
		</div>
	</div>
	<div class="space_right">
		<div class="space_user_info">
			<div class="face">
				<img src="<?php echo $user->avatar?$user->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>"	data-type="big" width="180" height="180">
			</div>
			<h2 class="name"><?php echo $user['username'];?></h2>
		    <ul  class="enum clear">
		    		<?php if(!$myself):?>
					<li>
						<?php if($friend):?>
						<a href="<?php echo $this->createUrl('user/myfriends');?>">
							<em><?php echo Yii::t('common','Cancel Friends')?></em>
						</a>
						<?php else:?>
						<a  href="javascript:ajaxClick('friend');" data-act="friend" data-id="<?php echo $user['uid'];?>">							
							<em><?php echo Yii::t('common','Add Friends')?></em>
						</a>
						<?php endif;?>
						<span class="ajax_msg">loading...</span>						
					</li>
					<?php endif;?>		
					<?php if($myself):?>
					<li>
						<a href="<?php echo $this->createUrl('user/setting');?>">							
							<em><?php echo Yii::t('common','Setting Profile')?></em>
						</a>
					</li>
					<?php endif;?>						
			</ul>	
							
		</div>
	</div>
</div>
