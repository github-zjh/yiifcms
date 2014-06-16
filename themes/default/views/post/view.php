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
					<h2><a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>"  style="<?php echo $this->formatStyle($post->title_style);?>"><?php echo $post->title;?></a></h2>
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
			<iframe id="comment_iframe" scrolling="no"  marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'topic_id'=>$post->id,'topic_type'=>'article'));?>"></iframe>		
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_softs'=>$last_softs));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" id="back_top"></a>
	<script type="text/javascript">
		$(function(){
			$(this).scroll(function(){
				if($(this).scrollTop() == 0){
					$("#back_top").fadeOut();
				}else{					
					$("#back_top").fadeIn();
					$("#back_top").click(function(){
						$("body").scrollTop(0);
					});
				}
			});
			
			//iframe自适应高度
			$("iframe").load(function() {
			      $( this).height($(this).contents().height());			      
			});	
		});
	</script>
	
			