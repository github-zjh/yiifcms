<div id="contentHeader">
    <h3>数据库备份</h3>
    <div class="searchArea">
        <?php $this->renderPartial('menu');?>
        <div class="search right"> </div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('action'=>array('export'), 'htmlOptions' => array('target' => 'exportResult'))); ?>
    <table class="content_list">
        <tr>
            <td class="tb_title">分卷大小：</td>
        </tr>
        <tr>
            <td>                
                大小
                <input name="sizelimit" type="text" id="sizelimit" value="2048" />
                kb<br />
            </td>
        </tr>
        <tr class="submit">
            <td><input type="submit" value="开始备份" class="button" /></td>
        </tr>
    </table>
<?php $this->endWidget();?>
<iframe name="exportResult" id="exportIframe" style="margin-top:20px; border:0; width:80%; height:300px;"></iframe>
<script type='text/javascript'>
    function getframe(iframeid){
        var Oframe=document.getElementById(iframeid).contentDocument||document.frames[iframeid].document;
        return Oframe;
    }
    $(function(){
        //循环执行
        clearInterval(test);  //清理一次，下面再执行
        var test = setInterval(function(){
            var iframe = getframe('exportIframe');
            if(iframe.body.innerText) {
                var html = iframe.body.innerText;
                iframe.body.scrollTop = 10000000;               
                if(html.indexOf('备份完成') >= 0) {
                    clearInterval(test);
                }
            }
        },200);        
    });    
</script>
