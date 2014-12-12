	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
			<ul class="content_list">
			<?php foreach((array)$goods as $good):?>					
				<li class="list_box clear">
					<div class="list_head soft_list_head">
						<a href="<?php echo $this->createUrl('soft/view', array('id'=>$good->id));?>" title="<?php echo CHtml::encode($good->goods_name);?>">
							<?php if($good->default_thumb && file_exists($good->default_thumb)):?>
							<img src="<?php echo $good->default_thumb;?>" width="60" height="60" alt="<?php echo CHtml::encode($good->goods_name);?>"/>
							<?php else:?>
							<img src="<?php echo $this->_stylePath;?>/images/ico_none.jpg" width="60" height="60" alt="<?php echo CHtml::encode($good->goods_name);?>"/>
							<?php endif;?>	
						</a>
									
					</div>
					<div class="list_body">
						<h2><a href="<?php echo $this->createUrl('soft/view', array('id'=>$good->id));?>"  title="<?php echo CHtml::encode($good->goods_name);?>"><?php echo CHtml::encode($good->goods_name);?></a></h2>
						<p class="view_info">
							<span class="times fa">&nbsp;&nbsp;<?php echo Yii::t('common','UpdateTime')?>：<?php echo date('Y-m-d H:i',$good->update_time)?></span>
							<span class="views fa">&nbsp;&nbsp;<?php echo Yii::t('model','ViewCount')?>：<em><?php echo $good->views;?></em></span>							
						</p>						
						<a href="<?php echo $this->createUrl('soft/view', array('id'=>$good->id));?>" class="continue_read">[<?php echo Yii::t('common','View Info');?>]</a>
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