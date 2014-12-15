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
			<h3><?php echo Yii::t('common','My Replys');?></h3>
			<?php 
				$form=$this->beginWidget('CActiveForm',
					array('id'=>'comment_form',
						'htmlOptions'=>array('name'=>'comment_form'), 
						'action'=>$this->createUrl('user/cancel')
					)
				); 
			?>
			<table class="form_table">
				<tr class="tb_header">
			        <th width="10%" class="first_title">ID</th>
			        <th><?php echo Yii::t('model','ReplyTitle');?></th>
			        <th width="25%"><?php echo Yii::t('model','ReplyContent');?></th>		
			        <th><?php echo Yii::t('model','ReplyStatus');?></th>	      
			        <th width="15%"><?php echo Yii::t('model','ReplyCreateTime');?></th>
			        <th><?php echo Yii::t('admin','Operate');?></th>
			      </tr>
				<?php foreach ((array)$datalist as $row):?>
			    <tr class="tb_list">
			      <td  class="first_title"><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
			        <?php echo $row->id?></td>
			      <td >
			      	<a href="<?php echo $row->url;?>" title="<?php echo $row->title; ?>" target="_blank" ><?php echo Helper::truncate_utf8_string($row->title, 15);?></a>
			      </td>	
			      <td ><?php echo Helper::truncate_utf8_string($row->content, 200);?></td>	
			      <td ><?php echo $row->status=='Y'?"<span style='color:green'>".Yii::t('admin','Pass Checking')."</span>":"<span style='color:red'>".Yii::t('admin','Wait Checking')."</span>"; ?></td>	     
			      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
			      <td >		
			      	<a href="<?php echo $row->url;?>" target="_blank"><img src="<?php echo $this->_static_public;?>/images/view.png" align="absmiddle" /></a>
			      </td>
			    </tr>
			    <?php endforeach;?>
			    <tr class="operate">
			      <td colspan="6">
			        <div class="cuspages right">
			          <?php $this->widget('CLinkPager',array('pages'=>$pages));?>
			        </div>
			        <div class="clear"></div>
			       </td>
			    </tr>
			</table>
			<?php $form=$this->endWidget(); ?>
		</div>		
	</div>
</div>
