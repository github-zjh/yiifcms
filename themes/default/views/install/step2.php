<?php $this->renderPartial('_header')?>

	<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a2"><div class="jj_bg"></div></div>
            </div>
            <div class="ct">
            	<div class="bg_t"></div>
                <div class="clr">
                    <div class="l"></div>
                    <div class="ct_box nobrd i6v">
                    <div class="nr">
                        <table cellpadding="0" cellspacing="0" class="table_list">
                            <tr>
                                <th class="col1">检查项目</th>
                                <th class="col2">当前环境</th>
                                <th class="col3">YIIFCMS 建议</th>
                                <th class="col4">功能影响</th>
                            </tr>
                            <tr>
                                <td>操作系统</td>
                                <td><?php echo php_uname();?></td>
                                <td>Windows_NT/Linux/Freebsd</td>
                                <td><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span></td>
                            </tr>
                            <tr>
                                <td>WEB 服务器</td>
                                <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                                <td>Apache/Nginx/IIS</td>
                                <td><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span></td>
                            </tr>
                            <tr>
                                <td>PHP 版本</td>
                                <td>PHP <?php echo phpversion();?></td>
                                <td>PHP 5.3.0 及以上</td>
                                <td><?php if(phpversion() >= '5.3.0'){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;无法安装</font><?php }?></font></td>
                            </tr>
                            <tr>
                                <td>PDO 扩展</td>
                                <td><?php if(extension_loaded('pdo')){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须开启</td>
                                <td><?php if(extension_loaded('pdo')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;无法安装</font><?php }?></td>
                            </tr>

                            <tr>
                                <td>ICONV/MB_STRING 扩展</td>
                                <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须开启</td>
                                <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;字符集转换效率低</font><?php }?></td>
                            </tr>

                            <tr>
                                <td>Mcrypt 扩展</td>
                                <td><?php if(extension_loaded("mcrypt")){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须开启</td>
                                <td><?php if(extension_loaded("mcrypt")){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持Gzip功能</font><?php }?></td>
                            </tr>
                            <tr>
                                <td>Reflection 扩展</td>
                                <td><?php if(class_exists('Reflection', false)){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须开启</td>
                                <td><?php if(class_exists('Reflection', false)){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }elseif(ISUNIX){ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持FTP形式文件传送</font><?php }?></td>
                            </tr>

                        </table>
 					</div>
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box">
                <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
                <a href="<?php echo $this->createUrl('step3')?>" class="x_btn">下一步</a>
            </div>                	
        </div>
    </div>
<?php $this->renderPartial('_footer');?>
