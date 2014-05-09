<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Goods Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li class="current"><a href="<?php echo $this->createUrl('index')?>" class="actionBtn"><span><?php echo Yii::t('admin','Go Back');?></span></a></li>
      <li class="current"><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    
  </div>
</div>

<?php $this->renderPartial('_form',array('model'=>$model, 'imageList'=>$imageList, 'attrModel'=>$attrModel, 'attrData'=>$attrData, 'groupList'=>$groupList))?>


