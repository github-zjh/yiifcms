<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Image'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li ><a href="<?php echo $this->createUrl('image') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Go Back'); ?></span></a></li>
            <li class="current"><a href="<?php echo $this->createUrl('imageCreate') ?>" class="btactionBtnn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right"> </div>
    </div>
</div>
<?php
$this->renderPartial('_form_image', array('model' => $model));
