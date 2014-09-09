<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl;?>/css/manage.css" />
    <script type="text/javascript" src="<?php echo $this->_static_public;?>/js/jquery/jquery-1.7.1.min.js"></script>
	<title><?php echo Yii::t('admin','admin manage'); ?> - <?php echo $this->setting_base['site_name'];?></title>
</head>

<body>

<div class="header">
  <div class="logo"><?php echo $this->setting_base['site_domain'];?></div>
  <div class="nav">
    <ul>
      <?php foreach($FirstMenus as $fk => $fm):?>
      <li index="<?php echo $fk?>">
        <div><a href="<?php echo $fm['url'];?>" target="win" ><?php echo $fm['name'];?></a></div>
      </li>      
      <?php endforeach;?>
     </ul>
  </div>  
  <div class="logininfo">
	  <span class="welcome"><img src="<?php echo $this->module->assetsUrl;?>/images/user_edit.png" align="absmiddle"> 欢迎【<?php echo Yii::app()->user->groupname;?>】, <em><?php echo Yii::app()->user->name;?></em> </span> 
	  <a href="<?php echo $this->createUrl('user/update', array('id'=>Yii::app()->user->id));?>" target="win"><?php echo Yii::t('admin','Update Password');?></a> 
	  <a href="<?php echo $this->createUrl('default/logout');?>" target="_top"><?php echo Yii::t('admin','Logout');?></a> 
	  <a href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" target="_blank"><?php echo Yii::t('admin','Home Url');?></a><br/>
	  <a href="javascript:;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Yii::t('admin','Cur Server Date');?>：<?php echo date('Y年m月d日 H:i:s',time());?></a>
  </div>
  
</div>
<div class="topline">
  <div class="toplineimg left" id="imgLine"></div>
</div>
<div class="main" id="main">
  <div class="mainA">
    <div id="leftmenu" class="menu">  
    		<?php foreach((array)$SecMenus as $sk => $sm):?>
    			
            <ul index="<?php echo $sk;?>" class="left_menu">
            	<?php foreach((array)$sm as $sek => $sem):?>
                <li index="<?php echo $sek;?>"><a href="<?php echo $sem['url'];?>" target="win"><?php echo $sem['name'];?></a></li>
                <?php endforeach;?>
              </ul>
            <?php endforeach;?>           
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
		        var index=$(this).index();
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
