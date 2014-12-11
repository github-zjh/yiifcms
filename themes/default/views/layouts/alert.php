<?php 
	/**
	 * 类似alert提示框  优化用户体验
	 * 
	 * @author zhao jinhan <qq:326196998>
	 * @date 2014年12月11日14:15:00
	 * 
	 */
	
?>
<?php foreach(Yii::app()->user->getFlashes() as $key => $message) :?>
	<div class="<?php echo 'alert_'.$key;?> alert fade in">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $message; ?>
	</div>
<?php endforeach;?>
<script type="text/javascript">
	$(function(){
		$("button.close").click(function(){
			$(this).parent().fadeOut();
		});
	});
</script>