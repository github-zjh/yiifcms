	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
			<ul class="content_list">
			<?php foreach((array)$softs as $soft):?>					
				<li class="list_box clear">
					<div class="list_head">
						<div class="date_time">
							<p><?php echo date('Y',$soft->update_time)?></p>
							<strong>
								<?php echo date('m.d',$soft->update_time)?>
								<br/><?php echo date('H:i:s',$soft->update_time)?>
							</strong>
						</div>						
					</div>
					<div class="list_body">
						<h2><a href="<?php echo $this->createUrl('soft/view', array('id'=>$soft->id));?>"><?php echo $soft->title;?></a></h2>
						<p class="view_info">
							<span></span>
							<span class="views"><em><?php echo $soft->down_count;?></em></span>
						</p>
						<p class="content_info">
							<?php echo $soft->introduce?$soft->introduce:'...';?>
						</p>
						<a href="<?php echo $this->createUrl('soft/view', array('id'=>$soft->id));?>" class="continue_read"><?php echo Yii::t('common','Read More');?></a>
					</div>
				</li>			
				<?php endforeach;?>
				
			
			<!-- 分页开始 -->			
			<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
			<!-- 分页结束 -->
			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_softs'=>$last_softs));?>	
		<!-- 右侧内容结束 -->
	</div>	