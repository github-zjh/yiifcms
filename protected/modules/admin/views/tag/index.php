<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Tags Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left">
            <li><a href="<?php echo $this->createUrl('reset') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Reset Tags'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action' => array('index'))); ?>
            <?php echo Yii::t('admin', 'Tag Name'); ?>
            <input type="text" name="tag_name" value="<?php echo Yii::app()->request->getParam('tag_name') ?>" class="txt" size="15"/>
            <input type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>            
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => array('batch')));?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id');?></th>     
            <th width="20%"><?php echo $form->label($model, 'tag_name');?></th>
            <th width="10%"><?php echo $form->label($model, 'data_count');?></th>
            <th width="8%"><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>      
                <td><?php echo $row->tag_name ?></td>
                <td><span ><?php echo $row->data_count ?></span></td>
                <td><a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();