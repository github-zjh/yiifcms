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
						<p class="content_info clear">
							<?php if(file_exists($post->attach_thumb)):?>
							<a class="content_cover" alt="<?php echo $post->title;?>" title="<?php echo $post->title;?>" href="<?php echo $this->createUrl('image/view', array('id'=>$post->id));?>"><img src="<?php echo $post->attach_thumb;?>" /></a>
							<?php endif;?>								
							<?php echo $post->intro?$post->intro:'...';?>
						</p>
						<a href="<?php echo $this->createUrl('image/view', array('id'=>$post->id));?>" class="continue_read"><?php echo Yii::t('common','Read More');?></a>
					</div>
				</li>			
				<?php endforeach;?>
				
			
			<!-- 分页开始 -->
			<div id="page">	
				<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>		
			</div>
			<!-- 分页结束 -->
			
		</div>
		<div class="content_right">
			<dl class="category">
				<dt><?php echo Yii::t('common','Catagorys');?></dt>
				<?php foreach((array)$this->_catalog as $cate):?>
				<dd><a href="<?php echo $this->createUrl('image/index',array('catalog_id'=>$cate->id));?>"><?php echo $cate->catalog_name;?></a></dd>		
				<?php endforeach;?>					
			</dl>	
			
			<dl class="category tag clear">
				<dt><?php echo Yii::t('common','Tags');?></dt>
				<?php foreach((array)$tags as $tag):?>				
				<dd><a href="<?php echo $this->createUrl('tag',array('tag'=>$tag->tag_name));?>"><?php echo $tag->tag_name;?></a></dd>		
				<?php endforeach;?>					
			</dl>
			
			<dl class="category recent_post">
				<dt><?php echo Yii::t('common','Last Images');?></dt>
				<?php foreach((array)$last_images as $lp):?>
				<dd><a title="<?php echo $lp->title;?>" href="<?php echo $this->createUrl('post/view', array('id'=>$lp->id));?>"><?php echo Helper::truncate_utf8_string($lp->title,18);?></a></dd>		
				<?php endforeach;?>					
			</dl>		
		</div>
		
	</div>	