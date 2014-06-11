<?php 
    //引用公共头部模板    
	$this->renderPartial('/layouts/header');
?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div>
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php 
	//引用公共底部模板	 
	$this->renderPartial('/layouts/footer');
?>
