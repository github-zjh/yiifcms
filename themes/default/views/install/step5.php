<?php $this->renderPartial('_header') ?>
<div class="body_box">
    <div class="main_box">
        <div class="hd">
            <div class="bz a5"><div class="jj_bg"></div></div>
        </div>
        <div class="ct">
            <div class="bg_t"></div>
            <div class="clr">
                <div class="l"></div>
                <div class="ct_box nobrd i6v">
                    <div class="nr">
                        <?php $this->beginWidget('CActiveForm', array('id' => 'install', 'action' => $this->createUrl('step6')));?>
                            <fieldset>
                                <legend>填写数据库信息</legend>
                                <h4 style="color:burlywood;">注意：为了兼容不能自动创建数据库的空间，安装时需手动创建好数据库。</h4>
                                <div class="content">
                                    <table width="100%" cellspacing="1" cellpadding="0" >
                                        <tr>
                                            <th width="20%" align="right" >数据库主机：</th>
                                            <td>
                                                <input name="dbhost" type="text" id="dbhost" value="localhost" class="input-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%" align="right" >数据库端口：</th>
                                            <td>
                                                <input name="dbport" type="text" id="dbport" value="3306" class="input-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库帐号：</th>
                                            <td><input name="dbuser" type="text" id="dbuser" value="root" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库密码：</th>
                                            <td><input name="dbpw" type="password" id="dbpw" value="" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库名称：</th>
                                            <td>
                                                <input name="dbname" type="text" id="dbname" value="yiifcms" class="input-text" />
                                                <img src="<?php echo $this->_theme->baseUrl.'/styles/install_styles/help.png';?>" style="cursor:pointer;" title="请手动创建好数据库" align="absmiddle" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据表前缀：</th>
                                            <td>
                                                <input name="tablepre" type="text" id="tablepre" value="y_" class="input-text" />  
                                                <img src="<?php echo $this->_theme->baseUrl.'/styles/install_styles/help.png';?>" style="cursor:pointer;" title="如果一个数据库安装多个yiifcms，请修改表前缀" align="absmiddle" />                                                
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>填写帐号信息</legend>
                                <div class="content">
                                    <table width="100%" cellspacing="1" cellpadding="0">
                                        <tr>
                                            <th width="20%" align="right">超级管理员帐号：</th>
                                            <td><input name="username" type="text" id="username" value="yiifcms" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">管理员密码：</th>
                                            <td>
                                                <input name="password" type="password" id="password" value="yiifcms" class="input-text" />
                                                 <img src="<?php echo $this->_theme->baseUrl.'/styles/install_styles/help.png';?>" style="cursor:pointer;" title="默认密码是yiifcms" align="absmiddle" />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                        <?php $this->endWidget();?>
                    </div>
                </div>
            </div>
            <div class="bg_b"></div>
        </div>
        <div class="btn_box">
            <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
            <a href="javascript:void(0);" id="nextCheck" class="x_btn">下一步</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#nextCheck').click(function(){
            var dHost = $("#dbhost").val();
            var dPort = $("#dbport").val();
            var dName = $("#dbname").val();
            var dUsername = $("#dbuser").val();
            var dPassword = $("#dbpw").val();
            $(this).attr('disabled', true);
            $.post("<?php echo $this->createUrl('dbCheck') ?>", {dbHost: dHost, dbPort: dPort, dbName: dName, dbUsername: dUsername, dbPassword: dPassword}, function (res) {
                if (res.state == 'success') {
                    $('#install').submit();
                } else {
                    $('#nextCheck').attr('disabled', false);
                    alert(res.message);                    
                }
            }, 'json');
        });
    });   
</script>
<?php $this->renderPartial('_footer'); ?>
