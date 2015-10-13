<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Question Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'htmlOptions' => array('name' => 'xform'))); ?>     
            <?php echo Yii::t('admin', 'RealName'); ?>:
            <input type="text" name="realname" value="<?php echo Yii::app()->request->getParam('realname') ?>" class="txt" size="15"/>
            <?php echo Yii::t('admin', 'Content'); ?>:
            <input type="text" name="question" value="<?php echo Yii::app()->request->getParam('question') ?>" class="txt" size="15"/>
            <input name="searchsubmit" type="submit" class="button" value="<?php echo Yii::t('admin', 'Query'); ?>"/>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'), 'htmlOptions' => array('name' => 'cpform'))); ?>
    <table class="content_list">
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id');?></th>
            <th><?php echo $form->label($model, 'question');?></th>
            <th width="15%"><?php echo $form->label($model, 'create_time');?></th>
            <th width="8%"><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
                <td><?php echo nl2br(htmlspecialchars($row->question)) ?></td>
                <td><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="submit">
            <td colspan="5">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel">
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