	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">
				<div class="list_head">
					<div class="date_time">
						<p><?php echo date('Y',$post->last_update_time)?></p>
						<strong>							
							<?php echo date('m.d',$post->last_update_time)?>
							<br/><?php echo date('H:i:s',$post->last_update_time)?>
						</strong>	
					</div>						
				</div>
				<div class="list_body">	
					<h2><a href="<?php echo $this->createUrl('image/view', array('id'=>$post->id));?>"><?php echo $post->title;?></a></h2>
					<p class="view_info">
						<span><?php echo Yii::t('common','Copy From')?>： <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
						<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>
						<?php if($tags_len > 0):?>
						<span class="tags">
							<?php $i = 1; foreach((array)$post_tags as $ptag):?>
							<em><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$ptag));?>"><?php echo $ptag;?></a><?php if($i<$tags_len):?>,&nbsp;&nbsp;<?php endif;?></em>
							<?php $i++;?>
							<?php endforeach;?>								
						</span>
						<?php endif;?>
						<span class="views"><em><?php echo $post->view_count;?></em></span>
					</p>
					<div class="content_info">
						<?php if($post->image_list):?>
						<?php $pics = unserialize($post->image_list);?>												
						<div id="show_pics">
							<a href="javascript:;" title="上一个" id="move_prev" class="prev_btn"></a>
							<ul>								
								<?php foreach((array)$pics as $pic):?>
								<li><img  id="<?php echo "aimg_".$pic['fileId'];?>" aid="<?php echo $pic['fileId'];?>"  onclick="zoom(this, this.src, 0, 0, 0)" zoomfile="<?php echo $pic['file'];?>" alt="<?php echo $pic['desc'];?>" title="<?php echo $pic['desc'];?>" file="<?php echo $pic['file'];?>" src="<?php echo $pic['file'];?>" /></li>
								<?php endforeach;?>										
							</ul>		
							<a href="javascript:;" title="下一个" id="move_next"  class="prev_btn next_btn"></a>					
						</div>
						<div id="append_parent"></div><div id="ajaxwaitid"></div>
						<?php endif;?>
						<?php echo $post->content;?>
					</div>
					
				</div>
			</div>	
			<!-- 分享按钮 -->
			<div class="share_box">
				<ul class="clear">
					<li><strong><?php echo Yii::t('common','Share');?></strong></li>
					<li class="clear">
						<div class="bshare-custom">
							<a title="分享到QQ空间" class="bshare-qzone"></a>
							<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
							<a title="分享到人人网" class="bshare-renren"></a>
							<a title="分享到腾讯微博" class="bshare-qqmb"></a>
							<a title="分享到网易微博" class="bshare-neteasemb"></a>
							<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
							<span class="BSHARE_COUNT bshare-share-count">0</span>
						</div>						
						
						<script type="text/javascript" charset="utf-8" id="butonLiteJs"></script>
						<script type="text/javascript" charset="utf-8" id="bshareJs"></script>
						
						<script type="text/javascript">
							//延迟加载外部js
							window.onload = shareJs();
							function shareJs(){								
								$("#butonLiteJs").attr("src","http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh");
								$("#bshareJs").attr("src","http://static.bshare.cn/b/bshareC0.js");
							}
						</script>
						
					</li>
					
				</ul>
			</div>		
			
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'topic_id'=>$post->id,'topic_type'=>'image'));?>"></iframe>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_images'=>$last_images));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" id="back_top"></a>
	<script type="text/javascript">
		$(function(){
			$(window).scroll(function(){				
				var scrollt = $(this).scrollTop(); //获取滚动后的高度 
				if(scrollt > 200){
					$("#back_top").fadeIn(200);					
				}else{		
					$("#back_top").fadeOut(200);					
				}
			});
			
			$("#back_top").click(function(){						
				$("html,body").animate({scrollTop:"0px"},200);
			});
			
			//图集左右滑动
			var min_left = 0;			
			var li_width = $("#show_pics li").width();
			var li_len = $("#show_pics li").length;			
			var max_left = (li_len-3) * li_width;
			
			$("#move_prev").click(function(){
				var cur_left = $("#show_pics ul").position().left;				
				var move_len = cur_left + li_width;
				if(cur_left < min_left){
					$("#show_pics ul").animate({left: move_len+'px'},200);
				}		
			});
			$("#move_next").click(function(){
				var cur_left = $("#show_pics ul").position().left;				
				var move_len = cur_left - li_width;
				if(Math.abs(cur_left) < max_left){
					$("#show_pics ul").animate({left: move_len+'px'},200);
				}						
			});
				
			
		});
	</script>
	<?php if($post->image_list):?>
	<script type="text/javascript" reload="1">
		var IMGDIR = '<?php echo $this->_static_public . "/js/discuz/";?>', VERHASH = 'yii', JSPATH = '<?php echo $this->_static_public . "/js/discuz/";?>';
	    //仿discuz图片滚动放大效果
		zoomstatus = parseInt(1);
		var imagemaxwidth = '500';//控制图片初始宽度
		var aimgcount = new Array();
		var pics = new Array();		
		<?php $pics = unserialize($post->image_list);?>
		var count = <?php echo count($pics);?>
		<?php foreach((array) $pics as $pic):?>	
		pics.push('<?php echo $pic['fileId'];?>');
		<?php endforeach;?>	
		aimgcount[count] = pics;	
		attachimggroup(count);
		attachimgshow(count);
		var aimgfid = 0;
	</script>
	<?php endif;?>
	
			