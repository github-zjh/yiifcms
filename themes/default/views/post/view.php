	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">				
				
				<h2><?php echo CHtml::encode($post->title);?></h2>
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
					
					<!-- 收藏 -->
					<span class="collects">
						<a href="javascript:ajaxClick('collect');" data-act="collect" data-id="<?php echo $post->id;?>">
							<em><?php echo Yii::t('common','Collection');?>+<i><?php echo $post->favorite_count;?></i></em>
						</a>
						<span class="ajax_msg">loading...</span>
					</span>
					<!-- 关注 -->
					<span class="attentions">
						<a href="javascript:ajaxClick('attention');"" data-act="attention" data-id="<?php echo $post->id;?>">
							<em><?php echo Yii::t('common','Attention');?>+<i><?php echo $post->attention_count;?></i></em>
						</a>
						<span class="ajax_msg">loading...</span>
					</span>					
				</p>
				<div class="content_info">
					<div class="description">
						[<?php echo Yii::t('common','Guide Read')?>]：<?php echo $post->introduce?$post->introduce:'...';?>
					</div>
					<?php echo $post->content;?>
				</div>
					
				
			</div>	
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no"  marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'topic_id'=>$post->id,'topic_type'=>'post'));?>"></iframe>		
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_posts'=>$last_posts));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" title="返回顶部" id="back_top"></a>		
