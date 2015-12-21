<?php $this->renderPartial('_header')?>
<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a3"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box nobrd i6v">
                    <div class="nr">					
                        <fieldset>
                            <legend>安装设置</legend>
                            <div class="content">
                                <input type="radio" checked="checked" name="install_all" id="install_phpsso_1" value="1">&nbsp;&nbsp;全新安装YIIFCMS<br/>                                
                            </div>                           
                        </fieldset>	

                        <fieldset>
                            <legend>可选数据</legend>
                            <div class="content">
                                <label style="width:auto"><input type="checkbox" name="testdata" value="1" checked>默认测试数据 （用于新手和调试用户）</label>
                            </div>
                        </fieldset>
                        </div>
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box">
                <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
                <a href="<?php echo $this->createUrl('step4')?>" class="x_btn">下一步</a>
            </div>
        </div>
    </div>
<?php $this->renderPartial('_footer');?>
