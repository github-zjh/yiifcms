
<div id="contentHeader">
	<h3><?php echo Yii::t('admin','Access Set');?></h3>
</div>

<?php if($setting):?>
<form action="" method="post" enctype="multipart/form-data">
	<table class="content_list">
		<tbody>
			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Deny Access IP');?>：</div>
					<div class="custom_content">
						<textarea name="Setting[deny_access_ip]" class="area" rows="6"
							cols="50"><?php echo $setting['deny_access_ip'];?></textarea>
					</div>
					<div><?php echo Yii::t('admin','Deny Register IP Desc');?></div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Deny Register IP');?>：</div>
					<div class="custom_content">
						<textarea name="Setting[deny_register_ip]" class="area" rows="6"
							cols="50"><?php echo $setting['deny_register_ip'];?></textarea>
					</div>
					<div><?php echo Yii::t('admin','Deny Register IP Desc');?></div>
				</td>
			</tr>

		</tbody>
	</table>
	<div class="submit" style="padding-top: 10px">
		<input type="submit" name="editsubmit" value="提交" class="button"
			tabindex="3" />
	</div>
</form>
<?php endif;?>
