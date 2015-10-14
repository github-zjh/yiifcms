<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Attach Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left"></ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action' => array('index'))); ?>
            <?php echo Yii::t('admin', 'Real Name'); ?>
            <input type="text" name="file_name" value="<?php echo Yii::app()->request->getParam('file_name') ?>" class="txt" size="15"/>
            <?php echo Yii::t('admin', 'File Name'); ?>
            <input type="text" name="real_name" value="<?php echo Yii::app()->request->getParam('real_name') ?>" class="txt" size="15"/>
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>           
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'))); ?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id');?></th>
            <th width="20%"><?php echo $form->label($model, 'file_name');?></th>
            <th><?php echo $form->label($model, 'real_name');?></th>
            <th width="10%"><?php echo $form->label($model, 'file_size');?></th>
            <th width="15%"><?php echo $form->label($model, 'create_time');?></th>
            <th width="8%"><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>"><?php echo $row->id ?></td>
                <td>
                    <a href="<?php echo Helper::getFullUrl($row->file_name); ?>" target="_blank">
                        <?php if (in_array($row->file_ext, array('jpg', 'png', 'bmp', 'gif'))): ?>
                        <img src="<?php echo Helper::getFullUrl($row->file_name);?>" alt="<?php echo $row->real_name ?>" width="70"  height="70" title="<?php echo $row->real_name ?>"/>
                        <?php else: ?>
                            <?php echo $row->real_name ?>
                        <?php endif; ?>
                    </a>
                </td>
                <td><p><?php echo $row->real_name ?></p>
                <td><span ><?php echo Helper::byteFormat($row->file_size) ?></span></td>
                <td><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
                <td><a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a></td>
            </tr>
        <?php endforeach; ?>
        <tr class="submit">
            <td colspan="9">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel" >
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();

