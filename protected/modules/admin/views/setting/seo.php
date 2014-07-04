<div id="contentHeader">
  <h3>SEO配置</h3>
  <span class="red">注意：输入内容(统计代码除外)时，不允许带有(&amp;,&gt;,&lt;)，否则在严格的环境下会提交不上。</span>
</div>
<form action="" method="post"  enctype="multipart/form-data" >
  <table class="content_list">
    <tr>
      <td class="tb_title">网站标题：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[seo_title]" value="<?php echo $setting['seo_title']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title">网站关键字：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[seo_keywords]" value="<?php echo $setting['seo_keywords']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title">网站描述：</td>
    </tr>
    <tr >
      <td ><textarea  rows="6" name="Setting[seo_description]" id="seo_description" cols="50" class="tarea middenWidth"><?php echo $setting['seo_description']?></textarea>
        </span></td>
    </tr>
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
    </tr>
  </table>
</form>
