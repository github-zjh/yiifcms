<?php
include_once ('RennServiceBase.php');
class CommentService extends RennServiceBase {
        /**
         * 对某个对象（日志、状态、照片、相册、分享等）进行评论
         * <br />对应API:{$link http://dev.renren.com/API/v2/comment/put }
         * @param String $content 评论内容。状态评论字数限制为240个字符，其余字数限制为500个字符。
         * @param Long $targetUserId 评论回复目标用户的ID，若为0或不传此参数为：添加一条评论
         * @param CommentType $commentType 评论的类型
         * @param Long $entryOwnerId 评论对象所有者的ID
         * @param Long $entryId 被评论对象的ID
         * @return Comment 评论
         */
         function putComment($content, $targetUserId, $commentType, $entryOwnerId, $entryId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($targetUserId)) {
	             $params ['targetUserId'] = $targetUserId;
	     }
	     if (isset($commentType)) {
	             $params ['commentType'] = $commentType;
	     }
	     if (isset($entryOwnerId)) {
	             $params ['entryOwnerId'] = $entryOwnerId;
	     }
	     if (isset($entryId)) {
	             $params ['entryId'] = $entryId;
	     }
             return $this->client->execute('/v2/comment/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 以分页的方式获取某个UGC的评论
         * <br />对应API:{$link http://dev.renren.com/API/v2/comment/list }
         * @param Boolean $desc 是否降序。true：按评论时间降序；false：按评论时间升序；默认:true,按评论时间降序。
         * @param Integer $pageSize 页面大小。取值范围1-100，默认大小20
         * @param Integer $pageNumber 页码。取值大于零，默认值为1
         * @param CommentType $commentType 评论的类型
         * @param Long $entryOwnerId 评论对象所有者的ID
         * @param Long $entryId 被评论对象的ID
         * @return Comment 评论
         */
         function listComment($desc, $pageSize, $pageNumber, $commentType, $entryOwnerId, $entryId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($desc)) {
	             $params ['desc'] = $desc;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($pageNumber)) {
	             $params ['pageNumber'] = $pageNumber;
	     }
	     if (isset($commentType)) {
	             $params ['commentType'] = $commentType;
	     }
	     if (isset($entryOwnerId)) {
	             $params ['entryOwnerId'] = $entryOwnerId;
	     }
	     if (isset($entryId)) {
	             $params ['entryId'] = $entryId;
	     }
             return $this->client->execute('/v2/comment/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
