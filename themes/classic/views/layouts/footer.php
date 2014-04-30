<!-- 底部footer开始 -->
<div id="footer">
	<ul class="ft_header clear">
		<li class="footer_left">
			<h2>标题标题</h2>
			<p>一段文字一段文字一段文字一段文字一段文字</p>
		</li>
		<li class="footer_mid">
			<h2>标题标题</h2>
			<ul>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
			</ul>
		</li>
		<li class="footer_mid">
			<h2>标题标题</h2>
			<ul>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
				<li>>&nbsp;&nbsp;<a href="javascript:;">About Us</a></li>
			</ul>
		</li>
		<li class="footer_right">
			<h2>from the <strong>BOLG</strong></h2>			
			<div class="clear">
				<label><img src="<?php echo $this->_stylePath;?>/images/tmp/tmp_blog_icon.png" /></label>
				<div class="text">
					<p>asdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdfasdfsdf</p>
					<span>asdfsdf</span>
				</div>				
			</div>
		</li>
	</ul>
	<div id="copyright">	
		<div class="clear">
			<span><?php echo $this->_setting['site_copyright'];?></span>	
			<span><?php echo $this->_setting['site_icp'];?></span>
			<span>E-mail：<?php echo $this->_setting['admin_email'];?></span>
			<ul class="outer">
				<li><a href="javascript:;"><img src="<?php echo $this->_stylePath;?>/images/tmp/tmp_g_icon.png" /></a></li>
				<li><a href="javascript:;"><img src="<?php echo $this->_stylePath;?>/images/tmp/tmp_g_icon.png" /></a></li>
				<li><a href="javascript:;"><img src="<?php echo $this->_stylePath;?>/images/tmp/tmp_g_icon.png" /></a></li>
			</ul>
		</div>		
	</div>
</div>
<!-- 底部footer结束 -->

<!-- Js script开始 -->
<script type="text/javascript">
	$(function(){		
		$("#menu li a").mouseover(function(){
			$(this).next().next("div.child_box").show();
		});
		$("#menu li").mouseleave(function(){
			$(this).children("div.child_box").hide();
		});		
		
		//幻灯片大图切换
		var sli_len = $(".slide_image li").width();		
		var sclient_len = $(".slide_image li").length;
		var smax_len = (sclient_len-1)*sli_len;			
		$("#slide_position_left").val(0);
		$(".slide_right").click(function(){	
			//向左滑动		
			var scur_left = parseFloat($("#slide_position_left").val());			
			var smove_left = scur_left - sli_len;
			if(Math.abs(smove_left) > smax_len){
				//跳到开头
				var index = 0;
				$("#slide_position_left").val(0);
				$(".slide_image").animate({left: '0px'}, "slow");
			}else{
				var index = Math.abs(smove_left)/sli_len;
				$("#slide_position_left").val(smove_left);
				$(".slide_image").animate({left: smove_left+'px'}, "slow");
			}
			//选中的a	
			$("#slide_change a").removeClass("select");
			$("#slide_change a:eq("+index+")").addClass("select");
			
		});
		$(".slide_left").click(function(){
			//向右滑动	
			var scur_left = parseFloat($("#slide_position_left").val());					
			var smove_left = scur_left + sli_len;	
			if(scur_left == 0){
				//跳到最后
				var index = smax_len/sli_len;
				$("#slide_position_left").val('-'+smax_len);
				$(".slide_image").animate({left: '-'+smax_len+'px'}, "slow");
			}else{
				var index = Math.abs(smove_left)/sli_len;
				$("#slide_position_left").val(smove_left);
				$(".slide_image").animate({left: smove_left+'px'}, "slow");
			}
			//选中的a索引			
			$("#slide_change a").removeClass("select");
			$("#slide_change a:eq("+index+")").addClass("select");
			
		});
		$("#slide_change a").click(function(){
			var cur_left = parseFloat($("#slide_position_left").val());
			var index = $(this).parent("li").index();			
			var move_left = index>0?'-'+index*sli_len:0;			
			$("#slide_position_left").val(move_left);
			$(".slide_image").animate({left: move_left+'px'}, "slow");
			$("#slide_change a").removeClass("select");
			$(this).addClass("select");
		});
		
		
		//友情链接滑动				
		var li_len = $(".client_body li").width();		
		var move_len = 3*(li_len+30);	
		var client_len = $(".client_body li").length;
		var max_len = (client_len-1)*li_len;	
		$("#client_left").val(0);
		$(".crt_btn").click(function(){				
			//向左滑动		
			var cur_left = parseFloat($("#client_left").val());			
			var move_left = cur_left - move_len;
			if(client_len <= 6 || Math.abs(move_left) > max_len){
				return;
			}else{			
				$("#client_left").val(move_left);
				$(".client_body").animate({left: move_left+'px'}, "slow");
			}
		});
		$(".clf_btn").click(function(){
			//向右滑动			
			var cur_left = parseFloat($("#client_left").val());					
			var move_left = cur_left + move_len;			
			if(client_len <= 6 || cur_left >= 0 ){
				return;
			}else{		
				$("#client_left").val(move_left);
				$(".client_body").animate({left: move_left+'px'}, "slow");
			}
		});
	});
</script>
<!-- Js script结束 -->
</body>
</html>