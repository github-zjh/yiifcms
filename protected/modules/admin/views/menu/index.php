<div id="contentHeader">
    <h3><?php echo Yii::t('admin', 'Menu Manage'); ?></h3>
    <div class="searchArea">
        <ul class="action left" >
            <li class="current"><a href="<?php echo $this->createUrl('create') ?>" class="actionBtn"><span><?php echo Yii::t('admin', 'add'); ?></span></a></li>
        </ul>
        <div class="search right"> </div>
    </div>
</div>
<table class="content_list">
    <form method="post" action="<?php echo $this->createUrl('menu/batch'); ?>" name="cpform" >
        <tr class="tb_header">
            <th width="8%"> ID</th>
            <th width="8%"> <?php echo Yii::t('admin', 'Sort Order'); ?></th>
            <th width="30%"><?php echo Yii::t('admin', 'Title Name'); ?></th>      
            <th width="15%"><?php echo Yii::t('model', 'menu_status'); ?></th>
            <th width="15%"><?php echo Yii::t('model', 'new_open'); ?></th>      
            <th><?php echo Yii::t('admin', 'Operate'); ?></th>
        </tr>
        <?php foreach ((array) $datalist as $row): ?>
            <tr class="tb_list">
                <td><input type="checkbox" name="id[]" value="<?php echo $row['id'] ?>">
                    <?php echo $row['id'] ?></td>
                <td><input name="sortOrder[<?php echo $row['id'] ?>]" type="text" id="sortOrder[]" value="<?php echo $row['sort_order'] ?>" size="5" /></td>
                <td><?php echo $row['str_repeat'] ?><a href="<?php echo $this->createUrl('create', array('id' => $row['id'])) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/insert.png" align="absmiddle" /></a> <a href="<?php echo $this->createUrl('update', array('id' => $row['id'])) ?>"><?php echo $row['menu_name'] ?></a>
                    <?php if ($row['status'] == 'N'): ?>
                        <img src="<?php echo $this->module->assetsUrl; ?>/images/error.png" align="absmiddle" />[<?php echo Yii::t('admin', 'Hidden'); ?>]
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($row['status'] == 'Y'): ?>
                    <span class="color_show">√</span>
                    <?php else:?>
                    <span class="color_hide">×</span>
                    <?php endif;?>
                </td>
                <td><?php echo Yii::t('admin', $row['target'] == 'Y' ? 'Yes' : 'No'); ?></td>     
                <td><a href="<?php echo $this->createUrl('update', array('id' => $row['id'])) ?>"><img src="<?php echo $this->module->assetsUrl; ?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo $this->createUrl('batch', array('command' => 'delete', 'id' => $row['id'])) ?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl; ?>/images/delete.png" align="absmiddle" /></a></td>
            </tr>
        <?php endforeach; ?>
        <tr class="submit">
            <td colspan="9">
                <div class="fixsel">
                    <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
                    <label for="chkall"><?php echo Yii::t('admin', 'Check All'); ?></label>
                    <select name="command">
                        <option><?php echo Yii::t('admin', 'Select Operate'); ?></option>
                        <option value="sortOrder"><?php echo Yii::t('admin', 'Sort Order'); ?></option>
                        <option value="delete"><?php echo Yii::t('admin', 'Delete'); ?></option>
                        <option value="show"><?php echo Yii::t('admin', 'Show'); ?></option>
                        <option value="hidden"><?php echo Yii::t('admin', 'Hidden'); ?></option>
                    </select>
                    <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common', 'Submit'); ?>" name="maskall" />
                </div></td>
        </tr>
    </form>
</table>
