    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/view.css';?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/prettify.css';?>" />    
    <script type="text/javascript" src="<?php echo $this->_stylePath . '/js/prettify.js';?>"></script>
    
    <!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">				
				
				<h2><?php echo CHtml::encode($post->title);?></h2>
				<p class="view_info">
					<span><?php echo Yii::t('common','Copy From')?>： <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
					<?php 
                        $alltags = $post->tags?explode(',',$post->tags):array(); 
                        $post_tags = array_slice($alltags, 0, 5);
                        $tags_len = count($post_tags); 
                    ?>
					<?php if($tags_len > 0):?>
					<span class="tags">
						<?php $i = 1; foreach($post_tags as $ptag):?>
						<em><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$ptag));?>"><?php echo $ptag;?></a><?php if($i<$tags_len):?>&nbsp;&nbsp;<?php endif;?></em>
						<?php $i++;?>
						<?php endforeach;?>								
					</span>
					<?php endif;?>
                    <!-- 分类 -->
                    <span><?php echo Yii::t('common','Catagorys')?>： <a href='<?php echo $this->createUrl('post/index', array('catalog_id' => $post->catalog_id));?>'><?php echo $post->catalog->catalog_name;?></a></span>
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
						<a href="javascript:ajaxClick('attention');" data-act="attention" data-id="<?php echo $post->id;?>">
							<em><?php echo Yii::t('common','Attention');?>+<i><?php echo $post->attention_count;?></i></em>
						</a>
						<span class="ajax_msg">loading...</span>
					</span>					
				</p>
				<div class="content_info">
					<div class="description">
						[<?php echo Yii::t('common','Guide Read')?>]：<?php echo $post->content->introduce?$post->content->introduce:'...';?>
					</div>
					<?php echo $post->content->content;?>
				</div>
					
				<!-- 上一篇、下一篇 -->
				<ul class="relation">
					<?php if($pre_relation):?>
					<li>上一篇：<a href="<?php echo $this->createUrl('post/view', array('id' => $pre_relation->id))?>"><?php echo $pre_relation->title;?></a></li>
					<?php else:?>
					<li>上一篇：<a href="javascript:;">没有了</a></li>
					<?php endif;?>
					<?php if($next_relation):?>
					<li>下一篇：<a href="<?php echo $this->createUrl('post/view', array('id' => $next_relation->id))?>"><?php echo $next_relation->title;?></a></li>
					<?php else:?>
					<li>下一篇：<a href="javascript:;">没有了</a></li>
					<?php endif;?>
				</ul>
			</div>	
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no"  marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'content_id'=>$post->id,'topic_type'=>'post'));?>"></iframe>		
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_posts'=>$last_posts));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" title="返回顶部" id="back_top"></a>		
