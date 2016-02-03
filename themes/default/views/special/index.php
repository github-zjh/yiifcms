<!DOCTYPE html>
<html xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />
    <meta name="author" content="GoldHan.Zhao<326196998@qq.com>" />
    <meta name="cmsVersion" content="<?php echo $this->_cmsVersion;?>" />
    <meta name="cmsRelease" content="<?php echo $this->_cmsRelease;?>" />	
	<!-- 手持设备样式 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/special.css';?>" />
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
</head>
<body>
    <!-- 专题顶部 -->
    <div id="special_top">
        <div class="sl fl">
            <a href="<?php echo Yii::app()->homeUrl; ?>"><<返回首页</a>           
        </div>
        <div class="sr fr">
            <a href="<?php echo $this->createUrl('page/index', array('id' => 'help')); ?>">帮助中心>></a>
        </div>
    </div>
    
    <!-- 专题中部 -->
    <div id="special_mid">
        <div class="special_banner"><img src="<?php echo $special->img_banner;?>" /></div>
        <div class="special_box">
            <h2>专题资讯</h2>
            <?php if($special_news):?>
            <ul class="clear">
                <?php foreach($special_news as $n):?>
                <li><a href="<?php echo $this->createUrl('post/view', array('id' => $n->id));?>"><?php echo $n->title;?></a></li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </div>
        
        <div class="special_box">
            <h2>专题图集</h2>
            <?php if($special_images):?>
            <ul class="clear">
                <?php foreach($special_images as $i):?>
                <li><a href="<?php echo $this->createUrl('album/view', array('id' => $i->id));?>"><?php echo $i->title;?></a></li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </div>
        
    </div>
    
    <!-- 专题底部 -->
    <div id="special_bot">
        <?php $this->renderPartial('/layouts/footer_mini');?>
    </div>    
</body>
</html>  