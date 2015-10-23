<div id="contentHeader">    
    <h3><?php echo Yii::t('admin', 'Database Query') ?></h3>
    <div class="searchArea">
        <?php $this->renderPartial('menu'); ?>
        <div class="search right"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.form.js"></script>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('query'), 'id' => 'queryForm')); ?>
    <table class="content_list">
        <tr>
            <td class="tb_title">输入SQL：</td>
        </tr>
        <tr>
            <td><textarea name="command" cols="100" rows="8" id="command"  ></textarea></td>
        </tr>
        <tr>
            <td>每行一条SQL语句</td>
        </tr>
        <tr class="submit">
            <td><input name="execute" type="submit" id="execute" value="提交" class="button" /></td>
        </tr>
    </table>
<?php $this->endWidget();?>
<div id="_tips"></div>
<script type='text/javascript'>
    $('#queryForm').ajaxForm({
        beforeSubmit: function () {
            if ($("#command").val() == '') {
                alert("SQL不能为空");
                return false;
            }
        },
        success: function (html) {
            if (html.length > 0) {
                $("#_tips").html(html);
            }
        }
    });
</script> 
