<!-- 导航面包屑 -->
<div id="bread_crumbs">
	<div class="crumb_box clear">
		<ul class="crumb_menu">
			<li>
				<a href="<?php echo Yii::app()->homeUrl;?>"><?php echo Yii::t('common','Home')?></a>
				<span>></span>
			</li>			
			<?php foreach((array)$navs as $nav):?>			
			<?php if($nav && is_array($nav)):?>
			<li>
				<a href="<?php echo $nav['url'];?>"><?php echo $nav['name'];?></a>
			</li>
			<?php endif;?>
			<?php endforeach;?>
		</ul>
	</div>
</div>