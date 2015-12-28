		<!-- 内容右侧 -->
		<div class="content_right">
            <dl class="category tag clear">
				<dt><?php echo Yii::t('common','Tags');?></dt>
				<?php foreach((array)$this->_tags as $tag):?>				
				<dd><a href="<?php echo $this->createUrl('tag/index',array('tag'=>$tag->tag_name));?>" title="<?php echo $tag->tag_name;?>"><?php echo $tag->tag_name;?></a></dd>		
				<?php endforeach;?>	
				<dd class="tag_more"><a href="<?php echo $this->createUrl('tag/all');?>"><?php echo Yii::t('common','More');?></a></dd>				
			</dl>
			<dl class="category recent_post">
				<dt><?php echo Yii::t('common','Last Softs');?></dt>
				<?php foreach((array)$last_softs as $ls):?>
				<dd><a title="<?php echo CHtml::encode($ls->title);?>" href="<?php echo $this->createUrl('soft/view', array('id'=>$ls->id));?>"><?php echo Helper::truncate_utf8_string($ls->title,18);?></a></dd>		
				<?php endforeach;?>					
			</dl>		
		</div>