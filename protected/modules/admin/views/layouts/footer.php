<script type="text/javascript">
$(function(){ 
    $(".confirmSubmit").click(function() {
        return confirm('本操作不可恢复，确定继续？');
    });
}); 
/*
关键词整获取
*/
function keywordGet(keywordId,keywordIdSet){
	var keyword = $("#"+keywordId).val();
	$.post('/admin/default/keyword',{string:keyword},function(res){
		if(res.state =='error'){
			alert('获取失败，请手动填写');
		}else{
			$("#"+keywordIdSet).val(res.datas);
		}
	},'json')
}

function uploadifyAction(fileField,frameId) {
    $.Zebra_Dialog('', {
        source: {
            'iframe': {           
            	'src': '/admin/uploadify/basic',     
                'height': 300,
                'name': 'yii_upload',
                'id': 'yii_upload_id'
            }
        },
        width: 600,
        'buttons': [
			{
				caption: '确认',
				callback: function() {
					var htmls = $(window.frames['yii_upload'].document).find("#fileListWarp").html();
					if(htmls){
						$("#" + fileField).append(htmls);
					}else{
						 alert('没有文件被选择');
					}
				}
			},
			{
				caption: '取消',
				callback: function() {
					return;
				}
			}
		],
        'type': false,
        'title': '附件上传',
        'modal': false
    });
}


function uploadifyRemove(fileId,attrName){
	if(confirm('本操作不可恢复，确定继续？')){
		$.post("/admin/uploadify/remove",{imageId:fileId},function(res){
			$("#"+attrName+fileId).remove();
		},'json');
	}
}
</script>
</div><!-- end container -->
</body>
</html>