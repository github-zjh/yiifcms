<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo;?>" />	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />	
</head>
<body>
<!-- 头部header开始 -->
<div id="header">
	<div class="header_main clear">
		<div id="logo"><a class="logo_a" href="<?php echo Yii::app()->homeUrl;?>"><?php echo $this->_setting['site_name'];?></a></div>
		<div id="msbox">			
			<ul id="menu">			
				<?php foreach((array)$this->_public_menu as $menu):?>				
				<li <?php if(isset($this->_menu_unique) && $this->_menu_unique == $menu['value']['unique']):?> class="selected"<?php endif;?>>
					<a href="<?php echo $menu['value']['menu_link'];?>"><?php echo $menu['value']['menu_name'];?></a>
					<?php if($menu['children']):?>
					<div class="child_box">											
						<ul class="child_menu">
							<?php $i=1;?>
							<?php foreach($menu['children'] as $child):?>
							<li <?php if($i == count($menu['children'])):?> class="last"<?php endif;?>><a href="<?php echo $child['value']['menu_link'];?>"><?php echo $child['value']['menu_name'];?></a></li>
							<?php $i++;?>
							<?php endforeach;?>						
						</ul>						
					</div>	
					<?php endif;?>					
				</li>
				<?php endforeach;?>			
			</ul>
			<form id="search">
				<a class="search_btn" href="javascript:;"><?php echo Yii::t('common','Search');?></a>
				<input type="text" name="keyword" value="" placeholder="<?php echo Yii::t('common','Search Desc');?>"/>
			</form>				
		</div>	
		<?php if(Yii::app()->user->getIsGuest()):?>	
		<div id="login">			
			<a href="<?php echo $this->createUrl('user/login');?>"><?php echo Yii::t('common','Login');?></a>
			<a href="<?php echo $this->createUrl('user/register');?>"><?php echo Yii::t('common','Register');?></a>			
		</div>
		<?php else:?>
		<div id="logout">		
			<a href="<?php echo $this->createUrl('user/index');?>" class="show_drop">
				<img src="<?php echo $this->_stylePath.'/images/avatar-small-img.png';?>" width="24" height="24" />
				<label><?php echo Yii::app()->user->name;?></label>
			</a>
			<dl id="drop_down_user">				
				<dd><a href="<?php echo $this->createUrl('user/index');?>"><i class="fa fa_userinfo"></i><?php echo Yii::t('common','User Center');?></a></dd>
				<dd><a href="<?php echo $this->createUrl('user/setting');?>"><i class="fa fa_setting"></i><?php echo Yii::t('common','Setting');?></a></dd>
				<dd><a href="<?php echo $this->createUrl('user/logout');?>"><i class="fa fa_poweroff"></i><?php echo Yii::t('common','Logout');?></a></dd>
			</dl>						
		</div>
		<?php endif;?>
	</div>	
</div>
<!-- 头部header结束 -->