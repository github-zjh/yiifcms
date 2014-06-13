<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />	
</head>
<body>			
<?php if(Yii::app()->user->getIsGuest()):?>
<span>	
	<?php echo Yii::t('common','Before Comment');?>
	<a href="<?php echo $this->createUrl('user/login', array('ret_url'=>$view_url));?>" target="_top" id="need_login"><?php echo Yii::t('common','Login');?></a> <?php echo Yii::t('common','Or');?>
	<a href="<?php echo $this->createUrl('user/register');?>" target="_top" ><?php echo Yii::t('common','Register');?></a>
</span>
<?php else:?>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'comment_form')); ?>	
	<table>					
		<caption>对该内容进行评论：</caption>			
		<tr>			
			<td width="540px" colspan="2">
				<?php echo $form->textArea($model, 'content');?>
				<?php $this->widget('application.widget.kindeditor.KindEditor',array(
				  'target'=>array(
					  	'#Comment_content'=>array(
							 'themeType'=>'simple',
					  		 'width'=>'100%',	
							 'height'=>'200',	
				  			 'items'=>array(
				  					'fontname', 'fontsize','|','undo', 'redo','|','code', 'forecolor', 'hilitecolor', 'bold', 'italic',
				  					'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
				  					'justifyright', 'insertorderedlist','insertunorderedlist', '|',
				  					'emoticons', 'image', 'link'),
							 'resizeType'=>0,
						)				  		
					)						
				)
				);?>				
			</td>	
			<td>
				<?php if (CHtml::errorSummary($model)):?>
				<div class="error_message"> <?php echo CHtml::errorSummary($model); ?> </div>
				<?php endif?>
			</td>
		</tr>
		<tr>			
			<td class="clear subBox">
				<div class="fl">
					<?php echo $form->textField($model,'verifyCode');?>
					<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '看不清？换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>
				</div>
				
				<div class="fr">
					<input type="hidden" name="ret_url" value="<?php echo $cur_url;?>" />
					<input type="submit" class="submit" value="<?php echo Yii::t('common','Submit');?>" />	
				</div>				
			</td>	
			<td></td>	
		</tr>
	</table>				
<?php $this->endWidget();?>
<?php endif;?>

<div class="comments">
	<h3><?php echo count($comments);?>&nbsp;&nbsp;Comments</h3>				
	<ul id="comment_list">
		<?php foreach((array)$comments as $comment):?>
		<li class="clear">
			<?php $user = User::model()->findByPk($comment->user_id);?>						
			<img width="50" <?php if($user && $user->avatar):?> src="<?php echo $user->avatar;?>" <?php else:?>  src="<?php echo $this->_stylePath;?>/images/default_avatar.png"  <?php endif;?> class="avatar" />
			<div class="comment_desc">
				<p class="desc_head">
					<strong class="user"><?php echo $user->username?$user->username:Yii::t('common','Anonymity')?></strong>
					<span class="submit_time"><?php echo date('Y年m月d日 H:i:s',$comment->create_time)?></span>
				</p>
				<div class="desc_body"><?php echo $comment->content;?></div>
			</div>						
		</li>
		<?php endforeach;?>					
	</ul>	
	<!-- 分页开始 -->			
	<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
	<!-- 分页结束 -->
		
</div>	

<script type="text/javascript">
	$(function(){
		//高亮显示代码
		prettyPrint();
		//刷新验证码
		$("#yw0").ready(function(){
            $('#yw0').trigger('click');
        });		
	});
</script>
</body>
</html>
