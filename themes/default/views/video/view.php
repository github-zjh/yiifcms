	<link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/view.css';?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath . '/css/score.css';?>" />    
    <script type="text/javascript">
		var score_url = "<?php echo $this->createUrl('score');?>";
        var star = {vid:'<?php echo $video->id;?>'};
	</script>    
    
    <!-- 视频播放组件开始 -->
    <script src="<?php echo $this->_stylePath .'/media_player/src/js/me-namespace.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-utility.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-i18n.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-plugindetector.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-featuredetection.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-mediaelements.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/me-shim.js';?>" type="text/javascript"></script>
    <script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-library.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-player.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-playpause.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-progress.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-time.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-speed.js';?>" type="text/javascript"></script>	
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-tracks.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-volume.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-stop.js';?>" type="text/javascript"></script>
	<script src="<?php echo $this->_stylePath .'/media_player/src/js/mep-feature-fullscreen.js';?>" type="text/javascript"></script>
    
    <link rel="stylesheet" href="<?php echo $this->_stylePath . '/media_player/src/css/mediaelementplayer.css';?>" />
    <link rel="stylesheet" href="<?php echo $this->_stylePath . '/media_player/src/css/mejs-skins.css"';?>" />	
    <script>
        function appendMediaEvents($node, media) {
        var 
            mediaEventNames = 'loadstart progress suspend abort error emptied stalled play pause loadedmetadata loadeddata waiting playing canplay canplaythrough seeking seeked timeupdate ended ratechange durationchange volumechange'.split(' ');
            mediaEventTable = $('<table class="media-events"><caption>Media Events</caption><tbody></tbody></table>').appendTo($node).find('tbody'),
            tr = null,
            th = null,
            td = null,
            eventName = null,
            il = 0,				
            i=0;

        for (il = mediaEventNames.length;i<il;i++) {
            eventName = mediaEventNames[i];
            th = $('<th>' + eventName + '</th>');
            td = $('<td id="e_' + media.id + '_' + eventName + '" class="not-fired">0</td>');

            if (tr == null) 
                tr = $("<tr/>");

            tr.append(th);
            tr.append(td);

            if ((i+1) % 5 == 0) {
                mediaEventTable.append(tr);
                tr = null;
            }		

            // listen for event
            media.addEventListener(eventName, function(e) {

                var notice = $('#e_' + media.id + '_' + e.type),
                    number = parseInt(notice.html(), 10);

                notice
                    .html(number+1)
                    .attr('class','fired');
            }, true);
        }	

        mediaEventTable.append(tr);
    }

    function appendMediaProperties($node, media) {
        var /* src currentSrc  */
            mediaPropertyNames = 'error currentSrc networkState preload buffered bufferedBytes bufferedTime readyState seeking currentTime initialTime duration startOffsetTime paused defaultPlaybackRate playbackRate played seekable ended autoplay loop controls volume muted'.split(' '),
            mediaPropertyTable = $('<table class="media-properties"><caption>Media Properties</caption><tbody></tbody></table>').appendTo($node).find('tbody'),
            tr = null,
            th = null,
            td = null,
            propName = null,	
            il = 0,		
            i=0;

        for (il = mediaPropertyNames.length; i<il; i++) {
            propName = mediaPropertyNames[i];
            th = $('<th>' + propName + '</th>');
            td = $('<td id="p_' + media.id + '_' + propName + '" class=""></td>');

            if (tr == null) 
                tr = $("<tr/>");

            tr.append(th);
            tr.append(td);

            if ((i+1) % 3 == 0) {
                mediaPropertyTable.append(tr);
                tr = null;
            }
        }	

        setInterval(function() {
            var 
                propName = '',
                val = null,
                td = null;

            for (i = 0, il = mediaPropertyNames.length; i<il; i++) {
                propName = mediaPropertyNames[i];
                td = $('#p_' + media.id + '_' + propName);
                val = media[propName];
                val = 
                    (typeof val == 'undefined') ? 
                    'undefined' : (val == null) ? 'null' : val.toString();
                td.html(val);
            }
        }, 500);	

    }
        jQuery(document).ready(function() {
            $('audio, video').mediaelementplayer({
                //mode: 'shim',

                pluginPath:'<?php echo $this->_stylePath .'/media_player/build/';?>', 
                enablePluginSmoothing:true,
                //duration: 489,
                //startVolume: 0.4,
                enablePluginDebug: true,
                //iPadUseNativeControls: true,
                //mode: 'shim',
                //forcePluginFullScreen: true,
                //usePluginFullScreen: true,
                //mode: 'native',
                //plugins: ['silverlight'],
                //features: ['playpause','progress','volume','speed','fullscreen'],
                success: function(me,node) {
                    // report type
                    var tagName = node.tagName.toLowerCase();
                    $('#' + tagName + '-mode').html( me.pluginType  + ': success' + ', touch: ' + mejs.MediaFeatures.hasTouch);


                    if (tagName == 'audio') {

                        me.addEventListener('progress',function(e) {
                            //console.log(e);
                        }, false);

                    }

                    me.addEventListener('progress',function(e) {
                        //console.log(e);
                    }, false);


                    // add events
                    if (tagName == 'video' && node.id == 'player1') {
                        appendMediaProperties($('#' + tagName + '-props'), me);
                        appendMediaEvents($('#' + tagName + '-events'), me);

                    }
                }		
            });



        });
    </script>    
    <!-- 视频播放组件结束 -->
    
	<!-- 导航面包屑开始 -->
	<?php $this->renderPartial('/layouts/nav',array('navs'=>$navs));?>
	<!-- 导航面包屑结束 -->
	
	<div id="content" class="clear">
		<div class="content_left">		
			<div class="list_box clear">				
				<div>	
					<h2><?php echo CHtml::encode($video->title);?></h2>
					
					<div class="content_info soft_info video_info">
						<div class="info_head clear">
							<div class="info_left">		
								<?php if($video->cover_image && file_exists($video->cover_image)):?>					
								<img src="<?php echo $video->cover_image;?>" alt="<?php echo CHtml::encode($video->title);?>" />
								<?php else:?>
								<div class="no_cover"><?php echo Yii::t('common','No Cover');?></div>
								<?php endif;?>
							</div>
							
							<!-- 给视频评分 -->
							<div class="info_score score">								
									<div class="score_content" id="score_content">									
										<div class="score_loading"></div>									
									</div><!--score_content end-->
								
									<div class="score_post">	
										<div id="starBox">
											<div class="star_title">给喜欢的影片评分</div>
											<ul class="starlist" id="starlist">
												<li i="1"><a href="javascript:void(0);" title="1星" class="star_one">1</a></li>
												<li i="2"><a href="javascript:void(0);" title="2星" class="star_two">2</a></li>
												<li i="3"><a href="javascript:void(0);" title="3星" class="star_three">3</a></li>
												<li i="4"><a href="javascript:void(0);" title="4星" class="star_four">4</a></li>
												<li i="5"><a href="javascript:void(0);" title="5星" class="star_five">5</a></li>
											</ul>
											<div class="star_current_rating" id="star_current_rating"></div>
										</div><!--starBox end-->
									
										<div class="star_tip" id="star_tip">
											<s id="star_tip_arrow"><i></i></s>
											<div id="star_desc" class="star_desc"></div>
										</div><!--star_tip end-->
									
									</div><!--score_post end-->
								
							</div><!--score end-->
							
							
							<div class="info_right">
								<ul class="soft_attr">
									<li><?php echo Yii::t('model','VideoType');?>：<?php echo $this->_video_type[$video->video_type];?></li>
									<li><?php echo Yii::t('model','VideoLanguage');?>：<?php echo Yii::t('admin','Lan_'.$video->language);?></li>
									<li><?php echo Yii::t('model','VideoScore');?>：<?php echo $video->video_score;?></li>
									<li><?php echo Yii::t('common','UpdateTime');?>：<?php echo date('Y年m月d日',$video->update_time);?></li>
									<li><?php echo Yii::t('model','ViewCount');?>：<?php echo $video->view_count;?></li>
									<li><?php echo Yii::t('model','DownCount');?>：<?php echo $video->down_count;?></li>
								</ul>
								
								<!-- 下载按钮 -->
								<div class="clear">
									<a href="<?php echo $this->createUrl('video/download', array('id'=>$video->id));?>" target="_blank" class="fl download_now"></a>
									<?php if($video->download):?>
									<a href="<?php echo $video->download;?>" target="_blank" class="fr download_quick"></a>
									<?php endif;?>
								</div>
								
							</div>												
						</div>
                        <!-- 视频播放 -->
                        <div id="video-container">
                            <video width="720" height="480" id="player1" controls="controls" preload="none" poster="<?php echo $video->cover_image;?>">
                                <source src="<?php echo $video->content->video_file;?>"  type="video/mp4" />
                                <track kind="subtitles" src="../media/mediaelement.srt" srclang="en" ></track>
                            </video>
                        </div>
                        
                        <!-- 视频简介 -->
						<div class="info_desc clear">
							<h1>视频简介：</h1>
							<?php echo $video->content->introduce;?>
						</div>
                        
                        <!-- 视频简介 -->
						<div class="info_desc clear">
							<h1>视频内容：</h1>
							<?php echo $video->content->content;?>
						</div>

						<!-- 上一篇、下一篇 -->
						<ul class="relation">
							<?php if($pre_relation):?>
								<li>上一篇：<a href="<?php echo $this->createUrl('video/view', array('id' => $pre_relation->id))?>"><?php echo $pre_relation->title;?></a></li>
							<?php else:?>
								<li>上一篇：<a href="javascript:;">没有了</a></li>
							<?php endif;?>
							<?php if($next_relation):?>
								<li>下一篇：<a href="<?php echo $this->createUrl('video/view', array('id' => $next_relation->id))?>"><?php echo $next_relation->title;?></a></li>
							<?php else:?>
								<li>下一篇：<a href="javascript:;">没有了</a></li>
							<?php endif;?>
						</ul>
					</div>
					
				</div>
			</div>				
			
			<!-- 评论区 -->
			<iframe id="comment_iframe" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" src="<?php echo $this->createUrl('comment/create', array('view_url'=>$this->_request->getUrl(),'content_id'=>$video->id,'topic_type'=>'video'));?>"></iframe>			
		</div>
		
		<!-- 右侧内容开始 -->
		<?php $this->renderPartial('right',array('last_videos'=>$last_videos));?>	
		<!-- 右侧内容结束 -->		
		
	</div>
	
    <script type="text/javascript" src="<?php echo $this->_stylePath . '/js/score.js';?>"></script>
	<!-- 返回顶部 -->
	<a href="javascript:;" id="back_top"></a>	
