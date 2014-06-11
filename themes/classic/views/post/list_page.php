<div class="mainWrap">
<div class="topDesc">
  <div class="desc">
    <p style=" margin-top:40px;">致力于提升客户品牌形象、实现客户商业目标!</p>
    <p>Commitment to enhance customer brand image,customer business goals!</p>
  </div>
</div>
<div class="global clear">
   <?php $this->renderPartial('/layouts/sidebar_post' ,array('catalogArr'=>$catalogArr, 'catalogChild'=>$catalogChild))?> 
  <div class="mainBox">
    <div class="loc clear">
      <div class="position"> <span>您的位置：</span> <a href="<?php echo Yii::app()->homeUrl?>">首页</a> <em></em><?php echo $bagecmsCatalogShow->catalog_name?> </div>
    </div>
	<div class="postWrap">
	<div class="h head">
        <h1 class="title"><?php echo $bagecmsCatalogShow['catalog_name']?></h1>
      </div>
    <div class="clear cdata">
     <?php echo $bagecmsCatalogShow['content']?> 
    </div>
	</div>
  </div>
</div>

