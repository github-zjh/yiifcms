	<div id="intro">		
		<div class="intro_title">
			<a href="#" class="view_more"><?php echo Yii::t('common','DownLoad Now');?></a>
			<h1>YiiFCMS</h1>
			<p><?php echo $this->_setting['seo_description'];?></p>
		</div>	
		<ul class="intro_box clear">
			<li>
				<div class="ico_one"></div>
				<h2>开源、免费</h2>
				<p>yiifcms是基于yiiframework开发的内容管理系统，它开源、免费，用户可以自由下载、使用、修改、学习交流。</p>
				<a href="<?php echo $this->createUrl('page/feature')?>" target="_blank"><?php echo Yii::t('common','Read Details')?></a>
			</li>
			<li>
				<div class="ico_one ico_two"></div>
				<h2>安全、高效</h2>
				<p>yiiframework本身是一个很安全的高性能的开源框架，使用它您不用担心安全问题，它会使您的网站运行的很良好。</p>
				<a href="<?php echo $this->createUrl('page/feature')?>" target="_blank"><?php echo Yii::t('common','Read Details')?></a>
			</li>
			<li>
				<div class="ico_one ico_three"></div>
				<h2>简洁、方便</h2>
				<p>yiifcms有简洁、方便的后台管理，用户不需要了解复杂的逻辑关系，就可以很快速的发布内容，优化管理。</p>
				<a href="<?php echo $this->createUrl('page/feature')?>" target="_blank"><?php echo Yii::t('common','Read Details')?></a>
			</li>
			<li class="last">
				<div class="ico_one ico_four"></div>
				<h2>轻松、稳定</h2>
				<p>yiifcms架构合理、布局优美，是您轻松建站和学习的不二之选。</p>
				<a href="<?php echo $this->createUrl('page/feature')?>" target="_blank"><?php echo Yii::t('common','Read Details')?></a>
			</li>
		</ul>
	</div>
	
	<!-- 首页中部banner -->
	<a class="banner index_mid_banner" href="#"><img src="<?php echo $this->_stylePath;?>/images/tmp/tmp_banner.jpg" /></a>
	
	<!-- 推荐内容区 -->
	<div id="tab_container">
		<ul class="etabs">
			<li class="tab"><a href="#tab_post">资讯</a></li>
			<li class="tab"><a href="#tab_image">图集</a></li>
			<li class="tab"><a href="#tab_soft">软件</a></li>
			<li class="tab"><a href="#tab_video">视频</a></li>
		</ul>	
		
		<div class="panel_container">
			<ul id="tab_post" class="clear">
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文字文章文章</a></li>
				<li><a href="#">文字文章文字文章文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文字文章文章</a></li>
				<li><a href="#">文字文章文字文章文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文字文章文章</a></li>
				<li><a href="#">文字文章文字文章文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文章</a></li>
				<li><a href="#">文字文字文章文章</a></li>
				<li><a href="#">文字文章文字文章文字文章</a></li>
				<li><a href="#">文字文章</a></li>
			</ul>
			<ul id="tab_image" class="clear">
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
				<li>
					<a href="#">	
						<img width="200" src="<?php echo $this->_stylePath;?>/images/tmp/tmp_girl.jpg" />
						<em class="black_bg"><span>清纯小美女</span></em>
					</a>					
				</li>
			</ul>
			<ul id="tab_soft" class="clear">
				<li><a href="#">3</a></li>
			</ul>
			<ul id="tab_video" class="clear">
				<li><a href="#">4</a></li>
			</ul>
		</div>	
		
		<script type="text/javascript">
		    $(function() {
		      $('#tab_container').easytabs();
		    });
  		</script>
	</div>
	
	<div id="clients">
		<ul class="client_head clear">
			<li class="client_title">友情链接</li>
			<li class="client_line"><img width="1088" src="<?php echo $this->_stylePath;?>/images/grey_line_x.png" /></li>			
		</ul>
		
		<?php if($link_logos):?>
		<ul class="client_body clear">
			<?php foreach($link_logos as $lg):?>
			<li><a href="<?php echo $lg->link;?>" title="<?php echo $lg->title;?>" target="_blank"><img width="170" height="90" src="<?php echo $lg->logo;?>" /></a></li>
			<?php endforeach;?>			
		</ul>
		<?php endif;?>
		
		<?php if($link_texts):?>
		<ul class="client_foot clear">
			<?php foreach($link_texts as $lt):?>
			<li><a href="<?php echo $lt->attributes['link'];?>" title="<?php echo $lt->attributes['title'];?>" target="_blank"><?php echo $lt->title;?> </a></li>
			<?php endforeach;?>			
		</ul>
		<?php endif;?>
	</div>