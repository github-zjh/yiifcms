<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />
	<meta property="qc:admins" content="3621316677611163536375" />
	<meta property="wb:webmaster" content="cca24d5480c4043c" />	
	<!-- 手持设备样式 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:720px),only screen and (max-device-width:720px)" href="<?php echo $this->_stylePath;?>/css/media.css"/>
</head>
<body>
<!-- 头部header开始 -->
<div id="header">
	<div class="header_main clear">
		<div id="logo">
			<a class="logo_a" href="<?php echo Yii::app()->homeUrl;?>" title="<?php echo $this->_setting['site_name'];?>">
				<img src="<?php echo $this->_static_public.'/logo.png';?>" alt="<?php echo $this->_setting['site_name'];?>"/>
			</a>
		</div>
		<div id="msbox">			
			<ul id="menu">			
				<?php foreach((array)$this->_public_menu as $menu):?>				
				<li <?php if(isset($this->_menu_unique) && $this->_menu_unique == $menu['value']['unique']):?> class="selected"<?php endif;?>>
					<a href="<?php echo $menu['value']['menu_link'];?>" <?php if($menu['value']['target']== 'Y'):?> target="_blank" <?php endif;?>><?php echo $menu['value']['menu_name'];?></a>
					<?php if($menu['children']):?>
					<div class="child_box">											
						<ul class="child_menu">
							<?php $i=1;?>
							<?php foreach($menu['children'] as $child):?>
							<li <?php if($i == count($menu['children'])):?> class="last"<?php endif;?>><a href="<?php echo $child['value']['menu_link'];?>" <?php if($child['value']['target']== 'Y'):?> target="_blank" <?php endif;?>><?php echo $child['value']['menu_name'];?></a></li>
							<?php $i++;?>
							<?php endforeach;?>						
						</ul>						
					</div>	
					<?php endif;?>					
				</li>
				<?php endforeach;?>			
			</ul>
			<form id="search"  tabindex="0" action="<?php echo $this->createUrl('tag/index');?>" method="get">				
				<input type="submit" class="search_btn" value="<?php echo Yii::t('common','Search');?>" />	
				<input type="hidden" id="oldkeyword" value="" />
				<input type="text" name="tag" id="keyword" value="" autocomplete="off" placeholder="<?php echo Yii::t('common','Search Desc');?>"/>
				<script type="text/javascript">
					//ajax搜索
					$(function(){						
						$("#oldkeyword").val('');						
						$("#keyword").on('keyup', function(){																			
							var tag = $(this).val().replace(/(^\s*)|(\s*$)/g, "");		
							var oldtag = $("#oldkeyword").val();
							if(tag && oldtag != tag){					
								$("#search_result").html('<li><a href="javascript:;">正在搜索...</a></li>');	
								$.getJSON("<?php echo $this->createUrl('tag/ajax');?>", {'tag':tag, 'ajax':1}, function(data){
									var result = '';
									if(data && data.length > 0){
										$.each(data,function(i, item){
											result += '<li><a href="'+item.url+'" target="_blank" title="'+item.title+'">'+item.title+'</a></li>';
										});			
									}else{
										result = '<li><a href="javascript:;" class="red"><?php echo Yii::t('common','Nothing Is Found')?></a></li>';
									}
									$("#search_result").html(result);	
								});
							}
							$("#search_result").show();
							$("#oldkeyword").val(tag);
						});
						$("#search").on("mouseleave",function(){													
							$("#search_result").hide();
						});
						
						$("#search").on("mouseover",function(){													
							$("#search_result").show();
						});
						
						$("#keyword").on("focus",function(){
							$("#search_result").show();
						});

					});
				</script>
				<ul id="search_result"></ul>
			</form>				
		</div>	
		<?php if(Yii::app()->user->getIsGuest()):?>	
		<div id="login">			
			<a href="<?php echo $this->createUrl('user/login');?>" rel="nofollow"><?php echo Yii::t('common','Login');?></a>
			<a href="<?php echo $this->createUrl('user/register');?>" rel="nofollow"><?php echo Yii::t('common','Register');?></a>			
		</div>
		<?php else:?>
		<div id="logout">		
			<a href="<?php echo $this->createUrl('user/index');?>" class="show_drop">
				<?php $profile= User::model()->findByPk(Yii::app()->user->id);?>
				<img src="<?php echo $profile->avatar?$profile->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>" width="24" height="24" />
				<label><?php echo Yii::t('common','My Account');?><i class="fa fa-sort-desc"></i></label>
			</a>
			<div id="drop_down_user">
				<a class="fl" href="<?php echo $this->createUrl('user/index');?>"><img src="<?php echo $profile->avatar?$profile->avatar:$this->_stylePath.'/images/avatar-max-img.png';?>" width="80"/></a>
				<div class="fl user_simple">
					<p><label>账号：</label><a href="<?php echo $this->createUrl('user/index');?>"><?php echo Yii::app()->user->name;?></a></p>
					<p><label>昵称：</label><a href="<?php echo $this->createUrl('user/index');?>"><?php echo Yii::app()->user->nickname;?></a></p>
				</div>
				<div class="clear"></div>
				<dl class="user_menu">				
					<dd><a href="<?php echo $this->createUrl('user/index');?>"><i class="fa fa_userinfo"></i><?php echo Yii::t('common','User Center');?></a></dd>
					<dd><a href="<?php echo $this->createUrl('user/setting');?>"><i class="fa fa_setting"></i><?php echo Yii::t('common','Setting');?></a></dd>
					<dd><a href="<?php echo $this->createUrl('user/logout');?>"><i class="fa fa_poweroff"></i><?php echo Yii::t('common','Logout');?></a></dd>
				</dl>	
			</div>
								
		</div>
		<?php endif;?>
	</div>	
</div>
<!-- 头部header结束 -->
