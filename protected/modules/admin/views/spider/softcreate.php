<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Spider Soft'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li ><a href="<?php echo $this->createUrl('soft') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'Go Back'); ?></span></a></li>
            <li class="current"><a href="<?php echo $this->createUrl('softCreate') ?>" class="btactionBtnn"><span><?php echo Yii::t('admin', 'Add'); ?></span></a></li>
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
        <td><?php echo $form->label($model, 'id');?>：</td>
    </tr>
    <tr>        
        <td><?php echo $form->dropDownList($model, 'id', $sites); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label($model, 'cur_page');?>：</td>
    </tr>
    <tr>
        <td id="cur_page"><?php echo $model->cur_page; ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'total_page');?>：</td>
    </tr>
    <tr>
        <td id="total_page"><?php echo $model->total_page; ?></td>
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
        //选择站点ajax请求
        $('#SpiderSetting_id').change(function(){
            var url = '<?php echo $this->createUrl('ajax')?>';
            var params = {
                'id' : $(this).val(),
                'act': 'getSite'
            };
            if(params.id <= 0) {
                return;
            }
            $.getJSON(url, params, function(res) {
                if(res && res.code == 200 && res.data) {
                    $('#cur_page').text(res.data.cur_page);
                    $('#total_page').text(res.data.total_page);
                } else {
                    $('#cur_page').text('获取失败');
                    $('#total_page').text('获取失败');
                }
            });
        });
        
        //循环执行
        clearInterval(test);  //清理一次，下面再执行
        var test = setInterval(function(){
            var iframe = getframe('spiderIframe');
            if(iframe.body && iframe.body.innerText) {
                var html = iframe.body.innerText;
                iframe.body.scrollTop = 10000000;               
                if(html.indexOf('采集完成') >= 0) {
                    clearInterval(test);
                }
            }
        },200);        
    });    
</script>
