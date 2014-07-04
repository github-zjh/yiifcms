
<div id="contentHeader">
  <h3>自定义属性</h3>
  <span class="red">注意：输入内容(统计代码除外)时，不允许带有(&amp;,&gt;,&lt;)，否则在严格的环境下会提交不上。</span>
</div>

<?php if($setting):?>
<form action="" method="post"  enctype="multipart/form-data" >
  <table class="content_list">
    <tbody>
    <?php foreach($setting as $ck => $cv):?>
    <tr>
    <td>
    	<div class="custom_title"><?php echo Yii::t('admin',$ck);?>：</div>
        <div class="custom_content">
	        <input type="text" value="<?php echo $cv;?>" name="Setting[<?php echo $ck;?>]" class="txt">
	        <br>
       		 标识：<?php echo $ck;?>
      </div>
      </td>
  </tr>
  <?php endforeach;?>
   
  </tbody></table>
  <div class="submit" style="padding-top:10px">
    <input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" />
   </div>
</form>
<?php endif;?>
