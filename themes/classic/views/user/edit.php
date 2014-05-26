	<div class="user">
		<div class="user_left">
			<div class="base_box clear">
				<img class="fl" src="<?php echo $this->_stylePath;?>/images/avatar-max-img.png" />
				<ul class="base_info">
					<li><label>用户名：</label><strong><?php echo Yii::app()->user->name;?></strong></li>
					<li><label>邮箱：</label><strong><?php echo Yii::app()->user->email;?></strong></li>
					<li><label>用户组：</label><strong><?php echo Yii::app()->user->groupname;?></strong></li>
				</ul>				
				<a href="<?php echo $this->createUrl('edit',array('id'=>Yii::app()->user->id));?>" class="edit_btn">
					<i class="fa fa_edit"></i>编辑
				</a>
			</div>		
		</div>
		
		<div class="user_right">
		
		</div>
		
	</div>