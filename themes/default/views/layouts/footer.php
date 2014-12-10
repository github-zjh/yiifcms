<!-- 底部footer开始 -->
<div id="footer">
	<ul class="ft_header clear">
		<li class="footer_left">
			<h2><?php echo $this->_setting['site_name'];?></h2>
			<p><?php echo $this->_setting['seo_description'];?></p>
		</li>
		<li class="footer_mid">
			<h2>新手指南</h2>
			<ul>
				<li><a href="<?php echo $this->createUrl('page/index', array('id'=>'guide'));?>">新手指南</a></li>
				<li><a href="<?php echo $this->createUrl('page/index', array('id'=>'register'));?>">注册流程</a></li>		
				<li><a href="<?php echo $this->createUrl('page/index', array('id'=>'comment'));?>">评论审核</a></li>		
			</ul>
		</li>
		<li class="footer_mid">
			<h2>快捷通道</h2>
			<ul>
				<li><a href="<?php echo $this->createUrl('page/index', array('id'=>'about'));?>" rel="nofollow">关于我们</a></li>
				<li><a href="<?php echo $this->createUrl('question/index');?>" rel="nofollown">留言反馈</a></li>	
			</ul>
		</li>
		<li class="footer_right">
			<h2>Power By <strong>惜暮(Sim)</strong></h2>			
			<div class="clear">
				<label><img width="70" src="<?php echo $this->_stylePath;?>/images/my_header.jpg" /></label>
				<div class="text">
					<p><a href="http://weibo.com/u/1503697997" class="sinawb_me" target="_blank">Ps冷眸_涵</a></p>
					<p><a href="mailto:xb_zjh@126.com" class="email_me">xb_zjh@126.com</a></p>
					<p><a href="tencent://message/?uin=326196998" class="qq_me">326196998</a></p>
				</div>				
			</div>
		</li>
	</ul>
	<div id="copyright">	
		<div class="clear">
			<span><?php echo $this->_setting['site_copyright'];?></span>	
			<span><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $this->_setting['site_icp'];?></a></span>			
			<ul class="outer">
				<li><?php echo $this->_setting['site_stats'];?></li>			
			</ul>
		</div>		
	</div>
</div>
<!-- 底部footer结束 -->

<!-- Js script开始 -->
<script type="text/javascript">
	
	$(function(){		
		//导航菜单
		$("#menu li a").mouseover(function(){
			$(this).next().next("div.child_box").show();
		});
		$("#menu li").mouseleave(function(){
			$(this).children("div.child_box").hide();
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
		//登录状态
		$("#logout").mouseover(function(){
			$(".show_drop").addClass("show_drop_hover");
			$("#drop_down_user").show();
		});
		$("#logout").mouseout(function(){
			$(".show_drop").removeClass("show_drop_hover");
			$("#drop_down_user").hide();
		});
		
		//刷新验证码
		$("#yw0").ready(function(){
		     $('#yw0').trigger('click');
		});	
		
		try{
			if (typeof(eval(prettyPrint)) == "function") {
			//代码着色
			prettyPrint();
			}
		}catch(e){}	
		
	});

	//收藏、关注
	function ajaxClick(act) {			
		var obj = $("a[data-act='"+act+"']");		
		var uid = "<?php echo Yii::app()->user->id;?>";				
		var cid = obj.attr("data-id");
		$("span.ajax_msg").hide();	
		if(uid){
			$.post('<?php echo $this->createUrl('post/ajax');?>',{'act':act, 'id':cid}, function(data){
				if(data.count > 0){	
					console.log(obj.children("em").children("i").html());
					obj.children("em").children("i").html(data.count);
				}
				obj.next("span.ajax_msg").html(data.message).show().delay(5000).fadeOut();
			},'json');
		}else{
			obj.next("span.ajax_msg").html("<?php echo Yii::t('common','You Need Login')?>").show().delay(5000).fadeOut();				
		}
	}

	// JavaScript Document
	function checkAll(form, name) {
		for(var i = 0; i < form.elements.length; i++) {
			var e = form.elements[i];
			if(e.name.match(name)) {
				e.checked = form.elements['chkall'].checked;
			}
		}
	}
	
</script>
<!-- Js script结束 -->
<!-- 分享代码 -->
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" >
var jiathis_config={
summary:"",
		showClose:true,
		shortUrl:false,
		hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?btn=r3.gif&move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->

<?php if($this->_dialogMessage):?>
<div><?php echo $this->_dialogMessage;?></div>
<?php endif;?>
</body>
</html>
