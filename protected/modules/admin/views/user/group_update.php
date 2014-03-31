<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Group Update');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li ><a href="<?php echo $this->createUrl('group')?>" class="actionBtn"><span><?php echo Yii::t('admin','Go Back');?></span></a></li>
      <li class="current"><a href="<?php echo $this->createUrl('groupCreate')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<?php $this->renderPartial('_user_group_form',array('model'=>$model, 'acls' => $acls, 'has_acls'=>$has_acls))?>

