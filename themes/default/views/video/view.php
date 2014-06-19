	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">				
				<div class="list_body">	
					<h2><a href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>"><?php echo $video->title;?></a></h2>
					
					<div class="content_info soft_info">
						<div class="info_head clear">
							<div class="info_left">		
								<?php if($video->cover_image && file_exists($video->cover_image)):?>					
								<img src="<?php echo $video->cover_image;?>" alt="<?php echo $video->title;?>" />
								<?php else:?>
								<div class="no_cover"><?php echo Yii::t('common','No Cover');?></div>
								<?php endif;?>
							</div>
							
							<div class="info_right">
								<ul class="soft_attr">
									<li><?php echo Yii::t('model','VideoType');?>：<?php echo $this->_video_type[$video->video_type];?></li>
									<li><?php echo Yii::t('model','VideoLanguage');?>：<?php echo Yii::t('admin','Lan_'.$video->language);?></li>
									<li><?php echo Yii::t('model','VideoScore');?>：<?php echo $video->video_score;?></li>
									<li><?php echo Yii::t('common','UpdateTime');?>：<?php echo date('Y年m月d日',$video->update_time);?></li>
									<li><?php echo Yii::t('model','DownCount');?>：<?php echo $video->down_count;?></li>
								</ul>
								
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
											
											<script type="text/javascript" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh" charset="utf-8" id="butonLiteJs"></script>
											<script type="text/javascript" src="http://static.bshare.cn/b/bshareC0.js" charset="utf-8" id="bshareJs"></script>
											
										</li>
									</ul>
								</div>	
								
								<!-- 下载按钮 -->
								<div class="clear">
									<a href="<?php echo $this->createUrl('video/download', array('id'=>$video->id));?>" target="_blank" class="fl download_now"></a>
									<?php if($video->download):?>
									<a href="<?php echo $video->download;?>" target="_blank" class="fr download_quick"></a>
									<?php endif;?>
								</div>
								
							</div>												
						</div>
							
						<div class="info_desc clear">
							<h1>视频简介：</h1>
							<?php echo $soft->introduce;?>
						</div>						
					</div>
					
				</div>
			</div>				
			
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'topic_id'=>$video->id,'topic_type'=>'video'));?>"></iframe>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_videos'=>$last_videos));?>	
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
			
		});
	</script>
	
			