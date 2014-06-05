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
							<p><?php echo date('M',$soft->update_time)?></p>
							<strong><?php echo date('d',$soft->update_time)?></strong>
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
			<div id="page">	
				<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>		
			</div>
			<!-- 分页结束 -->
			
		</div>
		<div class="content_right">
			<dl class="category">
				<dt><?php echo Yii::t('common','Catagorys');?></dt>
				<?php foreach((array)$this->_catalog as $cate):?>
				<dd><a href="<?php echo $this->createUrl('soft/index',array('catalog_id'=>$cate->id));?>"><?php echo $cate->catalog_name;?></a></dd>		
				<?php endforeach;?>					
			</dl>	
			
			<dl class="category recent_post">
				<dt><?php echo Yii::t('common','Last Softs');?></dt>
				<?php foreach((array)$last_softs as $ls):?>
				<dd><a title="<?php echo $ls->title;?>" href="<?php echo $this->createUrl('soft/view', array('id'=>$ls->id));?>"><?php echo Helper::truncate_utf8_string($ls->title,18);?></a></dd>		
				<?php endforeach;?>					
			</dl>		
		</div>
		
	</div>	