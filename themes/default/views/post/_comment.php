<?php 
	$bagecmsCommentModel = new PostComment();
	$bagecmsCommentCriteria = new CDbCriteria();
	$bagecmsCommentCriteria->condition = 'post_id='.$bagecmsShow['id'];
	$bagecmsCommentCriteria->order = 't.id DESC';
	$bagecmsCommentCount = $bagecmsCommentModel->count( $bagecmsCommentCriteria );
	$bagecmsCommentPages = new CPagination( $bagecmsCommentCount );
	$bagecmsCommentPages->pageSize = 15;
	$bagecmsCommentPageParams = $this->buildCondition( $_GET, array ( 'id'    ) );
	$bagecmsCommentPageParams['#'] = 'commentList';
	$bagecmsCommentPages->params = is_array( $bagecmsCommentPageParams ) ? $bagecmsCommentPageParams : array ();
	$bagecmsCommentCriteria->limit = $bagecmsCommentPages->pageSize;
	$bagecmsCommentCriteria->offset = $bagecmsCommentPages->currentPage * $bagecmsCommentPages->pageSize;
	$bagecmsCommentList = $bagecmsCommentModel->findAll( $bagecmsCommentCriteria );
?>
<div id="comment">
      <div class="boxTit ">
        <h3>最新评论</h3>
      </div>
      <div class="bmc">
      <?php foreach($bagecmsCommentList  as $key=>$row):?>
        <dl class="item clear">
          <dt class="user"> <a class="title" ><?php echo $row->nickname?></a> <span class=" xw0"><?php echo date('Y-m-d H:i:s',$row['create_time'])?></span> </dt>
          <dd class="con"><?php echo CHtml::encode($row['content'])?></dd>
        </dl>
         <?php endforeach?>
         <div class="pagebar clear">
          <?php $this->widget('CLinkPager',array('pages'=>$bagecmsPagebar));?>
        </div>
        <form id="commentForm" name="cform"  method="post" autocomplete="off">
          <div class="cForm">
            <div class="area">
              <textarea name="comment" rows="3" class="pt validate[required]" id="comment" ></textarea>
            </div>
           
          </div>
          <div> 昵称：<input name="nickname" type="text" id="nickname" class="validate[required]"/> 邮箱：<input name="email" type="text" id="email" class="validate[required]"/></div>
          <p class="ptn">
           <input type="hidden" name="postId" id="postId" value="<?php echo $bagecmsShow['id']?>" />
            <button class="button" type="button" id="postComment">提交</button>
          </p>
          <div id="errorHtml"></div>
        </form>
      </div>
    </div>
<script type="text/javascript">
$("#postComment").click(
	function(){
		$.post("<?php echo $this->createUrl('post/postComment')?>",$("#commentForm").serializeArray(),function(res){
			if(res.state == 'success'){
				window.location.reload();
      }else{
        $("#errorHtml").html(res.message).show();
      }
	},'json');	
	}
);
</script>