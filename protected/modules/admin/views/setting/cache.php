
<div id="contentHeader">
	<h3><?php echo Yii::t('admin','Cache Set');?></h3>
</div>

<form action="<?php echo $this->createUrl('setting/cache')?>"  method="post" name="cache-form">
	<table class="content_list">
		<tbody>
		 	<tr >
		      <td >
		      	<div class="custom_title"><?php echo Yii::t('admin','Cache Status');?>：</div>
		      	<select name="data[cache_status]">
		          <option value="open" <?php echo Helper::selected($data['cache_status'], 'open')?>><?php echo Yii::t('admin','Open');?></option>
		          <option value="close" <?php echo Helper::selected($data['cache_status'], 'close')?>><?php echo Yii::t('admin','Close');?></option>
		        </select></td>
		    </tr>
			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Type');?>：</div>
					<div class="custom_content">
						<select name="data[cache_type]" id="cache_type">
							<option value=""><?php echo Yii::t('admin','Please Select')?></option>
							<option value="filecache"<?php echo Helper::selected($data['cache_type'], 'filecache')?>><?php echo Yii::t('admin','FileCache')?></option>
							<option value="memcache"<?php echo Helper::selected($data['cache_type'], 'memcache')?>><?php echo Yii::t('admin','MemCache')?></option>
							<option value="rediscache"<?php echo Helper::selected($data['cache_type'], 'rediscache')?>><?php echo Yii::t('admin','RedisCache')?></option>
						</select>
      				</div>
				</td>
			</tr>			
			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','IF Enable');?>：</div>
					<div class="custom_content"  id="enable_desc">
						<?php echo $data['cache_enable'];?>
      				</div>
				</td>
			</tr>
			<!-- 文件缓存配置 -->			
			<tr class="cache_param filecache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','CacheFiles Depth');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['filecache']['depth']?$data['filecache']['depth']:2;?>" name="data[filecache][depth]" size="10" >											
      				</div>
      				<div><?php echo Yii::t('admin','Only Number');?></div>
				</td>
			</tr>			
			
			<!-- Memcache配置 -->			
			<tr class="cache_param memcache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Host');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['memcache']['host'];?>" name="data[memcache][host]" class="txt">					
      				</div>
				</td>
			</tr>
			<tr class="cache_param memcache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Port');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['memcache']['port'];?>" name="data[memcache][port]" class="txt">					
      				</div>
				</td>
			</tr>			
			
			<!-- Redis配置 -->			
			<tr class="cache_param rediscache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Host');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['rediscache']['host'];?>" name="data[rediscache][host]" class="txt">					
      				</div>
				</td>
			</tr>
			<tr class="cache_param rediscache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Port');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['rediscache']['port'];?>" name="data[rediscache][port]" class="txt">					
      				</div>
				</td>
			</tr>
			<tr class="cache_param rediscache_param">
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Cache Database');?>：</div>
					<div class="custom_content">
						<input type="text" value="<?php echo $data['rediscache']['database'];?>" name="data[rediscache][database]" class="txt">					
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
		var cache_select_type = "<?php echo $data['cache_type']?>";
		$("."+cache_select_type+"_param").show();		
		$("#cache_type").change(function(){
			$(".cache_param").hide();
			var type = $(this).val();
			if(type == cache_select_type){
				$("#enable_desc").html('<?php echo $data["cache_enable"];?>');
			}else{
				$("#enable_desc").html("Loading...");
			}
			$("."+type+"_param").show();			
		});
	});
</script>

