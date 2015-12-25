<div id="contentHeader">
    <h3>内容管理</h3>
    <div class="searchArea">
        <ul class="action left" >
            <li class="current"><a href="<?php echo $this->createUrl('index') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Go Back'); ?></span></a></li>
            <li class="current"><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'add'); ?></span></a></li>
        </ul>
    </div>
</div>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'style' => isset($style) ? $style : array(),
    'bold' => isset($bold) ? $bold : array(),
    'imageList' => isset($imageList) ? $imageList : array(),
    'attrModel' => isset($attrModel) ? $attrModel : array(),
    'attrData' => isset($attrData) ? $attrData : array(),
    'groupList' => isset($groupList) ? $groupList : array(),
    'parents' => isset($parents) ? $parents : ''
));