<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo CHtml::encode($this->_seoTitle);?></title>
<link rel="stylesheet" href="<?php echo $this->_stylePath;?>/css/global.css" />
<script type="text/javascript" src="<?php echo $this->_stylePath;?>/js/jquery-1.7.1.min.js"></script>
</head>
<body>
<!-- 头部header开始 -->
<div id="header" class="clear">
	<div id="logo">LOGO</div>
	<div id="msbox" class="clear">
		<ul id="menu">
			<li>
				<a href="<?php echo $this->createUrl('/');?>" class="select">Home</a>	
				<div class="space"></div>
				<div class="child_box">
					<ul class="child_menu">
						<li><a href="#">Child</a></li>
						<li><a href="#">Child</a></li>
						<li class="last"><a href="#">Child</a></li>
					</ul>
				</div>						
			</li>
			<li>
				<a href="<?php echo $this->createUrl('site/about');?>">About US</a>
				<div class="space"></div>
				<div class="child_box">
					<ul class="child_menu">
						<li><a href="#">Child</a></li>
						<li><a href="#">Child</a></li>
						<li class="last"><a href="#">Child</a></li>
					</ul>
				</div>				
			</li>
			<li>
				<a href="<?php echo $this->createUrl('site/contact');?>">Contact Us</a>
				<div class="space"></div>
				<div class="child_box">
					<ul class="child_menu">
						<li><a href="#">Child</a></li>
						<li><a href="#">Child</a></li>
						<li class="last"><a href="#">Child</a></li>
					</ul>
				</div>	
			</li>
			<li><a href="<?php echo $this->createUrl('post/index');?>">GOODS LIST</a></li>
			<li><a href="./show.html">Show</a></li>
			<li><a href="./page.html">Page</a></li>
		</ul>
		<form id="search">
			<a href="javascript:;"><img src="<?php echo $this->_stylePath;?>/images/search_btn.png" /></a>
			<input type="text" name="keyword" value="" placeholder="请输入关键字"/>			
		</form>
	</div>	
</div>
<!-- 头部header结束 -->