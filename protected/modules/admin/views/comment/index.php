<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Comment Manage'); ?></h3>
    <div class="searchArea">    
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action'=>array('index'))); ?>
            <?php echo Yii::t('admin', 'Content Type'); ?>
            <select id="type" name="type">
                <option value=""><?php echo Yii::t('common', 'All'); ?></option>
                <?php foreach ($model_types as $tv): ?>                    
                    <option value="<?php echo $tv->id; ?>"><?php echo $tv->type_name; ?></option>
                <?php endforeach; ?>
            </select>
            
            <?php echo Yii::t('admin', 'Comment Status'); ?>            
            <select id="status" name="status">     
                <option value=""><?php echo Yii::t('common', 'All'); ?></option> 	  
                <option value="Y"><?php echo Yii::t('admin', 'Pass Checking'); ?></option>
                <option value="N"><?php echo Yii::t('admin', 'Wait Checking'); ?></option>
            </select>
            
            <?php echo Yii::t('admin', 'Comment Content'); ?>
            <input id="content" type="text" name="content" value="<?php echo Yii::app()->request->getParam('content') ?>" class="txt" size="15"/>
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>
            <script type="text/javascript">
                $(document).ready(function () {                    
                    $("#type").val('<?php echo Yii::app()->request->getParam('type') ?>');
                    $("#status").val('<?php echo Yii::app()->request->getParam('status') ?>');
                });
            </script> 
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('batch'))); ?>
    <table class="content_list">
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id');?></th>
            <th><?php echo $form->label($model, 'content');?></th>
            <th width="10%"><?php echo $form->label($model, 'id');?></th>
            <th width="15%"><?php echo $form->label($model, 'id');?></th>
            <th width="8%"><?php echo $form->label($model, 'id');?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>   
            <tr class="tb_list" >
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
                <td> <div style="max-height:110px; overflow:auto;"><?php echo $row->content ?></div></td>
                <td><?php echo $row->status == 'Y' ? "<span style='color:green'>" . Yii::t('admin', 'Pass Checking') . "</span>" : "<span style='color:red'>" . Yii::t('admin', 'Wait Checking') . "</span>"; ?></td>
                <td><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>
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
                        <option value="show"><?php echo Yii::t('admin', 'Verify Pass'); ?></option>
                        <option value="hide"><?php echo Yii::t('admin', 'Cancel Verify'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>
    </table>
<?php $this->endWidget();