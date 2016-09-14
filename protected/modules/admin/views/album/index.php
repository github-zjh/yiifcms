<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Image Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left">
            <li><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'add'); ?></span></a></li>
        </ul>
        <div class="search right">
            <?php $this->beginWidget('CActiveForm', array('id' => 'searchForm', 'method' => 'get', 'action' => array('index'), 'htmlOptions' => array('name' => 'xform', 'class' => 'right '))); ?>

            <?php echo Yii::t('admin','Status');?>:
            <select name="status">
                <?php foreach($statusList as $key => $v):?>
                    <option value="<?php echo $key?>" <?php Helper::selected($key, $status);?>><?php echo $v?></option>
                <?php endforeach;?>
            </select>

            <select class="cat_select">
                <option value="">=<?php echo Yii::t('admin', 'All Content'); ?>=</option>
                <?php foreach ((array) $this->_catalog as $catalog): ?>
                    <option value="<?php echo $catalog['id'] ?>"><?php echo $catalog['catalog_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" id="catalogId" name="catalogId" value="<?php echo Yii::app()->request->getParam('catalogId') ?>"/>
            <span class="loading" style="display:none;">loading...</span>
            
            <?php echo Yii::t('admin', 'Title'); ?>
            <input id="title" type="text" name="title" value="<?php echo Yii::app()->request->getParam('title') ?>" class="txt" size="15"/> 
            <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin', 'Query'); ?>" class="button "/>
            <input name="searchsubmit" type="reset"  value="<?php echo Yii::t('admin', 'Reset'); ?>" class="button "/>     
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action' => $this->createUrl('batch'), 'htmlOptions' => array('name' => 'cpform'))); ?>
    <table border="0" cellpadding="0" cellspacing="0" class="content_list"> 
        <thead>
            <tr class="tb_header">
                <th width="10%"><?php echo $form->label($model, 'id'); ?></th>
                <th><?php echo $form->label($model, 'title'); ?></th>
                <th width="12%"><?php echo $form->label($model, 'catalog_id'); ?></th>
                <th width="8%"><?php echo $form->label($model, 'status'); ?></th>
                <th width="8%"><?php echo $form->label($model, 'commend'); ?></th>
                <th width="8%"><?php echo $form->label($model, 'view_count'); ?></th>
                <th width="15%"><?php echo $form->label($model, 'create_time'); ?></th>
                <th><?php echo Yii::t('admin', 'Operate'); ?></th>
            </tr>
        </thead>
        <?php foreach ($datalist as $row): ?>
        <tr class="tb_list" <?php if ($row->status == 'N'): ?>style=" background:#F0F7FC"<?php endif ?>>
            <td ><input type="checkbox" name="id[]" value="<?php echo $row->id ?>">
                <?php echo $row->id ?></td>
            <td ><a href="<?php echo $this->createUrl('/album/view', array('id' => $row['id'])); ?>" title="<?php echo $row->title; ?>" target="_blank" style="<?php echo $this->formatStyle($row->title_style); ?>"><?php echo Helper::truncate_utf8_string($row->title, 20); ?></a><br />
            </td>
            <td ><?php echo $row->catalog->catalog_name ?></td>
            <td>
                <?php if($row->status == 'Y'): ?>
                <span class="color_show">√</span>
                <?php else:?>
                <span class="color_hide">×</span>
                <?php endif;?>
            </td>
            <td>
                <?php if ($row->commend == 'Y') {
                    echo Yii::t('admin', 'Yes');
                } else {
                    echo Yii::t('admin', 'No');
                } ?>
            </td>
            <td><span ><?php echo $row->view_count ?></span></td>
            <td ><?php echo date('Y-m-d H:i', $row->create_time) ?></td>
            <td >
                <a href="<?php echo $this->createUrl('update', array('id' => $row->id)) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row->id)) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
                <a href="<?php echo $this->createUrl('/album/view', array('id' => $row['id'])) ?>" target="_blank"><img src="<?php echo $this->module->assetsUrl; ?>/images/view.png" align="absmiddle" /></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr class="operate">
            <td colspan="6">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar, 'header'=>'<label class="itemCount">共'.$pagebar->getItemCount().'条</label>')); ?>
                </div>
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                        <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                        <option value="hidden"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                        <option value="commend" id="recom"><?php echo Yii::t('admin', 'Recommend'); ?></option>            
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div>
            </td>
        </tr>
    </table>
<?php $this->endWidget();?>
<script type="text/javascript">
    $(function(){
        $('#searchForm').delegate('.cat_select','change',function(){
            var id = $(this).val();
            var url =  "<?php echo $this->createUrl('catalog/children');?>";
            var sel = $(this);
            var val = $(this).val();
            $(this).nextAll('.cat_select').remove();
            if(id <= 0) {
                $('#catalogId').val(val);
                return false;
            }
            $('.loading').show();
            $.getJSON(url, {'id':id}, function(data){                
                if(data && data.length > 0) {
                    var html = '<select class="cat_select">'
                        + '<option value="0">==<?php echo Yii::t('admin', 'Select Category'); ?>==</option>';                
                        $.each(data, function(i, item){                    
                            html += '<option value="'+item.id+'">'+item.name+'</option>';
                        });
                    $(sel).after(html);
                }
                $('.loading').hide();
            });
            $('#catalogId').val(val);            
        });
    });
</script>