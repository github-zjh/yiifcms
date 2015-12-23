<?php $this->renderPartial('_header')?>
	<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a7"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box nobrd set7s">
                     <div class="nr">
						<div class="gxwc"><h1>恭喜您，安装成功！</h1></div>
						<div class="clj">
							<ul>
                                <li><a href="<?php echo Yii::app()->homeUrl;?>" title="访问网站" class="htgl">访问网站</a></li>
								<li><a href="<?php echo $this->createUrl('admin/default');?>" title="后台管理" class="htgl">后台管理</a></li>
							</ul>
						</div>					
						<div class="txt_c">
                            <span style="margin-right:8px;">*</span>安装完毕请登录后台进行相关配置<br/>
                            <span style="margin-right:8px;">*</span>默认管理员账号和密码是yiifcms<br/>
                            <span style="margin-right:8px;">*</span>为了您站点的安全，请删除“protected/controller/InstallController.php”。
                        </div>
                     </div>
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="h65"></div>			
        </div>
    </div>
<?php $this->renderPartial('_footer')?>