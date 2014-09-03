	<script type="text/javascript">
		var score_url = "<?php echo $this->createUrl('score');?>";
	</script>
	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">				
				<div>	
					<h2><?php echo CHtml::encode($video->title);?></h2>
					
					<div class="content_info soft_info video_info">
						<div class="info_head clear">
							<div class="info_left">		
								<?php if($video->cover_image && file_exists($video->cover_image)):?>					
								<img src="<?php echo $video->cover_image;?>" alt="<?php echo CHtml::encode($video->title);?>" />
								<?php else:?>
								<div class="no_cover"><?php echo Yii::t('common','No Cover');?></div>
								<?php endif;?>
							</div>
							
							<!-- 给视频评分 -->
							<div class="info_score score">								
									<div class="score_content" id="score_content">									
										<div class="score_loading"></div>									
									</div><!--score_content end-->
								
									<div class="score_post">			
									<script type="text/javascript">
										var star = {vid:'<?php echo $video->id;?>'};
									</script>						
										<div id="starBox">
											<div class="star_title">给喜欢的影片评分</div>
											<ul class="starlist" id="starlist">
												<li i="1"><a href="javascript:void(0);" title="1星" class="star_one">1</a></li>
												<li i="2"><a href="javascript:void(0);" title="2星" class="star_two">2</a></li>
												<li i="3"><a href="javascript:void(0);" title="3星" class="star_three">3</a></li>
												<li i="4"><a href="javascript:void(0);" title="4星" class="star_four">4</a></li>
												<li i="5"><a href="javascript:void(0);" title="5星" class="star_five">5</a></li>
											</ul>
											<div class="star_current_rating" id="star_current_rating"></div>
										</div><!--starBox end-->
									
										<div class="star_tip" id="star_tip">
											<s id="star_tip_arrow"><i></i></s>
											<div id="star_desc" class="star_desc"></div>
										</div><!--star_tip end-->
									
									</div><!--score_post end-->
								
							</div><!--score end-->
							
							
							<div class="info_right">
								<ul class="soft_attr">
									<li><?php echo Yii::t('model','VideoType');?>：<?php echo $this->_video_type[$video->video_type];?></li>
									<li><?php echo Yii::t('model','VideoLanguage');?>：<?php echo Yii::t('admin','Lan_'.$video->language);?></li>
									<li><?php echo Yii::t('model','VideoScore');?>：<?php echo $video->video_score;?></li>
									<li><?php echo Yii::t('common','UpdateTime');?>：<?php echo date('Y年m月d日',$video->update_time);?></li>
									<li><?php echo Yii::t('model','ViewCount');?>：<?php echo $video->view_count;?></li>
									<li><?php echo Yii::t('model','DownCount');?>：<?php echo $video->down_count;?></li>
								</ul>
								
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
	
			
