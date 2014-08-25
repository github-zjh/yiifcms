<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<style type="text/css">
	.appdata p { line-height:38px;}
	.appdata p label { width:80px; display:inline-block;}
</style>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','ID');?>：</td>
  </tr>
  <tr>
    <td><?php if($model->isNewRecord):?>
    	<?php echo $form->textField($model,'id', array('class'=>'validate[required]'));?>
    	<?php else:?>
    	<?php echo $model->id;?>
    	<?php endif;?>
    </td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Title Name');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'apiname',array('size'=>20,'maxlength'=>50, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('model','ApiConfig');?>：</td>
  </tr>
  <tr >
    <td class="appdata">    	
		<!-- 腾讯qq互联接口配置 -->
    	<?php if($model->id == 'qq'):?>
    	<label class="config_label">appid(应用id)：</label><input type="text" name="config[appid]" value="<?php echo $apiconfig['appid'];?>" /><br/><br/>
    	<label class="config_label">appkey(应用key)：</label><input type="text" name="config[appkey]" value="<?php echo $apiconfig['appkey'];?>" size="50" /><br/><br/>
    	<label class="config_label">callback(回调地址)：</label><input type="text" name="config[callback]" value="<?php echo $apiconfig['callback'];?>" size="50"/>(域名/oAuth/qq_callback)<br/><br/>
    	
		<!-- 新浪微博接口配置 -->
    	<?php elseif($model->id == 'sinawb'):?>
    	<label class="config_label">App Key(应用key)：</label><input type="text" name="config[wb_akey]" value="<?php echo $apiconfig['wb_akey'];?>" /><br/><br/>
    	<label class="config_label">App Secret(应用secret)：</label><input type="text" name="config[wb_skey]" value="<?php echo $apiconfig['wb_skey'];?>" size="50" /><br/><br/>
    	<label class="config_label">callback(回调地址)：</label><input type="text" name="config[callback]" value="<?php echo $apiconfig['callback'];?>" size="50"/>(域名/oAuth/sinawb_callback)<br/><br/>
		
		<!-- 人人网互联接口配置 -->
		<?php elseif($model->id == 'renren'):?>
    	<label class="config_label">App Key(应用key)：</label><input type="text" name="config[app_key]" value="<?php echo $apiconfig['app_key'];?>" /><br/><br/>
    	<label class="config_label">App Secret(应用secret)：</label><input type="text" name="config[app_secret]" value="<?php echo $apiconfig['app_secret'];?>" size="50" /><br/><br/>
    	<label class="config_label">callback(回调地址)：</label><input type="text" name="config[callback]" value="<?php echo $apiconfig['callback'];?>" size="50"/>(域名/oAuth/renren_callback)<br/><br/>
		
		<!-- 微信登录接口配置 -->
		<?php elseif($model->id == 'weixin'):?>

		<!-- 其他 -->
		<?php else:?>
    	<?php echo $form->textField($model, 'apiconfig', array('size'=>50,'maxlength'=>100));?>
    	<?php endif;?>    	
    </td>    
  </tr>  
  <?php if($model->id == 'qq'):?>
  <tr>
    <td class="tb_title">请求授权列表：<input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'scope')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label></td>
  </tr>
  <tr>
  	<td>
  		<?php
			$scope = array("get_user_info","add_t","del_t","get_info");
			$scopeArr = $scope;
			$i=1;
			foreach($scopeArr as $val){
		?>
				<input type="checkbox" name="scope[]" value="<?php echo $val?>" id="<?php echo $val?>" <?php Helper::selected($val, explode(',',$apiconfig['scope']),'checked');?>/>
				<label  class="qq_oauth_list" for="<?php echo $val?>"><?php echo Yii::t('admin','qq_scope_'.$val);?></label>&nbsp;			
			<?php
				if($i%5==0 && $i>4){
					echo "</br>";
				}
				$i++;
			}
			?>    	
  	</td>
  </tr>
  <?php endif;?>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Show Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Enable'), 'N'=>Yii::t('admin','Disable'))); ?></td>
  </tr>
  <tr class="submit">
    <td >
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();		
});
</script>
<?php $form=$this->endWidget(); ?>
