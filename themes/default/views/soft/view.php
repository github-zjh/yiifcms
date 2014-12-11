	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">
				<div class="list_head">
					<a href="<?php echo $this->createUrl('soft/view', array('id'=>$soft->id));?>" title="<?php echo CHtml::encode($soft->title);?>">
							<?php if($soft->soft_icon && file_exists($soft->soft_icon)):?>
							<img src="<?php echo $soft->soft_icon;?>" width="60" height="60" alt="<?php echo CHtml::encode($soft->title);?>"/>
							<?php else:?>
							<img src="<?php echo $this->_stylePath;?>/images/ico_none.jpg" width="60" height="60" alt="<?php echo CHtml::encode($soft->title);?>"/>
							<?php endif;?>	
					</a>					
				</div>
				<div class="list_body">	
					<h2><?php echo CHtml::encode($soft->title);?></h2>
					
					<div class="content_info soft_info">
						<div class="info_head clear">
							<div class="info_left">		
								<?php if($soft->cover_image && file_exists($soft->cover_image)):?>					
								<img src="<?php echo $soft->cover_image;?>" alt="<?php echo CHtml::encode($soft->title);?>" />
								<?php else:?>
								<div class="no_cover"><?php echo Yii::t('common','No Cover');?></div>
								<?php endif;?>
							</div>
							
							<div class="info_right">
								<ul class="soft_attr">
									<li><?php echo Yii::t('model','SoftType');?>：<?php echo Yii::t('admin',ucfirst($soft->softtype).' Soft');?></li>
									<li><?php echo Yii::t('model','SoftLanguage');?>：<?php echo Yii::t('admin',$soft->language);?></li>
									<li><?php echo Yii::t('model','SoftOS');?>：<?php echo $soft->os?$soft->os:Yii::t('common','All');?></li>								
									<li><?php echo Yii::t('model','SoftRank');?>：<span class="star_empty"><em class="star_full" style="width:<?php echo 100*($soft->softrank/5);?>px"> </em></span></li>
									<li><?php echo Yii::t('common','UpdateTime');?>：<?php echo date('Y年m月d日',$soft->update_time);?></li>
									<li><?php echo Yii::t('model','ViewCount');?>：<?php echo $soft->view_count;?></li>
									<li><?php echo Yii::t('model','DownCount');?>：<?php echo $soft->down_count;?></li>
								</ul>
								
								<!-- 下载按钮 -->
								<div class="clear">
									<a href="<?php echo $this->createUrl('soft/download', array('id'=>$soft->id));?>" target="_blank" class="fl download_now"></a>
									<?php if($soft->softlink):?>
									<a href="<?php echo $soft->softlink;?>" target="_blank" class="fr download_quick"></a>
									<?php endif;?>
								</div>
								
							</div>												
						</div>
							
						<div class="info_desc clear">
							<h1>简介：</h1>
							<?php echo $soft->introduce;?>
						</div>						
					</div>
					
				</div>
			</div>				
			
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'topic_id'=>$soft->id,'topic_type'=>'soft'));?>"></iframe>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_softs'=>$last_softs));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
	<!-- 返回顶部 -->
	<a href="javascript:;" id="back_top"></a>			
