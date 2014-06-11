<div class="sidebar" id="sidebar">
  <div class="mbox sideNav">
    <h2><?php if($catalogArr):?><?php echo $catalogArr['catalog_name']?><?php else:?>资讯<?php endif?></h2>
   <?php if($catalogChild):?>
    <ul>
    <?php foreach((array)$catalogChild as $row):?>
      <li><a href="<?php echo $this->createUrl('post/index',array('catalog'=>$row['catalog_name_alias']))?>"><?php echo $row['catalog_name']?></a></li>
      <?php endforeach?>
    </ul>
    <?php endif?>
  </div>
  <div class="sideBox mbox">
    <p>000-000-000</p>
  </div>
</div>
