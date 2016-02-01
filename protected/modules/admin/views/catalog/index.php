<style type="text/css">
    .cat_btn { margin:0 5px; display:inline-block; width:24px; height:24px; line-height: 24px; color:#FFFFFF; background-color: #428BCA; text-decoration: none; font-size:14px; text-align: center;}
    .cat_btn:hover { text-decoration: none;}
</style>
<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Catalog Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li class="current"><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'add'); ?></span></a></li>
        </ul>
        <div class="search right"> </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'cpform', 'action' => $this->createUrl('batch'), 'htmlOptions' => array('name' => 'zip_form'))); ?>
<table class="content_list">  
    <tr class="tb_header">
        <th><?php echo $form->label($model, 'id'); ?></th>
        <th><?php echo $form->label($model, 'sort_order'); ?></th>
        <th><?php echo $form->label($model, 'catalog_name'); ?></th>  
        <th><?php echo $form->label($model, 'type'); ?></th>     
        <th><?php echo $form->label($model, 'status'); ?></th>
        <th><?php echo $form->label($model, 'create_time'); ?></th>
        <th><?php echo $form->label($model, 'update_time'); ?></th>
        <th><?php echo Yii::t('admin', 'Operate'); ?></th>
    </tr>
    <?php foreach ((array) $datalist as $row): ?>
        <tr class="tb_list catalog" id="<?php echo 'cat_'.$row['id'];?>">
            <td><input type="checkbox" name="id[]" value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></td>
            <td><input name="sortOrder[<?php echo $row['id'] ?>]" type="text" id="sortOrder[]" value="<?php echo $row['sort_order'] ?>" size="5" /></td>
            <td>
                <a href="javascript:;" class="cat_btn" data-url="<?php echo $this->createUrl('catalog/children', array('id' => $row['id']));?>">+</a>                
                <a href="<?php echo $this->createUrl('update', array('id' => $row['id'])) ?>">
                    <?php echo $row['catalog_name'] ?>
                </a>        
            </td>     
            <td><?php echo ModelType::getTypeName($row['type']); ?></td>
            <td>
                <?php if ($row['status'] == Catalog::STATUS_SHOW):?>
                <span class="color_show">√</span>
                <?php else:?>
                <span class="color_hide">×</span>
                <?php endif;?>
            </td>
            <td><?php echo date('Y-m-d H:i', $row['create_time']) ?></td>
            <td><?php echo date('Y-m-d H:i', $row['update_time']) ?></td>
            <td>
                <a href="<?php echo $this->createUrl('update', array('id' => $row['id'])) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
                <a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row['id'])) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>                
            </td>
        </tr>
    <?php endforeach; ?>
    <tr class="submit">
        <td colspan="9">
            <div class="fixsel">
                <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                <select name="command">
                    <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                    <option value="sortOrder"><?php echo Yii::t('admin', 'Sort Order'); ?></option>
                    <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                    <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                    <option value="hidden"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                </select>
                <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
            </div>
            <div class="cuspages right">
            <?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
            </div>
        </td>
    </tr>
</table>
<?php $this->endWidget();?>
<script type="text/javascript">
    $(function(){
        //分类展开与收起
        $('.content_list').delegate('.cat_btn', 'click',function(){
            var tr_id = $(this).closest('tr').attr('id');  
            if($(this).hasClass('cat_down')) {
                $(this).removeClass('cat_down').html('+');     
                $('.'+tr_id+'_children').remove();
                $('.loading').remove();
            } else {
                $(this).addClass('cat_down').html('--');
                var url = $(this).attr('data-url');
                $('#'+tr_id).after('<tr class="tb_list loading"><td>loading...</td></tr>');
                var active_id = tr_id;
                $.getJSON(url,function(data){
                    $('.loading').remove();
                    $.each(data, function(i, item){
                        var space = '';
                        for(i=1;i<item.layer;i++) {
                            space += '&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        var status = '<span class="color_hide">×</span>';
                        if(item.status == 'Y') {
                            status = '<span class="color_show">√</span>';
                        }
                        var html = '<tr id="cat_'+item.id+'" class="cat_children tb_list cat_'+item.parent_id+'_children">'
                            + '<td>'+space+'├──<input type="checkbox" name="id[]" value="'+item.id+'">'+item.id+'</td>'
                            + '<td>'+space+'<input type="text" name="sortOrder['+item.id+']" value="'+item.sort_order+'" id="sortOrder[]" size="5" ></td>'
                            + '<td>'+space+'<a href="javascript:;" class="cat_btn"  data-url="'+item.children_url+'">+</a><a href="javascript:;">'+item.name+'</a></td>'
                            + '<td>'+space+''+item.type+'</td>'
                            + '<td>'+space+''+status+'</td>'
                            + '<td>'+space+''+item.create_time+'</td>'
                            + '<td>'+space+''+item.update_time+'</td>'
                            + '<td>'
                            + '    <a href="'+item.update_url+'"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;'
                            + '    <a href="'+item.delete_url+'" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a>'                          
                            + '</td>'
                            + '</tr>';                            
                            $('#'+active_id).after(html);
                            active_id = 'cat_'+item.id;
                    });                    
                });                
            }
        });
    });
</script>
