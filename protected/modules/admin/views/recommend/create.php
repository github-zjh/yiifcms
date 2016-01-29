<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Recommend Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left">
            <li><a href="<?php echo $this->createUrl('index') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Recommend Manage'); ?></span></a></li>
        </ul>        
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm'); ?>
    <table border="0" cellpadding="0" cellspacing="0" class="content_list">
        <thead>
            <tr class="tb_header">
                <th width="8%"><?php echo $form->label($model, 'id');?></th>                
                <th width="15%"><?php echo $form->label($model, 'title');?></th>                
            </tr>
        </thead>
        <?php foreach ($datalist as $dk => $row): ?>    
            <tr class="tb_list">
                <td><input type="radio" name="position_id" value="<?php echo $row->id; ?>" /><?php echo $row->id; ?></td>
                <td><?php echo $row->title; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="operate">
            <td colspan="6">
                <div class="cuspages right">
                <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel">                                        
                    <input id="submit_maskall" class="button" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>
    </table>
<?php $this->endWidget();