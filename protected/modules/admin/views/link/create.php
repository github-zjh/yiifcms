<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Link');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li ><a href="<?php echo $this->createUrl('link/index')?>" class="actionBtn"><span><?php echo Yii::t('admin','Manage');?></span></a></li>
      <li class="current"><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<?php $this->renderPartial('_form',array('model'=>$model))?>

