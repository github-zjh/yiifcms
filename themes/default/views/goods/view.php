	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">
				
				<div class="list_body">	
					<h2><a href="<?php echo $this->createUrl('goods/view', array('id'=>$good->id));?>"><?php echo CHtml::encode($good->goods_name);?></a></h2>
					
					<div class="content_info soft_info">
						<div class="info_head clear">
							<div class="info_left">		
								<?php if($good->default_thumb && file_exists($good->default_thumb)):?>					
								<img src="<?php echo $good->default_thumb;?>" alt="<?php echo CHtml::encode($good->goods_name);?>" />
								<?php else:?>
								<div class="no_cover"><?php echo Yii::t('common','No Cover');?></div>
								<?php endif;?>
							</div>
							
							<div class="info_right">
								<ul class="soft_attr">
									<li><?php echo Yii::t('model','GoodsPrice');?>：￥<?php echo $good->price;?></li>									
									<li><?php echo Yii::t('common','UpdateTime');?>：<?php echo date('Y年m月d日',$good->update_time);?></li>
									<li><?php echo Yii::t('model','GoodsViews');?>：<?php echo $good->views;?></li>
									<li><?php echo Yii::t('model','GoodsSales');?>：<?php echo $good->sales;?></li>
								</ul>
								
								
								
							</div>												
						</div>
							
						<div class="info_desc clear">
							<h1>商品简介：</h1>
							<?php echo $good->content;?>
						</div>						
					</div>
					
				</div>
			</div>		
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_goods'=>$last_goods));?>	
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
			
		});
	</script>
	
			
