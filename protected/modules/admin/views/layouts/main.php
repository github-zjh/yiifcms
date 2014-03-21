<?php 
    //引用公共头部模板    
	$this->renderPartial('/layouts/header');
?>
	<?php echo $content; ?>

<?php 
	//引用公共底部模板	 
	$this->renderPartial('/layouts/footer');
?>
