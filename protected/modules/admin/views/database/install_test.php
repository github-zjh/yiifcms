<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Install Test Data');?></h3>
  
</div>
<form action="<?php echo $this->createUrl('installtestdata')?>" method="post">
  <table class="content_list">
    <tr class="noborder">
        <td class="vtop rowform">        	
        	<label>安装测试数据前，请先做好备份，默认安装/protected/data/temp/test_data.sql文件.</label>
        </td>
    </tr>    
    <tr class="submit">
      <td >
      	<input type="submit" value="确认安装" class="button" tabindex="3" />       
      </td>
    </tr>
  </table>
</form>

