	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">			
			<!-- 文字类型 -->
			<div class="list_box clear">
				<div class="list_head">
					<div class="date_time">
						<p>May</p>
						<strong>26</strong>
					</div>
					<div class="content_type"></div>
				</div>
				<div class="list_body">
					<h2><a href="<?php echo $this->createUrl('post/show',array('id'=>$post->id));?>"><?php echo $post->title;?></a></h2>
					<p class="view_info">
						<span>posted by <em>Admin</em></span>
						<span class="tags"><em><?php echo $post->tags;?>,&nbsp;&nbsp;</em><em>Admin</em></span>
						<span class="views"><em><?php echo $post->view_count;?></em></span>
					</p>
					<div class="content_info">
						Maecenas eget turpis turpis. Nunc vel metus augue. 
					Aenean euismod cursus ligula eget dapibus. 
					Praesent vel erat in tortor placerat dignissim. 
					Duis dapibus aliquam mi, eget euismod sem scelerisque ut. 
					Vivamus at elit quis urna adipiscing iaculis. 
					Curabitur vitae velit in neque dictum blandit. 
					Proin in iaculis neque. 
					Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.						
					</div>						
				</div>
			</div>	
			<!-- 分享按钮 -->
			<div class="share_box">
				<ul class="clear">
					<li><strong>Share</strong></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
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
		<div class="content_right">
			<dl class="category">
				<dt>分类</dt>
				<dd><a href="#">分类一</a></dd>		
				<dd><a href="#">分类一</a></dd>
				<dd><a href="#">分类一</a></dd>		
			</dl>	
			
			<dl class="category tag clear">
				<dt>Tags</dt>
				<dd><a href="#">php</a></dd>		
				<dd><a href="#">mysql</a></dd>
				<dd><a href="#">memcache</a></dd>	
				<dd><a href="#">php</a></dd>		
				<dd><a href="#">mysql</a></dd>
				<dd><a href="#">memcache</a></dd>	
			</dl>
			
			<dl class="category recent_post">
				<dt>最近的文章</dt>
				<dd><a href="#">分类一</a></dd>		
				<dd><a href="#">分类一</a></dd>
				<dd><a href="#">分类一</a></dd>		
			</dl>		
		</div>
		
	</div>	