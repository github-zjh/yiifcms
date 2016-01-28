<div id="contentHeader">
    <h3>数据库还原</h3>
    <div class="searchArea">
        <?php $this->renderPartial('menu');?>
        <div class="search right"></div>
    </div>
</div>
<?php $form = $this->beginWidget('CActiveForm'); ?>
    <table class="content_list">
        <thead>
            <tr class="tb_header">
                <th width="4%"align="left"></th>
                <th>名称</th>
                <th width="10%">文件大小</th>
                <th width="20%">备份时间</th>
                <th width="10%">分卷</th>
                <th width="15%">恢复/下载</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($infos)): ?>
                <?php foreach ($infos as $info): ?>
                    <tr>
                        <td ><input name="sqlfile[]" type="checkbox" value="<?php echo $info['filename'] ?>"></td>
                        <td><?php echo $info['filename'] ?></td>
                        <td><?php echo $info['filesize'] ?></td>
                        <td><?php echo $info['maketime'] ?></td>
                        <td><?php echo $info['number'] ?></td>
                        <td>
                            <a href="<?php echo $this->createUrl('import', array('command' => 'import', 'sqlfile' => $info['filename'])) ?>"  target="importResult"><img src="<?php echo $this->module->assetsUrl; ?>/images/refresh.png" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;                             
                            <a href="<?php echo $this->createUrl('import', array('command' => 'download', 'sqlfile' => $info['filename'])) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/download.png" align="absmiddle" /></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tr class="submit">
            <td colspan="6">
                <input name="command" type="hidden" value="delete" />                
                <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'file')">
                <?php echo Yii::t('admin', 'Check All');?>
                <input name="submit" type="submit" value="<?php echo Yii::t('admin','Delete')?>" class="button"/>
                &nbsp;
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
