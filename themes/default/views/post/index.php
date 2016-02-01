    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/list.css';?>" />
    <!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
            <!-- 搜索开始 -->
            <?php $this->renderPartial('/layouts/search',array('order'=>$order, 'catalog' => $catalog, 'search_cats' => $search_cats, 'controller' => $this->id));?>
            <!-- 搜索结束 -->
            
			<ul class="content_list">
			<?php foreach((array)$posts as $post):?>
				<?php $post_tags = $post->tags?explode(',',$post->tags):array(); $tags_len = count($post_tags);?>	
				<li class="list_box clear">
					<div class="list_head">
						<a href="<?php echo $this->createUrl('post/index', array('catalog_id'=>$post->catalog->id));?>"><?php echo $post->catalog->catalog_name;?></a>				
					</div>
					<div class="list_body">
						<h2><a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>" style="<?php echo $this->formatStyle($post->title_style);?>"><?php echo CHtml::encode($post->title);?></a></h2>
						<p class="view_info">
							<span><?php echo Yii::t('common','Copy From')?>：  <em><?php echo $post->copy_from?"<a href='".$post->copy_url."' target='_blank'>".$post->copy_from."</a>":Yii::t('common','System Manager');?></em></span>
							<?php if($tags_len > 0):?>
							<span class="tags">
								<?php $i = 1; foreach((array)$post_tags as $ptag):?>
								<em><a href="<?php echo $this->createUrl('tag/index', array('tag'=>$ptag));?>"><?php echo $ptag;?></a></em>
								<?php $i++;?>
								<?php endforeach;?>								
							</span>
							<?php endif;?>
							<span class="views fa">&nbsp;&nbsp;<em><?php echo $post->view_count;?></em></span>
						</p>									
						<div class="content_info clear">			
							<div><?php echo $post->content->introduce?CHtml::encode($post->content->introduce):'...';?></div>
						</div>
						
						<a href="<?php echo $this->createUrl('post/view', array('id'=>$post->id));?>" class="continue_read"><?php echo Yii::t('common','Read More');?></a>
					</div>
				</li>			
				<?php endforeach;?>
				
			
			<!-- 分页开始 -->			
			<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
			<!-- 分页结束 -->
			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_posts'=>$last_posts));?>	
		<!-- 右侧内容结束 -->
		
	</div>	

<script type="text/javascript">
    $(function(){
        $('.search_form').delegate('.cat_select','change',function(){
            var id = $(this).val();
            var url =  "<?php echo $this->createUrl('post/ajax');?>";
            var sel = $(this);
            var val = $(this).val();
            $(this).nextAll('.cat_select').remove();
            if(id <= 0) {
                return false;
            }
            $('.loading').show();
            $.getJSON(url, {'act':'catChildren', 'catalog_id':id}, function(data){                
                if(data && data.length > 0) {
                    var html = '<select class="cat_select">'
                        + '<option value="0">==<?php echo Yii::t('admin', 'Select Category'); ?>==</option>';                
                        $.each(data, function(i, item){                    
                            html += '<option value="'+item.id+'">'+item.catalog_name+'</option>';
                        });
                    $(sel).after(html);
                }
                $('.loading').hide();
            });
            $('#catalogId').val(val);            
        });
    });
</script>