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
<script type="text/javascript" src="<?php echo $this->_stylePath;?>/js/common.js"></script>
<script type="text/javascript">
//收藏、关注
function ajaxClick(act) {			
	var obj = $("a[data-act='"+act+"']");		
	var uid = "<?php echo Yii::app()->user->id;?>";				
	var cid = obj.attr("data-id");
	$("span.ajax_msg").hide();	
	if(uid){		
		if(act == 'friend'){
			var url = '<?php echo $this->_request->hostinfo.$this->createUrl('user/addfriend');?>';			
		}else{
			var url = '<?php echo $this->_request->hostinfo.$this->createUrl('post/ajax');?>';
		}	
		$.post(url,{'act':act, 'id':cid}, function(data){
			if(data.count > 0){					
				obj.children("em").children("i").html(data.count);
			}					
			if(act == 'friend' && data.state == 'success'){
				//添加好友成功
				obj.attr("href","<?php echo $this->createUrl('user/myfriends');?>");
				obj.children("em").html('<?php echo Yii::t('common','Cancel Friends');?>');
			}
			obj.next("span.ajax_msg").html(data.message).show().delay(5000).fadeOut();
		},'json');
	}else{
		obj.next("span.ajax_msg").html("<?php echo Yii::t('common','You Need Login')?>").show().delay(5000).fadeOut();				
	}
}
</script>
<!-- Js script结束 -->

<!-- 分享代码 -->
<!-- JiaThis Button BEGIN -->
<?php echo $this->renderPartial('/layouts/shareJs');?>
<!-- JiaThis Button END -->

<!-- 弹窗内容区域开始 -->
<div id="ajaxDialog"></div>
<!-- 弹窗内容区域结束 -->
</body>
</html>
