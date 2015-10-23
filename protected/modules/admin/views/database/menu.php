<ul class="action left">    
    <li><a href="<?php echo $this->createUrl('index') ?>"   <?php if($this->action->id == 'index'):?>class="current"<?php endif;?>><span><?php echo Yii::t('admin','Database Tables')?></span></a></li>
    <li><a href="<?php echo $this->createUrl('query') ?>"   <?php if($this->action->id == 'query'):?>class="current"<?php endif;?>><span><?php echo Yii::t('admin','Database Query')?></span></a></li>
    <li><a href="<?php echo $this->createUrl('export') ?>"  <?php if($this->action->id == 'export'):?>class="current"<?php endif;?>><span><?php echo Yii::t('admin','Database BackUp')?></span></a></li>
    <li><a href="<?php echo $this->createUrl('import') ?>"  <?php if($this->action->id == 'import'):?>class="current"<?php endif;?>><span><?php echo Yii::t('admin','Database Recovery')?></span></a></li>
    <li><a href="<?php echo $this->createUrl('install') ?>" <?php if($this->action->id == 'install'):?>class="current"<?php endif;?>><span><?php echo Yii::t('admin','Database Install Test Data')?></span></a></li>
</ul>
