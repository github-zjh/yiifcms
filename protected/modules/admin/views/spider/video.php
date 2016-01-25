<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Video'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li><a href="<?php echo $this->createUrl('videoCreate') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
            <li><a href="<?php echo $this->createUrl('batch', array('command' => 'truncate', 'status' => SpiderVideoList::STATUS_C, 'type' => 'video')) ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Truncate Spider Data'); ?></span></a></li>
            <li><a href="<?php echo $this->createUrl('batch', array('command' => 'truncate', 'status' => SpiderVideoList::STATUS_SUCCESS, 'type' => 'video')) ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Truncate Import Data'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('method' => 'get', 'action' => array('spider/video'))); ?>
            <?php echo Yii::t('model', 'SpiderVideoListStatus'); ?>
            <select class="cat_select" name="status">                
                <?php foreach ($this->status as $key => $value): ?>
                <option value="<?php echo $key?>" <?php if($status == $key):?> selected<?php endif;?>><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
            
            <?php echo Yii::t('model', 'SpiderVideoListTitle'); ?>
            <input type="text" name="title" value="<?php echo Yii::app()->request->getParam('title') ?>" />        
            <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin', 'Query'); ?>" class="button"/>            
            <?php $this->endWidget(); ?>     
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'))); ?>
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
                <td><?php if($row->spiderset):?><a href="<?php echo $row->spiderset->url;?>" target="_blank"><?php echo $row->spiderset->site; ?></a><?php endif;?></td>
                <td><?php echo $this->status[$row->status] ?></td>
                <td>
                    <a href="<?php echo $this->createUrl('videoUpdate', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                    <a href="<?php echo $this->createUrl('batch', array('command' => 'deleteData', 'id' => $row->id, 'type' => 'video')) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
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
                        <option value="deleteData"><?php echo Yii::t('admin', 'Delete'); ?></option>
                        <option value="import"><?php echo Yii::t('admin', 'Import'); ?></option>
                    </select>
                    <input type="hidden" name="type" value="video" />
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>    
    </table>
<?php $this->endWidget();