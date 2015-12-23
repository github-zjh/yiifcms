<?php $this->renderPartial('_header')?>
<script type="text/javascript">
function showmessage() {	
	document.getElementById('installmessage').scrollTop = 100000000;	
}
</script>
<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a6"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box">
                        <div id="installmessage" >正在准备安装 ...<br /></div> 
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box">
                <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
                <a href="javascript:void(0);"  class="x_btn pre" id="finish">安装中..</a>
            </div>            
        </div>
    </div>
<?php $this->renderPartial('_footer')?>
