	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content">		
		<div class="contact_box clear">
		<?php $form=$this->beginWidget('CActiveForm',array('id'=>'question_form','htmlOptions'=>array('name'=>'question_form','class'=>'question_form'))); ?>
			<table>
					<CAPTION><?php echo Yii::t('common','Send To Us')?>:</CAPTION>
					<tr>
						<th><?php echo $form->labelEx($model,'realname');?>：</th>						
						<td>
							<?php if(Yii::app()->user->id):?>
							<?php echo $form->hiddenField($model,'user_id', array('value'=>Yii::app()->user->id));?>
							<?php echo $form->hiddenField($model,'realname', array('value'=>Yii::app()->user->name));?>
							<?php echo Yii::app()->user->name;?>
							<?php else:?>
							<?php echo $form->textField($model,'realname');?>
							<?php endif;?>
						</td>
						<td><?php echo $form->error($model,'realname'); ?></td>
					</tr>
					<tr>
						<th><?php echo $form->labelEx($model,'email');?>：</th>
						<td><?php echo $form->textField($model,'email');?></td>
						<td><?php echo $form->error($model,'email'); ?></td>
					</tr>
					<tr>
						<th><?php echo $form->labelEx($model,'telephone');?>：</th>
						<td><?php echo $form->textField($model,'telephone');?></td>
						<td><?php echo $form->error($model,'telephone'); ?></td>
					</tr>
					<tr>
						<th><?php echo $form->labelEx($model,'qq');?>：</th>
						<td><?php echo $form->textField($model,'qq');?></td>
						<td><?php echo $form->error($model,'qq'); ?></td>
					</tr>
					<tr>
						<th><?php echo $form->labelEx($model,'question');?>：</th>
						<td><?php echo $form->textArea($model,'question');?></td>
						<td><?php echo $form->error($model,'question'); ?></td>
					</tr>
					<tr>
						<th><?php echo $form->labelEx($model,'verifyCode');?>：</th>
						<td>
							<?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control captcha','placeholder'=>'验证码'));?>
							<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>
						</td>					
						<td><?php echo $form->error($model,'verifyCode'); ?></td>    
					</tr>
					<tr class="sub_tr"><td></td><td><input type="submit" name="submit" class="submit" value="<?php echo Yii::t('common','Submit');?>" /></td></tr>
				</table>				
		<?php $this->endWidget();?>
			<div class="contact_address">
				<h3 class="address_title"><?php echo Yii::t('common','Contact Links')?></h3>
				<ul class="address_list">
					<li><?php echo Yii::t('common','Address')?>: <?php echo $this->_setting['_address'];?></li>
					<li><?php echo Yii::t('common','Tel')?>: <?php echo $this->_setting['_telephone'];?></li>
					<li><?php echo Yii::t('common','Email')?>: <?php echo $this->_setting['admin_email'];?></li>
				</ul>				
			</div>
		</div>
	</div>	