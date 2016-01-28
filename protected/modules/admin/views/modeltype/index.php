<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Modeltype Manage'); ?></h3>
    <div class="searchArea">        
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action' => array('index'))); ?>
            <?php echo Yii::t('admin', 'Title'); ?>
            <input type="text" name="type_name" value="<?php echo Yii::app()->request->getParam('type_name') ?>" class="txt" size="15"/>
            <input type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('batch')));?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="5%"><?php echo $form->label($model, 'id');?></th>
            <th width="10%"><?php echo $form->label($model, 'type_name');?></th>    
            <th width="10%"><?php echo $form->label($model, 'type_key');?></th> 
            <th width="20%"><?php echo $form->label($model, 'model');?></th>  
            <th width="10%"><?php echo $form->label($model, 'status');?></th>       
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
        <tr class="tb_list">
            <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
            <td><?php echo $row->type_name ?>
                <?php if ($row->status == 'N'): ?>
                    <img src="<?php echo $this->module->assetsUrl; ?>/images/error.png" align="absmiddle" />[<?php echo Yii::t('admin', 'Hidden'); ?>]
                <?php endif; ?>
            </td>   
            <td><?php echo $row->type_key ?></td>  
            <td><?php echo $row->model ?> 
            <td>
                <?php if ($row->status == 'Y'):?>
                <span class="color_show">√</span>
                <?php else:?>
                <span class="color_hide">×</span>
                <?php endif;?>
            </td>    
            <td>
                <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;      
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
                        <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                        <option value="hide"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();