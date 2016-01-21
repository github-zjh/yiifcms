<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Setting'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('method' => 'get', 'action' => array('spider/index'))); ?>
            <?php echo Yii::t('model', 'SpiderSettingType'); ?>
            <select class="cat_select" name="type">
                <option value="">=<?php echo Yii::t('admin', 'All Content'); ?>=</option>
                <?php foreach ($this->_type_names as $type_id => $type_name): ?>
                <option value="<?php echo $type_id?>" <?php if(Yii::app()->request->getParam('type') == $type_id):?> selected<?php endif;?>><?php echo $type_name ?></option>
                <?php endforeach; ?>
            </select>
            
            <?php echo Yii::t('model', 'SpiderSettingSite'); ?>
            <input type="text" name="site" value="<?php echo Yii::app()->request->getParam('site') ?>" />        
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>     
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'))); ?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id'); ?></th>
            <th width="8%"><?php echo $form->label($model, 'type'); ?></th>
            <th width="10%"><?php echo $form->label($model, 'site'); ?></th>            
            <th width="40%"><?php echo $form->label($model, 'url'); ?></th>
            <th width="10%"><?php echo $form->label($model, 'cur_page'); ?></th>
            <th width="10%"><?php echo $form->label($model, 'total_page'); ?></th>
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
                <td><?php echo $this->_type_names[$row->type]; ?></td>
                <td><?php echo $row->site ?></td>
                <td><?php echo $row->url ?></td>
                <td><?php echo $row->cur_page ?></td>
                <td><?php echo $row->total_page ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel" >
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option value=""><?php echo Yii::t('admin', 'Select Operate'); ?></option>                        
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();