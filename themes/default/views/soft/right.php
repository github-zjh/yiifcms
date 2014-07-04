		<!-- 内容右侧 -->
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
				<dd><a title="<?php echo CHtml::encode($ls->title);?>" href="<?php echo $this->createUrl('soft/view', array('id'=>$ls->id));?>"><?php echo Helper::truncate_utf8_string($ls->title,18);?></a></dd>		
				<?php endforeach;?>					
			</dl>		
		</div>