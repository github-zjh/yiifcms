	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<dl class="tag_list clear">
		<?php foreach((array)$tags as $tag):?>				
		<dd><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$tag->tag_name));?>" title="<?php echo $tag->tag_name;?>"><?php echo $tag->tag_name;?></a></dd>		
		<?php endforeach;?>	
		</dl>

	</div>	
