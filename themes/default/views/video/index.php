    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/list.css';?>" />
    <!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">
            <!-- 搜索 -->
            <?php $form = $this->beginWidget('CActiveForm', array( 'method'=>'get','action'=>$this->createUrl('video/index'), 'htmlOptions' => array('class' => 'search_form clear')));?>
            <dl class="category">
                <dt><?php echo Yii::t('common','Catagorys');?></dt>
                <dd>
                    <select class="cat_select">
                        <option value='0'>==所有==</option>
                        <?php foreach((array)$this->_catalog as $cate):?>
                        <option value="<?php echo $cate->id;?>"><?php echo $cate->catalog_name;?></option>		
                        <?php endforeach;?>
                    </select>                    
                    <input type="hidden" id="catalogId" name="catalog_id" value="<?php echo Yii::app()->request->getParam('catalogId') ?>"/>
                    <input type="hidden" name="order" value="<?php echo $order; ?>"/>
                    <span class="loading" style="display:none;">loading...</span>
                    <input type="submit" name="submit" class="search_btn" value="搜索"/>
                </dd>                
            </dl>            
		    <div class="order_box">
				<a <?php if($order == 'view_count'): ?>class="current" <?php endif;?> href="<?php echo $this->createUrl('post/index',array('order'=>'view_count', 'catalog_id'=>$catalog ? $catalog->id : 0));?>">热度排行</a> 
				<a <?php if($order == 'id'): ?>class="current" <?php endif;?> href="<?php echo $this->createUrl('post/index',array('order'=>'id', 'catalog_id' => $catalog ? $catalog->id : 0));?>">最新发表</a>                 
			</div>
            <?php $this->endWidget();?>
            
			<ul class="content_list video_list clear">
			<?php foreach($videos as $video):?>					
				<li class="list_box clear">					
					<div class="list_body">
						<a class="video_a" href="<?php echo $this->createUrl('video/view', array('id'=>$video->id));?>">							
							<img src="<?php echo $video->cover_image;?>" width="150" height="200" />
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