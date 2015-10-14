<div id="contentHeader">
    <h3><span class="red">[<?php echo $recom_title; ?>]</span><?php echo Yii::t('admin', 'Recommend Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left">
            <li><a href="<?php echo $this->createUrl('index') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Recommend Manage'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'htmlOptions' => array('class' => 'right '))); ?>
            <?php echo Yii::t('admin', 'Title'); ?>
            <input type="text" name="title" value="<?php echo Yii::app()->request->getParam('title') ?>" class="txt" size="15"/>  
            <input id="id" type="hidden" name="id" value="<?php echo Yii::app()->request->getParam('id'); ?>" />
            <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin', 'Query'); ?>" class="button "/>
            <input name="reset" type="reset"  value="<?php echo Yii::t('admin', 'Reset'); ?>" class="button "/>           
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'), 'htmlOptions' => array('name' => 'cpform'))); ?>
    <table border="0" cellpadding="0" cellspacing="0" class="content_list">
        <thead>
            <tr class="tb_header">
                <th width="8%"><?php echo $form->label($model, 'id');?></th>
                <th width="4%"><?php echo $form->label($model, 'sort_order');?></th>
                <th width="15%"><?php echo $form->label($model, 'title');?></th>
                <th width="8%"><?php echo $form->label($model, 'type');?></th>                
                <th width="12%"><?php echo $form->label($model, 'create_time');?></th>
                <th width="8%"><?php echo Yii::t('admin', 'Operate'); ?></th>
            </tr>
        </thead>
        <?php foreach ($datalist as $dk => $row): ?>
            <?php
                $type = ModelType::model()->findByPk($row->type);
                if($type) {
                    $type_name = $type->type_name;
                    $view_url = Helper::getFullUrl($this->createUrl('/'.$type->type_key . '/view', array('id' => $row->content_id)));                        
                } else {
                    $type_name = '未知';
                    $view_url = 'javascript:alert("数据错误");';
                }
            ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" /><?php echo $row->id; ?></td>
                <td><input name="sortOrder[<?php echo $row->id ?>]" type="text" id="sortOrder[]" value="<?php echo $row->sort_order; ?>" size="5" /></td>
                <td>
                    <a href="<?php echo $view_url;?>" target="_blank" ><?php echo $row->title; ?></a><br />
                </td>
                <td><?php echo $type_name; ?></td>                
                <td><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
                <td><a href="<?php echo $view_url; ?>" target="_blank"><?php echo Yii::t('admin', 'View Content'); ?></a>&nbsp;&nbsp;</td>
            </tr>
        <?php endforeach; ?>
        <tr class="operate">
            <td colspan="6">
                <div class="cuspages right">
                <?php $this->widget('CLinkPager', array('pages' => $pagebar)); ?>
                </div>
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>         
                        <option value="sortOrder"><?php echo Yii::t('admin', 'Sort Order'); ?></option>   
                        <option value="unCommend"><?php echo Yii::t('admin', 'Cancel Recommend'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>
    </table>
<?php $this->endWidget();