<div id="contentHeader">
    <h3><?php echo Yii::t('admin','Database Manage')?></h3>
    <div class="searchArea">
        <?php $this->renderPartial('menu');?>
        <div class="search right"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.form.js"></script>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('batch'), 'id' => 'queryForm')); ?>
    <table cellspacing="0" cellpadding="0" class="content_list">
        <thead>
            <tr class="operate">
                <th colspan="8" ><?php echo Yii::t('admin','Database Size');?>：<?php echo Helper::byteFormat($dataSize) ?></th>
            </tr>
            <tr class="tb_header">
                <th style="width:5%">&nbsp;</th>
                <th style="width:15%"><?php echo Yii::t('admin','Table Name');?></th>
                <th style="width:10%"><?php echo Yii::t('admin','Table Engine');?></th>
                <th style="width:15%"><?php echo Yii::t('admin','Table Charset');?></th>
                <th style="width:8%"><?php echo Yii::t('admin','Table Rows');?></th>
                <th style="width:8%"><?php echo Yii::t('admin','Table Size');?></th>
                <th style="width:8%"><?php echo Yii::t('admin','Table Chunk');?></th>
                <th><?php echo Yii::t('admin','Table Comment');?></th>
            </tr>
        </thead>
        <?php foreach ((array) $dataList as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="table[]" value="<?php echo $row['Name'] ?>" id="<?php echo $row['Name'] ?>"></td>
                <td><label for="<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?></label></td>
                <td><?php echo $row['Engine'] ?></td>
                <td><?php echo $row['Collation'] ?></td>
                <td><?php echo $row['Rows'] ?></td>
                <td><?php echo Helper::byteFormat($row['Data_length']) ?></td>
                <td><?php echo $row['Data_free'] ?></td>
                <td><?php echo $row['Comment'] ?></td>
            </tr>
        <?php endforeach ?>
        <tr class="submit">
            <td colspan="8">
                <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'table')">
                <?php echo Yii::t('admin','Check All');?>
                <select name="command">
                    <option value="optimze"><?php echo Yii::t('admin', 'Optimze Table');?></option>
                    <option value="show"><?php echo Yii::t('admin', 'Show Table');?></option>
                    <option value="check"><?php echo Yii::t('admin', 'Check Table');?></option>
                    <option value="analyze"><?php echo Yii::t('admin', 'Analyze Table');?></option>
                    <option value="repair"><?php echo Yii::t('admin', 'Repair Table');?></option>
                </select>
                <input type="submit" id="submit" value="<?php echo Yii::t('common','Submit');?>" class="button"/>
            </td>
        </tr>
    </table>
<?php $this->endWidget();?>
<div id="_tips"></div>
<script type='text/javascript'>
    $('#queryForm').ajaxForm({
        beforeSubmit: function () {
        },
        success: function (html) {
            if (html.length > 0) {
                $("#_tips").html(html);
            }
        }
    });
</script>

