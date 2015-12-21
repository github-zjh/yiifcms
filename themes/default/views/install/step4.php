<?php $this->renderPartial('_header')?>

	<div class="body_box">
        <div class="main_box">
            <div class="hd">
            	<div class="bz a4"><div class="jj_bg"></div></div>
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
                                <td>私有临时文件(protected/runtime)</td>
                                <td><?php if(Helper::is_writeable(Yii::app()->runtimePath)){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须可读写</td>
                                <td><?php if(Helper::is_writeable(Yii::app()->runtimePath)){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
                            </tr>

                            <tr>
                                <td>附件上传目录(upload)</td>
                                <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'upload')){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须可读写</td>
                                <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'upload')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
                            </tr>

                            <tr>
                                <td>数据目录(data)</td>
                                <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'protected' . DS . 'data')){ ?>√<?php }else{ ?>×<?php }?></td>
                                <td>必须可读写</td>
                                <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'protected' . DS . 'data')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
                            </tr>

                            <tr>
                              <td>配置文件目录(protected/config)</td>
                              <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'protected' . DS . 'config')){ ?>√<?php }else{ ?>×<?php }?></td>
                              <td>必须可读写</td>
                              <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'protected' . DS . 'config')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
                            </tr>

                            <tr>
                              <td>公共资源文件(assets)</td>
                              <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'assets')){ ?>√<?php }else{ ?>×<?php }?></td>
                              <td>必须可读写</td>
                              <td><?php if(Helper::is_writeable(ROOT_PATH . DS . 'assets')){ ?><span><img src="<?php echo $this->_theme->baseUrl?>/styles/install_styles/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
                            </tr>
                        </table>
 					</div>
                    </div>
                </div>
                <div class="bg_b"></div>
            </div>
            <div class="btn_box">
                <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
                <a href="<?php echo $this->createUrl('step5');?>" class="x_btn">下一步</a>
            </div>                	
        </div>
    </div>
<?php $this->renderPartial('_footer');?>
