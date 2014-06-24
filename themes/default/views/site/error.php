	<div id="content" class="clear">
		<h2 class="img_error"><?php echo CHtml::encode($message); ?></h2>		
		<ul class="continue">
			<h3>点击以下链接，继续浏览内容 >></h3>
			<li><a href="<?php echo Yii::app()->homeUrl;?>">返回首页</a></li>
			<li><a href="<?php echo $this->createUrl('question/index');?>">留言反馈</a></li>			
		</ul>
	</div>