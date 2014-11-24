<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title>添加评论</title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />		
</head>
<body>			
<?php if(!$this->_login_status):?>
<div id="notice_box">			
	<?php echo Yii::t('common','Before Comment');?>
	<a href="<?php echo $this->createUrl('user/login', array('ret_url'=>$view_url));?>" target="_top" id="need_login"><?php echo Yii::t('common','Login');?></a> <?php echo Yii::t('common','Or');?>
	<a href="<?php echo $this->createUrl('user/register');?>" target="_top" ><?php echo Yii::t('common','Register');?></a>
</div>
<?php else:?>
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'comment_form')); ?>	
	<table>					
		<caption><?php echo Yii::t('common','Publish Comment');?>：
		<span class="normal">( <?php echo Yii::t('common','Comment Notice')?> )</span>
		</caption>			
		<tr>			
			<td width="540px" colspan="2">
				<?php echo $form->textArea($model, 'content');?>
				<?php $this->widget('application.widget.kindeditor.KindEditor',
    			array(
					'id'=>'Comment_content',
					'options'=>array(
						'themeType'=>'simple',
						 'width'=>'100%',	
						 'height'=>'200',
						 'items'=>array(
							 'fontname', 'fontsize','|','undo', 'redo','|','code', 'forecolor', 'hilitecolor', 'bold', 'italic',
							 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
							 'justifyright', 'insertorderedlist','insertunorderedlist', '|',
							 'emoticons', 'link'
						),			
						'resizeType'=>0,
						'dialogAlignType'=>'',//弹窗按编辑器居中
						'uploadJson'=>'',						
						'allowFileManager'=>false,
					)
				)
    			);
		?>    							
				
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
	<h3>[ <?php echo Yii::t('common','All Num Comments', array('{num}'=>count($comments)));?> ]</h3>	
	<ul id="comment_list">		
		<?php $i = 0;?>
		<?php foreach((array)$comments as $comment):?>		
		<li class="clear">
			<?php $cuser = User::model()->findByPk($comment->user_id);?>						
			<img width="50" <?php if($cuser && $cuser->avatar):?> src="<?php echo $cuser->avatar;?>" <?php else:?>  src="<?php echo $this->_stylePath;?>/images/default_avatar.png"  <?php endif;?> class="avatar" />
			<div class="comment_desc">
				<p class="desc_head">
					<strong class="user"><?php echo $cuser->nickname?$cuser->nickname:($cuser->username?$cuser->username:Yii::t('common','Anonymity'));?></strong>
					<span class="submit_time"><?php echo date('Y年m月d日 H:i:s',$comment->create_time)?></span>
				</p>
				<div class="desc_body"><?php echo $comment->content;?></div>
				<div class="desc_foot clear">
					<a href="javascript:;" 
					class="reply_btn clear" data-type="reply" 
					data-attr-cid="<?php echo $comment->id;?>" 
					data-attr-replyid = "0"	>@:回复<span class="login_notice"></span></a>
				</div>
				
				<!-- 回复列表 -->
				<?php if($replies[$comment->id]):?>
				<ul class="reply_list clear">					
					<?php $position = 1;?>
					<?php foreach((array)$replies[$comment->id] as $reply):?>								
					<li class="clear">
						<?php $user = User::model()->findByPk($reply->user_id);?>	
						<?php $rto = Reply::model()->findByPk($reply->reply_id);?>
						<?php $ruser = User::model()->findByPk($rto->user_id);?>	
						<div class="comment_desc">							
							<p class="desc_head">
								<img width="20" <?php if($user && $user->avatar ):?> src="<?php echo $user->avatar;?>" <?php else:?>  src="<?php echo $this->_stylePath;?>/images/default_avatar.png"  <?php endif;?> class="avatar" />
								<strong class="user"><?php echo $user->username?$user->username:Yii::t('common','Anonymity')?>&nbsp;&nbsp;@:&nbsp;&nbsp;<?php echo $ruser->username?$ruser->username:$cuser->username;?></strong>								
								<span class="submit_time"><?php echo date('Y年m月d日 H:i:s',$reply->create_time)?></span>
								<span class="position"><?php echo $position;?>#</span>
							</p>
							<div class="desc_body"><?php echo $reply->content;?></div>
							<div class="desc_foot clear">
								<a href="javascript:;" 
								class="reply_btn clear" data-type="reply" 
								data-attr-cid="<?php echo $reply->cid;?>" 
								data-attr-replyid = "<?php echo $reply->id;?>">@:回复<span class="login_notice"></span></a>
							</div>
						</div>	
						</li>
						<?php $position ++;?>
						<?php endforeach;?>
					</ul>			
				<?php endif;?>
			
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
			parent.document.getElementById(iframeId).style.height = (window.document.body.scrollHeight)+"px";
		}
	}
	$(function(){
		
		//高亮显示代码
		prettyPrint();
		
		//刷新验证码
		$("#yw0").ready(function(){
                $('#yw0').trigger('click');
        });	
        //@回复
        $("a[data-type='reply']").click(function(){ 
            var login_status = '<?php echo $this->_login_status;?>';
            if(login_status == false){
                var lg_html = '<?php echo Yii::t('common','You Need First');?><a href="<?php echo $this->createUrl('user/login', array('ret_url'=>$view_url));?>" target="_top" id="need_login"><?php echo Yii::t('common','Login');?></a>';
                lg_html += '<?php echo Yii::t('common','Or');?><a href="<?php echo $this->createUrl('user/register');?>" target="_top" ><?php echo Yii::t('common','Register');?></a>';
				$(".login_notice").hide();
				$(this).children(".login_notice").html(lg_html).show();
				return;
            }
        	if($(this).next("#reply_box").is(":visible") == true){
				$("#reply_box").hide();
				//如果回复框显示了 则隐藏
            }else{                
	            $("form[data-type='reply_form']").remove(); 
	            var cid = $(this).attr("data-attr-cid");
	            var replyid = $(this).attr("data-attr-replyid");
	            var html = '<form id="reply_box" data-type="reply_form">'; 
	            html += '<textarea id="reply_content"></textarea>'; 
	            html += '<input type="hidden" value="'+cid+'" name="comment_id" />';  
	            html += '<input type="hidden" value="'+replyid+'" name="reply_id" />'; 
	            html += '<div class="reply_sumbit_box"><input type="button" id="reply_submit" value="<?php echo Yii::t('common','Submit');?>" /></div>';
	            html += '</form>'; 	
	            $(this).after(html);            
            	$("#reply_box").show();
            	KindEditor.ready(function(K) {    
              	 __reply_content = K.create("#reply_content", {
              	     'themeType':'simple' ,'width':'100%' ,'height':'200' ,'items':['fontname' ,'fontsize' ,'|' ,'undo' ,'redo' ,'|' ,'code' ,'forecolor' ,'hilitecolor' ,'bold' ,'italic' ,'underline' ,'removeformat' ,'|' ,'justifyleft' ,'justifycenter' ,'justifyright' ,'insertorderedlist' ,'insertunorderedlist' ,'|' ,'emoticons' ,'image' ,'link' ],
              	     'resizeType':'0'  ,
              	     afterBlur:function(){
                          this.sync();
                      },
                     'dialogAlignType':'',   //弹窗按编辑器居中        
              	});
              	__reply_content.sync();
              });

			  //ajax提交
              $("#reply_submit").click(function(){                    
                    var comment_id = $("input[name='comment_id']").val();
                    var reply_id = $("input[name='reply_id']").val();
                    var content = $("#reply_content").val();
        			$.post("<?php echo $this->createUrl('comment/reply');?>",{'cid':comment_id,'reply_id':reply_id,'content':content},function(data){
            			if(data.status == 'success'){
							alert(data.message);
							window.location.href="<?php echo $this->_request->getUrl();?>";							
            			}else{
							alert(data.message);							
                		}
        			},'json');
              });
            }						
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
