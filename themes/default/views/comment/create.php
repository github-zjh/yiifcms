<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title>添加评论</title>
	<base href="<?php echo $this->_request->hostinfo;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />		
</head>
<body>			
<?php if(Yii::app()->user->getIsGuest()):?>
<div id="notice_box">			
	<?php echo Yii::t('common','Before Comment');?>
	<a href="<?php echo $this->createUrl('user/login', array('ret_url'=>$view_url));?>" target="_top" id="need_login"><?php echo Yii::t('common','Login');?></a> <?php echo Yii::t('common','Or');?>
	<a href="<?php echo $this->createUrl('user/register');?>" target="_top" ><?php echo Yii::t('common','Register');?></a>
</div>
<?php else:?>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'comment_form')); ?>	
	<table>					
		<caption>对该内容进行评论：</caption>			
		<tr>			
			<td width="540px" colspan="2">
				<?php echo $form->textArea($model, 'content');?>
				<?php $this->widget('application.widget.kindeditor.KindEditor',array(
				  'target'=>array(
						//对内容评论
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
				
				<div class="clear subBox">
					<div class="fl">
						<?php echo $form->labelEx($model,'verifyCode');?>
						<?php echo $form->textField($model,'verifyCode');?>
						<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '看不清？换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>
					</div>
					
					<div class="fr">
						<input type="hidden" name="ret_url" value="<?php echo $cur_url;?>" />
						<input type="submit" class="submit" value="<?php echo Yii::t('common','Submit');?>" />	
					</div>				
				</div>	
			</td>	
			<td>
				<?php if (CHtml::errorSummary($model)):?>
				<div class="error_message"> <?php echo CHtml::errorSummary($model); ?> </div>
				<?php endif?>
			</td>
		</tr>		
	</table>				
<?php $this->endWidget();?>
<?php endif;?>

<div class="comments">
	<h3><?php echo count($comments);?>&nbsp;&nbsp;Comments</h3>	
	<ul id="comment_list">		
		<?php $i = 0;?>
		<?php foreach((array)$comments as $comment):?>
		<li class="clear">
			<?php $user = User::model()->findByPk($comment->user_id);?>						
			<img width="50" <?php if($user && $user->avatar && file_exists($user->avatar)):?> src="<?php echo $user->avatar;?>" <?php else:?>  src="<?php echo $this->_stylePath;?>/images/default_avatar.png"  <?php endif;?> class="avatar" />
			<div class="comment_desc">
				<p class="desc_head">
					<strong class="user"><?php echo $user->username?$user->username:Yii::t('common','Anonymity')?></strong>
					<span class="submit_time"><?php echo date('Y年m月d日 H:i:s',$comment->create_time)?></span>
				</p>
				<div class="desc_body"><?php echo $comment->content;?></div>
				<div class="desc_foot clear"><a href="javascript:;" class="reply_btn" data-position="<?php echo $i;?>" data-type="reply" data-attr-cid="<?php echo $comment->id;?>">@:回复</a></div>
			</div>				
		</li>
		<?php $i++;?>
		<?php endforeach;?>	
	</ul>	
	
	<!-- 分页开始 -->			
	<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
	<!-- 分页结束 -->
		
</div>	

<script type="text/javascript">
	//iframe去除滚动条
	function removeScroll(iframeId){		
		if(window.parent != window){
    	    parent.document.getElementById(iframeId).style.height = (document.body.scrollHeight)+"px";
     	}
	}
	$(function(){
		//高亮显示代码
		prettyPrint();
		//刷新验证码
		$("#yw0").ready(function(){
            $('#yw0').trigger('click');
        });	
        //ajax回复
        $("a[data-type='reply']").click(function(){ 
        	if($(this).next("#reply_box").is(":visible") == true){
				$("#reply_box").hide();
				//如果回复框显示了 则隐藏
            }else{                
	            $("form[data-type='reply_form']").remove(); 
	            var html = '<form id="reply_box" data-type="reply_form">'; 
	            html += '<textarea id="reply_content"></textarea>'; 
	            html += '<input type="hidden" value="0" name="comment_id" />';  
	            html += '<input type="hidden" value="0" name="reply_id" />'; 
	            html += '<div class="reply_sumbit_box"><input type="submit" id="reply_submit" value="<?php echo Yii::t('common','Submit');?>" /></div>';
	            html += '</form>'; 	
	            $(this).after(html);            
            	$("#reply_box").show();
            	KindEditor.ready(function(K) {    
              	 __reply_content = K.create("#reply_content", {
              	     'themeType':'simple' ,'width':'100%' ,'height':'200' ,'items':['fontname' ,'fontsize' ,'|' ,'undo' ,'redo' ,'|' ,'code' ,'forecolor' ,'hilitecolor' ,'bold' ,'italic' ,'underline' ,'removeformat' ,'|' ,'justifyleft' ,'justifycenter' ,'justifyright' ,'insertorderedlist' ,'insertunorderedlist' ,'|' ,'emoticons' ,'image' ,'link' ],'resizeType':'0'  ,afterBlur:function(){
                          this.sync();
                      }           
              	});
              	__reply_content.sync();
              });
            }						
        });
        
        $("#reply_submit").click(function(){
            var comment_id = $("input[name='comment_id']").val();
            var reply_id = $("input[name='reply_id']").val();
            var content = $("#reply_content").val();
			$.post("<?php echo $this->createUrl('comment/reply');?>",{'cid':comment_id,'reply_id':reply_id,'content':content},function(data){
				console.log(data);
			},'json');
        });
        //循环执行
        clearInterval(test);  //清理一次，下面再执行
        var test = setInterval(function(){
            removeScroll("comment_iframe");
        },200);
	});
</script>
</body>
</html>
