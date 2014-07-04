	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
			<ul class="content_list video_list clear">
			<?php foreach((array)$videos as $video):?>					
				<li class="list_box clear">					
					<div class="list_body">
						<a class="video_a" href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>">							
							<img src="<?php echo $video->cover_image;?>" width="150" height="200" />
							<span class="v_play_score"><?php echo $video->video_score;?></span>
							<span class="v_play_mask"></span>
							<span class="v_play_icon"></span>
						</a>
						<h2><a class="video_title" href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>"  title="<?php echo CHtml::encode($video->title);?>"><?php echo CHtml::encode($video->title);?></a></h2>
					</div>
				</li>			
				<?php endforeach;?>
			</ul>	
			
			<!-- 分页开始 -->			
			<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
			<!-- 分页结束 -->
			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_videos'=>$last_videos));?>	
		<!-- 右侧内容结束 -->
	</div>	