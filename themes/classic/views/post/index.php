	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
			<ul class="content_list">
			<?php foreach((array)$posts as $post):?>
				<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>	
				<li class="list_box clear">
					<div class="list_head">
						<div class="date_time">
							<p><?php echo date('M',$post->last_update_time)?></p>
							<strong>
								<?php echo date('d',$post->last_update_time)?>
								<br/><?php echo date('H:i:s',$post->last_update_time)?>
							</strong>							
						</div>						
					</div>
					<div class="list_body">
						<h2><a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>"><?php echo $post->title;?></a></h2>
						<p class="view_info">
							<span><?php echo Yii::t('common','Copy From')?>：  <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
							<?php if($tags_len > 0):?>
							<span class="tags">
								<?php $i = 1; foreach((array)$post_tags as $ptag):?>
								<em><?php echo $ptag;?><?php if($i<$tags_len):?>,&nbsp;&nbsp;<?php endif;?></em>
								<?php $i++;?>
								<?php endforeach;?>								
							</span>
							<?php endif;?>
							<span class="views"><em><?php echo $post->view_count;?></em></span>
						</p>									
						<div class="content_info clear">		
							<?php if(file_exists($post->attach_thumb)):?>
							<a class="content_cover" alt="<?php echo $post->title;?>" title="<?php echo $post->title;?>" href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>"><img src="<?php echo $post->attach_thumb;?>" /></a>
							<?php endif;?>												
							<div><?php echo $post->intro?$post->intro:'...';?></div>
						</div>
						
						<a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>" class="continue_read"><?php echo Yii::t('common','Read More');?></a>
					</div>
				</li>			
				<?php endforeach;?>
				
			
			<!-- 分页开始 -->			
			<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
			<!-- 分页结束 -->
			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_posts'=>$last_posts, 'tags' => $tags));?>	
		<!-- 右侧内容结束 -->
		
	</div>	