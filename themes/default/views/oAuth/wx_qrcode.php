<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $this->_seoTitle;?>></title>
        <meta name="keywords" content="微信网页版,weixin web,wechat,微信 pc,微信电脑版,wechat web,微信 web,微信电脑">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link href="<?php echo $this->_stylePath;?>/css/webchat.css" rel="stylesheet"/>       
    </head>
<body>   
    <div class="login ng-scope">
        <!--BEGIN logo-->
        <div class="logo">
            <i class="web_wechat_login_logo"></i>
        </div>
        <!--END logo-->
        <!--BEGIN login_box-->
        <div class="login_box">
            <div class="qrcode">
                <img class="img" src="<?php echo $qrcode_url;?>">
                <p class="sub_title">扫描二维码登录微信</p>
                <p style="color:red; font-size: 14px; font-weight: bold;">Sorry! 该页面功能暂不对外开放</p>
                <div class="extension">
                    <div class="item">
                        <i class="icon web_wechat_login_phone_icon"></i>
                        <div class="cont">
                            <h4 class="title">登录手机微信</h4>
                            <p class="desc">
                                手机上
                                <a href="http://weixin.qq.com/cgi-bin/readtemplate?t=weixin_download_list&lang=zh_CN" target="_blank" class="ng-scope">安装</a>
                                并登录微信
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <i class="icon web_wechat_login_scan_icon"></i>
                        <div class="cont">
                            <h4 class="title">进入“扫一扫”</h4>
                            <p class="desc">从“发现”，进入“扫一扫”，扫码登录微信网页版</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="avatar">
                <img class="img" src="./wxlogin_files/img28a2f7.gif">
                <h4 class="sub_title">扫描成功</h4>
                <p class="tips">请在手机上点击确认以登录</p>
                <a href="javascript:;" ng-click="isScan = false;" class="action">返回二维码登录</a>
            </div>
        </div>
        <!--END login_box-->
        <!--BEGIN lang-->
        <div class="lang">
            <a href="<?php echo Yii::app()->homeUrl;?>">返回首页</a>
            <span class="sep"></span>
            <a href="<?php echo $this->createUrl('user/login');?>">其他方式登录</a>
            <span class="sep"></span>
            <a href="<?php echo $this->createUrl('user/register');?>">注册</a>
        </div>

        <!--END lang-->
        <!--BEGIN copyright-->
        <div class="copyright">
            <p class="desc">Copyright © 2014 - 2016,  All Rights Reserved</p>
        </div>
        <!--END copyright-->
    </div><!-- end ngIf: true -->
    <!--END login-->   
</body>
</html>
