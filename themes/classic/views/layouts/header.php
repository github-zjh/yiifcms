<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />
	<link rel="stylesheet" href="<?php echo $this->_stylePath;?>/css/global.css" />
	<script type="text/javascript" src="<?php echo $this->_stylePath;?>/js/jquery-1.7.1.min.js"></script>
</head>
<body>
<!-- 头部header开始 -->
<div id="header">
	<div class="header_main clear">
		<div id="logo"><a class="logo_a" href="<?php echo $this->_request->hostinfo;?>"><?php echo $this->_setting['site_name'];?></a></div>
		<div id="msbox" class="clear">
			<ul id="menu">			
				<?php foreach((array)$this->_public_menu as $menu):?>
				<li>
					<a href="<?php echo $menu['value']['menu_link'];?>" <?php if($this->_cur_url == $menu['value']['menu_link']):?> class="select" <?php endif;?>><?php echo $menu['value']['menu_name'];?></a>	
					<div class="space"></div>
					<div class="child_box">
						<?php if($menu['children']):?>					
						<ul class="child_menu">
							<?php $i=1;?>
							<?php foreach($menu['children'] as $child):?>
							<li <?php if($i == count($menu['children'])):?> class="last"<?php endif;?>><a href="<?php echo $child['value']['menu_link'];?>"><?php echo $child['value']['menu_name'];?></a></li>
							<?php $i++;?>
							<?php endforeach;?>						
						</ul>
						<?php endif;?>
					</div>						
				</li>
				<?php endforeach;?>			
			</ul>
			<form id="search">
				<a class="search_btn" href="javascript:;">搜索</a>
				<input type="text" name="keyword" value="" placeholder="请输入想要搜索的内容"/>			
			</form>		
		</div>	
		<div id="login">
				<a href="<?php echo $this->createUrl('site/login');?>">登录</a>
				<a href="<?php echo $this->createUrl('site/register');?>">注册</a>
		</div>
		</div>	
</div>
<!-- 头部header结束 -->