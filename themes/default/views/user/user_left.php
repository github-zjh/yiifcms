<div class="left_menu">
	<dl>
		<dt><?php echo Yii::t('common','My Account');?></dt>
		<dd data-id="index"><a href="<?php echo $this->createUrl('user/index');?>"><?php echo Yii::t('common','User Introduce');?></a></dd>
		<dd data-id="setting" class="ico_base"><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Setting Profile');?></a></dd>
		<dd data-id="settingPwd" class="ico_pwd"><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></dd>
		<dd data-id="settingEmail" class="ico_email"><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></dd>
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','Collect & Attention');?></dt>
		<dd data-id="mycollect" class="ico_collect"><a href="<?php echo $this->createUrl('user/mycollect');?>"><?php echo Yii::t('common','Collect Manage');?></a></dd>	
		<dd data-id="myattention" class="ico_attention"><a href="<?php echo $this->createUrl('user/myattention');?>"><?php echo Yii::t('common','Attention Manage');?></a></dd>			
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','Comments & Replies');?></dt>
		<dd data-id="mycomments" class="ico_comment"><a href="<?php echo $this->createUrl('user/mycomments');?>"><?php echo Yii::t('common','My Comments');?></a></dd>	
		<dd data-id="myreplys" class="ico_comment"><a href="<?php echo $this->createUrl('user/myreplys');?>"><?php echo Yii::t('common','My Replys');?></a></dd>			
	</dl>
	<dl>
		<dt><?php echo Yii::t('common','My Friends');?></dt>
		<dd data-id="myfriends" class="ico_friend"><a href="<?php echo $this->createUrl('user/myfriends');?>"><?php echo Yii::t('common','Friends Manage');?></a></dd>		
	</dl>
</div>
<!-- 当前菜单选中状态 -->
<script type="text/javascript">
    $(function(){
        var cur_action = '<?php echo $this->action->id;?>';        
        $('.left_menu dd').each(function(i, item){
            var data_id = $(item).attr('data-id');            
            if( data_id== cur_action) {
                $(item).addClass('selected');
            }
        });
    });
</script>