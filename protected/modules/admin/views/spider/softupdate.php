<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Soft'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li ><a href="<?php echo $this->createUrl('soft') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Go Back'); ?></span></a></li>
            <li class="current"><a href="<?php echo $this->createUrl('softCreate') ?>" class="btactionBtnn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right"> </div>
    </div>
</div>
<?php
$this->renderPartial('_form_soft', array('model' => $model));
