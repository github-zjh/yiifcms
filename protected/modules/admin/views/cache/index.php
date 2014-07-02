<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Cache Manage');?></h3>
  
</div>
<form action="<?php echo $this->createUrl('cacheUpdate')?>" method="post" id="cacheForm" name="cacheForm">
  <table class="content_list">
    <tr class="noborder">
        <td class="vtop rowform">
        	<input name="cache[]" type="checkbox" id="cache[style]" value="style"/>
        	<label for="cache[style]"> 样式缓存[更新css,js等]</label>
        </td>
    </tr>
    <tr>
        <td class="vtop rowform">
        	<input name="cache[]" type="checkbox" id="cache[content]"  value="content"/>
        	<label for="cache[content]"> 内容缓存</label>
        </td>
    </tr>   
    <tr class="submit">
      <td >
      	<input type="submit" value="更新缓存" class="button" tabindex="3" />
        <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'cache')" />
        <label for="chkall">全选</label>
      </td>
    </tr>
  </table>
</form>

