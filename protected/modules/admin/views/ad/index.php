<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Ad Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action' => array('index'), 'htmlOptions' => array('name' => 'xform'))); ?>
            <select name="position_id" id="positionID">            
                <?php foreach ((array) $this->_adposition as $key => $position): ?>
                    <option value="<?php echo $key; ?>" <?php if(Yii::app()->request->getParam('position_id') == $key):?>selected<?php endif;?>><?php echo $position; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo Yii::t('admin', 'Title'); ?>
            <input id="title" type="text" name="title" value="<?php echo Yii::app()->request->getParam('title');?>" class="txt" size="15"/>
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>      
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'), 'htmlOptions' => array('name' => 'cpform'))); ?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="10%"><?php echo $form->label($model, 'id'); ?></th>
            <th width="20%"><?php echo $form->label($model, 'title'); ?></th>      
            <th width="30%"><?php echo $form->label($model, 'title_alias'); ?></th> 
            <th width="10%"><?php echo $form->label($model, 'create_time'); ?></th>
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>"><?php echo $row->id ?></td>
                <td>
                    <?php echo $row->title ?>
                    <?php if ($row->status == Ad::STATUS_HIDE): ?>
                        <img src="<?php echo $this->module->assetsUrl; ?>/images/error.png" align="absmiddle" />[<?php echo Yii::t('admin', 'Hidden'); ?>]
                    <?php endif; ?>
                </td>   
                <td><?php echo $row->title_alias ?></td>   
                <td><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $row->link_url; ?>" target="_blank"><img src="<?php echo $this->module->assetsUrl; ?>/images/view.png" align="absmiddle" /></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="submit">
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
                        <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                        <option value="hide"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();?>

