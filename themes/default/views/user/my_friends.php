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
			<h3><?php echo Yii::t('common','Friends Manage');?></h3>
			<?php 
				$form=$this->beginWidget('CActiveForm',
					array('id'=>'friend_form',
						'htmlOptions'=>array('name'=>'friend_form'), 
						'action'=>$this->createUrl('user/cancel')
					)
				); 
			?>
			<table class="form_table">
				<tr class="tb_header">
			        <th width="10%" class="first_title">ID</th>
			        <th><?php echo Yii::t('model','Friend Name');?></th>	
			        <th><?php echo Yii::t('admin','Operate');?></th>
			      </tr>
				<?php foreach ((array)$datalist as $row):?>
			    <tr class="tb_list">
			      <td  class="first_title"><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
			        <?php echo $row->id?></td>
			      <td >
			      	<a href="<?php echo $this->createUrl('user/space', array('id'=>$row->friend_id));?>" title="<?php echo $row->friend_name; ?>" target="_blank" ><?php echo $row->friend_name;?></a>
			      </td>			     
			    
			      <td >			      	
			      	<a href="<?php echo $this->createUrl('user/cancel',array('op'=>'friend','id'=>$row->id))?>" 
			      		class="confirmSubmit">
			      		<img src="<?php echo $this->_static_public;?>/images/delete.png" align="absmiddle" />
			      	</a>&nbsp;&nbsp;
			      	<a href="<?php echo $this->createUrl('user/space', array('id'=>$row->friend_id));?>" target="_blank"><img src="<?php echo $this->_static_public;?>/images/view.png" align="absmiddle" /></a>
			      </td>
			    </tr>
			    <?php endforeach;?>
			    <tr class="operate">
			      <td colspan="6">
			        <div class="cuspages right">
			          <?php $this->widget('CLinkPager',array('pages'=>$pages));?>
			        </div>
			        <div class="clear"></div>
			        <div class="fixsel">
			          <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
			          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
			          <select name="op">			           		           
			            <option value="friend"><?php echo Yii::t('admin','Delete');?></option>			                     
			          </select>
			          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
			        </div></td>
			    </tr>
			</table>
			<?php $form=$this->endWidget(); ?>
		</div>		
	</div>
</div>
