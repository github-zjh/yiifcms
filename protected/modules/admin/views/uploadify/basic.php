<script type="text/javascript" src="<?php echo $this->_static_public?>/js/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_static_public?>/js/uploadify/uploadify.css">
<style>
body { background: #E7EDEF }
</style>

<form>
  <input id="uploadify" name="uploadify" type="file" multiple="true">
  <ul id="fileListWarp">
  </ul>
  <div id="fileQueue" style="clear:both"></div>
</form>
<script type="text/javascript">
		
$(function() {
    $('#uploadify').uploadify({
        'buttonText': '选择文件..',
        'fileObjName': 'imgFile',
        'method': 'post',
        'multi': true,
		'queueID': 'fileQueue',
        /*'uploadLimit': 2,*/
        'fileTypeExts': '*.gif;*.png;*.jpg;*.bmp;',
        'buttonImage': '<?php echo $this->_static_public?>/js/uploadify/select.png',
        'formData': {
            'sessionId'   : '<?php echo Yii::app()->session->sessionID; ?>',
			'timestamp'   : '<?php echo time();?>',
			'token'       : '<?php echo md5('unique_salt'.time()); ?>'
        },
        'swf': '<?php echo $this->_static_public;?>/js/uploadify/uploadify.swf',
        'uploader': '<?php echo $this->createUrl('uploadify/basicExecute')?>',  
        'onUploadSuccess': function(file, data, response) { 
            var json = $.parseJSON(data);            
            if (json.state == 'success') {
                $imgHtml = '<li id="image_' + json.fileId + '">';
                $imgHtml += '<a href="<?php echo $this->_baseUrl?>/' + json.file + '" target="_blank">';
                $imgHtml += '<img src="<?php echo $this->_baseUrl?>/'+json.file+'" width="40" height="40"  align="absmiddle"/>';
                $imgHtml += '</a>&nbsp;<br />';
                $imgHtml += '<label>描述：</label><input name="imageList[desc][]" type="text" value="" /><br/>';
                $imgHtml += '<label>网址：</label><input name="imageList[url][]" type="text" value="" /><br/>';
                $imgHtml += '<a href="javascript:uploadifyRemove(&quot;' + json.fileId + '&quot;,&quot;image_&quot;)">删除</a>';
                $imgHtml += '<input name="imageList[fileId][]" type="hidden" value="'+json.fileId+'" />';
                $imgHtml += '<input name="imageList[file][]" type="hidden" value="'+json.file+'"/>';
                $imgHtml += '<input name="imageList[thumb][]" type="hidden" value="'+json.thumb+'"/></li>';
                $("#fileListWarp").append($imgHtml);
            } else {
                alert(json.message);
            }
        }
    });
});

</script>
