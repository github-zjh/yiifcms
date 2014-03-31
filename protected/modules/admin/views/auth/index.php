<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Auth Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('init')?>" class="actionBtn current" onclick="return confirm('<?php echo Yii::t('admin','Init Table Will Delete All Auth Data! Are You Sure?')?>');"><span><?php echo Yii::t('admin','Auth Init Table');?></span></a></li>
      <li><a href="<?php echo $this->createUrl('init')?>" class="actionBtn" onclick="return confirm('<?php echo Yii::t('admin','Init Auth Will Create New Auth Data! Are You Sure?')?>');"><span><?php echo Yii::t('admin','Auth Init');?></span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>

