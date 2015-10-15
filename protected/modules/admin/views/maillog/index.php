<!-- 日期控件 -->
<script type="text/javascript" src="<?php echo $this->_static_public;?>/js/My97DatePicker/WdatePicker.js"></script>

<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Maillog Manage'); ?></h3>
    <div class="searchArea">    
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'htmlOptions' => array('name' => 'xform'))); ?>

            <?php echo Yii::t('admin', 'Mail Accept'); ?>：
            <input id="accept" type="text" name="accept" value="" size="15"/>
            <?php echo Yii::t('admin', 'Mail Subject'); ?>：
            <input id="subject" type="text" name="subject" value="" size="15"/>
            <?php echo Yii::t('admin', 'Mail SendTime'); ?>：
            <input id="start_time" type="text" datePicker="true" name="start_time" value="" size="20"/>     
            -
            <input id="end_time" type="text" datePicker="true" name="end_time" value="" size="20"/>

            <input type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>
            <input type="reset" value="<?php echo Yii::t('admin', 'Reset'); ?>" class="button"/>
            <?php $this->endWidget(); ?>     
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => array('batch')));?>
    <table class="content_list">
        <tr class="tb_header">
            <th width="8%">ID</th>   
            <th width="12%" ><?php echo Yii::t('model', 'MailAccept') ?></th> 
            <th width="10%"><?php echo Yii::t('model', 'MailSubject') ?></th>      
            <th width="15%"><?php echo Yii::t('model', 'MailMessage') ?></th>
            <th width="5%"><?php echo Yii::t('model', 'MailStatus'); ?></th>
            <th width="15%"><?php echo Yii::t('model', 'MailError'); ?></th>
            <th width="15%"><?php echo Yii::t('model', 'MailSendtime'); ?></th>
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>   
            <tr class="tb_list" >
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>     
                <td><?php echo $row->accept ?></td>
                <td><?php echo $row->subject ?></td>
                <td> <div style="max-height:110px; overflow:auto;"><?php echo $row->message ?></div></td>
                <td><?php echo $row->status == 'success' ? "<span style='color:green'>" . Yii::t('admin', 'Success') . "</span>" : "<span style='color:red'>" . Yii::t('admin', 'Failed') . "</span>"; ?></td>
                <td><?php echo $row->error ? $row->error : '--'; ?></td>
                <td><?php echo date('Y-m-d H:i', $row->sendtime) ?></td>
                <td>      
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
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>
    </table>
<?php $this->endWidget();?>
<script type="text/javascript">
    $(function () {
        //搜索条件
        $("#accept").val('<?php echo Yii::app()->request->getParam('accept') ?>');
        $("#subject").val('<?php echo Yii::app()->request->getParam('subject') ?>');
        $("#start_time").val('<?php echo Yii::app()->request->getParam('start_time') ?>');
        $("#end_time").val('<?php echo Yii::app()->request->getParam('end_time') ?>');
    });
</script>