		<!-- 内容右侧 -->
		<div class="content_right">
			<dl class="category tag clear">
				<dt><?php echo Yii::t('common','Tags');?></dt>
				<?php foreach((array)$this->_tags as $tag):?>				
				<dd><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$tag->tag_name));?>"><?php echo $tag->tag_name;?></a></dd>		
				<?php endforeach;?>	
				<dd class="tag_more"><a href="<?php echo $this->createUrl('tag/all');?>"><?php echo Yii::t('common','More');?></a></dd>				
			</dl>
		
		</div>
