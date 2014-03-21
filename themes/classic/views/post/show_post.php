<script src="<?php echo $this->_baseUrl?>/static/js/lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo $this->_baseUrl?>/static/js/lightbox/css/lightbox.css" rel="stylesheet" />
<div class="mainWrap">
<div class="topDesc">
  <div class="desc">
    <p style=" margin-top:40px;">致力于提升客户品牌形象、实现客户商业目标!</p>
    <p>Commitment to enhance customer brand image,customer business goals!</p>
  </div>
</div>
<div class="global clear">
<!--左侧导航-->
  <?php $this->renderPartial('/layouts/sidebar_post' ,array('catalogArr'=>$catalogArr, 'catalogChild'=>$catalogChild))?> 
<!--/左侧导航-->
  <!--标签-->
  <div class="mainBox">
    <div class="loc clear">
      <div class="position"> <span>您的位置：</span> <a href="<?php echo Yii::app()->homeUrl?>">首页</a> <em></em> <span>资讯</span><em></em><a href="<?php echo $this->createUrl('post/index',array('catalog'=>$catalogArr['id']))?>"><?php echo $catalogArr['catalog_name']?></a>  </div>
    </div>
    <div class="postWrap">
      <div class="h head">
        <h1 class="title"><?php echo $bagecmsShow->title?></h1>
        <p class="info"> <?php echo date('Y-m-d H:i:s',$bagecmsShow->create_time)?><span class="split">|</span> 发布者: admin<span class="split">|</span> 查看: <em id="_viewnum"><?php echo $bagecmsShow->view_count?></em> </p>
      </div>
	  
      <?php if($attrVal):?>
      <div class="attrVal"><p>属性</p>
        <ul>
          <?php foreach($attrVal as $val):?>
          <li><span><?php echo $val->attr->attr_name?>:</span><?php echo $val->attr_val?></li>
          <?php endforeach?>
        </ul>
      </div>
      <?php endif?>
      
	  <?php if($bagecmsShow->image_list):?>
	  <?php $imageList = unserialize($bagecmsShow->image_list)?>
	  <div class="postAlbum clear"><ul><?php foreach($imageList as $album):?><li><a href="<?php echo $this->_baseUrl?>/<?php echo $album['file']?>" data-lightbox="a"><img src="<?php echo $this->_baseUrl?>/<?php echo $album['file']?>" /></a></li><?php endforeach?></div>
	  <?php endif?>
      <?php if($bagecmsShow->intro):?>
      <div class="intro clear"><?php echo $bagecmsShow->intro?></div>
      <?php endif?>
      <div class="cdata clear">
        <table cellpadding="0" cellspacing="0" class="showTb">
          <tbody>
            <tr>
              <td id="postContent"><?php echo $bagecmsShow->content?></td>
            </tr>
          </tbody>
        </table>
		<!--标签-->
     <?php if($bagecmsShow->tags):?>
      <?php 
	  $tags = @explode(',', $bagecmsShow->tags);
	  ?>
      <div class="postTags clear">
        <p class="tagsTitle floatL">标签：</p>
        <ul class="tagsList clear">
          <?php foreach($tags as $tag):?>
          <li><a href="<?php echo $this->createUrl('tag/post',array('name'=>urlencode($tag))) ?>" target="_blank" title="<?php echo $tag?>"><?php echo $tag?></a></li>
          <?php endforeach?>
        </ul>
      </div>
      <?php endif?>
	  <!--/标签-->
      </div>
    </div>
	<!--上下篇-->
    <?php //$before = Bagecms::getItem('Post', 'pageBefore', array('where'=>"id<{$bagecmsShow['id']} AND catalog_id={$bagecmsShow['catalog_id']}"))?>
    <?php //$behind = Bagecms::getItem('Post', 'pageBehind', array('where'=>"id>{$bagecmsShow['id']} AND catalog_id={$bagecmsShow['catalog_id']}"))?>
    <div class="preNext clear" > <em class="floatL">上一篇：
      <?php if($before):?>
      <a href="<?php echo $this->createUrl('post/show',array('id'=>$before['id']))?>"><?php echo $before['title']?></a>
      <?php else:?>
      没有了
      <?php endif?>
      </em><em class="floatR">下一篇：
      <?php if($behind):?>
      <a href="<?php echo $this->createUrl('post/show',array('id'=>$behind['id']))?>"><?php echo $behind['title']?></a>
      <?php else:?>
      没有了
      <?php endif?>
      </em></div>
	<!--/上下篇-->
    
	<!--相关阅读-->
    <div id="relatedPost" class="bm">
      <div class="boxTit clear">
        <h3>相关阅读</h3>
      </div>
      <div class="bmc">
        <ul class="list clear" id="raid_div">
		<?php //foreach((array)Bagecms::getList('post','index_news',array('where'=>"status_is='Y' AND catalog_id={$bagecmsShow['catalog_id']} AND id!={$bagecmsShow['id']}",'order'=>'id DESC', 'limit'=>8)) as $newsKey=>$newsRow):?>
          <li>• <a href="<?php echo $this->createUrl('post/show',array('id'=>$newsRow['id']))?>" target="_blank"><?php echo $newsRow['title']?></a></li>
		<?php //endforeach?> 
        </ul>
      </div>
    </div>
	<!--/相关阅读-->
	<!--评论区域-->
    <?php //$this->renderPartial('_comment',array('bagecmsShow'=>$bagecmsShow))?>
	<!--/评论区域-->
  </div>
</div>

