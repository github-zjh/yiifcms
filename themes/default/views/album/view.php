    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/view.css';?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_static_public . '/js/discuz/zoom.css';?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/prettify.css';?>" />    
    <script type="text/javascript" src="<?php echo $this->_static_public . '/js/discuz/common.js';?>"></script>
    <script type="text/javascript" src="<?php echo $this->_static_public . '/js/discuz/zoom.js';?>"></script>
    <!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box image_info clear">				
				<div class="list_body">	
					<h2><?php echo CHtml::encode($post->title);?></h2>
					<p class="view_info">
						<span><?php echo Yii::t('common','Copy From')?>： <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
						<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>
						<?php if($tags_len > 0):?>
						<span class="tags">
							<?php $i = 1; foreach((array)$post_tags as $ptag):?>
							<em><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$ptag));?>"><?php echo $ptag;?></a></em>
							<?php $i++;?>
							<?php endforeach;?>								
						</span>
						<?php endif;?>
                        <!-- 分类 -->
                        <span><?php echo Yii::t('common','Catagorys')?>： <a href='<?php echo $this->createUrl('album/index', array('catalog_id' => $post->catalog_id));?>'><?php echo $post->catalog->catalog_name;?></a></span>
						<span class="views"><em><?php echo $post->view_count;?></em></span>
					</p>
					<div class="content_info">
						<?php if($post->content->album_list):?>
						<?php $pics = explode(',', $post->content->album_list);?>												
						<div id="show_pics">
							<a href="javascript:;" title="上一个" id="move_prev" class="prev_btn"></a>
							<ul class="clear">								
								<?php foreach($pics as $k => $pic):?>
								<li><img  id="<?php echo "aimg_".($k+1);?>" onclick="zoom(this, this.src, 0, 0, 0)" title="<?php echo $post->title.'-'.($k+1);?>" src="<?php echo $pic;?>" /></li>
								<?php endforeach;?>										
							</ul>		
							<a href="javascript:;" title="下一个" id="move_next"  class="prev_btn next_btn"></a>					
						</div>
						<div id="append_parent"></div><div id="ajaxwaitid"></div>
						<ul class="small_pics clear">								
							<?php foreach($pics as $spic):?>
							<li><img width="100" height="100" src="<?php echo $spic;?>" /></li>
							<?php endforeach;?>										
						</ul>	
						<?php endif;?>
						<?php echo $post->content->content;?>
					</div>

					<!-- 上一篇、下一篇 -->
					<ul class="relation">
						<?php if($pre_relation):?>
							<li>上一篇：<a href="<?php echo $this->createUrl('album/view', array('id' => $pre_relation->id))?>"><?php echo $pre_relation->title;?></a></li>
						<?php else:?>
							<li>上一篇：<a href="javascript:;">没有了</a></li>
						<?php endif;?>
						<?php if($next_relation):?>
							<li>下一篇：<a href="<?php echo $this->createUrl('album/view', array('id' => $next_relation->id))?>"><?php echo $next_relation->title;?></a></li>
						<?php else:?>
							<li>下一篇：<a href="javascript:;">没有了</a></li>
						<?php endif;?>
					</ul>
					
				</div>
			</div>	
			
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'content_id'=>$post->id,'topic_type'=>'album'));?>"></iframe>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_images'=>$last_images));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" id="back_top"></a>
	<script type="text/javascript">
		$(function(){
			$(window).scroll(function(){				
				var scrollt = $(this).scrollTop(); //获取滚动后的高度 
				if(scrollt > 200){
					$("#back_top").fadeIn(200);					
				}else{		
					$("#back_top").fadeOut(200);					
				}
			});
			
			$("#back_top").click(function(){						
				$("html,body").animate({scrollTop:"0px"},200);
			});
			
			//图集左右滑动()			
			$("#show_pics li:first").show();
			var pics_num = $("#show_pics li").length;
			$("#move_prev").click(function(){
				var index = $("#show_pics li:visible").index();
				if(index > 0){
					var next = index -1;
					$("#show_pics li:eq('"+index+"')").hide();
					$("#show_pics li:eq('"+next+"')").fadeIn();
				}
			});
			$("#move_next").click(function(){
				var index = $("#show_pics li:visible").index();
				if(index < pics_num -1){
					var next = index + 1;
					$("#show_pics li:eq('"+index+"')").hide();
					$("#show_pics li:eq('"+next+"')").fadeIn();
				}					
			});

			$(".small_pics li").click(function(){
				var index = $(this).index();	
				$("#show_pics li").hide();
				$("#show_pics li:eq('"+index+"')").fadeIn();
			});				
			
		});
	</script>
	<?php if($post->content->album_list):?>
	<script type="text/javascript" reload="1">
		var IMGDIR = '<?php echo $this->_static_public . "/js/discuz/";?>', VERHASH = 'yii', JSPATH = '<?php echo $this->_static_public . "/js/discuz/";?>';
	    //仿discuz图片滚动放大效果
		zoomstatus = parseInt(1);
		var imagemaxwidth = '500';//控制图片初始宽度
		var aimgcount = new Array();
		var pics = new Array();		
		<?php $pics = explode(',', $post->content->album_list);?>
		var count = <?php echo count($pics);?>
		<?php foreach((array) $pics as $k => $pic):?>	
		pics.push('<?php echo $k+1;?>');
		<?php endforeach;?>	
		aimgcount[count] = pics;	
		attachimggroup(count);
		attachimgshow(count);
		var aimgfid = 0;
	</script>
	<?php endif;?>
	
			
