<html>
    <head>
        <title>操作提示    -  <?php echo $this->_setting["seo_title"]?></title>
        <style type="text/css">
            .tips_wrap{ width:780px;padding:50px;margin:100px auto;}
            .tips_inner{zoom:1;}
            .tips_inner:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0;}
            .tips_inner .tips_img{width:80px;float:left;}
            .tips_info{float:left;line-height:35px;width:650px}
            .tips_info h3{font-weight:bold;color:#1A90C1;font-size:16px;}
            .tips_info p{font-size:14px;color:#999;}
            .tips_info p.message_error{font-weight:bold;color:#F00;font-size:16px; line-height:22px}
            .tips_info p.message_success{font-weight:bold;color:#1a90c1;font-size:16px; line-height:22px}
            .tips_info p.return{font-size:12px}
            .tips_info .time{color:#f00; font-size:14px; font-weight:bold}
            .tips_info p a{color:#1A90C1;text-decoration:none;}
        </style>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php if(!$stop):?>
        <script type="text/javascript">
            function delayURL(url) {
                if($('#time')) {
                    var delay = $('#time').text();
                    //alert(delay);
                    if(delay > 0){
                        delay--;
                        $('#time').text(delay);
                        setTimeout("delayURL(\'" + url + "\')", 1000);
                    } else {
                        window.location.href = url;
                    }
                }
            }
            $(function(){
                delayURL("<?php echo $redirect;?>");
            });
        </script>
    </head>
    <body>
        <div class="tips_wrap">
            <div class="tips_inner">
                <div class="tips_img">
                    <img src="<?php echo $this->_static_public.'/images/' . $images ?>"/>
                </div>
                <div class="tips_info">

                    <p class="<?php echo $class?>"><?php echo $content?></p>
                    <p class="return">系统自动跳转在
                        <span class="time" id="time"><?php echo $timeout?></span>  秒后，如果不想等待，
                        <a href="<?php echo $redirect;?>">点击这里跳转</a>
                    </p>
                </div>
            </div>
        </div>
        <?php else:?>
        <div class="tips_wrap">
            <div class="tips_inner">
                <div class="tips_img">
                    <img src="<?php echo $this->_static_public.'/images/' . $images ?>"/>
                </div>
                <div class="tips_info">
                    <p class="<?php echo $class?>"><?php echo $content;?></p>
                    <p class="return"><a href="<?php echo $redirect?>">点击这里返回</a></p>
                </div>
            </div>
        </div>
        <?php endif;?>
    </body>
</html>
