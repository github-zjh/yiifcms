<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Content Comment');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li ><a href="<?php echo $this->createUrl('index')?>" class="actionBtn"><span><?php echo Yii::t('admin','Content Manage');?></span></a></li>     
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<?php $this->renderPartial('_form',array('model'=>$model))?>

