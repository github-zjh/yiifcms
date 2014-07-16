	
	<dl class="page_left">
		<dt><?php echo Yii::t('common','Page Read')?></dt>
		<?php foreach((array)$pagelists as $pl):?>
		<dd <?php if($pl->id == $this->_request->getParam('id')):?> class="selected"<?php endif;?>><a href="<?php echo $this->createUrl('page/index', array('id'=>$pl->id));?>"><?php echo $pl->title;?></a></dd>		
		<?php endforeach;?>
	</dl>
	<div class="page_right">
		<!-- 导航面包屑开始 -->
		<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
		<!-- 导航面包屑结束 -->
		<div class="page_content clear">
			<?php echo $page->content;?>
		</div>	
	</div>
	
	
		
	