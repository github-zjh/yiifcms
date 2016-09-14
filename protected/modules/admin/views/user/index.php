<!-- 头部开始 -->
<div id="contentHeader">
    <!-- 标题开始 -->
    <h3><?php echo (isset($adminPage) && $adminPage)?Yii::t('admin','Admin Manage'):Yii::t('admin','User Manage');?></h3>
    <!-- 标题结束 -->
    
    <!-- 搜索表单开始 -->
    <div class="searchArea">
        <ul class="action left" >
            <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
        </ul>
        <div class="search right">
            <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm', 'action' =>array('index'), 'method'=>'get', 'htmlOptions'=>array('name'=>'xform'))); ?>
            <?php echo Yii::t('admin','Status');?>:            
            <select name="status" id="status">                
                <?php foreach($user_status as $key => $v):?>
                <option value="<?php echo $key?>" <?php Helper::selected($key, $status);?>><?php echo $v?></option>
                <?php endforeach;?>
            </select>
            <?php echo Yii::t('admin','User Group');?>:
            <?php if(!isset($adminPage)):?>
            <select name="groupid" id="groupid">
                <option value="">=组=</option>
                <?php foreach((array)$this->group_list as $group):?>
                <option value="<?php echo $group['id']?>" <?php Helper::selected($group['id'], Yii::app()->request->getParam('groupid'));?>><?php echo $group['group_name']?></option>
                <?php endforeach;?>
            </select>
            <?php endif;?>
            用户名
            <input id="username" type="text" name="username" value="<?php echo Yii::app()->request->getParam('username')?>" class="txt" size="15"/>      
            <input name="searchsubmit" type="submit" class="button" value="<?php echo Yii::t('admin','Search');?>"/>
            <input type="reset" class="button" value="<?php echo Yii::t('admin','Reset');?>" />        
            <?php $this->endWidget(); ?>
            <script type="text/javascript">
                $(document).ready(function(){                
                    $("#groupid").val('<?php echo Yii::app()->request->getParam('groupid')?>');
                });
            </script>
        </div>
    </div>
    <!-- 搜索表单结束 -->
</div>
<!-- 头部结束 -->

<!-- 列表开始 -->
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <table class="content_list">
        <!-- 表格header开始 -->
        <tr class="tb_header">
            <th width="5%">ID</th>
            <th width="20%"><?php echo Yii::t('model','username');?> </th> 
            <th width="10%"><?php echo Yii::t('model','usergroup');?> </th>
            <th width="8%"><?php echo Yii::t('model','status');?></th>
            <th width="8%"><?php echo Yii::t('model','logins');?></th>
            <th width="6%"><?php echo Yii::t('model','register_ip');?></th>
            <th width="6%"><?php echo Yii::t('model','last_login_ip');?></th>
            <th width="13%"><?php echo Yii::t('model','addtime');?></th>
            <th><?php echo Yii::t('admin','Operate');?></th>
        </tr>
        <!-- 表格header结束 -->
        
        <!-- 表格body开始 -->
        <?php foreach ($datalist as $row):?>
        <tr class="tb_list">
            <td><input type="checkbox" name="id[]" value="<?php echo $row->uid?>" /><?php echo $row->uid?></td>
            <td><?php echo $row->username?><br /><?php echo $row->email?></td>      
            <td><?php $group = UserGroup::model()->findByPk($row->groupid); echo $group->group_name;?> </td>
            <td><?php if($row->status == 0):?>
              <span class="red"><img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />锁定</span>
              <?php elseif($row->status == 1):?>
              正常
              <?php else:?>
              <span class="red"><img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />待审核</span>
              <?php endif;?>
          </td>
          <td><?php echo $row->logins;?></td>
          <td><?php echo $row->register_ip;?></td>
          <td><?php echo $row->last_login_ip;?></td>
          <td><?php echo date('Y-m-d H:i',$row->addtime)?></td>
          <td>
            <a href="<?php echo  $this->createUrl('update',array('id'=>$row->uid))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
            <a href="<?php echo  $this->createUrl('batch',array('command'=>'delete', 'id'=>$row->uid))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a>
          </td>
        </tr>
        <?php endforeach;?>
        <!-- 表格body结束 -->
        
        <!-- 表格footer开始 -->
        <tr>
            <td colspan="7">
                <div class="cuspages right">
                    <?php $this->widget('CLinkPager', array('pages' => $pagebar, 'header'=>'<label class="itemCount">共'.$pagebar->getItemCount().'条</label>')); ?>
                </div>
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall">全选</label>
                    <select name="command">
                      <option>选择操作</option>
                      <option value="lock">禁用</option>
                      <option value="unlock">正常</option>
                      <option value="unpass">待审核</option>
                      <option value="delete">删除</option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
                </div>
            </td>
        </tr>
        <!-- 表格footer结束 -->
    </table>
</form>
<!-- 头部结束 -->
