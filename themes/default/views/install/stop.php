<?php $this->renderPartial('_header') ?>
<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a6"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box stop">                        
                        <p class="title red">您已经安装好了，请勿重复安装。</p>
                        <strong>现在您可以：</strong>
                        <a href="<?php echo Yii::app()->homeUrl ?>">访问网站首页</a>
                        &nbsp;&nbsp;<span>或</span>&nbsp;&nbsp;
                        <a href="<?php echo $this->createUrl('admin/default') ?>">访问后台</a>
                        <div class="complete_note ">
                            <p class="red">如重新安装，请删除 data/install.lock 文件</p>
                            <p class="help">
                                <strong>获取更多帮助</strong>
                                <br />
                                QQ群  ：235981026<br/>
                                开发者QQ：326196998
                            </p>
                        </div>                       
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box">                
                <a href="<?php echo $this->createUrl('install/step1');?>"  class="x_btn pre" >重新安装</a>
            </div>            
        </div>
    </div>
<?php $this->renderPartial('_footer')?>