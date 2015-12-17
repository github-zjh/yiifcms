<?php
include_once ('RennServiceBase.php');
class EvaluationService extends RennServiceBase {
        /**
         * 用户发表点评
         * <br />对应API:{$link http://dev.renren.com/API/v2/evaluation/put }
         * @param String $content 评价内容
         * @param String $placeId 地点id
         * @return Long 成功时ugcid签到结果 -1=操作被拒绝，-2=含敏感信息，-3=操作太快
         */
         function putEvaluation($content, $placeId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($placeId)) {
	             $params ['placeId'] = $placeId;
	     }
             return $this->client->execute('/v2/evaluation/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 回复点评
         * <br />对应API:{$link http://dev.renren.com/API/v2/evaluation/reply/put }
         * @param String $content 回复内容
         * @param Long $evaluationId 签到id
         * @param Long $ownerId evaluation属于哪个用户
         * @param Long $reId 回复哪个用户
         * @return ReplyCheckinResponse 回复签到结果
         */
         function putEvaluationReply($content, $evaluationId, $ownerId, $reId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($evaluationId)) {
	             $params ['evaluationId'] = $evaluationId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($reId)) {
	             $params ['reId'] = $reId;
	     }
             return $this->client->execute('/v2/evaluation/reply/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 签到回复列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/evaluation/reply/list }
         * @param Long $evaluationId 签到id
         * @param Long $ownerId 评价所属人的id
         * @param Integer $pageNo 页码
         * @param Integer $pageSize 页大小
         * @return ReplyEvaluation 评价回复
         */
         function listEvaluationReply($evaluationId, $ownerId, $pageNo, $pageSize) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($evaluationId)) {
	             $params ['evaluationId'] = $evaluationId;
	     }
	     if (isset($ownerId)) {
	             $params ['ownerId'] = $ownerId;
	     }
	     if (isset($pageNo)) {
	             $params ['pageNo'] = $pageNo;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
             return $this->client->execute('/v2/evaluation/reply/list', 'GET', $params, $bodyParams, $fileParams);
         } 
}
?>
