	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
		    <div class="order_box">
				<a <?php if($order == 'view_count'): ?>class="current" <?php endif;?> href="<?php echo $this->createUrl('post/index',array('order'=>'view_count', 'catalog_id'=>$catalog->id));?>">热度排行</a> 
				<a  <?php if($order == 'id'): ?>class="current" <?php endif;?> href="<?php echo $this->createUrl('post/index',array('order'=>'id', 'catalog_id'=>$catalog->id));?>">最新发表</a> 
			</div>
			<div class="clear"></div>
			<ul class="content_list">
			<?php foreach((array)$posts as $post):?>
				<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>	
				<li class="list_box clear">
					<div class="list_head">
						<a href="<?php echo $this->createUrl('post/index', array('catalog_id'=>$post->catalog->id));?>"><?php echo $post->catalog->catalog_name;?></a>				
					</div>
					<div class="list_body">
						<h2><a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>" style="<?php echo $this->formatStyle($post->title_style);?>"><?php echo CHtml::encode($post->title);?></a></h2>
						<p class="view_info">
							<span><?php echo Yii::t('common','Copy From')?>：  <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
							<?php if($tags_len > 0):?>
							<span class="tags">
								<?php $i = 1; foreach((array)$post_tags as $ptag):?>
								<em><a href="<?php echo $this->createUrl('tag/index', array('tag'=>$ptag));?>"><?php echo $ptag;?></a></em>
								<?php $i++;?>
								<?php endforeach;?>								
							</span>
							<?php endif;?>
							<span class="views fa">&nbsp;&nbsp;<em><?php echo $post->view_count;?></em></span>
						</p>									
						<div class="content_info clear">		
							<?php if(file_exists($post->attach_thumb)):?>
							<a class="content_cover" alt="<?php echo $post->title;?>" title="<?php echo CHtml::encode($post->title);?>" href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>"><img src="<?php echo $post->attach_thumb;?>" /></a>
							<?php endif;?>												
							<div><?php echo $post->introduce?CHtml::encode($post->introduce):'...';?></div>
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
