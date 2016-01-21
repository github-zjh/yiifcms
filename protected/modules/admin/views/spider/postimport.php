<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Post Import'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li ><a href="<?php echo $this->createUrl('post') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Go Back'); ?></span></a></li>
            <li class="current"><a href="<?php echo $this->createUrl('postCreate') ?>" class="btactionBtnn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
        </ul>
        <div class="search right"> </div>
    </div>
</div>

<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>

<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('target' => 'spiderResult'))); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'catalog_id'); ?>：</td>
    </tr>
    <tr>
        <td>
            <select class="cat_select">
                <option value="0">==<?php echo Yii::t('admin', 'Top Category'); ?>==</option>
                <?php foreach ($this->_catalog as $catalog): ?>
                    <option value="<?php echo $catalog['id'] ?>"><?php echo $catalog['catalog_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo $form->hiddenfield($model, 'catalog_id'); ?>
            <span class="loading" style="display:none;">loading...</span>
        </td>
    </tr>
    <!-- 提交 -->
    <tr class="submit">
        <td>          
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();?>
<iframe name="spiderResult" id="spiderIframe" style="margin-top:20px; border:0; width:80%; height:500px;"></iframe>
<script type='text/javascript'>
    function getframe(iframeid){
        var Oframe=document.getElementById(iframeid).contentDocument||document.frames[iframeid].document;
        return Oframe;
    }
    $(function(){
        //循环执行
        clearInterval(test);  //清理一次，下面再执行
        var test = setInterval(function(){
            var iframe = getframe('spiderIframe');
            if(iframe.body && iframe.body.innerText) {
                var html = iframe.body.innerText;
                iframe.body.scrollTop = 10000000;               
                if(html.indexOf('导入完成') >= 0) {
                    clearInterval(test);
                }
            }
        },200);
        //选择分类
        $('.form_table').delegate('.cat_select','change',function(){
            var id = $(this).val();
            var url =  "<?php echo $this->createUrl('catalog/children');?>";
            var sel = $(this);
            var val = $(this).val();
            $(this).nextAll('.cat_select').remove();
            if(id <= 0) {
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
            $('#Post_catalog_id').val(val);            
        });
    });    
</script>
