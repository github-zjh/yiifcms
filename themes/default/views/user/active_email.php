<link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/user.css';?>" />
<div class="user clear">
    <?php
    //引用公共提示信息
    $this->renderPartial('/layouts/alert');
    ?>
    <div class="user_left">
        <!-- 用户菜单导航开始 -->
        <?php $this->renderPartial('user_left');?>
        <!-- 用户菜单导航结束 -->
    </div>
    <div class="user_right">
        <div class="user_edit">
            <h3><?php echo Yii::t('common','Account Active');?></h3>
            <div class="base_table base_active clear">
                <p class="active_msg"><?php echo Yii::t('common','Active Account Msg');?></p>
                <p class="active_btn">
                    <input type="button" id="send_e_btn" class="send_btn" name="sendEmailCaptcha" value="<?php echo Yii::t('common','Click Send Email');?>"/>
                    <span id="send_msg"></span>
                </p>
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $("#send_e_btn").click(function(){
                    $(this).attr("disabled",true);
                    $("#send_msg").text("<?php echo Yii::t('common','Sending..');?>");
                    var initemail = $("input[name='initEmail']").val();
                    var email = $("input[name='newEmail']").val();
                    $.post("<?php echo $this->createUrl('user/activeEmail');?>",{"ajax":"ajax_active_form"},
                        function(data){
                            $("#send_msg").text(data.message);
                            $("#send_e_btn").attr("disabled",false);
                        }
                    ,'json');
                });
            });
        </script>
    </div>
</div>
