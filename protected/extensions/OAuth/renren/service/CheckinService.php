<?php
include_once ('RennServiceBase.php');
class CheckinService extends RennServiceBase {
        /**
         * 签到回复列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/checkin/reply/list }
         * @param Integer $pageNo 页码
         * @param Integer $pageSize 页大小
         * @param Long $checkinId 签到id
         * @return ReplyCheckin 签到回复
         */
         function listCheckinReply($pageNo, $pageSize, $checkinId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageNo)) {
	             $params ['pageNo'] = $pageNo;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
	     if (isset($checkinId)) {
	             $params ['checkinId'] = $checkinId;
	     }
             return $this->client->execute('/v2/checkin/reply/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取签到信息
         * <br />对应API:{$link http://dev.renren.com/API/v2/checkin/get }
         * @param Long $checkinId 签到id
         * @return PoiCheckin 签到详情
         */
         function getCheckin($checkinId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($checkinId)) {
	             $params ['checkinId'] = $checkinId;
	     }
             return $this->client->execute('/v2/checkin/get', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 获取签到列表
         * <br />对应API:{$link http://dev.renren.com/API/v2/checkin/list }
         * @param Integer $pageNo 页码
         * @param Integer $pageSize 页大小
         * @return LocationFeed 地点新鲜事
         */
         function listCheckin($pageNo, $pageSize) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($pageNo)) {
	             $params ['pageNo'] = $pageNo;
	     }
	     if (isset($pageSize)) {
	             $params ['pageSize'] = $pageSize;
	     }
             return $this->client->execute('/v2/checkin/list', 'GET', $params, $bodyParams, $fileParams);
         } 
        /**
         * 签到回复
         * <br />对应API:{$link http://dev.renren.com/API/v2/checkin/reply/put }
         * @param String $content 回复内容
         * @param Long $reId 回复哪个用户
         * @param Long $checkinId 签到id
         * @return ReplyCheckinResponse 回复签到结果
         */
         function putCheckinReply($content, $reId, $checkinId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($reId)) {
	             $params ['reId'] = $reId;
	     }
	     if (isset($checkinId)) {
	             $params ['checkinId'] = $checkinId;
	     }
             return $this->client->execute('/v2/checkin/reply/put', 'POST', $params, $bodyParams, $fileParams);
         } 
        /**
         * 用户进行签到
         * <br />对应API:{$link http://dev.renren.com/API/v2/checkin/put }
         * @param String $content 签到内容
         * @param String $placeId 地点id
         * @return Long 成功时ugcid签到结果 -1=操作被拒绝，-2=含敏感信息，-3=操作太快
         */
         function putCheckin($content, $placeId) {
             $params = array();
             $bodyParams = array();
             $fileParams = array();
	     if (isset($content)) {
	             $params ['content'] = $content;
	     }
	     if (isset($placeId)) {
	             $params ['placeId'] = $placeId;
	     }
             return $this->client->execute('/v2/checkin/put', 'POST', $params, $bodyParams, $fileParams);
         } 
}
?>
