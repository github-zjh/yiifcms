<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Install Test Data'); ?></h3>  
    <div class="searchArea">
        <?php $this->renderPartial('menu'); ?>
        <div class="search right"></div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('target'=>'importResult'))); ?>
    <table class="content_list">
        <tr class="noborder">
            <td class="vtop rowform">        	
                <label>安装测试数据前，请先做好备份，默认安装/protected/data/temp/install_data.sql文件.</label>
            </td>
        </tr>    
        <tr class="submit">
            <td >
                <input type="submit" value="确认安装" class="button" tabindex="3" />       
            </td>
        </tr>
    </table>
<?php $this->endWidget();?>
<iframe name="importResult" id="importIframe" style="margin-top:20px; border:0; width:80%; height:300px;"></iframe>
<script type='text/javascript'>
    function getframe(iframeid){
        var Oframe=document.getElementById(iframeid).contentDocument||document.frames[iframeid].document;
        return Oframe;
    }
    $(function(){
        //循环执行
        clearInterval(test);  //清理一次，下面再执行
        var test = setInterval(function(){
            var iframe = getframe('importIframe');
            if(iframe.body.innerText) {
                var html = iframe.body.innerText;
                iframe.body.scrollTop = 10000000;               
                if(html.indexOf('导入完成') >= 0) {
                    clearInterval(test);
                }
            }
        },200);        
    });    
</script>

