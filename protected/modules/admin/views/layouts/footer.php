<script type="text/javascript">
$(function(){ 
    $(".confirmSubmit").click(function() {
    	var value = $("select[name='command']").val();
    	if(value.toLowerCase().indexOf('delete') >= 0)
        	return confirm('本操作不可恢复，确定继续？');
    });
});
//全选
function checkAll(form, name) {
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.name.match(name)) {
			e.checked = form.elements['chkall'].checked;
		}
	}
}
/*
关键词整获取
*/
function keywordGet(titleId, contentId, keywordIdSet){
	
	var title = $("#"+titleId).val();
	
	//Ueditor同步内容
	if(typeof(UE) !== 'undefined'){
		$("#"+contentId).val(UE.getEditor(contentId).getPlainTxt());
	}
	
	var content = $("#"+contentId).val();
	$.post('<?php echo $this->createUrl('default/keyword')?>',{'title':title,'content':content},function(res){
		if(res.state === 'error'){
			alert('获取失败，请手动填写');
		}else{
			$("#"+keywordIdSet).val(res.datas);
		}
	},'json');
}
//直接删除文件
function deleteFile(object) {
    if(confirm('本操作不可恢复，确定继续？')){
        filepath = $(object).parent().prev('input').val();        
		$.post("<?php echo $this->createUrl('uploadify/delete')?>",{filepath:filepath},function(res){
            if(res.state === 'success') {
                $(object).closest('li').remove();
            }			
		},'json');
	}
}

//js转换字符<>&
function _escape(val) {
	
	return val.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
//js反转换字符<>&
function _unescape(val) {
	
	return val.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"').replace(/&amp;/g, '&');
}


//日期控件
$("input[datePicker='true']").click(function(){
	WdatePicker({dateFmt:'yyyy-MM-dd H:m:s'});
});

$(function(){
		try{
			if (typeof(eval(prettyPrint)) == "function") {
			//代码着色
			prettyPrint();
			}
		}catch(e){}
});
</script>
</div><!-- end container -->
</body>
</html>
