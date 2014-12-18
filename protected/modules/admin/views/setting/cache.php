
<div id="contentHeader">
	<h3><?php echo Yii::t('admin','Cache Set');?></h3>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<table class="content_list">
		<tbody>

			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Type');?>：</div>
					<div class="custom_content">
						<select name="data[type]" id="cache_type">
							<option value=""><?php echo Yii::t('admin','Please Select')?></option>
							<option value="filecache"><?php echo Yii::t('admin','FileCache')?></option>
							<option value="memcache"><?php echo Yii::t('admin','MemCache')?></option>
							<option value="redis"><?php echo Yii::t('admin','RedisCache')?></option>
						</select>
      				</div>
				</td>
			</tr>			
			<tr id="enable_desc">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','IF Enable');?>：</div>
					<div class="custom_content">
						--
      				</div>
				</td>
			</tr>
			
			<tr class="cache_param filecache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','CacheFiles Depth');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['depth'];?>" name="data['depth']" class="txt">					
      				</div>
				</td>
			</tr>
			<tr class="cache_param memcache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Host');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['depth'];?>" name="data['depth']" class="txt">					
      				</div>
				</td>
			</tr>
			<tr class="cache_param redis_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Port');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['depth'];?>" name="data['depth']" class="txt">					
      				</div>
				</td>
			</tr>


		</tbody>
	</table>
	<div class="submit" style="padding-top: 10px">
		<input type="submit" value="<?php echo Yii::t('common','Submit')?>" class="button"	tabindex="3" />
	</div>
</form>
<script type="text/javascript">
	$(function(){
		$("#cache_type").change(function(){
			$(".cache_param").hide();
			var type = $(this).val();
			$("."+type+"_param").show();	
		});
	});
</script>

