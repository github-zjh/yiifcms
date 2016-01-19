<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Post'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li><a href="<?php echo $this->createUrl('postCreate') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('method' => 'get', 'action' => array('spider/post'))); ?>
            <?php echo Yii::t('model', 'SpiderPostListTitle'); ?>
            <input type="text" name="title" value="<?php echo Yii::app()->request->getParam('title') ?>" />        
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>     
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('postBatch'))); ?>
    <table class="content_list">    
        <tr class="tb_header">
            <th width="8%"><?php echo $form->label($model, 'id'); ?></th>
            <th width="20%"><?php echo $form->label($model, 'title'); ?></th>            
            <th width="20%"><?php echo $form->label($model, 'url'); ?></th>
            <th width="15%"><?php echo $form->label($model, 'site_id'); ?></th>
            <th width="10%"><?php echo $form->label($model, 'status'); ?></th>
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ($datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>" /><?php echo $row->id ?></td>
                <td><?php echo $row->title ?></td>
                <td><?php echo $row->url ?></td>
                <td><a href="<?php echo $row->spiderset->url;?>" target="_blank"><?php echo $row->spiderset->site; ?></a></td>
                <td><?php echo $this->status[$row->status] ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('postUpdate', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('postbatch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('header'=>'共有'.$pagebar->itemCount.'条', 'pages' => $pagebar)); ?>
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