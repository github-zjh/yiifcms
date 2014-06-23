	
	<dl class="page_left">
		<dt>栏目导航</dt>
		<?php foreach((array)$pagelists as $pl):?>
		<dd <?php if($pl->title_alias == $this->_request->getParam('title_alias')):?> class="selected"<?php endif;?>><a href="<?php echo $this->createUrl('page/index', array('title_alias'=>$pl->title_alias));?>"><?php echo $pl->title;?></a></dd>		
		<?php endforeach;?>
	</dl>
	<div class="page_right">
		<!-- 导航面包屑开始 -->
		<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
		<!-- 导航面包屑结束 -->
		
	</div>
		
	