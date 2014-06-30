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
	<?php if($index_mid_banner):?>	
	<a class="banner index_mid_banner" title="<?php echo $index_mid_banner->title;?>" href="<?php echo $index_mid_banner->link_url;?>" target="_blank">
		<img alt="<?php echo $index_mid_banner->title;?>" src="<?php echo $index_mid_banner->image_url?$index_mid_banner->image_url:$index_mid_banner->attach_file;?>" />
	</a>
	<?php endif;?>
	
	<!-- 推荐资讯区开始 -->
	<div class="tab_container">
		<ul class="etabs text_align_left">
			<li class="tab"><a href="#tab_post1">最新资讯</a></li>
			<li class="tab"><a href="#tab_post2">热门资讯</a></li>			
		</ul>	
		
		<div class="panel_container">
			<ul id="tab_post1" class="tab_post clear">
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
			
			<ul id="tab_post2" class="tab_post clear">
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
		</div>			
	</div>
	<!-- 推荐资讯区结束 -->
	
	<!-- 推荐图集区开始 -->
	<div class="tab_container">
		<ul class="etabs text_align_right">			
			<li class="tab"><a href="#tab_image1">最新图集</a></li>
			<li class="tab"><a href="#tab_image2">热门图集</a></li>	
		</ul>	
		
		<div class="panel_container">			
			<ul id="tab_image1" class="tab_image clear">
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
			<ul id="tab_image2" class="tab_image clear">
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
		</div>	
	</div>
	<!-- 推荐图集区结束 -->
	
	<!-- 推荐软件区开始 -->
	<div class="tab_container">
		<ul class="etabs text_align_left">
			<li class="tab"><a href="#tab_soft1">最新软件</a></li>
			<li class="tab"><a href="#tab_soft2">热门软件</a></li>		
		</ul>	
		
		<div class="panel_container">
			<ul id="tab_soft1" class="tab_soft clear">
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
			</ul>	
			
			<ul id="tab_soft2" class="tab_soft clear">
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
				
				<li>
					<a href="#">
						<img class="dl_img" src="uploads/images/201406/d01b61d3c6a.png" width="70" />											
					</a>		
					<a href="#">阿里旺旺</a>
					<a href="#" class="dl_btn" target="_blank">下载</a>			
				</li>
			</ul>		
		</div>		
	</div>
	<!-- 推荐软件区开始 -->
	
	<!-- 推荐视频区开始 -->
	<div class="tab_container">
		<ul class="etabs text_align_right">
			<li class="tab"><a href="#tab_video1">最新视频</a></li>
			<li class="tab"><a href="#tab_video2">热门视频</a></li>		
		</ul>	
		
		<div class="panel_container">
			<ul id="tab_video2" class="tab_video clear">
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
			</ul>	
			
			<ul id="tab_video1" class="tab_video clear">
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
				<li>
					<a href="#" class="video_a">
						<img width="150" height="200" src="uploads/images/201406/827a03cb8cb.jpg" />						
						<span class="v_play_mask"></span>
						<span class="v_play_icon"></span>
					</a>
					<span class="video_title">美国队长</span>
				</li>
			</ul>		
		</div>		
	</div>
	<!-- 推荐软件区开始 -->
	
	
		
	<script type="text/javascript">
		$(function() {
		    $('.tab_container').easytabs();
		});
  	</script>
	
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