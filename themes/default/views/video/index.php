    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/list.css';?>" />
    <!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
            <!-- 搜索开始 -->
            <?php $this->renderPartial('/layouts/search',array('order'=>$order, 'catalog' => $catalog, 'search_cats' => $search_cats, 'controller' => $this->id));?>
            <!-- 搜索结束 -->
            
			<ul class="content_list video_list clear">
			<?php foreach($videos as $video):?>					
				<li class="list_box clear">					
					<div class="list_body">
						<a class="video_a" href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>">							
							<img src="<?php echo $video->cover_image;?>" width="150" height="180" />
							<span class="v_play_score"><?php echo $video->video_score;?></span>
							<span class="v_play_mask"></span>
							<span class="v_play_icon"></span>
						</a>
						<h2><a class="video_title" href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>"  title="<?php echo CHtml::encode($video->title);?>"><?php echo CHtml::encode($video->title);?></a></h2>
					</div>
				</li>			
				<?php endforeach;?>
			</ul>	
			
			<!-- 分页开始 -->			
			<?php $this->renderPartial('/layouts/pager',array('pagebar'=>$pagebar));?>	
			<!-- 分页结束 -->
			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_videos'=>$last_videos));?>	
		<!-- 右侧内容结束 -->
	</div>	
    <script type="text/javascript">
    $(function(){
        $('.search_form').delegate('.cat_select','change',function(){
            var id = $(this).val();
            var url =  "<?php echo $this->createUrl('video/ajax');?>";
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