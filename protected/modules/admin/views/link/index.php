<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Link Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li class="current"><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'add'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('method' => 'get', 'action' => array('index'))); ?>
            <?php echo Yii::t('admin', 'Title'); ?>
            <input id="title" type="text" name="title" value="<?php echo Yii::app()->request->getParam('title') ?>" class="txt" size="15"/>
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>            
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('batch'))); ?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="5%"><?php echo $form->label($model, 'id');?></th>
            <th width="25%"><?php echo $form->label($model, 'title');?></th>
            <th width="10%"><?php echo $form->label($model, 'sort_order');?></th>
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
                <td>
                    <?php echo $row->title ?>
                    <?php if ($row->logo): ?>
                        <img src="<?php echo $this->module->assetsUrl; ?>/images/image.png" align="absmiddle" />
                    <?php endif; ?>
                    <?php if ($row->status == 'N'): ?>
                        <img src="<?php echo $this->module->assetsUrl; ?>/images/error.png" align="absmiddle" />
                    <?php endif; ?>
                </td>
                <td><?php echo $row->sort_order;?></td>
                <td>
                    <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $row->url; ?>" target="_blank"><img src="<?php echo $this->module->assetsUrl; ?>/images/view.png" align="absmiddle" /></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="submit">
            <td colspan="4">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel" >
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                        <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                        <option value="hide"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();