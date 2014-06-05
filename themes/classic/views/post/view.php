	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">
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
						<span><?php echo Yii::t('common','Copy From')?>： <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
						<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>
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
						<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					</li>
					
				</ul>
			</div>		
			
			<!-- 评论区 -->
			<div class="comments">
				<h3>10&nbsp;&nbsp;Comments</h3>
				<ul>
					<li class="clear">
						<img src="<?php echo $this->_stylePath;?>/images/default_avatar.png" class="avatar" />
						<div class="comment_desc">
							<p class="desc_head">
								<strong class="user">Admin</strong>
								<span class="submit_time">2014年4月23日11:08:56</span>
							</p>
							<p class="desc_body">asdfasdf</p>
						</div>						
					</li>
					
					<li class="clear">
						<img src="<?php echo $this->_stylePath;?>/images/default_avatar.png" class="avatar" />
						<div class="comment_desc">
							<p class="desc_head">
								<strong class="user">Admin</strong>
								<span class="submit_time">2014年4月23日11:08:56</span>
							</p>
							<p class="desc_body">asdfasdf</p>
						</div>
					</li>
				</ul>
				<?php $this->renderPartial('_comment');?>				
			</div>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_softs'=>$last_softs));?>	
		<!-- 右侧内容结束 -->
		
	</div>	