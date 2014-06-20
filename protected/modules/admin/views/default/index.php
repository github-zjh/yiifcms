<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_static_admin;?>/css/manage.css" />
    <script type="text/javascript" src="<?php echo $this->_static_public;?>/js/jquery/jquery-1.7.1.min.js"></script>
	<title><?php echo Yii::t('admin','admin manage'); ?> - <?php echo $this->setting_base['site_name'];?></title>
</head>

<body>

<div class="header">
  <div class="logo"><?php echo $this->setting_base['site_domain'];?></div>
  <div class="nav">
    <ul>
            <li index="0">
        <div><a href="<?php echo $this->createUrl('default/home');?>" target="win" hidefocus>首页</a></div>
      </li>      
      <li index="1">
        <div><a href="<?php echo $this->createUrl('setting/index');?>" target="win" hidefocus>设置</a></div>
      </li>
      <li index="2">
        <div><a href="<?php echo $this->createUrl('catalog/index');?>" target="win" hidefocus>栏目</a></div>
      </li>
      <li index="3">
        <div><a href="<?php echo $this->createUrl('post/index');?>" target="win" hidefocus>内容</a></div>
      </li>
      <li index="4">
        <div><a href="<?php echo $this->createUrl('user/index');?>" target="win" hidefocus>用户</a></div>
      </li>     
      <li index="5">
        <div><a href="<?php echo $this->createUrl('ad/index');?>" target="win" hidefocus>广告</a></div>
      </li> 
      <li index="6">
        <div><a href="<?php echo $this->createUrl('recommendPosition/index');?>" target="win" hidefocus>组件</a></div>
      </li>
      <li index="7">
        <div><a href="<?php echo $this->createUrl('modeltype/index');?>" target="win" hidefocus>模型</a></div>
      </li>
      <li index="8">
        <div><a href="<?php echo $this->createUrl('database/index');?>" target="win" hidefocus>工具</a></div>
      </li>
          </ul>
  </div>  
  <div class="logininfo">
	  <span class="welcome"><img src="/static/admin/images/user_edit.png" align="absmiddle"> 欢迎【<?php echo Yii::app()->user->groupname;?>】, <em><?php echo Yii::app()->user->name;?></em> </span> 
	  <a href="<?php echo $this->createUrl('/admin/user/update/id/'.Yii::app()->user->id);?>" target="win">修改密码</a> 
	  <a href="<?php echo $this->createUrl('/admin/default/logout');?>" target="_top">退出登录</a> 
	  <a href="/" target="_blank">前台首页</a><br/>
	  <a href="javascript:;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前服务器时间：<?php echo date('Y年m月d日 H:i:s',time());?></a>
  </div>
  
</div>
<div class="topline">
  <div class="toplineimg left" id="imgLine"></div>
</div>
<div class="main" id="main">
  <div class="mainA">
    <div id="leftmenu" class="menu">
            <ul index="0" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('default/home');?>" target="win"><?php echo Yii::t('admin','System Home');?></a></li>
              </ul>
            <ul index="1" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('setting/index');?>" target="win"><?php echo Yii::t('admin','Web Set');?></a></li>
                <li index="1"><a href="<?php echo $this->createUrl('setting/seo');?>" target="win"><?php echo Yii::t('admin','SEO Set');?></a></li>
                <li index="2"><a href="<?php echo $this->createUrl('setting/upload');?>" target="win"><?php echo Yii::t('admin','Upload Set');?></a></li>
                <li index="3"><a href="<?php echo $this->createUrl('setting/template');?>" target="win"><?php echo Yii::t('admin','Template Set');?></a></li>
                <li index="4"><a href="<?php echo $this->createUrl('setting/custom');?>" target="win"><?php echo Yii::t('admin','Custom Set');?></a></li>
              </ul>
            <ul index="2" class="left_menu">
            	<li index="0"><a href="<?php echo $this->createUrl('catalog/index');?>" target="win"><?php echo Yii::t('admin','Catalog Manage');?></a></li>
            	<li index="1"><a href="<?php echo $this->createUrl('menu/index');?>" target="win"><?php echo Yii::t('admin','Menu Manage');?></a></li>
            	<li index="2"><a href="<?php echo $this->createUrl('special/index');?>" target="win"><?php echo Yii::t('admin','Special Manage');?></a></li>                
            </ul>
            <ul index="3" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('post/index');?>" target="win"><?php echo Yii::t('admin','Article Manage');?></a></li>
                <li index="1"><a href="<?php echo $this->createUrl('image/index');?>" target="win"><?php echo Yii::t('admin','Image Manage');?></a></li>
                <li index="2"><a href="<?php echo $this->createUrl('soft/index');?>" target="win"><?php echo Yii::t('admin','Soft Manage');?></a></li>
                <li index="3"><a href="<?php echo $this->createUrl('video/index');?>" target="win"><?php echo Yii::t('admin','Video Manage');?></a></li>
                <li index="4"><a href="<?php echo $this->createUrl('goods/index');?>" target="win"><?php echo Yii::t('admin','Goods Manage');?></a></li>
                <li index="5"><a href="<?php echo $this->createUrl('page/index');?>" target="win"><?php echo Yii::t('admin','Page Manage');?></a></li>                   
            </ul>
            <ul index="4" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('user/index');?>" target="win"><?php echo Yii::t('admin','User List');?></a></li>
                <li index="1"><a href="<?php echo $this->createUrl('user/admin');?>" target="win"><?php echo Yii::t('admin','Admin List');?></a></li>   
                <li index="2"><a href="<?php echo $this->createUrl('user/group');?>" target="win"><?php echo Yii::t('admin','Group Manage');?></a></li>              
                <li index="3"><a href="<?php echo $this->createUrl('question/index');?>" target="win"><?php echo Yii::t('admin','Question List');?></a></li>            	
            </ul>      
            <ul index="5" class="left_menu">             	
                <li index="0"><a href="<?php echo $this->createUrl('ad/index');?>" target="win"><?php echo Yii::t('admin','Ads Manage');?></a></li>
                <li index="1"><a href="<?php echo $this->createUrl('adPosition/index');?>" target="win"><?php echo Yii::t('admin','Adposition Manage');?></a></li>
            </ul>      
            <ul index="6" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('recommendPosition/index');?>" target="win"><?php echo Yii::t('admin','RecommendPosition Manage');?></a></li> 
           		<li index="1"><a href="<?php echo $this->createUrl('attach/index');?>" target="win"><?php echo Yii::t('admin','Attach Manage');?></a></li> 				
                <li index="2"><a href="<?php echo $this->createUrl('link/index');?>" target="win"><?php echo Yii::t('admin','Link Manage');?></a></li>  
                <li index="5"><a href="<?php echo $this->createUrl('comment/index');?>" target="win"><?php echo Yii::t('admin','Comment Manage');?></a></li>
                <li index="6"><a href="<?php echo $this->createUrl('post/tags');?>" target="win"><?php echo Yii::t('admin','Tags Manage');?></a></li>                             
              </ul>
              
             <ul index="7" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('modeltype/index');?>" target="win"><?php echo Yii::t('admin','Modeltype Manage');?></a></li>            
             </ul>
              
            <ul index="8" class="left_menu">
                <li index="0"><a href="<?php echo $this->createUrl('database/index');?>" target="win"><?php echo Yii::t('admin','Database Manage');?></a></li>
                <li index="1"><a href="<?php echo $this->createUrl('cache/index');?>" target="win"><?php echo Yii::t('admin','Cache Manage');?></a></li>
                <li index="2"><a href="<?php echo $this->createUrl('auth/index');?>" target="win"><?php echo Yii::t('admin','Auth Manage');?></a></li>
              </ul>
          </div>
  </div>
  <div class="mainB" id="mainB">
    <iframe name="win" id="win" width="100%" height="100%" frameborder="0"></iframe>
  </div>
	</div>
	<script type="text/javascript">
		window.onload =window.onresize= function(){winresize();}
		function winresize()
		{
		function $(s){return document.getElementById(s);}
		var D=document.documentElement||document.body,h=D.clientHeight-90,w=D.clientWidth-160;
		 $("main").style.height=h+"px";
		 $("mainB").style.width=w+"px";
		}
		$(document).ready(function(){
		    var s=document.location.hash;
		    if(s==undefined||s==""){s="#0_0";}
		    s=s.slice(1);
		    var navIndex=s.split("_");
		    $(".nav").find("li:eq("+navIndex[0]+")").addClass("active");
		    var targetLink=$(".menu").find("ul").hide().end()
		                             .find(".left_menu:eq("+navIndex[0]+")").show()
		                             .find("li:eq("+navIndex[1]+")").addClass("active")
		                             .find("a").attr("href");
		    $("#win").attr("src",targetLink);
		    $(".nav").find("li").click(function(){
		        $(this).parent().find("li").removeClass("active").end().end()
		               .addClass("active");
		        var index=$(this).attr("index");
		        $(".menu").find(".left_menu").hide();
		        $(".menu").find(".left_menu:eq("+index+")").show()
		                  .find("li").removeClass("active").first().addClass("active");
		        document.location.hash=index+"_0";
		    });
		    $(".left_menu").find("li").click(function(){
		            $(this).parent().find("li").removeClass("active").end().end()
		                            .addClass("active");
		        document.location.hash=$(this).parent().attr("index")+"_"+$(this).attr("index");
		    });
		});
	</script>
	
	<div class="clear"></div>
	
</body>
</html>