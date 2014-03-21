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
          <div class="position"> <span>您的位置：</span> <a href="<?php echo Yii::app()->homeUrl?>">首页</a> <em></em> <?php if($catalogArr):?><a href="<?php echo $this->createUrl('index',array('catalog'=>$catalogArr['catalog_name_alias'])) ?>"><?php echo $catalogArr['catalog_name']?></a><?php else:?><span>资讯列表</span><?php endif?><em></em> </div>
        </div>
        <div class="listBox clear">
          <ul class="title">
           <?php foreach((array)$bagecmsDataList as $bagecmsKey=>$bagecmsRow):?>
            <li class="clear ">
              <h2>
                <p class="y"> <span class="date"><?php echo date('Y-m-d H:i:s',$bagecmsRow->create_time) ?></span></p>
                <a href="<?php echo $this->createUrl('post/show',array('id'=>$bagecmsRow->id))?>" target="_blank" class="title" <?php if($bagecmsRow->title_style):?>style="<?php echo $bagecmsRow->title_style?>"<?php endif?>><?php echo $bagecmsRow->title?></a> </h2>
            </li>
            <?php endforeach?>
           
          </ul>
        </div>
        <div class="pagebar clear">
          <?php $this->widget('CLinkPager',array('pages'=>$bagecmsPagebar));?>
        </div>
      </div>
    </div>
